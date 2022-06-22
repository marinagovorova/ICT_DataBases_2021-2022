<!DOCTYPE html>
   <head>
<title>Delete data</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {listt-style: none;}
</style>
   </head>
   <body>
<h2>Delete information regarding bus</h2>
<ul>
<form name="delete" action="delete.php" method="POST" >
<li>Bus ID:</li><li><input type="text" name="bus" /></li>
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
    $stmt = $pdo->prepare("DELETE FROM bus_terminal.bus
    WHERE bus_terminal.bus.bus = (:bus)");
    $stmt->bindParam(':bus', $_POST["bus"]);
    $stmt->execute();

    echo "Information deleted successfully";
    
    $pdo = null;
    

?>

