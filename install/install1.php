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
echo <<<HTML
        <form class="am-form am-form-horizontal" action="../install/install2.php" method="post" name="loghitoke">
        <div class="layui-form-item">
            <label class="layui-form-label">
            <span class='x-red'></span>数据库地址
            </label>
            <div class="layui-input-block">
            <input type="text" class="layui-input" name="url" value="localhost">
                            </div>
                        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">
            <span class='x-red'></span>数据库名
            </label>
            <div class="layui-input-block">
            <input type="text" class="layui-input" name="db">
                            </div>
                        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">
            <span class='x-red'></span>数据库用户名
            </label>
            <div class="layui-input-block">
            <input type="text" class="layui-input" name="name">
                            </div>
                        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">
            <span class='x-red'></span>数据库密码
            </label>
            <div class="layui-input-block">
            <input type="text" class="layui-input" name="pwd">
                            </div>
                        </div>
        <div class="layui-form-item">
            <button class="layui-btn" type="submit">保存配置</button>
                        </div>
HTML;
}