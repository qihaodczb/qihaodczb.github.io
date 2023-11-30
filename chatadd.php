<?php
include './includes/common.php';
if($_SESSION['islogin']==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
$sql="select * from User where user = '".$_SESSION['user']."'";
$rs=mysqli_query($conn,$sql);
$res = mysqli_fetch_assoc($rs);
$_SESSION['id'] = $res['id'];
$_SESSION['name'] = $res['name'];
$_SESSION['money'] = $res['money'];
$_SESSION['admin'] = $res['admin'];
$_SESSION['qq'] = $res['qq'];
$_SESSION['zt'] = $res['zt'];
$_SESSION['lts'] = $res['lts'];
$_SESSION['ylts'] = $res['ylts'];
if($res["zt"]=='1'){
    exit(sysmsg('当前帐户已被封禁<br/>详情请咨询QQ:'.$admin['qq']."<br/>请后续规范使用！"));
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>
创建聊天室
        </title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="./assets/css/index.css" media="all">        
        <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
        <script src="./assets/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./assets/js/index.js"></script>
    </head>
    <body>
       <div class="x-nav">
            <span class="layui-breadcrumb">
                <a href="">首页</a>
                <a>
                    <cite>创建聊天室</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
                <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
            </a>
        </div>
              <div class="layui-tab-content" >
                <div class="layui-tab-item layui-show">
                 <form class="am-form am-form-horizontal" action="/api/chatadd.php" method="post" name="loghitoke">
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'></span>可创建聊天室
                            </label>
                            <div class="layui-input-block">
                            <input type="text" placeholder="<?php echo $_SESSION['lts']?>" class="layui-input" readonly/>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'></span>已创建聊天室
                            </label>
                            <div class="layui-input-block">
                            <input type="text" placeholder="<?php echo $_SESSION['ylts']?>" class="layui-input" readonly/>
                            </div>
                        </div>
            <?php 
            if($_SESSION['lts']!='0'){
            ?>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>聊天室名称
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="mc"  placeholder="请勿填写空白信息"
                                class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>聊天室简介
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="jj"  placeholder="请勿填写空白信息"
                                class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'></span>超级管理员ID
                            </label>
                            <div class="layui-input-block">
                            <input type="text" placeholder="<?php echo $_SESSION['id']?>" class="layui-input" readonly/>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'></span>加密聊天室密码
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="key"  placeholder="不需要请留空"
                                class="layui-input">
                            </div>
                        </div>   
            <?php 
            if($_SESSION['admin']>='1'){
            ?>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>管理员ID1
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="g1"  placeholder="可以留空"
                                class="layui-input">
                            </div>
                        </div>
            <?php 
            }
            if($_SESSION['admin']>='2'){
            ?>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>管理员ID2
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="g2"  placeholder="可以留空"
                                class="layui-input">
                            </div>
                        </div>
            <?php 
            }
            if($_SESSION['admin']>='3'){
            ?>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>管理员ID3
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="g3"  placeholder="可以留空"
                                class="layui-input">
                            </div>
                        </div>
            <?php 
            }
            ?>
                    <div class="layui-form-item">
                            <button class="layui-btn" type="submit">
                                创建
                            </button>
                        </div>
            <?php 
            }
            ?>
                    </form>
                    <div style="height:100px;"></div>
                </div>
    </body>
</html>