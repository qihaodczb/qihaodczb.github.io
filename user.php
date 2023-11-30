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
个人信息
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
                    <cite>用户中心</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
              <div class="layui-tab-content" >
                <div class="layui-tab-item layui-show">
                    <form class="layui-form layui-form-pane" action="">
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'></span>用户ID
                            </label>
                            <div class="layui-input-block">
                            <input type="text" placeholder="<?php echo $_SESSION['id']?>" class="layui-input" readonly/>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'></span>账号
                            </label>
                            <div class="layui-input-block">
                            <input type="text" placeholder="<?php echo $_SESSION['user']?>" class="layui-input" readonly/>
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
                                <span class='x-red'></span>QQ
                            </label>
                            <div class="layui-input-block">
                            <input type="text" placeholder="<?php echo $_SESSION['qq']?>" class="layui-input" readonly/>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>余额
                            </label>
                            <div class="layui-input-block">
                            <input type="text" placeholder="<?php echo $_SESSION['money']?>" class="layui-input" readonly/>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>可创建聊天室
                            </label>
                            <div class="layui-input-block">
                            <input type="text" placeholder="<?php echo $_SESSION['lts']?>" class="layui-input" readonly/>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>已创建聊天室
                            </label>
                            <div class="layui-input-block">
                            <input type="text" placeholder="<?php echo $_SESSION['ylts']?>" class="layui-input" readonly/>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>聊天室最多信息
                            </label>
                            <div class="layui-input-block">
                            <input type="text" placeholder="<?php 
                if ($_SESSION['admin']=='0'){
                    echo '100';
                }else if($_SESSION['admin']=='1'){
                    echo '300';                
                }else if($_SESSION['admin']=='2'){
                    echo '500';
                }else if($_SESSION['admin']=='3'){
                    echo '800';                
                }else if($_SESSION['admin']=='4'){
                    echo '1000';                
                }else if($_SESSION['admin']=='5'){
                    echo '2000';                
                }else if($_SESSION['admin']=='6'){
                    echo '无限';
                }
                ?>" class="layui-input" readonly/>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>我的权限
                            </label>
                            <div class="layui-input-block">
                            <input type="text" placeholder="<?php 
                if ($_SESSION['admin']=='0'){
                    echo '普通用户';
                }else if($_SESSION['admin']=='1'){
                    echo 'VIP1';                
                }else if($_SESSION['admin']=='2'){
                    echo 'VIP2';
                }else if($_SESSION['admin']=='3'){
                    echo 'VIP3';                
                }else if($_SESSION['admin']=='4'){
                    echo 'SVIP1';                
                }else if($_SESSION['admin']=='5'){
                    echo 'SVIP2';                
                }else if($_SESSION['admin']=='6'){
                    echo 'SVIP3';
                }
                ?>" class="layui-input" readonly/>
                            </div>
                        </div>
                        <?php
                $ed=$_SESSION['ylts']+$_SESSION['lts'];
                if($_SESSION['admin']=='1'){
                    if($ed<'6'){
                        ?>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>温馨提示
                            </label>
                            <div class="layui-input-block">
                            <input type="text" placeholder="当前VIP1等级您还可以激活更多聊天室额度" class="layui-input" readonly/>
                            </div>
                        </div>   
                <?php
                    }               
                }else if($_SESSION['admin']=='2'){
                    if($ed<'10'){
                        ?>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>温馨提示
                            </label>
                            <div class="layui-input-block">
                            <input type="text" placeholder="当前VIP2等级您还可以激活更多聊天室额度" class="layui-input" readonly/>
                            </div>
                        </div>   
                <?php
                    }      
                }else if($_SESSION['admin']=='3'){
                    if($ed<'15'){
                        ?>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>温馨提示
                            </label>
                            <div class="layui-input-block">
                            <input type="text" placeholder="当前VIP3等级您还可以激活更多聊天室额度" class="layui-input" readonly/>
                            </div>
                        </div>   
                <?php
                    }                     
                }else if($_SESSION['admin']=='4'){
                    if($ed<'20'){
                        ?>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>温馨提示
                            </label>
                            <div class="layui-input-block">
                            <input type="text" placeholder="当前SVIP1等级您还可以激活更多聊天室额度" class="layui-input" readonly/>
                            </div>
                        </div>   
                <?php
                    }                     
                }else if($_SESSION['admin']=='5'){
                    if($ed<'30'){
                        ?>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>温馨提示
                            </label>
                            <div class="layui-input-block">
                            <input type="text" placeholder="当前SVIP2等级您还可以激活更多聊天室额度" class="layui-input" readonly/>
                            </div>
                        </div>   
                <?php
                    }                    
                }else if($_SESSION['admin']=='6'){
                    if($ed<'999'){
                        ?>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>温馨提示
                            </label>
                            <div class="layui-input-block">
                            <input type="text" placeholder="当前SVIP3等级您还可以激活更多聊天室额度" class="layui-input" readonly/>
                            </div>
                        </div>   
                <?php
                    }      
                }
                ?>
                        <div class="layui-form-item">
                            <a class="layui-btn" href="userset.php">
                                修改信息
                            </a>
                <?php
                if($_SESSION['admin']=='1'){
                    if($ed<'6'){
                        ?>
                            <a class="layui-btn" href="./api/user.php?jh=1">
                                激活额度
                            </a>
                        </div>
                <?php
                    }               
                }else if($_SESSION['admin']=='2'){
                    if($ed<'10'){
                        ?>
                            <a class="layui-btn" href="./api/user.php?jh=1">
                                激活额度
                            </a>
                        </div>  
                <?php
                    }      
                }else if($_SESSION['admin']=='3'){
                    if($ed<'15'){
                        ?>
                            <a class="layui-btn" href="./api/user.php?jh=1">
                                激活额度
                            </a>
                        </div>  
                <?php
                    }                     
                }else if($_SESSION['admin']=='4'){
                    if($ed<'20'){
                        ?>
                            <a class="layui-btn" href="./api/user.php?jh=1">
                                激活额度
                            </a>
                        </div>  
                <?php
                    }                     
                }else if($_SESSION['admin']=='5'){
                    if($ed<'30'){
                        ?>
                            <a class="layui-btn" href="./api/user.php?jh=1">
                                激活额度
                            </a>
                        </div> 
                <?php
                    }                    
                }else if($_SESSION['admin']=='6'){
                    if($ed<'9999'){
                        ?>
                            <a class="layui-btn" href="./api/user.php?jh=1">
                                激活额度
                            </a>
                <?php
                    }      
                }
                ?>
                    </form>
                    <div style="height:100px;"></div>
                </div>
    </body>
</html>