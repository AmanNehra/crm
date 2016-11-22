-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 19, 2015 at 01:27 PM
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
-- Table structure for table `return_voucher`
--

CREATE TABLE IF NOT EXISTS `return_voucher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `v_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `v_date` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `godwon` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v_time` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `salseman_id` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `salseman` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `transportation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `transport_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `corporate_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `corporate_person` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `c_address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `c_city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `c_district` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `c_state` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `c_country` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `teachercopy` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `group1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `series` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `return_voucher`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
