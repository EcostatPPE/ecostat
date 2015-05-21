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
-- Table structure for table `enquete`
--

DROP TABLE IF EXISTS `enquete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enquete` (
  `CodeEnquete` int(11) NOT NULL,
  `libelleEnquete` varchar(50) NOT NULL,
  PRIMARY KEY (`CodeEnquete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enquete`
--

LOCK TABLES `enquete` WRITE;
/*!40000 ALTER TABLE `enquete` DISABLE KEYS */;
/*!40000 ALTER TABLE `enquete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_enq`
--

DROP TABLE IF EXISTS `ip_enq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_enq` (
  `ip` varchar(30) NOT NULL,
  `codeEnquete` int(11) NOT NULL,
  PRIMARY KEY (`ip`,`codeEnquete`),
  KEY `freg_fk1` (`codeEnquete`),
  CONSTRAINT `freg_fk1` FOREIGN KEY (`codeEnquete`) REFERENCES `enquete` (`CodeEnquete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_enq`
--

LOCK TABLES `ip_enq` WRITE;
/*!40000 ALTER TABLE `ip_enq` DISABLE KEYS */;
/*!40000 ALTER TABLE `ip_enq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_quizz`
--

DROP TABLE IF EXISTS `ip_quizz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_quizz` (
  `ip` varchar(30) NOT NULL,
  `codeQuizz` int(11) NOT NULL,
  PRIMARY KEY (`ip`,`codeQuizz`),
  KEY `frfr_fk1_idx` (`codeQuizz`),
  CONSTRAINT `frfr_fk1` FOREIGN KEY (`codeQuizz`) REFERENCES `quizz` (`codeQuizz`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_quizz`
--

LOCK TABLES `ip_quizz` WRITE;
/*!40000 ALTER TABLE `ip_quizz` DISABLE KEYS */;
/*!40000 ALTER TABLE `ip_quizz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_sond`
--

DROP TABLE IF EXISTS `ip_sond`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_sond` (
  `ip` varchar(30) NOT NULL,
  `codeQ_sondage` int(11) NOT NULL,
  `idSondage` int(11) NOT NULL,
  PRIMARY KEY (`ip`,`codeQ_sondage`,`idSondage`),
  KEY `ferfer_fk1_idx` (`codeQ_sondage`),
  KEY `fergr_fk1_idx` (`idSondage`),
  KEY `fdf_fk1_idx` (`codeQ_sondage`,`idSondage`),
  CONSTRAINT `de_fk1` FOREIGN KEY (`idSondage`) REFERENCES `q_sondage` (`codeSondage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `vgfrv_fk1` FOREIGN KEY (`codeQ_sondage`) REFERENCES `q_sondage` (`codeQ_sondage`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_sond`
--

LOCK TABLES `ip_sond` WRITE;
/*!40000 ALTER TABLE `ip_sond` DISABLE KEYS */;
INSERT INTO `ip_sond` VALUES ('::1',3,1);
/*!40000 ALTER TABLE `ip_sond` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `q_enquete`
--

DROP TABLE IF EXISTS `q_enquete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `q_enquete` (
  `codeQ_enquete` int(11) NOT NULL,
  `codeEnquete` int(11) NOT NULL,
  `libelleEnquete` varchar(40) NOT NULL,
  PRIMARY KEY (`codeQ_enquete`),
  KEY `fefe_fk1` (`codeEnquete`),
  CONSTRAINT `fefe_fk1` FOREIGN KEY (`codeEnquete`) REFERENCES `enquete` (`CodeEnquete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `q_enquete`
--

LOCK TABLES `q_enquete` WRITE;
/*!40000 ALTER TABLE `q_enquete` DISABLE KEYS */;
/*!40000 ALTER TABLE `q_enquete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `q_quizz`
--

DROP TABLE IF EXISTS `q_quizz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `q_quizz` (
  `codeQ_quizz` int(11) NOT NULL AUTO_INCREMENT,
  `codeQuizz` int(11) NOT NULL,
  `libelleQuestion` varchar(50) NOT NULL,
  PRIMARY KEY (`codeQ_quizz`),
  KEY `codequizz_fk1` (`codeQuizz`),
  CONSTRAINT `codequizz_fk1` FOREIGN KEY (`codeQuizz`) REFERENCES `quizz` (`codeQuizz`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `q_quizz`
--

LOCK TABLES `q_quizz` WRITE;
/*!40000 ALTER TABLE `q_quizz` DISABLE KEYS */;
INSERT INTO `q_quizz` VALUES (1,1,'Quel est le premier avion ?'),(2,1,'Qui est le PDG de Microsoft ?');
/*!40000 ALTER TABLE `q_quizz` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Table structure for table `quizz`
--

DROP TABLE IF EXISTS `quizz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quizz` (
  `codeQuizz` int(11) NOT NULL AUTO_INCREMENT,
  `libelleQuizz` varchar(45) NOT NULL,
  PRIMARY KEY (`codeQuizz`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quizz`
--

LOCK TABLES `quizz` WRITE;
/*!40000 ALTER TABLE `quizz` DISABLE KEYS */;
INSERT INTO `quizz` VALUES (1,'PC'),(2,'Lolition');
/*!40000 ALTER TABLE `quizz` ENABLE KEYS */;
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
-- Table structure for table `tb_enquete`
--

DROP TABLE IF EXISTS `tb_enquete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_enquete` (
  `codeReponse` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `codeQ_enquete` int(11) NOT NULL,
  PRIMARY KEY (`codeReponse`),
  KEY `fefrgr_fk1` (`codeQ_enquete`),
  CONSTRAINT `fefrgr_fk1` FOREIGN KEY (`codeQ_enquete`) REFERENCES `q_enquete` (`codeQ_enquete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_enquete`
--

LOCK TABLES `tb_enquete` WRITE;
/*!40000 ALTER TABLE `tb_enquete` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_enquete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_quizz`
--

DROP TABLE IF EXISTS `tb_quizz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_quizz` (
  `idReponse` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `codeQ_quizz` int(11) NOT NULL,
  PRIMARY KEY (`idReponse`),
  KEY `codeQ_quizz_fk1` (`codeQ_quizz`),
  CONSTRAINT `codeQ_quizz_fk1` FOREIGN KEY (`codeQ_quizz`) REFERENCES `q_quizz` (`codeQ_quizz`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_quizz`
--

LOCK TABLES `tb_quizz` WRITE;
/*!40000 ALTER TABLE `tb_quizz` DISABLE KEYS */;
INSERT INTO `tb_quizz` VALUES (1,'Bill Gates',2),(2,'Avion',1),(3,'Steve Jobs',2),(4,'Voiture',1);
/*!40000 ALTER TABLE `tb_quizz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_rep_quizz`
--

DROP TABLE IF EXISTS `tb_rep_quizz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_rep_quizz` (
  `codeQ_quizz` int(11) NOT NULL,
  `libelleReponse` varchar(50) NOT NULL,
  PRIMARY KEY (`codeQ_quizz`),
  CONSTRAINT `codeQ_quizz_fk2` FOREIGN KEY (`codeQ_quizz`) REFERENCES `q_quizz` (`codeQ_quizz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_rep_quizz`
--

LOCK TABLES `tb_rep_quizz` WRITE;
/*!40000 ALTER TABLE `tb_rep_quizz` DISABLE KEYS */;
INSERT INTO `tb_rep_quizz` VALUES (1,'Avion'),(2,'Bill Gates');
/*!40000 ALTER TABLE `tb_rep_quizz` ENABLE KEYS */;
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
INSERT INTO `tb_sondage` VALUES (1,5,'Oui',1),(2,4,'Non',1),(3,1,'Fou',2),(4,2,'Bou',2),(5,1,'Sérieux ?',3),(6,0,'Tu rêves.',3),(7,0,'Yes',4),(8,1,'No',4),(9,1,'HTHT',4),(10,4,'Fou',3);
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

-- Dump completed on 2015-05-21 22:36:33
