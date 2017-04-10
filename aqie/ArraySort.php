<?php
/*
 * 冒泡排序
 * 选择排序
 * 插入排序
 * 快速排序
 *
 * 顺序查找
 * 二分查找
 *
 * */
$arr1 = array(1=>11,2=>22,3=>4,55=>6,7=>45);
//sort($arr1);
print_r($arr1);     //下标都不见了
echo "<br>";
asort($arr1);       // 保留键值关系
print_r($arr1);

// 冒泡排序  遍历如果左边比右边大移动位置,要比较n-1次
$a = array(4,24,5,74,7,8,2,54,75,9,58,);
function BubbleSort($arr){
    $n = count($arr);
    for($i = 0;$i < $n-1;++$i){         //比较多少轮
        for($k = 0;$k<$n-$i-1;++$k){      //每一轮比较多少次
            // 也可以把k当做下标
            if($arr[$k] > $arr[$k+1]){      // 简单数值互换
                $temp = $arr[$k];
                $arr[$k] = $arr[$k+1];
                $arr[$k+1] = $temp;
            }
        }
    }
    echo "<br>冒泡排序后数组:";
    print_r($arr);
}
BubbleSort($a);

// 选择排序  将数组数据最大值的下标，并将最大值下标单元和最后单元交换，(比较n-1轮,第一轮比较n 个数据)
function SelectionSory($arr){
    $n = count($arr);
    for($i = 0;$i<$n-1;++$i){
        $max = $arr[0];   //找最大值
        $pos = 0;       //最大值下标
        for($k = 0;$k<$n-$i;++$k){      //比较n个数据
            // k可以理解为比较次数，也可以看做下标
            if($arr[$k]>$max){
                $max = $arr[$k];
                $pos = $k;
            }
        }
        // 最大值和剩余数据最后一个单元交换
        $tmp = $arr[$pos];
        $arr[$pos] = $arr[$n-$i-1];     // 每轮最后一个数据
        $arr[$n-$i-1] = $tmp;
    }
    echo "<br>选择排序后数组:";
    print_r($arr);
}
SelectionSory($a);

echo "<br>";
// 顺序查找
$a = array(2,4,6,8,13,51,66,71,72,74,75,78,81,98,101,121,134,451,2211,3331);         // 判断是否有88
function find($arr,$val){
    foreach($arr as $key=>$value){
        if($value == $val){
            return $key;                // 返回值所在下标
        }
    }
    return -1;
}
var_dump(find($a,3));

echo "<br>";
//二分查找  1.针对排好序的索引数组
$search = 33;
$len = count($a);
$c = 0;
function binary_search($arr,$s,$begin,$end){
    $GLOBALS['c']++;
    echo $GLOBALS['c'];
    if($begin>$end){             //找到最后只剩一个值，会出错
        return false;
    }
    $mid = floor($begin+$end)/2;        // 向下取整
    $mid_value = $arr[$mid];            // 取得中间值
    if($mid_value == $s){
        return true;
    }else if($mid_value >$s){   // 就在左边找
        return binary_search($arr,$s,$begin,$mid-1);
    }else{                      // 在右边找
        return binary_search($arr,$s,$mid+1,$end);
    }
}
$v1 = binary_search($a,$search,0,6);
echo "结果为：";var_dump($v1);





