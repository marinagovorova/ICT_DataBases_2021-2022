<?php
$dbuser = 'postgres';
$dbpass = 'admin';
$host = 'localhost';
$dbname='BD_Shevchenko';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

$stmt = $pdo->query("DELETE FROM public.Преподаватель WHERE Таб_номер_преподавателя = '$_POST[Таб_номер_преподавателя]'");

while ($row = $stmt->fetch())
{
  echo '<pre>';
  print_r($row);
}

if (!$stmt){
	echo "ОШИБКА: ID НЕ СУЩЕСТВУЕТ!";
} else {
	echo "Сотрудник удалён.";
}

?>