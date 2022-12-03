-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2022 at 07:41 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `buildingmaterial`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customerid` int(11) NOT NULL,
  `customername` text NOT NULL,
  `address` text NOT NULL,
  `occupation` text NOT NULL,
  `contanctno` text NOT NULL,
  `emailid` text NOT NULL,
  `password` text NOT NULL,
  `balanceamount` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerid`, `customername`, `address`, `occupation`, `contanctno`, `emailid`, `password`, `balanceamount`) VALUES
(6, 'Jitendra', 'Stadium', 'Driver', '864578239', 'Jitu@gmail.com', 'thakur', 10990),
(5, 'Nilesh', 'Sakri', 'Conductor', '942228894', 'Nilu@gmail.com', 'rathod', 40000),
(2, 'Atharv', 'Shiv Nagar', 'IAS', '766645129', 'athu@gmail.com', 'yeole', 29230),
(4, 'Kishor', 'Ram Nagar', 'Farmer', '862300459', 'Kish@gmail.com', 'patil', 80000),
(3, 'Girish', 'Sakri Road', 'Police', '961245454', 'giru@gmail.com', 'deore', 210000),
(1, 'Raj', 'Sai Colony', 'Engineer', '76663312', 'raj@gmail.com', 'marathe', 380000),
(9, 'Rutuja Patil', 'Pune', 'Civil Engg', '766633124545454545454545454545454545454545454545454', 'maratherk007@gmail.com', 'patil', 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `deliveryno` text NOT NULL,
  `deliverydate` date NOT NULL,
  `orderno` text NOT NULL,
  `vehicleno` text NOT NULL,
  `receiptno` text NOT NULL,
  `address` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`deliveryno`, `deliverydate`, `orderno`, `vehicleno`, `receiptno`, `address`) VALUES
('5', '2022-05-10', '6', 'MH-18-AD-4206', '33', 'stadium'),
('4', '2022-04-13', '4', 'MH-18-AD-4206', '4', 'shiv colony'),
('3', '2022-03-22', '3', 'MH-18-AD-4265', '3', 'Laxmi nagar'),
('2', '2022-02-15', '2', 'MH-18-AD-4206', '2', 'Sakri Road'),
('1', '2022-01-01', '1', 'MH-18-AD-4207', '1', 'Sai Colony');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `materialid` text NOT NULL,
  `materialtype` text NOT NULL,
  `subtype` text NOT NULL,
  `unitofmeasurement` text NOT NULL,
  `rate` text NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`materialid`, `materialtype`, `subtype`, `unitofmeasurement`, `rate`, `stock`) VALUES
('1', 'Sand', 'Crushed sand', 'Per Ton', '3000', 990),
('2', 'Steel', 'TMT bar', 'per kg', '50', 4985),
('3', 'Brick', 'Red brick', 'per piece', '5', 9900),
('4', 'Cement', 'Concrete Cement', 'per piece', '300', 4990),
('5', 'Sand', 'River Sand', 'Per Ton', '3000', 9995),
('6', 'Brick', 'Concrete Bricks', 'per piece', '7', 10000),
('7', 'Cement', 'White Cement', 'per piece', '400', 4998);

-- --------------------------------------------------------

--
-- Table structure for table `order1`
--

CREATE TABLE IF NOT EXISTS `order1` (
  `orderno` int(11) NOT NULL,
  `orderdate` date NOT NULL,
  `customerid` text NOT NULL,
  `materialid` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order1`
--

INSERT INTO `order1` (`orderno`, `orderdate`, `customerid`, `materialid`, `quantity`, `rate`, `amount`) VALUES
(1, '2022-01-01', '1', '1', 10, 1000, 10000),
(2, '2022-02-15', '3', '2', 15, 5000, 75000),
(3, '2022-03-24', '4', '3', 10, 1000, 10000),
(4, '2022-04-13', '2', '4', 10, 5000, 50000),
(5, '2022-05-01', '5', '6', 50, 10000, 500000),
(6, '2022-05-11', '6', '7', 2, 5000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `paymentno` text NOT NULL,
  `paymentdate` date NOT NULL,
  `customerid` text NOT NULL,
  `amount` text NOT NULL,
  `orderno` text NOT NULL,
  `paymentmode` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentno`, `paymentdate`, `customerid`, `amount`, `orderno`, `paymentmode`) VALUES
('1', '2022-03-01', '5', '40000', '3', 'net banking'),
('2', '2022-03-07', '3', '50000', '5', 'cash on delivery'),
('3', '2022-03-11', '2', '800000', '1', 'card'),
('4', '2022-03-22', '1', '60000', '4', 'online'),
('5', '2022-03-27', '2', '50000', '3', 'net banking'),
('6', '2022-04-06', '3', '1000', '11', 'card'),
('7', '2022-04-04', '1', '5', '1', 'cash on delivery');
