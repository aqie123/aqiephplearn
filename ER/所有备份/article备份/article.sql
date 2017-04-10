-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 02 月 05 日 13:52
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `article`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `rights` int(1) DEFAULT NULL COMMENT '用于区分超级管理员(1)和普通管理员(2)',
  `ip` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员表用于登录' AUTO_INCREMENT=81 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `rights`, `ip`, `email`, `description`) VALUES
(76, 'aqie123', '202cb962ac59075b964b07152d234b70', 1, '192.168.1.101', '123', '123'),
(79, 'aqie1', '202cb962ac59075b964b07152d234b70', 1, '192.168.1.101', '1@qq.com', '123'),
(80, 'admin', '21232f297a57a5a743894a0e4a801fc3', 2, '192.168.1.101', '1@126.com', '公共账号');

-- --------------------------------------------------------

--
-- 表的结构 `list`
--

CREATE TABLE IF NOT EXISTS `list` (
  `id_l` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `author` varchar(20) NOT NULL,
  `source` varchar(50) NOT NULL,
  `typer` varchar(20) NOT NULL,
  `time` int(20) NOT NULL,
  `content` text NOT NULL,
  `typeid` int(5) NOT NULL COMMENT '文章类型id',
  PRIMARY KEY (`id_l`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `list`
--

INSERT INTO `list` (`id_l`, `title`, `author`, `source`, `typer`, `time`, `content`, `typeid`) VALUES
(17, '解决了p标签问题', '啊切', '百度', 'admin', 1486263544, '<p>哈哈哈啊哈哈哈哈</p>', 13),
(15, '标题1', '啊切', '啊切', 'admin', 1486260664, '&lt;p&gt;我是内容1&lt;/p&gt;', 13),
(19, '2', '2', '2', 'admin', 1486263997, '&lt;p&gt;2&lt;/p&gt;', 1),
(20, '2', '2', '2', 'admin', 1486264014, '&lt;p&gt;2&lt;/p&gt;', 1),
(21, '成功解决p标签', '3', '3', 'admin', 1486264125, '&lt;p&gt;3&lt;/p&gt;', 1),
(22, '3', '3', '3', 'admin', 1486264561, '&lt;p&gt;vv&lt;/p&gt;', 1),
(24, '4', '4', '4', 'admin', 1486266323, '&lt;p&gt;4&lt;/p&gt;', 1),
(16, '标题2', '啊切', '啊切', 'admin', 1486260685, '<p>我是内容2</p>', 1);

-- --------------------------------------------------------

--
-- 表的结构 `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `typename` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `type`
--

INSERT INTO `type` (`id`, `typename`) VALUES
(11, 'html5'),
(10, 'css3'),
(3, 'php7.0'),
(4, 'mysql'),
(5, 'Vue2.0'),
(6, 'JavaScript'),
(7, 'Scss'),
(8, 'node.js'),
(12, 'react'),
(13, '其他'),
(14, '音乐'),
(1, '文章分类');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
