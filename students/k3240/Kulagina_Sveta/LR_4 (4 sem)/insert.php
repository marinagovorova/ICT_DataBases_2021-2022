<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'train';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

if ($_POST['enter']) {
	echo "
		Train id: $_POST[id_train]
		<br>
		Train type: $_POST[train_type]
		<br>
		Train name: $_POST[train_name]
		<br>
		Departure: $_POST[departure]
		<br>
		Arrival: $_POST[arrival]
		<br>
		Destination: $_POST[destination]
		<br><br>
	";
}

$sql = 'INSERT INTO train(id_train, train_type, train_name, departure, arrival, destination) 
		VALUES(:id_train, :train_type, :train_name, :departure, :arrival, :destination)';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id_train', $_POST['id_train']);
$stmt->bindValue(':train_type', $_POST['train_type']);
$stmt->bindValue(':train_name', $_POST['train_name']);
$stmt->bindValue(':departure', $_POST['departure']);
$stmt->bindValue(':arrival', $_POST['arrival']);
$stmt->bindValue(':destination', $_POST['destination']);
$stmt->execute();
echo '<b> Values inserted!</b><br>';