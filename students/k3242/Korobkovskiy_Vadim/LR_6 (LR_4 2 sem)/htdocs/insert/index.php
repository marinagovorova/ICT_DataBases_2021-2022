<?php
namespace App\Service;
use PDO;
$dbname='lab1';
$dbuser = 'postgres';
$dbpass = 'KORNATA81';
$host = 'localhost';
$port = 5433;
$options = [];
$connect = "pgsql:host=".$host.";port=".$port.";dbname=".$dbname;
$db = new PDO($connect, $dbuser, $dbpass, $options);

if (isset($_GET['submit'])){
$insert=$db->query("INSERT INTO autorepair_network.branch VALUES($_GET[branch_id], $_GET[branch_address], $_GET[city_id])");
echo 'Данные успешно добавлены!';
};
?>


