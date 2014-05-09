-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 09 mei 2014 om 13:15
-- Serverversie: 5.6.16
-- PHP-versie: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `jijwilteenwebsi`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbladmin`
--

CREATE TABLE IF NOT EXISTS `tbladmin` (
  `adminID` int(255) NOT NULL AUTO_INCREMENT,
  `adminUnummer` varchar(11) NOT NULL,
  `adminPaswoord` varchar(11) NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `tbladmin`
--

INSERT INTO `tbladmin` (`adminID`, `adminUnummer`, `adminPaswoord`) VALUES
(1, 'u0123456', 'test123');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbldocent`
--

CREATE TABLE IF NOT EXISTS `tbldocent` (
  `docentID` int(11) NOT NULL AUTO_INCREMENT,
  `docentNaam` varchar(255) NOT NULL,
  `lesID` int(11) NOT NULL,
  PRIMARY KEY (`docentID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Gegevens worden uitgevoerd voor tabel `tbldocent`
--

INSERT INTO `tbldocent` (`docentID`, `docentNaam`, `lesID`) VALUES
(1, 'Moonen N.', 1),
(2, 'Lenaerts M.', 2),
(3, 'Hens J.', 4),
(4, 'Aerts K.', 5),
(5, 'Rutten K.', 6),
(6, 'Vanelderen R.', 7),
(7, 'Geussens P.', 8),
(8, 'Heerinckx D.', 11),
(9, 'Moonen N.', 3),
(10, 'Lenaerts M.', 14),
(11, 'Lenaerts M.', 15),
(12, 'Hens J.', 10),
(13, 'Hens J.', 13),
(14, 'Hens J.', 12),
(15, 'Aerts K.', 9),
(16, 'Rutten K.', 9),
(17, 'Vanelderen R.', 9),
(18, 'Geussens P.', 16),
(19, 'Geussens P.', 17);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblles`
--

CREATE TABLE IF NOT EXISTS `tblles` (
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
-- Gegevens worden uitgevoerd voor tabel `tblles`
--

INSERT INTO `tblles` (`lesID`, `lesNaam`, `lesDag`, `lesBegin`, `lesEind`, `lesLokaal`, `lesSemester`) VALUES
(1, 'Engels 2', 'maandag', '09:30', '11:45', 'K3/5', 2),
(2, 'Methoden van onderzoek en rapportering - theorie', 'maandag', '11:45', '12:45', 'T014', 2),
(3, 'Engels 2', 'maandag', '13:45', '15:45', 'K3/5', 2),
(4, 'PHP1', 'dinsdag', '08:30', '10:30', 'K3/5', 2),
(5, 'Projectmanagement', 'dinsdag', '10:45', '12:45', 'T014', 2),
(6, 'Digital Publishing', 'dinsdag', '13:45', '18:00', 'K0/3', 2),
(7, 'Content Management Systemen 2', 'dinsdag', '13:45', '17:00', 'K3/3', 2),
(8, 'Ethiek 1 - theorie', 'woensdag', '08:30', '09:30', 'T014', 2),
(9, 'Project 2', 'woensdag', '09:30', '18:00', 'Creativity Gym', 2),
(10, 'PHP1', 'donderdag', '14:45', '18:00', 'K3/5', 2),
(11, 'Motion Design', 'vrijdag', '08:30', '10:30', 'K3/3', 2),
(12, 'Webtechnologie 2', 'vrijdag', '08:30', '11:45', 'Creativity Gym', 2),
(13, 'PHP1', 'vrijdag', '11:45', '12:45', 'K3/1', 2),
(14, 'Methoden van onderzoek en rapportering - practicum', 'vrijdag', '12:45', '13:45', 'K3/1', 2),
(15, 'Methoden van onderzoek en rapportering - practicum', 'vrijdag', '13:45', '14:45', 'K3/1', 2),
(16, 'Ethiek 1 - Begeleiding', 'vrijdag', '13:45', '14:45', 'K1/1', 2),
(17, 'Ethiek 1 - Begeleiding', 'vrijdag', '14:45', '15:45', 'K1/1', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblmelding`
--

CREATE TABLE IF NOT EXISTS `tblmelding` (
  `meldingID` int(255) NOT NULL AUTO_INCREMENT,
  `melding` text NOT NULL,
  PRIMARY KEY (`meldingID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden uitgevoerd voor tabel `tblmelding`
--

INSERT INTO `tblmelding` (`meldingID`, `melding`) VALUES
(1, '6/05/2014 (Dinsdag) - Digital Publishing (Rutten K.) : blabla.'),
(2, '9/05/2014 (Vrijdag) - Hens J. (Webtechnologie 2) zal niet aanwezig zijn'),
(3, '9/05/2014 (Vrijdag) - Geussens P. (Ethiek 1 - Begeleiding) zal niet aanwezig zijn'),
(4, '16/05/2014 (Vrijdag) - Methoden van onderzoek en rapportering - practicum (Lenaerts M.) zal uitzonderlijk doorgaan in lokaal gym.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblstudent`
--

CREATE TABLE IF NOT EXISTS `tblstudent` (
  `studentID` int(255) NOT NULL AUTO_INCREMENT,
  `studentRnummer` varchar(8) NOT NULL,
  `studentPaswoord` varchar(255) NOT NULL,
  `studentMail` varchar(255) NOT NULL,
  `studentVoornaam` varchar(255) NOT NULL,
  `studentNaam` varchar(255) NOT NULL,
  PRIMARY KEY (`studentID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden uitgevoerd voor tabel `tblstudent`
--

INSERT INTO `tblstudent` (`studentID`, `studentRnummer`, `studentPaswoord`, `studentMail`, `studentVoornaam`, `studentNaam`) VALUES
(1, 'r0330949', 'test1', 'r0330949@student.thomasmore.be', 'Liesbeth', 'Vanaerschot'),
(2, 'r0376986', 'test2', 'r0376986@student.thomasmore.be', 'Lissa', 'Sleeckx'),
(3, 'r0382075', 'test3', 'r0382075@student.thomasmore.be', 'Sarah', 'Pelgrims'),
(4, 'r0417768', 'test4', 'r0417768@student.thomasmore.be', 'Ziggy', 'Verstrepen');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblstudentles`
--

CREATE TABLE IF NOT EXISTS `tblstudentles` (
  `studentlesID` int(11) NOT NULL AUTO_INCREMENT,
  `studentID` int(11) NOT NULL,
  `lesID` int(11) NOT NULL,
  PRIMARY KEY (`studentlesID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=111 ;

--
-- Gegevens worden uitgevoerd voor tabel `tblstudentles`
--

INSERT INTO `tblstudentles` (`studentlesID`, `studentID`, `lesID`) VALUES
(110, 4, 19),
(109, 4, 15),
(108, 4, 13),
(107, 4, 12),
(106, 4, 8),
(105, 4, 5),
(104, 4, 4),
(103, 4, 3),
(102, 4, 2),
(101, 3, 18),
(100, 3, 20),
(99, 3, 21),
(98, 3, 22),
(97, 3, 15),
(96, 3, 13),
(95, 3, 11),
(94, 3, 9),
(93, 3, 6),
(92, 3, 5),
(91, 3, 4),
(90, 3, 2),
(89, 3, 1),
(88, 2, 18),
(87, 2, 20),
(86, 2, 21),
(85, 2, 22),
(84, 2, 17),
(83, 2, 15),
(82, 2, 13),
(81, 2, 11),
(80, 2, 9),
(79, 2, 8),
(78, 2, 6),
(77, 2, 5),
(76, 2, 4),
(75, 2, 2),
(74, 2, 1),
(73, 1, 19),
(72, 1, 18),
(71, 1, 13),
(70, 1, 12),
(69, 1, 6),
(68, 1, 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
