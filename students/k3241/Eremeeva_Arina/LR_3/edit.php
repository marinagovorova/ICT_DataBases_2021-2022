<?php
function connectionDb()
{
    $host = 'localhost';
    $user = 'postgres';
    $password = 'user123654';
    $dbName = 'postgres';
    $pdo = new PDO("pgsql:host=$host;dbname=$dbName", $user, $password);
    return $pdo;
}
session_start();

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <title>Редактирование статьи</title>
</head>
<body>
<h1>Редактирование статьи</h1>
<form method="post" action="edit.php">
    <div>
        <input id="id" name="id" type="number" placeholder="777">
        <label for="number">ID статьи</label>
    </div>
    <br>
    <div>
        <input id="submit" name="submit" type="submit" value="Поиск">
    </div>
</form>
<?php
if (isset($_POST['submit'])) {
    $pdo = connectionDb();
    $result = $pdo->query("SELECT * FROM public.articles where id = $_POST[id]");
    $article = $result->fetch();
    if (!$article) {
        echo '<br>' . "Статья не найдена";
    } else { ?>
        <br>
        <form method="post" action="edit.php">
            <div>
                <input id="name" name="name" type="text" value="<?= $article['name'] ?>">
                <label for="number">Автор</label>
            </div>
            <div>
                <input id="content" name="content" type="text" value="<?= $article['content'] ?>">
                <label for="number">Текст статьи</label>
            </div>
            <br>
            <div>
                <?php
                $_SESSION['id'] = $_POST['id'];
                ?>
                <input type='submit' name='edit' value="Изменить">
            </div>
        </form>
        <br>
        <form method="post" action="edit.php">
            <div>
                <?php
                $_SESSION['id'] = $_POST['id'];
                ?>
                <input type='submit' name='delete' value="Удалить">
            </div>
        </form>
        <?php
    }

}
if (isset($_POST['edit'])) {
    $pdo = connectionDb();
if (!empty($_POST['name']) && !empty($_POST['content'])) {
    $result = $pdo->query("UPDATE public.articles SET name='$_POST[name]', content='$_POST[content]'  where id = '$_SESSION[id]'");
    ?>
    <br>
    <?= $result->execute() ? "Статья успешно отредактрована" : "Ошибка при обновлении статьи" ?>
    <?php
    } else ?>  <?= '<br>'."Заполнены не все данные" ?>
    <?php
    $_SESSION = array();
    session_destroy();
}
if (isset($_POST['delete'])) {
    $pdo = connectionDb();
    $result = $pdo->query("DELETE FROM public.articles where id = '$_SESSION[id]'");
    if (isset($result)) {
        ?>
        <br>
        <?= $result->execute() ? "Статья успешно удалена" : "Ошибка при удалении статьи" ?>
        <?php
    }
    $_SESSION = array();
    session_destroy();
}
?>
<form action="index.php">
    <br>
    <div>
        <button type="submit">
            Назад
        </button>
    </div>
</form>
</body>


