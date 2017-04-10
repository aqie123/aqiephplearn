<?php
/**
 *mysql 优化 ： 存储引擎，索引，缓存，字段设计
 * Memcache (memory cache 内存缓存技术) 和 redis
 * 区别：
 * 1.memcache 每个key 最大数据1M
 *  对各种技术支持全面，session以及各种框架
 *  数据类型只有string
 *  没有持久化
 * 2.redis 每个key最大1G
 *  适合做集合计算(list,set.sortset)
 *  数据类型(string,list,set, sort set,hash )
 *  持久化
 *
 * 联系：
 * 1.数据存储在内存中
 * 2.都是key=>value
 * 3.
 */
/*
 * 开启其服务：
 * 1. memcached.exe -d start
 * 2. memcached -p 11211
 *
 * 在终端操作
 *  telnet 127.0.0.1 11211
 *
 *
 * php 脚本语言，不能操作内存
 * memcached 安装
 *  a. memcached.exe -d install  安装
 *  b. memcached.exe -d start   启动
 *  c.“控制面板”->“程序”->“程序和功能”->“打开或关闭Windows功能”中打开“Telnet客户端”
 *  d. telnet 127.0.0.1 11211
 * 改变默认端口 ： memcached -p 11213 -l 127.0.0.1 -m 128MB
 *  e. memcached.exe -d stop  关闭服务
 *
 * 给php开启扩展
 *  extension=php_memcache.dll
 * $obj->set(key,value,是否压缩,有效期);
 */

// 实例化对象
$mem = new Memcache();
$flag = $mem->connect('localhost','11211');
//print_r($flag);
// 存进数据库 一个key
$mem ->set('week','Sunday',0,3600);     // 时间差3600秒 不能超过30天
$mem->set('time','18',0,3000);      // 时间差
$mem->set('name','aqie',0,time()+60);      // 时间戳

/**
 * php 8种类型
 * 基本类型 ： int string boolean float
 * 复合类型 ; array object resource null
 */
$mem ->set('age',20,0);
$mem ->set('name','aqie',0);
$mem ->set('isold',false,0);
$mem ->set('pai',3.14,0);
$city=array('a'=>1,'b'=>2);
$mem ->set('city',$city);
class person{
    var $name = 'john';
    function run(){
        echo 'i can run';
    }
}
$per = new person();
$mem ->set('person',$per);
$mem->set('kong',null);

//序列化 serialize()  unserialize()

echo $mem->getVersion();
// add() 存在就增加，不存在就报错  set()不存在添加，存在就修改
/**
 * close() 关闭
 * decrement() 给key值减一
 * increment() 给key的值加一
 * flush() 清空所有数据
 * replace() 替换key值，不存在就报错
 */

/**
 * 终端操作
 * set school(key) 0(不压缩) 0(很快过期) 6(六个字节)
 * 数据 aqie12
 * get school
 * replace addr 0 300 5
 *
 * 获取统计信息
 * stats
 * uptime 运行时间和
 */

/**
 * 分布式设计
 * redis主从模式  一主多从
 * memcached  把一台平均分配给多个
 *
 *
 */

/**
 * 缓存丢失
 */

/**
 * session 入memcache
 * 传统session存储在硬盘服务器中
 */