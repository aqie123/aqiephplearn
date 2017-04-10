<?php
// 这样让控制器类更纯粹（请求分发器）

$p = !empty($_GET['p']) ? $_GET['p'] :"Back";              //确定平台
define("PLAT",$p);      // 定义超全局变量
define("DS",DIRECTORY_SEPARATOR); // 目录分割符  '/'(unix) '\'windows
define("ROOT",__DIR__.DS); // 当前框架根目录
define("APP",ROOT . 'Application'.DS);          //app所在目录
define("FRAMEWORK",ROOT . 'AqieFrame'.DS);      // 框架基础类所在路径
define("PLAT_PATH",APP . PLAT . DS);            //平台所在目录
define("CTRL_PATH",PLAT_PATH . "Controllers" . DS); //当前控制器所在目录
define("MODEL_PATH",PLAT_PATH . "Models" . DS);    //当前model所在目录
define("VIEW_PATH",PLAT_PATH . "Views" . DS);      //视图所在目录

//$c = "User";    // 也可能是其他的

$c = !empty($_GET['c']) ? $_GET['c'] :"Manage";              //每次请求带上控制器名字
define('CONTROLLER',$c);                //控制器和方法存进常量

function __autoload($class){
    //$base_class = array('BasicModel','SingleModelFactory','BaseController');
    $base_class['BasicModel'] = FRAMEWORK . 'BasicModel.class.php';
    $base_class['SingleModelFactory'] = FRAMEWORK . 'SingleModelFactory.class.php';
    $base_class['BaseController'] = FRAMEWORK . 'BaseController.class.php';
    $base_class['Captcha'] = FRAMEWORK . 'tools/Captcha.class.php';
    $base_class['Upload'] = FRAMEWORK . 'tools/Upload.class.php';
    if(isset($base_class[$class])){           //按需加载基础模型
//        require FRAMEWORK.$class.".class.php";
        require $base_class[$class];
    }elseif (substr($class,-5) == "Model"){     //所需类名最后五个字符是Model
        require MODEL_PATH . $class.".class.php";
    }elseif (substr($class,-10) == "Controller"){  //加载控制器
        require CTRL_PATH . $class.".class.php";
    }
}
/*
require FRAMEWORK . 'BasicModel.php';
require FRAMEWORK . 'SingleModelFactory.class.php';
require FRAMEWORK . 'BaseController.class.php';
require MODEL_PATH . $c ."Model.class.php";                      // 引入model文件(Model.class.php)
require CTRL_PATH . $c . "Controller.class.php";
// 载入的当前控制器类(实际类在某个单独页面)(Controller.class.php)
//*/
$controller_name = $c . "Controller";                   // 构建控制器类名

$obj = new $controller_name();                          //可变类  // 把上面新封装类实例化
$a = !empty($_GET['a']) ? $_GET['a'] : "Index";       //接收什么参数，调用什么方法
define('ACTION',$a);

$action = $a ."Action";
$obj->$action();                                         // 可变函数变成可变方法  代替下面所有逻辑