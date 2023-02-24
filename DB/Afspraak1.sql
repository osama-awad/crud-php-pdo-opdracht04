-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 23 feb 2023 om 18:59
-- Serverversie: 5.7.36
-- PHP-versie: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Nailstudio`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Afspraak1`
--

DROP TABLE IF EXISTS `Afspraak1`;
CREATE TABLE IF NOT EXISTS `Afspraak1` (
  `Id` int(200) NOT NULL AUTO_INCREMENT,
  `color1` varchar(20) NOT NULL,
  `color2` varchar(20) NOT NULL,
  `color3` varchar(20) NOT NULL,
  `color4` varchar(20) NOT NULL,
  `Telefoonnummer` varchar(20) NOT NULL,
  `E-mailadres` varchar(100) NOT NULL,
  `Afspraak` date NOT NULL,
  `behandeling` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
