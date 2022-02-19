<?php
session_start();
require_once "includes/connection.php";
?>
<?php
if(isset($_GET['id'])&&isset($_SESSION['user'])&&isset($_SESSION['pass'])){
    $id = $_GET['id'];
    if(isset($_GET['creator'])){
        $creator = $_GET['creator'];
        if($_SESSION['user'] != $creator){
            redir("view.php?id=$id");
        }else{
            $d = "DELETE FROM posts WHERE id = '$id'";
            mysqli_query($conn, $d);
            $d = "DELETE FROM replies WHERE id = '$id'";
            mysqli_query($conn, $d);
            alert("Post and associated replies are deleted!");
            sleep(5);
            redir("index.php");
        }
    }elseif (isset($_GET['unid'])) {
        $unid = $_GET['unid'];
        $creator = explode('-', $unid)[0];
        if($_SESSION['user'] != $creator){
            redir("view.php?id=$id");
        }else{
            $d = "DELETE FROM replies WHERE unid = '$unid'";
            mysqli_query($conn, $d);
            alert("Reply deleted!");
            sleep(5);
            redir("view.php?id=$id");
        }
    }
}
?>