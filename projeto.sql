CREATE DATABASE  IF NOT EXISTS `projeto` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `projeto`;
-- MySQL dump 10.13  Distrib 8.0.29, for macos12 (x86_64)
--
-- Host: 127.0.0.1    Database: projeto
-- ------------------------------------------------------
-- Server version	8.0.29

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
-- Table structure for table `humidade`
--

DROP TABLE IF EXISTS `humidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `humidade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `valor` varchar(45) DEFAULT NULL,
  `log` varchar(45) DEFAULT NULL,
  `hora` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `humidade`
--

LOCK TABLES `humidade` WRITE;
/*!40000 ALTER TABLE `humidade` DISABLE KEYS */;
INSERT INTO `humidade` VALUES (2,'814','2022-06-11 15:17:20;814\n','2022-06-11 15:17:20','humidade'),(3,'810','2022-06-11 15:18:21;810\n','2022-06-11 15:18:21','humidade'),(4,'810','2022-06-11 15:18:24;810\n','2022-06-11 15:18:24','humidade'),(5,'802','2022-06-11 15:20:17;802\n','2022-06-11 15:20:17','humidade');
/*!40000 ALTER TABLE `humidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incendio`
--

DROP TABLE IF EXISTS `incendio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `incendio` (
  `id` int NOT NULL AUTO_INCREMENT,
  `valor` varchar(45) DEFAULT NULL,
  `log` varchar(45) DEFAULT NULL,
  `hora` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incendio`
--

LOCK TABLES `incendio` WRITE;
/*!40000 ALTER TABLE `incendio` DISABLE KEYS */;
/*!40000 ALTER TABLE `incendio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `janela`
--

DROP TABLE IF EXISTS `janela`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `janela` (
  `id` int NOT NULL AUTO_INCREMENT,
  `valor` varchar(45) DEFAULT NULL,
  `log` varchar(45) DEFAULT NULL,
  `hora` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `janelacol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `janela`
--

LOCK TABLES `janela` WRITE;
/*!40000 ALTER TABLE `janela` DISABLE KEYS */;
/*!40000 ALTER TABLE `janela` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lampada`
--

DROP TABLE IF EXISTS `lampada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lampada` (
  `id` int NOT NULL AUTO_INCREMENT,
  `valor` varchar(45) DEFAULT NULL,
  `log` varchar(45) DEFAULT NULL,
  `hora` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lampada`
--

LOCK TABLES `lampada` WRITE;
/*!40000 ALTER TABLE `lampada` DISABLE KEYS */;
INSERT INTO `lampada` VALUES (1,'1','2022/04/04 16:00;1\r\n','2022/04/04 16:00','lampada');
/*!40000 ALTER TABLE `lampada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `luminosidade`
--

DROP TABLE IF EXISTS `luminosidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `luminosidade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `valor` varchar(45) DEFAULT NULL,
  `log` varchar(45) DEFAULT NULL,
  `hora` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `luminosidade`
--

LOCK TABLES `luminosidade` WRITE;
/*!40000 ALTER TABLE `luminosidade` DISABLE KEYS */;
INSERT INTO `luminosidade` VALUES (2,'0','2022-06-11 15:17:20;0\n','2022-06-11 15:17:20','luminosidade'),(3,'0','2022-06-11 15:18:21;0\n','2022-06-11 15:18:21','luminosidade'),(4,'0','2022-06-11 15:18:24;0\n','2022-06-11 15:18:24','luminosidade'),(5,'0','2022-06-11 15:20:17;0\n','2022-06-11 15:20:17','luminosidade');
/*!40000 ALTER TABLE `luminosidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimento`
--

DROP TABLE IF EXISTS `movimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movimento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `valor` varchar(45) DEFAULT NULL,
  `log` varchar(45) DEFAULT NULL,
  `hora` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimento`
--

LOCK TABLES `movimento` WRITE;
/*!40000 ALTER TABLE `movimento` DISABLE KEYS */;
INSERT INTO `movimento` VALUES (3,'1','2022/04/04 16:00;1\r\n','2022/04/04 16:00','movimento');
/*!40000 ALTER TABLE `movimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `porta`
--

DROP TABLE IF EXISTS `porta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `porta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `valor` varchar(45) DEFAULT NULL,
  `log` varchar(45) DEFAULT NULL,
  `hora` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `porta`
--

LOCK TABLES `porta` WRITE;
/*!40000 ALTER TABLE `porta` DISABLE KEYS */;
INSERT INTO `porta` VALUES (1,'1','2022/04/04 16:00;1\r\n','2022/04/04 16:00','porta');
/*!40000 ALTER TABLE `porta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temperatura`
--

DROP TABLE IF EXISTS `temperatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `temperatura` (
  `id` int NOT NULL AUTO_INCREMENT,
  `valor` varchar(45) DEFAULT NULL,
  `log` varchar(45) DEFAULT NULL,
  `hora` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temperatura`
--

LOCK TABLES `temperatura` WRITE;
/*!40000 ALTER TABLE `temperatura` DISABLE KEYS */;
INSERT INTO `temperatura` VALUES (22,'21','2022-06-11 15:20:17;-0.49\n','2022-06-11 15:20:17','temperatura');
/*!40000 ALTER TABLE `temperatura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `iduser` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `permission_level` tinyint NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','admin',1),(2,'worker','worker',0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'projeto'
--

--
-- Dumping routines for database 'projeto'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-12 18:32:54
