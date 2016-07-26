<?php
  include"conn.php";
  $id=$_GET['id'];
  $sql1=' select *from essay where id = '.$id;
  $sql=mysql_query($sql1);
  $row=mysql_fetch_array($sql);
 ?>
<html>
<BR>
<div>
   <tr name="row22" bgColor="#ffffff">
   <td>
     <div align="center"><h3><?=$row[title]?></h3></div>
     <div align="right"><?=$row[user]?>
     </div>


     <br >
       
       <pre v>
           <?php
           echo $row[content];
           ?>
     </pre>
      <div align="right">
       <?=$row[date]?>
        <br>
        <hr style="border:1 dashed #987cb9"  color=#987cb9 SIZE=1>
     </div>
   </td>
   </tr>
 </div>
</html>