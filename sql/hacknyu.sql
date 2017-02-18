-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2017 at 09:38 PM
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
  `duration` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `queue` int(255) NOT NULL,
  `categories` varchar(500) NOT NULL,
  `question` varchar(500) NOT NULL,
  `oh_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('tea@gmail.com', 54321, 0);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_ID` int(255) NOT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_ID` int(255) NOT NULL,
  `school_Name` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Email` varchar(200) DEFAULT NULL,
  `FName` varchar(200) DEFAULT NULL,
  `LName` varchar(200) DEFAULT NULL,
  `IsStudent` tinyint(1) NOT NULL DEFAULT '1',
  `Password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Email`, `FName`, `LName`, `IsStudent`, `Password`) VALUES
('t@gmail.com', 't', 't', 1, '$2y$10$C.ITogGkfHWPRu.tKwiJDOUNVBgydZ0mKX6gPO4wIAClO4ucRzmjq');

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
  MODIFY `app_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_ID` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `office_hour`
--
ALTER TABLE `office_hour`
  MODIFY `oh_ID` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `school_ID` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
