<?php
include "conn.php";
$query="update message set user='$_POST[user]',title='$_POST[title]',content='$_POST[content]' where message.id='$_POST[id]'";
$f=mysql_query($query);
 ?>
<?php
$url = "index_messageboard.php";
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";
?>