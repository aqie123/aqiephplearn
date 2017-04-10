<?php
/**
 * 控制器的划分
 * 将一些功能合在一起，成为一个模块，并用一个控制器表达这个模块
 * 各个功能即方法
 *
 *
 * 视图层
 * 普通标量数据，数组数据，对象数据
 *
 * 数组数据：foreach ($arr as $key=>$val){}
 * echo $arr['id'];
 *
 * 对象数据：echo $obj->p1;

 * MVC(其他做法)
 * 1.请求分发器(前端控制器)
 *
 *
 *
 * 平台划分
 *
 *
 * 基础常量
 *
 * 禁止访问目录
 * 新建.htaccess
 * Deny from All
 *
 *
 */


/**
 * 文件引入是相对inde目录的
 */



/**
 * 分析MVC框架
 * note1.常量变量本质区别 ：常量保证在一个周期内
 *note2.代码在内存中执行,require加载到内存里（对代码分析,编译,执行）
 *
 * 1.入口文件，请求分发器
 * 2.确定使用平台,存储为常量
 * 3.定义路径常量，存储
 * 4.确定当前控制器
 * 5.定义自动加载函数__autoload();
 * 6.实例化控制器对象
 * 7.载入控制器文件和basic控制器文件
 * 8.执行构造函数方法
 * 9.确定当前动作
 * 10.加载模板      // 视图层
 *
 *9.确定当前动作.CheckLoginAction   // 模型层
 * 10.获取表单数据
 * 11.通过工厂获取模型单例对象
 * 12.载入工厂类通过M方法，获取单例对象
 * 13.加载模型类文件
 * 14.加载basicModel
 * 15.执行构造方法，初始化mysqli类
 * 16.调用模型checkLogin方法
 * 17.通过方法return 值，进行页面跳转
 *
 */


/**
 *实例化后台控制器对象，调用验证登录方法，在构造方法中完成(问题：循环重定向)
 * 平台控制器 构造方法__construct();
 * 登录验证开始：AdminController ->checkLogin方法先建立登录标识，在跳转到ManageController方法验证
 *主要是admin和manage都继承了platform控制器，在验证登录前(执行admin/loginAction,需要先实例化AdminController)会执行构造方法,验证登录，未登录又会跳转到LoginAction
 * 解决：将后台中不需要校验动作，在_check判断是否为特例
 * 在入口文件(请求分发器)完成a和c 存进常量,Back/controllers/PlatformController.class.php _check(方法)
 * 直接调用
 */

/**
 * 在框架中处理自动加载：
 * 将所有的框架基础类，与类文件地址，做一个映射对应
 * 改变数组形式
 * 将 if(in_array($class,$base_class)) 改为  if(isset($base_class[$class]))
 *if(isset($base_class[$class])){           //按需加载基础模型
    require FRAMEWORK.$class.".class.php";
    }elseif (substr($class,-5) == "Model"){     //所需类名最后五个字符是Model
    require MODEL_PATH . $class.".class.php";
    }elseif (substr($class,-10) == "Controller"){  //加载控制器
    require CTRL_PATH . $class.".class.php";
 }
 */

/**
 * 添加验证码类
 */

/**
 * 实现商品上传
 * 添加上传工具类
 *
 */
