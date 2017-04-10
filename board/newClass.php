<?php 

  class newClass{
    function magic($str){
      $str = trim($str);//过滤空格
      if(!get_magic_quotes_gpc()){//如果系统没有自动转译
        $str = addslashes($str);//转译危险字符
      }
      return htmlspecialchars($str);//把html转译成实体
    }
  }
  
 ?>