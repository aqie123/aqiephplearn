<?php
/*
MySQL(c++) 数据库       以文件形式保存在硬盘

Redis(c) （Remote Dictionary Server）内存高速缓存数据库   内存          速度更快
        数据模型 ： key => value
        数据类型 ： string list hash set sorted set
        可持久化(随时把数据备份到硬盘)，保证了数据安全
        使用缓存减轻数据库负载，数据短期不变，提高用户请求速度降低网站负载，
        (mysql查询到数据放到内存中)将数据放到读取速度更快介质，即对数据缓存
        介质：文件，数据库，内存(经常用)
    缓存两种形式：
        页面缓存(smarty缓存)
            CMS:页面缓存
        数据缓存
            商品展示:小部分数据缓存

string 基本类型 list链表 set(string集合) sort set(排序集合类型) hash

a. 查看版本 ： redis-server -v    redis-cli -v
b.设置环境变量 %REDIS_HOME%;
c. http://windows.php.net/downloads/pecl/snaps/redis/2.2.5/  下载
    http://windows.php.net/downloads/pecl/releases/igbinary/1.2.1/
    php_redis.dll和php_igbinary.dll 到 php的ext目录下
d.select 1 选择数据库


*/
/**
 *  redis-server.exe redis.windows.conf

    将其作为系统服务来启动
    redis-server --service-install redis.windows.conf
    
 *  开启服务：redis-server --service-start
 *  停止服务：redis-server --service-stop
 *  redis-cli.exe -h 127.0.0.1 -p 6379
 * set name aqie
 * get name
 */

/**
 *  key : 除了"\n"和空格其他均可
 * exists key : 判断key是否存在
 * del key  : 删除key
 * type key :判断value 类型
 *rename name myname 重命名
 * dbsize 返回key数量
 * expire key seconds 指定过期时间
 * ttl key   返回剩余过期秒数
 * select db-index 选择数据库 select 0 一共有16个数据库
 * flushdb 删除当前数据库所有key
 * flushall 删除所有数据库中所有key
 * keys pattern 返回指定匹配模式 keys n*
 * move key db-index   //move key 1  移动到其他数据库一共16个
 *
 */
// string
/**
 * // 一次性设置获取多个string
 * mset key1 value1 key2 value2
 *  mget name1 name2
 *
 * incr key 对key值做加加，返回新的值
 * decr key 对key值减减
 * incrby key integer  加指定值 incrby age 2
 * decrby key integer
 * append key value 给指定key的字符串值追加value
 * substr key start end 返回截取过得key的字符串值
 */

/**
 * list 类型是双向链表。push  pop从链表头部或者尾部添加删除元素
 * list既可以做栈也可以做队列
 * 上进上出 ：栈
 * 上进下出 ：队列
 * 应用： 获取十个最新用户信息 在list链表只保留十个最新数据
 */
/*
链表添加元素：
lpush login aqie  从头部添加
rpop key  : 从list尾部删除元素，并返回被删除元素
llen key : 返回list长度
lrange key start end ； 返回指定区间元素 下标从0开始
rpush key string  从尾部添加
lpop key 从头部删除
ltrim key start end  截取list 从头部

*/
// set 集合 （string 类型的无序集合 最大2e32 - 1）
// 基本添加删除，还包括集合的并集，交集，差集 （好友推荐功能）
// 每个集合中各个元素不能重复
// 集合添加 sadd friends mary  sadd  friedns jack
// 集合删除 srem friends jim
// 将集合元素从a移动到b  smove friends friedns bob
// scard friends 返回个数

// 集合计算
// 交集 sinter friends friedns    可以有多个
// 并集 sunion friends friedns
// 差集 sdiff friends friedns
// 查看集合内部元素信息 smembers friends

// sismember bob friends // 判断元素是否存在集合


/**
 * sort set 每个元素会关联一个权
 * 获得热门帖子信息
 */
/*
 * zadd key score member        添加 zadd hotmessage 102 11 (权  值)
 *zrem key member       删除
 * zincrby key incr member  按照incr增加member对应的权  zincrby hotmessage 90 14
 *zrank key member  返回指定元素在集合中排名(下标0开始),按score从小到大
 * zrevrank key member  score从大到小
 * zrange key start end  返回指定区间元素 返回有序结果
 * zcard key            返回集合中元素个数
 * zscore key elenent   返回指定元素对应权
 * zremrangebyrank key min max 删除集合中排名在置顶区间元素(权从小到大排序)
 */

//每进一个元素，就删除一个权值最低的元素

/**
 * hash 类型 和mysql存储一条记录相似
 *不能和其他类型重名
 */
/*
 * hset key field value   // 给hash field 指定值，key不存在则创建 hset  edb field hign
 *                               hset myage field 18
 * hget key field       // 获取
 * hmget key field          // 获取全部指定的   hmget edu field1 field2
 * hmset key field1 value1 field2 value2  // hmset edu field1 xiaoxue field2 high
 * hincrby key field integer  // 给指定hash field 加上定值 hincrby myage field 3
 * hexists key field        // 判断是否存在
 * hdel key field   // 删除
 * hlen key   // 返回 hash field数量
 * hkeys key // 返回所有field
 * hvals key //返回所有value
 * hgetall key // 返回所有key value
 */

/**
 * 持久化
 * 1.snap shotting 快照持久化
 *      一次性把所有数据保存一份在硬盘,数据太多不适合频繁操作
 * 2. append only file AOF持久化
 *      用户执行的每个写指令（CURD）都备份到文件中
 * bgsave 异步保存数据到磁盘         // 手动发起快照
 * lastsave 返回上次成功保存到磁盘的unix时间戳
 * shutdown 同步保存到服务器并关闭redis服务器
 * bgrewriteaof 日志文件过长优化AOF日志文件存储
 */

/**
 * 主从模式
 * 降低每个redis负载，一个服务器负载写，其他负载读，
 * 主服务器数据会自动同步给从服务器
 */

/**
 * php操作redis
 *
 */

//实例化
$redis = new Redis();
//连接redis服务器
$redis->connect('localhost','6379');
// 操作
$redis->select(3);      // 选择编号为一数据库
$redis->set('name','aqie123');     // 设置键值
$redis->mset(array('sub1'=>'php','sub2'=>'mysql'));
echo "设置成功","<br>";
echo $redis->get('name');
print_r($redis->mget(array('sub1','sub2'))) ;

// 反射 Reflection
// 类->实例化->对象调用类成员
// 类反过来感知类成员
// Redis类实例化一个反射类对象
$aqie = new ReflectionClass('Redis');
// 通过对象获得redis类全部方法
echo "<pre>";
print_r($aqie->getMethods());

