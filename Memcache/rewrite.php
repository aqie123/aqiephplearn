<?php
/**
 * smarty 缓存技术就是静态化体现
 */

/*
php代码执行-> php缓冲区临时存储执行结果->生成静态结果
php.ini 也可以开启 output_buffering = 4096;
开启缓冲：
    ob_start();
    ob_get_level(); 获取当前ob层级
获取内容
    ob_get_contents();  // 获取
    ob_get_clean();     // 获取并删除缓冲区内容
    ob_end_clean();        // 清空并关闭缓冲区
刷新
    ob_flush();          //数据向下推送
    ob_get_flush();     //获取内容并推送内容
    ob_end_flush();     // 推送内容并关闭缓冲区
没有调用flush，php脚本结束后会自动flush

7.session_start()/header()/setcookie(); 使用前前面不能有输出
    ob_start(); 先放入缓冲区，就不会报错

8.伪静态
    在操作目录下创建伪静态规则文件 “.htaccess”
      DOS创建 echo a>.htacess


*/
ob_start();
$week = 'Saturday';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>静态化</title>
</head>
<body>

<h2>实现静态化1</h2>
<h3><?php  echo $week;?></h3>
<?php
    $cont = ob_get_contents();      // 不收集当前行之后数据
    file_put_contents('./static.html',$cont);
    ob_end_clean();     // 删除并关闭缓冲区
?>
<h2>实现静态化2</h2>
</body>
</html>
<?php


//商品详情页
 function makehtml($id)
 {
     // 把添加好商品生成静态页面
     ob_start();
     //内容输出 前台商品模板页面
     $info = D("Goods")->find($id);
     $this->assign('info',$info);
     $this->display('Home@Goods/detail');
     $cont = ob_get_contents();
     // 制作静态页面           不要忘记改静态地址
     file_put_contents('./product/goods_'.$id.'.html',$cont);
     ob_end_clean();     //关闭，清空php缓冲区
 }

 function loginCheck(){
     echo "欢迎登陆";
 }
 /*

 var urlSite = ;
 $.ajax({
    url:urlSite,
    type:'get',
    dataType:'html',
    success:function(msg){

    }
 });


