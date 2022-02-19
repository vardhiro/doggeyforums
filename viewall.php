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
    if(isset($_SESSION['user']) && isset($_SESSION['pass']))
    $user = $_SESSION['user'];
    $s = "SELECT * FROM posts WHERE creator = '$user'";
    $q = mysqli_query($conn, $s);
    $s2 = "SELECT * FROM replies WHERE creator = '$user'";
    $q2 = mysqli_query($conn, $s2);
    echo "<ul>";
    echo "<h2>Your all posts</h2>";
    while ($row = mysqli_fetch_array($q)) {
        $id = $row['id'];
        $title = $row['title'];
        echo "<li><a href='view.php?id=$id'>$title</a></li>";
    }
    echo "</ul>";
    echo "<ul>";
    echo "<h2>Your all replies</h2>";
    while ($row = mysqli_fetch_array($q2)) {
        $id = $row['id'];
        $unid = $row['unid'];
        $time = date('d/M/y h:i:s', $row['doc']);
        echo "<li><a href='view.php?id=$id#$unid'>Your reply at $time</a></li>";
    }
    echo "</ul>";
    ?>
</body>
</html>