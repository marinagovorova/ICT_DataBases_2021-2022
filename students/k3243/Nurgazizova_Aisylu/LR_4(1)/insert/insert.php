<!DOCTYPE html>
   <head>
<title>Insert data to bus_terminal</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {listt-style: none;}
</style>
   </head>
   <body>
<h2>Enter information regarding bus</h2>
<ul>
<form name="insert" action="insert.php" method="POST" >
<li>Bus ID:</li><li><input type="text" name="bus" /></li>
<li>Bus Model:</li><li><input type="text" name="model" /></li>
<li>State Number:</li><li><input type="text" name="state_number" /></li>
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
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass port=$port");
if (isset($_POST['submit'])) {
		
	$query = "INSERT INTO bus_terminal.bus VALUES ('$_POST[bus]', '$_POST[model]', '$_POST[state_number]')";
	$result = pg_query($query);
	pg_close($db); 
	if (!$result)
	{
		echo "Update failed!!";
	} else
		{
			echo "Update successfull;";
		}
	}
?> 
