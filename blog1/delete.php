<?php 
session_start();
$ok=false;

if (empty($_SESSION['user'])||$_SESSION['user']!='admin')
{
    echo '��<a href="login.php">��¼</a>��ִ�иò�����';
    exit;
}

if (!isset($_GET['entry']))
{
    if (!isset($_POST['id']))
    {
        $ok=true;
        $msg='�����������<a href="index.php">������ҳ</a>';
    }
    else 
    {
        $path=substr($_POST['id'],0,6);
        $entry=substr($_POST['id'],7,9);
        $file_name='contents/'.$path.'/'.$entry.'.txt';
        if (unlink($file_name))
        {
            $ok=true;
            $msg='����־ɾ���ɹ���<a href="index.php">������ҳ</a>';
        }
        else 
        {
            $ok=true;
            $msg='����־ɾ��ʧ�ܣ�<a href="index.php">������ҳ</a>';
        }
    }
}
else 
{
    $form_data='';
    $path=substr($_GET['entry'], 0 ,6);
    $entry=substr($_GET['entry'],7,9);
    $file_name='contents/'.$path.'/'.$entry.'.txt';
    if (file_exists($file_name))
    {
        $form_data='<input type="hidden" name="id" value="'.$_GET['entry'].'">';
    }
    else 
    {
        $ok=true;
        $msg='��Ҫɾ������־�����ڣ�<a href="index.php">������ҳ</a>';
    }
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
        <div id="blog_entry">
            <div id="blog_title">ɾ����־</div>
            <div id="blog_entry">
            <?php 
            if ($ok==false)
            {
                ?>
                <form method="POST" action="delete.php">
                <font color="red">ɾ������־���޷��ָ���ȷ��Ҫɾ����</font>
                <input type=submit value="ȷ��">
                <?php echo $form_data;?>                
                </form>
                <?php } ?>
                <?php  
                if ($ok==true)
                {
                    echo $msg;
                }
                 ?>
                 </div><!-- blog_body -->
             </div><!-- blog_entry -->
         </div>
         
         <div id="right">
         <div id="sidebar">
         
         <div id="menu_title">������</div>
         <div id="menu_body">����һ��php������</div>
     </div>
 </div>
<div id="footer" style="text-align: center;">
        CopyRight 2016
     </div>
</div>
<body>
</html>