<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "../config/database.php";
include_once "../objects/task_group.php";

$database = new Database();
$db = $database->getConnection();

$task_group = new TaskGroup($db);

// получаем id группы для редактирования
$data = json_decode(file_get_contents("php://input"));

// установим id свойства группы для редактирования
$task_group->id = $data->id;

// установим значения свойств группы
$task_group->name = $data->name;

if ($task_group->update()) {
    http_response_code(200);
    echo json_encode(array("message" => "Группа был обновлена."), JSON_UNESCAPED_UNICODE);
} else {
    // 503 - Сервис не доступен
    http_response_code(503);
    echo json_encode(array("message" => "Невозможно обновить группу."), JSON_UNESCAPED_UNICODE);
}
?>
