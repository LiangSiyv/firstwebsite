<?php include_once "conn.php" ;?>
    <div align="center">
    <a href="block_photos_add.php" ><h3>上传图片</h3></a>
    </div>
<?php
  $page_diary = $_GET['page'];
  if($page_diary=="")
  {
    $page_diary=1;
  }
  if(is_numeric($page_diary))
  {
    $page_size=5;                    //每页显示五条评
  }
  $sql="select count(*) as total from photos order by id asc";
  $result=mysql_query($sql);              //查询记录总数
  $message_count=mysql_result($result, 0, "total");
  // 根据记录总数除以每页显示的记录数求出所分的页数
  $page_count=ceil($message_count/$page_size);      //页数
  $offset=($page_diary-1)*$page_size;
   //计算下一页从第几条数据开始循环
  $sql=mysql_query("select *from photos order by id asc limit $offset, $page_size");
  $row=mysql_fetch_array($sql);
  if(!$row)                                         //如果未检索到信息
  {
    echo"暂无图片";
  }
  do
  {
 ?>

 <div class="ahover">

   <tr name="row22" bgColor="#ffffff">
   <td id="img">
     <div><h3><?php echo substr($row[name],0,strcspn($row[name],'.'))?></h3></div>
       <?php echo  "<img src=\"".strstr($row[url],"images")."\" alt=\"".$row[name]."\">";
       ?>
   </td>
   </tr>
 </div>
 <?php }
  while($row=mysql_fetch_array($sql));
 ?>
 <div align="center"width=500 border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#add3ef">
   <div >
     <tr bgcolor="#ffffff">
       <!-- 翻页条 -->
       <td width="37%">
         页次：<?php echo $page; ?> 页/<?php echo $page_count; ?> 页
         <br>
         图片：<?php echo$message_count ;?>个&nbsp;
       </td>
       <td width=63% align="right">
         <?php
           // 如果当前页不是首页
           if($page_diary!=1)
           {
           //显示首页超链接
             echo"<a href=\"  index_photos.php?page=1\">首页</a>&nbsp;";
           //显示上一页超链接
             echo"<a href=\"  index_photos.php?page=".($page_diary-1)."\">上一页</a>&nbsp;";
           }
         ?>
         <?php
           // 如果当前页不是尾页
           if($page_diary<$page_count)
           {
           //显示下一页超链接
             echo"<a href=\"  index_photos.php?page=".($page_diary+1)."\">下一页</a>&nbsp;";
           //显示首页超链接
             echo"<a href=\"  index_photos.php?page=".($page_count)."\">尾页</a>&nbsp;";
           }
         ?>
         <hr>
       </td>

     </tr>
   </div>
 </div>

