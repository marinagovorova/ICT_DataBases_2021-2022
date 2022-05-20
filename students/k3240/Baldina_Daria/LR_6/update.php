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
    Employee salary: $_POST[salary]
    <br><br>
";
}

$sql = 'UPDATE employee
		SET salary = :salary
		WHERE last_name = :last_name AND
		id = :id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $_POST['id']);
$stmt->bindValue(':last_name', $_POST['last_name']);
$stmt->bindValue(':salary', $_POST['salary']);
$stmt->execute();

echo "<b>Employee data updated!</b>"; 
?>