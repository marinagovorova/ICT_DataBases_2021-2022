from fastapi import FastAPI, HTTPException, Depends

import crud
import models

app = FastAPI()


@app.get("/login")
def get_token(username: str, password: str, db_cursor: object = Depends(crud.get_connection)):
    if not crud.verify_user(db_cursor, username, password):
        raise HTTPException(status_code=403, detail="Wrong login/pass")
    return {"token": f"{username}__{password}"}


@app.get("/me")
def get_my_data(token: str, db_cursor: object = Depends(crud.get_connection)):
    user_data = token.split("__")
    if not crud.verify_user(db_cursor, username=user_data[0], password=user_data[1]):
        raise HTTPException(status_code=403, detail="Wrong login/pass")
    return crud.get_user_by_username(db_cursor, user_data[0])


@app.get("/travels")
def all_travels(token: str, db_cursor: object = Depends(crud.get_connection)):
    user_data = token.split("__")
    if not crud.verify_user(db_cursor, username=user_data[0], password=user_data[1]):
        raise HTTPException(status_code=403, detail="Wrong login/pass")
    user = crud.get_user_by_username(db_cursor, user_data[0])
    return crud.get_all_user_travels(db_cursor, user['id'])


@app.get("/travels/stats")
def user_stats(token: str, db_cursor: object = Depends(crud.get_connection)):
    user_data = token.split("__")
    if not crud.verify_user(db_cursor, username=user_data[0], password=user_data[1]):
        raise HTTPException(status_code=403, detail="Wrong login/pass")
    user = crud.get_user_by_username(db_cursor, user_data[0])
    return crud.calculate_stats(db_cursor, user_id=user['id'])


@app.post("/travels")
def create_travel(token: str, travel: models.Travel, dest: models.Destination,
                  db_cursor: object = Depends(crud.get_connection)):
    user_data = token.split("__")
    if not crud.verify_user(db_cursor, username=user_data[0], password=user_data[1]):
        raise HTTPException(status_code=403, detail="Wrong login/pass")
    user = crud.get_user_by_username(db_cursor, user_data[0])
    crud.insert_new_travel(db_cursor, travel, dest, models.User(id=user['id'], username=user['username']))


# timofeev41__Nikolay1.
@app.delete("/travels/{id}")
def delete_travel(id: int, db_cursor: object = Depends(crud.get_connection)):
    crud.delete_travel_info(db_cursor, id)


@app.get("/cities")
def get_all_cities(db_cursor: object = Depends(crud.get_connection)):
    return crud.get_all_cities(db_cursor)


@app.get("/countries")
def get_all_countries(db_cursor: object = Depends(crud.get_connection)):
    return crud.get_all_countries(db_cursor)


@app.get("/cities/{id}")
def get_city(id: int, db_cursor: object = Depends(crud.get_connection)) -> dict:
    return crud.get_city_by_id(db_cursor, id)


@app.get("/travels/type")
def get_travel_types():
    return list(models.TravelType)


@app.get("/feed")
def get_feed(db_cursor: object = Depends(crud.get_connection)) -> dict:
    return crud.get_feed(db_cursor)


@app.post("/register")
def create_user(username: str, password: str, name: str, birthdate: str, residence: str,
                db_cursor: object = Depends(crud.get_connection)):
    crud.register_user(db_cursor, username, password, name, birthdate, residence)


@app.get("/achievements")
def get_achievements(token: str, db_cursor: object = Depends(crud.get_connection)):
    user_data = token.split("__")
    if not crud.verify_user(db_cursor, username=user_data[0], password=user_data[1]):
        raise HTTPException(status_code=403, detail="Wrong login/pass")
    user = crud.get_user_by_username(db_cursor, user_data[0])
    return crud.get_achievements(db_cursor, user['id'])
