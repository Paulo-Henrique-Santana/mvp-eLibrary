-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           5.1.72-community - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para biblioteca
CREATE DATABASE IF NOT EXISTS `biblioteca` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `biblioteca`;

-- Copiando estrutura para tabela biblioteca.aluno
CREATE TABLE IF NOT EXISTS `aluno` (
  `id_aluno` int(10) NOT NULL AUTO_INCREMENT,
  `nome_aluno` varchar(50) NOT NULL,
  `telefone_aluno` varchar(10) NOT NULL,
  `ra_aluno` varchar(10) NOT NULL,
  PRIMARY KEY (`id_aluno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela biblioteca.aluno: 0 rows
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;

-- Copiando estrutura para tabela biblioteca.autor
CREATE TABLE IF NOT EXISTS `autor` (
  `id_autor` int(10) NOT NULL AUTO_INCREMENT,
  `nome_autor` varchar(50) NOT NULL,
  PRIMARY KEY (`id_autor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela biblioteca.autor: 0 rows
/*!40000 ALTER TABLE `autor` DISABLE KEYS */;
/*!40000 ALTER TABLE `autor` ENABLE KEYS */;

-- Copiando estrutura para tabela biblioteca.editora
CREATE TABLE IF NOT EXISTS `editora` (
  `id_editora` int(10) NOT NULL AUTO_INCREMENT,
  `nome_editora` varchar(50) NOT NULL,
  PRIMARY KEY (`id_editora`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela biblioteca.editora: 0 rows
/*!40000 ALTER TABLE `editora` DISABLE KEYS */;
/*!40000 ALTER TABLE `editora` ENABLE KEYS */;

-- Copiando estrutura para tabela biblioteca.exemplar
CREATE TABLE IF NOT EXISTS `exemplar` (
  `id_exemplar` int(10) NOT NULL AUTO_INCREMENT,
  `id_livro` int(11) NOT NULL,
  PRIMARY KEY (`id_exemplar`),
  KEY `id_livro` (`id_livro`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela biblioteca.exemplar: 0 rows
/*!40000 ALTER TABLE `exemplar` DISABLE KEYS */;
/*!40000 ALTER TABLE `exemplar` ENABLE KEYS */;

-- Copiando estrutura para tabela biblioteca.livro
CREATE TABLE IF NOT EXISTS `livro` (
  `id_livro` int(11) NOT NULL AUTO_INCREMENT,
  `nome_livro` varchar(50) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_editora` int(11) NOT NULL,
  PRIMARY KEY (`id_livro`),
  KEY `id_autor` (`id_autor`),
  KEY `id_editora` (`id_editora`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela biblioteca.livro: 0 rows
/*!40000 ALTER TABLE `livro` DISABLE KEYS */;
/*!40000 ALTER TABLE `livro` ENABLE KEYS */;

-- Copiando estrutura para tabela biblioteca.locacao
CREATE TABLE IF NOT EXISTS `locacao` (
  `id_locacao` int(10) NOT NULL AUTO_INCREMENT,
  `dt_locacao` date NOT NULL,
  `dt_entrega` date NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_status_locacao` int(11) NOT NULL,
  `id_exemplar` int(11) NOT NULL,
  PRIMARY KEY (`id_locacao`),
  KEY `id_aluno` (`id_aluno`),
  KEY `id_status_locacao` (`id_status_locacao`),
  KEY `id_exemplar` (`id_exemplar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela biblioteca.locacao: 0 rows
/*!40000 ALTER TABLE `locacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `locacao` ENABLE KEYS */;

-- Copiando estrutura para tabela biblioteca.status_locacao
CREATE TABLE IF NOT EXISTS `status_locacao` (
  `id_status_locacao` int(10) NOT NULL AUTO_INCREMENT,
  `situacao_locacao` varchar(15) NOT NULL,
  PRIMARY KEY (`id_status_locacao`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela biblioteca.status_locacao: 0 rows
/*!40000 ALTER TABLE `status_locacao` DISABLE KEYS */;
INSERT INTO `status_locacao` (`id_status_locacao`, `situacao_locacao`) VALUES
	(1, 'EM ATRASO'),
	(2, 'EM ANDAMENTO'),
	(3, 'ENTREGUE');
/*!40000 ALTER TABLE `status_locacao` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
