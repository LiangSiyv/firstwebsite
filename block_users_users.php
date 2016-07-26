<?php
include 'conn.php';
?>
<?php
if($_POST['submit'])
{
  $sql="SELECT * FROM `user`  WHERE username  = '".$_POST[admin]."'";
  $query = mysql_query($sql);
  $row = mysql_fetch_array($query);
  if($row[password]==md5($_POST[keyword]))
  {

    echo"登陆成功！";
    session_start();
    $_SESSION['username'] = $_POST[admin];
    $_SESSION['passcode'] = $_POST[keyword];
    $_SESSION["userflag"] =$row[userflag];

    $url = "index.php";
    echo "<script language='javascript' type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";

  }
  echo"登录失败！";
  echo" <html>";
  echo"<a href=\"index.php\">返回主页</a>";
  echo " </html>";
             // $sql="INSERT INTO `user` (`id`, `username`, `password`, `sex`, `age`, `birthday`, `hobby`, `add_time`, `last_login`) VALUES (NULL, 'asf', 'af', '1', '1', '1996-10-15', '1', '2016-07-04 12:12:16', '2016-07-05 19:48:44')"
}
 ?>

 <form name="loginform" method="post" action="index_login.php">
  用户名：<input type="text" name="admin"value=""><br/>
  密码：<input type="password" name="keyword"><br/>
  <input type="submit" name="submit" value="登录"/>
 </form>