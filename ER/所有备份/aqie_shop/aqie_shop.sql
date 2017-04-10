-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: aqie_shop
-- ------------------------------------------------------
-- Server version	5.5.53

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `shop_address`
--

DROP TABLE IF EXISTS `shop_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_address` (
  `addressid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) NOT NULL DEFAULT '',
  `lastname` varchar(32) NOT NULL DEFAULT '',
  `company` varchar(100) NOT NULL DEFAULT '',
  `address` text,
  `postcode` char(6) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `telephone` varchar(15) NOT NULL DEFAULT '',
  `userid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`addressid`),
  KEY `shop_address_userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_address`
--

LOCK TABLES `shop_address` WRITE;
/*!40000 ALTER TABLE `shop_address` DISABLE KEYS */;
INSERT INTO `shop_address` VALUES (1,'aqie','k','','北京朝阳','053000','2@qq.com','123',1,0),(2,'a','a','','aa','3333','3@qq.com','666',1,0);
/*!40000 ALTER TABLE `shop_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_admin`
--

DROP TABLE IF EXISTS `shop_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_admin` (
  `adminid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '����Ա����id',
  `adminuser` varchar(32) NOT NULL DEFAULT '' COMMENT '����Ա�˺�',
  `adminpass` char(32) NOT NULL DEFAULT '' COMMENT '����Ա����',
  `adminemail` varchar(50) NOT NULL DEFAULT '' COMMENT '����Ա����',
  `logintime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '��¼ʱ��',
  `loginip` bigint(20) NOT NULL DEFAULT '0' COMMENT '��¼ip',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '����ʱ��',
  PRIMARY KEY (`adminid`),
  UNIQUE KEY `shop_admin_adminuser_adminpass` (`adminuser`,`adminpass`),
  UNIQUE KEY `shop_admin_adminuser_adminemail` (`adminuser`,`adminemail`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_admin`
--

LOCK TABLES `shop_admin` WRITE;
/*!40000 ALTER TABLE `shop_admin` DISABLE KEYS */;
INSERT INTO `shop_admin` VALUES (1,'admin','202cb962ac59075b964b07152d234b70','2924811900@qq.com',1488026927,-1062731419,1486859091),(3,'aqie','202cb962ac59075b964b07152d234b70','1@11.com',1487585288,-1062731419,1487335930),(4,'啊切','202cb962ac59075b964b07152d234b70','2@111.com',0,0,1488031373);
/*!40000 ALTER TABLE `shop_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_cart`
--

DROP TABLE IF EXISTS `shop_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_cart` (
  `cartid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `productid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `productnum` int(10) unsigned NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `userid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cartid`),
  KEY `shop_cart_productid` (`productid`),
  KEY `shop_cart_userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_cart`
--

LOCK TABLES `shop_cart` WRITE;
/*!40000 ALTER TABLE `shop_cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_category`
--

DROP TABLE IF EXISTS `shop_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_category` (
  `cateid` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '��Ʒ����id',
  `title` varchar(32) NOT NULL DEFAULT '',
  `parentid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cateid`),
  KEY `shop_category_cateid_parentid` (`parentid`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_category`
--

LOCK TABLES `shop_category` WRITE;
/*!40000 ALTER TABLE `shop_category` DISABLE KEYS */;
INSERT INTO `shop_category` VALUES (10,'手机/数码',0,1487202679),(11,'电脑办公',0,1487202691),(12,'家具/厨具',0,1487202712),(13,'男装/女装',0,1487202735),(14,'鞋靴/箱包/奢侈品',0,1487202777),(15,'汽车',0,1487202816),(16,'食品/特产/酒类',0,1487202843),(17,'图书/音像/电子书',0,1487202878),(19,'手机',10,1487221473),(20,'电脑',11,1487221679),(21,'家具',12,1487221692),(22,'女装',13,1487221701),(23,'奢侈品',14,1487221709),(24,'汽车',15,1487221715),(25,'酒类',16,1487221725),(26,'图书',17,1487221732),(27,'食品',16,1487329711);
/*!40000 ALTER TABLE `shop_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_order`
--

DROP TABLE IF EXISTS `shop_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_order` (
  `orderid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `addressid` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '�ջ���ַ',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '�����ܼ�',
  `status` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '����״̬',
  `expressid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '��ݷ�ʽ',
  `expressno` varchar(50) NOT NULL DEFAULT '' COMMENT '��ݵ�������ѯ���״̬',
  `tradeno` varchar(100) NOT NULL DEFAULT '',
  `tradeext` text,
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '����ʱ��',
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '��������ʱ��',
  PRIMARY KEY (`orderid`),
  KEY `shop_order_userid` (`userid`),
  KEY `shop_order_addressid` (`addressid`),
  KEY `shop_order_expressid` (`expressid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_order`
--

LOCK TABLES `shop_order` WRITE;
/*!40000 ALTER TABLE `shop_order` DISABLE KEYS */;
INSERT INTO `shop_order` VALUES (1,1,1,0.01,260,3,'1234567890','',NULL,1487603818,'2017-02-21 16:31:38'),(2,1,1,0.01,260,3,'1234567891','',NULL,1487604427,'2017-02-21 16:31:25'),(3,1,1,13540.00,220,2,'567885654','',NULL,1487697648,'2017-02-21 17:25:05'),(4,1,1,13178.00,100,2,'','',NULL,1487698059,'2017-02-21 17:28:04'),(5,1,1,50019.00,100,2,'','',NULL,1487698340,'2017-02-21 17:32:26'),(6,1,1,20.01,100,2,'','',NULL,1487698702,'2017-02-21 17:38:29'),(7,1,0,0.00,0,0,'','',NULL,1487698904,'2017-02-21 17:41:44'),(8,1,1,42535.00,100,1,'','',NULL,1487699475,'2017-02-21 17:56:41'),(9,1,2,15578.00,100,2,'','',NULL,1487842236,'2017-02-23 09:31:01');
/*!40000 ALTER TABLE `shop_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_order_detail`
--

DROP TABLE IF EXISTS `shop_order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_order_detail` (
  `detailid` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '��Ʒ����',
  `productid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `productnum` int(10) unsigned NOT NULL DEFAULT '0',
  `orderid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`detailid`),
  KEY `shop_order_detail_productid` (`productid`),
  KEY `shop_order_detail_orderid` (`orderid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_order_detail`
--

LOCK TABLES `shop_order_detail` WRITE;
/*!40000 ALTER TABLE `shop_order_detail` DISABLE KEYS */;
INSERT INTO `shop_order_detail` VALUES (1,18,0.01,1,1,1487603818),(2,18,0.01,1,2,1487604427),(3,17,3380.00,4,3,1487697648),(4,17,3380.00,1,4,1487698059),(5,3,7779.00,1,4,1487698059),(6,2,1999.00,1,4,1487698059),(7,5,49999.00,1,5,1487698340),(8,18,0.01,1,6,1487698702),(9,4,42520.00,1,7,1487698904),(10,4,42520.00,1,8,1487699475),(11,3,7779.00,2,9,1487842236);
/*!40000 ALTER TABLE `shop_order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_picture`
--

DROP TABLE IF EXISTS `shop_picture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_picture` (
  `pictureid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL DEFAULT '',
  `piccomment` varchar(100) NOT NULL DEFAULT '' COMMENT 'ͼƬ����',
  `piccates` varchar(32) NOT NULL DEFAULT '' COMMENT 'ͼƬ����',
  `pictures` text COMMENT '����ͼƬ���json',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`pictureid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_picture`
--

LOCK TABLES `shop_picture` WRITE;
/*!40000 ALTER TABLE `shop_picture` DISABLE KEYS */;
INSERT INTO `shop_picture` VALUES (1,'','','','{\"58ae12c88418e\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58ae12c88418e\"}',1487803083),(2,'','','','{\"58ae12db0b819\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58ae12db0b819\"}',1487803101),(3,'','','','{\"58ae12e8a2d1c\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58ae12e8a2d1c\"}',1487803114),(4,'','','','{\"58ae12f20fbbd\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58ae12f20fbbd\"}',1487803123);
/*!40000 ALTER TABLE `shop_picture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_product`
--

DROP TABLE IF EXISTS `shop_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_product` (
  `productid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cateid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `title` varchar(200) NOT NULL DEFAULT '',
  `desc` text,
  `num` bigint(20) unsigned NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cover` varchar(200) NOT NULL DEFAULT '' COMMENT '����ͼƬ',
  `pics` text COMMENT '����ͼƬת����json',
  `issale` enum('0','1') NOT NULL DEFAULT '0' COMMENT '1��������',
  `saleprice` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '�����۸�',
  `ishot` enum('0','1') NOT NULL DEFAULT '0' COMMENT '�Ƿ��ϼ�,1�����ϼ�',
  `ison` enum('0','1') NOT NULL DEFAULT '1' COMMENT '�Ƿ�����,1��������',
  `istui` enum('0','1') NOT NULL DEFAULT '0' COMMENT '�Ƿ��Ƽ�,1�����Ƽ�',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`productid`),
  KEY `shop_product_cateid` (`cateid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_product`
--

LOCK TABLES `shop_product` WRITE;
/*!40000 ALTER TABLE `shop_product` DISABLE KEYS */;
INSERT INTO `shop_product` VALUES (2,19,'小米手机','小米5s 全网通 高配版 3GB内存 64GB ROM 哑光金 移动联通电信4G手机',663,1999.00,'http://ole5vzrbd.bkt.clouddn.com/58a63e48b1615','{\"58a63e49063de\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a63e49063de\",\"58a63e4937129\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a63e4937129\",\"58a63e4951327\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a63e4951327\"}','0',1999.00,'1','1','1',0),(3,22,'黑色长裙','LOUGHNEA品牌女装真皮绵羊皮百褶裙女 冬季新款韩版简约纯色中长款半身裙子女 黑色 M 二尺',663,7779.00,'http://ole5vzrbd.bkt.clouddn.com/58a63dff5fca2','{\"58a63e0019bb3\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a63e0019bb3\",\"58a63e004d3f7\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a63e004d3f7\",\"58a63e006df6f\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a63e006df6f\"}','0',7779.00,'1','1','1',0),(4,20,'微星GT83VR ','微星GT83VR 17新款MSI微星GT83VR Titan GTX1080/1070sli笔记本电脑包税 i7-7920HQ 双GTX1080 64G 1T+1T',775,42520.00,'http://ole5vzrbd.bkt.clouddn.com/58a641ed89761','{\"58a641ede7f2f\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a641ede7f2f\",\"58a641ee1bd99\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a641ee1bd99\",\"58a641ee4a3d3\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a641ee4a3d3\"}','0',42520.00,'0','1','0',0),(5,21,'华日家居','华日家居 新中式一室两厅 卧房4件+客厅3件+餐厅5件 金丝檀木实木家具',553,49999.00,'http://ole5vzrbd.bkt.clouddn.com/58a647675b5cc','{\"58a64769ee5f1\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a64769ee5f1\",\"58a6476a2dfdd\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6476a2dfdd\"}','1',49999.00,'1','1','1',0),(6,23,'钻戒','【臻时珠宝】美国GIA粉色钻石5.7克拉戒指 fancy brownish pink 纽约直运 7-10天到货发货',2,5688000.00,'http://ole5vzrbd.bkt.clouddn.com/58a647ab4da9a','{\"58a647abac650\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a647abac650\",\"58a647abde33c\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a647abde33c\"}','1',5688000.00,'1','1','0',0),(7,24,' AUDI/奥迪','奥维俊杉平行进口整车 2017年款奥迪Q7 S line',34,950000.00,'http://ole5vzrbd.bkt.clouddn.com/58aca30fcd750','{\"58aca310b29d3\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58aca310b29d3\",\"58aca310ecf78\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58aca310ecf78\",\"58aca3117f998\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58aca3117f998\",\"58aca311cb0b2\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58aca311cb0b2\",\"58aca31235a28\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58aca31235a28\"}','1',950000.00,'1','1','1',0),(8,25,'茅台','53度 茅台 80年 陈年茅台酒 500ml 酱香型白酒',45,358888.00,'http://ole5vzrbd.bkt.clouddn.com/58a667dab31e2','{\"58a666e0dd871\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a666e0dd871\"}','1',358888.00,'0','1','1',0),(9,26,'历史的教训','历史的教训 未来之境 乡土中国 李约瑟传 机器新娘 儿童与战争 等系列套装丛书',333,5000.00,'http://ole5vzrbd.bkt.clouddn.com/58a6480ac3738','{\"58a51106421f9\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a51106421f9\"}','1',5000.00,'1','1','0',0),(10,27,'零食包','&nbsp;广西特产 珍惠琳零食礼包',45,1599.00,'http://ole5vzrbd.bkt.clouddn.com/58a6daf2c39de','{\"58a6daf35739e\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6daf35739e\"}','1',1599.00,'1','1','1',0),(11,22,'羊毛大衣','PORTS/宝姿 秋冬新款羊毛长袖蝴蝶结装饰大衣女 SW9C013DWI02 黑色 2',24,4319.00,'http://ole5vzrbd.bkt.clouddn.com/58a6dc8b430b1','{\"58a6dc8b7d26f\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6dc8b7d26f\",\"58a6dc8bcfeba\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6dc8bcfeba\"}','1',4000.00,'1','1','1',0),(12,22,'蕾丝长裙','LOUGHNEA轻奢品牌女装连衣裙女2017春季新品蕾丝裙长袖镂空性感气质针织两件套a字裙 黑色 M',55,3088.00,'http://ole5vzrbd.bkt.clouddn.com/58a6ddb6b64f2','{\"58a6ddb7035ba\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6ddb7035ba\",\"58a6ddb7ba794\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6ddb7ba794\",\"58a6ddb8840a9\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6ddb8840a9\"}','1',3000.00,'1','1','1',0),(13,22,'天鹅绒外套','<span>老虎刺绣天鹅绒棒球外套<br>FL3 TIGER VELVET BOMBER JACKET</span>',67,599.00,'http://ole5vzrbd.bkt.clouddn.com/58a6dec48845b','{\"58a6dec4d107c\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6dec4d107c\"}','1',500.00,'1','1','1',0),(14,22,'休闲皮衣','<span>中长款加绒休闲羊皮皮衣<br>YOLO LEATHER H(TRUE)</span>',66,2499.50,'http://ole5vzrbd.bkt.clouddn.com/58a6dfff1ecd3','{\"58a6dfff9d849\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6dfff9d849\",\"58a6e0009eff2\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6e0009eff2\",\"58a6e001183cc\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6e001183cc\",\"58a6e00154c9a\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6e00154c9a\",\"58a7af73b31b3\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a7af73b31b3\"}','1',2100.00,'1','1','1',0),(15,22,'蕾丝连衣裙','奈昕定制 112480 new dress立领单排扣高腰新娘子礼服蕾丝连衣裙',2,57951.00,'http://ole5vzrbd.bkt.clouddn.com/58a6e3113dcc7','{\"58a6e3122759b\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6e3122759b\",\"58a6e3129382c\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6e3129382c\"}','1',48000.00,'1','1','1',0),(16,22,'连衣裙','韩都衣舍2017连衣裙 韩版女新款宽松显瘦假两件A字长袖 灰色 M',366,198.00,'http://ole5vzrbd.bkt.clouddn.com/58a6f306477aa','{\"58a6f306cd469\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6f306cd469\",\"58a6f3076c9ac\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6f3076c9ac\"}','1',160.00,'1','1','1',0),(17,22,'针织连衣裙','阁兰秀2016原创女装秋冬新款珊瑚红下摆插片中袖针织提花连衣裙 M',671,3680.00,'http://ole5vzrbd.bkt.clouddn.com/58a6f7c140f39','{\"58a6f7c1ddf16\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6f7c1ddf16\",\"58a6f7c23e092\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6f7c23e092\"}','1',3380.00,'1','1','1',1487337410),(18,23,'卡地亚(Cartier)手表','卡地亚(Cartier)手表 蓝气球系列机械男女表W6900456',14,92598.00,'http://ole5vzrbd.bkt.clouddn.com/58aac05ae7e5d','{\"58aac05b9d335\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58aac05b9d335\",\"58aac05bcc140\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58aac05bcc140\",\"58aac05c0c2fc\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58aac05c0c2fc\"}','1',0.01,'1','1','1',1487585372),(19,22,'女装','啦啦啦啦',67,400.00,'http://ole5vzrbd.bkt.clouddn.com/58adc4d7aec3a','[]','1',200.00,'0','1','0',1487783130);
/*!40000 ALTER TABLE `shop_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_profile`
--

DROP TABLE IF EXISTS `shop_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_profile` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '�û���ϸ��Ϣid',
  `truename` varchar(32) NOT NULL DEFAULT '' COMMENT '��ʵ����',
  `age` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '����',
  `sex` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '�Ա�',
  `birthday` date NOT NULL DEFAULT '2017-02-10' COMMENT '����',
  `nickname` varchar(32) NOT NULL DEFAULT '' COMMENT '�ǳ�',
  `company` varchar(100) NOT NULL DEFAULT '' COMMENT '��˾',
  `userid` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '�û���ID',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '��������',
  PRIMARY KEY (`id`),
  UNIQUE KEY `shop_profile_userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_profile`
--

LOCK TABLES `shop_profile` WRITE;
/*!40000 ALTER TABLE `shop_profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_user`
--

DROP TABLE IF EXISTS `shop_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_user` (
  `userid` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '�û�����id',
  `username` varchar(32) NOT NULL DEFAULT '',
  `userpass` char(32) NOT NULL DEFAULT '',
  `useremail` varchar(100) NOT NULL DEFAULT '',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `shop_user_username_userpass` (`username`,`userpass`),
  UNIQUE KEY `shop_user_useremail_userpass` (`useremail`,`userpass`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_user`
--

LOCK TABLES `shop_user` WRITE;
/*!40000 ALTER TABLE `shop_user` DISABLE KEYS */;
INSERT INTO `shop_user` VALUES (1,'user','202cb962ac59075b964b07152d234b70','user@qq.com',1486859394),(2,'aqie_589fe6e971552','beb5eeb566a115f8b0c1089a394028b1','2924811900@qq.com',1486874348),(3,'aqie_589fe81309556','077a8fa208892867883f98aec6e1db38','2@qq.com1',1486874643),(4,'aqie_589febf1cfbd5','21ec4f013687844e7daa1e749604119a','5@qq.com',1486875636),(6,'aqie_589ff766d451c','6eb57302a057ee004b7668a2bda2f963','11@qq.com',1486878570),(7,'aqie_589ffc45802a5','8de13fd34afacddad9f3dc82e0c81a80','44@qq.com',1486879817),(8,'aqie_58a000d0b3139','8261f1b7f9fc03df6063cdb55dc672fd','55@qq.com',1486880979),(9,'aqie_58a0f67f3dd49','da2dafb867fc45054107a3d6569b0b77','1469036546@qq.com',1486943874),(12,'aqie_58a0f83d6e4c2','b62d96c9a4f72604a699b3646ff84ebe','14690365468@qq.com',1486944319),(13,'aqie_58a0fbfcb510f','4e66e32ed488e98b0276d623568bd426','56566@qq.com',1486945279),(14,'aqie_58a10201a8e48','b0cae1bd2c85c8c16fff7cc97833a844','5646@qq.com',1486946821),(15,'aqie_58a24292d38cb','e6f6a27192341c2833a24b1eb7e01dd4','3219@qq.com',1487028890),(16,'sss','c4ca4238a0b923820dcc509a6f75849b','sss@qq.com',1487032583),(17,'aqie_58a51d4705305','4557f0c1ee1b4ced323cbe0e6041946d','335943576@qq.com',1487215947),(18,'aqie','202cb962ac59075b964b07152d234b70','aqie@qq.com',1487509282);
/*!40000 ALTER TABLE `shop_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-25 22:53:11
