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
if($row['yn']=='1'){
    $pwd=$_GET['pwd'];
    if($pwd!=$row['pwd']){
    sysmsg('密码错误');
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
$ip = $_GET['ip']?$_GET['ip']:real_ip();
if($_GET['my']=='del'){
	$id=intval($_GET['id']);
    $sql="select * from Msg where id = ".$id;
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
	if($row["name"]==$_SESSION['name']){
	        $sql="DELETE FROM Msg WHERE id='$id' limit 1";
	        if(mysqli_query($conn, $sql)){
	            $sql = "update `Chat` set msg = msg-1 where `id`='$ltsid'";
                mysqli_query($conn, $sql);
	            echo "<script>alert('撤回成功');window.location.href='./chat.php?ltsid=$ltsid';</script>";
	        }else{
	            sysmsg("Error: " . $sql . "<br>" . mysqli_error($conn));
	        }
	}else{
	     echo "<script>alert('撤回失败');window.location.href='./chat.php?ltsid=$ltsid';</script>";
	}
}
?>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>聊天室列表</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="./assets/css/font.css">
        <link rel="stylesheet" href="./assets/css/index.css">
        <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
        <script src="./assets/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./assets/js/index.js"></script>

    </head>
<script language="JavaScript">  
function Refresh()  
{  
window.location.reload();  
}  
setTimeout('Refresh()',30000);
</script> 
    <body>
        <div class="x-nav">
            <span class="layui-breadcrumb">
                <a href="">首页</a>
                <a>
                    <cite>聊天室</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
                <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
            </a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body ">
                            <form class="layui-form layui-col-space5">
                                <div class="layui-input-inline layui-show-xs-block">
                                    <a class="layui-btn" href="msg.php?ltsid=<?php echo $ltsid?>&pwd=<?php echo $pwd?>" ><i class="layui-icon"></i>发送信息</a>
                                </div>
                            </form>
                            <hr>
                        </div>
                        <div class="layui-card-body ">
                            <table class="layui-table layui-form">
                              <thead>
                                <tr>
                                  <th width="50">昵称</th>
                                  <th>内容</th>
                                  <th width="70">发送时间</th>
                                  <th width="250">操作</th>
                              </thead>
<?php
$sql = 'SELECT * FROM Msg order by 1 desc';
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while($row = mysqli_fetch_assoc($result)) {
        if($ltsid==$row["qid"]){
            if($_SESSION['name']!=$row["name"]){
        ?>
            <tbody class="x-cate">
            <tr cate-id='<?php echo$row['id']?>' fid='0' >
            <td><?php echo$row['name']?></td>
            <td><?php echo$row['txt']?></td>
            <td><?php echo$row['time']?></td>
            <td class="td-manage">
                                  </td>
                                </tr>
            <?php
            }else{
            ?>
            <tbody class="x-cate">
            <tr cate-id='<?php echo$row['id']?>' fid='0' >
            <td><?php echo$row['name']?></td>
            <td><?php echo$row['txt']?></td>
            <td><?php echo$row['time']?></td>
            <td class="td-manage">
                      <button class="layui-btn layui-btn layui-btn-xs"><a href="./chat.php?my=del&id=<?php echo $row['id'] ?>&ltsid=<?php echo $ltsid ?>"><i class="layui-icon" >&#xe642;</i>撤回</button>
                                  </td>
                                </tr>
        <?php
            }
        }
        }
} else {
?>
            <td>暂无信息</td>
                <td>暂无信息</a></td>
                <td class="am-hide-sm-only">暂无信息</td>
               <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                    </div>
                  </div>
                </td>
              </tr>
<?php
}
?>
                              </tbody>
                            </table>
                        </div>
                        <div class="layui-card-body ">
                            <div class="page">
                                <div>
                                    <a class="prev" href="">&lt;&lt;</a>
                                    <span class="current">1</span>
                                    <a class="next" href="">&gt;&gt;</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
          layui.use(['form'], function(){
            form = layui.form;
            
          });

           /*用户-删除*/

          // 分类展开收起的分类的逻辑
          // 
          $(function(){
            $("tbody.x-cate tr[fid!='0']").hide();
            // 栏目多级显示效果
            $('.x-show').click(function () {
                if($(this).attr('status')=='true'){
                    $(this).html('&#xe625;'); 
                    $(this).attr('status','false');
                    cateId = $(this).parents('tr').attr('cate-id');
                    $("tbody tr[fid="+cateId+"]").show();
               }else{
                    cateIds = [];
                    $(this).html('&#xe623;');
                    $(this).attr('status','true');
                    cateId = $(this).parents('tr').attr('cate-id');
                    getCateId(cateId);
                    for (var i in cateIds) {
                        $("tbody tr[cate-id="+cateIds[i]+"]").hide().find('.x-show').html('&#xe623;').attr('status','true');
                    }
               }
            })
          })

          var cateIds = [];
          function getCateId(cateId) {
              $("tbody tr[fid="+cateId+"]").each(function(index, el) {
                  id = $(el).attr('cate-id');
                  cateIds.push(id);
                  getCateId(id);
              });
          }
   
        </script>
    </body>
</html>