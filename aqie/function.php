<?php
    // 定义一个没有形参却可以接收任意个数实参
    function f0(){
        $arr  = func_get_args();   // 获取实参数据列表，成为数组
//        func_get_arg(i)     //获取第i个实参从0开始
//        func_num_argus();     // 获取实参个数
        echo "<p> 函数被调用其实参为<br>";
        foreach ($arr as $value) {
            echo $value . "<br>";
        }
    }
    f0(1,2,3,4);

    // 可变函数
    $a = "abc";
    $abc = 233;
    echo $$a;  // 可变变量

    function f1(){
        echo "<br>哎";
    };
    $v1 = "f1";
    $v1();    //可变函数


    // 根据上传不同图片调用不同函数
    function jpg(){echo "<br>处理jpg图片";}
    function png(){echo "<br>处理png图片";}
    function gif(){echo "<br>处理gif图片";}
    $file = "abc.min.png";  //用户上传图片
    $houzhui = strrchr($file,".");      // 用于获取$s1中最后一次出现字符串$s2后所有字符串
    $houzhui = substr($houzhui,1);      //字符串从位置1开始之后所有内容
    echo "<br> $houzhui";
    $houzhui();


//    匿名函数调用方式一
$f2 = function($p1,$p2){               // php不支持函数重载
    echo "<br> 匿名函数";
    $res = $p1+$p2;
    return $res;

};
$result = $f2(5,6);         //不接受没有意义
echo $result;
//f1();

// 匿名函数调用方式二(回调函数)
function f3($x,$y,$z){
    $s1 = $x+$y;
    $s2 = $x-$y;
    $z($s1,$s2);
}
f3(3,4,function($m1,$m2){
    echo "m1 = $m1,m2 = $m2";
});
f3(3,4,function($m1,$m2){
    $n = $m1*$m2;
    echo "两个数乘积是$n";
});

//数组a是一个有序整型数组，
//写一个函数判断数组里面有没有两个数，他们的和为变量sum，
function foobar(array $array,$sum){
    $temp = $array;
    foreach($array as $value){
        next($temp);
        if(($value +current($temp)) ==$sum) {
            return true;
        }
    }
    return false;
}
var_dump(foobar([1,2,3,4,5,],5));

if(function_exists("f1")==false){   // 判断函数时是否定义
    function f1(){
        echo "<br> 这个函数新定义";
    }
}
f1();


echo "<hr>";
// 求平方
$arr = array(1,2,3,4,5);
foreach($arr as $k =>$v){
    $arr[$k] = $v*$v;
}
echo "<pre>";
var_dump($arr);

echo "<hr>";
function square($num)
{
    return $num * $num;
}
array_map('square',$arr);
var_dump($arr);



