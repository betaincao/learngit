<?php 
if(!isset($_GET['entry']))
{
    echo'�����������';
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
echo'<h1>�ҵ�BLOG</h1>';
echo'<b>��־���⣺</b>'.$content_array[0];
echo'<br/><b>����ʱ�䣺</b>'.date('Y-m-d H:i:s',$content_array[1]);
echo'<hr>';
echo $content_array[2];

echo '<a href="edit.php?entry='.$post['FILENAME'].'">�༭</a>
     &nbsp;
                    <a href="delete.php?entry='.$post['FILENAME'].'">ɾ��</a>';
?>
