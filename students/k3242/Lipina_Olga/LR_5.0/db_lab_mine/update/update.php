<?php
$dbuser = 'postgres';
$dbpass = 'profi-100';
$host = 'localhost';
$dbname='Restaurant';
$db = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);


$result=$db->query("UPDATE rest_schema.dishes SET weight = '$_POST[weight]'
            WHERE name = '$_POST[dish_name]'");
			
echo 'Запись успешно изменена!';

?>