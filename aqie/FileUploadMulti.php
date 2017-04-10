<?php
echo "<pre>";
print_r($_FILES);
/***
 * 文件上传必须post,get只能传递字符串
 *
 * 分别整理每个文件信息,获得每个下标
 * Error
 * 0:没有错误
 * 1：文件过大
 * 2：文件过大 超过表单中元素限制大小（精确到每个表单）
 * 3.文件部分上传
 * 4.没有上传文件
 * 5.上传空文件
 * 6.临时上传目录未找到 uoload_tmp_dir
 * 7.临时文件写入失败(没有权限或没空间)
 *
 * 上传文件数量(超过总大小PHP不处理)
 * max_file_uploads = 20;
 * post_max_size;
 *
 * 目录操作函数
 * is_dir()
 * mkdir(目录地址，权限，是否递归创建(true))
 * rmdir  删除目录(不允许删除非空目录)
 * 句柄：php程序与文件系统数据流通道
 * Opendir()    打开目录句柄
 * Readdir()    通过句柄从目录中读取文件，一次读取一个，并向下移动文件指针
 * Closedir() 关闭句柄
 *Rename(原始地址，目标地址)   //可以更改目录和文件名
 *
 *
 */
function uploadMulti($file_list){
    $result_list = [];
    // 遍历 通过name元素，得到下标
    foreach($file_list['name'] as $key=>$val){
        // 利用下标 获得对应的5个元素值
        $file_info['name'] = $file_list['name'][$key];
        $file_info['type'] = $file_list['type'][$key];
        $file_info['tmp_name'] = $file_list['tmp_name'][$key];
        $file_info['error'] = $file_list['error'][$key];
        $file_info['size'] = $file_list['size'][$key];

        // 存储每个文件的上传结果，与$key对应
        $result_list[$key] = uploadFile($file_info);
    }
    // 返回上传结果
    return $result_list;

}



// 移动文件路径并改名
$old_path ='./libs';
$new_path = 'f:/www/lib';
$result = rename($old_path,$new_path);


