<?php
/**
 * Created by PhpStorm.
 * User: SiYuLiang
 * Date: 2016/7/22
 * Time: 10:38
 *
 */
include"conn.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<?php
if($_POST['submit'])
{
    $keyword=md5($_POST[password]);
    $sql="INSERT INTO user(id,username,password,userflag) VALUES (NULL, '$_POST[name]', '$keyword', '0')";
    mysql_query($sql);
    $url = "index.php";
    echo "<script language='javascript' type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
}
?>
<script language="JavaScript">
    function checksubmit()
    {

        if(document.registerform.name.value=="")
        {

            alert("请输入用户名！");
            return false;
        }
        if(document.registerform.password.value!=document.registerform.passwordagn.value)
        {
            alert("两次密码不一致！");
            return false;
        }


    }
</script>

<form method="post" name="registerform"action="block_users_register.php"class="basic-grey"onsubmit="return checksubmit()">
    <h1 align="center">注册</h1>
    <lable>
        <span>用户名</span>
        <input type="text" name="name">
    </lable>
    <br>
    <lable>
        <span>密码</span>
        <input type="password" name="password">
    </lable>
    <br>
    <lable>
        <span>再次输入密码</span>
        <input type="password"  name="passwordagn">
    </lable>
    <br>
    <lable>
        <span></span>
        <input type="submit"name="submit"class="button" value="提交" />
    </lable>
</form>
