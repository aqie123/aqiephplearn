<?php 
  // 身份验证
  error_reporting(0);
  session_start();
  header("Content-Type:text/html;charset=utf-8");
  if($_SESSION['isok']!='ok'){
    echo "<script>alert('您没有权限');location.href = '../login.php'</script>";
    exit;
  };
 ?>