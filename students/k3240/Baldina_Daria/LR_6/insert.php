<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'employee';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

if ($_POST['enter']) {
	echo "
		Employee id: $_POST[id]
		<br>
		Employee last name: $_POST[last_name]
		<br>
		Employee first name: $_POST[first_name]
		<br>
		Employee middle name: $_POST[middle_name]
		<br>
		Employee salary: $_POST[salary]
		<br>
		Employee position: $_POST[position]
		<br><br>
	";
}

$sql = 'INSERT INTO employee (id,first_name, middle_name, last_name, salary, position) VALUES(:id,:first_name,:middle_name,:last_name,:salary,:position)';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $_POST['id']);
$stmt->bindValue(':first_name', $_POST['first_name']);
$stmt->bindValue(':middle_name', $_POST['middle_name']);
$stmt->bindValue(':last_name', $_POST['last_name']);
$stmt->bindValue(':salary', $_POST['salary']);
$stmt->bindValue(':position', $_POST['position']);
$stmt->execute();
echo '<b> Values inserted!</b><br>';
