<?php
include '../includes/common.php';
if($_SESSION['islogin']==1){}else exit("<script language='javascript'>window.location.href='../login.php';</script>");
$ltsid=$_GET['ltsid'];
$ltsid=intval($ltsid);
$pwd=$_POST['pwd'];
$sql="select * from Chat where id = ".$ltsid;
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if($row['id']==''){
    sysmsg('聊天室ID不存在');
}
$pwd1=$row['pwd'];
if($pwd==$pwd1){
	   echo "<script>alert('验证成功');window.location.href='../chat.php?ltsid=$ltsid&pwd=$pwd';</script>";
}else{
	   echo "<script>alert('验证失败');window.location.href='../pwd.php?ltsid=$ltsid';</script>"; 
}
?>