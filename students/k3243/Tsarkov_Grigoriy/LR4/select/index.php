<?php
namespace App\Service;
use PDO;
$dbname='hackathon';
$dbuser = 'postgres';
$dbpass = 'sqlsqlsql';
$host = 'localhost';
$port = 5432;
$options = [];
$connect = "pgsql:host=".$host.";port=".$port.";dbname=".$dbname;
$db = new PDO($connect, $dbuser, $dbpass, $options);

$show = $db->query("SELECT *
FROM le_schema.mentor");
while ($row = $show->fetch())
{
echo 'ID ментора: '.$row['mentor_id']."<br />";
echo 'Фамилия: '.$row['surname']."<br />";
echo 'Имя: '.$row['name']."<br />";
echo 'Отчество: '.$row['secondname']."<br />";
echo 'Дата рождения: '.$row['birthdate']."<br />";
echo 'Компания: '.$row['company']."<br /><br />";
}
?>