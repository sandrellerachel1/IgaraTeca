-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: igarateca
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Usuario`
--

DROP TABLE IF EXISTS `Usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuario` (
  `USER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_NOME` varchar(255) DEFAULT NULL,
  `USER_MATRICULA` varchar(40) DEFAULT NULL,
  `USER_SENHA` varchar(255) DEFAULT NULL,
  `USER_STATUS` tinyint(4) DEFAULT NULL,
  `USER_EMAIL` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuario`
--

LOCK TABLES `Usuario` WRITE;
/*!40000 ALTER TABLE `Usuario` DISABLE KEYS */;
INSERT INTO `Usuario` VALUES (3,'Alessandro','20181infig0336','81dc9bdb52d04dc20036dbd8313ed055',1,'alessandrosilva325@gmail.com'),(4,'Teste',NULL,'81dc9bdb52d04dc20036dbd8313ed055',1,'alessandrosilva325@gmail.com'),(8,'igarateca',NULL,'81dc9bdb52d04dc20036dbd8313ed055',1,'alessandrosilva326@gmail.com');
/*!40000 ALTER TABLE `Usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estoque`
--

DROP TABLE IF EXISTS `estoque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estoque` (
  `EST_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EST_COD_LIVRO` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EST_QUANTIDADE` int(11) DEFAULT NULL,
  `EST_ESTRELA` int(11) DEFAULT NULL,
  PRIMARY KEY (`EST_ID`),
  KEY `EST_COD_LIVRO` (`EST_COD_LIVRO`),
  CONSTRAINT `estoque_ibfk_1` FOREIGN KEY (`EST_COD_LIVRO`) REFERENCES `livro` (`LIVRO_CODIGO`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estoque`
--

LOCK TABLES `estoque` WRITE;
/*!40000 ALTER TABLE `estoque` DISABLE KEYS */;
INSERT INTO `estoque` VALUES (17,'3653453',10,0),(18,'3546346',10,0),(20,'4334553',10,0);
/*!40000 ALTER TABLE `estoque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagem`
--

DROP TABLE IF EXISTS `imagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagem` (
  `IMG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `IMG_NOME` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`IMG_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagem`
--

LOCK TABLES `imagem` WRITE;
/*!40000 ALTER TABLE `imagem` DISABLE KEYS */;
INSERT INTO `imagem` VALUES (29,'ed88768be270.jpg'),(30,'377e134f31f9.jpg'),(32,'de680f58f4eb.jpg');
/*!40000 ALTER TABLE `imagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livro`
--

DROP TABLE IF EXISTS `livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livro` (
  `LIVRO_CODIGO` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `LIVRO_NOME` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LIVRO_IMAGEM` int(11) DEFAULT NULL,
  `LIVRO_TIPO` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LIVRO_AUTOR` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LIVRO_RESUMO` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`LIVRO_CODIGO`),
  KEY `LIVRO_IMAGEM` (`LIVRO_IMAGEM`),
  CONSTRAINT `livro_ibfk_1` FOREIGN KEY (`LIVRO_IMAGEM`) REFERENCES `imagem` (`IMG_ID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livro`
--

LOCK TABLES `livro` WRITE;
/*!40000 ALTER TABLE `livro` DISABLE KEYS */;
INSERT INTO `livro` VALUES ('3546346','O cortiÃ§o',30,'romance','AluÃ­sio Azevedo','O romance A Moreninha conta a histÃ³ria de amor entre Augusto e D. Carolina (a moreninha). Tudo comeÃ§a quando Augusto, Leopoldo e FabrÃ­cio sÃ£o convidados por Filipe para passar o feriado de Santâ€™Ana na casa de sua avÃ³'),('3653453','Hitman',29,'acao','Raymond Benson','A partir dos personagens do aclamado jogo de videogame, Raymond Benson desenvolve uma narrativa com o melhor assassino do mundo, um homem geneticamente criado e aprimorado para matar e que atende pelo nome de 47.'),('4334553','gramatica',32,'romance','NinguÃ©m','adsfrfsfsdsddgsd');
/*!40000 ALTER TABLE `livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `PED_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PED_USER_ID` int(11) DEFAULT NULL,
  `PED_COD_LIVRO` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PED_STATUS` tinyint(1) DEFAULT NULL,
  `PED_DATA` datetime DEFAULT NULL,
  `PED_DATA_PRAZO` date DEFAULT NULL,
  `PED_CODIGO` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`PED_ID`),
  KEY `PED_USER_ID` (`PED_USER_ID`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`PED_USER_ID`) REFERENCES `Usuario` (`USER_ID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-25  0:02:49
