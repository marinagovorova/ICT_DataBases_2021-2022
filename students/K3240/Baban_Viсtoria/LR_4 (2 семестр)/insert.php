<?php
$dbuser = 'postgres';
$dbpass = 'i9love5horses&dogs3';
$host = 'localhost';
$dbname='Session';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

$sql = 'INSERT INTO "SESSION".student (last_name_student,name_student,patronymic_student,student_status) VALUES(:last_name_student,:name_student,:patronymic_student,:student_status)';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':last_name_student', $_POST['last_name']);
$stmt->bindValue(':name_student', $_POST['name']);
$stmt->bindValue(':patronymic_student', $_POST['patronymic']);
$stmt->bindValue(':student_status', $_POST['status']);
$stmt->execute();

if (!$sql){
	echo "ERROR: Insert failed!";
} else {
	echo "Data inserted successfully";
}
?>