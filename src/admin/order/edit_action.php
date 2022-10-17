<html lang="en">
<head>
<title>Add order action</title>
</head>
<body>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/connect_db.php');
    $sql = "UPDATE orders SET info=\"{$_POST["info"]}\", status=\"{$_POST["status"]}\", duration={$_POST["duration"]}, cost={$_POST["cost"]}, master_id={$_POST["master_id"]}, registration_time=STR_TO_DATE(\"" . $_POST["registration_time"] . "\", \"%Y-%m-%dT%H:%i\") WHERE id={$_POST["id"]}";
    $result = $mysqli->query($sql);
    if ($result === FALSE) {
        echo "Error in request";
        echo $sql;
    } else {
        echo "An order is successfully edited.";
    }
    ?>
    <a href="/orders.php">Show orders</a>
</body>
</html>
