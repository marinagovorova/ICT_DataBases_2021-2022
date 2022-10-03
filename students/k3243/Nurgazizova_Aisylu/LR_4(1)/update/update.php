<!DOCTYPE html>
   <head>
<title>Update data</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {listt-style: none;}
</style>
   </head>
   <body>
<h2>Update information regarding driver</h2>
<ul>
<form name="update" action="update.php" method="POST" >
<li>Driver ID:</li><li><input type="text" name="driver_number" /></li>
<li>Work experience:</li><li><input type="text" name="work_exp" /></li>
<li><input type="submit" name="submit"/></li>
</form>
</ul>
</body>
</html>
<?php
$dbuser = 'postgres';
$dbpass = '156rtgf478';
$host = 'localhost';
$dbname='bus_terminal';
$port = 5433;
$pdo = new PDO("pgsql:host=$host;dbname=$dbname;port=$port", $dbuser, $dbpass);
$stmt = $pdo->prepare("UPDATE bus_terminal.driver SET work_exp = (:work_exp) WHERE bus_terminal.driver.driver_number = (:driver_number)");
$stmt->bindParam(':driver_number', $_POST["driver_number"]);
$stmt->bindParam(':work_exp', $_POST["work_exp"]);
$stmt->execute();

    echo "Information updated successfully";
    
    $pdo = null;
