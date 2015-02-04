-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2015 at 01:48 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `workflow`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_id` varchar(5) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `attachment` varchar(100) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `app_to` int(11) NOT NULL,
  `app_status` tinyint(2) NOT NULL DEFAULT '0',
  `date_status` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `app_id`, `user_id`, `subject`, `body`, `attachment`, `date`, `app_to`, `app_status`, `date_status`) VALUES
(51, 'A4285', 1, 'Prayer for permission for the mid-term exam', 'sssssssssssssssssssssssssss', NULL, '2015-02-03 20:47:53', 3, 0, NULL),
(52, 'A5048', 1, 'Prayer for permission for the final exam', 'aaaaaaaaaaaaaaaaa', NULL, '2015-02-03 20:50:47', 3, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `app_id` varchar(5) NOT NULL,
  `comment` text,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `througher`
--

CREATE TABLE IF NOT EXISTS `througher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_id` varchar(5) NOT NULL,
  `through_user` int(11) NOT NULL,
  `through_status` tinyint(2) NOT NULL DEFAULT '0',
  `date_status` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `througher`
--

INSERT INTO `througher` (`id`, `app_id`, `through_user`, `through_status`, `date_status`) VALUES
(54, 'A4285', 2, 1, NULL),
(55, 'A5048', 2, 1, NULL),
(56, 'A5048', 4, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(16) NOT NULL,
  `user_department` varchar(30) DEFAULT NULL,
  `user_gender` tinyint(2) NOT NULL,
  `user_phone` varchar(15) DEFAULT NULL,
  `user_address` varchar(200) DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL COMMENT '1= system admin 2=VC 3=Register 4=Dean 5=Head 6=others 7=student',
  `date_of_birth` date DEFAULT NULL,
  `user_pic` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_department`, `user_gender`, `user_phone`, `user_address`, `user_type`, `date_of_birth`, `user_pic`) VALUES
(1, 'Moh. Ibrahim Al Naz Rana', 'rana@gmail.com', '123456', 'CSE', 1, '01715418050', 'Dhaka, Bangladesh', 7, '1993-10-22', 'rana_(2).jpg'),
(2, 'Dr. Syed Akhter Hossain', 'csehead@gmail.com', '12345', 'CSE', 1, NULL, NULL, 5, '0000-00-00', 'hod.jpg'),
(3, 'Dr. A.K.M. Fazlul Haque', 'register@gmail.com', '123456', NULL, 1, NULL, NULL, 3, NULL, NULL),
(4, 'Dr. S.M. Mahbub-Ul-Haque Majumder', 'deanfsit@gmail.com', '12345', NULL, 1, NULL, NULL, 4, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
