<?php 
  error_reporting(0);   //关闭报错提醒
  include 'conn.php';
  // 防止注入，登录
  session_start();
  if($_SESSION["isok"]!=="ok"){
    echo "您没有权限";
    exit;
  }
  $id = $_GET["id"];
  echo $id;
  $result = mysqli_query($con,"select * from guestlist where id=$id");
  // 传过来id数对应标题
  while($row=mysqli_fetch_array($result)){
    $title = $row["title"];
    $content = $row["content"];
    $username = $row["username"];
    $recontent = $row["recontent"];
  }
  // echo $content;
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>留言回复</title>
  <link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css">
  <style type="text/css">
    .container{
      margin-top: 10%;
    }
  </style>
</head>
<body>
  <div class="container replay">
      <form action="save.php?id=<?php echo $id; ?>" method="post" class="form-horizontal" name="form3" onsubmit="return test()">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">留言标题</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" placeholder="留言标题" value="<?php echo $title ?>" name="title">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">用户名</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword3" placeholder="用户名" value="<?php echo $username ?>" name="username">
          </div>
        </div>
        
        <div class="form-group">
          <label  class="col-sm-2 control-label">留言内容</label>
          <div class="col-sm-10">
            <textarea name="content" class="form-control" rows="6" placeholder="请输入留言" ><?php echo $content ?></textarea>
          </div>      
        </div>
        <div class="form-group">
          <label  class="col-sm-2 control-label">回复留言</label>
          <div class="col-sm-10">
            <textarea name="recontent" class="form-control" rows="6" placeholder="请输入留言"><?php echo $recontent ?></textarea>
          </div>      
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="" value="提交" class="btn btn-primary ">
          </div>
        </div>
      </form>
  </div>
  

  <script type="text/javascript">
    function test(){
      return true;
    }
  </script>
</body>
</html>