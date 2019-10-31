-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: bdgis
-- ------------------------------------------------------
-- Server version	5.7.16-log

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
-- Table structure for table `acesso`
--

CREATE DATABASE bdgisparasistemas;
USE bdgisparasistemas;

DROP TABLE IF EXISTS `acesso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acesso` (
  `cod_acesso` int(11) NOT NULL AUTO_INCREMENT,
  `cod_tipo_usu` int(11) NOT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cod_acesso`),
  KEY `fk_Acesso_tipo_usuario1_idx` (`cod_tipo_usu`),
  CONSTRAINT `fk_Acesso_tipo_usuario1` FOREIGN KEY (`cod_tipo_usu`) REFERENCES `tipo_usuario` (`cod_tipo_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acesso`
--

LOCK TABLES `acesso` WRITE;
/*!40000 ALTER TABLE `acesso` DISABLE KEYS */;
/*!40000 ALTER TABLE `acesso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avaliacao`
--

DROP TABLE IF EXISTS `avaliacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avaliacao` (
  `cod_aval` int(11) NOT NULL AUTO_INCREMENT,
  `nome_aval` varchar(50) DEFAULT NULL,
  `cod_tipo_aval` int(11) NOT NULL,
  `cod_status_aval` char(1) DEFAULT NULL,
  PRIMARY KEY (`cod_aval`),
  KEY `cod_tipo_aval` (`cod_tipo_aval`),
  CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`cod_tipo_aval`) REFERENCES `tipo_avaliacao` (`cod_tipo_aval`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacao`
--

LOCK TABLES `avaliacao` WRITE;
/*!40000 ALTER TABLE `avaliacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `avaliacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos` (
  `cod_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nome_curso` varchar(50) DEFAULT NULL,
  `cod_status_cursos` char(1) DEFAULT NULL,
  PRIMARY KEY (`cod_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos_unidade`
--

DROP TABLE IF EXISTS `cursos_unidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos_unidade` (
  `cod_curso` int(11) NOT NULL,
  `cod_unid` int(11) NOT NULL,
  `cod_status_cursos_unid` char(1) DEFAULT NULL,
  PRIMARY KEY (`cod_unid`,`cod_curso`),
  KEY `cod_unid` (`cod_unid`),
  KEY `cursos_unidade_ibfk_1` (`cod_curso`),
  CONSTRAINT `cursos_unidade_ibfk_1` FOREIGN KEY (`cod_curso`) REFERENCES `cursos` (`cod_curso`),
  CONSTRAINT `cursos_unidade_ibfk_2` FOREIGN KEY (`cod_unid`) REFERENCES `unidade` (`cod_unid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos_unidade`
--

LOCK TABLES `cursos_unidade` WRITE;
/*!40000 ALTER TABLE `cursos_unidade` DISABLE KEYS */;
/*!40000 ALTER TABLE `cursos_unidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disciplina`
--

DROP TABLE IF EXISTS `disciplina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disciplina` (
  `cod_disc` int(11) NOT NULL AUTO_INCREMENT,
  `nome_disc` varchar(20) DEFAULT NULL,
  `carga_horaria_disc` int(11) DEFAULT NULL,
  `cod_status_disc` char(1) DEFAULT NULL,
  PRIMARY KEY (`cod_disc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disciplina`
--

LOCK TABLES `disciplina` WRITE;
/*!40000 ALTER TABLE `disciplina` DISABLE KEYS */;
/*!40000 ALTER TABLE `disciplina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventos` (
  `cod_evento` int(11) NOT NULL AUTO_INCREMENT,
  `nome_evento` varchar(50) DEFAULT NULL,
  `desc_evento` varchar(150) DEFAULT NULL,
  `data_ini_evento` date DEFAULT NULL,
  `data_fim_evento` date DEFAULT NULL,
  `contato_evento` varchar(11) DEFAULT NULL,
  `hora_fim_evento` time DEFAULT NULL,
  `hora_ini_evento` time DEFAULT NULL,
  `cod_status_evento` char(1) DEFAULT NULL,
  `foto_evento` varchar(100) DEFAULT NULL,
  `cod_unid` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  PRIMARY KEY (`cod_evento`),
  KEY `cod_unidade` (`cod_unid`),
  KEY `cod_usu` (`cod_usu`),
  CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`cod_unid`) REFERENCES `unidade` (`cod_unid`),
  CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`cod_usu`) REFERENCES `usuario` (`cod_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instituicao`
--

DROP TABLE IF EXISTS `instituicao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instituicao` (
  `cod_inst` int(11) NOT NULL AUTO_INCREMENT,
  `nome_fantasia_inst` varchar(30) DEFAULT NULL,
  `razao_social_inst` varchar(100) DEFAULT NULL,
  `CNPJ_inst` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`cod_inst`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instituicao`
--

LOCK TABLES `instituicao` WRITE;
/*!40000 ALTER TABLE `instituicao` DISABLE KEYS */;
/*!40000 ALTER TABLE `instituicao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operacao`
--

DROP TABLE IF EXISTS `operacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operacao` (
  `cod_operacao` int(11) NOT NULL AUTO_INCREMENT,
  `nome_operacao` varchar(30) DEFAULT NULL,
  `cod_status_operacao` char(1) DEFAULT NULL,
  `link_operacao` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`cod_operacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operacao`
--

LOCK TABLES `operacao` WRITE;
/*!40000 ALTER TABLE `operacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `operacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prof_turma`
--

DROP TABLE IF EXISTS `prof_turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prof_turma` (
  `cod_tur` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cod_status_prof_tur` char(1) DEFAULT NULL,
  PRIMARY KEY (`cod_tur`,`cod_usu`),
  KEY `cod_usu` (`cod_usu`),
  CONSTRAINT `prof_turma_ibfk_2` FOREIGN KEY (`cod_tur`) REFERENCES `turma` (`cod_tur`),
  CONSTRAINT `prof_turma_ibfk_3` FOREIGN KEY (`cod_usu`) REFERENCES `usuario` (`cod_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prof_turma`
--

LOCK TABLES `prof_turma` WRITE;
/*!40000 ALTER TABLE `prof_turma` DISABLE KEYS */;
/*!40000 ALTER TABLE `prof_turma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prof_turma_disc`
--

DROP TABLE IF EXISTS `prof_turma_disc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prof_turma_disc` (
  `cod_tur` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cod_disc` int(11) NOT NULL,
  `semestre_ano` int(11) DEFAULT NULL,
  `cod_status_prof_tur_disc` char(1) DEFAULT NULL,
  PRIMARY KEY (`cod_tur`,`cod_usu`,`cod_disc`),
  KEY `cod_disc` (`cod_disc`),
  CONSTRAINT `prof_turma_disc_ibfk_1` FOREIGN KEY (`cod_disc`) REFERENCES `disciplina` (`cod_disc`),
  CONSTRAINT `prof_turma_disc_ibfk_3` FOREIGN KEY (`cod_tur`, `cod_usu`) REFERENCES `prof_turma` (`cod_tur`, `cod_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Dumping data for table `prof_turma_disc`
--

LOCK TABLES `prof_turma_disc` WRITE;
/*!40000 ALTER TABLE `prof_turma_disc` DISABLE KEYS */;
/*!40000 ALTER TABLE `prof_turma_disc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prof_turma_disc_horario`
--

DROP TABLE IF EXISTS `prof_turma_disc_horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prof_turma_disc_horario` (
  `cod_horario` int(11) NOT NULL AUTO_INCREMENT,
  `cod_tur` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fim` time DEFAULT NULL,
  `dia_semana` varchar(20) DEFAULT NULL,
  `turno` char(1) DEFAULT NULL,
  `cod_status_prof_tur_disc_hora` char(1) DEFAULT NULL,
  PRIMARY KEY (`cod_horario`,`cod_tur`,`cod_usu`),
  KEY `prof_turma_disc_horario_ibfk_1` (`cod_tur`,`cod_usu`),
  CONSTRAINT `prof_turma_disc_horario_ibfk_1` FOREIGN KEY (`cod_tur`, `cod_usu`) REFERENCES `prof_turma_disc` (`cod_tur`, `cod_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prof_turma_disc_horario`
--

LOCK TABLES `prof_turma_disc_horario` WRITE;
/*!40000 ALTER TABLE `prof_turma_disc_horario` DISABLE KEYS */;
/*!40000 ALTER TABLE `prof_turma_disc_horario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_avaliacao`
--

DROP TABLE IF EXISTS `tipo_avaliacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_avaliacao` (
  `cod_tipo_aval` int(11) NOT NULL AUTO_INCREMENT,
  `nome_tipo_aval` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cod_tipo_aval`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_avaliacao`
--

LOCK TABLES `tipo_avaliacao` WRITE;
/*!40000 ALTER TABLE `tipo_avaliacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_avaliacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usu_operacao`
--

DROP TABLE IF EXISTS `tipo_usu_operacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usu_operacao` (
  `cod_tipo_usu` int(11) NOT NULL,
  `cod_operacao` int(11) NOT NULL,
  `cod_status_tipo_usu_operacao` char(1) DEFAULT NULL,
  PRIMARY KEY (`cod_tipo_usu`,`cod_operacao`),
  KEY `cod_operacao` (`cod_operacao`),
  CONSTRAINT `tipo_usu_operacao_ibfk_1` FOREIGN KEY (`cod_tipo_usu`) REFERENCES `tipo_usuario` (`cod_tipo_usu`),
  CONSTRAINT `tipo_usu_operacao_ibfk_2` FOREIGN KEY (`cod_operacao`) REFERENCES `operacao` (`cod_operacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usu_operacao`
--

LOCK TABLES `tipo_usu_operacao` WRITE;
/*!40000 ALTER TABLE `tipo_usu_operacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_usu_operacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usuario` (
  `cod_tipo_usu` int(11) NOT NULL AUTO_INCREMENT,
  `nome_tipo_usu` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`cod_tipo_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turma`
--

DROP TABLE IF EXISTS `turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turma` (
  `cod_tur` int(11) NOT NULL AUTO_INCREMENT,
  `sigla_tur` varchar(10) DEFAULT NULL,
  `turno_tur` char(1) DEFAULT NULL,
  `cod_curso` int(11) DEFAULT NULL,
  `cod_status_tur` char(1) DEFAULT NULL,
  PRIMARY KEY (`cod_tur`),
  KEY `cod_curso` (`cod_curso`),
  CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`cod_curso`) REFERENCES `cursos` (`cod_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma`
--

LOCK TABLES `turma` WRITE;
/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
/*!40000 ALTER TABLE `turma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turma_aluno`
--

DROP TABLE IF EXISTS `turma_aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turma_aluno` (
  `cod_tur` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cod_status` char(1) DEFAULT NULL,
  PRIMARY KEY (`cod_tur`,`cod_usu`),
  KEY `cod_usu` (`cod_usu`),
  CONSTRAINT `turma_aluno_ibfk_1` FOREIGN KEY (`cod_tur`) REFERENCES `turma` (`cod_tur`),
  CONSTRAINT `turma_aluno_ibfk_2` FOREIGN KEY (`cod_usu`) REFERENCES `usuario` (`cod_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma_aluno`
--

LOCK TABLES `turma_aluno` WRITE;
/*!40000 ALTER TABLE `turma_aluno` DISABLE KEYS */;
/*!40000 ALTER TABLE `turma_aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turma_aluno_disc_falta`
--

DROP TABLE IF EXISTS `turma_aluno_disc_falta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turma_aluno_disc_falta` (
  `cod_falta` int(11) auto_increment NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cod_tur` int(11) NOT NULL,
  `cod_turma_disc` int(11) NOT NULL,
  `data_falta` date NOT NULL,
  PRIMARY KEY (`cod_falta`),
  KEY `cod_turma_disc` (`cod_turma_disc`),
  KEY `turma_aluno_disc_falta_ibfk_1` (`cod_tur`,`cod_usu`),
  CONSTRAINT `turma_aluno_disc_falta_ibfk_1` FOREIGN KEY (`cod_tur`, `cod_usu`) REFERENCES `turma_aluno` (`cod_tur`, `cod_usu`),
  CONSTRAINT `turma_aluno_disc_falta_ibfk_2` FOREIGN KEY (`cod_turma_disc`) REFERENCES `turma_disciplina` (`cod_turma_disc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Dumping data for table `turma_aluno_disc_falta`
--

LOCK TABLES `turma_aluno_disc_falta` WRITE;
/*!40000 ALTER TABLE `turma_aluno_disc_falta` DISABLE KEYS */;
/*!40000 ALTER TABLE `turma_aluno_disc_falta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turma_aluno_disc_ocorr`
--

DROP TABLE IF EXISTS `turma_aluno_disc_ocorr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turma_aluno_disc_ocorr` (
  `cod_ocorr` int(11) NOT NULL AUTO_INCREMENT,
  `cod_tur` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cod_turma_disc` int(11) NOT NULL,
  `data_hora_ocorr` datetime DEFAULT NULL,
  `desc_ocorr` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cod_ocorr`,`cod_tur`,`cod_usu`,`cod_turma_disc`),
  KEY `cod_turma_disc` (`cod_turma_disc`),
  KEY `fk_turma_aluno_disc_ocorr_turma_aluno1_idx` (`cod_tur`,`cod_usu`),
  CONSTRAINT `fk_turma_aluno_disc_ocorr_turma_aluno1` FOREIGN KEY (`cod_tur`, `cod_usu`) REFERENCES `turma_aluno` (`cod_tur`, `cod_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `turma_aluno_disc_ocorr_ibfk_1` FOREIGN KEY (`cod_turma_disc`) REFERENCES `turma_disciplina` (`cod_turma_disc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma_aluno_disc_ocorr`
--

LOCK TABLES `turma_aluno_disc_ocorr` WRITE;
/*!40000 ALTER TABLE `turma_aluno_disc_ocorr` DISABLE KEYS */;
/*!40000 ALTER TABLE `turma_aluno_disc_ocorr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turma_aluno_nota_disc`
--

DROP TABLE IF EXISTS `turma_aluno_nota_disc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turma_aluno_nota_disc` (
  `cod_usu` int(11) NOT NULL,
  `cod_tur` int(11) NOT NULL,
  `cod_turma_disc` int(11) NOT NULL,
  `cod_aval` int(11) NOT NULL,
  `vl_nota` float(11) DEFAULT NULL,
  PRIMARY KEY (`cod_usu`,`cod_tur`,`cod_turma_disc`,`cod_aval`),
  KEY `fk_Turma_Aluno_Disc_Nota_turma_aluno1_idx` (`cod_tur`,`cod_usu`),
  KEY `fk_Turma_Aluno_Disc_Nota_turma_disciplina1_idx` (`cod_turma_disc`),
  KEY `fk_Turma_Aluno_Disc_Nota_avaliacao1_idx` (`cod_aval`),
  CONSTRAINT `fk_Turma_Aluno_Disc_Nota_avaliacao1` FOREIGN KEY (`cod_aval`) REFERENCES `avaliacao` (`cod_aval`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Turma_Aluno_Disc_Nota_turma_aluno1` FOREIGN KEY (`cod_tur`, `cod_usu`) REFERENCES `turma_aluno` (`cod_tur`, `cod_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Turma_Aluno_Disc_Nota_turma_disciplina1` FOREIGN KEY (`cod_turma_disc`) REFERENCES `turma_disciplina` (`cod_turma_disc`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma_aluno_nota_disc`
--

LOCK TABLES `turma_aluno_nota_disc` WRITE;
/*!40000 ALTER TABLE `turma_aluno_nota_disc` DISABLE KEYS */;
/*!40000 ALTER TABLE `turma_aluno_nota_disc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turma_disciplina`
--

DROP TABLE IF EXISTS `turma_disciplina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turma_disciplina` (
  `cod_turma_disc` int(11) NOT NULL AUTO_INCREMENT,
  `cod_tur` int(11) NOT NULL,
  `cod_disc` int(11) NOT NULL,
  `cod_status_tur_disc` char(1) DEFAULT NULL,
  PRIMARY KEY (`cod_turma_disc`),
  KEY `cod_tur` (`cod_tur`),
  KEY `cod_disc` (`cod_disc`),
  CONSTRAINT `turma_disciplina_ibfk_1` FOREIGN KEY (`cod_tur`) REFERENCES `turma` (`cod_tur`),
  CONSTRAINT `turma_disciplina_ibfk_2` FOREIGN KEY (`cod_disc`) REFERENCES `disciplina` (`cod_disc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma_disciplina`
--

LOCK TABLES `turma_disciplina` WRITE;
/*!40000 ALTER TABLE `turma_disciplina` DISABLE KEYS */;
/*!40000 ALTER TABLE `turma_disciplina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidade`
--

DROP TABLE IF EXISTS `unidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidade` (
  `cod_unid` int(11) NOT NULL AUTO_INCREMENT,
  `nome_unid` varchar(50) DEFAULT NULL,
  `cep_unid` varchar(11) DEFAULT NULL,
  `compl_unid` varchar(55) DEFAULT NULL,
  `num_unid` int(11) DEFAULT NULL,
  `cod_inst` int(11) NOT NULL,
  `cod_status_unid` char(1) DEFAULT NULL,
  PRIMARY KEY (`cod_unid`),
  KEY `cod_inst` (`cod_inst`),
  CONSTRAINT `unidade_ibfk_1` FOREIGN KEY (`cod_inst`) REFERENCES `instituicao` (`cod_inst`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidade`
--

LOCK TABLES `unidade` WRITE;
/*!40000 ALTER TABLE `unidade` DISABLE KEYS */;
/*!40000 ALTER TABLE `unidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `cod_usu` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usu` varchar(50) DEFAULT NULL,
  `cpf_usu` varchar(11) DEFAULT NULL,
  `data_nasc_usu` date DEFAULT NULL,
  `url_foto_usu` varchar(100) DEFAULT NULL,
  `data_entrada` date DEFAULT NULL,
  `data_saida` date DEFAULT NULL,
  `cod_status_usu` char(1) DEFAULT NULL,
  `cod_acesso` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_usu`),
  KEY `fk_usuario_Acesso1_idx` (`cod_acesso`),
  CONSTRAINT `fk_usuario_Acesso1` FOREIGN KEY (`cod_acesso`) REFERENCES `acesso` (`cod_acesso`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_unidade`
--

DROP TABLE IF EXISTS `usuario_unidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_unidade` (
  `cod_unid` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  PRIMARY KEY (`cod_unid`,`cod_usu`),
  KEY `fk_unidade_has_usuario_usuario1_idx` (`cod_usu`),
  KEY `fk_unidade_has_usuario_unidade1_idx` (`cod_unid`),
  CONSTRAINT `fk_unidade_has_usuario_unidade1` FOREIGN KEY (`cod_unid`) REFERENCES `unidade` (`cod_unid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidade_has_usuario_usuario1` FOREIGN KEY (`cod_usu`) REFERENCES `usuario` (`cod_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_unidade`
--

LOCK TABLES `usuario_unidade` WRITE;
/*!40000 ALTER TABLE `usuario_unidade` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_unidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'bdgis'
--

--
-- Dumping routines for database 'bdgis'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-20  7:48:19


insert into instituicao (nome_fantasia_inst, razao_social_inst, CNPJ_inst) values ('Fieb', 'Funda&ccedil;&atilde;o Instituto de Educa&ccedil;&atilde;o de Barueri', 65700239000110);
insert into unidade (nome_unid, cep_unid, compl_unid, num_unid, cod_inst, cod_status_unid) values ('Engenho', 06515220, 'CANSEI', 55, 1, 'A');
insert into unidade (nome_unid, cep_unid, compl_unid, num_unid, cod_inst, cod_status_unid) values ('Belval', 06515220, 'CANSADO', 54, 1, 'A');
insert into tipo_usuario (nome_tipo_usu) values ('Admin');
insert into tipo_usuario (nome_tipo_usu) values ('Master');
insert into tipo_usuario (nome_tipo_usu) values ('Diretor');
insert into tipo_usuario (nome_tipo_usu) values ('Coordenador');
insert into tipo_usuario (nome_tipo_usu) values ('Professor');

insert into operacao (nome_operacao, cod_status_operacao, link_operacao) values ('dar o popo', 'A', 'darPopo.php');
insert into operacao (nome_operacao, cod_status_operacao, link_operacao) values ('dar o bumbum', 'A', 'darBumbum.php');

insert into tipo_usu_operacao (cod_tipo_usu, cod_operacao, cod_status_tipo_usu_operacao) values (1, 1, 'A');
insert into tipo_usu_operacao (cod_tipo_usu, cod_operacao, cod_status_tipo_usu_operacao) values (2, 2, 'A');
insert into tipo_usu_operacao (cod_tipo_usu, cod_operacao, cod_status_tipo_usu_operacao) values (3, 2, 'A');
insert into tipo_usu_operacao (cod_tipo_usu, cod_operacao, cod_status_tipo_usu_operacao) values (3, 1, 'A');
insert into tipo_usu_operacao (cod_tipo_usu, cod_operacao, cod_status_tipo_usu_operacao) values (5, 1, 'A');

insert into acesso (cod_tipo_usu, senha, email) values (3, '$2y$12$tzXy4Rs6RP7lTJwkSJrFg.Mf/Opd0dymNxnyzrY4qQ77svLZZ7Ji6', 'batata@gmail.com');
insert into usuario (nome_usu, cod_acesso, data_entrada) values ('Batata', 1, '2019-10-25');
insert into usuario_unidade (cod_unid, cod_usu) values (1, 1);

insert into acesso (cod_tipo_usu, senha, email) values (3, 'potato', 'potato@gmail.com');
insert into usuario (nome_usu, cod_acesso) values ('Potato', 2);
insert into usuario_unidade (cod_unid, cod_usu) values (2, 2);

insert into acesso (cod_tipo_usu, senha, email) values (5, '$2y$12$tzXy4Rs6RP7lTJwkSJrFg.Mf/Opd0dymNxnyzrY4qQ77svLZZ7Ji6', 'prof1@gmail.com');
insert into usuario (nome_usu, cod_acesso, data_entrada) values ('Professor 1', 3, '2019-10-25');
insert into usuario_unidade (cod_unid, cod_usu) values (1, 3);

insert into cursos (nome_curso, cod_status_cursos) values ('Informática para Internet', 'A');
insert into cursos_unidade (cod_curso, cod_unid, cod_status_cursos_unid) values (1, 1, 'A');

insert into cursos (nome_curso, cod_status_cursos) values ('Farmácia', 'A');
insert into cursos_unidade (cod_curso, cod_unid, cod_status_cursos_unid) values (2, 1, 'A');

insert into turma (sigla_tur, turno_tur, cod_curso, cod_status_tur) values ('INI3B', 'M', 1, 'A');
insert into turma (sigla_tur, turno_tur, cod_curso, cod_status_tur) values ('FAR3A', 'M', 2, 'A');

insert into prof_turma (cod_tur, cod_usu, cod_status_prof_tur) values (1, 3, 'A');
insert into prof_turma (cod_tur, cod_usu, cod_status_prof_tur) values (2, 3, 'A');

insert into disciplina (nome_disc, carga_horaria_disc, cod_status_disc) values ('Matemática', 120, 'A');
insert into disciplina (nome_disc, carga_horaria_disc, cod_status_disc) values ('Português', 120, 'A');
insert into disciplina (nome_disc, carga_horaria_disc, cod_status_disc) values ('História', 120, 'A');
insert into disciplina (nome_disc, carga_horaria_disc, cod_status_disc) values ('Geografia', 120, 'A');
insert into disciplina (nome_disc, carga_horaria_disc, cod_status_disc) values ('Física', 120, 'A');
insert into disciplina (nome_disc, carga_horaria_disc, cod_status_disc) values ('Química', 120, 'A');

insert into prof_turma_disc (cod_tur, cod_usu, cod_disc, semestre_ano, cod_status_prof_tur_disc) values (1, 3, 1, 1, 'A');
insert into prof_turma_disc (cod_tur, cod_usu, cod_disc, semestre_ano, cod_status_prof_tur_disc) values (2, 3, 4, 1, 'A');
insert into prof_turma_disc (cod_tur, cod_usu, cod_disc, semestre_ano, cod_status_prof_tur_disc) values (2, 3, 5, 1, 'A');


insert into turma_disciplina (cod_tur, cod_disc, cod_status_tur_disc) values (1, 1, 'A');
insert into turma_disciplina (cod_tur, cod_disc, cod_status_tur_disc) values (1, 2, 'A');
insert into turma_disciplina (cod_tur, cod_disc, cod_status_tur_disc) values (1, 3, 'A');

insert into turma_disciplina (cod_tur, cod_disc, cod_status_tur_disc) values (2, 4, 'A');
insert into turma_disciplina (cod_tur, cod_disc, cod_status_tur_disc) values (2, 5, 'A');
insert into turma_disciplina (cod_tur, cod_disc, cod_status_tur_disc) values (2, 6, 'A');




insert into usuario (nome_usu, cod_status_usu) values ('Moises', 'A');
insert into usuario_unidade (cod_unid, cod_usu) values (1, 4);
insert into turma_aluno (cod_tur, cod_usu, cod_status) values (1, 4, 'A');

insert into usuario (nome_usu, cod_status_usu) values ('Maria', 'A');
insert into usuario_unidade (cod_unid, cod_usu) values (1, 5);
insert into turma_aluno (cod_tur, cod_usu, cod_status) values (1, 5, 'A');

insert into usuario (nome_usu, cod_status_usu) values ('Vitor', 'A');
insert into usuario_unidade (cod_unid, cod_usu) values (1, 6);
insert into turma_aluno (cod_tur, cod_usu, cod_status) values (1, 6, 'A');


insert into usuario (nome_usu, cod_status_usu) values ('Luiz', 'A');
insert into usuario_unidade (cod_unid, cod_usu) values (2, 7);
insert into turma_aluno (cod_tur, cod_usu, cod_status) values (2, 7, 'A');

insert into usuario (nome_usu, cod_status_usu) values ('Laura', 'A');
insert into usuario_unidade (cod_unid, cod_usu) values (2, 8);
insert into turma_aluno (cod_tur, cod_usu, cod_status) values (2, 8, 'A');

insert into usuario (nome_usu, cod_status_usu) values ('Felipe', 'A');
insert into usuario_unidade (cod_unid, cod_usu) values (2, 9);
insert into turma_aluno (cod_tur, cod_usu, cod_status) values (2, 9, 'A');

insert into tipo_avaliacao (nome_tipo_aval) values ("A.D");
insert into tipo_avaliacao (nome_tipo_aval) values ("A.O");
insert into tipo_avaliacao (nome_tipo_aval) values ("A.A");
insert into avaliacao (nome_aval, cod_tipo_aval, cod_status_aval) values ("A.D.", 1, "A");
insert into avaliacao (nome_aval, cod_tipo_aval, cod_status_aval) values ("A.O.", 2, "A");
insert into avaliacao (nome_aval, cod_tipo_aval, cod_status_aval) values ("A.A.", 3, "A");


insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values (7, 2, 5, 1, 2);
insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values (8, 2, 5, 1, 3);
insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values (9, 2, 5, 1, null);
insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values (7, 2, 5, 2, 5);
insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values (8, 2, 5, 2, null);
insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values (9, 2, 5, 2, 6);
insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values (7, 2, 5, 3, null);
insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values (8, 2, 5, 3, null);
insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values (9, 2, 5, 3, 2);

insert into avaliacao (nome_aval, cod_tipo_aval, cod_status_aval) values ("A.O. 2", 2, "A");
insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values (7, 2, 5, 4, 7);
insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values (8, 2, 5, 4, 9);
insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values (9, 2, 5, 4, 2.0);


insert into avaliacao (nome_aval, cod_tipo_aval, cod_status_aval) values ("A.D. 2", 1, "A");
insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values (7, 2, 5, 5, 5);
insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values (8, 2, 5, 5, 4);
insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values (9, 2, 5, 5, null);


insert into avaliacao (nome_aval, cod_tipo_aval, cod_status_aval) values ("A.D. 3", 1, "A");
insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values (7, 2, 5, 6, 10);
insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values (8, 2, 5, 6, 10);
insert into turma_aluno_nota_disc (cod_usu, cod_tur, cod_turma_disc, cod_aval, vl_nota) values (9, 2, 5, 6, 2);
