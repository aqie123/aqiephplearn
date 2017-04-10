<?php
/**
 * 上传工具类
 *
 */

class Upload
{
    private $_error;    //存储当前错误信息

    /**
     * @return string 错误信息
     */
    public function getError()
    {
        return $this->_error;
    }
    private $_upload_path;// 上传目录
    private $_prefix;// 前缀
    private $_max_size;// 最大size
    private $_ext_list;// 允许的后缀列表
    private $_mime_list;// 允许的MIME列表
    public function setUploadPath($upload_path) {
        // 不允许将不存在的目录设置为上传目录
        if (is_dir($upload_path)) {
            $this->_upload_path = $upload_path;
        } else {
            trigger_error('上传目录设置失败，采用默认');
        }
    }
    public function setPrefix($prefix) {
        $this->_prefix = $prefix;
    }
    public function setMaxSize($max_size) {
        $this->_max_size = $max_size;
    }
    public function setExtList($ext_list) {
        $this->_ext_list = $ext_list;
        $this->_setMIMEList($ext_list);
    }
    public function __construct() {
        // 为选项指定默认值
        $this->_upload_path = './';
        $this->_prefix = '';
        $this->_max_size = 1 * 1024 * 1024;
        $this->_ext_list = array('.jpg', '.gif', '.png', '.jpeg');
        $this->_setMIMEList($this->_ext_list);
    }
    private $_ext_mime = array(     // 提供对照表
        '.jpeg' => 'image/jpeg',
        '.jpg' => 'image/jpeg',
        '.png' => 'image/png',
        '.gif' => 'image/gif',
    );
    private function _setMIMEList($ext_list) {
        $mime_list = array();
        // 遍历获得每一个 后缀名
        foreach($ext_list as $ext) {
            // 利用当前后缀名，获取对应的MIME，存储到MIME列表中！
            $mime_list[] = $this->_ext_mime[$ext];
        }
        // 赋值到 MIME列表属性上！
        $this->_mime_list = $mime_list;
    }

    /**
     * 上传单个文件
     * 文件上传（业务逻辑判断）
     * 一次上传一个文件
     * @param array $file_info 某个临时上传文件信息
     * @return  string：成功，目标文件名;false:失败
     */

    function uploadFile($file_info){
        //判断是否有错误
        if($file_info['error'] != 0){
            $this->_error = '上传文件存在错误';
            return false;
        }

        // 判断文件类型(strrchr  找到字符最后一次出现位置，并返回后面所有字符)
        //后缀名
        $ext_list = $this->_ext_list;
        $ext = strrchr($file_info['name'],'.');     //文件后缀
        if(!in_array($ext,$ext_list)){
            $this->_error =  '类型，后缀不合法';
        }
        // MIME
        $mime_list = $this->_mime_list;
        // 允许列表
        if(!in_array($file_info['type'],$mime_list)){
            $this->_error =  "类型MIME不合法";
        }

        // php检测MIME  Finfo类获取文件真实类型
        $finfo = new Finfo(FILEINFO_MIME_TYPE);
        $mime_type = $finfo->file($file_info['tmp_name']);
        if(!in_array($mime_type,$mime_list)){
            $this->_error =  "类型MIME不合法";
            return false;
        }

        // 判断文件大小
        $max_size = $this->_max_size;   // 允许最大尺寸
        if($file_info['size'] >$max_size){
            $this->_error =  "文件过大";
            return false;
        }
        // 设置文件上传目录
        $upload_path = $this->_upload_path;
        // 子目录存储
        $sub_dir = date('YmdH') . '/';                  //子目录名按年月写
        if(!is_dir($upload_path . $sub_dir)){        // 上传目录下的子目录不存在
            mkdir($upload_path . $sub_dir);
        }

        //目标文件名(不能重名，不能存在特殊字符) 函数 uniqid
        $prefix = $this->_prefix;       // 前缀
        $dst_name = uniqid($prefix,true).$ext;

        //移动前，判断是否为HTTp上传文件
        if(!is_uploaded_file($file_info['tmp_name'])){
            $this->_error =  "不是HTTP上传文件";
            return false;
        }

        //移动
        if(move_uploaded_file($file_info['tmp_name'],$upload_path .$sub_dir. $dst_name)) {
            // 移动成功  返回目标文件名
            return $sub_dir . $dst_name;
        }else{
            $this->_error =  "移动失败";
            return false;
        }

    }


    /**
     * 上传多个文件
     */

}
