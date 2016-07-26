<?php
/**
 * Created by PhpStorm.
 * User: SiYuLiang
 * Date: 2016/7/23
 * Time: 14:13
 */
include "conn.php";
$query="update essay set user='$_POST[user]',title='$_POST[title]',content='$_POST[content]' where id='$_POST[id]'";
$f=mysql_query($query);
 ?>
<?php
$url = "index_dailypart.php";
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";
?>