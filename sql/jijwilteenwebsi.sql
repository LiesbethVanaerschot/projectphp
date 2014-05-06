-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost:8889
-- Genereertijd: 06 Mei 2014 om 11:14
-- Serverversie: 5.5.9
-- PHP-Versie: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jijwilteenwebsi`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblAdmin`
--

CREATE TABLE `tblAdmin` (
  `adminID` int(255) NOT NULL AUTO_INCREMENT,
  `adminUnummer` varchar(11) NOT NULL,
  `adminPaswoord` varchar(11) NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `tblAdmin`
--

INSERT INTO `tblAdmin` VALUES(1, 'u0123456', 'test123');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblDocent`
--

CREATE TABLE `tblDocent` (
  `docentID` int(11) NOT NULL AUTO_INCREMENT,
  `docentNaam` varchar(255) NOT NULL,
  `lesID` int(11) NOT NULL,
  PRIMARY KEY (`docentID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Gegevens worden uitgevoerd voor tabel `tblDocent`
--

INSERT INTO `tblDocent` VALUES(1, 'Moonen N.', 1);
INSERT INTO `tblDocent` VALUES(2, 'Lenaerts M.', 2);
INSERT INTO `tblDocent` VALUES(3, 'Hens J.', 4);
INSERT INTO `tblDocent` VALUES(4, 'Aerts K.', 5);
INSERT INTO `tblDocent` VALUES(5, 'Rutten K.', 6);
INSERT INTO `tblDocent` VALUES(6, 'Vanelderen R.', 7);
INSERT INTO `tblDocent` VALUES(7, 'Geussens P.', 8);
INSERT INTO `tblDocent` VALUES(8, 'Heerinckx D.', 11);
INSERT INTO `tblDocent` VALUES(9, 'Moonen N.', 3);
INSERT INTO `tblDocent` VALUES(10, 'Lenaerts M.', 14);
INSERT INTO `tblDocent` VALUES(11, 'Lenaerts M.', 15);
INSERT INTO `tblDocent` VALUES(12, 'Hens J.', 10);
INSERT INTO `tblDocent` VALUES(13, 'Hens J.', 13);
INSERT INTO `tblDocent` VALUES(14, 'Hens J.', 12);
INSERT INTO `tblDocent` VALUES(15, 'Aerts K.', 9);
INSERT INTO `tblDocent` VALUES(16, 'Rutten K.', 9);
INSERT INTO `tblDocent` VALUES(17, 'Vanelderen R.', 9);
INSERT INTO `tblDocent` VALUES(18, 'Geussens P.', 16);
INSERT INTO `tblDocent` VALUES(19, 'Geussens P.', 17);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblLes`
--

CREATE TABLE `tblLes` (
  `lesID` int(11) NOT NULL AUTO_INCREMENT,
  `lesNaam` varchar(255) NOT NULL,
  `lesDag` varchar(255) NOT NULL,
  `lesBegin` varchar(255) NOT NULL,
  `lesEind` varchar(255) NOT NULL,
  `lesLokaal` varchar(255) NOT NULL,
  `lesSemester` int(11) NOT NULL,
  PRIMARY KEY (`lesID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Gegevens worden uitgevoerd voor tabel `tblLes`
--

INSERT INTO `tblLes` VALUES(1, 'Engels 2', 'maandag', '09:30', '11:45', 'K3/5', 2);
INSERT INTO `tblLes` VALUES(2, 'Methoden van onderzoek en rapportering - theorie', 'maandag', '11:45', '12:45', 'T014', 2);
INSERT INTO `tblLes` VALUES(3, 'Engels 2', 'maandag', '13:45', '15:45', 'K3/5', 2);
INSERT INTO `tblLes` VALUES(4, 'PHP1', 'dinsdag', '08:30', '10:30', 'K3/5', 2);
INSERT INTO `tblLes` VALUES(5, 'Projectmanagement', 'dinsdag', '10:45', '12:45', 'T014', 2);
INSERT INTO `tblLes` VALUES(6, 'Digital Publishing', 'dinsdag', '13:45', '15:45', 'K0/3', 2);
INSERT INTO `tblLes` VALUES(7, 'Content Management Systemen 2', 'dinsdag', '13:45', '17:00', 'K3/3', 2);
INSERT INTO `tblLes` VALUES(8, 'Ethiek 1 - theorie', 'woensdag', '08:30', '09:30', 'T014', 2);
INSERT INTO `tblLes` VALUES(9, 'Project 2', 'woensdag', '09:30', '10:30', 'Creativity Gym', 2);
INSERT INTO `tblLes` VALUES(10, 'PHP1', 'donderdag', '14:45', '18:00', 'K3/5', 2);
INSERT INTO `tblLes` VALUES(11, 'Motion Design', 'vrijdag', '08:30', '10:30', 'K3/3', 2);
INSERT INTO `tblLes` VALUES(12, 'Webtechnologie 2', 'vrijdag', '08:30', '10:30', 'Creativity Gym', 2);
INSERT INTO `tblLes` VALUES(13, 'PHP1', 'vrijdag', '11:45', '12:45', 'K3/1', 2);
INSERT INTO `tblLes` VALUES(14, 'Methoden van onderzoek en rapportering - practicum', 'vrijdag', '12:45', '13:45', 'K3/1', 2);
INSERT INTO `tblLes` VALUES(15, 'Methoden van onderzoek en rapportering - practicum', 'vrijdag', '13:45', '14:45', 'K3/1', 2);
INSERT INTO `tblLes` VALUES(16, 'Ethiek 1 - Begeleiding', 'vrijdag', '13:45', '14:45', 'K1/1', 2);
INSERT INTO `tblLes` VALUES(17, 'Ethiek 1 - Begeleiding', 'vrijdag', '14:45', '15:45', 'K1/1', 2);
INSERT INTO `tblLes` VALUES(18, 'Digital Publishing', 'dinsdag', '16:00', '18:00', 'K0/3', 2);
INSERT INTO `tblLes` VALUES(19, 'Webtechnologie 2', 'vrijdag', '10:45', '11:45', 'Creativity Gym', 2);
INSERT INTO `tblLes` VALUES(20, 'Project 2', 'woensdag', '10:45', '12:45', 'Creativity Gym', 2);
INSERT INTO `tblLes` VALUES(21, 'Project 2', 'woensdag', '13:45', '15:45', 'Creativity Gym', 2);
INSERT INTO `tblLes` VALUES(22, 'Project 2', 'woensdag', '16:00', '18:00', 'Creativity Gym', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblMelding`
--

CREATE TABLE `tblMelding` (
  `meldingID` int(255) NOT NULL AUTO_INCREMENT,
  `meldingOmschrijving` varchar(255) NOT NULL,
  `meldingWeek` varchar(255) NOT NULL,
  `meldingDag` varchar(255) NOT NULL,
  PRIMARY KEY (`meldingID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Gegevens worden uitgevoerd voor tabel `tblMelding`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblStudent`
--

CREATE TABLE `tblStudent` (
  `studentID` int(255) NOT NULL AUTO_INCREMENT,
  `studentRnummer` varchar(8) NOT NULL,
  `studentPaswoord` varchar(255) NOT NULL,
  `studentMail` varchar(255) NOT NULL,
  `studentVoornaam` varchar(255) NOT NULL,
  `studentNaam` varchar(255) NOT NULL,
  PRIMARY KEY (`studentID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden uitgevoerd voor tabel `tblStudent`
--

INSERT INTO `tblStudent` VALUES(1, 'r0330949', 'test1', 'r0330949@student.thomasmore.be', 'Liesbeth', 'Vanaerschot');
INSERT INTO `tblStudent` VALUES(2, 'r0376986', 'test2', 'r0376986@student.thomasmore.be', 'Lissa', 'Sleeckx');
INSERT INTO `tblStudent` VALUES(3, 'r0382075', 'test3', 'r0382075@student.thomasmore.be', 'Sarah', 'Pelgrims');
INSERT INTO `tblStudent` VALUES(4, 'r0417768', 'test4', 'r0417768@student.thomasmore.be', 'Ziggy', 'Verstrepen');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblStudentLes`
--

CREATE TABLE `tblStudentLes` (
  `studentlesID` int(11) NOT NULL AUTO_INCREMENT,
  `studentID` int(11) NOT NULL,
  `lesID` int(11) NOT NULL,
  PRIMARY KEY (`studentlesID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Gegevens worden uitgevoerd voor tabel `tblStudentLes`
--

INSERT INTO `tblStudentLes` VALUES(1, 1, 4);
INSERT INTO `tblStudentLes` VALUES(2, 1, 6);
INSERT INTO `tblStudentLes` VALUES(3, 1, 12);
INSERT INTO `tblStudentLes` VALUES(4, 1, 13);
INSERT INTO `tblStudentLes` VALUES(5, 2, 1);
INSERT INTO `tblStudentLes` VALUES(6, 2, 2);
INSERT INTO `tblStudentLes` VALUES(7, 2, 4);
INSERT INTO `tblStudentLes` VALUES(8, 2, 5);
INSERT INTO `tblStudentLes` VALUES(9, 2, 6);
INSERT INTO `tblStudentLes` VALUES(10, 2, 8);
INSERT INTO `tblStudentLes` VALUES(11, 2, 9);
INSERT INTO `tblStudentLes` VALUES(12, 2, 11);
INSERT INTO `tblStudentLes` VALUES(13, 2, 13);
INSERT INTO `tblStudentLes` VALUES(14, 2, 15);
INSERT INTO `tblStudentLes` VALUES(15, 2, 17);
INSERT INTO `tblStudentLes` VALUES(16, 3, 1);
INSERT INTO `tblStudentLes` VALUES(17, 3, 2);
INSERT INTO `tblStudentLes` VALUES(18, 3, 4);
INSERT INTO `tblStudentLes` VALUES(19, 3, 5);
INSERT INTO `tblStudentLes` VALUES(20, 3, 6);
INSERT INTO `tblStudentLes` VALUES(21, 3, 9);
INSERT INTO `tblStudentLes` VALUES(22, 3, 11);
INSERT INTO `tblStudentLes` VALUES(23, 3, 13);
INSERT INTO `tblStudentLes` VALUES(24, 3, 15);
INSERT INTO `tblStudentLes` VALUES(25, 4, 2);
INSERT INTO `tblStudentLes` VALUES(26, 4, 3);
INSERT INTO `tblStudentLes` VALUES(27, 4, 4);
INSERT INTO `tblStudentLes` VALUES(28, 4, 5);
INSERT INTO `tblStudentLes` VALUES(29, 4, 8);
INSERT INTO `tblStudentLes` VALUES(30, 4, 12);
INSERT INTO `tblStudentLes` VALUES(31, 4, 13);
INSERT INTO `tblStudentLes` VALUES(32, 4, 15);
INSERT INTO `tblStudentLes` VALUES(67, 3, 22);
INSERT INTO `tblStudentLes` VALUES(66, 3, 21);
INSERT INTO `tblStudentLes` VALUES(65, 3, 20);
INSERT INTO `tblStudentLes` VALUES(64, 3, 18);
INSERT INTO `tblStudentLes` VALUES(63, 4, 19);
INSERT INTO `tblStudentLes` VALUES(62, 1, 19);
INSERT INTO `tblStudentLes` VALUES(61, 1, 18);
INSERT INTO `tblStudentLes` VALUES(60, 2, 22);
INSERT INTO `tblStudentLes` VALUES(59, 2, 21);
INSERT INTO `tblStudentLes` VALUES(58, 2, 20);
INSERT INTO `tblStudentLes` VALUES(57, 2, 18);
