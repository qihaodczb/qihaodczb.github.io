<html>
    <head>
        <meta charset="utf-8">
        <title>
安装程序
        </title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="../assets/css/index.css" media="all">
        <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
        <script src="../assets/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="../assets/js/index.js"></script>
    </head>
<?php
error_reporting(0);
$mod=$_GET['mod'];
if(file_exists('../install/install')){
	$install=true;
}
if($install){
    echo <<<HTML
    		<p><iframe src="./README.txt" style="width:100%;height:250px;"></iframe></p>
    <div class="alert alert-warning">您已经安装过，如需重新安装请删除<font color=red>../install/install </font>文件后再安装！</div>
HTML;
}else{
$config="<?php
\$servername = '{$_POST['url']}';
\$username = '{$_POST['name']}';
\$password = '{$_POST['pwd']}';
\$dbname = '{$_POST['db']}';
?>";
if($_POST['url']==''){     
    echo"请配置所有信息"; 
}elseif($_POST['name']==''){     
    echo"请配置所有信息"; 
}elseif($_POST['pwd']==''){     
    echo"请配置所有信息";  
}elseif($_POST['db']==''){     
    echo"请配置所有信息"; 
}else{
$conn = new mysqli($_POST['url'], $_POST['name'], $_POST['pwd'],$_POST['db']);
if ($conn->connect_error) {
    echo("连接失败: " . $conn->connect_error);
}else{
if($conn->query("select * from `Admin` where 1")==FALSE){
if(file_put_contents('../config.php',$config)){
			echo '<div class="alert alert-success">数据库配置文件保存成功！</div>';
$sql = "CREATE TABLE Msg (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
qid VARCHAR(15),
name VARCHAR(15),
txt VARCHAR(200),
time VARCHAR(30),
ip VARCHAR(50)
)";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('数据表 Msg 创建成功');</script>";
}
$sql = "CREATE TABLE Gg (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
txt VARCHAR(9999)
)";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('数据表 Gg 创建成功');</script>";
}
$sql = "CREATE TABLE Km (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
km VARCHAR(9999),
nr VARCHAR(200),
zl VARCHAR(200),
zt VARCHAR(2)
)";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('数据表 Km 创建成功');</script>";
}
$sql = "CREATE TABLE User (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
user VARCHAR(20),
name VARCHAR(20),
pwd VARCHAR(50),
money VARCHAR(100),
qq VARCHAR(100),
admin VARCHAR(5),
lts VARCHAR(5),
ylts VARCHAR(5),
zt VARCHAR(5)
)";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('数据表 User 创建成功');</script>";
}
$sql = "CREATE TABLE Chat (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(20),
jj VARCHAR(200),
yn VARCHAR(2),
pwd VARCHAR(20),
admin VARCHAR(20),
msg INT(20),
gl1 VARCHAR(20),
gl2 VARCHAR(20),
gl3 VARCHAR(20),
zt VARCHAR(5)
)";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('数据表 Chat 创建成功');</script>";
}
$sql = "CREATE TABLE Admin (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
user VARCHAR(50),
pwd VARCHAR(50),
qq VARCHAR(999),
title VARCHAR(999),
ip VARCHAR(999),
version VARCHAR(10),
xss VARCHAR(999),
tc VARCHAR(999)
)";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('数据表 Admin 创建成功');</script>";
    $sql = "INSERT INTO Admin (user,pwd, qq, title, ip, xss, version, tc) VALUES `admin`,`123456`, `3395382918`, `极速云聊最新版`, `1`, `1`, `2.6`, `我是一个可爱的弹窗公告`";
    $sql = "INSERT INTO Admin (user,pwd, qq, title, ip, xss, version, tc) VALUES (\"admin\",\"123456\", \"3395382918\", \"极速云聊最新版\",\"1\",\"1\",\"2.6\", \"我是一个可爱的弹窗公告\")";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('数据表 Admin 配置成功');window.location.href='./about.php';</script>";
        @file_put_contents("../install/install",'安装锁');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
}else{
			echo '<div class="alert alert-danger">保存失败，请确保网站根目录有写入权限<hr/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
}
}else{
    $sql = "drop table User;";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('删除数据表 User 成功');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }    $sql = "drop table Admin;";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('删除数据表 Admin 成功');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
        $sql = "drop table Gg;";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('删除数据表 Gg 成功');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
        $sql = "drop table Chat;";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('删除数据表 Chat 成功');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
        $sql = "drop table Km;";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('删除数据表 Km 成功');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
        $sql = "drop table Msg;";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('删除数据表 Msg 成功');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
if(file_put_contents('../config.php',$config)){
			echo '<div class="alert alert-success">数据库配置文件保存成功！</div>';
$sql = "CREATE TABLE Msg (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
qid VARCHAR(15),
name VARCHAR(15),
txt VARCHAR(200),
time VARCHAR(30),
ip VARCHAR(50)
)";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('数据表 Msg 创建成功');</script>";
}
$sql = "CREATE TABLE Gg (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
txt VARCHAR(9999)
)";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('数据表 Gg 创建成功');</script>";
}
$sql = "CREATE TABLE Km (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
km VARCHAR(9999),
nr VARCHAR(200),
zl VARCHAR(200),
zt VARCHAR(2)
)";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('数据表 Km 创建成功');</script>";
}
$sql = "CREATE TABLE User (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
user VARCHAR(20),
name VARCHAR(20),
pwd VARCHAR(50),
money VARCHAR(100),
qq VARCHAR(100),
admin VARCHAR(5),
lts VARCHAR(5),
ylts VARCHAR(5),
zt VARCHAR(5)
)";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('数据表 User 创建成功');</script>";
}
$sql = "CREATE TABLE Chat (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(20),
jj VARCHAR(200),
yn VARCHAR(2),
pwd VARCHAR(20),
admin VARCHAR(20),
msg INT(20),
gl1 VARCHAR(20),
gl2 VARCHAR(20),
gl3 VARCHAR(20),
zt VARCHAR(5)
)";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('数据表 Chat 创建成功');</script>";
}
$sql = "CREATE TABLE Admin (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
user VARCHAR(50),
pwd VARCHAR(50),
qq VARCHAR(999),
title VARCHAR(999),
ip VARCHAR(999),
version VARCHAR(10),
xss VARCHAR(999),
tc VARCHAR(999),
payurl VARCHAR(100),
payid VARCHAR(50),
paykey VARCHAR(20)
)";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('数据表 Admin 创建成功');</script>";
    $sql = "INSERT INTO Admin (user,pwd, qq, title, ip, xss, version, tc, payurl, payid, paykey) VALUES `admin`,`123456`, `3395382918`, `极速云聊V2最终版，V3正在开发中`, `1`, `1`, `2.9`, `我是一个可爱的弹窗公告`, `payurl`, `payid`, `paykey`";
    $sql = "INSERT INTO Admin (user,pwd, qq, title, ip, xss, version, tc, payurl, payid, paykey) VALUES (\"admin\",\"123456\", \"3395382918\", \"极速云聊V2最终版，V3正在开发中\",\"1\",\"1\",\"2.9\", \"我是一个可爱的弹窗公告\",\"url\",\"id\",\"key\")";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('数据表 Admin 配置成功');window.location.href='./about.php';</script>";
        @file_put_contents("../install/install",'安装锁');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
}else{
			echo '<div class="alert alert-danger">保存失败，请确保网站根目录有写入权限<hr/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
}
}
}
}
}