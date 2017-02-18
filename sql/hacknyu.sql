-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2017 at 10:38 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

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
  `oh_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`app_ID`, `timestamp`, `duration`, `queue`, `categories`, `question`, `oh_ID`) VALUES
(101, '2017-02-18 21:12:50', '2016-07-12 07:15:00', 1, 'Math', '6', 501),
(102, '2017-02-18 21:13:59', '2016-11-02 14:30:00', 5, 'English', '34', 502),
(103, '2017-02-18 21:15:38', '2016-11-02 17:45:00', 20, 'Functional Programming', '100', 502),
(104, '2016-10-04 13:20:00', '0000-00-00 00:00:00', 3, 'Computer Architecture', '7', 503),
(105, '2016-12-01 18:00:00', '0000-00-00 00:00:00', 2, 'Algorithms', '4', 501);

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
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_ID`, `description`) VALUES
(201, 'Suffering -Computer Edition'),
(202, 'Suffering - Science Edition'),
(203, 'Suffering - English Edition'),
(205, 'Suffering - Discrete Math Edition'),
(12345, 'Suffering - Ultimate Edition');

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
  `duration` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `office_hour`
--

INSERT INTO `office_hour` (`oh_ID`, `class_ID`, `staff_ID`, `time_Begin`, `location`, `duration`) VALUES
(501, 201, 401, '08:00:00', 'Room 10', '02:00:00'),
(502, 205, 404, '17:00:00', 'Room 4', '02:00:00'),
(503, 203, 402, '12:00:00', 'Room 15', '02:30:00'),
(505, 205, 402, '10:00:00', 'Room 11', '02:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_ID` int(255) NOT NULL,
  `school_Name` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_ID`, `school_Name`, `city`) VALUES
(601, 'NYU', 'Brooklyn'),
(602, 'Cornell', 'Ithaca'),
(603, 'Harvard', 'Boston'),
(604, 'Columbia', 'New York'),
(605, 'Princeton', 'Princeton');

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
('tea@tea.tea', 'Tea', 'Cup', 1, 'abcde', 0);

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
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_Name`,`city`),
  ADD UNIQUE KEY `school_ID` (`school_ID`);

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
--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `school_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=606;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
