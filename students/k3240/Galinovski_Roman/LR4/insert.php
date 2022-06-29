<?php
$dbuser = 'postgres';
$dbpass = '     ';
$host = 'localhost';
$dbname='VAR13';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

$stmt = $pdo->query("INSERT INTO public.employer VALUES('$_POST[id_employer]', '$_POST[id_position]', '$_POST[family]', 
'$_POST[name]','$_POST[patronomyc]','$_POST[employer_passport]','$_POST[salary]','$_POST[category]')");
while ($row = $stmt->fetch())
{
  echo '<pre>';
  print_r($row);
}
echo 'Сотрудник успешно добавлен!';


?>