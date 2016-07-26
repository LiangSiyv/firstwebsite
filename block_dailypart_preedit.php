
<?php
include 'conn.php';
$id=$_GET[id];
$query="SELECT * FROM essay WHERE id =".$id;
$result=mysql_query($query);
while($rs=mysql_fetch_array($result)){
    ?>
    <html>
    <form method="post" action="block_dailypart_postedit.php" class="basic-grey">
        <h1>
            日志
            <span>在这里写下您的日志</span>
        </h1>
        <input type="hidden"name="id" value="<?=$rs[id]?>"/>
        <label>
            <span>用户名 :</span>
            <input  type="text" name="user"   value="<?=$rs[user]?>"/>
        </label>
        <label>
            <span>标题 :</span>
            <input type="text" name="title"  value="<?=$rs[title]?>" />
        </label>
        <label>
            <span>内容 :</span>
        </label>
        <textarea class="ckeditor"  name="content"><?=$rs[content]?></textarea>
        <label>
            <span>&nbsp;</span>
            <input type="submit" name="submit" class="button" value="提交" />
        </label>
    </form>
    </html>
<?php }?>