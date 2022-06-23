<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../config/database.php";
include_once "../objects/task.php";

$database = new Database();
$db = $database->getConnection();

$task = new Task($db);

$group_id = $_GET["groupId"];

if (empty($group_id)) {
    // 400 - неверный запрос
    http_response_code(400);
    echo json_encode(array("message" => "Невозможно найти задачи. Не указан идентификатор группы."), JSON_UNESCAPED_UNICODE);
}

$task->task_group_id = $group_id;

// запрашиваем задачи
$stmt = $task->read();
$num = $stmt->rowCount();

// проверка, найдено ли больше 0 записей
if ($num>0) {

    // массив задач
    $tasks_arr = array();

    // получаем содержимое нашей таблицы
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        // извлекаем строку
        extract($row);
        
        if ($is_completed == 0) {
            $is_completed_bool = False;
        } else {
            $is_completed_bool = True;
        }

        $task_item = array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description),
            "is_completed" => $is_completed_bool,
            "task_group_id" => $task_group_id,
            "task_group_name" => $task_group_name
        );

        array_push($tasks_arr, $task_item);
    }

    http_response_code(200);

    // выводим данные о товаре в формате JSON
    echo json_encode($tasks_arr);
} else {
    http_response_code(404);

    echo json_encode(array("message" => "Задачи не найдены."), JSON_UNESCAPED_UNICODE);
}
?>
