<html lang="en">
<head>
<title>Add master action</title>
</head>
<body>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/connect_db.php');
    $sql = "UPDATE masters SET name=\"{$_POST["name"]}\", end_of_work_time=STR_TO_DATE(\"" . $_POST["end_of_work_time"] . "\", \"%Y-%m-%dT%H:%i\") WHERE id={$_POST["id"]}";
    $result = $mysqli->query($sql);
    if ($result === FALSE) {
        echo "Error in request";
        echo $sql;
    } else {
        echo "Master info is successfully edited.";
    }
    ?>
    <a href="/masters.php">Show masters</a>
</body>
</html>
