<!DOCTYPE html>
   <head>
<title>Select data about ticket</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {listt-style: none;}
</style>
   </head>
   <body>
<h2>Get information regarding author</h2>
<ul>
<form name="select" action="select.php" method="POST" >
<li>Id:</li><li><input type="text" name="author_id" /></li>
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
    $stmt = $pdo->prepare("SELECT * FROM bookstore.author
    WHERE bookstore.author.author_id = (:author_id)");
    $stmt->bindValue(':author_id', $_POST["author_id"]);
    $stmt->execute();
    while ($row = $stmt->fetch())
    {
        echo 
        "ID: " . $row['author_id'] . "<br />" .
        "Name: " . $row['name'] . "<br />" .
        "Surname: " . $row['surname'] . "<br />" .
        "Middle name: " . $row['middle_name'] . "<br />" .
        "email: " . $row['email'] . "<br><br>";
    }
    $pdo = null;
?> 


