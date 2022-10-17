<html lang="en">
<head>
<title>Add order</title>
</head>
<body>
    <form action="add_action.php" method="POST">
        <label for="info">Order info:</label><br>
        <input type="text" id="info" name="info" value=""><br>
        <label for="status">Status:</label><br>
        <input type="text" id="status" name="status" value=""><br>
        <label for="duration">Repair duration:</label><br>
        <input type="number" id="duration" name="duration" value=""><br>
        <label for="cost">Cost:</label><br>
        <input type="number" id="cost" name="cost" value=""><br>
        <label for="master_id">Master id:</label><br>
        <input type="number" id="master_id" name="master_id" value=""><br>
        <label for="registration_time">Registration time:</label><br>
        <input type="datetime-local" id="registration_time" name="registration_time" value=""><br>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>