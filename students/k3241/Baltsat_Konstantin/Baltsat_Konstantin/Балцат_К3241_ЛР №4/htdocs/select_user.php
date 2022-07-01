<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'Podo';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");

$result = pg_query($db, "SELECT * FROM "Podo"."User" ");

$rows = pg_num_rows($result);
echo "Number of users: " . $rows . ".\n";


?>  