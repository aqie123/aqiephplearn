<?php 
  error_reporting(0);
  session_start();
  if($_SESSION['isok']!='ok'){
    echo "<script>alert('您没有权限');location.href = '../index.php'</script>";
    exit;
  }

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
	 				<a href="user_list.php" class="list-group-item active">用户管理</a>
	 				<a href="user_search.php" class="list-group-item">用户搜索</a>
	 				<a class="list-group-item" href="" role="button" data-toggle="modal" data-target="#adduser">添加用户</a>
	 			</ul>
	 		</div>
	 		<div class="col-md-10">
	 			<div class="page-header">
	 				<h4>用户管理</h4>
	 			</div>
	 			<ul class="nav nav-tabs">
	 				<li class="active">
	 					<a href="user_list.php">用户列表</a>
	 				</li>
	 				<li>
	 					<a href="user_search.php">用户搜索</a>
	 				</li>
	 				<li>
	 					<a href="" role="button" data-toggle="modal" data-target="#adduser">添加用户</a>
	 				</li>
	 			</ul>
	 			<table class="table">
	 				<thead>
	 					<tr>
	 						<th>ID</th>
	 						<th>用户名</th>
	 						<th>邮箱</th>
	 						<th>描述</th>
	 						<th>操作</th>
	 					</tr>
	 				</thead>
	 				<tbody>
	 					<!-- <tr>
	 						<th scope="row">0</th>
	 						<td>啊切</td>
	 						<td>2924811900@qq.com</td>
	 						<td>你删除不了我</td>
	 						<td>
	 							<div role="presentation" class="dropdown">
								    <button class="dropdown-toggle btn btn-default" data-toggle="dropdown" href="#">
								      操作 <span class="caret"></span>
								    </button>
								    <ul class="dropdown-menu" role="menu">
								     	<li><a href="#">编辑</a></li>
								     	<li><a href="#">删除</a></li>
								     	<li><a href="#">锁定</a></li>
								     	<li><a href="#">修改密码</a></li>
								    </ul>
								 </div>
	 						</td>
	 					</tr> -->
	 					<tr v-for="item in msgData " track-by="$index">
	 						<th scope="row">{{item.id}}</th>
	 						<td>{{item.username}}</td>
	 						<td>{{item.email}}</td>
	 						<td>{{item.description}}</td>
	 						<td>
	 							<div role="presentation" class="dropdown">
								    <button class="dropdown-toggle btn btn-default" data-toggle="dropdown" href="#">
								      操作 <span class="caret"></span>
								    </button>
								    <ul class="dropdown-menu" role="menu">
								     	<li><a href="#">编辑</a></li>
								     	<!-- <li><a href="#" data-toggle="modal" data-target="#confirm" v-on:click="nowIndex=$index+67">删除</a></li> -->
								     	<!-- 这里nowindex等于多少就会删除对应数据库里面数据 -->
								     	<li><a href="#" data-toggle="modal" data-target="#confirm" v-on:click="equaldel()">删除</a></li>
								     	<!-- 这里点击时候应该获取数据id并传到删除函数里面 -->
								     	<li><a href="#">锁定</a></li>
								     	<li><a href="#">修改密码</a></li>
								    </ul>
								 </div>
	 						</td>
	 					</tr>
	 					<tr class="text-right" v-show="msgData.length!=0">
							<td colspan='5'>
								<button class="btn btn-primary" data-toggle="modal" data-target="#confirm" v-on:click="(nowIndex=-1)&&deletall()" disabled="disabled">全部删除</button>
								<!-- v-on:click绑定多个事件 -->
							</td>
						</tr>
	 					<tr class="text-center text-muted" v-show="msgData.length==0">
							<td colspan='5'>
								<p>暂无数据。。。。</p>
							</td>
						</tr>

	 				</tbody>			
	 			</table>

				<!-- 分页开始 -->
	 			<nav class="pull-right">
				  <ul class="pagination">
				    <li class="disabled"><a href="#">&laquo;</a></li>
				    <li :class="{'active':a===1}" @click="getPageData(1)&isclick(1)"><a href="javascript:">1</a></li>
				    <li @click="getPageData(2)&isclick(2)" :class="{'active':a===2}"><a href="javascript:">2</a></li>
				    <li @click="getPageData(3)&isclick(3)" :class="{'active':a===3}"><a href="javascript:">3</a></li>
				    <li @click="getPageData(4)&isclick(4)" :class="{'active':a===4}"><a href="javascript:">4</a></li>
				    <li @click="getPageData(5)&isclick(5)" :class="{'active':a===5}"><a href="javascript:">5</a></li>
				    <li @click="getPageData(6)&isclick(6)" :class="{'active':a===6}"><a href="javascript:">6</a></li>
				    <li><a href="#">&raquo;</a></li>
				  </ul>
				</nav>

	 		</div>
	 	</div>
	 </div>


	<!-- Modal 模态框添加用户-->
	<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">添加用户</h4>
	      </div>
	      <div class="modal-body">
	        <form action="admin_add.php" method="post" name="addadmin" v-on:submit.prevent="true">
	        	<div class="form-group">
	        		<label for="addname">用户名</label>
	        		<input type="text" name="username" id="addname" class="form-control" placeholder="用户名" v-model="username">
	        	</div>
	        	<div class="form-group">
	        		<label for="addpass">用户密码</label>
	        		<input type="text" name="password" id="addpass" class="form-control" placeholder="用户密码" v-model="password">
	        	</div>
	        	<div class="form-group">
	        		<label for="details">简单描述</label>
	        		<input type="text" name="desc" id="details" class="form-control" placeholder="简单描述" v-model="description">
	        	</div>
	        	<div class="form-group">
	        		<label for="email">用户邮箱</label>
	        		<input type="text" name="email" id="email" class="form-control" placeholder="用户邮箱" v-model="email">
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
	        	<div class="modal-footer">
			        <button type="reset" class="btn btn-default" @click="reset">重置</button>
			        <input type="submit" class="btn btn-primary" data-dismiss="{{msg}}" @click="add()"/>
			        <!-- data-dissmiss="modal"是不会提交的 -->
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
	<div class="test">
		
	</div>
	<!-- Modal 确认删除模态框-->
	<div class="modal fade" id="confirm" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-index="{{nowIndex}}"> 
		<!-- data-index随便写的 用来判断点击那个删除按钮，方便展示-->			
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title" id="myModalLabel">确认删除吗</h4>
			      </div>
			      <div class="modal-body">
			        模态框让删除变得更复杂
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
			        <button type="button" class="btn btn-primary" data-dismiss="modal" v-on:click="deletadmin(nowIndex)">确认</button>
			        <!-- 这里传入参数 -->
			      </div>
			    </div>
			  </div>
	</div>	
	<script src="js/plug/vue.js"></script>
	<script src="js/plug/vue-resource.js"></script>
	<script src="public/js/jquery-3.1.1.min.js"></script>				
	<script src="public/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	Vue.filter('dosix',function(input,a,b){			// 过滤器只显示六个数据，
		// alert(input)
	})




	var URL = 'admin_add.php';
	var aqie = new Vue({		// 相当于controller
		el:'body',
		data:{
			a:0,
			msg:'hello aqie',
			nowpage:1,
			username:'',			// 这些是和输入框数据绑定的(1)
			password:'',
			description:'',
			email:'',
			nowIndex:-100,
			msgData:[			// 这个是从后台拿回来数据，然后和显示页面绑定的(4)

			],			
				
		},
		computed:{

		},
		methods:{
			valid:function(){
				if(this.username ==='' ||this.password==='' ||this.desc===''||this.email===''){
					alert("请填写完整表单");
					this.msg='';
					return false;
				}else{
					this.msg="modal";
					return true;			
				}
			},		
			add:function(){
				if(this.valid() ==false){
					return;
				}
				this.$http({
					url:URL,
					data:{					//给后台发送数据(默认是get方式)(2)
						act:'add',
						username:this.username,				
						password:this.password,
						description:this.description,
						email:this.email,
						delid:0				
					}

				}).then(function(res){				// promise 成功
					console.log(res.data);			// 从后台返回数据
					var json = res.data;				// 向msgData里面添加拿回来的数据(3)
					this.msgData.unshift({
						username:this.username,				
						password:this.password,
						description:this.description,
						email:this.email,	
						id:json.id,
						// time:json.time
					})
					this.reset();
				});
			},
			reset:function(){
				this.username='';				//清空输入框
				this.password='';
				this.description='';
				this.email='';
			},
			getPageData:function(n){			// 刷新时候，从数据库获取数据
				this.nowpage = n;
				this.$http({
					url:URL,
					data:{
						act:'get',
						page:n
					}
				}).then(function(res){			// promise 成功以后,拿到的数组数据循环显示
					console.log(res.data);
					var arr = res.data;
					this.msgData=[];
					// alert(arr.length);
					for(var i = 0; i<arr.length;i++){
						this.msgData.push({
							id:arr[i].id,
							username:arr[i].username,
							email:arr[i].email,
							description:arr[i].description
						})
					}
				})
			},
			deletadmin:function(n){				//删除管理员
				// alert(n)
				this.$http({
					url:URL,
					data:{
						act:'delet',
						id:n            		// 这个就是传过来的nowIndex，如何获取到点击的数据id?
					}
				}).then(function(res){
					console.log(res.data);
					
					this.msgData.splice(n,1);
				})
			},
			isclick:function(a){				// 实现分页按钮样式切换
				// alert(a)
				this.a = a;
			},
			equaldel:function(){				// 实现页面删除和数据库同步

			}
			
		},
		created:function(){							// 钩子函数
			this.getPageData(1);

		}

	})

	Vue.config.devtools = true;	

	// js验证添加管理员不能为空
	// document.write([1,2]+[3,4]);
	
	</script>
</body>
</html>