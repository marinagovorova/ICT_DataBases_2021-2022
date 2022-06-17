<!DOCTYPE html>
   <head>
<title>Update data</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {listt-style: none;}
</style>
   </head>
   <body>
<h2>Update information regarding edition</h2>
<ul>
<form name="update" action="update.php" method="POST" >
<li>Edition:</li><li><input type="text" name="edition" /></li>
<li>price:</li><li><input type="text" name="price" /></li>
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
$pdo = new PDO("pgsql:host=$host;dbname=$dbname;port=$port", $dbuser, $dbpass);
$stmt = $pdo->prepare("UPDATE bookstore.edition SET price = (:price) WHERE bookstore.edition.edition = (:edition)");
$stmt->bindParam(':edition', $_POST["edition"]);
$stmt->bindParam(':price', $_POST["price"]);
$stmt->execute();

    echo "Information updated successfully";
    
    $pdo = null;
