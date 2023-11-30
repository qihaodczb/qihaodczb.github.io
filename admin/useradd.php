<?php
include '../includes/common.php';
$Admin_login=$_COOKIE['Admin_login'];
if($Admin_login){}else exit("<script>location='./login.php'</script>");
if(isset($_POST['name'])){
if($admin["xss"]=='0'){
$p=RemoveXSS($_POST['pwd']);
$n=RemoveXSS($_POST['name']);
$q=RemoveXSS($_POST['admin']);
$m=RemoveXSS($_POST['money']);
$qq=RemoveXSS($_POST['qq']);
$u=RemoveXSS($_POST['user']);
}else{
$p=$_POST['pwd'];
$n=$_POST['name'];
$q=$_POST['admin'];
$m=$_POST['money'];
$qq=$_POST['qq'];
$u=$_POST['user'];
}
$sql = "INSERT INTO User (name,pwd,user,qq,admin,money,lts,ylts,zt) VALUES ('{$p}', '{$u}','{$n}', '{$m}','{$qq}','{$q}','2','0','0')";
if (mysqli_query($conn, $sql)) {
    echo "<script>window.location.href='./userlist.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>
添加用户
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
    <body>
       <div class="x-nav">
            <span class="layui-breadcrumb">
                <a href="">首页</a>
                <a>
                    <cite>添加用户</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
                <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
            </a>
        </div>
              <div class="layui-tab-content" >
                <div class="layui-tab-item layui-show">
                 <form class="am-form am-form-horizontal" action="./useradd.php" method="post" name="loghitoke">
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>账号
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="user"  value="admin"
                                class="layui-input">
                            </div>
                        </div>     
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>昵称
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="name"  value="admin"
                                class="layui-input">
                            </div>
                        </div>                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>密码
                            </label>
                            <div class="layui-input-block">
                            <input type="password" name="pwd"  value="123456"
                                class="layui-input">
                            </div>
                        </div>                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>QQ
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="qq"  value="3395382918"
                                class="layui-input">
                            </div>
                        </div>                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>余额
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="money"  value="0"
                                class="layui-input">
                            </div>
                        </div>                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>权限
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="admin"  value="0"
                                class="layui-input">
                            </div>
                        </div> 
            <small>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp权限0为普通用户，1为VIP1，2为VIP2，3为VIP3，4为SVIP1，5为SVIP2，6为SVIP3<small>
                    <div class="layui-form-item">
                            <button class="layui-btn" type="submit">
                                添加
                            </button>
                        </div>
                    </form>
                    <div style="height:100px;"></div>
                </div>
    </body>
</html>