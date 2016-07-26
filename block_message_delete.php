<?php
include 'conn.php';
$id = $_GET['id'];
$query="DELETE FROM `message` WHERE `message`.`id` = ".$id;
mysql_query($query);
?>
<?php
//页面跳转，实现方式为javascript
$url = "index_messageboard.php";
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";
?>