<?php
/**
 * 后台back的平台控制器
 *
 */
class PlatformController extends  BaseController
{
    public function __construct()
    {
        // 强制调用父类被重写构造方法
        parent::__construct();
        // 重写构造方法
        $this->_check();
    }

    /**
     * 验证是否登录
     */
    protected function _check()
    {
        //判断当前请求是否需要校验.登录动作不需要校验
        $curr_controller = strtolower(CONTROLLER);       // 转换成小写
        $curr_action = strtolower('ACTION');
        if($curr_controller == 'admin' && ($curr_action == 'login' || $curr_action = 'checklogin' || $curr_action ='captcha')){
            return;
        }


        //判断用户是否登录
        //        if(!isset($is_login))       变量失败，传递不过去
        //        if(!file_exists('./is_login')) 文件区分不开浏览器
        session_start();
        if(!isset($_SESSION['admin_info'])){
            //不具有session中登录标识
            //判断cookie是否记录登录状态(是否存在id和密码，并且一致)
            $model = SingleModelFactory::M('AdminModel');
            if(isset($_COOKIE['admin_id']) && isset($_COOKIE['admin_pass']) &&
                $admin_info = $model->CheckCookieInfo($_COOKIE['admin_id'],$_COOKIE['admin_pass'])){
                // 具有登陆状态，设置session中登录标识
                $_SESSION['admin_info']= $admin_info;

            }else{
                // 没有记录登录状态
                // 没有session标识
                header('Location:index.php?p=back&c=Admin&a=login');
                die();
            }

        }
    }


}