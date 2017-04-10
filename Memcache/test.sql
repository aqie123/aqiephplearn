create table `order`(
  id int not null auto_increment,
  order_num varchar(32),
  primary key (id)
)engine=innodb charset=utf8;

create table student2(
  id int not null auto_increment comment '主键',
  name varchar(32) not null default '' comment '名字',
  height tinyint not null default 0 comment '身高',
  addr varchar(32) not null default '' comment '地址',
  school varchar(32) not null default '' comment '学校',
  adddate datetiem not null default '',
  intro text comment '简介',
  -- 创建索引
  primary key (id),
  -- unique index [索引名称] （字段） 索引名称不写，那默认使用字段
  unique index nm (name),
  index (height),
  fulltext index(intro)
)engine=myisam charset=utf8
partition by key(id) partitions 3;      # 分三个区

alter table syudent2 rename student2;   -- 修改表名
select name from student2;

alter table student2 modify id int not null auto_increment comment '删除主键';   -- 增加自增长
alter table student drop primary key;
alter table student2 drop index height;   -- 删除其他索引

alter table student2 add primary key (id); # 添加主键索引
alter table student2 add index (height);
alter table student2 add index (addr,school);

alter table student2 add pwd varchar(32) default '';

insert into student2 (name,pwd) values('aqie',md5('123'));    -- 插入数据
alter table student2 add index (pwd(9));        -- 增加索引