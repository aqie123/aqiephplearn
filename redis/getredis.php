<?php 

//实例化
$redis = new Redis();
//连接redis服务器
$redis->connect('localhost','6379');
echo $redis->get('name');
 ?>