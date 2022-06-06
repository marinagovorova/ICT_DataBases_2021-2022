<?php
$dbuser = 'postgres';
$dbpass = '239741';
$host = 'localhost';
$dbname = 'gas';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

$result = "UPDATE gas.bill SET bill_sum = :bill_sum WHERE bill_number = :bill_number";
$stmt = $pdo->prepare($result);
$stmt->bindValue(':bill_number', $_POST['bill_number']);
$stmt->bindValue(':bill_sum', $_POST['bill_sum']);
$stmt->execute();

if (!$result) {
	echo "Update failed!";
}
else {
	echo "Update successfull";
}
?>
