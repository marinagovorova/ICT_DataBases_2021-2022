<?php
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname = 'Podo';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$query3 = "UPDATE "Podo"."Work_session" SET "Data" = '$_POST[data_for_update]'
            WHERE "Work_session_id" = '$_POST[work_session_id]'";
$result = pg_query($query3);

echo "<script>
        alert('Successfully updated!');
        window.history.go(-1);
    </script>";
?>