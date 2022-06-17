<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../config/database.php";
include_once "../objects/user.php";

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$login = $_GET["login"];

if (empty($login)) {
    // 400 - неверный запрос
    http_response_code(400);
    echo json_encode(array("message" => "Невозможно найти пользователя. Не указан логин."), JSON_UNESCAPED_UNICODE);
}

$user->login = $login;

// запрашиваем пользователей
$stmt = $user->read();
$num = $stmt->rowCount();

// проверка, найдено ли больше 0 записей
if ($num>0) {

    // массив пользователей
    $users_arr = array();

    // получаем содержимое нашей таблицы
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        // извлекаем строку
        extract($row);
        
        $user_item = array(
            "id" => $id,
            "login" => $login,
            "password" => $password
        );

        array_push($users_arr, $user_item);
    }

    http_response_code(200);

    // выводим данные о пользователе в формате JSON
    echo json_encode($users_arr);
} else {
    http_response_code(200);
    echo "null";
}
?>
