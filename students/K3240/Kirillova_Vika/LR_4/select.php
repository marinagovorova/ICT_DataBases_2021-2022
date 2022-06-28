<?php
$dbuser = 'postgres';
$dbpass = 'ukivi13' ;
$host = 'localhost';
$dbname='Airport';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

$stmt = $pdo->query("SELECT * FROM public.Рейс WHERE Номер_рейса = '$_POST[Номер_рейса]'");
while ($row = $stmt->fetch()) 
{
echo 'Номер_рейса: '.$row['Номер_рейса']."<br />";
echo 'Номер_самолета: '.$row['Номер_самолета']."<br />";
echo 'Дата_вылета: '.$row['Дата_вылета']."<br />";
echo 'Статус: '.$row['Статус']."<br />";
echo 'Дата_прилета: '.$row['Дата_прилета']."<br />";
echo 'Тип_рейса: '.$row['Тип_рейса']."<br />";
echo 'Бортовой_номер: '.$row['Бортовой_номер']."<br />";
}

?>