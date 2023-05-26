CREATE DATABASE  IF NOT EXISTS `control_inventario` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `control_inventario`;
-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: control_inventario
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `articulos`
--

DROP TABLE IF EXISTS `articulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `articulos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numero_serie` int NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `stock` int NOT NULL,
  `nombre_responsable` varchar(30) NOT NULL,
  `id_marca` int NOT NULL,
  `id_modelo` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `articulos_ibfk_1` (`id_marca`),
  KEY `articulos_ibfk_2` (`id_modelo`),
  CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id`),
  CONSTRAINT `articulos_ibfk_2` FOREIGN KEY (`id_modelo`) REFERENCES `modelos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulos`
--

LOCK TABLES `articulos` WRITE;
/*!40000 ALTER TABLE `articulos` DISABLE KEYS */;
INSERT INTO `articulos` VALUES (7,54450,'Yordii Calle','3434',23,'rtrtrdg',1,1);
/*!40000 ALTER TABLE `articulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos_personales`
--

DROP TABLE IF EXISTS `datos_personales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `datos_personales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rfc` varchar(30) NOT NULL,
  `curp` varchar(30) NOT NULL,
  `numero_seguro_social` varchar(30) NOT NULL,
  `pasaporte` varchar(30) DEFAULT NULL,
  `licencia_conducir` varchar(30) DEFAULT NULL,
  `genero` varchar(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `correo` varchar(50) NOT NULL,
  `numero_telefono` varchar(30) NOT NULL,
  `salario_inicial` float NOT NULL,
  `salario_diario_integrado` float NOT NULL,
  `id_empleado` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `curp_UNIQUE` (`curp`),
  UNIQUE KEY `numero_seguro_social_UNIQUE` (`numero_seguro_social`),
  UNIQUE KEY `pasaporte_UNIQUE` (`pasaporte`),
  UNIQUE KEY `licencia_conducir_UNIQUE` (`licencia_conducir`),
  KEY `id_empleado` (`id_empleado`),
  CONSTRAINT `datos_personales_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_personales`
--

LOCK TABLES `datos_personales` WRITE;
/*!40000 ALTER TABLE `datos_personales` DISABLE KEYS */;
INSERT INTO `datos_personales` VALUES (1,'123','323232355','3231','asasasA','231','Masculino','2023-05-05','2hola@gmail.cmo','3434343121',23235,23236,1),(2,'543434','3434343','43434','34343','343434','Femenino','2023-05-11','hola@gmail.cmo','3434343',434343000,34343,2),(4,'121246464','32323256','2323','34343456','wewewew','Masculino','2023-05-05','hola@gmail.cmo','3434343456',23235500,2323,10),(5,'23434','23423423424','567567','234234','3345','Masculino','2023-05-27','hola@gmail.cmo','234234234',567,657567,12);
/*!40000 ALTER TABLE `datos_personales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleados`
--

DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empleados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `puesto` varchar(30) NOT NULL,
  `departamento` varchar(30) NOT NULL,
  `contrato_firmado` varchar(10) NOT NULL,
  `pais` varchar(45) NOT NULL,
  `ciudad` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES (1,'Yordii2','Secretaria','Recursos','Si','Mexico','CDMX','asas23'),(2,'Jhenifer','Gerente','Informatica','Si','Mexico','Oaxaca','asasas'),(3,'Yorvil','Secretaria','Recursos','Si','Mexico','Quintana Roo','asasas'),(4,'asas','Gerente','Informatica','Si','Mexico','Oaxaca','asas'),(5,'asas','Gerente','Informatica','Si','Mexico','Oaxaca','asas'),(6,'aaaa','Gerente','Informatica','Si','Mexico','Oaxaca','sas'),(10,'Yordii Calle','Gerente','Informatica','Si','Mexico','Oaxaca','5 de diciembre'),(12,'Yordii Calle','Gerente','Informatica','Si','Mexico','Oaxaca','5 de diciembre'),(13,'Alonso Gomez','Tecnico','Administrativo','Si','Mexico','Oaxaca','5 de diciembre'),(14,'Alonso Gomez','Tecnico','Administrativo','Si','Mexico','Oaxaca','5 de diciembre');
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historial_empleados`
--

DROP TABLE IF EXISTS `historial_empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historial_empleados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fecha_contratacion` date NOT NULL,
  `fecha_baja` date DEFAULT NULL,
  `id_empleado` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_empleado` (`id_empleado`),
  CONSTRAINT `historial_empleados_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial_empleados`
--

LOCK TABLES `historial_empleados` WRITE;
/*!40000 ALTER TABLE `historial_empleados` DISABLE KEYS */;
INSERT INTO `historial_empleados` VALUES (2,'2023-05-25',NULL,12),(3,'2023-05-26',NULL,14);
/*!40000 ALTER TABLE `historial_empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marcas`
--

DROP TABLE IF EXISTS `marcas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marcas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marcas`
--

LOCK TABLES `marcas` WRITE;
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
INSERT INTO `marcas` VALUES (1,'mc'),(2,'fgfgfg');
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modelos`
--

DROP TABLE IF EXISTS `modelos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modelos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modelos`
--

LOCK TABLES `modelos` WRITE;
/*!40000 ALTER TABLE `modelos` DISABLE KEYS */;
INSERT INTO `modelos` VALUES (1,'model2'),(2,'rrr');
/*!40000 ALTER TABLE `modelos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'control_inventario'
--

--
-- Dumping routines for database 'control_inventario'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-26  1:18:46
