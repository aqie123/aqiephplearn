<?php 
  // 删除管理员 
  include '../common/conn.php';
  include '../common/check.php';
  
  $id = $_GET["id"];
  // echo $id;
  $result = mysqli_query($con,"delete from admin where id=$id");
  if($result){
    echo "<script>alert('删除成功'); location.href='../backstage/user_list.php'</script>";
  }else{
    echo "<script>alert('删除失败');</script>";
  }

?>