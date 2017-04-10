<?php
$a1 = 1;
function f1(){
    global $a1;     //声明一个要使用外部变量的同名变量(局部变量，只是同名)
    echo "<br>函数内部访问不了全局变量：a1=$a1";
    $a1 = 2;        // 内部和外部变量指向同一数据区域,而且会改变全局值
}
f1(); // 1
function f11(){
    echo "<br>局部访问全局变量 a1 =" . $GLOBALS['a1'];
    $GLOBALS['a1'] = '233';   // 全局变量另一种定义形式
}
f11();  // 2
echo "<br>a1 = $a1";    // 233


function f2(){
    $a2 = 1;   // 可以通过echo 来输出
}
f2();
echo "<br>函数外部访问不了内部变量：a2=$a2";     // 会报错

function f3(){
    static $c = 0;      //静态变量不会被销毁，赋初值只执行一次
    $d=0;
    $c++;
    $d++;
    echo "<br>函数被调用{$c}次：c= $c,d=$d";
}
f3();   // 1 1 1
f3();  // 2 2 1
f3();   // 3 3 1


// 停止使用全局变量采用传参
$var  =  'hello';
test($var);
function test($var){
    echo "<br>".$var;
}

// 通过构造函数传递外部参数到类内部
$url ="www.baidu.com";
class test{
    public $url;        // 只能在类中，声明变量方法和属性直接在外部调用,global可以用在函数中
    function __construct($url = '')
    {
        $this->url = $url;
    }
    function showUrl(){
        echo "<br>".$this->url;
    }
}
$test = new test($url);
$test->showUrl();
