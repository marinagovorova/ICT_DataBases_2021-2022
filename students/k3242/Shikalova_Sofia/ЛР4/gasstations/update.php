<?php
$dbuser = 'postgres';
$dbpass = '6hgkx277v';
$host = 'localhost';
$dbname='gas\ stations';
$db = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

$result = $db->query("UPDATE public.Клиент SET client_telephone = '$_POST[Telephone2]'
            WHERE client_code = '$_POST[Code3]'");
while ($row = $result->fetch()){
	echo '<pre>';
	print_r($row);
}
echo "Action succeed";
?>