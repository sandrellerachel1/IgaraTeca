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
INSERT INTO `Usuario` VALUES (3,'Alessandro','20181infig0336','81dc9bdb52d04dc20036dbd8313ed055',1,'alessandrosilva325@gmail.com'),(4,'Teste',NULL,'81dc9bdb52d04dc20036dbd8313ed055',1,'alessandrosilva325@gmail.com'),(7,'baby',NULL,'202cb962ac59075b964b07152d234b70',1,'asas');
/*!40000 ALTER TABLE `Usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagem`
--

DROP TABLE IF EXISTS `imagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagem` (
  `IMG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `IMG_NOME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IMG_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagem`
--

LOCK TABLES `imagem` WRITE;
/*!40000 ALTER TABLE `imagem` DISABLE KEYS */;
INSERT INTO `imagem` VALUES (1,'Array'),(2,'Array'),(3,'6c95a45deb5d8938df45cb109c1d20aa.png'),(4,'2406652c0e52252c74c52870779f758c.jpg'),(5,'88110839628dcb396c5c58c03c7ea0f2'),(6,'4763030fb506aeebaf44060292ab63b8.jpg');
/*!40000 ALTER TABLE `imagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livro`
--

DROP TABLE IF EXISTS `livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livro` (
  `LIVRO_CODIGO` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `LIVRO_NOME` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LIVRO_IMAGEM` int(11) DEFAULT NULL,
  `LIVRO_TIPO` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
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
INSERT INTO `livro` VALUES ('123141415','gramatica',6,'didatico',NULL,'adasdasadasda'),('231','Teste',NULL,'didatico',NULL,'adadada'),('3437377547','Testando',5,'acao',NULL,'sadadasdad'),('cortiÃ§o','O cortiÃ§o',NULL,'romance',NULL,'O romance A Moreninha conta a histÃ³ria de amor entre Augusto e D. Carolina (a moreninha). Tudo comeÃ§a quando Augusto, Leopoldo e FabrÃ­cio sÃ£o convidados por Filipe para passar o feriado de Santâ€™Ana na casa de sua avÃ³.'),('dasda','A moreninha',NULL,'acao',NULL,'asdasdasd'),('dsfsdfs','O cortiÃ§o',NULL,'didatico',NULL,'sdfsdfsdf'),('gramatica','gramatica',NULL,'acao',NULL,'A GramÃ¡tica tem como finalidade orientar e regular o uso da lÃ­ngua, estabelecendo um padrÃ£o de escrita e de fala baseado em diversos critÃ©rios, tais como: Exemplo de bons escritores, LÃ³gica, TradiÃ§Ã£o, Bom senso.'),('hitman','Hitman',NULL,'acao',NULL,'Vamos pelo princÃ­pio. Dirigido por Aleksander Bach, que aqui faz sua estreia em grandes produÃ§Ãµes depois de uma carreira bem-sucedida nos clipes musicais e na publicidade.'),('weqweq','Viagema ao fundo do',NULL,'infantil',NULL,'asdsdasd');
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
  `PED_LIVRO_CODIGO` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PED_STATUS` tinyint(1) DEFAULT NULL,
  `PED_DATA` datetime DEFAULT NULL,
  `PED_DATA_PRAZO` date DEFAULT NULL,
  PRIMARY KEY (`PED_ID`),
  KEY `PED_USER_ID` (`PED_USER_ID`),
  KEY `PED_LIVRO_CODIGO` (`PED_LIVRO_CODIGO`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`PED_USER_ID`) REFERENCES `Usuario` (`USER_ID`) ON DELETE CASCADE,
  CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`PED_LIVRO_CODIGO`) REFERENCES `livro` (`LIVRO_CODIGO`) ON DELETE CASCADE
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

-- Dump completed on 2018-10-19 11:13:30
