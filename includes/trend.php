<?php
require_once 'connection.php';
?>
<?php
$s = "SELECT * FROM posts ORDER BY views DESC LIMIT 5";
$q = mysqli_query($conn,$s);
?>
<ul>
<?php
while($row = mysqli_fetch_array($q))
{
?>
    <li>`<a href='view.php?id=<?php echo $row['id']; ?>'><?php echo $row['title']; ?></a>` from category `<a href='viewcat.php?name=<?php echo $row['category']; ?>'><?php echo $row['category']; ?></a>`</li>
<?php
}
?>
</ul>