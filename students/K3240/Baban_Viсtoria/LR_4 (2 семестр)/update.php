<?php
$dbuser = 'postgres';
$dbpass = 'i9love5horses&dogs3';
$host = 'localhost';
$dbname = 'Session';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

if ($_POST['enter']) {
    echo "
    ID студента: $_POST[id_student]
    <br>
    Новый статус студента: $_POST[status]
    <br><br>
";
}

$sql = 'UPDATE "SESSION".student
		SET student_status = :student_status
		WHERE id_student = :id_student';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':student_status', $_POST['status']);
$stmt->bindValue(':id_student', $_POST['id_student']);
$stmt->execute();

echo "<b>Data updated!</b>"; 
?>