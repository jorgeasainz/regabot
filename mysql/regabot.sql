-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 23, 2016 at 01:53 PM
-- Server version: 5.5.50
-- PHP Version: 5.4.45-0+deb7u4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `regabot`
--

-- --------------------------------------------------------

--
-- Table structure for table `alarma`
--

CREATE TABLE IF NOT EXISTS `alarma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `on` time NOT NULL,
  `off` time NOT NULL,
  `time` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `alarma`
--

INSERT INTO `alarma` (`id`, `on`, `off`, `time`, `active`) VALUES
(1, '11:45:00', '12:25:00', 40, 0),
(2, '20:35:00', '20:40:00', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `salidas`
--

CREATE TABLE IF NOT EXISTS `salidas` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `salida` varchar(50) DEFAULT NULL,
  `valor` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `salidas`
--

INSERT INTO `salidas` (`id`, `salida`, `valor`) VALUES
(1, 'Regadera', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
