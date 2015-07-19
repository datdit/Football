-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2014 at 10:00 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `football`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `lastupdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `fullname`, `email`, `mobile`, `avatar`, `lastupdate`) VALUES
(1, 'admin', '123', 'Administrator', 'admin@gmail.com', '081-9758868', '', '2013-09-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `BookDate` date NOT NULL,
  `BookStart` int(11) NOT NULL DEFAULT '0',
  `BookEnd` int(11) NOT NULL DEFAULT '0',
  `total_hour` int(11) NOT NULL DEFAULT '0',
  `total_money` int(11) NOT NULL DEFAULT '0',
  `member_id` int(11) NOT NULL,
  `ground_id` int(11) NOT NULL,
  `ConfirmFlag` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=รอ,1=ยืนยัน',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `BookDate`, `BookStart`, `BookEnd`, `total_hour`, `total_money`, `member_id`, `ground_id`, `ConfirmFlag`) VALUES
(11, '2014-05-30', 12, 14, 2, 1000, 3, 3, 1),
(6, '2014-05-29', 8, 10, 2, 3000, 1, 1, 0),
(10, '2014-05-30', 9, 10, 1, 1500, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ground`
--

CREATE TABLE IF NOT EXISTS `ground` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `GroundName` varchar(50) NOT NULL,
  `GroundDesc` varchar(200) NOT NULL,
  `Price` decimal(10,0) NOT NULL DEFAULT '0',
  `pic` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ground`
--

INSERT INTO `ground` (`id`, `GroundName`, `GroundDesc`, `Price`, `pic`) VALUES
(1, 'สนามที่ 1', 'สนามแรกของเรา', 1500, 'g1.jpg'),
(2, 'สนามที่ 2', 'สนามที่ 2 ของเรา', 2000, 'g2.jpg'),
(3, '3333', '33333', 500, '68feb879610712739e1e4987bf378b4f_pic.jpg'),
(4, '444', '44', 44, 'c47488ad6d22e36ebc23e40eeb820280_pic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `password`, `fullname`, `email`, `mobile`, `address`, `pic`, `user_type`) VALUES
(1, 'admin', '123', 'นายสมศักดิ์ รักดี', 'aa', 'aa', '6', '1_pic.jpg', 1),
(2, 'bb', '123', 'bb', 'bb', 'bb', '5', '2_pic.jpg', 2),
(3, 'cc', 'cc', 'น.ส.ฮิคารุ สุดสวย', 'cc', 'cc', 'cc', '446e09b25fa59e11543c8d9e8c3904a6_pic.png', 2),
(7, 'dd', 'dd', 'dd', 'dd', 'dd', 'dd', '8c742758bec123128aa6a75aaac236a5_pic.jpg', 2),
(8, 'aa', 'aa', 'aa', 'aa', 'aa', 'aa', '8_pic.png', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
