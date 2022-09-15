-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2022 at 05:45 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uiu_course`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_pass`) VALUES
(1, 'admin@bscse.uiu.ac.bd', '111');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `materials` varchar(1000) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `trimester` varchar(50) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `approveStatus` int(11) NOT NULL DEFAULT 0,
  `links` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_name`, `course_code`, `materials`, `department_name`, `trimester`, `student_id`, `approveStatus`, `links`) VALUES
(5, 'OOP', 'csi331', 'DBMS_proposal.pdf', 'CSE', '', NULL, 1, NULL),
(8, 'SAD', 'CSE123', 'Profile-1.pdf', 'CSE', 'Spring201', NULL, 1, 'https://drive.google.com/drive/folders/1jRFKzeYQnKvRFJiauyjz1jc-V0Y73C2T'),
(13, 'oop', 'CSI2', 'software-installation.txt', 'CSE', '201', 124, 0, NULL),
(14, 'oop', 'CSI12', 'Profile.pdf', 'CSE', '201', 124, 1, 'https://drive.google.com/drive/folders/1jRFKzeYQnKvRFJiauyjz1jc-V0Y73C2T'),
(15, 'SPL', 'CSI222', 'piechart.png', 'CSE', '201', 124, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expert`
--

CREATE TABLE `expert` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `expertise` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `student_pass` varchar(100) NOT NULL,
  `expertise` varchar(500) NOT NULL,
  `points` float NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `student_id`, `student_name`, `email`, `department_name`, `student_pass`, `expertise`, `points`) VALUES
(1, 124, 'Mr', 'efazkh@bscse.uiu.ac.bd', 'CSE', '111', 'OOP,DBMS', 0),
(2, 11201108, 'Md Masum Khondhoker Efaz', 'mefaz201108@bscse.uiu.ac.bd', 'CSE', '111', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `trimester` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `course_name`, `course_code`, `department_name`, `trimester`, `status`) VALUES
(1, 'Database management system', 'CSI222', 'CSE', 'Fall2022', 0),
(2, 'Database management system', 'CSI222', 'CSE', 'Fall2022', 0),
(3, 'ca', 'csi331', 'CSE', 'Fall2022', 0),
(4, 'SAD', 'csi331', 'CSE', 'Fall2022', 0),
(6, 'Business', 'BBA12', 'BBA', 'Spring201', 0),
(7, 'Accounting', 'BBA123', '', 'Fall2022', 0),
(8, 'OOP', 'CSI222', '', 'Fall2022', 0),
(9, 'ca', 'CSI222', '', 'Fall2022', 0),
(10, 'OOP', 'CSI222', 'CSE', 'Fall2022', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `expert`
--
ALTER TABLE `expert`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expert_ibfk_1` (`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `expert`
--
ALTER TABLE `expert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `expert`
--
ALTER TABLE `expert`
  ADD CONSTRAINT `expert_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
