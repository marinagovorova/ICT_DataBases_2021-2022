<?php

$dbuser = 'postgres';
$host = 'localhost';
$port = 5432;
$dbname = 'sport_club';
$dbpassword = 'qwerty1';
$pdo = new PDO("pgsql:host=$host; port=$port; dbname=$dbname", $dbuser, $dbpassword);


$query="UPDATE sport_club.coach SET salary = :salary 
WHERE passport_data_coach = :passport_data_coach AND full_name = :full_name";

$result = $pdo->prepare($query);

$result->bindValue(':passport_data_coach', $_POST['passport_data_coach']);
$result->bindValue(':full_name', $_POST['full_name']);
$result->bindValue(':salary', $_POST['salary']);
$result->execute();


if (!$query)
{
    echo "Update failed!";
} else
	{
		echo "Update successfull!";
	}	
?>