<?php
//数据库相关配置信息
$db_info=array(
    'db_host'=> '127.0.0.1',
    'db_user'=>'root',
    'db_pwd'=>'root',
    'db_port'=>'3306',
    'db_name'=>'cb',
    'db_charset'=>'utf8'
);

$link=mysql_connect($db_info['db_host'],$db_info['db_user'],$db_info['db_pwd']);

if (!$link)
{
    die("could noy connect".mysql_error());
}
//echo 'connect successfully';

mysql_select_db($db_info['db_name']) or die('cannot use cb:'.mysql_error());
mysql_set_charset($db_info['db_charset']);


?>
