<?php 
	// 显示文章列表
	// 显示录入员(将session存进数据库)
  // 显示录入时间
  // error_reporting(0);
	include "../common/conn.php";
	include "../common/check.php";
	$result = mysqli_query($con,"select count(*) from list order by id_l desc");
	// 文章列表分页显示
	$pagesize = 7;		// 每页显示条数
	$row = mysqli_fetch_array($result);
	$infocount = $row[0]; // 信息总条数
	$pagecount = ceil($infocount/$pagesize);		// 总共有几页

	// echo $pagecount;
	$currentpage = empty($_GET["page"])?1:$_GET["page"];
	// echo $currentpage;
	$page = ($currentpage-1)*$pagesize;	// (当前页数-1)*每页条数
  $result = mysqli_query($con,"select * from list order by id_l desc limit $page, $pagesize");
 ?>

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
	<style type="text/css">
		html{font-size:20px;}
		/*1rem=20px;*/
		.root{
			position: relative;
		}
		.pagination{
			position: absolute;
			width: 13.5rem;
			height:2rem;
			right: 0.1rem;
			top:14rem;
			z-index: -1;
			
		}
		footer{
			position: absolute;
			top:32rem;
		}
		@media only screen and (max-width:30rem) {
				thead th:nth-of-type(3),thead th:nth-of-type(5){
					display: none;
				}
		    tr td:nth-of-type(3),tr td:nth-of-type(5){
		    	display: none;
		    }
		    footer{
		    	margin:0 auto;
					position: absolute;
					text-align: center;
					top:38rem;
					left:3.3rem;
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
		 		<a href="../foreground/index.php" class="navbar-brand wow">AQIE ADMIN</a>
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
								
							</span>&nbsp;&nbsp;文章管理
						</a>
					</li>
					<?php 
							
							session_start();
							$rights = $_SESSION['rights'];
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
	<div class="container root">
	 	<div class="row">
	 		<div class="col-md-2">
	 			<ul class="list-group">
	 				<a href="content.php" class="list-group-item active">文章管理</a>
	 				<a href="add_content.php" class="list-group-item ">添加文章</a>
	 			</ul>
	 		</div>
	 		<div class="col-md-10">
	 			<div class="page-header">
	 				<h4>文章管理</h4>
	 			</div>
	 			<ul class="nav nav-tabs" role="tablist">
	 				<li role="presentation" class="active" >
	 					<a href="content.php">文章管理</a>
	 				</li>
	 				<li role="presentation">
	 					<a href="add_content.php">添加文章</a>
	 				</li>
	 			</ul>
				
	 			<table class="table">
	 				<thead>
	 					<tr>
	 						<th>文章标题</th>
	 						<th>作者</th>
	 						<th>来源</th>
	 						<th>录入员</th>
	 						<th>发布时间</th>
	 						<th>操作</th>
	 					</tr>
	 				</thead>
	 				<tbody>
	 					<?php 
	 						while($row = mysqli_fetch_array($result)){
	 					?>
	 					<tr>
	 						<td><?php echo $row["title"]; ?></td>
	 						<td><?php echo $row["author"]; ?></td>
	 						<td><?php echo $row["source"]; ?></td>
	 						<td><?php echo $row["typer"]; ?></td>
	 						<td><?php echo date("Y-m-d H:i:s",$row["time"]); ?></td>
	 						<td>
	 							<div role="presentation" class="dropdown">
								    <button class="dropdown-toggle btn btn-default" data-toggle="dropdown" href="#">
								      操作 <span class="caret"></span>
								    </button>
								    <ul class="dropdown-menu" role="menu">
								     	<li><a href="edit_content.php?id=<?php echo $row['id_l']; ?>">编辑</a></li>
								     	<li><a href="../list/list-del.php?id=<?php echo $row['id_l']; ?>">删除</a></li>
								     	<li><a href="#">全局置顶</a></li>
								    </ul>
								 </div>
	 						</td>
	 					</tr>
	 					<?php } ?> 					
	 				</tbody>
	 			</table>
				<!-- 分页开始 -->
				<div class="pagination">
					<nav class="">
					  <ul class="pagination">
					    <li class=""><a href="?page=<?php echo ($currentpage-1 <=0)?1:($currentpage-1) ?>	">&laquo;</a></li>
					    <?php
					   	 $n = 0; 
					    	while($n<$pagecount){
					    		$n++;
					    ?>
					    <li 
					    	<?php if($currentpage==$n){?> 
					    		class="active"
					    	<?php } ?>
					    >
					    	<a href="?page=<?php echo $n;?>"><?php echo $n;?></a></li>
					    <?php } ?>
					    <li><a href="?page=<?php echo ($currentpage+1) >= $pagecount ? $pagecount : ($currentpage+1) ?>">&raquo;</a></li>
					  </ul>
					</nav>
				</div>
	 		</div>
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
	 	</div>
	   <!-- footer开始 -->
		 
	  <!-- footer结束 -->
	</div>

		

	


	


	 


	<script src="public/js/jquery-3.1.1.min.js"></script>				
	<script src="public/js/bootstrap.min.js"></script>
	<script type="text/javascript">

	</script>
</body>
</html>