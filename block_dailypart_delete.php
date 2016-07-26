<?php
/**
 * Created by PhpStorm.
 * User: SiYuLiang
 * Date: 2016/7/23
 * Time: 14:04
 */
include"conn.php";
?>
<?php
echo $_GET['id'];
$id = $_GET['id'];
$query="DELETE FROM `essay` WHERE `essay`.`id` = ".$id;
mysql_query($query);
?>
<?php
//页面跳转，实现方式为javascript
$url = "index_dailypart.php";
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";
?>
