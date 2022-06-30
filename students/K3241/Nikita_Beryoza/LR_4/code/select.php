<?php
$dbuser = 'postgres';
$dbpass = '     ';
$host = 'localhost';
$dbname='VAR13';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

$stmt = $pdo->query("SELECT * FROM public.cars WHERE manufacturer = '$_POST[manufacturer]' and id_model = '$_POST[id_model]'");
while ($row = $stmt->fetch()) 
{
echo 'Id_model: '.$row['id_model']."<br />";
echo 'Manufacturer: '.$row['manufacturer']."<br />";
echo 'Model: '.$row['model']."<br />";
echo 'Specs: '.$row['specs']."<br />";
}

?>