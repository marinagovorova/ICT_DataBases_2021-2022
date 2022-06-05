<?php
  function enclude_in_quotes($s) {
    return "'$s'";
  }
  $dbuser = 'postgres';
  $dbpass = 'postgres';
  $host = 'localhost';
  $dbname='publisher';
  $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
  if (isset($_GET['table_name'])) {
    $table_name = $_GET['table_name'];
    if (isset($_POST['submit'])) {
      unset($_POST['submit']);
      $columns = implode(', ', array_keys($_POST));
      $values = implode(', ', array_map('enclude_in_quotes', array_values($_POST)));

      $stmt = $pdo->query("INSERT INTO it.$table_name ($columns) VALUES ($values)");
      $result = $stmt->fetch();
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Таблица <?php echo $table_name ?></title>
  </head>
  <body>
    <h1>Таблица <?php echo $table_name ?></h1>
    <h2>Просмотр данных:</h2>
    <?php
      $stmt = $pdo->query("SELECT COUNT(*) FROM it.$table_name");
      $page_count = ceil(($stmt->fetch())[0] / 10);
      echo "Всего страниц: $page_count";
    ?>
    <form name="open_page" method="GET" action="/mysite/view_page.php">
      <?php
        echo "Номер страницы: <input type='number' name='page_number' min='1' max='$page_count' value='1'>";
        echo "<input type='hidden' name='table_name' value='$table_name' />";
      ?>
      <input type="submit" name="submit" value="Перейти" />
    </form>
    <h2>Добавить запись:</h2>
    <form name="add_row" method="POST">
      <?php
        $stmt = $pdo->query("SELECT * FROM information_schema.columns WHERE table_schema='it' AND table_name='$table_name'");
        $columns = $stmt->fetchAll();
        foreach ($columns as $column) {
          $column_name = $column['column_name'];
          if ($column_name != 'id') {
            echo "$column_name: <input type='text' name='$column_name' /><br><br>";
          }
        }
      ?>
      <input type="submit" name="submit" />
    </form>
    <?php
      if (isset($values)) {
        if (!isset($result)) {
          echo "Возникла ошибка";
          var_dump($result);
        } else {
          echo "Успешно добавлено";
        }
      }
    ?>
    <br>
    <a href="/mysite">на главную</a>
  </body>
</html>
