<?php

/**
 * 处理码值
 * $code 存进session
 *
 *
 * 图片错误三种解决办法
 * 1.直接请求地址
 * 2.注释掉header
 * 3.编码不规范 php标签开头.
 * 4.BOM 取消掉
 *
 * 验证码点击更换
 * 点击时，重新请求生成验证码动作(更改当前图片img的src属性)
 */
// 获取四位随机数
$char_list = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
$char_list_len = strlen($char_list);
$code_len = 4;
$code = '';
for($i=1;$i<=$code_len;++$i){
    $rand_index = mt_rand(0,$char_list_len-1);
    $code .= $char_list[$rand_index];
}
//echo $code;

//存进session
session_start();
$_SESSION['code'] = $code;

// 处理验证码图片
$bg_file = './captcha/captcha_bg'.mt_rand(1,5).'.jpg';

//基于背景图片创建画布
$image = imagecreatefromjpeg($bg_file);

// 操作画布，将字符串写到画布
// imagestring(画布，字体大小，相对画布位置x,y,字符串内容，字体颜色)  函数使用内置字体5大

//随机分配字体
if(mt_rand(1,5) >=3){       //  3/5概率
    $str_color = imagecolorallocate($image,255,255,255);
}else{
    $str_color = imagecolorallocate($image,0,0,0);
}

// 图片宽高减去字符串宽高


$font = 5;
$x = (imagesx($image)-imagefontWidth($font)*4)/2;
$y = (imagesy($image)-imagefontHeight($font))/2;
imagestring($image,$font,$x,$y,$code,$str_color);

// 输出导出
header('Content-Type:image/jpeg');
imagejpeg($image);