<?php 

  // 再次验证插入是否有空数据
  // 判断注册邮箱或用户名是否重复
  // 添加管理员
  // 对密码进行md5加密
  include "../common/conn.php";
  include "../common/newClass.php";
  include '../common/check.php';

  $mag = new newClass();

  $username = $mag->magic($_POST["username"]);
  $password = $mag->magic($_POST["password"]);
  
  $password = md5($password);
  // echo $password;
  // exit;
  $email = $mag->magic($_POST["email"]);
  $rights = $_POST["rights"];
  $description = $mag->magic($_POST["description"]);
  
  // echo "我是用户名".$username."<br>";
  // echo "我是密码：".$password."<br>";
  // echo "我是邮箱：".$email."<br>";
  // echo "我是描述：".$description."<br>";

  // 实现向数据库添加数据
  if($username === '' || $password === '' || $email === '' || $description === ''){
    echo "<script>alert('请确认信息完整性');location.href='../backstage/user_list.php';</script>";
  }else{
    $sql1 = mysqli_query($con,"select count(*) from admin where username = '$username'");
    $sql2 = mysqli_query($con,"select count(*) from admin where email = '$email'");
    $num1 =  mysqli_fetch_row($sql1);       //接收返回查询值
    $num2 =  mysqli_fetch_row($sql2);       
    if($num1[0]!=0){
      echo "<script>alert('用户名已存在');location.href='../backstage/user_list.php';</script>";
      exit;
    }else if($num2[0]!=0){
      echo "<script>alert('邮箱已存在');location.href='../backstage/user_list.php';</script>";
    }else{
       $result = mysqli_query($con,"insert into admin(username,password,email,description,rights)
        values('$username','$password','$email','$description','$rights')");      // 踩了关键字坑坑死了
        if($result){
          echo "<script>alert('添加管理员成功');location.href='../backstage/user_list.php';</script>";
        } else{
          echo "<script>alert('注册插入失败');location.href='../backstage/user_list.php';</script>";
        }
    }
  }


 

 


 ?>