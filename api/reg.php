<?php
include '../includes/common.php';
$mod=$_GET['mod'];
$user = $_POST['user'];
$pwd = $_POST['pwd']; 
$qq = $_POST['qq'];
$name = $_POST['name'];
if(!$user || !$pwd || !$qq|| !$name)
{}
else
{
if(isset($_POST['qq']) && isset($_POST['user']) && isset($_POST['pwd']) && isset($_POST['name'])){
$qq=daddslashes($_POST['qq']);
$user=daddslashes($_POST['user']);
$pwd=daddslashes($_POST['pwd']);
$name=daddslashes($_POST['name']);
$money = '0';
$admin = '0';
if($admin["xss"]=='1'){
$user=RemoveXSS($user);
$name=RemoveXSS($name);
$qq=RemoveXSS($qq);
$pwd=RemoveXSS($pwd);
}
$user=ltrim($user);
$name=ltrim($name);
$qq=ltrim($qq);
$pwd=ltrim($pwd);
$sql="SELECT * FROM User WHERE user='{$user}' limit 1";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if($row!=''){
        if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"该账号已经注册");
exit(json_encode($arr));
}else{
echo("<script language='javascript'>alert('该账号已经注册！');window.location.href='../reg.php';</script>");
}
}
	$sql="insert into `User` (`qq`,`user`,`pwd`,`money`,`admin`,`name`,`lts`,`ylts`,`zt`) values ('$qq','$user','$pwd','$money','$admin','$name','2','0','0')";
	mysqli_query($conn, $sql);
	    if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"恭喜你,注册成功");
exit(json_encode($arr));
}else{
echo "<script language='javascript'>alert('恭喜你,注册成功！');window.location.href='../login.php';</script>";
}
}
}
?>