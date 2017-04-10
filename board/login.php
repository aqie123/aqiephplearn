<?php 
  header("Content-Type:text/html;   charset=utf-8"); 
  include "conn.php";
  include "newClass.php";

  $mag = new newClass();

  if(isset($_POST["adname"]) && isset($_POST["adpwd"])){
    $username = $mag->magic($_POST["adname"]);
    $password = $mag->magic($_POST["adpwd"]);
    // echo $username.$password;

    // 数据查询
    $re = mysqli_query($con,"select count(*) from b_user where b_username = '$username' and b_password = '$password'");
    $row = mysqli_fetch_row($re);
    $isok = $row[0];
    // echo $isok;
    // 通过session登录
    if($isok){
      session_start();
      $_SESSION["isok"] = "ok";
      echo "<script>alert('登录成功');location.href = 'index.php'</script>";
    }else{
      echo "<script>alert('用户名或密码错误');location.href = 'index.php'</script>";
    }


    
  }

  // 通过session 退出登录
    if($_GET['action'] == 'logout'){
      session_start();
      session_destroy();
      //为使框架整个页面跳转到登陆页
      echo "<script>alert('已经退出登陆');location.href='index.php';</script>";
    }

 ?>