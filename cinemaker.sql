-- Progettazione Web 
DROP DATABASE if exists cinemaker; 
CREATE DATABASE cinemaker; 
USE cinemaker; 
-- MySQL dump 10.13  Distrib 5.6.20, for Win32 (x86)
--
-- Host: localhost    Database: cinemaker
-- ------------------------------------------------------
-- Server version	5.6.20

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
-- Table structure for table `cinema`
--

DROP TABLE IF EXISTS `cinema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cinema` (
  `nome` varchar(64) NOT NULL,
  `sale` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cinema`
--

LOCK TABLES `cinema` WRITE;
/*!40000 ALTER TABLE `cinema` DISABLE KEYS */;
INSERT INTO `cinema` VALUES ('Il Cinemino',4);
/*!40000 ALTER TABLE `cinema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movies` (
  `id` int(64) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `genre` varchar(256) DEFAULT NULL,
  `cast` varchar(1024) DEFAULT NULL,
  `director` varchar(256) DEFAULT NULL,
  `description` text,
  `duration` int(11) DEFAULT NULL,
  `cover` varchar(256) DEFAULT NULL,
  `onair` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies`
--

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
INSERT INTO `movies` VALUES (10,'SPIDER-MAN: FAR FROM HOME','Animazione, Avventura, Fantascienza','Tom Holland, Jake Gyllenhaal, Zendaya','Jon Watts','In seguito agli eventi di Avengers: Endgame, Spider-Man deve rafforzarsi per affrontare nuove minacce in un mondo che non Ã¨ piÃ¹ quello di prima.\"Il nostro amichevole Spider-Man di quartiere\" decide di partire per una vacanza in Europa con i suoi migliori amici Ned, MJ e con il resto del gruppo. I propositi di Peter di non indossare i panni del supereroe per alcune settimane vengono meno quando decide, a malincuore, di aiutare Nick Fury a svelare il mistero degli attacchi di creature elementali che stanno creando scompiglio in tutto il continente.',124,'img_5d5e50500d4bd',1);
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `screening_id` int(11) NOT NULL,
  `seat` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (4,12,5,'14D'),(5,12,5,'9F'),(8,12,5,'8D'),(9,12,5,'6F'),(11,13,24,'8H'),(13,12,16,'13D'),(14,12,16,'3F');
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sale`
--

DROP TABLE IF EXISTS `sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `seats_no` int(11) NOT NULL,
  `rows` int(11) NOT NULL,
  `cols` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sale`
--

LOCK TABLES `sale` WRITE;
/*!40000 ALTER TABLE `sale` DISABLE KEYS */;
INSERT INTO `sale` VALUES (1,'Cesare',270,15,18),(2,'Caio',230,0,0);
/*!40000 ALTER TABLE `sale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `screenings`
--

DROP TABLE IF EXISTS `screenings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `screenings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) NOT NULL,
  `sala_id` int(11) NOT NULL,
  `screening_start` datetime DEFAULT NULL,
  `nReservations` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Screening_ak_1` (`movie_id`,`sala_id`,`screening_start`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `screenings`
--

LOCK TABLES `screenings` WRITE;
/*!40000 ALTER TABLE `screenings` DISABLE KEYS */;
INSERT INTO `screenings` VALUES (2,10,1,'2019-08-21 13:30:00',0),(4,10,1,'2019-08-20 16:30:00',0),(5,10,1,'2019-08-29 13:30:00',0),(10,10,1,'2019-08-28 13:30:00',0),(14,10,1,'2019-08-22 13:30:00',0),(16,10,1,'2019-08-30 13:30:00',0),(23,10,1,'2019-08-28 15:00:00',0),(24,10,1,'2019-08-28 11:33:00',0),(25,10,1,'2019-08-21 12:22:00',0),(26,10,1,'2019-08-23 12:22:00',0),(27,10,1,'2019-08-29 16:00:00',0),(28,21,2,'2019-08-25 15:00:00',0),(29,10,1,'2019-08-30 16:00:00',0);
/*!40000 ALTER TABLE `screenings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upload`
--

DROP TABLE IF EXISTS `upload`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `upload` (
  `uidimg` varchar(256) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` int(255) NOT NULL,
  `type` varchar(256) NOT NULL,
  `location` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upload`
--

LOCK TABLES `upload` WRITE;
/*!40000 ALTER TABLE `upload` DISABLE KEYS */;
INSERT INTO `upload` VALUES ('img_5d5bff0928c3a','img_5d5bff0928c3a',86689,'image/jpeg','C:\\pweb\\tools\\xampp\\htdocs\\cinemaker/res/upload/img_5d5bff0928c3a'),('img_5d5c032b089f5','dante3.jpg',86689,'image/jpeg','C:\\pweb\\tools\\xampp\\htdocs\\cinemaker/res/upload/dante3.jpg'),('img_5d5c035b72a89','dante3.jpg',86689,'image/jpeg','C:\\pweb\\tools\\xampp\\htdocs\\cinemaker/res/upload/dante3.jpg'),('img_5d5c040547e5c','dante3.jpg',86689,'image/jpeg','C:\\pweb\\tools\\xampp\\htdocs\\cinemaker/res/uploaddante3img_5d5c0405477e1jpg'),('img_5d5c04656384a','dante3.jpg',86689,'image/jpeg','C:\\pweb\\tools\\xampp\\htdocs\\cinemaker/res/uploaddante3img_5d5c0465631bdjpg'),('img_5d5c048d076c2','dante3.jpg',86689,'image/jpeg','dante3img_5d5c048d06f32.jpg'),('img_5d5c0cc98dbad','dante4.jpg',535989,'image/jpeg','C:\\pweb\\tools\\xampp\\htdocs\\cinemaker/res/upload/dante4.jpg'),('img_5d5c0cf177415','dante4.jpg',535989,'image/jpeg','res/upload/5d5c0cf176877dante4.jpg'),('img_5d5c0d6849a29','dante4.jpg',535989,'image/jpeg','res/upload/5d5c0d6849276dante4.jpg'),('img_5d5e50500d4bd','spiderman.jpg',418512,'image/jpeg','res/upload/5d5e50500d203spiderman.jpg');
/*!40000 ALTER TABLE `upload` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `password` varchar(100) NOT NULL,
  `idavatar` varchar(256) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (12,'admin','admins@email.it','Admin','$2y$10$Pnlhd9KgKTJkMEOjIfmQsusj8MBF9TKXYUqB7up4Ndcb6gP65CM6e','',1),(13,'KlitonMito','klitonfx@gmail.com','Kliton Genio Bare','$2y$10$qO/qUB8K3oE0JTU8hBla7eAhu6bxzqi0wKUD2CBZw8ckETMt3b6cS','',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-06 19:34:56
