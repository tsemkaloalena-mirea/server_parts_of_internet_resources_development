<html lang="en">
<head>
<title>Edit master info</title>
</head>
<body>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/connect_db.php');
    $result = $mysqli->query("SELECT * FROM masters WHERE id={$_POST['id']}");
    foreach ($result as $row) { ?>
        <form action="edit_action.php" method="POST">
            <label for="id">Master id:</label><br>
            <input type="number" id="id" name="id" value="<?php echo $row['id']?>"><br>
            <label for="name">Master's name:</label><br>
            <input type="text" id="name" name="name" value="<?php echo $row['name']?>"><br>
            <label for="end_of_work_time">End of work time:</label><br>
            <input type="datetime-local" id="end_of_work_time" name="end_of_work_time" value="<?php echo $row['end_of_work_time']?>"><br>
            <br>
            <input type="submit" value="Submit">
        </form>
    <?php
    }
    ?>
</body>
</html>