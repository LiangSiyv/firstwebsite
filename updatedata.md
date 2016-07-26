2016年7月22日22:53:38

从今天开始，写网站建设日志。记录每天都干了什么，不然每天什么都不干。没有危机感。

把电脑重装了，所以还要重建代码和mysql。发现日志的MySQL坏掉了。还没修好。

做注册部分。窗口onsubmit部分需要用js。然后我傻逼的多加了一个php后缀**?>**，所以让页面失效。总算发现了。

​	日志的坏，应该是submit没有提交到action后的页面。但是留言板部分的是好的。明天对比看一下是哪里有问题。

还要做的：

	1.	注册登陆部分的修复。
	2.	管理员选择显示功能
	3.	图片上传
	4.	日志分类显示
	5.	表连接用户可添加分类

2016年7月23日09:49:21

​	不知道为什么，日志的MySQL又好了。。昨天明明不能添加，今天就可以了。可能是我重启电脑重启MySQL的原因？

​	还有。不是没有submit，是我忘记了method选择post以后，就不会显示在链接上了。傻子。

​	登录页恢复了正常。现在就开始弄 注册吧。

​	**先把注册部分的验证跳过。有网的时候用ajax做**

​	注册验证。是否已经存在同名用户。

**Warning**: POST Content-Length of 24632084 bytes exceeds the limit of 8388608 bytes in **Unknown** on line **0**

**Warning**: POST Content-Length of 24632084 bytes exceeds the limit of 8388608 bytes in **Unknown** on line **0**
**Parse error**: syntax error, unexpected 'if' (T_IF) in **E:\study\xampp\htdocs\N1fake\block_photos_add.php** on line **8**

2016年7月24日06:37:29

终于找到为什么不能编辑update了

原来是传的参数id没传。这下就好找了。

妈的，一个小错误，搞了我一天。。。。不细心啊。。

```
<input type="hidden",name="id" value="<?=$rs[id]?>"/>
```

就是多了一个逗号，name就不传参了啊啊啊啊啊啊。。。

​	看ckedit怎么正常显示

​	图片上传

​	日志分类 用户可添加分类表连接   

​	管理员查看是否显示

2016年7月24日15:56:55

​	弄了半天，终于知道为什么不能file参数传递了。原来file的参数传递$_file[]第一个框里的“myfile”的名字是表单里file用件的名字name。。。。

