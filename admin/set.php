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
<?php
include '../includes/common.php';
$Admin_login=$_COOKIE['Admin_login'];
if($Admin_login){}else exit("<script>location='./login.php'</script>");
$mod=$_GET['mod'];
if($mod=='jc'){
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>
基础设置
        </title>
    </head>
    <body>
       <div class="x-nav">
            <span class="layui-breadcrumb">
                <a href="">首页</a>
                <a>
                    <cite>基础设置</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
              <div class="layui-tab-content" >
                <div class="layui-tab-item layui-show">
                 <form class="am-form am-form-horizontal" action="../admin/setpost.php?mod=jc" method="post" name="loghitoke">
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>网站名
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="title"  value="<?php echo $admin["title"]?>"
                                class="layui-input">
                            </div>
                        </div>                        
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>站长QQ
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="qq"  value="<?php echo $admin["qq"]?>"
                                class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>ip记录（开启输入1，不开启输入0）
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="ip"  value="<?php echo $admin["ip"]?>"
                                class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>xss过滤（开启输入1，不开启输入0）
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="xss"  value="<?php echo $admin["xss"]?>"
                                class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <button class="layui-btn" type="submit">
                                提交
                            </button>
                        </div>
                    </form>
                    <div style="height:100px;"></div>
                </div>
    </body>
</html>
<?php
}elseif($mod=='gj'){
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>
高级设置
        </title>
    </head>
    <body>
       <div class="x-nav">
            <span class="layui-breadcrumb">
                <a href="">首页</a>
                <a>
                    <cite>高级设置</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
              <div class="layui-tab-content" >
                <div class="layui-tab-item layui-show">
                 <form class="am-form am-form-horizontal" action="../admin/setpost.php?mod=gj" method="post" name="loghitoke">
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>弹窗公告
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="tc"  value="<?php echo $admin["tc"]?>"
                                class="layui-input">
                            </div>
                        </div>                        
                        <div class="layui-form-item">
                            <button class="layui-btn" type="submit">
                                提交
                            </button>
                        </div>
                    </form>
                    <div style="height:100px;"></div>
                </div>
    </body>
</html>
<?php
}elseif($mod=='pwd'){
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>
修改密码
        </title>
    </head>
    <body>
       <div class="x-nav">
            <span class="layui-breadcrumb">
                <a href="">首页</a>
                <a>
                    <cite>修改密码</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
              <div class="layui-tab-content" >
                <div class="layui-tab-item layui-show">
                 <form class="am-form am-form-horizontal" action="../admin/setpost.php?mod=pwd" method="post" name="loghitoke">
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>用户名
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="user"  value="<?php echo $admin["user"]?>"
                                class="layui-input">
                            </div>
                        </div>                        
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>密码
                            </label>
                            <div class="layui-input-block">
                            <input type="password" name="pwd"  value="<?php echo $admin["pwd"]?>"
                                class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <button class="layui-btn" type="submit">
                                提交
                            </button>
                        </div>
                    </form>
                    <div style="height:100px;"></div>
                </div>
    </body>
</html>
<?php
}elseif($mod=='pay'){
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>
支付接口
        </title>
    </head>
    <body>
       <div class="x-nav">
            <span class="layui-breadcrumb">
                <a href="">首页</a>
                <a>
                    <cite>支付接口</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
              <div class="layui-tab-content" >
                <div class="layui-tab-item layui-show">
                 <form class="am-form am-form-horizontal" action="../admin/setpost.php?mod=pay" method="post" name="loghitoke">
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>易支付支付url
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="url"  value="<?php echo $admin["payurl"]?>"
                                class="layui-input">
                            </div>
                        </div>                        
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>易支付用户ID
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="id"  value="<?php echo $admin["payid"]?>"
                                class="layui-input">
                            </div>
                        </div>                        
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>易支付用户密匙
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="key"  value="<?php echo $admin["paykey"]?>"
                                class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <button class="layui-btn" type="submit">
                                设置
                            </button>
                        </div>
                    </form>
                    <div style="height:100px;"></div>
                </div>
    </body>
</html>
<?php
}
?>