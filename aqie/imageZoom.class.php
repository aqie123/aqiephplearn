<?php
/**
 * 原理 ：1.打开图片，将图片载入到画布中
 *        2. 新建画布2，将画布一某些矩形区域，copy放到当前画布,设定宽高
 *          3.画布二保存为文件
 */
//header("Refresh: 3; URL=index.php");
//function jump($url,$time){
//    --$time;
//    if($time ==0){
//        header("Location:$url");
//    }else{
//
//         echo $time;
//    }
//    die;
//}
//jump('./index.php',3);
class imageZoom{
    /**
     * @param $imgfile （原始图片路径）
     * @return string (对应小图路径)
     */
    function getimageZoom($imgfile){
        if($imgfile == ""){
            return "";
        }
        $img = imageCreateFromJpeg($imgfile);
        $width = imagesx($img);
        $height = imagesy($img);
        // 获得图片尺寸 和类型
        $arr = getimagesize($imgfile);
//        print_r($arr);die;
        $type_code = $arr[2]-1;
        $arr_type  =array("GIF","JPEG","PNG");
        $type = $arr_type[$type_code];     // 类型名 gif

        //创建新画布2
        // 根据旧尺寸获得新的尺寸 数组
        $w_h_2 = $this->GetNewSize($width,$height);
        $width2 = $w_h_2[0];        // 新宽
        $height2 = $w_h_2[1];       // 新高
        $img2 = imagecreatetruecolor($width2,$height2);
        // 缩放
        // (目标画布,原画布,目标位置x，目标位置y,原图位置x,原图位置y)
        // (目标区域宽，高，原图区域宽高)
        imagecopyresampled($img2,$img,
        0,0,0,0,
        $width2,$height2,$width,$height);

        //
        $file2 =  $this->get_small_file($imgfile);
        //echo $file2;die;
        /*
        if($type == "GIF"){
            imagegif($img2,$file2);
        }elseif ($type == "JPEG"){
            imagejpeg($img2,$file2);
        }elseif($type == "PNG"){
            imagepng($img2,$file2);
        }
        */
        $outFunc = "image" . $type;   // 要使用的输出函数名
        // 可变函数  imagegif   imagejpeg imagepng
        $outFunc($img,$file2);

        return $file2;

    }
    // 根据原始图获取新尺寸
    private function GetMewSize($w,$h){
        //todo
        $radio = $w/$h; // 原始宽高比
        if($radio>=1){  // 此时宽度最后缩小为100
            $ratio_w = 100/$w;      // 假设$w =500
            $h_new = $h*$ratio_w;
            return array(100,$h_new);
        }else{          // 高度缩小为100
            $radio_h = 100/$h;
            $w_new = $w*$radio_h;
            return array($w_new,100);
        }

    }
    private function get_small_file($file1){
        $pos = strrpos($file1,".");   // 获取最后一个点位置
        //    echo $pos;
        $qian = substr($file1,0,$pos); // 取.之前所有字符
        $hou = strrchr($file1,".");   // 返回后缀包括点
        $file2 = $qian."_small".$hou;
        $file2 = str_replace("/uploads/","/small_uploads/",$file2);
        return $file2;
    }
}

