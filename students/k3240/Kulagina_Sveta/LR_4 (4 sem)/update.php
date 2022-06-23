<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'train';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);



if ($_POST['enter']) {
    echo "
    Train name: $_POST[train_name]
    <br>
    New destination: $_POST[destination]
    <br><br>
";
}

$sql = 'UPDATE train
		SET destination = :destination
		WHERE train_name = :train_name';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':train_name', $_POST['train_name']);
$stmt->bindValue(':destination', $_POST['destination']);
$stmt->execute();

echo "<b>Train data updated!</b>"; 
?>