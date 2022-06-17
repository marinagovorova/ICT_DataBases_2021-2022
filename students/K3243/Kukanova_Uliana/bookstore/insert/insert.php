<!DOCTYPE html>
   <head>
<title>Insert data</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {listt-style: none;}
</style>
   </head>
   <body>
<h2>Enter information regarding category</h2>
<ul>
<form name="insert" action="insert.php" method="POST" >
<li>Category ID:</li><li><input type="text" name="category_id" /></li>
<li>Category:</li><li><input type="text" name="category" /></li>
<li><input type="submit" name="submit"/></li>
</form>
</ul>
</body>
</html>
<?php
$dbuser = 'postgres';
$dbpass = '20020905';
$host = 'localhost';
$dbname='bookstore';
$port = 5432;
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass port=$port");
if (isset($_POST['submit'])) {
		
	$query = "INSERT INTO bookstore.category VALUES ('$_POST[category_id]', '$_POST[category]')";
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
