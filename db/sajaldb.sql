-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 06, 2017 at 03:42 AM
-- Server version: 5.5.52-cll-lve
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sajaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_admin`
--

CREATE TABLE IF NOT EXISTS `account_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `account_admin`
--

INSERT INTO `account_admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Mr. X', 'mr.x@mail.com', '$2y$11$74050c7d842ab8deb8f25ehhc0q2040303zvg0m8YAUYuZqYqnjMG');

-- --------------------------------------------------------

--
-- Table structure for table `course_registr`
--

CREATE TABLE IF NOT EXISTS `course_registr` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `semester_no` int(11) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `course_name` varchar(100) DEFAULT NULL,
  `cgpa` varchar(100) DEFAULT NULL,
  `grade` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `course_registr`
--

INSERT INTO `course_registr` (`row_id`, `student_id`, `dept`, `semester_no`, `course_code`, `course_name`, `cgpa`, `grade`) VALUES
(1, '143-35-836', 'SWE', 1, 'swe001', NULL, '2.94', 'B-'),
(2, '143-35-836', 'SWE', 2, 'swe002', NULL, NULL, NULL),
(3, '143-35-836', 'SWE', 3, 'ENG323', NULL, '3.50', 'A-'),
(4, '143-35-836', 'SWE', 4, 'swe004', NULL, NULL, NULL),
(5, '143-35-836', 'SWE', 5, 'phy321', NULL, '3.75', 'A'),
(8, '143-35-836', 'SWE', 6, 'CSE345', NULL, '3.25', 'B+'),
(9, '143-35-836', 'SWE', 7, 'swe323', NULL, NULL, NULL),
(15, '143-35-836', 'SWE', 7, 'MATH432', NULL, '3.25', 'B+'),
(17, '143-35-836', 'SWE', 7, 'MATH225', NULL, '4', 'A+'),
(53, '143-35-766', 'SWE', 2, 'phy321', NULL, '3.5', 'A-'),
(54, '143-35-766', 'SWE', 2, 'CSE125', NULL, NULL, NULL),
(55, '143-35-826', 'SWE', 1, 'swe789', NULL, NULL, NULL),
(56, '143-35-826', 'SWE', 1, 'phy879', NULL, '4', 'A+'),
(57, '143-35-826', 'SWE', 1, 'cse999', NULL, NULL, NULL),
(58, '151-35-892', 'SWE', 1, 'phy123', NULL, NULL, NULL),
(59, '143-35-802', 'BBA', 1, 'CSE125', NULL, NULL, NULL),
(60, '143-35-802', 'BBA', 1, 'PHY967', NULL, '3.50', 'A-'),
(61, '143-35-756', 'BBA', 1, 'PHY967', NULL, '3.39', 'B+'),
(62, '143-35-756', 'BBA', 1, 'CSE125', NULL, NULL, NULL),
(63, '143-35-822', 'EEE', 1, 'CSE125', NULL, '4', 'A+'),
(64, '143-35-822', 'EEE', 1, 'PHY967', NULL, '2.94', 'B-'),
(65, '143-35-820', 'CSE', 1, 'Math778', NULL, '4', 'A+'),
(66, '143-35-820', 'CSE', 1, 'ENG123', NULL, '3.25', 'B+'),
(67, '143-35-820', 'CSE', 2, 'phy321', NULL, NULL, NULL),
(68, '143-35-820', 'CSE', 2, 'Cse435', NULL, NULL, NULL),
(69, '143-35-833', 'SWE', 2, 'swe 232', NULL, '3', 'B'),
(70, '143-35-833', 'SWE', 3, 'swe 224', NULL, '3.5', 'A-'),
(71, '143-35-833', 'SWE', 3, 'math 113', NULL, '3.5', 'A-'),
(72, '143-35-833', 'SWE', 3, 'swe 111', NULL, '3', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `student_diu`
--

CREATE TABLE IF NOT EXISTS `student_diu` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `semester` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `receivable` int(11) NOT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `student_diu`
--

INSERT INTO `student_diu` (`row_id`, `name`, `dept`, `student_id`, `email`, `password`, `semester`, `paid`, `receivable`) VALUES
(1, 'Sazal Ahamed', 'SWE', '143-35-836', 'se.sazal836@gmail.com', '$2y$11$b12d8eaa8d66fefbffe12uXXKjlhnbxJfn7BIozCiN3vC40710lUC', 7, 350087, 350000),
(2, 'Omar Imtiaz', 'SWE', '143-35-826', 'omar826@diu.edu.bd', '$2y$11$b12d8eaa8d66fefbffe12uXXKjlhnbxJfn7BIozCiN3vC40710lUC', 1, 150000, 50000),
(3, 'Mohammad Ali', 'CSE', '161-15-655', 'ali@mail.com', '$2y$11$b12d8eaa8d66fefbffe12uXXKjlhnbxJfn7BIozCiN3vC40710lUC', 3, 150000, 150000),
(4, 'Shoile', 'SWE', '143-35-766', 'shoile@mail.com', '$2y$11$014320ef1061f5488a081usyVU.JPChNHq/rjmrmuI7QQUIvhNxGm', 2, 201104, 100000),
(5, 'Mustaque Ahemmed', 'EEE', '143-35-822', 'mustaque@mail.com', '$2y$11$82955df3314ec8edfff43uMB/Hu/gCEiryYFbphOewsslEbGZ2Nau', 1, 50000, 50000),
(6, 'Test Name', 'MCT', '163-35-000', 'test@mail.com', '$2y$11$6b1f6371e63b0fb22ee81O70JFKiBei0BTdZIUUeLIjYwcU9Hs/Ze', 1, 50044, 50000),
(7, 'Himel Shipu', 'BBA', '143-35-756', 'himel756@diu.edu.bd', '$2y$11$f3289a23c155b8c468df2u1J3YJEiHi57aE0EG.ZbFCzelPkkNEhm', 1, 500000, 50000),
(8, 'Aum Tuhin', 'SWE', '151-35-892', 'tuhin35-892@diu.edu.bd', '$2y$11$4c2753e5db76a7f4431eaOz48TQZ8uvSpWOBpEHJELqnnGmAV1Eqi', 1, 50005, 50000),
(9, 'Oishorjo Simran', 'BBA', '143-35-802', 'simran@mail.com', '$2y$11$bf5082488fc6ecaa434b6u3sWRriCVTvwvlZ8.bhEWnVw35/kr47m', 1, 50000, 50000),
(10, 'Nurul Saimon', 'CSE', '143-35-820', 'saimon@mail.com', '$2y$11$9ab23766fcfdc77d8a377e9K7zMiKUOFum/pc2a3YK7Rm0b.WSs8e', 2, 100000, 100000),
(11, 'Kona Akter', 'MCT', '143-35-817', 'kona@mail.com', '$2y$11$14d9e0793532e297fa5c5O2vkPtDdJ0w4NZSlxB2ZNH1rMsvfrxxq', 1, 50143, 50000),
(12, 'Abdullah Al Mamun', 'SWE', '143-35-833', 'mamun.al@ymail.com', '$2y$11$cc63e8be7d2e1a81905bceO9pYgDgdsbjwSLB2o7WGC0Pfwa58HeC', 3, 180000, 150000),
(14, 'Elias Hossain', 'SWE', '161-35-1426', 'elias35-1426@diu.edu.bd', '$2y$11$6230b6e0c3dc1ba889f22u7tb/.z96tC.5OAEAvz80iCHFz6r8/Ym', 1, 12500, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_login`
--

CREATE TABLE IF NOT EXISTS `teacher_login` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_name` varchar(200) NOT NULL,
  `t_mail` varchar(200) NOT NULL,
  `t_pass` varchar(200) NOT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `teacher_login`
--

INSERT INTO `teacher_login` (`row_id`, `t_name`, `t_mail`, `t_pass`) VALUES
(1, 'Mr.Teacher', 'teacher@mail.com', '$2y$11$8ebeabba236479ade4d1bOd3b8SRG83hPsLLvCG6Xb69OZCOy0EGm');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
