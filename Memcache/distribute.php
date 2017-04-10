<?php
$mem = new Memcache();
// 分布式
$list = array(
    array('host'=>'localhost','port'=>'11211'),
    array('host'=>'localhost','port'=>'11214')
);
foreach ($list as $k=>$v){
    $mem->addServer($v['host'],$v['port']);
}

// 设置key
$mem->set('city','henan',0);

// 获取
echo $mem->get('city');