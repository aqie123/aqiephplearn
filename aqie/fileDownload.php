<?php
// 给定任意文件类型，均可下载
$file = './blue.png';
header('Content-Disposition:attachment; filename=' .basename($file));
/**
 * 文件下载
 * 主体，以附件形式下载
 * basename() 取得文件中文件名部分
 */
// 获得文件类型
$finfo = new Finfo(FILEINFO_MIME_TYPE);
$mime = $finfo->file($file);
header('Content-Type:' . $mime);

// 指定文件大小
header('COntent-Length:' . filesize($file));

// 文件下载核心代码
$handle = fopen($file,'r');
while(!feof($handle)){  // 没有到文件末尾
    echo fgets($handle,1024);
}
fclose($handle);
