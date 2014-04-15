-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: 10.246.16.19:3306
-- Generation Time: Apr 15, 2014 at 12:05 PM
-- Server version: 5.1.72-2
-- PHP Version: 5.3.3-7+squeeze15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jijwilteenwebsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblBeginuur`
--

CREATE TABLE IF NOT EXISTS `tblBeginuur` (
  `BeginUurID` int(255) NOT NULL AUTO_INCREMENT,
  `BeginUur` varchar(5) NOT NULL,
  PRIMARY KEY (`BeginUurID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblDag`
--

CREATE TABLE IF NOT EXISTS `tblDag` (
  `DagID` int(255) NOT NULL AUTO_INCREMENT,
  `Dag` text NOT NULL,
  PRIMARY KEY (`DagID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblEinduur`
--

CREATE TABLE IF NOT EXISTS `tblEinduur` (
  `EindUurID` int(255) NOT NULL AUTO_INCREMENT,
  `EindUur` varchar(5) NOT NULL,
  PRIMARY KEY (`EindUurID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblKlassen`
--

CREATE TABLE IF NOT EXISTS `tblKlassen` (
  `KlasID` int(255) NOT NULL AUTO_INCREMENT,
  `KlasNaam` varchar(255) NOT NULL,
  `RoosterID` int(255) NOT NULL,
  PRIMARY KEY (`KlasID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblLokaal`
--

CREATE TABLE IF NOT EXISTS `tblLokaal` (
  `LokaalID` int(255) NOT NULL AUTO_INCREMENT,
  `LokaalNaam` varchar(255) NOT NULL,
  PRIMARY KEY (`LokaalID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblRooster`
--

CREATE TABLE IF NOT EXISTS `tblRooster` (
  `RoosterID` int(11) NOT NULL AUTO_INCREMENT,
  `VakID` int(11) NOT NULL,
  `DagID` int(11) NOT NULL,
  `BeginUurID` int(11) NOT NULL,
  `EindUurID` int(11) NOT NULL,
  `LokaalID` int(11) NOT NULL,
  PRIMARY KEY (`RoosterID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblSemester`
--

CREATE TABLE IF NOT EXISTS `tblSemester` (
  `SemesterID` int(255) NOT NULL AUTO_INCREMENT,
  `Semester` varchar(255) NOT NULL,
  PRIMARY KEY (`SemesterID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblStudent`
--

CREATE TABLE IF NOT EXISTS `tblStudent` (
  `StudentID` int(255) NOT NULL AUTO_INCREMENT,
  `Studentnummer` varchar(8) NOT NULL,
  `Voornaam` text NOT NULL,
  `Achternaam` text NOT NULL,
  `Wachtwoord` varchar(255) NOT NULL,
  `PersoonlijkRoosterID` int(255) NOT NULL,
  PRIMARY KEY (`StudentID`),
  UNIQUE KEY `Studentnummer` (`Studentnummer`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblVakken`
--

CREATE TABLE IF NOT EXISTS `tblVakken` (
  `VakID` int(255) NOT NULL AUTO_INCREMENT,
  `VakNaam` varchar(255) NOT NULL,
  PRIMARY KEY (`VakID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
