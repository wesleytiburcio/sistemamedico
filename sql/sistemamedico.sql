-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 11-Jun-2019 às 13:37
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemamedico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `consultas`
--

DROP TABLE IF EXISTS `consultas`;
CREATE TABLE IF NOT EXISTS `consultas` (
  `id_consultas` int(11) NOT NULL AUTO_INCREMENT,
  `paciente_consultas` varchar(255) NOT NULL,
  `medico_consultas` varchar(255) NOT NULL,
  `especialidade_consultas` varchar(50) NOT NULL,
  `dataconsulta_consultas` date NOT NULL,
  `horaconsulta_consultas` varchar(50) NOT NULL,
  `situacao_consultas` varchar(15) NOT NULL,
  `observacao_consultas` text NOT NULL,
  PRIMARY KEY (`id_consultas`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `consultas`
--

INSERT INTO `consultas` (`id_consultas`, `paciente_consultas`, `medico_consultas`, `especialidade_consultas`, `dataconsulta_consultas`, `horaconsulta_consultas`, `situacao_consultas`, `observacao_consultas`) VALUES
(1, 'Emanuella', 'Daniela', 'CLINICO GERAL', '2019-06-28', '10:00-10:30', '1', 'virose'),
(2, 'Emanuella', 'Fernanda', 'PEDIATRIA', '2019-06-20', '17:00-17:30', '1', 'febre'),
(3, 'Luisa', 'Renata', 'CLINICO GERAL', '2019-07-02', '09:00-09:30', '1', 'rotina'),
(4, 'Andrea', 'Ana', 'GINECOLOGIA', '2019-06-24', '14:30-15:00', '1', 'rotina'),
(7, 'Andrea', 'Renata', 'FONOAUDIOLOGIA', '2019-06-19', '16:30-17:00', '1', 'retorno'),
(14, 'Luisa', 'Bruno', 'ORTOPEDIA', '2019-07-03', '11:30-12:00', '1', 'dor joelho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `especialidades`
--

DROP TABLE IF EXISTS `especialidades`;
CREATE TABLE IF NOT EXISTS `especialidades` (
  `id_especialidades` int(11) NOT NULL AUTO_INCREMENT,
  `nome_especialidades` varchar(50) DEFAULT NULL,
  `situacao_especialidades` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id_especialidades`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `especialidades`
--

INSERT INTO `especialidades` (`id_especialidades`, `nome_especialidades`, `situacao_especialidades`) VALUES
(1, 'CLINICO GERAL', '0'),
(2, 'CARDIOLOGIA', '1'),
(30, 'ORTOPEDIA', '1'),
(9, 'GINECOLOGIA', '1'),
(29, 'PEDIATRIA', '1'),
(24, 'FONOAUDIOLOGIA', '1'),
(25, 'ENDOCRINOLOGIA', '1'),
(26, 'GERIATRIA', '1'),
(31, 'ANGIOPLASTIA', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicos`
--

DROP TABLE IF EXISTS `medicos`;
CREATE TABLE IF NOT EXISTS `medicos` (
  `id_medicos` int(11) NOT NULL AUTO_INCREMENT,
  `nome_medicos` varchar(50) DEFAULT NULL,
  `crm_medicos` varchar(20) DEFAULT NULL,
  `email_medicos` varchar(40) DEFAULT NULL,
  `telefone_medicos` varchar(20) DEFAULT NULL,
  `datacadastro_medicos` date DEFAULT NULL,
  `situacao_medicos` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id_medicos`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `medicos`
--

INSERT INTO `medicos` (`id_medicos`, `nome_medicos`, `crm_medicos`, `email_medicos`, `telefone_medicos`, `datacadastro_medicos`, `situacao_medicos`) VALUES
(1, 'Carlos', '3357', 'carlos@gmail.com', '987675423', '2019-05-15', '1'),
(2, 'Antonio', '1111', 'antonio@gmail.com', '987665000', '2019-05-02', '1'),
(10, 'Paulo', '5757', 'paulo@gmail.com.br', '987876754', '2019-05-07', '1'),
(35, 'Valeria', '3434', 'valeria@gmail.com', '987876754', '2019-05-21', '1'),
(8, 'Bruno', '2222', 'bruno@gmail.com', '987876754', '2019-05-10', '1'),
(9, 'Marcos', '4444', 'marcos@gmail.com', '986572155', '2019-05-14', '1'),
(7, 'Daniela', '1212', 'dani@gmail.com', '987876754', '2019-05-03', '1'),
(17, 'Felix', '343234', 'pedro@gmail.com.br', '988877756', '2019-05-21', '1'),
(22, 'Fernanda', '2323', 'joana@gmail.com.br', '898765545', '2019-05-21', '1'),
(33, 'Ana', '2323', 'ana@gmail.com.br', '988887777', '2019-05-21', '1'),
(36, 'Valeria', '343234', 'valeria@gmail.com', '987665473', '2019-05-21', '1'),
(48, 'Wesley', '343234', 'wesley@wesley.com', '987665473', '2019-05-20', '1'),
(55, 'Gustavo', '9090', 'gustavo@gmail.com', '988889090', '2019-05-29', '1'),
(54, 'Renata', '9999', 'renata@gmail.com.br', '988887777', '2019-05-01', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicos_especialidades`
--

DROP TABLE IF EXISTS `medicos_especialidades`;
CREATE TABLE IF NOT EXISTS `medicos_especialidades` (
  `id_medesp` int(11) NOT NULL AUTO_INCREMENT,
  `id_med` int(11) DEFAULT NULL,
  `id_esp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_medesp`),
  KEY `id_med` (`id_med`),
  KEY `id_esp` (`id_esp`)
) ENGINE=MyISAM AUTO_INCREMENT=98964 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `medicos_especialidades`
--

INSERT INTO `medicos_especialidades` (`id_medesp`, `id_med`, `id_esp`) VALUES
(1, 1, 1),
(3, 10, 3),
(4, 2, 9),
(5, 4, 2),
(6, 8, 25),
(7, 9, 26),
(8, 7, 11),
(9, 7, 2),
(33, 2, 25),
(98963, 55, 3),
(98962, 8, 24),
(98961, 55, 2),
(98960, 55, 31),
(98959, 17, 29),
(98958, 54, 24),
(98955, 48, 29),
(98954, 17, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE IF NOT EXISTS `pacientes` (
  `id_pacientes` int(11) NOT NULL AUTO_INCREMENT,
  `nome_pacientes` varchar(255) NOT NULL,
  `cpf_pacientes` varchar(255) NOT NULL,
  `email_pacientes` varchar(255) NOT NULL,
  `telefone_pacientes` varchar(20) NOT NULL,
  `datacadastro_pacientes` date NOT NULL,
  `dataaniversario_pacientes` date NOT NULL,
  `idade_pacientes` varchar(10) NOT NULL,
  `situacao_pacientes` int(3) NOT NULL,
  PRIMARY KEY (`id_pacientes`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pacientes`
--

INSERT INTO `pacientes` (`id_pacientes`, `nome_pacientes`, `cpf_pacientes`, `email_pacientes`, `telefone_pacientes`, `datacadastro_pacientes`, `dataaniversario_pacientes`, `idade_pacientes`, `situacao_pacientes`) VALUES
(16, 'Andrea', '98765439923', 'andrea@gmail.com.br', '987876754', '2019-06-05', '1975-08-05', '43', 1),
(15, 'Emanuella', '87749037589', 'emanuella@gmail.com', '988887777', '2019-05-28', '2010-08-30', '8', 1),
(14, 'Luisa', '87656773723', 'luisa@gmail.com', '988877756', '2019-05-28', '2005-02-23', '14', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
