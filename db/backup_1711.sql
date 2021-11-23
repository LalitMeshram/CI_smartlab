-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2021 at 01:00 PM
-- Server version: 10.2.37-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartlab_uat`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`smartlab`@`localhost` PROCEDURE `copydata` (IN `centerId` INT)  BEGIN


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

CREATE DEFINER=`smartlab`@`localhost` PROCEDURE `copyunit` (IN `centerId` INT)  BEGIN
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
(1, 1, 1, 1, 'Home', 'LAB', '2021-11-14 06:01:20', '2021-11-14 06:01:20'),
(2, 4, 2, 3, 'Home', 'LAB', '2021-11-15 14:47:12', '2021-11-15 14:47:12'),
(3, 1, 3, 1, 'Home', 'LAB', '2021-11-15 16:07:58', '2021-11-15 16:07:58'),
(4, 1, 3, 1, 'Home', 'LAB', '2021-11-16 14:27:23', '2021-11-16 14:27:23');

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
(1, 1, 1, 1, 250.00, 0.00, 0.00, 'Cash', '', 250.00, '2021-11-14 00:00:00'),
(2, 2, 4, 2, 1540.00, 1540.00, 0.00, 'Cash', '', 0.00, '2021-11-15 00:00:00'),
(3, 3, 1, 3, 3540.00, 0.00, 0.00, 'Cash', '', 3540.00, '2021-11-15 00:00:00'),
(4, 4, 1, 3, 3540.00, 0.00, 0.00, 'Cash', '', 3540.00, '2021-11-16 00:00:00');

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
(1, 2, 1540.00, '2021-11-15', 'Cash', 1, '2021-11-15 14:47:12', '2021-11-15 14:47:12');

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
  `level` varchar(5) DEFAULT NULL,
  `test_desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_report_data`
--

INSERT INTO `case_report_data` (`case_report_id`, `reportId`, `parameterId`, `parameter`, `testId`, `testName`, `finding_value`, `categoryid`, `category`, `unit`, `reference_value`, `label`, `isgroup`, `level`, `test_desc`) VALUES
(1, 1, 1, 'Hemoglobin', 1, 'Complete Blood Count', '10.2', 1, 'Heamatology', 'g/dl', '13.0-18.0', '-', 0, 'L', ''),
(2, 1, 2, 'WBC ', 1, 'Complete Blood Count', '14000', 1, 'Heamatology', 'cumm', '4000-11000', '-', 0, 'H', ''),
(3, 1, 3, 'Neutrophils', 1, 'Complete Blood Count', '54', 1, 'Heamatology', 'g/dl', '40-70', 'Differential Leucocyte Count', 1, 'N', ''),
(4, 1, 4, 'Eosinophils', 1, 'Complete Blood Count', '12', 1, 'Heamatology', '%', '1-6', 'Differential Leucocyte Count', 1, 'H', ''),
(5, 1, 5, 'Monocytes', 1, 'Complete Blood Count', '12', 1, 'Heamatology', '%', '2-10', 'Differential Leucocyte Count', 1, 'H', ''),
(6, 1, 6, 'Basophils', 1, 'Complete Blood Count', '00', 1, 'Heamatology', '%', '0-1', 'Differential Leucocyte Count', 1, 'N', ''),
(7, 1, 13, 'Lymphocytes', 1, 'Complete Blood Count', '45', 1, 'Heamatology', '%', '20-40', 'Differential Leucocyte Count', 1, 'H', ''),
(8, 1, 7, 'Platelet Count', 1, 'Complete Blood Count', '1.56', 1, 'Heamatology', 'lakhs/cumm', '1.5-4.5', '-', 0, 'N', ''),
(9, 1, 8, 'Total RBC Count', 1, 'Complete Blood Count', '4.25', 1, 'Heamatology', 'million/cumm', '4.0-5.5', '-', 0, 'N', ''),
(10, 1, 9, 'Hematocrit Value ( HCT )', 1, 'Complete Blood Count', '32.5', 1, 'Heamatology', '%', '0-0', '-', 0, 'H', ''),
(11, 1, 10, 'Mean Corpuscular Volume ( MCV )', 1, 'Complete Blood Count', '24', 1, 'Heamatology', 'fL', '83-101', '-', 0, 'L', ''),
(12, 1, 11, 'Mean Cell Haemoglobin ( MCH )', 1, 'Complete Blood Count', '35', 1, 'Heamatology', 'Pg', '27-32', '-', 0, 'H', ''),
(13, 1, 12, 'Mean Cell Haemoglobin CON ( MCHC )', 1, 'Complete Blood Count', '36', 1, 'Heamatology', '%', '31.5-34.5', '-', 0, 'H', '');

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
(1, 1, 2, '2021-11-14 00:00:00', 1, NULL, '2021-11-14 06:03:24', '2021-11-14 06:03:24');

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
(2, 2, 2, 4),
(3, 2, 13, 4),
(4, 2, 14, 4),
(5, 2, 15, 4),
(6, 2, 16, 4),
(7, 2, 17, 4),
(8, 2, 18, 4),
(9, 2, 19, 4),
(10, 2, 20, 4),
(11, 2, 21, 4),
(12, 2, 22, 4),
(13, 3, 1, 1),
(14, 3, 3, 1),
(15, 3, 4, 1),
(16, 3, 5, 1),
(17, 3, 6, 1),
(18, 3, 7, 1),
(19, 3, 8, 1),
(20, 3, 9, 1),
(21, 3, 10, 1),
(22, 3, 11, 1),
(23, 3, 12, 1),
(24, 3, 23, 1),
(25, 3, 24, 1),
(26, 3, 25, 1),
(27, 3, 26, 1),
(28, 3, 27, 1),
(29, 3, 28, 1),
(30, 3, 29, 1),
(32, 4, 1, 1),
(33, 4, 3, 1),
(34, 4, 4, 1),
(35, 4, 5, 1),
(36, 4, 6, 1),
(37, 4, 7, 1),
(38, 4, 8, 1),
(39, 4, 9, 1),
(40, 4, 10, 1),
(41, 4, 11, 1),
(42, 4, 12, 1),
(43, 4, 23, 1),
(44, 4, 24, 1),
(45, 4, 25, 1),
(46, 4, 26, 1),
(47, 4, 27, 1),
(48, 4, 28, 1),
(49, 4, 29, 1);

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
(1, '3 MONTH ', 2000.00, 90, 1, '2021-11-15 15:29:22', '2021-11-15 15:29:22');

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
(1, 1, 'option 1'),
(2, 1, 'option 2'),
(3, 1, 'option 3');

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
(1, 1, 1, '2021-11-15', '2022-02-13', 'UPI', 'order_ILvh0GninmwS6d', '2021-11-15 15:34:35', '2021-11-15 15:34:35');

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
(1, '', 'SELF', NULL, '', NULL, NULL, 1, '2021-11-13 08:50:20', '2021-11-13 08:50:20'),
(2, '', 'SELF', NULL, '', NULL, NULL, 3, '2021-11-14 05:25:02', '2021-11-14 05:25:02'),
(3, '', 'SELF', NULL, '', NULL, NULL, 4, '2021-11-14 05:27:34', '2021-11-14 05:27:34'),
(4, '', 'SELF', NULL, '', NULL, NULL, 5, '2021-11-14 05:31:17', '2021-11-14 05:31:17');

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
(1, 1, 1, 0, '-', 0, 'Hemoglobin'),
(2, 1, 2, 0, '-', 0, 'WBC'),
(3, 1, 3, 1, 'Differential Leucocyte Count', 3, 'NeutrophilsEosinophilsMonocytesBasophilsLymphocyte'),
(4, 1, 4, 1, 'Differential Leucocyte Count', 3, 'NeutrophilsEosinophilsMonocytesBasophilsLymphocyte'),
(5, 1, 5, 1, 'Differential Leucocyte Count', 3, 'NeutrophilsEosinophilsMonocytesBasophilsLymphocyte'),
(6, 1, 6, 1, 'Differential Leucocyte Count', 3, 'NeutrophilsEosinophilsMonocytesBasophilsLymphocyte'),
(7, 1, 13, 1, 'Differential Leucocyte Count', 3, 'NeutrophilsEosinophilsMonocytesBasophilsLymphocyte'),
(8, 1, 7, 0, '-', 0, 'PlateletCount'),
(9, 1, 8, 0, '-', 0, 'TotalRBCCount'),
(10, 1, 9, 0, '-', 0, 'HematocritValue_HCT_'),
(11, 1, 10, 0, '-', 0, 'MeanCorpuscularVolume_MCV_'),
(12, 1, 11, 0, '-', 0, 'MeanCellHaemoglobin_MCH_'),
(13, 1, 12, 0, '-', 0, 'MeanCellHaemoglobinCON_MCHC_'),
(14, 2, 1, 0, '-', 0, 'Hemoglobin'),
(15, 2, 2, 0, '-', 0, 'WhiteBloodCells_WBC_'),
(16, 2, 3, 1, 'Differential Leucocyte Count', 3, 'NeutrophilsLymphocytesEosinophilsMonocytesBasophil'),
(17, 2, 4, 1, 'Differential Leucocyte Count', 3, 'NeutrophilsLymphocytesEosinophilsMonocytesBasophil'),
(18, 2, 5, 1, 'Differential Leucocyte Count', 3, 'NeutrophilsLymphocytesEosinophilsMonocytesBasophil'),
(19, 2, 6, 1, 'Differential Leucocyte Count', 3, 'NeutrophilsLymphocytesEosinophilsMonocytesBasophil'),
(20, 2, 7, 1, 'Differential Leucocyte Count', 3, 'NeutrophilsLymphocytesEosinophilsMonocytesBasophil'),
(21, 2, 8, 0, '-', 0, 'PlateletCount'),
(22, 2, 9, 0, '-', 0, 'TotalRBCCount'),
(23, 2, 10, 0, '-', 0, 'HematocritValue_HCT_'),
(24, 2, 11, 0, '-', 0, 'MeanCorpuscularVolume_MCV_'),
(25, 2, 12, 0, '-', 0, 'MeanCellHaemoglobin_MCH_'),
(26, 2, 13, 0, '-', 0, 'MeanCellHaemoglobinCON_MCHC_'),
(27, 2, 14, 0, '-', 0, 'MeanPlateletVolume_MPV_'),
(28, 2, 15, 0, '-', 0, 'RDW-SD'),
(29, 2, 16, 0, '-', 0, 'RDW-CV'),
(30, 2, 19, 0, '-', 0, 'PCT'),
(31, 2, 17, 0, '-', 0, 'P-LCR'),
(32, 2, 18, 0, '-', 0, 'PDW'),
(33, 3, 20, 0, '-', 0, 'BloodSugarLevelFasting'),
(34, 4, 21, 0, '-', 0, 'BloodSugarLevelPP'),
(35, 5, 20, 0, '-', 0, 'BloodSugarLevelFasting'),
(36, 6, 23, 0, '-', 0, 'BloodUreaLevel'),
(37, 7, 24, 0, '-', 0, 'SerunCreatine'),
(38, 8, 25, 0, '-', 0, 'SerumUricAcid'),
(39, 9, 26, 0, '-', 0, 'TotalBilirubin'),
(40, 9, 27, 0, '-', 0, 'DirectBilirubin'),
(41, 9, 28, 0, '-', 0, 'IndirectBilirubin'),
(42, 10, 29, 0, '-', 0, 'SGPT'),
(43, 11, 30, 0, '-', 0, 'SGOT'),
(44, 12, 31, 0, '-', 0, 'SerumCalcium'),
(45, 13, 20, 0, '-', 0, 'BloodSugarLevelFasting'),
(46, 14, 21, 0, '-', 0, 'BloodSugarLevelPP'),
(47, 15, 20, 0, '-', 0, 'BloodSugarLevelFasting'),
(48, 15, 21, 0, '-', 0, 'BloodSugarLevelPP'),
(49, 16, 23, 0, '-', 0, 'BloodUreaLevel'),
(50, 17, 24, 0, '-', 0, 'SerunCreatine'),
(51, 18, 25, 0, '-', 0, 'SerumUricAcid'),
(52, 19, 26, 0, '-', 0, 'TotalBilirubin'),
(53, 19, 27, 0, '-', 0, 'DirectBilirubin'),
(54, 19, 28, 0, '-', 0, 'IndirectBilirubin'),
(55, 20, 29, 0, '-', 0, 'SGPT'),
(56, 21, 30, 0, '-', 0, 'SGOT'),
(57, 22, 31, 0, '-', 0, 'SerumCalcium'),
(58, 23, 32, 0, '-', 0, 'SerumCholesterol'),
(59, 24, 33, 0, '-', 0, 'BloodUreaNitrogen'),
(60, 25, 34, 0, '-', 0, 'CPK_Total_'),
(61, 26, 35, 0, '-', 0, 'CPK_MB_'),
(62, 27, 36, 0, '-', 0, 'SerumAmylase'),
(63, 28, 37, 0, '-', 0, 'SerumLipase'),
(64, 29, 38, 0, '-', 0, 'SerumAlkalinePhosphatase');

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
(1, 1, 'Complete Blood Count', 'CBC', '', '', 'All', 250.00, 1, '', '2021-11-14 06:00:36', '2021-11-14 06:00:36'),
(2, 1, 'Complete Blood Count', 'CBC', '', '', 'All', 250.00, 4, '', '2021-11-14 15:35:26', '2021-11-14 15:35:26'),
(3, 2, 'Blood Sugar ( Fasting )', '', '', '', 'All', 60.00, 1, '', '2021-11-15 12:53:19', '2021-11-15 12:53:19'),
(4, 2, 'Blood Sugar ( PP )', '', '', '', 'All', 60.00, 1, '', '2021-11-15 12:53:19', '2021-11-15 12:53:19'),
(5, 2, 'Blood Sugar ( F , PP )', '', '', '', 'All', 120.00, 1, '', '2021-11-15 12:53:19', '2021-11-15 12:53:19'),
(6, 2, 'Blood Urea Level', '', '', '', 'All', 150.00, 1, '', '2021-11-15 12:53:19', '2021-11-15 12:53:19'),
(7, 2, 'Serum Creatine ', '', '', '', 'All', 150.00, 1, '', '2021-11-15 12:53:19', '2021-11-15 12:53:19'),
(8, 2, 'Serum Uric Acid', '', '', '', 'All', 150.00, 1, '', '2021-11-15 12:53:19', '2021-11-15 12:53:19'),
(9, 2, 'Serum Bilirubun', '', '', '', 'All', 150.00, 1, '', '2021-11-15 12:53:19', '2021-11-15 12:53:19'),
(10, 2, 'S.G.P.T', '', '', '', 'All', 150.00, 1, '', '2021-11-15 12:53:20', '2021-11-15 12:53:20'),
(11, 2, 'S.G.O.T', '', '', '', 'All', 150.00, 1, '', '2021-11-15 12:53:20', '2021-11-15 12:53:20'),
(12, 2, 'Serum Calcium', '', '', '', 'All', 150.00, 1, '', '2021-11-15 12:53:20', '2021-11-15 12:53:20'),
(13, 2, 'Blood Sugar ( Fasting )', '', '', '', 'All', 60.00, 4, '', '2021-11-15 12:55:41', '2021-11-15 12:55:41'),
(14, 2, 'Blood Sugar ( PP )', '', '', '', 'All', 60.00, 4, '', '2021-11-15 12:55:41', '2021-11-15 12:55:41'),
(15, 2, 'Blood Sugar ( F , PP )', '', '', '', 'All', 120.00, 4, '', '2021-11-15 12:55:41', '2021-11-15 12:55:41'),
(16, 2, 'Blood Urea Level', '', '', '', 'All', 150.00, 4, '', '2021-11-15 12:55:41', '2021-11-15 12:55:41'),
(17, 2, 'Serum Creatine ', '', '', '', 'All', 150.00, 4, '', '2021-11-15 12:55:41', '2021-11-15 12:55:41'),
(18, 2, 'Serum Uric Acid', '', '', '', 'All', 150.00, 4, '', '2021-11-15 12:55:41', '2021-11-15 12:55:41'),
(19, 2, 'Serum Bilirubun', '', '', '', 'All', 150.00, 4, '', '2021-11-15 12:55:41', '2021-11-15 12:55:41'),
(20, 2, 'S.G.P.T', '', '', '', 'All', 150.00, 4, '', '2021-11-15 12:55:41', '2021-11-15 12:55:41'),
(21, 2, 'S.G.O.T', '', '', '', 'All', 150.00, 4, '', '2021-11-15 12:55:41', '2021-11-15 12:55:41'),
(22, 2, 'Serum Calcium', '', '', '', 'All', 150.00, 4, '', '2021-11-15 12:55:41', '2021-11-15 12:55:41'),
(23, 2, 'Serum Cholesterol', '', '', '', 'All', 200.00, 1, '', '2021-11-15 15:30:34', '2021-11-15 15:30:34'),
(24, 2, 'Blood Urea Nitrogen', '', '', '', 'All', 150.00, 1, '', '2021-11-15 15:30:34', '2021-11-15 15:30:34'),
(25, 2, 'CPK - ( Total )', '', '', '', 'All', 500.00, 1, '', '2021-11-15 15:30:34', '2021-11-15 15:30:34'),
(26, 2, 'CPK ( M B ) ', '', '', '', 'All', 0.00, 1, '', '2021-11-15 15:30:34', '2021-11-15 15:30:34'),
(27, 2, 'Serum Amylase', '', '', '', 'All', 500.00, 1, '', '2021-11-15 15:30:34', '2021-11-15 15:30:34'),
(28, 2, 'Serum Lipase', '', '', '', 'All', 500.00, 1, '', '2021-11-15 15:30:34', '2021-11-15 15:30:34'),
(29, 2, 'Serum Alkaline Phosphatase', '', '', '', 'All', 150.00, 1, '', '2021-11-15 15:30:34', '2021-11-15 15:30:34');

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
(1, 1, 'Hemoglobin', 1, '2021-11-13 08:53:24', '2021-11-13 08:53:24'),
(2, 1, 'WBC ', 2, '2021-11-13 08:56:23', '2021-11-13 08:56:23'),
(3, 1, 'Neutrophils', 1, '2021-11-14 05:36:40', '2021-11-14 05:36:40'),
(4, 1, 'Eosinophils', 3, '2021-11-14 05:38:28', '2021-11-14 05:38:28'),
(5, 1, 'Monocytes', 3, '2021-11-14 05:38:51', '2021-11-14 05:39:41'),
(6, 1, 'Basophils', 3, '2021-11-14 05:40:49', '2021-11-14 05:40:49'),
(7, 1, 'Platelet Count', 4, '2021-11-14 05:42:32', '2021-11-14 05:42:32'),
(8, 1, 'Total RBC Count', 5, '2021-11-14 05:45:15', '2021-11-14 05:45:15'),
(9, 1, 'Hematocrit Value ( HCT )', 3, '2021-11-14 05:47:06', '2021-11-14 05:47:06'),
(10, 1, 'Mean Corpuscular Volume ( MCV )', 6, '2021-11-14 05:48:55', '2021-11-14 05:48:55'),
(11, 1, 'Mean Cell Haemoglobin ( MCH )', 7, '2021-11-14 05:50:52', '2021-11-14 05:50:52'),
(12, 1, 'Mean Cell Haemoglobin CON ( MCHC )', 3, '2021-11-14 05:52:19', '2021-11-14 05:52:19'),
(13, 1, 'Lymphocytes', 3, '2021-11-14 05:56:10', '2021-11-14 05:56:10'),
(14, 1, 'Lymphocyte', 3, '2021-11-14 06:08:04', '2021-11-14 06:08:04'),
(15, 1, 'White Blood Cells (WBC)', 2, '2021-11-14 06:37:17', '2021-11-14 06:37:17'),
(16, 1, 'Hematocrit Value ( HCT )', 1, '2021-11-14 09:04:21', '2021-11-14 09:04:21'),
(17, 1, 'Mean Cell Haemoglobin ( MCH )', 1, '2021-11-14 09:04:21', '2021-11-14 09:04:21'),
(18, 1, 'Mean Platelet Volume ( MPV )', 6, '2021-11-14 09:04:21', '2021-11-14 09:04:21'),
(19, 1, 'R.D.W.-SD', 6, '2021-11-14 09:04:21', '2021-11-14 09:04:21'),
(20, 1, 'R.D.W.- CV', 3, '2021-11-14 09:04:21', '2021-11-14 09:04:21'),
(21, 1, 'P - LCR', 3, '2021-11-14 09:04:21', '2021-11-14 09:04:21'),
(22, 1, 'P.D.W', 6, '2021-11-14 09:04:21', '2021-11-14 09:04:21'),
(23, 1, 'P.C.T', 6, '2021-11-14 09:04:21', '2021-11-14 09:04:21'),
(24, 4, 'Hemoglobin', 1, '2021-11-14 15:35:26', '2021-11-14 15:35:26'),
(25, 4, 'White Blood Cells (WBC)', 2, '2021-11-14 15:35:26', '2021-11-14 15:35:26'),
(26, 4, 'Neutrophils', 1, '2021-11-14 15:35:26', '2021-11-14 15:35:26'),
(27, 4, 'Lymphocytes', 3, '2021-11-14 15:35:26', '2021-11-14 15:35:26'),
(28, 4, 'Eosinophils', 3, '2021-11-14 15:35:26', '2021-11-14 15:35:26'),
(29, 4, 'Monocytes', 3, '2021-11-14 15:35:26', '2021-11-14 15:35:26'),
(30, 4, 'Basophils', 3, '2021-11-14 15:35:26', '2021-11-14 15:35:26'),
(31, 4, 'Platelet Count', 4, '2021-11-14 15:35:26', '2021-11-14 15:35:26'),
(32, 4, 'Total RBC Count', 5, '2021-11-14 15:35:26', '2021-11-14 15:35:26'),
(33, 4, 'Hematocrit Value ( HCT )', 1, '2021-11-14 15:35:26', '2021-11-14 15:35:26'),
(34, 4, 'Mean Corpuscular Volume ( MCV )', 6, '2021-11-14 15:35:26', '2021-11-14 15:35:26'),
(35, 4, 'Mean Cell Haemoglobin ( MCH )', 1, '2021-11-14 15:35:26', '2021-11-14 15:35:26'),
(36, 4, 'Mean Cell Haemoglobin CON ( MCHC )', 3, '2021-11-14 15:35:26', '2021-11-14 15:35:26'),
(37, 4, 'Mean Platelet Volume ( MPV )', 6, '2021-11-14 15:35:26', '2021-11-14 15:35:26'),
(38, 4, 'R.D.W.-SD', 6, '2021-11-14 15:35:26', '2021-11-14 15:35:26'),
(39, 4, 'R.D.W.- CV', 3, '2021-11-14 15:35:26', '2021-11-14 15:35:26'),
(40, 4, 'P - LCR', 3, '2021-11-14 15:35:26', '2021-11-14 15:35:26'),
(41, 4, 'P.D.W', 6, '2021-11-14 15:35:26', '2021-11-14 15:35:26'),
(42, 4, 'P.C.T', 6, '2021-11-14 15:35:26', '2021-11-14 15:35:26'),
(43, 1, 'Blood Sugar Level Fasting', 8, '2021-11-15 12:53:19', '2021-11-15 12:53:19'),
(44, 1, 'Blood Sugar Level PP', 8, '2021-11-15 12:53:19', '2021-11-15 12:53:19'),
(45, 1, 'Blood Sugar Level Random', 8, '2021-11-15 12:53:19', '2021-11-15 12:53:19'),
(46, 1, 'Blood Urea Level', 8, '2021-11-15 12:53:19', '2021-11-15 12:53:19'),
(47, 1, 'Serun Creatine', 8, '2021-11-15 12:53:19', '2021-11-15 12:53:19'),
(48, 1, 'Serum Uric Acid', 8, '2021-11-15 12:53:19', '2021-11-15 12:53:19'),
(49, 1, 'Total Bilirubin', 8, '2021-11-15 12:53:19', '2021-11-15 12:53:19'),
(50, 1, 'Direct  Bilirubin', 8, '2021-11-15 12:53:19', '2021-11-15 12:53:19'),
(51, 1, 'Indirect  Bilirubin', 8, '2021-11-15 12:53:19', '2021-11-15 12:53:19'),
(52, 1, 'S.G.P.T', 9, '2021-11-15 12:53:19', '2021-11-15 12:53:19'),
(53, 1, 'S.G.O.T', 9, '2021-11-15 12:53:19', '2021-11-15 12:53:19'),
(54, 1, 'Serum Calcium', 8, '2021-11-15 12:53:19', '2021-11-15 12:53:19'),
(55, 1, 'Serum Cholesterol', 8, '2021-11-15 12:53:19', '2021-11-15 12:53:19'),
(56, 4, 'Blood Sugar Level Fasting', 8, '2021-11-15 12:55:41', '2021-11-15 12:55:41'),
(57, 4, 'Blood Sugar Level PP', 8, '2021-11-15 12:55:41', '2021-11-15 12:55:41'),
(58, 4, 'Blood Sugar Level Random', 8, '2021-11-15 12:55:41', '2021-11-15 12:55:41'),
(59, 4, 'Blood Urea Level', 8, '2021-11-15 12:55:41', '2021-11-15 12:55:41'),
(60, 4, 'Serun Creatine', 8, '2021-11-15 12:55:41', '2021-11-15 12:55:41'),
(61, 4, 'Serum Uric Acid', 8, '2021-11-15 12:55:41', '2021-11-15 12:55:41'),
(62, 4, 'Total Bilirubin', 8, '2021-11-15 12:55:41', '2021-11-15 12:55:41'),
(63, 4, 'Direct  Bilirubin', 8, '2021-11-15 12:55:41', '2021-11-15 12:55:41'),
(64, 4, 'Indirect  Bilirubin', 8, '2021-11-15 12:55:41', '2021-11-15 12:55:41'),
(65, 4, 'S.G.P.T', 9, '2021-11-15 12:55:41', '2021-11-15 12:55:41'),
(66, 4, 'S.G.O.T', 9, '2021-11-15 12:55:41', '2021-11-15 12:55:41'),
(67, 4, 'Serum Calcium', 8, '2021-11-15 12:55:41', '2021-11-15 12:55:41'),
(68, 4, 'Serum Cholesterol', 8, '2021-11-15 12:55:41', '2021-11-15 12:55:41'),
(69, 1, 'Blood Urea Nitrogen', 8, '2021-11-15 15:30:34', '2021-11-15 15:30:34'),
(70, 1, 'CPK ( Total )', 9, '2021-11-15 15:30:34', '2021-11-15 15:30:34'),
(71, 1, 'CPK ( MB )', 9, '2021-11-15 15:30:34', '2021-11-15 15:30:34'),
(72, 1, 'Serum Amylase', 10, '2021-11-15 15:30:34', '2021-11-15 15:30:34'),
(73, 1, 'Serum Lipase', 10, '2021-11-15 15:30:34', '2021-11-15 15:30:34'),
(74, 1, 'Serum Alkaline Phosphatase', 9, '2021-11-15 15:30:34', '2021-11-15 15:30:34'),
(75, 1, 'Serum Protein', 11, '2021-11-15 15:30:34', '2021-11-15 15:30:34'),
(76, 1, 'Serum Albumin', 11, '2021-11-15 15:30:34', '2021-11-15 15:30:34'),
(77, 1, 'Globulin', 11, '2021-11-15 15:30:34', '2021-11-15 15:30:34'),
(78, 1, 'A/G Ratio ', 12, '2021-11-15 15:30:34', '2021-11-15 15:30:34');

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
(1, 1, 'All', 0, 'Days', 100, 'Year', '13.0', '18.0', '', '0', '36500'),
(2, 1, 'Male', 0, 'Days', 100, 'Year', '13.0', '18.0', '', '0', '36500'),
(3, 1, 'Female', 0, 'Days', 100, 'Year', '11.5', '15.5', '', '0', '36500'),
(4, 2, 'All', 0, 'Days', 100, 'Year', '4000', '11000', '', '0', '36500'),
(5, 3, 'All', 0, 'Days', 100, 'Year', '40', '70', '', '0', '36500'),
(6, 4, 'All', 0, 'Days', 100, 'Year', '1', '6', '', '0', '36500'),
(7, 5, 'All', 0, 'Days', 100, 'Year', '2', '10', '', '0', '36500'),
(8, 6, 'All', 0, 'Days', 100, 'Year', '0', '1', '', '0', '36500'),
(9, 7, 'All', 0, 'Days', 100, 'Year', '1.5', '4.5', '', '0', '36500'),
(10, 8, 'All', 0, 'Days', 100, 'Year', '4.0', '5.5', '', '0', '36500'),
(11, 9, 'All', 0, 'Days', 100, 'Days', '35', '45', '', '0', '100'),
(12, 10, 'All', 0, 'Days', 100, 'Year', '83', '101', '', '0', '36500'),
(13, 11, 'All', 0, 'Days', 100, 'Year', '27', '32', '', '0', '36500'),
(14, 12, 'All', 0, 'Days', 100, 'Year', '31.5', '34.5', '', '0', '36500'),
(16, 13, 'All', 0, 'Days', 100, 'Year', '20', '40', '', '0', '36500'),
(17, 14, 'All', 0, 'Days', 100, 'Days', '20', '40', '', '0', '100'),
(18, 16, 'Male', 0, 'Days', 100, 'Year', '40', '50', '', NULL, NULL),
(19, 16, 'Female', 0, 'Days', 100, 'Year', '36', '46', '', NULL, NULL),
(20, 19, 'All', 0, 'Days', 100, 'Year', '39', '46', '', NULL, NULL),
(21, 20, 'All', 0, 'Days', 99, 'Year', '11.5', '14.5', '', NULL, NULL),
(22, 21, 'All', 0, 'Days', 100, 'Year', '19.7', '42.4', '', NULL, NULL),
(23, 22, 'All', 0, 'Days', 100, 'Year', '9.6', '15.2', '', NULL, NULL),
(24, 24, 'All', 0, 'Days', 21, 'Days', '17', '21', '', NULL, NULL),
(25, 24, 'All', 21, 'Days', 10, 'Year', '11.2', '16.5', '', NULL, NULL),
(26, 24, 'Female', 10, 'Days', 100, 'Year', '11.5', '15.5', '', NULL, NULL),
(27, 24, 'Male', 10, 'Days', 100, 'Year', '13.0', '18.0', '', NULL, NULL),
(28, 26, 'All', 0, 'Days', 100, 'Year', '40', '70', '', NULL, NULL),
(29, 27, 'All', 0, 'Days', 100, 'Year', '20', '40', '', NULL, NULL),
(30, 28, 'All', 0, 'Days', 100, 'Year', '1', '6', '', NULL, NULL),
(31, 29, 'All', 0, 'Days', 100, 'Year', '2', '10', '', NULL, NULL),
(32, 30, 'All', 0, 'Days', 100, 'Year', '0', '1', '', NULL, NULL),
(33, 31, 'All', 0, 'Days', 100, 'Year', '1.5', '4.5', '', NULL, NULL),
(34, 32, 'Female', 0, 'Days', 100, 'Year', '3.9', '4.8', '', NULL, NULL),
(35, 32, 'Male', 0, 'Days', 100, 'Year', '4.0', '5.5', '', NULL, NULL),
(36, 32, 'All', 0, 'Days', 100, 'Year', '4.0', '5.5', '', NULL, NULL),
(37, 33, 'Male', 0, 'Days', 100, 'Year', '40', '50', '', NULL, NULL),
(38, 33, 'Female', 0, 'Days', 100, 'Year', '36', '46', '', NULL, NULL),
(39, 34, 'All', 0, 'Days', 100, 'Year', '78.0', '101', '', NULL, NULL),
(40, 35, 'All', 0, 'Days', 100, 'Year', '27', '34', '', NULL, NULL),
(41, 36, 'All', 0, 'Days', 100, 'Year', '31.5', '34.5', '', NULL, NULL),
(42, 37, 'All', 0, 'Days', 100, 'Year', '6.5', '12', '', NULL, NULL),
(43, 38, 'All', 0, 'Days', 100, 'Year', '39', '46', '', NULL, NULL),
(44, 39, 'All', 0, 'Days', 99, 'Year', '11.5', '14.5', '', NULL, NULL),
(45, 40, 'All', 0, 'Days', 100, 'Year', '19.7', '42.4', '', NULL, NULL),
(46, 41, 'All', 0, 'Days', 100, 'Year', '9.6', '15.2', '', NULL, NULL),
(47, 42, 'All', 0, 'Days', 100, 'Year', '0.08', '1.0', '', NULL, NULL),
(48, 43, 'All', 0, 'Days', 100, 'Year', '70', '110', '', NULL, NULL),
(49, 46, 'All', 0, 'Days', 100, 'Year', '10', '40', '', NULL, NULL),
(50, 47, 'All', 0, 'Days', 100, 'Year', '0.7', '1.4', '', NULL, NULL),
(51, 48, 'Female', 0, 'Days', 100, 'Year', '2.6', '6.0', '', NULL, NULL),
(52, 48, 'Male', 0, 'Days', 100, 'Year', '3.5', '7.2', '', NULL, NULL),
(53, 49, 'All', 0, 'Days', 100, 'Year', '0', '1.0', '', NULL, NULL),
(54, 50, 'All', 0, 'Days', 100, 'Year', '0', '0.3', '', NULL, NULL),
(55, 52, 'All', 0, 'Days', 100, 'Year', '5', '40', '', NULL, NULL),
(56, 53, 'All', 0, 'Days', 100, 'Year', '5', '40', '', NULL, NULL),
(57, 54, 'All', 0, 'Days', 100, 'Year', '8.8', '10.5', '', NULL, NULL),
(58, 55, 'All', 0, 'Days', 100, 'Year', '25', '200', '', NULL, NULL),
(59, 56, 'All', 0, 'Days', 100, 'Year', '70', '110', '', NULL, NULL),
(60, 57, 'All', 0, 'Days', 100, 'Year', '70', '140', '', NULL, NULL),
(61, 58, 'All', 0, 'Days', 100, 'Year', '70', '140', '', NULL, NULL),
(62, 59, 'All', 0, 'Days', 100, 'Year', '10', '40', '', NULL, NULL),
(63, 60, 'All', 0, 'Days', 100, 'Year', '0.7', '1.4', '', NULL, NULL),
(64, 61, 'Female', 0, 'Days', 100, 'Year', '2.6', '6.0', '', NULL, NULL),
(65, 61, 'Male', 0, 'Days', 100, 'Year', '3.5', '7.2', '', NULL, NULL),
(66, 69, 'All', 0, 'Days', 100, 'Year', '6', '21', '', NULL, NULL),
(67, 70, 'All', 0, 'Days', 100, 'Year', '24', '170', '', NULL, NULL),
(68, 71, 'All', 0, 'Days', 100, 'Year', '0', '24', '', NULL, NULL),
(69, 72, 'All', 0, 'Days', 100, 'Year', '0', '< 80', '', NULL, NULL),
(70, 73, 'All', 0, 'Days', 100, 'Year', '13', '60', '', NULL, NULL),
(71, 74, 'All', 0, 'Days', 100, 'Year', '40', '111', '', NULL, NULL),
(72, 75, 'All', 210, 'Days', 365, 'Days', '5.1', '7.3', '', NULL, NULL),
(73, 75, 'All', 1, 'Year', 2, 'Year', '5.6', '7.5', '', NULL, NULL),
(74, 75, 'All', 2, 'Year', 12, 'Year', '6', '8', '', NULL, NULL),
(75, 75, 'All', 12, 'Year', 100, 'Year', '6.4', '8.3', '', NULL, NULL),
(76, 76, 'All', 0, 'Days', 4, 'Days', '2.8', '4.4', '', NULL, NULL),
(77, 76, 'All', 4, 'Days', 14, 'Year', ' 3.8', '5.4', '', NULL, NULL),
(78, 76, 'All', 14, 'Year', 19, 'Year', '3.2', '4.5', '', NULL, NULL),
(79, 76, 'All', 19, 'Year', 60, 'Year', '3.5', '5.2', '', NULL, NULL),
(80, 76, 'All', 60, 'Year', 100, 'Year', '3.5', '4.6', '', NULL, NULL),
(81, 77, 'All', 0, 'Days', 100, 'Days', '2.5', '3.5', '', NULL, NULL);

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
(1, 'g/dl', 1, '2021-11-13 08:51:53'),
(2, 'cumm', 1, '2021-11-13 08:54:01'),
(3, '%', 1, '2021-11-14 05:36:13'),
(4, 'lakhs/cumm', 1, '2021-11-14 05:41:58'),
(5, 'million/cumm', 1, '2021-11-14 05:43:24'),
(6, 'fL', 1, '2021-11-14 05:48:23'),
(7, 'Pg', 1, '2021-11-14 05:50:24'),
(8, 'g/dl', 4, '2021-11-14 15:35:26'),
(9, 'cumm', 4, '2021-11-14 15:35:26'),
(10, '%', 4, '2021-11-14 15:35:26'),
(11, 'lakhs/cumm', 4, '2021-11-14 15:35:26'),
(12, 'million/cumm', 4, '2021-11-14 15:35:26'),
(13, 'fL', 4, '2021-11-14 15:35:26'),
(14, 'Pg', 4, '2021-11-14 15:35:26'),
(15, 'mg/dl', 1, '2021-11-15 12:53:19'),
(16, 'IU/L', 1, '2021-11-15 12:53:19'),
(18, 'mg/dl', 4, '2021-11-15 12:55:41'),
(19, 'IU/L', 4, '2021-11-15 12:55:41'),
(21, 'U/L', 1, '2021-11-15 15:30:34'),
(22, 'gm/dl', 1, '2021-11-15 15:30:34'),
(23, '', 1, '2021-11-15 15:30:34'),
(24, '', 1, '2021-11-15 15:30:34');

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
(1, 'PRAKASH', 'prakash@gmail.com', '9373144532', '123', 1, 0, 0, '2021-11-13 08:50:20', '2021-11-13 08:50:20'),
(3, 'RAVIKANT MAVCHI', 'john@gmail.com', '9657622058', '123456', 1, 0, 0, '2021-11-14 05:25:02', '2021-11-14 05:25:02'),
(4, 'DARSHAN', 'john@gmail.com', '9373144532', '12345', 1, 0, 0, '2021-11-14 05:27:34', '2021-11-14 05:27:34'),
(5, 'DARSHAN', 'john2@gmail.com', '9373144532', '12345', 1, 0, 0, '2021-11-14 05:31:17', '2021-11-14 05:31:17');

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
(1, 'Heamatology', '2021-11-14 08:44:09', '2021-11-14 08:44:09'),
(2, 'Biochemistry', '2021-11-15 08:33:07', '2021-11-15 08:33:07');

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
(1, 'Heamatology', 1, '2021-11-14 05:52:44', '2021-11-14 05:52:44'),
(2, 'Heamatology', 4, '2021-11-14 15:35:26', '2021-11-14 15:35:26'),
(3, 'Biochemistry', 1, '2021-11-15 12:53:19', '2021-11-15 12:53:19'),
(4, 'Biochemistry', 4, '2021-11-15 12:55:41', '2021-11-15 12:55:41');

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
(1, 1, 'Complete Blood Count', 'CBC', '', '', 'All', 250.00, '', '2021-11-14 08:48:55', '2021-11-14 08:48:55'),
(2, 2, 'Blood Sugar ( Fasting )', '', '', '', 'All', 60.00, '', '2021-11-15 08:34:21', '2021-11-15 08:34:40'),
(3, 2, 'Blood Sugar ( PP )', '', '', '', 'All', 60.00, '', '2021-11-15 08:35:39', '2021-11-15 08:35:39'),
(4, 2, 'Blood Sugar ( F , PP )', '', '', '', 'All', 120.00, '', '2021-11-15 08:40:17', '2021-11-15 08:40:17'),
(5, 2, 'Blood Urea Level', '', '', '', 'All', 150.00, '', '2021-11-15 08:45:51', '2021-11-15 08:45:51'),
(6, 2, 'Serum Creatine ', '', '', '', 'All', 150.00, '', '2021-11-15 08:46:53', '2021-11-15 08:46:53'),
(7, 2, 'Serum Uric Acid', '', '', '', 'All', 150.00, '', '2021-11-15 08:47:42', '2021-11-15 08:47:42'),
(8, 2, 'Serum Bilirubun', '', '', '', 'All', 150.00, '', '2021-11-15 08:53:58', '2021-11-15 08:53:58'),
(9, 2, 'S.G.P.T', '', '', '', 'All', 150.00, '', '2021-11-15 08:59:53', '2021-11-15 08:59:53'),
(10, 2, 'S.G.O.T', '', '', '', 'All', 150.00, '', '2021-11-15 09:01:10', '2021-11-15 09:01:10'),
(11, 2, 'Serum Calcium', '', '', '', 'All', 150.00, '', '2021-11-15 09:03:50', '2021-11-15 09:03:50'),
(12, 2, 'Serum Cholesterol', '', '', '', 'All', 200.00, '', '2021-11-15 13:28:38', '2021-11-15 13:28:38'),
(13, 2, 'Blood Urea Nitrogen', '', '', '', 'All', 150.00, '', '2021-11-15 13:30:01', '2021-11-15 13:30:01'),
(14, 2, 'CPK - ( Total )', '', '', '', 'All', 500.00, '', '2021-11-15 13:42:05', '2021-11-15 13:42:05'),
(15, 2, 'CPK ( M B ) ', '', '', '', 'All', 0.00, '', '2021-11-15 13:43:25', '2021-11-15 13:43:25'),
(16, 2, 'Serum Amylase', '', '', '', 'All', 500.00, '', '2021-11-15 13:47:50', '2021-11-15 13:47:50'),
(17, 2, 'Serum Lipase', '', '', '', 'All', 500.00, '', '2021-11-15 13:51:28', '2021-11-15 13:51:28'),
(18, 2, 'Serum Alkaline Phosphatase', '', '', '', 'All', 150.00, '', '2021-11-15 13:58:31', '2021-11-15 13:58:31');

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
(1, 1, 'All', 0, 'Days', 21, 'Days', '17', '21', '', '0', '21'),
(2, 1, 'All', 21, 'Days', 10, 'Year', '11.2', '16.5', '', '21', '3650'),
(3, 1, 'Female', 10, 'Days', 100, 'Year', '11.5', '15.5', '', '10', '36500'),
(4, 1, 'Male', 10, 'Days', 100, 'Year', '13.0', '18.0', '', '10', '36500'),
(6, 3, 'All', 0, 'Days', 100, 'Year', '40', '70', '', '0', '36500'),
(7, 4, 'All', 0, 'Days', 100, 'Year', '20', '40', '', '0', '36500'),
(8, 5, 'All', 0, 'Days', 100, 'Year', '1', '6', '', '0', '36500'),
(9, 6, 'All', 0, 'Days', 100, 'Year', '2', '10', '', '0', '36500'),
(10, 7, 'All', 0, 'Days', 100, 'Year', '0', '1', '', '0', '36500'),
(11, 8, 'All', 0, 'Days', 100, 'Year', '1.5', '4.5', '', '0', '36500'),
(12, 9, 'Female', 0, 'Days', 100, 'Year', '3.9', '4.8', '', '0', '36500'),
(13, 9, 'Male', 0, 'Days', 100, 'Year', '4.0', '5.5', '', '0', '36500'),
(14, 9, 'All', 0, 'Days', 100, 'Year', '4.0', '5.5', '', '0', '36500'),
(16, 11, 'All', 0, 'Days', 100, 'Year', '78.0', '101', '', '0', '36500'),
(17, 12, 'All', 0, 'Days', 100, 'Year', '27', '34', '', '0', '36500'),
(18, 13, 'All', 0, 'Days', 100, 'Year', '31.5', '34.5', '', '0', '36500'),
(20, 10, 'Male', 0, 'Days', 100, 'Year', '40', '50', '', '0', '36500'),
(21, 10, 'Female', 0, 'Days', 100, 'Year', '36', '46', '', '0', '36500'),
(22, 14, 'All', 0, 'Days', 100, 'Year', '6.5', '12', '', '0', '36500'),
(23, 15, 'All', 0, 'Days', 100, 'Year', '39', '46', '', '0', '36500'),
(24, 16, 'All', 0, 'Days', 99, 'Year', '11.5', '14.5', '', '0', '36135'),
(25, 17, 'All', 0, 'Days', 100, 'Year', '19.7', '42.4', '', '0', '36500'),
(26, 18, 'All', 0, 'Days', 100, 'Year', '9.6', '15.2', '', '0', '36500'),
(27, 19, 'All', 0, 'Days', 100, 'Year', '0.08', '1.0', '', '0', '36500'),
(28, 20, 'All', 0, 'Days', 100, 'Year', '70', '110', '', '0', '36500'),
(29, 21, 'All', 0, 'Days', 100, 'Year', '70', '140', '', '0', '36500'),
(30, 22, 'All', 0, 'Days', 100, 'Year', '70', '140', '', '0', '36500'),
(31, 23, 'All', 0, 'Days', 100, 'Year', '10', '40', '', '0', '36500'),
(32, 24, 'All', 0, 'Days', 100, 'Year', '0.7', '1.4', '', '0', '36500'),
(33, 25, 'Female', 0, 'Days', 100, 'Year', '2.6', '6.0', '', '0', '36500'),
(34, 25, 'Male', 0, 'Days', 100, 'Year', '3.5', '7.2', '', '0', '36500'),
(35, 26, 'All', 0, 'Days', 100, 'Year', '0', '1.0', '', '0', '36500'),
(36, 27, 'All', 0, 'Days', 100, 'Year', '0', '0.3', '', '0', '36500'),
(37, 29, 'All', 0, 'Days', 100, 'Year', '5', '40', '', '0', '36500'),
(38, 30, 'All', 0, 'Days', 100, 'Year', '5', '40', '', '0', '36500'),
(39, 31, 'All', 0, 'Days', 100, 'Year', '8.8', '10.5', '', '0', '36500'),
(40, 32, 'All', 0, 'Days', 100, 'Year', '25', '200', '', '0', '36500'),
(41, 33, 'All', 0, 'Days', 100, 'Year', '6', '21', '', '0', '36500'),
(42, 34, 'All', 0, 'Days', 100, 'Year', '24', '170', '', '0', '36500'),
(43, 35, 'All', 0, 'Days', 100, 'Year', '0', '24', '', '0', '36500'),
(44, 36, 'All', 0, 'Days', 100, 'Year', '0', '< 80', '', '0', '36500'),
(45, 37, 'All', 0, 'Days', 100, 'Year', '13', '60', '', '0', '36500'),
(46, 38, 'All', 0, 'Days', 100, 'Year', '40', '111', '', '0', '36500'),
(47, 39, 'All', 210, 'Days', 365, 'Days', '5.1', '7.3', '', '210', '365'),
(48, 39, 'All', 1, 'Year', 2, 'Year', '5.6', '7.5', '', '365', '730'),
(49, 39, 'All', 2, 'Year', 12, 'Year', '6', '8', '', '730', '4380'),
(50, 39, 'All', 12, 'Year', 100, 'Year', '6.4', '8.3', '', '4380', '36500'),
(51, 40, 'All', 0, 'Days', 4, 'Days', '2.8', '4.4', '', '0', '4'),
(52, 40, 'All', 4, 'Days', 14, 'Year', ' 3.8', '5.4', '', '4', '5110'),
(53, 40, 'All', 14, 'Year', 19, 'Year', '3.2', '4.5', '', '5110', '6935'),
(54, 40, 'All', 19, 'Year', 60, 'Year', '3.5', '5.2', '', '6935', '21900'),
(55, 40, 'All', 60, 'Year', 100, 'Year', '3.5', '4.6', '', '21900', '36500'),
(56, 41, 'All', 0, 'Days', 100, 'Days', '2.5', '3.5', '', '0', '100');

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
(1, 1, 1, 0, '-', 0, 'Hemoglobin'),
(2, 1, 2, 0, '-', 0, 'WhiteBloodCells_WBC_'),
(3, 1, 3, 1, 'Differential Leucocyte Count', 3, 'NeutrophilsLymphocytesEosinophilsMonocytesBasophil'),
(4, 1, 4, 1, 'Differential Leucocyte Count', 3, 'NeutrophilsLymphocytesEosinophilsMonocytesBasophil'),
(5, 1, 5, 1, 'Differential Leucocyte Count', 3, 'NeutrophilsLymphocytesEosinophilsMonocytesBasophil'),
(6, 1, 6, 1, 'Differential Leucocyte Count', 3, 'NeutrophilsLymphocytesEosinophilsMonocytesBasophil'),
(7, 1, 7, 1, 'Differential Leucocyte Count', 3, 'NeutrophilsLymphocytesEosinophilsMonocytesBasophil'),
(8, 1, 8, 0, '-', 0, 'PlateletCount'),
(9, 1, 9, 0, '-', 0, 'TotalRBCCount'),
(10, 1, 10, 0, '-', 0, 'HematocritValue_HCT_'),
(11, 1, 11, 0, '-', 0, 'MeanCorpuscularVolume_MCV_'),
(12, 1, 12, 0, '-', 0, 'MeanCellHaemoglobin_MCH_'),
(13, 1, 13, 0, '-', 0, 'MeanCellHaemoglobinCON_MCHC_'),
(14, 1, 14, 0, '-', 0, 'MeanPlateletVolume_MPV_'),
(15, 1, 15, 0, '-', 0, 'RDW-SD'),
(16, 1, 16, 0, '-', 0, 'RDW-CV'),
(17, 1, 19, 0, '-', 0, 'PCT'),
(18, 1, 17, 0, '-', 0, 'P-LCR'),
(19, 1, 18, 0, '-', 0, 'PDW'),
(21, 2, 20, 0, '-', 0, 'BloodSugarLevelFasting'),
(22, 3, 21, 0, '-', 0, 'BloodSugarLevelPP'),
(23, 4, 20, 0, '-', 0, 'BloodSugarLevelFasting'),
(24, 4, 21, 0, '-', 0, 'BloodSugarLevelPP'),
(25, 5, 23, 0, '-', 0, 'BloodUreaLevel'),
(26, 6, 24, 0, '-', 0, 'SerunCreatine'),
(27, 7, 25, 0, '-', 0, 'SerumUricAcid'),
(28, 8, 26, 0, '-', 0, 'TotalBilirubin'),
(29, 8, 27, 0, '-', 0, 'DirectBilirubin'),
(30, 8, 28, 0, '-', 0, 'IndirectBilirubin'),
(31, 9, 29, 0, '-', 0, 'SGPT'),
(32, 10, 30, 0, '-', 0, 'SGOT'),
(33, 11, 31, 0, '-', 0, 'SerumCalcium'),
(34, 12, 32, 0, '-', 0, 'SerumCholesterol'),
(35, 13, 33, 0, '-', 0, 'BloodUreaNitrogen'),
(36, 14, 34, 0, '-', 0, 'CPK_Total_'),
(37, 15, 35, 0, '-', 0, 'CPK_MB_'),
(38, 16, 36, 0, '-', 0, 'SerumAmylase'),
(39, 17, 37, 0, '-', 0, 'SerumLipase'),
(40, 18, 38, 0, '-', 0, 'SerumAlkalinePhosphatase');

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
(1, 'Hemoglobin', 1, '2021-11-14 06:19:23', '2021-11-14 06:19:23'),
(2, 'White Blood Cells (WBC)', 2, '2021-11-14 06:27:55', '2021-11-14 06:28:40'),
(3, 'Neutrophils', 1, '2021-11-14 06:29:53', '2021-11-14 06:29:53'),
(4, 'Lymphocytes', 3, '2021-11-14 06:33:02', '2021-11-14 06:33:02'),
(5, 'Eosinophils', 3, '2021-11-14 06:34:08', '2021-11-14 06:34:08'),
(6, 'Monocytes', 3, '2021-11-14 06:35:52', '2021-11-14 06:35:52'),
(7, 'Basophils', 3, '2021-11-14 06:36:50', '2021-11-14 06:36:50'),
(8, 'Platelet Count', 4, '2021-11-14 06:39:26', '2021-11-14 06:39:26'),
(9, 'Total RBC Count', 5, '2021-11-14 06:48:53', '2021-11-14 06:48:53'),
(10, 'Hematocrit Value ( HCT )', 1, '2021-11-14 08:24:08', '2021-11-14 08:24:08'),
(11, 'Mean Corpuscular Volume ( MCV )', 6, '2021-11-14 08:25:14', '2021-11-14 08:25:14'),
(12, 'Mean Cell Haemoglobin ( MCH )', 1, '2021-11-14 08:28:44', '2021-11-14 08:28:44'),
(13, 'Mean Cell Haemoglobin CON ( MCHC )', 3, '2021-11-14 08:30:01', '2021-11-14 08:30:01'),
(14, 'Mean Platelet Volume ( MPV )', 6, '2021-11-14 08:35:50', '2021-11-14 08:35:50'),
(15, 'R.D.W.-SD', 6, '2021-11-14 08:36:59', '2021-11-14 08:36:59'),
(16, 'R.D.W.- CV', 3, '2021-11-14 08:38:41', '2021-11-14 08:38:41'),
(17, 'P - LCR', 3, '2021-11-14 08:39:46', '2021-11-14 08:39:46'),
(18, 'P.D.W', 6, '2021-11-14 08:40:42', '2021-11-14 08:40:42'),
(19, 'P.C.T', 6, '2021-11-14 08:43:35', '2021-11-14 08:43:35'),
(20, 'Blood Sugar Level Fasting', 8, '2021-11-15 08:31:11', '2021-11-15 08:31:11'),
(21, 'Blood Sugar Level PP', 8, '2021-11-15 08:31:52', '2021-11-15 08:31:52'),
(22, 'Blood Sugar Level Random', 8, '2021-11-15 08:32:34', '2021-11-15 08:32:34'),
(23, 'Blood Urea Level', 8, '2021-11-15 08:41:41', '2021-11-15 08:41:41'),
(24, 'Serun Creatine', 8, '2021-11-15 08:42:30', '2021-11-15 08:42:30'),
(25, 'Serum Uric Acid', 8, '2021-11-15 08:44:41', '2021-11-15 08:44:41'),
(26, 'Total Bilirubin', 8, '2021-11-15 08:50:26', '2021-11-15 08:50:26'),
(27, 'Direct  Bilirubin', 8, '2021-11-15 08:51:10', '2021-11-15 08:51:10'),
(28, 'Indirect  Bilirubin', 8, '2021-11-15 08:52:03', '2021-11-15 08:52:03'),
(29, 'S.G.P.T', 9, '2021-11-15 08:56:45', '2021-11-15 08:56:45'),
(30, 'S.G.O.T', 9, '2021-11-15 08:57:34', '2021-11-15 08:57:34'),
(31, 'Serum Calcium', 8, '2021-11-15 09:02:47', '2021-11-15 09:02:47'),
(32, 'Serum Cholesterol', 8, '2021-11-15 09:20:24', '2021-11-15 09:20:24'),
(33, 'Blood Urea Nitrogen', 8, '2021-11-15 13:25:51', '2021-11-15 13:25:51'),
(34, 'CPK ( Total )', 9, '2021-11-15 13:39:30', '2021-11-15 13:39:30'),
(35, 'CPK ( MB )', 9, '2021-11-15 13:40:20', '2021-11-15 13:40:20'),
(36, 'Serum Amylase', 10, '2021-11-15 13:46:47', '2021-11-15 13:46:47'),
(37, 'Serum Lipase', 10, '2021-11-15 13:49:48', '2021-11-15 13:49:48'),
(38, 'Serum Alkaline Phosphatase', 9, '2021-11-15 13:57:05', '2021-11-15 13:57:05'),
(39, 'Serum Protein', 11, '2021-11-15 14:07:16', '2021-11-15 14:07:16'),
(40, 'Serum Albumin', 11, '2021-11-15 14:12:51', '2021-11-15 14:12:51'),
(41, 'Globulin', 11, '2021-11-15 14:15:12', '2021-11-15 14:15:12'),
(42, 'A/G Ratio ', 12, '2021-11-15 14:23:27', '2021-11-15 14:23:27');

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
(1, 'g/dl', '2021-11-14 06:15:20'),
(2, 'cumm', '2021-11-14 06:22:22'),
(3, '%', '2021-11-14 06:29:17'),
(4, 'lakhs/cumm', '2021-11-14 06:39:01'),
(5, 'million/cumm', '2021-11-14 06:46:31'),
(6, 'fL', '2021-11-14 08:24:43'),
(7, 'Pg', '2021-11-14 08:26:05'),
(8, 'mg/dl', '2021-11-15 08:30:37'),
(9, 'IU/L', '2021-11-15 08:56:16'),
(10, 'U/L', '2021-11-15 13:45:40'),
(11, 'gm/dl', '2021-11-15 14:03:13'),
(12, '', '2021-11-15 14:19:39'),
(13, '', '2021-11-15 14:21:10');

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
(1, 1, 'Mr', 'Ravikant', 'Mavchi', 'Male', '', '2019-11-13', 2, '9657622058', '', '', '', NULL, '2021-11-13 15:43:59', '2021-11-13 15:43:59'),
(2, 4, 'Mr', 'ASHISH', 'MAVLI', 'Male', '', '2002-05-31', 19, '9373144532', '', 'ashishmavali@gmail.com', '', NULL, '2021-11-15 14:45:13', '2021-11-15 14:45:13'),
(3, 1, 'Mr', 'ASHISH', 'MAVCHI', 'Male', '', '2002-05-31', 19, '9373144532', '', '', '', NULL, '2021-11-15 16:06:06', '2021-11-15 16:06:06');

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
  ADD PRIMARY KEY (`reportId`),
  ADD UNIQUE KEY `caseId` (`caseId`);

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
  MODIFY `caseId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `case_payments`
--
ALTER TABLE `case_payments`
  MODIFY `paymentId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `case_payment_transactions`
--
ALTER TABLE `case_payment_transactions`
  MODIFY `transactionId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `case_report_data`
--
ALTER TABLE `case_report_data`
  MODIFY `case_report_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `case_report_master`
--
ALTER TABLE `case_report_master`
  MODIFY `reportId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `case_tests`
--
ALTER TABLE `case_tests`
  MODIFY `case_test_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `center_details`
--
ALTER TABLE `center_details`
  MODIFY `centerId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `center_letter_head_details`
--
ALTER TABLE `center_letter_head_details`
  MODIFY `centerId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `center_outsource_test`
--
ALTER TABLE `center_outsource_test`
  MODIFY `outsourceId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `center_packages`
--
ALTER TABLE `center_packages`
  MODIFY `packageId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `center_package_details`
--
ALTER TABLE `center_package_details`
  MODIFY `detailId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `center_payment_details`
--
ALTER TABLE `center_payment_details`
  MODIFY `paymentId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `center_reference_master`
--
ALTER TABLE `center_reference_master`
  MODIFY `ref_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `center_test_group_panel`
--
ALTER TABLE `center_test_group_panel`
  MODIFY `groupId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `center_test_master`
--
ALTER TABLE `center_test_master`
  MODIFY `testId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `center_test_panel`
--
ALTER TABLE `center_test_panel`
  MODIFY `panelId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `center_test_subtypes`
--
ALTER TABLE `center_test_subtypes`
  MODIFY `subtypeId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `center_test_subtypes_ranges`
--
ALTER TABLE `center_test_subtypes_ranges`
  MODIFY `rangeId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `center_unit_master`
--
ALTER TABLE `center_unit_master`
  MODIFY `unitId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `customer_registeration`
--
ALTER TABLE `customer_registeration`
  MODIFY `centerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lab_category`
--
ALTER TABLE `lab_category`
  MODIFY `categoryid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lab_center_categories`
--
ALTER TABLE `lab_center_categories`
  MODIFY `categoryid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lab_tests`
--
ALTER TABLE `lab_tests`
  MODIFY `testId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `lab_tests_subtypes`
--
ALTER TABLE `lab_tests_subtypes`
  MODIFY `subtypeId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_tests_subtypes_ranges`
--
ALTER TABLE `lab_tests_subtypes_ranges`
  MODIFY `rangeId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `lab_test_group_panel`
--
ALTER TABLE `lab_test_group_panel`
  MODIFY `groupId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `lab_test_panel`
--
ALTER TABLE `lab_test_panel`
  MODIFY `panelId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `lab_unit_master`
--
ALTER TABLE `lab_unit_master`
  MODIFY `unitId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `outsource_lab`
--
ALTER TABLE `outsource_lab`
  MODIFY `outsource_lab_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_master`
--
ALTER TABLE `patient_master`
  MODIFY `patientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
