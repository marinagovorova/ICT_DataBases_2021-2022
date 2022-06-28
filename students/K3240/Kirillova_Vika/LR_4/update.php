<?php
$dbuser = 'postgres';
$dbpass = 'ukivi13';
$host = 'localhost';
$dbname='Airport';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

$stmt = $pdo->query("UPDATE public.Билет SET Цена_билета = ('$_POST[Цена]') WHERE Номер_рейса = ('$_POST[Номер_рейса]')");
while ($row = $stmt->fetch())
{
  echo '<pre>';
  print_r($row);
}
echo 'Цены изменены!';
?>