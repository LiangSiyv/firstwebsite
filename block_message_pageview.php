<?php
include_once 'conn.php';
 ?>

  <div >

        <div align="center">
        <a href="index_add.php" ><h3>添加留言</h3></a>
        </div>
        <?php
          $page = $_GET['page'];
          if($page=="")
          {
            $page=1;
          }
          if(is_numeric($page))
          {
            $page_size=5;                    //每页显示五条评
          }
          $sql="select count(*) as total from message order by id asc";
          $result=mysql_query($sql);              //查询记录总数
          $message_count=mysql_result($result, 0, "total");
          // 根据记录总数除以每页显示的记录数求出所分的页数
          $page_count=ceil($message_count/$page_size);      //页数
          $offset=($page-1)*$page_size;
           //计算下一页从第几条数据开始循环
          $sql=mysql_query("select *from message order by id asc limit $offset, $page_size");
          $row=mysql_fetch_array($sql);
          if(!$row)                                         //如果未检索到信息
          {
            echo"暂无留言";
          }
          do
          {
            ?>
        <div>
          <tr name="row11" >
          <td>
              <b><?=$row[title]?></b>
          </td>
          </tr>
          <tr name="row11" bgcolor= "#eff3ff">
            <td>

          用户：<font name = "username"><?=$row[user]?></font>
            </td>
          </tr>
        </div>

        <div>
          <tr name="row22" >
          <td>
            <div><?=$row[content]?></div>
            <div align="right">
              <?=$row[date]?>
              <?=$row[id]?>  楼
              <?php
                if($_SESSION['userflag']==1)
                  {
                    echo"<a href=\"index_message_preedit.php?id=$row[id]\">编辑</a>";
                    echo "|<a href=\"block_message_delete.php?id=$row[id]\">删除</a>";
                  }
               ?>
               <br>
               <hr style="border:1 dashed #987cb9"  color=#987cb9 SIZE=1>
            </div>
          </td>
          </tr>
        </div>
        <?php }
         while($row=mysql_fetch_array($sql));
        ?>

      </div>

      <div align="center"width=500 border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#add3ef">
        <div >
          <tr bgcolor="#ffffff">
            <!-- 翻页条 -->
            <td width="37%">
              页次：<?php echo $page; ?> 页/<?php echo $page_count; ?> 页
              <br>
              留言：<?php echo$message_count ;?>条&nbsp;
            </td>
            <td width=63% align="right">
              <?php
                // 如果当前页不是首页
                if($page!=1)
                {
                //显示首页超链接
                  echo"<a href=\"  index_messageboard.php?page=1\">首页</a>&nbsp;";
                //显示上一页超链接
                  echo"<a href=\"  index_messageboard.php?page=".($page-1)."\">上一页</a>&nbsp;";
                }
              ?>
              <?php
                // 如果当前页不是尾页
                if($page<$page_count)
                {
                //显示下一页超链接
                  echo"<a href=\"  index_messageboard.php?page=".($page+1)."\">下一页</a>&nbsp;";
                //显示首页超链接
                  echo"<a href=\"  index_messageboard.php?page=".($page_count)."\">尾页</a>&nbsp;";
                }
              ?>
              <hr>
            </td>

          </tr>
        </div>
      </div>



