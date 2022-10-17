<html lang="en">
<head>
<title>Orders</title>
    <!-- <link rel="stylesheet" href="style.css" type="text/css"/> -->
</head>
<body>
    <table>
        <tr><th>id</th><th>info</th><th>status</th><th>duration</th><th>cost</th><th>master id</th><th>registration time</th></tr>
        <?php
        include($_SERVER['DOCUMENT_ROOT'] . '/connect_db.php');
        $result = $mysqli->query("SELECT * FROM orders");
        foreach ($result as $row){
    	    echo "<tr><td>{$row['id']}</td><td>{$row['info']}</td><td>{$row['status']}</td><td>{$row['duration']}</td><td>{$row['cost']}</td><td>{$row['master_id']}</td><td>{$row['registration_time']}</td></tr>";
        }
        ?>
    </table>
</body>
</html>
