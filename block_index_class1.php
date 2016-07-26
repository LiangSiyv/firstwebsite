<?php
      session_start();
      if(isset($_SESSION['username']))
        {
          echo"用户名：".$_SESSION['username']."||权限：";
          if($_SESSION['userflag']==1)
            echo "管理员";
          else
            echo"一般";
          echo"<a href=\"block_users_userexit.php\">退出登录</a>";
        }
      else
        {
          echo"<a href=\"index_login.php\">登录</a>|<a href=\"index_register.php\">注册</a>";
        }
     ?>