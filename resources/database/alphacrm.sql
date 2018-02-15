-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2018 at 11:26 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alphacrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `comp_tbl1`
--

CREATE TABLE `comp_tbl1` (
  `companyID` int(10) NOT NULL,
  `tableType` smallint(10) NOT NULL DEFAULT '1',
  `tableName` varchar(255) NOT NULL,
  `preName` varchar(250) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `regType` varchar(150) DEFAULT NULL,
  `streetA` varchar(150) DEFAULT NULL,
  `streetB` varchar(150) DEFAULT NULL,
  `streetC` varchar(150) DEFAULT NULL,
  `town` varchar(150) DEFAULT NULL,
  `county` varchar(150) DEFAULT NULL,
  `postcode` varchar(150) DEFAULT NULL,
  `country` varchar(250) DEFAULT NULL,
  `monthRevenue` int(25) DEFAULT NULL,
  `monthExpense` int(25) DEFAULT NULL,
  `monthProfit` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin7;

--
-- Dumping data for table `comp_tbl1`
--

INSERT INTO `comp_tbl1` (`companyID`, `tableType`, `tableName`, `preName`, `name`, `regType`, `streetA`, `streetB`, `streetC`, `town`, `county`, `postcode`, `country`, `monthRevenue`, `monthExpense`, `monthProfit`) VALUES
(1, 1, 'comp_tbl1', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comp_tbl1`
--
ALTER TABLE `comp_tbl1`
  ADD PRIMARY KEY (`companyID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comp_tbl1`
--
ALTER TABLE `comp_tbl1`
  MODIFY `companyID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
