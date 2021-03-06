-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2017 at 07:18 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

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
  `duration` int(4) DEFAULT NULL,
  `queue` int(255) NOT NULL,
  `categories` varchar(500) NOT NULL,
  `question` varchar(500) DEFAULT NULL,
  `oh_ID` int(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `oh_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`app_ID`, `timestamp`, `duration`, `queue`, `categories`, `question`, `oh_ID`, `email`, `oh_date`) VALUES
(101, '2017-02-19 15:41:08', 20, 1, 'Math', '6', 501, 'bob@bob.bob', '0000-00-00'),
(102, '2017-02-19 15:41:11', 20, 5, 'Physics', '34', 502, 'bob@bob.bob', '0000-00-00'),
(103, '2017-02-19 15:41:14', 20, 20, 'Computer Science', '21', 502, 'bill@bill.bill', '0000-00-00'),
(104, '2017-02-19 15:41:17', 20, 3, 'Computer Science', '7', 503, 'juice@juice.com', '0000-00-00'),
(105, '2017-02-19 15:41:20', 20, 2, 'Math', '4', 501, 'bob@bob.bob', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_ID` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(8000) DEFAULT NULL,
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
(505, 1003, '402', '10:00:00', 'Room 11', '02:00:00', 1),
(506, 4513, '404', '17:00:00', 'Room 4', '02:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

CREATE TABLE `registered` (
  `class_ID` int(255) DEFAULT NULL,
  `isEnrolled` tinyint(1) DEFAULT NULL,
  `id` int(50) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `registered`
--

INSERT INTO `registered` (`class_ID`, `isEnrolled`, `id`, `email`) VALUES
(1003, 1, 1, 'robe@test.com'),
(4513, 0, 2, 'robe@test.com'),
(2033, 1, 3, 'juice@juice.com'),
(2413, 1, 4, 'juice@juice.com'),
(2224, 1, 5, 'juice@juice.com');

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
('juice@juice.com', 'tea', 'tea', 1, '$2y$10$GHTdrjVbpHDhqYIOe5pln.kEvJpDS.kqGd/dVLzsMZJCpS8V7piWG', 0),
('robe@test.com', 'Testing', 'Purposes', 1, '$2y$10$gYiQ4A/sIoIjCz5.bXJhJO28Z2ZTkOU5yVnOtkxnn/MyHFKQOVN2m', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD UNIQUE KEY `app_ID` (`app_ID`);

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
-- Indexes for table `registered`
--
ALTER TABLE `registered`
  ADD UNIQUE KEY `id` (`id`);

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
  MODIFY `class_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225856;
--
-- AUTO_INCREMENT for table `office_hour`
--
ALTER TABLE `office_hour`
  MODIFY `oh_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=507;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
