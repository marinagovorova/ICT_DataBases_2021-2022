<!DOCTYPE html>
   <head>
<title>Select data about ticket</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {listt-style: none;}
</style>
   </head>
   <body>
<h2>Get information regarding ticket</h2>
<ul>
<form name="select" action="select.php" method="POST" >
<li>Date:</li><li><input type="text" name="date" /></li>
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
    $stmt = $pdo->prepare("SELECT * FROM bus_terminal.ticket, bus_terminal.race
    WHERE bus_terminal.race.departure = (:date) and bus_terminal.ticket.race_number = bus_terminal.race.race_number");
    $stmt->bindValue(':date', $_POST["date"]);
    $stmt->execute();
    while ($row = $stmt->fetch())
    {
        echo 
        "Ticket ID: " . $row['ticket_number'] . "<br />" .
        "Race ID: " . $row['race_number'] . "<br />" .
        "Ticket Price: " . $row['ticket_price'] . "<br />" .
        "Passport Number: " . $row['passport_number'] . "<br />" .
        "Arrival Point: " . $row['arrival_point'] . "<br />" .
        "Departure Point: " . $row['departure_point'] . "<br><br>";
    }
    $pdo = null;
?> 


