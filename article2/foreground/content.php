<?php 
    // 从文章目录页接收id，展示对应文章
    // 对id进行非数字过滤
    // 多次浏览页面点击累加
    include '../common/conn.php';
    include '../common/cutContent.php';
    header("Content-type: text/html; charset=utf-8"); 

    $id= empty($_GET["id"])?"s":$_GET["id"];
    if(is_numeric($id)){              // 是纯数字，执行下面过程
        // 验证是否是数据库有的数据
        $result = mysqli_query($con,"select count(*) from list where id_l = $id");
        $row = mysqli_fetch_array($result);
        // echo $row[0];           // 1或者0
        if($row[0]){              // 数据库存在信息输出，否则
          $result = mysqli_query($con,"update list set hits=hits+1 where id_l=$id");
          $result = mysqli_query($con,"select * from list where id_l = $id");
          while($row = mysqli_fetch_array($result)){
            $title = $row["title"];
            $content = $row["content"];
            // $content = trim($content);
            $time = $row["time"];
            $author = $row["author"];
            $source = $row["source"];
            $hits= $row["hits"];
          }
          
        }else{
            echo "<script>alert('参数错误');</script>";
            exit;
        }
        
    }else{
        echo "<script>alert('参数错误');</script>";
        exit;
    }


 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<title>aqie博客</title>
<link href="css/style.css" rel="stylesheet">
<link href="css/animation.css" rel="stylesheet">
<link href="css/lrtk.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/js.js"></script>
<style type="text/css">
    pre{
        padding: 20px;
    }
</style>
</head>

<body>
<header>
	<nav id="nav">
    	<ul>
        	<li><a href="#">网站首页</a></li>
            <li><a href="index.php" title="个人博客模板">个人博客</a></li>
            <li><a href="#" title="相册">相册</a></li>
            <li><a href="#" title="说说">说说</a></li>
            <li><a href="#" title="心情日志">心情日志</a></li>
            <li><a href="#" title="文章" id='nav_current'>文章</a></li>
        </ul>
         <!-- <script src="js/silder.js"></script> -->
         <!--获取当前页导航 高亮显示标题--> 
    </nav>
</header>

<div id="mainbody">
	<div class="info">
        <figure>
            <img src="images/art.jpg" alt="秋。。。相知">
            <figcaption>
                <strong>渡人如渡己，渡己，亦是渡。</strong>
                当我们被误解时，会花很多时间去辩白。 但没有用，没人愿意听，大家习惯按自己的所闻、理解做出判别，每个人其实都很固执。与其努力且痛苦的试图扭转别人的评判，不如默默承受，给大家多一点时间和空间去了解。而我们省下辩解的功夫，去实现自身更久远的人生价值。其实，渡人如渡己，渡已，亦是渡人。
            </figcaption>
        </figure>
        <div class="card">
        	 <h1>我的名片</h1>
              <p>网名：aqie | 啊切</p>
              <p>职业：Web</p>
              <p>电话：18883397160</p>
              <p>Email：2924811900@qq.com</p>
              <ul class="linkmore">
                <li><a href="#" class="talk" title="给我留言"></a></li>
                <li><a href="#" class="address" title="联系地址"></a></li>
                <li><a href="#" class="email" title="给我写信"></a></li>
                <li><a href="#" class="photos" title="生活照片"></a></li>
                <li><a href="#" class="heart" title="关注我"></a></li>
              </ul>
        </div>
    </div>

<!--info结束-->

    <!--博客开始-->
    <div class="blogs">
        <!--博客的列表开始-->
        <ul class="bloglist">
            <li>
                <div class="row_box">
                    <div class="ti"></div>
                    <div class="ci"></div>
                    <span class="title"> <a href="#"><?php echo $title; ?></a></span>
                    <a class="source">来源：<?php echo $source; ?></a> 
                    <ul class="textinfo">
                        <p><?php echo htmlspecialchars_decode($content); ?></p>
                    </ul>
                    <ul class="details">
                        <li class="likes"><a href="#">10</a></li>
                        <li class="comments"><a href="#">34</a> </li>
                        <li class="icon_time"><a><?php echo date("Y-m-d H:i:s",$time);?></a></li>
                        <li>点击次数:<?php echo $hits; ?></li>
                    </ul>
                </div>
            </li>
        </ul>
     
        <!--博客列表部分结束-->
    
    
        <!--右半部分开始-->
        <aside>
            <div class="tuijian">
                <h2>热门文章</h2>
                <ol>
                    <?php 
                        // 显示热门文章
                        $result = mysqli_query($con,"select * from list order by hits desc limit 0,5");
                        while($row = mysqli_fetch_array($result)){
                     ?>
                    <li>
                        <span> 
                            <strong>1</strong>
                        </span>
                        <a href="#"><?php echo $row["title"];?></a>
                    </li>
                    <?php } ?>                   
                </ol>
            </div>
            <div class="viny">
                <dl>
                    <dt class="art"><img src="images/artwork.png" alt="专辑"></dt>
                    <dd class="icon_song"><span></span>Feelings</dd>
                    <dd class="icon_artist"><span></span>歌手：Maroon 5</dd>
                    <dd class="icon_album"><span></span>所属专辑：《V》</dd>
                    <dd class="icon_like"><span></span><a href="#">喜欢</a></dd>
                    <!-- <dd class="music"><audio src="images/nf1.mp3" controls loop></audio></dd> -->
                    <dd class="music"><iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=298 height=52 src="//music.163.com/outchain/player?type=2&id=29019232&auto=0&height=32"></iframe></dd>
                </dl>
            </div>
            <div class="clicks">
                <h2>热门推荐</h2>
                <ol>
                    <?php
                        // 显示热门推荐 
                        $result = mysqli_query($con,"select * from list where recommend=1 order by hits desc");
                        while($row = mysqli_fetch_array($result)){
                     ?> 
                    <li>
                        <span><a href="#"><?php echo $row["typeid"] ?></a></span>
                        <a href="#"><?php echo $row["title"] ?></a>
                    </li>
                    <?php } ?>
                    
                </ol>
            </div>
            <div class="toppic">
                <h2>图文并茂</h2>
                <ul>
                    <li><a href="#"><img src="images/k01.jpg">腐女不可怕，就怕腐女会画画！<p>伤不起</p></a> </li>
                    <li><a href="#"><img src="images/k01.jpg">问前任，你还爱我吗？无限戳中泪点~<p>感兴趣</p></a> </li>
                    <li><a href="#"><img src="images/k01.jpg">世上所谓幸福，就是一个笨蛋遇到一个傻瓜。<p>喜欢</p></a> </li>  
                </ul>
            </div>
        </aside>
	</div>
    <!--博客结束-->
</div>
<!--mainbody结束-->

<footer>
    <div class="foot-mid">
        <div class="links">
        	<h2>友情链接</h2>
            <ul>
            	<li><a href="#">啊切个人博客</a></li>
                <li><a href="#"> 帮助中心</a></li>
            </ul>
        </div>
        <div class="visitors">
        	<h2>最新评论</h2>
            <dl>
            	<dt><img src="images/s1.jpg"></dt>
            	<dd>DanceSmile<time>49分钟前</time></dd>
                <dd>在<a href="#" class="title">如果要学习web前端开发，需要学习什么？</a>中评论:</dd>
                <dd class="remark">文章非常详细，我很喜欢.前端的工程师很少，我记得几年前yahoo花高薪招聘前端也招不到</dd>
            </dl>
             <dl>
            	<dt><img src="images/s1.jpg"></dt>
            	<dd>DanceSmile<time>2小时前</time></dd>
                <dd>在<a href="#" class="title">芭蕾女孩的心事儿</a>中评论:</dd>
                <dd class="remark">我手机里面也有这样一个号码存在</dd>
            </dl>
             <dl>
            	<dt><img src="images/s1.jpg"></dt>
            	<dd>DanceSmile<time>1月7日</time></dd>
                <dd>在<a href="#" class="title">如果个人博客网站再没有价值，你还会坚持吗？</a>中评论:</dd>
                <dd class="remark">博客色彩丰富，很是好看</dd>
            </dl>
        </div>
        <section class="flickr">
        	<h2>摄影作品</h2>
            <ul>
            	<li><a href="#"><img src="images/01.jpg"></a></li>
                <li><a href="#"><img src="images/01.jpg"></a></li>
                <li><a href="#"><img src="images/01.jpg"></a></li>
                <li><a href="#"><img src="images/01.jpg"></a></li>
                <li><a href="#"><img src="images/01.jpg"></a></li>
                <li><a href="#"><img src="images/01.jpg"></a></li>
                <li><a href="#"><img src="images/01.jpg"></a></li>
                <li><a href="#"><img src="images/01.jpg"></a></li>
                <li><a href="#"><img src="images/01.jpg"></a></li>
            </ul>
        </section>
    </div>
    <div class="foot-bottom">
    	 <p>Copyright 2015 Design by <a href="#">aqie</a></p>
    </div>
</footer>


<div id="tbox"> <a id="togbook" href="#"></a>
 <a id="gotop" href="javascript:void(0)"></a> </div>

</body>
</html>
