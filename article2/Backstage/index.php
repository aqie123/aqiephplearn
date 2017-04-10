<?php 
  error_reporting(0);
  session_start();
  if($_SESSION['isok']!='ok'){
    echo "<script>alert('您没有权限');location.href = '../login.php'</script>";
    exit;
  }
  $rights = $_SESSION["rights"];

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
		 		<a href="../foreground/index.php" class="navbar-brand wow">AQIE ADMIN</a>
	 		</div>
	 			 		
	 		<!-- 小屏幕导航按钮和logo END -->
 
	 		<!-- 导航 BEGIN-->
			<div class="navbar-collapse collapse ">
				<ul class="nav navbar-nav">
					<li class="active">
						<a href="#">
							<span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;后台首页
						</a>
					</li>
					<li>
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

	  	
	  <div class="container homepage">
	  	<div class="row">
	  		<!-- 警告框开始 -->
	  		<div class="col-md-12">
	  			<div class="alert alert-warning alert-dismissible fade in" role="alert">
				  <button type="button" class="close" data-dismiss="alert">
				  	<span aria-hidden="true">&times;</span>
				  	<span class="sr-only">Close</span>
				  </button>
				  <strong>Warning!</strong>
				  <p>网站有漏洞！</p> 
				  <p>
				  	 <button type="button" class="btn btn-danger">立即处理</button>
				 	 <button type="button" class="btn btn-default" data-dismiss="alert">稍后处理</button>
				  </p>
				</div>
	  		</div>
	  		<!-- 警告框 结束-->

	  		<!-- 网站统计开始 -->
	  		<div class="col-md-6 count">		<!-- 面板样式 -->
				<div class="panel panel-default">
					<div class="panel-heading">网站数据统计</div>
					<div class="panel-body">
						<table class="table table-hover">
						 	<thead>
						 		<tr>
						 			<th>统计项目</th>
						 			<th>今日</th>
						 			<th>昨日</th>
						 		</tr>
						 	</thead>
						 	<tbody>
						 		<tr>
						 			<th>注册会员</th>
						 			<td>200</td>
						 			<td>400</td>
						 		</tr>
						 		<tr>
						 			<th>登录会员</th>
						 			<td>4200</td>
						 			<td>3444</td>
						 		</tr>
						 		<tr>
						 			<th>今日发帖</th>
						 			<td>22322</td>
						 			<td>42555</td>
						 		</tr>
						 		<tr>
						 			<th>转载次数</th>
						 			<td>522</td>
						 			<td>525</td>
						 		</tr>
						 	</tbody>			
						</table>

					</div>
				</div>
	  		</div>
	  		<!-- 网站统计结束 -->

			<!-- 网站热帖开始 -->
	  		<div class="col-md-6 post">
	  			<div class="panel panel-default">
					<div class="panel-heading">网站热帖</div>
					
						<ul class="list-group">
							<li class="list-group-item">
								<a href="#">张艺谋《长城》10亿票房无望 谁来背这个锅
								<small class="pull-right">2016-12-25</small>
								</a>
							</li><li class="list-group-item">
								<a href="#">张艺谋《长城》10亿票房无望 谁来背这个锅
								<small class="pull-right">2016-12-25</small>
								</a>
							</li><li class="list-group-item">
								<a href="#">张艺谋《长城》10亿票房无望 谁来背这个锅
								<small class="pull-right">2016-12-25</small>
								</a>
							</li><li class="list-group-item">
								<a href="#">张艺谋《长城》10亿票房无望 谁来背这个锅
								<small class="pull-right">2016-12-25</small>
								</a>
							</li><li class="list-group-item">
								<a href="#">张艺谋《长城》10亿票房无望 谁来背这个锅
								<small class="pull-right">2016-12-25</small>
								</a>
							</li>
							<li class="list-group-item">
								<a href="#">张艺谋《长城》10亿票房无望 谁来背这个锅
								<small class="pull-right">2016-12-25</small>
								</a>
							</li>
							
						</ul>
					
				</div>
	  		</div>
	  		<!-- 网站热帖结束 -->

	  		<!-- 今日访客统计开始 -->
	  		<div class="col-md-6">
	  			<div class="panel panel-default">
	  				<div class="panel-heading">今日访客统计</div>
	  				<div class="panel-body">
	  					<canvas id="canvas" class="col-md-12"></canvas><!-- 创建画布 -->	
	  				</div>
	  			</div>
	  		</div>
	  		<!-- 今日访客结束 -->

	  		<!-- 服务器状态开始 -->
	  		<div class="col-md-6">
	  			<div class="panel panel-default">
	  				<div class="panel-heading">服务器状态</div>
	  				<div class="panel-body">
	  					<p>内存占用率：40%</p>
	  					<div class="progress">
						  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
						    <span class="sr-only">40% Complete (success)</span>
						  </div>
						</div>
						<p>数据库使用率：20%</p>
						<div class="progress">
						  <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
						    <span class="sr-only">20% Complete</span>
						  </div>
						</div>
						<p>磁盘使用率：60%</p>
						<div class="progress">
						  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
						    <span class="sr-only">60% Complete (warning)</span>
						  </div>
						</div>
						<p>CPU使用率：80%</p>
						<div class="progress">
						  <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
						    <span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
	  				</div>
	  			</div>
	  		</div>
	  		<!-- 服务器状态结束 -->

	  		<!-- 团队留言板开始 -->

	  		<div class="col-md-12">
	  			<div class="panel panel-default">
	  				<div class="panel-heading">团队留言板</div>
	  				<div class="panel-body">
	  					<!-- 留言显示区块开始 -->
	  					<div class="col-md-7">
 
	  						<div class="media well">   <!--媒体对象-->
							  <a class="media-left" href="#">
							    <img src="picture/a.png" alt="安卓" class="wh64">
							  </a>
							  <div class="media-body">
							    <h4 class="media-heading">萧峰</h4>
							    网站有漏洞，记得升级哈
							  </div>
							</div>

							<div class="media well">
							  <div class="media-body text-right">
							    <h4 class="media-heading">啊切</h4>
							    知道，今晚准时升级
							  </div>
							  <a class="media-right" href="#">
							    <img src="picture/b.png" alt="ios" class="wh64">
							  </a>							  
							</div>

							<div class="media well">
							  <div class="media-body text-right">
							    <h4 class="media-heading">啊切</h4>
							    你提前发下公告哈
							  </div>
							  <a class="media-right" href="#">
							    <img src="picture/b.png" alt="ios" class="wh64">
							  </a>							  
							</div>
							
							<div class="media well">   <!--媒体对象-->
							  <a class="media-left" href="#">
							    <img src="picture/a.png" alt="安卓" class="wh64">
							  </a>
							  <div class="media-body">
							    <h4 class="media-heading">萧峰</h4>
							    好的
							  </div>
							</div>


	  					</div>
	  					<!-- 留言显示区块结束-->

	  					<!-- 留言板提交区块 -->
	  					<div class="col-md-5">
	  						<form action="#">
	  							<div class="form-group">
	  								<label for="text1">请输入留言内容</label>
	  								<textarea class="form-control" id="text1" placeholder="请输入留言" rows="5"></textarea>
	  								<button class="btn btn-success subbtn" type="submit">提交</button>
	  							</div>
	  						</form>
	  						<!-- 团队联系区块 -->
	  						<div class="panel panel-default">
	  							<div class="panel-heading">团队联系手册</div>
	  							<div class="panel-body">
	  								<ul class="list-group">
	  									<li class="list-group-item">
	  										站长（啊切）:<span class="glyphicon glyphicon-phone"></span>13131381671
	  									</li>
	  									<li class="list-group-item">
	  										结束（啊切）:<span class="glyphicon glyphicon-phone"></span>13131381671
	  									</li>
	  									<li class="list-group-item">
	  										推广（啊切）:<span class="glyphicon glyphicon-phone"></span>13131381671
	  									</li>
	  									<li class="list-group-item">
	  										客服（啊切）:<span class="glyphicon glyphicon-phone"></span>13131381671
	  									</li>
	  								</ul>
	  							</div>
	  						</div>
	  					</div>


	  				</div>
	  			</div>		
	  		</div>
	  		<!-- 团队留言板结束 -->
			



	  		


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
	<script src="public/js/bootstrap.js"></script>
	<script src="js/Chart.js"></script>
	<script src="js/script.js"></script>
	<script type="text/javascript">

	</script>
</body>
</html>