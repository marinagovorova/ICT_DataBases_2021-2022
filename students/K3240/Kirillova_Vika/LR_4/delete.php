<?php
$dbuser = 'postgres';
$dbpass = 'ukivi13';
$host = 'localhost';
$dbname='Airport';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

$stmt = $pdo->query("DELETE FROM public.Пассажир WHERE Серия_и_номер_паспорта_пассажира= '$_POST[Серия_и_номер_паспорта_пассажира]'");
while ($row = $stmt->fetch())
{
  echo '<pre>';
  print_r($row);
}

if (!$stmt){
	echo "ОШИБКА: такого пассажира НЕ СУЩЕСТВУЕТ!";
} else {
	echo "Пассажир удалён.";
}
?>