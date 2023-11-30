<?php
include '../includes/common.php';
$Admin_login=$_COOKIE['Admin_login'];
if($Admin_login){}else exit("<script>location='./login.php'</script>");
if($_GET['my']=='del'){
	$id=intval($_GET['id']);
	$sql="DELETE FROM Gg WHERE id='$id' limit 1";
	if(mysqli_query($conn, $sql)){
		echo "<script>alert('删除公告成功');window.location.href='../admin/noticelist.php';</script>";
	}
	else echo "Error: " . $sql . "<br>" . mysqli_error($conn);exit;
}
?>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>公告列表</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="../assets/css/font.css">
        <link rel="stylesheet" href="../assets/css/index.css">
        <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
        <script src="../assets/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="../assets/js/index.js"></script>
    </head>
    <body>
        <div class="x-nav">
            <span class="layui-breadcrumb">
                <a href="">首页</a>
                <a>
                    <cite>公告列表</cite></a>
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
                                    <a class="layui-btn" href="./noticeadd.php" ><i class="layui-icon"></i>添加公告</a>
                                </div>
                            </form>
                            <hr>
                        </div>
                        <div class="layui-card-body ">
                            <table class="layui-table layui-form">
                              <thead>
                                <tr>
                                  <th width="50">ID</th>
                                  <th>内容</th>
                                  <th width="250">操作</th>
                              </thead>
                              <?php
$sql = 'SELECT * FROM Gg order by 1 asc';
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while($row = mysqli_fetch_assoc($result)) {
        ?>
                                              <tbody class="x-cate">
                                <tr cate-id='<?php echo$row['id']?>' fid='0' >
            <td><?php echo$row['id']?></td>
                <td><?php echo$row['txt']?></a></td>
                                  <td class="td-manage">
                                    <button class="layui-btn layui-btn layui-btn-xs" onclick="xadmin.open('编辑','./notice.php?id=<?php echo $row['id'] ?>')" ><i class="layui-icon">&#xe642;</i>编辑</button>
                                    <a class="layui-btn layui-btn layui-btn-xs" href='./noticelist.php?id=<?php echo $row['id'] ?>&my=del' ><i class="layui-icon">&#xe642;</i>删除</a>
                                  </td>
                                </tr>
                                <?php
        }
} else {
?>
                                      <tbody class="x-cate">
                                <tr cate-id='9' fid='0' >
                                  <td>暂无</td>
                                  <td>暂无</td>                                  
                                  <td>暂无</td>        
                                  <td>暂无</td>
                                  <td>暂无</td>        
                                  <td>暂无</td>                                  
                                  <td>暂无</td>                                   
                                  <td>暂无</td>        
                                  <td>暂无</td>
                                  <td class="td-manage">
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