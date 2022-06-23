<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../config/database.php";
include_once "../objects/task_group.php";

$database = new Database();
$db = $database->getConnection();

$task_group = new TaskGroup($db);

// получаем id группы
$group_id = $_GET["id"];

$task_group->id = $group_id;

if ($task_group->delete()) {
    http_response_code(200);
    echo json_encode(array("message" => "Группа была удалена."), JSON_UNESCAPED_UNICODE);
} else {
    // 503 - Сервис недоступен
    http_response_code(503);
    echo json_encode(array("message" => "Не удалось удалить группу."));
}
?>
