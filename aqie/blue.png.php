<?php
/**
 * 验证码
 * 码值存储在session中
 *
 *
 */

/**
 * 1.创建基于调色板画布，支持颜色少 Imagecreate();
 * 2.创建正彩色，支持颜色少 Imagecreatetruecolor()
 *3.基于已有图像创建画布
 * Imagecreatefromjpeg();
 * Imagecreatefrompng();
 * Imagecreatefromgif();
 *
 * 4.Imagecolorallocate(画布，颜色R,G,B);
 * //填充画布
 * Imagefill(画布，位置X,位置Y,颜色) 右下xy增加
 *
 * 导出
 * Imagepng
 * Imagegif
 * Imagejpeg
 * imagepng($image,'./blue.png');
 *
 * 销毁
 * imagedestroy($image);
 */

$width = 500;
$height = 250;
$image = imagecreatetruecolor($width, $height);
//var_dump($image);

// 分配颜色
$blue = imagecolorallocate($image,0,0,255);

imagefill($image,0,0,$blue);

header('Content-Type: image/png;');
imagepng($image);

//imagedestroy($image);




