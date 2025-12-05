CREATE DATABASE  IF NOT EXISTS `oficina_mecanica` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `oficina_mecanica`;
-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: localhost    Database: oficina_mecanica
-- ------------------------------------------------------
-- Server version	8.0.43

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
-- Table structure for table `ordem_de_servico`
--

DROP TABLE IF EXISTS `ordem_de_servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordem_de_servico` (
  `id_os` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int NOT NULL,
  `id_carro` int NOT NULL,
  `desc_problema` varchar(250) NOT NULL,
  `status_os` varchar(120) NOT NULL DEFAULT 'Aberto',
  `prazo` date DEFAULT NULL,
  `valor_total` decimal(10,2) DEFAULT '0.00',
  `data_abertura` date NOT NULL DEFAULT (curdate()),
  `data_conclusao` date DEFAULT NULL,
  PRIMARY KEY (`id_os`),
  KEY `id_cliente` (`id_cliente`),
  KEY `idx_os_id_carro` (`id_carro`),
  CONSTRAINT `ordem_de_servico_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  CONSTRAINT `ordem_de_servico_ibfk_2` FOREIGN KEY (`id_carro`) REFERENCES `carro` (`id_carro`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordem_de_servico`
--

LOCK TABLES `ordem_de_servico` WRITE;
/*!40000 ALTER TABLE `ordem_de_servico` DISABLE KEYS */;
INSERT INTO `ordem_de_servico` VALUES (1,1,1,'Troca de óleo e filtros. Suspeita de barulho na suspensão.','Em Andamento','2025-12-10',0.00,'2025-10-05',NULL),(2,2,2,'O carro está falhando e não pega de primeira. Necessário revisão elétrica.','Aguardando Peças','2025-12-15',0.00,'2025-05-05',NULL),(3,3,3,'Vazamento de água no motor. Necessário verificar mangueiras.','Aberto','2025-12-08',0.00,'2025-11-05',NULL),(4,1,4,'Revisão geral de 30.000 km.','Concluído','2025-11-20',450.00,'2025-09-05','2025-09-10'),(5,4,5,'Freio fazendo barulho. Troca de pastilhas e verificação de discos.','Em Andamento','2025-12-12',0.00,'2025-07-05','2025-07-08'),(6,2,2,'Troca de pneus e balanceamento.','Concluído','2025-11-25',0.00,'2025-11-20',NULL),(50,1,1,'Troca de óleo urgente.','Em Execução',NULL,0.00,'2025-11-28',NULL),(75,2,2,'Reparo no motor.','Aberto',NULL,0.00,'2025-11-25',NULL),(100,1,1,'Manutenção preventiva e troca de embreagem.','Concluída',NULL,0.00,'2025-11-15','2025-11-18'),(105,1,1,'Revisão completa.','Concluída',NULL,0.00,'2025-11-25','2025-12-03'),(106,2,2,'Verificar vazamento de óleo no câmbio.','Concluída',NULL,0.00,'2025-10-21','2025-12-05');
/*!40000 ALTER TABLE `ordem_de_servico` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-05 16:31:44
