-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 16, 2022 at 03:40 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `buscraft`
--

CREATE TABLE `buscraft` (
  `BuscraftNO` varchar(3) NOT NULL,
  `BuscraftBrand` enum('Benz') NOT NULL,
  `BuscraftModel` enum('01','02') NOT NULL,
  `BuscraftCap` enum('30') NOT NULL,
  `SeatPrefix` varchar(2) NOT NULL,
  `BuscraftStartDate` date NOT NULL,
  `BuscraftExpired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buscraft`
--

INSERT INTO `buscraft` (`BuscraftNO`, `BuscraftBrand`, `BuscraftModel`, `BuscraftCap`, `SeatPrefix`, `BuscraftStartDate`, `BuscraftExpired`) VALUES
('B01', 'Benz', '01', '30', 'BC', '2012-05-01', '2032-05-01'),
('B02', 'Benz', '01', '30', 'BC', '2012-05-01', '2032-05-01'),
('B03', 'Benz', '01', '30', 'BC', '2012-05-01', '2032-05-01'),
('B04', 'Benz', '01', '30', 'BC', '2012-05-01', '2032-05-01'),
('B05', 'Benz', '01', '30', 'BC', '2012-05-01', '2032-05-01'),
('B06', 'Benz', '01', '30', 'BC', '2012-05-01', '2032-05-01'),
('C01', 'Benz', '01', '30', 'BC', '2012-05-01', '2032-05-01'),
('C02', 'Benz', '01', '30', 'BC', '2012-05-01', '2032-05-01'),
('C03', 'Benz', '01', '30', 'BC', '2012-05-01', '2032-05-01'),
('C04', 'Benz', '01', '30', 'BC', '2012-05-01', '2032-05-01'),
('C05', 'Benz', '01', '30', 'BC', '2012-05-01', '2032-05-01'),
('C06', 'Benz', '01', '30', 'BC', '2012-05-01', '2032-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `busschedule`
--

CREATE TABLE `busschedule` (
  `BusScheduleID` int(11) NOT NULL,
  `DepartDateTime` datetime NOT NULL,
  `ArriveDateTime` datetime NOT NULL,
  `DepartDateTimeReal` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ArriveDateTimeReal` timestamp NULL DEFAULT NULL,
  `DepartLocation` enum('BKK','CMI','KKN','NRT') NOT NULL,
  `ArriveLocation` enum('BKK','CMI','KKN','NRT') NOT NULL,
  `BuscraftNO` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `busschedule`
--

INSERT INTO `busschedule` (`BusScheduleID`, `DepartDateTime`, `ArriveDateTime`, `DepartDateTimeReal`, `ArriveDateTimeReal`, `DepartLocation`, `ArriveLocation`, `BuscraftNO`) VALUES
(1, '2022-05-17 14:50:00', '2022-05-17 20:50:00', '2022-05-16 13:29:32', NULL, 'BKK', 'CMI', 'B01');

-- --------------------------------------------------------

--
-- Table structure for table `busstation`
--

CREATE TABLE `busstation` (
  `BusStationID` enum('BKK','CMI','KKN','NRT') NOT NULL,
  `BusStationName` varchar(128) NOT NULL,
  `BusStationCap` int(11) NOT NULL,
  `BusStationAddress` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `busstation`
--

INSERT INTO `busstation` (`BusStationID`, `BusStationName`, `BusStationCap`, `BusStationAddress`) VALUES
('BKK', 'BKK Sonic Bus', 20, 'Bangkok'),
('CMI', 'CMI Sonic Bus', 20, 'Chiang Mai'),
('KKN', 'KKN Sonic Bus', 20, 'Kon Kean'),
('NRT', 'NRT Sonic Bus', 20, 'Nakorn');

-- --------------------------------------------------------

--
-- Table structure for table `customerinfo`
--

CREATE TABLE `customerinfo` (
  `CustomerID` int(11) NOT NULL,
  `Username` varchar(32) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Title` varchar(10) NOT NULL,
  `Firstname` varchar(64) NOT NULL,
  `Lastname` varchar(64) NOT NULL,
  `DOB` date NOT NULL,
  `Email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customerinfo`
--

INSERT INTO `customerinfo` (`CustomerID`, `Username`, `Password`, `Title`, `Firstname`, `Lastname`, `DOB`, `Email`) VALUES
(1, 'morinee', '12345', 'Ms.', 'Morinee', 'Yuenyong', '2022-05-31', 'morinee.mo@mail.kmutt.ac.th'),
(2, 'morinee111', '12345', 'Ms.', 'Morinee22', 'Yuenyong', '2022-05-31', 'morinee.mo1@mail.kmutt.ac.th'),
(3, 'mouy', '12345', 'Ms.', 'Onuma', 'Wirod', '2022-05-31', 'morinee.mo2@mail.kmutt.ac.th'),
(4, 'mee', '12345', 'Ms.', 'meee', 'Wirod', '2022-05-31', 'aa.mo@mail.kmutt.ac.th'),
(5, 'mee2', '12345', 'Ms.', 'qoowq', 'Wirod', '2022-05-31', 'aaw.mo@mail.kmutt.ac.th'),
(6, 'mee223', '12345', 'Ms.', 'Memee', 'mimi', '2022-05-31', 'aawmimi.mo@mail.kmutt.ac.th'),
(7, 'mee223', '12345', 'Ms.', 'Memee1', 'mimi', '2022-05-31', 'aawmimi.mo22@mail.kmutt.ac.th');

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `EmployeeID` int(11) NOT NULL,
  `DiseaseName` varchar(128) NOT NULL,
  `NoteDisease` varchar(256) NOT NULL,
  `DiseaseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`EmployeeID`, `DiseaseName`, `NoteDisease`, `DiseaseID`) VALUES
(9, '-', '-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `EducationID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `Degree` varchar(128) NOT NULL,
  `Academy` varchar(128) NOT NULL,
  `Faculty` varchar(128) NOT NULL,
  `Department` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`EducationID`, `EmployeeID`, `Degree`, `Academy`, `Faculty`, `Department`) VALUES
(1, 9, 'abc', 'kmutt', 'cpe', 'cpe');

-- --------------------------------------------------------

--
-- Table structure for table `employeeinfo`
--

CREATE TABLE `employeeinfo` (
  `EmployeeID` int(11) NOT NULL,
  `Username` varchar(32) NOT NULL,
  `Passwords` varchar(32) NOT NULL,
  `Title` varchar(10) DEFAULT NULL,
  `Firstname` varchar(64) NOT NULL,
  `Lastname` varchar(64) NOT NULL,
  `IDCard` varchar(13) NOT NULL,
  `DOB` date NOT NULL,
  `Height` double NOT NULL,
  `Weights` double NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Addresses` varchar(128) NOT NULL,
  `StartDate` date NOT NULL,
  `Salary` double NOT NULL,
  `EmployeeRole` enum('A','B','D','H','M','S') NOT NULL,
  `BusStationID` enum('BKK','CMI','KKN','NRT') NOT NULL,
  `EmployeeStatus` enum('1','0') NOT NULL,
  `EmployeeGender` enum('M','F','O') NOT NULL,
  `BusScheduleID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employeeinfo`
--

INSERT INTO `employeeinfo` (`EmployeeID`, `Username`, `Passwords`, `Title`, `Firstname`, `Lastname`, `IDCard`, `DOB`, `Height`, `Weights`, `Email`, `Phone`, `Addresses`, `StartDate`, `Salary`, `EmployeeRole`, `BusStationID`, `EmployeeStatus`, `EmployeeGender`, `BusScheduleID`) VALUES
(1, 'admin', '12', 'Ms.', 'admin', 'mo', '1234567891234', '2022-05-18', 123, 12, 'mo.mori@gmail.com', '1234567890', '123', '2022-05-10', 12000, 'A', 'BKK', '1', 'M', NULL),
(2, 'addbusschedule', '12', 'Ms.', 'norimo', 'no', '0000000000000', '2022-05-24', 123, 222, 'no.nori@gmail.com', '1234567890', '123', '2022-05-10', 12000, 'M', 'BKK', '1', 'M', NULL),
(3, 'hr', '12', 'Ms.', 'porimo', 'po', '1111111111111', '2022-05-16', 123, 12, 'po.pori@gmail.com', '1234567890', '1213', '2022-05-10', 12000, 'H', 'BKK', '1', 'M', NULL),
(4, 'driver1', '12', 'Ms.', 'ณัฐกาน', 'อ่านน', '1111111111111', '2022-05-24', 1232, 12, 'oui.ou@gmail.com', '1234567890', '123', '2022-05-17', 12000, 'D', 'BKK', '1', 'M', NULL),
(5, 'BusStaff1', '12', 'Mrs.', 'อรอุมา', 'วิโรชกิจเจริญ', '1233322331123', '2022-05-28', 123, 13, 'oonumamouy@gmail.com', '0983123421', '2', '2022-05-18', 1299, 'B', 'CMI', '1', 'M', NULL),
(6, 'BusStaff1', '12', 'Mrs.', 'พิมมาดา', 'ไล้สวน', '1233322331123', '2022-05-28', 123, 13, 'oonumamouy@gmail.com', '0983123421', '2', '2022-05-18', 1299, 'B', 'KKN', '0', 'M', NULL),
(7, 'driver2', '12', 'Ms.', 'ชัยมง', 'กิจมา', '1111111111111', '2022-05-24', 1232, 12, 'oui.ou@gmail.com', '1234567890', '123', '2022-05-17', 12000, 'D', 'NRT', '1', 'M', NULL),
(8, 'BusStaff3', '12', 'Mrs.', 'โมรินี', 'ยืนยง', '1233322331123', '2022-05-28', 123, 13, 'oonumamouy@gmail.com', '0983123421', '2', '2022-05-18', 1299, 'B', 'KKN', '1', 'M', NULL),
(9, 'Staff', '12', 'Mr.', 'Onuma', 'Wiwi', '123', '2018-07-22', 162, 52, 'onumamouy@gmail.com', '0992328493', '123', '2018-07-22', 12000, 'S', 'BKK', '1', 'M', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `PassengerID` int(11) NOT NULL,
  `PassengerTitle` varchar(10) NOT NULL,
  `PassengerFirstname` varchar(50) NOT NULL,
  `PassengerLastname` varchar(50) NOT NULL,
  `PassengerDOB` date NOT NULL,
  `PassengerGender` enum('M','F','O') NOT NULL,
  `PassengerNationality` varchar(50) NOT NULL,
  `PassengerReligion` varchar(20) NOT NULL,
  `PassengerPhone` varchar(10) DEFAULT NULL,
  `PassengerIDCard` varchar(13) DEFAULT NULL,
  `PassengerEmail` varchar(50) NOT NULL,
  `CheckInTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`PassengerID`, `PassengerTitle`, `PassengerFirstname`, `PassengerLastname`, `PassengerDOB`, `PassengerGender`, `PassengerNationality`, `PassengerReligion`, `PassengerPhone`, `PassengerIDCard`, `PassengerEmail`, `CheckInTime`) VALUES
(1, 'นางสาว', 'อรอุมา', 'วิโรช', '2012-05-01', 'M', 'ไทย', 'พุทธ', '0994612008', '1374859318412', 'onumamouy1gmail.com', '2022-05-16 13:01:45'),
(2, 'นางสาว', 'อรอุมา', 'วิโรชช', '2012-05-01', 'M', 'ไทย', 'พุทธ', '0994612009', '1174859378412', 'onumamouy2@gmail.com', '2022-05-16 13:01:48'),
(3, 'นางสาว', 'อรอุมาาาา', 'วิโรชชณณ', '2012-05-01', 'M', 'ไทย', 'พุทธ', '0994612009', '1374829378412', 'onumamouy3@gmail.com', '2022-05-16 13:01:52'),
(4, 'นางสาว', 'พิมมาดา', 'วิโรชช', '2012-05-01', 'M', 'ไทย', 'พุทธ', '0994612009', '1374829378412', 'onumamouy4@gmail.com', '2022-05-16 13:01:55'),
(5, 'นางสาว', 'พิมมามาาา', 'วิโรชชๅๅ', '2012-05-01', 'M', 'ไทย', 'พุทธ', '0994612009', '1374859328412', 'onumamouy5@gmail.com', '2022-05-16 13:01:58'),
(6, 'นางสาว', 'มิมมี่', 'วิโรชชำ', '2012-05-01', 'M', 'ไทย', 'พุทธ', '0994612009', '1324859378412', 'onumamouy6@gmail.com', '2022-05-16 13:02:01'),
(7, 'นางสาว', 'มิมิบ', 'วิไ', '2012-05-01', 'M', 'ไทย', 'พุทธ', '0994612009', '1373859378412', 'onumamouy7@gmail.com', '2022-05-16 13:02:03'),
(8, 'นาย', 'ได่', 'ยย', '2012-05-01', 'M', 'ไทย', 'พุทธ', '0994612009', '1374359378412', 'onumamouy8@gmail.com', '2022-05-16 13:02:06'),
(9, 'นาย', 'กาย', 'วิโรชชส', '2012-05-01', 'M', 'ไทย', 'พุทธ', '0994612009', '1374859378212', 'onumamouy9@gmail.com', '2022-05-16 13:02:09'),
(10, 'นาย', 'ตัง', 'วิสิ', '2012-05-01', 'M', 'ไทย', 'พุทธ', '0994612009', '1374852378412', 'onumamouy10@gmail.com', '2022-05-16 13:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` int(11) NOT NULL,
  `PaymentMethod` enum('M','V','C') NOT NULL,
  `PaymentCard` varchar(16) DEFAULT NULL,
  `PaymentTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `TotalPrice` double NOT NULL,
  `ReservationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `PaymentMethod`, `PaymentCard`, `PaymentTime`, `TotalPrice`, `ReservationID`) VALUES
(1, 'M', '1234545364756473', '2022-05-16 13:02:37', 414, 1),
(2, 'M', '1234545364756473', '2022-05-16 13:02:40', 414, 2),
(3, 'M', '1234545364756473', '2022-05-16 13:02:41', 414, 3),
(4, 'V', '1234545364756473', '2022-05-16 13:02:42', 414, 4),
(5, 'V', '1234545364756473', '2022-05-16 13:03:04', 0, 5),
(6, 'V', '1234545364756473', '2022-05-16 13:03:06', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `ReservationID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `ReservationDateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ReservationStatus` enum('0','1','2','3','4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`ReservationID`, `CustomerID`, `ReservationDateTime`, `ReservationStatus`) VALUES
(1, 1, '2022-05-16 13:34:41', '0'),
(2, 2, '2022-05-16 13:34:41', '0'),
(3, 3, '2022-05-16 13:34:41', '0'),
(4, 4, '2022-05-16 13:34:41', '0'),
(5, 5, '2022-05-15 20:00:31', '0'),
(6, 6, '2022-05-15 20:00:31', '0'),
(7, 7, '2022-05-16 13:39:23', '0');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `SeatID` int(11) NOT NULL,
  `SeatNO` varchar(6) NOT NULL,
  `BusScheduleID` int(11) NOT NULL,
  `ReservationID` int(11) DEFAULT NULL,
  `PassengerID` int(11) DEFAULT NULL,
  `SeatStatus` enum('0','1') NOT NULL,
  `Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`SeatID`, `SeatNO`, `BusScheduleID`, `ReservationID`, `PassengerID`, `SeatStatus`, `Price`) VALUES
(1, 'BC0101', 1, NULL, NULL, '0', 414),
(2, 'BC0102', 1, NULL, NULL, '0', 414),
(3, 'BC0103', 1, NULL, NULL, '0', 414),
(4, 'BC0104', 1, NULL, NULL, '0', 414),
(5, 'BC0105', 1, NULL, NULL, '0', 414),
(6, 'BC0106', 1, NULL, NULL, '0', 414),
(7, 'BC0107', 1, NULL, NULL, '0', 414),
(8, 'BC0108', 1, NULL, NULL, '0', 414),
(9, 'BC0109', 1, NULL, NULL, '0', 414),
(10, 'BC0110', 1, NULL, NULL, '0', 414),
(11, 'BC0111', 1, NULL, NULL, '0', 414),
(12, 'BC0112', 1, NULL, NULL, '0', 414),
(13, 'BC0113', 1, NULL, NULL, '0', 414),
(14, 'BC0114', 1, NULL, NULL, '0', 414),
(15, 'BC0115', 1, NULL, NULL, '0', 414),
(16, 'BC0116', 1, NULL, NULL, '0', 414),
(17, 'BC0117', 1, NULL, NULL, '0', 414),
(18, 'BC0118', 1, NULL, NULL, '0', 414),
(19, 'BC0119', 1, NULL, NULL, '0', 414),
(20, 'BC0120', 1, NULL, NULL, '0', 414),
(21, 'BC0121', 1, NULL, NULL, '0', 414),
(22, 'BC0122', 1, NULL, NULL, '0', 414),
(23, 'BC0123', 1, NULL, NULL, '0', 414),
(24, 'BC0124', 1, NULL, NULL, '0', 414),
(25, 'BC0125', 1, NULL, NULL, '0', 414),
(26, 'BC0126', 1, NULL, NULL, '0', 414),
(27, 'BC0127', 1, NULL, NULL, '0', 414),
(28, 'BC0128', 1, NULL, NULL, '0', 414),
(29, 'BC0129', 1, NULL, NULL, '0', 414),
(30, 'BC0130', 1, NULL, NULL, '0', 414);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buscraft`
--
ALTER TABLE `buscraft`
  ADD PRIMARY KEY (`BuscraftNO`);

--
-- Indexes for table `busschedule`
--
ALTER TABLE `busschedule`
  ADD PRIMARY KEY (`BusScheduleID`),
  ADD KEY `DepartLocation` (`DepartLocation`),
  ADD KEY `ArriveLocation` (`ArriveLocation`),
  ADD KEY `BuscraftNO` (`BuscraftNO`);

--
-- Indexes for table `busstation`
--
ALTER TABLE `busstation`
  ADD PRIMARY KEY (`BusStationID`);

--
-- Indexes for table `customerinfo`
--
ALTER TABLE `customerinfo`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`DiseaseID`),
  ADD KEY `Kuy` (`EmployeeID`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`EducationID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indexes for table `employeeinfo`
--
ALTER TABLE `employeeinfo`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD KEY `BusStationID` (`BusStationID`),
  ADD KEY `BusScheduleID` (`BusScheduleID`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`PassengerID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `ReservationID` (`ReservationID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`ReservationID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`SeatID`),
  ADD KEY `BusScheduleID` (`BusScheduleID`),
  ADD KEY `ReservationID` (`ReservationID`),
  ADD KEY `PassengerID` (`PassengerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `busschedule`
--
ALTER TABLE `busschedule`
  MODIFY `BusScheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customerinfo`
--
ALTER TABLE `customerinfo`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `DiseaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `EducationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employeeinfo`
--
ALTER TABLE `employeeinfo`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `PassengerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ReservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `SeatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `busschedule`
--
ALTER TABLE `busschedule`
  ADD CONSTRAINT `busschedule_ibfk_1` FOREIGN KEY (`DepartLocation`) REFERENCES `busstation` (`BusStationID`),
  ADD CONSTRAINT `busschedule_ibfk_2` FOREIGN KEY (`ArriveLocation`) REFERENCES `busstation` (`BusStationID`),
  ADD CONSTRAINT `busschedule_ibfk_3` FOREIGN KEY (`BuscraftNO`) REFERENCES `buscraft` (`BuscraftNO`);

--
-- Constraints for table `disease`
--
ALTER TABLE `disease`
  ADD CONSTRAINT `Kuy` FOREIGN KEY (`EmployeeID`) REFERENCES `employeeinfo` (`EmployeeID`),
  ADD CONSTRAINT `disease_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employeeinfo` (`EmployeeID`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employeeinfo` (`EmployeeID`);

--
-- Constraints for table `employeeinfo`
--
ALTER TABLE `employeeinfo`
  ADD CONSTRAINT `employeeinfo_ibfk_1` FOREIGN KEY (`BusStationID`) REFERENCES `busstation` (`BusStationID`),
  ADD CONSTRAINT `employeeinfo_ibfk_2` FOREIGN KEY (`BusScheduleID`) REFERENCES `busschedule` (`BusScheduleID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`ReservationID`) REFERENCES `reservation` (`ReservationID`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customerinfo` (`CustomerID`);

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`BusScheduleID`) REFERENCES `busschedule` (`BusScheduleID`),
  ADD CONSTRAINT `seat_ibfk_2` FOREIGN KEY (`ReservationID`) REFERENCES `reservation` (`ReservationID`),
  ADD CONSTRAINT `seat_ibfk_3` FOREIGN KEY (`PassengerID`) REFERENCES `passenger` (`PassengerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
