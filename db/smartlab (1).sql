-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2021 at 06:39 AM
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
-- Table structure for table `case_master`
--

CREATE TABLE `case_master` (
  `caseId` int(10) UNSIGNED NOT NULL,
  `centerId` int(10) UNSIGNED NOT NULL,
  `patientId` int(10) UNSIGNED NOT NULL,
  `referenceId` int(10) UNSIGNED DEFAULT NULL,
  `collection_center` varchar(55) DEFAULT NULL,
  `collection_source` varchar(55) DEFAULT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_master`
--

INSERT INTO `case_master` (`caseId`, `centerId`, `patientId`, `referenceId`, `collection_center`, `collection_source`, `createdat`, `updatedat`) VALUES
(1, 1, 1, 1, 'Hospital', 'City Hospital', '2021-07-20 15:03:05', '2021-07-20 15:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `case_payments`
--

CREATE TABLE `case_payments` (
  `paymentId` int(10) UNSIGNED NOT NULL,
  `caseId` int(10) UNSIGNED NOT NULL,
  `centerId` int(10) UNSIGNED NOT NULL,
  `patientId` int(10) UNSIGNED NOT NULL,
  `total_amt` double(10,2) NOT NULL,
  `amt_recieved` double(10,2) NOT NULL,
  `discount` double(2,2) NOT NULL,
  `paymentmode` varchar(25) NOT NULL,
  `paymentdetails` varchar(55) DEFAULT NULL,
  `pending_amt` double(10,2) DEFAULT NULL,
  `paymentdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_payments`
--

INSERT INTO `case_payments` (`paymentId`, `caseId`, `centerId`, `patientId`, `total_amt`, `amt_recieved`, `discount`, `paymentmode`, `paymentdetails`, `pending_amt`, `paymentdate`) VALUES
(1, 1, 1, 1, 500.00, 200.00, 0.00, 'Cash', NULL, 300.00, '2021-07-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `case_payment_transactions`
--

CREATE TABLE `case_payment_transactions` (
  `transactionId` int(10) UNSIGNED NOT NULL,
  `paymentId` int(10) UNSIGNED NOT NULL,
  `amount` double(10,2) NOT NULL,
  `paymentdate` date NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_payment_transactions`
--

INSERT INTO `case_payment_transactions` (`transactionId`, `paymentId`, `amount`, `paymentdate`, `createdat`, `updatedat`) VALUES
(1, 1, 200.00, '2021-07-20', '2021-07-20 15:03:05', '2021-07-20 15:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `case_tests`
--

CREATE TABLE `case_tests` (
  `case_test_id` int(10) UNSIGNED NOT NULL,
  `caseId` int(10) UNSIGNED NOT NULL,
  `testId` int(10) UNSIGNED NOT NULL,
  `centerId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_tests`
--

INSERT INTO `case_tests` (`case_test_id`, `caseId`, `testId`, `centerId`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1);

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
-- Table structure for table `center_outsource_test`
--

CREATE TABLE `center_outsource_test` (
  `outsourceId` int(10) UNSIGNED NOT NULL,
  `outsource_lab_id` int(11) NOT NULL,
  `outsource_amt` double(10,2) NOT NULL,
  `centerId` int(10) UNSIGNED NOT NULL,
  `testId` int(10) UNSIGNED NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `center_outsource_test`
--

INSERT INTO `center_outsource_test` (`outsourceId`, `outsource_lab_id`, `outsource_amt`, `centerId`, `testId`, `createdat`, `updatedat`) VALUES
(1, 2, 200.00, 1, 1, '2021-07-27 08:52:46', '2021-07-27 08:52:46'),
(2, 1, 200.00, 1, 2, '2021-07-27 10:08:04', '2021-07-27 10:08:04');

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
(1, 1, 3, '2021-07-20', '2021-09-18', 'UPI', 'order_Hb2tWU9YXqLEMv', '2021-07-20 09:31:10', '2021-07-20 09:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `center_reference_master`
--

CREATE TABLE `center_reference_master` (
  `ref_id` int(10) UNSIGNED NOT NULL,
  `ref_title` varchar(10) NOT NULL,
  `ref_name` varchar(70) NOT NULL,
  `ref_degree` varchar(150) DEFAULT NULL,
  `ref_contact` varchar(12) NOT NULL,
  `ref_email` varchar(255) DEFAULT NULL,
  `ref_address` text DEFAULT NULL,
  `centerId` int(10) UNSIGNED NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `center_reference_master`
--

INSERT INTO `center_reference_master` (`ref_id`, `ref_title`, `ref_name`, `ref_degree`, `ref_contact`, `ref_email`, `ref_address`, `centerId`, `createdat`, `updatedat`) VALUES
(1, 'Mr.', 'Kunal Pandya', 'MBBS', '9881356896', 'kunal.pandya@mbbs.com', 'Kunal Builders Matoshree banglow', 1, '2021-07-14 08:27:40', '2021-07-14 08:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `center_test_master`
--

CREATE TABLE `center_test_master` (
  `testId` int(10) UNSIGNED NOT NULL,
  `categoryId` int(10) UNSIGNED NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `short_name` varchar(150) DEFAULT NULL,
  `method` varchar(255) NOT NULL,
  `instrument` varchar(255) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `fees` double(10,2) NOT NULL,
  `centerId` int(10) UNSIGNED NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `center_test_master`
--

INSERT INTO `center_test_master` (`testId`, `categoryId`, `test_name`, `short_name`, `method`, `instrument`, `gender`, `fees`, `centerId`, `createdat`, `updatedat`) VALUES
(1, 1, 'TEST123', 'T1M1', 'KET', 'KH', 'Male', 500.00, 1, '2021-07-27 08:52:46', '2021-07-27 08:52:46'),
(2, 2, 'TEST123', '', 'KET', 'KH', 'Male', 500.00, 1, '2021-07-27 10:08:04', '2021-07-27 10:08:04');

-- --------------------------------------------------------

--
-- Table structure for table `center_test_subtypes`
--

CREATE TABLE `center_test_subtypes` (
  `subtypeId` int(10) UNSIGNED NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `unitId` int(10) UNSIGNED NOT NULL,
  `testId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `center_test_subtypes`
--

INSERT INTO `center_test_subtypes` (`subtypeId`, `test_name`, `unitId`, `testId`) VALUES
(2, 'TECH M', 1, 1),
(3, 'TECH M', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `center_test_subtypes_ranges`
--

CREATE TABLE `center_test_subtypes_ranges` (
  `rangeId` int(10) UNSIGNED NOT NULL,
  `subtypeId` int(11) UNSIGNED NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `lower_age` int(11) DEFAULT NULL,
  `lower_age_period` varchar(20) NOT NULL,
  `upper_age` int(11) DEFAULT NULL,
  `upper_age_period` varchar(14) NOT NULL,
  `lower_limit` varchar(50) DEFAULT NULL,
  `upper_limit` varchar(50) DEFAULT NULL,
  `words` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `center_test_subtypes_ranges`
--

INSERT INTO `center_test_subtypes_ranges` (`rangeId`, `subtypeId`, `gender`, `lower_age`, `lower_age_period`, `upper_age`, `upper_age_period`, `lower_limit`, `upper_limit`, `words`) VALUES
(2, 2, 'Male', 10, '', 25, '', '10', '25', NULL),
(3, 2, 'Male', 12, '', 12, '', '12', '12', NULL),
(4, 3, 'Male', 12, 'Days', 12, 'Days', '12', '12', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `center_unit_master`
--

CREATE TABLE `center_unit_master` (
  `unitId` int(10) UNSIGNED NOT NULL,
  `unit` varchar(100) NOT NULL,
  `centerId` int(10) UNSIGNED NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `center_unit_master`
--

INSERT INTO `center_unit_master` (`unitId`, `unit`, `centerId`, `createdat`) VALUES
(1, 'KETCHUP', 1, '2021-07-19 08:16:26'),
(2, 'KGF', 1, '2021-07-24 10:39:52');

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
-- Table structure for table `lab_category`
--

CREATE TABLE `lab_category` (
  `categoryId` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updateat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lab_center_categories`
--

CREATE TABLE `lab_center_categories` (
  `categoryid` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `centerId` int(11) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_center_categories`
--

INSERT INTO `lab_center_categories` (`categoryid`, `category`, `centerId`, `createdat`, `updatedat`) VALUES
(1, 'Microbiology', 1, '2021-07-12 15:10:58', '2021-07-12 15:12:50'),
(2, 'Hametology', 1, '2021-07-12 15:11:26', '2021-07-12 15:11:26'),
(3, 'Dermitology', 1, '2021-07-24 10:38:41', '2021-07-24 10:38:41');

-- --------------------------------------------------------

--
-- Table structure for table `outsource_lab`
--

CREATE TABLE `outsource_lab` (
  `outsource_lab_id` int(10) UNSIGNED NOT NULL,
  `lab_name` varchar(150) NOT NULL,
  `centerId` int(11) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `outsource_lab`
--

INSERT INTO `outsource_lab` (`outsource_lab_id`, `lab_name`, `centerId`, `createdat`) VALUES
(1, 'Emergency 24*7', 1, '2021-07-13 08:45:14'),
(2, 'Emergency', 1, '2021-07-13 08:45:27');

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
(1, 1, 'Mr.', 'Aarya', 'Stark', 'Female', '589636254147', '1998-09-04', 23, '9887456514', '', 'aarya@stark.com', '12.BB Marg Lahore', './documents/2021_07_06_0417090000003.png', '2021-07-06 16:12:56', '2021-07-06 16:17:09'),
(2, 1, 'Mr', 'Nick', 'Jonas', 'Male', '636458395855', '2000-12-12', 10, '09763602243', '', 'hulkt@avengers.com', 'San Diego,California', '0', '2021-07-20 15:15:34', '2021-07-20 15:15:34'),
(3, 1, 'Mr', 'Nick', 'Jonas', 'Male', '636458395855', '2000-12-12', 10, '09763602243', '', 'hulkt@avengers.com', 'San Diego,California', '0', '2021-07-20 15:15:44', '2021-07-20 15:15:44'),
(4, 1, 'Mrs', 'Mandira', 'Mathur', 'Female', '9685741425', '1998-01-10', 25, '09763602243', '', 'hulkt@avengers.com', 'San Diego,California', '0', '2021-07-20 15:19:19', '2021-07-20 15:19:19'),
(5, 1, 'Mrs', 'Mandira', 'Mathur', 'Female', '9685741425', '1998-01-10', 25, '09763602243', '', 'hulkt@avengers.com', 'San Diego,California', '0', '2021-07-20 15:19:27', '2021-07-20 15:19:27'),
(6, 1, 'Mrs', 'Mandira', 'Mathur', 'Female', '9685741425', '1998-01-10', 25, '09763602243', '', 'hulkt@avengers.com', 'San Diego,California', '0', '2021-07-20 15:20:12', '2021-07-20 15:20:12'),
(7, 1, 'Mrs', 'Mandira', 'Mathur', 'Female', '9685741425', '1998-01-10', 25, '09763602243', '', 'hulkt@avengers.com', 'San Diego,California', 'documents/2021_07_20_03203500000011.jpg', '2021-07-20 15:20:35', '2021-07-20 15:20:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `case_master`
--
ALTER TABLE `case_master`
  ADD PRIMARY KEY (`caseId`);

--
-- Indexes for table `case_payments`
--
ALTER TABLE `case_payments`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `case_payment_transactions`
--
ALTER TABLE `case_payment_transactions`
  ADD PRIMARY KEY (`transactionId`);

--
-- Indexes for table `case_tests`
--
ALTER TABLE `case_tests`
  ADD PRIMARY KEY (`case_test_id`);

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
-- Indexes for table `center_outsource_test`
--
ALTER TABLE `center_outsource_test`
  ADD PRIMARY KEY (`outsourceId`);

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
-- Indexes for table `center_reference_master`
--
ALTER TABLE `center_reference_master`
  ADD PRIMARY KEY (`ref_id`);

--
-- Indexes for table `center_test_master`
--
ALTER TABLE `center_test_master`
  ADD PRIMARY KEY (`testId`);

--
-- Indexes for table `center_test_subtypes`
--
ALTER TABLE `center_test_subtypes`
  ADD PRIMARY KEY (`subtypeId`);

--
-- Indexes for table `center_test_subtypes_ranges`
--
ALTER TABLE `center_test_subtypes_ranges`
  ADD PRIMARY KEY (`rangeId`),
  ADD KEY `center_test_subtypes_ranges_ibfk_1` (`subtypeId`);

--
-- Indexes for table `center_unit_master`
--
ALTER TABLE `center_unit_master`
  ADD PRIMARY KEY (`unitId`);

--
-- Indexes for table `customer_registeration`
--
ALTER TABLE `customer_registeration`
  ADD PRIMARY KEY (`centerId`),
  ADD UNIQUE KEY `Email` (`emailId`,`contact_number`);

--
-- Indexes for table `lab_category`
--
ALTER TABLE `lab_category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `lab_center_categories`
--
ALTER TABLE `lab_center_categories`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `outsource_lab`
--
ALTER TABLE `outsource_lab`
  ADD PRIMARY KEY (`outsource_lab_id`);

--
-- Indexes for table `patient_master`
--
ALTER TABLE `patient_master`
  ADD PRIMARY KEY (`patientId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `case_master`
--
ALTER TABLE `case_master`
  MODIFY `caseId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `case_payments`
--
ALTER TABLE `case_payments`
  MODIFY `paymentId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `case_payment_transactions`
--
ALTER TABLE `case_payment_transactions`
  MODIFY `transactionId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `case_tests`
--
ALTER TABLE `case_tests`
  MODIFY `case_test_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `center_outsource_test`
--
ALTER TABLE `center_outsource_test`
  MODIFY `outsourceId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `paymentId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `center_reference_master`
--
ALTER TABLE `center_reference_master`
  MODIFY `ref_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `center_test_master`
--
ALTER TABLE `center_test_master`
  MODIFY `testId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `center_test_subtypes`
--
ALTER TABLE `center_test_subtypes`
  MODIFY `subtypeId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `center_test_subtypes_ranges`
--
ALTER TABLE `center_test_subtypes_ranges`
  MODIFY `rangeId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `center_unit_master`
--
ALTER TABLE `center_unit_master`
  MODIFY `unitId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_registeration`
--
ALTER TABLE `customer_registeration`
  MODIFY `centerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lab_category`
--
ALTER TABLE `lab_category`
  MODIFY `categoryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_center_categories`
--
ALTER TABLE `lab_center_categories`
  MODIFY `categoryid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `outsource_lab`
--
ALTER TABLE `outsource_lab`
  MODIFY `outsource_lab_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient_master`
--
ALTER TABLE `patient_master`
  MODIFY `patientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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

--
-- Constraints for table `center_test_subtypes_ranges`
--
ALTER TABLE `center_test_subtypes_ranges`
  ADD CONSTRAINT `center_test_subtypes_ranges_ibfk_1` FOREIGN KEY (`subtypeId`) REFERENCES `center_test_subtypes` (`subtypeId`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
