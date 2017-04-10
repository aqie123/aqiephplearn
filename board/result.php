<?php 
include "./conn.php";
include "./newClass.php";

$mag = new newClass();

$title = $mag->magic($_POST["title"]);
$username = $mag->magic($_POST["username"]);
$content = $mag->magic($_POST["content"]);

function magic($str){
	$str = trim($str);//过滤空格
	if(!get_magic_quotes_gpc()){//如果系统没有自动转译
		$str = addslashes($str);//转译危险字符
	}
	return htmlspecialchars($str);//把html转译成实体
}
// echo $title;
// echo $username;
// echo $content;
// 创建数据库连接 包含在文件
// $con = mysqli_connect("localhost", "root", "root") or die(mysql_error());




//向数据库中插入数据
$sql_insert = "insert into guestlist (title,username,content,adddate) values('$title','$username','$content','".date("Y-m-d")."')";
$res_insert = mysqli_query($con,$sql_insert); 
// exit;
if($res_insert) {
	// echo "执行插入成功";
  echo "<script>location.href = 'index.php'</script>";
}else{
	// echo "插入失败";
  echo "<script>location.href = 'index.php'</script>";
}
?>