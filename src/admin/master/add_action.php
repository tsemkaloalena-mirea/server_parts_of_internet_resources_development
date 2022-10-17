<html lang="en">
<head>
<title>Add master action</title>
</head>
<body>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/connect_db.php');
    $sql = "INSERT INTO masters (name, end_of_work_time) VALUES ";
    $sql = $sql . "( \"" . $_POST["name"] . "\", STR_TO_DATE(\"" . $_POST["end_of_work_time"] . "\", \"%Y-%m-%dT%H:%i\"));";
    $result = $mysqli->query($sql);
    if ($result === FALSE) {
        echo "Error in request";
        echo $sql;
    } else {
        echo "Master is successfully added.";
    }
    ?>
    <a href="/masters.php">Show masters</a>
</body>
</html>
