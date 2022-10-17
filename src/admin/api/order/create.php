<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once($_SERVER['DOCUMENT_ROOT'] . '/connect_db.php');
include_once "../objects/order.php";

$db = $mysqli;
$order = new Order($db);
$data = json_decode(file_get_contents("php://input"));

if (
    !empty($data->info) &&
    !empty($data->status) &&
    !empty($data->duration) &&
    !empty($data->cost) &&
    !empty($data->master_id) &&
    !empty($data->registration_time)
) {
    $order->info = $data->info;
    $order->status = $data->status;
    $order->duration = $data->duration;
    $order->cost = $data->cost;
    $order->master_id = $data->master_id;
    $order->registration_time = $data->registration_time;

    if ($order->create()) {
        http_response_code(201);
        echo json_encode(array("message" => "The order is created"), JSON_UNESCAPED_UNICODE);
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Can not create an order"), JSON_UNESCAPED_UNICODE);
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Can not create this order. Some data is not filled."), JSON_UNESCAPED_UNICODE);
}
?>