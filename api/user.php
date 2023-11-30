<?php
include '../includes/common.php';
if($_SESSION['islogin']==1){}else exit("<script language='javascript'>window.location.href='../login.php';</script>");
$ed=$_SESSION['ylts']+$_SESSION['lts'];
if($_GET["jh"]='1'){
                if($_SESSION['admin']=='1'){
                    if($ed<'6'){
$j=6-$ed;
$sql="update User set lts = lts+{$j}  where user = '{$_SESSION['user']}'";
mysqli_query($conn,$sql);
                    }               
                }else if($_SESSION['admin']=='2'){
                    if($ed<'10'){
$j=10-$ed;
$sql="update User set lts = lts+{$j}  where user = '{$_SESSION['user']}'";
mysqli_query($conn,$sql);
                    }      
                }else if($_SESSION['admin']=='3'){
                    if($ed<'15'){
$j=15-$ed;
$sql="update User set lts = lts+{$j}  where user = '{$_SESSION['user']}'";
mysqli_query($conn,$sql);
                    }                     
                }else if($_SESSION['admin']=='4'){
                    if($ed<'20'){
$j=20-$ed;
$sql="update User set lts = lts+{$j}  where user = '{$_SESSION['user']}'";
mysqli_query($conn,$sql);
                    }                     
                }else if($_SESSION['admin']=='5'){
                    if($ed<'30'){
$j=30-$ed;
$sql="update User set lts = lts+{$j}  where user = '{$_SESSION['user']}'";
mysqli_query($conn,$sql);
                    }                    
                }else if($_SESSION['admin']=='6'){
                    if($ed<'9999'){
$j=9999-$ed;
$sql="update User set lts = lts+{$j}  where user = '{$_SESSION['user']}'";
mysqli_query($conn,$sql);
echo "<script>alert('激活成功');window.location.href='../user.php';</script>";
                    }      
                }
}else{
if ($_SESSION['admin']=='0'){
                    $msg= '100';
}else if($_SESSION['admin']=='1'){
                    $msg= '300';                
 }else if($_SESSION['admin']=='2'){
                    $msg= '500';
}else if($_SESSION['admin']=='3'){
                    $msg= '800';                
}else if($_SESSION['admin']=='4'){
                    $msg= '1000';                
}else if($_SESSION['admin']=='5'){
                    $msg= '2000';                
}else if($_SESSION['admin']=='6'){
                    $msg= '无限';
}
                if ($_SESSION['admin']=='0'){
                    $vip= '普通用户';
                }else if($_SESSION['admin']=='1'){
                    $vip= 'VIP1';                
                }else if($_SESSION['admin']=='2'){
                    $vip= 'VIP2';
                }else if($_SESSION['admin']=='3'){
                    $vip= 'VIP3';                
                }else if($_SESSION['admin']=='4'){
                    $vip= 'SVIP1';                
                }else if($_SESSION['admin']=='5'){
                    $vip= 'SVIP2';                
                }else if($_SESSION['admin']=='6'){
                    $vip= 'SVIP3';
                }
                                $ts='无';
                                if($_SESSION['admin']=='1'){
                    if($ed<'6'){
$ts='您还可以激活更多聊天室额度，链接/api/user.php?jh';
                    }               
                }else if($_SESSION['admin']=='2'){
                    if($ed<'10'){
$ts='您还可以激活更多聊天室额度，链接/api/user.php?jh';
                    }      
                }else if($_SESSION['admin']=='3'){
                    if($ed<'15'){
$ts='您还可以激活更多聊天室额度，链接/api/user.php?jh';
                    }                     
                }else if($_SESSION['admin']=='4'){
                    if($ed<'20'){
$ts='您还可以激活更多聊天室额度，链接/api/user.php?jh';
                    }                     
                }else if($_SESSION['admin']=='5'){
                    if($ed<'30'){
 $ts='您还可以激活更多聊天室额度，链接/api/user.php?jh';
                    }                    
                }else if($_SESSION['admin']=='6'){
                    if($ed<'9999'){
$ts='您还可以激活更多聊天室额度，链接/api/user.php?jh';
                    }      
                }
header('Content-Type:application/json; charset=utf-8'); 
$arr = array('id'=>$_SESSION['id'],'user'=>$_SESSION['user'],'name'=>$_SESSION['name'],'money'=>$_SESSION['money'],'lts'=>$_SESSION['lts'],'ylts'=>$_SESSION['ylts'],'msg'=>$msg,'vip'=>$vip,'jh'=>$ts);
exit(json_encode($arr));
}
?>