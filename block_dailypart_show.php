<?php include_once "conn.php" ;?>
    <div align="center">
    <a href="index_dailypart_add.php" ><h3>添加日志</h3></a>
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
  $sql="select count(*) as total from essay order by id asc";
  $result=mysql_query($sql);              //查询记录总数
  $message_count=mysql_result($result, 0, "total");
  // 根据记录总数除以每页显示的记录数求出所分的页数
  $page_count=ceil($message_count/$page_size);      //页数
  $offset=($page_diary-1)*$page_size;
   //计算下一页从第几条数据开始循环
  $sql=mysql_query("select *from essay order by id asc limit $offset, $page_size");
  $row=mysql_fetch_array($sql);
  if(!$row)                                         //如果未检索到信息
  {
    echo"暂无文章发布";
  }
  do
  {
 ?>

 <div class="ahover">

   <tr name="row22" bgColor="#ffffff">
   <td>
     <div><h3><?=$row[title]?></h3></div>
      <?php
        if(strlen($row[content])>1024)
        {
          echo"<a href=\"index_dailypart_one.php?id=".$row[id]."\">";
          echo cubstr($row[content], 0,1024).'...';
          echo"</a>";
        }

        else
          {
          echo"<a href=\"index_dailypart_one.php?id=".$row[id]."\">";
          echo $row[content];
          echo"</a>";
          }
      ?>
       <br>
       <?php
       if($_SESSION['userflag']==1)
       {
           echo"<a href=\"index_dailypart_preedit.php?id=$row[id]\">编辑</a>";
           echo "|<a href=\"block_dailypart_delete.php?id=$row[id]\">删除</a>";
       }
       ?>
     <div align="right">
       <?=$row[date]?>
        <br>
        <hr style="border:1 dashed #987cb9"  color=#987cb9 SIZE=1>
     </div>
   </td>
   </tr>
 </div>
 <?php }
  while($row=mysql_fetch_array($sql));
 ?>

<!--                             翻页条
---------------------------------------------------------------------------------------->
 <div align="center"width=500 border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#add3ef">
   <div >
     <tr bgcolor="#ffffff">
       <!-- 翻页条 -->
       <td width="37%">
         页次：<?php echo $page_diary; ?> 页/<?php echo $page_count; ?> 页
         <br>
         文章：<?php echo$message_count ;?>篇&nbsp;
       </td>
       <td width=63% align="right">
         <?php
           // 如果当前页不是首页
           if($page_diary!=1)
           {
           //显示首页超链接
             echo"<a href=\"  index_dailypart.php?page=1\">首页</a>&nbsp;";
           //显示上一页超链接
             echo"<a href=\"  index_dailypart.php?page=".($page_diary-1)."\">上一页</a>&nbsp;";
           }
         ?>
         <?php
           // 如果当前页不是尾页
           if($page_diary<$page_count)
           {
           //显示下一页超链接
             echo"<a href=\"  index_dailypart.php?page=".($page_diary+1)."\">下一页</a>&nbsp;";
           //显示首页超链接
             echo"<a href=\"  index_dailypart.php?page=".($page_count)."\">尾页</a>&nbsp;";
           }
         ?>
         <hr>
       </td>

     </tr>
   </div>
 </div>


<?php
function cubstr($string, $beginIndex, $length){
    if(strlen($string) < $length){
        return substr($string, $beginIndex);
    }

    $char = ord($string[$beginIndex + $length - 1]);
    if($char >= 224 && $char <= 239){
        $str = substr($string, $beginIndex, $length - 1);
        return $str;
    }

    $char = ord($string[$beginIndex + $length - 2]);
    if($char >= 224 && $char <= 239){
        $str = substr($string, $beginIndex, $length - 2);
        return $str;
    }

    return substr($string, $beginIndex, $length);
}
 ?>

