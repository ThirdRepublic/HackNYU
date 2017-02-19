-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2017 at 05:21 PM
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
  `duration` int(4) NOT NULL,
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
(101, '2017-02-19 15:41:08', 20, 1, 'Math', '6', 501, 'bob@bob.bob'),
(102, '2017-02-19 15:41:11', 20, 5, 'Physics', '34', 502, 'bob@bob.bob'),
(103, '2017-02-19 15:41:14', 20, 20, 'Computer Science', '21', 502, 'bill@bill.bill'),
(104, '2017-02-19 15:41:17', 20, 3, 'Computer Science', '7', 503, 'juice@juice.com'),
(105, '2017-02-19 15:41:20', 20, 2, 'Math', '4', 501, 'bob@bob.bob');

-- --------------------------------------------------------

--
-- Table structure for table `bookmarked`
--

CREATE TABLE `bookmarked` (
  `email` varchar(255) NOT NULL,
  `class_ID` int(255) DEFAULT NULL,
  `isEnrolled` tinyint(1) DEFAULT NULL,
  `id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookmarked`
--

INSERT INTO `bookmarked` (`email`, `class_ID`, `isEnrolled`, `id`) VALUES
('bob@bob.bob', 1003, 1, 1),
('bob@bob.bob', 4513, 0, 2),
('juice@juice.com', 2033, 1, 3),
('juice@juice.com', 2413, 1, 4),
('juice@juice.com', 2224, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_ID` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `Start` date NOT NULL,
  `End` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_ID`, `name`, `description`, `Start`, `End`) VALUES
(1003, 'General Engineering', '', '2017-01-23', '2017-05-08'),
(2033, 'Waves, Optics and Thermodynamics', '', '2017-01-23', '2017-05-08'),
(2224, 'Data Analysis', '', '2017-01-23', '2017-05-08'),
(2413, 'Discrete Mathematics', '', '2017-01-23', '2017-05-08'),
(4513, 'Software Engineering', '', '2017-01-23', '2017-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `office_hour`
--

CREATE TABLE `office_hour` (
  `oh_ID` int(255) NOT NULL,
  `class_ID` int(255) DEFAULT NULL,
  `staff_ID` varchar(200) DEFAULT NULL,
  `time_Begin` time DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `duration` time DEFAULT NULL,
  `weekDay` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `office_hour`
--

INSERT INTO `office_hour` (`oh_ID`, `class_ID`, `staff_ID`, `time_Begin`, `location`, `duration`, `weekDay`) VALUES
(501, 2224, 'time@gmail.com', '08:00:00', 'ss', '02:00:00', 0),
(502, 2413, '404', '17:00:00', 'Room 4', '02:00:00', 3),
(503, 2033, '402', '12:00:00', 'Room 15', '02:30:00', 5),
(505, 1003, '402', '10:00:00', 'Room 11', '02:00:00', 1);

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
('time@gmail.com', 'robe', 's', 1, '$2y$10$bBeSoe5ATS8.Genp9JCGneMvlwPUJIONcgvDGxMv/DqiawkmdEhaC', 0);

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
  ADD UNIQUE KEY `id` (`id`);

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
