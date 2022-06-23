<?php
$dbuser = 'postgres';
$dbpass = 'k9413315K';
$host = 'localhost';
$dbname='postgres';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query2 = "DELETE FROM hotel WHERE name = '$_POST[name2]'";
$result = pg_query($query2);

echo "<script>
        alert('Удалено!');
        window.history.go(-1);
    </script>";
?>

