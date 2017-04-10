<?php
// 面向过程 显示数据库中表的数据
$link = mysqli_connect("localhost", "root", "root");
if(!empty($_GET['db'])){
    $db = $_GET['db'];
}else{
    die('非法请求');
}
if(!empty($_GET['tab'])){
    $tab = $_GET['tab'];
}else{
    die('非法请求');
}
mysqli_query($link,"set names 'utf8'");
mysqli_query($link,"use $db");
$sql = "select * from $tab";
$result = mysqli_query($link,$sql);

showTable($result,$link);

function mysqli_field_name($result, $field_offset)
{
    $properties = mysqli_fetch_field_direct($result, $field_offset);
    return is_object($properties) ? $properties->name : null;
}
function showTable($res,$link){
    if($res ===false){
        echo "执行失败".mysqli_error($link);
    }else{
        echo "执行成功";
        echo "<table border='1'>";
        $field_count = mysqli_num_fields($res);  // 获得列数
        echo "<tr>";
        for($i = 0;$i<$field_count;++$i){
            $field_name = mysqli_field_name($res,$i);        // 获得第i列名字
            echo "<td>".$field_name."</td>";
        }
        echo "</tr>";
        while($rec = mysqli_fetch_array($res)){
            echo "<tr>";
            for($i = 0;$i<$field_count;++$i){
                $field_name = mysqli_field_name($res,$i);        // 获得第i列名字
                echo "<td>".$rec[$field_name]."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

}




