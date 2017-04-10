<?php
class A{
    public $p1 = 1;
    protected $p2 = 2;
    private $p3 = 3;
    static $p4 = 4;     // 静态属性不可遍历
    public $p5 = 5;     // 如果没有序列化，打印出来是对象所属类的数据

    function f1(){
        echo "<br>f1方法被调用";
    }
    public function showAllProperties()
    {
        foreach ($this as $key =>$value){       // 只有公共变量才遍历出来
            echo "<br> 属性$key :$value";
        }
    }

    function __sleep()
    {
        // TODO: Implement __sleep() method.
        echo "<br>要进行序列化了";
        // 指定序列化
        return array('p1','p2');
    }

    function __wakeup()
    {
        // TODO: Implement __wakeup() method.
        echo "<br>要进行反序列化了";
    }



}