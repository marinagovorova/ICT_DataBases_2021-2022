<?php
$dbuser = 'postgres';
$dbpass = 'profi-100';
$host = 'localhost';
$dbname='Restaurant';
$db = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);


$result = $db->query("DELETE FROM rest_schema.dishes WHERE name = '$_POST[dish_name]'");

while ($row = $result->fetch()){
	echo '<pre>';
	print_r($row);
}
echo "Запись удалена!";
?>