-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2020 at 06:51 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `docpatportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Mobile` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`Name`, `Email`, `Password`, `Mobile`) VALUES
('Fahim Illusion', 'fahim121@gmail.com', 'fahim121', '01833523479'),
('Sadi', 'sadi121@gmail.com', 'safwan121', '01717123342');

-- --------------------------------------------------------

--
-- Table structure for table `appointmenttable`
--

CREATE TABLE `appointmenttable` (
  `PatientEmail` varchar(233) NOT NULL,
  `DoctorEmail` varchar(233) NOT NULL,
  `PatientName` varchar(233) NOT NULL,
  `DoctorName` varchar(233) NOT NULL,
  `AppointmentDate` date NOT NULL,
  `ShortDescription` varchar(512) DEFAULT NULL,
  `Advice` varchar(512) DEFAULT NULL,
  `PatientAge` int(233) NOT NULL,
  `Slot` varchar(233) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointmenttable`
--

INSERT INTO `appointmenttable` (`PatientEmail`, `DoctorEmail`, `PatientName`, `DoctorName`, `AppointmentDate`, `ShortDescription`, `Advice`, `PatientAge`, `Slot`) VALUES
('', '', 'Fahim Kobra', 'Ilias Kobra', '2020-09-29', 'asdasd', NULL, 19, '9am-1pm'),
('', '', 'Fahim Kobra', 'Ilias Kobra', '2020-09-23', 'HeadAche', NULL, 19, '9am-1pm'),
('', '', 'Fahim Kobra', 'Ilias Kobra', '2020-09-22', 'Headache, Dyhoria', NULL, 21, '9am-1pm'),
('patientkobra123@gmail.com', 'fahmida121@gmail.com', 'Fahim Kobra', 'Fahmida Alam', '2020-09-23', 'Headache', ' Napa Extra', 19, '2pm-5pm'),
('kabir121@gmail.com', 'fahmida121@gmail.com', 'Ahsan Kabir', 'Fahmida Alam', '2020-09-30', 'Headache', ' Meet me at 4.30P.M', 21, '2pm-5pm'),
('kabir121@gmail.com', 'asgar234@gmail.com', 'Ahsan Kabir', 'Asgar Ali', '2020-09-25', 'Acute pain in hands', ' Okey, come at 4.P.M\r\n', 23, '2-5pm'),
('kabir121@gmail.com', 'asgar234@gmail.com', 'Ahsan Kabir', 'Asgar Ali', '2020-09-25', 'Acute pain in hands', ' Okey, come at 4.P.M\r\n', 23, '2-5pm'),
('kabir121@gmail.com', 'fahmida121@gmail.com', 'Ahsan Kabir', 'Fahmida Alam', '2020-09-30', 'Heart Disease', NULL, 21, '2pm-5pm');

-- --------------------------------------------------------

--
-- Table structure for table `doctorrequest_table`
--

CREATE TABLE `doctorrequest_table` (
  `Name` varchar(233) NOT NULL,
  `Address` varchar(233) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `MobileNo` bigint(15) NOT NULL,
  `Email` varchar(233) NOT NULL,
  `Password` varchar(233) NOT NULL,
  `Department` varchar(233) NOT NULL,
  `Location` varchar(233) NOT NULL,
  `FileName` varchar(233) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `maindoctable`
--

CREATE TABLE `maindoctable` (
  `Name` varchar(233) NOT NULL,
  `Address` varchar(233) NOT NULL,
  `Gender` varchar(233) NOT NULL,
  `MobileNo` varchar(233) NOT NULL,
  `Email` varchar(233) NOT NULL,
  `Department` text NOT NULL,
  `Location` varchar(233) NOT NULL,
  `Password` varchar(233) NOT NULL,
  `Slot` varchar(233) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maindoctable`
--

INSERT INTO `maindoctable` (`Name`, `Address`, `Gender`, `MobileNo`, `Email`, `Department`, `Location`, `Password`, `Slot`) VALUES
('Sagor', 'Bashundhara, G block', 'Male', '1772323421', 'sagor121@gmail.com', 'surgery', ' Location1 ', '', NULL),
('Sagor', 'Bashundhara, G block', 'Male', '1772323421', 'sagor121@gmail.com', 'surgery', ' Location1 ', '', NULL),
('Ilias Kobra', 'Bashundhara, G Block, 23 Road', 'Male', '0184534567', 'kobra121@gmail.com', 'cardiologist', 'Mirpur Popular Hospital, Dhaka', 'abc121', '9am-1pm'),
('Siamul Islam', 'Mirpur 2', 'Male', '1918181812', 'siamul121@gmail.com', 'orthopedic', 'Mirpur Popular Hospital,Dhaka', 'siamul121', NULL),
('Fahmida Alam', 'Baridhara G Block', 'Male', '182232323', 'fahmida121@gmail.com', 'gynecologist', 'Baridhara General, Hospital', 'fahmida', '2pm-5pm'),
('Pritom', 'Ahmed', 'Male', '1912323212', 'pritom132@gmail.com', 'medicine', 'Ibne-Sina Diagnostic Centre, Dhaka', 'pritom132', NULL),
('Asgar Ali', 'Motijheel', 'Male', '1833432322', 'asgar234@gmail.com', 'orthopedic', 'Square Hospital And Diagonistic Center', 'asgar234', '2-5pm');

-- --------------------------------------------------------

--
-- Table structure for table `mainpatienttable`
--

CREATE TABLE `mainpatienttable` (
  `Name` varchar(233) NOT NULL,
  `Email` varchar(233) NOT NULL,
  `Birth_Date` date NOT NULL,
  `Gender` varchar(233) NOT NULL,
  `Location` varchar(233) NOT NULL,
  `Password` varchar(233) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mainpatienttable`
--

INSERT INTO `mainpatienttable` (`Name`, `Email`, `Birth_Date`, `Gender`, `Location`, `Password`) VALUES
('Ahsan Kabir', 'kabir121@gmail.com', '2014-02-21', 'male', 'Kuratoli,Dhaka', 'kabir121'),
('Fahim Kobra', 'patientkobra123@gmail.com', '2002-12-02', 'Male', 'Bashundhara, G Block', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `patientrequest_table`
--

CREATE TABLE `patientrequest_table` (
  `Name` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Birth_Date` date NOT NULL,
  `Gender` varchar(200) NOT NULL,
  `Location` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctorrequest_table`
--
ALTER TABLE `doctorrequest_table`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `mainpatienttable`
--
ALTER TABLE `mainpatienttable`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `patientrequest_table`
--
ALTER TABLE `patientrequest_table`
  ADD PRIMARY KEY (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
