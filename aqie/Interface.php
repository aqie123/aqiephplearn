<?php
    /*
     * 接口
     *降低类与类复杂度，语言是单继承,通过接口对没有多继承类补充
     * 接口可以实现多继承，但叫实现
     * 类1有了接口1特征
     * */
    interface aqie
    {
        //  全是抽象方法(没有方法体)+常量
        const PI = 3.14;
        function f1();
        function f2($a);
    }

    interface Player        //接口
    {
        function play();
        function stop();
    }
    interface USBset
    {
        const USEWidth = 12;
        const USBHeight= 5;
        function dataIn();
        function dataOut();
    }
    abstract class MP3Player implements Player,USBset        //从两个接口获取特征信息，并实现功能
    {
        // 可以实现方法,也可以继续写抽象方法
        function play(){}
        function stop(){}
        function dataIn(){}
        function dataOut(){}
    }

    /*
     * 类和接口总结
     *
     *
     * */

    /*
     * 类的自动加载
     * 需要类：1.new新对象，2.使用类的静态方法时候3.定义类并以另一个类作为父类
     *
     * 自定义自动加载
     * sql_autoload_register("函数名");
     *
     * */
//    function __autoload($class_name)      //按需加载
//    {
////        echo "<br> 自动加载准备在autoload加载类：$class_name";
////        require_once './class/'.$class_name.".class.php";
//    }
//    $obj = new A();         // 自动调用autoload函数
    echo "<br>";
//    var_dump($obj);
    // 自定义
    spl_autoload_register("autoload1");
    spl_autoload_register("autoload2");
    function autoload1($class_name){        // 用于加载class目录文件
        echo "<br> 准备在autoload1加载类：$class_name";
        $file = './class/'.$class_name.".class.php";
        if(file_exists($file)){
            include_once $file;
        }
        // 如果不存在，则本函数没有成功加载类文件，就会继续找后续加载函数

    }
    function autoload2($class_name){        // 用于加载lib目录文件
        echo "<br> 准备在autoload2加载类：$class_name";
        $file = './lib/'.$class_name.".class.php";
        if(file_exists($file)){
            include_once $file;
        }
    }
    $a = new A();       // 在class目录下
    echo "<br>";
    var_dump($a);
    $b = new B('小明','女');       // 在lib目录下
    echo "<br>";
    var_dump($b);

    /*
     * 对象的复制(克隆)，会自动调用该类中魔术方法
     * $obj2 = clone $obj1;
     *
     * 禁止克隆
     * private function __clone(){}     // 私有化克隆的魔术方法
     *
     * */
    $obj1 = new A();
    $obj2 = $obj1;  // 值传递  (只是复制对象编号,依旧只有一个对象)
    $obj1->p1 = 2;

    // 此时只有一个对象
    echo "<br>";
    var_dump($obj1);
    echo "<br>";
    var_dump($obj2);
    echo "<br>";
    $obj3 = &$obj1;     //还是一个对象
    var_dump($obj3);
    echo "<br>";
    $obj4 = clone $obj1;
    var_dump($obj4);
    echo "<hr>";
    $obj1->p1 = 3;
    var_dump($obj1);echo "<br>";
    var_dump($obj4);echo "<br>";            // 不受影响

/*
 * 对象遍历
 *
 * */
echo "<hr>";
foreach ($obj1 as $key =>$value){       // 只有公共变量才遍历出来
    echo "<br> 属性$key :$value";
}
$obj1->showAllProperties();


/*
 * php内置标准类
 * class stdClass{}
 * 可以存储一些临时简单数据，也可以类型转换时存储数据
 * */

/**
 * 对象类型转换
 * 对象->对象 无变化
 * 数组->对象 键作为属性名
 * (数字下标数据转换为对象，无法通过对象语法获取)
 * null ->空对象
 * 其它标量（整形，浮点型，字符型，布尔型）->属性名未固定的scalar,值为该变量值
 */
$config = array(
    'host'=>'localhost',
    'user'=> 'aqie',
    5=>15
);
$obj = (object)$config;
echo "<pre>";
var_dump($obj);
echo "</pre>";
//echo "数字取不出来".$obj->5;      // 报错
echo "<hr>";
$v1 = 1;    $objv1 = (object)$v1;
$v2 =1.2;
$v3 = "ccc";
$v4 = true;
var_dump($objv1);


/**
 * 类型约束(某个变量只能接收存储指定数据类型)
 *
 * 数组 array
 * 对象 使用类的名称，表示 传递过来实参，必须是该类的实例
 * 接口 使用接口名称 ，表示 传递过来实参，必须实现了该接口的实例（对象）
**/
echo "<hr>";
echo $obj1->p1;
class C{} ;      // 类
interface USB{} ;    // 接口
class D implements  USB{}  ; // 类实例了接口USB
function restraint($p, array $p1,C $p2,USB $p3)
{
    echo "<br> 无约束 $p";
    echo "<br> 要求是数组 p1";
    print_r($p1);
    echo "<br> 要求是类C对象 p2：";
    var_dump($p2);
    echo "<br> 要求是实现接口USB的对象 p:3";
    var_dump($p3);
}
$obj1 = new C();
$obj2 = new D();
$arr = array(1,2,3);
/**/

restraint(11,$arr,$obj1,$obj2);

echo "sss";


/**
 *序列化
 * 将变量代表的内存数据，转换成字符串永久保存在硬盘上
 *
 * 反序列化，就是硬盘数据恢复到内存
 *
 */
$v1 = 123;      // 变量，代表人意内存数据
$v2 = array(1,24,3,"b");
$s1 = serialize($v2);   // 将任意变量数据转换为字符串

file_put_contents("./serialization.txt",$s1);

// 反序列化
$s1 = file_get_contents("./serialization.txt");     // 文本文件读出所有字符
$v2 = unserialize($s1);     //字符串数据反序列化转化为字符串
echo "<br>";
var_dump($v2);          // echo 数组只会出单词array
//echo "<br>反序列化数据为:".$v2;

// 对象的序列化  (只有属性可以保存)会自动调用魔术方法__sleep()
$obj = new A();
$obj->p1 = 11;
$obj->p5 = 55;
echo "<pre>";
var_dump($obj);
echo "</pre>";
$s1 = serialize($obj);
file_put_contents("./A.class.txt",$s1);


// 对象反序列化  自动调用__wakeup()
$s2 =  file_get_contents("./A.class.txt");
$obj2 = unserialize($s2);
echo "<pre>";
var_dump($obj2);
echo "</pre>";
//$obj2->f1();


/**
 * __tostring() 将对象当做字符串使用自动调用，并可返回转化后的字符串 (常用)
 */
$obj = new B('啊切','男');
echo $obj;

/**
 *__invoke() 将对象作为函数使用会自动调用该方法  (不推荐)
 *
 */

$obj();         // 调用 魔术方法


/**
 * 总结
 * 与类有关魔术常量
 * __FILE__
 * __DIR__
 * __LINE__
 * __CLASS__        -- 当前所在类类名
 * __METHOD__       --  当前所在类方法名
 *
 * 与类有关系统函数
 * class_exists()       -- 判断类是否定义
 * interface_exits()    --判断接口是否定义
 * get_class()          -- 获得对象所属类
 * get_parent_class()   -- 获得对象所属类的父类
 * get_class_methods()  --获得对象所有方法，结果是数组
 * get_class_vars()     -- 获得对象所有属性名 数组
 * get_declared_classes()   --获得整个系统定义所有类名
 *
 *
 * 与类有关运算符
 * instanceof       --判断变量（对象，数据）是否是某个类实例
 */
echo "<hr>";
$obj->MagicMethods();

echo "<br>";
$v = get_declared_classes();
echo "<pre>";
//var_dump($v);
echo "</pre>";

// 判断对象是否是某个类实例B
$v = $obj instanceof B;     // boolean
var_dump( $v);
echo "<br>";
class C1 extends B{};
$obj = new C1('啊切c','男');
$v = $obj instanceof C1;
var_dump( $v);
echo "<br>";

class BB extends AA{
    static $p1 = 2;     //重写p1
}
$v = $obj instanceof B;     // obj也是B的实例
var_dump( $v);
echo "<br>";

/**
 *
 * static
 * 也可以像self一样，代表当前类，用于访问一个类的静态属性或静态方法
 * 但static更灵活
 * 代表调用当前方法类，不是代码所在类
 * self只代表本身所在位置类
 * 1.函数中代表静态变量
 * 2.
 */
echo "<hr>";
$obj = new AA();
$obj::show();       // 或者 A:show();
BB::show();




