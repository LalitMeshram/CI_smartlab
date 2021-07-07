-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2021 at 02:28 PM
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
-- Table structure for table `center_details`
--

CREATE TABLE `center_details` (
  `centerId` int(10) UNSIGNED NOT NULL,
  `labName` varchar(150) NOT NULL,
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

INSERT INTO `center_details` (`centerId`, `labName`, `lab_contact`, `lab_email`, `lab_address`, `lab_city`, `lab_postalcode`, `createdat`, `updatedat`) VALUES
(1, 'Testing Laboratory', '9874589658', 'smith@got.com', 'Pune Maharshtra', 'Pune', '411004', '2021-07-04 10:51:22', '2021-07-04 10:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `center_letter_head_details`
--

CREATE TABLE `center_letter_head_details` (
  `centerId` int(10) UNSIGNED NOT NULL,
  `header_logo` varchar(255) DEFAULT NULL,
  `lab_incharge_sign` varchar(255) DEFAULT NULL,
  `doctor_sign` varchar(255) DEFAULT NULL,
  `lab_incharge_name` varchar(150) NOT NULL,
  `lab_incharge_degree` varchar(255) NOT NULL,
  `lab_doctor_name` varchar(150) NOT NULL,
  `lab_doctor_degree` varchar(255) NOT NULL,
  `footer_logo` varchar(255) DEFAULT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `center_letter_head_details`
--

INSERT INTO `center_letter_head_details` (`centerId`, `header_logo`, `lab_incharge_sign`, `doctor_sign`, `lab_incharge_name`, `lab_incharge_degree`, `lab_doctor_name`, `lab_doctor_degree`, `footer_logo`, `createdat`, `updatedat`) VALUES
(1, 'documents/1.png2021_07_06_050952000000.png', 'documents/2.png2021_07_06_050952000000.png', 'documents/3.png2021_07_06_050952000000.png', 'Mrunal Jain', 'G.N.M', 'Akshay Kumar', 'MBBS', 'documents/11.jpg2021_07_06_050952000000.jpg', '2021-07-06 17:09:52', '2021-07-06 17:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `center_packages`
--

CREATE TABLE `center_packages` (
  `packageId` int(10) UNSIGNED NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `duration` int(11) NOT NULL,
  `isactive` int(11) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `center_packages`
--

INSERT INTO `center_packages` (`packageId`, `plan_name`, `amount`, `duration`, `isactive`, `createdat`, `updatedat`) VALUES
(1, 'TRIAL PERIOD', 10.00, 5, 1, '2021-06-27 09:37:17', '2021-06-27 09:37:17'),
(2, 'Advanced Package', 250.00, 30, 1, '2021-07-04 13:06:20', '2021-07-04 13:06:20'),
(3, 'VIP Customers', 500.00, 60, 1, '2021-07-04 13:06:20', '2021-07-04 13:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `center_package_details`
--

CREATE TABLE `center_package_details` (
  `detailId` int(10) UNSIGNED NOT NULL,
  `packageId` int(10) UNSIGNED NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `center_package_details`
--

INSERT INTO `center_package_details` (`detailId`, `packageId`, `details`) VALUES
(1, 1, '5 Days Free'),
(2, 1, 'SMS Free'),
(3, 2, '10 Days Extra Trial'),
(4, 2, '20 Days Full access'),
(5, 3, 'Get access of 10 days'),
(6, 3, '50 Days Free');

-- --------------------------------------------------------

--
-- Table structure for table `center_payment_details`
--

CREATE TABLE `center_payment_details` (
  `paymentId` int(10) UNSIGNED NOT NULL,
  `centerId` int(11) NOT NULL,
  `packageId` int(10) UNSIGNED NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `paymentmode` varchar(100) DEFAULT NULL,
  `payment_ref_number` varchar(150) DEFAULT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `center_payment_details`
--

INSERT INTO `center_payment_details` (`paymentId`, `centerId`, `packageId`, `startdate`, `enddate`, `paymentmode`, `payment_ref_number`, `createdat`, `updatedat`) VALUES
(1, 1, 1, '2021-06-27', '2021-06-28', 'PhonePay', '123FRT', '2021-06-27 09:02:45', '2021-06-29 21:08:33'),
(2, 2, 1, '2021-06-27', '2021-06-29', 'PhonePay', '123FRT', '2021-06-27 09:05:05', '2021-06-29 21:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `customer_registeration`
--

CREATE TABLE `customer_registeration` (
  `centerId` int(11) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `emailId` varchar(255) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `upassword` varchar(25) NOT NULL,
  `isactive` int(11) DEFAULT 1,
  `ismailverified` int(11) DEFAULT 0,
  `ismobileverified` int(11) DEFAULT 0,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_registeration`
--

INSERT INTO `customer_registeration` (`centerId`, `fullname`, `emailId`, `contact_number`, `upassword`, `isactive`, `ismailverified`, `ismobileverified`, `createdat`, `updatedat`) VALUES
(1, 'John Smith', 'john@gmail.com', '9881658987', '12345', 1, 0, 0, '2021-06-26 16:46:41', '2021-06-28 17:27:40'),
(2, 'Tony Stark', 'tonystark@avengers.com', '8208504868', '12345', 1, 0, 0, '2021-06-27 08:13:19', '2021-06-28 17:27:45'),
(4, 'Sansa Stark', 'sansa@got.com', '9657856985', '12345', 1, 0, 0, '2021-07-02 08:39:40', '2021-07-02 08:39:40'),
(5, 'Robb Stark', 'robb@got.com', '9657856985', '12345', 1, 0, 0, '2021-07-02 08:40:47', '2021-07-02 08:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `patient_master`
--

CREATE TABLE `patient_master` (
  `patientId` int(10) UNSIGNED NOT NULL,
  `centerId` int(10) UNSIGNED NOT NULL,
  `patient_title` varchar(25) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `aadhar_number` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) DEFAULT NULL,
  `contact_number` varchar(12) NOT NULL,
  `alternate_number` varchar(12) DEFAULT NULL,
  `emailId` varchar(100) DEFAULT NULL,
  `patient_address` text NOT NULL,
  `patient_profile` varchar(255) DEFAULT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_master`
--

INSERT INTO `patient_master` (`patientId`, `centerId`, `patient_title`, `first_name`, `last_name`, `gender`, `aadhar_number`, `dob`, `age`, `contact_number`, `alternate_number`, `emailId`, `patient_address`, `patient_profile`, `createdat`, `updatedat`) VALUES
(1, 1, 'Mr.', 'Aarya', 'Stark', 'Female', '589636254147', '1998-09-04', 23, '9887456514', '', 'aarya@stark.com', '12.BB Marg Lahore', './documents/2021_07_06_0417090000003.png', '2021-07-06 16:12:56', '2021-07-06 16:17:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `center_details`
--
ALTER TABLE `center_details`
  ADD PRIMARY KEY (`centerId`);

--
-- Indexes for table `center_letter_head_details`
--
ALTER TABLE `center_letter_head_details`
  ADD PRIMARY KEY (`centerId`);

--
-- Indexes for table `center_packages`
--
ALTER TABLE `center_packages`
  ADD PRIMARY KEY (`packageId`);

--
-- Indexes for table `center_package_details`
--
ALTER TABLE `center_package_details`
  ADD PRIMARY KEY (`detailId`),
  ADD KEY `packageId` (`packageId`);

--
-- Indexes for table `center_payment_details`
--
ALTER TABLE `center_payment_details`
  ADD PRIMARY KEY (`paymentId`),
  ADD KEY `centerId` (`centerId`);

--
-- Indexes for table `customer_registeration`
--
ALTER TABLE `customer_registeration`
  ADD PRIMARY KEY (`centerId`),
  ADD UNIQUE KEY `Email` (`emailId`,`contact_number`);

--
-- Indexes for table `patient_master`
--
ALTER TABLE `patient_master`
  ADD PRIMARY KEY (`patientId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `center_details`
--
ALTER TABLE `center_details`
  MODIFY `centerId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `center_letter_head_details`
--
ALTER TABLE `center_letter_head_details`
  MODIFY `centerId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `center_packages`
--
ALTER TABLE `center_packages`
  MODIFY `packageId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `center_package_details`
--
ALTER TABLE `center_package_details`
  MODIFY `detailId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `center_payment_details`
--
ALTER TABLE `center_payment_details`
  MODIFY `paymentId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_registeration`
--
ALTER TABLE `customer_registeration`
  MODIFY `centerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patient_master`
--
ALTER TABLE `patient_master`
  MODIFY `patientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `center_package_details`
--
ALTER TABLE `center_package_details`
  ADD CONSTRAINT `center_package_details_ibfk_1` FOREIGN KEY (`packageId`) REFERENCES `center_packages` (`packageId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `center_payment_details`
--
ALTER TABLE `center_payment_details`
  ADD CONSTRAINT `center_payment_details_ibfk_1` FOREIGN KEY (`centerId`) REFERENCES `customer_registeration` (`centerId`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
