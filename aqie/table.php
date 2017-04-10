<?php
// 面向过程 显示数据库中表
$link = mysqli_connect("localhost", "root", "root");
if(!empty($_GET['db'])){
    $db = $_GET['db'];
}else{
    die('非法请求');
}
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}else{
    echo "数据库连接成功<br>";
}
mysqli_query($link,"set names 'utf8'");
mysqli_query($link,"use $db");


//$sql = "insert into tab_int (f1,f2,f3)  values(123,123,123)";
$sql = "show tables";
$result = mysqli_query($link,$sql);
while($rec = mysqli_fetch_array($result)){
    echo "<br>".$rec['0'];        // 或者 $rec['table']  $rec[0]
    echo "<a href='table_struct.php?db=$db&tab={$rec[0]}'> 查看结构  </a>";
    echo "<a href='table_data.php?db=$db&tab={$rec[0]}'> 查看表内容</a>";
}