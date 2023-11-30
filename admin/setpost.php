<?php
include '../includes/common.php';
$Admin_login=$_COOKIE['Admin_login'];
if($Admin_login){}else exit("<script>location='./login.php'</script>");
$mod=$_GET['mod'];
if($mod=='jc'){
$t=$_POST['title'];
$x=$_POST['xss'];
$i=$_POST['ip'];
$q=$_POST['qq'];
$sql = "update `Admin` set `title` ='{$t}',`xss`='{$x}',`ip`='{$i}' ,`qq`='{$q}' where `id`='1'";
if (mysqli_query($conn, $sql)) {
    echo "<script>window.location.href='./set.php?mod=$mod';</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}elseif($mod=='gj'){
$tc=$_POST['tc'];
$sql = "update `Admin` set `tc` ='{$tc}' where `id`='1'";
if (mysqli_query($conn, $sql)) {
    echo "<script>window.location.href='./set.php?mod=$mod';</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}elseif($mod=='pwd'){
$p=$_POST['pwd'];
$u=$_POST['user'];
$sql = "update `Admin` set `user` ='{$u}',`pwd`='{$p}' where `id`='1'";
if (mysqli_query($conn, $sql)) {
    echo "<script>window.location.href='./set.php?mod=$mod';</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}elseif($mod=='pay'){
$p=$_POST['key'];
$i=$_POST['id'];
$u=$_POST['url'];
$sql = "update `Admin` set `payurl` ='{$u}',`paykey`='{$p}',`payid`='{$i}' where `id`='1'";
if (mysqli_query($conn, $sql)) {
    echo "<script>window.location.href='./set.php?mod=$mod';</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
?>