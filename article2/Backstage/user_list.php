<?php 
	include '../common/conn.php';
	include '../common/check.php';
	// error_reporting(0);
	$result = mysqli_query($con,"select * from admin order by id");
	$rights = $_SESSION['rights'];
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>后台管理</title>
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.black.css">
	<link rel="stylesheet" type="text/css" href="css/3.css">
	<style type="text/css">
		@media only screen and (max-width:30rem) {
				thead th:nth-of-type(3),thead th:nth-of-type(5){
					display: none;
				}
		    tr td:nth-of-type(2),tr td:nth-of-type(4){
		    	display: none;
		    }
		}
	</style>
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
					<li class="active">
						<a href="user_list.php">
							<span class="glyphicon glyphicon-user">
								
							</span>&nbsp;&nbsp;用户管理
						</a>
					</li>
					<li>
						<a href="content.php">
							<span class="glyphicon glyphicon-list-alt">
								
							</span>&nbsp;&nbsp;文章管理
						</a>
					</li>
					<?php 
							if($rights==1){
					?>
					<li>
						<a href="tag.php">
							<span class="glyphicon glyphicon-tag">
								
							</span>&nbsp;&nbsp;标签管理
						</a>
					</li>
					<?php } ?>
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

	 <!-- userlist开始 -->
	 <div class="container">
	 	<div class="row">
	 		<div class="col-md-2">
	 			<ul class="list-group">
	 				<?php if($rights == 1){ ?>
	 				<a href="user_list.php" class="list-group-item active">用户管理</a>
	 				<?php } ?>
	 				<a href="user_search.php" class="list-group-item">用户搜索</a>
	 				<a class="list-group-item" href="./admin_add.php" role="button"  disabled>添加用户</a>
	 			</ul>
	 		</div>
	 		<div class="col-md-10">
	 			<div class="page-header">
	 				<h4>用户管理</h4>
	 			</div>
	 			<ul class="nav nav-tabs">
	 				<?php if($rights == 1){ ?>
	 				<li class="active">
	 					<a href="user_list.php">用户列表</a>
	 				</li>
	 				<?php } ?>
	 				<li>
	 					<a href="user_search.php">用户搜索</a>
	 				</li>
	 				<li>
	 					<a href="./admin_add.php" role="button"  disabled="disabled">添加用户</a>
	 				</li>
	 				
	 			</ul>
	 			<?php if($rights == 1){ ?>
	 			<table class="table">
	 				<thead>
	 					<tr>
	 						<th>ID</th>
	 						<th>用户名</th>
	 						<th>用户角色</th>
	 						<th>邮箱</th>
	 						<th>IP</th>
	 						<th>描述</th>
	 						<th>操作</th>
	 					</tr>
	 				</thead>
	 				<tbody>
	 					<?php 
	 					  // 显示数据库里面数据
						  
						  while($row = mysqli_fetch_array($result)){

	 					?>
	 					<tr >
	 						<th scope="row"><?php echo $row["id"]; ?></th>
	 						<td><?php echo $row["username"]; ?></td>
	 						<td>
	 							<?php
	 							 echo $row["rights"]==1?"超级管理员":"管理员"; 
	 							?> 						 	
	 						</td>
	 						<td><?php echo $row["email"]; ?></td>
	 						<td><?php echo $row["ip"]; ?></td>
	 						<td><?php echo $row["description"]; ?></td>
	 						<td>
	 							<div role="presentation" class="dropdown">
								    <button class="dropdown-toggle btn btn-default" data-toggle="dropdown" href="#">
								      操作 <span class="caret"></span>
								    </button>
								    <ul class="dropdown-menu adminedit" role="menu">
								     	<li><a href="./admin_edit.php?id=<?php echo $row['id']; ?>">编辑</a></li>
								     	<li><a href="../admin/admin_del.php?id=<?php echo $row['id']; ?>" >删除</a></li>
								     	<li><a href="#">锁定</a></li>
								     	<li><a href="#">修改密码</a></li>
								    </ul>
								 </div>
	 						</td>
	 					</tr>
	 					<?php } ?>
	 					
	 					<tr class="text-right" v-show="myData.length!=0">
							<td colspan='7'>
								<button class="btn btn-primary" >全部删除</button>
								
							</td>
						</tr>
						<?php 
							// $row = mysqli_fetch_array($result,MYSQLI_BOTH);
							// echo 3;
							// echo $row[2]; 
							// echo "1";
						?>
	 					<tr class="text-center text-muted" >
							<td colspan='7'>
								<p>暂无数据。。。。</p>
							</td>
						</tr>

	 				</tbody>			
	 			</table>
				<?php } ?>
				<!-- 分页开始 -->
	 			<!-- <nav class="pull-right">
				  <ul class="pagination">
				    <li class="disabled"><a href="#">&laquo;</a></li>
				    <li class="active"><a href="#">1</a></li>
				    <li><a href="#">2</a></li>
				    <li><a href="#">3</a></li>
				    <li><a href="#">4</a></li>
				    <li><a href="#">5</a></li>
				    <li><a href="#">&raquo;</a></li>
				  </ul>
				</nav> -->

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
	</div>
	<?php 
		if($rights == 2){
			echo "<script> var rights = 2;</script>";
		}
	?>	
	<script src="js/plug/vue.js"></script>
	<script src="public/js/jquery-3.1.1.min.js"></script>				
	<script src="public/js/bootstrap.min.js"></script>
	<script>
		 // alert(rights);
		 // if(rights ==2){
		 	// 虽然读取到session。发现并没有什么乱用
		 	// $('.table').hide();
		 	// $('.nav li:nth-of-type(1)').hide();
		 	// $('.list-group a:nth-of-type(1)').hide();
		 // }
		 
	</script>
	
</body>
</html>