-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 11:34 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toucan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `adminID` int(10) NOT NULL,
  `user` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dateOfCreation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`adminID`, `user`, `email`, `password`, `dateOfCreation`) VALUES
(1, 'Admin', 'admin@toucan.com', '200ceb26807d6bf99fd6f4f0d1ca54d4', '2020-08-17 12:07:43');

-- --------------------------------------------------------

--
-- Table structure for table `members_tbl`
--

CREATE TABLE `members_tbl` (
  `id` int(200) NOT NULL,
  `name` text NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members_tbl`
--

INSERT INTO `members_tbl` (`id`, `name`, `email_address`, `date_added`) VALUES
(8, 'Oluwaseun Crowther', 'seuncrowther@aol.com', '2022-11-30 23:19:27'),
(9, 'Oluwasegun Crowther', 'seuncrowther@yahoo.com', '2022-12-01 10:38:07'),
(10, 'Benjamin Burton', 'benburton@hotmail.com', '2022-12-01 14:31:20');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(200) NOT NULL,
  `school_name` text NOT NULL,
  `school_id` int(10) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school_name`, `school_id`, `country`) VALUES
(1, 'University of Lagos', 30045, 'Nigeria'),
(2, 'New York University', NULL, 'USA'),
(3, 'University of Oxford', 39200, 'UK'),
(4, 'Delhi University', 98050, 'India'),
(5, 'University of Birmingham', 2304, 'UK'),
(6, 'Michigan State University', NULL, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `school_attended`
--

CREATE TABLE `school_attended` (
  `id` int(200) NOT NULL,
  `school` int(50) NOT NULL,
  `student` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_attended`
--

INSERT INTO `school_attended` (`id`, `school`, `student`) VALUES
(1, 1, 8),
(2, 2, 8),
(3, 1, 9),
(4, 2, 9),
(5, 1, 10),
(6, 5, 10),
(7, 6, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `members_tbl`
--
ALTER TABLE `members_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_attended`
--
ALTER TABLE `school_attended`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `adminID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `members_tbl`
--
ALTER TABLE `members_tbl`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `school_attended`
--
ALTER TABLE `school_attended`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
