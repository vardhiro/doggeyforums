<?php
session_start();
require "includes/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Writing a reply</title>
</head>
<body>
   <?php
   require_once "includes/navbar.php";
if (isset($_GET['replyto']) && isset($_GET['id']) && isset($_SESSION['user']) && isset($_SESSION['pass']))
{
    $replyto = $_GET['replyto'];
    ?>
    <form method='post'>
        <h2>Reply to <?php echo ($replyto == "main") ? "The main question" : explode("-", $replyto)[0]; ?></h2>
        <br>
        <label for="body">Write your reply in markdown or plain text (html is not advised):</label>
        <textarea rows="8" type="text" name="body" class="form-control" required></textarea><br><br>
        <button class="btn btn-secondary">Reply</button>
    </form>
    <?php
    if(isset($_POST['body']))
    {
        $id = $_GET['id'];
        $body = $_POST['body'];
        $time = time();
        $user = $_SESSION['user'];
        $replyto = $_GET['replyto'];
        $unid = $user."-".$time;
        $i = "INSERT INTO replies (id, body, doc, creator, replyto, unid) values ('$id', '$body', '$time', '$user', '$replyto', '$unid')";
        $q = mysqli_query($conn, $i);
        if($q){
            alert("replied successfully");
            redir("view.php?id=$id");
        }else{
            alert("There was a problem");
        }
    }
}
?> 
</body>
</html>
