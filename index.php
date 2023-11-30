<?php
include './includes/common.php';
include './includes/version.php';
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
$cloudversion = file_get_contents('https://update.bcmao.tk/version.txt');
?>
<!doctype html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $admin["title"] ?></title>
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="stylesheet" href="./assets/css/font.css">
        <link rel="stylesheet" href="./assets/css/index.css">
        <link rel="stylesheet" href="./assets/css/iconfont.css">
        <script src="./assets/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./assets/js/index.js"></script>

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
                    <a href="javascript:;"><?php echo $_SESSION['user']?></a>
                    <dl class="layui-nav-child">
                        <!-- 二级菜单 -->
                        <dd>
                            <a onclick="xadmin.open('个人信息','user.php')">个人信息</a></dd>         
                        <dd>
                            <a onclick="xadmin.open('个人信息','userset.php')">修改密码</a></dd>
                        <dd>
                            <a href="./api/login.php?logout">退出登录</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item to-index">
                    <a href="https://wpa.qq.com/msgrd?v=3&uin=<?php echo $admin["qq"] ?>&site=qq&menu=yes">联系站长</a></li>
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
                            <i class="iconfont left-nav-li" lay-tips="聊天室管理">&#xe6a2;</i>
                            <cite>我的聊天室</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('聊天室列表','list.php')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>聊天室列表</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('创建聊天室','chatadd.php')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>创建聊天室</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('管理聊天室','chatadminlist.php')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>管理聊天室</cite></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="用户中心">&#xe70c;</i>
                            <cite>用户中心</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('个人信息','user.php')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>个人信息</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('我的商城','buy.php')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>我的商城</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('卡密充值','km.php')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>卡密充值</cite></a>                           
                                    </li>
                            <li>
                                <a onclick="xadmin.add_tab('在线充值','cz.php')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>在线充值</cite></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                    <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="获取源码">&#xe6a2;</i>
                    <i onclick="xadmin.add_tab('获取源码','https://gitee.com/speed-studio/phpchat')">
                                    <cite>获取源码</cite></i>
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
                        <iframe src='./home.php' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
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
    if($version!=$cloudversion){
    ?>
layui.use('layer', function(){
var layer = layui.layer;
layer.open({
  title: '温馨提示'
  ,content: '您的聊天室版本不是最新版本！请更新您的聊天室版本！'
});    
});
<?php
}else if($admin["tc"]!='0'){
    ?>
layui.use('layer', function(){
var layer = layui.layer;
layer.open({
  title: '弹窗公告'
  ,content: '<?php echo $admin["tc"]?>'
});    
});
<?php
}
?>
</script>
    <script src="./assets/js/jquery.min.js"></script>

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

