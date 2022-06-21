<!DOCTYPE html>
   <head>
<title>Delete data</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {listt-style: none;}
</style>
   </head>
   <body>
<h2>Delete information regarding category</h2>
<ul>
<form name="delete" action="delete.php" method="POST" >
<li>Category ID:</li><li><input type="text" name="category_id" /></li>
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
    $stmt = $pdo->prepare("DELETE FROM bookstore.category
    WHERE bookstore.category.category_id = (:category_id)");
    $stmt->bindParam(':category_id', $_POST["category_id"]);
    $stmt->execute();

    echo "Information deleted successfully";
    
    $pdo = null;
    

?>

