<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <title>Поиск статьи</title>
</head>
<body>
<h1>Поиск статьи</h1>
<form method="post" action="show.php">
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
    $host = 'localhost';
    $user = 'postgres';
    $password = 'user123654';
    $dbName = 'postgres';
    $pdo = new PDO("pgsql:host=$host;dbname=$dbName", $user, $password);
    $result = $pdo->query("SELECT * FROM public.articles where id = $_POST[id]");
    $article = $result->fetch();
    ?>
    <br>
    <?= !$article ? "Статья не найдена"
        : "Автор: " . $article['name'] . '<br>' . "Текст статьи: " . $article['content'] ?>
    <?php
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


