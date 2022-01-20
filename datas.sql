-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: fonditas
-- ------------------------------------------------------
-- Server version	5.7.31

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
-- Table structure for table `fondas`
--

DROP TABLE IF EXISTS `fondas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fondas` (
  `id_fonda` int(11) NOT NULL AUTO_INCREMENT,
  `calle` varchar(255) NOT NULL,
  `interior` varchar(50) NOT NULL,
  `exterior` varchar(50) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `colonia` varchar(255) NOT NULL,
  `delegacion` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `pais` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fonda`),
  UNIQUE KEY `id_fonda_UNIQUE` (`id_fonda`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fondas`
--

LOCK TABLES `fondas` WRITE;
/*!40000 ALTER TABLE `fondas` DISABLE KEYS */;
INSERT INTO `fondas` VALUES (1,'SIETE','1','269','57800','ESPERANZA','NEZAHUALCOYOTL','NEZAHUALCOYOTL','ESTADO DE MEXICO','MEXICO'),(7,'Siete #','3242343','269','57800','sol','sdfgh','NezahualcÃ³yotl','MÃ‰XICO','MÃ©xico'),(8,'Siete #','d','269','57800','asadffdf','fdgdfag','NezahualcÃ³yotl','MÃ‰XICO','MÃ©xico'),(10,'Siete #','4849864','269','57800','TOAST','TOAST','NezahualcÃ³yotl','MÃ‰XICO','MÃ©xico'),(11,'Siete #','12345','269','57800','ESPERANZA','TOAST','NezahualcÃ³yotl','MÃ‰XICO','MÃ©xico'),(12,'SIETE','21','269','54875','P1UIrqOTEmPM','RVND8qC','LwZ1vK','xzvrcD7S5Ixob','MÃ©xico'),(16,'Siete #','1','269','57800','KJTja','ynjFwXmp1UYqAtV','rJV8l36ipGuF','JLBEHe9cst','MÃ©xico'),(17,'SEVEN ELEVEN','2','269','57800','rMM8wWn','Sa15SPLuCrF2D','AZAMG','h2BmH4yHzF','MÃ©xico');
/*!40000 ALTER TABLE `fondas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `platillos`
--

DROP TABLE IF EXISTS `platillos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `platillos` (
  `id_platillo` int(11) NOT NULL AUTO_INCREMENT,
  `id_fonda` int(11) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `ingredientes` varchar(255) NOT NULL,
  `costo` decimal(10,3) NOT NULL,
  PRIMARY KEY (`id_platillo`),
  UNIQUE KEY `id_platillo_UNIQUE` (`id_platillo`),
  KEY `FK_fondas` (`id_fonda`),
  CONSTRAINT `FK_fondas` FOREIGN KEY (`id_fonda`) REFERENCES `fondas` (`id_fonda`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `platillos`
--

LOCK TABLES `platillos` WRITE;
/*!40000 ALTER TABLE `platillos` DISABLE KEYS */;
INSERT INTO `platillos` VALUES (1,17,'PLATILLO 1','SABROSO','SAL Y LIMON',5000.500),(3,8,'PLATILLO 3','RICO','CREMA ARROZ',850.000);
/*!40000 ALTER TABLE `platillos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-20 11:52:31
