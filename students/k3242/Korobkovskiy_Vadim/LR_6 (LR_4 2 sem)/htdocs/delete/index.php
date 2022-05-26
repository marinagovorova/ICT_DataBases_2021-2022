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

if (isset($_GET['branch'])) {
$select=$db->query("SELECT * FROM autorepair_network.branch WHERE autorepair_network.branch.branch_id=$_GET[branch_id]");
while ($row = $select->fetch())
{
echo 'Branch ID (ID филиала): '.$row['branch_id']."<br />";
echo 'Branch Address (Адрес филиала): '.$row['branch_address']."<br />";
echo 'City ID (ID города): '.$row['city_id']."<br />";
}
};
if (isset($_GET['address'])) {
$update=$db->query("DELETE FROM autorepair_network.branch WHERE branch_id=$_GET[branch_id]");
echo 'Данные успешно удалены!';
};
?>


