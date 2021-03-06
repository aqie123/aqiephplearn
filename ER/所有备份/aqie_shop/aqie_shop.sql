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
INSERT INTO `shop_address` VALUES (1,'aqie','k','','鍖椾含鏈濋槼','053000','2@qq.com','123',1,0),(2,'a','a','','aa','3333','3@qq.com','666',1,0);
/*!40000 ALTER TABLE `shop_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_admin`
--

DROP TABLE IF EXISTS `shop_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_admin` (
  `adminid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员主键id',
  `adminuser` varchar(32) NOT NULL DEFAULT '' COMMENT '管理员账号',
  `adminpass` char(32) NOT NULL DEFAULT '' COMMENT '管理员密码',
  `adminemail` varchar(50) NOT NULL DEFAULT '' COMMENT '管理员邮箱',
  `logintime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录时间',
  `loginip` bigint(20) NOT NULL DEFAULT '0' COMMENT '登录ip',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
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
INSERT INTO `shop_admin` VALUES (1,'admin','202cb962ac59075b964b07152d234b70','2924811900@qq.com',1488026927,-1062731419,1486859091),(3,'aqie','202cb962ac59075b964b07152d234b70','1@11.com',1487585288,-1062731419,1487335930),(4,'鍟婂垏','202cb962ac59075b964b07152d234b70','2@111.com',0,0,1488031373);
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
  `cateid` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品分类id',
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
INSERT INTO `shop_category` VALUES (10,'鎵嬫満/鏁扮爜',0,1487202679),(11,'鐢佃剳鍔炲叕',0,1487202691),(12,'瀹跺叿/鍘ㄥ叿',0,1487202712),(13,'鐢疯/濂宠',0,1487202735),(14,'闉嬮澊/绠卞寘/濂緢鍝�',0,1487202777),(15,'姹借溅',0,1487202816),(16,'椋熷搧/鐗逛骇/閰掔被',0,1487202843),(17,'鍥句功/闊冲儚/鐢靛瓙涔�',0,1487202878),(19,'鎵嬫満',10,1487221473),(20,'鐢佃剳',11,1487221679),(21,'瀹跺叿',12,1487221692),(22,'濂宠',13,1487221701),(23,'濂緢鍝�',14,1487221709),(24,'姹借溅',15,1487221715),(25,'閰掔被',16,1487221725),(26,'鍥句功',17,1487221732),(27,'椋熷搧',16,1487329711);
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
  `addressid` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '收货地址',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '订单总价',
  `status` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单状态',
  `expressid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '快递方式',
  `expressno` varchar(50) NOT NULL DEFAULT '' COMMENT '快递单号来查询快递状态',
  `tradeno` varchar(100) NOT NULL DEFAULT '',
  `tradeext` text,
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '订单更新时间',
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
  `detailid` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品详情',
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
  `piccomment` varchar(100) NOT NULL DEFAULT '' COMMENT '图片评价',
  `piccates` varchar(32) NOT NULL DEFAULT '' COMMENT '图片分类',
  `pictures` text COMMENT '所有图片存进json',
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
  `cover` varchar(200) NOT NULL DEFAULT '' COMMENT '封面图片',
  `pics` text COMMENT '多张图片转换成json',
  `issale` enum('0','1') NOT NULL DEFAULT '0' COMMENT '1代表促销',
  `saleprice` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '促销价格',
  `ishot` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否上架,1代表上架',
  `ison` enum('0','1') NOT NULL DEFAULT '1' COMMENT '是否热卖,1代表热卖',
  `istui` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否推荐,1代表推荐',
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
INSERT INTO `shop_product` VALUES (2,19,'灏忕背鎵嬫満','灏忕背5s 鍏ㄧ綉閫� 楂橀厤鐗� 3GB鍐呭瓨 64GB ROM 鍝戝厜閲� 绉诲姩鑱旈�氱數淇�4G鎵嬫満',663,1999.00,'http://ole5vzrbd.bkt.clouddn.com/58a63e48b1615','{\"58a63e49063de\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a63e49063de\",\"58a63e4937129\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a63e4937129\",\"58a63e4951327\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a63e4951327\"}','0',1999.00,'1','1','1',0),(3,22,'榛戣壊闀胯','LOUGHNEA鍝佺墝濂宠鐪熺毊缁电緤鐨櫨瑜惰濂� 鍐鏂版闊╃増绠�绾︾函鑹蹭腑闀挎鍗婅韩瑁欏瓙濂� 榛戣壊 M 浜屽昂',663,7779.00,'http://ole5vzrbd.bkt.clouddn.com/58a63dff5fca2','{\"58a63e0019bb3\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a63e0019bb3\",\"58a63e004d3f7\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a63e004d3f7\",\"58a63e006df6f\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a63e006df6f\"}','0',7779.00,'1','1','1',0),(4,20,'寰槦GT83VR ','寰槦GT83VR 17鏂版MSI寰槦GT83VR Titan GTX1080/1070sli绗旇鏈數鑴戝寘绋� i7-7920HQ 鍙孏TX1080 64G 1T+1T',775,42520.00,'http://ole5vzrbd.bkt.clouddn.com/58a641ed89761','{\"58a641ede7f2f\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a641ede7f2f\",\"58a641ee1bd99\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a641ee1bd99\",\"58a641ee4a3d3\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a641ee4a3d3\"}','0',42520.00,'0','1','0',0),(5,21,'鍗庢棩瀹跺眳','鍗庢棩瀹跺眳 鏂颁腑寮忎竴瀹や袱鍘� 鍗ф埧4浠�+瀹㈠巺3浠�+椁愬巺5浠� 閲戜笣妾�鏈ㄥ疄鏈ㄥ鍏�',553,49999.00,'http://ole5vzrbd.bkt.clouddn.com/58a647675b5cc','{\"58a64769ee5f1\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a64769ee5f1\",\"58a6476a2dfdd\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6476a2dfdd\"}','1',49999.00,'1','1','1',0),(6,23,'閽绘垝','銆愯嚮鏃剁彔瀹濄�戠編鍥紾IA绮夎壊閽荤煶5.7鍏嬫媺鎴掓寚 fancy brownish pink 绾界害鐩磋繍 7-10澶╁埌璐у彂璐�',2,5688000.00,'http://ole5vzrbd.bkt.clouddn.com/58a647ab4da9a','{\"58a647abac650\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a647abac650\",\"58a647abde33c\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a647abde33c\"}','1',5688000.00,'1','1','0',0),(7,24,' AUDI/濂ヨ开','濂ョ淮淇婃潐骞宠杩涘彛鏁磋溅 2017骞存濂ヨ开Q7 S line',34,950000.00,'http://ole5vzrbd.bkt.clouddn.com/58aca30fcd750','{\"58aca310b29d3\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58aca310b29d3\",\"58aca310ecf78\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58aca310ecf78\",\"58aca3117f998\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58aca3117f998\",\"58aca311cb0b2\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58aca311cb0b2\",\"58aca31235a28\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58aca31235a28\"}','1',950000.00,'1','1','1',0),(8,25,'鑼呭彴','53搴� 鑼呭彴 80骞� 闄堝勾鑼呭彴閰� 500ml 閰遍鍨嬬櫧閰�',45,358888.00,'http://ole5vzrbd.bkt.clouddn.com/58a667dab31e2','{\"58a666e0dd871\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a666e0dd871\"}','1',358888.00,'0','1','1',0),(9,26,'鍘嗗彶鐨勬暀璁�','鍘嗗彶鐨勬暀璁� 鏈潵涔嬪 涔″湡涓浗 鏉庣害鐟熶紶 鏈哄櫒鏂板 鍎跨涓庢垬浜� 绛夌郴鍒楀瑁呬笡涔�',333,5000.00,'http://ole5vzrbd.bkt.clouddn.com/58a6480ac3738','{\"58a51106421f9\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a51106421f9\"}','1',5000.00,'1','1','0',0),(10,27,'闆堕鍖�','&nbsp;骞胯タ鐗逛骇 鐝嶆儬鐞抽浂椋熺ぜ鍖�',45,1599.00,'http://ole5vzrbd.bkt.clouddn.com/58a6daf2c39de','{\"58a6daf35739e\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6daf35739e\"}','1',1599.00,'1','1','1',0),(11,22,'缇婃瘺澶ц。','PORTS/瀹濆Э 绉嬪啲鏂版缇婃瘺闀胯铦磋澏缁撹楗板ぇ琛ｅコ SW9C013DWI02 榛戣壊 2',24,4319.00,'http://ole5vzrbd.bkt.clouddn.com/58a6dc8b430b1','{\"58a6dc8b7d26f\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6dc8b7d26f\",\"58a6dc8bcfeba\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6dc8bcfeba\"}','1',4000.00,'1','1','1',0),(12,22,'钑句笣闀胯','LOUGHNEA杞诲ア鍝佺墝濂宠杩炶。瑁欏コ2017鏄ュ鏂板搧钑句笣瑁欓暱琚栭晜绌烘�ф劅姘旇川閽堢粐涓や欢濂梐瀛楄 榛戣壊 M',55,3088.00,'http://ole5vzrbd.bkt.clouddn.com/58a6ddb6b64f2','{\"58a6ddb7035ba\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6ddb7035ba\",\"58a6ddb7ba794\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6ddb7ba794\",\"58a6ddb8840a9\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6ddb8840a9\"}','1',3000.00,'1','1','1',0),(13,22,'澶╅箙缁掑濂�','<span>鑰佽檸鍒虹唬澶╅箙缁掓鐞冨濂�<br>FL3 TIGER VELVET BOMBER JACKET</span>',67,599.00,'http://ole5vzrbd.bkt.clouddn.com/58a6dec48845b','{\"58a6dec4d107c\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6dec4d107c\"}','1',500.00,'1','1','1',0),(14,22,'浼戦棽鐨。','<span>涓暱娆惧姞缁掍紤闂茬緤鐨毊琛�<br>YOLO LEATHER H(TRUE)</span>',66,2499.50,'http://ole5vzrbd.bkt.clouddn.com/58a6dfff1ecd3','{\"58a6dfff9d849\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6dfff9d849\",\"58a6e0009eff2\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6e0009eff2\",\"58a6e001183cc\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6e001183cc\",\"58a6e00154c9a\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6e00154c9a\",\"58a7af73b31b3\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a7af73b31b3\"}','1',2100.00,'1','1','1',0),(15,22,'钑句笣杩炶。瑁�','濂堟槙瀹氬埗 112480 new dress绔嬮鍗曟帓鎵ｉ珮鑵版柊濞樺瓙绀兼湇钑句笣杩炶。瑁�',2,57951.00,'http://ole5vzrbd.bkt.clouddn.com/58a6e3113dcc7','{\"58a6e3122759b\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6e3122759b\",\"58a6e3129382c\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6e3129382c\"}','1',48000.00,'1','1','1',0),(16,22,'杩炶。瑁�','闊╅兘琛ｈ垗2017杩炶。瑁� 闊╃増濂虫柊娆惧鏉炬樉鐦﹀亣涓や欢A瀛楅暱琚� 鐏拌壊 M',366,198.00,'http://ole5vzrbd.bkt.clouddn.com/58a6f306477aa','{\"58a6f306cd469\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6f306cd469\",\"58a6f3076c9ac\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6f3076c9ac\"}','1',160.00,'1','1','1',0),(17,22,'閽堢粐杩炶。瑁�','闃佸叞绉�2016鍘熷垱濂宠绉嬪啲鏂版鐝婄憵绾笅鎽嗘彃鐗囦腑琚栭拡缁囨彁鑺辫繛琛ｈ M',671,3680.00,'http://ole5vzrbd.bkt.clouddn.com/58a6f7c140f39','{\"58a6f7c1ddf16\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6f7c1ddf16\",\"58a6f7c23e092\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58a6f7c23e092\"}','1',3380.00,'1','1','1',1487337410),(18,23,'鍗″湴浜�(Cartier)鎵嬭〃','鍗″湴浜�(Cartier)鎵嬭〃 钃濇皵鐞冪郴鍒楁満姊扮敺濂宠〃W6900456',14,92598.00,'http://ole5vzrbd.bkt.clouddn.com/58aac05ae7e5d','{\"58aac05b9d335\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58aac05b9d335\",\"58aac05bcc140\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58aac05bcc140\",\"58aac05c0c2fc\":\"http:\\/\\/ole5vzrbd.bkt.clouddn.com\\/58aac05c0c2fc\"}','1',0.01,'1','1','1',1487585372),(19,22,'濂宠','鍟﹀暒鍟﹀暒',67,400.00,'http://ole5vzrbd.bkt.clouddn.com/58adc4d7aec3a','[]','1',200.00,'0','1','0',1487783130);
/*!40000 ALTER TABLE `shop_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_profile`
--

DROP TABLE IF EXISTS `shop_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_profile` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户详细信息id',
  `truename` varchar(32) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `age` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '年龄',
  `sex` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '性别',
  `birthday` date NOT NULL DEFAULT '2017-02-10' COMMENT '生日',
  `nickname` varchar(32) NOT NULL DEFAULT '' COMMENT '昵称',
  `company` varchar(100) NOT NULL DEFAULT '' COMMENT '公司',
  `userid` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '用户的ID',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建日期',
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
  `userid` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户主键id',
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
