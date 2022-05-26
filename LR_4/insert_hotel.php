<?php
$dbuser = 'postgres';
$dbpass = 'k9413315K';
$host = 'localhost';
$dbname='postgres';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query1 = "INSERT INTO hotel(name, adress, city) VALUES('$_POST[name1]', '$_POST[adress]', '$_POST[city]')";
$result = pg_query($query1);

echo "<script>
        alert('Успешно добавлено!');
        window.history.go(-1);
    </script>";
?>