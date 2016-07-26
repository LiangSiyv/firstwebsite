<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['passcode']);
unset($_SESSION['userflag']);
echo "注销成功";
$url = "index.php";
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";
?>