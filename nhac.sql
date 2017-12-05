-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: nhac
-- ------------------------------------------------------
-- Server version	5.7.20-log

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `ma_admin` int(11) NOT NULL AUTO_INCREMENT,
  `ma_nguoi_dung` tinyint(3) NOT NULL,
  PRIMARY KEY (`ma_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (7,17),(8,18),(9,22);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album` (
  `ma_album` int(11) NOT NULL AUTO_INCREMENT,
  `ten_album` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinh` text,
  `ab_order` tinyint(3) NOT NULL,
  `display` tinyint(1) NOT NULL,
  `luot_click` int(11) NOT NULL DEFAULT '0',
  `ngay_tao` date NOT NULL,
  PRIMARY KEY (`ma_album`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album`
--

LOCK TABLES `album` WRITE;
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
INSERT INTO `album` VALUES (24,'Trịnh Công Sơn','tvdung.jpg',1,1,57,'0000-00-00'),(26,'Đàm Vĩnh Hưng','damvinhhung.jpg',1,1,23,'2017-10-31'),(28,'Quang Dũng','quangdung.jpg',1,1,30,'2017-11-19'),(29,'Lệ Quyên','lequyen.jpg',3,1,19,'2017-11-27'),(30,'Hồ Ngọc Hà','hongocha.jpg',1,1,8,'2017-11-27'),(33,'Phi Nhung','phinhung1.jpg',1,1,9,'2017-11-28'),(34,'Cẩm Ly','camly.jpg',1,1,1,'2017-11-28'),(35,'Trọng Tấn','trongtan.jpg',1,1,3,'2017-11-28'),(36,'Thu hiền','thuhien.jpg',1,1,5,'2017-11-28');
/*!40000 ALTER TABLE `album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bai_hat`
--

DROP TABLE IF EXISTS `bai_hat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bai_hat` (
  `ma_bai_hat` int(11) NOT NULL AUTO_INCREMENT,
  `ma_ca_si` int(11) NOT NULL,
  `ma_nhac_si` int(11) NOT NULL,
  `ma_album` int(11) NOT NULL,
  `ma_the_loai` int(11) NOT NULL,
  `ma_quoc_gia` int(11) NOT NULL,
  `ma_nguoi_dung` int(11) NOT NULL,
  `ten_bai_hat` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tenbh_khong_dau` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bai_hat` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `loi_bai_hat` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `ngay_dang` date NOT NULL,
  `luot_xem` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ma_bai_hat`),
  KEY `ma_ca_si` (`ma_ca_si`),
  KEY `ma_nhac_si` (`ma_nhac_si`),
  KEY `ma_album` (`ma_album`),
  KEY `ma_the_loai` (`ma_the_loai`),
  KEY `ma_ca_si_2` (`ma_ca_si`),
  KEY `ma_quoc_gia` (`ma_quoc_gia`),
  KEY `ma_nguoi_dung` (`ma_nguoi_dung`),
  CONSTRAINT `bai_hat_ibfk_1` FOREIGN KEY (`ma_ca_si`) REFERENCES `ca_si` (`ma_ca_si`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `bai_hat_ibfk_2` FOREIGN KEY (`ma_the_loai`) REFERENCES `the_loai` (`ma_the_loai`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `bai_hat_ibfk_3` FOREIGN KEY (`ma_album`) REFERENCES `album` (`ma_album`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `bai_hat_ibfk_4` FOREIGN KEY (`ma_nhac_si`) REFERENCES `nhac_si` (`ma_nhac_si`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `bai_hat_ibfk_5` FOREIGN KEY (`ma_quoc_gia`) REFERENCES `quoc_gia` (`ma_quoc_gia`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `bai_hat_ibfk_6` FOREIGN KEY (`ma_nguoi_dung`) REFERENCES `nguoi_dung` (`ma_nguoi_dung`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=199 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bai_hat`
--

LOCK TABLES `bai_hat` WRITE;
/*!40000 ALTER TABLE `bai_hat` DISABLE KEYS */;
INSERT INTO `bai_hat` VALUES (188,29,2,24,2,1,24,'Thàn phố buồn','than pho buon','upload_nhac/DNA.mp3',NULL,'2017-10-31',16522),(189,1,1,26,3,1,24,'Thành phố buồn','thanh pho buon','upload_nhac/DNA.mp3','jugghj','2017-10-31',12350),(190,1,4,28,2,1,24,'Remix hay nhất mọi thời đại','remix hay nhat moi thoi dai','upload_nhac/DNA.mp3',NULL,'2017-11-27',5340),(191,29,4,28,6,1,24,'Remix nhạc đỏ','remix nhac do','upload_nhac/DNA.mp3',NULL,'2017-11-27',56835),(192,36,4,29,3,1,24,'Album Lệ Quyên','album le quyen','upload_nhac/DNA.mp3',NULL,'2017-11-28',12421),(193,37,4,28,3,1,24,'Anh còn nợ em','anh con no em','upload_nhac/DNA.mp3',NULL,'2017-11-28',12314),(195,38,4,33,3,1,24,'Bông điêng điếng','bong dieng dieng','upload_nhac/DNA.mp3',NULL,'2017-11-28',7337),(196,36,1,24,5,1,21,'Con chim non','con chim non','upload_nhac/DNA.mp3',NULL,'2017-12-01',83767),(197,29,1,24,2,1,23,'hihi','hihi','upload_nhac/DNA.mp3',NULL,'2017-12-01',67319),(198,29,1,24,2,1,23,'kjgh','kjgh','upload_nhac/DNA.mp3','kjh','2017-12-01',11518);
/*!40000 ALTER TABLE `bai_hat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ca_si`
--

DROP TABLE IF EXISTS `ca_si`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ca_si` (
  `ma_ca_si` int(11) NOT NULL AUTO_INCREMENT,
  `ten_ca_si` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cs_order` int(3) NOT NULL DEFAULT '1',
  `display` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ma_ca_si`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ca_si`
--

LOCK TABLES `ca_si` WRITE;
/*!40000 ALTER TABLE `ca_si` DISABLE KEYS */;
INSERT INTO `ca_si` VALUES (1,'Red Velvet','rv.jpg',1,1),(2,'BTS','bts.jpg',3,1),(7,'Nguyễn Hồng Nhung','hongocha.jpg',4,1),(29,'Chưa xác định','noimage.jpg',0,0),(36,'Lệ Quyên','lequyen.jpg',1,1),(37,'Quang Dũng','quangdung.jpg',1,1),(38,'Phi Nhung','phinhung1.jpg',1,1),(39,'Cẩm Ly','hansare.jpg',1,1),(40,'Trọng Tấn','trongtan.jpg',1,1),(41,'Thu hiền','baoanh.jpg',1,1);
/*!40000 ALTER TABLE `ca_si` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chatbox`
--

DROP TABLE IF EXISTS `chatbox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chatbox` (
  `chatid` int(11) NOT NULL AUTO_INCREMENT,
  `ym_nick` varchar(30) NOT NULL,
  `nicktmp` varchar(11) NOT NULL,
  `noidung` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diachi_ip` varchar(15) NOT NULL,
  PRIMARY KEY (`chatid`)
) ENGINE=MyISAM AUTO_INCREMENT=206 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatbox`
--

LOCK TABLES `chatbox` WRITE;
/*!40000 ALTER TABLE `chatbox` DISABLE KEYS */;
INSERT INTO `chatbox` VALUES (180,'star_in_myheart2004','MS_17','Vua online roi do.','127.0.0.1'),(179,'star_in_myheart2004','MS_17','chat chit ty cho do buon nhi?','127.0.0.1'),(178,'star_in_myheart2004','MS_17','xin chao ca nha','127.0.0.1'),(181,'dv.spyware','MS_18','the ha?','127.0.0.1'),(182,'dv.spyware','MS_18','thich nhi?','127.0.0.1'),(183,'dv.spyware','MS_18','giá» má»›i lÃ  chuáº©n','127.0.0.1'),(184,'dv.spyware','MS_18','giá» lÃ m sao Ä‘á»ƒ má»—i láº§n','127.0.0.1'),(185,'dv.spyware','MS_18','náº¿u cÃ³ ngÆ°á»i nháº¯n thÃ¬ hiá»‡n lÃªn luÃ´n','127.0.0.1'),(186,'dv.spyware','MS_18','mÃ¬nh khÃ´ng nháº¥n nÃ³ váº«n hiá»‡n!','127.0.0.1'),(187,'dv.spyware','MS_18','Ä‘Ã³ má»›i lÃ  váº¥n Ä‘á» quan trá»ng','127.0.0.1'),(188,'dv.spyware','MS_18','10 tin thÃ¬ tá»± nÃ³ há»§y','127.0.0.1'),(189,'dv.spyware','MS_18','mot bon nam sao bay moi acy cp','127.0.0.1'),(190,'dv.spyware','MS_18','ma nd mai mgyn lang laingl nglia lging lang','127.0.0.1'),(191,'dv.spyware','MS_18','mg iang laing laing la cong lang cong laing','127.0.0.1'),(192,'dv.spyware','MS_18','12 34 567 89 12 34 56 78 90 04 55','127.0.0.1'),(193,'dv.spyware','MS_18','cong hoa xa hoi chu nghia viet nam doc l','127.0.0.1'),(194,'dv.spyware','MS_18','CONG HOA XA HOI CHU NGHIA VIET NAM DOC L','127.0.0.1'),(195,'dv.spyware','MS_18','Cá»˜NG HÃ’A XÃƒ Há»˜I CHá»¦ NGHÄ¨A VIá»†T','127.0.0.1'),(196,'dv.spyware','MS_18','á»«m, nhÆ°ng mÃ  mÃ£i cÅ©ng chÃ¡n láº¯m','127.0.0.1'),(197,'dv.spyware','MS_18','láº¡i biáº¿n Ä‘Ã¢u máº¥t rá»“i','127.0.0.1'),(198,'dv.spyware','MS_18','chÃ¡n vÃ£i cáº£ hÃ ng há»','127.0.0.1'),(199,'dv.spyware','MS_18','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','127.0.0.1'),(200,'dv.spyware','MS_18','them thy nua la no dÃ¹n cÃ¡i áº±ng','127.0.0.1'),(201,'dv.spyware','MS_18','thÃ¬ mÃ¬nh se cÃ³ thÃªm khoáº£ng kho','127.0.0.1'),(202,'dv.spyware','MS_18','gian quÃ½ hÃ³a','127.0.0.1'),(203,'dv.spyware','MS_18','sáº¯p lÃªn rá»“i kÃ¬a','127.0.0.1'),(204,'dv.spyware','MS_18','vai hang','127.0.0.1'),(205,'abc','MS_21','heheheeeee','127.0.0.1');
/*!40000 ALTER TABLE `chatbox` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nguoi_dung`
--

DROP TABLE IF EXISTS `nguoi_dung`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nguoi_dung` (
  `ma_nguoi_dung` int(11) NOT NULL AUTO_INCREMENT,
  `ten_nguoi_dung` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten_dang_nhap` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `ngay_tham_gia` date NOT NULL DEFAULT '0000-00-00',
  `quyen_admin` tinyint(1) NOT NULL DEFAULT '0',
  `cam_su_dung` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ma_nguoi_dung`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nguoi_dung`
--

LOCK TABLES `nguoi_dung` WRITE;
/*!40000 ALTER TABLE `nguoi_dung` DISABLE KEYS */;
INSERT INTO `nguoi_dung` VALUES (17,'Admin','admin','123456','admin@yahoo.com','2016-10-31',1,0),(21,'Smile','Smile','123456','hoangyenhihi@yahoo.com','2016-10-31',0,0),(22,'Tuyet','Tuyet','123456','tuyet@gmail.com','2016-11-20',1,0),(23,'Trinh','Trinh','123456','trinh@gmail.com','2016-11-24',0,0),(24,'Trình Văn Dũng','trinhvandung','123456','tvdungkt@gmail.com','2017-10-31',0,0),(25,'Hoang Yen','hihihihii','123456','hoangyenhihi@gmail.com','2017-12-02',0,0);
/*!40000 ALTER TABLE `nguoi_dung` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhac_si`
--

DROP TABLE IF EXISTS `nhac_si`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nhac_si` (
  `ma_nhac_si` int(11) NOT NULL AUTO_INCREMENT,
  `ten_nhac_si` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT '1',
  `ns_order` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ma_nhac_si`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhac_si`
--

LOCK TABLES `nhac_si` WRITE;
/*!40000 ALTER TABLE `nhac_si` DISABLE KEYS */;
INSERT INTO `nhac_si` VALUES (1,'Văn Cao','473699_trinhcongson.jpg',1,1),(2,'Trần Tiến','655715_vancao.jpg',1,2),(3,'Trần Tiến','812985_trantien.jpg',1,3),(4,'Chưa xác định','',1,2);
/*!40000 ALTER TABLE `nhac_si` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quoc_gia`
--

DROP TABLE IF EXISTS `quoc_gia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quoc_gia` (
  `ma_quoc_gia` int(11) NOT NULL AUTO_INCREMENT,
  `ten_quoc_gia` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `qg_order` tinyint(3) NOT NULL,
  `display` tinyint(1) NOT NULL,
  PRIMARY KEY (`ma_quoc_gia`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quoc_gia`
--

LOCK TABLES `quoc_gia` WRITE;
/*!40000 ALTER TABLE `quoc_gia` DISABLE KEYS */;
INSERT INTO `quoc_gia` VALUES (1,'Nhạc Việt Nam',1,1),(2,'Nhạc Hàn Quốc',2,1),(4,'Nhật Bản',3,1);
/*!40000 ALTER TABLE `quoc_gia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `the_loai`
--

DROP TABLE IF EXISTS `the_loai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `the_loai` (
  `ma_the_loai` int(11) NOT NULL AUTO_INCREMENT,
  `ten_the_loai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tl_order` tinyint(3) NOT NULL,
  `display` tinyint(1) NOT NULL,
  PRIMARY KEY (`ma_the_loai`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `the_loai`
--

LOCK TABLES `the_loai` WRITE;
/*!40000 ALTER TABLE `the_loai` DISABLE KEYS */;
INSERT INTO `the_loai` VALUES (2,'rốc',1,1),(3,'Nhạc trữ tình',4,1),(5,'Nhạc cách mạng',3,1),(6,'Remix',1,1);
/*!40000 ALTER TABLE `the_loai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vshoutbox`
--

DROP TABLE IF EXISTS `vshoutbox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vshoutbox` (
  `shoutid` int(11) NOT NULL AUTO_INCREMENT,
  `sendername` varchar(100) NOT NULL,
  `senderemail` varchar(150) NOT NULL,
  `senderwww` varchar(200) NOT NULL,
  `messages` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0',
  `senderip` varchar(15) NOT NULL,
  PRIMARY KEY (`shoutid`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vshoutbox`
--

LOCK TABLES `vshoutbox` WRITE;
/*!40000 ALTER TABLE `vshoutbox` DISABLE KEYS */;
INSERT INTO `vshoutbox` VALUES (16,'tcgonline01','','','fdfd',1284919015,'127.0.0.1'),(15,'dfdf','','','fdfd',1284918959,'127.0.0.1'),(14,'dfd','','','df',1284918813,'127.0.0.1'),(13,'Tên b&#7841;n','','','d',1284917482,'127.0.0.1'),(11,'abc','','','chao',1284917259,'127.0.0.1'),(12,'aaaa','','','aaaa',1284917422,'127.0.0.1');
/*!40000 ALTER TABLE `vshoutbox` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-05 22:39:53
