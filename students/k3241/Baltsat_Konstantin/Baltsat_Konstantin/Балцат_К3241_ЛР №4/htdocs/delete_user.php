<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'Podo';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query2 = "DELETE FROM "Podo"."User" WHERE "User_id" = '$_POST[user_nickname_for_deletion]'";
$result = pg_query($query2);

echo "<script>
        alert('Successfully deleted!');
        window.history.go(-1);
    </script>";
?>