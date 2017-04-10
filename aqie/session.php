<?php
/**
 * session使用
 * 可以区分浏览器
 * （浏览器存储session）就是一个普通cookie变量，PHPSESSID=>名字很长
 * 自动开启
 * session不能重复开启 @session_start();
 *
 * 有效期
 * 默认关闭浏览器
 *
 * 有效域名
 * 仅在当前域名下有效
 *
 * 控制session属性
 * 方案一：
 * cookie存储的sessionid决定session属性
 * 1、session.cookie_lifetime(默认0)  php.ini
 * 2.有效路径整站有效
 * 3.有效域（默认当前域）
 * 4.session.cookie_secure仅安全连接传输(默认非)
 *5.session.cookie_httponly(默认非)，js也能拿到
 *
 * 方案二：(开启前通过函数配置)
 * 1.ini_set('session.cookie_lifetime','3600');
 * ini_set('session.cookie_domain','.aqie.com');
 *
 * 2.session_set_cookie_params(有效期，有效路径，有效域);  (推荐)
 *session_set_cookie_params(0,'/','.aqie.com');
 *
 *
 * 一般session不做持久化工作，长时间存储使用cookie
 * session数据区默认以文件形式存储在服务器操作系统临时目录中
 * 实际中(重写session 存储机制)：
 * 1.数据库存储
 * 2.数据放到内存中
 *
 * session 从session_start();开始后，创建$_SESSION,从session数据区读取数据。然后反序列化，给$_SESSION赋值
 * 数据从数据区到php.脚本周期内(操作$_SESSION)。脚本周期结束时才会将$_SESSION数据写入数据区
 *
 */


ini_set('session.cookie_lifetime','0');
ini_set('session.cookie_domain','.aqie.com');
//session_start();
$_SESSION['user'] = 'aqie';
$_SESSION['gender']='male';

//修改
$_SESSION['gender']= 'female';

//删除
unset($_SESSION['user']);

//显示(true/false)
var_dump($_SESSION['gender']);
var_dump(isset($_SESSION['gender']));
var_dump(isset($_SESSION['user']));

// 数据类型展示(八种数据类型)

// 字节是存储空间(最小的存储单位),位是计算单位

$_SESSION['int']=24;           // 4个字节Byte=8bits
$_SESSION['float']=24.18;       //8个字节
$_SESSION['string']='aqie';     //
$_SESSION['bool']=false;
$_SESSION['array']=array('php'=>'mysql');

/**
 * Class Student
 * 在session 中存储对象，获取对象，需要找到对象对应的类
 */
class Student{
    private $_name;
    public function __construct($name)
    {
        $this->_name= $name;
    }
}
$_SESSION['object'] = new Student('啊切');
$_SESSION['null'] = NULL;
//资源型数据一般不存在session 中
echo "<hr>显示七种session类型";
echo "<pre>";
var_dump($_SESSION['int']);
var_dump($_SESSION['float']);
var_dump($_SESSION['string']);
var_dump($_SESSION['bool']);
var_dump($_SESSION['array']);
var_dump($_SESSION['object']);
var_dump($_SESSION['null']);
echo "</pre>";

/**
 * session 入库
 *
 */
require './session_db.php';
// 设置垃圾回收几率
ini_set('session.gc_probability','1');
ini_set('session.gc_divisor','2');
session_start();
$_SESSION['new_key'] = 'new_value';
echo "<br>";
var_dump($_SESSION);
//session_destroy();

/**session cookie区别联系
 *
 * session 基于cookie,sessionid存储于cookie
 * 都是会话技术
 *
 * 区别：
 * 存储位置 session 服务器 更安全 大小无限制 数据类型支持全部类型 session几乎不做持久化
 * cookie可以长期存储
 *
 * session 持久化
 * sessionid 持久化 session_set_cookie_params(3600);  //秒
 * 服务器session数据区有效区修改 ini_set('session.gc_maxlifetimr','3600');
 *
 * 浏览器禁用cookie,sessionid不能存储传输（理论上解决，通过url,post数据向服务器每次传输sessionid）
 * session.use_only_cookies = 1; 改为0就可以通过其他方式传输
 * session.use_trans_sid = 0;   是否通过其他方式传输sessionid 改为1
 *
 */


