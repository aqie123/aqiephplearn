<?php
/**
 * 面向对象(流程控制)
 *
 * 封装： 将类设计更健壮，尽可能将类成员私有化，只开放必须属性方法
 *
 * 继承：代码复用
 *
 * 多态：多种表现形式
 *
 *
 */

/**
 * @param
 * 自定义加载函数
 */
spl_autoload_register("autoload2");
function autoload2($class_name){        // 用于加载lib目录文件
    echo "<br> 准备在autoload2加载类：$class_name"."<br>";
    $file = './lib/'.$class_name.".class.php";
    if(file_exists($file)){
        include_once $file;
    }
}
$a = new BB();
$a->p = 11;
$aa = clone $a;

$b = new BB();
$b->p =22;
$bb = clone $b;

/*开发流程
 *需求： 需求说明
 * 软件设计书： 详细设计说明书
 *
 * 界面设计
 * 静态网页制作
 * 动态网页开发
 * 测试
 * 上线运营
 *
 */

/**
 * 显示与逻辑分离
 *
 */
// 控制器C
// 获取什么数据，在那个页面显示
$obj = new MyTime();
if(!empty($_GET['f']) && $_GET['f']=='date'){       // 改变时间形式
    $t = $obj->GetDate();
}else if(!empty($_GET['f']) && $_GET['f']=='time'){
    $t = $obj->GetTime();
}else{
    $t = $obj->GetDateTime();
}

// 根据用户选择，确定要使用模板
if(!empty($_GET['ban'])){                   // 改变页面背景颜色
    $ban = $_GET['ban'];
}else{
    $ban = "white";
}
$file = "./showTime_".$ban.".html";
include $file;

/**
 *MVC编程思想
 *
 *
 */
// 1.只显示年月日  2.默认

