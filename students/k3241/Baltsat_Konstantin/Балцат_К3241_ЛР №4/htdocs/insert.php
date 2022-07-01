<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'Podo';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query = "INSERT INTO "Podo"."User"("User_id", "Weights") VALUES ('$_POST[Name]', DEFAULT)";
$result = pg_query($query);

echo "<script>
        alert('Успешно добавлено!');
        window.history.go(-1);
    </script>";
    
?>