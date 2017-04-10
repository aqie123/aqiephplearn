<?php 
  // 添加文章分类
  error_reporting(0);
  include "../common/conn.php";
  include "../common/check.php";
  include "../common/newClass.php"; 
  $mag = new newClass();
  $typename = $mag->magic($_POST["typename"]);
  // echo $typename;
  //写入数据库
  $result = mysqli_query($con,"insert into type(typename) values('$typename')");
  if($result){
    echo "<script>alert('插入标签成功');location.href='../backstage/tag.php';</script>";
  }




?>