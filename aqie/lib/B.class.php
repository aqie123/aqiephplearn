<?php

class B{
    public $name;
    public $sex;
    function __construct($name,$sex)
    {
        $this->name = $name;
        $this->sex = $sex;
    }
    function __toString()
    {
        // TODO: Implement __toString() method.
        $str = "姓名:".$this->name;
        $str .= ",性别:".$this->sex;
        return $str;
    }

    function __invoke()
    {
        // TODO: Implement __invoke() method.
        echo "<br>我是对象B";
    }

    function MagicMethods()
    {
        echo "<br> __DIR__:".__DIR__;
        echo "<br> __FILE__:".__FILE__;
        echo "<br> __LINE_:".__LINE__;
        echo "<br> __METHOD__:".__METHOD__;
        echo "<br> __CLASS__:".__CLASS__;
        echo "<br> __LINE__:".__LINE__;
    }
}