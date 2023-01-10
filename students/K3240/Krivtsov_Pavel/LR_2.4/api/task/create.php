<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once "../config/database.php";
include_once "../objects/task.php";

$database = new Database();
$db = $database->getConnection();

$task = new Task($db);
 
// получаем отправленные данные
$data = json_decode(file_get_contents("php://input"));
 
// убеждаемся, что данные не пусты
if (
    !empty($data->name) &&
    !empty($data->task_group_id)
) {

    // устанавливаем значения свойств задачи
    $task->name = $data->name;
    $task->description = $data->description;
    if ($data->is_completed) {
        $task->is_completed = 1;
    } else {
        $task->is_completed = 0;
    }
    $task->task_group_id = $data->task_group_id;

    // создание задачи
    if ($task->create()){
        http_response_code(201);
        echo json_encode(array("message" => "Задача была создана."), JSON_UNESCAPED_UNICODE);
    } else {
        // 503 - сервис недоступен
        http_response_code(503);
        echo json_encode(array("message" => "Невозможно создать задачу."), JSON_UNESCAPED_UNICODE);
    }
}

// сообщим пользователю что данные неполные
else {

    // 400 - неверный запрос
    http_response_code(400);
    echo json_encode(array("message" => "Невозможно создать задачу. Данные неполные."), JSON_UNESCAPED_UNICODE);
}
?>
