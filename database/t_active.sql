-- MySQL dump 10.13  Distrib 5.6.11, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: db_0358lanet
-- ------------------------------------------------------
-- Server version	5.6.11

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
-- Table structure for table `t_active`
--

DROP TABLE IF EXISTS `t_active`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_active` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `old_price` varchar(255) NOT NULL,
  `now_price` varchar(255) NOT NULL,
  `alink` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `package` text NOT NULL,
  `edit_time` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`aid`),
  KEY `flag` (`flag`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_active`
--

LOCK TABLES `t_active` WRITE;
/*!40000 ALTER TABLE `t_active` DISABLE KEYS */;
INSERT INTO `t_active` VALUES (1,25,'双人间','45','34','www.baidu.com','1432554761807.jpg','这里是套餐详情说明','2015-05-25 11:52:41','2015-05-18','2015-05-26','这里是购买须知',1,0),(2,26,'活动2','56','12','www.baidu.com','1432554873171.jpg','<span style=\"font-family:Tahoma, Helvetica, Arial, 宋体, sans-serif;font-size:14px;line-height:25.2000007629395px;background-color:#DDEDFB;\">这里是套餐详情</span>','2015-05-25 19:54:33','2015-05-19','2015-06-04','这里是购买须知',1,0),(3,29,'商品示例1','888','88','http://mp.weixin.qq.com/bizmall/malldetail?id=&pid=psqMotzfyv5Hcfz8z6Xz6PmxGcWc&biz=MzA3Mjg5Mzg3NA==&scene=&action=show_detail&showwxpaytitle=1#wechat_redirect','1433945172283.jpg','<h1>\r\n	这是套餐详情！！！\r\n</h1>','2015-06-10','2015-06-01','2015-06-30','<h1>\r\n	<span>这是套餐详情！！！</span>\r\n</h1>',1,0);
/*!40000 ALTER TABLE `t_active` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-17  2:00:01
