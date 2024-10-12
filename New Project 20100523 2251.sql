-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.37-community-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema referencement
--

CREATE DATABASE IF NOT EXISTS referencement;
USE referencement;

--
-- Definition of table `annuaire`
--

DROP TABLE IF EXISTS `annuaire`;
CREATE TABLE `annuaire` (
  `idannuaire` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_annuaire_idtype` int(10) unsigned NOT NULL,
  `url_ann` varchar(255) DEFAULT NULL,
  `sou_ann` varchar(255) DEFAULT NULL,
  `nom_ann` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`idannuaire`),
  KEY `annuaire_FKIndex1` (`type_annuaire_idtype`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `annuaire`
--

/*!40000 ALTER TABLE `annuaire` DISABLE KEYS */;
INSERT INTO `annuaire` (`idannuaire`,`type_annuaire_idtype`,`url_ann`,`sou_ann`,`nom_ann`) VALUES 
 (1,1,'http://www.frannuaire-gratuit.com','http://www.frannuaire-gratuit.com/index.php?do=basic','annuaire généraliste gratuit'),
 (2,1,'http://www.annuaire-web-gratuit.fr','http://www.annuaire-web-gratuit.fr/index.php?do=basic','annuaire web gratuit'),
 (3,1,'http://www.annuaire-internet-gratuit.fr/','http://www.annuaire-internet-gratuit.fr/index.php?do=basic','annuaire internet gratuit');
/*!40000 ALTER TABLE `annuaire` ENABLE KEYS */;


--
-- Definition of table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `idclient` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_cli` varchar(75) DEFAULT NULL,
  `mail_cli` varchar(155) DEFAULT NULL,
  `adr_cli` varchar(75) DEFAULT NULL,
  `adr2_cli` varchar(75) DEFAULT NULL,
  `adr3_cli` varchar(75) DEFAULT NULL,
  `cp_cli` varchar(5) DEFAULT NULL,
  `vil_cli` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`idclient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

/*!40000 ALTER TABLE `client` DISABLE KEYS */;
/*!40000 ALTER TABLE `client` ENABLE KEYS */;


--
-- Definition of table `devis`
--

DROP TABLE IF EXISTS `devis`;
CREATE TABLE `devis` (
  `client_idclient` int(10) unsigned NOT NULL,
  `annuaire_idannuaire` int(10) unsigned NOT NULL,
  `num_dev` varchar(25) DEFAULT NULL,
  `date_dev` date DEFAULT NULL,
  `bsoumis` tinyint(1) DEFAULT '0',
  `baccepte` tinyint(1) DEFAULT '0',
  `breffuser` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`client_idclient`,`annuaire_idannuaire`),
  KEY `client_has_annuaire_FKIndex1` (`client_idclient`),
  KEY `client_has_annuaire_FKIndex2` (`annuaire_idannuaire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devis`
--

/*!40000 ALTER TABLE `devis` DISABLE KEYS */;
/*!40000 ALTER TABLE `devis` ENABLE KEYS */;


--
-- Definition of table `type_annuaire`
--

DROP TABLE IF EXISTS `type_annuaire`;
CREATE TABLE `type_annuaire` (
  `idtype` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_typ` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtype`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_annuaire`
--

/*!40000 ALTER TABLE `type_annuaire` DISABLE KEYS */;
INSERT INTO `type_annuaire` (`idtype`,`nom_typ`) VALUES 
 (1,'freeglobes');
/*!40000 ALTER TABLE `type_annuaire` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
