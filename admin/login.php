<?php
include '../includes/common.php';
$pwd=$_POST['pwd'];
$user=$_POST['user'];
if(!empty($_POST['user']) && !empty($_POST['pwd'])){
if($pwd==$admin["pwd"]&&$user==$admin["user"]){
	setcookie('Admin_login',$user+$pwd,time()+36000,'/');
	echo ("<script>window.alert('登录成功！');window.location.href='../admin/index.php';</script>");
}else{
    echo ("<script>window.alert('登录失败！');window.location.href='../admin/login.php';</script>");
}
}else if(isset($_GET['logout'])){
setcookie('Admin_login','',time()-100,'/');
echo "<script>window.alert('退出成功！');window.location.href='../admin/login.php';</script>";
}
$Admin_login=$_COOKIE['Admin_login'];
if(!$Admin_login){}else exit("<script>location='../admin/index.php'</script>");
?>
<!doctype html>
<html  class="x-admin-sm">
<head>
	<meta charset="UTF-8">
	<title><?php echo $admin["title"] ?>-后台登录</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
        <script src="../assets/lib/layui/layui.js" charset="utf-8"></script>
    <link rel="stylesheet" href="../assets/css/login.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="../assets/lib/layui/layui.js" charset="utf-8"></script>
            <link rel="stylesheet" href="../assets/css/font.css">
        <link rel="stylesheet" href="../assets/css/index.css">
        <link rel="stylesheet" href="../assets/css/iconfont.css">
        <script type="text/javascript" src="../assets/js/index.js"></script>
</head>
<body class="login-bg">
            <div class="container">
            <div class="logo">
               <a href="./index.php"><?php echo $admin["title"] ?></a></div>
                        <ul class="layui-nav right" lay-filter="">
            </ul>
        </div>
        <div class="login layui-anim layui-anim-up">
        <div class="message">后台登录</div>
        <div id="darkbannerwrap"></div>
        <form class="am-form am-form-horizontal" action="../admin/login.php" method="post" name="loghitoke">
            <input name="user" placeholder="账号"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input name="pwd" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
            <input value="登录"  style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
    </div>
</body>
</html>