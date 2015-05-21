CREATE DATABASE  IF NOT EXISTS `ecostat` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ecostat`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: ecostat
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
-- Table structure for table `q_sondage`
--

DROP TABLE IF EXISTS `q_sondage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `q_sondage` (
  `codeQ_sondage` int(11) NOT NULL,
  `codeSondage` int(11) NOT NULL,
  `libelleQuestion` varchar(30) NOT NULL,
  PRIMARY KEY (`codeQ_sondage`),
  KEY `codesondage_fk1_idx` (`codeSondage`),
  CONSTRAINT `codesondage_fk1` FOREIGN KEY (`codeSondage`) REFERENCES `sondage` (`idSondage`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `q_sondage`
--

LOCK TABLES `q_sondage` WRITE;
/*!40000 ALTER TABLE `q_sondage` DISABLE KEYS */;
INSERT INTO `q_sondage` VALUES (1,1,'Aimes-tu les frites ?'),(2,1,'Aimes tu les burgers ?'),(3,1,'Je te niques'),(4,2,'Aimes-tu les pizzas ?');
/*!40000 ALTER TABLE `q_sondage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sondage`
--

DROP TABLE IF EXISTS `sondage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sondage` (
  `idSondage` int(11) NOT NULL,
  `libelleSondage` varchar(40) NOT NULL,
  PRIMARY KEY (`idSondage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sondage`
--

LOCK TABLES `sondage` WRITE;
/*!40000 ALTER TABLE `sondage` DISABLE KEYS */;
INSERT INTO `sondage` VALUES (1,'PC'),(2,'Nutrition');
/*!40000 ALTER TABLE `sondage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_sondage`
--

DROP TABLE IF EXISTS `tb_sondage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_sondage` (
  `id_reponse` int(11) NOT NULL AUTO_INCREMENT,
  `compteur` bigint(20) NOT NULL DEFAULT '0',
  `libelle` varchar(255) NOT NULL DEFAULT '',
  `codeQ_sondage` int(11) NOT NULL,
  PRIMARY KEY (`id_reponse`),
  KEY `codeQ_sondage_fk1_idx` (`codeQ_sondage`),
  CONSTRAINT `codeQ_sondage_fk1` FOREIGN KEY (`codeQ_sondage`) REFERENCES `q_sondage` (`codeQ_sondage`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_sondage`
--

LOCK TABLES `tb_sondage` WRITE;
/*!40000 ALTER TABLE `tb_sondage` DISABLE KEYS */;
INSERT INTO `tb_sondage` VALUES (1,1,'Oui',1),(2,1,'Non',1),(3,0,'Fou',2),(4,1,'Bou',2),(5,0,'Sérieux ?',3),(6,0,'Tu rêves.',3),(7,0,'Yes',4),(8,1,'No',4),(9,1,'HTHT',4),(10,4,'Fou',3);
/*!40000 ALTER TABLE `tb_sondage` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-21 14:45:43
