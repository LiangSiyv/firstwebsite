  <?php
include'conn.php';
?>
 <?php
 //生成随机文件名函数
 function random($length)
 {
     $hash = 'CR-';
     $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
     $max = strlen($chars) - 1;
     mt_srand((double)microtime() * 1000000);
     for($i = 0; $i < $length; $i++)
     {
         $hash .= $chars[mt_rand(0, $max)];
     }
     return $hash;
 }
 ?>
<?php
  $uploaddir='E:\/study\/xampp\/htdocs\/N1fake\/images\/mysql\/';
if($_POST['submit']){
    if (is_uploaded_file($_FILES['file']['tmp_name']))
    {
        //有了上传文件了
        $myfile=$_FILES["file"];
        //设置超时限制时间,缺省时间为 30秒,设置为0时为不限时
        $time_limit=60;
        set_time_limit($time_limit); //////???????????????????????????????????什么意思？
        //把文件内容读到字符串中
        $fp=fopen($myfile['tmp_name'], "rb");
        if(!$fp) die("file open error");
        $file_data = fread($fp, filesize($myfile['tmp_name']));
        fclose($fp);
        unlink($myfile['tmp_name']);
        //文件格式,名字,大小
        $file_type=$myfile["type"];
        $file_name=$myfile["name"];
        $file_size=$myfile["size"];
        //为上传图片文件生成唯一随机文件名
        $file_name_2=explode(".",$file_name);
        $file_name_2[0]=random(10);
        $file_name_2=implode(".",$file_name_2);

        $file_name_1=$uploaddir.$file_name_2;
        //连接数据库,把文件存到数据库中
//        echo substr($file_name,strcspn($file_name,'.'));
        $file=fopen($file_name_1,'a');
        fwrite($file,$file_data,$file_size);
        fclose($file);
        echo $file_name_1;
        $sql="insert into photos(id,name,type,size,date,url)values (NULL,'$file_name','$file_type',$file_size,now(),'$file_name_1')";
        mysql_query($sql,$conn);
        echo "上传成功--- ";

//页面跳转，实现方式为javascript x
        $url = "index_photos.php";
        echo "<script language='javascript' type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }
}

?>
  <script type="text/javascript">
      function checkPost() {
          if(addForm.file.)

      }
  </script>


<form name="addForm"  action="block_photos_add.php" method="post"enctype="multipart/form-data" class="basic-grey" onsubmit="return checkPost()">


<!--<input type='hidden' name='MAX_FILE_SIZE' value='2621114' />         <!-- 文件大小 -->
<input id="name" type="file" name="file"  accept="image/jpeg,image/png,image/gif"/>
<!--    只允许png,jif,jpg格式文件上传-->
<br />
<input id="message" type="submit" name="submit" value="上传" />
</form>
