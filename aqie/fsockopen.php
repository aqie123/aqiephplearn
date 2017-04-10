<?php
/**
 * fsockopen()
 * 1.建立连接 $link = fsockopen(主机名，端口)
 * 2.发送请求 fwrite($link,$request_data)
 * 3.接收响应数据 $result = fread($link,1024*1024*8)
 * 4.关闭连接   fclose($link)
 */

// http://www.imooc.com/learn/26   http://www.imooc.com/learn/54
// http://www.bilibili.com/video/av9332353/
// http://www.imooc.com/course/landingpagephp?from=phpkecheng
// https://www.hao123.com/index.html
// http://weibo.com/
// http://open.itcast.cn/php/6-346.html
// http://aqieframe.com/index.php?p=admin&c=index&a=index

$host = "aqieframe.com";
$link = fsockopen($host,80);
    $page = "/index.php?p=admin&c=index&a=index";
    $request_data = "";
    $request_data .= "get $page http/1.1\r\n";      // 请求行
    $request_data .= "host:{$host}\r\n";      // 请求头1
    $request_data .= "accept:text/html\r\n";      // 请求头2
    $request_data .= "accept-language:zh-CN\r\n";      // 请求头3
    $request_data .= "CONNECTION: CLOSE\r\n\r\n";       // 请求头结束

    fwrite($link,$request_data);
    $result = fread($link,1024*1024*8);
    echo "<textarea cols='80' rows='16'>$result</textarea>";