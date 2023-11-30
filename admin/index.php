<?php
include '../includes/common.php';
include '../includes/version.php';
$cloudversion = file_get_contents('https://update.bcmao.tk/version.txt');
$notice = file_get_contents('https://update.bcmao.tk/notice.txt');
$Admin_login=$_COOKIE['Admin_login'];
if($Admin_login){}else exit("<script>location='login.php'</script>");
?>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $admin["title"] ?>-后台中心</title>
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="stylesheet" href="../assets/css/font.css">
        <link rel="stylesheet" href="../assets/css/index.css">
        <link rel="stylesheet" href="../assets/css/iconfont.css">
        <script src="../assets/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="../assets/js/index.js"></script>

    </head>
    <body class="index">
        <!-- 顶部开始 -->
        <div class="container">
            <div class="logo">
                <a href="./index.php"><?php echo $admin["title"] ?></a></div>
            <div class="left_open">
                <a><i title="展开左侧栏" class="iconfont">&#xe699;</i></a>
            </div>
                        <ul class="layui-nav right" lay-filter="">
                <li class="layui-nav-item">
                    <a href="javascript:;"><?php echo $admin['user']?></a>
                    <dl class="layui-nav-child">
                        <!-- 二级菜单 -->
                        <dd>
                            <a onclick="xadmin.open('修改密码','../admin/set.php?mod=pwd')">修改密码</a></dd>
                        <dd>
                            <a href="../admin/login.php?logout">退出登录</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item to-index">
                    <a href="https://wpa.qq.com/msgrd?v=3&uin=3395382918&site=qq&menu=yes">联系作者</a></li>
            </ul>



        </div>
        <!-- 顶部结束 -->
        <!-- 中部开始 -->
        <!-- 左侧菜单开始 -->
        <div class="left-nav">
            <div id="side-nav">
                <ul id="nav">
                    <li>
                    <li class="layui-nav-item">
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="用户管理">&#xe6a2;</i>
                            <cite>用户管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('用户列表','../admin/userlist.php')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>用户列表</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('添加用户','../admin/useradd.php')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>添加用户</cite></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="卡密管理">&#xe70c;</i>
                            <cite>卡密管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('卡密列表','../admin/kmlist.php')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>卡密列表</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('添加卡密','../admin/kmadd.php')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>添加卡密</cite></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="聊天室管理">&#xe70c;</i>
                            <cite>聊天室管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('聊天室列表','../admin/chatlist.php')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>聊天室列表</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('添加聊天室','../admin/chatadd.php')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>添加聊天室</cite></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="公告管理">&#xe70c;</i>
                            <cite>公告管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('公告列表','../admin/noticelist.php')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>公告列表</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('添加公告','../admin/noticeadd.php')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>添加公告</cite></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="系统管理">&#xe70c;</i>
                            <cite>系统管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('网站设置','../admin/set.php?mod=jc')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>网站设置</cite></a>
                            </li>
                            <li>
                            <a onclick="xadmin.add_tab('高级设置','../admin/set.php?mod=gj')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>高级设置</cite></a>
                            </li>
                            <li>
                            <a onclick="xadmin.add_tab('修改密码','../admin/set.php?mod=pwd')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>修改密码</cite></a>
                            </li>
                            <li>
                            <a onclick="xadmin.add_tab('支付设置','../admin/set.php?mod=pay')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>支付设置</cite></a>
                            </li>
                            <li>
                            <a onclick="xadmin.add_tab('API文档','https://www.yuque.com/phpchat/api')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>API文档</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('在线更新','../admin/update.php')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>在线更新</cite></a>
                            </li>
                        </ul>
                    </li>
                    <li>
            </div>
        </div>
        <!-- <div class="x-slide_left"></div> -->
        <!-- 左侧菜单结束 -->
        <!-- 右侧主体开始 -->
        <div class="page-content">
            <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
                <ul class="layui-tab-title">
                    <li class="home">
                        <i class="layui-icon">&#xe68e;</i>首页</li></ul>
                <div class="layui-unselect layui-form-select layui-form-selected" id="tab_right">
                    <dl>
                        <dd data-type="this">关闭当前</dd>
                        <dd data-type="other">关闭其它</dd>
                        <dd data-type="all">关闭全部</dd></dl>
                </div>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <iframe src='../admin/home.php' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
                    </div>
                </div>
                <div id="tab_show"></div>
            </div>
        </div>
        <div class="page-content-bg"></div>
        <style id="theme_style"></style>
        <!-- 右侧主体结束 -->
        <!-- 中部结束 -->

    </body>
    <script>
    <?php
    if($notice!='0'){
    ?>
layui.use('layer', function(){
var layer = layui.layer;
layer.open({
  title: '云端公告'
  ,content: '<?php echo $notice ?>'
});    
});
    <?php
    }elseif($version!=$cloudversion){
    ?>
layui.use('layer', function(){
var layer = layui.layer;
layer.open({
  title: '温馨提示'
  ,content: '您的聊天室版本不是最新版本！请更新您的聊天室版本！'
});    
});
<?php
}
?>
</script>
    <script src="../assets/js/jquery.min.js"></script>

</html>

<script>
    window.onload=function () {
        var click=document.getElementById('new-nav');
        var news=document.getElementById('news');
        click.addEventListener('mousemove',function () {
            news.style.display='block';
        });
        click.addEventListener('mouseout',function () {
            news.style.display='none';
        });

        var gonggao=document.getElementById('gonggao');
        var gonggaos=document.getElementById('gonggaos');
        gonggao.addEventListener('mousemove',function () {
            gonggaos.style.display='block';
        });
        gonggao.addEventListener('mouseout',function () {
            gonggaos.style.display='none';
        });
    }




</script>