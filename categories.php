<?php
session_start();
require_once "includes/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viewing all categories</title>
</head>
<body>
    <?php require_once "includes/navbar.php" ?>
    <center>
    <h2>Viewing all categories alphabetically:</h2>
          <?php
    if (isset($_SESSION['user'])&&isset($_SESSION['pass'])) {
        ?>
        <form action="" method="post" class="my-2 my-lg-0">
            <input class="form-control mr-sm-2"  type="text" name="category" id="" placeholder="Name of the category">
            <br><button class='btn btn-success'>Add a category</button>
        </form>
        <?php
    }
    ?>
    <ul>
    <?php
    $s = "select * from categories order by title asc";
    $q = mysqli_query($conn,$s);
    while ($row = mysqli_fetch_array($q))
    {
        $title = $row['title'];
        $desc = $row['description'];
        echo "<li><a href='viewcat.php?name=".urlencode($title)."' title='$desc'>$title</a></li>";
    }
    ?>
    </ul>
    </center>
</body>
</html>

<?php
if(isset($_POST['category'])){
    $category = $_POST['category'];
    $s = "insert into categories (title) values ('$category')";
    $q = mysqli_query($conn,$s);
    if($q)
    {
        alert("Category added successfully");
        redir("categories.php");
    }
}
?>