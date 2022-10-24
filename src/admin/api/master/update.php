<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once($_SERVER['DOCUMENT_ROOT'] . '/connect_db.php');
include_once "../objects/master.php";

$db = $mysqli;
$master = new Master($db);

$data = json_decode(file_get_contents("php://input"));

$master->id = $data->id;
$master->name = $data->name;
$master->end_of_work_time = $data->end_of_work_time;

if ($master->update()) {
    http_response_code(200);
    echo json_encode(array("message" => "The master is updated"), JSON_UNESCAPED_UNICODE);
} else {
    http_response_code(503);
    echo json_encode(array("message" => "The master can not be updated"), JSON_UNESCAPED_UNICODE);
}
?>