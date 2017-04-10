<?php
header("Content-type: text/html; charset=utf-8");
/*数组
*
 */
$a = array(0=>0,1=>11,2=>22,3=>33,4=>44);
 $c = array(0=>5,1=>'ab','key'=>6,'value'=>'ad');

 // list获取(连续)数组值
 list($v1) = $a;        // 数组下标为0项赋值给$a
 list($m1,$m2,$m3,$m4) = $a;        //对应的值
 echo "<br> v1 = $v1";
 echo "<br> m1 = $m1,m2=$m2,m3=$m3,m4=$m4";

 list($key,$value) = $c;
 echo "<br>key=$key,value = $value<br>";        //Array ( [1] => 5 [value] => 5 [0] => 0 [key] => 0 ) key取0的值,value取1的值

// while+each()+list()遍历数组
//each($c)
print_r(each($c));
while(list($key,$value) = each($c)){
    //
    echo "<hr>$key = $value";
}

$c = array(0=>5,1=>'ab','key'=>6,'value'=>'ad');
//foreach 两个遍历效果相同
foreach ($a as $key=>$value){
    $value = $value * 2;        // 数组本身是没变的
    //    Array ( [0] => 0 [1] => 11 [2] => 22 [3] => 33 )
    echo "<br>$key->$value";
}

foreach ($a as $key=> & $value){    // 引用传递(键变量不能使用引用)
//    $value = $value * 2;        // 数组本身变化
    echo "<br>$key->$value";
}
//print_r($a);

foreach ($c as $key=> $value){    // 默认是原数组遍历
    echo "<hr>$key->$value";
    if($key ==="key"){          //这里key是具体值
        break;          // 指针停在下一个键值对
    }
}
$r1 = current($c);
$r2 = key($c);
echo "<br>此时数组指针指向值：$r2=>$r1";  //value=>ad

foreach ($a as $key=>$value){
//                              // 循环中对数组修改,遍历不受影响
    echo "<br>$key->$value";
    if($key ===1){
        $a[6] = "新数据";
    }
}
//print_r($a);

foreach ($a as $key=> & $value){
//                             // 循环中对数组修改,遍历不受影响
    echo "<br>$key->$value";
    if($key ===1){
        $a[6] = "新数据";
    }
}


echo "<hr>";
/*求数组最大值，最小值，平均值
 *
 *
 * */
// 一维数组平均值
$a = [3,7,34,134,42,78,25,8,9];
$len = count($a);
$sum = 0;       // 求总和
$count = 0;     //求存储数组个数

//一维数组最大值
$max = $a[0];
$pos = 0;
$min = $a[0];
$pos2 = 0;
for($i = 0;$i<$len;++$i){
    $sum += $a[$i];  // 累加思想
    ++$count;       //计数思想
//    $count++;     // 只有赋值时候才不同
    if($max<$a[$i]){
        $max = $a[$i];
        $pos = $i;
    }
    if($min>$a[$i]){
        $min = $a[$i];
        $pos2 = $i;
    }
}

echo "<br>平均值为：".($sum/$count);
echo "<br>最大值为：".$max."下标为：".$pos;
echo "<br>最小值为：".$min."下标为：".$pos2;
$tmp = $a[$pos];
$a[$pos] = $a[$pos2];
$a[$pos2] = $tmp;
echo "<br>交换后数组：";
print_r($a);





// 二维数组平均值
$aa = array(
    array(1,11,111),
    array(2,22,222,2222),
    array(3,33,333,3333,33333)
);
$len = count($aa);      //二维数组长度 3
$sum = 0;
$count = 0;
for($i = 0;$i<$len;++$i){
    $temp = $aa[$i];     // 一维数组
    $len2= count($temp);    //一位数组长度
    for($k = 0;$k <$len2;++$k){
        $sum += $temp[$k];
        ++$count;
    }
}
echo "<br> 二维数组平均值".($sum/$count);

// 数组遍历和指针操作


$v1 = current($a);      // 当前指针所在值
$v11 = key($a);          // 当前指针所在键
echo "最初键值分别$v11,$v1<br>";

$v3 = next($a) ;         //先将指针移动到后一个单元，获取值
$v33 = key($a);         // 当前指针所在键
echo "next键{$v33},值{$v3}<br>";

$v4 = prev($a);         //之前单元值
$v6 = reset($a);        //指针移动到新单元，获得值
$v5 = end($a);          //指针移动到单元末尾，获得值

$v7 = next($a);
$v77 = key($a);
echo "end后面next键值:;<br>";
var_dump($v77);
var_dump($v7);

echo "<hr>";
// for next循环数组
$b = array(0=>5,1=>'ab','key'=>6,'value'=>'ad');
$len = count($b);
//echo $len;
for($i = 0;$i<$len;++$i){
    $key = key($b);      // 键
    $value = current($b);
    echo "<br>$key=>$value";
    next($b);           // 指针向后移
}

$key = key($b);
echo "<br>当前键为"; var_dump($key);
reset($b);          // 因为上面循环，所以要重置

$c = array(0=>5,1=>'ab','key'=>6,'value'=>'ad');
// each函数  将数组当前单元 键值放入数组 ，然后移到下一个单元
$res = each($c);
echo "<br>当前数组为:"; print_r($res);
//  Array ( [1] => 5 [value] => 5 [0] => 0 [key] => 0 )

$res = each($c);
echo "<br>当前数组为:"; print_r($res);
//Array ( [1] => ab [value] => ab [0] => 1 [key] => 1 ) 从中间分开


// 不整齐数组平均值   (递归)
$a = array(
    1,
    array(2,4,6),
    8,
    array(12,16,18,array(40,88))
);

// 数组最小奇数
// 判断有没有奇数
echo "<hr>";
$a = array(2,4,6,8,3,9);
$odd = array();
$len = count($a);
foreach($a as $key =>$value){
    // 判断是否存在奇数
    if($value%2 != 0){
        $odd[] = $value;
    }
}
if(count($odd) == 0){
    echo "没有奇数";
}else{
    $min = $odd[0];
    foreach($odd as $value){
        if($value < $min){
            $min = $value;
        }
    }
    echo "最小奇数为".$min;
}

// 函数带一个参数(作为数组)找出数组的第二大值。
//echo  strtoupper("php");



