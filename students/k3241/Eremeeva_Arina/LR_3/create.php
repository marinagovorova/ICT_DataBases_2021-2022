<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <title>Добавление новой статьи</title>
</head>
<body>
<h1>Создание статьи</h1>
<form method="post" action="create.php">
    <div>
        <input id="name" name="name" type="text" placeholder="Ира">
        <label for="number">Автор</label>
    </div>
    <div>
        <input id="content" name="content" type="text" placeholder="Статья о спорте">
        <label for="number">Текст статьи</label>
    </div>
    <br>
    <div>
        <input id="submit" name="submit" type="submit" value="Добавить">
    </div>
</form>
<?php
if (isset($_POST['submit'])) {
    $host = 'localhost';
    $user = 'postgres';
    $password = 'user123654';
    $dbName = 'postgres';
    $pdo = new PDO("pgsql:host=$host;dbname=$dbName", $user, $password);
    if (!empty($_POST['name']) && !empty($_POST['content'])) {
        $result = $pdo->query("INSERT INTO public.articles(name,content) VALUES ('$_POST[name]','$_POST[content]')");
        ?>
        <br>
        <?= $result->execute() ? "Статья успешно добавлена" : "Ошибка при добавлении статьи" ?>
        <?php
    } else ?>  <?= '<br>'."Заполнены не все данные" ?>
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


