<?php 
  // 完成文章列表修改
  include '../common/conn.php';
  include '../common/check.php';
  $id = $_GET["id"];
  // echo $id;
  $title = $_POST["title"];
  $typeid = $_POST["type"];
  $author = $_POST["author"];
  $source = $_POST["source"];
  $content = $_POST["content"];
  $recommend = empty($_POST["recommend"])?0:$_POST["recommend"];
  // echo $recommend;
  // echo $title."<br>";
  // echo $typeid ."<br>";
  // echo $author."<br>";
  // echo $source."<br>";
  // echo $content."<br>";
  // exit;
  $result = mysqli_query($con,"update list set title='$title',author = '$author', source='$source',typeid='$typeid',content='$content',recommend='$recommend' where id_l='$id'");
  if($result){
    echo "<script>alert('修改成功');location.href='../backstage/content.php';</script>";
  }else{
    echo "<script>alert('修改失败');location.href='../backstage/content.php';</script>";
  }

?>