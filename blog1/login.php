<?php 
include 'config/auth.php';
session_start();

if (isset($_POST['user'])&&isset($_POST['passwd']))
{
    $user=$_POST['user'];
    $passwd=$_POST['passwd'];
    $passwd=md5($passwd);
    if ($user!=$AUTH['user'] || $passwd!=$AUTH['passwd'])
    {
        echo '<strong><font color="red">�û������������</font></strong>';
    }
    else 
    {
        $_SESSION['user']=$user;
        header("location:index.php");
    }
}
?>

<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
 "http://www.w3.org/TR/html4/loose.dtd">
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
        <div id="blog_entry">
            <div id="blog_title">�û���¼</div>
            
            <div id="blog_body">
                <div id="blog_date"></div>
                <table border="0">
                <form method="POST" action="login.php">
                    <tr><td>�û����ƣ�</td><td><input type="text" name="user" size="15">
                    </td></tr>
                    <tr><td>�û����룺</td><td><input type="password" name="passwd" size="15">
                    </td></tr>
                    <tr><td><input type="submit" value="��¼"></td></tr>
                </form>
                    </table>
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
        CopyRight 2016
     </div>
</div>
</html>
</body>