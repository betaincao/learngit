<?php 
if(!isset($_GET['entry']))
{
    echo'请求参数错误';
    exit;
}

$path=substr($_GET['entry'],0,6);
$entry=substr($_GET['entry'],7,9);

//$file_name='D:\phpStudy\WWW\Demo\phpDemo\blog\contents\201112\02-215307.txt';
$file_name='contents/'.$path.'/'.$entry.'.txt';
if(file_exists($file_name))
{
    $fp=@fopen($file_name, 'r');
    if($fp)
    {
        flock($fp, LOCK_SH);
        $result=fread($fp, 1024);
    }
    
    flock($fp,LOCK_UN);
    fclose($fp);
}
$content_array=explode('|', $result);
echo'<h1>我的BLOG</h1>';
echo'<b>日志标题：</b>'.$content_array[0];
echo'<br/><b>发布时间：</b>'.date('Y-m-d H:i:s',$content_array[1]);
echo'<hr>';
echo $content_array[2];

echo '<a href="edit.php?entry='.$post['FILENAME'].'">编辑</a>
     &nbsp;
                    <a href="delete.php?entry='.$post['FILENAME'].'">删除</a>';
?>
