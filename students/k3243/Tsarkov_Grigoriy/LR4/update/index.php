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

if (isset($_GET['mentor'])) {
$select=$db->query("SELECT * FROM le_schema.mentor WHERE mentor_id=$_GET[mentor_id]");
while ($row = $select->fetch())
{
echo 'ID ментора: '.$row['mentor_id']."<br />";
echo 'Фамилия: '.$row['surname']."<br />";
echo 'Имя: '.$row['name']."<br />";
echo 'Отчество: '.$row['secondname']."<br />";
echo 'Дата рождения: '.$row['birthdate']."<br />";
echo 'Компания: '.$row['company']."<br /><br />";
}
};
if (isset($_GET['mentor_company'])){
$update=$db->query("UPDATE le_schema.mentor SET Company=$_GET[company] WHERE mentor_id=$_GET[mentor_id]");
echo 'Данные успешно обновлены!';
};
?>


