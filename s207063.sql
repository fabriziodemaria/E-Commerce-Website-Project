-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generato il: Giu 18, 2014 alle 10:06
-- Versione del server: 5.5.37
-- Versione PHP: 5.3.10-1ubuntu3.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `s207063`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Goods`
--

DROP TABLE IF EXISTS `Goods`;
CREATE TABLE IF NOT EXISTS `Goods` (
  `Good_ID` int(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Owner` varchar(50) NOT NULL,
  `Highest_Bid` double DEFAULT '0',
  `HBid_Author` varchar(50) DEFAULT NULL,
  `Insertion_Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Good_ID`),
  UNIQUE KEY `Name` (`Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dump dei dati per la tabella `Goods`
--

INSERT INTO `Goods` (`Good_ID`, `Name`, `Owner`, `Highest_Bid`, `HBid_Author`, `Insertion_Time`) VALUES
(1, 'u1item1', 'u1@polito.it', 11, 'u2@polito.it', '2014-06-18 07:36:04'),
(2, 'u1item2', 'u1@polito.it', 13, NULL, '2014-06-18 07:36:19'),
(3, 'u2item1', 'u2@polito.it', 30, NULL, '2014-06-18 07:37:12'),
(4, 'u2item2', 'u2@polito.it', 15, 'u1@polito.it', '2014-06-18 07:37:20');

-- --------------------------------------------------------

--
-- Struttura della tabella `Users`
--

DROP TABLE IF EXISTS `Users`;
CREATE TABLE IF NOT EXISTS `Users` (
  `Name` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `User_ID` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`User_ID`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dump dei dati per la tabella `Users`
--

INSERT INTO `Users` (`Name`, `Surname`, `Email`, `Password`, `User_ID`) VALUES
('Uno', 'Polito', 'u1@polito.it', 'ec6ef230f1828039ee794566b9c58adc', 1),
('Due', 'Polito', 'u2@polito.it', '1d665b9b1467944c128a5575119d1cfd', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
