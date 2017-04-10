<?php
// 面向过程(没有选择数据库)
$link = mysqli_connect("localhost", "root", "root");
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}else{
    echo "数据库连接成功<br>";
}
mysqli_query($link,"set names 'utf8'");
