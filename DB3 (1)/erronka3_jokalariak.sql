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
-- Table structure for table `jokalariak`
--

DROP TABLE IF EXISTS `jokalariak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jokalariak` (
  `id` int NOT NULL AUTO_INCREMENT,
  `izenAbizen` varchar(255) NOT NULL,
  `posizioa` varchar(255) NOT NULL,
  `puntuazioa` int NOT NULL,
  `taldea` varchar(255) NOT NULL,
  `herrialdea` varchar(255) NOT NULL,
  `prezioa` float NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jokalariak`
--

LOCK TABLES `jokalariak` WRITE;
/*!40000 ALTER TABLE `jokalariak` DISABLE KEYS */;
INSERT INTO `jokalariak` VALUES (1,'Patrick van Aanholt','Defensa',78,'Ajax','Assen',1000),(2,'Nathan Aké','Defensa',85,'Utrecht','Heerlen',4500),(3,'Owen Wijndal','Defensa',81,'Groningen','Hoofddorp',1500),(4,'Teun Koopmeiners','Medio',84,'Heracles','Gouda',3000),(5,'Ryan Gravenberch','Medio',86,'Fortuna','Zaandam',4000),(6,'Calvin Stengs','Delantero',83,'Ajax','Purmerend',2200),(7,'Jeremiah St. Juste','Defensa',80,'Utrecht','Roosendaal',1400),(8,'Marco Bizot','Portero',83,'Groningen','Leiden',1200),(9,'Kjell Scherpen','Portero',80,'Heracles','Almere',850),(10,'Perr Schuurs','Defensa',78,'Fortuna','Zaanstad',1000),(11,'Lisandro Martínez','Defensa',82,'Ajax','Delft',1800),(12,'Ryan Babel','Delantero',79,'Utrecht','Venlo',1200),(13,'Marten de Roon','Medio',83,'Groningen','Sittard',2500),(14,'Jurriën Timber','Defensa',80,'Heracles','Helmond',1100),(15,'Daley Blind','Defensa',86,'Fortuna','Amstelveen',3000),(16,'Davy Pröpper','Medio',82,'Ajax','Dordrecht',1800),(17,'Justin Bijlow','Portero',84,'Utrecht','Groningen',1800),(18,'Mohamed Ihattaren','Medio',84,'Groningen','Heerenveen',2000),(19,'Cody Gakpo','Delantero',85,'Heracles','Nijmegen',3000),(20,'Denzel Owusu','Defensa',78,'Fortuna','Zoetermeer',1000),(21,'Danilho Doekhi','Defensa',82,'Ajax','Kerkrade',1500),(22,'Riechedly Bazoer','Medio',84,'Utrecht','Emmen',2500),(23,'Noussair Mazraoui','Defensa',85,'Groningen','Spijkenisse',2800),(24,'Joël Drommel','Portero',82,'Heracles','Vlaardingen',1600),(25,'Timothy Fosu-Mensah','Defensa',79,'Fortuna','Alphen aan den Rijn',1400),(26,'Kevin Strootman','Medio',82,'Ajax','Hilversum',1600),(27,'Klaas-Jan Huntelaar','Delantero',78,'Utrecht','Oss',1000),(28,'Kenneth Vermeer','Portero',80,'Groningen','Deventer',850),(29,'Ricardo van Rhijn','Defensa',78,'Heracles','Lelystad',900),(30,'Jan Paul van Hecke','Defensa',81,'Fortuna','Gorinchem',1100),(31,'Marco van Ginkel','Medio',82,'Ajax','Waalwijk',1700),(32,'Nick Viergever','Defensa',79,'Utrecht','Culemborg',1200),(33,'Jens Toornstra','Medio',80,'Groningen','Bergen op Zoom',1300),(34,'Kenneth Taylor','Medio',81,'Heracles','Almelo',1500),(35,'Nicolás Tagliafico','Defensa',86,'Fortuna','Drachten',3200),(36,'Leroy Fer','Medio',80,'Ajax','Zeist',1400),(37,'Jorrit Hendrix','Medio',79,'Utrecht','Heemskerk',1100),(38,'Carel Eiting','Medio',78,'Groningen','Wassenaar',1000),(39,'Siem de Jong','Medio',77,'Heracles','Woerden',800),(40,'Sam Lammers','Delantero',81,'Fortuna','Veenendaal',1700),(41,'Donyell Malen','Portero',82,'Ajax','Soest',1900),(42,'Myron Boadu','Delantero',83,'Utrecht','Middelburg',2200),(43,'Luuk de Jong','Delantero',84,'Groningen','Oosterhout',2500),(44,'Calvin Stengs','Delantero',85,'Heracles','Veldhoven',2700),(45,'Arnaut Danjuma','Delantero',86,'Fortuna','Maassluis',3000),(46,'Steven Berghuis','Delantero',87,'Ajax','Barneveld',3200),(47,'Cody Gakpo','Delantero',88,'Utrecht','Dronten',3500),(48,'Oussama Idrissi','Delantero',89,'Groningen','Heiloo',3700),(49,'Mohamed Ihattaren','Delantero',90,'Heracles','Uden',4000),(50,'Noa Lang','Delantero',91,'Fortuna','Harderwijk',4200),(51,'Donyell Malen','Delantero',92,'Ajax','Wijchen',4500),(52,'Memphis Depay','Delantero',93,'Utrecht','Ridderkerk',4800),(53,'Justin Kluivert','Delantero',94,'Groningen','Sneek',5000),(54,'Frenkie de Jong','Delantero',95,'Heracles','Zutphen',5300),(55,'Donny van de Beek','Delantero',96,'Fortuna','Tiel',5600),(56,'Matthijs de Ligt','Delantero',97,'Ajax','Winschoten',6000),(57,'Virgil van Dijk','Delantero',98,'Utrecht','Hoogeveen',6300),(58,'Jasper Cillessen','Delantero',99,'Groningen','Delfzijl',6600),(59,'Markel Riaño','Medio',100,'Heracles','Hernialde',2000);
/*!40000 ALTER TABLE `jokalariak` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-08  8:27:02
