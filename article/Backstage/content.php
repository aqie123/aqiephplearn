<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>后台管理</title>
	<!-- <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css"> -->
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
					<li class="active">
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
					    <li><a href="3.html"><span class="glyphicon glyphicon-move"></span>&nbsp;&nbsp;前台首页</a></li>
					    <li><a href="3.html"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;个人主页</a></li>
					    <li><a href="3.html"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;个人设置</a></li>
					    <li><a href="3.html"><span class="glyphicon glyphicon-credit-card"></span>&nbsp;&nbsp;账户中心</a></li>
					    <li><a href="3.html"><span class="glyphicon glyphicon-heart"></span>&nbsp;&nbsp;我的收藏</a></li>
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
	 				<a href="content.html" class="list-group-item active">内容管理</a>
	 				<a href="add_content.html" class="list-group-item ">添加内容</a>
	 			</ul>
	 		</div>
	 		<div class="col-md-10">
	 			<div class="page-header">
	 				<h4>内容管理</h4>
	 			</div>
	 			<ul class="nav nav-tabs" role="tablist">
	 				<li role="presentation" class="active" >
	 					<a href="content.html">内容管理</a>
	 				</li>
	 				<li role="presentation">
	 					<a href="add_content.html">添加内容</a>
	 				</li>
	 			</ul>

	 			<table class="table">
	 				<thead>
	 					<tr>
	 						<th>文章标题</th>
	 						<th>作者</th>
	 						<th>发布时间</th>
	 						<th>操作</th>
	 					</tr>
	 				</thead>
	 				<tbody>
	 					<tr>
	 						<td>论啊切是不是最帅的</td>
	 						<td>啊切</td>
	 						<td>2016-12-26</td>
	 						<td>
	 							<div role="presentation" class="dropdown">
								    <button class="dropdown-toggle btn btn-default" data-toggle="dropdown" href="#">
								      操作 <span class="caret"></span>
								    </button>
								    <ul class="dropdown-menu" role="menu">
								     	<li><a href="#">编辑</a></li>
								     	<li><a href="#">删除</a></li>
								     	<li><a href="#">全局置顶</a></li>
								    </ul>
								 </div>
	 						</td>
	 					</tr>
	 					<tr>
	 						<td>产品经理常犯的7大错误，你造吗？</td>
	 						<td>啊切</td>
	 						<td>2016-12-26</td>
	 						<td>
	 							<div role="presentation" class="dropdown">
								    <button class="dropdown-toggle btn btn-default" data-toggle="dropdown" href="#">
								      操作 <span class="caret"></span>
								    </button>
								    <ul class="dropdown-menu" role="menu">
								     	<li><a href="#">编辑</a></li>
								     	<li><a href="#">删除</a></li>
								     	<li><a href="#">全局置顶</a></li>
								    </ul>
								 </div>
	 						</td>
	 					</tr>
	 					<tr>
	 						<td>如何正确使用python日志系统</td>
	 						<td>啊切</td>
	 						<td>2016-12-26</td>
	 						<td>
	 							<div role="presentation" class="dropdown">
								    <button class="dropdown-toggle btn btn-default" data-toggle="dropdown" href="#">
								      操作 <span class="caret"></span>
								    </button>
								    <ul class="dropdown-menu" role="menu">
								     	<li><a href="#">编辑</a></li>
								     	<li><a href="#">删除</a></li>
								     	<li><a href="#">全局置顶</a></li>
								    </ul>
								 </div>
	 						</td>
	 					</tr>
	 					<tr>
	 						<td>Android开发用onCreateOptionsMenu()如何创</td>
	 						<td>啊切</td>
	 						<td>2016-12-26</td>
	 						<td>
	 							<div role="presentation" class="dropdown">
								    <button class="dropdown-toggle btn btn-default" data-toggle="dropdown" href="#">
								      操作 <span class="caret"></span>
								    </button>
								    <ul class="dropdown-menu" role="menu">
								     	<li><a href="#">编辑</a></li>
								     	<li><a href="#">删除</a></li>
								     	<li><a href="#">全局置顶</a></li>
								    </ul>
								 </div>
	 						</td>
	 					</tr>
	 					<tr>
	 						<td>怎样才能成为优秀的iOS开发工程师</td>
	 						<td>啊切</td>
	 						<td>2016-12-26</td>
	 						<td>
	 							<div role="presentation" class="dropdown">
								    <button class="dropdown-toggle btn btn-default" data-toggle="dropdown" href="#">
								      操作 <span class="caret"></span>
								    </button>
								    <ul class="dropdown-menu" role="menu">
								     	<li><a href="#">编辑</a></li>
								     	<li><a href="#">删除</a></li>
								     	<li><a href="#">全局置顶</a></li>
								    </ul>
								 </div>
	 						</td>
	 					</tr>
	 					<tr>
	 						<td>Android今年推出了些什么新技术？</td>
	 						<td>啊切</td>
	 						<td>2016-12-26</td>
	 						<td>
	 							<div role="presentation" class="dropdown">
								    <button class="dropdown-toggle btn btn-default" data-toggle="dropdown" href="#">
								      操作 <span class="caret"></span>
								    </button>
								    <ul class="dropdown-menu" role="menu">
								     	<li><a href="#">编辑</a></li>
								     	<li><a href="#">删除</a></li>
								     	<li><a href="#">全局置顶</a></li>
								    </ul>
								 </div>
	 						</td>
	 					</tr>
	 					<tr>
	 						<td>怎样才能成为优秀的前端开发工程师</td>
	 						<td>啊切</td>
	 						<td>2016-12-26</td>
	 						<td>
	 							<div role="presentation" class="dropdown">
								    <button class="dropdown-toggle btn btn-default" data-toggle="dropdown" href="#">
								      操作 <span class="caret"></span>
								    </button>
								    <ul class="dropdown-menu" role="menu">
								     	<li><a href="#">编辑</a></li>
								     	<li><a href="#">删除</a></li>
								     	<li><a href="#">全局置顶</a></li>
								    </ul>
								 </div>
	 						</td>
	 					</tr>
	 				</tbody>
	 			</table>
				<!-- 分页开始 -->
	 			<nav class="pull-right">
				  <ul class="pagination">
				    <li class="disabled"><a href="#">&laquo;</a></li>
				    <li class="active"><a href="#">1</a></li>
				    <li><a href="#">2</a></li>
				    <li><a href="#">3</a></li>
				    <li><a href="#">4</a></li>
				    <li><a href="#">5</a></li>
				    <li><a href="#">&raquo;</a></li>
				  </ul>
				</nav>



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