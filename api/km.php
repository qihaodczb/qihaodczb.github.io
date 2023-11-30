<?php
include '../includes/common.php';
$mod=$_GET['mod'];
if($_SESSION['islogin']==1){}else exit("<script language='javascript'>window.location.href='../login.php';</script>");
function alert($tips)
{
echo "<script>alert('$tips');window.location.href='../km.php';</script>";
}
$km = $_POST["km"];
if($km)
{
$sql=("SELECT * FROM Km WHERE km='".$_POST['km']."'");
$rs=mysqli_query($conn,$sql);
$res = mysqli_fetch_assoc($rs);
if($res)
{
if($res["zt"]==0)
{
if($res["zl"]=='yy'){
$money = $res['nr'];//卡密值
$sql="update Km set zt=1 where km='{$_POST['km']}'";
mysqli_query($conn,$sql);
$sql="update User set money = money+{$money}  where user = '{$_SESSION['user']}'";
mysqli_query($conn,$sql);
if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"卡密充值成功，面额:$money元");
exit(json_encode($arr));
}else{
echo alert('卡密充值成功，面额:'.$money."元");
}
	$sql="select * from User where user = '{$_SESSION['user']}'";
    $rs=mysqli_query($conn,$sql);
    $res = mysqli_fetch_assoc($rs);
    $_SESSION['money'] = $res['money'];
}elseif($res["zl"]=='vip'){
$vip = $res['nr'];//卡密值
$sql="update Km set zt=1 where km='{$_POST['km']}'";
mysqli_query($conn,$sql);
$sql="update User set admin = {$vip}  where user = '{$_SESSION['user']}'";
mysqli_query($conn,$sql);
if($vip<='3'){
    if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"卡密充值成功，获得VIP.$vip.");
exit(json_encode($arr));
}else{
echo alert('卡密充值成功，获得VIP'.$vip."");
}
}else{
    if($mod=='api'){
        $vip=$vip-3;
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"卡密充值成功，获得SVIP$vip");
exit(json_encode($arr));
}else{
$vip=$vip-3;
echo alert("卡密充值成功，获得SVIP.$vip.");  
}
}
	$sql="select * from User where user = '{$_SESSION['user']}'";
    $rs=mysqli_query($conn,$sql);
    $res = mysqli_fetch_assoc($rs);
    $_SESSION['admin'] = $res['vip'];
}
}else
{
    if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>'卡密已被使用');
exit(json_encode($arr));
}else{
echo alert("卡密已被使用");
}
}
}
else
{
    if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>'卡密不存在');
exit(json_encode($arr));
}else{
echo alert("卡密不存在");
}
}
}
?>