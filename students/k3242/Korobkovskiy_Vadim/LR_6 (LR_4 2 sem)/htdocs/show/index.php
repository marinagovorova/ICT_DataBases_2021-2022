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

$show = $db->query("SELECT autorepair_network.branch.branch_id, 
autorepair_network.branch.branch_address, autorepair_network.branch.city_id,
autorepair_network.city.city_name, autorepair_network.city.region, autorepair_network.city.area
FROM autorepair_network.branch, autorepair_network.city WHERE
autorepair_network.branch.city_id = autorepair_network.city.city_id");
while ($row = $show->fetch())
{
echo 'Branch ID (ID филиала): '.$row['branch_id']."<br />";
echo 'Branch Address (Адрес филиала): '.$row['branch_address']."<br />";
echo 'City ID (ID города): '.$row['city_id']."<br />";
echo 'City Name (Название города): '.$row['city_name']."<br />";
echo 'City Region (Регион): '.$row['region']."<br />";
echo 'City Area (Область): '.$row['area']."<br /><br />";
}
?>


