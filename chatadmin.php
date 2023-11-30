<?php
include './includes/common.php';
if($_SESSION['islogin']==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
$ltsid=$_GET['ltsid'];
$ltsid=intval($ltsid);
$sql="select * from Chat where id = ".$ltsid;
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if($row['id']==''){
    sysmsg('聊天室ID不存在');
}
if($row['admin']==$_SESSION['id']||$row['gl1']==$_SESSION['id']||$row['gl2']==$_SESSION['id']||$row['gl3']==$_SESSION['id']){
    if($row['admin']==$_SESSION['id']){
        $qx='0';
    }else{
        $qx='1';
    }
}else{
    sysmsg('您不是管理员');
}
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
$ip = $_GET['ip']?$_GET['ip']:real_ip();
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>
聊天室后台
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
                    <cite>聊天室后台</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
              <div class="layui-tab-content" >
                <div class="layui-tab-item layui-show">
                 <form class="am-form am-form-horizontal" action="/api/chatadmin.php?ltsid=<?php echo$ltsid?>&id=<?php echo$row['admin']?>&id1=<?php echo$row['gl1']?>&id2=<?php echo$row['gl2']?>&id3=<?php echo$row['gl3']?>" method="post" name="loghitoke">
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'></span>信息条数
                            </label>
                            <div class="layui-input-block">
                            <input type="text" placeholder="<?php echo $row['id']?>" class="layui-input" readonly/>
                            </div>
                        </div>
                       <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>聊天室名称
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="mc"  value="<?php echo $row['name']?>"
                                class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>聊天室简介
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="jj"  value="<?php echo $row['jj']?>"
                                class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>聊天室密码
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="pwd"  value="<?php echo $row['pwd']?>"
                                class="layui-input">
                            </div>
                        </div>     
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'></span>信息条数
                            </label>
                            <div class="layui-input-block">
                            <input type="text" placeholder="<?php echo $row['msg']?>" class="layui-input" readonly/>
                            </div>
                        </div>
                        <?php
                        if($qx=='0'){
                            ?>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>超级管理员
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="gly"  value="<?php echo $row['admin']?>"
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
                            <input type="text" name="g1"  value="<?php echo $row['gl1']?>"
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
                            <input type="text" name="g2"  value="<?php echo $row['gl2']?>"
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
                            <input type="text" name="g3"  value="<?php echo $row['gl3']?>"
                                class="layui-input">
                            </div>
                        </div>
            <?php 
            }
                        }
            ?>
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