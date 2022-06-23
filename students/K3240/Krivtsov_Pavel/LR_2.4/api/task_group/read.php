<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../config/database.php";
include_once "../objects/task_group.php";

$database = new Database();
$db = $database->getConnection();

$task_group = new TaskGroup($db);

$user_id = $_GET["userId"];

if (empty($user_id)) {
    // 400 - неверный запрос
    http_response_code(400);
    echo json_encode(array("message" => "Невозможно найти группы. Не указан идентификатор пользователя."), JSON_UNESCAPED_UNICODE);
}

$task_group->user_id = $user_id;

// запрашиваем группы
$stmt = $task_group->read();
$num = $stmt->rowCount();

// проверка, найдено ли больше 0 записей
if ($num>0) {

    // массив групп
    $groups_arr = array();

    // получаем содержимое нашей таблицы
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        // извлекаем строку
        extract($row);

        $group_item = array(
            "id" => $id,
            "name" => $name,
            "user_id" => $user_id
        );

        array_push($groups_arr, $group_item);
    }

    http_response_code(200);

    // выводим данные о группе в формате JSON
    echo json_encode($groups_arr);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "Группы не найдены."), JSON_UNESCAPED_UNICODE);
}
?>
