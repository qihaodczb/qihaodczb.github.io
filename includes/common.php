<?php
error_reporting(0);
define('SYSTEM_ROOT', dirname(__FILE__).'/');
define('ROOT', dirname(SYSTEM_ROOT).'/');
include_once(SYSTEM_ROOT."function.php");
include_once(SYSTEM_ROOT."version.php");
function addslashes_deep($value)
{
    if (empty($value))
        return $value;
    else
        return is_array($value) ? array_map('addslashes_deep', $value) : addslashes(trim($value));
}

$_GET  = addslashes_deep($_GET);
$_POST = addslashes_deep($_POST);
$_COOKIE   = addslashes_deep($_COOKIE);
$_REQUEST  = addslashes_deep($_REQUEST);
session_start();
$install=$_GET['install'];
if(file_exists(ROOT.'config.php')){
	$install=true;
}
if(!$install){
header('Content-type:text/html;charset=utf-8');
sysmsg("你还没安装本程序<a href='../install'>点此安装</a></div>"); 
exit();  
}else{
require ROOT.'config.php';
}
if(file_exists(ROOT.'install/install')){
	$install1=true;
}
if(!$install1){
header('Content-type:text/html;charset=utf-8');
sysmsg("你还没安装本程序<a href='../install'>点此安装</a></div>"); 
exit();  
}
if($username==''){     
header('Content-type:text/html;charset=utf-8');
sysmsg("你还没安装本程序<a href='../install'>点此安装</a></div>"); 
exit();
}elseif($password==''){     
header('Content-type:text/html;charset=utf-8');
sysmsg("你还没安装本程序<a href='../install'>点此安装</a></div>"); 
exit();
}elseif($dbname==''){     
header('Content-type:text/html;charset=utf-8');
sysmsg("你还没安装本程序<a href='../install'>点此安装</a></div>"); 
exit();
}elseif($servername==''){     
header('Content-type:text/html;charset=utf-8');
sysmsg("你还没安装本程序<a href='../install'>点此安装</a></div>"); 
exit();
}
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    sysmsg("连接失败: " . $conn->connect_error);
}
$sql="SELECT * FROM `Admin` WHERE id='1' limit 1";
$result = mysqli_query($conn, $sql);
$admin = mysqli_fetch_assoc($result);
if($conn->query("select * from `Admin` where 1")==FALSE)//检测安装
{
if($install!='no'){
header('Content-type:text/html;charset=utf-8');
sysmsg("你还没安装本程序<a href='../install'>点此安装</a></div>"); 
exit();
}
}
if($version!=$admin['version']){
header('Content-type:text/html;charset=utf-8');
sysmsg("你还没更新数据库<a href='../install/sql.php'>点此更新数据库</a></div>"); 
exit(); 
}
?>