-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2021 at 06:55 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `createdat` datetime NOT NULL,
  `updatedat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `pwd`, `createdat`, `updatedat`) VALUES
(1, 'John Doe', 'john@gmail.com', '12345', '2021-08-25 00:00:00', '2021-08-25 00:00:00');

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
(1, 1, 1, 1, 'Home', 'KEM', '2021-08-01 08:47:54', '2021-08-01 08:47:54'),
(2, 1, 4, 1, 'Lab', 'Test', '2021-08-01 08:51:31', '2021-08-01 08:51:31'),
(3, 1, 3, 1, 'Lab', 'KEM', '2021-08-01 10:30:57', '2021-08-01 10:30:57'),
(4, 6, 8, 2, 'Lab', 'KEM', '2021-08-02 20:44:06', '2021-08-02 20:44:06'),
(5, 7, 9, 3, 'Hospital', 'KEM', '2021-08-02 21:45:43', '2021-08-02 21:45:43'),
(6, 1, 1, 1, 'Hospital', 'KEM', '2021-08-13 15:34:43', '2021-08-13 15:34:43');

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
(1, 1, 1, 1, 700.00, 100.00, 0.00, 'Cash', '', 100.00, '2021-08-01 00:00:00'),
(2, 2, 1, 4, 500.00, 500.00, 0.00, 'Cash', '', 0.00, '2021-08-01 00:00:00'),
(3, 3, 1, 3, 200.00, 100.00, 0.00, 'Cash', '', 100.00, '2021-08-01 00:00:00'),
(4, 4, 6, 8, 100.00, 50.00, 0.00, 'UPI', 'PayTm', 50.00, '2021-08-02 00:00:00'),
(5, 5, 7, 9, 700.00, 600.00, 0.00, 'Cash', '', 100.00, '2021-08-02 00:00:00'),
(6, 6, 1, 1, 300.00, 200.00, 0.00, 'Cash', '', 100.00, '2021-08-13 00:00:00');

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
(1, 1, 500.00, '2021-08-01', 'Cash', 1, '2021-08-01 08:47:55', '2021-08-01 08:47:55'),
(2, 1, 100.00, '2021-08-01', 'Cash', 1, '2021-08-01 08:49:14', '2021-08-01 08:49:14'),
(3, 2, 300.00, '2021-08-01', 'Cash', 1, '2021-08-01 08:51:31', '2021-08-01 08:51:31'),
(4, 2, 100.00, '2021-08-01', 'Cash', 1, '2021-08-01 08:52:02', '2021-08-01 08:52:02'),
(5, 2, 100.00, '2021-08-01', 'Cash', 1, '2021-08-01 08:52:59', '2021-08-01 08:52:59'),
(6, 3, 100.00, '2021-08-01', 'Cash', 1, '2021-08-01 10:30:58', '2021-08-01 10:30:58'),
(7, 4, 50.00, '2021-08-02', 'UPI', 1, '2021-08-02 20:44:06', '2021-08-02 20:44:06'),
(8, 5, 500.00, '2021-08-02', 'UPI', 1, '2021-08-02 21:45:43', '2021-08-02 21:45:43'),
(9, 5, 100.00, '2021-08-02', 'Cash', 1, '2021-08-02 21:46:56', '2021-08-02 21:46:56'),
(10, 6, 200.00, '2021-08-13', 'Cash', 1, '2021-08-13 15:34:43', '2021-08-13 15:34:43'),
(11, 6, 0.00, '2021-08-13', 'Cash', 1, '2021-08-13 15:57:20', '2021-08-13 15:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `case_report_data`
--

CREATE TABLE `case_report_data` (
  `case_report_id` int(10) UNSIGNED NOT NULL,
  `reportId` int(10) UNSIGNED NOT NULL,
  `category` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `findings` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_report_data`
--

INSERT INTO `case_report_data` (`case_report_id`, `reportId`, `category`, `unit`, `findings`) VALUES
(1, 1, 'Microbilogy', 'gl', '10');

-- --------------------------------------------------------

--
-- Table structure for table `case_report_master`
--

CREATE TABLE `case_report_master` (
  `reportId` int(11) NOT NULL,
  `caseId` int(10) UNSIGNED NOT NULL,
  `patientId` int(10) UNSIGNED NOT NULL,
  `casedate` datetime NOT NULL,
  `centerId` int(10) UNSIGNED NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_report_master`
--

INSERT INTO `case_report_master` (`reportId`, `caseId`, `patientId`, `casedate`, `centerId`, `createdat`, `updatedat`) VALUES
(1, 1, 1, '2021-01-11 00:00:00', 1, '2021-08-21 17:57:10', '2021-08-21 17:57:10');

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
(3, 1, 1, 1),
(4, 1, 2, 1),
(7, 2, 1, 1),
(8, 3, 2, 1),
(9, 4, 3, 6),
(12, 5, 4, 7),
(13, 5, 5, 7),
(15, 6, 6, 1),
(16, 6, 7, 1);

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
(1, 'BHASKAR RAMJI PAWAR', '9874589658', 'vikaspawar3110@gmail.com', 'Pune Maharshtra', 'RAHURI', '413705', '2021-07-04 10:51:22', '2021-08-01 10:47:09'),
(6, 'Spine 360', '9881652726', 'spine@gmail.com', 'Pune Maharashtra', 'Pune', '411002', '2021-08-02 20:36:46', '2021-08-02 20:36:46'),
(7, 'Test 1 Lab', '9960425214', 'test01@gmail.com', 'Pune Maharashtra', 'Pune', '411002', '2021-08-02 21:33:30', '2021-08-02 21:33:30');

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
(1, 'documents/1.png2021_07_06_050952000000.png', 'documents/2.png2021_07_06_050952000000.png', 'documents/3.png2021_07_06_050952000000.png', 'Mrunal Jain', 'G.N.M', 'Akshay Kumar', 'MBBS', 'documents/11.jpg2021_07_06_050952000000.jpg', '2021-07-06 17:09:52', '2021-07-06 17:10:27'),
(6, 'documents/index.png2021_08_02_083846000000.png', '', '', 'John', 'MCA', 'Rock', 'MBBS', '', '2021-08-02 20:38:46', '2021-08-02 20:38:46'),
(7, 'documents/index.jpg2021_08_02_093436000000.jpg', '', '', 'Test01', 'MCA', 'Rock', 'MBBS', 'documents/index1.jpg2021_08_02_093436000000.jpg', '2021-08-02 21:34:36', '2021-08-02 21:34:36');

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
(1, 1, 200.00, 1, 1, '2021-07-28 13:08:33', '2021-07-28 13:08:33'),
(2, 1, 500.00, 1, 2, '2021-07-29 09:51:51', '2021-07-29 11:23:05'),
(3, 4, 200.00, 7, 4, '2021-08-02 21:37:35', '2021-08-02 21:37:53');

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
(3, 'VIP Customers', 500.00, 60, 1, '2021-07-04 13:06:20', '2021-07-04 13:06:20'),
(4, 'Preminum Package', 999.00, 30, 1, '2021-08-02 20:48:10', '2021-08-02 20:49:44'),
(5, 'Delight', 500.00, 25, 0, '2021-08-25 13:19:36', '2021-08-25 18:48:10'),
(6, 'Delight', 500.00, 25, 0, '2021-08-25 13:19:50', '2021-08-25 13:19:50');

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
(6, 3, '50 Days Free'),
(8, 4, 'Get 15 Days full access'),
(9, 4, 'Get free data consultatnt on reports '),
(10, 4, 'Expert Consultant'),
(11, 2, 'Whatsapp free'),
(14, 6, 'Test 1'),
(15, 6, 'Test 2'),
(16, 5, 'Test 1'),
(17, 5, 'Test 2');

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
(1, 1, 3, '2021-07-20', '2021-09-18', 'UPI', 'order_Hb2tWU9YXqLEMv', '2021-07-20 09:31:10', '2021-07-20 09:31:10'),
(2, 6, 1, '2021-08-02', '2021-08-07', 'UPI', 'order_HgN9xz4SO6sp9f', '2021-08-02 20:35:58', '2021-08-02 20:35:58'),
(3, 7, 2, '2021-08-02', '2021-09-01', 'UPI', 'order_HgO7hKDrhKTPSV', '2021-08-02 21:32:25', '2021-08-02 21:32:25');

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
(1, 'Miss.', 'Kunal Pandya', 'MBBS', '9881356896', 'kunal.pandya@mbbs.com', 'Kunal Builders Matoshree banglow', 1, '2021-07-14 08:27:40', '2021-07-14 08:28:15'),
(2, 'Mr.', 'John Doe', 'MBBS', '9687854785', 'john@gmail.com', 'San Dieago', 6, '2021-08-02 20:42:06', '2021-08-02 20:42:06'),
(3, 'Mr.', 'John Doe', 'MBBS', '09024634008', 'test@gmail.com', 'Nasik', 7, '2021-08-02 21:42:50', '2021-08-02 21:42:50');

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
(1, 1, 'TEST123', 'T1M1', 'KET', 'KH', 'Male', 500.00, 1, '2021-07-28 13:08:33', '2021-07-28 13:09:39'),
(2, 2, 'Biscuit', 'B1C1', 'JEM', 'KURLA', 'Male', 200.00, 1, '2021-07-29 09:51:51', '2021-08-01 08:47:05'),
(3, 4, 'Tablet 1', 'Tab1', 'KET', 'KH', 'Male', 100.00, 6, '2021-08-02 20:40:50', '2021-08-02 20:40:50'),
(4, 5, 'TEST 01', 'T01', 'ME', 'INST', 'Female', 500.00, 7, '2021-08-02 21:37:35', '2021-08-02 21:37:35'),
(5, 6, 'Test02', 'T02', 'K1', 'KH', 'Male', 200.00, 7, '2021-08-02 21:40:39', '2021-08-02 21:40:39'),
(6, 2, 'CBC WITH ESR', 'CBC', 'TEST', 'TEST', 'Male', 200.00, 1, '2021-08-13 14:42:25', '2021-08-13 14:42:25'),
(7, 1, 'Calcitonin', 'Calcitonin', 'TEST', 'KH', 'Male', 100.00, 1, '2021-08-13 15:56:59', '2021-08-13 15:56:59');

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
(6, 'TECH M', 1, 2),
(7, 'Tab1', 3, 3),
(9, 'T01', 4, 4),
(10, 'T02', 4, 5),
(11, 'Hemoglobin', 6, 6),
(12, 'Total Leukocyte Count', 7, 6),
(13, 'Neutrophils', 8, 6),
(14, 'Lymphocyte', 8, 6),
(15, 'Platelet Count', 9, 6),
(16, 'Calcitonin', 10, 7);

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
(2, 2, 'Male', 12, 'Days', 13, 'Days', '12', '12', 'Test'),
(3, 2, 'Male', 12, 'Days', 22, 'Days', '12', '12', 'Test1'),
(8, 6, 'Male', 14, 'Days', 41, 'Days', '52', '98', 'Te'),
(9, 6, 'Male', 13, 'Days', 12, 'Days', '58', '25', 'Test'),
(10, 7, 'Male', 1, 'Days', 1, 'Month', '10', '25', 'Test by John'),
(12, 9, 'Female', 1, 'Days', 2, 'Month', '12', '12', 'Test by Vikas'),
(13, 10, 'Male', 10, 'Month', 12, 'Month', '10', '10', 'Test by John'),
(14, 10, 'Male', 10, 'Month', 10, 'Year', '100', '102', 'Test by Smith'),
(15, 11, 'Male', 10, 'Year', 30, 'Year', '13', '17', 'Test'),
(16, 11, 'Male', 1, 'Year', 10, 'Year', '10', '15', 'Test'),
(17, 12, 'Male', 10, 'Year', 30, 'Year', '4000', '11000', 'Test'),
(18, 13, 'Male', 10, 'Year', 40, 'Year', '10', '40', 'Test'),
(19, 14, 'Male', 10, 'Year', 40, 'Year', '20', '40', 'Test'),
(20, 15, 'Male', 10, 'Year', 30, 'Year', '1.5', '4.5', 'Test'),
(21, 16, 'Male', 10, 'Year', 30, 'Year', '0', '18', 'Test');

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
(2, 'KGF', 1, '2021-07-24 10:39:52'),
(3, 'Tablet', 6, '2021-08-02 20:40:11'),
(4, 'Tablet', 7, '2021-08-02 21:36:16'),
(5, 'TAB', 7, '2021-08-02 21:41:21'),
(6, 'g/dl', 1, '2021-08-13 14:37:27'),
(7, 'cumm', 1, '2021-08-13 14:38:59'),
(8, '%', 1, '2021-08-13 14:40:06'),
(9, 'lakhs/cumm', 1, '2021-08-13 14:41:39'),
(10, 'pg/Ml', 1, '2021-08-13 15:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `customer_registeration`
--

CREATE TABLE `customer_registeration` (
  `centerId` int(11) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `emailId` varchar(150) NOT NULL,
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
(5, 'Robb Stark', 'robb@got.com', '9657856985', '12345', 1, 0, 0, '2021-07-02 08:40:47', '2021-07-02 08:40:47'),
(6, 'John Smith', 'johndoe@gmail.com', '9881652726', '12345', 1, 0, 0, '2021-08-02 20:35:06', '2021-08-02 20:35:06'),
(7, 'Sansa Stark', 'sansa@gmail.com', '9960425214', '12345', 1, 0, 0, '2021-08-02 21:31:30', '2021-08-02 21:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `lab_category`
--

CREATE TABLE `lab_category` (
  `categoryid` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_category`
--

INSERT INTO `lab_category` (`categoryid`, `category`, `createdat`, `updatedat`) VALUES
(1, 'Microbiology', '2021-07-12 15:10:58', '2021-07-12 15:12:50'),
(2, 'Hametology', '2021-07-12 15:11:26', '2021-07-12 15:11:26'),
(3, 'Dermitology', '2021-07-24 10:38:41', '2021-07-24 10:38:41'),
(4, 'Biotech', '2021-08-02 20:39:12', '2021-08-02 20:39:12'),
(5, 'Dermitology', '2021-08-02 21:35:13', '2021-08-02 21:35:13'),
(6, 'Biotech', '2021-08-02 21:38:34', '2021-08-02 21:38:34'),
(7, 'BIOCHEMISTRY', '2021-08-13 15:55:54', '2021-08-13 15:55:54');

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
(3, 'Dermitology', 1, '2021-07-24 10:38:41', '2021-07-24 10:38:41'),
(4, 'Biotech', 6, '2021-08-02 20:39:12', '2021-08-02 20:39:12'),
(5, 'Dermitology', 7, '2021-08-02 21:35:13', '2021-08-02 21:35:13'),
(6, 'Biotech', 7, '2021-08-02 21:38:34', '2021-08-02 21:38:34'),
(7, 'BIOCHEMISTRY', 1, '2021-08-13 15:55:54', '2021-08-13 15:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `lab_tests`
--

CREATE TABLE `lab_tests` (
  `testId` int(10) UNSIGNED NOT NULL,
  `categoryId` int(10) UNSIGNED NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `short_name` varchar(150) DEFAULT NULL,
  `method` varchar(255) NOT NULL,
  `instrument` varchar(255) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `fees` double(10,2) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_tests`
--

INSERT INTO `lab_tests` (`testId`, `categoryId`, `test_name`, `short_name`, `method`, `instrument`, `gender`, `fees`, `createdat`, `updatedat`) VALUES
(1, 1, 'TEST123', 'T1M1', 'KET', 'KH', 'Male', 500.00, '2021-07-28 13:08:33', '2021-07-28 13:09:39'),
(2, 2, 'Biscuit', 'B1C1', 'JEM', 'KURLA', 'Male', 200.00, '2021-07-29 09:51:51', '2021-08-01 08:47:05'),
(3, 4, 'Tablet 1', 'Tab1', 'KET', 'KH', 'Male', 100.00, '2021-08-02 20:40:50', '2021-08-02 20:40:50'),
(4, 5, 'TEST 01', 'T01', 'ME', 'INST', 'Female', 500.00, '2021-08-02 21:37:35', '2021-08-02 21:37:35'),
(5, 6, 'Test02', 'T02', 'K1', 'KH', 'Male', 200.00, '2021-08-02 21:40:39', '2021-08-02 21:40:39'),
(6, 2, 'CBC WITH ESR', 'CBC', 'TEST', 'TEST', 'Male', 200.00, '2021-08-13 14:42:25', '2021-08-13 14:42:25'),
(7, 1, 'Calcitonin', 'Calcitonin', 'TEST', 'KH', 'Male', 100.00, '2021-08-13 15:56:59', '2021-08-13 15:56:59'),
(9, 2, 'ESR', 'CBC', 'TEST', 'TEST', 'Male', 500.00, '2021-08-25 19:38:50', '2021-08-25 19:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `lab_tests_subtypes`
--

CREATE TABLE `lab_tests_subtypes` (
  `subtypeId` int(10) UNSIGNED NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `unitId` int(10) UNSIGNED NOT NULL,
  `testId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_tests_subtypes`
--

INSERT INTO `lab_tests_subtypes` (`subtypeId`, `test_name`, `unitId`, `testId`) VALUES
(2, 'TECH M', 1, 1),
(6, 'TECH M', 1, 2),
(7, 'Tab1', 3, 3),
(9, 'T01', 4, 4),
(10, 'T02', 4, 5),
(11, 'Hemoglobin', 6, 6),
(12, 'Total Leukocyte Count', 7, 6),
(13, 'Neutrophils', 8, 6),
(14, 'Lymphocyte', 8, 6),
(15, 'Platelet Count', 9, 6),
(16, 'Calcitonin', 10, 7),
(20, 'Test1', 2, 9),
(21, 'Test_2', 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `lab_tests_subtypes_ranges`
--

CREATE TABLE `lab_tests_subtypes_ranges` (
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
-- Dumping data for table `lab_tests_subtypes_ranges`
--

INSERT INTO `lab_tests_subtypes_ranges` (`rangeId`, `subtypeId`, `gender`, `lower_age`, `lower_age_period`, `upper_age`, `upper_age_period`, `lower_limit`, `upper_limit`, `words`) VALUES
(2, 2, 'Male', 12, 'Days', 13, 'Days', '12', '12', 'Test'),
(3, 2, 'Male', 12, 'Days', 22, 'Days', '12', '12', 'Test1'),
(8, 6, 'Male', 14, 'Days', 41, 'Days', '52', '98', 'Te'),
(9, 6, 'Male', 13, 'Days', 12, 'Days', '58', '25', 'Test'),
(10, 7, 'Male', 1, 'Days', 1, 'Month', '10', '25', 'Test by John'),
(12, 9, 'Female', 1, 'Days', 2, 'Month', '12', '12', 'Test by Vikas'),
(13, 10, 'Male', 10, 'Month', 12, 'Month', '10', '10', 'Test by John'),
(14, 10, 'Male', 10, 'Month', 10, 'Year', '100', '102', 'Test by Smith'),
(15, 11, 'Male', 10, 'Year', 30, 'Year', '13', '17', 'Test'),
(16, 11, 'Male', 1, 'Year', 10, 'Year', '10', '15', 'Test'),
(17, 12, 'Male', 10, 'Year', 30, 'Year', '4000', '11000', 'Test'),
(18, 13, 'Male', 10, 'Year', 40, 'Year', '10', '40', 'Test'),
(19, 14, 'Male', 10, 'Year', 40, 'Year', '20', '40', 'Test'),
(20, 15, 'Male', 10, 'Year', 30, 'Year', '1.5', '4.5', 'Test'),
(21, 16, 'Male', 10, 'Year', 30, 'Year', '0', '18', 'Test'),
(25, 20, 'Male', 10, 'Days', 20, 'Year', '140', '190', 'test'),
(26, 20, 'Female', 10, 'Days', 20, 'Year', '1', '2', 'test'),
(27, 21, 'Male', 10, 'Days', 20, 'Year', '140', '190', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `lab_unit_master`
--

CREATE TABLE `lab_unit_master` (
  `unitId` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `unit` varchar(100) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_unit_master`
--

INSERT INTO `lab_unit_master` (`unitId`, `unit`, `createdat`) VALUES
(1, 'KETCHUP', '2021-07-19 08:16:26'),
(2, 'KGF', '2021-07-24 10:39:52'),
(3, 'Tablet', '2021-08-02 20:40:11'),
(4, 'Tablet', '2021-08-02 21:36:16'),
(5, 'TAB', '2021-08-02 21:41:21'),
(6, 'g/dl', '2021-08-13 14:37:27'),
(7, 'cumm', '2021-08-13 14:38:59'),
(8, '%', '2021-08-13 14:40:06'),
(9, 'lakhs/cumm', '2021-08-13 14:41:39'),
(10, 'pg/Ml', '2021-08-13 15:56:24');

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
(2, 'Emergency', 1, '2021-07-13 08:45:27'),
(3, 'Outsource Lab 1', 6, '2021-08-02 20:41:25'),
(4, 'Outsource Lab 1', 7, '2021-08-02 21:35:58');

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
(7, 1, 'Mrs', 'Mandira', 'Mathur', 'Female', '9685741425', '1998-01-10', 25, '09763602243', '', 'hulkt@avengers.com', 'San Diego,California', 'documents/2021_07_20_03203500000011.jpg', '2021-07-20 15:20:35', '2021-07-20 15:20:35'),
(8, 6, 'Mrs', 'Sansa', 'Stark', 'Female', '9685741425', '1998-10-10', 25, '09024634008', '', 'ada@ada.com', 'Nasik', 'documents/2021_08_02_08432100000011.jpg', '2021-08-02 20:43:21', '2021-08-02 20:43:21'),
(9, 7, 'Mrs', 'Sansa', 'Stark', 'Female', '9685741425', '1999-10-10', 25, '9657613754', '9885785885', 'sansa@gmail.com', 'RAHURI\r\nGOKUL COLONY RAHURI', 'documents/2021_08_02_09443000000011.jpg', '2021-08-02 21:44:30', '2021-08-02 21:44:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `case_report_data`
--
ALTER TABLE `case_report_data`
  ADD PRIMARY KEY (`case_report_id`);

--
-- Indexes for table `case_report_master`
--
ALTER TABLE `case_report_master`
  ADD PRIMARY KEY (`reportId`);

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
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `lab_center_categories`
--
ALTER TABLE `lab_center_categories`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `lab_tests`
--
ALTER TABLE `lab_tests`
  ADD PRIMARY KEY (`testId`);

--
-- Indexes for table `lab_tests_subtypes`
--
ALTER TABLE `lab_tests_subtypes`
  ADD PRIMARY KEY (`subtypeId`);

--
-- Indexes for table `lab_tests_subtypes_ranges`
--
ALTER TABLE `lab_tests_subtypes_ranges`
  ADD PRIMARY KEY (`rangeId`),
  ADD KEY `subtypeId` (`subtypeId`);

--
-- Indexes for table `lab_unit_master`
--
ALTER TABLE `lab_unit_master`
  ADD PRIMARY KEY (`unitId`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `case_master`
--
ALTER TABLE `case_master`
  MODIFY `caseId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `case_payments`
--
ALTER TABLE `case_payments`
  MODIFY `paymentId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `case_payment_transactions`
--
ALTER TABLE `case_payment_transactions`
  MODIFY `transactionId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `case_report_data`
--
ALTER TABLE `case_report_data`
  MODIFY `case_report_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `case_report_master`
--
ALTER TABLE `case_report_master`
  MODIFY `reportId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `case_tests`
--
ALTER TABLE `case_tests`
  MODIFY `case_test_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `center_details`
--
ALTER TABLE `center_details`
  MODIFY `centerId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `center_letter_head_details`
--
ALTER TABLE `center_letter_head_details`
  MODIFY `centerId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `center_outsource_test`
--
ALTER TABLE `center_outsource_test`
  MODIFY `outsourceId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `center_packages`
--
ALTER TABLE `center_packages`
  MODIFY `packageId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `center_package_details`
--
ALTER TABLE `center_package_details`
  MODIFY `detailId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `center_payment_details`
--
ALTER TABLE `center_payment_details`
  MODIFY `paymentId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `center_reference_master`
--
ALTER TABLE `center_reference_master`
  MODIFY `ref_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `center_test_master`
--
ALTER TABLE `center_test_master`
  MODIFY `testId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `center_test_subtypes`
--
ALTER TABLE `center_test_subtypes`
  MODIFY `subtypeId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `center_test_subtypes_ranges`
--
ALTER TABLE `center_test_subtypes_ranges`
  MODIFY `rangeId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `center_unit_master`
--
ALTER TABLE `center_unit_master`
  MODIFY `unitId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_registeration`
--
ALTER TABLE `customer_registeration`
  MODIFY `centerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lab_category`
--
ALTER TABLE `lab_category`
  MODIFY `categoryid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lab_center_categories`
--
ALTER TABLE `lab_center_categories`
  MODIFY `categoryid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lab_tests`
--
ALTER TABLE `lab_tests`
  MODIFY `testId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lab_tests_subtypes`
--
ALTER TABLE `lab_tests_subtypes`
  MODIFY `subtypeId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `lab_tests_subtypes_ranges`
--
ALTER TABLE `lab_tests_subtypes_ranges`
  MODIFY `rangeId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `outsource_lab`
--
ALTER TABLE `outsource_lab`
  MODIFY `outsource_lab_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient_master`
--
ALTER TABLE `patient_master`
  MODIFY `patientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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

--
-- Constraints for table `lab_tests_subtypes_ranges`
--
ALTER TABLE `lab_tests_subtypes_ranges`
  ADD CONSTRAINT `lab_tests_subtypes_ranges_ibfk_1` FOREIGN KEY (`subtypeId`) REFERENCES `lab_tests_subtypes` (`subtypeId`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
