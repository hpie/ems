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

DROP TABLE IF EXISTS `ems_employee_details`;

-- --------------------------------------------------------

--
-- Table structure for table `ems_employee_details`
--

CREATE TABLE IF NOT EXISTS `ems_employee_details` (
  `row_id` bigint(20) NOT NULL,
  `employee_id` bigint(20) NOT NULL COMMENT 'Employee ID FK from ems_employees table',
  `pan` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'PAN Card number',
  `employee_aadhaar` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bank_account_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Bank Account number',
  `bank_account_branch` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Bank Account branch',
  `bank_account_ifsc` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Bank Account IFSC code',
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
-- Indexes for table `ems_employee_details`
--
ALTER TABLE `ems_employee_details`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ems_employee_details`
--
ALTER TABLE `ems_employee_details`
  MODIFY `row_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ems_employee_details`
--
ALTER TABLE `ems_employee_details`
  ADD CONSTRAINT `ems_employees_details_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `ems_employees` (`employee_id`);
