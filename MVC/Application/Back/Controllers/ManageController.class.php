<?php
/**
 * 后台管理首页相关控制器类
 * 显示后台页面
 */
class ManageController extends PlatformController
{
    /**
     * 后台首页动作
     * 同时提供四个动作，完成frame框架部分展示
     */
    public function IndexAction()
    {
        /*这里之前是登录验证，放到Platformcontroller构造方法里面调用*/
//        echo "这是首页，欢迎".$_SESSION['admin_info']['admin_name'];
        require VIEW_PATH .'index.html';
    }
    public function TopAction()
    {
        //载入top模板
        require VIEW_PATH .'top.html';
    }
    public function MenuAction()
    {
        //载入top模板
        require VIEW_PATH .'menu.html';
    }
    public function DragAction()
    {
        //载入top模板
        require VIEW_PATH .'drag.html';
    }
    public function MainAction()
    {
        //载入top模板
        require VIEW_PATH .'main.html';
    }
}