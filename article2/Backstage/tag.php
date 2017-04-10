<?php 
	include '../common/conn.php';
	include '../common/check.php';
	// error_reporting(0);
	// 从数据库读取文章分类

?>


<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>后台管理</title>
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.black.css">
	<link rel="stylesheet" type="text/css" href="css/3.css">
</head>
<body>
	 <nav class="navbar navbar-default ">
	 	<div class="container">
	 		<!-- 小屏幕导航按钮和logo BEGIN-->
	 		<div class="navbar-header">
	 			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		 			<span class="icon-bar"></span>
		 			<span class="icon-bar"></span>
		 			<span class="icon-bar"></span>
		 		</button>
		 		<a href="#" class="navbar-brand wow">AQIE ADMIN</a>
	 		</div>
	 			 		
	 		<!-- 小屏幕导航按钮和logo END -->
 
	 		<!-- 导航 BEGIN-->
			<div class="navbar-collapse collapse ">
				<ul class="nav navbar-nav">
					<li>
						<a href="index.php">
							<span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;后台首页
						</a>
					</li>
					<li >
						<a href="user_list.php">
							<span class="glyphicon glyphicon-user">
								
							</span>&nbsp;&nbsp;用户管理
						</a>
					</li>
					<li >
						<a href="content.php">
							<span class="glyphicon glyphicon-list-alt">
								
							</span>&nbsp;&nbsp;内容管理
						</a>
					</li>
					<li class="active">
						<a href="#">
							<span class="glyphicon glyphicon-tag">
								
							</span>&nbsp;&nbsp;标签管理
						</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
					   <a id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <?php echo $_SESSION["username"]; ?>
					     <span class="caret"></span>
					   </a>
					   <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
					    <li><a href="../index.php"><span class="glyphicon glyphicon-move"></span>&nbsp;&nbsp;前台首页</a></li>
					    <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;个人主页</a></li>
					    <li><a href="#"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;个人设置</a></li>
					    <li><a href="pwd_edit.php"><span class="glyphicon glyphicon-credit-card"></span>&nbsp;&nbsp;账户中心</a></li>
					    <li><a href="#"><span class="glyphicon glyphicon-heart"></span>&nbsp;&nbsp;我的收藏</a></li>
					  </ul>
					</li>
					<li>
						<a href="../admin/out_login.php">
							<span class="glyphicon glyphicon-off">		
							</span>退出
						</a>
					</li>
				</ul>
			</div>
	 		

	 	</div>
	 </nav>
	 <!-- 导航 END-->

	<div class="container tag">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h3>TAG分类名称</h3>
				</div>
				
					<form action="../classification/addtype.php" method="post" name="type" id="type" onsubmit="return test()">
						<div class="col-md-10 col-xs-12">
							<input type="text" name="typename" class="form-control" placeholder="请添加标签">
						</div>
						<div class="col-md-2 col-xs-12">
							<button type="submit" class="btn btn-default addbtn">添加</button>
						</div>
					</form>

					<div class="col-md-12 taglist">
              <?php 
	               $result = mysqli_query($con,"select * from type order by id");
								 while($row = mysqli_fetch_array($result)){							  
							?>
              <div class="alert alert-info alert-dismissible  pull-left" role="alert">
                  <button type="button" class="close" data-dismiss="" aria-label="Close">
                  	<a href="../classification/deltype.php?id=<?php echo $row['id']; ?>">
                  		<span aria-hidden="true">&times;</span>
                  	</a>
                  </button>
                  <div><a href="tag_edit.php?id=<?php echo $row['id']; ?>">edit</a></div>
                  <?php echo $row["id"]; ?>
                  <strong><?php echo $row["typename"]; ?></strong>
              </div>
              <?php } ?>
		      </div>
				
			</div>
		</div>
	</div>

	 <!-- footer开始 -->
	 <footer>
	 	<div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>
                    Copyright&nbsp;©&nbsp;2017-2020&nbsp;&nbsp;www.aqie.com&nbsp;&nbsp;
                </p>
            </div>
        </div>
    </div>
	 </footer>
	<!-- footer结束 -->


	<script src="public/js/jquery-3.1.1.min.js"></script>				
	<script src="public/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	function test(){
		var typename = document.type.typename.value;
		if(typename ==""){
			alert("请填写数据");
			return false;
		}
		return true;
	}
	</script>
</body>
</html>