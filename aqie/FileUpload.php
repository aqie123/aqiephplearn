<?php
/**
 * 文件上传
 * 浏览器与服务器交互两种方式：请求，响应
 * 文件上传发生在请求阶段(文件由浏览器上传到服务器)
 *
 * php接收到post请求，将所有接收到的 字符串数据 ，存储到$_POST数组中
 * 将接收到的文件，存储在上传临时目录中（默认为服务器所在操作系统临时目录）
 *
 * php在临时文件消失前，将图片存储
 * Move_uploaded_file(临时文件地址,目标文件地址);
 *
 * 文件类型
 * $_FILE中type信息，不是php检测出来的，是浏览器提供的
 * 后缀名和MIME(image/jpeg)
 *
 * 子目录存储上传
 * --时间划分
 * 子目录名 date()
 * is_dir() 是否为一个目录
 * mkdir() 创建目录
 *
 */
//echo '<pre>';
//var_dump($_FILES);
//var_dump($_POST);
//sleep(10);

/* 文件上传
$tmp_file = $_FILES['goods_image']['tmp_name'];
$dst_file='./upload.jpg';
move_uploaded_file($tmp_file,$dst_file);
*/

// 调用图片上传函数
$result = uploadFile($_FILES['goods_image']); //现在是一维数组，还包括五个元素
var_dump($result);

/**
 * 文件上传（业务逻辑判断）
 * 一次上传一个文件
 * @param array $file_info 某个临时上传文件信息
 * @return  string：成功，目标文件名;false:失败
 */

function uploadFile($file_info){
    //判断是否有错误
    if($file_info['error'] != 0){
        echo '上传文件存在错误';
        return false;
    }

    // 判断文件类型(strrchr  找到字符最后一次出现位置，并返回后面所有字符)
    //后缀名
    $ext_list = array('.jpg','.png','.gif','.jpeg');
    $ext = strrchr($file_info['name'],'.');     //文件后缀
    if(!in_array($ext,$ext_list)){
        echo '类型，后缀不合法';
    }
    // MIME
    $mime_list = array('image/jpeg','image/png','image/gif');
    // 允许列表
    if(!in_array($file_info['type'],$mime_list)){
        echo "类型MIME不合法";
    }

    // php检测MIME
    $finfo = new Finfo(FILEINFO_MIME_TYPE);
    $mime_type = $finfo->file($file_info['tmp_name']);
    if(!in_array($mime_type,$mime_list)){
        echo "类型MIME不合法";
        return false;
    }

    // 判断文件大小
    $max_size = 500*1024;   // 允许最大尺寸
    if($file_info['size'] >$max_size){
        echo "文件过大";
        return false;
    }
    // 设置文件上传目录
    $upload_path = './';
    // 子目录存储
    $sub_dir = date('YmdH') . '/';                  //子目录名按年月写
    if(!is_dir($upload_path . $sub_dir)){        // 上传目录下的子目录不存在
        mkdir($upload_path . $sub_dir);
    }

    //目标文件名(不能重名，不能存在特殊字符) 函数 uniqid
    $prefix = '';       // 前缀
    $dst_name = uniqid($prefix,true).$ext;

    //移动前，判断是否为HTTp上传文件
    if(!is_uploaded_file($file_info['tmp_name'])){
        echo "不是HTTP上传文件";
        return false;
    }

    //移动
   if(move_uploaded_file($file_info['tmp_name'],$upload_path .$sub_dir. $dst_name)) {
       // 移动成功  返回目标文件名
       return $sub_dir . $dst_name;
   }else{
       echo "移动失败";
       return false;
   }

}