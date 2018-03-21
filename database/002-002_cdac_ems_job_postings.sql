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

DROP TABLE IF EXISTS `job_postings`;

-- --------------------------------------------------------

--
-- Table structure for table `job_postings`
--

CREATE TABLE IF NOT EXISTS `job_postings` (
  `row_id` bigint(20) NOT NULL,
  `job_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Deparments Job Code',
  `department_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Deparment for which the Job is posted FK from ems_departments master',
  `job_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Title for the job',
  `job_description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Details of Job',
  `job_salary_range` varchar(10) COLLATE utf8_unicode_ci NULL COMMENT 'Salary range - can also be NA',
  `job_ref_document` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Uploaded document for the posted Job',
  `job_post_dt` date NOT NULL COMMENT 'Date job was posted',  
  `job_last_dt` date NOT NULL COMMENT 'Last date for submission of application',
  `job_expire_dt` date NOT NULL COMMENT 'Date job will expire',
  `job_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Can be ONLINE, OFFLINE, DRAFT',
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
-- Indexes for table `job_postings`
--
ALTER TABLE `job_postings`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `job_code` (`job_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_postings`
--
ALTER TABLE `job_postings`
  MODIFY `row_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `job_postings`
--
ALTER TABLE `job_postings`
  ADD CONSTRAINT `job_postings_ibfk_1` FOREIGN KEY (`department_code`) REFERENCES `ems_departments` (`department_code`);
