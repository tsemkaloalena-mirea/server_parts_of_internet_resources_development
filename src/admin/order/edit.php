<html lang="en">
<head>
<title>Edit order</title>
</head>
<body>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/connect_db.php');
    $result = $mysqli->query("SELECT * FROM orders WHERE id={$_POST['id']}");
    foreach ($result as $row) { ?>
        <form action="edit_action.php" method="POST">
            <label for="id">Order id:</label><br>
            <input type="number" id="id" name="id" value="<?php echo $row['id']?>"><br>
            <label for="info">Order info:</label><br>
            <input type="text" id="info" name="info" value="<?php echo $row['info']?>"><br>
            <label for="status">Status:</label><br>
            <input type="text" id="status" name="status" value="<?php echo $row['status']?>"><br>
            <label for="duration">Repair duration:</label><br>
            <input type="number" id="duration" name="duration" value="<?php echo $row['duration']?>"><br>
            <label for="cost">Cost:</label><br>
            <input type="number" id="cost" name="cost" value="<?php echo $row['cost']?>"><br>
            <label for="master_id">Master id:</label><br>
            <input type="number" id="master_id" name="master_id" value="<?php echo $row['master_id']?>"><br>
            <label for="registration_time">Registration time:</label><br>
            <input type="datetime-local" id="registration_time" name="registration_time" value="<?php echo $row['registration_time'] ?>"><br>
            <br>
            <input type="submit" value="Submit">
        </form>
    <?php
    }
    ?>
</body>
</html>