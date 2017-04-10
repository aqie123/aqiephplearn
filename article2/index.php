

<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BootStrap</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.black.css">
	<link rel="stylesheet" type="text/css" href="css/1.css">
	<link rel="stylesheet" href="css/animate.css"/>
</head>
<body>
	 <nav class="navbar navbar-default navbar-fixed-top">	 <!-- 导航浮动到顶部 -->
	 	<div class="container">
	 		<!-- 小屏幕导航按钮和logo BEGIN-->
	 		<div class="navbar-header">
	 			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		 			<span class="icon-bar"></span>
		 			<span class="icon-bar"></span>
		 			<span class="icon-bar"></span>
		 		</button>
		 		<a href="./Backstage/index.php" class="navbar-brand wow">AQIE</a>
	 		</div>
	 			 		
	 		<!-- 小屏幕导航按钮和logo END -->

	 		<!-- 导航 BEGIN-->
			<div class="navbar-collapse collapse ">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#home">首页</a></li>
					<li><a href="#bbs">论坛</a></li>
					<li><a href="#html5">前端开发</a></li>
					<li><a href="#new">最新作品</a></li>
					<li><a href="#app">移动APP</a></li>
					<li><a href="#contact">联系我们</a></li>
				</ul>
			</div>
	 		

	 	</div>
	 </nav>
	 <!-- 导航 END-->

	 <!-- home -->
	 <section id="home">
	 	<div class="lvjing">
	 		<div class="comtainer">
	 			<div class="row wow zoomIn" data-wow-duration='0.6s'>
	 				<div class="col-lg-1"></div>
	 				<div class="col-lg-10">
	 					<h2>AQIE HOME</h2>
	 					<p>I got these fellings for you! </p>
	 					<img src="picture/dog.jpg" alt="dog" width="1100px" height="250px" class="img-responsive">
	 				</div>
	 				<div class="col-lg-1"></div>
	 			</div>
	 		</div>
	 	</div>
	 </section>
	 <!-- home结束 -->

	 <!-- bbs开始	 -->
	 <section id="bbs">
	 	<div class="container">
	 		<div class="row wow swing">
	 			
	 			<div class="col-md-4">
	 				<a href="foreground/index.php">
	 					<img src="picture/a.png" alt="安卓" class="img-responsive" />
		 				<h3>Andorid开发</h3>
		 				<p>点击进入博客显示页面</p>
	 				</a>
	 				
	 			</div>
	 			<div class="col-md-4 ">
	 				<a href="foreground/index.php">
	 					<img src="picture/b.png" alt="安卓" class="img-responsive" />
		 				<h3>Andorid开发</h3>
		 				<p>点击进入博客显示页面</p>
	 				</a>
	 				
	 			</div>
	 			<div class="col-md-4">
	 				<a href="#">
	 					<img src="picture/i.png" alt="安卓" class="img-responsive" />
		 				<h3>Andorid开发</h3>
		 				<p>iOS开发技术交流，海量iOS实战干货分享</p>
	 				</a>
	 				
	 			</div>
	 		</div>
	 	</div>
	 </section>
	 <!-- bbs结束 -->

	 <!-- html5开始 -->
	 <section id="html5">
	 	<div class="container">
	 		<div class="col-md-6 wow fadeInLeft" data-wow-delay="0.3s">
	 			<h2>HTML5前端开发</h2>
	 			<p>一线资深前端开发工程师倾情打造！助你完成普通程序员到优秀工程师的华丽升级！</p>
	 			<p><span class="glyphicon glyphicon-fire mai-icon"></span>使用HTML5与CSS3技术轻松实现设备自适应展示。</p>
	 			<p><span class="glyphicon glyphicon-leaf mai-icon"></span>清晰明了的语义代码结构，更高的可读性、更利于页面维护的。</p>
	 		</div>
	 		<div class="col-md-6 wow fadeInRight" data-wow-delay="0.3s">
	 		  	<img src="picture/html5.jpg" alt="html5" class="img-responsive">
	 		</div>
	 		<div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
	 		  	<img src="picture/Bootstrap.jpg" alt="html5" class="img-responsive">
	 		</div>
	 		<div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
	 			<h2>bootstrap</h2>
	 			<p>Bootstrap 是最受欢迎的 HTML、CSS 和 JS 框架，用于开发响应式布局、移动设备优先的 WEB 项目。</p>
	 			<p><span class="glyphicon glyphicon-certificate mai-icon"></span>你的网站和应用能在 Bootstrap 的帮助下通过同一份代码快速、有效适配手机、平板、PC 设备。。</p>
	 			<p><span class="glyphicon glyphicon-screenshot mai-icon"></span>Bootstrap 提供了全面、美观的文档。你能在这里找到关于 HTML 元素、HTML 和 CSS 组件、jQuery 插件方面的所有详细文档。</p>
	 		</div>
	 		
	 	</div>
	 	
	 </section>
	 <!-- html5结束 -->

	 <!-- new开始 -->
	 <section id="new">
	 	<div class="container">
	 		<div class="row wow fadeIn" data-wow-duration="2.5s">
	 			<div class="col-md-12">
	                <h1>最新作品</h1>
	            </div>
	 			<div class="col-lg-3 col-md-4 col-sm-6">
	 				<div class="course">
	 					<img src="picture/swift.jpg" alt="" class="img-responsive">
	 					<a href="www.aqie.com" class="btn btn-primary" target="_blank" role="button">
	 						加入学习
	 					</a>
	 				</div>
	 			</div>
	 			<div class="col-lg-3 col-md-4 col-sm-6">
	 				<div class="course">
	 					<img src="picture/swift.jpg" alt="" class="img-responsive">
	 					<a href="www.aqie.com" class="btn btn-primary" target="_blank" role="button">
	 						加入学习
	 					</a>
	 				</div>
	 			</div>
	 			<div class="col-lg-3 col-md-4 col-sm-6">
	 				<div class="course">
	 					<img src="picture/swift.jpg" alt="" class="img-responsive">
	 					<a href="www.aqie.com" class="btn btn-primary" target="_blank" role="button">
	 						加入学习
	 					</a>
	 				</div>
	 			</div>
	 			<div class="col-lg-3 col-md-4 col-sm-6">
	 				<div class="course">
	 					<img src="picture/swift.jpg" alt="" class="img-responsive">
	 					<a href="www.aqie.com" class="btn btn-primary" target="_blank" role="button">
	 						加入学习
	 					</a>
	 				</div>
	 			</div>
	 		
	 		<!-- 第二行 -->
	 			<div class="col-lg-3 col-md-4 col-sm-6 col-md-4 col-sm-6">
	 				<div class="course">
	 					<img src="picture/swift.jpg" alt="" class="img-responsive">
	 					<a href="www.aqie.com" class="btn btn-primary" target="_blank" role="button">
	 						加入学习
	 					</a>
	 				</div>
	 			</div>
	 			<div class="col-lg-3 col-md-4 col-sm-6">
	 				<div class="course">
	 					<img src="picture/swift.jpg" alt="" class="img-responsive">
	 					<a href="www.aqie.com" class="btn btn-primary" target="_blank" role="button">
	 						加入学习
	 					</a>
	 				</div>
	 			</div>
	 			<div class="col-lg-3 col-md-4 col-sm-6">
	 				<div class="course">
	 					<img src="picture/swift.jpg" alt="" class="img-responsive">
	 					<a href="www.aqie.com" class="btn btn-primary" target="_blank" role="button">
	 						加入学习
	 					</a>
	 				</div>
	 			</div>
	 			<div class="col-lg-3 col-md-4 col-sm-6">
	 				<div class="course">
	 					<img src="picture/swift.jpg" alt="" class="img-responsive">
	 					<a href="www.aqie.com" class="btn btn-primary" target="_blank" role="button">
	 						加入学习
	 					</a>
	 				</div>
	 			</div>
	 		</div
	 	</div>
	 </section>
	 <!-- new结束 -->


	 <!-- app开始 -->
	 <section id="app">
	 	<div class="container">
	 		<div class="row wow fadeInUp">
	 			<div class="col-md-6">
	 				<h2>移动APP下载</h2>
	 				<p>移动应用服务，就是针对手机这种移动连接到互联网的业务或者无线网卡业务而开发的应用程序服务。
					   随着移动智能终端的广泛应用，移动终端正向功能增强化、多模化、定制化、平台开放化的方向发展，
					   而移动终端营销（APP）——作为SNS新的开拓渠道，正逐渐崭露头角.
					</p>
					<button class="btn btn-primary">
						<span class="glyphicon glyphicon-download-alt"></span>
						IPhone版
					</button>
					<button class="btn btn-primary">
						<span class="glyphicon glyphicon-download-alt"></span>
						安卓版
					</button>
	 			</div>

	 			<div class="col-md-6">
	 				<div class="mobile">
	 					<div class="lvjing"></div>
	 				</div>
	 			</div>
	 		</div>	 		
	 	</div>	 	
	 </section>
	 <!-- app结束 -->

	 <!-- 联系我们开始 -->
	 <div id="contact">
	 	<div class="lvjing">
	 		<div class="container">
	 			<div class="row ">
	 				<div class="col-md-6 wow fadeInLeft" data-wow-duration='1.2s' data-wow-delay="0.3s">
	 					<h2>
	 						<span class="glyphicon glyphicon-plane"></span>
	 						联系啊切
	 					</h2>
 						<p>Knockout有如下4大重要概念：
							◆ 声明式绑定 (Declarative Bindings)：使用简明易读的语法很容易地将模型(model)数据关联到DOM元素上。<br>
							◆ UI界面自动刷新 (Automatic UI Refresh)：当您的模型状态(model state)改变时，您的UI界面将自动更新。<br>
							◆ 依赖跟踪 (Dependency Tracking)：为转变和联合数据，在你的模型数据之间隐式建立关系。<br>
							◆ 模板 (Templating)：为您的模型数据快速编写复杂的可嵌套的UI。
						</p>
						<address>
							<p>
								<span class="glyphicon glyphicon-home"></span>
								地址：北京-中国-地球-太阳系
							</p>
							<p>
								<span class="glyphicon glyphicon-phone-alt"></span>
								联系电话：10010
							</p>
							<p>
								<span class="glyphicon glyphicon-envelope"></span>
								邮箱：2924811900@qq.com
							</p>
						</address>	 					
	 				</div>
	 				<div class="col-md-6  wow fadeInRight" data-wow-delay="0.3s" data-wow-duration='1.2s' >
                    <form action="#" method="post">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="您的姓名"/>
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" placeholder="您的邮箱"/>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="标题"/>
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" placeholder="留言内容" rows="4"></textarea> 
                            <!-- 中间不能有空格  -->
                        </div>
                        <div class="col-md-8">
                            <input type="submit" class="form-control" value="提交"/>
                        </div>
                    </form>
                </div>
	 			</div>
	 		</div>
	 	</div>
	 </div>
	 <!-- 联系我们结束 -->

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


	<script src="js/plug/jquery-3.1.1.min.js"></script>				
	<script src="js/plug/bootstrap.min.js"></script>
	<script src="js/jquery.singlePageNav.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script type="text/javascript">
		//alert($);
		$(function(){

			//给logo添加动画
			$(".navbar-brand").hover(function(){
				$(this).stop().animate({
					opacity:'0.8',
				    fontSize:'60px',
				    color:'#610909',
				    left:'30px'
				})
				$(this).addClass('swing')
			},function(){
				$(this).stop().animate({
					opacity:'1',
					fontSize:'40px'
				})
			})


			//导航跳转插件
			$('.nav').singlePageNav({
				offset:70
			});  //滑动特效

			//小屏幕导航点击关闭
			$('.navbar-collapse').click(function(){
				$(this).collapse('hide');
			})
			
			//页面移入动画
			new WOW().init();
			/*
			data-wow-duration="2s"(动画持续时间),
			data-wow-delay="5s"(动画延迟时间),
			data-wow-offset="10"(距离可视区域多远开始执行动画),
			data-wow-interation="10"(重复次数)

			*/
		})
	</script>
</body>
</html>