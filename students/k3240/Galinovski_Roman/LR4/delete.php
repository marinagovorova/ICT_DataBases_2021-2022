<?php
$dbuser = 'postgres';
$dbpass = '     ';
$host = 'localhost';
$dbname='VAR13';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

$stmt = $pdo->query("DELETE FROM public.employer WHERE id_employer = '$_POST[id_employer]'");
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