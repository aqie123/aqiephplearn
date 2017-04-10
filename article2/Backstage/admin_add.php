<?php 
	include '../common/conn.php';
	include '../common/check.php';
  error_reporting(0);
  session_start();
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
								
							</span>&nbsp;&nbsp;内容管理
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
					    <li><a href="pwd_edit.php"><span class="glyphicon glyphicon-credit-card"></span>&nbsp;&nbsp;修改密码</a></li>
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
	 				<a href="user_list.php" class="list-group-item active">用户管理</a>
	 				<a href="user_search.php" class="list-group-item">用户搜索</a>
	 				<a class="list-group-item" href="./admin_add.php" role="button"  disabled>添加用户</a>
	 			</ul>
	 		</div>
	 		<div class="col-md-10">
	 			<div class="page-header">
	 				<h4>用户管理</h4>
	 			</div>
	 			<ul class="nav nav-tabs">
	 				<?php if($rights==1){ ?>
	 				<li >
	 					<a href="user_list.php">用户列表</a>
	 				</li>
	 				<?php } ?>
	 				<li>
	 					<a href="user_search.php">用户搜索</a>
	 				</li>
	 				<li class="active">
	 					<a href="./admin_add.php" role="button"  disabled="disabled">添加用户</a>
	 				</li>
	 			</ul>
				<!-- 提交表单 -->
				<div class="container" id="adduser">	
					 <div class="row">
				     <div class="col-md-10">
							 <form action="../admin/admin_add.php" method="post" name="addadmin" onsubmit=" return valid()">
				        	<div class="form-group">
				        		<label for="addname">用户名</label>
				        		<input type="text" name="username" id="addname" class="form-control" placeholder="用户名" >
				        	</div>
				        	<div class="form-group">
				        		<label for="addpass">用户密码</label>
				        		<input type="text" name="password" id="addpass" class="form-control" placeholder="用户密码" >
				        	</div>
				        	<div class="form-group">
				        		<label for="details">简单描述</label>
				        		<input type="text" name="description" id="details" class="form-control" placeholder="简单描述" >
				        	</div>
				        	<div class="form-group">
				        		<label for="email">用户邮箱</label>
				        		<input type="email" name="email" id="email" class="form-control" placeholder="用户邮箱">
				        	</div>
				        	<div class="form-group">
				        		<label>所属用户组</label>
				        		<select class="form-control" name="rights">
				        			<option value="2">管理员</option>
				        			<?php  if($rights==1){ ?>
					        			 <option value="1">超级管理员</option>
					        		<?php } ?>				        			        			
				        		</select>
				        	</div>
				        	<div class="modal-footer">
						        <button type="reset" class="btn btn-default" >重置</button>
						        <button type="submit" class="btn btn-default">添加</button>
						      </div>
							 </form>
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
	</div>	
	<script src="js/plug/vue.js"></script>
	<script src="public/js/jquery-3.1.1.min.js"></script>				
	<script src="public/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	// js验证添加管理员不能为空
	// document.write([1,2]+[3,4]);
	var valid=function(){
		var username = document.addadmin.username.value;
		var password = document.addadmin.password.value;
		var description = document.addadmin.description.value;
		var email = document.addadmin.email.value;
		if(username ==='' || password==='' || description===''|| email===''){
			alert("js请填写完整表单");
			return false;
		}else{
			return true;			
		}
	}


	// 点击编辑用户后
	var edit = $('.adminedit li:nth-of-type(1)');
	</script>
</body>
</html>