-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2021 at 09:10 AM
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
-- Table structure for table `center_test_group_panel`
--

CREATE TABLE `center_test_group_panel` (
  `groupId` int(10) UNSIGNED NOT NULL,
  `testId` int(10) UNSIGNED NOT NULL,
  `panelId` int(10) UNSIGNED NOT NULL,
  `isgroup` tinyint(1) NOT NULL,
  `label` varchar(155) DEFAULT NULL,
  `flag_sequence` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `jsid` varchar(50) NOT NULL COMMENT 'for front end purpose for edit test'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `center_test_group_panel`
--

INSERT INTO `center_test_group_panel` (`groupId`, `testId`, `panelId`, `isgroup`, `label`, `flag_sequence`, `jsid`) VALUES
(1, 1, 2, 1, 'Generic', 1, ''),
(2, 1, 3, 1, 'Generic', 1, ''),
(3, 1, 1, 0, '-', 0, ''),
(4, 1, 2, 1, 'Test', 3, ''),
(5, 1, 4, 1, 'Test', 3, ''),
(6, 2, 1, 1, 'NEW check', 1, ''),
(7, 2, 1, 1, 'New check first', 2, ''),
(8, 2, 2, 1, 'New check first', 2, ''),
(9, 2, 3, 1, 'New check first', 2, ''),
(10, 2, 1, 0, '-', 0, ''),
(11, 2, 2, 0, '-', 0, ''),
(12, 2, 3, 0, '-', 0, ''),
(13, 2, 4, 0, '-', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `center_test_group_panel`
--
ALTER TABLE `center_test_group_panel`
  ADD PRIMARY KEY (`groupId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `center_test_group_panel`
--
ALTER TABLE `center_test_group_panel`
  MODIFY `groupId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
