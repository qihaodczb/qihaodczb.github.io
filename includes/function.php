<?php
function number($num){
$pattern = '/^\d+(\.\d+)?$/';
if(preg_match($pattern,$num)){
    return true;
}else{
    return false;
}
}
function daddslashes($string, $force = 0, $strip = FALSE) {
	!defined('MAGIC_QUOTES_GPC') && define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
	if(!MAGIC_QUOTES_GPC || $force) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = daddslashes($val, $force, $strip);
			}
		} else {
			$string = addslashes($strip ? stripslashes($string) : $string);
		}
	}
	return $string;
}
function real_ip()
{
    if ($_SERVER["HTTP_CLIENT_IP"] && strcasecmp($_SERVER["HTTP_CLIENT_IP"], "unknown")) {
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    } else {
        if ($_SERVER["HTTP_X_FORWARDED_FOR"] && strcasecmp($_SERVER["HTTP_X_FORWARDED_FOR"], "unknown")) {
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else {
            if ($_SERVER["REMOTE_ADDR"] && strcasecmp($_SERVER["REMOTE_ADDR"], "unknown")) {
                $ip = $_SERVER["REMOTE_ADDR"];
            } else {
                if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'],
                        "unknown")
                ) {
                    $ip = $_SERVER['REMOTE_ADDR'];
                } else {
                    $ip = "unknown";
                }
            }
        }
    }
    return ($ip);
}
function RemoveXSS($str) {  
   // remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed  
   // this prevents some character re-spacing such as <java\0script>  
   // note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs  
   $str = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $str);  
     
   // straight replacements, the user should never need these since they're normal characters  
   // this prevents like <IMG SRC=@avascript:alert('XSS')>  
   $search = 'abcdefghijklmnopqrstuvwxyz'; 
   $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';  
   $search .= '1234567890!@#$%^&*()'; 
   $search .= '~`";:?+/={}[]-_|\'\\'; 
   for ($i = 0; $i < strlen($search); $i++) { 
      // ;? matches the ;, which is optional 
      // 0{0,7} matches any padded zeros, which are optional and go up to 8 chars 
    
      // @ @ search for the hex values 
      $str = preg_replace('/(&#[xX]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $str); // with a ; 
      // @ @ 0{0,7} matches '0' zero to seven times  
      $str = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $str); // with a ; 
   } 
    
   // now the only remaining whitespace attacks are \t, \n, and \r 
   $ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base','<','>'); 
   $ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload'); 
   $ra = array_merge($ra1, $ra2); 
    
   $found = true; // keep replacing as long as the previous round replaced something 
   while ($found == true) { 
      $str_before = $str; 
      for ($i = 0; $i < sizeof($ra); $i++) { 
         $pattern = '/'; 
         for ($j = 0; $j < strlen($ra[$i]); $j++) { 
            if ($j > 0) { 
               $pattern .= '(';  
               $pattern .= '(&#[xX]0{0,8}([9ab]);)'; 
               $pattern .= '|';  
               $pattern .= '|(&#0{0,8}([9|10|13]);)'; 
               $pattern .= ')*'; 
            } 
            $pattern .= $ra[$i][$j]; 
         } 
         $pattern .= '/i';  
         $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); // add in <> to nerf the tag  
         $str = preg_replace($pattern, $replacement, $str); // filter out the hex tags  
         if ($str_before == $str) {  
            // no replacements were made, so exit the loop  
            $found = false;  
         }  
      }  
   }  
    if (empty($str)) return false;
    $str = htmlspecialchars($str);
    $str = str_replace( '/', "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace( '"', "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace( 'CR', "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace( 'ASCII', "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace( 'ASCII 0x0d', "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace( 'LF', "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace( 'ASCII 0x0a', "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace( ',', "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace( '%', "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace( ';', "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace( 'eval', "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace( 'open', "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace( 'sysopen', "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace( 'system', "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace( '$', "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace( "'", "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace( "'", "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace( 'ASCII 0x08', "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace( '"', "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace( '"', "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace("", "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace("&gt", "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace("&lt", "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace("<SCRIPT>", "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace("</SCRIPT>", "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace("<script>", "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace("</script>", "[敏感词汇，疑似sql或xss注入]", $str);
    $str = str_replace("select","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("union","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("where","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("insert","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("delete","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("update","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("drop","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("DROP","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("create","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("modify","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("rename","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("alter","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("cas","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("&","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace(">","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("<","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace(" ",chr(32),$str);
    $str = str_replace(" ",chr(9),$str);
    $str = str_replace("    ",chr(9),$str);
    $str = str_replace("&",chr(34),$str);
    $str = str_replace("'",chr(39),$str);
    $str = str_replace("<br />",chr(13),$str);
    $str = str_replace("''","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("css","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("CSS","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("<!--","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("convert","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("md5","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("passwd","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("password","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("Array","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("or 1='1'","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace(";set|set&set;","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("`set|set&set`","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("--","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("OR","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace('"',"[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("*","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("-","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("+","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("/","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("=","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("'/","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("-- ","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace(" -- ","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace(" --","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("(","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace(")","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("{","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("}","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("response","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("write","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("|","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("`","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace(";","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("etc","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("root","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("//","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("!=","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("$","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("&","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("&&","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("==","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("mailto:","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("CHAR","[敏感词汇，疑似sql或xss注入]",$str);
    $str = str_replace("char","[敏感词汇，疑似sql或xss注入]",$str);
    return $str;
}   
function sysmsg($msg = '未知的异常',$die = true) {
    ?>  
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>站点提示信息</title>
        <style type="text/css">
html{background:#eee}body{background:#fff;color:#333;font-family:"微软雅黑","Microsoft YaHei",sans-serif;margin:2em auto;padding:1em 2em;max-width:700px;-webkit-box-shadow:10px 10px 10px rgba(0,0,0,.13);box-shadow:10px 10px 10px rgba(0,0,0,.13);opacity:.8}h1{border-bottom:1px solid #dadada;clear:both;color:#666;font:24px "微软雅黑","Microsoft YaHei",,sans-serif;margin:30px 0 0 0;padding:0;padding-bottom:7px}#error-page{margin-top:50px}h3{text-align:center}#error-page p{font-size:9px;line-height:1.5;margin:25px 0 20px}#error-page code{font-family:Consolas,Monaco,monospace}ul li{margin-bottom:10px;font-size:9px}a{color:#21759B;text-decoration:none;margin-top:-10px}a:hover{color:#D54E21}.button{background:#f7f7f7;border:1px solid #ccc;color:#555;display:inline-block;text-decoration:none;font-size:9px;line-height:26px;height:28px;margin:0;padding:0 10px 1px;cursor:pointer;-webkit-border-radius:3px;-webkit-appearance:none;border-radius:3px;white-space:nowrap;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;-webkit-box-shadow:inset 0 1px 0 #fff,0 1px 0 rgba(0,0,0,.08);box-shadow:inset 0 1px 0 #fff,0 1px 0 rgba(0,0,0,.08);vertical-align:top}.button.button-large{height:29px;line-height:28px;padding:0 12px}.button:focus,.button:hover{background:#fafafa;border-color:#999;color:#222}.button:focus{-webkit-box-shadow:1px 1px 1px rgba(0,0,0,.2);box-shadow:1px 1px 1px rgba(0,0,0,.2)}.button:active{background:#eee;border-color:#999;color:#333;-webkit-box-shadow:inset 0 2px 5px -3px rgba(0,0,0,.5);box-shadow:inset 0 2px 5px -3px rgba(0,0,0,.5)}table{table-layout:auto;border:1px solid #333;empty-cells:show;border-collapse:collapse}th{padding:4px;border:1px solid #333;overflow:hidden;color:#333;background:#eee}td{padding:4px;border:1px solid #333;overflow:hidden;color:#333}
        </style>
    </head>
    <body id="error-page">
        <?php echo '<h3>站点提示信息</h3>';
        echo $msg; ?>
    </body>
    </html>
    <?php
    if ($die == true) {
        exit;
    }
}
function random($length, $numeric = 0) {
	$seed = base_convert(md5(microtime().$_SERVER['DOCUMENT_ROOT']), 16, $numeric ? 10 : 35);
	$seed = $numeric ? (str_replace('0', '', $seed).'012340567890') : ($seed.'zZ'.strtoupper($seed));
	$hash = '';
	$max = strlen($seed) - 1;
	for($i = 0; $i < $length; $i++) {
		$hash .= $seed{mt_rand(0, $max)};
	}
	return $hash;
}
?>