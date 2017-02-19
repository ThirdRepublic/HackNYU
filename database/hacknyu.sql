-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2017 at 09:50 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hacknyu`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `app_ID` int(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `duration` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `queue` int(255) NOT NULL,
  `categories` varchar(500) NOT NULL,
  `question` varchar(500) NOT NULL,
  `oh_ID` int(255) NOT NULL,
  `email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`app_ID`, `timestamp`, `duration`, `queue`, `categories`, `question`, `oh_ID`, `email`) VALUES
(101, '2017-02-19 04:30:03', '2016-07-12 07:15:00', 1, 'Math', '6', 501, 't@gmail.com'),
(102, '2017-02-19 04:30:17', '2016-11-02 14:30:00', 5, 'English', '34', 502, 'bob@bob.bob'),
(103, '2017-02-19 04:32:16', '2016-11-02 17:45:00', 20, 'Functional Programming', '100', 502, 'bill@bill.bill'),
(104, '2017-02-19 04:32:29', '0000-00-00 00:00:00', 3, 'Computer Architecture', '7', 503, 'ken@ken.ken'),
(105, '2017-02-19 04:32:53', '0000-00-00 00:00:00', 2, 'Algorithms', '4', 501, 'juice@juice.com');

-- --------------------------------------------------------

--
-- Table structure for table `bookmarked`
--

CREATE TABLE `bookmarked` (
  `email` varchar(200) DEFAULT NULL,
  `class_ID` int(255) DEFAULT NULL,
  `isEnrolled` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookmarked`
--

INSERT INTO `bookmarked` (`email`, `class_ID`, `isEnrolled`) VALUES
('test@gmail.com', 12345, 1),
('tea@gmail.com', 54321, 0),
('bob@bob.bob', 201, 1),
('bill@bill.bill', 203, 0),
('ken@ken.ken', 205, 1);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_ID` int(255) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `Start` date NOT NULL,
  `End` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_ID`, `description`, `Start`, `End`) VALUES
(201, 'Suffering -Computer Edition', '0000-00-00', '0000-00-00'),
(202, 'Suffering - Science Edition', '0000-00-00', '0000-00-00'),
(203, 'Suffering - English Edition', '0000-00-00', '0000-00-00'),
(205, 'Suffering - Discrete Math Edition', '0000-00-00', '0000-00-00'),
(12345, 'Suffering - Ultimate Edition', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `office_hour`
--

CREATE TABLE `office_hour` (
  `oh_ID` int(255) NOT NULL,
  `class_ID` int(255) DEFAULT NULL,
  `staff_ID` int(255) DEFAULT NULL,
  `time_Begin` time DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `duration` time DEFAULT NULL,
  `weekDay` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `office_hour`
--

INSERT INTO `office_hour` (`oh_ID`, `class_ID`, `staff_ID`, `time_Begin`, `location`, `duration`, `weekDay`) VALUES
(501, 201, 401, '08:00:00', 'Room 10', '02:00:00', 1),
(502, 205, 404, '17:00:00', 'Room 4', '02:00:00', 3),
(503, 203, 402, '12:00:00', 'Room 15', '02:30:00', 5),
(505, 205, 402, '10:00:00', 'Room 11', '02:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `email` varchar(200) NOT NULL,
  `class_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`email`, `class_ID`) VALUES
('time@gmail.com', 201);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Email` varchar(200) DEFAULT NULL,
  `FName` varchar(200) DEFAULT NULL,
  `LName` varchar(200) DEFAULT NULL,
  `IsStudent` tinyint(1) NOT NULL DEFAULT '1',
  `Password` varchar(200) DEFAULT NULL,
  `isTA` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Email`, `FName`, `LName`, `IsStudent`, `Password`, `isTA`) VALUES
('t@gmail.com', 't', 't', 1, '$2y$10$C.ITogGkfHWPRu.tKwiJDOUNVBgydZ0mKX6gPO4wIAClO4ucRzmjq', 0),
('bob@bob.bob', 'Bob', 'Bob', 1, 'abcdefghijkl', 0),
('bill@bill.bill', 'Bill', 'Bill', 0, 'none', 0),
('ken@ken.ken', 'Ken', 'Ken', 1, 'ken', 1),
('tea@tea.tea', 'Tea', 'Cup', 1, 'abcde', 0),
('juice@juice.com', 'tea', 'tea', 1, '$2y$10$GHTdrjVbpHDhqYIOe5pln.kEvJpDS.kqGd/dVLzsMZJCpS8V7piWG', 0),
('time@gmail.com', 'hi', 'robe', 1, '$2y$10$mqsV4MgpfkFFJ1YoZUYx8.CDwhiO4Z97H8ErYkl8Gwi6rSKm/PfK.', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD UNIQUE KEY `app_ID` (`app_ID`);

--
-- Indexes for table `bookmarked`
--
ALTER TABLE `bookmarked`
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD UNIQUE KEY `class_ID` (`class_ID`);
ALTER TABLE `classes` ADD FULLTEXT KEY `description` (`description`);

--
-- Indexes for table `office_hour`
--
ALTER TABLE `office_hour`
  ADD UNIQUE KEY `oh_ID` (`oh_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`email`,`class_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `app_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12346;
--
-- AUTO_INCREMENT for table `office_hour`
--
ALTER TABLE `office_hour`
  MODIFY `oh_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=506;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
