<?php
$dbuser = 'postgres';
$dbpass = 'admin';
$host = 'localhost';
$dbname='BD_Shevchenko';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

$stmt = $pdo->query("SELECT * FROM public.Преподаватель WHERE Таб_номер_преподавателя = '$_POST[Таб_номер_преподавателя]'");
while ($row = $stmt->fetch()) 
{
echo 'Должность: '.$row['Должность']."<br />";
echo 'ФИО преподавателя: '.$row['ФИО_преподавателя']."<br />";
echo 'Табельный номер преподавателя: '.$row['Таб_номер_преподавателя']."<br />";
}
?>