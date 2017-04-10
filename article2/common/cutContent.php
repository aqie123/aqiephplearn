<?php 
  class cutContent{
    function cut($str, $limit) {
      if(strlen($str)>$limit){
        $restr = '';
        for($i=0;$i< $limit-3;$i++) {
          $restr .= ord($str[$i])>127 ? $str[$i].$str[++$i].$str[++$i] : $str[$i];
        }
        return $restr.'...';
      }else{
        return $str;
      }
      
    }
  }

?>

