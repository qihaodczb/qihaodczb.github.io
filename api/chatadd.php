<?php
include '../includes/common.php';
$mod=$_GET['mod'];
if($_SESSION['islogin']==1){}else exit("<script language='javascript'>window.location.href='../login.php';</script>");
$mc=ltrim($_POST['mc']);
$jj=ltrim($_POST['jj']);
$g1=ltrim($_POST['g1']);
$g2=ltrim($_POST['g2']);
$g3=ltrim($_POST['g3']);
$key=ltrim($_POST['key']);
if($mc==''){
                if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"禁止创建空白聊天室");
exit(json_encode($arr));
}else{
    sysmsg ("禁止创建空白聊天室  <a href='../chatadd.php'>点我返回</a></div>");
}
}elseif($jj==''){
                    if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"禁止创建空白聊天室");
exit(json_encode($arr));
}else{
    sysmsg ("禁止创建空白聊天室  <a href='../chatadd.php'>点我返回</a></div>");
}
}else{
if($_SESSION['lts']!='0'){
$id=$_SESSION['id'];
$sql="update User set lts = lts-1  where user = '{$_SESSION['user']}'";
mysqli_query($conn,$sql);
$sql="update User set ylts = ylts+1  where user = '{$_SESSION['user']}'";
mysqli_query($conn,$sql);
if($key==''){
$sql = "INSERT INTO Chat (name, jj, admin, yn, pwd, gl1, gl2, gl3, zt, msg) VALUES `{$mc}`, `{$jj}`, `{$id}`, `{0}`, `{0}`, `{$g1}`, `{$g2}`, `{$g3}, `{0}`, `{0}`";
$sql = "INSERT INTO Chat (name, jj, admin, yn, pwd, gl1, gl2, gl3, zt, msg) VALUES (\"{$mc}\", \"{$jj}\", \"$id\",\"0\",\"0\",\"$g1\",\"$g2\",\"$g3\",\"0\",\"0\")";
if (mysqli_query($conn, $sql)) {
                    if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"创建成功");
exit(json_encode($arr));
}else{
    sysmsg ("创建成功  <a href='../chatadd.php'>点我返回</a></div>");
}
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}else{
 $sql = "INSERT INTO Chat (name, jj, admin, yn, pwd, gl1, gl2, gl3, zt, msg) VALUES `{$mc}`, `{$jj}`, `{$id}`, `{1}`, `{$key}`, `{$g1}`, `{$g2}`, `{$g3}, `{0}`, `{0}`";
$sql = "INSERT INTO Chat (name, jj, admin, yn, pwd, gl1, gl2, gl3, zt, msg) VALUES (\"{$mc}\", \"{$jj}\", \"$id\",\"1\",\"$key\",\"$g1\",\"$g2\",\"$g3\",\"0\",\"0\")";
if (mysqli_query($conn, $sql)) {
                    if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"创建成功");
exit(json_encode($arr));
}else{
    sysmsg ("创建成功  <a href='../chatadd.php'>点我返回</a></div>");
}
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}   
}
}else{
                    if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"额度不足");
exit(json_encode($arr));
}else{
    sysmsg ("额度不足  <a href='../chatadd.php'>点我返回</a></div>");
}
}
}
?>