<?php
$dbuser = 'postgres';
$dbpass = '     ';
$host = 'localhost';
$dbname='VAR13';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

$stmt = $pdo->query("SELECT * FROM public.employer WHERE family = '$_POST[family]' and id_employer = '$_POST[id_employer]'");
while ($row = $stmt->fetch()) 
{
echo 'Фамилия: '.$row['family']."<br />";
echo 'Имя: '.$row['name']."<br />";
echo 'Отчество: '.$row['patronomyc']."<br />";
echo 'ID: '.$row['id_employer']."<br />";
echo 'ID позиции: '.$row['id_position']."<br />";
echo 'Пасспорт: '.$row['employer_passport']."<br />";
echo 'ЗП: '.$row['salary']."<br />";
echo 'Категория сотрудника: '.$row['category']."<br />";
}

?>