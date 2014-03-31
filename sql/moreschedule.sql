-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 31 mrt 2014 om 15:57
-- Serverversie: 5.6.16
-- PHP-versie: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `moreschedule`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbldocent`
--

CREATE TABLE IF NOT EXISTS `tbldocent` (
  `DocentID` int(11) NOT NULL AUTO_INCREMENT,
  `DocentVoornaam` text NOT NULL,
  `DocentNaam` text NOT NULL,
  PRIMARY KEY (`DocentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblklas`
--

CREATE TABLE IF NOT EXISTS `tblklas` (
  `KlasID` int(10) NOT NULL AUTO_INCREMENT,
  `KlasNaam` varchar(20) NOT NULL,
  PRIMARY KEY (`KlasID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbllokaal`
--

CREATE TABLE IF NOT EXISTS `tbllokaal` (
  `LokaalID` int(10) NOT NULL AUTO_INCREMENT,
  `LokaalCode` varchar(10) NOT NULL,
  PRIMARY KEY (`LokaalID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblrooster`
--

CREATE TABLE IF NOT EXISTS `tblrooster` (
  `RoosterID` int(10) NOT NULL AUTO_INCREMENT,
  `VakID` int(10) NOT NULL,
  `DocentID` int(11) NOT NULL,
  `LokaalID` int(11) NOT NULL,
  `KlasID` int(11) NOT NULL,
  `Dag` text NOT NULL,
  `BeginUur` varchar(10) NOT NULL,
  `EindUur` varchar(10) NOT NULL,
  `Actief` tinyint(1) NOT NULL,
  PRIMARY KEY (`RoosterID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblstudent`
--

CREATE TABLE IF NOT EXISTS `tblstudent` (
  `StudentID` int(10) NOT NULL AUTO_INCREMENT,
  `KlasID` int(10) NOT NULL,
  `StudentNummer` varchar(8) NOT NULL,
  `StudentVoornaam` text NOT NULL,
  `StudentAchternaam` text NOT NULL,
  `StudentEmail` varchar(255) NOT NULL,
  `StudentGsm` varchar(12) NOT NULL,
  PRIMARY KEY (`StudentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblvak`
--

CREATE TABLE IF NOT EXISTS `tblvak` (
  `VakID` int(10) NOT NULL AUTO_INCREMENT,
  `VakNaam` varchar(255) NOT NULL,
  PRIMARY KEY (`VakID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
