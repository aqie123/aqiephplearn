# 每条记录就是个session数据区

create table session(
  `sess_id` varchar(40) NOT NULL ,
  `sess_content` text,
  last_write int not null default 0;
  PRIMARY KEY (`sess_id`)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;

alter table session add column last_write int not null default 0;