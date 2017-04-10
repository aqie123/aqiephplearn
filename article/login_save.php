<?php 
  error_reporting(0);
  include 'conn.php';

  $username = $_POST["username"];
  $password = $_POST['pwd'];
  // echo $username.$password;
  $code = $_POST['verification'];
  session_start();
  // echo $_SESSION["code"];       // 系统生成验证码
  // echo "<br>".$code;            // 用户输入密码
  
  if($code != $_SESSION["code"]){
    echo "<script>alert('验证码输入错误');location.href = 'index.php'</script>";
     exit;
  }

  // 判断是否是超管，是->进入后台管理，否则返回
  $result = mysqli_query($con,"select count(*) from admin where username='$username' and password='$password'");
  $row = mysqli_fetch_row($result);
  // echo $row[0];
  if($row[0]){
    session_start();    //这里还可以加个判断      
    $_SESSION['isok']='ok';
    echo "<script>location.href = './backstage/user_list.php'</script>";
  }else{
     echo "<script>alert('用户名或密码错误');location.href = 'index.php'</script>";
     exit;
  }
?>