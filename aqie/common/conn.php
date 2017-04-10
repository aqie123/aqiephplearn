<?php
$mysqli = new mysqli("localhost", "root", "root");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}else{
    echo "数据库连接成功";
}
//设置数据库编码
$mysqli->query("set names 'utf8'");