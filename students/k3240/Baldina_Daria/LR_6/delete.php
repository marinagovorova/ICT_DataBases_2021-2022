<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'employee';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

if ($_POST['enter']) {
	echo "
		Employee last name: <b>$_POST[last_name]</b><br>
        Employee first name: <b>$_POST[first_name]</b><br>
		<br>";
}

$sql = 'SELECT count(*) from employee';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rows_initial = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

$sql = 'DELETE from employee
		WHERE last_name = :last_name AND first_name = :first_name';
		
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':last_name', $_POST['last_name']);
$stmt->bindValue(':first_name', $_POST['first_name']);
$stmt->execute();

$sql = 'SELECT count(*) from employee';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rows_final = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

echo "<b>Employee deleted: " . $rows_initial - $rows_final . "</b>"; 

?>