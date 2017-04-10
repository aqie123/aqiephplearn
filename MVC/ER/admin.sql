# 管理员登录表  密码123
CREATE table admin_user(
  id int auto_increment primary key,
  admin_name varchar(20) unique key,
  admin_pass varchar(48) not null,
  login_times int comment '登录次数' default 0,
  last_login_time datetime comment '最后登录时间'
)charset=utf8;
insert into admin_user
  (admin_name,admin_pass,login_times) values('admin',md5('123'),0);

--  alter table admin_user modify login_times int not null default 0;