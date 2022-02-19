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
        <form action="login.php" method="post">
            <label for="user">Username:</label><br><br>
            <input type="text" name="user" class="form-control"><br>
            <label for="pass">Password:</label><br><br>
            <input type="password" name="pass" class="form-control">
            <br>
            <button class='btn btn-primary'>Login</button>
        </form>
    </div>
  </body>
</html>
<?php
if(isset($_POST['user']) && isset($_POST['pass'])){
    $name = $_POST['user'];
    $pass = $_POST['pass'];
    $s = "SELECT * FROM users WHERE username = '$name' AND password = '$pass'";
    $q = mysqli_query($conn, $s);
    $num = mysqli_num_rows($q);
    if($num > 0)
    {
        $_SESSION['user'] = $name;
        $_SESSION['pass'] = $pass;
        echo "<script>location.href='index.php'</script>";
    }else{
        echo "<h3>Sorry, but you must have made a mistake</h3>";
    }
}
?>