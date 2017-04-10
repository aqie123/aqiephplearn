<?php 
  include '../common/conn.php';
  include '../common/check.php';
  $id = $_GET["id"];
  // echo $id;
  $result = mysqli_query($con,"delete from type where id =$id");
  if($result){
    echo "<script>alert('删除成功');location.href='../backstage/tag.php';</script>";
  }else{
    echo "<script>alert('删除失败');location.href='../backstage/tag.php';</script>";
  }

?>