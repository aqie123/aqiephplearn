<?php
// 将英文文本日期时间解析为 Unix 时间戳： strtotime('2010-03-24 08:15:42');
// date()UNIX时间戳转换为日期用函数  date('Y-m-d H:i:s', 1156219870);

// mysql FROM_UNIXTIME()  UNIX时间戳转换为日期用函数
// 日期转换为UNIX时间戳用函数： UNIX_TIMESTAMP()
// 查询当天记录
// $sql=”select * from message Where DATE_FORMAT(FROM_UNIXTIME(chattime),’%Y-%m-%d’) = DATE_FORMAT(NOW(),’%Y-%m-%d’) order by id desc”;

// echo "Oct 3, 1975 was on a ".date("l", mktime(0,0,0,10,3,1975));
class Dtime
{
    function get_days($date1, $date2)
    {
    $time1 = strtotime($date1);
    $time2 = strtotime($date2);
    return ($time2-$time1)/86400;
    }
}
echo "今天:".date("Y-m-d")."<br>";
echo "昨天:".date("Y-m-d",strtotime("-1 day")), "<br>";
$now = date("Y-m-d H:i:s");
echo $now;
echo "<br>";
//$prev = date("Y-m-d H:i:s",strtotime("-1 day"));
$prev = mktime(0,0,0,date("m"),date("d"),date("Y"));
echo "$prev";
echo "<br>";
$res = strtotime($now) - $prev;
echo $res;