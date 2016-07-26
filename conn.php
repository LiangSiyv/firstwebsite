<?php
error_reporting(0);
$conn=@ mysql_connect("localhost","root","")or die("数据库连接错误");
 mysql_select_db("message",$conn);
mysql_query("SET NAMES 'UTF8'");
 ?>


<?php
class ConnDB
{
  var $dbtype;          //服务器类型
  var $host;            //服务器名
  var $user;            //服务器用户名
  var $pwd;             //服务器密码
  var $dbname;          //数据库名

}


?>