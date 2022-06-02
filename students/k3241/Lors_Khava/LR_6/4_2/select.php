<?php

$dbuser = 'postgres';
$host = 'localhost';
$port = 5432;
$dbname = 'sport_club';
$dbpassword = 'qwerty1';
$pdo = new PDO("pgsql:host=$host; port=$port; dbname=$dbname", $dbuser, $dbpassword);


$sth = $pdo->query("SELECT coach.category_code, coach_category.name_category,
coach.full_name FROM sport_club.coach INNER JOIN sport_club.coach_category 
ON sport_club.coach.category_code = sport_club.coach_category.code_category
GROUP BY coach.category_code, coach_category.name_category, coach.full_name");

while ($row = $sth->fetch())
{
    echo 'Тренер: '.$row['full_name']."<br />";
    echo 'Категория: '.$row['category_code']."<br />";
    echo 'Название категории: '.$row['name_category']."<br />";
}


?>