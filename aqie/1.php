<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="Keywords" content="关键词123">
<meta name="Description" content="描述">
<!--
<link href="./css/taobao2.css" rel="stylesheet" type="text/css" />

<script src="./js/jquery-3.1.1.min.js" type="text/javascript"></script>
-->
<style type="text/css"></style>
<title></title>
</head>

<body>
<script type="text/javascript"></script>

<?php
echo
     "1.处理接收表单，
      2.生成动态网页，
      3.字符串处理，
      4.动态输出图像，
      5.处理服务器端文件系统，
      6.编写数据库支持的网页，
      7.会话跟踪控制，
      8.处理XML文件，
      9.支持多种协议开放端口协同工作，
      10.电子商务，
      11.搜索引擎，
      12.IRC网关，
      13.多种压缩，日历转换，翻译。。。";
      echo "当前时间为" .date("y-m-d H-i-s")."<br />";
      echo "<p>图形A <br>";
      $n = 7;
      define("KONGGE","&ensp;");
      for($i =1;$i<=$n;$i++){
            for($j = 1;$j<=$n; $j++){
                  echo "*";
            }
            echo "<br />";
      }
      echo "<p>图形B <br>";
      for($i =1;$i<=$n;$i++){
            for($j = 1;$j<=$i; $j++){
                  echo "*";
            }
            echo "<br />";
      }
      echo "<p>图形C <br>";
      for($i =1;$i<=$n;$i++){
            for($j = 1;$j<= 2*$i - 1; $j++){
                  echo "*";
            }
            echo "<br />";
      }
      echo "<p>图形D<br>";
      for($i =1;$i<=$n;$i++){
            for($k = 1;$k<=$n-$i;$k++){
                  echo KONGGE;
            }
            for($j = 1;$j<= 2*$i - 1; $j++){
                  echo "*";
            }
            echo "<br />";
      }
      echo "<p>图形E<br>";
      for($i =1;$i<=$n;$i++){
            for($k = 1;$k<=$n-$i;$k++){
                  echo KONGGE;
            }
            for($j = 1;$j<= 2*$i - 1; $j++){
                  if($i==$n){
                        echo "*";
                  }else{
                       if($j==1||$j==2*$i-1){
                        echo "*";
                  }else{
                        echo KONGGE;
                  } 
                  }
                  
                  
            }
            echo "<br />";
      }
       echo "<p>图形F<br>";
       for($i =1;$i<=$n;$i++){
            for($k = 1;$k<=$n-$i;$k++){
                  echo KONGGE;
            }
            for($j = 1;$j<= 2*$i - 1; $j++){

                  if($j==1||$j==2*$i-1){
                        echo "*";
                  }else{
                        echo KONGGE;
                  } 
               
                  
                  
            }
            echo "<br />";
      }
      echo "<p>图形G<br>";
      for($i =1;$i<=$n;$i++){
            for($k = 1;$k<=$n-$i;$k++){
                  echo KONGGE;
            }
            for($j = 1;$j<= 2*$i - 1; $j++){

                  if($j==1||$j==2*$i-1){
                        echo "*";
                  }else{
                        echo KONGGE;
                  } 
               
                  
                  
            }
            echo "<br />";
      }
      for($i =$n-1;$i>=1;$i--){
            for($k = 1;$k<=$n-$i;$k++){
                  echo KONGGE;
            }
            for($j = 1;$j<= 2*$i - 1; $j++){

                  if($j==1||$j==2*$i-1){
                        echo "*";
                  }else{
                        echo KONGGE;
                  } 
               
                  
                  
            }
            echo "<br />";
      }
     

?>


</body>
</html>
