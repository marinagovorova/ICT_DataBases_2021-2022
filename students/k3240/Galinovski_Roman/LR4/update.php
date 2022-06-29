<?php
$dbuser = 'postgres';
$dbpass = '     ';
$host = 'localhost';
$dbname='VAR13';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

$stmt = $pdo->query("UPDATE public.employer SET employer_passport=('$_POST[employer_passport]') WHERE id_employer=('$_POST[id_employer]')");
while ($row = $stmt->fetch())
{
  echo '<pre>';
  print_r($row);
}
echo 'Паспортные данные изменены!';
?>