-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2023 at 08:59 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b3_hospital`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `age`
-- (See below for the actual view)
--
CREATE TABLE `age` (
`Patient_DOB` date
,`old` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `AP_id` int(6) NOT NULL,
  `OPDold_id` int(5) NOT NULL,
  `AP_status` int(1) NOT NULL,
  `AP_date` date NOT NULL,
  `AP_create` date NOT NULL,
  `DP_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`AP_id`, `OPDold_id`, `AP_status`, `AP_date`, `AP_create`, `DP_id`) VALUES
(300000, 10007, 1, '2022-05-19', '2022-05-13', 1010),
(300001, 10008, 0, '2022-05-25', '2022-05-15', 1011),
(300002, 10014, 1, '2022-05-18', '2022-05-15', 1015),
(300003, 10018, 0, '2022-05-24', '2022-05-15', 1008),
(300004, 10006, 0, '2022-05-21', '2022-05-15', 1017),
(300005, 10021, 1, '2022-05-17', '2022-05-15', 1001),
(300006, 10022, 0, '2022-05-20', '2022-05-15', 1001),
(300007, 10022, 0, '2022-05-20', '2022-05-15', 1001),
(300008, 10022, 0, '2022-05-20', '2022-05-15', 1001),
(300009, 10023, 1, '2022-05-19', '2022-05-15', 1001),
(300010, 10024, 0, '2022-05-22', '2022-05-15', 1001),
(300011, 10027, 0, '2022-05-19', '2022-05-15', 1001),
(300012, 10029, 1, '2022-05-18', '2022-05-15', 1001),
(300013, 10031, 0, '2022-05-19', '2022-05-15', 1001),
(300014, 10028, 0, '2022-05-22', '2022-05-15', 1001),
(300015, 10032, 1, '2022-05-18', '2022-05-15', 1001),
(300016, 10033, 0, '2022-05-21', '2022-05-15', 1001),
(300017, 10034, 0, '2022-05-20', '2022-05-15', 1001),
(300018, 10035, 1, '2022-05-19', '2022-05-15', 1001),
(300019, 10036, 1, '2022-05-18', '2022-05-15', 1001),
(300020, 10041, 1, '2022-05-21', '2022-05-15', 1001),
(300021, 10052, 1, '2022-05-28', '2022-05-16', 1001),
(300022, 10055, 1, '2022-05-31', '2022-05-16', 1001);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `Bill_no` int(6) NOT NULL,
  `OPD_id` int(5) NOT NULL,
  `Bill_charge` int(6) DEFAULT NULL,
  `Bill_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`Bill_no`, `OPD_id`, `Bill_charge`, `Bill_status`) VALUES
(990000, 0, 1080, 1),
(990001, 0, 19480, 1),
(990002, 0, NULL, 1),
(990003, 0, 15240, 1),
(990004, 0, NULL, 1),
(990005, 0, NULL, 1),
(990006, 0, 780, 1),
(990007, 0, NULL, 1),
(990008, 0, NULL, 1),
(990009, 0, NULL, 1),
(990010, 0, 9780, 1),
(990011, 0, 19100, 1),
(990012, 0, NULL, 1),
(990013, 10022, 0, 1),
(990014, 10022, 0, 1),
(990015, 10023, 0, 1),
(990016, 10024, 0, 1),
(990017, 10027, 0, 1),
(990018, 10029, 0, 1),
(990019, 10030, 0, 1),
(990020, 10031, 0, 1),
(990021, 10028, 0, 1),
(990022, 10032, 4060, 1),
(990023, 10033, 2410, 1),
(990024, 10034, 1950, 1),
(990025, 10035, 2220, 1),
(990026, 10036, 1190, 1),
(990027, 10041, 3700, 1),
(990028, 10048, 0, 0),
(990029, 10049, 0, 0),
(990030, 10050, 1780, 1),
(990031, 10051, 0, 0),
(990032, 10052, 3820, 1),
(990033, 10053, 0, 0),
(990034, 10054, 0, 0),
(990035, 10055, 4210, 1),
(990036, 10056, 1870, 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DP_id` int(4) NOT NULL,
  `DP_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DP_id`, `DP_name`) VALUES
(1001, 'Accident and emergency (A&E)'),
(1002, 'Anaesthetics'),
(1003, 'Breast screening'),
(1004, 'Cardiology'),
(1005, 'Chaplaincy'),
(1006, 'Critical care'),
(1007, 'Diagnostic imaging'),
(1008, 'Discharge lounge'),
(1009, 'Ear nose and throat (ENT)'),
(1010, 'Elderly services department'),
(1011, 'Gastroenterology'),
(1012, 'General surgery'),
(1013, 'Gynaecology'),
(1014, 'Haematology'),
(1015, 'Maternity departments'),
(1016, 'Microbiology'),
(1017, 'Neonatal unit'),
(1018, 'Nephrology'),
(1019, 'Neurology'),
(1020, 'Nutrition and dietetics'),
(1021, 'Obstetrics and gynaecology units'),
(1022, 'Occupational therapy'),
(1023, 'Oncology'),
(1024, 'Ophthalmology'),
(1025, 'Orthopaedics'),
(1026, 'Pain management clinics'),
(1027, 'Pharmacy'),
(1028, 'Physiotherapy'),
(1029, 'Plastic surgery'),
(1030, 'Radiotherapy'),
(1031, 'Renal unit'),
(1032, 'Rheumatology'),
(1033, 'Sexual health (genitourinary medicine)');

-- --------------------------------------------------------

--
-- Stand-in structure for view `departmentt`
-- (See below for the actual view)
--
CREATE TABLE `departmentt` (
`DP_id` int(4)
,`DP_name` varchar(50)
,`frequency` bigint(21)
,`YearOld` decimal(24,4)
);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `Doctor_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Doctor_prefix` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Doctor_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Doctor_sname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Doctor_gender` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `Doctor_DOB` date NOT NULL,
  `Doctor_address` text COLLATE utf8_unicode_ci NOT NULL,
  `Doctor_TelNo` text COLLATE utf8_unicode_ci NOT NULL,
  `Doctor_DP` int(4) NOT NULL,
  `Doctor_pwd` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`Doctor_id`, `Doctor_prefix`, `Doctor_name`, `Doctor_sname`, `Doctor_gender`, `Doctor_DOB`, `Doctor_address`, `Doctor_TelNo`, `Doctor_DP`, `Doctor_pwd`) VALUES
('D0001', 'Miss', 'Naruedee', 'Suvannadat', 'F', '2001-11-13', '62 Marlings Park Avenue, Chislehurst', '811111111', 1001, '1234'),
('D0002', 'Mister', 'Thitipat', 'Kullachalit', 'M', '1999-08-05', 'Primrose, 19 Larford Farm Estate Astley', '823457645', 1002, '1234'),
('D0003', 'Mister', 'Sukrit', 'Songserm', 'M', '1999-11-17', '15 The Pines, Canterbury', '961111111', 1003, '1234'),
('D0004', 'Miss', 'Varaikorn', 'Chankaipon', 'F', '1999-06-25', '7 Gadsden Close, Upminster', '823332222', 1004, '1234');

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE `drug` (
  `Drug_id` int(5) NOT NULL,
  `Drug_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Drug_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Drug_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `Drug_stock` int(5) NOT NULL,
  `Drug_unit` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Drug_price` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `drug`
--

INSERT INTO `drug` (`Drug_id`, `Drug_name`, `Drug_type`, `Drug_detail`, `Drug_stock`, `Drug_unit`, `Drug_price`) VALUES
(10001, 'Loratadine', 'Tablet', 'Relieve the symptoms of allergies.', 110, 'Blister pack', 70),
(20001, 'Codeine', 'Liquid', 'Treat mild-to-moderate pain', 41, 'Bottle', 90),
(20002, 'Fentanyl', 'Tablet', 'Breakthrough cancer pain', 113, 'Blister pack', 90),
(20003, 'Hydrocodone', 'Tablet', 'An opioid agonist for analgesic.', 143, 'Bottle', 90),
(20004, 'Methadone', 'Tablet', 'An opioid analgesic for severe pain.', 190, 'Bottle', 90),
(20005, 'Oxycodone', 'Tablet', 'An opioid for moderate to severe pain.', 79, 'Bottle', 90),
(20006, 'Tramadol', 'capsules', 'An opioid for moderate to severe pain in adults.', 109, 'Blister pack', 90),
(30001, 'Apixaban', 'Tablet', 'An anticoagulant for the prophylaxis of stroke.', 110, 'Blister pack', 100),
(30002, 'Clopidogrel', 'Tablet', 'An antiplatelet agent to prevent blood clots.', 150, 'Blister pack', 100),
(30003, 'Cilostazol', 'Tablet', 'An antiplatelet agent and vasodilator.', 125, 'Blister pack', 100),
(30004, 'Ticagrelor', 'Tablet', 'A P2Y12 platelet inhibitor.', 108, 'Bottle', 100),
(30005, 'Warfarin', 'Tablet', 'A vitamin K antagonist for venous thromboembolism.', 49, 'Blister pack', 100),
(40001, 'Aprepitant', 'capsules', 'Treat nausea and vomiting.', 124, 'Blister pack', 90),
(40002, 'Metoclopramide', 'Tablet', 'Treat gastroesophageal reflux disease.', 175, 'Blister pack', 90),
(40003, 'Ondansetron', 'Tablet', 'Prevent nausea and vomiting in chemotherapy.', 68, 'Blister pack', 90),
(50001, 'Chlorpropamide', 'Tablet', 'Treat non insulin dependent diabetes mellitus.', 61, 'Bottle', 120),
(50002, 'Glimepiride', 'Tablet', 'Treat type 2 diabetes mellitus.', 97, 'Bottle', 120),
(50003, 'Glyburide', 'Tablet', 'Treat non insulin dependent diabetes mellitus.', 88, 'Bottle', 120);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Employee_prefix` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Employee_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Employee_sname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Employee_gender` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `Employee_DOB` date NOT NULL,
  `Employee_address` text COLLATE utf8_unicode_ci NOT NULL,
  `Employee_TelNo` text COLLATE utf8_unicode_ci NOT NULL,
  `Employee_role` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Employee_pwd` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_id`, `Employee_prefix`, `Employee_name`, `Employee_sname`, `Employee_gender`, `Employee_DOB`, `Employee_address`, `Employee_TelNo`, `Employee_role`, `Employee_pwd`) VALUES
('E0001', 'Mister', 'Kit', 'Conner', 'M', '2001-07-02', '26 Sissinghurst Close, Rugby', '934445567', 'Cashier', '1234'),
('E0002', 'Mister', 'Joe', 'Locke', 'M', '2000-10-15', '63 Haverford Way, Cardiff', '891203765', 'pharmacist', '1234'),
('E0003', 'Mister', 'Yasmin', 'Finney', 'M', '2001-11-25', '8 Folly Road, Swavesey', '846616511', 'bed registrator', '1234'),
('E0004', 'Mister', 'Sebastian', 'Croft', 'M', '2001-01-18', '4 Fildyke Close, Meppershall', '851435467', 'registrator', '1234'),
('E0005', 'Miss', 'Carinna', 'Brown', 'F', '2000-07-30', 'Flat 31, 100 Bloomfield Road, London', '897654890', 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `ipd`
--

CREATE TABLE `ipd` (
  `ipd_id` int(5) NOT NULL,
  `Patient_id` int(5) NOT NULL,
  `IPD_date` date NOT NULL DEFAULT current_timestamp(),
  `Room_id` int(4) NOT NULL,
  `IPD_symptoms` text COLLATE utf8_unicode_ci NOT NULL,
  `IPD_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ipd_treatment`
--

CREATE TABLE `ipd_treatment` (
  `IPDTM_id` int(6) NOT NULL,
  `IPD_id` int(5) NOT NULL,
  `IPD_datetime` datetime NOT NULL,
  `List_id` int(4) NOT NULL,
  `IPDTM_text` text COLLATE utf8_unicode_ci NOT NULL,
  `Doctor_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TM_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opd`
--

CREATE TABLE `opd` (
  `OPD_id` int(5) NOT NULL,
  `Patient_id` int(5) NOT NULL,
  `AP_id` int(6) DEFAULT NULL,
  `OPD_Date` date NOT NULL DEFAULT current_timestamp(),
  `OPD_status` int(1) NOT NULL,
  `OPD_symptoms` text COLLATE utf8_unicode_ci NOT NULL,
  `DP_id` int(4) NOT NULL,
  `OPD_active_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `opd`
--

INSERT INTO `opd` (`OPD_id`, `Patient_id`, `AP_id`, `OPD_Date`, `OPD_status`, `OPD_symptoms`, `DP_id`, `OPD_active_status`) VALUES
(10003, 65001, NULL, '2022-05-02', 0, 'Accident', 1001, 0),
(10004, 65002, NULL, '2022-05-13', 0, 'BrokenArm', 1018, 0),
(10005, 65010, NULL, '2022-05-13', 0, 'High Fever', 1004, 0),
(10006, 65011, NULL, '2022-05-13', 0, '', 1008, 0),
(10007, 65001, NULL, '2022-05-13', 0, '', 1018, 0),
(10008, 65055, NULL, '2022-05-13', 0, '', 1016, 0),
(10014, 65020, NULL, '2022-05-13', 0, '', 1014, 0),
(10015, 65098, NULL, '2022-05-13', 0, '', 1004, 0),
(10016, 65077, NULL, '2022-05-13', 0, '', 1002, 0),
(10017, 65066, NULL, '2022-05-13', 0, '', 1005, 0),
(10018, 65032, NULL, '2022-05-13', 0, '', 1017, 0),
(10019, 65000, NULL, '2022-05-13', 0, 'test', 1001, 0),
(10020, 65000, NULL, '2022-05-13', 0, 'test', 1001, 0),
(10021, 65000, NULL, '2022-05-13', 0, 'test', 1001, 0),
(10022, 65001, NULL, '2022-05-15', 0, 'asdfffff', 1001, 0),
(10023, 65002, NULL, '2022-05-15', 0, 'fr', 1001, 0),
(10024, 65003, NULL, '2022-05-15', 0, 'dd', 1001, 0),
(10027, 65000, NULL, '2022-05-15', 0, 'ไม่รู้งง', 1001, 0),
(10028, 65001, NULL, '2022-05-15', 0, 'งงงงง', 1001, 0),
(10029, 65000, NULL, '2022-05-15', 0, 'งงงง3', 1001, 0),
(10030, 65000, NULL, '2022-05-15', 0, 'งงงง4\r\n', 1001, 0),
(10031, 65000, NULL, '2022-05-15', 0, 'งงงง5', 1001, 0),
(10032, 65000, NULL, '2022-05-15', 0, 'อาการ2', 1001, 0),
(10033, 65000, NULL, '2022-05-15', 0, 'whitehouse syndrome', 1001, 0),
(10034, 65000, NULL, '2022-05-15', 0, 'vkdkdkdkkdkk', 1001, 0),
(10035, 65000, NULL, '2022-05-15', 0, 'ทดสอบ1', 1001, 0),
(10036, 65000, NULL, '2022-05-15', 0, 'asd', 1001, 0),
(10037, 65000, 300005, '2022-05-15', 1, 'test', 1001, 0),
(10039, 65000, 300019, '2022-05-15', 1, 'asd', 1001, 0),
(10040, 65000, 300015, '2022-05-15', 1, 'อาการ2', 1001, 0),
(10041, 65000, NULL, '2022-05-15', 0, 'google', 1001, 0),
(10042, 65000, 300020, '2022-05-15', 1, 'google', 1001, 0),
(10043, 65020, 300002, '2022-05-15', 1, '', 1014, 0),
(10048, 65000, 300012, '2022-05-15', 1, 'งงงง3', 1001, 0),
(10049, 65000, 300018, '2022-05-15', 1, 'ทดสอบ1', 1001, 0),
(10050, 65002, 300009, '2022-05-15', 1, 'fr', 1001, 0),
(10051, 65000, NULL, '2022-05-15', 0, 'จบนะขอร้อง4', 1001, 0),
(10052, 65000, NULL, '2022-05-16', 0, 'เจ็บคอ', 1001, 0),
(10053, 65000, 300021, '2022-05-16', 1, 'เจ็บคอ', 1001, 0),
(10054, 65000, NULL, '2022-05-16', 0, 'เจ็บคอ', 1001, 0),
(10055, 65001, NULL, '2022-05-16', 0, 'เจ็บคอ', 1001, 0),
(10056, 65001, 300022, '2022-05-16', 1, 'เจ็บคอ', 1001, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `opd_monthday`
-- (See below for the actual view)
--
CREATE TABLE `opd_monthday` (
`opd_id` int(5)
,`patient_id` int(5)
,`ap_id` int(6)
,`opd_date` date
,`Month` int(2)
,`Day` int(3)
,`dp_id` int(4)
,`Patient_DOB` date
,`old` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `opd_treatment`
--

CREATE TABLE `opd_treatment` (
  `TM_id` int(6) NOT NULL,
  `opd_id` int(5) NOT NULL,
  `Doctor_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `List_id` int(4) DEFAULT NULL,
  `TM_text` text COLLATE utf8_unicode_ci NOT NULL,
  `DP_now` int(4) NOT NULL,
  `TM_datetime` datetime DEFAULT NULL,
  `TM_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `opd_treatment`
--

INSERT INTO `opd_treatment` (`TM_id`, `opd_id`, `Doctor_id`, `List_id`, `TM_text`, `DP_now`, `TM_datetime`, `TM_status`) VALUES
(110000, 10003, 'D0001', 1010, 'Broken Leg', 1001, '2022-05-02 10:12:23', 1),
(110001, 10004, 'D0003', 1003, '-', 1018, '2022-05-13 04:40:56', 1),
(110002, 10004, 'D0001', 1010, '-', 1010, '2022-05-13 04:41:23', 1),
(110003, 10004, 'D0004', 1006, '-', 1007, '2022-05-13 04:41:23', 1),
(110004, 10005, 'D0002', 1006, '', 1016, '2022-05-13 04:53:05', 1),
(110005, 10006, 'D0003', 1003, '', 1019, '2022-05-13 07:16:29', 1),
(110006, 10006, 'D0001', 1004, '', 1007, '2022-05-13 07:16:29', 1),
(110007, 10007, 'D0002', 1002, '', 1005, '2022-05-13 07:16:53', 1),
(110008, 10008, 'D0004', 1010, '', 1016, '2022-05-13 07:17:09', 1),
(110009, 10014, 'D0002', 1004, '', 1016, '2022-05-13 08:23:58', 1),
(110010, 10014, 'D0004', 1002, '', 1014, '2022-05-13 08:23:58', 1),
(110011, 10015, 'D0003', 1009, '', 1010, '2022-05-13 08:23:58', 4),
(110012, 10016, 'D0003', 1007, '', 1002, '2022-05-13 08:23:58', 1),
(110013, 10016, 'D0001', 1003, '', 1017, '2022-05-13 08:23:58', 1),
(110014, 10016, 'D0003', 1002, '', 1015, '2022-05-13 08:23:58', 4),
(110015, 10017, 'D0003', 1002, '', 1003, '2022-05-13 08:23:58', 4),
(110016, 10018, 'D0001', 1006, '', 1001, '2022-05-13 08:23:58', 1),
(110017, 10018, 'D0001', 1003, '', 1016, '2022-05-13 08:23:58', 0),
(110019, 10021, 'D0001', NULL, 'sukrit songserm test', 1001, '2022-05-15 12:35:20', 4),
(110020, 10022, 'D0001', 1012, 'บลาๆๆ1', 1001, '2022-05-15 13:01:05', 4),
(110021, 10023, 'D0001', 1012, 'บลาๆๆๆ2', 1001, '2022-05-15 13:03:12', 4),
(110022, 10024, 'D0001', 1012, 'dd7401', 1001, '2022-05-15 13:04:51', 4),
(110025, 10027, 'D0001', 1012, 'บลาๆๆ3', 1001, '2022-05-15 13:07:52', 4),
(110026, 10028, 'D0001', 1012, 'aaaaaaaaaaa', 1001, '2022-05-15 13:14:28', 4),
(110027, 10029, 'D0001', 1012, 'บลาๆๆๆ4', 1001, '2022-05-15 13:08:37', 4),
(110028, 10030, 'D0001', 1012, 'sfasfdasfasfsdafsdafsdafsafsafaf', 1001, '2022-05-15 13:11:25', 5),
(110029, 10031, 'D0001', 1012, 'จบ', 1001, '2022-05-15 13:12:42', 4),
(110030, 10032, 'D0001', 1012, 'บลาๆๆๆ อะไรก็ว่ากันไป', 1001, '2022-05-15 13:45:23', 4),
(110031, 10033, 'D0001', 1012, 'whitehouse syn', 1001, '2022-05-15 14:00:58', 4),
(110032, 10034, 'D0001', 1012, 'รักษาละ', 1001, '2022-05-15 14:58:50', 4),
(110033, 10035, 'D0001', 1012, 'ทดสอบ1', 1001, '2022-05-15 15:09:50', 4),
(110034, 10036, 'D0001', 1012, 'asfasf', 1001, '2022-05-15 15:16:55', 4),
(110035, 10041, 'D0001', 1012, 'youtube', 1001, '2022-05-15 20:24:53', 4),
(110039, 10048, 'D0001', 1012, 'จบนะขอร้อง1', 1001, '2022-05-15 21:06:42', 6),
(110040, 10049, 'D0001', 1012, 'จบนะขอร้อง2', 1001, '2022-05-15 21:06:51', 6),
(110041, 10050, 'D0001', 1012, 'จบนะขอร้อง3', 1001, '2022-05-15 21:09:21', 5),
(110042, 10051, 'D0001', 1012, 'จบบบบบ', 1001, '2022-05-15 22:06:08', 6),
(110043, 10052, 'D0001', 1012, 'ให้ยาแล้ว', 1001, '2022-05-16 08:56:19', 4),
(110044, 10053, 'D0001', 1012, 'หายแล้ว', 1001, '2022-05-16 08:59:25', 6),
(110045, 10054, 'D0001', 1012, 'มีนัดและให้ยา', 1001, '2022-05-16 09:34:03', 5),
(110046, 10055, 'D0001', 1012, 'มีนัดให้ยา', 1001, '2022-05-16 09:35:21', 4),
(110047, 10056, 'D0001', 1012, 'หายแล้ว', 1001, '2022-05-16 09:38:39', 5);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `Patient_id` int(5) NOT NULL,
  `Patient_CID` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `Patient_prefix` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Patient_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Patient_sname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Patient_gender` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `Patient_DOB` date NOT NULL,
  `Patient_TelNo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Patient_address` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`Patient_id`, `Patient_CID`, `Patient_prefix`, `Patient_name`, `Patient_sname`, `Patient_gender`, `Patient_DOB`, `Patient_TelNo`, `Patient_address`) VALUES
(65000, '1.9199E+12', 'Miss', 'Jean-Lucky', 'Whitehouse', 'F', '2019-03-06', '0674409816', '9 Vine Court, Fakenham 10146'),
(65001, '1.9199E+12', 'Miss', 'Casper', 'Rees', 'F', '2011-04-24', '0945448771', '31 Bro Llethi, Llanarth'),
(65002, '1.9199E+12', 'Mister', 'Shelley', 'Barajas', 'M', '2018-01-01', '0901472812', 'Lamorna, 12 Tinnocks Lane, St Lawrence'),
(65003, '1.9199E+12', 'Mister', 'Tulisa', 'Cervantes', 'M', '1991-02-14', '0652181588', '44 Sherfield Drive, Newcastle Upon Tyne'),
(65004, '1.9199E+12', 'Miss', 'Dotty', 'Stout', 'F', '2007-10-27', '0688684701', '23 Galmington Road, Taunton'),
(65005, '1.9199E+12', 'Miss', 'Madeleine', 'Wilks', 'F', '2015-08-03', '0984733107', '6 Fairview Avenue, Port Talbot'),
(65006, '1.9199E+12', 'Miss', 'Kirandeep', 'Knox', 'F', '1991-11-25', '0907393197', 'The Studio, 22 Pentwood Avenue, Arnold'),
(65007, '1.9199E+12', 'Miss', 'Kiyan', 'Davies', 'F', '2005-10-06', '0947360874', '3 Plas Road, Pontardawe'),
(65008, '1.9199E+12', 'Mister', 'Keelan', 'Walter', 'M', '2001-07-21', '0930299417', 'The Oaks, Basketts Lane, Yarmouth'),
(65009, '1.9199E+12', 'Mister', 'Kerry', 'Grant', 'M', '1994-06-30', '0999833470', '20 Hollin Park Place, Leeds'),
(65010, '1.9199E+12', 'Mister', 'Tommie', 'Atkins', 'M', '2009-07-18', '0932570030', 'Burnham, 40 Queens Road, Lyndhurst'),
(65011, '1.9199E+12', 'Miss', 'Jae', 'Macdonald', 'F', '1996-02-26', '0819898392', '41 The Brambles, Berkeley'),
(65012, '1.9199E+12', 'Miss', 'Kiana', 'Boyle', 'F', '2002-06-07', '0823364659', 'Flat 23, Medway Court, Judd Street, London'),
(65013, '1.9199E+12', 'Mister', 'Dominique', 'Coles', 'M', '2020-11-18', '0831960487', 'Waterloo Cottage, Kingsbury Episcopi'),
(65014, '1.9199E+12', 'Miss', 'Henri', 'Clifford', 'F', '2008-08-27', '0963577896', '41 Devizes Road, Swindon'),
(65015, '1.9199E+12', 'Mister', 'Cosmo', 'Sexton', 'M', '1998-07-28', '0957972370', '6 Temeside Close, Tenbury Wells'),
(65016, '1.9199E+12', 'Mister', 'Ahmad', 'Sawyer', 'M', '2005-06-23', '0973985992', 'Oakside Cottage, Hawkhurst Road, Cranbrook'),
(65017, '1.9199E+12', 'Miss', 'Alice', 'Armstrong', 'F', '2018-08-12', '0971141482', 'Yardley, 10 The Bishops Avenue, London'),
(65018, '1.9199E+12', 'Miss', 'Kit', 'Rocha', 'F', '2019-09-06', '0904377559', '65 Clyfford Road, Ruislip'),
(65019, '1.9199E+12', 'Mister', 'Marta', 'Livingston', 'M', '2003-07-22', '0931508550', '3 Red Barns Cottages, Red Barns Crescent, Bamburgh'),
(65020, '1.9199E+12', 'Mister', 'Ritchie', 'Daniel', 'M', '2012-10-25', '0679186804', '12 Upcott Mead Road, Tiverton'),
(65021, '1.9199E+12', 'Miss', 'Madelyn', 'Nieves', 'F', '2009-03-29', '0802624704', '5 Station Road, Arlesey'),
(65022, '1.9199E+12', 'Miss', 'Korey', 'Oneal', 'F', '1992-07-23', '0989457347', '22 Chapman Drive, Binfield'),
(65023, '1.9199E+12', 'Miss', 'Dhruv', 'Delacruz', 'F', '1995-02-06', '0839647222', 'Efail Bach, Dulas'),
(65024, '1.9199E+12', 'Mister', 'Deniz', 'Brien', 'M', '2005-03-01', '0869406325', '5 Ffordd Deg, Llanbedrgoch'),
(65025, '1.9199E+12', 'Miss', 'Aniqa', 'Shaffer', 'F', '2017-02-16', '0669064982', '62 Barville Close, London'),
(65026, '1.9199E+12', 'Miss', 'Isobella', 'Allison', 'F', '2022-09-28', '0976570900', 'Avago, Knightlands Lane, Long Sutton'),
(65027, '1.9199E+12', 'Mister', 'Luca', 'Swanson', 'M', '2012-11-11', '0883058990', 'Brigg Fair, Gorse Hill Road, Virginia Water'),
(65028, '1.9199E+12', 'Mister', 'Inaayah', 'Burnett', 'M', '1995-08-02', '0645271565', '33 Holland Gardens, Watford'),
(65029, '1.9199E+12', 'Mister', 'Francesco', 'Cresswell', 'M', '2002-12-21', '0999472023', '53 Aberdeen Avenue, Cambridge'),
(65030, '1.9199E+12', 'Mister', 'Samantha', 'Golden', 'M', '2002-01-08', '0618051431', '2 Dot Hill Close, North Newbald'),
(65031, '1.9199E+12', 'Mister', 'Laaibah', 'Charles', 'M', '2000-07-19', '0647282985', '6 Garwoods, Seaward Road, Swanage'),
(65032, '1.9199E+12', 'Miss', 'Reem', 'Schneider', 'F', '2003-11-25', '0908540454', '29 Saltash Road, Hull'),
(65033, '1.9199E+12', 'Mister', 'Ainsley', 'Rose', 'M', '2007-02-08', '0666082612', '6 Reis Place, South Tottenham'),
(65034, '1.9199E+12', 'Miss', 'Joey', 'Maddox', 'F', '2001-07-20', '0603965281', 'St Georges Nursery School, William Street, Leicester'),
(65035, '1.9199E+12', 'Miss', 'Nikhil', 'Pemberton', 'F', '2022-06-05', '0830838135', '117B Ilchester Crescent, Bristol'),
(65036, '1.9199E+12', 'Miss', 'Lester', 'Orr', 'F', '2001-06-12', '0856027667', 'Flat 7, Orchard House, Hazlitt Drive, Maidstone'),
(65037, '1.9199E+12', 'Mister', 'Amisha', 'Turnbull', 'M', '2011-07-31', '0966962355', '3 Stone Pits, Ramsbottom'),
(65038, '1.9199E+12', 'Miss', 'Danial', 'Farmer', 'F', '1997-05-03', '0951739611', '18 St Georges Drive, Westcliff-On-Sea'),
(65039, '1.9199E+12', 'Miss', 'Aalia', 'Fulton', 'F', '2004-03-28', '0925043789', '24 Milton Road, Uxbridge'),
(65040, '1.9199E+12', 'Miss', 'Tamar', 'Cochran', 'F', '1996-02-25', '0931674481', '3 Alpha Terrace, Nottingham'),
(65041, '1.9199E+12', 'Mister', 'Oliwia', 'Zamora', 'M', '2019-09-06', '0689149822', '31 Fullers Mead, Harlow'),
(65042, '1.9199E+12', 'Mister', 'Luqman', 'Cohen', 'M', '2016-02-25', '0679206050', 'Sion Hall, 56 Victoria Embankment, London'),
(65043, '1.9199E+12', 'Mister', 'Star', 'Khan', 'M', '1996-05-22', '0915939207', '8 North Close, Kilkhampton'),
(65044, '1.9199E+12', 'Miss', 'Valentina', 'Maynard', 'F', '1998-10-10', '0691738981', '2 Graham Lane, Huddersfield'),
(65045, '1.9199E+12', 'Mister', 'Safiyyah', 'Palacios', 'M', '2019-06-17', '0863662753', '1 Fairfax Road, Kidlington'),
(65046, '1.9199E+12', 'Miss', 'Arsalan', 'Hernandez', 'F', '1992-03-02', '0623100223', '7 Lyndhurst View, Dukinfield'),
(65047, '1.9199E+12', 'Mister', 'Meadow', 'Chapman', 'M', '1996-10-13', '0868570807', '7 Derwent Close, Attenborough'),
(65048, '1.9199E+12', 'Miss', 'Asher', 'Dunn', 'F', '1999-12-07', '0626202896', '7 Newcastle Street, Merthyr Tydfil'),
(65049, '1.9199E+12', 'Mister', 'Angelina', 'Willis', 'M', '2021-04-15', '0859684288', '1 Bakers View, Newton Abbot'),
(65050, '1.9199E+12', 'Miss', 'Aleena', 'Hahn', 'F', '1998-01-12', '0908634707', '35 Severn Way, Bedford'),
(65051, '1.9199E+12', 'Mister', 'David', 'Bright', 'M', '2003-06-18', '0691337964', 'May Cottage, Kitebrook, Little Compton'),
(65052, '1.9199E+12', 'Mister', 'Nettie', 'Lee', 'M', '2004-11-26', '0828018741', '11 York Avenue, Wirral'),
(65053, '1.9199E+12', 'Miss', 'Genevieve', 'Gaines', 'F', '2005-07-31', '0639852175', '91 West Way, Hounslow'),
(65054, '1.9199E+12', 'Miss', 'Candice', 'Roth', 'F', '1991-08-05', '0983968898', '1 Riccall Nook, Bradford'),
(65055, '1.9199E+12', 'Mister', 'Skylar', 'Nichols', 'M', '1994-03-12', '0833439978', '32 Sunny Bank Road, Oldbury'),
(65056, '1.9199E+12', 'Mister', 'Fenton', 'Shepard', 'M', '1995-09-22', '0862288847', '47 The Old Village, Huntington'),
(65057, '1.9199E+12', 'Miss', 'Kaylan', 'Evans', 'F', '2003-08-31', '0862498306', '32 Newton Road, Leeds'),
(65058, '1.9199E+12', 'Miss', 'Rhianne', 'Gibbons', 'F', '2018-05-17', '0811500263', '13 Kelly Street, Workington'),
(65059, '1.9199E+12', 'Mister', 'Alyssa', 'Barrow', 'M', '2002-03-08', '0692115525', '21 Tinker Lane, Meltham'),
(65060, '1.9199E+12', 'Miss', 'Hubert', 'Kaufman', 'F', '2008-08-20', '0982403567', 'Unit 4 Sovereign Business Park, Poole'),
(65061, '1.9199E+12', 'Miss', 'Shea', 'Phan', 'F', '1999-07-06', '0667370544', '4 Wood Street, Longwood'),
(65062, '1.9199E+12', 'Miss', 'Lewis', 'Perkins', 'F', '1991-06-26', '0903844922', '3 Gilwern Close, Chester'),
(65063, '1.9199E+12', 'Mister', 'Eoin', 'Stafford', 'M', '2005-12-23', '0647139187', 'Low House, New Hutton'),
(65064, '1.9199E+12', 'Miss', 'Hamid', 'Friedman', 'F', '1993-03-29', '0846414859', '50 Taylor Street, Hollingworth'),
(65065, '1.9199E+12', 'Miss', 'Jodi', 'Kirby', 'F', '2018-01-23', '0812901456', 'Crows Nest, Malting Lane, Much Hadham'),
(65066, '1.9199E+12', 'Mister', 'Emily-Rose', 'Sharma', 'M', '1999-01-18', '0949875648', 'Horslode Fen Farm, Stocking Drove, Chatteris'),
(65067, '1.9199E+12', 'Mister', 'Atif', 'Townsend', 'M', '2006-01-07', '0988424430', '58 Silvester Road, London'),
(65068, '1.9199E+12', 'Mister', 'Karis', 'Payne', 'M', '1995-04-14', '0929971767', '6A Stanfield Road, Bournemouth'),
(65069, '1.9199E+12', 'Miss', 'Issa', 'Gallegos', 'F', '2009-03-01', '0630012563', 'The Vicarage, St Barnabas Close, Hereford'),
(65070, '1.9199E+12', 'Mister', 'Rubie', 'Lowe', 'M', '2012-02-01', '0675342198', '6 Westfield Close, Cheam'),
(65071, '1.9199E+12', 'Miss', 'Romany', 'Arroyo', 'F', '2006-03-30', '0836116884', '4 Cross Lee Gate, Todmorden'),
(65072, '1.9199E+12', 'Mister', 'Asma', 'Davenport', 'M', '2009-06-28', '0988801100', 'Russet Patch, Criers Lane, Five Ashes'),
(65073, '1.9199E+12', 'Miss', 'Yvette', 'Howell', 'F', '2009-05-31', '0857561863', '23 Percy Bryant Road, Sunbury-On-Thames'),
(65074, '1.9199E+12', 'Mister', 'Craig', 'Draper', 'M', '2015-12-06', '0680428102', '33A Radstock Road, Liverpool'),
(65075, '1.9199E+12', 'Miss', 'Safiya', 'Abbott', 'F', '1999-06-30', '0657708063', 'Unit D, Radford Business Centre, Billericay'),
(65076, '1.9199E+12', 'Miss', 'Liberty', 'Paterson', 'F', '2001-11-18', '0854802302', 'The Cottage, Mill Lane, Shirley'),
(65077, '1.9199E+12', 'Miss', 'Isla-Rae', 'Parra', 'F', '1990-08-05', '0867358400', 'Pen Garreg, Soar'),
(65078, '1.9199E+12', 'Mister', 'Coen', 'Carr', 'M', '1991-07-16', '0963839878', '2 Grange Close, West Molesey'),
(65079, '1.9199E+12', 'Mister', 'Gracie-May', 'Patterson', 'M', '2007-01-05', '0803909288', 'Tremont Gardens, The Terrace, Lostwithiel'),
(65080, '1.9199E+12', 'Mister', 'Yu', 'Valdez', 'M', '1990-02-03', '0654810985', 'Paddocks Brendon, Holsworthy'),
(65081, '1.9199E+12', 'Miss', 'Jermaine', 'Hopkins', 'F', '1993-05-18', '0631722757', '83 Landswood Close, Birmingham'),
(65082, '1.9199E+12', 'Miss', 'Muskaan', 'Lewis', 'F', '2010-09-06', '0828842541', '22A Summerfields Way South, Ilkeston'),
(65083, '1.9199E+12', 'Miss', 'Jacqueline', 'Hayden', 'F', '1993-10-28', '0926535335', '70 Swan Drive, Droitwich'),
(65084, '1.9199E+12', 'Mister', 'Saqlain', 'Reeve', 'M', '1991-02-14', '0871565759', '17 Regent Street, Brighton'),
(65085, '1.9199E+12', 'Miss', 'Shana', 'Shah', 'F', '2005-07-02', '0635837001', 'The Coach House, Bibstone'),
(65086, '1.9199E+12', 'Mister', 'Leroy', 'Humphrey', 'M', '1997-11-23', '0867393809', '84 Louise Road, Northampton'),
(65087, '1.9199E+12', 'Miss', 'Gabriela', 'Drake', 'F', '1991-02-21', '0982672902', 'Manor Cottages, Foxholes'),
(65088, '1.9199E+12', 'Miss', 'Teddy', 'Marks', 'F', '1992-12-03', '0893785013', 'Meadowside, Water Lane, Garboldisham'),
(65089, '1.9199E+12', 'Miss', 'Ridwan', 'Dodd', 'F', '1999-11-22', '0832604067', 'Fayrstede, Village Road, Denham'),
(65090, '1.9199E+12', 'Miss', 'Rayan', 'Wyatt', 'F', '1997-08-18', '0842524114', '18 Welbeck Road, Bolton'),
(65091, '1.9199E+12', 'Mister', 'Awais', 'Morris', 'M', '2009-07-08', '0858856716', '4 Hadrians Gate, Brackley'),
(65092, '1.9199E+12', 'Mister', 'Deacon', 'Porter', 'M', '2006-11-14', '0634374194', '18 Holland Road, Hartlepool'),
(65093, '1.9199E+12', 'Miss', 'Tre', 'Dolan', 'F', '2004-09-11', '0923220681', 'The Goat Shed, Lea Lane, Otterton'),
(65094, '1.9199E+12', 'Miss', 'Brax', 'Barnett', 'F', '2009-03-25', '0894394187', '17 Scotch Street, Carlisle'),
(65095, '1.9199E+12', 'Miss', 'Reece', 'Armitage', 'F', '1999-07-29', '0620423288', 'Sunnycroft, Burn Lane, Humshaugh'),
(65096, '1.9199E+12', 'Miss', 'Charlie', 'Rodrigues', 'F', '2001-12-08', '0996450066', '3 Wentworth Court, Albert Road, Buckhurst Hill'),
(65097, '1.9199E+12', 'Mister', 'Shanae', 'Glenn', 'M', '1995-04-28', '0649437254', '15 Woodfield Drive, Norton Canes'),
(65098, '1.9199E+12', 'Mister', 'Ashlea', 'Marsh', 'M', '2019-04-05', '0873062644', '27 Coverdale Court, Newton Aycliffe'),
(65099, '1.9199E+12', 'Miss', 'Sia', 'Partridge', 'F', '1999-01-31', '0967579219', '7 Fir Grove, Kilgetty');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `Pre_id` int(6) NOT NULL,
  `TM_id` int(6) NOT NULL,
  `Drug_id` int(5) NOT NULL,
  `Pre_dose` int(3) NOT NULL,
  `Pre_datetime` datetime NOT NULL,
  `Patient_status` int(1) NOT NULL,
  `Pre_status` int(1) NOT NULL,
  `Bill_no` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`Pre_id`, `TM_id`, `Drug_id`, `Pre_dose`, `Pre_datetime`, `Patient_status`, `Pre_status`, `Bill_no`) VALUES
(200004, 110000, 40001, 2, '2022-05-02 13:17:02', 0, 1, 990000),
(200005, 110000, 30004, 3, '2022-05-02 13:17:02', 0, 1, 990000),
(200006, 110001, 30003, 5, '2022-05-13 04:42:35', 0, 1, 990001),
(200007, 110001, 40002, 2, '2022-05-13 04:43:00', 0, 1, 990001),
(200008, 110004, 30001, 10, '2022-05-13 04:53:44', 0, 0, 990002),
(200009, 110004, 30005, 3, '2022-05-13 04:53:44', 0, 0, 990002),
(200010, 110005, 50001, 7, '2022-05-13 07:26:39', 0, 1, 990003),
(200011, 110006, 40001, 8, '2022-05-13 08:08:37', 0, 0, 990004),
(200012, 110007, 20004, 7, '2022-05-13 08:09:42', 0, 0, 990005),
(200013, 110007, 30002, 10, '2022-05-13 08:09:42', 0, 0, 990005),
(200014, 110008, 20002, 2, '2022-05-13 08:16:56', 0, 1, 990006),
(200015, 110009, 30002, 3, '2022-05-13 08:32:46', 0, 0, 990007),
(200016, 110011, 20006, 2, '2022-05-13 08:33:34', 0, 0, 990008),
(200017, 110011, 10001, 3, '2022-05-13 08:33:34', 0, 0, 990008),
(200018, 110012, 40003, 8, '2022-05-13 08:34:55', 0, 0, 990009),
(200019, 110013, 50003, 3, '2022-05-13 08:34:55', 0, 0, 990009),
(200020, 110014, 50002, 9, '2022-05-13 08:34:55', 0, 0, 990009),
(200021, 110015, 20002, 2, '2022-05-13 08:37:28', 0, 1, 990010),
(200022, 110016, 20005, 10, '2022-05-13 08:37:28', 0, 1, 990011),
(200028, 110020, 20003, 4, '2022-05-15 12:56:00', 0, 0, 990013),
(200029, 110020, 30004, 5, '2022-05-15 12:56:00', 0, 0, 990013),
(200030, 110020, 40002, 6, '2022-05-15 12:56:00', 0, 0, 990013),
(200031, 110020, 20003, 4, '2022-05-15 13:01:05', 0, 0, 990014),
(200032, 110020, 30004, 5, '2022-05-15 13:01:05', 0, 0, 990014),
(200033, 110020, 40002, 6, '2022-05-15 13:01:05', 0, 0, 990014),
(200034, 110021, 40001, 56, '2022-05-15 13:03:12', 0, 0, 990015),
(200035, 110022, 10001, 22, '2022-05-15 13:04:51', 0, 0, 990016),
(200036, 110025, 20003, 5, '2022-05-15 13:07:52', 0, 0, 990017),
(200037, 110027, 40003, 5, '2022-05-15 13:08:37', 0, 0, 990018),
(200038, 110028, 20001, 33, '2022-05-15 13:11:25', 0, 0, 990019),
(200039, 110029, 20001, 3, '2022-05-15 13:12:42', 0, 0, 990020),
(200040, 110029, 40001, 4, '2022-05-15 13:12:42', 0, 0, 990020),
(200041, 110029, 30005, 5, '2022-05-15 13:12:42', 0, 0, 990020),
(200042, 110026, 40001, 12, '2022-05-15 13:14:29', 0, 0, 990021),
(200043, 110030, 20001, 12, '2022-05-15 13:45:23', 0, 1, 990022),
(200044, 110030, 40003, 12, '2022-05-15 13:45:23', 0, 1, 990022),
(200045, 110030, 30005, 12, '2022-05-15 13:45:23', 0, 1, 990022),
(200046, 110031, 20001, 2, '2022-05-15 14:00:58', 0, 1, 990023),
(200047, 110031, 20002, 5, '2022-05-15 14:00:58', 0, 1, 990023),
(200048, 110031, 20003, 12, '2022-05-15 14:00:58', 0, 1, 990023),
(200049, 110032, 10001, 5, '2022-05-15 14:58:50', 0, 1, 990024),
(200050, 110032, 20001, 5, '2022-05-15 14:58:50', 0, 1, 990024),
(200051, 110032, 20002, 5, '2022-05-15 14:58:50', 0, 1, 990024),
(200052, 110033, 10001, 5, '2022-05-15 15:09:50', 0, 1, 990025),
(200053, 110033, 20001, 6, '2022-05-15 15:09:50', 0, 1, 990025),
(200054, 110033, 20002, 7, '2022-05-15 15:09:50', 0, 1, 990025),
(200055, 110034, 10001, 7, '2022-05-15 15:16:55', 0, 1, 990026),
(200056, 110035, 10001, 12, '2022-05-15 20:24:53', 0, 1, 990027),
(200057, 110035, 20001, 12, '2022-05-15 20:24:53', 0, 1, 990027),
(200058, 110035, 20002, 12, '2022-05-15 20:24:53', 0, 1, 990027),
(200059, 110041, 20001, 12, '2022-05-15 21:09:21', 0, 1, 990030),
(200060, 110043, 10001, 12, '2022-05-16 08:56:19', 0, 1, 990032),
(200061, 110043, 30005, 12, '2022-05-16 08:56:19', 0, 1, 990032),
(200062, 110043, 40003, 12, '2022-05-16 08:56:19', 0, 1, 990032),
(200063, 110045, 10001, 1, '2022-05-16 09:34:03', 0, 0, 990034),
(200064, 110045, 20003, 0, '2022-05-16 09:34:03', 0, 0, 990034),
(200065, 110045, 40001, 0, '2022-05-16 09:34:03', 0, 0, 990034),
(200066, 110046, 20001, 12, '2022-05-16 09:35:21', 0, 1, 990035),
(200067, 110046, 40002, 13, '2022-05-16 09:35:21', 0, 1, 990035),
(200068, 110046, 40001, 14, '2022-05-16 09:35:21', 0, 1, 990035),
(200069, 110047, 20001, 13, '2022-05-16 09:38:39', 0, 1, 990036);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `Room_id` int(6) NOT NULL,
  `Room_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Room_building` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Room_floor` int(2) NOT NULL,
  `Room_price` int(5) NOT NULL,
  `Room_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`Room_id`, `Room_type`, `Room_building`, `Room_floor`, `Room_price`, `Room_status`) VALUES
(100001, 'Deluxe', 'Building1', 10, 12500, 1),
(100002, 'Deluxe', 'Building1', 10, 12500, 1),
(100003, 'Deluxe', 'Building1', 10, 12500, 1),
(200001, 'Specialty', 'Building2', 9, 8000, 1),
(200002, 'Specialty Room', 'Building2', 9, 8000, 1),
(200003, 'Nursery & Labor Delivery Room', 'Building2', 10, 14800, 1),
(200004, 'Nursery & Labor Delivery Room', 'Building2', 10, 14800, 1),
(300001, 'Superior Room', 'Building3', 12, 22500, 1),
(300002, 'Superior Room', 'Building3', 12, 22500, 1),
(300003, 'Critical Care', 'Building3', 10, 17000, 1),
(300004, 'Critical Care', 'Building3', 10, 17000, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `top_spender`
-- (See below for the actual view)
--
CREATE TABLE `top_spender` (
`bill_no` int(6)
,`patient_id` int(5)
,`patient_name` varchar(50)
,`patient_sname` varchar(50)
,`bill_charge` int(6)
);

-- --------------------------------------------------------

--
-- Table structure for table `treatment_list`
--

CREATE TABLE `treatment_list` (
  `List_id` int(4) NOT NULL,
  `List_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `List_price` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `treatment_list`
--

INSERT INTO `treatment_list` (`List_id`, `List_name`, `List_price`) VALUES
(1001, 'CT Brain', 7200),
(1002, 'CT Chest', 9600),
(1003, 'CT Shoulder', 7200),
(1004, 'CT Knee', 7200),
(1005, 'CT Whole Abdomen', 16800),
(1006, 'MRI Spine', 11000),
(1007, 'MRI Brain', 11000),
(1008, 'MRI Brain + MRA Brain', 19000),
(1009, 'MRI Whole Abdomen ', 19000),
(1010, 'X-ray', 600),
(1011, 'Saline Infusions', 1000),
(1012, 'ตรวจทั่วไป', 700);

-- --------------------------------------------------------

--
-- Structure for view `age`
--
DROP TABLE IF EXISTS `age`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `age`  AS SELECT `patient`.`Patient_DOB` AS `Patient_DOB`, timestampdiff(YEAR,`patient`.`Patient_DOB`,curdate()) AS `old` FROM `patient``patient`  ;

-- --------------------------------------------------------

--
-- Structure for view `departmentt`
--
DROP TABLE IF EXISTS `departmentt`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `departmentt`  AS SELECT `d`.`DP_id` AS `DP_id`, `d`.`DP_name` AS `DP_name`, count(`d`.`DP_id`) AS `frequency`, avg(`a`.`old`) AS `YearOld` FROM ((((`age` `a` join `patient` `p` on(`a`.`Patient_DOB` = `p`.`Patient_DOB`)) join `opd` `o` on(`p`.`Patient_id` = `o`.`Patient_id`)) join `opd_treatment` `t` on(`o`.`OPD_id` = `t`.`opd_id`)) join `department` `d` on(`t`.`DP_now` = `d`.`DP_id`)) GROUP BY `d`.`DP_id``DP_id`  ;

-- --------------------------------------------------------

--
-- Structure for view `opd_monthday`
--
DROP TABLE IF EXISTS `opd_monthday`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `opd_monthday`  AS SELECT `o`.`OPD_id` AS `opd_id`, `o`.`Patient_id` AS `patient_id`, `o`.`AP_id` AS `ap_id`, `o`.`OPD_Date` AS `opd_date`, extract(month from `o`.`OPD_Date`) AS `Month`, extract(day from `o`.`OPD_Date`) AS `Day`, `o`.`DP_id` AS `dp_id`, `p`.`Patient_DOB` AS `Patient_DOB`, timestampdiff(YEAR,`p`.`Patient_DOB`,curdate()) AS `old` FROM (`patient` `p` join `opd` `o`) WHERE `p`.`Patient_id` = `o`.`Patient_id``Patient_id`  ;

-- --------------------------------------------------------

--
-- Structure for view `top_spender`
--
DROP TABLE IF EXISTS `top_spender`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `top_spender`  AS SELECT DISTINCT `b`.`Bill_no` AS `bill_no`, `p`.`Patient_id` AS `patient_id`, `p`.`Patient_name` AS `patient_name`, `p`.`Patient_sname` AS `patient_sname`, `b`.`Bill_charge` AS `bill_charge` FROM ((((`bill` `b` join `prescription` `ps` on(`b`.`Bill_no` = `ps`.`Bill_no`)) join `opd_treatment` `t` on(`t`.`TM_id` = `ps`.`TM_id`)) join `opd` `o` on(`o`.`OPD_id` = `t`.`opd_id`)) join `patient` `p` on(`p`.`Patient_id` = `o`.`Patient_id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`AP_id`),
  ADD KEY `appointment_ibfk_1` (`DP_id`),
  ADD KEY `appointment_ibfk_2` (`OPDold_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`Bill_no`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DP_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`Doctor_id`),
  ADD KEY `Doctor_DP` (`Doctor_DP`);

--
-- Indexes for table `drug`
--
ALTER TABLE `drug`
  ADD PRIMARY KEY (`Drug_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_id`);

--
-- Indexes for table `ipd`
--
ALTER TABLE `ipd`
  ADD PRIMARY KEY (`ipd_id`),
  ADD KEY `Room_id` (`Room_id`),
  ADD KEY `ipd_ibfk_3` (`Patient_id`);

--
-- Indexes for table `ipd_treatment`
--
ALTER TABLE `ipd_treatment`
  ADD PRIMARY KEY (`IPDTM_id`),
  ADD KEY `List_id` (`List_id`),
  ADD KEY `Doctor_id` (`Doctor_id`),
  ADD KEY `ipd_treatment_ibfk_4` (`IPD_id`);

--
-- Indexes for table `opd`
--
ALTER TABLE `opd`
  ADD PRIMARY KEY (`OPD_id`),
  ADD KEY `DP_id` (`DP_id`),
  ADD KEY `opd_ibfk_4` (`Patient_id`),
  ADD KEY `opd_ibfk_5` (`AP_id`);

--
-- Indexes for table `opd_treatment`
--
ALTER TABLE `opd_treatment`
  ADD PRIMARY KEY (`TM_id`),
  ADD KEY `Doctor_id` (`Doctor_id`),
  ADD KEY `List_id` (`List_id`),
  ADD KEY `DP_now` (`DP_now`),
  ADD KEY `opd_treatment_ibfk_5` (`opd_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`Patient_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`Pre_id`),
  ADD KEY `Drug_id` (`Drug_id`),
  ADD KEY `prescription_ibfk_6` (`Bill_no`),
  ADD KEY `prescription_ibfk_5` (`TM_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`Room_id`);

--
-- Indexes for table `treatment_list`
--
ALTER TABLE `treatment_list`
  ADD PRIMARY KEY (`List_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `AP_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300023;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `Bill_no` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=990037;

--
-- AUTO_INCREMENT for table `ipd`
--
ALTER TABLE `ipd`
  MODIFY `ipd_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20004;

--
-- AUTO_INCREMENT for table `ipd_treatment`
--
ALTER TABLE `ipd_treatment`
  MODIFY `IPDTM_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220000;

--
-- AUTO_INCREMENT for table `opd`
--
ALTER TABLE `opd`
  MODIFY `OPD_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10057;

--
-- AUTO_INCREMENT for table `opd_treatment`
--
ALTER TABLE `opd_treatment`
  MODIFY `TM_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110048;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `Patient_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65103;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `Pre_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200070;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`DP_id`) REFERENCES `department` (`DP_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`OPDold_id`) REFERENCES `opd` (`OPD_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`Doctor_DP`) REFERENCES `department` (`DP_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ipd`
--
ALTER TABLE `ipd`
  ADD CONSTRAINT `ipd_ibfk_2` FOREIGN KEY (`Room_id`) REFERENCES `room` (`Room_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ipd_ibfk_3` FOREIGN KEY (`Patient_id`) REFERENCES `patient` (`Patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ipd_treatment`
--
ALTER TABLE `ipd_treatment`
  ADD CONSTRAINT `ipd_treatment_ibfk_2` FOREIGN KEY (`List_id`) REFERENCES `treatment_list` (`List_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ipd_treatment_ibfk_3` FOREIGN KEY (`Doctor_id`) REFERENCES `doctor` (`Doctor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ipd_treatment_ibfk_4` FOREIGN KEY (`IPD_id`) REFERENCES `ipd` (`ipd_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `opd`
--
ALTER TABLE `opd`
  ADD CONSTRAINT `opd_ibfk_3` FOREIGN KEY (`DP_id`) REFERENCES `department` (`DP_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `opd_ibfk_4` FOREIGN KEY (`Patient_id`) REFERENCES `patient` (`Patient_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `opd_ibfk_5` FOREIGN KEY (`AP_id`) REFERENCES `appointment` (`AP_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `opd_treatment`
--
ALTER TABLE `opd_treatment`
  ADD CONSTRAINT `opd_treatment_ibfk_2` FOREIGN KEY (`Doctor_id`) REFERENCES `doctor` (`Doctor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `opd_treatment_ibfk_3` FOREIGN KEY (`List_id`) REFERENCES `treatment_list` (`List_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `opd_treatment_ibfk_4` FOREIGN KEY (`DP_now`) REFERENCES `department` (`DP_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `opd_treatment_ibfk_5` FOREIGN KEY (`opd_id`) REFERENCES `opd` (`OPD_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_3` FOREIGN KEY (`Drug_id`) REFERENCES `drug` (`Drug_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prescription_ibfk_6` FOREIGN KEY (`Bill_no`) REFERENCES `bill` (`Bill_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
