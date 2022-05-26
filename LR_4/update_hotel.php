<?php
$dbuser = 'postgres';
$dbpass = 'k9413315K';
$host = 'localhost';
$dbname='postgres';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query3 = "UPDATE hotel SET adress = '$_POST[adress1]'
            WHERE id_hotel = '$_POST[hotel_id]'";
$result = pg_query($query3);

echo "<script>
        alert('Успешно добавлено!');
        window.history.go(-1);
    </script>";
?>

