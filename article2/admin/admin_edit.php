<?php 
  // 修改管理员
  include '../common/conn.php';
  include '../common/check.php';
  
  $id = $_GET["id"];
  // echo $id;
  $username = $_POST["username"];
  $password = $_POST["password"];
  $email = $_POST["email"];
  $description = $_POST["description"];
  $rights = $_POST["rights"];
  
  // 管理员用户名不可更改  后面改成可以修改了
  $result = mysqli_query($con,"update admin set username='$username', password='$password',email='$email',description='$description',rights = '$rights' where id='$id'");
  if($result){
    echo "<script>alert('修改成功');location.href='../backstage/user_list.php';</script>";
  }else{
    echo "<script>alert('修改失败');location.href='../backstage/user_list.php';</script>";
  }

?>