-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2021 at 04:04 PM
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
-- Database: `lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `center_details`
--

CREATE TABLE `center_details` (
  `centerId` int(10) UNSIGNED NOT NULL,
  `labName` varchar(150) NOT NULL,
  `brandName` varchar(100) DEFAULT NULL,
  `lab_contact` varchar(12) NOT NULL,
  `lab_email` varchar(150) NOT NULL,
  `lab_address` text NOT NULL,
  `lab_city` varchar(150) NOT NULL,
  `lab_postalcode` varchar(7) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `center_details`
--

INSERT INTO `center_details` (`centerId`, `labName`, `brandName`, `lab_contact`, `lab_email`, `lab_address`, `lab_city`, `lab_postalcode`, `createdat`, `updatedat`) VALUES
(1, 'TEST', NULL, '9881652726', 'johnabrahm@gmail.com', 'Test', 'Pune', '455014', '2021-10-14 16:24:08', '2021-10-14 16:24:08'),
(2, 'Esmart Lab', NULL, '', 'darshanvnikumbh@gmail.com', '', '', '', '2021-10-14 20:45:33', '2021-10-14 20:45:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `center_details`
--
ALTER TABLE `center_details`
  ADD PRIMARY KEY (`centerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `center_details`
--
ALTER TABLE `center_details`
  MODIFY `centerId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
