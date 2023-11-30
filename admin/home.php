<?php
include '../includes/common.php';
include '../includes/version.php';
$cloudversion = file_get_contents('https://update.bcmao.tk/version.txt');
$Admin_login=$_COOKIE['Admin_login'];
if($Admin_login){}else exit("<script>location='login.php'</script>");
$program_char = "utf8" ;
mysqli_set_charset($conn,$program_char);  //输出中文格式 否则乱码
$sql = "SELECT COUNT(*) FROM Msg"; //获取某一张表的所有数据
$zyvalue = $conn->query($sql);  
	while ($rownumval=$zyvalue->fetch_assoc()) {   //输出每一行数据 
		$xxts=$rownumval['COUNT(*)']; //获取数据库总条数
	} 
$sql = "SELECT COUNT(*) FROM Gg"; //获取某一张表的所有数据
$zyvalue = $conn->query($sql);  
	while ($rownumval=$zyvalue->fetch_assoc()) {   //输出每一行数据 
		$ggts=$rownumval['COUNT(*)']; //获取数据库总条数
	} 
$sql = "SELECT COUNT(*) FROM Chat"; //获取某一张表的所有数据
$zyvalue = $conn->query($sql);  
	while ($rownumval=$zyvalue->fetch_assoc()) {   //输出每一行数据 
		$ltsts=$rownumval['COUNT(*)']; //获取数据库总条数
	} 
$sql = "SELECT COUNT(*) FROM Km"; //获取某一张表的所有数据
$zyvalue = $conn->query($sql);  
	while ($rownumval=$zyvalue->fetch_assoc()) {   //输出每一行数据 
		$kmts=$rownumval['COUNT(*)']; //获取数据库总条数
	} 
$sql = "SELECT COUNT(*) FROM User"; //获取某一张表的所有数据
$zyvalue = $conn->query($sql);  
	while ($rownumval=$zyvalue->fetch_assoc()) {   //输出每一行数据 
		$yhts=$rownumval['COUNT(*)']; //获取数据库总条数
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
        <link rel="stylesheet" href="../assets/css/index.css">
        <link rel="stylesheet" href="../assets/css/iconfont.css">
        <script type="text/javascript" src="../assets/js/index.js"></script>
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/survey.js"></script>
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
                            <blockquote class="layui-elem-quote">欢迎管理员：
                                <span class="x-red" ><?php echo $admin['user']?></span>
                                <span id="time"></span>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header">数据统计</div>
                        <div class="layui-card-body ">
                            <ul class="layui-row layui-col-space10 layui-this x-admin-carousel x-admin-backlog">
                                <li class="layui-col-md2 layui-col-xs6">
                                    <a href="javascript:;" class="x-admin-backlog-body">
                                        <h3>用户数量</h3>
                                        <p>
                                            <cite><?php echo $yhts?></cite></p>
                                    </a>
                                </li>
                                <li class="layui-col-md2 layui-col-xs6">
                                    <a href="javascript:;" class="x-admin-backlog-body">
                                        <h3>聊天室数量</h3>
                                        <p>
                                            <cite><?php echo $ltsts?></cite></p>
                                    </a>
                                </li>
                                <li class="layui-col-md2 layui-col-xs6">
                                    <a href="javascript:;" class="x-admin-backlog-body">
                                        <h3>消息总数</h3>
                                        <p>
                                            <cite><?php echo $xxts?></cite></p>
                                    </a>
                                </li>
                                <li class="layui-col-md2 layui-col-xs6">
                                    <a href="javascript:;" class="x-admin-backlog-body">
                                        <h3>公告数量</h3>
                                        <p>
                                            <cite><?php echo $ggts?></cite></p>
                                    </a>
                                </li>
                                <li class="layui-col-md2 layui-col-xs6">
                                    <a href="javascript:;" class="x-admin-backlog-body">
                                        <h3>卡密数量</h3>
                                        <p>
                                            <cite><?php echo $kmts?></cite></p>
                                    </a>
                                </li>
                                <li class="layui-col-md2 layui-col-xs6 ">
                                    <a href="javascript:;" class="x-admin-backlog-body">
                                        <h3>当前版本</h3>
                                        <p>
                                            <cite><?php echo $version?></cite></p>
                                    </a>
                                </li>
                            </ul>
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
                                    <th colspan="4" scope="col">服务器信息</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>服务器IP地址</td>
                                    <td><?php echo gethostbyname($_SERVER['HTTP_HOST'])?></td>
                                </tr>
                                <tr>
                                    <td>服务器域名</td>
                                    <td><?php echo $_SERVER['HTTP_HOST']?></td>

                                </tr>
                                <tr>
                                    <td>服务器端口</td>
                                    <td><?php echo $_SERVER['SERVER_PORT']?></td>
                                </tr>
                                <tr>
                                    <td>本程序所在文件夹 </td>
                                    <td><?php echo getcwd();?></td>
                                </tr>                       
                                <tr>
                                    <td>PHP版本</td>
                                    <td><?php echo PHP_VERSION?></td>
                                </tr>
                                <tr>
                                    <td>服务器操作系统 </td>
                                    <td><?php echo php_uname()?></td>
                                </tr>
                                <tr>
                                    <td>服务器语言</td>
                                    <td><?php echo $_SERVER['HTTP_ACCEPT_LANGUAGE']?></td>
                                </tr>
                                <tr>
			<td>程序最大运行时间：</td><td><?php echo ini_get('max_execution_time') ?></td>
                                </tr>
                                <tr>
			<td>POST许可：</td><td><?php echo ini_get('post_max_size'); ?></td>
                                </tr>
                                <tr>
			<td>文件上传许可：</td><td><?php echo ini_get('upload_max_filesize'); ?></td>
                                </tr>
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

    <script src="../assets/js/echarts.min.js"></script>
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
    <script src="../assets/js/fontscroll.js"></script>

</html>