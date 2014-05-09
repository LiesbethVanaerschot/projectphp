-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost:8889
-- Genereertijd: 07 Mei 2014 om 21:54
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Gegevens worden uitgevoerd voor tabel `tblLes`
--

INSERT INTO `tblLes` VALUES(1, 'Engels 2', 'maandag', '09:30', '11:45', 'K3/5', 2);
INSERT INTO `tblLes` VALUES(2, 'Methoden van onderzoek en rapportering - theorie', 'maandag', '11:45', '12:45', 'T014', 2);
INSERT INTO `tblLes` VALUES(3, 'Engels 2', 'maandag', '13:45', '15:45', 'K3/5', 2);
INSERT INTO `tblLes` VALUES(4, 'PHP1', 'dinsdag', '08:30', '10:30', 'K3/5', 2);
INSERT INTO `tblLes` VALUES(5, 'Projectmanagement', 'dinsdag', '10:45', '12:45', 'T014', 2);
INSERT INTO `tblLes` VALUES(6, 'Digital Publishing', 'dinsdag', '13:45', '18:00', 'K0/3', 2);
INSERT INTO `tblLes` VALUES(7, 'Content Management Systemen 2', 'dinsdag', '13:45', '17:00', 'K3/3', 2);
INSERT INTO `tblLes` VALUES(8, 'Ethiek 1 - theorie', 'woensdag', '08:30', '09:30', 'T014', 2);
INSERT INTO `tblLes` VALUES(9, 'Project 2', 'woensdag', '09:30', '18:00', 'Creativity Gym', 2);
INSERT INTO `tblLes` VALUES(10, 'PHP1', 'donderdag', '14:45', '18:00', 'K3/5', 2);
INSERT INTO `tblLes` VALUES(11, 'Motion Design', 'vrijdag', '08:30', '10:30', 'K3/3', 2);
INSERT INTO `tblLes` VALUES(12, 'Webtechnologie 2', 'vrijdag', '08:30', '10:30', 'Creativity Gym', 2);
INSERT INTO `tblLes` VALUES(13, 'PHP1', 'vrijdag', '11:45', '12:45', 'K3/1', 2);
INSERT INTO `tblLes` VALUES(14, 'Methoden van onderzoek en rapportering - practicum', 'vrijdag', '12:45', '13:45', 'K3/1', 2);
INSERT INTO `tblLes` VALUES(15, 'Methoden van onderzoek en rapportering - practicum', 'vrijdag', '13:45', '14:45', 'K3/1', 2);
INSERT INTO `tblLes` VALUES(16, 'Ethiek 1 - Begeleiding', 'vrijdag', '13:45', '14:45', 'K1/1', 2);
INSERT INTO `tblLes` VALUES(17, 'Ethiek 1 - Begeleiding', 'vrijdag', '14:45', '15:45', 'K1/1', 2);
INSERT INTO `tblLes` VALUES(24, 'Webtechnologie 2', 'vrijdag', '10:45', '11:45', 'Creativity Gym', 2);
INSERT INTO `tblLes` VALUES(23, 'Digital Publishing', 'dinsdag', '16:00', '18:00', 'K0/3', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblMelding`
--

CREATE TABLE `tblMelding` (
  `meldingID` int(255) NOT NULL AUTO_INCREMENT,
  `melding` text NOT NULL,
  PRIMARY KEY (`meldingID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden uitgevoerd voor tabel `tblMelding`
--

INSERT INTO `tblMelding` VALUES(1, '6/05/2014 (Dinsdag) - Digital Publishing (Rutten K.) : blabla.');
INSERT INTO `tblMelding` VALUES(2, '9/05/2014 (Vrijdag) - Hens J. (Webtechnologie 2) zal niet aanwezig zijn');
INSERT INTO `tblMelding` VALUES(3, '9/05/2014 (Vrijdag) - Geussens P. (Ethiek 1 - Begeleiding) zal niet aanwezig zijn');
INSERT INTO `tblMelding` VALUES(4, '16/05/2014 (Vrijdag) - Methoden van onderzoek en rapportering - practicum (Lenaerts M.) zal uitzonderlijk doorgaan in lokaal gym.');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=111 ;

--
-- Gegevens worden uitgevoerd voor tabel `tblStudentLes`
--

INSERT INTO `tblStudentLes` VALUES(110, 4, 19);
INSERT INTO `tblStudentLes` VALUES(109, 4, 15);
INSERT INTO `tblStudentLes` VALUES(108, 4, 13);
INSERT INTO `tblStudentLes` VALUES(107, 4, 12);
INSERT INTO `tblStudentLes` VALUES(106, 4, 8);
INSERT INTO `tblStudentLes` VALUES(105, 4, 5);
INSERT INTO `tblStudentLes` VALUES(104, 4, 4);
INSERT INTO `tblStudentLes` VALUES(103, 4, 3);
INSERT INTO `tblStudentLes` VALUES(102, 4, 2);
INSERT INTO `tblStudentLes` VALUES(101, 3, 18);
INSERT INTO `tblStudentLes` VALUES(100, 3, 20);
INSERT INTO `tblStudentLes` VALUES(99, 3, 21);
INSERT INTO `tblStudentLes` VALUES(98, 3, 22);
INSERT INTO `tblStudentLes` VALUES(97, 3, 15);
INSERT INTO `tblStudentLes` VALUES(96, 3, 13);
INSERT INTO `tblStudentLes` VALUES(95, 3, 11);
INSERT INTO `tblStudentLes` VALUES(94, 3, 9);
INSERT INTO `tblStudentLes` VALUES(93, 3, 6);
INSERT INTO `tblStudentLes` VALUES(92, 3, 5);
INSERT INTO `tblStudentLes` VALUES(91, 3, 4);
INSERT INTO `tblStudentLes` VALUES(90, 3, 2);
INSERT INTO `tblStudentLes` VALUES(89, 3, 1);
INSERT INTO `tblStudentLes` VALUES(88, 2, 18);
INSERT INTO `tblStudentLes` VALUES(87, 2, 20);
INSERT INTO `tblStudentLes` VALUES(86, 2, 21);
INSERT INTO `tblStudentLes` VALUES(85, 2, 22);
INSERT INTO `tblStudentLes` VALUES(84, 2, 17);
INSERT INTO `tblStudentLes` VALUES(83, 2, 15);
INSERT INTO `tblStudentLes` VALUES(82, 2, 13);
INSERT INTO `tblStudentLes` VALUES(81, 2, 11);
INSERT INTO `tblStudentLes` VALUES(80, 2, 9);
INSERT INTO `tblStudentLes` VALUES(79, 2, 8);
INSERT INTO `tblStudentLes` VALUES(78, 2, 6);
INSERT INTO `tblStudentLes` VALUES(77, 2, 5);
INSERT INTO `tblStudentLes` VALUES(76, 2, 4);
INSERT INTO `tblStudentLes` VALUES(75, 2, 2);
INSERT INTO `tblStudentLes` VALUES(74, 2, 1);
INSERT INTO `tblStudentLes` VALUES(73, 1, 19);
INSERT INTO `tblStudentLes` VALUES(72, 1, 18);
INSERT INTO `tblStudentLes` VALUES(71, 1, 13);
INSERT INTO `tblStudentLes` VALUES(70, 1, 12);
INSERT INTO `tblStudentLes` VALUES(69, 1, 6);
INSERT INTO `tblStudentLes` VALUES(68, 1, 4);
