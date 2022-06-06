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

if (isset($_GET['submit'])){
$insert=$db->query("INSERT INTO le_schema.mentor VALUES($_GET[mentor_id], $_GET[surname], $_GET[name], $_GET[secondname], $_GET[birthdate], $_GET[company])");
echo 'Данные успешно добавлены!';
};
?>


