-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2014 at 01:30 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sky_new2`
--
CREATE DATABASE IF NOT EXISTS `sky_new2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sky_new2`;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `date_time_at` datetime NOT NULL,
  `explanation` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `emp_id`, `date_time_at`, `explanation`) VALUES
(5, 5, '2014-07-03 10:58:57', 'I was stuck in traffic jam , so couldn''t reach on time in office.'),
(4, 5, '2014-07-02 18:06:10', ''),
(6, 5, '2014-07-10 16:31:42', ''),
(7, 5, '2014-07-12 11:11:40', 'thfgjfgjfhjhg');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details_list`
--

CREATE TABLE IF NOT EXISTS `bank_details_list` (
  `id` int(123) NOT NULL AUTO_INCREMENT,
  `name` varchar(123) NOT NULL,
  `account` varchar(123) NOT NULL,
  `address` varchar(123) NOT NULL,
  `city` varchar(123) NOT NULL,
  `distict` varchar(123) NOT NULL,
  `state` varchar(123) NOT NULL,
  `contact` varchar(123) NOT NULL,
  `email` varchar(123) NOT NULL,
  `date_added` varchar(123) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `bank_details_list`
--

INSERT INTO `bank_details_list` (`id`, `name`, `account`, `address`, `city`, `distict`, `state`, `contact`, `email`, `date_added`) VALUES
(2, 'sunil ', '', 'address 122', 'city 122', 'delhi 122', 'state 122', '8287407636 122', 'suni@gmail.com 122', '2014-10-25 08:12:51'),
(3, 'sunil 12', '1212', 'address 12', 'azadpur 12', 'delhi 12', 'state 12', '8287407636 12', 'suni@gmail.com 12', '2014-10-25 08:18:33'),
(4, 'sunilqw ', '2122', 'addres', 'city', 'dist', 'jjjjjjjjjjj', '54645', 'fdfb', '2014-10-25 08:14:54'),
(5, 'sunilqw ', '2122', 'addres', 'city', 'dist', 'jjjjjjjjjjj', '54645', 'fdfb', '2014-10-25 08:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `chain_school_list`
--

CREATE TABLE IF NOT EXISTS `chain_school_list` (
  `id` int(123) NOT NULL AUTO_INCREMENT,
  `name` varchar(123) NOT NULL,
  `address` varchar(123) NOT NULL,
  `city` varchar(123) NOT NULL,
  `district` varchar(123) NOT NULL,
  `state` varchar(123) NOT NULL,
  `country` varchar(123) NOT NULL,
  `pin` varchar(123) NOT NULL,
  `std` varchar(123) NOT NULL,
  `phone1` varchar(123) NOT NULL,
  `phone2` varchar(123) NOT NULL,
  `mobile` varchar(123) NOT NULL,
  `file` varchar(123) NOT NULL,
  `fax` varchar(123) NOT NULL,
  `school` varchar(123) NOT NULL,
  `web` varchar(123) NOT NULL,
  `email` varchar(123) NOT NULL,
  `date_added` varchar(123) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `chain_school_list`
--

INSERT INTO `chain_school_list` (`id`, `name`, `address`, `city`, `district`, `state`, `country`, `pin`, `std`, `phone1`, `phone2`, `mobile`, `file`, `fax`, `school`, `web`, `email`, `date_added`) VALUES
(2, 'name 1', 'address', 'city', 'district 1', 'state 1', 'country 1', 'pin', 'std 1', 'phone', 'phone 2 1', 'fax 1', '1413803129', 'website 1', 'school', 'tptt `', 'suni@gmail.com', '2014-10-20 13:05:29'),
(3, 'dsdgfsdfsd 1213', '', '', '', '', '', '', '', '', '', '', '1413884005', '', '', '', '', '2014-10-21 11:33:25'),
(4, 'sunil', 'addrwess', '17', 'District 3', 'state 123', 'india', 'pin', 'fdg', '123456', '321456', '123456', '1415880301', 'fax', 'school', 'website', 'sunil@gmail.com', '2014-11-13 13:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `corporate_list`
--

CREATE TABLE IF NOT EXISTS `corporate_list` (
  `id` int(123) NOT NULL AUTO_INCREMENT,
  `code` varchar(123) NOT NULL,
  `category` varchar(123) NOT NULL,
  `name` varchar(123) NOT NULL,
  `address` varchar(1234) NOT NULL,
  `city` varchar(123) NOT NULL,
  `district` varchar(123) NOT NULL,
  `state` varchar(123) NOT NULL,
  `country` varchar(123) NOT NULL,
  `pin` varchar(123) NOT NULL,
  `std` varchar(123) NOT NULL,
  `phone1` varchar(123) NOT NULL,
  `phone2` varchar(123) NOT NULL,
  `fax` varchar(123) NOT NULL,
  `route` varchar(123) NOT NULL,
  `website` varchar(123) NOT NULL,
  `email` varchar(123) NOT NULL,
  `tpt` varchar(123) NOT NULL,
  `bank` varchar(123) NOT NULL,
  `dayoff` varchar(123) NOT NULL,
  `relation` varchar(123) NOT NULL,
  `shoptime` varchar(123) NOT NULL,
  `specialisation1` varchar(123) NOT NULL,
  `specialisation2` varchar(123) NOT NULL,
  `specialisation3` varchar(123) NOT NULL,
  `specialisation4` varchar(123) NOT NULL,
  `remark` varchar(123) NOT NULL,
  `date_added` varchar(123) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `corporate_list`
--

INSERT INTO `corporate_list` (`id`, `code`, `category`, `name`, `address`, `city`, `district`, `state`, `country`, `pin`, `std`, `phone1`, `phone2`, `fax`, `route`, `website`, `email`, `tpt`, `bank`, `dayoff`, `relation`, `shoptime`, `specialisation1`, `specialisation2`, `specialisation3`, `specialisation4`, `remark`, `date_added`) VALUES
(1, 'code ', 'distributors', 'name ', 'address ', 'city', 'district ', 'state ', 'country ', 'pin ', 'std ', 'phone', 'phone 2 ', 'fax ', 'ret ', 'website ', 'suni@gmail.com', 'tptt ', 'bank ', 'day off ', 'relation ', 'shop ', 'spl ', 'spl2 ', 'spl3 ', 'spl4 ', 'tyr', '2014-10-20 07:42:02'),
(3, 'coding 2', 'distributors', 'sunil', '', 'azadpur', 'azadpur', 'delhi', 'india', 'pin code', 'std code', '9452867650', '8287407636', 'fax', '2', 'google.com', 'sunil@gmail.com', 'tpt', 'bank details', 'day off', 'relation', 'shop ', 'spcilaition 1', 'spcl2 ', 'spcl3 ', 'spcl 4', 'remark', '2014-10-20 07:44:39'),
(4, '123', 'bookseller', 'publisher', 'address', '17', 'District 3', 'state 123', 'country', 'pin', 'fdg', 'phone', 'phone', 'fax', '1', 'web ', 'email', 'tpt', 'bank', '1st Sat 123', 'Good', 'shop', 'Hindi', 'Hindi', 'Hindi', 'Hindi', 'remark', '2014-11-13 10:43:47'),
(8, '103', 'bookseller', 'sunil', 'addrwess', '17', 'District', 'fdg123', 'india', 'pin', 'std', '123456', 'ph', 'fax', '1', 'web', 'sunil@gmail.com', 'tpt', 'bank', '1st Sat 123', 'Bad', '10', 'Hindi', 'Hindi', 'Hindi', 'Hindi', 'remark', '2014-11-13 10:51:57');

-- --------------------------------------------------------

--
-- Table structure for table `dan_users`
--

CREATE TABLE IF NOT EXISTS `dan_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_decrypt` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_registered` datetime NOT NULL,
  `gender` varchar(255) NOT NULL,
  `activation_key` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `user_type` varchar(111) NOT NULL,
  `user_rights` text NOT NULL,
  `user_authority` varchar(1234) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `dan_users`
--

INSERT INTO `dan_users` (`id`, `user_name`, `user_pass`, `user_decrypt`, `user_email`, `user_phone`, `address`, `user_registered`, `gender`, `activation_key`, `status`, `user_type`, `user_rights`, `user_authority`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', '#truck@2094', 'danstring.abhishek@gmail.com', '89898988999', 'old delhi', '2014-07-10 16:16:55', 'Male', '74960965', 1, '1', 'a:7:{i:0;s:6:"en_add";i:1;s:7:"en_edit";i:2;s:9:"en_delete";i:3;s:9:"en_assign";i:4;s:6:"qu_add";i:5;s:7:"qu_edit";i:6;s:9:"qu_delete";}', 'a:3:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";}'),
(13, 'admin2', '202cb962ac59075b964b07152d234b70', '123', 'admin@gmail.com', '9452867650', 'admin address', '2014-10-17 09:17:33', 'Male', '23144532', 0, '1', 'N;', 'a:5:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";}'),
(17, 'sunil', '202cb962ac59075b964b07152d234b70', '123', 'sunil@mail.com', '12345', 'address', '2014-10-22 07:31:55', 'Male', '72229004', 0, '1', 'N;', 'a:6:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";i:5;s:1:"6";}');

-- --------------------------------------------------------

--
-- Table structure for table `department_list`
--

CREATE TABLE IF NOT EXISTS `department_list` (
  `id` int(123) NOT NULL AUTO_INCREMENT,
  `code` varchar(123) NOT NULL,
  `department` varchar(123) NOT NULL,
  `name` varchar(123) NOT NULL,
  `designation` varchar(123) NOT NULL,
  `address` varchar(123) NOT NULL,
  `dob` varchar(123) NOT NULL,
  `doj` varchar(123) NOT NULL,
  `mstatus` varchar(123) NOT NULL,
  `relation` varchar(123) NOT NULL,
  `city` varchar(123) NOT NULL,
  `district` varchar(123) NOT NULL,
  `state` varchar(123) NOT NULL,
  `country` varchar(123) NOT NULL,
  `pin` varchar(123) NOT NULL,
  `std` varchar(123) NOT NULL,
  `rsaddress` varchar(123) NOT NULL,
  `phone1` varchar(123) NOT NULL,
  `email` varchar(123) NOT NULL,
  `mobile1` varchar(123) NOT NULL,
  `mobile2` varchar(123) NOT NULL,
  `subject` varchar(123) NOT NULL,
  `item` varchar(123) NOT NULL,
  `class` varchar(123) NOT NULL,
  `user` varchar(123) NOT NULL,
  `pass` varchar(123) NOT NULL,
  `date_added` varchar(123) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `department_list`
--

INSERT INTO `department_list` (`id`, `code`, `department`, `name`, `designation`, `address`, `dob`, `doj`, `mstatus`, `relation`, `city`, `district`, `state`, `country`, `pin`, `std`, `rsaddress`, `phone1`, `email`, `mobile1`, `mobile2`, `subject`, `item`, `class`, `user`, `pass`, `date_added`) VALUES
(3, 'code department sunil', 'sales', 'name sunil', 'designation sunil', 'address sunil', 'dob sunil', 'doj sunil', 'unmarried', 'Good', '17', 'District', 'fdg123', 'india', 'pin', 'std', 'gfh sunil', 'phone 1 sunil', 'suni@gmail.com', 'mobile 1 sunil', 'mobile 2 sunil', 'English 12', 'item sunil', '1', 'user id sunil', '123', '2014-11-13 13:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `discount_grade_list`
--

CREATE TABLE IF NOT EXISTS `discount_grade_list` (
  `id` int(123) NOT NULL AUTO_INCREMENT,
  `grade` varchar(123) NOT NULL,
  `value` varchar(123) NOT NULL,
  `date_added` varchar(123) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `discount_grade_list`
--

INSERT INTO `discount_grade_list` (`id`, `grade`, `value`, `date_added`) VALUES
(2, 'A', '40', '2014-10-25 08:54:04'),
(3, 'B', '30', '2014-10-25 08:54:20'),
(4, 'C', '20', '2014-10-25 08:54:32');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `generated_by` varchar(255) NOT NULL,
  `invoice_code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_item_table`
--

CREATE TABLE IF NOT EXISTS `invoice_item_table` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_no` longtext,
  `particular` longtext,
  `itemcode` longtext,
  `qty` longtext,
  `rate` longtext,
  `amount` longtext,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `invoice_item_table`
--

INSERT INTO `invoice_item_table` (`item_id`, `s_no`, `particular`, `itemcode`, `qty`, `rate`, `amount`) VALUES
(5, 'a:15:{s:5:"s_no1";s:1:"1";s:5:"s_no2";s:1:"2";s:5:"s_no3";s:1:"3";s:5:"s_no4";s:0:"";s:5:"s_no5";s:0:"";s:5:"s_no6";s:0:"";s:5:"s_no7";s:0:"";s:5:"s_no8";s:0:"";s:5:"s_no9";s:0:"";s:6:"s_no10";s:0:"";s:6:"s_no11";s:0:"";s:6:"s_no12";s:0:"";s:6:"s_no13";s:0:"";s:6:"s_no14";s:0:"";s:6:"s_no15";s:0:"";}', 'a:15:{s:11:"particular1";s:5:"item1";s:11:"particular2";s:5:"item2";s:11:"particular3";s:5:"item3";s:11:"particular4";s:0:"";s:11:"particular5";s:0:"";s:11:"particular6";s:0:"";s:11:"particular7";s:0:"";s:11:"particular8";s:0:"";s:11:"particular9";s:0:"";s:12:"particular10";s:0:"";s:12:"particular11";s:0:"";s:12:"particular12";s:0:"";s:12:"particular13";s:0:"";s:12:"particular14";s:0:"";s:12:"particular15";s:32:"Sale Against Central Farm C/H/F/";}', 'a:15:{s:5:"item1";s:10:"itm5666766";s:5:"item2";s:8:"itm65644";s:5:"item3";s:8:"itm55445";s:5:"item4";s:0:"";s:5:"item5";s:0:"";s:5:"item6";s:0:"";s:5:"item7";s:0:"";s:5:"item8";s:0:"";s:5:"item9";s:0:"";s:6:"item10";s:0:"";s:6:"item11";s:0:"";s:6:"item12";s:0:"";s:6:"item13";s:0:"";s:6:"item14";s:0:"";s:6:"item15";s:0:"";}', 'a:15:{s:4:"qty1";s:1:"2";s:4:"qty2";s:1:"5";s:4:"qty3";s:1:"2";s:4:"qty4";s:0:"";s:4:"qty5";s:0:"";s:4:"qty6";s:0:"";s:4:"qty7";s:0:"";s:4:"qty8";s:0:"";s:4:"qty9";s:0:"";s:5:"qty10";s:0:"";s:5:"qty11";s:0:"";s:5:"qty12";s:0:"";s:5:"qty13";s:0:"";s:5:"qty14";s:0:"";s:5:"qty15";s:0:"";}', 'a:15:{s:5:"rate1";s:2:"45";s:5:"rate2";s:2:"66";s:5:"rate3";s:2:"44";s:5:"rate4";s:0:"";s:5:"rate5";s:0:"";s:5:"rate6";s:0:"";s:5:"rate7";s:0:"";s:5:"rate8";s:0:"";s:5:"rate9";s:0:"";s:6:"rate10";s:0:"";s:6:"rate11";s:0:"";s:6:"rate12";s:0:"";s:6:"rate13";s:0:"";s:6:"rate14";s:0:"";s:6:"rate15";s:0:"";}', 'a:15:{s:7:"amount1";s:3:"600";s:7:"amount2";s:4:"1000";s:7:"amount3";s:3:"500";s:7:"amount4";s:0:"";s:7:"amount5";s:0:"";s:7:"amount6";s:0:"";s:7:"amount7";s:0:"";s:7:"amount8";s:0:"";s:7:"amount9";s:0:"";s:8:"amount10";s:0:"";s:8:"amount11";s:0:"";s:8:"amount12";s:0:"";s:8:"amount13";s:0:"";s:8:"amount14";s:0:"";s:8:"amount15";s:0:"";}'),
(6, 'a:15:{s:5:"s_no1";s:1:"1";s:5:"s_no2";s:1:"2";s:5:"s_no3";s:1:"3";s:5:"s_no4";s:0:"";s:5:"s_no5";s:0:"";s:5:"s_no6";s:0:"";s:5:"s_no7";s:0:"";s:5:"s_no8";s:0:"";s:5:"s_no9";s:0:"";s:6:"s_no10";s:0:"";s:6:"s_no11";s:0:"";s:6:"s_no12";s:0:"";s:6:"s_no13";s:0:"";s:6:"s_no14";s:0:"";s:6:"s_no15";s:0:"";}', 'a:15:{s:11:"particular1";s:5:"item1";s:11:"particular2";s:5:"item2";s:11:"particular3";s:5:"item3";s:11:"particular4";s:0:"";s:11:"particular5";s:0:"";s:11:"particular6";s:0:"";s:11:"particular7";s:0:"";s:11:"particular8";s:0:"";s:11:"particular9";s:0:"";s:12:"particular10";s:0:"";s:12:"particular11";s:0:"";s:12:"particular12";s:0:"";s:12:"particular13";s:0:"";s:12:"particular14";s:0:"";s:12:"particular15";s:32:"Sale Against Central Farm C/H/F/";}', 'a:15:{s:5:"item1";s:10:"itm5666766";s:5:"item2";s:8:"itm65644";s:5:"item3";s:8:"itm55445";s:5:"item4";s:0:"";s:5:"item5";s:0:"";s:5:"item6";s:0:"";s:5:"item7";s:0:"";s:5:"item8";s:0:"";s:5:"item9";s:0:"";s:6:"item10";s:0:"";s:6:"item11";s:0:"";s:6:"item12";s:0:"";s:6:"item13";s:0:"";s:6:"item14";s:0:"";s:6:"item15";s:0:"";}', 'a:15:{s:4:"qty1";s:1:"2";s:4:"qty2";s:1:"5";s:4:"qty3";s:1:"2";s:4:"qty4";s:0:"";s:4:"qty5";s:0:"";s:4:"qty6";s:0:"";s:4:"qty7";s:0:"";s:4:"qty8";s:0:"";s:4:"qty9";s:0:"";s:5:"qty10";s:0:"";s:5:"qty11";s:0:"";s:5:"qty12";s:0:"";s:5:"qty13";s:0:"";s:5:"qty14";s:0:"";s:5:"qty15";s:0:"";}', 'a:15:{s:5:"rate1";s:2:"45";s:5:"rate2";s:2:"66";s:5:"rate3";s:2:"44";s:5:"rate4";s:0:"";s:5:"rate5";s:0:"";s:5:"rate6";s:0:"";s:5:"rate7";s:0:"";s:5:"rate8";s:0:"";s:5:"rate9";s:0:"";s:6:"rate10";s:0:"";s:6:"rate11";s:0:"";s:6:"rate12";s:0:"";s:6:"rate13";s:0:"";s:6:"rate14";s:0:"";s:6:"rate15";s:0:"";}', 'a:15:{s:7:"amount1";s:3:"600";s:7:"amount2";s:4:"1000";s:7:"amount3";s:3:"500";s:7:"amount4";s:0:"";s:7:"amount5";s:0:"";s:7:"amount6";s:0:"";s:7:"amount7";s:0:"";s:7:"amount8";s:0:"";s:7:"amount9";s:0:"";s:8:"amount10";s:0:"";s:8:"amount11";s:0:"";s:8:"amount12";s:0:"";s:8:"amount13";s:0:"";s:8:"amount14";s:0:"";s:8:"amount15";s:0:"";}'),
(7, 'a:15:{s:5:"s_no1";s:0:"";s:5:"s_no2";s:0:"";s:5:"s_no3";s:0:"";s:5:"s_no4";s:0:"";s:5:"s_no5";s:0:"";s:5:"s_no6";s:0:"";s:5:"s_no7";s:0:"";s:5:"s_no8";s:0:"";s:5:"s_no9";s:0:"";s:6:"s_no10";s:0:"";s:6:"s_no11";s:0:"";s:6:"s_no12";s:0:"";s:6:"s_no13";s:0:"";s:6:"s_no14";s:0:"";s:6:"s_no15";s:0:"";}', 'a:15:{s:11:"particular1";s:0:"";s:11:"particular2";s:0:"";s:11:"particular3";s:0:"";s:11:"particular4";s:0:"";s:11:"particular5";s:0:"";s:11:"particular6";s:0:"";s:11:"particular7";s:0:"";s:11:"particular8";s:0:"";s:11:"particular9";s:0:"";s:12:"particular10";s:0:"";s:12:"particular11";s:0:"";s:12:"particular12";s:0:"";s:12:"particular13";s:0:"";s:12:"particular14";s:0:"";s:12:"particular15";s:32:"Sale Against Central Farm C/H/F/";}', 'a:15:{s:5:"item1";s:0:"";s:5:"item2";s:0:"";s:5:"item3";s:0:"";s:5:"item4";s:0:"";s:5:"item5";s:0:"";s:5:"item6";s:0:"";s:5:"item7";s:0:"";s:5:"item8";s:0:"";s:5:"item9";s:0:"";s:6:"item10";s:0:"";s:6:"item11";s:0:"";s:6:"item12";s:0:"";s:6:"item13";s:0:"";s:6:"item14";s:0:"";s:6:"item15";s:0:"";}', 'a:15:{s:4:"qty1";s:0:"";s:4:"qty2";s:0:"";s:4:"qty3";s:0:"";s:4:"qty4";s:0:"";s:4:"qty5";s:0:"";s:4:"qty6";s:0:"";s:4:"qty7";s:0:"";s:4:"qty8";s:0:"";s:4:"qty9";s:0:"";s:5:"qty10";s:0:"";s:5:"qty11";s:0:"";s:5:"qty12";s:0:"";s:5:"qty13";s:0:"";s:5:"qty14";s:0:"";s:5:"qty15";s:0:"";}', 'a:15:{s:5:"rate1";s:0:"";s:5:"rate2";s:0:"";s:5:"rate3";s:0:"";s:5:"rate4";s:0:"";s:5:"rate5";s:0:"";s:5:"rate6";s:0:"";s:5:"rate7";s:0:"";s:5:"rate8";s:0:"";s:5:"rate9";s:0:"";s:6:"rate10";s:0:"";s:6:"rate11";s:0:"";s:6:"rate12";s:0:"";s:6:"rate13";s:0:"";s:6:"rate14";s:0:"";s:6:"rate15";s:0:"";}', 'a:15:{s:7:"amount1";s:0:"";s:7:"amount2";s:0:"";s:7:"amount3";s:0:"";s:7:"amount4";s:0:"";s:7:"amount5";s:0:"";s:7:"amount6";s:0:"";s:7:"amount7";s:0:"";s:7:"amount8";s:0:"";s:7:"amount9";s:0:"";s:8:"amount10";s:0:"";s:8:"amount11";s:0:"";s:8:"amount12";s:0:"";s:8:"amount13";s:0:"";s:8:"amount14";s:0:"";s:8:"amount15";s:0:"";}'),
(8, 'a:15:{s:5:"s_no1";s:2:"11";s:5:"s_no2";s:0:"";s:5:"s_no3";s:0:"";s:5:"s_no4";s:0:"";s:5:"s_no5";s:0:"";s:5:"s_no6";s:0:"";s:5:"s_no7";s:0:"";s:5:"s_no8";s:0:"";s:5:"s_no9";s:0:"";s:6:"s_no10";s:0:"";s:6:"s_no11";s:0:"";s:6:"s_no12";s:0:"";s:6:"s_no13";s:0:"";s:6:"s_no14";s:0:"";s:6:"s_no15";s:0:"";}', 'a:15:{s:11:"particular1";s:2:"11";s:11:"particular2";s:0:"";s:11:"particular3";s:0:"";s:11:"particular4";s:0:"";s:11:"particular5";s:0:"";s:11:"particular6";s:0:"";s:11:"particular7";s:0:"";s:11:"particular8";s:0:"";s:11:"particular9";s:0:"";s:12:"particular10";s:0:"";s:12:"particular11";s:0:"";s:12:"particular12";s:0:"";s:12:"particular13";s:0:"";s:12:"particular14";s:0:"";s:12:"particular15";s:32:"Sale Against Central Farm C/H/F/";}', 'a:15:{s:5:"item1";s:2:"11";s:5:"item2";s:0:"";s:5:"item3";s:0:"";s:5:"item4";s:0:"";s:5:"item5";s:0:"";s:5:"item6";s:0:"";s:5:"item7";s:0:"";s:5:"item8";s:0:"";s:5:"item9";s:0:"";s:6:"item10";s:0:"";s:6:"item11";s:0:"";s:6:"item12";s:0:"";s:6:"item13";s:0:"";s:6:"item14";s:0:"";s:6:"item15";s:0:"";}', 'a:15:{s:4:"qty1";s:2:"11";s:4:"qty2";s:0:"";s:4:"qty3";s:0:"";s:4:"qty4";s:0:"";s:4:"qty5";s:0:"";s:4:"qty6";s:0:"";s:4:"qty7";s:0:"";s:4:"qty8";s:0:"";s:4:"qty9";s:0:"";s:5:"qty10";s:0:"";s:5:"qty11";s:0:"";s:5:"qty12";s:0:"";s:5:"qty13";s:0:"";s:5:"qty14";s:0:"";s:5:"qty15";s:0:"";}', 'a:15:{s:5:"rate1";s:2:"11";s:5:"rate2";s:0:"";s:5:"rate3";s:0:"";s:5:"rate4";s:0:"";s:5:"rate5";s:0:"";s:5:"rate6";s:0:"";s:5:"rate7";s:0:"";s:5:"rate8";s:0:"";s:5:"rate9";s:0:"";s:6:"rate10";s:0:"";s:6:"rate11";s:0:"";s:6:"rate12";s:0:"";s:6:"rate13";s:0:"";s:6:"rate14";s:0:"";s:6:"rate15";s:0:"";}', 'a:15:{s:7:"amount1";s:2:"11";s:7:"amount2";s:0:"";s:7:"amount3";s:0:"";s:7:"amount4";s:0:"";s:7:"amount5";s:0:"";s:7:"amount6";s:0:"";s:7:"amount7";s:0:"";s:7:"amount8";s:0:"";s:7:"amount9";s:0:"";s:8:"amount10";s:0:"";s:8:"amount11";s:0:"";s:8:"amount12";s:0:"";s:8:"amount13";s:0:"";s:8:"amount14";s:0:"";s:8:"amount15";s:0:"";}');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_sec_table`
--

CREATE TABLE IF NOT EXISTS `invoice_sec_table` (
  `sec_id` int(11) NOT NULL AUTO_INCREMENT,
  `sl_no` text NOT NULL,
  `description` longtext NOT NULL,
  `part` text NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `p` varchar(255) NOT NULL,
  PRIMARY KEY (`sec_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `invoice_sec_table`
--

INSERT INTO `invoice_sec_table` (`sec_id`, `sl_no`, `description`, `part`, `qty`, `rate`, `amount`, `p`) VALUES
(1, '1', 'sfsf', 'sfs0099', '90', '100', '9000', '00'),
(4, '1\r\n\r\n\r\n2', 'new products\r\n\r\n\r\ntwo products', 'fgfdgd56767\r\n\r\n\r\ndgfh56577', '5\r\n\r\n\r\n4', '500\r\n\r\n\r\n600', '2500\r\n\r\n\r\n2400', '00\r\n\r\n\r\n00'),
(5, '1', 'product one is nice', 'part32', '2', '67', '670', '00'),
(6, 'df', 'df', 'df', 'df', 'df', 'df', 'df'),
(7, 'df', 'df', 'df', 'df', 'df', 'df', 'df'),
(8, '3', '3', '3', '3', '3', '3', '3'),
(9, '33', '33', '33', '33', '333', '33', '33');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_third_table`
--

CREATE TABLE IF NOT EXISTS `invoice_third_table` (
  `third_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_of_pack` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `value` varchar(255) NOT NULL,
  `actual_weight` varchar(255) NOT NULL,
  `amountss` longtext NOT NULL,
  `cosignator` longtext NOT NULL,
  `cosignee` longtext NOT NULL,
  PRIMARY KEY (`third_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `invoice_third_table`
--

INSERT INTO `invoice_third_table` (`third_id`, `no_of_pack`, `description`, `value`, `actual_weight`, `amountss`, `cosignator`, `cosignee`) VALUES
(2, '55', 'very nice', '407686', '5 quintal', 'a:20:{s:4:"rate";s:2:"30";s:6:"rate_p";s:2:"00";s:7:"freight";s:2:"50";s:9:"freight_p";s:2:"00";s:9:"over_load";s:2:"20";s:11:"over_load_p";s:2:"20";s:8:"labor_ch";s:3:"100";s:10:"labor_ch_p";s:2:"00";s:5:"kanta";s:3:"100";s:7:"kanta_p";s:2:"00";s:10:"servic_tax";s:3:"100";s:12:"servic_tax_p";s:2:"00";s:9:"border_ch";s:3:"100";s:11:"border_ch_p";s:2:"00";s:2:"gr";s:3:"100";s:4:"gr_p";s:2:"00";s:5:"total";s:4:"5000";s:7:"total_p";s:2:"00";s:7:"advance";s:4:"3490";s:9:"advance_p";s:2:"00";}', 'vijay pal', 'vikas singh'),
(3, '66', 'truckwaale crm', '6678', '67kg', 'a:20:{s:4:"rate";s:2:"30";s:6:"rate_p";s:2:"40";s:7:"freight";s:2:"78";s:9:"freight_p";s:2:"00";s:9:"over_load";s:2:"87";s:11:"over_load_p";s:2:"87";s:8:"labor_ch";s:2:"99";s:10:"labor_ch_p";s:2:"00";s:5:"kanta";s:2:"44";s:7:"kanta_p";s:2:"00";s:10:"servic_tax";s:2:"55";s:12:"servic_tax_p";s:2:"00";s:9:"border_ch";s:2:"55";s:11:"border_ch_p";s:2:"00";s:2:"gr";s:2:"44";s:4:"gr_p";s:2:"00";s:5:"total";s:2:"44";s:7:"total_p";s:2:"00";s:7:"advance";s:3:"600";s:9:"advance_p";s:2:"00";}', 'danstring', 'danstring and truckwale'),
(4, '67876', 'veri nice artists', '676', '45', 'a:20:{s:4:"rate";s:2:"30";s:6:"rate_p";s:2:"00";s:7:"freight";s:2:"50";s:9:"freight_p";s:2:"00";s:9:"over_load";s:2:"20";s:11:"over_load_p";s:2:"20";s:8:"labor_ch";s:3:"100";s:10:"labor_ch_p";s:2:"00";s:5:"kanta";s:3:"100";s:7:"kanta_p";s:2:"00";s:10:"servic_tax";s:3:"100";s:12:"servic_tax_p";s:2:"00";s:9:"border_ch";s:3:"100";s:11:"border_ch_p";s:2:"00";s:2:"gr";s:3:"100";s:4:"gr_p";s:2:"00";s:5:"total";s:4:"5000";s:7:"total_p";s:2:"00";s:7:"advance";s:5:"34444";s:9:"advance_p";s:2:"00";}', 'ert56tyt', 'ertyrty6756'),
(5, 'dfg', 'dfg', 'dfg', 'dfg', 'a:20:{s:4:"rate";s:3:"dfg";s:6:"rate_p";s:2:"df";s:7:"freight";s:0:"";s:9:"freight_p";s:0:"";s:9:"over_load";s:0:"";s:11:"over_load_p";s:0:"";s:8:"labor_ch";s:0:"";s:10:"labor_ch_p";s:0:"";s:5:"kanta";s:0:"";s:7:"kanta_p";s:0:"";s:10:"servic_tax";s:0:"";s:12:"servic_tax_p";s:0:"";s:9:"border_ch";s:0:"";s:11:"border_ch_p";s:0:"";s:2:"gr";s:0:"";s:4:"gr_p";s:0:"";s:5:"total";s:0:"";s:7:"total_p";s:0:"";s:7:"advance";s:0:"";s:9:"advance_p";s:0:"";}', '34', '34'),
(6, '33', '33', 'sdf', '33', 'a:20:{s:4:"rate";s:0:"";s:6:"rate_p";s:0:"";s:7:"freight";s:0:"";s:9:"freight_p";s:0:"";s:9:"over_load";s:0:"";s:11:"over_load_p";s:0:"";s:8:"labor_ch";s:0:"";s:10:"labor_ch_p";s:0:"";s:5:"kanta";s:0:"";s:7:"kanta_p";s:0:"";s:10:"servic_tax";s:0:"";s:12:"servic_tax_p";s:0:"";s:9:"border_ch";s:0:"";s:11:"border_ch_p";s:0:"";s:2:"gr";s:0:"";s:4:"gr_p";s:0:"";s:5:"total";s:0:"";s:7:"total_p";s:0:"";s:7:"advance";s:0:"";s:9:"advance_p";s:0:"";}', 'sdf', 'sdf'),
(7, 'df', 'df', 'df', 'df', 'a:20:{s:4:"rate";s:2:"df";s:6:"rate_p";s:2:"df";s:7:"freight";s:0:"";s:9:"freight_p";s:0:"";s:9:"over_load";s:0:"";s:11:"over_load_p";s:0:"";s:8:"labor_ch";s:0:"";s:10:"labor_ch_p";s:0:"";s:5:"kanta";s:0:"";s:7:"kanta_p";s:0:"";s:10:"servic_tax";s:0:"";s:12:"servic_tax_p";s:0:"";s:9:"border_ch";s:0:"";s:11:"border_ch_p";s:0:"";s:2:"gr";s:0:"";s:4:"gr_p";s:0:"";s:5:"total";s:0:"";s:7:"total_p";s:0:"";s:7:"advance";s:0:"";s:9:"advance_p";s:0:"";}', 'df', 'dfdf'),
(8, 'df', 'df', 'df', 'df', 'a:20:{s:4:"rate";s:2:"df";s:6:"rate_p";s:2:"df";s:7:"freight";s:0:"";s:9:"freight_p";s:0:"";s:9:"over_load";s:0:"";s:11:"over_load_p";s:0:"";s:8:"labor_ch";s:0:"";s:10:"labor_ch_p";s:0:"";s:5:"kanta";s:0:"";s:7:"kanta_p";s:0:"";s:10:"servic_tax";s:0:"";s:12:"servic_tax_p";s:0:"";s:9:"border_ch";s:0:"";s:11:"border_ch_p";s:0:"";s:2:"gr";s:0:"";s:4:"gr_p";s:0:"";s:5:"total";s:0:"";s:7:"total_p";s:0:"";s:7:"advance";s:0:"";s:9:"advance_p";s:0:"";}', 'df', 'dfdf'),
(9, '45', '45', '', '45', 'a:20:{s:4:"rate";s:0:"";s:6:"rate_p";s:0:"";s:7:"freight";s:0:"";s:9:"freight_p";s:0:"";s:9:"over_load";s:0:"";s:11:"over_load_p";s:0:"";s:8:"labor_ch";s:0:"";s:10:"labor_ch_p";s:0:"";s:5:"kanta";s:0:"";s:7:"kanta_p";s:0:"";s:10:"servic_tax";s:0:"";s:12:"servic_tax_p";s:0:"";s:9:"border_ch";s:0:"";s:11:"border_ch_p";s:0:"";s:2:"gr";s:0:"";s:4:"gr_p";s:0:"";s:5:"total";s:0:"";s:7:"total_p";s:0:"";s:7:"advance";s:0:"";s:9:"advance_p";s:0:"";}', '45', '45'),
(10, 'sd', 'sd', 'sd', 'sd', 'a:20:{s:4:"rate";s:2:"sd";s:6:"rate_p";s:2:"sd";s:7:"freight";s:0:"";s:9:"freight_p";s:0:"";s:9:"over_load";s:0:"";s:11:"over_load_p";s:0:"";s:8:"labor_ch";s:0:"";s:10:"labor_ch_p";s:0:"";s:5:"kanta";s:0:"";s:7:"kanta_p";s:0:"";s:10:"servic_tax";s:0:"";s:12:"servic_tax_p";s:0:"";s:9:"border_ch";s:0:"";s:11:"border_ch_p";s:0:"";s:2:"gr";s:0:"";s:4:"gr_p";s:0:"";s:5:"total";s:0:"";s:7:"total_p";s:0:"";s:7:"advance";s:0:"";s:9:"advance_p";s:0:"";}', 'sd', 'sd');

-- --------------------------------------------------------

--
-- Table structure for table `item_master_list`
--

CREATE TABLE IF NOT EXISTS `item_master_list` (
  `id` int(123) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(123) NOT NULL,
  `subject` varchar(123) NOT NULL,
  `class` varchar(123) NOT NULL,
  `price` varchar(123) NOT NULL,
  `series` varchar(123) NOT NULL,
  `book_alias` varchar(123) NOT NULL,
  `date_added` varchar(123) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `item_master_list`
--

INSERT INTO `item_master_list` (`id`, `item_name`, `subject`, `class`, `price`, `series`, `book_alias`, `date_added`) VALUES
(2, 'item name ', 'subject ', '1 ', '123 ', 'older ', 'Alias ', '2014-10-22 14:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `location_maste_info_list`
--

CREATE TABLE IF NOT EXISTS `location_maste_info_list` (
  `id` int(123) NOT NULL AUTO_INCREMENT,
  `city` varchar(123) NOT NULL,
  `district` varchar(123) NOT NULL,
  `state` varchar(123) NOT NULL,
  `country` varchar(123) NOT NULL,
  `pin` varchar(123) NOT NULL,
  `std` varchar(123) NOT NULL,
  `date_added` varchar(123) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `location_maste_info_list`
--

INSERT INTO `location_maste_info_list` (`id`, `city`, `district`, `state`, `country`, `pin`, `std`, `date_added`) VALUES
(17, 'city 123', 'District 123', 'state 123', 'country 123', 'pin code 123', 'std code 123', '2014-11-11 06:07:06'),
(18, 'city 2', 'District', 'fdg123', 'india', 'pin', 'std', '2014-11-13 05:54:17'),
(19, 'city 3', 'District 3', 'state 123', 'india', 'pin', 'fdg', '2014-11-13 05:54:41'),
(20, 'city', 'District 3', 'state 123', 'country', 'pin', 'fdg', '2014-11-13 05:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `master_list`
--

CREATE TABLE IF NOT EXISTS `master_list` (
  `id` int(123) NOT NULL AUTO_INCREMENT,
  `code` varchar(1234) NOT NULL,
  `aff` varchar(1234) NOT NULL,
  `board` varchar(1234) NOT NULL,
  `category` varchar(1234) NOT NULL,
  `name` varchar(121) NOT NULL,
  `address` varchar(123) NOT NULL,
  `city` varchar(1234) NOT NULL,
  `district` varchar(1234) NOT NULL,
  `state` varchar(1234) NOT NULL,
  `country` varchar(1234) NOT NULL,
  `pin` varchar(1234) NOT NULL,
  `std` varchar(1234) NOT NULL,
  `phone1` varchar(1234) NOT NULL,
  `phone2` varchar(1234) NOT NULL,
  `mobile` varchar(123) NOT NULL,
  `file` varchar(12345) NOT NULL,
  `fax` varchar(123) NOT NULL,
  `schain` varchar(123) NOT NULL,
  `web` varchar(123) NOT NULL,
  `email` varchar(123) NOT NULL,
  `strength` varchar(123) NOT NULL,
  `route` varchar(123) NOT NULL,
  `submission` varchar(123) NOT NULL,
  `finalised` varchar(123) NOT NULL,
  `satoff` varchar(123) NOT NULL,
  `ptm` varchar(123) NOT NULL,
  `remark` varchar(123) NOT NULL,
  `date_added` int(123) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `master_list`
--

INSERT INTO `master_list` (`id`, `code`, `aff`, `board`, `category`, `name`, `address`, `city`, `district`, `state`, `country`, `pin`, `std`, `phone1`, `phone2`, `mobile`, `file`, `fax`, `schain`, `web`, `email`, `strength`, `route`, `submission`, `finalised`, `satoff`, `ptm`, `remark`, `date_added`) VALUES
(7, '321', '123', 'State Board', 'Middle', 'sunil kushwaha', 'new delhi', 'cbse', '', 'cbse', 'cbse', 'cbse', 'cbse', '8287407636', '8287407636', '8287407636', '1414392104', 'fax', '', 'www.skyland.com', 'sunil@gmail.com', '125', 'cbse', 'cbse', 'cbse', 'cbse', 'cbse', 'very good', 2014),
(8, '12', '13', 'State Board 123', 'Primary1234', 'sunil', 'azadpur', '19', '', '', '', '', '', '123456', '321456', '123456', '1415856459NTO00118696_10_Nov_2014_08_05_09_PM.pdf', 'fax', 'school chain', 'wwww', 'sunil@gmail.com', '12', '2', 'Jan First ', 'Jan End ', '1st Sat 123', 'Month End', 'ds', 2014),
(10, '103', '13', 'CBSE 123', 'Pri-Primary 1234', 'sunil', 'addrwess', '19', 'District 3', 'state 123', 'india', 'pin', 'fdg', '123456', '321456', '123456', '1415862163', 'fax', 'school', 'website', 'sunil@gmail.com', '', '1', 'Jan First ', 'Jan End ', '1st Sat 123', 'Month End', '', 2014),
(11, '103', '21', 'State Board 123', 'Primary1234', 'sunil', 'addrwess', '17', 'District', 'fdg123', 'india', 'pin', 'std', '123456', '321456', '123456', '1415862531', 'fax', 'school', 'website', 'sunil@gmail.com', 'strength', '1', 'Jan First ', 'Jan End ', '1st Sat 123', 'Month End', '', 2014);

-- --------------------------------------------------------

--
-- Table structure for table `member_chain_school_list`
--

CREATE TABLE IF NOT EXISTS `member_chain_school_list` (
  `id` int(123) NOT NULL AUTO_INCREMENT,
  `chain_name` varchar(123) NOT NULL,
  `member` varchar(123) NOT NULL,
  `designation` varchar(123) NOT NULL,
  `address` varchar(123) NOT NULL,
  `dob` varchar(123) NOT NULL,
  `mstatus` varchar(123) NOT NULL,
  `relation` varchar(123) NOT NULL,
  `city` varchar(123) NOT NULL,
  `district` varchar(123) NOT NULL,
  `state` varchar(123) NOT NULL,
  `country` varchar(123) NOT NULL,
  `pin` varchar(123) NOT NULL,
  `std` varchar(123) NOT NULL,
  `phone` varchar(123) NOT NULL,
  `email` varchar(123) NOT NULL,
  `mobile1` varchar(123) NOT NULL,
  `mobile2` varchar(123) NOT NULL,
  `date_added` varchar(123) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `member_chain_school_list`
--

INSERT INTO `member_chain_school_list` (`id`, `chain_name`, `member`, `designation`, `address`, `dob`, `mstatus`, `relation`, `city`, `district`, `state`, `country`, `pin`, `std`, `phone`, `email`, `mobile1`, `mobile2`, `date_added`) VALUES
(2, 'chain name 1 2', 'member 2', 'designation 2', 'address 2', 'dob 2', 'married', 'relation 2', 'city 2', 'district 2', 'state 2', 'country2 ', 'pin 2', 'std 1 2', '695552', 'suni2@gmail.com', 'mobile 1 2', 'mobile 2 2', '2014-10-21 06:53:24');

-- --------------------------------------------------------

--
-- Table structure for table `meta_table`
--

CREATE TABLE IF NOT EXISTS `meta_table` (
  `meta_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `invoice_item_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `meta_table`
--

INSERT INTO `meta_table` (`meta_id`, `invoice_item_id`, `meta_key`, `meta_value`) VALUES
(9, 5, 'invoice-item', 'a:18:{s:7:"bill_no";s:5:"42342";s:7:"book_no";s:4:"3553";s:9:"bill_date";s:10:"23-06-2014";s:2:"ms";s:18:"truckwaale pvt ltd";s:5:"po_no";s:4:"6576";s:7:"po_date";s:10:"23-06-2014";s:8:"rr_gr_no";s:8:"45466754";s:6:"w_code";s:5:"dan22";s:6:"w_date";s:10:"21-06-2014";s:6:"carier";s:7:"truck01";s:4:"time";s:6:"5:00am";s:9:"party_tin";s:6:"part21";s:14:"party_tin_date";s:10:"23-06-2014";s:6:"rupees";s:19:"ten thousand rupees";s:5:"total";s:5:"10000";s:11:"service_tax";s:3:"200";s:7:"cartage";s:3:"100";s:11:"grand_total";s:5:"10300";}'),
(10, 1, 'invoice-sec', 'a:8:{s:2:"to";s:9:"danstring";s:8:"order_no";s:5:"54545";s:5:"gr_no";s:5:"44444";s:10:"order_date";s:10:"04-06-2014";s:7:"gr_date";s:10:"10-06-2014";s:5:"rupee";s:18:"nine thousand only";s:5:"total";s:4:"9000";s:5:"paise";s:2:"00";}'),
(13, 4, 'invoice-sec', 'a:8:{s:2:"to";s:20:"danstring@developers";s:8:"order_no";s:4:"6547";s:5:"gr_no";s:3:"675";s:10:"order_date";s:10:"11-06-2014";s:7:"gr_date";s:10:"10-06-2014";s:5:"rupee";s:24:"fourty nine hundred only";s:5:"total";s:4:"4900";s:5:"paise";s:2:"00";}'),
(14, 6, 'invoice-item', 'a:18:{s:7:"bill_no";s:5:"42341";s:7:"book_no";s:4:"3552";s:9:"bill_date";s:10:"10-06-2014";s:2:"ms";s:17:"vikas kumar singh";s:5:"po_no";s:6:"657667";s:7:"po_date";s:10:"10-06-2014";s:8:"rr_gr_no";s:7:"299_crm";s:6:"w_code";s:6:"dan222";s:6:"w_date";s:10:"10-06-2014";s:6:"carier";s:11:"Tempo786786";s:4:"time";s:6:"1:00pm";s:9:"party_tin";s:6:"part22";s:14:"party_tin_date";s:10:"09-06-2014";s:6:"rupees";s:25:"five thousand rupees only";s:5:"total";s:4:"5000";s:11:"service_tax";s:3:"200";s:7:"cartage";s:3:"100";s:11:"grand_total";s:4:"6500";}'),
(15, 5, 'invoice-sec', 'a:8:{s:2:"to";s:21:"sujeet kumar tripathi";s:8:"order_no";s:6:"654767";s:5:"gr_no";s:5:"67577";s:10:"order_date";s:10:"04-06-2014";s:7:"gr_date";s:10:"02-06-2014";s:5:"rupee";s:18:"five thousand only";s:5:"total";s:4:"5000";s:5:"paise";s:2:"00";}'),
(17, 2, 'invoice-third', 'a:17:{s:7:"company";s:13:"ebook pvt ltd";s:6:"policy";s:10:"44546fffdd";s:11:"policy_date";s:10:"02-06-2014";s:6:"amount";s:13:"$399 - $34000";s:11:"amount_date";s:10:"02-06-2014";s:8:"truck_no";s:10:"D-445566hh";s:9:"driv_desc";s:11:"santa singh";s:9:"owner_add";s:15:"santa,new delhi";s:12:"delivery_add";s:9:"dehradoon";s:5:"gr_no";s:6:"454356";s:7:"gr_date";s:10:"04-06-2014";s:4:"from";s:10:"truckwaale";s:2:"to";s:9:"danstring";s:11:"value_goods";s:6:"455645";s:6:"to_pay";s:5:"40000";s:4:"paid";s:5:"40000";s:12:"to_be_billed";s:8:"45-66-90";}'),
(18, 3, 'invoice-third', 'a:17:{s:7:"company";s:19:"genuinetext pvt ltd";s:6:"policy";s:5:"44ttt";s:11:"policy_date";s:10:"03-06-2014";s:6:"amount";s:12:"$399 - $5197";s:11:"amount_date";s:10:"23-06-2014";s:8:"truck_no";s:8:"D-445566";s:9:"driv_desc";s:11:"banta singh";s:9:"owner_add";s:20:"banta e-44 new delhi";s:12:"delivery_add";s:16:"azadpur new dlhi";s:5:"gr_no";s:8:"55555555";s:7:"gr_date";s:10:"04-06-2014";s:4:"from";s:10:"truckwaale";s:2:"to";s:9:"danstring";s:11:"value_goods";s:3:"hqc";s:6:"to_pay";s:5:"50000";s:4:"paid";s:4:"2000";s:12:"to_be_billed";s:6:"dfdfgg";}'),
(19, 4, 'invoice-third', 'a:17:{s:7:"company";s:7:"cmc ltd";s:6:"policy";s:10:"434456htht";s:11:"policy_date";s:10:"08-07-2014";s:6:"amount";s:12:"$399 - $7848";s:11:"amount_date";s:10:"09-07-2014";s:8:"truck_no";s:8:"D-445500";s:9:"driv_desc";s:11:"bubli singh";s:9:"owner_add";s:11:"sabli singh";s:12:"delivery_add";s:23:"badra cruz-4, maharstra";s:5:"gr_no";s:10:"ftrtrtr343";s:7:"gr_date";s:10:"17-07-2014";s:4:"from";s:5:"wewer";s:2:"to";s:6:"tertet";s:11:"value_goods";s:5:"66786";s:6:"to_pay";s:4:"fdgf";s:4:"paid";s:5:"fghfg";s:12:"to_be_billed";s:7:"fdghfgh";}'),
(20, 1, 'quotation-item', 'a:13:{s:2:"tc";s:0:"";s:2:"pc";s:0:"";s:2:"lc";s:0:"";s:2:"uc";s:0:"";s:4:"un_c";s:0:"";s:2:"ec";s:0:"";s:3:"ctc";s:0:"";s:2:"sc";s:0:"";s:6:"octroi";s:0:"";s:7:"transit";s:0:"";s:13:"comprehensive";s:0:"";s:7:"service";s:0:"";s:5:"total";s:0:"";}'),
(21, 6, 'invoice-sec', 'a:8:{s:2:"to";s:2:"34";s:8:"order_no";s:3:"412";s:5:"gr_no";s:2:"34";s:10:"order_date";s:2:"34";s:7:"gr_date";s:3:"343";s:5:"rupee";s:3:"343";s:5:"total";s:3:"343";s:5:"paise";s:3:"434";}'),
(22, 7, 'invoice-sec', 'a:8:{s:2:"to";s:2:"34";s:8:"order_no";s:3:"412";s:5:"gr_no";s:2:"34";s:10:"order_date";s:2:"34";s:7:"gr_date";s:3:"343";s:5:"rupee";s:3:"343";s:5:"total";s:3:"343";s:5:"paise";s:3:"434";}'),
(23, 7, 'invoice-item', 'a:18:{s:7:"bill_no";s:3:"212";s:7:"book_no";s:3:"323";s:9:"bill_date";s:3:"232";s:2:"ms";s:6:"sdfsdf";s:5:"po_no";s:2:"23";s:7:"po_date";s:2:"23";s:8:"rr_gr_no";s:1:"2";s:6:"w_code";s:2:"23";s:6:"w_date";s:2:"23";s:6:"carier";s:4:"1212";s:4:"time";s:2:"11";s:9:"party_tin";s:1:"2";s:14:"party_tin_date";s:1:"2";s:6:"rupees";s:4:"2222";s:5:"total";s:1:"2";s:11:"service_tax";s:1:"2";s:7:"cartage";s:1:"2";s:11:"grand_total";s:2:"22";}'),
(24, 5, 'invoice-third', 'a:17:{s:7:"company";s:9:"danstring";s:6:"policy";s:2:"gf";s:11:"policy_date";s:1:"3";s:6:"amount";s:2:"fg";s:11:"amount_date";s:2:"34";s:8:"truck_no";s:2:"gh";s:9:"driv_desc";s:2:"34";s:9:"owner_add";s:2:"34";s:12:"delivery_add";s:2:"rt";s:5:"gr_no";s:2:"34";s:7:"gr_date";s:2:"34";s:4:"from";s:2:"34";s:2:"to";s:2:"34";s:11:"value_goods";s:2:"34";s:6:"to_pay";s:2:"df";s:4:"paid";s:4:"dfg4";s:12:"to_be_billed";s:3:"ere";}'),
(25, 6, 'invoice-third', 'a:17:{s:7:"company";s:2:"sd";s:6:"policy";s:3:"sdf";s:11:"policy_date";s:3:"sdf";s:6:"amount";s:3:"sdf";s:11:"amount_date";s:3:"sdf";s:8:"truck_no";s:3:"fsf";s:9:"driv_desc";s:1:"s";s:9:"owner_add";s:3:"sdf";s:12:"delivery_add";s:3:"sdf";s:5:"gr_no";s:3:"sdf";s:7:"gr_date";s:3:"sdf";s:4:"from";s:3:"sdf";s:2:"to";s:3:"sdf";s:11:"value_goods";s:3:"sdf";s:6:"to_pay";s:3:"sdf";s:4:"paid";s:2:"sd";s:12:"to_be_billed";s:4:"fsdf";}'),
(26, 7, 'invoice-third', 'a:17:{s:7:"company";s:10:"danstring1";s:6:"policy";s:2:"df";s:11:"policy_date";s:2:"df";s:6:"amount";s:2:"df";s:11:"amount_date";s:2:"df";s:8:"truck_no";s:3:"fsf";s:9:"driv_desc";s:2:"df";s:9:"owner_add";s:2:"df";s:12:"delivery_add";s:2:"df";s:5:"gr_no";s:2:"df";s:7:"gr_date";s:2:"df";s:4:"from";s:2:"df";s:2:"to";s:2:"df";s:11:"value_goods";s:2:"fd";s:6:"to_pay";s:2:"df";s:4:"paid";s:2:"df";s:12:"to_be_billed";s:2:"df";}'),
(27, 8, 'invoice-third', 'a:17:{s:7:"company";s:10:"danstring1";s:6:"policy";s:2:"df";s:11:"policy_date";s:2:"df";s:6:"amount";s:2:"df";s:11:"amount_date";s:2:"df";s:8:"truck_no";s:3:"fsf";s:9:"driv_desc";s:2:"df";s:9:"owner_add";s:2:"df";s:12:"delivery_add";s:2:"df";s:5:"gr_no";s:2:"df";s:7:"gr_date";s:2:"df";s:4:"from";s:2:"df";s:2:"to";s:2:"df";s:11:"value_goods";s:2:"fd";s:6:"to_pay";s:2:"df";s:4:"paid";s:2:"df";s:12:"to_be_billed";s:2:"df";}'),
(28, 9, 'invoice-third', 'a:17:{s:7:"company";s:3:"dfg";s:6:"policy";s:6:"dfgdfg";s:11:"policy_date";s:3:"dfg";s:6:"amount";s:5:"dfgdf";s:11:"amount_date";s:2:"df";s:8:"truck_no";s:5:"dfgdf";s:9:"driv_desc";s:3:"dfg";s:9:"owner_add";s:3:"dfg";s:12:"delivery_add";s:2:"df";s:5:"gr_no";s:6:"gdfdfg";s:7:"gr_date";s:2:"45";s:4:"from";s:8:"dfgdfg45";s:2:"to";s:2:"45";s:11:"value_goods";s:2:"45";s:6:"to_pay";s:2:"45";s:4:"paid";s:2:"45";s:12:"to_be_billed";s:2:"45";}'),
(29, 10, 'invoice-third', 'a:17:{s:7:"company";s:5:"123sd";s:6:"policy";s:2:"sd";s:11:"policy_date";s:2:"sd";s:6:"amount";s:2:"sd";s:11:"amount_date";s:4:"sdsd";s:8:"truck_no";s:4:"sdsd";s:9:"driv_desc";s:2:"sd";s:9:"owner_add";s:2:"sd";s:12:"delivery_add";s:2:"sd";s:5:"gr_no";s:2:"sd";s:7:"gr_date";s:2:"sd";s:4:"from";s:2:"sd";s:2:"to";s:2:"sd";s:11:"value_goods";s:2:"sd";s:6:"to_pay";s:2:"sd";s:4:"paid";s:2:"sd";s:12:"to_be_billed";s:2:"sd";}'),
(30, 8, 'invoice-item', 'a:18:{s:7:"bill_no";s:3:"111";s:7:"book_no";s:3:"111";s:9:"bill_date";s:2:"11";s:2:"ms";s:2:"11";s:5:"po_no";s:2:"11";s:7:"po_date";s:2:"11";s:8:"rr_gr_no";s:2:"11";s:6:"w_code";s:2:"11";s:6:"w_date";s:2:"11";s:6:"carier";s:2:"11";s:4:"time";s:2:"11";s:9:"party_tin";s:2:"11";s:14:"party_tin_date";s:2:"11";s:6:"rupees";s:3:"www";s:5:"total";s:2:"11";s:11:"service_tax";s:2:"11";s:7:"cartage";s:2:"11";s:11:"grand_total";s:2:"11";}'),
(31, 8, 'invoice-sec', 'a:8:{s:2:"to";s:3:"sdf";s:8:"order_no";s:2:"33";s:5:"gr_no";s:2:"33";s:10:"order_date";s:1:"3";s:7:"gr_date";s:2:"33";s:5:"rupee";s:1:"3";s:5:"total";s:2:"33";s:5:"paise";s:2:"33";}'),
(32, 9, 'invoice-sec', 'a:8:{s:2:"to";s:2:"33";s:8:"order_no";s:3:"333";s:5:"gr_no";s:2:"33";s:10:"order_date";s:3:"333";s:7:"gr_date";s:3:"333";s:5:"rupee";s:3:"333";s:5:"total";s:2:"33";s:5:"paise";s:2:"33";}');

-- --------------------------------------------------------

--
-- Table structure for table `other_designation_list`
--

CREATE TABLE IF NOT EXISTS `other_designation_list` (
  `id` int(123) NOT NULL AUTO_INCREMENT,
  `department` varchar(123) NOT NULL,
  `designation` varchar(123) NOT NULL,
  `date_added` varchar(123) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `other_designation_list`
--

INSERT INTO `other_designation_list` (`id`, `department`, `designation`, `date_added`) VALUES
(2, 'Sales', 'Marketing', '2014-10-25 09:25:53'),
(3, 'Author', 'Author', '2014-10-25 09:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(123) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(123) NOT NULL,
  `url` varchar(1234) NOT NULL,
  `description` varchar(123) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `url`, `description`) VALUES
(1, 'Dashbord', 'index.php', 'home description'),
(2, 'Master', '#', 'description'),
(3, 'Report', 'report.php', 'description'),
(4, 'MIS ', 'mis.php', 'trtr'),
(5, 'Transaction', 'transaction.php', 'index description'),
(6, 'Setting', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE IF NOT EXISTS `quotations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tuu` text COLLATE utf8_unicode_ci NOT NULL,
  `sr_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_q` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `des` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gtotal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valid_till` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE IF NOT EXISTS `quotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `frm` varchar(255) NOT NULL,
  `scity` varchar(255) NOT NULL,
  `sarea` varchar(255) NOT NULL,
  `tu` varchar(255) NOT NULL,
  `dcity` varchar(255) NOT NULL,
  `darea` varchar(255) NOT NULL,
  `quote` longtext NOT NULL,
  `agency_added` text NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `school_info_list`
--

CREATE TABLE IF NOT EXISTS `school_info_list` (
  `id` int(123) NOT NULL AUTO_INCREMENT,
  `category` varchar(123) NOT NULL,
  `name` varchar(123) NOT NULL,
  `date_added` varchar(123) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `school_info_list`
--

INSERT INTO `school_info_list` (`id`, `category`, `name`, `date_added`) VALUES
(2, '', 'ICSE', '2014-11-03 06:52:53'),
(3, '', 'State Board', '2014-11-03 06:53:08'),
(4, '', 'IGCSE', '2014-11-03 06:53:18'),
(5, 'Board', 'CBSE 123', '2014-11-03 06:52:28'),
(6, 'Category', 'Pri-Primary 1234', '2014-11-03 07:39:04'),
(7, 'Category', 'Primary1234', '2014-11-03 07:43:18'),
(8, 'Category', 'Middle 12', '2014-11-03 07:11:00'),
(9, 'Customer Category', 'Bookseller', '2014-10-22 11:28:43'),
(10, 'Customer Category', 'Distributors', '2014-10-22 11:29:00'),
(11, 'Customer Category', 'Publisher 123', '2014-11-03 07:17:23'),
(12, 'Route No', '1', '2014-10-22 11:29:36'),
(13, 'Route No', '2', '2014-10-22 11:29:43'),
(14, 'Route No', '3', '2014-10-22 11:29:50'),
(15, 'Saturday Off', '1st Sat 123', '2014-11-03 08:01:49'),
(17, 'Saturday Off', '3rd sat ', '2014-11-03 08:03:14'),
(18, 'PTM', 'Month End', '2014-10-22 11:31:31'),
(19, 'PTM', 'Yearly ', '2014-11-03 08:12:52'),
(20, 'Submission', 'Jan First ', '2014-11-03 08:24:46'),
(21, 'Finalised', 'Jan End ', '2014-11-03 08:32:23'),
(22, 'Designation', 'Principal', '2014-10-22 12:41:29'),
(23, 'Designation', 'Director', '2014-10-22 12:41:45'),
(24, 'Designation', 'Teacher ', '2014-11-03 08:39:00'),
(25, 'Relation', 'Good', '2014-10-22 12:42:27'),
(26, 'Class', '1', '2014-10-22 12:42:38'),
(27, 'Class', '2', '2014-10-22 12:42:46'),
(28, 'Class', '3', '2014-10-22 12:42:57'),
(29, 'Class', '4', '2014-10-22 12:43:06'),
(30, 'Department', 'Sales', '2014-10-25 08:28:59'),
(31, 'Department', 'Author', '2014-10-25 08:29:20'),
(32, 'Department', 'Editor', '2014-10-25 08:29:34'),
(33, 'Department', 'Office', '2014-10-25 08:29:54'),
(34, 'Session Master', 'Item Master', '2014-10-25 08:30:13'),
(35, 'Session Master', 'Transaction', '2014-10-25 08:30:26'),
(36, 'Session Master', 'Sampling', '2014-10-25 08:30:45'),
(37, 'Session Master', 'Discount', '2014-10-25 08:31:09'),
(38, 'Transportation', 'By Transport', '2014-10-25 08:32:17'),
(39, 'Transportation', 'By Courier', '2014-10-25 08:32:31'),
(40, 'Transportation', 'By Hand', '2014-10-25 08:32:43'),
(41, '', 'State  Board', '2014-11-03 06:53:42'),
(42, 'Board', 'State Board 123', '2014-11-03 07:11:51'),
(53, 'Customer Category', 'asd 45', '2014-11-03 07:43:34'),
(54, 'Customer Category', 'asdas 1234323', '2014-11-03 07:29:04'),
(55, 'Route No', 'rwerwer 113qw', '2014-11-03 07:52:36'),
(56, 'Saturday Off', 'weqw 123', '2014-11-03 08:06:02'),
(58, 'PTM', 'sasad 123', '2014-11-03 08:19:13'),
(59, 'PTM', 'jk', '2014-11-03 08:19:19'),
(60, 'Submission', 'ertry erwtew', '2014-11-03 08:26:50'),
(61, 'Submission', 'fsdgdf', '2014-11-03 08:26:56'),
(62, 'Finalised', 'asdf', '2014-11-03 08:33:30'),
(63, 'Finalised', 'sdfsd', '2014-11-03 08:33:56'),
(64, 'Designation', 'dsfsd', '2014-11-03 08:42:01'),
(65, 'Designation', 'sd', '2014-11-03 08:42:22'),
(67, 'Relation', 'Bad', '2014-11-13 08:47:50'),
(68, 'Specialisation', 'Hindi', '2014-11-13 10:17:03'),
(69, 'Specialisation', 'English', '2014-11-13 10:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `subject_master_list`
--

CREATE TABLE IF NOT EXISTS `subject_master_list` (
  `id` int(123) NOT NULL AUTO_INCREMENT,
  `subject` varchar(123) NOT NULL,
  `code` varchar(123) NOT NULL,
  `date_added` varchar(123) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `subject_master_list`
--

INSERT INTO `subject_master_list` (`id`, `subject`, `code`, `date_added`) VALUES
(2, 'English 12', '1234 12', '2014-10-25 06:42:30'),
(3, 'Hindi', '123', '2014-11-13 08:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE IF NOT EXISTS `submenu` (
  `id` int(123) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(123) NOT NULL,
  `sub_menu` varchar(123) NOT NULL,
  `link` varchar(123) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id`, `page_name`, `sub_menu`, `link`) VALUES
(1, 'Master', 'School Master', 'master_listing.php'),
(2, 'Master', 'Teacher Master', 'teacher_master_listing.php'),
(3, 'Master', 'Corporate', 'corporate_listing.php'),
(4, 'Master', 'Department', 'department_listing.php'),
(5, 'Master', 'Chain of School', 'chain_school_listing.php'),
(6, 'Master', 'Member Chain of School', 'member_chain_school_listing.php'),
(16, 'Setting', 'Location Master', 'location_master_info_listing.php'),
(17, 'Setting', 'Item Master', 'item_master_listing.php'),
(18, 'Setting', 'Subject Master', 'subject_master_listing.php'),
(19, 'Setting', 'Transport Details', 'transport_details_listing.php'),
(20, 'Setting', 'Bank Details', 'bank_detail_listing.php'),
(21, 'Setting', 'Discount Grade', 'discount_grade_listing.php'),
(22, 'Setting', 'Other Designation', 'other_designation_listing.php'),
(23, 'Setting', 'Board', 'board_listing.php'),
(24, 'Setting', 'Category', 'category_listing.php'),
(25, 'Setting', 'Customer Category', 'customer_category_listing.php'),
(26, 'Setting', 'Route No', 'route_no_listing.php'),
(27, 'Setting', 'Saturday Off', 'saturday_off_listing.php'),
(28, 'Setting', 'PTM', 'ptm_listing.php'),
(29, 'Setting', 'Submission', 'submission_listing.php'),
(30, 'Setting', 'Finalised', 'finalised_listing.php'),
(31, 'Setting', 'Designation', 'designation_listing.php'),
(32, 'Setting', 'Relation', 'relation_listing.php'),
(33, 'Setting', 'Class', 'class_listing.php'),
(34, 'Setting', 'SpecialisationSpeci', 'specialisation_listing.php'),
(35, 'Setting', 'Department', 'department_setting_listing.php'),
(36, 'Setting', 'Session Master', 'session_master_listing.php'),
(37, 'Setting', 'Transportation', 'transportation_listing.php');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_master_list`
--

CREATE TABLE IF NOT EXISTS `teacher_master_list` (
  `id` int(123) NOT NULL AUTO_INCREMENT,
  `school` varchar(123) NOT NULL,
  `teacher` varchar(123) NOT NULL,
  `designation` varchar(123) NOT NULL,
  `address` varchar(123) NOT NULL,
  `dob` varchar(123) NOT NULL,
  `mstatus` varchar(123) NOT NULL,
  `relation` varchar(123) NOT NULL,
  `city` varchar(123) NOT NULL,
  `district` varchar(123) NOT NULL,
  `state` varchar(123) NOT NULL,
  `country` varchar(123) NOT NULL,
  `pin` varchar(123) NOT NULL,
  `std` varchar(123) NOT NULL,
  `phone1` varchar(123) NOT NULL,
  `mobile1` varchar(123) NOT NULL,
  `mobile2` varchar(123) NOT NULL,
  `email` varchar(123) NOT NULL,
  `subject` varchar(123) NOT NULL,
  `item` varchar(123) NOT NULL,
  `class` varchar(123) NOT NULL,
  `date_added` varchar(123) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `teacher_master_list`
--

INSERT INTO `teacher_master_list` (`id`, `school`, `teacher`, `designation`, `address`, `dob`, `mstatus`, `relation`, `city`, `district`, `state`, `country`, `pin`, `std`, `phone1`, `mobile1`, `mobile2`, `email`, `subject`, `item`, `class`, `date_added`) VALUES
(13, 'school', 'teacher', 'Principal', 'addrwess', '11/14/2014', 'Married', 'Good', '17', 'District 3', 'state 123', 'india', 'pin', 'fdg', '123456', '45454', '454', 'sunil@gmail.com', 'English 12', 'item name', '1', '2014-11-13 09:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `transport_list`
--

CREATE TABLE IF NOT EXISTS `transport_list` (
  `id` int(123) NOT NULL AUTO_INCREMENT,
  `name` varchar(123) NOT NULL,
  `address` varchar(123) NOT NULL,
  `city` varchar(123) NOT NULL,
  `distict` varchar(123) NOT NULL,
  `state` varchar(123) NOT NULL,
  `contact` varchar(123) NOT NULL,
  `email` varchar(123) NOT NULL,
  `date_added` varchar(123) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `transport_list`
--

INSERT INTO `transport_list` (`id`, `name`, `address`, `city`, `distict`, `state`, `contact`, `email`, `date_added`) VALUES
(2, 'sunil 12', 'azadpur 12', 'dalhi 12', 'delhi 12', 'delhi 12', '8287407636 12', 'sunil@gmail.com 12', '2014-10-25 07:34:39');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
