-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2014 at 10:38 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eblast`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(32) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` text NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `role`, `status`, `created`) VALUES
(1, 'admin2', '123456', 'Admin', 0, '0000-00-00 00:00:00'),
(2, 'fdsffa', '123456', 'Admin', 0, '0000-00-00 00:00:00'),
(4, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', 1, '2014-08-31 07:25:18'),
(5, '', 'e10adc3949ba59abbe56e057f20f883e', '', 0, '2014-09-05 15:17:37'),
(6, 'Last', 'e10adc3949ba59abbe56e057f20f883e', 'Teacher', 0, '2014-09-05 15:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `name`, `description`, `status`, `created`) VALUES
(1, 'BS IT', 'BS Information Technology', 1, '2014-09-05 17:38:15'),
(2, 'ACT', 'ACT', 1, '2014-09-05 17:41:33'),
(3, 'ACT', 'ACTss', 1, '2014-09-05 18:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `name`, `description`, `status`, `created`) VALUES
(1, 'General Educations', 'GE Department', 1, '2014-09-06 09:25:19'),
(2, 'Hospitality', 'BS HRM and HRS', 1, '2014-09-06 09:38:35'),
(3, 'Information Technology', 'BS IT and ACT', 1, '2014-09-06 09:39:14');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `middle_name` varchar(128) NOT NULL,
  `contact_no` varchar(128) NOT NULL,
  `email_address` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `birthdate` varchar(128) NOT NULL,
  `course` varchar(128) NOT NULL,
  `section` varchar(128) NOT NULL,
  `photo` varchar(128) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `middle_name`, `contact_no`, `email_address`, `address`, `birthdate`, `course`, `section`, `photo`, `status`, `created`) VALUES
(1, 'asddddd', ',', 'n', 'kddddddd', 'i', 'psssss', 'l', 'BS HRM', 'k', '', 1, '2014-08-31 09:37:09');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `code` varchar(16) NOT NULL,
  `course_id` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `name`, `code`, `course_id`, `unit`, `status`, `created`) VALUES
(1, 'Probability and Statistics', 'Prostat', 1, 5, 1, '2014-09-05 19:47:41');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` int(50) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `birthdate` varchar(50) NOT NULL,
  `email_add` varchar(50) NOT NULL,
  `contact` varchar(32) NOT NULL,
  `address` varchar(300) NOT NULL,
  `department_id` int(11) NOT NULL,
  `photo` varchar(128) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `last_name`, `first_name`, `middle_name`, `birthdate`, `email_add`, `contact`, `address`, `department_id`, `photo`, `status`) VALUES
(1, 'Last', 'First', 'Middle', '10/101/2013', 'h@gmail.com', '123', '', 3, 'images/victor 006.JPG', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
