<?php
header("Content-type: text/html; charset=utf-8");
/**
 * 递归获取目录内容
 * @param [type] $path
 * @param  $deep 当前深度
 * @return [type]
 */
// 直接展示
function readDirs($path,$deep=0)
{
    $handle = opendir($path);
    //var_dump($handle);
    // 不全等  保证目录名是0可以读出来
    while(false !==($filename = readdir($handle))){
        // .或者.. 跳过
        if($filename == '.' || $filename =='..') continue;
        echo "<a href=''>".str_repeat('－',$deep*2).$filename."</a>","<br>";
        //判断当前读取到的是否是目录
        if(is_dir($path . '/' .$filename)){
            // 递归调用，将当前子目录作为参数传递
            // 每次递归深度加一
            readDirs($path . '/' . $filename,$deep+1);
        }
    }
    closedir($handle);
}

//$path = 'f:/www/php/aqie/MVC/';
//readDirs($path);

/**
 *  数组展示版
 * @param string $path
 * @param  $deep (当前深度)
 * @return array
 *
 * tips:静态局部变量改变了函数调用周期，函数调用完不消失，脚本结束还是会消失
 */

function readDirs_array($path,$deep=0)
{
    static $fileList = array();        //存储所有文件信息，二维数组
    $handle = opendir($path);
    // 不全等  保证目录名是0可以读出来
    while(false !==($filename = readdir($handle))){
        // .或者.. 跳过
        if($filename == '.' || $filename =='..') continue;
        $fileInfo['filename'] = $filename;
        $fileInfo['deep'] = $deep;
        $fileList[] = $fileInfo;            // 存进二维数组
        //判断当前读取到的是否是目录
        if(is_dir($path . '/' .$filename)){
            // 递归调用，将当前子目录作为参数传递
            // 每次递归深度加一
            readDirs_array($path . '/' . $filename,$deep+1);
        }
    }
    closedir($handle);
    return $fileList;
}
//$result = readDirs_array($path);
//echo "<pre>";
//var_dump($result);


/**
 * 递归删除目录
 * Rmdir()只能删除空目录(删除目录时，将目录内容删除掉之后，再删除目录本身)
 * @param $path (删除的文件目录)
 * 删除文件 unlink(文件地址)
 * @return bool
 */

function rmDirs($path)
{
    $handle = opendir($path);
    //var_dump($handle);
    // 不全等  保证目录名是0可以读出来
    while(false !==($filename = readdir($handle))){
        // .或者.. 跳过
        if($filename == '.' || $filename =='..') continue;
        //判断当前读取到的是否是目录
        if(is_dir($path . '/' .$filename)){
            // 递归调用，将当前子目录作为参数传递
            // 每次递归深度加一
            rmDirs($path . '/' . $filename);
        } else{
            // 是文件
            unlink($path . '/'.$filename);
        }
    }
    closedir($handle);
    // 删除目录
    return  rmdir($path);
}
//$path = 'd:/b';
//print_r(rmDirs($path));


/**
 * 文件操作(大多数使用)
 * File_put_contents();     内容写入文件      返回写入长度
 * File_get_contents();      内容从文件读取
 * unlink 删除文件
 * rename 文件移动
 * filesize 文件大小
 * file_exists(文件地址) 判断文件是否存在
 * filemtime()      文件最后修改时间
 *
 * 文件句柄操作(适用于文件过大)
 * 句柄：PHP程序与文件间数据通路
 * fopen(文件地址，打开模式(R,W,A))
 * r : 读
 * w ：清空写
 * a ：追加写
 * x ：新建写(只能打开不存在文件)
 *
 * r+: 写会替换当前指针内容
 * w+:会清空，指针在那里就在那里读写
 * a+:(指针仅仅影响读操作)仅仅可以在末尾写
 * x+:
 *
 * fread(句柄,长度),         // 返回字符串,不收换行符限制
 * fgetc(句柄),     // 一次只读一个字节数据,每读取一个字节，文件指针向前移动
 * 字节：最基本存储空间
 * 字符：a ,康 ，x (占用的字节数量与字符采用的字符集有关)
 *
 * fgets(句柄,长度)  //文件指针位置读取指定长度字符串,碰到换行符也会终止(读行函数)
 * fwrite(句柄，内容),
 * fclose();
 *
 * 文件指针操作函数
 * fseek(句柄);       定为指针，位置从0开始，递增
 * ftell(句柄);       获取指针位置
 */
$file = './date.txt';
$date = date('H:i:s') . "\n";
//$res = file_put_contents($file, $date);     // 覆盖写入
//$res = file_put_contents($file, $date,FILE_APPEND);     // 追加写入
$res = file_get_contents($file);
echo nl2br($res);       // 将换行符转换为 br
echo filesize($file),"<br>";
echo date('H:s:i',filemtime($file));

echo "文件句柄操作<hr>";
$handle = fopen($file,'r');
//var_dump($handle);        // 数据通路
$res = fgetc($handle);
var_dump($res);

$res = fgets($handle,30);  // 获取到长度为参数长度-1
echo "<br>";
var_dump($res);

/**
 * 循环读取全部文件
 */
while(!feof($handle)){      //没有到达文件末尾
    $line = fgets($handle,1024);
    echo nl2br($line);
}

echo "<hr>";
$res = fread($handle,20);
var_dump($res);
echo "<br>";

/**
 * 打开模式，追加写
 */
//$handle = fopen($file,'a');
$handle = fopen($file,'a+');     // 清空写是在打开时候清空
$data = date('Y_m-d H:i:s') ."\n";
$res = fwrite($handle,$data);
var_dump($res);

/**
 * 文件指针
 */
echo '<br>指针位置：',ftell($handle),"<br>";
echo '<br>定位指针位置：',fseek($handle,5);
echo '<br>指针位置：',ftell($handle),"<br>";
echo fgets($handle,3);       // 读两个字节

fclose($handle);        //用完资源关闭

echo "<hr>";
/**
 * r+模式
 */
$handle = fopen($file,'r+');
echo '<br>指针位置：',ftell($handle),"<br>";
$res = fgets($handle,1024);
echo $res;
echo '<br>指针位置：',ftell($handle),"<br>";
$res = fwrite($handle,'aaaaa');


/**
 * 文件锁(一个脚本操作需要阻塞另外脚本)
 * 先加锁，检测成功，再使用
 * 读锁(LOCK_SH)：读操作前加锁定,允许并发读，阻塞写操作
 * 写锁(LOCK_EX)(排它锁): 写操作前，添加锁定。其他脚本不能读写
 * 意向锁：所有操作资源脚本，遵循一个约定
 * flock(句柄，类型) 添加意向锁
 *
 * flock($handle.LOCK_UN);  强制解锁
 * fclose(); 自动解锁
 *
 */
$file = './date.txt';
$model = 'r';
$handle = fopen($file,$model);
//echo '<br>指针位置：',ftell($handle),"<br>";
// 加锁
$lock_result = flock($handle,LOCK_SH | LOCK_NB);    //位或，锁定失败，不阻塞
if(!$lock_result){
    // 锁定失败
    trigger_error('锁定失败');
    die;
}else{
    $str = fgets($handle,1024);
    echo "<br>";
    var_dump($str);
}
