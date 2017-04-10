<?php 
  // 进行留言回复
  include "conn.php";
  include 'newClass.php';

  $mag = new newClass();
  // echo $_GET["id"];

  // 回复提交数据过滤后保存到变量
  if(isset($_POST["title"]) && isset($_POST["content"]) && isset($_POST["username"])){
    $id = $_GET["id"];
    $title = $mag->magic($_POST["title"]);
    $content = $mag->magic($_POST["content"]);
    $username = $mag->magic($_POST["username"]);
    $recontent = $mag->magic($_POST["recontent"]);
    // echo $title;
    // echo $content;
    // echo $username."<br>";
    // echo $recontent;
    
    // 向数据库中写入
    $result = mysqli_query($con,"update guestlist set title ='$title',username = '$username', content = '$content',reply=1, recontent = '$recontent' where id='$id'");
    // echo $result;
    if($result){
      echo "<script>location.href='index.php'</script>";
    }else{
      echo "<script>alert('回复失败');location.href='index.php'</script>";
    }
  }
?>