<?php 
  // 随机验证码验证码
  $db = imagecreate(95,30);     // 创建图像资源
  $dbc = imagecolorallocate($db,0,180,255);     // 创建一个颜色
  $txtc = imagecolorallocate($db,255,255,255);   //填充颜色
  $str = "1234567890";
  $txt = "";
  for($i=0;$i<4;$i++){
    $random = mt_rand(1,strlen($str));
    $txt.=$str[$random-1];
  }
  // 给验证码建立session
  session_start();
  $_SESSION["code"] = $txt;

  imagefill($db,0,0,$dbc);      // 填充背景颜色
  imagestring($db,12,30,6,$txt,$txtc);     //绘制文字
  header("content-type:image/png");
  imagepng($db);
 ?>