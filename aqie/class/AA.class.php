<?php
class AA{
    static $p1 = 1;
    static function show()
    {
        echo "<br>self::p1 = ".self::$p1;       //代表的是类本身
        echo "<br>static::p1 = ".static::$p1;
    }
}
