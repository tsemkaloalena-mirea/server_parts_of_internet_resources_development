<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once($_SERVER['DOCUMENT_ROOT'] . '/connect_db.php');
include_once "../objects/order.php";

$db = $mysqli;
$order = new Order($db);
$stmt = $order->read();
$stmt->bind_result($id, $info, $status, $duration, $cost, $master_id, $registration_time);
$found = FALSE;
$orders_arr = array();
$orders_arr["orders"] = array();
while($stmt->fetch()) {
    $found = TRUE;
    $order_item = array(
        "id" => $id,
        "info" => $info,
        "status" => $status,
        "duration" => $duration,
        "cost" => $cost,
        "master_id" => $master_id,
        "registration_time" => $registration_time);
    array_push($orders_arr["orders"], $order_item);
}
$stmt->close();
if ($found === TRUE) {
    http_response_code(200);
    echo json_encode($orders_arr);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "Orders are not found"), JSON_UNESCAPED_UNICODE);
}
?>