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
					<li>
						<a href="tag.php">
							<span class="glyphicon glyphicon-tag">
								
							</span>&nbsp;&nbsp;标签管理
						</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
					   <a id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    admin
					     <span class="caret"></span>
					   </a>
					   <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
					    <li><a href="#"><span class="glyphicon glyphicon-move"></span>&nbsp;&nbsp;前台首页</a></li>
					    <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;个人主页</a></li>
					    <li><a href="#"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;个人设置</a></li>
					    <li><a href="#"><span class="glyphicon glyphicon-credit-card"></span>&nbsp;&nbsp;账户中心</a></li>
					    <li><a href="#"><span class="glyphicon glyphicon-heart"></span>&nbsp;&nbsp;我的收藏</a></li>
					  </ul>
					</li>
					<li>
						<a href="#bbs">
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
	 				<a href="user_list.php" class="list-group-item ">用户管理</a>
	 				<a href="user_search.php" class="list-group-item active">用户搜索</a>
	 				<a class="list-group-item" href="" role="button" data-toggle="modal" data-target="#myModal">添加用户</a>
	 				<!-- Button trigger modal -->
	 			</ul>
	 		</div>
	 		<div class="col-md-10">
	 			<div class="page-header">
	 				<h4>用户管理</h4>
	 			</div>
	 			<ul class="nav nav-tabs" role="tablist">
	 				<li role="presentation">
	 					<a href="user_list.php">用户列表</a>
	 				</li>
	 				<li class="active" role="presentation">
	 					<a href="user_search.php">用户搜索</a>
	 				</li>
	 				<li role="presentation">
	 					<a href="" role="button" data-toggle="modal" data-target="#myModal">添加用户</a>
	 				</li>
	 			</ul>

	 			<form action="#">
	 				<div class="alert alert-info" role="alert">
	 					<strong>技巧提示：</strong> 支持模糊搜索和匹配搜索，匹配搜索使用*代替！
	 				</div>
	 				<div class="form-group">
	 					<label for="username">用户名</label>
	 					<input type="text" name="" id="username" class="form-control" placeholder="请输入用户名">
	 				</div>
	 				<div class="form-group">
	 					<label for="uid">UID</label>
	 					<input type="text" name="" id="uid" class="form-control" placeholder="请输入UID">
	 				</div>
	 				<div class="form-group">
	 					<label for="group">选择用户组</label>
	 					<select class="form-control" id="group">
	 						<option>限制会员</option>
	 						<option>新手上路</option>
	 						<option>注册会员</option>
	 						<option>中级会员</option>
	 						<option>高级会员</option>
	 					</select>
	 				</div>
	 				<button type="submit" class="btn btn-success">搜索</button>
	 			</form>


	 		</div>
	 	</div>
	 </div>

		

	

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">添加用户</h4>
	      </div>
	      <div class="modal-body">
	        <form action="#">
	        	<div class="form-group">
	        		<label for="addname">用户名</label>
	        		<input type="text" name="" id="addname" class="form-control" placeholder="用户名">
	        	</div>
	        	<div class="form-group">
	        		<label for="addpass">用户密码</label>
	        		<input type="text" name="" id="addpass" class="form-control" placeholder="用户名">
	        	</div>
	        	<div class="form-group">
	        		<label for="conpass">确认用户密码</label>
	        		<input type="text" name="" id="conpass" class="form-control" placeholder="用户名">
	        	</div>
	        	<div class="form-group">
	        		<label for="email">用户邮箱</label>
	        		<input type="text" name="" id="email" class="form-control" placeholder="用户名">
	        	</div>
	        	<div class="form-group">
	        		<label>所属用户组</label>
	        		<select class="form-control">
	        			<option>限制会员</option>
 						<option>新手上路</option>
 						<option>注册会员</option>
 						<option>中级会员</option>
 						<option>高级会员</option>
	        		</select>
	        	</div>
	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	        <button type="button" class="btn btn-primary">提交</button>
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

	</script>
</body>
</html>