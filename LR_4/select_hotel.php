<?php
$dbuser = 'postgres';
$dbpass = 'k9413315K';
$host = 'localhost';
$dbname='postgres';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");

$result = pg_query($db, "SELECT * FROM hotel");

$rows = pg_num_rows($result);
echo "Всего отелей: " . $rows . ".\n";


?>    