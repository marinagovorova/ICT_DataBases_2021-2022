<?php
session_start();
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <title>Благодарность.</title>
</head>
<body>
<h1>
    Спасибо за просмотр, <?= $_SESSION['name'] ?>
</h1>
<form action="41page1.php">
    <?php
    $_SESSION = array();
    session_destroy();
    ?>
    <div>
        <button type="submit">
           Назад
        </button>
    </div>
</form
</body>

