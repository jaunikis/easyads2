-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2017 at 05:52 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `easyweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `mktransport_users`
--

CREATE TABLE IF NOT EXISTS `mktransport_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `date_first` datetime DEFAULT NULL,
  `date_last` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mktransport_users`
--

INSERT INTO `mktransport_users` (`id`, `user`, `password`, `ip`, `date_first`, `date_last`, `email`) VALUES
(1, 'as', 'asas', '', '0000-00-00 00:00:00', '2017-12-01 17:30:19', '');

-- --------------------------------------------------------

--
-- Table structure for table `mktransport_uzsakymai`
--

CREATE TABLE IF NOT EXISTS `mktransport_uzsakymai` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `ip` varchar(18) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vardas` varchar(128) NOT NULL,
  `tel` varchar(32) NOT NULL,
  `adresas` varchar(256) NOT NULL,
  `svoris` int(12) NOT NULL,
  `papildoma` varchar(256) NOT NULL,
  `salis` varchar(32) NOT NULL,
  `miestas` varchar(32) NOT NULL,
  `busena` varchar(16) NOT NULL,
  `komentarai` varchar(256) NOT NULL,
  `device` varchar(24) NOT NULL,
  `emailas` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `mktransport_uzsakymai`
--

INSERT INTO `mktransport_uzsakymai` (`id`, `ip`, `data`, `vardas`, `tel`, `adresas`, `svoris`, `papildoma`, `salis`, `miestas`, `busena`, `komentarai`, `device`, `emailas`) VALUES
(1, '', '2017-11-22 07:35:53', 'vardas1', '08637373738', 'adresass1', 0, '', '', '', '', '', '', ''),
(2, '', '2017-11-30 07:39:39', 'hsjdjs', '', '', 0, '', '', '', '', '', '', ''),
(3, '', '2017-12-01 07:40:11', 'varadasadsd', '', '', 0, '', '', '', '', '', '', ''),
(4, '127.0.0.1', '2017-12-01 07:48:54', 'Marius Vorosilovas', '086 222 1538', '1 adresas crosserlough\r\ngraddum\r\nKilnaleck\r\nCo.Cavan', 22, 'nedidelis', 'admin', '', 'pending', '', 'desktop', 'jaunikis@gmail.com'),
(5, '127.0.0.1', '2017-12-01 08:03:24', 'Marius Vorosilovas', '086 222 1538', '1 adresas crosserlough\r\ngraddum\r\nKilnaleck\r\nCo.Cavan', 22, 'nedidelis', 'admin', '', 'pending', '', 'desktop', 'jaunikis@gmail.com'),
(6, '127.0.0.1', '2017-12-01 08:05:49', 'Marius Vorosilovas', '086 222 1538', '1 adresas crosserlough\r\ngraddum\r\nKilnaleck\r\nCo.Cavan', 22, 'nedidelis', 'admin', '', 'pending', '', 'desktop', 'jaunikis@gmail.com'),
(7, '127.0.0.1', '2017-12-01 08:08:37', 'Marius Vorosilovas', '086 222 1538', '1 adresas crosserlough\r\ngraddum\r\nKilnaleck\r\nCo.Cavan', 22, 'nedidelis', 'admin', '', 'pending', '', 'desktop', 'jaunikis@gmail.com'),
(8, '127.0.0.1', '2017-12-01 08:11:05', 'Marius Vorosilovas', '086 222 1538', '1 adresas crosserlough\r\ngraddum\r\nKilnaleck\r\nCo.Cavan', 22, 'nedidelis', 'admin', '', 'pending', '', 'desktop', 'jaunikis@gmail.com'),
(9, '127.0.0.1', '2017-12-01 08:12:31', 'Marius Vorosilovas', '086 222 1538', '1 adresas crosserlough\r\ngraddum\r\nKilnaleck\r\nCo.Cavan', 22, 'nedidelis', 'admin', '', 'pending', '', 'desktop', 'jaunikis@gmail.com'),
(10, '127.0.0.1', '2017-12-01 08:16:20', 'Marius Vorosilovas', '086 222 1538', '1 adresas crosserlough\r\ngraddum\r\nKilnaleck\r\nCo.Cavan', 22, 'nedidelis', 'admin', '', 'pending', '', 'desktop', 'jaunikis@gmail.com'),
(11, '127.0.0.1', '2017-12-01 08:16:35', 'Marius Vorosilovas', '086 222 1538', '1 adresas crosserlough\r\ngraddum\r\nKilnaleck\r\nCo.Cavan', 22, 'nedidelis', 'admin', '', 'pending', '', 'desktop', 'jaunikis@gmail.com'),
(12, '127.0.0.1', '2017-12-01 08:17:51', 'Marius Vorosilovas', '086 222 1538', '1 adresas crosserlough\r\ngraddum\r\nKilnaleck\r\nCo.Cavan', 22, 'nedidelis', 'admin', '', 'pending', '', 'mobile', 'jaunikis@gmail.com'),
(13, '127.0.0.1', '2017-12-01 08:18:25', 'Marius Vorosilovas', '086 222 1538', '1 adresas crosserlough\r\ngraddum\r\nKilnaleck\r\nCo.Cavan', 22, 'nedidelis', 'admin', '', 'pending', '', 'mobile', 'jaunikis@gmail.com'),
(14, '127.0.0.1', '2017-12-01 08:18:49', 'Marius Vorosilovas', '086 222 1538', '1 adresas crosserlough\r\ngraddum\r\nKilnaleck\r\nCo.Cavan', 22, 'nedidelis', 'admin', '', 'pending', '', 'mobile', 'jaunikis@gmail.com'),
(15, '127.0.0.1', '2017-12-01 08:20:00', 'Marius Vorosilovas', '086 222 1538', '1 adresas crosserlough\r\ngraddum\r\nKilnaleck\r\nCo.Cavan', 22, 'nedidelis', 'admin', '', 'pending', '', 'mobile', 'jaunikis@gmail.com'),
(16, '127.0.0.1', '2017-12-01 08:20:13', 'Marius Vorosilovas', '086 222 1538', '1 adresas crosserlough\r\ngraddum\r\nKilnaleck\r\nCo.Cavan', 22, 'nedidelis', 'admin', '', 'pending', '', 'desktop', 'jaunikis@gmail.com'),
(17, '127.0.0.1', '2017-12-01 08:20:31', 'Marius Vorosilovas', '086 222 1538', '1 adresas crosserlough\r\ngraddum\r\nKilnaleck\r\nCo.Cavan', 22, 'nedidelis', 'admin', '', 'pending', '', 'desktop', 'jaunikis@gmail.com'),
(18, '127.0.0.1', '2017-12-01 08:24:37', 'Marius Vorosilovas', '086 222 1538', '1 adresas crosserlough\r\ngraddum\r\nKilnaleck\r\nCo.Cavan', 22, 'nedidelis', 'admin', '', 'pending', '', 'desktop', 'jaunikis@gmail.com'),
(19, '127.0.0.1', '2017-12-01 09:43:48', 'vard', '34343', 'adress', 45, 'didelis', 'admin', '', 'pending', '', 'desktop', 'email@sdfdff'),
(20, '127.0.0.1', '2017-12-01 09:44:35', 'vard', '34343', 'adress', 45, 'didelis', 'admin', '', 'pending', '', 'desktop', 'email@sdfdff'),
(21, '127.0.0.1', '2017-12-01 09:47:14', 'vard', '34343', 'adress', 45, 'didelis', 'admin', '', 'pending', '', 'desktop', 'email@sdfdff');

-- --------------------------------------------------------

--
-- Table structure for table `mktransport_visitors`
--

CREATE TABLE IF NOT EXISTS `mktransport_visitors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(18) NOT NULL,
  `country` varchar(64) NOT NULL,
  `device` varchar(16) NOT NULL,
  `city` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `mktransport_visitors`
--

INSERT INTO `mktransport_visitors` (`id`, `date`, `ip`, `country`, `device`, `city`) VALUES
(1, '2017-11-14 09:55:37', '', 'Ireland', 'desktop', 'Dublin'),
(2, '2017-11-21 09:57:11', '127.0.0.1', 'Ireland', 'desktop', 'Cavan'),
(3, '2017-11-30 12:03:08', '127.0.0.1', 'Ireland', 'desktop', 'Cavan'),
(4, '2017-12-01 12:18:04', '127.0.0.1', 'Ireland', 'desktop', 'Cavan'),
(5, '2017-12-01 12:19:09', '127.0.0.1', 'Ireland', 'desktop', 'Cavan'),
(6, '2017-12-01 14:22:21', '127.0.0.1', 'Ireland', 'desktop', 'Cavan'),
(7, '2017-12-01 13:39:55', '127.0.0.1', 'Ireland', 'desktop', 'Cavan'),
(8, '2017-12-01 13:45:49', '127.0.0.6', 'Ireland', 'desktop', 'Cavan'),
(9, '2017-12-01 14:48:28', '127.0.0.5', 'Ireland', 'desktop', 'Cavan'),
(10, '2017-12-01 14:49:42', '127.0.0.5', 'Ireland', 'desktop', 'Cavan'),
(11, '2017-12-01 14:49:57', '127.0.0.3', 'Ireland', 'desktop', 'Cavan'),
(12, '2017-12-01 14:50:30', '127.0.0.2', 'Ireland', 'desktop', 'Cavan'),
(13, '2017-12-01 14:52:20', '127.0.0.2', 'Ireland', 'desktop', 'Cavan'),
(14, '2017-12-01 14:54:23', '127.0.0.1', 'Ireland', 'desktop', 'Cavan'),
(15, '2017-12-01 16:23:18', '127.0.0.1', 'Ireland', 'desktop', 'Cavan'),
(16, '2017-12-01 17:50:38', '127.0.0.1', 'Ireland', 'desktop', 'Cavan');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
