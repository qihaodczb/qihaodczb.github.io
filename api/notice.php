<?php
include '../includes/common.php';
$sql = 'SELECT * FROM `Gg`';
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while($row = mysqli_fetch_assoc($result)) {
        header('Content-Type:application/json; charset=utf-8'); 
$arr = array('id'=>$row['id'],'msg'=>$row['txt']);
echo(json_encode($arr));
}
} else {
header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>'没有公告');
exit(json_encode($arr));
}
?>