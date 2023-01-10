<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../config/database.php";
include_once "../objects/task.php";

$database = new Database();
$db = $database->getConnection();

$task = new Task($db);

// получаем id задачи
$task_id = $_GET["id"];

$task->id = $task_id;

if ($task->delete()) {
    http_response_code(200);
    echo json_encode(array("message" => "Задача была удалена."), JSON_UNESCAPED_UNICODE);
} else {
    // 503 - Сервис не доступен
    http_response_code(503);
    echo json_encode(array("message" => "Не удалось удалить задачу."));
}
?>
