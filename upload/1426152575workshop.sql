-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2015 at 12:45 PM
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
-- Table structure for table `approved_workshop`
--

CREATE TABLE IF NOT EXISTS `approved_workshop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `executive_id` int(11) NOT NULL,
  `executive` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `venue` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `school` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v_detail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `proposed_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `proposed_time` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `resource_person` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `board` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Schools_invited` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `participate_teachers` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tea` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lunch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estimated_cost` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `goal` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
