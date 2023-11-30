<?php
include '../includes/common.php';
$mod=$_GET['mod'];
if($_SESSION['islogin']==1){}else exit("<script language='javascript'>window.location.href='../login.php';</script>");
$ltsid=$_GET['ltsid'];
$ltsid=intval($ltsid);
$id=$_GET['id'];
$id1=$_GET['id1'];
$id2=$_GET['id2'];
$id3=$_GET['id3'];
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
}}
if($row['admin']==$_SESSION['id']||$row['gl1']==$_SESSION['id']||$row['gl2']==$_SESSION['id']||$row['gl3']==$_SESSION['id']){
    if($row['admin']==$_SESSION['id']){
        $gly=ltrim($_POST['gly']);
        $g1=ltrim($_POST['g1']);
$g2=ltrim($_POST['g2']);
$g3=ltrim($_POST['g3']);
        if($gly==''){
                    if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"禁止输入空白信息");
exit(json_encode($arr));
}else{
            sysmsg ("禁止输入空白信息  <a href='../chatadmin.php?ltsid=$ltsid'>点我返回</a></div>");
        }}
    }else{
        $gly=$id;
                $g1=$id1;
                        $g2=$id2;
                                $g3=$id3;
    }
}else{
            if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"您不是管理员");
exit(json_encode($arr));
}else{
    sysmsg('您不是管理员');
}
}
$mc=ltrim($_POST['mc']);
$jj=ltrim($_POST['jj']);
$key=ltrim($_POST['pwd']);
if($mc==''){
                        if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"禁止输入空白信息");
exit(json_encode($arr));
}else{
    sysmsg ("禁止输入空白信息  <a href='../chatadmin.php?ltsid=$ltsid'>点我返回</a></div>");
}
    
}elseif($jj==''){
                        if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"禁止输入空白信息");
exit(json_encode($arr));
}else{
    sysmsg ("禁止输入空白信息  <a href='../chatadmin.php?ltsid=$ltsid'>点我返回</a></div>");
}
    
}else{
if($key=='0'){
$sql = "update `Chat` set `name` ='{$mc}',`jj`='{$jj}',`admin`='{$gly}',`gl1`='{$g1}' ,`gl2`='{$g2}',`gl3`='{$g3}' ,`pwd`='0',`yn`='0' where `id`=".$ltsid;
if (mysqli_query($conn, $sql)) {
                        if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"修改成功");
exit(json_encode($arr));
}else{
    sysmsg ("修改成功  <a href='../chatadmin.php?ltsid=$ltsid'>点我返回</a></div>");
}
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}else{
$sql = "update `Chat` set `name` ='{$mc}',`jj`='{$jj}',`admin`='{$gly}',`gl1`='{$g1}' ,`gl2`='{$g2}',`gl3`='{$g3}' ,`pwd`='{$key}',`yn`='1' where `id`=".$ltsid;
if (mysqli_query($conn, $sql)) {
                        if($mod=='api'){
    header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"修改成功");
exit(json_encode($arr));
}else{
    sysmsg ("修改成功  <a href='../chatadmin.php?ltsid=$ltsid'>点我返回</a></div>");
}
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}   
}
}
?>