<?php
// $name = $_GET['name'];
// $name = urldecode($_GET['name']);
// echo $name;

/**
 * $array=explode(separator,$string);   // 字符串变数组
$string=implode(glue,$array);       // 数组转换字符串
 */
if(isset($_POST['name'])){
    $arrs = $_POST['name'];     // 字符串
    echo "aaa";
}else{
    echo 3333;
}

$arrs = str_split($arrs,1);
function change($arrs){
    $exts = array(
        0 =>'零',
        1 =>'一',
        2 =>'二',
        3=>'三',
        4=>'四',
        5=>'五',
        6=>'六',
        7=>'七',
        8=>'八',
        9=>'九'
    );
    foreach ($arrs as $key=>$arr){
        $arrs[$key] =$exts[$arr];
    }
    return $arrs;
}
$res = change($arrs);   // 数组
$res  = implode($res);
//foreach ($res as $r){
//    echo $r;
//}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>


<form action="test.php" method="post">
    <input type="text" name="name"/>
    <button>提交</button>
</form>
<input type="text" value="<?php echo $res;?>">
</body>
</html>
