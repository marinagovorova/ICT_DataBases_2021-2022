<?php
$dbuser = 'postgres';
$dbpass = '     ';
$host = 'localhost';
$dbname='VAR13';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

$stmt = $pdo->query("DELETE FROM public.cars WHERE id_model = '$_POST[id_model]'");
while ($row = $stmt->fetch())
{
  echo '<pre>';
  print_r($row);
}

if (!$stmt){
	echo "Ошибка: Такой машины не существует!";
} else {
	echo "Машина удалена.";
}
?>