<html lang="en">
<head>
<title>Delete master action</title>
</head>
<body>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/connect_db.php');
    $sql = "DELETE FROM masters WHERE id = " . $_GET["id"];
    $result = $mysqli->query($sql);
    if ($result === FALSE) {
        echo "Error in request";
        echo $sql;
    } else {
        echo "Master is successfully deleted.";
    }
    ?>
    <a href="/masters.php">Show masters</a>
</body>
</html>
