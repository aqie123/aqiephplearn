<?php
/**
 * mysqli 基础
 *
 * $result = $conn -> query( 'select * from data_base' );
$row = $result -> fetch_row(); //取一行数据
echo row[0]; //输出第一个字段的值
 *
 *
 * mysql_fetch_row(),mysql_fetch_array()
　　这两个函数，返回的都是一个数组，区别就是第一个函数返回的数组是只包含值，我们只能$row[0],
$row[1],这样以数组下标来读取数据，而mysql_fetch_array()返回的数组既包含第一种，也包含键值
对的形式，我们可以这样读取数据，（假如数据库的字段是 username,passwd）:
 */


/**
* https://zhuanlan.zhihu.com/p/25518629?utm_source=qq&utm_medium=social
* 会话技术
* 变量(常量，静态变量)是脚本周期，跳转时变量销毁
*
* HTTP 无状态性 独立的
* --B/S架构基于http协议进行数据交互
* --http请求响应是独立的，每次请求响应周期都是完全独立的
*
*
*
* session
* (实际中存储管理员信息，或者用户信息)
* 实现方式：
*1，在服务器端建立很多会话数据区
* 2，为每个session会话数据分配唯一标识
* 3，将唯一标识，分配给相应浏览器(存储在cookie)
*
* session_start();     // 生成sessionid
* 操作session数据
*
* session 可以存储任意类型数据
* 操作$_SESSION超全局变量
*
* 语法：
*
*
*
*
*
* cookie(允许 服务器端脚本(php) 程序在 浏览器 上存储数据)
 * setcookie(键，值，有效期(0)，有效路径('/')，有效域(''))
*
* 1.浏览器向服务器 请求 时，会携带该服务器存储数据的cookie（响应时把cookie信息告知浏览器）
* 2.setcookie(键值);
* 3.获取cookie  var_dump($_COOKIE);  获取的一定是浏览器携带的
* 4.浏览器关闭时(会化周期结束),cookie失效
* 5.浏览器判断cookie是否失效
*
* 0：默认值，表示临时cookie
* PHP_INT_MAX 常量值：PHP表示的最大整型（时间戳也是）
* 如果设置PHP_INT_MAX，表示cookie永久存在
* --Time()-1 删除cookie（通用的）
* --第二个参数设为空字符串，也是删除(快捷语法)
*
* 有效路径 （知道就可以）
* cookie仅在当前目录和后代目录有效
* cookie 第四个参数路径  / cookie 整站有效
*
* 有效域(常用)
*某个域名下设置cookie，仅在当前域名下有效
* baidu.com 子域名(二级域名) music.baidu.com
* cookie 支持在一级域名内(所有二级域名间)进行cookie 数据共享
* setcookie(key,value,0,'','');
* setcookie(key,value,0,'','.aqie.com');  .aqie.com所有子域名下有效(默认是当前域)
*
*
* 安全
* 第六个参数，默认false, true则是仅在https下有效
*
* 第七个参数(是否允许浏览器脚本使用，默认false 可以使用)
*
* cookie 仅仅支持字符串
* $_COOKIE 仅仅用于存储浏览器请求时携带的cookie(当前脚本周期setcookie设置的cookie变量，不会出现在$_COOKIE中)
*
* cookie应用（1.存储未登录用户购物车商品，2.多长时间免登陆 3.搜索习惯）
* 长时间存储会话数据，通常用cookie
*
*
*
* 区别
* 1.session存储在服务器端，更安全
* 2.cookie会使传输数据量大
* 3.
*
* php一百个知识点
* http://blog.csdn.net/jimlong/article/details/8592139
*/

/**
 *变量存储在内存中
 * 谁调用谁传参数
 *
 */


/**Cookie记录登录状态
 *cookie存储了可以认定登录状态信息才可以完成
 * 存储信息特点：
 *1. 可验证性
 * 2.保密性
 * （存储加密后 管理员id和 密码的组合）
 *
 * 验证是否具有登录标识，或者是否记录了登录状态(添加登录标识)
 *
 */