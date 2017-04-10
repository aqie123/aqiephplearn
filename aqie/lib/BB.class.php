<?php

class BB
{
    public $p = 1;
    function __clone()
    {
        // TODO: Implement __clone() method.
        echo "<br>正在克隆的对象p值为:".$this->p;
    }

}