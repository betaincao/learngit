<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
$login=false;
session_start();

if(!empty($_SESSION['user'])&&$_SESSION['user']=='admin')
    $login=true;

$file_array=array();
$folder_array=array();

$dir='contents';
$dh=opendir($dir);

if ($dh)
{
    $filename=readdir($dh);
    
    while ($filename)
    {
        if ($filename !='.' && $filename !='..')
        {
            $folder_name=$filename;
            array_push($folder_array, $folder_name);
        }
        $filename=readdir($dh);
    }
}
rsort($folder_array);
$post_data=array();
foreach ($folder_array as $folder)
{
    $dh=opendir($dir.'//'.$folder);
    while (($filename=readdir($dh))!==FALSE)
    {
        if (is_file($dir.'//'.$folder.'//'.$filename))
        {
            $file=$filename;
            $file_name=$dir.'//'.$folder.'//'.$file;
            
            if (file_exists($file_name))
            {
                $fp=@fopen($file_name, 'r');
                if($fp)
                {
                    flock($fp, LOCK_SH);
                    $result=fread($fp, filesize($file_name));
                }
                flock($fp, LOCK_UN);
                fclose($fp);
             }
                $temp_data=array();
                $content_array=explode('|', $result);
                
                $temp_data['SUBJECT']=$content_array[0];
                $temp_data['DATE']=date('Y-m-d H:i:s',$content_array[1]);
                $temp_data['CONTENT']=$content_array[2];
                $file=substr($file,0,9);
                $temp_data['FILENAME']=$folder.'-'.$file;
                array_push($post_data, $temp_data);
        }
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
    <?php echo '<a href="add.php?entry='.$post['FILENAME'].'">�����־</a>';?>
    <div id="left">
        <?php 
        foreach ($post_data as $post)
        {
            
        ?>
            <div id="blog_entry">
            <div id="blog_title"><?php echo $post['SUBJECT'];?></div>
            <div id="blog_body">
            <div id="blog_date"><?php echo $post['DATE'];?></div>
            <?php echo $post['CONTENT'];
            ?>
            <div>
            <?php 
                if ($login)
                {
                    echo '<a href="edit.php?entry='.$post['FILENAME'].'">�༭</a>
     &nbsp;
                    <a href="delete.php?entry='.$post['FILENAME'].'">ɾ��</a>';
                }
            ?>
            </div>
         </div><!-- blog_body -->
       </div><!-- blog_entry -->
       <?php }?>
       </div>
       
       <div id="right">
            <div id="sidebar">
                <div id="menu_title">������</div>
                <div id="menu_body">
                                                            ����PHP������
                 <br/><br/>
                 <?php 
                 if ($login)
                 {
                     echo '<a href="logout.php">�˳�</a>';
                 }else{
                     echo'<a href="login.php">��¼</a>';} ?>                                           
                </div>
                </div>
                <br/>
                <div id="sidebar">
                    <div id="menu_title"> ��־�鵵  </div>
                    <?php 
                    foreach ($folder_array as $ym)
                    {
                        $entry=$ym;
                        $ym=substr($ym, 0, 4).'-'.substr($ym,4,2);
                        echo '<div id="menu_body"><a href="archives.php?ym='.$entry.'">'.$ym.'</a></div>';
                    }
                    ?>
                    </div>
                    </div>
                    <div id="footer" >copyright 2016</div>
                    </div>
<body>
</html>
<?php close($dh);?>