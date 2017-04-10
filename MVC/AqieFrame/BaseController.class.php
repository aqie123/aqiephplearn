<?php

/**
 * Class BaseController
 * 放一些通用的方法
 */
class BaseController
{
    function __construct()
    {
        header("content-type:text/html;charset=utf-8");
    }
    // 显示提示文字，并进行跳转
    function GotoUrl($msg,$url,$time=3)
    {
        echo "<span style='color:#f00'>$msg</span>";
        echo "<br><a href='$url'>返回</a> ";
        echo "<br>页面将在{$time}秒后跳转";
        header("refresh: $time; url=$url");
        die;
    }
}