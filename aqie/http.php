<?php
/**
 * http 超文本传输协议
 *
 * 1.请求数据脚本
 * accept-language
 * accept ;接收内容类型
 * 2.post才有请求主体数据
 *
 * 3.操作请求
 * $_SERVER['HTTP_REFERER']
 */




//
/**
 *返回来源页  login.php 和cart.php
 * $default_url = 'http://www.aqie.com/php/aqie/login.php';
$url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $default_url;
header('Refresh:2; URL=' . $url);
echo "登录成功";

*/

/**
 * 多语言支持
 * 获得项目中支持语言
 * strpos('abcd','a') = 0;    字符串首次出现位置
 * @return array
 */
function getSupportLanguage()
{
    $lang_list = [];
    $path= './language/';
    $handle = opendir($path);
    while($filename = readdir($handle)){
        if($filename == '.' || $filename == '..') continue;
        $lang_list[] = substr($filename,0,strpos($filename,'.'));
    }
    return $lang_list;
}

$support_list = getSupportLanguage();
echo "<pre>";
var_dump($support_list);

/**
 * 获得浏览器需要语言
 */

function getBrowserLanguage()
{
    $browser_list =[];
    $accept_language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
    //将上面字符串存进数组
    // Accept-Language:zh-CN,zh;q=0.8
    $lang_list = explode(',',$accept_language);     // 产生一个数组
    foreach($lang_list as $lang){
        $tmp_arr = explode(';',$lang);
        $tmp_lang = $tmp_arr[0];
        $browser_list[] = str_replace('-','_',strtolower($tmp_lang));
        //横杠换位下划线
    }
    return $browser_list;
}
$browser_list = getBrowserLanguage();
echo "<pre>";
var_dump($browser_list);

/**
 * 找到浏览器所需要的语言
 *
 */
function getLang($s_l,$b_l){
    $lang = 'zh_cn';
    foreach ($b_l as $l){
        if(in_array($l,$s_l)){  // 浏览器支持语言在提供语言里面
            $lang = $l;
            break;
        }
    }
    return $lang;
}
$curr_lang = getLang($support_list,$browser_list);
var_dump($curr_lang);

/**
 * 利用语言文件完成展示
 */
require './language/'.$curr_lang .'.php';
echo $lang['HELLO'],'啊切';

/**
 * 响应格式
 * 响应头：服务器需要浏览器指导数据
 * 状态码：
 * 200 成功
 * 404 请求资源未找到
 * 403 禁止访问
 * 302 请求重定向
 * 500 服务器内部错误
 *
 * Connection 连接类型
 * Date 响应时间
 * keep-alive 保持连接实效
 * content-type 主体类型
 * content-length 主体长度
 * set-cookie 设置cookie
 *
 * 响应主体
 * 任何输出都为响应主体
 */