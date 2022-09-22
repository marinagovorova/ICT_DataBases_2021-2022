<?php
$dbuser = 'postgres';
$dbpass = 'admin';
$host = 'localhost';
$dbname='BD_Shevchenko';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

$stmt = $pdo->query("UPDATE public.Преподаватель SET Должность = '$_POST[Должность]' WHERE Таб_номер_преподавателя = '$_POST[Таб_номер_преподавателя]'");

while ($row = $stmt->fetch())
{
  echo '<pre>';
  print_r($row);
}
echo 'Данные изменены!';
?>