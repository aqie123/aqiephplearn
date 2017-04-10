<?php
/*
 * 面向对象
 * Object Priented Program
 * 类使用 class 关键字后加上类名定义。
    类名后的一对大括号({})内可以定义变量和方法。
    类的变量使用 var 来声明, 变量也可以初始化值。
    函数定义类似 PHP 函数的定义，但函数只能通过该类及其实例化的对象访问。
 *
 * */
class Person{       // 属性|方法|类常量
    var $name;             // 属性
    var $edu;
    var $hobby = '篮球';
    static $count = 0;
    function __construct($p1,$p2,$p3)
    {
        $this->name = $p1;      //this代表new出来对象,new就可以调用这个方法
        $this->age = $p2;
        $this->edu = $p3;
    }
    function __destruct()
    {
        // TODO: Implement __destruct() method.
//        echo "<br>{$this->name}被销毁了";  //(程序运行结束，变量肯定被销毁)
    }

    function laundry()
    {             // 方法
        echo "<br> {$this->age}的 {$this->name}在{$this->edu}洗衣服";
    }
    function calculate($x,$y)
    {
        $result = $x*$x + $y*$y;
        return $result;
    }


}


//$obj2= new Person($p1,$p2,$p3);        // 属性重新赋值
//$obj2->name = '小红';
//$obj2->age = '18';
//$obj2->edu = 'highschool';
//$obj2->laundry();
//$res = $obj2->calculate(3,4);
Person::$count++;

//echo "<br>".$res;
echo "<br> 当前Person对象总量(所有对象共用一份数据)".Person::$count++;
$obj3 = new Person('啊切',18,'college');
$obj3->laundry();






echo "<pre>";
//var_dump($obj2);
echo "</pre>";

/*
 *1. $o1 = new C1();  //通过类创建新对象
 *2. $o2 = new o1;    //通过对象new新对象
 *3.  $s1 = "C1";      //字符串变量
 *    $o3 = new $s1();  //可变类
 * 4. $o4 = new self(); // self当前类本身,出现在类方法中
 * */


/*
 * 对象传值
 * 变量$o1存储的只是对象编号
 *值传递，复制的是对象编号
 *引用传递，也指向同一个编号
 *
 * */

class C1{
    var $p = 1;
    static $p2 = 4;
    static function showInfo(){
        echo "<br>静态方法 p的值为".self::$p2;
    }


}
$v1 =1;
$v2 = $v1;
$v1++;
echo "<br> v1 = $v1,v2 = $v2";
C1::showInfo();     //使用类调用静态方法

$o1 = new C1();
$o2 = $o1;      //值传递
$o3 = & $o1;        //引用传递
$o1->p =2;
echo "<br> o1->p = {$o1->p},o2->p = {$o2->p},o3->p = {$o3->p}";     // 2,2,2


/*
 * 属性：
 * 普通属性  var $a = 3; public $b =3;public $c,  一样  $obj->a;
 * 静态属性  一个类中只有一份静态属性 static $m = 5;      $obj::$m
 *
 * 方法：
 * 普通方法 $obj->方法名
 * 静态方法 $obj::方法名
 *
 * 后两个一个类中都只有一个
 * 构造方法 在new一个对象自动调用,有构造方法，new对象也要对应相应实参
 * 析构方法 对象被销毁自动调用，不能带参数(形参)$this代表当前对象
 *
 *
 * 结论：
（1）、静态属性不需要实例化即可调用。因为静态属性存放的位置是在类里，调用方法为"类名::属性名"；
（2）、静态方法不需要实例化即可调用。同上
（3）、静态方法不能调用非静态属性。因为非静态属性需要实例化后，存放在对象里；
（4）、静态方法可以调用非静态方法，使用 self 关键词。php里，一个方法被self:: 后，它就自动转变为静态方法；
 *
 * 常量：
 * 类常量          --在类中定义
 * const baidu = 'www.baidu.com';
 * const PI = 9.8;              //超全局
 *C1::PI
 *
 *
 * 对象销毁
 *
 *
 *
 * */

echo "<hr>";
class Student{
    const aYear = 2017;                 //类常量
    const School = '华科';
    public $cname;                      //属性
    public $csex;
    public $cage;
    static $TotalStudent = 0;           // 静态属性
    private $selfObject = '秘密';
    public $ball = '篮球';

    static $p1 = 1;
    static protected $p2=2;
    public $p3 = 3;
    public function __construct($name='aqie',$sex='男',$age=18)        //会自动调用
    {
        self::$TotalStudent++;          //静态变量
        $this->cname = $name;       // $name形参
        $this->csex = $sex;
        $this->cage = $age;
        //普通方法调用静态属性，同样使用self关键词
        echo "<hr>{$this->cname}在 ".self::aYear."年 加入华科,当前有".self::$TotalStudent."个学生";

    }
    function __destruct()
    {
        // TODO: Implement __destruct() method.
//        echo "<br>{$this->cname}被销毁";
    }
    public function ShowStudent()
    {
        echo "<br>学生姓名;".$this->cname;
        echo "<br>学生性别;".$this->csex;
        echo "<br>学生年龄;".$this->cage;
    }
    static function showInfo(){     // 静态方法不能调用非静态属性
        //  $this代表实例化对象，而这里是类，不知道 $this 代表哪个对象
        echo "<br>静态方法 显示常量学校名是".self::School;
//        echo "<br>".self::$selfObject;            错的
    }
}
$student = new Student('啊切','男',18);
$student->ShowStudent();

$student = new Student('小明','男',19);
$student->ShowStudent();

$student = new Student('小红','女');
$student->ShowStudent();
Student::showInfo();        // 对象可以访问静态方法 $student->showInfo();

echo "<hr>继承";
echo "<hr>";
/*
 * 继承--派生
 * 单继承
 * 多继承->从多个类继承特性
 * 扩展->子类在继承父类基础，定义新特性
 *parent 代表父类，不是父类这个对象
 * parent::     // 属性，方法(一般静态);可能是实例属性和实例方法
 * */
class HighStudent extends Student{
    public $sports = '足球';
    protected $desk = '桌子';
    private $room = '卧室';

    function showFacility(){
        // 内部访问三种修饰符成员
        echo "<br>{$this->sports}";
        echo "<br>{$this->desk}";
        echo "<br>{$this->room}";
        echo "<br>{$this->ball}";       // 调用父类属性
//        echo "<br> {$this->selfObject}";        // 错误，不能访问父类私有属性
        echo "<br>调用父类实例方法".parent::ShowStudent();  //调用父类实例方法(调用者是个对象)

    }
    static function showParent(){
        /*静态方法中调用父类的静态属性*/
        echo "<br>这里是父类属性：p1：".parent::$p1;
        echo "<br>这里是父类属性：p2：".parent::$p2;  //也可以用Student::
    }
}
$HengZhong  = new HighStudent('小强');
$HengZhong->ShowStudent();      //继承静态方法
echo "<br>静态属性学生总数是".HighStudent::$TotalStudent;
echo "<br>常量年份是".HighStudent::aYear;
HighStudent::showInfo();        //继承静态方法
$HengZhong->showFacility();     // 实例方法
$HengZhong::showParent();       //静态方法


/*
 * 访问控制修饰符
 *public :所有
 * protected: 只能在该类内部和该类子类或者父类内部访问 (外部不能访问)
 * private:私有的，只有在该类内部访问
 *
 * parent::属性方法
 * self::静态属性或方法
 * $this->实例属性或方法
 * 肯定在一个方法中
 * */

echo "<hr>";


/*
 * 如果类本身有构造方法，实例化类时候不会调用父类构造方法
 *析构方法
 *
 * */
class KinderGarten extends Student{
    public $edu = "大学";
    public $major;
    function __construct($name = 'aqie', $sex = '男', $age = 18,$edu,$major)
    {
        parent::__construct($name, $sex, $age);
        $this->edu = $edu;
        $this->major = $major;
    }
    function __destruct()
    {
        parent::__destruct(); // TODO: Change the autogenerated stub
    }
    public function ShowStudent()
    {
        echo "<br>学生姓名;".$this->cname;
        echo "<br>学生性别;".$this->csex;
        echo "<br>学生年龄;".$this->cage;
        echo "<br>教育程度:".$this->edu;
        echo "<br>主修专业:".$this->major;
    }
}
$obj = new KinderGarten('啊切','男','18','大学','php');
$obj->ShowStudent();
echo "<hr>";


/*覆盖(重写) 将父类继承过来属性方法重新定义
 *父类私有方法不能被覆盖，但子类不能定义同名,
 * */
class Animal
{
    public $eat = '进食';
    function Move()
    {
        echo "<br>能够移动";
    }
}
class fish extends Animal
{
    public $eat = "在水中进食";      // 覆盖父类同名属性
   function Move()                  //覆盖父类方法
   {
       echo "<br>我会在水中移动";
   }
}
class Bird extends Animal
{
    public $eat = "在空中进食";
    public $skin = "布满羽毛";
    function Move()                 //继承修改父类方法
    {
        parent::Move(); // TODO: Change the autogenerated stub
        echo "<br>在空中飞行";
    }
}
$dove = new Bird();
$dove->Move();



/*
 *
 *
 * */
class CateData{
    public $data = array();
    public function __construct($data)
    {
        $this->data = $data;
    }
}
$data = array(
    "a" => "分类一",
    "b" => "分类二",
    "c" => "分类三",
);
$cate = new CateData($data);
//var_dump($cate);
//foreach($cate as $key => $value){
//    echo $key."=>".$value;
//}

/*
 * 最终类（该类不允许被继承）
 *
 * */
final class aqie{

}
/*最终方法(不允许覆盖)
 *
 * */
class aqie1{
    final function aqie($a){

    }
}

echo "<hr>";
/*
 * 设计模式
 * 1.工厂模式
 * 设计一个工厂类，有一个静态方法
 * //通过该方法获得指定类对象
 *
 *
 * */
class A{}
class B{}
class Factory{
    static function GetObject($className){
        $obj = new $className();    // 可变类
        return $obj;
    }
}
$o1 = Factory::GetObject("A");
$o2 = Factory::GetObject("B");
$o3 = Factory::GetObject("A");
var_dump($o1);echo "<br>";
var_dump($o2);echo "<br>";
var_dump($o3);echo "<br>";

/*
 *单例模式（就是一个对象）
 *设计一个类，只能创造出一个对象
 * */
class Single
{
    private function __construct()      //私有化构造方法
    {
    }
    static private $instance = null;            //isset 判断null返回空
    static function GetObject()
    {
        // 控制好对象数量
        if(!isset(self::$instance)){       //没有生产就生产一个，存储并返回
            $obj = new self();      //生产一个
            self::$instance = $obj;     //存储
            return self::$instance;     //返回
        }else{      //直接返回
            return self::$instance;     //返回
        }

    }
}
//$obj = new Single();      这个new不出来
$obj = Single::GetObject();
var_dump($obj);echo "<br>";

/*
 * 抽象类（不能实例化类）
 * abstract class aqie{}
 *
 * 实例方法+抽象方法(只有方法头，什么都不做)
 *
 * */
abstract class Guai
{
    protected $blood = 100;
    protected function Attach()
    {
        echo "<br>攻击主人公";
    }
    abstract function  Eat();
}
//蛇怪
class Snack extends Guai
{
    public $blood;
    protected function Attach()
    {
        echo "<br>悄悄靠近并攻击主人公";
        $this->blood--;
    }
    function Eat()
    {

    }
}
//虎怪
class Tiger extends Guai
{
    public $blood;
    protected function Attach()
    {
        echo "<br>猛烈攻击主人公";
        $this->blood--;
    }
    function Eat()
    {

    }
}
echo "<hr>";
echo "魔术方法";
echo "<hr>";
/*
 * 重载技术()overloading
 *  通常面向对象：在类中有多个同名但形参不同方法,
 *  php:一个对象使用其未定义属性或方法，其中处理机制
 *
 *
 * 属性重载(取值(__GET())，赋值(__SET())，判断(__isset())，销毁(__unset()))
 *
 *
 * 方法重载
 * 调用不存在实例方法时，自动调用__call();
 * 调用不存在静态方法时，自动调用__callstatic();
 * */

class Abc
{
    public $p = 1;
    function __get($name)
    {
        // TODO: Implement __get() method.
        // echo "<br>你用的方法或属性{$name}还未定义";
        // return "";
        // trigger_error("发生错误",E_USER_ERROR);
        // die();
        if(isset($this->prop_list[$name])){
            return $this->prop_list[$name];
        }else{
            return "该属性不存在";
        }

    }
    // 用来存储不存在属性
    protected $prop_list = array();
    function __set($name, $value)       // 配合__get()添加属性
    {
        // TODO: Implement __set() method.
        $this->prop_list[$name] = $value;
    }

    function __isset($name)
    {
        // TODO: Implement __isset() method.
        $v = isset($this->prop_list[$name]);
        return $v;
    }
    function __unset($name)
    {
        // TODO: Implement __unset() method.
        unset($this->prop_list[$name]);         // 销毁属性列表某个单元
    }
}
$obj = new Abc();
//$obj->p1;
$obj->p2 = 3;
echo "<br>不存在属性：obj->p1:".$obj->p1;
echo "<br>不存在属性：obj->p1:".$obj->p2;
echo "<br>";
// 判断不存在属性
$v1 = isset($obj->p2);      // 存在
$v2 = isset($obj->pppp);    //不存在
$v3 = isset($obj->p);       // 这个根本没用到上面方法
var_dump($v1);
var_dump($v2);
var_dump($v3);
echo "<br>";
unset($obj->p2);
echo "<br>销毁一个不存在属性：obj->p1:".$obj->p2;

echo "<hr>";
class Bb{
    function __call($name, $arguments)      // (方法名,实参数据是数组)
    {
        // TODO: Implement __call() method.
        echo "__call()被调用了";
    }
}
$obj =new Bb();
$obj->f1();

/*
 * 使用php重载实现通常的重载(php本身不支持重名方法)
 *传入一个参数，就返回本身，两个参数就求其平方和，三个参数求其立方,其他报错
 * */
class Reload{
    function __call($name, $arguments)       //调用不存在方法
    {
        if($name === 'f1'){
            $len = count($arguments);
            if($len < 1 || $len >3){
                trigger_error("传参数量错误",E_USER_ERROR);
            }elseif ($len===1){
                return $arguments[0];
            }elseif ($len ===2){
                return $arguments[0]*$arguments[0]+$arguments[1]*$arguments[1];
            }else{
                $v1 = $arguments[0];
                $v2 = $arguments[1];
                $v3 = $arguments[2];
                return $v1*$v1*$v1+$v2*$v2*$v2+$v3*$v3*$v3;
            }
        }
    }
}
$obj = new Reload();
echo $obj->f1(1);
echo $obj->f1(1,2);
echo $obj->f1(1,2,3);

/*

在类里面的时候，$this->func()和self::func()没什么区别。
在外部的时候，->必须是实例化后的对象使用； 而::可以是未实例化的类名直接调用。
举个例子:
class Mytest{
    function ccc($str){
        echo $str;
    }
}
Mytest::ccc("123456");
$object = new Mytest();
$object->ccc("123456");

*/

/*
1.子类内部访问父类静态成员属性或方法，使用 parent::method()/self::method() 
注意：$this->staticProperty(父类的静态属性不可以通过$this(子类实例)来访问，会有这样报错:PHP Strict Standards: Accessing static property Person::$country as non static in，PHP Notice: Undefined property: ) 
2.子类外部 
1.子类名::method() 
2.子类实例->method() (静态方法也可以通过普通对象的方式访问) 
注意：子类实例->staticProperty(父类的静态属性不可以通过子类实例来访问，会有这样报错:PHP Strict Standards: Accessing static property Person::$country as non static in，PHP Notice: Undefined property: )
*/