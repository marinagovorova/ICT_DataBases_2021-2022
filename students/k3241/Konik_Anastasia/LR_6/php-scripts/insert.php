<?php
$dbuser = 'postgres';
$dbpass = 'qwertyhgfdsa1';
$host = 'localhost';
$dbname='JobAccounting';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

$sql = 'INSERT INTO students (id,name,surname,class) VALUES(:id,:name,:surname,:class)';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $_POST['id']);
$stmt->bindValue(':name', $_POST['name']);
$stmt->bindValue(':surname', $_POST['surname']);
$stmt->bindValue(':class', $_POST['class']);
$stmt->execute();

if (!$sql){
	echo "ERROR: Insert failed!";
} else {
	echo "Data inserted successfully";
}
?>



