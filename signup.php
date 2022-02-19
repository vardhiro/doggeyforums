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
        <h2>Login</h2><br>
        <form action=""login.php"" method="post">
            <label for="user">Realname:</label><br><br>
            <input type="text" name="name" class="form-control" required><br>
            <label for="user">Username:</label><br><br>
            <input type="text" name="user" class="form-control" required><br>
            <label for="pass">Password:</label><br><br>
            <input type="password" name="pass" class="form-control" required>
            <br>
            <button class='btn btn-primary'>Sign Up</button>
        </form>
    </div>
  </body>
</html>
<?php
if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['name'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $name = $_POST['name'];
    $s = "SELECT * FROM users WHERE username = '$user'";
    $q = mysqli_query($conn, $s);
    $num = mysqli_num_rows($q);
    if($num == 0)
    {
        $time = time();
        $i = "INSERT INTO users (name, username, password, doj) VALUES ('$name', '$user', '$pass', '$time')";
        $q = mysqli_query($conn, $i);
        if($q)
        {
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
            redir('index.php');
        } 
    }else{
        echo "<h3>Sorry, but username is taken</h3>";
    }
}
?>