<?php

$dbuser = 'postgres';
$host = 'localhost';
$port = 5432;
$dbname = 'sport_club';
$dbpassword = 'qwerty1';
$pdo = new PDO("pgsql:host=$host; port=$port; dbname=$dbname", $dbuser, $dbpassword);


$query="DELETE FROM sport_club.coach WHERE passport_data_coach = $_POST[passport_data_coach]";
$result = $pdo->prepare($query);
$result->execute();

if (!$query)
{
    echo "Update failed!";
} else
	{
		echo "Update successfull!";
	}	
?>