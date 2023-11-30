  <?php
include '../includes/common.php';
$mod=$_GET['mod'];
$id=$_GET['id'];
if($id=='1'){
    if($_SESSION['money']>='20'){
        $m='20';
        $sql="update User set money = money-{$m}  where user = '{$_SESSION['user']}'";
        mysqli_query($conn,$sql);
        $sql="update User set admin = 1  where user = '{$_SESSION['user']}'";
        mysqli_query($conn,$sql);
        if($mod=='api'){
            header('Content-Type:application/json; charset=utf-8'); 
            $arr = array('msg'=>"购买VIP1成功！");
            exit(json_encode($arr));
        }else{
            sysmsg ("购买VIP1成功！  <a href='../buy.php'>点我返回</a></div>");
        }
    }else{
        if($mod=='api'){
            header('Content-Type:application/json; charset=utf-8'); 
            $arr = array('msg'=>"余额不足");
            exit(json_encode($arr));
        }else{
            sysmsg ("余额不足  <a href='../buy.php'>点我返回</a></div>");
        }
    }
}elseif($id=='2'){
    if($_SESSION['money']>='40'){
        $m='40';
        $sql="update User set money = money-{$m}  where user = '{$_SESSION['user']}'";
        mysqli_query($conn,$sql);
        $sql="update User set admin = 2  where user = '{$_SESSION['user']}'";
        mysqli_query($conn,$sql);
        if($mod=='api'){
            header('Content-Type:application/json; charset=utf-8'); 
            $arr = array('msg'=>"购买VIP2成功！");
            exit(json_encode($arr));
        }else{
            sysmsg ("购买VIP2成功！  <a href='../buy.php'>点我返回</a></div>");
        }
    }else{
        if($mod=='api'){
            header('Content-Type:application/json; charset=utf-8'); 
            $arr = array('msg'=>"余额不足");
            exit(json_encode($arr));
        }else{
            sysmsg ("余额不足  <a href='../buy.php'>点我返回</a></div>");
        }
    }
}elseif($id=='3'){
    if($_SESSION['money']>='60'){
        $m='60';
        $sql="update User set money = money-{$m}  where user = '{$_SESSION['user']}'";
        mysqli_query($conn,$sql);
        $sql="update User set admin = 3  where user = '{$_SESSION['user']}'";
        mysqli_query($conn,$sql);
        if($mod=='api'){
            header('Content-Type:application/json; charset=utf-8'); 
            $arr = array('msg'=>"购买VIP3成功！");
            exit(json_encode($arr));
        }else{
            sysmsg ("购买VIP3成功！  <a href='../buy.php'>点我返回</a></div>");
        }
    }else{
        if($mod=='api'){
            header('Content-Type:application/json; charset=utf-8'); 
            $arr = array('msg'=>"余额不足");
            exit(json_encode($arr));
        }else{
            sysmsg ("余额不足  <a href='../buy.php'>点我返回</a></div>");
        }
    }
}elseif($id=='4'){
    if($_SESSION['money']>='80'){
        $m='80';
        $sql="update User set money = money-{$m}  where user = '{$_SESSION['user']}'";
        mysqli_query($conn,$sql);
        $sql="update User set admin = 4  where user = '{$_SESSION['user']}'";
        mysqli_query($conn,$sql);
        if($mod=='api'){
            header('Content-Type:application/json; charset=utf-8'); 
            $arr = array('msg'=>"购买SVIP1成功！");
            exit(json_encode($arr));
        }else{
            sysmsg ("购买SVIP1成功！  <a href='../buy.php'>点我返回</a></div>");
        }
    }else{
        if($mod=='api'){
            header('Content-Type:application/json; charset=utf-8'); 
            $arr = array('msg'=>"余额不足");
            exit(json_encode($arr));
        }else{
            sysmsg ("余额不足  <a href='../buy.php'>点我返回</a></div>");
        }
    }
}elseif($id=='5'){
    if($_SESSION['money']>='100'){
        $m='100';
        $sql="update User set money = money-{$m}  where user = '{$_SESSION['user']}'";
        mysqli_query($conn,$sql);
        $sql="update User set admin = 5  where user = '{$_SESSION['user']}'";
        mysqli_query($conn,$sql);
        if($mod=='api'){
            header('Content-Type:application/json; charset=utf-8'); 
            $arr = array('msg'=>"购买SVIP2成功！");
            exit(json_encode($arr));
        }else{
            sysmsg ("购买SVIP2成功！  <a href='../buy.php'>点我返回</a></div>");
        }
    }else{
        if($mod=='api'){
            header('Content-Type:application/json; charset=utf-8'); 
            $arr = array('msg'=>"余额不足");
            exit(json_encode($arr));
        }else{
            sysmsg ("余额不足  <a href='../buy.php'>点我返回</a></div>");
        }
    }
}elseif($id=='6'){
    if($_SESSION['money']>='120'){
        $m='120';
        $sql="update User set money = money-{$m}  where user = '{$_SESSION['user']}'";
        mysqli_query($conn,$sql);
        $sql="update User set admin = 6  where user = '{$_SESSION['user']}'";
        mysqli_query($conn,$sql);
        if($mod=='api'){
            header('Content-Type:application/json; charset=utf-8'); 
            $arr = array('msg'=>"购买SVIP3成功！");
            exit(json_encode($arr));
        }else{
            sysmsg ("购买SVIP3成功！  <a href='../buy.php'>点我返回</a></div>");
        }
    }else{
        if($mod=='api'){
            header('Content-Type:application/json; charset=utf-8'); 
            $arr = array('msg'=>"余额不足");
            exit(json_encode($arr));
        }else{
            sysmsg ("余额不足  <a href='../buy.php'>点我返回</a></div>");
        }
    }
}else{
if($mod=='api'){
header('Content-Type:application/json; charset=utf-8'); 
$arr = array('msg'=>"OMG！请求错误！");
exit(json_encode($arr));
}else{
 sysmsg ("OMG！请求错误  <a href='../buy.php'>点我返回</a></div>");
}
}