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
  `salario_inicial` decimal(10,3) NOT NULL,
  `salario_diario_integrado` decimal(10,3) NOT NULL,
  `id_empleado` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `curp_UNIQUE` (`curp`),
  UNIQUE KEY `numero_seguro_social_UNIQUE` (`numero_seguro_social`),
  UNIQUE KEY `pasaporte_UNIQUE` (`pasaporte`),
  UNIQUE KEY `licencia_conducir_UNIQUE` (`licencia_conducir`),
  KEY `id_empleado` (`id_empleado`),
  CONSTRAINT `datos_personales_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `tipo_contrato` enum('Indefinido','Por obra') NOT NULL,
  `pais` varchar(45) NOT NULL,
  `ciudad` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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

-- Dump completed on 2023-06-09 14:51:17
