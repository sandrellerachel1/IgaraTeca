-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: igarateca
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

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
-- Table structure for table `AVALIACOES`
--

DROP TABLE IF EXISTS `AVALIACOES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AVALIACOES` (
  `AVL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `AVL_COD_LIVRO` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `AVL_QTD_ESTRELA` int(11) DEFAULT NULL,
  `AVL_QTD_PESSOAS` int(11) DEFAULT NULL,
  `AVL_MEDIA_VOTOS` double DEFAULT NULL,
  PRIMARY KEY (`AVL_ID`),
  KEY `AVL_COD_LIVRO` (`AVL_COD_LIVRO`),
  CONSTRAINT `AVALIACOES_ibfk_1` FOREIGN KEY (`AVL_COD_LIVRO`) REFERENCES `LIVROS` (`LIVRO_CODIGO`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AVALIACOES`
--

LOCK TABLES `AVALIACOES` WRITE;
/*!40000 ALTER TABLE `AVALIACOES` DISABLE KEYS */;
INSERT INTO `AVALIACOES` VALUES (1,'3653453',38,10,3.8),(2,'3546346',8,4,2),(3,'4334553',15,6,2.5);
/*!40000 ALTER TABLE `AVALIACOES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ESTOQUE`
--

DROP TABLE IF EXISTS `ESTOQUE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ESTOQUE` (
  `EST_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EST_COD_LIVRO` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `EST_QUANTIDADE` int(11) NOT NULL,
  PRIMARY KEY (`EST_ID`),
  KEY `EST_COD_LIVRO` (`EST_COD_LIVRO`),
  CONSTRAINT `ESTOQUE_ibfk_1` FOREIGN KEY (`EST_COD_LIVRO`) REFERENCES `LIVROS` (`LIVRO_CODIGO`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ESTOQUE`
--

LOCK TABLES `ESTOQUE` WRITE;
/*!40000 ALTER TABLE `ESTOQUE` DISABLE KEYS */;
INSERT INTO `ESTOQUE` VALUES (1,'3546346',10),(2,'3653453',9),(3,'4334553',14);
/*!40000 ALTER TABLE `ESTOQUE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `IMAGENS`
--

DROP TABLE IF EXISTS `IMAGENS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `IMAGENS` (
  `IMG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `IMG_NOME` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`IMG_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `IMAGENS`
--

LOCK TABLES `IMAGENS` WRITE;
/*!40000 ALTER TABLE `IMAGENS` DISABLE KEYS */;
INSERT INTO `IMAGENS` VALUES (1,'44ffd67ea383.jpg'),(2,'578220478fd9.jpg'),(3,'05b0c91f6776.jpg');
/*!40000 ALTER TABLE `IMAGENS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LIVROS`
--

DROP TABLE IF EXISTS `LIVROS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LIVROS` (
  `LIVRO_CODIGO` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `LIVRO_NOME` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `LIVRO_IMAGEM` int(11) DEFAULT NULL,
  `LIVRO_TIPO` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LIVRO_AUTOR` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LIVRO_PRAZO` int(11) NOT NULL,
  `LIVRO_RESUMO` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`LIVRO_CODIGO`),
  KEY `LIVRO_IMAGEM` (`LIVRO_IMAGEM`),
  CONSTRAINT `LIVROS_ibfk_1` FOREIGN KEY (`LIVRO_IMAGEM`) REFERENCES `IMAGENS` (`IMG_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LIVROS`
--

LOCK TABLES `LIVROS` WRITE;
/*!40000 ALTER TABLE `LIVROS` DISABLE KEYS */;
INSERT INTO `LIVROS` VALUES ('3546346','O cortiÃ§o',1,'romance','AluÃ­sio Azevedo',7,'O romance A Moreninha conta a histÃ³ria de amor entre Augusto e D. Carolina (a moreninha). Tudo comeÃ§a quando Augusto, Leopoldo e FabrÃ­cio sÃ£o convidados por Filipe para passar o feriado de Santa Ana na casa de sua avÃ³'),('3653453','Hitman',2,'acao','Raymond Benson',7,'A partir dos personagens do aclamado jogo de videogame, Raymond Benson desenvolve uma narrativa com o melhor assassino do mundo, um homem geneticamente criado e aprimorado para matar e que atende pelo nome de 47.'),('4334553','4334553',3,'didatico','NinguÃ©m',7,'Lorem ipsum Ã© um texto utilizado para preencher o espaÃ§o de texto em publicaÃ§Ãµes');
/*!40000 ALTER TABLE `LIVROS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MENSAGENS`
--

DROP TABLE IF EXISTS `MENSAGENS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MENSAGENS` (
  `MSG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MSG_DE` int(11) DEFAULT NULL,
  `MSG_PARA` int(11) DEFAULT NULL,
  `MSG_MENSAGEM` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MSG_HORARIO` int(11) DEFAULT NULL,
  `MSG_LIDA` int(11) DEFAULT NULL,
  PRIMARY KEY (`MSG_ID`),
  KEY `MSG_DE` (`MSG_DE`),
  KEY `MSG_PARA` (`MSG_PARA`),
  CONSTRAINT `MENSAGENS_ibfk_1` FOREIGN KEY (`MSG_DE`) REFERENCES `USUARIOS` (`USER_ID`),
  CONSTRAINT `MENSAGENS_ibfk_2` FOREIGN KEY (`MSG_PARA`) REFERENCES `USUARIOS` (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MENSAGENS`
--

LOCK TABLES `MENSAGENS` WRITE;
/*!40000 ALTER TABLE `MENSAGENS` DISABLE KEYS */;
INSERT INTO `MENSAGENS` VALUES (1,1,2,'TESTE',1,0),(2,2,1,'texto',1,0),(3,2,1,'texto',1,0),(6,2,1,'$mensagem',1,0),(7,2,1,'testando envio de mensagens',1,0),(8,2,1,'teste',1,0),(9,2,1,'novamente',1,0);
/*!40000 ALTER TABLE `MENSAGENS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PEDIDOS`
--

DROP TABLE IF EXISTS `PEDIDOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PEDIDOS` (
  `PED_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PED_USER_ID` int(11) NOT NULL,
  `PED_COD_LIVRO` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `PED_STATUS` tinyint(1) DEFAULT NULL,
  `PED_DATA` datetime NOT NULL,
  `PED_DATA_PRAZO` date NOT NULL,
  `PED_CODIGO` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`PED_ID`),
  KEY `PED_USER_ID` (`PED_USER_ID`),
  CONSTRAINT `PEDIDOS_ibfk_1` FOREIGN KEY (`PED_USER_ID`) REFERENCES `USUARIOS` (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PEDIDOS`
--

LOCK TABLES `PEDIDOS` WRITE;
/*!40000 ALTER TABLE `PEDIDOS` DISABLE KEYS */;
INSERT INTO `PEDIDOS` VALUES (1,2,'3546346',1,'2018-11-11 16:10:52','1969-12-31','0d09c3965'),(4,2,'3653453',1,'2018-11-18 17:45:01','2018-11-25','13b25c05a');
/*!40000 ALTER TABLE `PEDIDOS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USUARIOS`
--

DROP TABLE IF EXISTS `USUARIOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USUARIOS` (
  `USER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_NOME` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `USER_MATRICULA` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `USER_SENHA` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `USER_STATUS` int(11) DEFAULT NULL,
  `USER_EMAIL` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USUARIOS`
--

LOCK TABLES `USUARIOS` WRITE;
/*!40000 ALTER TABLE `USUARIOS` DISABLE KEYS */;
INSERT INTO `USUARIOS` VALUES (1,'Teste','20181infig1234','81dc9bdb52d04dc20036dbd8313ed055',1,'alessandrosilva325@gmail.com'),(2,'Alessandro','20181infig0336','81dc9bdb52d04dc20036dbd8313ed055',1,'alessandrosilva326@gmail.com');
/*!40000 ALTER TABLE `USUARIOS` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-23 15:55:13
