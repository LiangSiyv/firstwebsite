  <?php
include'conn.php';
?>
<?php
if($_POST['submit']){
$sql="INSERT INTO message(id,user,title,content,date) VALUES (NULL, '$_POST[user]', '$_POST[title]', '$_POST[content]',now())";

$f=mysql_query($sql);
//页面跳转，实现方式为javascript x
$url = "index_messageboard.php";
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";
}
?>
<script type="text/javascript">

function checkPost(){

if(addForm.user.value==""){
alert("请输入用户名");
addForm.user.focus();
return false;
}
if(addForm.title.value.length<5){
alert("标题不能少于5个字符");
addForm.title.focus();
return false;
}
}
 </script>
 <form name="addForm" onsubmit="return checkPost();" action="block_message_add.php" method="post" class="basic-grey">
<h1>留言
<span>写下你的评论~</span>
</h1>
<label>
<span>用户名 :</span>
<input id="name" type="text" name="user"  />
</label>
<label>
<span>标题 :</span>
<input id="email" type="text" name="title"  />
</label>
<label>
<span>内容 :</span>
<textarea id="message" name="content" ></textarea>
</label>
<label>
<span>&nbsp;</span>
<input type="submit" name="submit" class="button" value="提交" />
</label>
</form>