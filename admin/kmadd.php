<?php
include '../includes/common.php';
$Admin_login=$_COOKIE['Admin_login'];
if($Admin_login){}else exit("<script>location='./login.php'</script>");
$money = $_POST["money"];//面额
$lx = $_POST["lx"];//面额
$num = $_POST["num"];//数量
if($money && $num && $lx){
if($num > '10'){
echo "<script>alert('卡密最大生成数不能大于10张');window.location.href='./kmadd.php';</script>";
}elseif($lx != 'yy'&&$lx != 'vip'){
echo "<script>alert('卡密类型错误');window.location.href='./kmadd.php';</script>";
}else{
for ($i = 0; $i < $num; $i++) {
	$km = random("18");
    $sql = "INSERT INTO Km (km, nr, zl, zt) VALUES `{$km}`, `{$money}`, `{$lx}`, 0";
    $sql = "INSERT INTO Km (km, nr, zl, zt) VALUES (\"{$km}\", \"{$money}\", \"{$lx}\", \"0\")";
    mysqli_query($conn, $sql);
	}
echo "<script>alert('生成成功');window.location.href='./kmlist.php';</script>";
}
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>
添加卡密
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
                    <cite>添加卡密</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
                <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
            </a>
        </div>
              <div class="layui-tab-content" >
                <div class="layui-tab-item layui-show">
                 <form class="am-form am-form-horizontal" action="./kmadd.php" method="post" name="loghitoke">
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>数量
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="num"  placeholder="请勿填写空白"
                                class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>类型
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="lx"  placeholder="yy为余额卡密，vip为会员卡密"
                                class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>数据
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="money"  placeholder="如果为余额卡密请输入数字，如果为会员卡密请输入1-6数字，对应VIP1-SVIP3"
                                class="layui-input">
                            </div>
                        </div>
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