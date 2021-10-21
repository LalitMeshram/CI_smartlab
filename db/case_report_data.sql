-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2021 at 02:53 PM
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
(1, 1, 1, 'Nurophils', 1, 'CBC WITH ESR', '67', 1, 'Hematology', 'KM', '10-40', '-', 0, NULL),
(11, 2, 3, 'Neurophils', 2, 'Complete Blood Count', '60', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count', 1, NULL),
(12, 2, 4, 'Lymphocyte', 2, 'Complete Blood Count', '10', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count', 1, NULL),
(13, 2, 5, 'Eosinophils', 2, 'Complete Blood Count', '20', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count', 1, NULL),
(27, 3, 11, 'Hemoglobin', 2, 'Complete Blood Count', '40', 4, 'Haematology', 'g/dl', '10-40', '-', 0, NULL),
(28, 3, 7, 'Total Leucocyte Count', 2, 'Complete Blood Count', '55', 4, 'Haematology', 'cumm', '10-40', '-', 0, NULL),
(29, 3, 3, 'Neurophils', 2, 'Complete Blood Count', '10', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count', 1, NULL),
(30, 3, 4, 'Lymphocyte', 2, 'Complete Blood Count', '20', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count', 1, NULL),
(31, 3, 5, 'Eosinophils', 2, 'Complete Blood Count', '30', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count', 1, NULL),
(32, 3, 8, 'Platelet Count', 2, 'Complete Blood Count', '21', 4, 'Haematology', 'lakhs/cumm', '10-40', '-', 0, NULL),
(33, 3, 9, 'Total RBC', 2, 'Complete Blood Count', '32', 4, 'Haematology', 'million/cumm', '10-40', '-', 0, NULL),
(34, 3, 10, 'Hematocrit Value, HCT', 2, 'Complete Blood Count', '54', 4, 'Haematology', '%', '10-40', '-', 0, NULL),
(35, 3, 12, 'Mean Coruscular Volume', 2, 'Complete Blood Count', '57', 4, 'Haematology', 'fL', '10-40', '-', 0, NULL),
(36, 3, 13, 'Mean Cell Haemoglobin', 2, 'Complete Blood Count', '21', 4, 'Haematology', 'Pg', '10-40', '-', 0, NULL),
(37, 3, 14, 'Mean Cell Haemoglobin CON, MCHC', 2, 'Complete Blood Count', '21', 4, 'Haematology', '%', '10-40', '-', 0, NULL),
(38, 3, 15, 'Mean Platelet Volume', 2, 'Complete Blood Count', '22', 4, 'Haematology', 'fL', '10-40', '-', 0, NULL),
(39, 3, 16, 'R.D.W. - CV', 2, 'Complete Blood Count', '50', 4, 'Haematology', '%', '10-40', '-', 0, NULL),
(80, 4, 11, 'Hemoglobin', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'g/dl', '10-40', '-', 0, NULL),
(81, 4, 7, 'Total Leucocyte Count', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'cumm', '10-40', '-', 0, NULL),
(82, 4, 3, 'Neurophils', 2, 'Complete Blood Count', '10', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count', 1, NULL),
(83, 4, 4, 'Lymphocyte', 2, 'Complete Blood Count', '10', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count', 1, NULL),
(84, 4, 5, 'Eosinophils', 2, 'Complete Blood Count', '10', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count', 1, NULL),
(85, 4, 8, 'Platelet Count', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'lakhs/cumm', '10-40', '-', 0, NULL),
(86, 4, 9, 'Total RBC', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'million/cumm', '10-40', '-', 0, NULL),
(87, 4, 10, 'Hematocrit Value, HCT', 2, 'Complete Blood Count', '10', 4, 'Haematology', '%', '10-40', '-', 0, NULL),
(88, 4, 12, 'Mean Coruscular Volume', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'fL', '10-40', '-', 0, NULL),
(89, 4, 13, 'Mean Cell Haemoglobin', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'Pg', '10-40', '-', 0, NULL),
(90, 4, 14, 'Mean Cell Haemoglobin CON, MCHC', 2, 'Complete Blood Count', '10', 4, 'Haematology', '%', '10-40', '-', 0, NULL),
(91, 4, 15, 'Mean Platelet Volume', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'fL', '10-40', '-', 0, NULL),
(92, 4, 16, 'R.D.W. - CV', 2, 'Complete Blood Count', '10', 4, 'Haematology', '%', '10-40', '-', 0, NULL),
(93, 4, 7, 'Total Leucocyte Count', 3, 'Complete Blood Count New', '10', 4, 'Haematology', 'cumm', '10-40', '-', 0, NULL),
(94, 4, 3, 'Neurophils', 3, 'Complete Blood Count New', '10', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count 1', 1, NULL),
(95, 4, 4, 'Lymphocyte', 3, 'Complete Blood Count New', '10', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count 1', 1, NULL),
(96, 4, 5, 'Eosinophils', 3, 'Complete Blood Count New', '10', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count 1', 1, NULL),
(97, 4, 8, 'Platelet Count', 3, 'Complete Blood Count New', '10', 4, 'Haematology', 'lakhs/cumm', '10-40', '-', 0, NULL),
(98, 4, 9, 'Total RBC', 3, 'Complete Blood Count New', '10', 4, 'Haematology', 'million/cumm', '10-40', '-', 0, NULL),
(99, 4, 10, 'Hematocrit Value, HCT', 3, 'Complete Blood Count New', '10', 4, 'Haematology', '%', '10-40', '-', 0, NULL),
(100, 5, 11, 'Hemoglobin', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'g/dl', '10-40', '-', 0, NULL),
(101, 5, 7, 'Total Leucocyte Count', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'cumm', '10-40', '-', 0, NULL),
(102, 5, 3, 'Neurophils', 2, 'Complete Blood Count', '10', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count', 1, NULL),
(103, 5, 4, 'Lymphocyte', 2, 'Complete Blood Count', '10', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count', 1, NULL),
(104, 5, 5, 'Eosinophils', 2, 'Complete Blood Count', '10', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count', 1, NULL),
(105, 5, 8, 'Platelet Count', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'lakhs/cumm', '10-40', '-', 0, NULL),
(106, 5, 9, 'Total RBC', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'million/cumm', '10-40', '-', 0, NULL),
(107, 5, 10, 'Hematocrit Value, HCT', 2, 'Complete Blood Count', '10', 4, 'Haematology', '%', '10-40', '-', 0, NULL),
(108, 5, 12, 'Mean Coruscular Volume', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'fL', '10-40', '-', 0, NULL),
(109, 5, 13, 'Mean Cell Haemoglobin', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'Pg', '10-40', '-', 0, NULL),
(110, 5, 14, 'Mean Cell Haemoglobin CON, MCHC', 2, 'Complete Blood Count', '101', 4, 'Haematology', '%', '10-40', '-', 0, NULL),
(111, 5, 15, 'Mean Platelet Volume', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'fL', '10-40', '-', 0, NULL),
(112, 5, 16, 'R.D.W. - CV', 2, 'Complete Blood Count', '10', 4, 'Haematology', '%', '10-40', '-', 0, NULL),
(113, 5, 7, 'Total Leucocyte Count', 3, 'Complete Blood Count New', '10', 4, 'Haematology', 'cumm', '10-40', '-', 0, NULL),
(114, 5, 3, 'Neurophils', 3, 'Complete Blood Count New', '10', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count 1', 1, NULL),
(115, 5, 4, 'Lymphocyte', 3, 'Complete Blood Count New', '10', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count 1', 1, NULL),
(116, 5, 5, 'Eosinophils', 3, 'Complete Blood Count New', '10', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count 1', 1, NULL),
(117, 5, 8, 'Platelet Count', 3, 'Complete Blood Count New', '10', 4, 'Haematology', 'lakhs/cumm', '10-40', '-', 0, NULL),
(118, 5, 9, 'Total RBC', 3, 'Complete Blood Count New', '10', 4, 'Haematology', 'million/cumm', '10-40', '-', 0, NULL),
(119, 5, 10, 'Hematocrit Value, HCT', 3, 'Complete Blood Count New', '10', 4, 'Haematology', '%', '10-40', '-', 0, NULL),
(133, 6, 11, 'Hemoglobin', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'g/dl', '10-40', '-', 0, NULL),
(134, 6, 7, 'Total Leucocyte Count', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'cumm', '10-40', '-', 0, NULL),
(135, 6, 3, 'Neurophils', 2, 'Complete Blood Count', '10', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count', 1, NULL),
(136, 6, 4, 'Lymphocyte', 2, 'Complete Blood Count', '10', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count', 1, NULL),
(137, 6, 5, 'Eosinophils', 2, 'Complete Blood Count', '10', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count', 1, NULL),
(138, 6, 8, 'Platelet Count', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'lakhs/cumm', '10-40', '-', 0, NULL),
(139, 6, 9, 'Total RBC', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'million/cumm', '10-40', '-', 0, NULL),
(140, 6, 10, 'Hematocrit Value, HCT', 2, 'Complete Blood Count', '10', 4, 'Haematology', '%', '10-40', '-', 0, NULL),
(141, 6, 12, 'Mean Coruscular Volume', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'fL', '10-40', '-', 0, NULL),
(142, 6, 13, 'Mean Cell Haemoglobin', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'Pg', '10-40', '-', 0, NULL),
(143, 6, 14, 'Mean Cell Haemoglobin CON, MCHC', 2, 'Complete Blood Count', '10', 4, 'Haematology', '%', '10-40', '-', 0, NULL),
(144, 6, 15, 'Mean Platelet Volume', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'fL', '10-40', '-', 0, NULL),
(145, 6, 16, 'R.D.W. - CV', 2, 'Complete Blood Count', '10', 4, 'Haematology', '%', '10-40', '-', 0, NULL),
(146, 7, 11, 'Hemoglobin', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'g/dl', '10-40', '-', 0, NULL),
(147, 7, 7, 'Total Leucocyte Count', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'cumm', '10-40', '-', 0, NULL),
(148, 7, 3, 'Neurophils', 2, 'Complete Blood Count', '10', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count', 1, NULL),
(149, 7, 4, 'Lymphocyte', 2, 'Complete Blood Count', '10', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count', 1, NULL),
(150, 7, 5, 'Eosinophils', 2, 'Complete Blood Count', '10', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count', 1, NULL),
(151, 7, 8, 'Platelet Count', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'lakhs/cumm', '10-40', '-', 0, NULL),
(152, 7, 9, 'Total RBC', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'million/cumm', '10-40', '-', 0, NULL),
(153, 7, 10, 'Hematocrit Value, HCT', 2, 'Complete Blood Count', '10', 4, 'Haematology', '%', '10-40', '-', 0, NULL),
(154, 7, 12, 'Mean Coruscular Volume', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'fL', '10-40', '-', 0, NULL),
(155, 7, 13, 'Mean Cell Haemoglobin', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'Pg', '10-40', '-', 0, NULL),
(156, 7, 14, 'Mean Cell Haemoglobin CON, MCHC', 2, 'Complete Blood Count', '10', 4, 'Haematology', '%', '10-40', '-', 0, NULL),
(157, 7, 15, 'Mean Platelet Volume', 2, 'Complete Blood Count', '10', 4, 'Haematology', 'fL', '10-40', '-', 0, NULL),
(158, 7, 16, 'R.D.W. - CV', 2, 'Complete Blood Count', '10', 4, 'Haematology', '%', '10-40', '-', 0, NULL),
(159, 8, 7, 'Total Leucocyte Count', 3, 'Complete Blood Count New', '10', 4, 'Haematology', 'cumm', '10-40', '-', 0, NULL),
(160, 8, 3, 'Neurophils', 3, 'Complete Blood Count New', '10', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count 1', 1, NULL),
(161, 8, 4, 'Lymphocyte', 3, 'Complete Blood Count New', '10', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count 1', 1, NULL),
(162, 8, 5, 'Eosinophils', 3, 'Complete Blood Count New', '10', 4, 'Haematology', '%', '10-40', 'Differential Leucocyte Count 1', 1, NULL),
(163, 8, 8, 'Platelet Count', 3, 'Complete Blood Count New', '10', 4, 'Haematology', 'lakhs/cumm', '10-40', '-', 0, NULL),
(164, 8, 9, 'Total RBC', 3, 'Complete Blood Count New', '10', 4, 'Haematology', 'million/cumm', '10-40', '-', 0, NULL),
(165, 8, 10, 'Hematocrit Value, HCT', 3, 'Complete Blood Count New', '10', 4, 'Haematology', '%', '10-40', '-', 0, NULL),
(166, 9, 9, 'TESTPHILS', 9, 'KKR', '41', 13, 'Dermitology', '-', '10-40', '-', 0, NULL);

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
  MODIFY `case_report_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
