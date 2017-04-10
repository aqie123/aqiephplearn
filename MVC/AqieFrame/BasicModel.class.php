<?php

/**
 * Class BasicModel
 * 子类如果没有构造方法，会自动调用父类构造方法
 */
class BasicModel
{
    //存储数据库mysqli实例(对象)
    protected $mysqli = null;
    function __construct()
    {
        // 实例化对象(变量存储工具类对象)
        $this->mysqli = new mysqli('localhost','root','root',"product");
        // 接收查询数据表(写死就不需要下面)
        //$this->table = $table;
    }

    // 简化query
    /*
    function query($sql){
      return $this->mysqli->query($sql);
    }
    */
    
}
    