-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 24, 2022 at 11:14 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stf`
--
CREATE DATABASE IF NOT EXISTS `stf` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `stf`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `userid` varchar(100) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `pwd`) VALUES
('admin', 'admin');


-- --------------------------------------------------------

--
-- Table structure for table `agallery`
--

CREATE TABLE IF NOT EXISTS `agallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `agallery`
--

INSERT INTO `agallery` (`id`, `fname`) VALUES
(1, 'ups/1647257533a1.jpg'),
(2, 'ups/1647257540a2.jpg'),
(3, 'ups/1647257544a3.jpg'),
(4, 'ups/1647257550a4.png');

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE IF NOT EXISTS `balance` (
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`amount`) VALUES
(185125);

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE IF NOT EXISTS `donation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donorid` varchar(100) NOT NULL,
  `amount` float NOT NULL,
  `pmode` varchar(20) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `chqno` varchar(10) NOT NULL,
  `dt` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `donorid`, `amount`, `pmode`, `bank`, `chqno`, `dt`) VALUES
(1, 'ganesh@gmail.com', 15000, 'Cash', 'Nil', 'Nil', '2022-01-30'),
(2, 'ganesh@gmail.com', 25000, 'Cheque', 'SBI', '125222', '2022-01-10'),
(3, 'james@gmail.com', 55000, 'Cheque', 'Canara Bank', '683801', '2022-01-30'),
(4, 'mani@gmail.com', 100000, 'Cheque', 'ICICI', '662011', '2022-01-31'),
(5, 'shanmugam@gmail.com', 1000, 'Cash', 'Nil', 'Nil', '2022-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE IF NOT EXISTS `donor` (
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`name`, `gender`, `addr`, `city`, `occupation`, `mobile`, `email`, `pwd`) VALUES
('Ganesh', 'Male', '48,South Arcade,', 'Madurai', 'Business', '8798965822', 'ganesh@gmail.com', 'ganesh'),
('James', 'Male', '459,Church Road', 'Chennai', 'Government', '9850595559', 'james@gmail.com', 'james'),
('Manimaaran', 'Male', '489,South Street,', 'Chennai', 'Business', '9840403030', 'mani@gmail.com', 'mani'),
('Ram Kumar', '', '343,South car Street,\r\nKK Nagar,', 'Madurai', 'Business', '9088374349', 'ram@gmail.com', 'pwd'),
('Shanmugam', '', '343, North Car Street,\r\nTheppakkulam', 'Madurai', 'Business', '9823092328', 'shanmugam@gmail.com', 's');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dt` date NOT NULL,
  `payee` varchar(200) NOT NULL,
  `category` varchar(300) NOT NULL,
  `descr` varchar(200) NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `dt`, `payee`, `category`, `descr`, `amount`) VALUES
(2, '2021-12-31', 'Hari Caterers', 'Food', 'Annual Day food expenses', 1000),
(3, '2021-12-31', 'Arun Furnitures', 'Furniture', 'Wood cot for elderly peoples. Five cots of Rs.500 each', 2500),
(5, '2022-01-01', 'EB', 'Electricity', 'EB for the Month of November', 1100),
(6, '2022-01-03', 'RaviChandran Tailors', 'Clothes', 'Clothes mended for the Members', 150),
(7, '2022-01-03', 'Parvathi Utensils', 'Kitchen Utensils', 'Paid amount for lending of Utensils for Annual day', 75),
(8, '2022-02-08', 'Aryabhavan Hotels', 'Food', 'Paid for Annual day lunch', 350),
(9, '2022-03-14', 'Charlie Furniture', 'Furniture', 'Furniture Materials Tables and Chairs', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `medexpenses`
--

CREATE TABLE IF NOT EXISTS `medexpenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dt` date NOT NULL,
  `memberid` int(11) NOT NULL,
  `payee` varchar(100) NOT NULL,
  `descr` varchar(200) NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `medexpenses`
--

INSERT INTO `medexpenses` (`id`, `dt`, `memberid`, `payee`, `descr`, `amount`) VALUES
(1, '2021-12-31', 1, 'Care Hospitals', 'Viral Fever', 250),
(2, '2022-01-31', 2, 'Gokul Medicals', 'Monthly Regular Medicines', 100),
(3, '2022-03-14', 4, 'Vasanth Medicals', 'Regular Medicines', 100);

-- --------------------------------------------------------

--
-- Table structure for table `newperson`
--

CREATE TABLE IF NOT EXISTS `newperson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` varchar(5) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `pension` varchar(50) NOT NULL,
  `relative` varchar(50) NOT NULL,
  `relation` varchar(40) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `joindt` date NOT NULL,
  `hproblem` varchar(200) NOT NULL DEFAULT 'NIL',
  `aadhar` varchar(20) NOT NULL DEFAULT '123456789012',
  `fname` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `newperson`
--

INSERT INTO `newperson` (`id`, `name`, `gender`, `age`, `addr`, `city`, `occupation`, `pension`, `relative`, `relation`, `mobile`, `reason`, `joindt`, `hproblem`, `aadhar`, `fname`) VALUES
(1, 'VellaiChamy', 'Male', '89', '43,North Street,', 'Madurai', 'NIL', 'NIL', 'NIL', 'NIL', '9545454444', 'Destitute', '2016-12-29', 'NIL', '123456789012', 'ups/p2.jpg'),
(2, 'Karuppayee', 'Female', '89', '3434,Pulicherry,', 'Chennai', 'NIL', 'NIL', 'NIL', 'NIL', '8779545487', 'Nil', '2016-12-29', 'Back Pain', '123456789013', 'ups/p4.jpg'),
(3, 'Mooppan', 'Male', '88', '84,Kollimalai', 'Trichy', 'NIL', 'NIL', 'NIL', 'NIL', '8845854587', 'Nil', '2016-12-29', 'Arthritis', '123456789014', 'ups/moopan.jpg'),
(4, 'Subbarav', 'Male', '90', '850,South Lane', 'Tanjore', 'Clerk', 'NIL', 'Ramaswamy', 'other', '7785045005', 'No one to look after', '2016-12-29', 'Sugar', '123456789015', 'ups/rav.jpg'),
(5, 'Pitchai', 'Male', '79', '343,South Street,\r\nMelapatti', 'Madurai', 'NIL', 'NIL', 'Shanmugam', 'NIL', '8928293289', 'No one to look after', '2022-05-24', 'Breathing problem', '123918731928', 'ups/1653388284Tulips.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `exp` varchar(10) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`name`, `gender`, `addr`, `city`, `exp`, `mobile`, `email`, `pwd`) VALUES
('Ram', 'Male', '343,south Cross Street,\r\nSimmakkal', 'Madurai', '6', '9839483948', 'ram@gmail.com', 'pwd'),
('Sundar', 'Male', '489,Housing Board', 'Madurai', '2', '9050484449', 'sundar@gmail.com', 'sundar'),
('Vadivu', 'Female', '84,South Street,', 'Madurai', '5', '9943980330', 'vadivu@gmail.com', 'vadivu');

-- --------------------------------------------------------

--
-- Table structure for table `staffsal`
--

CREATE TABLE IF NOT EXISTS `staffsal` (
  `staffid` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `absent` int(11) NOT NULL,
  `basic` float NOT NULL,
  `da` float NOT NULL,
  `hra` float NOT NULL,
  `ta` float NOT NULL,
  `pf` float NOT NULL,
  `gross` float NOT NULL,
  `net` float NOT NULL,
  PRIMARY KEY (`staffid`,`year`,`month`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffsal`
--

INSERT INTO `staffsal` (`staffid`, `year`, `month`, `absent`, `basic`, `da`, `hra`, `ta`, `pf`, `gross`, `net`) VALUES
('ram@gmail.com', 2022, 2, 1, 500, 7425, 4725, 2025, 945, 27675, 26730),
('sundar@gmail.com', 2016, 12, 0, 150, 2557.5, 1627.5, 697.5, 325.5, 9532.5, 9207);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
