<?php 
session_start();
$info='';

if (isset($_SESSION['user']))
{
    $_SESSION['user']='';
    $msg='您已经成功退出,<a href="index.php">返回首页</a>';
}
else {
    $msg='您未曾登陆或已经登录超时,您可尝试返回首页重新登录。<a href="index.php">返回首页</a>';
}
?>
<html>
<head>
<title>基于文本的简易BLOG</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>

<div id="container">
    <div id="header">
    <h1>我的BLOG</h1>
    </div>
    <div id="title">
    ----I have a dream....
    </div>
    <div id="left">
        <div id="blog_title">退出登录</div>
        <div id="blog_body">
        <?php echo $msg;?>
        </div><!-- blog_body -->   
    </div><!-- blog_entry -->
  </div>
   <div id="right">
            <div id="sidebar">
                <div id="menu_title">关于我</div>
                <div id="menu_body">我是个PHP爱好者</div>
            </div>
        </div>
        
         <div id="footer">
                    copyright 2016
        </div>
<body>
</html>