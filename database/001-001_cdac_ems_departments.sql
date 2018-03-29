-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2018 at 12:44 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cdac_ems2`
--

-- --------------------------------------------------------

--
-- Table structure for table `ems_departments`
--

CREATE TABLE IF NOT EXISTS `ems_departments` (
  `department_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `department_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Title for the Department',
  `department_description` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Details of Department',
  `department_address1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `department_address2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `department_city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `department_state` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `department_zip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `department_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `department_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `department_contact_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `department_contact_designation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Recprd status Active, Inactive  or Deleted',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ems_departments`
--

INSERT INTO `ems_departments` (`department_code`, `department_title`, `department_description`, `department_address1`, `department_address2`, `department_city`, `department_state`, `department_zip`, `department_email`, `department_phone`, `department_contact_name`, `department_contact_designation`, `status`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
('1', 'abc', 'asdsadd', 'sads', 'dads', 'sadd', 'dsa', '394310', 'd@gmail.com', '9099384773', 'lk', 'sr', 'open', '', '2018-03-29 06:00:30', NULL, '2018-03-29 06:00:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ems_departments`
--
ALTER TABLE `ems_departments`
  ADD PRIMARY KEY (`department_code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
