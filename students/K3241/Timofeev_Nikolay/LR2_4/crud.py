from datetime import datetime

import psycopg2.extras
import typing
from urllib.parse import urlparse

import psycopg2

import models
from datetime import timezone


def get_connection() -> typing.Iterable[object]:
    """Get database connection"""
    result = urlparse("postgresql://postgres:postgres@localhost:5438/postgres")

    username = result.username
    password = result.password
    database = result.path[1:]
    hostname = result.hostname
    port = result.port

    conn = psycopg2.connect(database=database, user=username, password=password, host=hostname, port=port)

    try:
        yield conn.cursor(cursor_factory=psycopg2.extras.RealDictCursor)
    finally:
        conn.commit()
        conn.close()


def verify_user(cursor, username: str, password: str) -> bool:
    cursor.execute(
        f'''SELECT * FROM db.usercredentials uc, db."user" u WHERE uc.username='{username}' AND uc.password='{password}' AND uc.id=u.id''')
    return bool(cursor.fetchall())


def get_user_by_username(cursor, username: str) -> dict:
    cursor.execute(
        f'''SELECT u.*, uc.username FROM db.usercredentials uc, db."user" u WHERE uc.username='{username}' AND uc.id=u.id''')
    return cursor.fetchone()


def add_achievement_user(cursor, user_id: int):
    query_count_travels = f"SELECT count(d.to_city_id) AS cnt FROM db.travel " \
                          f"JOIN db.destination d on travel.id = d.travel_id " \
                          f"WHERE user_id={user_id}"

    cursor.execute(query_count_travels)
    count_trips = cursor.fetchone()['cnt'] or 0

    suitable_achievement_query = f'SELECT id as id FROM db.achievements WHERE required={count_trips}'
    cursor.execute(suitable_achievement_query)

    if achievement := cursor.fetchone():
        cursor.execute("SELECT max(id) + 1 AS id FROM db.achuser")
        ach_id = cursor.fetchone()['id'] or 1
        query = f"""INSERT INTO db.achuser VALUES ({ach_id}, 
                    {achievement['id']}, 
                    {user_id})
                """

        cursor.execute(query)


def insert_new_travel(cursor, travel: models.Travel, dest: models.Destination, user: models.User) -> dict:
    travel_id_query = "SELECT MAX(id) + 1 AS id FROM db.travel"
    cursor.execute(travel_id_query)
    travel_id = cursor.fetchone()['id'] or 1
    travel_query = f"""INSERT INTO db.travel 
    VALUES ({travel_id}, 
    '{datetime.now(timezone.utc)}', '{travel.ts_start}', 
    '{travel.ts_end}', {user.id}, '{travel.type.name}');
    """

    destination_id_query = "SELECT MAX(id) + 1 AS id FROM db.destination"
    cursor.execute(destination_id_query)
    destination_id = cursor.fetchone()['id'] or 1
    destination_query = f"""INSERT INTO db.destination VALUES ({destination_id}, {dest.from_city}, {dest.to_city}, {travel_id})"""

    add_achievement_user(cursor, user.id)

    cursor.execute(travel_query)
    cursor.execute(destination_query)


def get_city_by_id(cursor, id: int):
    cursor.execute("SELECT ct.id AS city_id, ct.name city_name, c.name country_name, c.type country_type "
                   f"FROM db.city ct JOIN db.country c on ct.country_id = c.id WHERE ct.id={id}")
    return cursor.fetchone()


def get_all_cities(cursor):
    cursor.execute("SELECT ct.id city_id, concat(c.name, ', ', ct.name) city "
                   "FROM db.city ct JOIN db.country c on ct.country_id = c.id")
    return cursor.fetchall()


def get_all_countries(cursor):
    cursor.execute("SELECT * FROM db.country")
    return cursor.fetchall()


def get_all_user_travels(cursor, user_id: int):
    cursor.execute(f"""
        SELECT db.travel.*, tocity.name tocityname, fromcity.name fromcityname, countryfrom.name fromcountryname, countryto.name tocountryname 
        FROM db.travel 
        JOIN db.destination d on travel.id = d.travel_id 
        JOIN db.city tocity ON d.to_city_id = tocity.id 
        JOIN db.city fromcity ON fromcity.id = d.from_city_id 
        JOIN db.country countryfrom on countryfrom.id = fromcity.country_id 
        JOIN db.country countryto ON countryto.id = tocity.country_id 
        WHERE user_id={user_id}
        ORDER BY ts_created DESC 
    """)
    return cursor.fetchall()


def calculate_stats(cursor, user_id: int) -> dict:
    query = f"""
    SELECT count(DISTINCT d.to_city_id) unique_places, count(d.to_city_id) places 
    FROM db.travel t JOIN db.destination d on t.id = d.travel_id WHERE t.user_id = {user_id};
    """
    cursor.execute(query)
    return cursor.fetchall()


def delete_travel_info(cursor, travel_id: int):
    cursor.execute(f"""
    DELETE FROM db.travel WHERE id = {travel_id}; 
    DELETE FROM db.destination WHERE travel_id = {travel_id};
    """)


def get_feed(cursor):
    query = """
    SELECT db.travel.*, u.name username, c.name cityname FROM db.travel JOIN db."user" u on u.id = travel.user_id JOIN db.destination d on travel.id = d.travel_id JOIN db.city c on d.to_city_id = c.id ORDER BY ts_created DESC LIMIT 9
    """
    cursor.execute(query)
    return cursor.fetchall()


def register_user(cursor, username: str, password: str, name: str, birthdate: str, residence: str):
    query = f"""
    INSERT INTO db.user VALUES ((SELECT max(id) + 1 FROM db."user"), '{name}', '{residence}', '{birthdate}');
    INSERT INTO db.usercredentials VALUES ((SELECT max(id) + 1 FROM db.usercredentials), '{username}', '{password}');
    """
    cursor.execute(query)


def get_achievements(cursor, user_id: int) -> dict:
    query = f"""
    SELECT db.achuser.*, a.* FROM db.achuser JOIN db.achievements a ON a.id = achuser.ach_id WHERE user_id={user_id}
    """
    cursor.execute(query)
    return cursor.fetchall()
