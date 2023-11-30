<?php
include '../includes/common.php';
if($_SESSION['islogin']==1){}else exit("<script language='javascript'>window.location.href='../login.php';</script>");
$sql = 'SELECT * FROM `Chat` ORDER BY `msg` DESC';
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while($row = mysqli_fetch_assoc($result)) {
        if($row['zt']=='0'){
        if($row['admin']==$_SESSION['id']||$row['gl1']==$_SESSION['id']||$row['gl2']==$_SESSION['id']||$row['gl3']==$_SESSION['id']){
header('Content-Type:application/json; charset=utf-8'); 
$arr = array('id'=>$row['id'],'name'=>$row['name'],'jj'=>$row['jj']);
echo(json_encode($arr));
}
} else {
header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>'没有聊天室');
exit(json_encode($arr));
}
}
}
?>