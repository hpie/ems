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

DROP TABLE IF EXISTS `job_interview_centers`;

-- --------------------------------------------------------

--
-- Table structure for table `job_interview_centers`
--

CREATE TABLE IF NOT EXISTS `job_interview_centers` (
  `center_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `center_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Title for the center',
  `center_description` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Details of center',
  `center_address1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `center_address2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `center_city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `center_state` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `center_zip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `center_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `center_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `center_contact_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `center_contact_designation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
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
-- Indexes for table `job_interview_centers`
--
ALTER TABLE `job_interview_centers`
  ADD PRIMARY KEY (`center_code`);


