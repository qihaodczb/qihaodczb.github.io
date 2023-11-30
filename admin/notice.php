<?php
include '../includes/common.php';
$Admin_login=$_COOKIE['Admin_login'];
if($Admin_login){}else exit("<script>location='./login.php'</script>");
$id=intval($_GET['id']);
$sql="select * from Gg where id = ".$id;
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if($row['id']==''){
    sysmsg('公告不存在');
}
if(isset($_POST['nr'])){
if($admin["xss"]=='0'){
$t=RemoveXSS($_POST['nr']);
}else{
$t=$_POST['nr']; 
}
$sql = "update `Gg` set `txt` ='{$t}' where `id`='$id'";
if (mysqli_query($conn, $sql)) {
    echo "<script>window.location.href='./notice.php?id=$id';</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>
编辑公告
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
                    <cite>编辑公告</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
                <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
            </a>
        </div>
              <div class="layui-tab-content" >
                <div class="layui-tab-item layui-show">
                 <form class="am-form am-form-horizontal" action="./notice.php?id=<?php echo $id?>" method="post" name="loghitoke">
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>公告内容
                            </label>
                            <div class="layui-input-block">
                            <input type="text" name="nr"  value="<?php      
     $sql="SELECT * FROM `Gg` WHERE id='$id' limit 1";
     $result = mysqli_query($conn, $sql);
     if (mysqli_num_rows($result) > 0) {
         // 输出数据
         while($row = mysqli_fetch_assoc($result)) {
             echo $row["txt"];
         }
     } 
     ?>"
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