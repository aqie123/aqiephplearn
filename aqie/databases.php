<?php
/*
include "./common/conn.php";

$sql = "insert into tab_int2 (f1,f2,f3)  values(123,123,123) where id =1";
if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
printf ("New Record has id %d.\n", $mysqli->insert_id);
*/
echo "<a href='http://www.aqie.com/php/aqie/mvc/'>用户列表</a>";
echo "<hr>";
// 面向过程  显示所有数据库
$link = mysqli_connect("localhost", "root", "root");
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}else{
    echo "数据库连接成功<br>";
}
mysqli_query($link,"set names 'utf8'");

$sql = "show databases";
$result = mysqli_query($link,$sql);
while($rec = mysqli_fetch_array($result)){
    echo "<br>".$rec['Database'];        // 或者 $rec['Database]  $rec[0]
    echo "<a href='table.php?db={$rec[0]}'> 查看表 </a>";
}

//printf ("New Record has id %d.\n", mysqli_insert_id($link));