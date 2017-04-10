<?php 
  //  判断登录验证码
  //  判断是否是超管  
  //  判断是否登陆成功
  //  添加登录人ip
  // error_reporting(0);
  include '../common/conn.php';
  // include '../common/check.php';

  $username = $_POST["username"];
  $password = $_POST['pwd'];
  $password = md5($password);
  $code = $_POST['verification'];
  session_start();
  // echo $_SESSION["code"];       // 系统生成验证码
  // echo "<br>".$code;            // 用户输入密码
  
  if($code != $_SESSION["code"]){
    echo "<script>alert('验证码输入错误');location.href = '../login.php'</script>";
     exit;
  }


  // 判断是否是超管，是->进入后台管理，否则返回
  $result = mysqli_query($con,"select count(*) from admin where username='$username' and password='$password'");
  $row = mysqli_fetch_row($result);
  // echo $row[0];
  if($row[0]){
    $result = mysqli_query($con,"select * from admin where username = '$username'");
    while($row = mysqli_fetch_array($result)){
      // echo $row["username"];
      // echo $row["rights"];
      $_SESSION['username'] = $row['username'];
      $_SESSION['rights'] = $row['rights'];
      $_SESSION['isok']='ok';
    }
    // session_start();    //这里还可以加个判断  是否重复启动session   
    // echo $_SESSION['username'].$_SESSION['rights'].$_SESSION['isok'];
    // exit;

    //登陆成功后写入ip
    $ip = $_SERVER["REMOTE_ADDR"];
    // echo $ip;
    $result = mysqli_query($con,"update admin set ip = '$ip' where username = '$username'");
    
      echo "<script>location.href = '../backstage/index.php'</script>";

    
  }else{
     echo "<script>alert('用户名或密码错误');location.href = '../login.php'</script>";
     exit;
  }
?>