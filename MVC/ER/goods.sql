 create table goods (
  goods_id int unsigned not null auto_increment,
  goods_name varchar(64) not null default '',
  shop_price decimal(10,2) not null default 0,
  goods_desc text,
  goods_number int not null  default 0,
  is_best tinyint not null default  0,                    -- 一个字节
  is_new tinyint not null default  1,
  is_hot tinyint not null default  0,
  is_onsale tinyint not null default  1,
  image_ori varchar(255) not null default '' comment '上传的原始图片',
  admin_id int unsigned default 0  comment "那个管理员添加商品",
  create_time int not null default 0 comment '添加时间时间戳整形',
  primary key (goods_id)
)engine =innodb default charset=utf8;

alter table goods add column image_ori varchar(255) not null default '' comment '上传的原始图片' after is_onsale;