-- MySQL dump 10.13  Distrib 5.7.36, for osx10.16 (x86_64)
--
-- Host: localhost    Database: oct0_local
-- ------------------------------------------------------
-- Server version	5.7.36

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
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `active` int(1) unsigned NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `object` int(10) unsigned DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `rank` int(10) unsigned DEFAULT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'jpg',
  `caption` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `objects`
--

DROP TABLE IF EXISTS `objects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `objects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `active` int(1) unsigned NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `rank` int(10) unsigned DEFAULT NULL,
  `name1` tinytext,
  `name2` tinytext,
  `address1` text,
  `address2` text,
  `city` tinytext,
  `state` tinytext,
  `zip` tinytext,
  `country` tinytext,
  `phone` tinytext,
  `fax` tinytext,
  `url` tinytext,
  `email` tinytext,
  `begin` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `head` tinytext,
  `deck` mediumblob,
  `body` mediumblob,
  `notes` mediumblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objects`
--

LOCK TABLES `objects` WRITE;
/*!40000 ALTER TABLE `objects` DISABLE KEYS */;
INSERT INTO `objects` VALUES (1,1,'2021-12-17 15:51:08','2021-12-17 18:12:35',NULL,'0.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,_binary '\r\n																								<br>',_binary '\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								OCT0 produces new ideas and new works, together with artists, writers, film-makers and everybody else we might find interesting: in, beyond and in-between the often rigid economies and formats of exhibitions, buildings, institutions, plays, performance, film, music or publishing.&nbsp;\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								',_binary '\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								'),(2,1,'2021-12-17 15:51:15','2021-12-17 18:12:44',NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,NULL,_binary '\r\n																								<br>',_binary '\r\n																								\r\n																								OCT0 works carefully, sometimes on 8 things at the same time, sometimes on one idea for months, for years and sometimes not at all.\r\n																								\r\n																								\r\n																								',_binary '\r\n																								\r\n																								\r\n																								\r\n																								\r\n																								'),(3,1,'2021-12-17 15:51:41','2021-12-17 18:12:15',NULL,'2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2',NULL,NULL,NULL,NULL,NULL,_binary '\r\n																								\r\n																								<div><br></div>\r\n																								',_binary '\r\n																								\r\n																								<div>OCT0 is as critical as it is poetic.&nbsp;</div>\r\n																								',_binary '\r\n																								\r\n																								\r\n																								'),(4,1,'2021-12-17 15:51:55','2021-12-17 18:12:23',NULL,'3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'3',NULL,NULL,NULL,NULL,NULL,_binary '\r\n																								\r\n																								<div><br></div>\r\n																								',_binary 'You might find us here or elsewhere: inside a cave or at sea, in a city or a tree. there are many of us, but always two.&nbsp;\r\n																								',_binary '\r\n																								\r\n																								\r\n																								'),(5,1,'2021-12-17 15:52:01','2021-12-17 18:13:02',NULL,'4',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'4',NULL,NULL,NULL,NULL,NULL,_binary '\r\n																								<br>',_binary '\r\n																								\r\n																								OCT0 looks from the distance towards the centre, observing the awkward attempts to return to a status quo that has failed most and in the process alienates all those that are not prepared to play along.&nbsp;\r\n																								',_binary '\r\n																								\r\n																								\r\n																								'),(6,1,'2021-12-17 15:52:05','2021-12-17 18:13:09',NULL,'5',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'5',NULL,NULL,NULL,NULL,NULL,_binary '\r\n																								<br>',_binary 'Art is engaging with society.\r\n																								',_binary '\r\n																								\r\n																								\r\n																								'),(7,1,'2021-12-17 15:52:10','2021-12-17 18:13:19',NULL,'6',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'6',NULL,NULL,NULL,NULL,NULL,_binary '\r\n																								\r\n																								<div><br></div>\r\n																								',_binary '\r\n																								\r\n																								<div>So here we are, not giving up, we know we are not alone in our search for and work to recover urgency, integrity and meaning.&nbsp;</div>\r\n																								',_binary '\r\n																								\r\n																								\r\n																								'),(8,1,'2021-12-17 15:52:14','2021-12-17 18:13:27',NULL,'7',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'7',NULL,NULL,NULL,NULL,NULL,_binary '\r\n																								<br>',_binary 'Yet, resistance isn’t something you join, it’s who you are.\r\n																								',_binary '\r\n																								\r\n																								\r\n																								');
/*!40000 ALTER TABLE `objects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wires`
--

DROP TABLE IF EXISTS `wires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wires` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `active` int(1) unsigned NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `fromid` int(10) unsigned DEFAULT NULL,
  `toid` int(10) unsigned DEFAULT NULL,
  `weight` float NOT NULL DEFAULT '1',
  `notes` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wires`
--

LOCK TABLES `wires` WRITE;
/*!40000 ALTER TABLE `wires` DISABLE KEYS */;
INSERT INTO `wires` VALUES (1,1,'2021-12-17 15:51:08','2021-12-17 15:51:08',0,1,1,NULL),(2,1,'2021-12-17 15:51:15','2021-12-17 15:51:15',0,2,1,NULL),(3,1,'2021-12-17 15:51:41','2021-12-17 15:51:41',0,3,1,NULL),(4,1,'2021-12-17 15:51:55','2021-12-17 15:51:55',0,4,1,NULL),(5,1,'2021-12-17 15:52:01','2021-12-17 15:52:01',0,5,1,NULL),(6,1,'2021-12-17 15:52:05','2021-12-17 15:52:05',0,6,1,NULL),(7,1,'2021-12-17 15:52:10','2021-12-17 15:52:10',0,7,1,NULL),(8,1,'2021-12-17 15:52:14','2021-12-17 15:52:14',0,8,1,NULL);
/*!40000 ALTER TABLE `wires` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-20 15:34:47
