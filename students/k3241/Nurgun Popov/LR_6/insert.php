<?php
$dbuser = 'postgres';
$dbpass = '239741';
$host = 'localhost';
$dbname = 'gas';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

$result = "INSERT INTO gas.bill (bill_number,bill_sum,company_name,full_name) VALUES(:bill_number,:bill_sum,:company_name,:full_name)";
$stmt = $pdo->prepare($result);
$stmt->bindValue(':bill_number', $_POST['bill_number']);
$stmt->bindValue(':bill_sum', $_POST['bill_sum']);
$stmt->bindValue(':company_name', $_POST['company_name']);
$stmt->bindValue(':full_name', $_POST['full_name']);
$stmt->execute();

if (!$result) {
	echo "Update failed!";
}
else {
	echo "Update successfull";
}
?>
