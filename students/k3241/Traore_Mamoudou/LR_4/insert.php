<?php
$dbuser = 'postgres';
$dbpass = 'mamoudou35';
$host = 'localhost';
$dbname = 'data_base_airport';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

if ($_POST['enter']) {
	echo "
		Passport data of pasenger: $_POST[passport_data]
		<br>
		Pensenger name: $_POST[name]
		<br><br>";
}

$sql = 'INSERT INTO passenger(passport_data, name)
VALUES(:passport_data, :name,)';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':passport_data', $_POST['passport_data']);
$stmt->bindValue(':name', $_POST['name']);
$stmt->execute();
echo '<b> Values inserted!</b><br>';
