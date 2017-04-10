<?php
  // 修改个人密码并进行md5加密 
  include '../common/conn.php';
  include '../common/check.php';
  $password = $_POST["password"];
  $password = md5($password);
  // echo $password;
  // exit;
  $result = mysqli_query($con,"update admin set password='$password' where username='".$_SESSION["username"]."'");
  if(result){
    echo "<script>alert('密码修改成功');location.href='../login.php';</script>";
    // session_start();
    session_destroy();
  }else{
    echo "<script>alert('密码修改失败');location.href='../backstage/index.php';</script>";
  }



 ?>