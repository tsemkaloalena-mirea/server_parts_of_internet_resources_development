<html lang="en">
<head>
<title>Orders</title>
    <!-- <link rel="stylesheet" href="style.css" type="text/css"/> -->
</head>
<body>
    <table>
        <tr><th>id</th><th>name</th><th>end_of_work_time</th></tr>
        <?php
        include($_SERVER['DOCUMENT_ROOT'] . '/connect_db.php');
        $result = $mysqli->query("SELECT * FROM masters");
        foreach ($result as $row){
    	    echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['end_of_work_time']}</td></tr>";
        }
        ?>
    </table>
</body>
</html>
