<?php 
  // 数据库存入文章列表内容
  include '../common/conn.php';
  include '../common/check.php';
  include '../common/newClass.php';
  session_start();
  $mag = new newClass();
  $title = $mag->magic($_POST["title"]);
  $typeid = $mag->magic($_POST["type"]);
  $author = $mag->magic($_POST["author"]);
  $source= $mag->magic($_POST["source"]);
  $content = $_POST["content"];
  // echo $title;
  // echo $content;
  // exit;
  $content = $mag->magic($content);
  $recommend = empty($_POST["recommend"])?0:$_POST["recommend"];
  
  // echo $recommend;
  // exit;

  // echo $title.$typeid.$author.$source.$content;
  $result = mysqli_query($con,"insert into list (title,author,source,content,typeid,time,typer,recommend)
    values('$title','$author','$source','$content','$typeid',".time().",'".$_SESSION["username"]."','$recommend')");
  // echo "insert into list (title,author,source,content,typeid,time,inputer)
  //   values('$title','$author','$source','$content','$typeid',".time().",'".$_SESSION["username"]."')
  // ";
  // exit;
  if($result){
    echo "<script>alert('提交文章成功');location.href='../backstage/content.php';</script>";
  }else{
    echo "<script>alert('提交文章失败');location.href='../backstage/content.php';</script>";
  }

 ?>