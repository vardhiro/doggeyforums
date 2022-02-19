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
        echo "<title>Category: $name | DoggeyForums</title>";
        echo"<div class='container'>";
        echo"<center>";
        echo "<h1>Category: $name</h1>";
        $s = "select * from posts where category = '$name'";
        $q = mysqli_query($conn,$s);
        echo"<ul>";
        while ($row = mysqli_fetch_array($q))
        {
            $title = $row['title'];
            $id = $row['id'];
            echo "<li><a href='view.php?id=$id'>$title</a></li>";
        }
        echo"</ul>";
        echo"</center>";
        echo "</div>";
    }
    ?>
</body>
</html>