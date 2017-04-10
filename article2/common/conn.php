
<?php 
 $con = mysqli_connect("localhost", "root", "root") or die(mysqli_error());
 //选择数据库
 mysqli_select_db($con,"article");
 //选择数据库执行语言
 mysqli_query($con,"set names 'utf8'");
 //选择时区
 date_default_timezone_set("PRC");


 ?>