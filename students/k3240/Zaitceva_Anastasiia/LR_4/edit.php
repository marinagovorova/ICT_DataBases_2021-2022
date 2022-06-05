<?php
  function enclude_in_quotes($s) {
    return "'$s'";
  }
  $dbuser = 'postgres';
  $dbpass = 'postgres';
  $host = 'localhost';
  $dbname='publisher';
  $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
  if (isset($_POST['table_name'])) {
    $table_name = $_POST['table_name'];
    if (isset($_POST['edit'])) {
      $id = $_POST['id'];
      $stmt = $pdo->query("SELECT * FROM it.$table_name WHERE id=$id");
      $row = $stmt->fetch();
    }
    if (isset($_POST['submit'])) {
      $table_name = $_POST['table_name'];
      $id = $_POST['id'];
      unset($_POST['submit']);
      unset($_POST['table_name']);
      unset($_POST['id']);
      $columns = implode(', ', array_keys($_POST));
      $values = implode(', ', array_map('enclude_in_quotes', array_values($_POST)));
      $query = "UPDATE it.$table_name SET ";
      foreach ($_POST as $key=>$value) {
        $query .= "$key='$value',";
      }
      $query = rtrim($query, ", ");
      $query .= " WHERE id=$id";
      $stmt = $pdo->query($query);
      $result = $stmt->fetch();
      $stmt = $pdo->query("SELECT * FROM it.$table_name WHERE id=$id");
      $row = $stmt->fetch();
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
    <h2>Редактирование данных:</h2>
    <form name="edit_row" method="POST">
      <?php
        $stmt = $pdo->query("SELECT * FROM information_schema.columns WHERE table_schema='it' AND table_name='$table_name'");
        $columns = $stmt->fetchAll();
        foreach ($columns as $column) {
          $column_name = $column['column_name'];
          if ($column_name != 'id') {
            $val = $row[$column_name];
            echo "$column_name: <input type='text' name='$column_name' value='$val' /><br><br>";
          }
        }
        echo <<<END
          <input type="hidden" name="table_name" value="$table_name">
          <input type="hidden" name="id" value="$id">
        END;
      ?>
      <input type="submit" name="submit" />
    </form>
    <?php
      if (isset($query)) {
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
