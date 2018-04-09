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

DROP TABLE IF EXISTS `job_interview_schedules`;

-- --------------------------------------------------------

--
-- Table structure for table `job_interview_schedules`
--

CREATE TABLE IF NOT EXISTS `job_interview_schedules` (
  `interview_schedule_id` bigint(20) NOT NULL,
  `job_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Deparments Job Code',
  `department_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Deparment for which the Job is posted FK from ems_departments master',
  `center_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Center at which the interview will be conducted FK from job_interview_centers',
  `interview_dt` date NOT NULL COMMENT 'Date on which interview will be conducted',  
  `interview_start_time` date NOT NULL COMMENT 'Interview Start time',
  `interview_end_time` date NOT NULL COMMENT 'Interview End time',
  `interview_report_time` date NOT NULL COMMENT 'Reporting time for the interview',
  `interview_close_time` date NOT NULL COMMENT 'Reporting Close time',
  `interview_schedule_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Can be CANCELLED, DRAFT, PUBLISHED, DELETED',
  `interview_schedule_comments` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
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
-- Indexes for table `job_interview_schedules`
--
ALTER TABLE `job_interview_schedules`
  ADD PRIMARY KEY (`interview_schedule_id`),
  ADD KEY (`job_code`),
  ADD KEY (`department_code`),
  ADD KEY (`center_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_interview_schedules`
--
ALTER TABLE `job_interview_schedules`
  MODIFY `interview_schedule_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `job_interview_schedules`
--
ALTER TABLE `job_interview_schedules`
  ADD CONSTRAINT `job_interview_schedules_ibfk_1` FOREIGN KEY (`job_code`) REFERENCES `job_postings` (`job_code`),
  ADD CONSTRAINT `job_interview_schedules_ibfk_2` FOREIGN KEY (`department_code`) REFERENCES `ems_departments` (`department_code`),
  ADD CONSTRAINT `job_interview_schedules_ibfk_3` FOREIGN KEY (`center_code`) REFERENCES `job_interview_centers` (`center_code`);
