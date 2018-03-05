-- MySQL dump 10.16  Distrib 10.1.28-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: admindb
-- ------------------------------------------------------
-- Server version	10.1.28-MariaDB

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
-- Table structure for table `tb1`
--

DROP TABLE IF EXISTS `tb1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb1` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `adminid` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `adminid` (`adminid`),
  CONSTRAINT `tb1_ibfk_1` FOREIGN KEY (`adminid`) REFERENCES `tbl_admin` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb1`
--

LOCK TABLES `tb1` WRITE;
/*!40000 ALTER TABLE `tb1` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pin` int(5) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `picpath` varchar(1000) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_admin`
--

LOCK TABLES `tbl_admin` WRITE;
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;
INSERT INTO `tbl_admin` VALUES (29,'jan','$2a$07$usesomassodosrkeoaol1eG5TqX62FmoPhsjEvWPcsow7tya56soS',12345,'','',''),(38,'davidwithmore1','$2a$07$usesomassodosrkeoaol1epuiEmURaoNzFAsxtfynv3FI8.SiqbUS',12345,'','',''),(39,'jet','$2a$07$usesomassodosrkeoaol1eHmjsDfkzkUy5LbfQsB1MnymH3UCAUOq',12345,'','',''),(41,'melchor','$2a$07$usesomassodosrkeoaol1eRXOlN0/IAe7D0Lk.s45CyIL8E5/8RTG',12345,'','',''),(43,'hahahaha','$2a$07$usesomassodosrkeoaol1eTyM7Gw9tYDSXs/TltLq9qIGPLr03rqW',12345,'','',''),(44,'karl','$2a$07$usesomassodosrkeoaol1enINXLYH7lJBDNKEt6YqcDdTVGUJmCPG',12345,'','picache','');
/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_admin_disable`
--

DROP TABLE IF EXISTS `tbl_admin_disable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_admin_disable` (
  `id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pin` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_admin_disable`
--

LOCK TABLES `tbl_admin_disable` WRITE;
/*!40000 ALTER TABLE `tbl_admin_disable` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_admin_disable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bestseller`
--

DROP TABLE IF EXISTS `tbl_bestseller`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bestseller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bestseller`
--

LOCK TABLES `tbl_bestseller` WRITE;
/*!40000 ALTER TABLE `tbl_bestseller` DISABLE KEYS */;
INSERT INTO `tbl_bestseller` VALUES (1,'zxczvxvxzv','pexels-photo-434252.jpeg','askjaskjalkdjadkjadlkajdalkjalkjadkjadlkajdlkajd',11111.00,'img/home/bestsellerimages/pexels-photo-434252.jpeg');
/*!40000 ALTER TABLE `tbl_bestseller` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_filter`
--

DROP TABLE IF EXISTS `tbl_filter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_filter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pin` int(5) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `timecreated` varchar(25) DEFAULT NULL,
  `platform` varchar(20) DEFAULT NULL,
  `ip` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `isp` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_filter`
--

LOCK TABLES `tbl_filter` WRITE;
/*!40000 ALTER TABLE `tbl_filter` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_filter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_gallery_album_adadagga`
--

DROP TABLE IF EXISTS `tbl_gallery_album_adadagga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_gallery_album_adadagga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_gallery_album_adadagga`
--

LOCK TABLES `tbl_gallery_album_adadagga` WRITE;
/*!40000 ALTER TABLE `tbl_gallery_album_adadagga` DISABLE KEYS */;
INSERT INTO `tbl_gallery_album_adadagga` VALUES (1,'img/gallery/adadagga/3e60e955c079b28e6286bcf412f1a104.jpg'),(2,'img/gallery/adadagga/3e71a39fd899f1adb5ce26120a7f498b.jpg'),(3,'img/gallery/adadagga/26133865_1895578693789069_531244832_o.jpg'),(4,'img/gallery/adadagga/26134033_1895578743789064_1555712201_o.jpg'),(5,'img/gallery/adadagga/26142449_1895578673789071_1713896662_o.jpg'),(6,'img/gallery/adadagga/26178439_1895578783789060_2090699188_o.jpg'),(7,'img/gallery/adadagga/26178999_1895578677122404_1086679381_o.jpg');
/*!40000 ALTER TABLE `tbl_gallery_album_adadagga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_gallery_album_asdaasad`
--

DROP TABLE IF EXISTS `tbl_gallery_album_asdaasad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_gallery_album_asdaasad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_gallery_album_asdaasad`
--

LOCK TABLES `tbl_gallery_album_asdaasad` WRITE;
/*!40000 ALTER TABLE `tbl_gallery_album_asdaasad` DISABLE KEYS */;
INSERT INTO `tbl_gallery_album_asdaasad` VALUES (1,'img/gallery/asdaasad/3e60e955c079b28e6286bcf412f1a104.jpg'),(2,'img/gallery/asdaasad/3e71a39fd899f1adb5ce26120a7f498b.jpg');
/*!40000 ALTER TABLE `tbl_gallery_album_asdaasad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_gallery_album_asfasfasf`
--

DROP TABLE IF EXISTS `tbl_gallery_album_asfasfasf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_gallery_album_asfasfasf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_gallery_album_asfasfasf`
--

LOCK TABLES `tbl_gallery_album_asfasfasf` WRITE;
/*!40000 ALTER TABLE `tbl_gallery_album_asfasfasf` DISABLE KEYS */;
INSERT INTO `tbl_gallery_album_asfasfasf` VALUES (1,'img/gallery/ASFASFASF/pexels-photo-460663 (3).jpeg'),(2,'img/gallery/ASFASFASF/pexels-photo-460663.jpeg'),(3,'img/gallery/ASFASFASF/pexels-photo-585754.jpeg'),(4,'img/gallery/ASFASFASF/pexels-photo-460663 (3).jpeg'),(5,'img/gallery/ASFASFASF/pexels-photo-460663.jpeg'),(6,'img/gallery/ASFASFASF/pexels-photo-585754.jpeg');
/*!40000 ALTER TABLE `tbl_gallery_album_asfasfasf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_gallery_album_hahaha`
--

DROP TABLE IF EXISTS `tbl_gallery_album_hahaha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_gallery_album_hahaha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_gallery_album_hahaha`
--

LOCK TABLES `tbl_gallery_album_hahaha` WRITE;
/*!40000 ALTER TABLE `tbl_gallery_album_hahaha` DISABLE KEYS */;
INSERT INTO `tbl_gallery_album_hahaha` VALUES (1,'img/gallery/HAHAHA/pexels-photo-460663 (2).jpeg'),(2,'img/gallery/HAHAHA/pexels-photo-460663 (3).jpeg'),(3,'img/gallery/HAHAHA/pexels-photo-460663.jpeg'),(4,'img/gallery/HAHAHA/pexels-photo-585754.jpeg');
/*!40000 ALTER TABLE `tbl_gallery_album_hahaha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_gallery_album_hahahaha`
--

DROP TABLE IF EXISTS `tbl_gallery_album_hahahaha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_gallery_album_hahahaha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_gallery_album_hahahaha`
--

LOCK TABLES `tbl_gallery_album_hahahaha` WRITE;
/*!40000 ALTER TABLE `tbl_gallery_album_hahahaha` DISABLE KEYS */;
INSERT INTO `tbl_gallery_album_hahahaha` VALUES (1,'img/gallery/HAHAHAHA/pexels-photo-460663 (3).jpeg'),(2,'img/gallery/HAHAHAHA/pexels-photo-460663.jpeg'),(3,'img/gallery/HAHAHAHA/pexels-photo-585754.jpeg'),(4,'img/gallery/hahahaha/3e60e955c079b28e6286bcf412f1a104.jpg'),(5,'img/gallery/hahahaha/3e71a39fd899f1adb5ce26120a7f498b.jpg');
/*!40000 ALTER TABLE `tbl_gallery_album_hahahaha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_gallery_album_helloworld`
--

DROP TABLE IF EXISTS `tbl_gallery_album_helloworld`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_gallery_album_helloworld` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_gallery_album_helloworld`
--

LOCK TABLES `tbl_gallery_album_helloworld` WRITE;
/*!40000 ALTER TABLE `tbl_gallery_album_helloworld` DISABLE KEYS */;
INSERT INTO `tbl_gallery_album_helloworld` VALUES (1,'img/gallery/helloworld/pexels-photo-460663 (2).jpeg'),(2,'img/gallery/helloworld/pexels-photo-460663 (3).jpeg'),(3,'img/gallery/helloworld/pexels-photo-460663.jpeg'),(4,'img/gallery/helloworld/pexels-photo-585754.jpeg');
/*!40000 ALTER TABLE `tbl_gallery_album_helloworld` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_gallery_album_title`
--

DROP TABLE IF EXISTS `tbl_gallery_album_title`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_gallery_album_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_gallery_album_title`
--

LOCK TABLES `tbl_gallery_album_title` WRITE;
/*!40000 ALTER TABLE `tbl_gallery_album_title` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_gallery_album_title` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_gallery_album_title_hahaha`
--

DROP TABLE IF EXISTS `tbl_gallery_album_title_hahaha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_gallery_album_title_hahaha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_gallery_album_title_hahaha`
--

LOCK TABLES `tbl_gallery_album_title_hahaha` WRITE;
/*!40000 ALTER TABLE `tbl_gallery_album_title_hahaha` DISABLE KEYS */;
INSERT INTO `tbl_gallery_album_title_hahaha` VALUES (1,'HAHAHA');
/*!40000 ALTER TABLE `tbl_gallery_album_title_hahaha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_gallery_album_yesyesyes`
--

DROP TABLE IF EXISTS `tbl_gallery_album_yesyesyes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_gallery_album_yesyesyes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_gallery_album_yesyesyes`
--

LOCK TABLES `tbl_gallery_album_yesyesyes` WRITE;
/*!40000 ALTER TABLE `tbl_gallery_album_yesyesyes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_gallery_album_yesyesyes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ktvdescription`
--

DROP TABLE IF EXISTS `tbl_ktvdescription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_ktvdescription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `terms` varchar(255) NOT NULL,
  `reservation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ktvdescription`
--

LOCK TABLES `tbl_ktvdescription` WRITE;
/*!40000 ALTER TABLE `tbl_ktvdescription` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_ktvdescription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ktvrooms`
--

DROP TABLE IF EXISTS `tbl_ktvrooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_ktvrooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ktvrooms`
--

LOCK TABLES `tbl_ktvrooms` WRITE;
/*!40000 ALTER TABLE `tbl_ktvrooms` DISABLE KEYS */;
INSERT INTO `tbl_ktvrooms` VALUES (1,'Room 1','img/services/ktvrooms/ktv1.jpg'),(2,'Room 2','img/services/ktvrooms/ktv2.jpg'),(3,'Room 3','img/services/ktvrooms/ktv3.jpg');
/*!40000 ALTER TABLE `tbl_ktvrooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_martinas`
--

DROP TABLE IF EXISTS `tbl_martinas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_martinas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_martinas`
--

LOCK TABLES `tbl_martinas` WRITE;
/*!40000 ALTER TABLE `tbl_martinas` DISABLE KEYS */;
INSERT INTO `tbl_martinas` VALUES (1,'Martinas image 1','img/services/martinas/martinas1.JPG'),(2,'Martinas image 2','img/services/martinas/martinas2.JPG');
/*!40000 ALTER TABLE `tbl_martinas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_martinasdescription`
--

DROP TABLE IF EXISTS `tbl_martinasdescription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_martinasdescription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `terms` varchar(255) NOT NULL,
  `reservation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_martinasdescription`
--

LOCK TABLES `tbl_martinasdescription` WRITE;
/*!40000 ALTER TABLE `tbl_martinasdescription` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_martinasdescription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu_burgerandsandwiches`
--

DROP TABLE IF EXISTS `tbl_menu_burgerandsandwiches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu_burgerandsandwiches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu_burgerandsandwiches`
--

LOCK TABLES `tbl_menu_burgerandsandwiches` WRITE;
/*!40000 ALTER TABLE `tbl_menu_burgerandsandwiches` DISABLE KEYS */;
INSERT INTO `tbl_menu_burgerandsandwiches` VALUES (1,'dsfdgdfhgfh','pexels-photo-434252.jpeg','wegtrhrtger',1000000.00,'img/menu/foods/burgersandsandwiches/pexels-photo-434252.jpeg');
/*!40000 ALTER TABLE `tbl_menu_burgerandsandwiches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu_cakes`
--

DROP TABLE IF EXISTS `tbl_menu_cakes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu_cakes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu_cakes`
--

LOCK TABLES `tbl_menu_cakes` WRITE;
/*!40000 ALTER TABLE `tbl_menu_cakes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_menu_cakes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu_cocktails`
--

DROP TABLE IF EXISTS `tbl_menu_cocktails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu_cocktails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu_cocktails`
--

LOCK TABLES `tbl_menu_cocktails` WRITE;
/*!40000 ALTER TABLE `tbl_menu_cocktails` DISABLE KEYS */;
INSERT INTO `tbl_menu_cocktails` VALUES (1,'gteshaerg','pexels-photo-460663.jpeg','g4gwagsgrvewag',31331232.00,'img/menu/drinks/cocktails/pexels-photo-460663.jpeg');
/*!40000 ALTER TABLE `tbl_menu_cocktails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu_dessert`
--

DROP TABLE IF EXISTS `tbl_menu_dessert`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu_dessert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu_dessert`
--

LOCK TABLES `tbl_menu_dessert` WRITE;
/*!40000 ALTER TABLE `tbl_menu_dessert` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_menu_dessert` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu_frapuccino`
--

DROP TABLE IF EXISTS `tbl_menu_frapuccino`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu_frapuccino` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu_frapuccino`
--

LOCK TABLES `tbl_menu_frapuccino` WRITE;
/*!40000 ALTER TABLE `tbl_menu_frapuccino` DISABLE KEYS */;
INSERT INTO `tbl_menu_frapuccino` VALUES (1,'asskjaslkdjalksdj','pexels-photo-434252.jpeg','AKLJDLKHFSDLKXJFCAKH',10000.00,'img/menu/drinks/frapuccino/pexels-photo-434252.jpeg');
/*!40000 ALTER TABLE `tbl_menu_frapuccino` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu_fruittea`
--

DROP TABLE IF EXISTS `tbl_menu_fruittea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu_fruittea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu_fruittea`
--

LOCK TABLES `tbl_menu_fruittea` WRITE;
/*!40000 ALTER TABLE `tbl_menu_fruittea` DISABLE KEYS */;
INSERT INTO `tbl_menu_fruittea` VALUES (1,'shrewge','pexels-photo-434252.jpeg','aSfwSFDCzdaFzv',2352324.00,'img/menu/drinks/fruittea/pexels-photo-434252.jpeg');
/*!40000 ALTER TABLE `tbl_menu_fruittea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu_groupmeals`
--

DROP TABLE IF EXISTS `tbl_menu_groupmeals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu_groupmeals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu_groupmeals`
--

LOCK TABLES `tbl_menu_groupmeals` WRITE;
/*!40000 ALTER TABLE `tbl_menu_groupmeals` DISABLE KEYS */;
INSERT INTO `tbl_menu_groupmeals` VALUES (1,'FDCGCASDCFDXV','pexels-photo-434252.jpeg','FDFGBGFXXFCSZF',11312312.00,'img/menu/foods/groupmeals/pexels-photo-434252.jpeg');
/*!40000 ALTER TABLE `tbl_menu_groupmeals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu_hotdrinks`
--

DROP TABLE IF EXISTS `tbl_menu_hotdrinks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu_hotdrinks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu_hotdrinks`
--

LOCK TABLES `tbl_menu_hotdrinks` WRITE;
/*!40000 ALTER TABLE `tbl_menu_hotdrinks` DISABLE KEYS */;
INSERT INTO `tbl_menu_hotdrinks` VALUES (1,'asdwgfvresdgvcszf','pexels-photo-434252.jpeg','AdxewasfdcSEDFCSDF',13124313.00,'img/menu/drinks/hotdrinks/pexels-photo-434252.jpeg');
/*!40000 ALTER TABLE `tbl_menu_hotdrinks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu_icedcoffee`
--

DROP TABLE IF EXISTS `tbl_menu_icedcoffee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu_icedcoffee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu_icedcoffee`
--

LOCK TABLES `tbl_menu_icedcoffee` WRITE;
/*!40000 ALTER TABLE `tbl_menu_icedcoffee` DISABLE KEYS */;
INSERT INTO `tbl_menu_icedcoffee` VALUES (1,'ASFSFSDF','pexels-photo-434213.jpeg','2EWASDCSGAD',1214316672.00,'img/menu/drinks/icedcoffee/pexels-photo-434213.jpeg');
/*!40000 ALTER TABLE `tbl_menu_icedcoffee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu_italliansoda`
--

DROP TABLE IF EXISTS `tbl_menu_italliansoda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu_italliansoda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu_italliansoda`
--

LOCK TABLES `tbl_menu_italliansoda` WRITE;
/*!40000 ALTER TABLE `tbl_menu_italliansoda` DISABLE KEYS */;
INSERT INTO `tbl_menu_italliansoda` VALUES (2,'adasda','pexels-photo-585754.jpeg','dadadad',1000.00,'img/menu/drinks/italiansoda/pexels-photo-585754.jpeg');
/*!40000 ALTER TABLE `tbl_menu_italliansoda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu_maincourse`
--

DROP TABLE IF EXISTS `tbl_menu_maincourse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu_maincourse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu_maincourse`
--

LOCK TABLES `tbl_menu_maincourse` WRITE;
/*!40000 ALTER TABLE `tbl_menu_maincourse` DISABLE KEYS */;
INSERT INTO `tbl_menu_maincourse` VALUES (1,'fdsdgfvdfcsdgvdfxsg','pexels-photo-434213.jpeg','fdgfgcszfsgsfd',12131.00,'img/menu/foods/maincourse/pexels-photo-434213.jpeg');
/*!40000 ALTER TABLE `tbl_menu_maincourse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu_milktea`
--

DROP TABLE IF EXISTS `tbl_menu_milktea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu_milktea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu_milktea`
--

LOCK TABLES `tbl_menu_milktea` WRITE;
/*!40000 ALTER TABLE `tbl_menu_milktea` DISABLE KEYS */;
INSERT INTO `tbl_menu_milktea` VALUES (1,'SDFDGDFGFD','pexels-photo-434213.jpeg','SFERGTRHWesdGFG',4514516.00,'img/menu/drinks/milktea/pexels-photo-434213.jpeg');
/*!40000 ALTER TABLE `tbl_menu_milktea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu_muffins`
--

DROP TABLE IF EXISTS `tbl_menu_muffins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu_muffins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu_muffins`
--

LOCK TABLES `tbl_menu_muffins` WRITE;
/*!40000 ALTER TABLE `tbl_menu_muffins` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_menu_muffins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu_pasta`
--

DROP TABLE IF EXISTS `tbl_menu_pasta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu_pasta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu_pasta`
--

LOCK TABLES `tbl_menu_pasta` WRITE;
/*!40000 ALTER TABLE `tbl_menu_pasta` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_menu_pasta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu_pizza`
--

DROP TABLE IF EXISTS `tbl_menu_pizza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu_pizza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu_pizza`
--

LOCK TABLES `tbl_menu_pizza` WRITE;
/*!40000 ALTER TABLE `tbl_menu_pizza` DISABLE KEYS */;
INSERT INTO `tbl_menu_pizza` VALUES (1,'ghngnhgngvfg','pexels-photo-434252.jpeg','dfgbgfhngfnbdfsgd',25456546.00,'img/menu/foods/pizza/pexels-photo-434252.jpeg');
/*!40000 ALTER TABLE `tbl_menu_pizza` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu_platter`
--

DROP TABLE IF EXISTS `tbl_menu_platter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu_platter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu_platter`
--

LOCK TABLES `tbl_menu_platter` WRITE;
/*!40000 ALTER TABLE `tbl_menu_platter` DISABLE KEYS */;
INSERT INTO `tbl_menu_platter` VALUES (1,'SDFGFDSDCV FFXFCDXFC','pexels-photo-434252.jpeg','WDSZDCSDV',13212412.00,'img/menu/foods/platter/pexels-photo-434252.jpeg');
/*!40000 ALTER TABLE `tbl_menu_platter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu_signaturedrinks`
--

DROP TABLE IF EXISTS `tbl_menu_signaturedrinks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu_signaturedrinks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu_signaturedrinks`
--

LOCK TABLES `tbl_menu_signaturedrinks` WRITE;
/*!40000 ALTER TABLE `tbl_menu_signaturedrinks` DISABLE KEYS */;
INSERT INTO `tbl_menu_signaturedrinks` VALUES (1,'ang baho','3e71a39fd899f1adb5ce26120a7f498b.jpg','ni with',99.76,'img/menu/drinks/signaturdrinks/3e71a39fd899f1adb5ce26120a7f498b.jpg'),(2,'dsa;lkdsa;ldks;ldk','3e60e955c079b28e6286bcf412f1a104.jpg','sa;ldks;dlks;ldks;lfjas;ldkfj',100000.00,'img/menu/drinks/signaturdrinks/3e60e955c079b28e6286bcf412f1a104.jpg'),(3,'zxzx','pexels-photo-585754.jpeg','aasadaz',100000.00,'img/menu/drinks/signaturdrinks/pexels-photo-585754.jpeg'),(4,'hahahahah','pexels-photo-585754.jpeg','hahaahahhaha',10000.00,'img/menu/drinks/signaturdrinks/pexels-photo-585754.jpeg');
/*!40000 ALTER TABLE `tbl_menu_signaturedrinks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu_smoothies`
--

DROP TABLE IF EXISTS `tbl_menu_smoothies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu_smoothies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu_smoothies`
--

LOCK TABLES `tbl_menu_smoothies` WRITE;
/*!40000 ALTER TABLE `tbl_menu_smoothies` DISABLE KEYS */;
INSERT INTO `tbl_menu_smoothies` VALUES (1,'ASFHYTGJDF','pexels-photo-434213.jpeg','EFGTYFJNWEYBRF',24456.00,'img/menu/drinks/smoothies/pexels-photo-434213.jpeg');
/*!40000 ALTER TABLE `tbl_menu_smoothies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu_soup`
--

DROP TABLE IF EXISTS `tbl_menu_soup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu_soup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu_soup`
--

LOCK TABLES `tbl_menu_soup` WRITE;
/*!40000 ALTER TABLE `tbl_menu_soup` DISABLE KEYS */;
INSERT INTO `tbl_menu_soup` VALUES (1,'fgn ghvgcbvdfxhbfgcv','pexels-photo-434213.jpeg','ghghcvdsfhxnbdgfxgf',2324224.00,'img/menu/foods/soup/pexels-photo-434213.jpeg');
/*!40000 ALTER TABLE `tbl_menu_soup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu_starter`
--

DROP TABLE IF EXISTS `tbl_menu_starter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu_starter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu_starter`
--

LOCK TABLES `tbl_menu_starter` WRITE;
/*!40000 ALTER TABLE `tbl_menu_starter` DISABLE KEYS */;
INSERT INTO `tbl_menu_starter` VALUES (1,'FDFHRTWASFDDTSF','pexels-photo-434252.jpeg','RDHVCDFG',121314.00,'img/menu/foods/starter/pexels-photo-434252.jpeg');
/*!40000 ALTER TABLE `tbl_menu_starter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu_yakultdrinks`
--

DROP TABLE IF EXISTS `tbl_menu_yakultdrinks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu_yakultdrinks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `price` float(50,2) NOT NULL,
  `path` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu_yakultdrinks`
--

LOCK TABLES `tbl_menu_yakultdrinks` WRITE;
/*!40000 ALTER TABLE `tbl_menu_yakultdrinks` DISABLE KEYS */;
INSERT INTO `tbl_menu_yakultdrinks` VALUES (1,'asafssdfsdf','pexels-photo-434213.jpeg','adscsdfsdf',1213122.00,'img/menu/drinks/yakultdrinks/pexels-photo-434213.jpeg');
/*!40000 ALTER TABLE `tbl_menu_yakultdrinks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_message`
--

DROP TABLE IF EXISTS `tbl_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_message`
--

LOCK TABLES `tbl_message` WRITE;
/*!40000 ALTER TABLE `tbl_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_newproduct`
--

DROP TABLE IF EXISTS `tbl_newproduct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_newproduct` (
  `newproductid` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`newproductid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_newproduct`
--

LOCK TABLES `tbl_newproduct` WRITE;
/*!40000 ALTER TABLE `tbl_newproduct` DISABLE KEYS */;
INSERT INTO `tbl_newproduct` VALUES (1,'img/home/featuredandnewimages/newfeatured1.jpg','featuredandnew.php','Our New Products','this is our new product one');
/*!40000 ALTER TABLE `tbl_newproduct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_promos`
--

DROP TABLE IF EXISTS `tbl_promos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_promos` (
  `promosid` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`promosid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_promos`
--

LOCK TABLES `tbl_promos` WRITE;
/*!40000 ALTER TABLE `tbl_promos` DISABLE KEYS */;
INSERT INTO `tbl_promos` VALUES (1,'img/home/promosimages/promo1.jpg','promos.php','Our Promos','this is our new promos');
/*!40000 ALTER TABLE `tbl_promos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_slider`
--

DROP TABLE IF EXISTS `tbl_slider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `path` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_slider`
--

LOCK TABLES `tbl_slider` WRITE;
/*!40000 ALTER TABLE `tbl_slider` DISABLE KEYS */;
INSERT INTO `tbl_slider` VALUES (29,'waper.jpg','','img/home/homepageslider/waper.jpg'),(30,'pexels-photo-585754.jpeg','','img/home/homepageslider/pexels-photo-585754.jpeg'),(31,'19904690_1393554577379817_1307651558_n.jpg','','img/home/homepageslider/19904690_1393554577379817_1307651558_n.jpg'),(32,'best-resignation-letter-sample-resignation-letter-template.jpg','','img/home/homepageslider/best-resignation-letter-sample-resignation-letter-template.jpg'),(33,'','','');
/*!40000 ALTER TABLE `tbl_slider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_slidercounter`
--

DROP TABLE IF EXISTS `tbl_slidercounter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_slidercounter` (
  `counter` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_slidercounter`
--

LOCK TABLES `tbl_slidercounter` WRITE;
/*!40000 ALTER TABLE `tbl_slidercounter` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_slidercounter` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-05  8:56:34
