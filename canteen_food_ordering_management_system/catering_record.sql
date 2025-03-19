
-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 166.62.8.5
-- Generation Time: Sep 23, 2020 at 06:25 AM
-- Server version: 5.5.51
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `celabtasks`
--

-- --------------------------------------------------------

--
-- Table structure for table `catering_record`
--

CREATE TABLE `catering_record` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `trn_date` datetime NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `ordered_menu` varchar(255) DEFAULT NULL,
  `ordered_quantity_normal` varchar(20) DEFAULT NULL,
  `ordered_rate_normal` varchar(50) DEFAULT NULL,
  `ordered_quantity_special` varchar(50) DEFAULT NULL,
  `ordered_rate_special` varchar(50) DEFAULT NULL,
  `ordered_quantity_nonveg` varchar(50) DEFAULT NULL,
  `ordered_rate_nonveg` varchar(50) DEFAULT NULL,
  `ordered_date` date NOT NULL,
  `submittedby` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `catering_record`
--

