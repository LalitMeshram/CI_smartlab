-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2021 at 12:17 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `copydata` (IN `centerId` INT)  BEGIN


INSERT INTO lab_center_categories (category,centerId)
SELECT category,centerId
FROM lab_category A
WHERE NOT EXISTS (
          SELECT category
          FROM lab_center_categories B
          WHERE A.category = B.category AND B.centerId = centerId
     );


INSERT INTO center_unit_master (unit,centerId)
SELECT unit,centerId
FROM lab_unit_master A
WHERE NOT EXISTS (
          SELECT unit
          FROM center_unit_master B
          WHERE A.unit = B.unit AND B.centerId = centerId
     );

COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `copyunit` (IN `centerId` INT)  BEGIN
INSERT INTO center_reference_master(ref_title,ref_name,centerId) VALUES('','SELF',centerId);
COMMIT;
END$$

DELIMITER ;

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
(1, 1, 1, 1, 'Home', 'KEM', '2021-10-30 18:36:52', '2021-10-30 18:36:52'),
(2, 1, 1, 1, 'Home', 'PUNE', '2021-10-30 18:44:06', '2021-10-30 18:44:06'),
(3, 1, 1, 1, 'Home', 'KEM', '2021-10-30 18:51:09', '2021-10-30 18:51:09'),
(4, 1, 1, 1, 'Home', 'KEM', '2021-10-30 21:11:10', '2021-10-30 21:11:10'),
(5, 1, 1, 1, 'Home', 'KEM', '2021-10-30 21:12:55', '2021-10-30 21:12:55'),
(6, 1, 1, 1, 'Home', 'KEM', '2021-10-30 21:15:07', '2021-10-30 21:15:07'),
(7, 1, 1, 1, 'Lab', 'KEM', '2021-11-01 15:18:03', '2021-11-01 15:18:03'),
(8, 1, 1, 1, 'Home', 'KEM', '2021-11-01 15:36:56', '2021-11-01 15:36:56');

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
(1, 1, 1, 1, 500.00, 200.00, 100.00, 'Cash', '', 200.00, '2021-10-30 00:00:00'),
(2, 2, 1, 1, 500.00, 0.00, 0.00, 'Cash', '', 500.00, '2021-10-30 00:00:00'),
(3, 3, 1, 1, 700.00, 700.00, 0.00, 'Cash', '', 0.00, '2021-10-30 00:00:00'),
(4, 4, 1, 1, 700.00, 500.00, 0.00, 'Cash', '', 200.00, '2021-10-30 00:00:00'),
(5, 5, 1, 1, 200.00, 200.00, 0.00, 'Cash', '', 0.00, '2021-10-30 00:00:00'),
(6, 6, 1, 1, 500.00, 700.00, 0.00, 'Cash', '', -200.00, '2021-10-30 00:00:00'),
(7, 7, 1, 1, 700.00, 200.00, 0.00, 'Cash', '', 500.00, '2021-11-01 00:00:00'),
(8, 8, 1, 1, 500.00, 500.00, 0.00, 'Cash', '', 0.00, '2021-11-01 00:00:00');

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
(1, 1, 200.00, '2021-10-30', 'Cash', 1, '2021-10-30 18:36:52', '2021-10-30 18:36:52'),
(2, 2, 0.00, '2021-10-30', 'Cash', 1, '2021-10-30 18:44:06', '2021-10-30 18:44:06'),
(3, 3, 700.00, '2021-10-30', 'Cash', 1, '2021-10-30 18:51:09', '2021-10-30 18:51:09'),
(4, 3, 0.00, '2021-10-30', 'Cash', 1, '2021-10-30 18:52:24', '2021-10-30 18:52:24'),
(5, 3, 0.00, '2021-10-30', 'Cash', 1, '2021-10-30 18:56:40', '2021-10-30 18:56:40'),
(6, 4, 500.00, '2021-10-30', 'Cash', 1, '2021-10-30 21:11:37', '2021-10-30 21:11:37'),
(7, 4, 0.00, '2021-10-30', 'Cash', 1, '2021-10-30 21:11:55', '2021-10-30 21:11:55'),
(8, 5, 200.00, '2021-10-30', 'Cash', 1, '2021-10-30 21:12:55', '2021-10-30 21:12:55'),
(9, 5, 0.00, '2021-10-30', 'Cash', 1, '2021-10-30 21:13:31', '2021-10-30 21:13:31'),
(10, 6, 200.00, '2021-10-30', 'Cash', 1, '2021-10-30 21:15:07', '2021-10-30 21:15:07'),
(11, 6, 500.00, '2021-10-30', 'Cash', 1, '2021-10-30 21:16:21', '2021-10-30 21:16:21'),
(12, 7, 200.00, '2021-11-01', 'Cash', 1, '2021-11-01 15:18:03', '2021-11-01 15:18:03'),
(13, 8, 500.00, '2021-11-01', 'Cash', 1, '2021-11-01 15:36:56', '2021-11-01 15:36:56');

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
  `isgroup` int(11) DEFAULT NULL,
  `level` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_report_data`
--

INSERT INTO `case_report_data` (`case_report_id`, `reportId`, `parameterId`, `parameter`, `testId`, `testName`, `finding_value`, `categoryid`, `category`, `unit`, `reference_value`, `label`, `isgroup`, `level`) VALUES
(1, 1, 2, 'Basophils', 1, 'CBC WITH ESR', '11', 1, 'HAEMATOLOGY', 'lakhs/cumm', '10-40', 'Check', 1, 'N'),
(2, 1, 3, 'Entomology', 1, 'CBC WITH ESR', '41', 1, 'HAEMATOLOGY', '', '10-40', 'Check', 1, 'H'),
(3, 2, 2, 'Basophils', 1, 'CBC WITH ESR', '11', 1, 'HAEMATOLOGY', 'lakhs/cumm', '10-40', 'Check', 1, 'N'),
(4, 2, 3, 'Entomology', 1, 'CBC WITH ESR', '41', 1, 'HAEMATOLOGY', '', '10-40', 'Check', 1, 'H'),
(5, 2, 2, 'Basophils', 2, 'Platelet Count ', '9', 2, 'BIOCHEMISTRY', 'lakhs/cumm', '10-40', '-', 0, 'L'),
(6, 3, 2, 'Basophils', 1, 'CBC WITH ESR', '11', 1, 'HAEMATOLOGY', 'lakhs/cumm', '10-40', 'Check', 1, 'N'),
(7, 3, 3, 'Entomology', 1, 'CBC WITH ESR', '41', 1, 'HAEMATOLOGY', '', '10-40', 'Check', 1, 'H'),
(8, 4, 4, 'RangeCheck', 3, 'Calcitonin', '18', 2, 'BIOCHEMISTRY', 'g/dl', '12-24', '-', 0, 'N'),
(9, 4, 5, 'Platelate count', 3, 'Calcitonin', '1', 2, 'BIOCHEMISTRY', 'g/dl', '0-0', '-', 0, 'H');

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
(1, 1, 2, '2021-10-30 00:00:00', 1, NULL, '2021-10-30 18:39:00', '2021-10-30 18:39:00'),
(2, 3, 2, '2021-10-30 00:00:00', 1, NULL, '2021-10-30 18:59:24', '2021-10-30 18:59:24'),
(3, 2, 2, '2021-10-30 00:00:00', 1, NULL, '2021-10-30 19:05:14', '2021-10-30 19:05:14'),
(4, 8, 2, '2021-11-01 00:00:00', 1, NULL, '2021-11-01 15:38:06', '2021-11-01 15:38:06');

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
(2, 2, 1, 1),
(6, 3, 1, 1),
(7, 3, 2, 1),
(9, 4, 1, 1),
(10, 4, 2, 1),
(13, 5, 2, 1),
(19, 6, 1, 1),
(20, 7, 2, 1),
(21, 7, 1, 1),
(22, 8, 3, 1);

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
(1, 'TEST', 'BRAND', '', 'johnabrahm@gmail.com', 'Test', 'Navi Mumbai', '413705', '2021-10-30 18:32:48', '2021-10-30 18:32:48');

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
(1, 'documents/2021_10_30_063325000000.jpeg', '', '', 'John', 'MCA', 'Rock', 'MBBS', 'documents/2021_10_30_063325000000.jpeg', '2021-10-30 18:33:25', '2021-10-30 18:33:25');

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
(1, 1, 1, '2021-10-30', '2021-11-09', 'UPI', 'order_IFYawsXirISIiU', '2021-10-30 18:31:53', '2021-10-30 18:31:53');

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
(1, '', 'SELF', NULL, '', NULL, NULL, 1, '2021-10-30 18:31:21', '2021-10-30 18:31:21');

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
(1, 1, 2, 1, 'Check', 1, 'BasophilsEntomology'),
(2, 1, 3, 1, 'Check', 1, 'BasophilsEntomology'),
(3, 2, 2, 0, '-', 0, 'Basophils'),
(4, 3, 4, 0, '-', 0, 'RangeCheck'),
(5, 3, 5, 0, '-', 0, 'Platelatecount');

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
(1, 1, 'CBC WITH ESR', 'CBC', 'KET', 'KH', 'All', 500.00, 1, '<p>Test</p>\n', '2021-10-30 18:31:21', '2021-10-30 18:31:21'),
(2, 2, 'Platelet Count ', 'Calcitonin', 'KET', 'KH', 'Male', 200.00, 1, '', '2021-10-30 18:50:38', '2021-10-30 18:50:38'),
(3, 2, 'Calcitonin', 'Tab1', 'KET', 'KH', 'Male', 500.00, 1, '', '2021-11-01 15:36:33', '2021-11-01 15:36:33');

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
(1, 1, 'Nurophils', 2, '2021-10-30 18:31:21', '2021-10-30 18:31:21'),
(2, 1, 'Basophils', 3, '2021-10-30 18:31:21', '2021-10-30 18:31:21'),
(3, 1, 'Entomology', 5, '2021-10-30 18:31:21', '2021-10-30 18:31:21'),
(4, 1, 'RangeCheck', 1, '2021-10-30 21:42:03', '2021-10-30 21:42:03'),
(5, 1, 'Platelate count', 1, '2021-10-31 18:11:35', '2021-10-31 18:11:35');

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
  `gender` enum('Male','Female','Other','All') NOT NULL,
  `lower_age` int(11) DEFAULT NULL,
  `lower_age_period` varchar(20) NOT NULL,
  `upper_age` int(11) DEFAULT NULL,
  `upper_age_period` varchar(14) NOT NULL,
  `lower_limit` varchar(50) DEFAULT NULL,
  `upper_limit` varchar(50) DEFAULT NULL,
  `words` varchar(255) DEFAULT NULL,
  `lower_duration` varchar(100) DEFAULT NULL,
  `upper_duration` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `center_test_subtypes_ranges`
--

INSERT INTO `center_test_subtypes_ranges` (`rangeId`, `subtypeId`, `gender`, `lower_age`, `lower_age_period`, `upper_age`, `upper_age_period`, `lower_limit`, `upper_limit`, `words`, `lower_duration`, `upper_duration`) VALUES
(1, 1, 'Male', 10, 'Days', 20, 'Days', '20', '50', 'Test', NULL, NULL),
(2, 3, 'All', 10, 'Days', 20, 'Days', '10', '25', 'Test', '10', '25'),
(3, 3, 'All', 1, 'Month', 12, 'Month', '24', '98', '', '60', '120'),
(7, 4, 'All', 1, 'Days', 2, 'Month', '12', '24', '', '1', '60'),
(8, 4, 'All', 2, 'Month', 2, 'Year', '23', '95', '', '60', '730'),
(9, 4, 'All', 2, 'Year', 5, 'Year', '89', '987', '', '730', '1825'),
(10, 4, 'All', 10, 'Days', 90, 'Days', '1', '4', '', '10', '90');

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
(1, 'g/dl', 1, '2021-10-30 18:33:54'),
(2, '%', 1, '2021-10-30 18:33:54'),
(3, 'lakhs/cumm', 1, '2021-10-30 18:33:54'),
(4, 'Tablet', 1, '2021-10-30 18:33:54'),
(5, '', 1, '2021-10-30 18:33:54'),
(6, 'test', 1, '2021-10-30 18:33:54');

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
(1, 'John Smith', 'johnsmith@gmail.com', '9881652726', '12345', 1, 0, 0, '2021-10-30 18:31:21', '2021-10-30 18:31:21');

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
(1, 'HAEMATOLOGY', '2021-10-30 18:23:25', '2021-10-30 18:23:25'),
(2, 'BIOCHEMISTRY', '2021-10-30 18:23:32', '2021-10-30 18:23:32');

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
(1, 'HAEMATOLOGY', 1, '2021-10-30 18:33:54', '2021-10-30 18:33:54'),
(2, 'BIOCHEMISTRY', 1, '2021-10-30 18:33:54', '2021-10-30 18:33:54');

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

--
-- Dumping data for table `lab_tests`
--

INSERT INTO `lab_tests` (`testId`, `categoryId`, `test_name`, `short_name`, `method`, `instrument`, `gender`, `fees`, `desc_text`, `createdat`, `updatedat`) VALUES
(1, 1, 'CBC WITH ESR', 'CBC', 'KET', 'KH', 'All', 500.00, '<p>Test</p>\n', '2021-10-30 18:30:41', '2021-10-30 18:30:41');

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
  `gender` enum('Male','Female','Other','All') NOT NULL,
  `lower_age` int(11) DEFAULT NULL,
  `lower_age_period` varchar(20) NOT NULL,
  `upper_age` int(11) DEFAULT NULL,
  `upper_age_period` varchar(14) NOT NULL,
  `lower_limit` varchar(50) DEFAULT NULL,
  `upper_limit` varchar(50) DEFAULT NULL,
  `words` varchar(255) DEFAULT NULL,
  `lower_duration` varchar(100) DEFAULT NULL,
  `upper_duration` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_tests_subtypes_ranges`
--

INSERT INTO `lab_tests_subtypes_ranges` (`rangeId`, `subtypeId`, `gender`, `lower_age`, `lower_age_period`, `upper_age`, `upper_age_period`, `lower_limit`, `upper_limit`, `words`, `lower_duration`, `upper_duration`) VALUES
(1, 1, 'Male', 10, 'Days', 20, 'Days', '20', '50', 'Test', NULL, NULL),
(2, 3, 'All', 10, 'Days', 20, 'Days', '10', '25', 'Test', NULL, NULL),
(3, 3, 'All', 1, 'Month', 12, 'Month', '24', '98', '', NULL, NULL),
(6, 4, 'All', 1, 'Days', 2, 'Month', '12', '24', '', '1', '60'),
(7, 4, 'All', 2, 'Month', 2, 'Year', '23', '95', '', '60', '730'),
(8, 4, 'All', 2, 'Year', 5, 'Year', '89', '987', '', '730', '1825');

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
(1, 1, 2, 1, 'Check', 1, 'BasophilsEntomology'),
(2, 1, 3, 1, 'Check', 1, 'BasophilsEntomology');

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
(1, 'Nurophils', 2, '2021-10-30 18:24:57', '2021-10-30 18:24:57'),
(2, 'Basophils', 3, '2021-10-30 18:26:51', '2021-10-30 18:26:51'),
(3, 'Entomology', 5, '2021-10-30 18:29:18', '2021-10-30 18:29:18'),
(4, 'RangeCheck', 1, '2021-10-30 21:36:29', '2021-10-30 21:36:29');

-- --------------------------------------------------------

--
-- Table structure for table `lab_unit_master`
--

CREATE TABLE `lab_unit_master` (
  `unitId` int(10) UNSIGNED NOT NULL,
  `unit` varchar(100) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_unit_master`
--

INSERT INTO `lab_unit_master` (`unitId`, `unit`, `createdat`) VALUES
(1, 'g/dl', '2021-10-30 18:23:48'),
(2, '%', '2021-10-30 18:23:55'),
(3, 'lakhs/cumm', '2021-10-30 18:24:02'),
(4, 'Tablet', '2021-10-30 18:24:10'),
(5, '', '2021-10-30 18:27:12'),
(6, 'test', '2021-10-30 18:27:25');

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
(1, 1, 'Mr', 'Ema', 'Watson', 'Female', '9685741425', '2021-10-01', 23, '9024634008', '9885785885', 'johnabrahm@gmail.com', 'Ashok Stambh Near Poloce station Nasik Road Nasik', NULL, '2021-10-30 18:35:53', '2021-11-01 15:34:27');

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
  MODIFY `caseId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `case_payments`
--
ALTER TABLE `case_payments`
  MODIFY `paymentId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `case_payment_transactions`
--
ALTER TABLE `case_payment_transactions`
  MODIFY `transactionId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `case_report_data`
--
ALTER TABLE `case_report_data`
  MODIFY `case_report_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `case_report_master`
--
ALTER TABLE `case_report_master`
  MODIFY `reportId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `case_tests`
--
ALTER TABLE `case_tests`
  MODIFY `case_test_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `outsourceId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `paymentId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `center_reference_master`
--
ALTER TABLE `center_reference_master`
  MODIFY `ref_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `center_test_group_panel`
--
ALTER TABLE `center_test_group_panel`
  MODIFY `groupId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `center_test_master`
--
ALTER TABLE `center_test_master`
  MODIFY `testId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `center_test_panel`
--
ALTER TABLE `center_test_panel`
  MODIFY `panelId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `center_test_subtypes`
--
ALTER TABLE `center_test_subtypes`
  MODIFY `subtypeId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `center_test_subtypes_ranges`
--
ALTER TABLE `center_test_subtypes_ranges`
  MODIFY `rangeId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `center_unit_master`
--
ALTER TABLE `center_unit_master`
  MODIFY `unitId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_registeration`
--
ALTER TABLE `customer_registeration`
  MODIFY `centerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lab_category`
--
ALTER TABLE `lab_category`
  MODIFY `categoryid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lab_center_categories`
--
ALTER TABLE `lab_center_categories`
  MODIFY `categoryid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lab_tests`
--
ALTER TABLE `lab_tests`
  MODIFY `testId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lab_tests_subtypes`
--
ALTER TABLE `lab_tests_subtypes`
  MODIFY `subtypeId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_tests_subtypes_ranges`
--
ALTER TABLE `lab_tests_subtypes_ranges`
  MODIFY `rangeId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lab_test_group_panel`
--
ALTER TABLE `lab_test_group_panel`
  MODIFY `groupId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lab_test_panel`
--
ALTER TABLE `lab_test_panel`
  MODIFY `panelId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lab_unit_master`
--
ALTER TABLE `lab_unit_master`
  MODIFY `unitId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `outsource_lab`
--
ALTER TABLE `outsource_lab`
  MODIFY `outsource_lab_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
