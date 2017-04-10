<?php
/*数据控制语言
 *
 * 权限管理
 *
 *事务模式
 *流程控制
 * 存储过程
 *
 * */
//判断2015 7/27星期几
$time =  time();        //获取当前日期
echo date('Y-m-d',$time)."是".date('l',$time)."</br>";
echo date('Y-m-d',$time)."是一年中的第".date('z',$time)."天<br/>";
echo date('w')."</br>";
echo "2015 7/27 是周".date("w",strtotime("2013-01-14"))."</br>";


/*
 * 创建用户
 * create user 'aqie'@'localhost' identified by '123456';
 * 删除用户
 * drop user 'aqie'@'localhost';
 * 修改密码
 * set password = '密码' ;
 * set password for 'aqie'@'localhost' = password('123');
 * 权限管理
 * select
 * update 修改
 * delete
 *
 * 授予权限
 * 形式：
grant  权限列表  on  某库．某个对象  to  ‘用户名’@’允许登录的位置’  【identified  by  ‘密码’】；
grant select on product.* to 'aqie'@'localhost'; (identified  by '密码')
grant insert on product.* to 'aqie'@'localhost';
grant create on product.* to 'aqie'@'localhost';

说明：
1，权限列表，就是，多个权限的名词，相互之间用逗号分开，比如:  select,  insert,  update
也可以写：all
2，某库．某个对象，表示，给指定的某个数据库中的某个“下级单位”赋权；
下级单位有：表名，视图名，存储过程名；  存储函数名；
其中，有2个特殊的语法：
*.*：	代表所有数据库中的所有下级单位；
某库．*	：代表指定的该库中的所有下级单位；
3，【identified  by  ‘密码’】是可省略部分，如果不省略，就表示赋权的同时，也去修改它的密码；
但：如果该用户不存在，此时其实就是创建一个新用户；并此时就必须设置其密码了

 *
 * 剥夺权限
 * 形式：
revoke  权限列表  on  某库．某个对象  from  ‘用户名’@’允许登录的位置’
其含义，跟grant中完全一样；

 *
 * 事务
 *
•	原子性：一个事务中的所有语句，应该做到：要么全做，要么一个都不做；
•	一致性：让数据保持逻辑上的“合理性”，比如：一个商品出库时，既要让商品库中的该商品数量减1，又要让对应用户的购物车中的该商品加1；
•	隔离性：如果多个事务同时并发执行，但每个事务就像各自独立执行一样。
•	持久性：一个事务执行成功，则对数据来说应该是一个明确的硬盘数据更改（而不仅仅是内存中的变化）。

 *自动提交模式改为人为提交模式
 * set autocommit = 0;
 * 事务处理
 * start transaction;
 * if(){
 *  commit;
 * }else{
 *  rollback;
 * }
 *
 * */

include './common/conn2.php';
mysqli_select_db($link,"product");
$sql = "start transaction;";
mysqli_query($link,$sql);

$sql = "insert into join1(f1,f2) values(1,1);";     //执行第一条语句
$result = mysqli_query($link,$sql);
$sql2 = "insert into join1(f1,f2) values(2,2664);";     //执行第二条语句
$result2 = mysqli_query($link,$sql2);
if ($result && $result2){
    mysqli_query($link,"commit;");
    echo "所有任务执行成功";
} else {
    mysqli_query($link,"rollback;");
    echo "执行失败，数据没有修改";
}

/*mysql编程
 * 语句块包含符 begin  end;       相当于其他语言大括号
 * if()
      A:begin
      //todo
      //退出A包含语句块
      end A;
    end if;
 *
 * case @v1
 *  when 1 then
 * begin
 * //....
 * end;
 * else
 * begin
 * //....
 * end;
 * end case;
 *
 * case
 *    when @v1>0 then
 *      begin
 *       //.....
 *      end;
 * end case;
 *
 * loop语句
 *
 * 标识符:loop
 * begin
 *  //....
 * //必须有退出循环逻辑机制。
 *   if()then
 *      leave 标识符      //退出
 *   end if;
 * end;
 * end loop 标识符;
 *
 *
 * while语句
 * set @v1 = 1;     //赋值语句
 * while @v1<10 do
 * /...直到条件为假退出
 * begin
 *      insert into tab (id,num) values(null,@v1);
 *      set @v1 = @v1+1;
 * end;
 * end while;
 *
 * repeat语句                     //类似do while，但是直到条件为真才结束
 * set @v1 = 1;
 * 标识符：repeat
 * /....
 * begin
 *      insert into tab (id,num) values(null,@v1);
 *      set @v1 = @v1+1;
 * end;
 * until @v1>=10;        // v1=10退出循环
 * end repeat 标识符;
 *
 * leave 语句
 * 退出标识符
 *
 *
 * */

//if(3>1){
//    echo "a";
//}else{
//    echo "aaa";
//}
//
//if(2){
//    echo "aaa";
//}

/*mysql变量
 *普通变量
 * declare 变量名 类型名 [default 默认值]；// 必须先定义
 * set value = 23;
 * 只能在编程环境中使用：
 * 1.定义函数内部；
 * 2.定义存储过程内部；
 * 3.定义触发器内部
 *
 * 会话变量带@
 * set @v1 =1;
 * 可以在cmd里直接运行
 *select @v2 := 2;
 * select 3 into @v3;
 *
 * select @v1,@v2;
 *
 */

/*
 * mysql函数
 * (更换语句结束符  delimiter /)
 * 这里函数必须返回数据
 * 调用 select now(),8+3 as f2,func();
 *      set @v3 = func2();
 * 取得三个数最大值
    create function getMaxValue(p1 float,p2 float,p3 float)
    returns float
    begin
        declare result float;      -- 声明变量，没默认值
        if(p1>=p1 and p1>=p2) then
        begin
            set result = p1;
        end;
        elseif(p3>=p1 and p3>=p2) then
        begin
            set result = p3;
        end;
        else
        begin
            set result = p2;
        end;
        end if;
        return result;
    end;
 *
 * select now(), getMaxValue(1.1,3.33,3.3333);
 * 注意事项：
1， 在函数内容，可以有各种变量和流程控制的使用；
2， 在函数内部，也可以有各种增删改语句；
3， 在函数内部，不可以有select或其他“返回结果集”的查询类语句；

 *
 * drop function getMaxValue;       // 删除函数
 *
 * **/



/*存储过程 database(test_db)
存储过程，其本质还是函数——但其规定：不能有返回值；
说明：
1，in：用于设定该变量是用来“接收实参数据”的，即“传入”；默认不写，就是in
2，out：用于设定该变量是用来“存储存储过程中的数据”的，即“传出”，即函数中必须对他赋值；
3，inout：是in和out的结合，具有双向作用；
4，对于，out和inout设定，对应的实参，就“必须”是一个变量，因为该变量是用于“接收传出数据”；

 *
 * 创建存储过程，将三个数据写入tab
 * 并返回该表最新的第一个字段的前三大值的行
 *
 *
    create procedure insert_get_Data(p1 int,p2 tinyint,p3 bigint)
    begin
        insert into tab(f1,f2,f3) values(p1,p2,p3);
        select* from tab order by f1 desc limit 0,3;
    end;
 *
 *
 * 调用(非编程环境调用)
 * call insert_get_Data(1,2,3)
 *
 * #创存储过程使用in，out，inout(out inout对应实参必须是变量)
 * create procedure pro1(in p1 int,out p2 tinyint,inout p3 bigint)
    begin
        set p2= p1*2;
        set p3 = p3+p1*3;           # 3+3
        insert into tab(f1,f2,f3) values(p1,p2,p3);
    end;
 *set @s3 = 3;
 * call pro1(1,@s2,@s3)
 * select @s2,@s3
 *
 * 删除存储过程  drop procedure pro1
 * */


/*
 *php中使用存储函数和存储过程
 *
 *
 */
//调用存储函数
$v1 = $_POST['a'];
$v2 = $_POST['b'];
$sql = "insert into tab(fid,f1,f2) values(null,now(),func($v1,$v2))";
$result = mysqli_query($link,$sql);

//调用存储过程
$v1 = $_POST['username'];
$v2 = $_POST['password'];
$v3 = $_POST['age'];
$sql = "call insert_user($v1,$v2,$v3)";
$result = mysqli_query($link,$sql);

//另一个存储过程返回结果集
$id = $_GET['id'];
$sql = "call Get_User_Info($id)";  //Get_User_Info是存储过程，返回指定用户id信息
$result = mysqli_query($link,$sql);           //得到的是结果集


/*
 * 触发器(trigger)
 * 触发器，也是一段预先定义好的编程代码（跟存储过程和存储函数一样），并有个名字。
但：
它不能调用，而是，在某个表发生某个事件（增，删，改）的时候，会自动“触发”而调用起来

 *说明：
1，触发时机，只有2个：  before（在....之前），  after（在....之后）；
2，触发事件，只有3个：insert，  update，  delete
3，即其含义是：在某个表上进行insert(或update,或delete)之前（或之后），会去执行其中写好的代码（语句）；即每个表只有6个情形会可能调用该触发器
4，通常，触发器用于在对某个表进行增删改操作的时候，需要同时去做另外一件事情的情形；
5，在触发器的内部，有2个关键字代表某种特定的含义，可以用于获取有关数据：


 *
 *create trigger 触发器名 触发时机 触发事件 on 表名 for each row as
    begin
        //....
    end;
 *
 *
 * #在tab插入数据时，同时将这表中第一字段最大值行写入另一个表中tab_max(永远只存储一行)
 *create table tab_max like tab;
 *
 * create trigger tri1 after insert on tab for each row
  begin
     #删除表中原有数据
    delete from tab_max;
    #tab中f1最大字段存入变量@maxf1
    select max(f1) into @maxf1 from tab;
    #取出这行所有数据
    select f2 into @v2 from tab where f1 = @maxf1;
    select f3 into @v3 from tab where f1 = @maxf1;
    #将数据插入到tab_max
    insert into tab_max(f1,f2,f3) values(@maxf1,@v2,@v3);
  end;
 *
 * create table tab_some(
        id int(11) default null,
        age tinyint(4) default null
   );
 *
 *
 * 再建一个触发器，在tab进行insert前，将数据插入到类似结果表中（tab_some）
 * create trigger copy_data before insert on tab for each row
    begin
        set @v1 = new.f1;       #获得新行字段f1值
        set @v2 = new.f2;       #获得新行字段f2的值
        insert into tab_some(id,age) values(@v1,@v2);
    end;


 * */

/*三表联查
 * database (product->stu,kecheng,stu_kecheng)
 * 1.所有选修mysql同学
 * select name from stu where id in(
        select stu_id from stu_kecheng where kecheng_id =(
             select id from kecheng where kecheng_name = 'Mysql'
        )
    );
 *select name from stu
    inner join stu_kecheng as sk on sk.stu_id = stu.id
    inner join kecheng as kc on kc.id = sk.kecheng_id
    where kecheng_name = 'mysql';


 * 2.查询张三选修课程
    select kecheng_name from stu
    inner join stu_kecheng as sk on sk.stu_id = stu.id
    inner join kecheng as kc on kc.id = sk.kecheng_id
    where name = '张三';
 *
 * select kecheng_name from kecheng where id in(    # 课程id和张三是多对一
      select kecheng_id from stu_kecheng where stu_id = (
        select id from stu where name = '张三'
      )
   );
 *
 *3.查询只选修一门课程学生学号和姓名
 *select id,name from stu where id in(      #分组
    select stu_id from stu_kecheng group by stu_id having count(*)=1
  );

 *4.查询选修了至少三门课程学生信息
 select * from stu where id in(      #分组
    select stu_id from stu_kecheng group by stu_id having count(*)>=3
  );
 *
 * 5.查询选修了所有课程学生
select * from stu where id in(      #分组
    select stu_id from stu_kecheng group by stu_id having count(*)=(
        select count(*) from kecheng
    )
  );
 *
 * 6.查询选修了课程的总人数
 * #以学生stu_id为条件分组，找出所有学生id
 * select stu_id from stu_kecheng group by stu_id;
 *select count(*) from (select stu_id from stu_kecheng group by stu_id)as t;        #这里必须加as(分组)
 * 7.查询每个学生选修了几门课.
 *
 * 8.查询所学课程至少有一门和张三所学课程相同的学生信息
 * select * from stu  where id in(                          #查询学生信息
       select stu_id from stu_kecheng where kecheng_id in(  ##课程id至少有一门和张三一样（1,2）
             select kecheng_id from stu_kecheng where stu_id = (
                select id as stu_id from stu where name = '张三'
             )
        )
    );
 *
 * 9查询两门及以上不及格同学课程平均分
 * 找出所有不及格分数信息
 *select stu_id from stu_kecheng where score <60;
 * 对不及格结果数据进行分组，并取得大于等于2的组
 *
 *          #以学生id分组有两门不及格
 *  select stu_id,avg(score) as 平均分 from stu_kecheng where stu_id in (
              select stu_id from stu_kecheng where score <60
           group by stu_id having count(*)>=2
    )
    group by stu_id;
 * */

/*
 *
 *  delimiter /
 * 存储过程做和表相关  database(test_db)
 * 存储函数做一些计算数据处理
 *1.存储过程，带三个参数，调用存储过程，将三个参数写入数据库
    create procedure addpro(p1 int,p2 tinyint,p3 int)
    begin
        insert into tab(f1,f2,f3)values(p1,p2,p3);
    end;
    call addpro(333,44,555)
    drop procedure addpro
 *
 * 1.1  函数
 * create function addfun(p1 int,p2 tinyint,p3 int)
    returns int
    begin
        insert into tab(f1,f2,f3)values(p1,p2,p3);
        return 1;
    end;
    select @v1 := addfun(3333,44,5)         #会话变量赋值
    或者 select addfun(3333,44,5)  as 字段
 *
 *
 * 2.带两个int参数，计算他们平方和开方值
 *
 *
 * 2.2
 *
 * 3.带三个int参数，求出他们最大值
 *
 *
 * 3.3
 *
 * 4,创建触发器，删除数据时，可以在另一个表中删除数据

 *
 * */

