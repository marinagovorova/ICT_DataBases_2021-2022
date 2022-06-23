<?php
$dbuser = 'postgres';
$dbpass = 'k9413315K';
$host = 'localhost';
$dbname='postgres';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query = "INSERT INTO city(name) VALUES('$_POST[Name]')";
$result = pg_query($query);

echo "<script>
        alert('Успешно добавлено!');
        window.history.go(-1);
    </script>";


?>