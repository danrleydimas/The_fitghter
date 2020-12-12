-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03-Jan-2019 às 22:01
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thefighter`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `verificaduracao`(exercicio int(12)) RETURNS int(12)
BEGIN
IF exercicio < 0 then
set exercicio = 0;
END IF;
RETURN exercicio;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `verificaduracao2`(duracao int) RETURNS int(11)
BEGIN
IF duracao > 99 THEN
RETURN duracao/100*60*0.8;
END IF;
RETURN duracao*0.8;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `verificaduracao3`(duracao int) RETURNS int(11)
BEGIN
IF duracao > 99 then
return duracao /100 *60*1.3  ;
END IF;
RETURN duracao*1.3 ;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `admm`
--

CREATE TABLE IF NOT EXISTS `admm` (
  `codigo` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `nivel` int(1) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `admm`
--

INSERT INTO `admm` (`codigo`, `nome`, `senha`, `nivel`) VALUES
(1, 'danrley', '12345', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `capacidade_fisica`
--

CREATE TABLE IF NOT EXISTS `capacidade_fisica` (
  `cd_capacidade` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(10) NOT NULL,
  `cd_exercicio` int(10) NOT NULL,
  `qt_carga` int(10) NOT NULL,
  `qt_duracao` time(1) NOT NULL,
  `nr_repeticao` int(11) NOT NULL,
  PRIMARY KEY (`cd_capacidade`),
  KEY `codigo` (`codigo`),
  KEY `cd_exercicio` (`cd_exercicio`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=264 ;

--
-- Extraindo dados da tabela `capacidade_fisica`
--

INSERT INTO `capacidade_fisica` (`cd_capacidade`, `codigo`, `cd_exercicio`, `qt_carga`, `qt_duracao`, `nr_repeticao`) VALUES
(263, 47, 8, 30, '00:00:00.0', 10),
(262, 46, 45, 0, '01:02:00.0', 1),
(261, 46, 1, 0, '00:03:00.0', 0),
(260, 46, 8, 18, '00:00:00.0', 20),
(259, 46, 8, 1, '00:00:00.0', 1),
(258, 46, 8, 2, '00:00:00.0', 1);

--
-- Acionadores `capacidade_fisica`
--
DROP TRIGGER IF EXISTS `trginserir_pt_total`;
DELIMITER //
CREATE TRIGGER `trginserir_pt_total` BEFORE UPDATE ON `capacidade_fisica`
 FOR EACH ROW BEGIN
IF(NEW.cd_exercicio >=8 AND NEW.cd_exercicio <=14)THEN 
UPDATE  RANK
SET pt_total = pt_total +( NEW.qt_carga* 0.7) + (NEW.nr_repeticao*0.5) where codigo= NEW.codigo;
END IF;
IF(NEW.cd_exercicio = 53 OR NEW.cd_exercicio = 54 ) THEN
SELECT verificaduracao2(NEW.qt_duracao) into @b;
UPDATE  RANK
SET pt_total = pt_total + @b where codigo= NEW.codigo;             
END IF;
IF(NEW.cd_exercicio >= 45 AND NEW.cd_exercicio <= 52 OR NEW.cd_exercicio = 55) THEN
UPDATE  RANK
SET pt_total = pt_total +  (NEW.nr_repeticao*0.5) where codigo= NEW.codigo;
END IF;
IF(NEW.cd_exercicio = 1 )THEN
SELECT verificaduracao2(NEW.qt_duracao) into @b;
SET @duracao = 300 - @b;
select verificaduracao(@duracao) into @a;
UPDATE  RANK
SET pt_total = pt_total + @a  where codigo= NEW.codigo;
END IF;
IF(NEW.cd_exercicio = 2 )THEN
SELECT verificaduracao2(NEW.qt_duracao) into @b;
SET @duracao = 400 - @b;
select verificaduracao(@duracao) into @a;
  UPDATE  RANK
SET pt_total = pt_total +   @a  where codigo= NEW.codigo;
END IF;
IF(NEW.cd_exercicio = 3 )THEN
SELECT verificaduracao2(NEW.qt_duracao) into @b;
SET @duracao = 600 - @b;
select verificaduracao(@duracao) into @a;
  UPDATE  RANK
SET pt_total = pt_total + @a  where codigo= NEW.codigo;
END IF;
IF(NEW.cd_exercicio = 4 )THEN
SELECT verificaduracao3(NEW.qt_duracao) into @b;
SET @duracao = 300 - @b;
select verificaduracao(@duracao) into @a;
  UPDATE  RANK
SET pt_total = pt_total + @a  where codigo= NEW.codigo;
END IF;
IF(NEW.cd_exercicio = 5)THEN
	 SELECT verificaduracao3(NEW.qt_duracao) into @b;
SET @duracao = 400 - @b;
select verificaduracao(@duracao) into @a;
UPDATE  RANK
SET pt_total = pt_total + @a  where codigo= NEW.codigo;
END IF;
IF(NEW.cd_exercicio = 6)THEN
 	SELECT verificaduracao3(NEW.qt_duracao) into @b;
	SET @duracao = 500 - @b;
	select verificaduracao(@duracao) into @a;
 UPDATE  RANK
SET pt_total = pt_total + @a  where codigo= NEW.codigo;
END IF;
IF(NEW.cd_exercicio = 7)THEN
 	 SELECT verificaduracao3(NEW.qt_duracao) into @b;
SET @duracao = 600 - @b;
select verificaduracao(@duracao) into @a;
UPDATE  RANK
SET pt_total = pt_total + @a  where codigo= NEW.codigo;
END IF;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `trgvalida`;
DELIMITER //
CREATE TRIGGER `trgvalida` BEFORE INSERT ON `capacidade_fisica`
 FOR EACH ROW BEGIN SELECT qt_carga,COUNT(cd_exercicio) INTO  @qt_carga,@cd_exercicio FROM capacidade_fisica WHERE codigo = NEW.codigo AND cd_exercicio = NEW.cd_exercicio AND qt_carga=NEW.qt_carga; 
IF (@cd_exercicio >= 1  AND @qt_carga = NEW.qt_carga ) THEN 
	SET NEW.cd_exercicio = null;
END IF;

IF(NEW.cd_exercicio =53 OR NEW.cd_exercicio =54)THEN 
SET NEW.nr_repeticao = 0  ;
END IF;

IF(NEW.cd_exercicio >=8 AND NEW.cd_exercicio <=14)THEN 
UPDATE  RANK
SET pt_total = pt_total +( NEW.qt_carga* 0.7) + (NEW.nr_repeticao*0.5) where codigo= NEW.codigo;
END IF;
IF(NEW.cd_exercicio = 53 OR NEW.cd_exercicio = 54 ) THEN
SELECT verificaduracao2(NEW.qt_duracao) into @b;
UPDATE  RANK
SET pt_total = pt_total + @b where codigo= NEW.codigo;             
END IF;
IF(NEW.cd_exercicio >= 45 AND NEW.cd_exercicio <= 52 OR NEW.cd_exercicio = 55) THEN
UPDATE  RANK
SET pt_total = pt_total +  (NEW.nr_repeticao*0.5) where codigo= NEW.codigo;
END IF;
IF(NEW.cd_exercicio = 1 )THEN
SELECT verificaduracao2(NEW.qt_duracao) into @b;
SET @duracao = 300 - @b;
select verificaduracao(@duracao) into @a;
UPDATE  RANK
SET pt_total = pt_total + @a  where codigo= NEW.codigo;
END IF;
IF(NEW.cd_exercicio = 2 )THEN
SELECT verificaduracao2(NEW.qt_duracao) into @b;
SET @duracao = 400 - @b;
select verificaduracao(@duracao) into @a;
  UPDATE  RANK
SET pt_total = pt_total +   @a  where codigo= NEW.codigo;
END IF;
IF(NEW.cd_exercicio = 3 )THEN
SELECT verificaduracao2(NEW.qt_duracao) into @b;
SET @duracao = 600 - @b;
select verificaduracao(@duracao) into @a;
  UPDATE  RANK
SET pt_total = pt_total + @a  where codigo= NEW.codigo;
END IF;
IF(NEW.cd_exercicio = 4 )THEN
SELECT verificaduracao3(NEW.qt_duracao) into @b;
SET @duracao = 300 - @b;
select verificaduracao(@duracao) into @a;
  UPDATE  RANK
SET pt_total = pt_total + @a  where codigo= NEW.codigo;
END IF;
IF(NEW.cd_exercicio = 5)THEN
	 SELECT verificaduracao3(NEW.qt_duracao) into @b;
SET @duracao = 400 - @b;
select verificaduracao(@duracao) into @a;
UPDATE  RANK
SET pt_total = pt_total + @a  where codigo= NEW.codigo;
END IF;
IF(NEW.cd_exercicio = 6)THEN
 	SELECT verificaduracao3(NEW.qt_duracao) into @b;
	SET @duracao = 500 - @b;
	select verificaduracao(@duracao) into @a;
 UPDATE  RANK
SET pt_total = pt_total + @a  where codigo= NEW.codigo;
END IF;
IF(NEW.cd_exercicio = 7)THEN
 	 SELECT verificaduracao3(NEW.qt_duracao) into @b;
SET @duracao = 600 - @b;
select verificaduracao(@duracao) into @a;
UPDATE  RANK
SET pt_total = pt_total + @a  where codigo= NEW.codigo;
END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_peso`
--

CREATE TABLE IF NOT EXISTS `categoria_peso` (
  `cd_categoria` int(10) NOT NULL AUTO_INCREMENT,
  `ds_categoria` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cd_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `categoria_peso`
--

INSERT INTO `categoria_peso` (`cd_categoria`, `ds_categoria`) VALUES
(1, 'Mosca'),
(2, 'Galo'),
(3, 'Pena'),
(4, 'Leve'),
(5, 'Meio-medio'),
(6, 'Medio'),
(7, 'Meio-Pesado'),
(8, 'Pesado'),
(9, 'Super pesado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicio`
--

CREATE TABLE IF NOT EXISTS `exercicio` (
  `cd_exercicio` int(4) NOT NULL AUTO_INCREMENT,
  `ds_exercicio` varchar(20) NOT NULL,
  `ds_tipo` varchar(12) NOT NULL,
  PRIMARY KEY (`cd_exercicio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- Extraindo dados da tabela `exercicio`
--

INSERT INTO `exercicio` (`cd_exercicio`, `ds_exercicio`, `ds_tipo`) VALUES
(1, 'Suicidio 5 Marcas', 'agilidade'),
(2, 'Suicidio 7 Marcas', 'agilidade'),
(3, 'Suicidio 10 Marcas', 'agilidade'),
(4, 'E.A Skipping frente ', 'agilidade'),
(5, 'E.A Skipping lateral', 'agilidade'),
(6, 'E.A Skipping 90 grau', 'agilidade'),
(7, 'E.A troca de base', 'agilidade'),
(8, 'supino', 'forca'),
(9, 'barra fixa', 'forca'),
(10, 'deadlift', 'forca'),
(11, 'clean and jerk', 'forca'),
(12, 'kettlebell swing', 'forca'),
(13, 'dumbell clean and je', 'forca'),
(14, 'agachamento', 'forca'),
(45, 'Burpee', 'resistencia'),
(46, 'Polichinelo', 'resistencia'),
(47, 'Mountain Climber', 'resistencia'),
(48, 'Sprawl', 'resistencia'),
(49, 'Jab', 'resistencia'),
(50, 'Direto', 'resistencia'),
(51, 'Abs Remador', 'resistencia'),
(52, 'Abs Bicicleta', 'resistencia'),
(53, 'Iso Cadeira', 'resistencia'),
(54, 'Iso Abs Prancha', 'resistencia'),
(55, 'Pular corda', 'resistencia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `luta`
--

CREATE TABLE IF NOT EXISTS `luta` (
  `cd_luta` int(11) NOT NULL AUTO_INCREMENT,
  `dt_luta` date NOT NULL,
  `hr_minimo` time NOT NULL,
  `hr_maxima` time NOT NULL,
  PRIMARY KEY (`cd_luta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_latvian_ci COMMENT='cadastro de lutas' AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `luta`
--

INSERT INTO `luta` (`cd_luta`, `dt_luta`, `hr_minimo`, `hr_maxima`) VALUES
(11, '2019-01-02', '10:00:00', '11:00:00');

--
-- Acionadores `luta`
--
DROP TRIGGER IF EXISTS `popula_tb_hr_luta`;
DELIMITER //
CREATE TRIGGER `popula_tb_hr_luta` AFTER INSERT ON `luta`
 FOR EACH ROW BEGIN 

SET @i = NEW.hr_minimo;
SET @limite = NEW.hr_maxima; 
 
WHILE @i <= @limite DO
INSERT INTO tb_hr_luta (cd_hr_luta,cd_luta,hr_luta) VALUES ('0',NEW.cd_luta,@i);
SET @i = ADDTIME(@i,"1:00:0.000000");
END WHILE;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lutador`
--

CREATE TABLE IF NOT EXISTS `lutador` (
  `codigo` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sobrenome` varchar(60) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `nick` varchar(60) NOT NULL,
  `peso` float NOT NULL,
  `cd_categoria` int(10) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `cd_categoria` (`cd_categoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Extraindo dados da tabela `lutador`
--

INSERT INTO `lutador` (`codigo`, `nome`, `email`, `sobrenome`, `senha`, `nick`, `peso`, `cd_categoria`) VALUES
(46, 'danrley', 'danrley-dimas@hotmail.com', 'dimas', '22401588', 'dan_matatuto', 60.2, 1),
(47, 'Marcos', 'danrley-vidaloka2009@hotmail.com', 'Felipe', '22401588', 'Jereka_Sensei', 70.3, 1),
(48, 'danrley1', 'danrleyphp@hotmail.com', 'jose', '22401588', 'dazz', 0, 0),
(49, 'danrley', 'danrleyphp2@hotmail.com', 'dimas', '22401588', 'dasd', 0, 0),
(51, 'Marcos Felipe', 'marcosfelipejeremias@gmail.com', 'Jeremias', '123123123', 'Jerekao', 0, 0);

--
-- Acionadores `lutador`
--
DROP TRIGGER IF EXISTS `trginsert_rank`;
DELIMITER //
CREATE TRIGGER `trginsert_rank` AFTER INSERT ON `lutador`
 FOR EACH ROW BEGIN 
INSERT INTO rank (codigo,pt_total)  values (NEW.codigo,0);

 END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lutadorxluta`
--

CREATE TABLE IF NOT EXISTS `lutadorxluta` (
  `codigo` int(10) NOT NULL,
  `cd_luta` int(10) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `cd_luta` (`cd_luta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lutadorxmodalidade`
--

CREATE TABLE IF NOT EXISTS `lutadorxmodalidade` (
  `codigo` int(11) NOT NULL,
  `cd_modalidade` int(11) NOT NULL,
  `cd_nivel` int(11) NOT NULL,
  PRIMARY KEY (`codigo`,`cd_modalidade`),
  KEY `FK_lutadorXmodalidade3` (`cd_modalidade`),
  KEY `cd_nivel` (`cd_nivel`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modalidade`
--

CREATE TABLE IF NOT EXISTS `modalidade` (
  `cd_modalidade` int(3) NOT NULL AUTO_INCREMENT,
  `ds_modalidade` varchar(50) NOT NULL,
  PRIMARY KEY (`cd_modalidade`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `modalidade`
--

INSERT INTO `modalidade` (`cd_modalidade`, `ds_modalidade`) VALUES
(1, 'boxe'),
(2, 'jiu jitsu'),
(3, 'muay thai'),
(4, 'kung fu'),
(5, 'karate'),
(6, 'capoeira'),
(7, 'judo'),
(8, 'taekwondo'),
(9, 'ninjutsu'),
(10, 'mma'),
(11, 'krav maga'),
(12, 'kickboxing'),
(13, 'hapkido'),
(14, 'aikido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel`
--

CREATE TABLE IF NOT EXISTS `nivel` (
  `ds_nivel` varchar(7) NOT NULL,
  `cd_nivel` int(1) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cd_nivel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `nivel`
--

INSERT INTO `nivel` (`ds_nivel`, `cd_nivel`) VALUES
('baixo', 1),
('medio', 2),
('alto', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rank`
--

CREATE TABLE IF NOT EXISTS `rank` (
  `codigo` int(11) NOT NULL,
  `pt_total` int(20) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `rank`
--

INSERT INTO `rank` (`codigo`, `pt_total`) VALUES
(46, 387),
(47, 26),
(48, 0),
(49, 0),
(50, 0),
(51, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `resultado_luta`
--

CREATE TABLE IF NOT EXISTS `resultado_luta` (
  `cd_result` int(8) NOT NULL AUTO_INCREMENT,
  `cd_luta` int(10) NOT NULL,
  `cd_hr_luta` int(10) NOT NULL,
  `codigo` int(10) NOT NULL,
  `cd_ds_result_luta` int(10) NOT NULL,
  PRIMARY KEY (`cd_result`),
  KEY `cd_hr_luta` (`cd_hr_luta`,`codigo`),
  KEY `cd_luta` (`cd_luta`),
  KEY `cd_luta_2` (`cd_luta`),
  KEY `codigo` (`codigo`),
  KEY `cd_ds_result_luta` (`cd_ds_result_luta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='contém lutadores cadastrados nas lutas' AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `resultado_luta`
--

INSERT INTO `resultado_luta` (`cd_result`, `cd_luta`, `cd_hr_luta`, `codigo`, `cd_ds_result_luta`) VALUES
(14, 11, 21, 47, 3),
(15, 11, 21, 46, 3);

--
-- Acionadores `resultado_luta`
--
DROP TRIGGER IF EXISTS `trginserir_luta`;
DELIMITER //
CREATE TRIGGER `trginserir_luta` BEFORE INSERT ON `resultado_luta`
 FOR EACH ROW BEGIN
UPDATE  tb_hr_luta
SET tl_lutador = tl_lutador + 1 where cd_hr_luta = NEW.cd_hr_luta;

 END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ds_result_luta`
--

CREATE TABLE IF NOT EXISTS `tb_ds_result_luta` (
  `cd_ds_result_luta` int(10) NOT NULL AUTO_INCREMENT,
  `ds_result_luta` varchar(20) NOT NULL,
  PRIMARY KEY (`cd_ds_result_luta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_ds_result_luta`
--

INSERT INTO `tb_ds_result_luta` (`cd_ds_result_luta`, `ds_result_luta`) VALUES
(1, 'derrota'),
(2, 'vitoria'),
(3, 'empate');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_hr_luta`
--

CREATE TABLE IF NOT EXISTS `tb_hr_luta` (
  `cd_hr_luta` int(11) NOT NULL AUTO_INCREMENT,
  `cd_luta` int(10) NOT NULL,
  `hr_luta` time NOT NULL COMMENT 'guarda hoario da  luta',
  `tl_lutador` int(2) NOT NULL COMMENT 'contém o valor total de lutadores por luta',
  PRIMARY KEY (`cd_hr_luta`),
  KEY `cd_luta` (`cd_luta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Extraindo dados da tabela `tb_hr_luta`
--

INSERT INTO `tb_hr_luta` (`cd_hr_luta`, `cd_luta`, `hr_luta`, `tl_lutador`) VALUES
(21, 11, '10:00:00', 2),
(22, 11, '11:00:00', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
