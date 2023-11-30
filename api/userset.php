<?php
include '../includes/common.php';
$mod=$_GET['mod'];
if($_SESSION['islogin']==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
if(isset($_POST['name'])){
if($admin["xss"]=='0'){
$p=RemoveXSS($_POST['pwd']);
$n=RemoveXSS($_POST['name']);
$qq=RemoveXSS($_POST['qq']);
}else{
$p=$_POST['pwd'];
$n=$_POST['name'];
$qq=$_POST['qq'];
}
$id=$_SESSION['id'];
$sql = "update `User` set `pwd` ='{$p}',`name` ='{$n}',`qq` ='{$qq}' where `id`=".$id;
if (mysqli_query($conn, $sql)) {
    if($mod=='api'){
header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"修改成功");
exit(json_encode($arr));
}else{
    echo "<script>window.location.href='../userset.php';</script>";
}
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>