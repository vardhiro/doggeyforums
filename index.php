<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=, initial-scale=1.0" />
    <title>Home | DoggeyForums</title>
  </head>
  <body>
    <?php require_once "includes/navbar.php"; ?>
    <div class="container">
      <center>
        <h1 align="center">Welcome to doggeyforums, <?php echo (isset($_SESSION['user'])) ? $_SESSION['user'] : "newbie"?>!</h1><br>
        <?php
        if(isset($_SESSION['user']))
        {
          echo "<h3><a href='addpost.php'>Add a post</a></h3>";
          echo "<h3><a href='viewall.php'>View all posts and replies</a></h3>";
        }
        ?>
        <h2>Most trending posts</h2>
        <?php
        require_once "includes/trend.php";
        ?>
      </center>
    </div>
  </body>
</html>
