<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"><!-- 让网页大小随设备变 -->
<head>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="layout.css" rel="stylesheet" type="text/css" />
    <link href="color.css" rel="stylesheet" type="text/css" />
    <link href="typography.css" rel="stylesheet" type="text/css" />

    <title>梁思宇的个人主页</title>
</head>

<body>

<div id="class1">
    <?php include_once"block_index_class1.php"; ?>
</div>

<div id="branding">
    <h1>梁思宇的个人主页</h1>
</div>
<div id="content" class="c clear_children">

    <div id="nav" class="sc">
        <ul id="nav_list1">
            <li id="nav_index"><a href="index.php"><h4>主页</h4></a></li>
            <li id="nav_dailypart"><a href="index_dailypart.php"><h4>日志</h4></a></li>
            <li id="nav_photos"><a href="index_photos.php"><h4>相册</h4></a></li>
            <li id="nav_messageboard"><a href="index_messageboard.php"><h4>留言板</h4></a></li>
        </ul>
    </div>

    <div id="main" class="pc cc_tallest" >

        <?php include_once"block_dailypart_one.php"; ?>

    </div>
</div>

<div id="footer" >
    Copyright © 2016.梁思宇 All rights reserved.
</div>

<script type="text/javascript" src="si-clear-children.js"></script>

</body>
</html>
