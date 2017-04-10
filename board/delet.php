<?php 
  error_reporting(0);   //关闭报错提醒
  include 'conn.php';
  // 防止注入，登录
  session_start();
  if($_SESSION["isok"]!=="ok"){
    echo "您没有权限";
    exit;
  }

  $id = $_GET['id'];

  // echo $id;
  $result = mysqli_query($con,"delete from guestlist where id=$id");
  if($result){
    echo "<script>alert('删除成功');location.href='index.php';</script>";
  }else{
    echo "<script>alert('删除失败');location.href='index.php';</script>";
  }
?>