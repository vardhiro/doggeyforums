<?php
session_start();
require_once "includes/connection.php";
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
        <?php
        $id = $_GET['id'];
        $s = "SELECT * FROM posts WHERE id = $id";
        $views = 0;
        $q = mysqli_query($conn,$s);
        while ($row = mysqli_fetch_array($q)) {
            $views = $row['views'];
            ?>
            <div id='main'>
            <h4><?php echo $row['title'] ?></h4>
            <p style='font-size:1.2rem;'><?php echo $row['body']; ?></p>
            <em>-asked by <a href='viewprofile.php?name=<?php echo $row['creator']; ?>'><?php echo $row['creator']; ?></a> on <?php echo date('d/M/y', $row['doc']); ?></em>
            <br><em>Viewed <?php echo $views; ?> times</em><br><?php if(isset($_SESSION['user'])&&$_SESSION['pass']){?><a href="reply.php?id=<?php echo $row['id']; ?>&replyto=main">Reply</a><?php if(trim($_SESSION['user']) == trim($row['creator'])){
              ?>
              <a href='delete.php?id=<?php echo $id ?>&creator=<?php echo $row['creator']; ?>'>Delete</a>
              <?php
            }
            }
           ?>
            </div>
            <hr style='border-top: 5px solid #8c8b8b;'>
            <?php   
        }
        ?>
        <h4>The answers:</h4>
        <?php
        $s = "SELECT * FROM replies WHERE id = '$id' ORDER BY doc ASC   ";
        $q = mysqli_query($conn,$s);
        while ($row = mysqli_fetch_array($q)) {
            ?>
            <div id='<?php echo $row['unid']; ?>'>
            <em>reply to <a href="#<?php echo $row['replyto']; ?>"><?php echo ($row['replyto'] == 'main') ?'main' :explode('-',$row['replyto'])[0] ;?></a></em>
            <p style='font-size:1.2rem;'><?php echo $row['body']; ?></p>
            <em>-answred by <a href='viewprofile.php?name=<?php echo $row['creator']; ?>'><?php echo $row['creator']; ?></a> on <?php echo date('d/M/y', $row['doc']); ?></em>
            <br><?php if(isset($_SESSION['user'])&&$_SESSION['pass']){?><a href="reply.php?id=<?php echo $row['id']; ?>&replyto=<?php echo $row['unid']; ?>">Reply</a><?php
            if(trim($_SESSION['user']) == trim($row['creator'])){
              ?>
              <a href='delete.php?id=<?php echo $id ?>&unid=<?php echo $row['unid']; ?>'>Delete</a>
              <?php
            } 
            }
           ?>
          </div><br><br>
            <?php   
        }
        $views++;
        $q = mysqli_query($conn, "UPDATE `posts` SET `views` = '$views' WHERE `posts`.`id` = '$id'");
        if($q)
        {
          consolelog('increased view');
        }
        ?>
        <hr>
        Trending posts:
        <?php require_once('includes/trend.php'); ?>
    </div>
  </body>
</html>
