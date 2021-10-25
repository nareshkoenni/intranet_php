-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 25, 2021 at 09:38 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intranet`
--

-- --------------------------------------------------------

--
-- Table structure for table `adjustments`
--

CREATE TABLE `adjustments` (
  `adj_id` int(11) NOT NULL,
  `faculty_id` varchar(10) NOT NULL,
  `adj_with_id` varchar(10) NOT NULL,
  `leave_id` int(11) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `sem` int(2) NOT NULL,
  `section` varchar(10) NOT NULL,
  `adj_date` varchar(10) NOT NULL,
  `adjustment_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `rollnumber` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `period` int(1) NOT NULL,
  `attendance` int(1) NOT NULL,
  `sem` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `author` varchar(200) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `callno` varchar(50) NOT NULL,
  `accno` varchar(50) NOT NULL,
  `edition` varchar(150) NOT NULL,
  `volume` varchar(150) NOT NULL,
  `year` varchar(5) NOT NULL,
  `cost` int(11) NOT NULL,
  `pages` varchar(10) NOT NULL,
  `dept` varchar(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `no_of_issue_books` int(11) NOT NULL,
  `no_of_ref_books` int(11) NOT NULL,
  `supplier` varchar(150) NOT NULL,
  `invoiceno` varchar(50) NOT NULL,
  `invoice_date` varchar(50) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `course` varchar(150) NOT NULL,
  `enclose` varchar(50) NOT NULL,
  `enclose_items` varchar(10) NOT NULL,
  `remarks` text NOT NULL,
  `creator` varchar(10) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `book_transaction`
--

CREATE TABLE `book_transaction` (
  `accnum` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `user` int(11) NOT NULL,
  `issuer` varchar(75) NOT NULL,
  `to_date` date NOT NULL,
  `no_of_books` int(11) NOT NULL,
  `book_id` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `sno` int(11) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `CO1` text NOT NULL,
  `CO2` text NOT NULL,
  `CO3` text NOT NULL,
  `CO4` text NOT NULL,
  `CO5` text NOT NULL,
  `CO6` text NOT NULL,
  `textbook` text NOT NULL,
  `referencebook` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `course_branch`
--

CREATE TABLE `course_branch` (
  `sno` int(11) NOT NULL,
  `branch` varchar(5) NOT NULL,
  `sem` varchar(1) NOT NULL,
  `regulation` varchar(2) NOT NULL,
  `course_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `course_end_survey`
--

CREATE TABLE `course_end_survey` (
  `rollnumber` varchar(10) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `co1` int(1) NOT NULL,
  `co2` int(1) NOT NULL,
  `co3` int(1) NOT NULL,
  `co4` int(1) NOT NULL,
  `co5` int(1) NOT NULL,
  `co6` int(1) NOT NULL,
  `tlp1` int(1) NOT NULL,
  `tlp2` int(1) NOT NULL,
  `tlp3` int(1) NOT NULL,
  `tlp4` int(1) NOT NULL,
  `tlp5` int(1) NOT NULL,
  `tlp6` int(1) NOT NULL,
  `tlp7` int(1) NOT NULL,
  `tlp8` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `sno` int(11) NOT NULL,
  `faculty_id` varchar(10) NOT NULL,
  `faculty_name` varchar(75) NOT NULL,
  `branch` varchar(5) NOT NULL,
  `mobile_number` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comm_address` text NOT NULL,
  `perm_address` text NOT NULL,
  `role_id` int(2) NOT NULL,
  `blood_group` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`sno`, `faculty_id`, `faculty_name`, `branch`, `mobile_number`, `email`, `comm_address`, `perm_address`, `role_id`, `blood_group`) VALUES
(1, 'bvrith1', 'teacher', 'CSE', '7382663192', 'teacher@gmail.com', '1-17, NUKULAMPADU VILLAGE, ENKOOR MANDAL', '1-17, NUKULAMPADU VILLAGE, ENKOOR MANDAL, khammam', 4, 'A+'),
(2, 'bvrith2', 'faculty2', 'CSE', '9989803310', 'naresh.6026@gmail.com', '1-17, NUKULAMPADU VILLAGE, ENKOOR MANDAL', '1-17, NUKULAMPADU VILLAGE, ENKOOR MANDAL', 4, 'A+'),
(3, 'bvrith3', 'faculty3', 'ECE', '9989803310', 'naresh.6026@gmail.com', 'Miyapur, hyderabad', 'Miyapur, hyderabad', 4, 'A+'),
(4, 'bvrith4', 'admin', 'admin', '9989803310', 'admin@gmail.com', 'Miyapur, hyderabad', 'hyd', 1, 'B+');

-- --------------------------------------------------------

--
-- Table structure for table `ges`
--

CREATE TABLE `ges` (
  `rollnumber` varchar(10) NOT NULL,
  `placement_info` varchar(250) DEFAULT NULL,
  `higher_studies_test` varchar(50) DEFAULT NULL,
  `higher_studies_score` varchar(50) DEFAULT NULL,
  `pg_admission_det` varchar(150) DEFAULT NULL,
  `pe1` int(11) DEFAULT NULL,
  `pe2` int(11) DEFAULT NULL,
  `pe3` int(11) DEFAULT NULL,
  `pe4` int(11) DEFAULT NULL,
  `pe5` int(11) DEFAULT NULL,
  `pe6` int(11) DEFAULT NULL,
  `pe7` int(11) DEFAULT NULL,
  `pe8` int(11) DEFAULT NULL,
  `suggestions` varchar(250) DEFAULT NULL,
  `training_program` varchar(50) DEFAULT NULL,
  `workshop` varchar(250) DEFAULT NULL,
  `sports` varchar(50) DEFAULT NULL,
  `achievement` varchar(350) DEFAULT NULL,
  `bvrith_pickedup` varchar(150) DEFAULT NULL,
  `bvrith_like_most` varchar(150) DEFAULT NULL,
  `principal` varchar(50) DEFAULT NULL,
  `hod` varchar(50) DEFAULT NULL,
  `teaching` varchar(50) DEFAULT NULL,
  `non_teaching` varchar(50) DEFAULT NULL,
  `amenties` varchar(50) DEFAULT NULL,
  `library` varchar(50) DEFAULT NULL,
  `labs` varchar(50) DEFAULT NULL,
  `exam_cell` varchar(50) DEFAULT NULL,
  `administration` varchar(50) DEFAULT NULL,
  `training_placement` varchar(50) DEFAULT NULL,
  `discipline` varchar(50) DEFAULT NULL,
  `ambience` varchar(50) DEFAULT NULL,
  `classrooms` varchar(50) DEFAULT NULL,
  `medical_facililty` varchar(50) DEFAULT NULL,
  `overall` varchar(50) DEFAULT NULL,
  `improvements` varchar(50) DEFAULT NULL,
  `survey_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `grievance`
--

CREATE TABLE `grievance` (
  `grievance_id` int(11) DEFAULT NULL,
  `user_id` varchar(10) NOT NULL,
  `category` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `comments` text NOT NULL,
  `fixedBy` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leaveinfo`
--

CREATE TABLE `leaveinfo` (
  `faculty_id` varchar(10) NOT NULL,
  `clcredit` double NOT NULL,
  `slcredit` double NOT NULL,
  `elcredit` double NOT NULL,
  `alcredit` double NOT NULL,
  `od` double NOT NULL,
  `cclccredit` double NOT NULL,
  `ohp` double NOT NULL,
  `vacation` double NOT NULL,
  `cldebit` double NOT NULL,
  `sldebit` double NOT NULL,
  `eldebit` double NOT NULL,
  `aldebit` double NOT NULL,
  `ccldebit` double NOT NULL,
  `clbalance` double NOT NULL,
  `slbalance` double NOT NULL,
  `elbalance` double NOT NULL,
  `albalance` double NOT NULL,
  `cclbalance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `leave_id` int(11) NOT NULL,
  `faculty_id` varchar(10) NOT NULL,
  `leave_type` varchar(10) NOT NULL,
  `number_of_days` int(2) NOT NULL,
  `fromDate` varchar(30) NOT NULL,
  `toDatte` varchar(30) NOT NULL,
  `purpose` text NOT NULL,
  `applied_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hod_status` varchar(10) NOT NULL,
  `principal_status` varchar(10) NOT NULL,
  `rejection_reason` text NOT NULL,
  `num_one_hr_perm` int(1) NOT NULL,
  `num_one_hr_perm_month` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `LogDetails`
--

CREATE TABLE `LogDetails` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_login` datetime NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `LogDetails`
--

INSERT INTO `LogDetails` (`email`, `password`, `last_login`, `role_id`) VALUES
('18wh1a0501@gmail.com', '123456', '2021-09-16 00:00:00', 5),
('admin@gmail.com', '123456', '2021-09-23 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `rollnumber` varchar(10) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `gpa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(2) NOT NULL,
  `role_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'hod'),
(3, 'classteacher'),
(4, 'teacher'),
(5, 'student'),
(6, 'parent');

-- --------------------------------------------------------

--
-- Table structure for table `smsReport`
--

CREATE TABLE `smsReport` (
  `rollnumber` varchar(10) NOT NULL,
  `message` text NOT NULL,
  `messageStatus` varchar(20) NOT NULL,
  `deliveryDate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sno` int(11) NOT NULL,
  `rollnumber` varchar(10) NOT NULL,
  `name` varchar(75) NOT NULL,
  `branch` varchar(5) NOT NULL,
  `student_mobile_number` int(10) NOT NULL,
  `parent_mobile_number` int(10) NOT NULL,
  `comm_address` text NOT NULL,
  `perm_address` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `role_id` int(2) NOT NULL,
  `batch` varchar(10) NOT NULL,
  `section` varchar(10) NOT NULL,
  `blood_group` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sno`, `rollnumber`, `name`, `branch`, `student_mobile_number`, `parent_mobile_number`, `comm_address`, `perm_address`, `email`, `role_id`, `batch`, `section`, `blood_group`) VALUES
(1, '18wh1a0501', '501 name', 'CSE', 998980331, 998980331, 'hyd comm', 'hyd perm', '18wh1a0501@gmail.com', 5, '2018-2022', 'A', 'A+');

-- --------------------------------------------------------

--
-- Table structure for table `student_course_faculty`
--

CREATE TABLE `student_course_faculty` (
  `rollnumber` varchar(10) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `faculty_id` varchar(75) NOT NULL,
  `acyear` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adjustments`
--
ALTER TABLE `adjustments`
  ADD PRIMARY KEY (`adj_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD KEY `sno` (`sno`);

--
-- Indexes for table `course_branch`
--
ALTER TABLE `course_branch`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`,`email`),
  ADD KEY `sno` (`sno`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `LogDetails`
--
ALTER TABLE `LogDetails`
  ADD KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`rollnumber`,`email`),
  ADD KEY `sno` (`sno`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adjustments`
--
ALTER TABLE `adjustments`
  MODIFY `adj_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_branch`
--
ALTER TABLE `course_branch`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Constraints for table `LogDetails`
--
ALTER TABLE `LogDetails`
  ADD CONSTRAINT `logdetails_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
