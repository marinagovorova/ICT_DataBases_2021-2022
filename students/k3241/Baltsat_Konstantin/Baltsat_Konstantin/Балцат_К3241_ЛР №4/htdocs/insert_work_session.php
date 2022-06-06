<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'Podo';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query1 = "INSERT INTO "Podo"."Work_session" ("Work_session_id", "User_id", "Data") VALUES('$_POST[work_session_id]', '$_POST[user_id]', '$_POST[data]')";
$result = pg_query($query1);

echo "<script>
        alert('Successfully inserted!');
        window.history.go(-1);
    </script>";
?>