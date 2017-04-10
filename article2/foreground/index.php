<?php   
       // 实现搜索功能
      // 实现文章内容部分显示
     //实现关键词搜索分页

    // 关键字搜索
    $key = empty($_GET["key"])?"":$_GET["key"];
    // echo $key."<hr>";
    // exit;
    $parm = "";
    if($key!=""){
        $parm="where title like '%$key%'";
    }
    // echo $parm;
    include '../common/conn.php';
    include '../common/cutContent.php';

    
    // 文章部分显示+分页
    $cutContent = new cutContent();

    $result = mysqli_query($con,"select count(*) from list $parm");
    $pagesize = 3;
    $row = mysqli_fetch_array($result);
    $infocount = $row[0]; // 信息总条数
    $pagecount = ceil($infocount/$pagesize);        // 总共有几页

    // echo $infocount.$pagecount;
    $currentpage = empty($_GET["page"])?1:$_GET["page"];
    // echo $currentpage;
    $page = ($currentpage-1)*$pagesize; // (当前页数-1)*每页条数
    $result = mysqli_query($con,"select * from list $parm order by id_l desc limit $page, $pagesize");
?>
<!doctype html lang="lang=zh-cmn-Hans">
<html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="aqie">
    <meta name="keywords" content="aqie博客,blog,啊切,啊切博客,aqie的博客">
    <meta name="description" content="aqie个人博客">
    <meta name="version" content="aqie-1.0">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <title>aqie博客</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.black.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/animation.css" rel="stylesheet">
    <link href="css/lrtk.css" rel="stylesheet" />
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/js.js"></script>
    <style type="text/css">
        .card h1{
            margin-top: 0;
        }
        .card p{
            margin-bottom: 0;
        }
        .textinfo p{
           margin-bottom: 0; 
           padding-bottom: 0;
        }
        /*分页部分*/
        .pagin{
            position: absolute;
            /*left:36rem;*/
            top:67rem;
        }
        /*文章分类列表*/
        .classification{
            margin-top: 20px;
            width: 666px;
            float: left;
            height: 80px;
            border-right: solid 2px #111;
            padding: 20px;

        }
        .classification span{
            width: 20%;
            display: inline-block;
            height: 40px;
            background-color: rgb(169, 179, 14);
            margin-right: 20px;
            line-height: 40px;
            text-align: center;
            box-shadow: 3px 3px 2px rgba(169, 179, 14,0.8);
            border-radius: 5px;
            cursor: pointer;
            transition:all 1.1s ease;
        }
        .classification a span {
            color: #fff;
            font-weight: 700;
            text-shadow: 1px 1px 1px #000;
        }
        .classification span:hover,.classification span.active{
            background-color: #EC6C06;
            box-shadow: 3px 3px 2px #FC8205;
        }
        /*这里影响到其他页面*/
        .bloglist>li:nth-of-type(1){
            margin-top: 100px;
        }
        .bloglist li.likes{
            margin-top: 0;
        }
        ol.list-paddingleft-2{
            /*display: inline-block;*/
        }
        ul.textinfo>p:nth-of-type(1){
           padding:0;
           /*display: none; */
        }
    </style>
</head>

<body>
<header>
	<nav id="nav">
    	<ul>
        	<li><a href="../index.php">Another首页</a></li>
            <li><a href="index.php" title="个人博客模板" id='nav_current'>个人博客</a></li>
            <li><a href="#" title="相册">相册</a></li>
            <li><a href="#" title="说说">说说</a></li>
            <li><a href="../../board/index.php" title="留言板">留言板</a></li>
            <li><a href="#" title="文章">文章</a></li>
        </ul>
         <!-- <script src="js/silder.js"></script> -->
         <!--获取当前页导航 高亮显示标题--> 
    </nav>
</header>

<div id="mainbody">
    <!-- info开始 -->
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
        

        <!--博客列表部分开始-->
        <ul class="bloglist">
            <!-- 文章分类列表开始 -->
            <div class="classification">
                <?php 
                    $result1 = mysqli_query($con,"select * from type");
                    while($row1 = mysqli_fetch_array($result1)){
                ?>
                <a href="type.php?typeid=<?php echo $row1["id"] ?>"><span><?php echo $row1["typename"]; ?></span></a>
                <?php } ?>
            </div>
            <!-- 文章分类列表结束 -->
            <?php
                while($row=mysqli_fetch_array($result)){
                $content = $row["content"];
                $content = $cutContent->cut($content,200);
                $hits= $row["hits"];
            ?>           
            <li>
                <div class="row_box">
                    <div class="ti"></div><!--三角形-->
                    <div class="ci"></div><!--圆形-->
                    <span class="title"> <a href="#"><?php echo $row["title"] ?></a></span>
                    <a class="author">作者：<?php echo $row["author"] ?></a>                 
                    <ul class="textinfo">
                        <a href="content.php?id=<?php echo $row["id_l"] ?>"><img src="images/s1.jpg"></a>
                        <p><?php echo htmlspecialchars_decode($content) ?></p>
                    </ul>
                    <ul class="details">
                        <li class="likes"><a href="#">10</a></li>
                        <li class="comments"><a href="#">34</a> </li>
                        <li class="icon_time"><a><?php echo date("Y-m-d H:i:s",$row["time"]);?></a></li>
                        <li>点击次数:<?php echo $hits; ?></li>
                    </ul>
                </div>
            </li>
            <?php }  ?>
        </ul> 
        <!--博客列表部分结束-->

        <!-- 分页开始 -->
        <div class="pagin">
            <nav class="">
              <ul class="pagination">
                <li class="" ><a href="?page=<?php echo ($currentpage-1 <=0)?1:($currentpage-1) ?>   ">&laquo;</a></li>
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
                    <a href="?page=<?php 
                        if($key){
                         echo $n."&key=".$key;
                        }else{
                           echo $n; 
                        }
                        ?>"
                    ><?php echo $n;?></a></li>
                <?php } ?>
                <li 
                    <?php if($currentpage==$pagecount){?> 
                        class="disabled"
                    <?php } ?>
                ><a href="?page=<?php echo ($currentpage+1) >= $pagecount ? $pagecount : ($currentpage+1) ?>">&raquo;</a></li>
              </ul>
            </nav>
        </div>
        <!-- 分页结束 -->
       
        <!--右半部分开始-->
        <aside>            
            <div class="search">
                <form class="searchform" method="get" action="?" onsubmit="return test()" name="search">
                    <input type="text" placeholder="Search" name="key" onFocus="" onBlur="">
                    <button class="btn btn-default btn-xs">GO</button>
                </form>
            </div>
            <div class="tuijian">
                <h2>热门文章</h2>
                <ol>
                    <?php 
                        // 显示热门文章
                        $result = mysqli_query($con,"select * from list order by hits desc limit 0,5");
                        $a = 0;
                        while($row = mysqli_fetch_array($result)){
                            $a++;
                     ?>
                    <li>
                        <span> 
                            <strong><?php echo $a?></strong>
                        </span>
                        <a href="#"><?php echo $row["title"];?></a>
                    </li>
                    <?php } ?>
                    
                </ol>
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
            <div class="toppic">
                <h2>图文并茂</h2>
                <ul>
                    <li><a href="#"><img src="images/k01.jpg">腐女不可怕，就怕腐女会画画！<p>伤不起</p></a> </li>
                    <li><a href="#"><img src="images/k01.jpg">问前任，你还爱我吗？无限戳中泪点~<p>感兴趣</p></a> </li>
                    <li><a href="#"><img src="images/k01.jpg">世上所谓幸福，就是一个笨蛋遇到一个傻瓜。<p>喜欢</p></a> </li>  
                </ul>
            </div>
        </aside>
        <!--右半部分结束-->
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
    	 <p>Copyright 2020 Design by <a href="#">aqie</a></p>
    </div>
</footer>


<div id="tbox">
 <a id="togbook" href="#"></a>
 <a id="gotop" href="javascript:void(0)"></a> 
</div>


<script type="text/javascript">
    function test(){
        var search = document.search.key.value;
        if(search==""){
            // alert(1);
            return false;
        }
        return true;
    }
</script>
</body>
</html>
