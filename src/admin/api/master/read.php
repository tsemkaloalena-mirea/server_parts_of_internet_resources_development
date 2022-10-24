<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once($_SERVER['DOCUMENT_ROOT'] . '/connect_db.php');
include_once "../objects/master.php";

$db = $mysqli;

$master = new Master($db);

$stmt = $master->read();
$stmt->bind_result($id, $name, $end_of_work_time);
$found = FALSE;

$masters_arr = array();
$masters_arr["masters"] = array();
while($stmt->fetch()) {
    $found = TRUE;
    $master_item = array(
        "id" => $id,
        "name" => $name,
        "end_of_work_time" => $end_of_work_time);
    array_push($masters_arr["masters"], $master_item);
}
$stmt->close();
if ($found === TRUE) {
    http_response_code(200);
    echo json_encode($masters_arr);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "Masters are not found"), JSON_UNESCAPED_UNICODE);
}
?>