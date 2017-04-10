<?php
/**
 * mysql 优化
 * 存储层： 存储引擎，字段类型，凡是涉及
 * 设计层： 索引，缓存，分区
 * 架构层： 多个mysql服务器设置  读写分录(主从模式)
 * sql语句：
 */
/*
 * innodb : 表，数据，索引  （适合做更新，删除）(办公，商城)
 * 支持事务，行级锁定，支持外键
 * 数据和索引存储在一起
 *
 * 设置数据和索引存放在两个文件
 * show variables like 'innodb_file_per_table';
 * set global innodb_file_per_table = 1;
 *
 * 数据按主键顺序排列每个写入数据
 *
 * 事务四个特性; 原子性，一致性，持久性，隔离
 * start transaction;
 * rollback;
 * commit;
 *
 * 外键： b表主键是a表普通字段， a表看来，就是外键
 * 外键约束： 必须先写b表再写a表
 *
 * 并发性： 并发性非常高  (行锁)
 *
 */

/*
 * myisam 表结构，数据，索引都有独立的存储文件 （适合做查询写入）(新闻，论坛)
 * 数据按自然顺序排列每个写入数据
 *
 * 并发性： 较低 (表锁)
 * 压缩机制：压缩完不能写数据了
 * 把数据读取出来，再写入
 * insert into order select null,order_num from order;
 * 压缩: myisampack.exe  表名(带路径)
 * myisampack.exe -rq 表名  (重建索引)
 * 刷新数据表： flush table order;
 *
 */

/**
 *
 * 字段类型：
 * 年龄 tinyint(1)  0-255
 * 乌龟年龄 smallint(2)      // 两个字节，16进制位
 * mediumint(3)
 * int(4)
 * bigint(8)
 *
 * 时间类型
 * time()           时分秒
 * datetime()       年月日 时分秒
 * year()           年份
 * date()           年月日
 * timestamp()   时间戳 1970 0101 到现在秒数
 *
 *
 * char(255字符显示)长度固定
 * 手机号 ：char(11)
 *
 * varchar(65535字节限制) 字符集utf8存储汉子 65535/3 -2 个汉字
 *
 *时间信息存储为整形（时间戳）
 * select from _unixstamp from 表名
 *
 * set集合类型  set('篮球','足球','棒球');
 * enum枚举型  emum('男','女');
 *
 * ip保存为整形
 * mysql： inet_aton('192.168.1.101') inet_ntoa(3232235877);
 * PHP ： ip2long()  long2ip()
 */

/**
 * 逆范式
 * 三范式：1.数据不能分割 2.数据没有冗余 3.每个字段和数据表主键直接关联
 * 单表查询，没有聚合计算
 */

/**
 * 索引 index
 * 四种类型：
 * 1.主键 primary key auto_increment
 * 2.唯一 unique index
 * 3.普通 index
 * 4.全文 fulltext index
 * 复合索引： 索引关联字段是多个组成的
 *
 *执行计划 ： explain (只针对查询语句设置) 查询sql语句执行前所有资源计划
 * explain select * from order;
 *
 * 索引使用场景 ：1.连接查询给外键约束字段设置索引，提高速度
 *
 * 索引原则：
 * 1.列独立
 * 2.左原则   中间,右边不会使用到索引
 *      模糊查询：like，%(关联多个模糊内容)，_(关联一个模糊内容)
 *
 * 索引添加依据：
 *  1.被频繁使用sql语句
 *  2.执行时间较长sql语句
 *  3.业务逻辑比较重要
 * --前缀索引       substring(字段,开始位置1,长度)
 * select count(*)/count(distinct substring(order_num,1,1)) from `order`;      --有错
 * select count(distinct substring(order_num,1,2)) from `order`;
 * select distinct substring(order_num,1,1) from `order`;
 *结论：给密码创建索引，只需要前九位
 *

 * 索引设计原则
 *      1. 内容有区分度
 *      2. explain select * from student2 where intro like "%mysql%" \G
 *          这个才可以使用全文索引
 *         explain select * from student2 where match(intro) against ("%mysql%") \G
 *
 * 索引结构
 *      myisam(非聚集索引结构)
 *      innodb(聚集索引结构)
 *
 * 查询缓存 (执行结果缓存起来)
 *      1.查看并开启 show variables like 'query_cache%';   初始缓存大小为0
 *              set global query_cache_size = 64*1024*1024;
 *      2. 缓存失效 数据表或者数据变动
 *
 *
 *四： 分表/分区  （各个分区关联字段必须是主键一部分，或者是主键本身，或者是复合主键索引从属主键部分）
 *  1.求余：
 *      key :根据指定字段分区           partition by key(id) partitions 3;
 *      hash ：根据指定表达式分区        partition by hash(month(adddate)) partitions 12;     --month(获取时间信息月份)
 *  2. 条件：
 *      range ： 字段/表达式符合某个条件范围
 * partition by range(year(adddate))(
        partition 70hou values less than(1980),
        partition 80hou values less than(1990),
        partition 90hou values less than(2000)
 *  )
 *      list ：字段/表达式符合某个 列表范围
 *partition by list(month(adddate))(
    partition spring values  in(3,4,5),
    partition summer values  in(6,7,8),
    partition autumn values  in(9,10,11),
    partition winter values in(12,1,2)
 *  )
 *
 *
 * 垂直分表 ：把数据表多个字段进行拆分，分配到不同数据表中
 *
 * 架构设计： (主从模式/读写分离) 通过负载均衡，平均从服务器获得数据
 */


/*优化
 * 1.尽量少占据空间
 * 2.数据长度固定
 * 3.数据变为整形
 * 4.使用索引
 * 5.逆范式
 * 6.索引
 *
 */

/**
 * 1.先把索引停掉,专门把数据写进数据库中，最后维护索引
 *  a.myisam
 *      已经存在数据
 *      alter table 表名 disable  keys;      alter table 表名 enable  keys
 *      没有数据
 *      alter table 表名 drop primary key ,drop index;
 *          写入数据
 *      alter table 表名 add primary key(id) ,index(索引名称);
 *  b.innodb （支持事务）
 *      start transaction;
 *          写入数据
 *      commit;
 *
 * 2.单表，多表查询
 *  select b.bd_id,b.name,count(g.*) from Brand b join Goods g on
 *  b.bd_id=g.bd_id group by b.Bd_id;
 * 多表转单表
 *  ① select bd_id,count(*) from Goods group by bd_id;  //查询每个品牌商品数量
 *  ② select bd_id,name from Brand;
 *  ③
 *  ④
 *  ⑤
 * 3.limit 优化
 * select * from student  limit 100 10;
 *  select * from student where id>100 linit 10;        使用到索引
 *
 * order by null 强制不排序
 *
 *
 */