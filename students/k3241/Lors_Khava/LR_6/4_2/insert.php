<?php

$dbuser = 'postgres';
$host = 'localhost';
$port = 5432;
$dbname = 'sport_club';
$dbpassword = 'qwerty1';
$pdo = new PDO("pgsql:host=$host; port=$port; dbname=$dbname", $dbuser, $dbpassword);


$query="INSERT INTO sport_club.coach (passport_data_coach, category_code, 
salary, coach_rating, full_name, phone_number) 
VALUES(:passport_data_coach,:category_code,:salary,:coach_rating,:full_name,:phone_number)";
$result = $pdo->prepare($query);

$result->bindValue(':passport_data_coach', $_POST['passport_data_coach']);
$result->bindValue(':category_code', $_POST['category_code']);
$result->bindValue(':salary', $_POST['salary']);
$result->bindValue(':coach_rating', $_POST['coach_rating']);
$result->bindValue(':full_name', $_POST['full_name']);
$result->bindValue(':phone_number', $_POST['phone_number']);
$result->execute();


if (!$query)
{
    echo "Update failed!";
} else
	{
		echo "Update successfull!";
	}	
?>