<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once "../config/database.php";
include_once "../objects/user.php";

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
 
// получаем отправленные данные
$data = json_decode(file_get_contents("php://input"));
 
// убеждаемся, что данные не пусты
if (
    !empty($data->login) &&
    !empty($data->password)
) {
    // устанавливаем значения свойств группы
    $user->login = $data->login;
    $user->password = $data->password;

    // создание группы
    if($user->create()){
        http_response_code(201);
        echo json_encode(array("message" => "Пользователь был создан."), JSON_UNESCAPED_UNICODE);
    } else {
        // 503 - сервис недоступен
        http_response_code(503);
        echo json_encode(array("message" => "Невозможно создать пользователя."), JSON_UNESCAPED_UNICODE);
    }
}

// сообщим пользователю что данные неполные
else {

    // 400 - неверный запрос
    http_response_code(400);
    echo json_encode(array("message" => "Невозможно создать пользователя. Данные неполные."), JSON_UNESCAPED_UNICODE);
}
?>
