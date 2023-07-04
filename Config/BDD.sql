CREATE DATABASE  IF NOT EXISTS `schoolproject` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `schoolproject`;
-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: schoolproject
-- ------------------------------------------------------
-- Server version	8.0.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `chapitres`
--

DROP TABLE IF EXISTS `chapitres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chapitres` (
  `chapitreId` int NOT NULL AUTO_INCREMENT,
  `chapitreIntitule` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chapitreAnnee` int DEFAULT NULL,
  `matiereId` int DEFAULT NULL,
  `utilisateurId` int DEFAULT NULL,
  PRIMARY KEY (`chapitreId`),
  KEY `matiereId` (`matiereId`),
  KEY `utilisateurId` (`utilisateurId`),
  CONSTRAINT `chapitres_ibfk_1` FOREIGN KEY (`matiereId`) REFERENCES `matieres` (`matiereId`),
  CONSTRAINT `chapitres_ibfk_2` FOREIGN KEY (`utilisateurId`) REFERENCES `utilisateur` (`utilisateurId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chapitres`
--

LOCK TABLES `chapitres` WRITE;
/*!40000 ALTER TABLE `chapitres` DISABLE KEYS */;
/*!40000 ALTER TABLE `chapitres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matieres`
--

DROP TABLE IF EXISTS `matieres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `matieres` (
  `matiereId` int NOT NULL AUTO_INCREMENT,
  `matiereIntitule` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`matiereId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matieres`
--

LOCK TABLES `matieres` WRITE;
/*!40000 ALTER TABLE `matieres` DISABLE KEYS */;
INSERT INTO `matieres` VALUES (1,'Mathématique'),(2,'Français'),(3,'Sciences'),(4,'Informatique');
/*!40000 ALTER TABLE `matieres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `section` (
  `sectionId` int NOT NULL AUTO_INCREMENT,
  `sectionIntitule` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sectionId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section`
--

LOCK TABLES `section` WRITE;
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
INSERT INTO `section` VALUES (1,'TI'),(2,'QTI'),(3,'QADPS'),(4,'Prof');
/*!40000 ALTER TABLE `section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section_matieres`
--

DROP TABLE IF EXISTS `section_matieres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `section_matieres` (
  `sectionMatiereId` int NOT NULL AUTO_INCREMENT,
  `sectionId` int DEFAULT NULL,
  `matiereId` int DEFAULT NULL,
  PRIMARY KEY (`sectionMatiereId`),
  KEY `matiereId` (`matiereId`),
  KEY `sectionId` (`sectionId`),
  CONSTRAINT `section_matieres_ibfk_1` FOREIGN KEY (`matiereId`) REFERENCES `matieres` (`matiereId`),
  CONSTRAINT `section_matieres_ibfk_2` FOREIGN KEY (`sectionId`) REFERENCES `section` (`sectionId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section_matieres`
--

LOCK TABLES `section_matieres` WRITE;
/*!40000 ALTER TABLE `section_matieres` DISABLE KEYS */;
INSERT INTO `section_matieres` VALUES (1,3,1),(2,3,2),(3,3,4);
/*!40000 ALTER TABLE `section_matieres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateur` (
  `utilisateurId` int NOT NULL AUTO_INCREMENT,
  `utilisateurLastName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `utilisateurFirstName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `utilisateurEmail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `utilisateurPassword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `utilisateurValidate` tinyint(1) DEFAULT '0',
  `sectionId` int DEFAULT NULL,
  `utilisateurAnnee` int DEFAULT NULL,
  PRIMARY KEY (`utilisateurId`),
  KEY `sectionId` (`sectionId`),
  CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`sectionId`) REFERENCES `section` (`sectionId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (1,'test','test','test@live.be','$2y$10$ZAsAk53imbW5jhedmzWSOujRR6LRNrw7c9TQJVUCJTUBNeF8GjFem',0,4,NULL),(4,'test1','test1','test@test.be','$2y$10$i9pRN7wncj5gXxqc8/mKreN/LtZ0oH5gDOZPhm14ExhUDoOnahmom',0,3,4),(5,'dmh','ben','demab@site.asty-moulin.be','$2y$10$Sk34QFZMtASGqp/uT/TiW.nuCX/ADj/IrANQM4MT0RP4rQ8Mhmv7O',0,4,1),(6,'dmh','ben','demab@site.asty-moulin.be','$2y$10$dHKg70padnt5sWItI17v2./kOP3rX.1ccgCkb0gyzy9alHEJKjENu',0,1,4);
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur_section`
--

DROP TABLE IF EXISTS `utilisateur_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateur_section` (
  `utilisateurSectionId` int NOT NULL AUTO_INCREMENT,
  `utilisateurId` int DEFAULT NULL,
  `sectionId` int DEFAULT NULL,
  PRIMARY KEY (`utilisateurSectionId`),
  KEY `sectionId` (`sectionId`),
  KEY `utilisateurId` (`utilisateurId`),
  CONSTRAINT `utilisateur_section_ibfk_1` FOREIGN KEY (`sectionId`) REFERENCES `section` (`sectionId`),
  CONSTRAINT `utilisateur_section_ibfk_2` FOREIGN KEY (`utilisateurId`) REFERENCES `utilisateur` (`utilisateurId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur_section`
--

LOCK TABLES `utilisateur_section` WRITE;
/*!40000 ALTER TABLE `utilisateur_section` DISABLE KEYS */;
INSERT INTO `utilisateur_section` VALUES (1,1,1),(2,1,3);
/*!40000 ALTER TABLE `utilisateur_section` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-04  9:46:42
