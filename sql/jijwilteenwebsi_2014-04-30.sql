# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.34)
# Database: jijwilteenwebsi
# Generation Time: 2014-04-30 17:31:01 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tblAdmin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tblAdmin`;

CREATE TABLE `tblAdmin` (
  `adminID` int(255) NOT NULL AUTO_INCREMENT,
  `adminUnummer` varchar(11) NOT NULL,
  `adminPaswoord` varchar(11) NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `tblAdmin` WRITE;
/*!40000 ALTER TABLE `tblAdmin` DISABLE KEYS */;

INSERT INTO `tblAdmin` (`adminID`, `adminUnummer`, `adminPaswoord`)
VALUES
	(1,'u0123456','test123');

/*!40000 ALTER TABLE `tblAdmin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tblDocent
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tblDocent`;

CREATE TABLE `tblDocent` (
  `docentID` int(11) NOT NULL AUTO_INCREMENT,
  `docentNaam` varchar(255) NOT NULL,
  `lesID` int(11) NOT NULL,
  PRIMARY KEY (`docentID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `tblDocent` WRITE;
/*!40000 ALTER TABLE `tblDocent` DISABLE KEYS */;

INSERT INTO `tblDocent` (`docentID`, `docentNaam`, `lesID`)
VALUES
	(1,'Moonen N.',1),
	(2,'Lenaerts M.',2),
	(3,'Hens J.',4),
	(4,'Aerts K.',5),
	(5,'Rutten K.',6),
	(6,'Vanelderen R.',7),
	(7,'Geussens P.',8),
	(8,'Heerinckx D.',11),
	(9,'Moonen N.',3),
	(10,'Lenaerts M.',14),
	(11,'Lenaerts M.',15),
	(12,'Hens J.',10),
	(13,'Hens J.',13),
	(14,'Hens J.',12),
	(15,'Aerts K.',9),
	(16,'Rutten K.',9),
	(17,'Vanelderen R.',9),
	(18,'Geussens P.',16),
	(19,'Geussens P.',17);

/*!40000 ALTER TABLE `tblDocent` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tblLes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tblLes`;

CREATE TABLE `tblLes` (
  `lesID` int(11) NOT NULL AUTO_INCREMENT,
  `lesNaam` varchar(255) NOT NULL,
  `lesDag` varchar(255) NOT NULL,
  `lesBegin` varchar(255) NOT NULL,
  `lesEind` varchar(255) NOT NULL,
  `lesLokaal` varchar(255) NOT NULL,
  `lesSemester` int(11) NOT NULL,
  PRIMARY KEY (`lesID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `tblLes` WRITE;
/*!40000 ALTER TABLE `tblLes` DISABLE KEYS */;

INSERT INTO `tblLes` (`lesID`, `lesNaam`, `lesDag`, `lesBegin`, `lesEind`, `lesLokaal`, `lesSemester`)
VALUES
	(1,'Engels 2','maandag','09:30','11:45','K3/5',2),
	(2,'Methoden van onderzoek en rapportering - theorie','maandag','11:45','12:45','T014',2),
	(3,'Engels 2','maandag','13:45','15:45','K3/5',2),
	(4,'PHP1','dinsdag','08:30','10:30','K3/5',2),
	(5,'Projectmanagement','dinsdag','10:45','12:45','T014',2),
	(6,'Digital Publishing','dinsdag','13:45','18:00','K0/3',2),
	(7,'Content Management Systemen 2','dinsdag','13:45','17:00','K3/3',2),
	(8,'Ethiek 1 - theorie','woensdag','08:30','09:30','T014',2),
	(9,'Project 2','woensdag','09:30','17:30','Creativity Gym',2),
	(10,'PHP1','donderdag','14:45','18:00','K3/5',2),
	(11,'Motion Design','vrijdag','08:30','10:30','K3/3',2),
	(12,'Webtechnologie 2','vrijdag','08:30','11:45','Creativity Gym',2),
	(13,'PHP1','vrijdag','11:45','12:45','K3/1',2),
	(14,'Methoden van onderzoek en rapportering - practicum','vrijdag','12:45','13:45','K3/1',2),
	(15,'Methoden van onderzoek en rapportering - practicum','vrijdag','13:45','14:45','K3/1',2),
	(16,'Ethiek 1 - Begeleiding','vrijdag','13:45','14:45','K1/1',2),
	(17,'Ethiek 1 - Begeleiding','vrijdag','14:45','15:45','K1/1',2);

/*!40000 ALTER TABLE `tblLes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tblMelding
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tblMelding`;

CREATE TABLE `tblMelding` (
  `meldingID` int(255) NOT NULL AUTO_INCREMENT,
  `melding` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`meldingID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table tblStudent
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tblStudent`;

CREATE TABLE `tblStudent` (
  `studentID` int(255) NOT NULL AUTO_INCREMENT,
  `studentRnummer` varchar(8) NOT NULL,
  `studentPaswoord` varchar(255) NOT NULL,
  `studentMail` varchar(255) NOT NULL,
  `studentVoornaam` varchar(255) NOT NULL,
  `studentNaam` varchar(255) NOT NULL,
  PRIMARY KEY (`studentID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `tblStudent` WRITE;
/*!40000 ALTER TABLE `tblStudent` DISABLE KEYS */;

INSERT INTO `tblStudent` (`studentID`, `studentRnummer`, `studentPaswoord`, `studentMail`, `studentVoornaam`, `studentNaam`)
VALUES
	(1,'r0330949','test1','r0330949@student.thomasmore.be','Liesbeth','Vanaerschot'),
	(2,'r0376986','test2','r0376986@student.thomasmore.be','Lissa','Sleeckx'),
	(3,'r0382075','test3','r0382075@student.thomasmore.be','Sarah','Pelgrims'),
	(4,'r0417768','test4','r0417768@student.thomasmore.be','Ziggy','Verstrepen');

/*!40000 ALTER TABLE `tblStudent` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tblStudentLes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tblStudentLes`;

CREATE TABLE `tblStudentLes` (
  `studentlesID` int(11) NOT NULL AUTO_INCREMENT,
  `studentID` int(11) NOT NULL,
  `lesID` int(11) NOT NULL,
  PRIMARY KEY (`studentlesID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `tblStudentLes` WRITE;
/*!40000 ALTER TABLE `tblStudentLes` DISABLE KEYS */;

INSERT INTO `tblStudentLes` (`studentlesID`, `studentID`, `lesID`)
VALUES
	(1,1,4),
	(2,1,6),
	(3,1,12),
	(4,1,13),
	(5,2,1),
	(6,2,2),
	(7,2,4),
	(8,2,5),
	(9,2,6),
	(10,2,8),
	(11,2,9),
	(12,2,11),
	(13,2,13),
	(14,2,15),
	(15,2,17),
	(16,3,1),
	(17,3,2),
	(18,3,4),
	(19,3,5),
	(20,3,6),
	(21,3,9),
	(22,3,11),
	(23,3,13),
	(24,3,15),
	(25,4,2),
	(26,4,3),
	(27,4,4),
	(28,4,5),
	(29,4,8),
	(30,4,12),
	(31,4,13),
	(32,4,15);

/*!40000 ALTER TABLE `tblStudentLes` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
