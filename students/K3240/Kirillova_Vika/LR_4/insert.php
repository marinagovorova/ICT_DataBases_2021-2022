<?php
$dbuser = 'postgres';
$dbpass = 'ukivi13';
$host = 'localhost';
$dbname='Airport';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

$stmt = $pdo->query("INSERT INTO public.Пассажир(Серия_и_номер_паспорта_пассажира, ФИО_пассажира) VALUES('$_POST[Серия_и_номер_паспорта_пассажира]', '$_POST[ФИО_пассажира]')");
while ($row = $stmt->fetch())
{
  echo '<pre>';
  print_r($row);
}
echo 'Пассажир успешно добавлен!';


?>