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
        <title>系统商城</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="./assets/css/font.css">
        <link rel="stylesheet" href="./assets/css/index.css">
        <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
        <script src="./assets/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./assets/js/index.js"></script>

    </head>
    <body>
        <div class="x-nav">
            <span class="layui-breadcrumb">
                <a href="">首页</a>
                <a>
                    <cite>系统商城</cite></a>
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
                            <hr>
                        </div>
                        <div class="layui-card-body ">
                            <table class="layui-table layui-form">
                              <thead>
                                <tr>
                                  <th width="50">商品ID</th>
                                  <th>商品名称</th>
                                  <th>价格</th>
                                  <th width="250">操作</th>
                              </thead>
                                              <tbody class="x-cate">
                                <tr cate-id='1' fid='0' >
                                  <td>1</td>                                  
                                  <td>VIP1</td>
                                  <td>20</td>
                                  <td class="td-manage">
                                    <a class="layui-btn layui-btn layui-btn-xs" href='./api/buy.php?id=1' ><i class="layui-icon">&#xe642;</i>购买</a>
                                  </td>
                                </tr>
                                              <tbody class="x-cate">
                                <tr cate-id='1' fid='0' >
                                  <td>2</td>                                  
                                  <td>VIP2</td>
                                  <td>40</td>
                                  <td class="td-manage">
                                    <a class="layui-btn layui-btn layui-btn-xs" href='./api/buy.php?id=2' ><i class="layui-icon">&#xe642;</i>购买</a>
                                  </td>
                                </tr>                                              <tbody class="x-cate">
                                <tr cate-id='1' fid='0' >
                                  <td>3</td>                                  
                                  <td>VIP3</td>
                                  <td>60</td>
                                  <td class="td-manage">
                                    <a class="layui-btn layui-btn layui-btn-xs" href='./api/buy.php?id=3' ><i class="layui-icon">&#xe642;</i>购买</a>
                                  </td>
                                </tr>                                              <tbody class="x-cate">
                                <tr cate-id='1' fid='0' >
                                  <td>4</td>                                  
                                  <td>SVIP1</td>
                                  <td>80</td>
                                  <td class="td-manage">
                                    <a class="layui-btn layui-btn layui-btn-xs" href='./api/buy.php?id=4' ><i class="layui-icon">&#xe642;</i>购买</a>
                                  </td>
                                </tr>                                              <tbody class="x-cate">
                                <tr cate-id='1' fid='0' >
                                  <td>5</td>                                  
                                  <td>SVIP2</td>
                                  <td>100</td>
                                  <td class="td-manage">
                                    <a class="layui-btn layui-btn layui-btn-xs" href='./api/buy.php?id=5' ><i class="layui-icon">&#xe642;</i>购买</a>
                                  </td>
                                </tr>                                              <tbody class="x-cate">
                                <tr cate-id='1' fid='0' >
                                  <td>6</td>                                  
                                  <td>SVIP3</td>
                                  <td>120</td>
                                  <td class="td-manage">
                                    <a class="layui-btn layui-btn layui-btn-xs" href='./api/buy.php?id=6' ><i class="layui-icon">&#xe642;</i>购买</a>
                                  </td>
                                </tr>
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