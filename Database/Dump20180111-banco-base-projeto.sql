CREATE DATABASE  IF NOT EXISTS `lol` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `lol`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: lol
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `atualizacao`
--

DROP TABLE IF EXISTS `atualizacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atualizacao` (
  `id` int(4) unsigned zerofill NOT NULL,
  `versao` varchar(40) NOT NULL,
  `descricao` varchar(50) NOT NULL DEFAULT 'Mudanças do patch nos campeoes',
  `lancamento` date DEFAULT NULL,
  `criadores` varchar(100) DEFAULT NULL,
  `argencia` varchar(30) DEFAULT 'League Of Legends',
  `imagem` varchar(50) DEFAULT NULL,
  `video` varchar(100) DEFAULT NULL,
  `campeao` varchar(50) NOT NULL,
  `habilidade` varchar(100) NOT NULL,
  `mudanca` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `campeoes`
--

DROP TABLE IF EXISTS `campeoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campeoes` (
  `nome` varchar(15) NOT NULL,
  `subnome` varchar(40) NOT NULL,
  `historia` text NOT NULL,
  `frase` varchar(140) DEFAULT NULL,
  `vida` float(5,2) NOT NULL,
  `dano_ataque` float(4,2) NOT NULL,
  `velocidade_ataque` float(4,3) NOT NULL,
  `velocidade_movimento` int(3) NOT NULL,
  `regeneracao_vida` float(4,3) NOT NULL,
  `armadura` float(4,2) NOT NULL,
  `resistecia_magica` float(4,2) NOT NULL,
  `id_campeao` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_campeao`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `habilidades`
--

DROP TABLE IF EXISTS `habilidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `habilidades` (
  `letra_habilidade` char(1) DEFAULT NULL,
  `descricao` text,
  `custo` int(12) DEFAULT NULL,
  `alcance` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `noticias`
--

DROP TABLE IF EXISTS `noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noticias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `subtitulo` text NOT NULL,
  `lancamento` date DEFAULT NULL,
  `escritor` varchar(20) DEFAULT NULL,
  `argencia` varchar(20) DEFAULT 'SportTV',
  `imagem` varchar(50) DEFAULT NULL,
  `video` varchar(50) DEFAULT NULL,
  `artigo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tier_s`
--

DROP TABLE IF EXISTS `tier_s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tier_s` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `versao` varchar(30) NOT NULL,
  `descricao` varchar(50) NOT NULL DEFAULT 'Os campeoes mais fortes desse patch',
  `lancamento` date NOT NULL,
  `criador` varchar(45) DEFAULT NULL,
  `site_origem` varchar(15) NOT NULL,
  `imagem` varchar(50) NOT NULL,
  `video` varchar(100) DEFAULT NULL,
  `bufs` varchar(100) DEFAULT NULL,
  `nerfs` varchar(100) DEFAULT NULL,
  `tabela` varchar(50) NOT NULL DEFAULT 'imagem/_tier/tabela-724.jpg',
  `expricacao` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-11  7:36:19
