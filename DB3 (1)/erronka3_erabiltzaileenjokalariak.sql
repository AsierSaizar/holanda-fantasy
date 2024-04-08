-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: erronka3
-- ------------------------------------------------------
-- Server version	8.0.34

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
-- Table structure for table `erabiltzaileenjokalariak`
--

DROP TABLE IF EXISTS `erabiltzaileenjokalariak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `erabiltzaileenjokalariak` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idErabiltzaile` int NOT NULL,
  `idJokalaria` varchar(255) NOT NULL,
  `egoera` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `erabiltzaileenjokalariak`
--

LOCK TABLES `erabiltzaileenjokalariak` WRITE;
/*!40000 ALTER TABLE `erabiltzaileenjokalariak` DISABLE KEYS */;
INSERT INTO `erabiltzaileenjokalariak` VALUES (61,35,'1','jokoan'),(62,35,'6','jokoan'),(63,34,'12','jokoan'),(64,34,'17','plantilan'),(65,35,'11','jokoan'),(66,35,'16','jokoan'),(67,35,'21','plantilan'),(68,35,'26','jokoan'),(69,35,'36','jokoan'),(70,35,'31','plantilan'),(71,35,'41','plantilan'),(72,35,'56','jokoan'),(73,35,'2','plantilan'),(74,35,'7','plantilan'),(75,35,'32','plantilan'),(76,35,'59','plantilan'),(77,34,'36','jokoan'),(78,35,'33','plantilan'),(79,35,'10','plantilan'),(80,35,'46','plantilan');
/*!40000 ALTER TABLE `erabiltzaileenjokalariak` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-08  8:27:01
