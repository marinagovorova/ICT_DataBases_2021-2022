<?php
$dbuser = 'postgres';
$dbpass = 'mamoudou35';
$host = 'localhost';
$dbname = 'data_base_airport';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

if ($_POST['enter']) {
	echo "
		Passport data of pasenger: <b>$_POST[passport_data]</b><br>
    Pensenger name: <b>$_POST[name]</b><br>
		<br>";
}

$sql = 'UPDATE passenger
		SET name = :name
		WHERE passport_data = :passport_data AND';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':passport_data', $_POST['passport_data']);
$stmt->bindValue(':name', $_POST['name']);
$stmt->execute();

echo "<b>Passenger name updated!</b>"; 
?>
