-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2021 at 07:25 PM
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
(1, 1, 1, 1, 'Home', 'KEM', '2021-10-04 16:04:20', '2021-10-04 16:04:20'),
(2, 1, 1, 1, 'Home', 'PUNE', '2021-10-08 17:02:01', '2021-10-08 17:02:01'),
(3, 1, 1, 1, 'Home', 'KEM', '2021-10-11 10:39:11', '2021-10-11 10:39:11'),
(4, 1, 1, 1, 'Home', 'PUNE', '2021-10-11 10:41:05', '2021-10-11 10:41:05'),
(5, 1, 1, 1, 'Lab', 'PUNE', '2021-10-11 10:45:15', '2021-10-11 10:45:15');

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
  `discount` double(10,2) NOT NULL,
  `paymentmode` varchar(25) NOT NULL,
  `paymentdetails` varchar(55) DEFAULT NULL,
  `pending_amt` double(10,2) DEFAULT NULL,
  `paymentdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_payments`
--

INSERT INTO `case_payments` (`paymentId`, `caseId`, `centerId`, `patientId`, `total_amt`, `amt_recieved`, `discount`, `paymentmode`, `paymentdetails`, `pending_amt`, `paymentdate`) VALUES
(1, 1, 1, 1, 100.00, 100.00, 0.00, 'Cash', '', 0.00, '2021-10-04 00:00:00'),
(2, 2, 1, 1, 1200.00, 1000.00, 0.00, 'Cash', '', 200.00, '2021-10-08 00:00:00'),
(3, 3, 1, 1, 200.00, 210.00, 0.00, 'Cash', '', -10.00, '2021-10-11 00:00:00'),
(4, 4, 1, 1, 500.00, 200.00, 100.00, 'Cash', '', 0.00, '2021-10-11 00:00:00'),
(5, 5, 1, 1, 500.00, 200.00, 100.00, 'Cash', '', 200.00, '2021-10-11 00:00:00');

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
(1, 1, 50.00, '2021-10-04', 'Cash', 1, '2021-10-04 16:04:20', '2021-10-04 16:04:20'),
(2, 1, 50.00, '2021-10-04', 'Cash', 1, '2021-10-04 16:11:26', '2021-10-04 16:11:26'),
(3, 2, 500.00, '2021-10-08', 'Cash', 1, '2021-10-08 17:02:01', '2021-10-08 17:02:01'),
(4, 2, 500.00, '2021-10-08', 'Cash', 1, '2021-10-08 17:04:44', '2021-10-08 17:04:44'),
(5, 3, 50.00, '2021-10-11', 'Cash', 1, '2021-10-11 10:39:11', '2021-10-11 10:39:11'),
(6, 3, 100.00, '2021-10-11', 'Cash', 1, '2021-10-11 10:39:46', '2021-10-11 10:39:46'),
(7, 3, 60.00, '2021-10-11', 'Cash', 1, '2021-10-11 10:40:11', '2021-10-11 10:40:11'),
(8, 4, 200.00, '2021-10-11', 'Cash', 1, '2021-10-11 10:41:05', '2021-10-11 10:41:05'),
(9, 5, 200.00, '2021-10-11', 'Cash', 1, '2021-10-11 10:45:15', '2021-10-11 10:45:15');

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
  `label` varchar(255) NOT NULL,
  `isgroup` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `finding_details` text DEFAULT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_report_master`
--

INSERT INTO `case_report_master` (`reportId`, `caseId`, `patientId`, `casedate`, `centerId`, `finding_details`, `createdat`, `updatedat`) VALUES
(1, 2, 2, '2021-10-11 00:00:00', 1, NULL, '2021-10-11 16:53:05', '2021-10-11 16:53:05');

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
(2, 1, 1, 1),
(5, 2, 2, 1),
(6, 2, 3, 1),
(7, 2, 4, 1),
(10, 3, 3, 1),
(11, 4, 4, 1),
(12, 5, 4, 1);

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
(1, 'Testing Laboratory', '9657615475', 'johnabrahm@gmail.com', 'Test', 'Navi Mumbai', '413705', '2021-10-11 11:40:38', '2021-10-11 11:40:38');

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
(1, 1, 200.00, 1, 5, '2021-10-11 11:22:05', '2021-10-11 11:22:05');

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
(1, 'VIP Plan', 100.00, 10, 1, '2021-10-11 11:36:31', '2021-10-11 11:36:31'),
(2, 'Premimum', 200.00, 20, 1, '2021-10-11 12:16:55', '2021-10-11 12:16:55');

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
(1, 1, '10 Days'),
(2, 1, 'SMS Free'),
(3, 2, 'SMS Free'),
(4, 2, 'Whatsapp free');

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
(1, 1, 1, '2021-10-11', '2021-10-21', 'UPI', 'order_I7vO4H8ohRK851', '2021-10-11 11:37:39', '2021-10-11 11:37:39'),
(2, 1, 2, '2021-10-11', '2021-10-31', 'UPI', 'order_I7w4T6OYzZRTZI', '2021-10-11 12:17:51', '2021-10-11 12:17:51');

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
(1, 'Mr.', 'John Doe', 'MBBS', '09657613754', 'vikaspawar3110@gmail.com', 'RAHURI\r\nGOKUL COLONY RAHURI', 1, '2021-10-04 16:03:42', '2021-10-04 16:03:42');

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
(1, 1, 1, 0, '-', 0, 'Basophils'),
(2, 2, 1, 1, 'Test one Test', 1, 'BasophilsNurophils'),
(3, 2, 2, 1, 'Test one Test', 1, 'BasophilsNurophils'),
(4, 2, 3, 0, '-', 0, 'Entomology'),
(5, 3, 3, 0, '-', 0, 'Entomology'),
(6, 3, 1, 0, '-', 0, 'Basophils'),
(7, 4, 1, 0, '-', 0, 'Basophils'),
(8, 4, 2, 0, '-', 0, 'Nurophils'),
(9, 4, 3, 0, '-', 0, 'Entomology'),
(10, 5, 1, 0, '-', 0, 'Basophils');

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
  `desc_text` text DEFAULT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `center_test_master`
--

INSERT INTO `center_test_master` (`testId`, `categoryId`, `test_name`, `short_name`, `method`, `instrument`, `gender`, `fees`, `centerId`, `desc_text`, `createdat`, `updatedat`) VALUES
(1, 1, 'CBC WITH ESR', 'CBC', 'JEM', 'INST', 'Male', 100.00, 1, '\r\n                    ', '2021-10-04 16:01:59', '2021-10-04 16:01:59'),
(2, 2, 'Test One', 'TestOne', 'KET', 'KH', 'Male', 500.00, 1, '\r\n                    ', '2021-10-08 17:00:09', '2021-10-08 17:00:09'),
(3, 1, 'Test Two', 'TestTwo', 'KET', 'KH', 'Male', 200.00, 1, '\r\n                    ', '2021-10-08 17:01:25', '2021-10-08 17:01:25'),
(4, 2, 'Test Three', 'TestThree', 'KET', 'KH', 'Male', 500.00, 1, '\r\n                    ', '2021-10-08 17:04:15', '2021-10-08 17:04:15'),
(5, 1, 'CBC WITH ESR', 'TECH M', 'KET', 'KH', 'Male', 500.00, 1, '\r\n                    ', '2021-10-11 11:22:05', '2021-10-11 11:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `center_test_panel`
--

CREATE TABLE `center_test_panel` (
  `panelId` int(10) UNSIGNED NOT NULL,
  `centerId` int(10) UNSIGNED NOT NULL,
  `testName` varchar(155) NOT NULL,
  `unitId` int(10) UNSIGNED NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `center_test_panel`
--

INSERT INTO `center_test_panel` (`panelId`, `centerId`, `testName`, `unitId`, `createdat`, `updatedat`) VALUES
(1, 1, 'Basophils', 2, '2021-10-04 16:01:17', '2021-10-04 16:01:17'),
(2, 1, 'Nurophils', 2, '2021-10-08 16:57:46', '2021-10-08 16:57:46'),
(3, 1, 'Entomology', 1, '2021-10-08 16:58:33', '2021-10-08 16:58:33'),
(4, 1, 'Nurophils', 1, '2021-10-08 17:57:55', '2021-10-08 17:57:55');

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
(1, 2, 'Male', 10, 'Year', 20, 'Year', '10', '25', ''),
(2, 3, 'Male', 12, 'Year', 20, 'Year', '12', '12', '');

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
(1, 'GM', 1, '2021-10-04 16:00:10'),
(2, 'KG', 1, '2021-10-04 16:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `customer_registeration`
--

CREATE TABLE `customer_registeration` (
  `centerId` int(11) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `emailId` varchar(150) NOT NULL,
  `contact_number` varchar(10) NOT NULL,
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
(1, 'John Doe', 'john@gmail.com', '9657613754', '12345', 1, 0, 0, '2021-10-04 15:58:44', '2021-10-04 15:58:44');

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
(1, 'Physics', '2021-10-11 19:26:35', '2021-10-11 19:26:35'),
(2, 'Chemistry', '2021-10-11 19:26:35', '2021-10-11 19:26:35'),
(3, 'Biochemistry', '2021-10-11 19:35:20', '2021-10-11 19:35:20');

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
(1, 'Physics', 1, '2021-10-11 19:34:07', '2021-10-11 19:34:07'),
(2, 'Chemistry', 1, '2021-10-11 19:34:07', '2021-10-11 19:34:07'),
(4, 'Heamotology', 1, '2021-10-11 19:34:53', '2021-10-11 19:34:53'),
(5, 'Biochemistry', 1, '2021-10-11 19:35:29', '2021-10-11 19:35:29');

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
  `desc_text` text NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `lab_test_group_panel`
--

CREATE TABLE `lab_test_group_panel` (
  `groupId` int(10) UNSIGNED NOT NULL,
  `testId` int(10) UNSIGNED NOT NULL,
  `panelId` int(10) UNSIGNED NOT NULL,
  `isgroup` tinyint(1) NOT NULL,
  `label` varchar(155) DEFAULT NULL,
  `flag_sequence` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `jsid` varchar(50) NOT NULL COMMENT 'for front end purpose for edit test'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_test_group_panel`
--

INSERT INTO `lab_test_group_panel` (`groupId`, `testId`, `panelId`, `isgroup`, `label`, `flag_sequence`, `jsid`) VALUES
(1, 1, 1, 0, '-', 0, 'Basophils'),
(2, 2, 1, 1, 'Test one Test', 1, 'BasophilsNurophils'),
(3, 2, 2, 1, 'Test one Test', 1, 'BasophilsNurophils'),
(4, 2, 3, 0, '-', 0, 'Entomology'),
(5, 3, 3, 0, '-', 0, 'Entomology'),
(6, 3, 1, 0, '-', 0, 'Basophils'),
(7, 4, 1, 0, '-', 0, 'Basophils'),
(8, 4, 2, 0, '-', 0, 'Nurophils'),
(9, 4, 3, 0, '-', 0, 'Entomology'),
(10, 5, 1, 0, '-', 0, 'Basophils');

-- --------------------------------------------------------

--
-- Table structure for table `lab_test_panel`
--

CREATE TABLE `lab_test_panel` (
  `panelId` int(10) UNSIGNED NOT NULL,
  `testName` varchar(155) NOT NULL,
  `unitId` int(10) UNSIGNED NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_test_panel`
--

INSERT INTO `lab_test_panel` (`panelId`, `testName`, `unitId`, `createdat`, `updatedat`) VALUES
(1, 'Basophils', 2, '2021-10-04 16:01:17', '2021-10-04 16:01:17'),
(2, 'Nurophils', 2, '2021-10-08 16:57:46', '2021-10-08 16:57:46'),
(3, 'Entomology', 1, '2021-10-08 16:58:33', '2021-10-08 16:58:33'),
(4, 'Nurophils', 1, '2021-10-08 17:57:55', '2021-10-08 17:57:55'),
(5, 'TEST', 1, '2021-10-11 20:37:34', '2021-10-11 20:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `lab_unit_master`
--

CREATE TABLE `lab_unit_master` (
  `unitId` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `unit` varchar(100) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Outsource Lab 1', 1, '2021-10-11 11:21:47');

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
(1, 1, 'Mr', 'Ema', 'Watson', 'Female', '343063675839', '2003-02-04', 18, '9657613754', '', 'amol.pawar@tkinfotech.com', 'RAHURI\r\nGOKUL COLONY RAHURI', NULL, '2021-10-04 16:03:19', '2021-10-04 16:03:19');

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
-- Indexes for table `center_test_group_panel`
--
ALTER TABLE `center_test_group_panel`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `center_test_master`
--
ALTER TABLE `center_test_master`
  ADD PRIMARY KEY (`testId`);

--
-- Indexes for table `center_test_panel`
--
ALTER TABLE `center_test_panel`
  ADD PRIMARY KEY (`panelId`);

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
  ADD KEY `subtypeId` (`subtypeId`);

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
-- Indexes for table `lab_test_group_panel`
--
ALTER TABLE `lab_test_group_panel`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `lab_test_panel`
--
ALTER TABLE `lab_test_panel`
  ADD PRIMARY KEY (`panelId`);

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
  MODIFY `caseId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `case_payments`
--
ALTER TABLE `case_payments`
  MODIFY `paymentId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `case_payment_transactions`
--
ALTER TABLE `case_payment_transactions`
  MODIFY `transactionId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `case_report_data`
--
ALTER TABLE `case_report_data`
  MODIFY `case_report_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `case_report_master`
--
ALTER TABLE `case_report_master`
  MODIFY `reportId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `case_tests`
--
ALTER TABLE `case_tests`
  MODIFY `case_test_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `center_details`
--
ALTER TABLE `center_details`
  MODIFY `centerId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `center_letter_head_details`
--
ALTER TABLE `center_letter_head_details`
  MODIFY `centerId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `center_outsource_test`
--
ALTER TABLE `center_outsource_test`
  MODIFY `outsourceId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `center_packages`
--
ALTER TABLE `center_packages`
  MODIFY `packageId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `center_package_details`
--
ALTER TABLE `center_package_details`
  MODIFY `detailId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `center_payment_details`
--
ALTER TABLE `center_payment_details`
  MODIFY `paymentId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `center_reference_master`
--
ALTER TABLE `center_reference_master`
  MODIFY `ref_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `center_test_group_panel`
--
ALTER TABLE `center_test_group_panel`
  MODIFY `groupId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `center_test_master`
--
ALTER TABLE `center_test_master`
  MODIFY `testId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `center_test_panel`
--
ALTER TABLE `center_test_panel`
  MODIFY `panelId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `center_test_subtypes`
--
ALTER TABLE `center_test_subtypes`
  MODIFY `subtypeId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `center_test_subtypes_ranges`
--
ALTER TABLE `center_test_subtypes_ranges`
  MODIFY `rangeId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `center_unit_master`
--
ALTER TABLE `center_unit_master`
  MODIFY `unitId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_registeration`
--
ALTER TABLE `customer_registeration`
  MODIFY `centerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lab_category`
--
ALTER TABLE `lab_category`
  MODIFY `categoryid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lab_center_categories`
--
ALTER TABLE `lab_center_categories`
  MODIFY `categoryid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lab_tests`
--
ALTER TABLE `lab_tests`
  MODIFY `testId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_tests_subtypes`
--
ALTER TABLE `lab_tests_subtypes`
  MODIFY `subtypeId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_tests_subtypes_ranges`
--
ALTER TABLE `lab_tests_subtypes_ranges`
  MODIFY `rangeId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lab_test_group_panel`
--
ALTER TABLE `lab_test_group_panel`
  MODIFY `groupId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lab_test_panel`
--
ALTER TABLE `lab_test_panel`
  MODIFY `panelId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `outsource_lab`
--
ALTER TABLE `outsource_lab`
  MODIFY `outsource_lab_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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

--
-- Constraints for table `center_test_subtypes_ranges`
--
ALTER TABLE `center_test_subtypes_ranges`
  ADD CONSTRAINT `center_test_subtypes_ranges_ibfk_1` FOREIGN KEY (`subtypeId`) REFERENCES `center_test_panel` (`panelId`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
