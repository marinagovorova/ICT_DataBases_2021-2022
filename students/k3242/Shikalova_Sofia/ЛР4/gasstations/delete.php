<?php
$dbuser = 'postgres';
$dbpass = '6hgkx277v';
$host = 'localhost';
$dbname='gas\ stations';
$db = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

$result = $db->query("DELETE FROM public.Продажа WHERE order_code = '$_POST[Code4]'");

while ($row = $result->fetch()){
	echo '<pre>';
	print_r($row);
}
echo "Action succeed";
?>