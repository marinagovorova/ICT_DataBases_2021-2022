<?php
  $dbuser = 'postgres';
  $dbpass = 'postgres';
  $host = 'localhost';
  $dbname='publisher';
  $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
  $stmt = $pdo->query("SELECT table_name FROM information_schema.tables WHERE table_schema='it' AND table_type='BASE TABLE'");
  $tables = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Лабораторная работа №4 - Анастасия Зайцева K3240</title>
  </head>
  <body>
    <h1>База данных publisher</h1>
    <h2>Список таблиц:</h2>
    <ol>
      <?php
        foreach ($tables as $row) {
          $table_name = $row['table_name'];
          echo "<li><a href='table.php?table_name=$table_name'>$table_name</a></li>";
        }
      ?>
    </ol>
  </body>
</html>
