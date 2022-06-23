<?php
$dbuser = 'postgres';
$dbpass = '239741';
$host = 'localhost';
$dbname = 'gas';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

$result = "DELETE from gas.bill WHERE bill_number = '$_POST[bill_number]'";
$stmt = $pdo->prepare($result);
$stmt->execute();

if (!$result) {
	echo "Update failed!";
}
else {
	echo "Update successfull";
}
?>
