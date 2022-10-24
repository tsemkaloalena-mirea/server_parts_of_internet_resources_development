<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once($_SERVER['DOCUMENT_ROOT'] . '/connect_db.php');
include_once "../objects/master.php";

$db = $mysqli;
$master = new Master($db);
$data = json_decode(file_get_contents("php://input"));

if (
    !empty($data->name) &&
    !empty($data->end_of_work_time)
) {
    $master->name = $data->name;
    $master->end_of_work_time = $data->end_of_work_time;

    if ($master->create()) {
        http_response_code(201);
        echo json_encode(array("message" => "The master is created"), JSON_UNESCAPED_UNICODE);
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Can not create a master"), JSON_UNESCAPED_UNICODE);
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Can not create this master. Some data is not filled."), JSON_UNESCAPED_UNICODE);
}
?>