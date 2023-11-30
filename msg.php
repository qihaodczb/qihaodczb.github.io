<?php
include './includes/common.php';
if($_SESSION['islogin']==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
$ltsid=$_GET['ltsid'];
$ltsid=intval($ltsid);
$pwd=$_GET['pwd'];
$sql="select * from Chat where id = ".$ltsid;
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if($row['id']==''){
    sysmsg('聊天室ID不存在');
}else{
    $d=$row['msg'];
$sql="select * from User where id = ".$row['admin'];
$rs=mysqli_query($conn,$sql);
$r = mysqli_fetch_assoc($rs);
                if ($r['admin']=='0'){
                    $a= '100';
                }else if($r['admin']=='1'){
                    $a= '300';                
                }else if($r['admin']=='2'){
                    $a= '500';
                }else if($r['admin']=='3'){
                    $a= '800';                
                }else if($r['admin']=='4'){
                    $a= '1000';                
                }else if($r['admin']=='5'){
                   $a= '2000';                
                }else if($r['admin']=='6'){
                    $a= '9999999999999999999999999999999999';
                }
if($d>=$a){
    sysmsg('聊天室信息条数超标，请群主升级VIP或删除不必要的信息');
}
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
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>
发送信息
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
                    <cite>发送信息</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
              <div class="layui-tab-content" >
                <div class="layui-tab-item layui-show">
                 <form class="am-form am-form-horizontal" action="/api/msg.php?ltsid=<?php echo $ltsid ?>&pwd=<?php echo $pwd?>" method="post" name="loghitoke">
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'></span>聊天室ID
                            </label>
                            <div class="layui-input-block">
                            <input type="text" placeholder="<?php echo $ltsid ?>" class="layui-input" readonly/>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'></span>昵称
                            </label>
                            <div class="layui-input-block">
                            <input type="text" placeholder="<?php echo $_SESSION['name']?>" class="layui-input" readonly/>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>内容
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="nr"  placeholder="请勿发送空白信息"
                                class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <button class="layui-btn" type="submit">
                                发送
                            </button>
                        </div>
                    </form>
                    <div style="height:100px;"></div>
                </div>
    </body>
</html>