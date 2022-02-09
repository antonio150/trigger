-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 09, 2022 at 11:03 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vente`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recettes_jour`
--

DROP TABLE IF EXISTS `recettes_jour`;
CREATE TABLE IF NOT EXISTS `recettes_jour` (
  `rc_date` date NOT NULL,
  `rc_montant` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`rc_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recettes_mois`
--

DROP TABLE IF EXISTS `recettes_mois`;
CREATE TABLE IF NOT EXISTS `recettes_mois` (
  `rc_year` int(11) NOT NULL,
  `rc_month` int(11) NOT NULL,
  `rc_montant` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`rc_year`,`rc_month`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recettes_vendeurs`
--

DROP TABLE IF EXISTS `recettes_vendeurs`;
CREATE TABLE IF NOT EXISTS `recettes_vendeurs` (
  `vd_id` int(11) NOT NULL,
  `rc_date` date NOT NULL,
  `rc_montant` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`vd_id`,`rc_date`),
  KEY `rc_date` (`rc_date`,`vd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recettes_vendeurs`
--

INSERT INTO `recettes_vendeurs` (`vd_id`, `rc_date`, `rc_montant`) VALUES
(1, '2022-02-11', '480.00');

--
-- Triggers `recettes_vendeurs`
--
DROP TRIGGER IF EXISTS `after_recettes_insert`;
DELIMITER $$
CREATE TRIGGER `after_recettes_insert` AFTER INSERT ON `recettes_vendeurs` FOR EACH ROW BEGIN
    	INSERT INTO somme_recettes (vd_id,som_recet,date_recet,action_vd ,date_ajout) VALUES(new.vd_id,(select sum(rc_montant) as som FROM recettes_vendeurs where vd_id=new.vd_id), new.rc_date, "Ajout" ,(select CURRENT_DATE() as Today));
    END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `after_recettes_update`;
DELIMITER $$
CREATE TRIGGER `after_recettes_update` AFTER UPDATE ON `recettes_vendeurs` FOR EACH ROW BEGIN
    	INSERT INTO somme_recettes (vd_id,som_recet, date_recet, action_vd, date_ajout) VALUES(old.vd_id,(select sum(rc_montant) as som FROM recettes_vendeurs where vd_id=old.vd_id), old.rc_date,"Modification",(select CURRENT_DATE() as Today));
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `recettes_vendeurs_mois`
--

DROP TABLE IF EXISTS `recettes_vendeurs_mois`;
CREATE TABLE IF NOT EXISTS `recettes_vendeurs_mois` (
  `rc_year` int(11) NOT NULL,
  `rc_month` int(11) NOT NULL,
  `vd_id` int(11) NOT NULL,
  `rc_montant` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`rc_year`,`rc_month`,`vd_id`),
  KEY `vd_id` (`vd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `somme_recettes`
--

DROP TABLE IF EXISTS `somme_recettes`;
CREATE TABLE IF NOT EXISTS `somme_recettes` (
  `id_somm` int(11) NOT NULL AUTO_INCREMENT,
  `vd_id` int(11) NOT NULL,
  `som_recet` int(11) NOT NULL,
  `date_recet` date NOT NULL,
  `action_vd` varchar(15) NOT NULL,
  `date_ajout` date NOT NULL,
  PRIMARY KEY (`id_somm`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `somme_recettes`
--

INSERT INTO `somme_recettes` (`id_somm`, `vd_id`, `som_recet`, `date_recet`, `action_vd`, `date_ajout`) VALUES
(8, 2, 10500, '2022-01-10', 'Ajout', '2022-01-26'),
(9, 2, 1500, '2022-01-10', 'Modification', '2022-01-26'),
(10, 2, 1508, '2022-01-10', 'Modification', '2022-02-09'),
(11, 1, 440, '2022-02-11', 'Ajout', '2022-02-09'),
(12, 1, 440, '2022-02-11', 'Modification', '2022-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `vendeurs`
--

DROP TABLE IF EXISTS `vendeurs`;
CREATE TABLE IF NOT EXISTS `vendeurs` (
  `vd_id` int(11) NOT NULL AUTO_INCREMENT,
  `vd_name` text NOT NULL,
  `salaire` int(11) NOT NULL,
  PRIMARY KEY (`vd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendeurs`
--

INSERT INTO `vendeurs` (`vd_id`, `vd_name`, `salaire`) VALUES
(1, 'Sary', 12000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
