<?php
include '../includes/common.php';
include '../includes/version.php';
$cloudversion = file_get_contents('https://update.bcmao.tk/version.txt');
$Admin_login=$_COOKIE['Admin_login'];
if($Admin_login){}else exit("<script>location='login.php'</script>");
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>
在线更新
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
                <a href="list.php">首页</a>
                <a>
                    <cite>在线更新</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
              <div class="layui-tab-content" >
                <div class="layui-tab-item layui-show">
                    <form class="layui-form layui-form-pane" action="">
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'></span>本地版本
                            </label>
                            <div class="layui-input-block">
                            <input type="text" placeholder="V<?php echo $version ?>" class="layui-input" readonly/>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'></span>云端版本
                            </label>
                            <div class="layui-input-block">
                            <input type="text" placeholder="V<?php echo $cloudversion?>" class="layui-input" readonly/>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'></span>温馨提示
                            </label>
                            <div class="layui-input-block">
                            <input type="text" placeholder="如果云端版本显示不出来可能是作者没钱续费服务器了，可以赞助或直接点获取源码/立即更新去gitee下载源码或者更新（（（求赞助吖，QQ3395382918（（（" class="layui-input" readonly/>
                            </div>
                        </div>
                        <?php
                        if($version!=$cloudversion){
                        ?>
                        <div class="layui-form-item">
                            <a class="layui-btn" href="./update.php?mod=up">
                                立即更新
                            </a>
                        <?php
                        }
                        ?>
                            <a class="layui-btn" href="https://gitee.com/speed-studio/phpchat">
                                获取源码
                            </a>
                        </div>
                    </form>
                    <div style="height:100px;"></div>
                </div>
    </body>
</html>
<?php
if($_GET["mod"]=='up'){
if($version!=$cloudversion){
function downFile($url,$path){
    $arr=parse_url($url);
    $fileName=basename($arr['path']);
    $file=file_get_contents($url);
    file_put_contents($path.$fileName,$file);
}
downFile("https://update.bcmao.tk/up.zip","../");
$zip = new ZipArchive();
$res = $zip->open('../up.zip');
if($res)
{
    // 解压缩文件到指定目录
    $zip->extractTo('../');
    $zip->close();
    unlink("../up.zip");
}
}
}
?>