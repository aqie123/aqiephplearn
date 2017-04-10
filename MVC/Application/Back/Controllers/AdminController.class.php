<?php

/**
 * Class AdminController
 * 加载登录页面，并执行验证相关操作
 */
class AdminController extends PlatformController
{
    public function LoginAction()
    {
        // 显示登录页面
        include VIEW_PATH . 'Login.html';
    }
    public function CheckLoginAction()
    {
        // 调用验证码工具类验证码方法
        $t_captcha = new Captcha();
        if(!$t_captcha->checkCode($_POST['code'])){
            // 不正确 ，跳转到登录页面
            $this->GotoUrl('验证按验证失败',"index.php?p=back&c=Admin&a=login",2);
            //停止脚本
            die;
        }

        $user = $_POST['username'];
        $pwd = $_POST['pwd'];
        // 实例化AdminModel类，通过单例工厂得到对象
        $model = SingleModelFactory::M('AdminModel');
        //管理员合法时，返回真假
        // $res = $model->CheckAdmin($user,$pwd);      // 判断用户是否存在
        //当管理员合法时返回全部信息(array),非法时返回false
        $admin_info = $model->CheckAdminInfo($user,$pwd);
//        print_r($admin_info);
//        exit;

        if($admin_info){
//            $is_login = 'yes';            变量失败
//            file_put_contents('./is_login','yes');  文件失败
            // 设置标识
            session_start();
            $_SESSION['admin_info']=$admin_info;      // 二维数组
            // 获取用户名  $_SESSION['admin_info']['admin_name'];

            // 设置记录登录状态 在cookie 中添加这两个值
            if(isset($_POST['remember'])){
                // 在原始数据上，添加混淆字符串再加密
                setcookie('admin_id',md5($admin_info['id'] . 'AQIE'),time()+3600);
                setcookie('admin_pass',md5($admin_info['admin_pass'] . 'AQIE'),time()+3600);
            }
            header('Location:index.php?p=back&c=Manage&a=Index');
        }else{
            $this->GotoUrl('用户登录失败','?p=back&c=Admin&a=Login',3);
        }
    }

    public function CaptchaAction()     // 生成验证码
    {
        // 通过工具类
        $t_captcha = new Captcha();
        $t_captcha->makeImage();
    }

}