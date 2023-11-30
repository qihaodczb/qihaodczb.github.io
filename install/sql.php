<?php
error_reporting(0);
require '../config.php';
include '../includes/function.php';
include '../includes/version.php';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    sysmsg("连接失败: " . $conn->connect_error);
}
$sql="SELECT * FROM `Admin` WHERE id='1' limit 1";
$result = mysqli_query($conn, $sql);
$admin = mysqli_fetch_assoc($result);
if($version==$admin['version']){
header('Content-type:text/html;charset=utf-8');
sysmsg("数据库不需要更新<a href='index.php'>点此返回</a></div>"); 
exit(); 
}else{
if($version=='2.2'){
$sql="ALTER TABLE `Admin`ADD COLUMN `tc` VARCHAR(999) NOT NULL DEFAULT '我是一个可爱的弹窗公告';";
if (mysqli_query($conn, $sql)) {
    $sql="update `Admin` set `version`='2.2' where `id`='1'";
    mysqli_query($conn, $sql);
    echo "<script>alert('更新数据表成功');window.location.href='../index.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}else if($version=='2.3'){
    $sql="update `Admin` set `version`='2.3' where `id`='1'";
    mysqli_query($conn, $sql);
    echo "<script>alert('更新数据表成功');window.location.href='../index.php';</script>";
}else if($version=='2.4'){
    $sql="update `Admin` set `version`='2.4' where `id`='1'";
    mysqli_query($conn, $sql);
    echo "<script>alert('更新数据表成功');window.location.href='../index.php';</script>";
}else if($version=='2.5'){
$sql="ALTER TABLE `Admin`ADD COLUMN `user` VARCHAR(50) NOT NULL DEFAULT 'admin';";
if (mysqli_query($conn, $sql)) {
    $sql="update `Admin` set `version`='2.5' where `id`='1'";
    mysqli_query($conn, $sql);
    echo "<script>alert('更新数据表成功');window.location.href='../index.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}}else if($version=='2.6'){
    $sql="update `Admin` set `version`='2.6' where `id`='1'";
    mysqli_query($conn, $sql);
    echo "<script>alert('更新数据表成功');window.location.href='../index.php';</script>";
}else if($version=='2.7'){
    $sql="update `Admin` set `version`='2.7' where `id`='1'";
    mysqli_query($conn, $sql);
    echo "<script>alert('更新数据表成功');window.location.href='../index.php';</script>";
}else if($version=='2.8'){
    $sql="update `Admin` set `version`='2.8' where `id`='1'";
    mysqli_query($conn, $sql);
    echo "<script>alert('更新数据表成功');window.location.href='../index.php';</script>";
}else if($version=='2.9'){
    $sql="ALTER TABLE `Admin`ADD COLUMN `payurl` VARCHAR(50) NOT NULL DEFAULT 'url';";
    mysqli_query($conn, $sql);    
    $sql="ALTER TABLE `Admin`ADD COLUMN `payid` VARCHAR(50) NOT NULL DEFAULT 'id';";
    mysqli_query($conn, $sql);    
    $sql="ALTER TABLE `Admin`ADD COLUMN `paykey` VARCHAR(50) NOT NULL DEFAULT 'key';";
    mysqli_query($conn, $sql);
    $sql="update `Admin` set `version`='2.9' where `id`='1'";
    mysqli_query($conn, $sql);
    echo "<script>alert('更新数据表成功');window.location.href='../index.php';</script>";
}else {
sysmsg("版本号异常，请重新下载源码<a href='https://gitee.com/speed-studio/phpchat'>点此下载</a></div>"); 
}
}
?>