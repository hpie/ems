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

DROP TABLE IF EXISTS `ems_employee_attendance`;

-- --------------------------------------------------------

--
-- Table structure for table `ems_employee_attendance`
--

CREATE TABLE IF NOT EXISTS `ems_employee_attendance` (
  `row_id` bigint(20) NOT NULL,
  `employee_id` bigint(20) NOT NULL COMMENT 'Employee ID FK from ems_employees table',
  `attendance_month` date NOT NULL COMMENT 'Users will select the month of attendance',
  `maximum_days` int(2) NOT NULL COMMENT 'System generated - number of days of the month',
  `days_attended` int(2) NOT NULL COMMENT 'employee input value',
  `days_absent` int(2) NOT NULL COMMENT 'employee input value',
  `approval_status`  varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Saved, Submitted, Approved, Rejected',
  `approval_status_reason`  varchar(50) COLLATE utf8_unicode_ci NULL COMMENT 'Center can put comments for rejection, approval if required',
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Record status Active, Inactive or Deleted',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ems_employee_attendance`
--
ALTER TABLE `ems_employee_attendance`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ems_employee_attendance`
--
ALTER TABLE `ems_employee_attendance`
  MODIFY `row_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ems_employee_attendance`
--
ALTER TABLE `ems_employee_attendance`
  ADD CONSTRAINT `ems_employee_attendance_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `ems_employees` (`employee_id`);
