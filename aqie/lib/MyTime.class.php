<?php
// Model  只产生数据
class MyTime{
    function GetDate()
    {
        return date("Y-m-d");
    }
    function GetTime()
    {
        return date("H:i:s");
    }
    function GetDateTime()
    {
        return date("Y-m-d H:i:s");
    }
}