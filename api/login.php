<?php
include '../includes/common.php';
$mod=$_GET['mod'];
if(isset($_GET['logout'])){
$_SESSION = array();
	if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>'退出登录成功');
exit(json_encode($arr));
}else{
    echo "<script>window.alert('退出成功！');window.location.href='../login.php';</script>";exit;
}
}elseif(!empty($_POST['user']) && !empty($_POST['pwd'])){
   $user=daddslashes($_POST['user']);
	$pwd=daddslashes($_POST['pwd']);
	$sql="select * from User where user = '{$user}'";
    $rs=mysqli_query($conn,$sql);
    $res = mysqli_fetch_assoc($rs);
    if($res != ''){
        if($pwd == $res['pwd']){
            $_SESSION['user'] = $user;
            $_SESSION['islogin'] = 1;
$_SESSION['id'] = $res['id'];
$_SESSION['name'] = $res['name'];
$_SESSION['money'] = $res['money'];
$_SESSION['admin'] = $res['admin'];
$_SESSION['qq'] = $res['qq'];
$_SESSION['zt'] = $res['zt'];
$_SESSION['lts'] = $res['lts'];
$_SESSION['ylts'] = $res['ylts'];
if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>'登陆用户中心成功');
exit(json_encode($arr));
}else{
            echo "<script>alert('登陆用户中心成功！');window.location.href='../';</script>";exit;
}
        }else{
            if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>'密码错误');
exit(json_encode($arr));
}else{
            echo "<script>alert('密码错误');window.location.href='../login.php';</script>";exit;
        }
        }
    }else{
        if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>'不存在该账号');
exit(json_encode($arr));
}else{
        echo "<script>window.alert('不存在该账号！');window.location.href='../login.php';</script>";exit;
}
    }
}
?>
