<?php
include '../includes/common.php';
$Admin_login=$_COOKIE['Admin_login'];
if($Admin_login){}else exit("<script>location='./login.php'</script>");
$id=intval($_GET['id']);
$sql="select * from Chat where id = ".$id;
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if($row['id']==''){
    sysmsg('聊天室不存在');
}
     $sql="SELECT * FROM `Chat` WHERE id='$id' limit 1";
     $result = mysqli_query($conn, $sql);
     $new = mysqli_fetch_assoc($result);
if(isset($_POST['mc'])){
$mc=ltrim($_POST['mc']);
$gly=ltrim($_POST['gly']);
$jj=ltrim($_POST['jj']);
$g1=ltrim($_POST['g1']);
$g2=ltrim($_POST['g2']);
$g3=ltrim($_POST['g3']);
$key=ltrim($_POST['key']);
if($mc==''){
                if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"禁止创建空白聊天室");
exit(json_encode($arr));
}else{
    sysmsg ("禁止创建空白聊天室  <a href='./chat.php?id=$id'>点我返回</a></div>");
}
}elseif($jj==''){
                    if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"禁止创建空白聊天室");
exit(json_encode($arr));
}else{
    sysmsg ("禁止创建空白聊天室  <a href='./chat.php?id=$id'>点我返回</a></div>");
}
}elseif($gly==''){
                    if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"禁止创建空白聊天室");
exit(json_encode($arr));
}else{
    sysmsg ("禁止创建空白聊天室  <a href='./chat.php?id=$id'>点我返回</a></div>");
}
}else{
$id1=$gly;
if($key=='0'){
$sql = "update `Chat` set `name` ='{$mc}',`jj`='{$jj}',`admin`='{$gly}',`gl1`='{$g1}' ,`gl2`='{$g2}',`gl3`='{$g3}' ,`pwd`='0',`yn`='0' where `id`=".$id;
if (mysqli_query($conn, $sql)) {
                    if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"修改成功");
exit(json_encode($arr));
}else{
    sysmsg ("修改成功  <a href='./chat.php?id=$id'>点我返回</a></div>");
}
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}else{
$sql = "update `Chat` set `name` ='{$mc}',`jj`='{$jj}',`admin`='{$gly}',`gl1`='{$g1}' ,`gl2`='{$g2}',`gl3`='{$g3}' ,`pwd`='{$key}',`yn`='1' where `id`=".$id;
if (mysqli_query($conn, $sql)) {
                    if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"修改成功");
exit(json_encode($arr));
}else{
    sysmsg ("修改成功  <a href='./chat.php?id=$id'>点我返回</a></div>");
}
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}   
}
}
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>
编辑聊天室
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
                    <cite>编辑聊天室</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
                <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
            </a>
        </div>
              <div class="layui-tab-content" >
                <div class="layui-tab-item layui-show">
                 <form class="am-form am-form-horizontal" action="./chat.php?id=<?php echo $id?>" method="post" name="loghitoke">
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>聊天室名称
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="mc"  value="<?php echo $new['name']?>"
                                class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>聊天室简介
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="jj"  value="<?php echo $new['jj']?>"
                                class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'></span>超级管理员ID
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="gly"  value="<?php echo $new['admin']?>"
                                class="layui-input">
                            </div>
                        </div>   
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'></span>加密聊天室密码
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="key"  value="<?php echo $new['pwd']?>"
                                class="layui-input">
                            </div>
                        </div>   
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'></span>管理员ID1
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="g1"  value="<?php echo $new['gl1']?>"
                                class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'></span>管理员ID2
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="g2"  value="<?php echo $new['gl2']?>"
                                class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'></span>管理员ID3
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="g3"  value="<?php echo $new['gl3']?>"
                                class="layui-input">
                            </div>
                        </div>
                    <div class="layui-form-item">
                            <button class="layui-btn" type="submit">
                                修改
                            </button>
                        </div>
                    </form>
                    <div style="height:100px;"></div>
                </div>
    </body>
</html>