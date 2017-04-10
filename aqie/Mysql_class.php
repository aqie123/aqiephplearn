<?php
/*
* 设计mysql数据库操作类
*1.该类一实例化，自动连接数据库
 * 2.该类可以单独要使用连接编码
 * 3.单独设定要使用数据库
 * 4.可以关闭连接
 *
* */
class MySQLDB
{
    public $link = null;
    function __construct($host,$port,$user,$pass,$char,$dbname,$link)
    {
        $this->link = mysqli_connect("$host:$port", "$user", "$pass");
        mysqli_select_db($this->link,"$dbname");
        mysqli_query($this->link,"set names '$char'");
    }
    function setCharset($charset)
    {
        mysqli_query($this->link,"set names $charset");
    }
    function selectDb($dbname)
    {
        mysqli_select_db($this->link,"$dbname");
    }
    function closeDB(){
        mysqli_close($this->link);
    }
}
$host = "localhost";
$port = 3306;
$user = "root";
$pass = "root";
$char = "utf8";
$dbname = "product";
$link = mysqli_connect("localhost:3306", "root", "root");
$db1 = new MySQLDB($host,$port,$user,$pass,$char,$dbname,$link);

$result = mysqli_query($link,"select * from stu");
var_dump($result);

//$db1->setCharset($link,"set names 'gbk'");
//$db1->selectDb($link,"product");
//$db1->closeDB();