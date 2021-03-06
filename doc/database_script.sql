/*
SQLyog Community Edition- MySQL GUI v6.15 RC2
MySQL - 5.0.45-community-nt : Database - forum
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `forum`;

USE `forum`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `tb_introduction` */

DROP TABLE IF EXISTS `tb_introduction`;

CREATE TABLE `tb_introduction` (
  `introduction_id` int(11) NOT NULL auto_increment,
  `introduction_content` text collate utf8_bin,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY  (`introduction_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `tb_introduction` */

insert  into `tb_introduction`(`introduction_id`,`introduction_content`,`item_id`) values (1,'  花之缘鲜花店是由XXXX鲜花有限公司宋非凡先生创办，坐落于武汉市中心旧鼓楼大街196号，公司旗下品牌鲜花实体店――小丑鲜花店，在京有多家分店，外省多家加盟店。公司自2006年5月14日母亲节开业以来以改变中国鲜花行业传统模式为宗旨以“我们是爱的使者，是有情人的传递者”为根本，以倡导最优秀，最新奇，最周到的鲜花礼仪服务为目标；让您尽情享受快乐小丑递送服务以及在网上鲜花超市流连的乐趣，使您足不出户就能体会到小丑给您带来的惊喜与浪漫以及买花的欣喜与快乐。想像一下您的父母、老师、爱人、朋友在启门的刹那，那份惊奇、欣喜与幸福便化成绽放如花朵般的笑靥。“送花之手，亦有余香”您有过吗？其实您也可以！ 让我们小丑为你们的亲情、爱情、友情的桥梁锦上添花吧。',3),(2,'&nbsp;&nbsp;花之缘鲜花店是由XXXX鲜花有限公司宋非凡先生创办，坐落于武汉市中心旧鼓楼大街196号，公司旗下品牌鲜花实体店――小丑鲜花店，在京有多家分店，外省多家加盟店。公司自2006年5月14日母亲节开业以来以改变中国鲜花行业传统模式为宗旨以“我们是爱的使者，是有情人的传递者”为根本，以倡导最优秀，最新奇，最周到的鲜花礼仪服务为目标；让您尽情享受快乐小丑递送服务以及在网上鲜花超市流连的乐趣，使您足不出户就能体会到小丑给您带来的惊喜与浪漫以及买花的欣喜与快乐。想像一下您的父母、老师、爱人、朋友在启门的刹那，那份惊奇、欣喜与幸福便化成绽放如花朵般的笑靥。“送花之手，亦有余香”您有过吗？其实您也可以！ 让我们小丑为你们的亲情、爱情、友情的桥梁锦上添花吧。',8),(4,'555555555555555555555555555555555555555555555555555555555555555555555555',55);

/*Table structure for table `tb_item` */

DROP TABLE IF EXISTS `tb_item`;

CREATE TABLE `tb_item` (
  `item_id` int(11) NOT NULL auto_increment,
  `item_name` varchar(20) collate utf8_bin NOT NULL,
  `item_seq` int(11) default NULL,
  `item_level` int(11) default NULL,
  `item_up_id` int(11) default NULL,
  `item_content` text collate utf8_bin,
  `item_reg_time` datetime default NULL,
  `item_status` varchar(20) collate utf8_bin default NULL,
  `item_type` int(11) NOT NULL,
  `item_site` int(11) NOT NULL,
  PRIMARY KEY  (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `tb_item` */

insert  into `tb_item`(`item_id`,`item_name`,`item_seq`,`item_level`,`item_up_id`,`item_content`,`item_reg_time`,`item_status`,`item_type`,`item_site`) values (2,'WEB栏目管理',0,0,-1,'','2012-04-05 16:42:06','0',0,1),(3,'花店介绍',1,1,2,NULL,'2012-04-05 16:42:06','0',1,1),(4,'鲜花资讯',2,1,2,NULL,'2012-04-05 16:42:06','0',2,1),(5,'鲜花品种',3,1,2,NULL,'2012-04-05 16:42:06','0',3,1),(6,'联系我们',5,1,2,NULL,'2012-04-05 16:42:06','0',5,1),(7,'WAP栏目管理',0,0,-1,'','2012-04-06 12:16:50','0',0,2),(8,'花店介绍',1,1,7,NULL,'2012-04-06 12:16:50','0',1,2),(9,'鲜花资讯',2,1,7,NULL,'2012-04-06 12:16:50','0',2,2),(10,'鲜花品种',3,1,7,NULL,'2012-04-06 12:16:50','0',3,2),(11,'联系我们',4,1,7,NULL,'2012-04-06 12:16:50','0',5,2),(12,'用户留言',4,1,2,NULL,'2012-04-06 12:16:50','0',4,1);

/*Table structure for table `tb_merchant` */

DROP TABLE IF EXISTS `tb_merchant`;

CREATE TABLE `tb_merchant` (
  `merchant_id` varchar(16) collate utf8_bin NOT NULL,
  `merchant_name` varchar(200) collate utf8_bin default NULL,
  `key_word` varchar(200) collate utf8_bin default NULL,
  `wap_domain` varchar(100) collate utf8_bin default NULL,
  `web_domain` varchar(100) collate utf8_bin default NULL,
  `email` varchar(100) collate utf8_bin default NULL,
  `linkman` varchar(100) collate utf8_bin default NULL,
  `address` varchar(100) collate utf8_bin default NULL,
  `telephone` varchar(20) collate utf8_bin default NULL,
  `fax` varchar(20) collate utf8_bin default NULL,
  `click_times` int(11) default NULL,
  `reg_time` datetime default NULL,
  `merchant_seq` int(11) default NULL,
  `wap_template` varchar(20) collate utf8_bin default NULL,
  `web_template` varchar(20) collate utf8_bin default NULL,
  PRIMARY KEY  (`merchant_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `tb_merchant` */

insert  into `tb_merchant`(`merchant_id`,`merchant_name`,`key_word`,`wap_domain`,`web_domain`,`email`,`linkman`,`address`,`telephone`,`fax`,`click_times`,`reg_time`,`merchant_seq`,`wap_template`,`web_template`) values ('M0001','花之缘花坊','花之缘花坊',NULL,NULL,NULL,'张三','湖北省武汉市雄楚大道','027-8875770','027-8875771',0,NULL,1,NULL,'');

/*Table structure for table `tb_news` */

DROP TABLE IF EXISTS `tb_news`;

CREATE TABLE `tb_news` (
  `news_id` int(11) NOT NULL auto_increment,
  `title` varchar(200) collate utf8_bin default NULL,
  `content` text collate utf8_bin,
  `promulgator` varchar(60) collate utf8_bin default NULL,
  `issue_time` datetime default NULL,
  `click_times` int(11) default NULL,
  `status` varchar(20) collate utf8_bin default NULL,
  `flag` varchar(10) collate utf8_bin default NULL,
  `pic_url` varchar(100) collate utf8_bin default NULL,
  `item_id` int(11) default NULL,
  PRIMARY KEY  (`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `tb_news` */

insert  into `tb_news`(`news_id`,`title`,`content`,`promulgator`,`issue_time`,`click_times`,`status`,`flag`,`pic_url`,`item_id`) values (1,'牡丹1','牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹','李四','2012-04-07 12:00:00',0,'0','1',NULL,4),(2,'杜鹃2','杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃','李四','2012-04-06 13:00:00',0,'0','1',NULL,4),(3,'兰花3','兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花','李四','2012-04-05 14:00:00',0,'0','1',NULL,4),(4,'菊花4','菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花','李四','2012-04-04 01:00:00',0,'0','1',NULL,4),(5,'玫瑰5','玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰','李四','2012-04-03 18:00:00',0,'0','1',NULL,9),(6,'荷花6','荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花','李四','2012-04-02 18:00:00',0,'0','0',NULL,9),(7,'荷花7','荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花','李四','2012-04-03 18:00:00',0,'0','2','/public/data/M0001/news/img01.jpg',4),(8,'荷花8','荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花','李四','2012-04-03 18:00:00',0,'0','2','/public/data/M0001/news/img02.jpg',4),(9,'荷花9','荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花','李四','2012-04-03 18:00:00',0,'0','2','/public/data/M0001/news/img03.jpg',4),(10,'荷花10','荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花','李四','2012-04-03 18:00:00',0,'0','2','/public/data/M0001/news/img04.jpg',4),(11,'荷花11','荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花','李四','2012-04-03 18:00:00',0,'0','2','/public/data/M0001/news/img05.jpg',4),(12,'荷花12','荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花','李四','2012-04-03 18:00:00',0,'0','2','/public/data/M0001/news/img06.jpg',4),(13,'牡丹','牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹','李四','2012-04-07 12:00:00',0,'0','1',NULL,9),(14,'杜鹃','杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃','李四','2012-04-06 13:00:00',0,'0','1',NULL,9),(15,'菊花','菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花','李四','2012-04-04 01:00:00',0,'0','1',NULL,9),(16,'玫瑰','玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰玫瑰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰花兰','李四','2012-04-03 18:00:00',0,'0','1',NULL,9),(17,'荷花','荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花兰花兰花兰花兰花兰花兰花','李四','2012-04-02 18:00:00',0,'0','0',NULL,9),(37,'66','666','66','2012-05-29 01:38:41',0,'0','0','',56),(38,'1','1','11','2012-05-29 01:42:44',0,'0','0','',61),(39,'7','7','7','2012-05-29 01:43:49',0,'0','0','',62);

/*Table structure for table `tb_post` */

DROP TABLE IF EXISTS `tb_post`;

CREATE TABLE `tb_post` (
  `post_id` int(11) NOT NULL auto_increment,
  `post_subject_id` int(11) NOT NULL,
  `post_user_id` varchar(20) collate utf8_bin NOT NULL,
  `post_content` text collate utf8_bin,
  `post_issue_time` datetime default NULL,
  `post_flag` varchar(20) collate utf8_bin default NULL,
  PRIMARY KEY  (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `tb_post` */

insert  into `tb_post`(`post_id`,`post_subject_id`,`post_user_id`,`post_content`,`post_issue_time`,`post_flag`) values (1,6,'000000000013','很好，很强大','2012-05-28 19:48:48','0'),(2,6,'000000000013','非常好','2012-05-28 19:48:56','0'),(4,6,'000000000013','啊的啊的','2012-05-28 19:49:05','0');

/*Table structure for table `tb_product` */

DROP TABLE IF EXISTS `tb_product`;

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL auto_increment,
  `product_name` varchar(200) collate utf8_bin default NULL,
  `description` text collate utf8_bin,
  `promulgator` varchar(60) collate utf8_bin default NULL,
  `issue_time` datetime default NULL,
  `click_times` int(11) default NULL,
  `status` varchar(20) collate utf8_bin default NULL,
  `flag` varchar(10) collate utf8_bin default NULL,
  `icon_url` varchar(100) collate utf8_bin default NULL,
  `pic_url` varchar(100) collate utf8_bin default NULL,
  `item_id` int(11) default NULL,
  PRIMARY KEY  (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `tb_product` */

insert  into `tb_product`(`product_id`,`product_name`,`description`,`promulgator`,`issue_time`,`click_times`,`status`,`flag`,`icon_url`,`pic_url`,`item_id`) values (1,'牡丹','牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹','李四','2012-04-07 12:01:02',0,'0','1','/public/data/M0001/product/img01.jpg','/public/data/M0001/product/img01.jpg',5),(2,'菊花','菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花','李四','2012-04-06 12:01:02',0,'0','1','/public/data/M0001/product/img02.jpg','/public/data/M0001/product/img02.jpg',5),(3,'樱花','樱花樱花樱花樱花樱花樱花樱花樱花樱花樱花樱花樱花樱花樱花樱花樱花樱花樱花樱花樱花樱花','李四','2012-04-05 12:01:02',0,'0','1','/public/data/M0001/product/img03.jpg','/public/data/M0001/product/img03.jpg',5),(4,'杜鹃','杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃','李四','2012-04-04 12:01:02',0,'0','1','/public/data/M0001/product/img04.jpg','/public/data/M0001/product/img04.jpg',5),(5,'荷花','荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花','李四','2012-04-03 12:01:02',0,'0','1','/public/data/M0001/product/img05.jpg','/public/data/M0001/product/img05.jpg',5),(6,'牡丹','牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡丹牡','李四','2012-04-07 12:01:02',0,'0','1','/public/data/M0001/product/img01.jpg','/public/data/M0001/product/img01.jpg',10),(7,'菊花','菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花菊花','李四','2012-04-06 12:01:02',0,'0','1','/public/data/M0001/product/img02.jpg','/public/data/M0001/product/img02.jpg',10),(8,'樱花','樱花樱花樱花樱花樱花樱花樱花樱花樱花樱花樱花樱花樱花樱花樱花樱花樱花樱花樱花樱花樱花','李四','2012-04-05 12:01:02',0,'0','1','/public/data/M0001/product/img03.jpg','/public/data/M0001/product/img03.jpg',10),(9,'杜鹃','杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃杜鹃','李四','2012-04-04 12:01:02',0,'0','1','/public/data/M0001/product/img04.jpg','/public/data/M0001/product/img04.jpg',10),(10,'荷花','荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花','李四','2012-04-03 12:01:02',0,'0','1','/public/data/M0001/product/img05.jpg','/public/data/M0001/product/img05.jpg',10),(11,'牡丹11','荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花','李四','2012-04-03 12:01:02',0,'0','1','/public/data/M0001/product/img05.jpg','/public/data/M0001/product/img05.jpg',5),(12,'牡丹12','荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花','李四','2012-04-03 12:01:02',0,'0','1','/public/data/M0001/product/img05.jpg','/public/data/M0001/product/img05.jpg',5),(13,'牡丹13','荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花','李四','2012-04-03 12:01:02',0,'0','1','/public/data/M0001/product/img05.jpg','/public/data/M0001/product/img05.jpg',5),(14,'牡丹14','荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花','李四','2012-04-03 12:01:02',0,'0','1','/public/data/M0001/product/img05.jpg','/public/data/M0001/product/img05.jpg',5),(15,'牡丹15','荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花','李四','2012-04-03 12:01:02',0,'0','1','/public/data/M0001/product/img05.jpg','/public/data/M0001/product/img05.jpg',5),(16,'牡丹16','荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花','李四','2012-04-03 12:01:02',0,'0','1','/public/data/M0001/product/img05.jpg','/public/data/M0001/product/img05.jpg',5),(17,'牡丹17','荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花','李四','2012-04-03 12:01:02',0,'0','1','/public/data/M0001/product/img05.jpg','/public/data/M0001/product/img05.jpg',5),(18,'牡丹18','荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花','李四','2012-04-03 12:01:02',0,'0','1','/public/data/M0001/product/img05.jpg','/public/data/M0001/product/img05.jpg',10),(19,'牡丹19','荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花','李四','2012-04-03 12:01:02',0,'0','1','/public/data/M0001/product/img05.jpg','/public/data/M0001/product/img05.jpg',10),(20,'牡丹20','荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花','李四','2012-04-03 12:01:02',0,'0','1','/public/data/M0001/product/img05.jpg','/public/data/M0001/product/img05.jpg',10),(21,'牡丹21','荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花','李四','2012-04-03 12:01:02',0,'0','1','/public/data/M0001/product/img05.jpg','/public/data/M0001/product/img05.jpg',10),(22,'牡丹22','荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花','李四','2012-04-03 12:01:02',0,'0','1','/public/data/M0001/product/img05.jpg','/public/data/M0001/product/img05.jpg',10),(23,'牡丹23','荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花','李四','2012-04-03 12:01:02',0,'0','1','/public/data/M0001/product/img05.jpg','/public/data/M0001/product/img05.jpg',10),(24,'牡丹24','荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花荷花','李四','2012-04-03 12:01:02',0,'0','1','/public/data/M0001/product/img05.jpg','/public/data/M0001/product/img05.jpg',10),(41,'11','1111','111','2012-05-29 01:42:25',0,'0','0','','',60);

/*Table structure for table `tb_subject` */

DROP TABLE IF EXISTS `tb_subject`;

CREATE TABLE `tb_subject` (
  `subject_id` int(11) NOT NULL auto_increment,
  `subject_topic` varchar(20) collate utf8_bin NOT NULL,
  `subject_user_id` varchar(20) collate utf8_bin NOT NULL,
  `subject_item_id` int(11) NOT NULL,
  `subject_reply_num` int(11) default NULL,
  `subject_content` text collate utf8_bin,
  `subject_issue_time` datetime default NULL,
  `subject_type` int(11) NOT NULL,
  `subject_flag` varchar(20) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `tb_subject` */

insert  into `tb_subject`(`subject_id`,`subject_topic`,`subject_user_id`,`subject_item_id`,`subject_reply_num`,`subject_content`,`subject_issue_time`,`subject_type`,`subject_flag`) values (1,'请问鲜花怎么选购？','000000000013',12,0,'你好，请问送给女朋友的鲜花怎么选购？谢谢*_*','2012-05-12 15:19:09',0,'0'),(3,'风信子怎么样养？','000000000013',12,0,'你好，请问风信子怎么样养？','2012-05-12 15:25:01',0,'0'),(4,'请问怎么选百合花？','000000000013',12,0,'你好，请问怎么选百合花？','2012-05-12 15:25:42',0,'0'),(5,'送花的时候应该注意什么？','000000000013',12,0,'你好，请问送花的时候应该注意什么？','2012-05-12 15:26:10',0,'0'),(6,'女朋友不喜欢花怎么办？','000000000013',12,6,'你好，女朋友不喜欢花怎么办？','2012-05-12 15:26:39',0,'0');

/*Table structure for table `tb_table_pk` */

DROP TABLE IF EXISTS `tb_table_pk`;

CREATE TABLE `tb_table_pk` (
  `table_name` varchar(20) collate utf8_bin NOT NULL,
  `pk_value` varchar(20) collate utf8_bin default NULL,
  PRIMARY KEY  (`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `tb_table_pk` */

insert  into `tb_table_pk`(`table_name`,`pk_value`) values ('tb_user','28');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `user_id` varchar(20) collate utf8_bin NOT NULL,
  `user_name` varchar(20) collate utf8_bin NOT NULL,
  `user_password` varchar(20) collate utf8_bin NOT NULL,
  `user_reg_time` datetime default NULL,
  `user_level` int(11) default NULL,
  `user_status` int(11) default NULL,
  `user_reg_ip` varchar(20) collate utf8_bin default NULL,
  `user_login_ip` varchar(20) collate utf8_bin default NULL,
  `user_last_active_time` datetime default NULL,
  `user_last_login_time` datetime default NULL,
  `user_type` int(11) default '0',
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `tb_user` */

insert  into `tb_user`(`user_id`,`user_name`,`user_password`,`user_reg_time`,`user_level`,`user_status`,`user_reg_ip`,`user_login_ip`,`user_last_active_time`,`user_last_login_time`,`user_type`) values ('000000000013','dgt','dgt','2012-05-06 12:06:10',1,0,'127.0.0.1','127.0.0.1','2012-05-06 12:06:10','2012-05-29 01:22:42',1),('000000000015','test','test','2012-05-12 13:18:05',1,0,'127.0.0.1','127.0.0.1','2012-05-12 13:18:05','2012-05-12 13:18:05',0),('000000000016','','','2012-05-12 13:29:52',1,0,'127.0.0.1','127.0.0.1','2012-05-12 13:29:52','2012-05-28 21:19:52',0),('000000000017','tt','tt','2012-05-12 13:40:39',1,0,'127.0.0.1','127.0.0.1','2012-05-12 13:40:39','2012-05-12 13:40:39',0),('000000000018','ttt','ttt','2012-05-12 13:41:31',1,0,'127.0.0.1','127.0.0.1','2012-05-12 13:41:31','2012-05-12 13:41:31',0),('000000000019','1','1','2012-05-12 13:42:16',1,0,'127.0.0.1','127.0.0.1','2012-05-12 13:42:16','2012-05-12 13:42:16',0),('000000000020','2','2','2012-05-12 13:44:22',1,0,'127.0.0.1','127.0.0.1','2012-05-12 13:44:22','2012-05-12 13:44:22',0),('000000000021','d','d','2012-05-12 13:50:40',1,0,'127.0.0.1','127.0.0.1','2012-05-12 13:50:40','2012-05-12 13:50:40',0),('000000000022','3','1','2012-05-12 13:54:52',1,0,'127.0.0.1','127.0.0.1','2012-05-12 13:54:52','2012-05-12 13:54:52',0),('000000000023','4','4','2012-05-12 13:55:36',1,0,'127.0.0.1','127.0.0.1','2012-05-12 13:55:36','2012-05-12 13:55:36',0),('000000000024','5','5','2012-05-12 14:00:30',1,0,'127.0.0.1','127.0.0.1','2012-05-12 14:00:30','2012-05-12 14:00:30',0),('000000000025','7777','77','2012-05-12 14:34:38',1,0,'127.0.0.1','127.0.0.1','2012-05-12 14:34:38','2012-05-12 14:34:38',0),('000000000026','33','3','2012-05-12 14:37:16',1,0,'127.0.0.1','127.0.0.1','2012-05-12 14:37:16','2012-05-12 14:37:16',0),('000000000027','55','5','2012-05-12 14:38:13',1,0,'127.0.0.1','127.0.0.1','2012-05-12 14:38:13','2012-05-12 14:38:13',0),('000000000028','1111','1','2012-05-12 14:42:38',1,0,'127.0.0.1','127.0.0.1','2012-05-12 14:42:38','2012-05-12 14:42:38',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
