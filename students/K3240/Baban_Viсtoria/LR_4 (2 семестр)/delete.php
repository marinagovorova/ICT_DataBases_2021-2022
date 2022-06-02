<?php
$dbuser = 'postgres';
$dbpass = 'i9love5horses&dogs3';
$host = 'localhost';
$dbname='Session';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

$sql = 'DELETE from "SESSION".student WHERE id_student = :id_student';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id_student', $_POST['id_student']);
$stmt->execute();

if (!$sql){
	echo "ERROR: Delete failed!";
} else {
	echo "Deleted successfully!";
}

?>