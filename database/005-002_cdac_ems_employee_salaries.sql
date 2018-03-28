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

DROP TABLE IF EXISTS `ems_employee_salaries`;

-- --------------------------------------------------------

--
-- Table structure for table `ems_employee_salaries`
--

CREATE TABLE IF NOT EXISTS `ems_employee_salaries` (
  `invoice_id` bigint(20) NOT NULL,
  `employee_id` bigint(20) NOT NULL COMMENT 'Employee ID FK from ems_employees table',
  `salary_date` date NOT NULL ,
  `maximum_days` int(2) NOT NULL COMMENT 'System generated - number of days of the month',
  `days_attended` int(2) NOT NULL COMMENT 'employee input value',
  `salary_paid` int(10) NOT NULL COMMENT 'employee input value',
  `mode_of_payment` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Account Transfer, Cheque, DD, Cash - Default Account Transfer',
  `salary_status`  varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'To be initiated, Paid, Withdrawn',
  `salary_status_reason`  varchar(50) COLLATE utf8_unicode_ci NULL COMMENT 'Center can put comments for rejection, approval if required',
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
-- Indexes for table `ems_employee_salaries`
--
ALTER TABLE `ems_employee_salaries`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ems_employee_salaries`
--
ALTER TABLE `ems_employee_salaries`
  MODIFY `row_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ems_employee_salaries`
--
ALTER TABLE `ems_employee_salaries`
  ADD CONSTRAINT `ems_employee_salaries_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `ems_employees` (`employee_id`);
