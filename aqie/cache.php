<?php
header('Content-Type:text/html; charset=utf-8');
/**
 * D 星期
 * M 月
 * Expires 控制响应的有效期(响应有效期三秒)
 */

$expires = gmdate('D, d M Y H:i:s',time()+3) . 'GMT';
//$expires = gmdate('D, d M Y H:i:s',time()-1) . 'GMT';  // 告知浏览器不要缓存(比如验证码)
header('Expires:'.$expires);
echo date('H;i:s'),"<br>";

?>
<a href="cache.php">点击</a>


