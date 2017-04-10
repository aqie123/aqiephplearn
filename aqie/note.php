<?php 
//  流程控制循环中断:
//  break:完全终止循环，
//  continue:停止当前正在进行当次循环，进入下一次循环
echo "我是note";
//require失败是致命错误 ，终止程序
// 值传递实参变量，即使函数内部对应形参变化也不会变化，
// 引用传递实参变量会变化
// 形式参数 parameter
// 实参 argument
?>
<?php

echo "<br>";

//匿名函数调用
//1，赋值给变量
//2，匿名函数当实参

//超全局变量
//$_GET;$_POST;$_REQUEST;$_SERVER;$GLOBALS;$_SESSION;$_COOKIE;$_FILES;
//局部作用域
//局部变量，函数调用执行后就被销毁(静态变量不会被销毁)

// $GLOBALS进行unset，会完全销毁该变量


// 函数实参三个系统函数
//func_getargs();返回所有实参(结果是数组)
//func_get_arg($i);返回第i个实参(从0开始)
//func_num_args();返回实参个数

//function_exists();     // 判断函数是否被定义
//系统函数
/* 输出格式化： echo ptint printd,print_r,var_dump
 * 字符串取出填充: trim ltrim rtrim str_pad
 * 字符串连接分割 implode join explode str_split
 * 字符串截取： substr strchr strrchr
 * 字符串替换: str_replace substr_replace
 * 字符串长度与位置 strlen strpos strrpos
 * 字符转换： strolower,strtoupper,lcfirst,ucfirst,ucwords
 * 特殊字符处理: nl2br addslashes htmlspecialchars htmlspecialchars_decode
 * 时间函数：time microtima mktime data idate strtotime date_add date_diff date_default_timezone_set date_default_timezone_get
 * 数学函数： max min round ceil floor abs sqrt pow round rand
 *
 * 数组函数
 * 指针操作函数 current key next prev reset end each
 * 单元操作函数 array_pop array_push array_shift array_unshift array_slice array_splice
 *排序函数 sort asort ksort usort rsort krsort shuffle
 *查找函数 in_array array_key_exits array_search
 * 其他函数 count array_reverse array_merge array_sum array_keys
 * array_values array_map array_walk range
 *
 * */

// php数组不能单独使用for循环遍历数组(只能循环下标连续纯整数数组)

/*
 * foreach
 * 1.遍历过程默认是（值）传递
 * 2.遍历过程值变量使用（引用）传递方式
 * 3.默认是原数组遍历
 * 4.如果是值变量引用传递，则都是在原数组上遍历
 * 5.遍历过程对数组进行修改或指针操作，会在复制之前数组，在之前数组继续遍历(原数组不变)
 * */



/*MYSQL(基础)
    原来自动增长列用int数据类型,不用varchar.
 *net start mysql;
 *net start mysql;
 *
 * set names gbk;       // 在cmd窗口编码
 * 数据库备份和恢复
 * mysqldump -h服务器名 -uroot -proot  数据库名>文件名     // 备份**********
 * mysqldump -uroot -proot imooc_singcms > /tmp/singcms.sql
 *
 * mysql -h服务器名 -uroot -proot  数据库名<文件名         //恢复************
 * mysql -uroot -proot [product]<F:\www\php\aqie\ER\product\product.sql
 * mysql>source d:/dbname.sql
 *
 * 注释(三种)
 * #
 * -- 注释内容
 * 多行注释
 *
 * delimiter //      自定义结束符
 *
 * 本身不区分大小写
 *
 *collate 排序 (所有英文字符比较，都是单个字符比较)
 * 中文排序
 * show charset;        显示所有排序规则
 *
 * 数据类型
 * 数值型
 * -整数型   (长度)(unsigned)(zerofill是否填充0到左边,自动表示是unsigned)
 * tinyint
 * smallint
 * mediumint
 * int      **
 * bigint
 *
 * -小数型
 * --浮点
 * float
 * Double
 *
 * --定点型
 * decimal
 * 字符型
 * set          //多选项数据(64)checkbox  1 2 3 4 5
 * enum         // 单选项(65535)radio      1 2 4 8   或者用tinyint
 * text         // (65535)
 * varchar  **  //可变长度字符串(65535)
 * char         //定长,默认是1个(255)
 * binary       //存储二进制
 * blob         // 二进制 适用于图片
 *
 * 时间型
 * year         //年份类型
 * timestamp    //时间戳类型  得到整数数字
 * time
 * date         //日期类型
 * datetime  **时间日期类型
 *
 * 基本命令
 * status               //查看数据库状态
 * select database();       // 查看当前数据库
 * create database aqie;
 * drop database if exists aqie;
 * show create database aqie;
 * use aqie;
 * create table shop;                   // 创建表
 * insert into shop(name,pwd,email) values(aqie,123,2@qq.com);      // 插入数据
 * select * from shop;   \g  \G               //显示表中数据
 * drop table shop;                     //删除表
 * truncate table shop;                 // 清空表中数据
 * show tables;
 * alter table shop rename shop1;       // 修改表名
 * alter table shop1 modify column name varchar(40);        // 修改行
 * desc shop1;
 * alter table shop1 change names username varchar(34);      // 修改行字段名     字段是names改为username
 * alter table join1 change id fid int(20) primary key auto_increment;
 * alter table shop1 add email varchar(30);         // 添加行
 * alter table  shop1 drop email;                   //删除行
 * alter table shop add key/unique key/primary key(user_name);    //添加索引 唯一约束
 * show create table shop1;
 *
 * ##一些常识
 * show variables like 'char%';     //查看数据库编码
 * show create table <表名>;      //查看表编码
 * create database <数据库名> character set utf8;       //创建数据库指定编码
 * alter database <数据库名> character set utf8;        //修改数据库编码
 * alter table <表名> character set utf8;         //修改表编码
 * alter table <表名> add constraint <外键名> foreign key<字段名> REFERENCES <外表表名><字段名>;
 * //添加外键
 * alter table <表名> drop foreign key <外键名>;     //删除外键
 *
 * select unix_timestamp();     //Unix时间戳
 * select now();
 *
 *
 * $result = mysqli_query($link,select/ delete/ update/  insert/ desc/  show tables)
 *
 * mysqli_fetch_assoc();
 * mysqli_fetch_row();      // 很少
 * mysqli_fetch_array($result);
 *
 * */

/* mysql 索引
*普通索引 ：key
 * 唯一索引 ： unique key +字段名
 * 主键索引 primary key
 * 全文索引 fulltext
 * 外建索引： foreign key +字段名+ references 外键表(对应其它表中字段)
*
 *
 * 约束
 * 检查约束
 *
 * 表选项列表
 * charset
 * engine
 * auto_increment
 * comment = '说明文字'
 *
 *
 * 视图
 * 给一个select语句一个名字，以后调用
 * 创建视图
 *create view v1 as select id,name,pwd email  from shop where id >7 and id<90 or age>10;
 * create view v2 as select age from student where  age<30;
 *删除视图
 * drop view v1;
 *
 *
 * 数据库设计范式
 *1.原子性(不可再分)
 *
 * 2.唯一性(消除部分依赖) --给表设计主键(逐渐决定其他字段，其他字段依赖主键)
 * 主键有多个,产生部分依赖
 * 经验(每张表设计自增长主键)
 *
 * 3.独立性(消除依赖传递)  即一张表只记录一种数据
 *使每个字段独立依赖主键字段，消除部分非主键的内部依赖，这种内部依赖构成传递依赖
 *
 *
 *
 * 数据库操作语言(auto_increment,timestamp可以不用插入)
 * 一：插入数据
 * 1.insert into shop values(1,'aa');   //可以插入多行
 * 2.replace 插入主键或者唯一键有重复，变成修改
 * replace into shop values(1,'bb');
 *
 * 3.将select 查询数据结果，都插入到数据库
 * insert into shop select * from shop2;
 *
 * 4.insert into shop set 1=a,b=2,  //类似update  只能插入一条
 *
 * 5.load data(载入结构整齐纯文本数据)
 *load data infile "完整文件地址" into table shop;
 * load data infile "F:/www/php/aqie/datasource/student.txt" into table student;
 *
 * 二：删除数据
 * delete from shop wnere条件  order by排序  limit限定
 * delete from shop where id = '$id';
 *
 * 三：修改数据
 * update shop set 字段= value
 
    update cms_position set create_time=UNIX_TIMESTAMP(now());
 *
 *
 * 四：查询数据 database(product)
 * 1.基本查询(concat字符串连接)
 * select 3,4+5,concat('hello','world'),now();
 * select count(*) as count from product;       //数据总量
 * select avg(price) as avg from product where pinpai = '联想';
 *
 * 2.all(默认) 和 distinct 是否消除重复行，前者不消除
 * select distinct * from shop;
 *
 * 3.where
 *  =等于 <>不等于
 * 逻辑 and or not
 *select * from shop where id>=2 and id<=5;
 *
 * 4.空值和布尔值判断  is
 * xx is null;      //空值，没有值
 * xx is not null;
 * xx is true;
 * xx is false; // 0 ,0.0, "", null
 * select * from shop where on is true;
 *
 *5.between 和in运算符
 *select * from shop where id between 2 and 5;
 *
 * select * from shop where id in (1,3,5,7);
 *
 * 6.like 模糊查找
 * %    // 任何个数任何字符
 * _        // 一个任意字符
 * select * from product where pro_name like '%联想%';
 * select * from product where pinpai = '联想';         // 这两个相等
 * 转译 xx like '%\%%';       // 含有百分号
 * xx like '%/_%'
 *
 * 7.group by 分组
 *select * from product group by pinpai;        //这个数据没意义
 * select pinpai, count(*) as 数量 from product group by pinpai;      //每种品牌商品数量
 * select pinpai ,count(*) as 数量,max(price) as 最高价, min(price) as 最低价,
 * avg(price) as 平均价, sum(price) as 总价 from product group by pinpai;
 *
 * select chandi,count(*) as 数量 from product group by chandi;       // 查询每个产地有多少数量产品**
 *select chandi ,count(*) as 数量 from product group by pro_type;     // 按照产品种类查出商品数量
 *
 * 8.having
 * 和where相同，不过是对分组后数据筛选
 * select pinpai ,count(*) as 数量,max(price) as 最高价, min(price) as 最低价,
 * avg(price) as 平均价, sum(price) as 总价 from product group by pinpai
 *  having 平均价>5000;
 *
 * 找出品牌数量大于2的
 * select pinpai ,count(*) as 数量,max(price) as 最高价, min(price) as 最低价,
 * avg(price) as 平均价, sum(price) as 总价 from product group by pinpai
 * having 数量>2;
 *
 * select pinpai ,max(price) as 最高价, min(price) as 最低价,
 * avg(price) as 平均价, sum(price) as 总价 from product group by pinpai
 * having count(*)>2
 *
 * 9.order by
 * select * from product order by protype_id,price desc;    //按照产品id,价格倒序
 *
 * 10 limit
 * select * from product where price >3000 limit 2,2;       //从第二行开始取两行
 *select * from product order by price desc limit 0,1;      //找出价格最高
 *
 *
 *
 * 总结 from -> where->group by-> as->having->order by-> limit
 *
 *五：联表查询(连接查询效率更高)
 *
 * 连接查询： 将两个及以上表，连接起来，当做一个数据源
 *1.1 select * from join1,join2;        #没有条件连接 (交叉连接)(左边每一行和右边每一行对接)
 * 1.2 select * from join1 join join2;
 * 1.3(三种写法一样)select * from join1 cross join join2;
 *
 * 2.内连接
 * select * from product inner join product_type on 连接条件;
 *select * from product inner join product_type on product.protype_id = product_type.protype_id;
 * select * from product as p inner join product_type as t on p.protype_id = t.protype_id;
 * 正确写法
 * select p.*,t.protype_name from product as p inner join product_type as t on p.protype_id = t.protype_id;
 *
 * 3.左外连接 left(outer)join
 * 将两个表内连接,加上左边不符合内连接限制条件的结果
 * select * from product as p left join product_type as t on p.protype_id = t.protype_id;
 *
 * 4.右外连接 right(outer)join
 * 将两个表内连接,加上右边不符合内连接限制条件的结果
 *
 * 5.全外连接 left(outer)join
 * 不支持
 *
 *
 * 练习 product表
 * select p.protype_id,protype_name,count(*) as 数量 from product as p inner join product_type as t on p.protype_id = t.protype_id group by p.protype_id;
 * 更规范
 * select p.protype_id,protype_name,count(*) as 数量 from product as p inner join product_type as t on p.protype_id = t.protype_id group by p.protype_id ,protype_name;
 *
 * 练习 student faculty(学生，院系)
 * 进入cmd首先 set names gbk;
 *1.查出计算机系所有学生信息
 * select student.* from student inner join faculty on student.fid = faculty.fid
 * where fname = '计算机系';        -- student. 只查询学生信息
 *
 *
 * 六;子查询（一个位置出现查询语句）
 *
 * 子查询为主查询服务，子查询后才进行主查询
 * select pro_id ,price*0.9,5 as 送 from product;   //全场九折并送5块
 * select pro_id,price from product where price > 5000;     //价格高于5000
 * select pro_id,avg(price) as 平均价 from product;            //这个乱写的
 *
 * select pro_id,price from product where price > (select 5000);        \\子查询
 * select pro_id,price from product where price >
 * (select avg(price) from product); (标量子)               // 全部高于平均价商品
 *
 * 子查询分类：(按结果)
 * 1.表子查询       返回多行多列，可当做表使用,通常放在from后面
 * select * from (select 1) as t;       //必须加别名
 *
 * 2.行子查询       一行多列，当做行使用(少见)
 * 行比较语法：where roe(字段1，字段2)= (select 行子查询)
 *
 * 3.列子查询       多行一列，当做多值使用
 *
 * 4.标量子查询      一行一列，当做单个值使用
 * (单个数据值可以用标量子代替)
 *
 *
 * 子查询（按位置）
 * 1.结果数据
 * select pro_id,price,(select 5) as 折扣 from product;
 *
 * 2.条件数据
 * 3.来源数据
 *
 * 常见子查询
 * 1.比较运算符中子查询
 * 操作数 比较运算符 （标量子查询）
 * 操作数 ：比较运算符两个数据之一，通常是一个字段名
 *   select * from product where price=(select max(price) from product);                              //找出最高价商品(几个同价)
 *
 * 2.使用 in的子查询
 * 操作数 in (列子查询)
 * //找出产品类别名中带电字的
 * select protype_id from product_type where protype_name like '%电%';
 * // 先找出product_type中带电的protype_id.将结果作为 in的数据项
 * select * from product where protype_id in (
    select protype_id from product_type where protype_name like '%电%'
  );
 *
 * //查询产品类名为家用电器商品 (inner join)
 *select * from product as p inner join product_type as t on p.protype_id = t.protype_id where
 * protype_name = "家用电器";
 *
 * 3.使用any(some)子查询 （标量子查询）
 *某个操作数对于该列子查询任意一值满足比较运算符，就算满足条件
 *  // 取出product表中比student表中sid大的数据   (只要比后面表任意一个数据大就满足了)
 *select * from product where pro_id > any (select sid from student);
 *
 * 4.all的子查询
 * 必须必所有的sid都大才满足
 * select * from product where pro_id > all (select sid from student);
 *
 * 查询所有非最高价的商品()
// * select * from product where price< (select max(price) from product);
 *最高价商品最少会小于所有价格中的一个
 * select * from product where price < any (select price from product);
 *
 * 查询最高价商品(大于等于所有价格)
 * select * from product where price >=all (select price from product);
 *
 * 5.exists查询(隐式查询和主查询建立关系)必须和主查询一起
 * 该子查询有数据就是ture,
 * 要么全部取出要么都不取出
 * select * from product where exists (select * from product where pinpai = '联想');
 *
 * //查询商品类别中带电的
 * // (protype_id = product.protype_id 当前表id等于主查询表中id)等式是隐藏查询条件
 * select  * from product where exists (
      select * from product_type where protype_name like'%电%'
      and protype_id = product.protype_id
);
 *
 *
 * 6.联合查询 union
 *两个select查询字段数必须一致(字段类型具有一致性)
 * //默认(distinct)消除重复行
 * //只能对联合后数据排序
 * select * from join1
 * union
 * select * from join2 order by id1 desc;       //只能用第一个的id
 *
 * 实现全外连接           // 加上all就会有重复
 * select * from product left join  product_type on product_type.protype_id = product.protype_id
   union all
   select * from product right join  product_type on product_type.protype_id = product.protype_id;
 *
 *
 *
 *
 * 练习
 *1.查询计算机系所有学生信息 (as以后就用后面的查询)
 * select s.* from student as s inner join faculty as f on fname = '计算机系' where  s.fid = f.fid;
 * select * from student where fid =(
    select fid from faculty where fname = '计算机系'
   )
 *2.查询韩顺平所在院系
 * select * from faculty where fid =(
    select fid from student where sname = '韩顺平'
   )
 * // 查什么写什么
 *select sname,sex,shome,s.fid,fname,ftel  from student as s inner join faculty as f on sname = '韩顺平' where  s.fid = f.fid;
 * 3.查出计算机院系的学生信息
 * select sname,sex,shome,s.fid,fname,ftel  from student as s inner join faculty as f on s.fid = f.fid
    where fname = '计算机系';       // on 和where 很有意思
 *4.查出在行政楼院系名称
 *select fname ,fassress from faculty where fassress like '%行政楼%';
 *
 * 5.查出男女生各多少人(分组)
 * select sex,count(*) as 人数 from student group by sex;
 *
 * 6.查询人数最多院系
 *select * from student as s  inner join faculty as f on s.fid = f.fid where
 * select * from faculty where fid = (                          -- 找院系id
     --以院系id分组，找出院系id,条件为数量最大那个
     select fid from student group by fid having count(*)=(
        -- 找出院系id分组结果中，数量最大数值
        select count(*) from student group by fid order by count(*) desc limit 0,1
     )
   );
 *
 * 7.查出人数最多院系男生女生各多少人
 * select sex, count(*) as 人数 from student where fid = (
    select fid from student group by fid having count(*)=(
        -- 找出院系id分组结果中，数量最大数值
        select count(*) from student group by fid order by count(*) desc limit 0,1
    )
   )
    group by sex;
 *
 * 8.跟罗弟华同籍贯得人
 *select * from student where shome = (
    select shome from student where sname = '罗弟华'
  );
 *排除该人
 * select * from student where shome = (
    select shome from student where sname = '罗弟华'
  ) and sname <> '罗弟华';
 *
 * 9.查出所有有河北人就读院系信息
 *select * from faculty where fid in (                  -- 这里不是等于 in
    select fid from student where shome = '河北'        -- 列子查询
  );
 *
 * 10.查出跟河北女生同院系的学生信息
 * select * from student where fid = (
      select fid from student where shome = '河北' and sex = '女'
   );
 *排除河北女生
 * select * from student where fid = (
      select fid from student where shome = '河北' and sex = '女'
   ) and not (shome = '河北' and sex = '女');
*/
?>