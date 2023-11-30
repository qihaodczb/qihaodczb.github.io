<?php
include '../includes/common.php';
$mod=$_GET['mod'];
if($_SESSION['islogin']==1){}else exit("<script language='javascript'>window.location.href='../login.php';</script>");
$ltsid=$_GET['ltsid'];
$ltsid=intval($ltsid);
$sql="select * from Chat where id = ".$ltsid;
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if($row['id']==''){
                    if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"聊天室ID不存在");
exit(json_encode($arr));
}else{
    sysmsg('聊天室ID不存在');
}
}
if($row['yn']=='1'){
    $pwd=$_GET['pwd'];
    if($pwd!=$row['pwd']){
                        if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"密码错误");
exit(json_encode($arr));
}else{
    sysmsg('密码错误');
}
    }
}
$sql = 'SELECT * FROM Msg order by 1 desc';
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while($row = mysqli_fetch_assoc($result)) {
        if($ltsid==$row["qid"]){
header('Content-Type:application/json; charset=utf-8'); 
$arr = array('id'=>$row['id'],'name'=>$row['name'],'txt'=>$row['txt'],'time'=>$row['time']);
echo(json_encode($arr));
        }
        }
} else {
header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>'没有消息');
exit(json_encode($arr));
}
?>