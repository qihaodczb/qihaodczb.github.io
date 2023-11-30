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
卡密充值
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
                    <cite>卡密充值</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
              <div class="layui-tab-content" >
                <div class="layui-tab-item layui-show">
                 <form class="am-form am-form-horizontal"  name=alipayment action="/pay/epayapi.php" method="post" target="_blank">
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'></span>账号
                            </label>
                            <div class="layui-input-block">
                            <input type="text" placeholder="<?php echo $_SESSION['user'] ?>" class="layui-input" readonly/>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'></span>订单号
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="WIDout_trade_no"  value="<?php echo date("YmdHis").mt_rand(100,999); ?>"
                                class="layui-input"readonly/>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'></span>商品名
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="WIDsubject"  value="极速云聊-充值"
                                class="layui-input"readonly/>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'></span>金额
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="WIDtotal_fee"  value="1"
                                class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <button class="layui-btn" type="submit">
                                充值
                            </button>
                        </div>
                    </form>
                    <div style="height:100px;"></div>
                </div>
    </body>
</html>