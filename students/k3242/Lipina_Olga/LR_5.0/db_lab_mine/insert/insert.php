<?php
$dbuser = 'postgres';
$dbpass = 'profi-100';
$host = 'localhost';
$dbname='Restaurant';
$db = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);


$insert=$db->query("INSERT INTO rest_schema.dishes(name, weight, type) VALUES('$_POST[dish_name]', '$_POST[weight]', '$_POST[type_dish]')");
echo 'Запись успешно добавлена!';

?>