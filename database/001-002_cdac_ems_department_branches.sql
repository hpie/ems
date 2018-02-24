-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2018 at 20:30 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cdac_ems`
--

DROP TABLE IF EXISTS `ems_department_branches`;

-- --------------------------------------------------------

--
-- Table structure for table `ems_department_branches`
--

CREATE TABLE IF NOT EXISTS `ems_department_branches` (
  `branch_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `department_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Parent Deparment of the Branch',
  `branch_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Title for the Branch',
  `branch_description` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Details of Branch',
  `branch_address1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `branch_address2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `branch_city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `branch_state` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `branch_zip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `branch_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `branch_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `branch_contact_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `branch_contact_designation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Recprd status Active, Inactive  or Deleted',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ems_department_branches`
--
ALTER TABLE `ems_department_branches`
  ADD PRIMARY KEY (`branch_code`);

  
--
-- Constraints for table `ems_department_branches`
--
ALTER TABLE `ems_department_branches`
  ADD CONSTRAINT `ems_department_branches_ibfk_1` FOREIGN KEY (`department_code`) REFERENCES `ems_departments` (`department_code`);

