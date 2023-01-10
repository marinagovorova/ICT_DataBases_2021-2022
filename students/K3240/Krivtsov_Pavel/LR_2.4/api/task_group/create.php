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
 
// получаем отправленные данные
$data = json_decode(file_get_contents("php://input"));
 
// убеждаемся, что данные не пусты
if (
    !empty($data->name) &&
    !empty($data->user_id)
) {

    // устанавливаем значения свойств группы
    $task_group->name = $data->name;
    $task_group->user_id = $data->user_id;

    // создание группы
    if($task_group->create()){
        http_response_code(201);
        echo json_encode(array("message" => "Группа была создана."), JSON_UNESCAPED_UNICODE);
    } else {
        // 503 - сервис недоступен
        http_response_code(503);
        echo json_encode(array("message" => "Невозможно создать группу."), JSON_UNESCAPED_UNICODE);
    }
}

// сообщим пользователю что данные неполные
else {

    // 400 - неверный запрос
    http_response_code(400);
    echo json_encode(array("message" => "Невозможно создать группу. Данные неполные."), JSON_UNESCAPED_UNICODE);
}
?>
