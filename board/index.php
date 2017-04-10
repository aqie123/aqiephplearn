<?php 
error_reporting(0);   //关闭报错提醒
include "conn.php";
$pagesize = 10;
$result = mysqli_query($con,"select count(*) from guestlist");
$row = mysqli_fetch_row($result);
$infoCount = $row[0];
// echo "总共数据有".$infoCount. "个，每页".$pagesize."条数据.<br>";  //多少条数据

$pageCount = ceil($infoCount/$pagesize);
// echo "一共有".$pageCount. "页.<br>"; //分几页显示
$currentpage = empty($_GET["page"])?1:$_GET["page"];
if($currentpage>$pageCount){
	$currentpage=1;
}
// echo "当前页数是：".$currentpage. ".<br>";

//判断session是否存在
session_start();        //必须每次启动
echo $_SESSION["isok"];
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>留言本</title>
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css">
	<style type="text/css">
     body{
      background: #151313;color: #fff;
     }
    .container:nth-of-type(2){
      margin-bottom: 30px;
      /*margin-top: 700px;*/
    }
    .container:nth-of-type(3){
      margin-bottom: 30px;
    }
		.message .date{
			margin-right: 30px;
		}
    .box{
      padding-bottom: 30px;
    }
		.content{
      margin-bottom:0px;
			height:150px;
      
		}
    .delete{
      /*margin-bottom: 20px;*/
    }
		.message .page{
			display: inline-block;
			margin-right:30px;
		}
    .replay{
      background: #979494;
      text-align: center;
      width:100%;
      padding: 3px;
      margin-bottom: 40px;
      
    }
    .replay span:nth-of-type(1){
      display: inline-block;
      width:100px;
      text-align: left;
      font-weight: 700px;
      font-size: 15px;
    }
    .replay span:nth-of-type(2){
      margin: 0 auto;
      display: inline-block;
      text-align: left;
      width: 70%;
      height: 40px;
      padding: 10px;
      font-size: 12px;
      font-family: "微软雅黑";
      color:#F9540C;
      border-radius: 3px;
      background-color: #fff;
    }
    .title{
      margin: 0 auto;
      display: inline-block;
      width:100%;
      color: #0f0;
      font-weight: bold;
      font-size: 20px;
    }
	</style>
</head>
<body>
  <!-- 用户登录页面 -->
  <?php 
    if($_SESSION["isok"]=="ok"){
      echo "登录成功,欢迎回来！";
      echo '<div class="login"><a href="login.php?action=logout">注销</a></div><br />';
    }else{
  ?>
  <div class="container" class="login" style="display: none"> 
      <form action="login.php" accept-charset="utf-8" method="post" name="form" class="form-inline"  onsubmit="return islogin()">
        <div class="form-group">
          <label for="exampleInputName2">用户名</label>
          <input type="text" class="form-control" id="exampleInputName2" placeholder="这是给管理员设置的" name="adname">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail2">密码</label>
          <input type="password" class="form-control" id="exampleInputEmail2" placeholder="啦啦啦" name="adpwd">
        </div>
        <input type="submit" name="" value="登录" class="btn btn-primary ">
      </form>       
  </div>
  <?php } ?>
  <!-- 用户留言提交页面 -->
	<div class="container">	
      <form action="result.php" method="post" accept-charset="utf-8" class="form-horizontal" name="form1" onsubmit="return test()">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">留言标题</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" placeholder="请输入标题" name="title">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">用户名</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword3" placeholder="随便填写个名字吧" name="username">
          </div>
        </div>
        
        <!-- <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Sign in</button>
          </div>
        </div> -->
        <div class="form-group">
          <label  class="col-sm-2 control-label">留言内容</label>
          <div class="col-sm-10">
            <textarea name="content" class="form-control" rows="6" placeholder="请输入留言"></textarea>
          </div>      
        </div>
        <!-- <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
              <label>
                <input type="checkbox"> Remember me
              </label>
            </div>
          </div>
        </div> -->
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="" value="提交" class="btn btn-danger ">
          </div>              
        </div>
      </form>
      
    </form>
	</div>
	<!-- 留言显示区域 -->
	<div class="message container">
		<h3><?php echo  $infoCount?>条留言：</h3>

		<?php 
		$re = mysqli_query($con,"select * from guestlist order by id desc limit ".($currentpage-1)*$pagesize.",".$pagesize );
		while($row = mysqli_fetch_array($re)){
			echo "<!-- 循环体开始 -->
        <div class='box'>
				  <div><span class='text-center title'>".$row['title']."</span>用户：&nbsp;&nbsp;".$row['username']."<span class='pull-right date'>".$row['adddate']."</span></div>
				  <div class='content alert alert-info'>".$row['content']."</div><br />
          ";

        if($_SESSION["isok"]=="ok"){
          echo "<span class='pull-left delete'><a href='delet.php?id=".$row['id']."'>删除</a></span> ";
          echo "<span class='pull-right'> <a href='edit.php?id=".$row['id']."'>回复</a></span></div>";
        }
        
        if($row['reply']){
          echo "<div class='replay'>
            <span>管理员回复:</span>
            <span>".$row['recontent']."</span>
          </div>
          <!-- 循环体结束 -->"; 
        }
        

		}
		echo "当前页数是：".$currentpage. ".<br>";
		for($i=1;$i<=$pageCount;$i++){
			// echo $i;
			
			if($i==$currentpage){
				echo '<div class="page"><a href="?page='.$i.'"><button class="btn btn-info" type="button">'.$i.'</button></a></div>';		
			}else{
				echo '<div class="page"><a href="?page='.$i.'"><button class="btn btn-default" type="button">'.$i.'</button></a></div>';
			}			
		}
		?>

	</div>	
  <!-- <canvas id="canvas" style="position:absolute; top:0; left:0;"></canvas>
  <div id="buffer" style="display:none; z-index: -1"></div> -->
    <script src="js/font_change.js"></script>
	<script src="../public/js/jquery-3.1.1.min.js"></script>				
	<script src="../public/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function test(){
			var title = document.form1.title.value;
			var username = document.form1.username.value;
			var content = document.form1.content.value;
			var sum;
			//验证标题
			if(title==""){
				alert("请填写标题");
				return false;
			}else{
				 sum = getLength(title);
				// alert(sum);
				if(sum<5 || sum>20){
					alert('请输入5-20字符');
					return false;
				}				
			}
			//验证用户名
			if(username==""){
				alert("请填写用户名");
				return false;
			}else{
				 sum = getLength(username);
				if(sum<4 || sum>10){
					alert('请输入4-10字符');
					return false;
				}				
			}
			sum=getLength(content);
			if(sum<10){
				alert("留言内容不能小于十个字符");
				return false;
			}
			return true;
		};

		function getLength(str){  //获取字符串长度
  			return str.replace(/[^\x00-xff]/g,"xx").length;
		}

    // 管理员登录验证
    function islogin(){
      var adname = document.form.adname.value;
      var adpwd = document.form.adpwd.value;
      if(adname ===''){
        alert("请输入用户名");
        return false;
      }
      if(adpwd === ""){
        alert("请输入密码");
      }
      return true;
      
    }
    /*
    // 如果没有内容，则隐藏
    var replay = $('.replay span');
    // alert(replay.length);       // 10 
      replay.each(function(index,domE){
        // alert($(domE).text());
        if(!$(domE).text()){
          $(domE).css({display:'none'});
          $(domE).parent().css({display:'none'});
        }
        
      });
    */

    $('.login').click(function(){
      // alert(1)
      $(this).css({display:'none'});
    })
	</script>
</body>
</html>