<?php 
  error_reporting(0);
  include "conn.php";

  session_start();
  if($_SESSION['isok']!='ok'){
    echo "<script>alert('您没有权限');location.href = 'index.php'</script>";
    exit;
  }

  //显示所有的管理员
 ?>