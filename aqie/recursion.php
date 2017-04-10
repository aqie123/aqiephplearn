<?php
/* 函数编程思想
 * 递归思想(效率相对较低)
 * 递推(迭代)
 *
 * */
function fa1($n){
    echo $n;
    $n++;
//    f1($n);  //无限循环
}
//f1(1);

/*
 * 求阶乘  n = n*n-1;
 * */
function factory($n){       // 递归
    if($n == 1){
        return 1;
    }
    $result = $n * factory($n-1);
    return $result;
}
$v1 = factory(2);
echo "阶乘".$v1;

/*
 * 1 1 2 3 5 8 13   n>=3 n=n-1+n-2 相邻项商接近黄金分割(递归)
 * */
function Fibonacci($n){             //递归
    if($n == 1 || $n==2){
        return 1;
    }
    if($n == 2){
        return 1;
    }
    $res = Fibonacci($n-1)+Fibonacci($n-2);
    return $res;


}
$v1 = Fibonacci(12);
echo "<br>$v1";


/*
 * 递推思想
 * */
function factory2($n){          //求阶乘
    $result = 1;
    for($i = 2;$i<=$n;++$i){
        $result = $result *$i;
    }
    return $result;
}
$v1 = factory2(8);
echo "<br>".$v1;

/*
 * 斐波那契数列（递推）
 * */
function Fibonacci2($n)
{
    $first = $second =1;
    $res = 1;
    for ($i = 3; $i <= $n; ++$i) {
        $res = $first +$second;
        $first = $second;
        $second= $res;
    }
    echo "<br>".$res;

}
Fibonacci2(2);
echo "<hr>";

/*
 *判断是否是素数,是返回true
*/
function prime($num){       // 判断素数
    $count = 0;        // 计数能被整除个数
    for($i = 1;$i<=$num;++$i){
        if($num % $i ==0){
            $count++;
        }
    }
    return $count == 2 ? true : false;
}
function outputPrime($num){     // 输出素数
    echo "2到{$num}所有素数:";
    for($i=0;$i<=$num;++$i){
        if(prime($i) == true) {
            echo "{$i} ";
        }
    }
}
outputPrime(10);

/*
 * 判断是否是闰年
 * */
function isLeap($year){
    return  $year %4 ==0 && $year % 100 !=0 || $year %400 ==0;
}
if(isLeap(2009)){
    echo "<br>是闰年";
}else{
    echo "<br>平年";
}

/*
 * 串联字符串
 *
 * */
function series(){
    $arr = func_get_args();     //获取所有实参
    $count = count($arr);
    $s1 = $arr[0];
    $str = "";
    for($i=1;$i<$count;$i++){
        if($i == $count-1){         //最后一项
            $str .=$arr[$i];
        }else{
            $str .= $arr[$i].$s1;
        }

    }
    return $str;
}
$res = series("-","hello","aqie");
echo "<hr>".$res;

/************************************************/
/*
******************递推+递归应用****************************
                                                    */
/************************************************/
echo "<br>递归<hr>";
function f0($n){      // n是n-2三倍 前两个是1,2 3 6 9 18 27 36
    if($n==1){
        return 1;
    }else if($n==2){
        return 2;
    }else{
        $res = f0($n-2)*3;              // 不用for循环
        return $res;
    }
}
echo f0(9);

echo "<br>递推<hr>";
function f00($n){
    $res = 0;
    $a1 = 1;
    $a2 = 2;
    if($n==1){
        $res = 1;
    }else if($n ==2){
        $res = 2;
    }
    for($i = 3;$i<=$n;++$i){
        $res = $a1*3;
        $a1 = $a2;
        $a2 = $res;
    }
    return $res;
}
echo "递推n=(n-2)*3: ".f00(9);

function f1($n){      // 猴子每天吃一半再多吃一个，第十天只有一个桃子，求总数(递归)
    // 9: (1+1)*2=4;
    //8: (4+1)*2 =10
    //n :(n+1 +1)*2
    if($n==10){
        return 1;
    }else{
        $res = (f1($n+1)+1)*2;
        return $res;
    }
}
echo "<br>桃子数：".f1(10);

function f11($n){       //递推 猴子每天吃一半再多吃一个，第十天只有一个桃子，求任意一天桃子数
    $res = 1;
    if($n==10){
        $res =1;
    }
    $a1 = 1;            //第十天桃子数
    for($i = 9;$i>=$n;--$i){
        $res = ($a1+1)*2;
        $a1 = $res;
    }
    return $res;
}
echo "<br>桃子数：".f11(9);


function f22($n){           // 递推 1-2+3-4+5
    $res = 0;
    for($i = 1;$i<=$n;++$i){
        $res += ($i%2 == 0)? (-1)*$i : $i;
    }
    return $res;
}
echo "<br> 结果为：".f22(5)."<br>";

function  f33(){            // 百钱买百鸡
    // 5*a+1*b+0.5*c = 100
    $arr = array();
    for($i = 0;$i<=20;$i++){
        for($j = 0;$j<100;$j++){
            for($k=0;$k<=200;$k++){
                if(($i+$j+$k==100) &&(5*$i+1*$j+0.5*$k==100)){
                    array_push($arr,$i,$j,$k);
                    return $arr;
                }
            }
        }
    }
}
foreach (f33() as $a){
    echo $a." ";
}

/*
 * n只猴子围坐成一个圈，按顺时针方向从1到n编号。
然后从1号猴子开始沿顺时针方向从1开始报数，报到m的猴子出局，再从刚出局猴子的下一个位置重新开始报数，
如此重复，直至剩下一个猴子，它就是大王。
设计并编写程序，实现如下功能：
（1）   要求由用户输入开始时的猴子数$n、报数的最后一个数$m。
（2）   给出当选猴王的初始编号。
 *
 * $n 猴子数， $m报到几
 * */
function monkeySelectKing($n,$m){
    if($n<2){
        return false;
    }
//    $arr = range(1,$n);     //把猴子放进数组
    $r = 0;       //记录猴子报数
    for($i=2;$i<$n;++$i){
        $r = ($r+$m)%$i;
    }
    return $r+1;
}
echo "<hr>";
print_r(monkeySelectKing(4,3));

