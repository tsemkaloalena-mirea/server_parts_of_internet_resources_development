<html lang="en">
<head>
<title>Delete order action</title>
</head>
<body>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/connect_db.php');
    $sql = "DELETE FROM orders WHERE id = " . $_GET["id"];
    $result = $mysqli->query($sql);
    if ($result === FALSE) {
        echo "Error in request";
        echo $sql;
    } else {
        echo "An order is successfully deleted.";
    }
    ?>
    <a href="/orders.php">Show orders</a>
</body>
</html>
