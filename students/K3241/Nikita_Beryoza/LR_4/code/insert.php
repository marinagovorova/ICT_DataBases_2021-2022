<?php
$dbuser = 'postgres';
$dbpass = '     ';
$host = 'localhost';
$dbname='VAR13';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

$stmt = $pdo->query("INSERT INTO public.cars VALUES('$_POST[id_model]', '$_POST[manufacturer]', '$_POST[model]',
'$_POST[specs]')");
while ($row = $stmt->fetch())
{
  echo '<pre>';
  print_r($row);
}
echo 'Сотрудник успешно добавлен!';


?>