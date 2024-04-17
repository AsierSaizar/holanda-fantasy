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
-- Table structure for table `datukuriosoak`
--

DROP TABLE IF EXISTS `datukuriosoak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `datukuriosoak` (
  `id` int NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `izenburua` varchar(255) NOT NULL,
  `edukia` varchar(255) NOT NULL,
  `gehituzenekoEguna` date NOT NULL,
  `egoera` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `img_UNIQUE` (`img`),
  UNIQUE KEY `izenburua_UNIQUE` (`izenburua`),
  UNIQUE KEY `edukia_UNIQUE` (`edukia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datukuriosoak`
--

LOCK TABLES `datukuriosoak` WRITE;
/*!40000 ALTER TABLE `datukuriosoak` DISABLE KEYS */;
/*!40000 ALTER TABLE `datukuriosoak` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `erabiltzaileenjokalariak`
--

LOCK TABLES `erabiltzaileenjokalariak` WRITE;
/*!40000 ALTER TABLE `erabiltzaileenjokalariak` DISABLE KEYS */;
INSERT INTO `erabiltzaileenjokalariak` VALUES (61,35,'1','plantilan'),(62,35,'6','plantilan'),(63,34,'12','jokoan'),(64,34,'17','jokoan'),(65,35,'11','plantilan'),(66,35,'16','plantilan'),(67,35,'21','plantilan'),(68,35,'26','plantilan'),(69,35,'36','plantilan'),(70,35,'31','plantilan'),(71,35,'41','plantilan'),(72,35,'56','jokoan'),(73,35,'2','plantilan'),(74,35,'7','plantilan'),(75,35,'32','plantilan'),(76,35,'59','jokoan'),(77,34,'36','jokoan'),(78,35,'33','plantilan'),(79,35,'10','plantilan'),(80,35,'46','plantilan'),(81,35,'54','jokoan'),(82,35,'37','plantilan'),(83,35,'48','plantilan'),(84,35,'55','jokoan'),(85,35,'57','jokoan'),(86,35,'35','plantilan'),(87,35,'49','jokoan'),(88,34,'53','jokoan'),(89,34,'44','jokoan'),(90,34,'46','jokoan'),(91,34,'50','jokoan'),(92,34,'2','jokoan'),(93,35,'19','plantilan'),(94,35,'51','jokoan'),(95,35,'53','jokoan'),(96,35,'23','plantilan'),(97,35,'50','jokoan'),(98,35,'58','jokoan'),(99,35,'52','jokoan'),(100,35,'47','plantilan'),(101,35,'5','plantilan'),(102,35,'25','plantilan'),(103,35,'42','plantilan'),(117,35,'44','plantilan');
/*!40000 ALTER TABLE `erabiltzaileenjokalariak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jokalariak`
--

DROP TABLE IF EXISTS `jokalariak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jokalariak` (
  `id` int NOT NULL AUTO_INCREMENT,
  `izen` varchar(255) NOT NULL,
  `abizen` varchar(255) NOT NULL,
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
INSERT INTO `jokalariak` VALUES (1,'Patrick ','van Aanholt','Defensa',78,'Ajax','Assen',1000),(2,'Nathan ','Aké','Defensa',85,'Utrecht','Heerlen',4500),(3,'Owen ','Wijndal','Defensa',81,'Groningen','Hoofddorp',1500),(4,'Teun ','Koopmeiners','Medio',84,'Heracles','Gouda',3000),(5,'Ryan ','Gravenberch','Medio',86,'Fortuna','Zaandam',4000),(6,'Calvin ','Stengs','Delantero',83,'Ajax','Purmerend',2200),(7,'Jeremiah ','St. Juste','Defensa',80,'Utrecht','Roosendaal',1400),(8,'Marco ','Bizot','Portero',83,'Groningen','Leiden',1200),(9,'Kjell ','Scherpen','Portero',80,'Heracles','Almere',850),(10,'Perr ','Schuurs','Defensa',78,'Fortuna','Zaanstad',1000),(11,'Lisandro ','Martínez','Defensa',82,'Ajax','Delft',1800),(12,'Ryan ','Babel','Delantero',79,'Utrecht','Venlo',1200),(13,'Marten',' de Roon','Medio',83,'Groningen','Sittard',2500),(14,'Jurriën ','Timber','Defensa',80,'Heracles','Helmond',1100),(15,'Daley ','Blind','Defensa',86,'Fortuna','Amstelveen',3000),(16,'Davy ','Pröpper','Medio',82,'Ajax','Dordrecht',1800),(17,'Justin ','Bijlow','Portero',84,'Utrecht','Groningen',1800),(18,'Mohamed ','Ihattaren','Medio',84,'Groningen','Heerenveen',2000),(19,'Cody ','Gakpo','Delantero',85,'Heracles','Nijmegen',3000),(20,'Denzel ','Owusu','Defensa',78,'Fortuna','Zoetermeer',1000),(21,'Danilho ','Doekhi','Defensa',82,'Ajax','Kerkrade',1500),(22,'Riechedly ','Bazoer','Medio',84,'Utrecht','Emmen',2500),(23,'Noussair ','Mazraoui','Defensa',85,'Groningen','Spijkenisse',2800),(24,'Joël ','Drommel','Portero',82,'Heracles','Vlaardingen',1600),(25,'Timothy ','Fosu-Mensah','Defensa',79,'Fortuna','Alphen aan den Rijn',1400),(26,'Kevin ','Strootman','Medio',82,'Ajax','Hilversum',1600),(27,'Klaas-Jan ','Huntelaar','Delantero',78,'Utrecht','Oss',1000),(28,'Kenneth ','Vermeer','Portero',80,'Groningen','Deventer',850),(29,'Ricardo ','van Rhijn','Defensa',78,'Heracles','Lelystad',900),(30,'Jan ','Paul van Hecke','Defensa',81,'Fortuna','Gorinchem',1100),(31,'Marco ','van Ginkel','Medio',82,'Ajax','Waalwijk',1700),(32,'Nick ','Viergever','Defensa',79,'Utrecht','Culemborg',1200),(33,'Jens ','Toornstra','Medio',80,'Groningen','Bergen op Zoom',1300),(34,'Kenneth ','Taylor','Medio',81,'Heracles','Almelo',1500),(35,'Nicolás ','Tagliafico','Defensa',86,'Fortuna','Drachten',3200),(36,'Leroy ','Fer','Medio',80,'Ajax','Zeist',1400),(37,'Jorrit ','Hendrix','Medio',79,'Utrecht','Heemskerk',1100),(38,'Carel ','Eiting','Medio',78,'Groningen','Wassenaar',1000),(39,'Siem ','de Jong','Medio',77,'Heracles','Woerden',800),(40,'Sam ','Lammers','Delantero',81,'Fortuna','Veenendaal',1700),(41,'Donyell ','Malen','Portero',82,'Ajax','Soest',1900),(42,'Myron ','Boadu','Delantero',83,'Utrecht','Middelburg',2200),(43,'Luuk ','de Jong','Delantero',84,'Groningen','Oosterhout',2500),(44,'Calvin ','Stengs','Delantero',85,'Heracles','Veldhoven',2700),(45,'Arnaut ','Danjuma','Delantero',86,'Fortuna','Maassluis',3000),(46,'Steven ','Berghuis','Delantero',87,'Ajax','Barneveld',3200),(47,'Cody ','Gakpo','Delantero',88,'Utrecht','Dronten',3500),(48,'Oussama ','Idrissi','Delantero',89,'Groningen','Heiloo',3700),(49,'Mohamed ','Ihattaren','Delantero',90,'Heracles','Uden',4000),(50,'Noa ','Lang','Delantero',91,'Fortuna','Harderwijk',4200),(51,'Donyell ','Malen','Delantero',92,'Ajax','Wijchen',4500),(52,'Memphis ','Depay','Delantero',93,'Utrecht','Ridderkerk',4800),(53,'Justin ','Kluivert','Delantero',94,'Groningen','Sneek',5000),(54,'Frenkie ','de Jong','Delantero',95,'Heracles','Zutphen',5300),(55,'Donny ','van de Beek','Delantero',96,'Fortuna','Tiel',5600),(56,'Unax','Saizar','Delantero',97,'Ajax','Tolosa',6000),(57,'Virgil ','van Dijk','Delantero',98,'Utrecht','Hoogeveen',6300),(58,'Beñatini','de Mag','Delantero',99,'Groningen','Tolosa',6600),(59,'Markel ','Riaño','Medio',100,'Heracles','Hernialde',2000);
/*!40000 ALTER TABLE `jokalariak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `langileak`
--

DROP TABLE IF EXISTS `langileak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `langileak` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nan` char(9) NOT NULL,
  `pasahitza` varchar(255) NOT NULL,
  `izena` varchar(255) NOT NULL,
  `abizenak` varchar(255) NOT NULL,
  `lanPostua` varchar(255) NOT NULL,
  `proiektua` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `langileak`
--

LOCK TABLES `langileak` WRITE;
/*!40000 ALTER TABLE `langileak` DISABLE KEYS */;
/*!40000 ALTER TABLE `langileak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proiektuak`
--

DROP TABLE IF EXISTS `proiektuak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proiektuak` (
  `idproiektuak` int NOT NULL,
  `izena` varchar(255) NOT NULL,
  `deskripzioa` varchar(255) NOT NULL,
  PRIMARY KEY (`idproiektuak`),
  UNIQUE KEY `idproiektuak_UNIQUE` (`idproiektuak`),
  UNIQUE KEY `izena_UNIQUE` (`izena`),
  UNIQUE KEY `deskripzioa_UNIQUE` (`deskripzioa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proiektuak`
--

LOCK TABLES `proiektuak` WRITE;
/*!40000 ALTER TABLE `proiektuak` DISABLE KEYS */;
/*!40000 ALTER TABLE `proiektuak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testgalderak`
--

DROP TABLE IF EXISTS `testgalderak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testgalderak` (
  `id` int NOT NULL AUTO_INCREMENT,
  `galdera` varchar(255) NOT NULL,
  `galdera_esp` varchar(255) NOT NULL,
  `galdera_eng` varchar(255) NOT NULL,
  `erantzuna1` varchar(255) NOT NULL,
  `erantzuna2` varchar(255) NOT NULL,
  `erantzunaZuzena` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `galdera_UNIQUE` (`galdera`),
  UNIQUE KEY `galdera_eng_UNIQUE` (`galdera_eng`),
  UNIQUE KEY `galdera_esp_UNIQUE` (`galdera_esp`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testgalderak`
--

LOCK TABLES `testgalderak` WRITE;
/*!40000 ALTER TABLE `testgalderak` DISABLE KEYS */;
INSERT INTO `testgalderak` VALUES (11,'Talde hauetako zeinek irabazi zuen UEFA Champions League 2020an?','¿Cuál de estos equipos ganó la UEFA Champions League en 2020?','Which of these teams won the UEFA Champions League in 2020?','Real Madrid','Manchester City','Bayern Muncih'),(12,'Zein herrialdetan jokatzen da La Liga bezala ezagutzen den futbol liga?','¿En qué país se juega la liga de fútbol conocida como La Liga?','In which country is the football league known as La Liga played?','Frantzia','Italia','Espainia'),(13,'Nor da Brasilgo selekzioaren historiako golegile nagusia?','¿Quién es el máximo goleador de la historia de la selección brasileña?','Who is the top scorer in the history of the Brazilian team?','Ronaldinho','Ronaldo Nazário','Pelé'),(14,'Jokalari argentinar hauetatik, zein da \"La Pulga\"?','¿Cuál de estos jugadores argentinos es \"La Pulga\"?','Which of these Argentine players is \"La Pulga\"?','Lionel Messi','Diego Maradona','Di Stefano'),(15,'Zein da Bartzelonaren estadioaren izena?','¿Cuál es el nombre del estadio del Barça?','What is the name of the Barcelona stadium?','Camp Nou','Santiago Bernabeu','Anoeta'),(16,'Zein da UEFA Champions Leagueko historiako golegile nagusia?','¿Cuál es el máximo goleador de la historia de la UEFA Champions League?','Who is the top scorer in UEFA Champions League history?','Erling Halland','Lionel Messi','Cristiano Ronaldo'),(17,'Nor da Real Madril CFko egungo entrenatzailea?','¿Quién es el actual entrenador del Real Madrid CF?','Who is the current coach at Real Madrid CF?','Luis Enrique','Zinedine Zidane','Carlo Ancelotti'),(18,'Nor da \"El Bicho\" bezala ezaguna futbolean?','¿Quién es conocido como \"El Bicho\" en el fútbol?','Who is known as El Bicho in football?','Lionel Messi','Luis Suárez','Cristiano Ronaldo'),(19,'Jokalari hauetako zein da ezaguna gol bat sartu ondoren \"robotaren dantza\" egiteagatik?','¿Cuál de estos jugadores es conocido por hacer el \"baile del robot\" después de marcar un gol?','Which of these players is known for performing \"robot dance\" after scoring a goal?','Andres Iniesta','Sergio Ramos','Peter Crouch'),(20,'Zein jokalariri jarri zioten \"Urrezko Pibe\" ezizena bere ibilbidean?','¿A qué jugador le pusieron el sobrenombre de \"Pibe de Oro\" en su carrera?','Which player was nicknamed \"Golden Pibe\" in his career?','Iraitz Moran','Pelé','Diego Maradona');
/*!40000 ALTER TABLE `testgalderak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `weberabiltzaileak`
--

DROP TABLE IF EXISTS `weberabiltzaileak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `weberabiltzaileak` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ezizena` varchar(255) NOT NULL,
  `emaila` varchar(255) NOT NULL,
  `pasahitza` varchar(255) NOT NULL,
  `dirua` int NOT NULL,
  `baneado` tinyint NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `ezizena_UNIQUE` (`ezizena`),
  UNIQUE KEY `emaila_UNIQUE` (`emaila`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `weberabiltzaileak`
--

LOCK TABLES `weberabiltzaileak` WRITE;
/*!40000 ALTER TABLE `weberabiltzaileak` DISABLE KEYS */;
INSERT INTO `weberabiltzaileak` VALUES (34,'haimardo','haimar@gmail.com','Haimar69',2000,0),(35,'Asier','asier.saizar.diaz@gmail.com','7uhr4626551D',130000,0);
/*!40000 ALTER TABLE `weberabiltzaileak` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-17 13:19:34
