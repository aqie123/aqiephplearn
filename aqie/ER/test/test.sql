create table tab_int(
  f1 int unsigned,
  f2 tinyint zerofill,
  f3 bigint(10) zerofill,
  f4 decimal(10,3), /*总位数10，小数3*/
  f5 float,       /*单浮点精度 容易丢失精度*/
  f6 double       /*双浮点精度*/

);
create table tab_time(
  dt datetime,    /*这几个都可以换成 now()*/
  d2 date,
  t2 time,
  y year,         --这个不可以用now()
  ts timestamp
);
insert into tab_time(dt,d2,t2,y) values('2017-2-28 01:42:34','2017-2-28','01:42:34','2014');

create table tab_index(
  id int auto_increment,
  user_name varchar(20),
  email varchar(30),
  key (email),  /*普通索引*/
  PRIMARY KEY(id), /*主键索引*/
  UNIQUE KEY(user_name) /*唯一索引*/
);

--两个关联表
create table class(
  id int auto_increment PRIMARY KEY,
  class_num varchar(10) unique key,
  teacher varchar(10) comment '班主任',
  open_data date comment '开始日期'
);
create table student(
  stu_id int auto_increment primary key,
  name varchar(10),
  age tinyint,
  class_id int comment '班级id',
  foreign key(class_id) references class(id)      --  ???
);


--检查约束，然而并没有什么卵用
create table tab1(
  age tinyint,
  check (age>=0 and age<100)    /*检查约束(不在范围存不进去)*/
);

--建表练习 (test2)
create table practice(
  id int auto_increment,
  salary float comment '工资',
  postcode char(6) comment '邮编',
  name varchar(10),
  reg_time datetime comment '注册时间',
  birthday date comment '生日',
  intro text comment '自我介绍',
  sex enum('男', '女'),
  myhobby set('篮球','排球','羽毛球','足球'),
  primary key(id),
  key(name)
)engine = InnoDB, default charset = utf8;
insert into practice (salary,postcode,name,reg_time,birthday,intro,sex,myhobby) values(8000,053000,'啊切',now(),now(),'我是啊切','男','篮球');

create table practice2 like practice;
alter table practice2 engine = MyISAM;
alter table practice add age int default '18';
alter table practice change postcode postcode char(8);    --做不到只改一个，只能重写字段

/*成绩系统*/
-- 学生成绩
create table student(
  sid int auto_increment comment '学生id',
  sname varchar(20) not null  default '' comment '学生姓名',
  sex enum('男', '女'),
  nativePlace varchar(10) comment '籍贯',
  aid  varchar(30) comment '院系id',    /*外键*/
  primary key(sid)
)engine = InnoDB, default charset = utf8;
insert into student (sid,sname,sex,nativePlace,aid) VALUES
  (1,'啊切','男','湖北','1');

--课程表
create table cource(
  cid int auto_increment comment '课程id',
  cname varchar(30) not null default '' comment '课程名称',
  credits tinyint unsigned not null default 0 comment '学生学分',
  primary key(cid)
);

--成绩表
create table grade(
  sid int auto_increment comment '学生id',      /*联合主键*/
  cid int comment '课程id',
  score int unsigned not null default 0 comment '成绩',
  primary key(sid,cid)
);
--院系
create table academy(
  aid int auto_increment comment '院系id',
  aname varchar(30) not null default '' comment '院系名',
  address varchar(50) not null default '' comment '院系地址',
  phonenumber varchar(15) not null default '' comment '联系电话',
  primary key(aid)
);


--  product database
CREATE TABLE IF NOT EXISTS `student` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `sname` varchar(10) DEFAULT NULL,
  `sex` enum('男','女') DEFAULT NULL,
  `shome` varchar(10) DEFAULT NULL,
  `fid` tinyint(4) DEFAULT NULL,
PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
--
-- 表的结构 `院系`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(10) DEFAULT NULL,
  `fassress` varchar(20) DEFAULT NULL,
  `ftel` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `student` (`sid`,`sname`,`sex`,`shome`,`fid`) VALUES
  (1,'罗弟华','男','江西',1),
  (2,'韩顺平','男','四川',2),
  (3,'吴英雷','男','黑龙江',1),
  (4,'王玉虹','女','河北',3),
  (5,'赵玉川','男','河北',3),
  (6,'刘招英','女','江西',1);
--
-- 转存表中的数据 `院系`
--

INSERT INTO `faculty` (`fid`, `fname`, `fassress`, `ftel`) VALUES
  (1, '计算机系', '行政楼302', '010-66886688'),
  (2, '数学系', '科研楼108', '010-80808800'),
  (3, '物理系', '行政楼305', '010-68688787');
