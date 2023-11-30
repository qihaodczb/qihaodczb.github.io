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
<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>首页</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <!--<link rel="stylesheet" href="./css/font.css">-->
        <link rel="stylesheet" href="./assets/css/index.css">
        <link rel="stylesheet" href="./assets/css/iconfont.css">
        <script type="text/javascript" src="./assets/js/index.js"></script>
        <script src="./assets/js/jquery.js"></script>
        <script src="./assets/js/jquery.min.js"></script>
        <script src="./assets/js/survey.js"></script>
        <style>
            #FontScroll{
                width: 100%;
                height: 245px;
                overflow: hidden;
            }
            #FontScroll ul li{
                height: 32px;
                width: 100%;
                color: #ffffff;
                line-height: 32px;
                overflow: hidden;
                font-size: 14px;
            }
            #FontScroll ul li i{
                color: red;
            }
            .layui-table td, .layui-table th{
                min-width: auto !important;
            }
        </style>
    </head>
    <body>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body ">
                            <blockquote class="layui-elem-quote">欢迎用户：
                                <span class="x-red" ><?php echo $_SESSION['user']?></span>
                                <span id="time"></span>
                            </blockquote>
                        </div>
                    </div>
                </div>
               <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header">系统信息</div>
                        <div class="layui-card-body ">

                            <table class="layui-table">
                                <thead>
                                <tr>
                                    <th colspan="4" scope="col">公告</th>
                                </tr>
                                </thead>
                                <tbody>
<?php 
$sql = 'SELECT * FROM Gg order by 1 asc';
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // 输出数据
   while($row = mysqli_fetch_assoc($result)) {
       ?>
                                <tr>
                                    <td>公告<?php echo $row['id']?></td>
                                    <td><?php echo $row['txt']?></td>
                                </tr>
        <?php
        }
}else{
    ?>
                                <tr>
                                    <td>公告1</td>
                                    <td>暂无公告</td>
                                </tr>   
                                <?php
}
?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body ">
                            <p style="text-align: center;"> Copyright ©2021  All Rights Reserved.</p>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        </div>
    </body>

    <script src="./assets/js/echarts.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('.myscroll').myScroll({
                speed: 60, //数值越大，速度越慢
                rowHeight: 38 //li的高度
            });

        });

        function getTime(){
            var myDate = new Date();
            var myYear = myDate.getFullYear(); //获取完整的年份(4位,1970-????)
            var myMonth = myDate.getMonth()+1; //获取当前月份(0-11,0代表1月)
            var myToday = myDate.getDate(); //获取当前日(1-31)
            var myDay = myDate.getDay(); //获取当前星期X(0-6,0代表星期天)
            var myHour = myDate.getHours(); //获取当前小时数(0-23)
            var myMinute = myDate.getMinutes(); //获取当前分钟数(0-59)
            var mySecond = myDate.getSeconds(); //获取当前秒数(0-59)
            var week = ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'];
            var nowTime;

            nowTime = myYear+'-'+fillZero(myMonth)+'-'+fillZero(myToday)+'&nbsp;&nbsp;'+fillZero(myHour)+':'+fillZero(myMinute)+':'+fillZero(mySecond)+'&nbsp;&nbsp;'+week[myDay]+'&nbsp;&nbsp;';
            //console.log(nowTime);
            $('#time').html(nowTime);
        };
        function fillZero(str){
            var realNum;
            if(str<10){
                realNum	= '0'+str;
            }else{
                realNum	= str;
            }
            return realNum;
        }
        setInterval(getTime,1000);
    </script>
    <script src="./assets/js/fontscroll.js"></script>

</html>