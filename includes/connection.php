<?php
$hostanme = "localhost";
$username = "root";
$password = "";
$dbname = "doggeyforums";
$conn = mysqli_connect($hostanme,$username,$password,$dbname);
function alert($string){
    echo "<script>alert('$string')</script>";
}
function redir($loc){
    echo "<script>location.href='$loc'</script>";
}
function consolelog($string){
    echo "<script>console.log('$string')</script>";
}
?>