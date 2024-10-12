-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.51b-community-nt-log


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
  `idannuaire` int(10) unsigned NOT NULL auto_increment,
  `type_annuaire_idtype` int(10) unsigned NOT NULL,
  `url_ann` varchar(255) default NULL,
  `sou_ann` varchar(255) default NULL,
  `nom_ann` varchar(75) default NULL,
  `code_retour_ann` varchar(255) default NULL,
  PRIMARY KEY  (`idannuaire`),
  KEY `annuaire_FKIndex1` (`type_annuaire_idtype`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `annuaire`
--

/*!40000 ALTER TABLE `annuaire` DISABLE KEYS */;
INSERT INTO `annuaire` (`idannuaire`,`type_annuaire_idtype`,`url_ann`,`sou_ann`,`nom_ann`,`code_retour_ann`) VALUES 
 (1,1,'http://www.frannuaire-gratuit.com','http://www.frannuaire-gratuit.com/index.php?do=basic','annuaire généraliste gratuit','<a href=\'http://www.frannuaire-gratuit.com\'>annuaire généraliste gratuit</a>'),
 (2,1,'http://www.annuaire-web-gratuit.fr','http://www.annuaire-web-gratuit.fr/index.php?do=basic','annuaire web gratuit',NULL),
 (3,1,'http://www.annuaire-internet-gratuit.fr/','http://www.annuaire-internet-gratuit.fr/index.php?do=basic','annuaire internet gratuit',NULL);
/*!40000 ALTER TABLE `annuaire` ENABLE KEYS */;


--
-- Definition of table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `idclient` int(10) unsigned NOT NULL auto_increment,
  `nom_cli` varchar(75) default NULL,
  `mail_cli` varchar(155) default NULL,
  `adr_cli` varchar(75) default NULL,
  `adr2_cli` varchar(75) default NULL,
  `adr3_cli` varchar(75) default NULL,
  `cp_cli` varchar(5) default NULL,
  `vil_cli` varchar(55) default NULL,
  PRIMARY KEY  (`idclient`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` (`idclient`,`nom_cli`,`mail_cli`,`adr_cli`,`adr2_cli`,`adr3_cli`,`cp_cli`,`vil_cli`) VALUES 
 (1,'kevin','kevin_ferrandon@hotmail.com',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;


--
-- Definition of table `devis`
--

DROP TABLE IF EXISTS `devis`;
CREATE TABLE `devis` (
  `client_idclient` int(10) unsigned NOT NULL,
  `annuaire_idannuaire` int(10) unsigned NOT NULL,
  `num_dev` varchar(25) default NULL,
  `date_dev` date default NULL,
  `bsoumis` tinyint(1) default '0',
  `baccepte` tinyint(1) default '0',
  `breffuser` tinyint(1) default '0',
  `url_site` varchar(255) default NULL,
  `valider_dev` tinyint(1) unsigned default NULL,
  `valider_ann` tinyint(1) unsigned default NULL,
  PRIMARY KEY  (`client_idclient`,`annuaire_idannuaire`),
  KEY `client_has_annuaire_FKIndex1` (`client_idclient`),
  KEY `client_has_annuaire_FKIndex2` (`annuaire_idannuaire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devis`
--

/*!40000 ALTER TABLE `devis` DISABLE KEYS */;
INSERT INTO `devis` (`client_idclient`,`annuaire_idannuaire`,`num_dev`,`date_dev`,`bsoumis`,`baccepte`,`breffuser`,`url_site`,`valider_dev`,`valider_ann`) VALUES 
 (1,1,'10REF001','2010-06-08',1,1,0,'http://www.kf-creation-web.com',1,1);
/*!40000 ALTER TABLE `devis` ENABLE KEYS */;


--
-- Definition of table `type_annuaire`
--

DROP TABLE IF EXISTS `type_annuaire`;
CREATE TABLE `type_annuaire` (
  `idtype` int(10) unsigned NOT NULL auto_increment,
  `nom_typ` varchar(45) default NULL,
  PRIMARY KEY  (`idtype`)
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
