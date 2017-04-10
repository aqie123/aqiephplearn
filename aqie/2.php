<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
</head>
<body>
测试

</br>
<?php
echo "我的第一段脚本";
echo "<br>";
echo "PHP 没有创建变量的命令";
?>  

</br>
<?
/*
php phpinfo()
*/
$color="red";
echo "我的车是".$color;
?>
</br>
<?php 
$x=1;
$y=4;
$z=$x+$y;
echo $z;
 ?>
 <hr>
 </br>
局部和全局作用的变量
 </br>
 <?php 
 $x=1;//globe scobe
$che = array('volvo' ,'BWM','SAAB' );

function mtest(){
	$y=2;//local scobe
	echo "在函数内部测试变量";
	echo "x=$x";
	echo "<br>";
	echo "y=$y";

}

mtest();

echo "<br>";
echo "在函数外部测试变量";
    echo "x=$x";
	echo "<br>";
	echo "y=$y";
	echo "\t $che[2]";

  ?>
  <hr>


  <?php 
  echo "全局变量<br>"; 
    $x=3;
    $y=4;
  function mtest1(){
  	global $x,$y;
  	$y=$x+$y;
  }
  mtest1();
echo "$y";


echo "<hr>";
echo "数组存储所有全局变量<br>";
$a=5;
$b=6;
function mtest2(){
	$GLOBALS['b']=$GLOBALS['a']+$GLOBALS['b'];
}
mtest2();
echo $b;
echo "<hr>";

echo "static 关键词。函数执行完后，会删除所有变量，通过静态变量来保护某个变量<br>";
function mtest3(){
	static $c=0;
	echo $c ;
	echo "<br>";
	$c++;
}
mtest3();
mtest3();
mtest3();
echo "<hr>";


echo "函数返回变量类型和数值<br>";
$cars = array('volvo','BWM' ,'SAAB');
var_dump($cars);
echo "<hr>";


echo "必须声明对象中的类，类包含属性和方法的结构，在类中定义数据类型<br>";
class Car{
	var $color;
	function Car($color="green"){
		$this->color = $color;
	}
	function what_color(){
		return $this->color;

	}
}
function print_vars($obj){
	foreach ($obj as $key => $val) {
		# code...
		echo "\t$key=$val\n";
	}
}
$herbie=new Car("white");
echo "\t herbie:Properties\n";
print_vars($herbie);
echo "<hr>";

echo "通过把值设为NULL，将变量清空<br>";
$d="nihao";
$d=null;
var_dump($d);
echo "返回字符串长度\n";
echo strlen("kangzhongli");
echo "<br>";
echo "检索字符串内指定的字符或文本";
echo strpos("kangzhongli" ,"li");
echo "<hr>";


echo "定义常量，名称、常量的值、是否对大小写敏感<br>";
define("Wenhou","beijing huanying ni");
echo Wenhou;
echo "<br>";
echo "串接和串接赋值";
$b.="你好";
echo $b;
echo "<br>";
echo ++$a; 
echo "<br>";
 echo $a++;
 echo "<br>";
 echo $a;

echo "<img src='/picture/1.png'>";
echo "<hr>";
echo "if else 语句<br>";
$t=date("H");
if ($t<20){
	echo "have a good day";
}elseif($t<23){
	echo "have a good night!";
}else{
	echo "have a good sleep";
}


echo "<hr>";
echo "<br>";
echo "switch 语句<br>";
echo date("w");
echo "<br>";
$wek=date("w");
switch ($wek) {
	case '1':
		echo "今天星期一";
		# code...
		break;
	case '2':
		echo "今天星期二";
		# code...
		break;
	case '3':
		echo "今天星期三";
		# code...
		break;
	case '4':
		echo "今天星期四";
		# code...
		break;
	case '5':
		echo "今天星期五";
		# code...
		break;
	case '6':
		echo "今天星期六";
		# code...
		break;	
	case '0':
		echo "今天星期日";
		# code...
		break;									
			default:
		# code...
		break;
}


echo "<hr>";
echo "<br>";
echo "while 循环和do while循环<br>";
while($y<=20){
	echo "现在y值是：$y <br>";
	$y++;
}
echo "<br>";

do{
	echo "现在数值是$y <br>";
	$y++;
}while($y<=25);

echo "<hr>";
echo "for 循环和for each 循环,后者只适用于数组，并用于遍历数组中的每个键值<br>";

for ($y=1;$y<=5;$y++){
	echo"当前y值是$y<br>";
}
$colors = array("red","green","blue");
foreach ($colors as $value) {
	# code
echo $value;
echo "<br>";
}


echo "<hr>";
echo "<br>";
echo "php创建用户自定义函数<br>";
function lastname1($name,$year=1995){
	echo "康$name $year. <br> ";
}
lastname1("丽","1993");
lastname1("知","1994");
lastname1("名");

function sum($x,$y){
	$z=$x+$y;
	return $z;
}
echo "5+6=".sum(5,6).".<br>";
echo $z."<br>";
echo $colors[1]."<br>";
echo "for遍历数组:"."<br>";

echo count($colors)."<br>";
$arrlength=count($colors);
for($x=0;$x<$arrlength;$x++){

	echo $colors[$x];
	  echo "<br>";

}
echo "foreach遍历数组:"."<br>";
$age = array('tom' => '35', 'jerry'=>'36','ming'=>'24','bob'=>'45');
echo "tom 的年龄是：".$age['tom']."<br>";
//$arrlength=count($age);
foreach($age as $x=>$x_value){
	echo "姓名:".$x."年龄".$x_value."<br>";
	echo "<br>";

}

echo "<hr>";
echo "<br>";
echo "<br>";
echo "数组排序"."<br>";
sort($colors);
$arrlength=count($colors);
for($x=0;$x<$arrlength;$x++){

	echo $colors[$x]."<br>";
	}  

	echo "数值降序排列：";
	arsort($age);
foreach($age as $x=>$x_value){
	echo "姓名:".$x."年龄".$x_value."<br>";
	echo "<br>";
}

echo "键值升序排列：";
     ksort($age);
foreach($age as $x=>$x_value){
	echo "姓名:".$x."年龄".$x_value."<br>";
	echo "<br>";
}


echo "<hr>";
echo "<br>";
echo "<br>";
echo "php 全局变量和超全局变量<br>
$_SERVER 这种超全局变量保存关于报头、路径和脚本位置的信息。<br>";
echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo $_SERVER['HTTP_REFERER'];
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];

echo "<hr>";
echo "<br>";
echo "<br>";
echo "包含输入字段及提交按钮的表单<br>"
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" accept-charset="utf-8">
	Name:<input type="text" name="fname" value="" >
	     <input type="submit">
</form>

<?php 
/*
function _get($str){ 
$val = !empty($_GET[$str]) ? $_GET[$str] : null; 
return $val; 
} 
*/
//define(fname, NULL);
//$fname=NULL;
//if（! empty（$_REQUEST["fname"]））{
//if (!isset( $_REQUEST['fname'])){
if (!empty ( $_REQUEST['fname'])){

$name = $_REQUEST['fname'];
echo $name;

}

 ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" accept-charset="utf-8">
	Name:<input type="text" name="fname1" value="" >
	     <input type="submit">
</form>
<?php 
if (!empty( $_REQUEST['fname1'])){
echo "post用于传递变量<br>";
$name = $_POST['fname1']; 
echo $name;
}
echo "<hr>";
echo "<br>";
echo "<br>";
echo "对数组操作";echo "<br>";
//var_dump print_r
$arr=array(1,2,3,4,5);
var_dump($arr);echo "<br>";
unset($arr[1]);
print_r($arr);
$arr1=array('a'=>1,'b'=>2,'c'=>3);echo "<br>";
print_r($arr1);
echo $arr[2];
echo $arr1['c'];




echo "<hr>";
echo "<br>";
echo "<br>";


?>
</br>
<a href="test.php?subject=PHP&web=北京W3school.com.cn">测试 $GET</a>




<p>echo能够输出一个以上的字符串，print只能输出一个字符串，</p>


</body>
</html>