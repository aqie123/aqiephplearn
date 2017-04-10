<?php
/**
 *curl 采集数据
 */
//$link = curl_init("https://www.baidu.com/");
$link = curl_init();
$url = "http://www.aqie.com/index.php";
$host = "www.aqie.com";
var_dump($link);
curl_setopt($link,CURLOPT_URL,$url);  // 设定请求地址
$arr = array('host:'.$host,'Accept:text/html','Accept-Language:zh-cn,zh');
curl_setopt($link,CURLOPT_HTTPHEADER,$arr); // 设定请求头
curl_setopt($link,CURLOPT_HEADER,false); // 设定返回信息无响应头
curl_setopt($link,CURLOPT_RETURNTRANSFER,false); //不返回数据，直接输出
curl_exec($link);       // 执行
curl_close($link);