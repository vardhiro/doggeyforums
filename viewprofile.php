<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
    require_once "includes/navbar.php";
    require_once "includes/connection.php";
    if (isset($_GET['name']))
    {
        $name = $_GET['name'];
        echo"<h2>Details about $name</h2>";
        $s = "select * from users where username = '$name'";
        $q = mysqli_query($conn,$s);
        while ($row = mysqli_fetch_array($q)) {
                   echo "Name: ".$row['name']."<br>";
                   echo "Username: ".$row['username']."<br>";
                   echo "Bio: ".$row['bio']."<br>";
                   echo "Joined on: ".date('d/M/y',$row['doj'])."<br>";
        }
        echo"</center>";
        echo "</div>";
    }
    ?>
</body>
</html>