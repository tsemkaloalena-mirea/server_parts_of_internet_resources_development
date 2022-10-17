<html lang="en">
<head>
<title>Add order action</title>
</head>
<body>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/connect_db.php');
    $sql = "INSERT INTO orders (info, status, duration, cost, master_id, registration_time) VALUES ";
    $sql = $sql . "( \"" . $_POST["info"] . "\",\"" . $_POST["status"] . "\","  . $_POST["duration"] . "," . $_POST["cost"] . "," . $_POST["master_id"] . ",STR_TO_DATE(\"" . $_POST["registration_time"] . "\", \"%Y-%m-%dT%H:%i\"));";
    $result = $mysqli->query($sql);
    if ($result === FALSE) {
        echo "Error in request";
        echo $sql;
    } else {
        echo "An order is successfully created.";
    }
    ?>
    <a href="/orders.php">Show orders</a>
</body>
</html>
