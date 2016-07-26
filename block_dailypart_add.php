<?php
include'conn.php';
?>
<?php
if($_POST['submit']){
    $sql="INSERT INTO essay(id,user,title,ynflag,content,date) VALUES (NULL, '$_POST[user]', '$_POST[title]','1', '$_POST[content]',now())";

    $result=mysql_query($sql);
//页面跳转，实现方式为javascript x
    $url = "index_dailypart.php";
    echo "<script language='javascript' type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
}
?>
<html>
<script type="text/javascript" src="resources/ckeditor/ckeditor.js"></script>
<form method="post" action="block_dailypart_add.php" class="basic-grey">
    <h1>
        日志
        <span>在这里写下您的日志</span>
    </h1>
    <label>
        <span>用户名 :</span>
        <input  type="text" name="user"  />
    </label>
    <label>
        <span>标题 :</span>
        <input type="text" name="title"  />
    </label>
    <label>
        <span>内容 :</span>
    <textarea class="ckeditor" placeholder="在此输入文章内容" name="content"></textarea>
    </label>
    <label>
        <span>&nbsp;</span>
        <input type="submit" name="submit" class="button" value="提交" />
    </label>
</form>
</html>