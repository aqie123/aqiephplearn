<?php
$mem = new Memcache();
$flag = $mem->connect('localhost','11211');
// 从memcache读取数据
var_dump($mem->get('age'));
echo "<br>";
var_dump($mem->get('name'));
echo "<br>";
var_dump($mem->get('isold'));
echo "<br>";
var_dump($mem->get('pai'));
echo "<br>";
print_r($mem->get('city'));
echo "<br>";
var_dump($mem->get('person'));
echo "<br>";
var_dump($mem->get('kong'));
echo "<br>";
var_dump($mem->get('addr'));