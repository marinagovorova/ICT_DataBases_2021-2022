<?php
$dbuser = 'postgres';
$dbpass = 'qwertyhgfdsa1';
$host = 'localhost';
$dbname='JobAccounting';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
	
$sql = "DELETE from students WHERE id = '$_POST[id]'";
$stmt = $pdo->prepare($sql);
$stmt->execute();

if (!$sql){
	echo "ERROR: Delete failed!";
} else {
	echo "Deleted successfully!";
}
?>
