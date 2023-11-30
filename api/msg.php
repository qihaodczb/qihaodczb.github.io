<?php
include '../includes/common.php';
$mod=$_GET['mod'];
if($_SESSION['islogin']==1){}else exit("<script language='javascript'>window.location.href='../login.php';</script>");
$pwd=$_GET['pwd'];
$ip = $_GET['ip']?$_GET['ip']:real_ip();
$ltsid= $_GET['ltsid'];
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
}else{
    $d=$row['msg'];
$sql="select * from User where id = ".$row['admin'];
$rs=mysqli_query($conn,$sql);
$r = mysqli_fetch_assoc($rs);
                if ($r['admin']=='0'){
                    $a= '100';
                }else if($r['admin']=='1'){
                    $a= '300';                
                }else if($r['admin']=='2'){
                    $a= '500';
                }else if($r['admin']=='3'){
                    $a= '800';                
                }else if($r['admin']=='4'){
                    $a= '1000';                
                }else if($r['admin']=='5'){
                   $a= '2000';                
                }else if($r['admin']=='6'){
                    $a= '9999999999999999999999999999999999';
                }
if($d>=$a){
    if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"聊天室信息条数超标，请群主升级VIP或删除不必要的信息");
exit(json_encode($arr));
}else{
    sysmsg('聊天室信息条数超标，请群主升级VIP或删除不必要的信息');
}
}
}
$n=ltrim($_POST['nr']);
date_default_timezone_set('PRC');
$t=date('Y-m-d h:i:s', time());
if($n==''){
        if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"禁止发送空白信息");
exit(json_encode($arr));
}else{
    sysmsg ("禁止发送空白信息  <a href='../msg.php?ltsid=$ltsid&pwd=$pwd'>点我返回</a></div>");
}
}else{
$n=ltrim($n);
$user=$_SESSION['name'];
if($admin["xss"]=='1'){
$n=RemoveXSS($_POST['nr']);
}else{
$n=$_POST['nr']; 
}
if($admin["ip"]=='1'){
$sql = "INSERT INTO Msg (name, txt, time, ip, qid) VALUES `{$user}`, `{$n}`, $t, $ip, $ltsid";
$sql = "INSERT INTO Msg (name, txt, time, ip, qid) VALUES (\"{$user}\", \"{$n}\", \"$t\", \"$ip\", \"$ltsid\")";
}else{
$sql = "INSERT INTO Msg (name, txt, time, ip, qid) VALUES `{$user}`, `{$n}`, $t, '无', $ltsid";
$sql = "INSERT INTO Msg (name, txt, time, ip, qid) VALUES (\"{$user}\", \"{$n}\", \"$t\",\"无\", \"$ltsid\")";
}
if (mysqli_query($conn, $sql)) {
    $sql = "update `Chat` set msg = msg+1 where `id`='$ltsid'";
    mysqli_query($conn, $sql);
            if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"发送成功");
exit(json_encode($arr));
}else{
    sysmsg ("发送成功  <a href='../chat.php?ltsid=$ltsid&pwd=$pwd'>点我返回</a></div>");
}
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}
?>