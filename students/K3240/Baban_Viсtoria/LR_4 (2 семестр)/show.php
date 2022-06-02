<?php
$dbuser = 'postgres';
$dbpass = 'i9love5horses&dogs3';
$host = 'localhost';
$dbname='Session';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
	
if ($_POST["show"]) {
//получаем данные
    $data = $pdo->query('SELECT * FROM "SESSION".student ORDER BY id_student ASC ');
 
    //выводим результат
	echo "<table><tr><th>ID</th><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Статус</th></tr>";
    foreach($data as $row) {
	echo "<tr>";
        echo "<td>".$row['id_student'] . "</td>"; 
        echo "<td>".$row['last_name_student'] . "</td>"; 
        echo "<td>".$row['name_student'] . "</td>"; 
	echo "<td>".$row['patronymic_student'] . "</td>"; 
	echo "<td>".$row['student_status'] . "</td>"; 
	echo "</tr>";
    }

}
?>