<?php
/**
 * cookie使用
 * setcookie(键，值，有效期，有效路径，有效域，安全传输，脚本获取);
 */

$result = setcookie('is_login','yes',time()+3600);      // 一个小时后失效
//var_dump($result);
var_dump($_COOKIE);
setcookie('is_login','');
setcookie('is_login','yes',0,'/','.aqie.com');
setcookie('secure_yes','yes',0,'','',true);     //仅仅安全链接

setcookie('js','yes',0,'','',false,false);      //允许js获取
setcookie('js_no','no',0,'','',false,true);      //不允许js获取

echo "<hr>";
//cookie存储字符串
setcookie('array',serialize(array('php','mysql')));
var_dump($_COOKIE['array']);
echo "<br>";
var_dump(unserialize($_COOKIE['array']));

setcookie('new_key','new_value'.date('H:i:s'));       // 永远获取的是上次设置的
var_dump($_COOKIE['new_key']);

?>
<button onclick="getCookie()">获取coookie</button>
<script type="text/javascript">
    // 获取cookie
    function getCookie() {
        alert(document.cookie);
    }
    
</script>
