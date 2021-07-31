-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2021 at 10:24 AM
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
-- Table structure for table `case_payment_transactions`
--

CREATE TABLE `case_payment_transactions` (
  `transactionId` int(10) UNSIGNED NOT NULL,
  `paymentId` int(10) UNSIGNED NOT NULL,
  `amount` double(10,2) NOT NULL,
  `paymentdate` date NOT NULL,
  `paymentmode` varchar(50) DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_payment_transactions`
--

INSERT INTO `case_payment_transactions` (`transactionId`, `paymentId`, `amount`, `paymentdate`, `paymentmode`, `createdby`, `createdat`, `updatedat`) VALUES
(1, 1, 200.00, '2021-07-20', NULL, NULL, '2021-07-20 15:03:05', '2021-07-20 15:03:05'),
(2, 2, 90.00, '2021-07-30', NULL, NULL, '2021-07-30 11:39:34', '2021-07-30 11:39:34'),
(3, 3, 500.00, '2021-07-31', NULL, NULL, '2021-07-31 13:26:48', '2021-07-31 13:26:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `case_payment_transactions`
--
ALTER TABLE `case_payment_transactions`
  ADD PRIMARY KEY (`transactionId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `case_payment_transactions`
--
ALTER TABLE `case_payment_transactions`
  MODIFY `transactionId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
