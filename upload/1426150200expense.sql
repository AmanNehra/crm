-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2015 at 12:36 PM
-- Server version: 5.5.38-35.2
-- PHP Version: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mynewdan_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `approved_expense`
--

CREATE TABLE IF NOT EXISTS `approved_expense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `executive_id` int(11) NOT NULL,
  `executive_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `report_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `advance` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `town_visited` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `source` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `destination` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mode` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `km` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `total_amount` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `transport_all_details` text COLLATE utf8_unicode_ci NOT NULL,
  `da` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `boarding` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fooding` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stationary` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xerox` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `courier` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `internet` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `paper` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `leaves` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `others` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `buulty` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
