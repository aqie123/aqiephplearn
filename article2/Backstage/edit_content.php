<?php 
	include '../common/conn.php';
	include '../common/check.php';
	// 从文章分类表中循环数据
	// 获取到需要编辑的文章内容(修改的内容不是通过页面传过来的，通过传过来id查找数据库)
	$id = $_GET["id"];
	$rights = $_SESSION['rights'];
	
	$result = mysqli_query($con,"select * from list where id_l = '$id'");
	while($row = mysqli_fetch_array($result)){
		$title = $row["title"];
		$typeid = $row["typeid"];
		$author = $row["author"];
		$source = $row["source"];
		$content = $row["content"];
		$content =htmlspecialchars_decode($content);
		$recommend= $row["recommend"];
	}
	// echo $typeid;
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
					<?php if($rights==1){ ?>
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
					    <?php session_start(); echo $_SESSION["username"]; ?>
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
	 				<a href="content.php" class="list-group-item ">文章管理</a>
	 				<a href="add_content.php" class="list-group-item">添加文章</a>
	 				<a href="#" class="list-group-item active">编辑文章</a>
	 			</ul>
	 		</div>
	 		<div class="col-md-10">
	 			<div class="page-header">
	 				<h4>文章管理</h4>
	 			</div>
	 			<ul class="nav nav-tabs" role="tablist">
	 				<li role="presentation"  >
	 					<a href="content.php">文章管理</a>
	 				</li>
	 				<li role="presentation">
	 					<a href="add_content.php">添加文章</a>
	 				</li>
	 				<li role="presentation" class="active">
	 					<a href="#">编辑文章</a>
	 				</li>
	 			</ul>
				<form action="../list/list-edit.php?id=<?php echo $id;?>" name="list" method="post" onsubmit="return test()">
					<div class="form-group">
						<label for="title">标题</label>
						<input type="text" name="title" id="title" class="form-control" value="<?php echo $title; ?>">
					</div>
					<div class="form-group">
						<label for="type">文章分类</label>
        		<select class="form-control" name="type" id="type">
        			<?php 
        				$result = mysqli_query($con,"select * from type");
        				while($row = mysqli_fetch_array($result)){
        					
        			?>
        			<option value="<?php echo $row['id']; ?>"
								<?php 
									if($row[id]==$typeid){ 			// 如果id不相等不选中
								?>
								selected = "selected"
								<?php } ?>

        			><?php echo $row["typename"]; ?></option>
        			<?php 
        				} 
        			?>
        		</select>
					</div>
					<div class="form-group">
						<label for="author">文章作者</label>
						<input type="text" name="author" id="author" class="form-control" value="<?php echo $author; ?>">
					</div>
					<div class="form-group">
						<label for="source">文章来源</label>
						<input type="text" name="source" id="source" class="form-control" value="<?php echo $source; ?>">
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="recommend"
								<?php if($recommend){ ?> 
								checked="checked"
								<?php } ?>
							  value="1">是否推荐
						</label>
					</div>
					<div class="form-group">
						<label for="editor">文章内容</label>
						<script id="editor" type="text/plain" style="width:100%px;height:300px;" name="content"><?php  echo $content; ?></script>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox">全局置顶
						</label>
						<button class="btn btn-success pull-right" type="submit">修改文章</button>
					</div>
				</form>

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

  <button onclick="hasContent()">判断是否有内容</button>
  <button onclick="setContent()">插入内容</button>
	<script src="public/js/jquery-3.1.1.min.js"></script>				
	<script src="public/js/bootstrap.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="../plugs/utf8-php/ueditor.config.js"></script>
  <script type="text/javascript" charset="utf-8" src="../plugs/utf8-php/ueditor.all.min.js"> </script>
  <script type="text/javascript" charset="utf-8" src="../plugs/utf8-php/lang/zh-cn/zh-cn.js"></script>
	<script type="text/javascript"> 
	// 初始化富文本编辑器
	
	function test(){
		var title = document.list.title.value;
		var type = document.list.type.value;
		var author = document.list.author.value;
		var source = document.list.source.value;
		var iframe = document.getElementById('ueditor_0').contentWindow;
		var content = iframe.document.body.innerText;
		content = $.trim(content);
		// content = content.replace(/\n/g, '');
		if(title === "" || type === "" || author === "" || source === "" || content === ""){
			alert("请填写完整表单");
			return false;
		}
		// alert(content);
		return true;
	}


	 var ue = UE.getEditor('editor');
	 //  ue.ready(function() {
	 //    ue.setContent('<?php strip_tags($content); echo $content; ?>', true);
	 //  });
	</script>
</body>
</html>