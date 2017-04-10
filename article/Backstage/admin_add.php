<?php 
  include "../conn.php";
  include '../newClass.php';
  $mag = new newClass();
  

  //完成vue读取数据库内容并显示
  $act = $_GET['act'];
  $PAGE_SIZE = 6;
  switch($act){
    case 'add':
      // $username = addslashes($username);
      $username = urldecode($_GET['username']);   //解码
      $username = $mag->magic($username);
      $username=str_replace("\n", "", $username);
      

      $password = urldecode($_GET['password']);
      $password=str_replace("\n", "", $password);


      $email = urldecode($_GET['email']);
      $email=str_replace("\n", "", $email);


      $description = urldecode($_GET['description']);
      $description=str_replace("\n", "", $description);

      $time = time();
      // 完成添加用户
      if($username === '' || $password === '' || $email === '' || $description === ''){
        // echo "<script>alert('请确认信息完整性');location.href='user_list.php';</script>";
        exit;
      }else{
        $sql1 = mysqli_query($con,"select count(*) from admin where username = '$username'");
        $sql2 = mysqli_query($con,"select count(*) from admin where email = '$email'");
        $num1 =  mysqli_fetch_row($sql1);       //接收返回查询值
        $num2 =  mysqli_fetch_row($sql2);       
        if($num1[0]!=0){
          // echo "<script>alert('用户名已存在');location.href='user_list.php';</script>";

          exit;
        }else if($num2[0]!=0){
          // echo "<script>alert('邮箱已存在');location.href='user_list.php';</script>";
          exit;
        }else{
           $result = mysqli_query($con,"insert into admin(username,password,email,description)
            values('$username','$password','$email','$description')");      // 踩了关键字坑坑死了
            if($result){
              // echo "<script>alert('注册成功');location.href='user_list.php';</script>";
            } else{
              // echo "<script>alert('注册插入失败');location.href='user_list.php';</script>";
            }
        }
      }
      $sql3 = mysqli_query($con,"select LAST_INSERT_ID()");
      $row = mysqli_fetch_row($sql3);
      $id = (int)$row[0];
      echo "{\"error\":0, \"id\":{$id},\"time\":{$time}}";
      break;
    case 'get':
      $page = (int)$_GET['page'];
      if($page < 1){
        $page = 1;
      };
      $s = ($page-1)*$PAGE_SIZE;
      $sql = mysqli_query($con,"select id, username, email,description from admin order by id asc limit {$s}, {$PAGE_SIZE}");
      $result = array();
      while($row = mysqli_fetch_array($sql)){
        $arr = array();
        array_push($arr, '"id":'.$row[0]);
        array_push($arr, '"username":"'.$row[1].'"');
        array_push($arr, '"email":"'.$row[2].'"');
        array_push($arr, '"description":"'.$row[3].'"');

        array_push($result,implode(',',$arr));    // 把数组元素组成字符串
      }
      if(count($result)>0){
        echo '[{'.implode('},{',$result).'}]';
      }else{
        echo '[]';
      }
      break;
    case 'delet':
      $id = (int)$_GET["id"];
      $sql = mysqli_query($con,"delete from admin where id={$id}");
      echo "{\"error\":0,\"id\":{$id}}";
      break;
  }

 ?>
