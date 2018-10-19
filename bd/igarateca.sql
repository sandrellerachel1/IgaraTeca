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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuario`
--

LOCK TABLES `Usuario` WRITE;
/*!40000 ALTER TABLE `Usuario` DISABLE KEYS */;
INSERT INTO `Usuario` VALUES (3,'Alessandro',NULL,'81dc9bdb52d04dc20036dbd8313ed055',1,'alessandrosilva325@gmail.com'),(4,'Teste',NULL,'81dc9bdb52d04dc20036dbd8313ed055',1,'alessandrosilva325@gmail.com'),(7,'baby',NULL,'202cb962ac59075b964b07152d234b70',1,'asas');
/*!40000 ALTER TABLE `Usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livro`
--

DROP TABLE IF EXISTS `livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livro` (
  `LIVRO_CODIGO` varchar(20) NOT NULL,
  `LIVRO_NOME` varchar(20) DEFAULT NULL,
  `LIVRO_TIPO` varchar(20) DEFAULT NULL,
  `LIVRO_AUTOR` varchar(40) DEFAULT NULL,
  `LIVRO_RESUMO` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`LIVRO_CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livro`
--

LOCK TABLES `livro` WRITE;
/*!40000 ALTER TABLE `livro` DISABLE KEYS */;
INSERT INTO `livro` VALUES ('231','Teste','didatico',NULL,'adadada'),('cortiÃ§o','O cortiÃ§o','romance',NULL,'O romance A Moreninha conta a histÃ³ria de amor entre Augusto e D. Carolina (a moreninha). Tudo comeÃ§a quando Augusto, Leopoldo e FabrÃ­cio sÃ£o convidados por Filipe para passar o feriado de Santâ€™Ana na casa de sua avÃ³.'),('dasda','A moreninha','acao',NULL,'asdasdasd'),('dsfsdfs','O cortiÃ§o','didatico',NULL,'sdfsdfsdf'),('gramatica','gramatica','acao',NULL,'A GramÃ¡tica tem como finalidade orientar e regular o uso da lÃ­ngua, estabelecendo um padrÃ£o de escrita e de fala baseado em diversos critÃ©rios, tais como: Exemplo de bons escritores, LÃ³gica, TradiÃ§Ã£o, Bom senso.'),('hitman','Hitman','acao',NULL,'Vamos pelo princÃ­pio. Dirigido por Aleksander Bach, que aqui faz sua estreia em grandes produÃ§Ãµes depois de uma carreira bem-sucedida nos clipes musicais e na publicidade.'),('weqweq','Viagema ao fundo do','infantil',NULL,'asdsdasd');
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
  `PED_LIVRO_CODIGO` varchar(255) DEFAULT NULL,
  `PED_STATUS` tinyint(1) DEFAULT NULL,
  `PED_DATA` datetime DEFAULT NULL,
  `PED_DATA_PRAZO` date DEFAULT NULL,
  PRIMARY KEY (`PED_ID`),
  KEY `PED_USER_ID` (`PED_USER_ID`),
  KEY `PED_LIVRO_CODIGO` (`PED_LIVRO_CODIGO`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`PED_USER_ID`) REFERENCES `Usuario` (`USER_ID`) ON DELETE CASCADE,
  CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`PED_LIVRO_CODIGO`) REFERENCES `livro` (`LIVRO_CODIGO`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (8,3,'gramatica',1,'2018-10-12 17:39:25','2018-10-19');
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

-- Dump completed on 2018-10-14  1:00:53
