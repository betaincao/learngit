<?php 
session_start();
$info='';

if (isset($_SESSION['user']))
{
    $_SESSION['user']='';
    $msg='���Ѿ��ɹ��˳�,<a href="index.php">������ҳ</a>';
}
else {
    $msg='��δ����½���Ѿ���¼��ʱ,���ɳ��Է�����ҳ���µ�¼��<a href="index.php">������ҳ</a>';
}
?>
<html>
<head>
<title>�����ı��ļ���BLOG</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>

<div id="container">
    <div id="header">
    <h1>�ҵ�BLOG</h1>
    </div>
    <div id="title">
    ----I have a dream....
    </div>
    <div id="left">
        <div id="blog_title">�˳���¼</div>
        <div id="blog_body">
        <?php echo $msg;?>
        </div><!-- blog_body -->   
    </div><!-- blog_entry -->
  </div>
   <div id="right">
            <div id="sidebar">
                <div id="menu_title">������</div>
                <div id="menu_body">���Ǹ�PHP������</div>
            </div>
        </div>
        
         <div id="footer">
                    copyright 2016
        </div>
<body>
</html>