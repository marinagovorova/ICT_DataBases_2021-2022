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

// получаем id задачи для редактирования
$data = json_decode(file_get_contents("php://input"));

// установим id свойства задачи для редактирования
$task->id = $data->id;

// установим значения свойств задачи
$task->name = $data->name;
$task->description = $data->description;
if ($data->is_completed) {
    $task->is_completed = 1;
} else {
    $task->is_completed = 0;
}

if ($task->update()) {
    http_response_code(200);
    echo json_encode(array("message" => "Задача был обновлена."), JSON_UNESCAPED_UNICODE);
} else {
    // 503 - Сервис не доступен
    http_response_code(503);
    echo json_encode(array("message" => "Невозможно обновить задачу."), JSON_UNESCAPED_UNICODE);
}
?>
