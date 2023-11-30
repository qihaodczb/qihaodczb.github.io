<?php
include './includes/common.php';
if($_SESSION['islogin']==1){
    echo "<script>window.alert('您已登录！');window.location.href='./';</script>";exit;
}
?>
<!doctype html>
<html  class="x-admin-sm">
<head>
	<meta charset="UTF-8">
	<title><?php echo $admin["title"] ?>-用户登录</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
        <script src="./assets/lib/layui/layui.js" charset="utf-8"></script>
    <link rel="stylesheet" href="./assets/css/login.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="./assets/lib/layui/layui.js" charset="utf-8"></script>
            <link rel="stylesheet" href="./assets/css/font.css">
        <link rel="stylesheet" href="./assets/css/index.css">
        <link rel="stylesheet" href="./assets/css/iconfont.css">
        <script type="text/javascript" src="./assets/js/index.js"></script>
</head>
<script>
layui.use('layer', function(){
var layer = layui.layer;
layer.open({
  title: '温馨提示'
  ,content: '手机端有可能出现bug，建议使用电脑或手机下载QQ浏览器切换UA为电脑UA'
});    
});
</script>
<body class="login-bg">
            <div class="container">
            <div class="logo">
               <a href="./index.php"><?php echo $admin["title"] ?></a></div>
                        <ul class="layui-nav right" lay-filter="">
                <li class="layui-nav-item to-index">
                    <a href="reg.php">立即注册</a></li>
            </ul>
        </div>
        <div class="login layui-anim layui-anim-up">
        <div class="message">用户登录</div>
        <div id="darkbannerwrap"></div>
        
        <form class="am-form am-form-horizontal" action="/api/login.php" method="post" name="loghitoke">
            <input name="user" placeholder="账号"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input name="pwd" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
            <input value="登录"  style="width:100%;" type="submit">
            <hr class="hr20" >
            <div class="layui-input-inline layui-show-xs-block">
            <a class="layui-btn" href="reg.php" ><i class="layui-icon"></i>立即注册</a>
        </form>
    </div>
</body>
</html>