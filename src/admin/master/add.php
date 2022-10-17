<html lang="en">
<head>
<title>Add master</title>
</head>
<body>
    <form action="add_action.php" method="POST">
        <label for="name">Master's name:</label><br>
        <input type="text" id="name" name="name" value=""><br>
        <label for="end_of_work_time">End of work time:</label><br>
        <input type="datetime-local" id="end_of_work_time" name="end_of_work_time" value=""><br>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>