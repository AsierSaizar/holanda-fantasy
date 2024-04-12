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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-12 14:41:31
