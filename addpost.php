<?php
session_start();
require_once 'includes/connection.php';
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
        <h1 align="center">Welcome to doggeyforums!</h1><br>
        <h2>Add a post</h2><br>
        <form action="addpost.php" method="post">
            <label for="title">Title of your Post</label>
            <input type="text" name="title" class='form-control' required><br><br>
            <label for="category">Which category to put in?</label><br>
            <select name='category'  required>
                <?php
                $sql = "SELECT title FROM categories";
                $q = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($q)){
                ?>
                <option value="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></option>
                <?php
                }
                ?>
            </select><br><br>
            <label for="body">Body of your Post</label>
            <textarea rows='8' name="body" class='form-control' required></textarea><br><br>
            <button class='btn btn-success'>Add Post</button>
        </form>
    </div>
  </body>
</html>
<?php
if(isset($_POST['title']) && isset($_POST['category']) && isset($_POST['body'])){
    print_r($_POST);
    $title = $_POST['title'];
    $category = $_POST['category'];
    $body = $_POST['body'];
    $creator  = $_SESSION['user'];
    $time = time();
    $i = "INSERT INTO posts (title, body, doc, creator, category, views) values ('$title', '$body', '$time', '$creator', '$category', '0')";
    $q = mysqli_query($conn,$i);
    if($q){
        alert("Post created!");
        sleep(5);
        redir('index.php');
    }else{
        alert("There was a problem");
    }
    }
?>