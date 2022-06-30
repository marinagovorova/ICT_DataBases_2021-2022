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

$sql = 'SELECT count(*) from passenger';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rows_initial = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

$sql = 'DELETE from passenger
		WHERE passport_data = :passport_data AND name = :name';
		
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':passport_data', $_POST['passport_data']);
$stmt->bindValue(':name', $_POST['name']);
$stmt->execute();

$sql = 'SELECT count(*) from passenger';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rows_final = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

echo "<b>Passenger deleted: " . $rows_initial - $rows_final . "</b>";

?>
