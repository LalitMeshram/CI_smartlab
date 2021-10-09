-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2021 at 09:07 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartlab`
--

-- --------------------------------------------------------

--
-- Table structure for table `case_report_data`
--

CREATE TABLE `case_report_data` (
  `case_report_id` int(10) UNSIGNED NOT NULL,
  `reportId` int(10) UNSIGNED NOT NULL,
  `parameterId` int(11) NOT NULL,
  `parameter` varchar(100) NOT NULL,
  `testId` int(11) NOT NULL,
  `testName` varchar(100) NOT NULL,
  `finding_value` varchar(100) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `reference_value` varchar(100) DEFAULT NULL,
  `findings` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `case_report_data`
--
ALTER TABLE `case_report_data`
  ADD PRIMARY KEY (`case_report_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `case_report_data`
--
ALTER TABLE `case_report_data`
  MODIFY `case_report_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
