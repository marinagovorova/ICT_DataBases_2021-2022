<?php
  $dbuser = 'postgres';
  $dbpass = 'postgres';
  $host = 'localhost';
  $dbname='publisher';
  $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
  if (isset($_GET['table_name'])) {
    $table_name = $_GET['table_name'];
    $page_number = $_GET['page_number'];
  }
  if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $stmt = $pdo->query("DELETE FROM it.$table_name WHERE id=$id");
    $result = $stmt->fetch();
  }
  $stmt = $pdo->query("SELECT * FROM it.$table_name LIMIT 10 OFFSET " . (($page_number - 1) * 10));
  $rows = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Таблица <?php echo $table_name ?> страница <?php echo $page_number ?></title>
  </head>
  <body>
    <h1>Таблица <?php echo $table_name ?> страница <?php echo $page_number ?></h1>
    <table>
      <thead>
        <tr>
          <?php
            $stmt = $pdo->query("SELECT * FROM information_schema.columns WHERE table_schema='it' AND table_name='$table_name'");
            $columns = $stmt->fetchAll();
            foreach ($columns as $column) {
              echo "<th>" . $column['column_name'] . "</th>";
            }
          ?>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($rows as $row) {
            echo "<tr>";
            foreach ($columns as $column) {
              echo "<td>" . $row[$column['column_name']] . "</td>";
            }
            $id = $row['id'];
            echo <<<END
              <td>
                <form method="POST">
                  <input type="hidden" name="id" value="$id">
                  <input type="submit" name="delete" value="удалить">
                </form>
              </td>
            END;
            echo <<<END
              <td>
                <form method="POST" action="/mysite/edit.php">
                  <input type="hidden" name="table_name" value="$table_name">
                  <input type="hidden" name="id" value="$id">
                  <input type="submit" name="edit" value="изменить">
                </form>
              </td>
            END;
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
    <a href="<?php echo "/mysite/table.php?table_name=$table_name"?>">назад</a>
  </body>
</html>
