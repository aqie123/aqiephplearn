<?php
/**
 * $pdo = new PDO();
 * $sql = "select * from"
 *$result = $pdo->query($sql);      // 返回pdo结果集;失败返回false
 *
 *$sql = "delete/update/insert"
 * $result = $pdo->exec($sql);      //返回真假值
 *
 * $pdo->lastInsertId();        //最后添加ID值
 * $pdo->beginTransaction();
 * $pdo->commit();              //提交事务
 * $pdo->rollBack();             //回滚事务
 * $pdo->inTransaction();       //判断当前行是否在事务(true/false)
 * $pdo->setAttribute(属性名,属性值);     //设置对象属性名
 *
 * 错误信息
 * $pdo->errorCode();
 * $pdo->errorInfo();
 *
 * 异常模式
 * 适应面向对象处理错误语法结构
 * try{
 *  出错终止当前范围程序执行，跳转到catch部分
 * }
 * catch(Exception $e){
 *  发生错误，生成类Exceptiond的错误对象$e
 * }
 */
$dsn = "mysql:host=localhost;port=3306;dbname=product";
$opt= array(PDO::MYSQL_ATTR_INIT_COMMAND=>'set names utf8');        // 类常量
$pdo = new pdo($dsn,"root","root",$opt);
//var_dump($pdo);       pdo对象
/*
$sql = "select3 * from stu";
$res = $pdo->exec($sql);
if($res ===false){
    echo "<p>发生错误". $pdo->errorCode();
    $e = $pdo->errorInfo();        //这是个数组，第三项才是错误信息
    echo "<p>错误信息".$e[2];
}else{
    echo "查询成功<br>";
}
//pdo对象进入异常模式，
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
try{
    $sql = "select3 * from user_list";
    $res = $pdo->exec($sql);
    echo "<br>执行成功";
}catch(Exception $e){
    echo "<p>发生错误". $e->GetCode();
    echo "<p>错误信息".$e->getMessage();
}
//*/

/**
 * PDOStatement(PDO结果集对象)
 * pdo对象执行sql语句成功时返回的就是.
 *
 *$res = $pdo->query("select * from");      // 结果集
 * $res ->rowCount();                       //获得结果集行数
 * $res -> columnCount();                   //获得结果集列数
 * $res ->fetch([返回类型]);                //从结果集取出一行数据 （一维数组）
 *
 * PDO::FETCH_ASSOC  (关联数组)
 * PDO::FETCH_NUM   (索引数组)
 * PDO::FETCH_BOTH  (默认值两者皆有)
 * PDO::FETCH_OBJ   (对象)
 *
 * $res ->fetchAll([返回类型]);             // 一次性获取结果集中所有数据（二维数组）
 * $res ->fetchColumn([$i]);                // 获取结果集下一行数据中第i个数据值，一个数据
 * $res->fetchObject();                     //结果集返回对象
 *$res->errorCode();                       //pdo结果集的错误代号
 * $res->errorInfo();                       //pdo结果集的错误信息
 * $res->closeCursor();                     //关闭结果集
 *
 */
$sql = "select * from faculty";
$res = $pdo->query($sql);
$count = $res ->rowCount();
echo $count;

$arr = $res->fetch();       // 相当于fetch(PDO::FETCH_BOTH );
$arr2 = $res->fetch(PDO::FETCH_ASSOC );     //关联
$arr3 = $res->fetch(PDO::FETCH_NUM);        //索引

echo "<pre>";print_r($arr);echo "</pre>";
echo "<pre>";print_r($arr2);echo "</pre>";
echo "<pre>";print_r($arr3);echo "</pre>";


/**
 *pdo中预处理语法
 * （重复执行多条类似sql语句,对sql语句预处理）
 *
 *1.$res = $pdo->prepare($sql);
2.  对未赋值数据赋值
$res->bindValue(数据项,值);
$res->bindValue(数据项2,值2);
3.  方式一：$res->execute();          //语句执行
 * 方式二： $res->excute(array(":val"=>值,":val2"=>值2));
 * 方式三： $res->excute(array(值1,值2));     //对应占位符
 *
 */
// 形式一
$sql = "select * from user_list where user_id=? and user_name=?";
$res = $pdo->prepare($sql);
$res->bindValue(1,16);           // 占位符按自然顺序，从1开始
$res->bindValue(2,'aqie');
$res->execute();

$arr = $res->fetch(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($arr);
echo "</pre>";
echo $arr['edu'];           // 查询一条语句，并拿到数据


//形式二
echo "<hr>";
$sql = "select * from user_list where user_id= :v1 and user_name= :v2";
$res = $pdo->prepare($sql);
$res->bindValue(":v1",16);           // 占位符按自然顺序，从1开始
$res->bindValue(":v2",'aqie');
$res->execute();

$arr = $res->fetch(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($arr);
echo "</pre>";


