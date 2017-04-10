<?php 
  // 修改文章分类(修改和删除都需要传id)
  error_reporting(0);
  include "../common/conn.php";
  include "../common/check.php";
  include "../common/newClass.php"; 
  $mag = new newClass();
  $typename = $mag->magic($_POST["typename"]);
  $id = $_GET['id'];
  // echo $typename.$id;
  //写入数据库
  $result = mysqli_query($con,"update type set typename='$typename' where id=$id");
  if($result){
    echo "<script>alert('修改标签成功');location.href='../backstage/tag.php';</script>";
  }




?>