<?php
/**
 * 实现session在memcache中存储
 */
ini_set('session.save_handler',"memcache");
ini_set("session.save_path","tcp://127.0.0.1:11211");

session_start();
$_SESSION['username'] = 'aqie233';
var_dump(session_id());
//存储在memcache，首先获取session_id();
