<?php
include '../includes/common.php';
header('Content-Type:application/json; charset=utf-8'); 
$arr = array('title'=>$admin['title'],'qq'=>$admin['qq'],'tc'=>$admin['tc']);
echo(json_encode($arr));
?>