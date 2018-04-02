-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2018 at 02:37 PM
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
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL,
  `admin_firstName` varchar(200) NOT NULL,
  `admin_lastName` varchar(200) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) NOT NULL,
  `modified_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `admin_firstName`, `admin_lastName`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 'admin@gmail.com', '1234', 'cdac', 'test', '', '2018-03-28 17:47:07', '', '2018-03-28 17:47:07');

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

-- --------------------------------------------------------

--
-- Table structure for table `ems_employees`
--

CREATE TABLE IF NOT EXISTS `ems_employees` (
  `employee_id` bigint(20) NOT NULL,
  `candicate_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Candidatecode generated by system',
  `offer_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Deparments Job Code FK from job_postings',
  `employee_first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `employee_middle_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employee_last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `employee_dob` date NOT NULL,
  `employee_gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `employee_marital_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `father_first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `father_middle_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mother_middle_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employee_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `employee_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `employee_aadhaar` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `joining_dt` date NOT NULL COMMENT 'Date on which candemployee has joined',
  `employee_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Can be DRAFT, SENT, ACCEPTED, REJECTED, JOINED',
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Record status Active, Inactive or Deleted',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `approval_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Saved, Submitted, Approved, Rejected',
  `approval_status_reason` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Center can put comments for rejection, approval if required',
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Record status Active, Inactive or Deleted',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `ems_employee_salaries`
--

CREATE TABLE IF NOT EXISTS `ems_employee_salaries` (
  `invoice_id` bigint(20) NOT NULL,
  `employee_id` bigint(20) NOT NULL COMMENT 'Employee ID FK from ems_employees table',
  `salary_date` date NOT NULL,
  `maximum_days` int(2) NOT NULL COMMENT 'System generated - number of days of the month',
  `days_attended` int(2) NOT NULL COMMENT 'employee input value',
  `salary_paid` int(10) NOT NULL COMMENT 'employee input value',
  `mode_of_payment` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Account Transfer, Cheque, DD, Cash - Default Account Transfer',
  `salary_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'To be initiated, Paid, Withdrawn',
  `salary_status_reason` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Center can put comments for rejection, approval if required',
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Record status Active, Inactive or Deleted',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `job_interview_registrations`
--

CREATE TABLE IF NOT EXISTS `job_interview_registrations` (
  `row_id` bigint(20) NOT NULL,
  `candicate_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Candidatecode generated by system',
  `job_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Deparments Job Code FK from job_postings',
  `department_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Deparment for which the Job is posted FK from ems_departments master',
  `candicate_first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `candicate_middle_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `candicate_last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `candicate_dob` date NOT NULL,
  `candicate_gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `father_first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `father_middle_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mother_middle_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `candicate_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `candicate_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `candicate_aadhaar` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `candicate_address1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `candicate_address2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `candicate_city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `candicate_state` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `candicate_zip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cv_path` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prefred_schedule_id` bigint(20) DEFAULT NULL COMMENT 'Preffered Interview Center  FK from job_interview_schedules',
  `interview_registration_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Can be DRAFT, SUBMITTED, REGISTERED, CONFIRMED',
  `alloted_schedule_id` bigint(20) DEFAULT NULL COMMENT 'Interview Schedule details date and center FK from job_interview_schedules',
  `interview_registration_comments` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Commetns for the Candidate',
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Record status Active, Inactive or Deleted',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `job_offers`
--

CREATE TABLE IF NOT EXISTS `job_offers` (
  `offer_id` bigint(20) NOT NULL,
  `candicate_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Candidatecode generated by system',
  `job_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Deparments Job Code FK from job_postings',
  `department_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Deparment for which the Job is posted FK from ems_departments master',
  `branch_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Job offer location. which branch of the department',
  `offer_start_dt` date NOT NULL COMMENT 'Date on which the offer ',
  `offer_end_dt` date NOT NULL COMMENT 'Date till which the Offer Letter is valid ',
  `reporting_dt` date NOT NULL COMMENT 'Date on which candicate has to report for joining',
  `joining_dt` date NOT NULL COMMENT 'Date on which candicate has joined',
  `offered_salary` decimal(13,2) NOT NULL COMMENT 'Gross Salary ofered',
  `offer_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Can be DRAFT, SENT, ACCEPTED, REJECTED, JOINED',
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Record status Active, Inactive or Deleted',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `job_salary_range` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Salary range - can also be NA',
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `job_postings`
--

INSERT INTO `job_postings` (`row_id`, `job_code`, `department_code`, `job_title`, `job_description`, `job_salary_range`, `job_ref_document`, `job_post_dt`, `job_last_dt`, `job_expire_dt`, `job_status`, `status`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(5, '#JOB5123', '1', 'Fullstack web developer needed', '<p><span style="color: rgb(68, 68, 68);">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quaerat aut veniam molestiae atque dolorum omnis temporibus consequuntur saepe. Nemo atque consectetur saepe corporis odit in dicta reprehenderit, officiis, praesentium?</span><br></p>', '15000 to 20000', 'das', '2018-03-29', '2018-03-29', '2018-03-29', 'open', 'open', '2', '2018-03-29 06:11:10', '2', '2018-03-29 09:25:15'),
(6, '#JOB6123', '1', 'Need a web designer', '<p><span style="color: rgb(68, 68, 68);">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quaerat aut veniam molestiae atque dolorum omnis temporibus consequuntur saepe. Nemo atque consectetur saepe corporis odit in dicta reprehenderit, officiis, praesentium?</span><br></p>', 'â‚¹15,000 - â‚¹20,000', 'Example', '2018-03-29', '2018-03-29', '2018-03-31', 'open', 'open', '2', '2018-03-29 06:16:12', '2', '2018-03-29 06:16:12'),
(7, '#JOB7123', '1', 'Front-end developer', '<p style="margin-bottom: 20px; color: rgb(136, 136, 136);">LemonKids LLC. In marketing communications, we dream it and create it. All of the companyâ€™s promotional and communication needs are completed in-house by these â€œcreativesâ€ in an advertising agency-based set-up. This includes everything from advertising, promotions and print production to media relations, exhibition coordination and website maintenance. Everyone from artists, writers, designers, media buyers, event coordinators, video producers/editors and public relations specialists work together to bring campaigns and product-centric promotions to life.</p><p style="margin-bottom: 20px; color: rgb(136, 136, 136);">If youâ€™re a dreamer, gather up your portfolio and show us your vision. Garmin is adding one more enthusiastic individual to our in-house Communications expert team.</p>', 'Monthly Salary: $7000 - $7500', 'Example', '2018-03-22', '2018-03-29', '2018-03-30', 'open', 'open', '2', '2018-03-29 06:19:42', '2', '2018-03-29 06:19:42'),
(8, '#JOB8123', '1', 'Senior Accountant', '<p style="margin-bottom: 20px; color: rgb(136, 136, 136);">LemonKids LLC. In marketing communications, we dream it and create it. All of the companyâ€™s promotional and communication needs are completed in-house by these â€œcreativesâ€ in an advertising agency-based set-up. This includes everything from advertising, promotions and print production to media relations, exhibition coordination and website maintenance. Everyone from artists, writers, designers, media buyers, event coordinators, video producers/editors and public relations specialists work together to bring campaigns and product-centric promotions to life.</p><p style="margin-bottom: 20px; color: rgb(136, 136, 136);">If youâ€™re a dreamer, gather up your portfolio and show us your vision. Garmin is adding one more enthusiastic individual to our in-house Communications expert team.</p>', 'Monthly Salary: $7000 - $7500', 'Example', '2018-03-22', '2018-03-29', '2018-03-30', 'open', 'open', '2', '2018-03-29 06:19:42', '2', '2018-03-29 08:49:11'),
(21, '#JOB5123', '1', '1Fullstack web developer needed', '<p><span style="color: rgb(68, 68, 68);">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quaerat aut veniam molestiae atque dolorum omnis temporibus consequuntur saepe. Nemo atque consectetur saepe corporis odit in dicta reprehenderit, officiis, praesentium?</span><br></p>', '15000 to 20000', 'das', '2018-03-29', '2018-03-29', '2018-03-29', 'open', 'open', '2', '2018-03-29 06:11:10', '2', '2018-03-29 09:25:27'),
(22, '#JOB6123', '1', '2Need a web designer', '<p><span style="color: rgb(68, 68, 68);">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quaerat aut veniam molestiae atque dolorum omnis temporibus consequuntur saepe. Nemo atque consectetur saepe corporis odit in dicta reprehenderit, officiis, praesentium?</span><br></p>', 'â‚¹15,000 - â‚¹20,000', 'Example', '2018-03-29', '2018-03-29', '2018-03-31', 'open', 'open', '2', '2018-03-29 06:16:12', '2', '2018-03-29 08:50:42'),
(23, '#JOB7123', '1', '3Front-end developer', '<p style="margin-bottom: 20px; color: rgb(136, 136, 136);">LemonKids LLC. In marketing communications, we dream it and create it. All of the companyâ€™s promotional and communication needs are completed in-house by these â€œcreativesâ€ in an advertising agency-based set-up. This includes everything from advertising, promotions and print production to media relations, exhibition coordination and website maintenance. Everyone from artists, writers, designers, media buyers, event coordinators, video producers/editors and public relations specialists work together to bring campaigns and product-centric promotions to life.</p><p style="margin-bottom: 20px; color: rgb(136, 136, 136);">If youâ€™re a dreamer, gather up your portfolio and show us your vision. Garmin is adding one more enthusiastic individual to our in-house Communications expert team.</p>', 'Monthly Salary: $7000 - $7500', 'Example', '2018-03-22', '2018-03-29', '2018-03-30', 'open', 'open', '2', '2018-03-29 06:19:42', '2', '2018-03-29 08:50:45'),
(24, '#JOB8123', '1', '4Senior Accountant', '<p style="margin-bottom: 20px; color: rgb(136, 136, 136);">LemonKids LLC. In marketing communications, we dream it and create it. All of the companyâ€™s promotional and communication needs are completed in-house by these â€œcreativesâ€ in an advertising agency-based set-up. This includes everything from advertising, promotions and print production to media relations, exhibition coordination and website maintenance. Everyone from artists, writers, designers, media buyers, event coordinators, video producers/editors and public relations specialists work together to bring campaigns and product-centric promotions to life.</p><p style="margin-bottom: 20px; color: rgb(136, 136, 136);">If youâ€™re a dreamer, gather up your portfolio and show us your vision. Garmin is adding one more enthusiastic individual to our in-house Communications expert team.</p>', 'Monthly Salary: $7000 - $7500', 'Example', '2018-03-22', '2018-03-29', '2018-03-30', 'open', 'open', '2', '2018-03-29 06:19:42', '2', '2018-03-29 08:50:48'),
(25, '#JOB5123', '1', '11Fullstack web developer needed', '<p><span style="color: rgb(68, 68, 68);">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quaerat aut veniam molestiae atque dolorum omnis temporibus consequuntur saepe. Nemo atque consectetur saepe corporis odit in dicta reprehenderit, officiis, praesentium?</span><br></p>', '15000 to 20000', 'das', '2018-03-29', '2018-03-29', '2018-03-29', 'open', 'open', '2', '2018-03-29 06:11:10', '2', '2018-03-29 09:25:29'),
(26, '#JOB6123', '1', '22Need a web designer', '<p><span style="color: rgb(68, 68, 68);">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quaerat aut veniam molestiae atque dolorum omnis temporibus consequuntur saepe. Nemo atque consectetur saepe corporis odit in dicta reprehenderit, officiis, praesentium?</span><br></p>', 'â‚¹15,000 - â‚¹20,000', 'Example', '2018-03-29', '2018-03-29', '2018-03-31', 'open', 'open', '2', '2018-03-29 06:16:12', '2', '2018-03-29 08:51:18'),
(27, '#JOB7123', '1', '33Front-end developer', '<p style="margin-bottom: 20px; color: rgb(136, 136, 136);">LemonKids LLC. In marketing communications, we dream it and create it. All of the companyâ€™s promotional and communication needs are completed in-house by these â€œcreativesâ€ in an advertising agency-based set-up. This includes everything from advertising, promotions and print production to media relations, exhibition coordination and website maintenance. Everyone from artists, writers, designers, media buyers, event coordinators, video producers/editors and public relations specialists work together to bring campaigns and product-centric promotions to life.</p><p style="margin-bottom: 20px; color: rgb(136, 136, 136);">If youâ€™re a dreamer, gather up your portfolio and show us your vision. Garmin is adding one more enthusiastic individual to our in-house Communications expert team.</p>', 'Monthly Salary: $7000 - $7500', 'Example', '2018-03-22', '2018-03-29', '2018-03-30', 'open', 'open', '2', '2018-03-29 06:19:42', '2', '2018-03-29 08:51:22'),
(28, '#JOB8123', '1', '44Senior Accountant', '<p style="margin-bottom: 20px; color: rgb(136, 136, 136);">LemonKids LLC. In marketing communications, we dream it and create it. All of the companyâ€™s promotional and communication needs are completed in-house by these â€œcreativesâ€ in an advertising agency-based set-up. This includes everything from advertising, promotions and print production to media relations, exhibition coordination and website maintenance. Everyone from artists, writers, designers, media buyers, event coordinators, video producers/editors and public relations specialists work together to bring campaigns and product-centric promotions to life.</p><p style="margin-bottom: 20px; color: rgb(136, 136, 136);">If youâ€™re a dreamer, gather up your portfolio and show us your vision. Garmin is adding one more enthusiastic individual to our in-house Communications expert team.</p>', 'Monthly Salary: $7000 - $7500', 'Example', '2018-03-22', '2018-03-29', '2018-03-30', 'open', 'open', '2', '2018-03-29 06:19:42', '2', '2018-03-29 08:51:24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `refDepartment_code` varchar(20) NOT NULL,
  `user_firstname` varchar(200) NOT NULL,
  `user_lastname` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_type` enum('Employee','Department') NOT NULL DEFAULT 'Employee',
  `created_by` varchar(50) NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) NOT NULL,
  `modified_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `refDepartment_code`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_type`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, '1', 'Vasim', 'look', 'employee@gmail.com', '1234', 'Employee', '', '2018-03-28 17:48:18', '', '2018-03-29 05:50:44'),
(2, '1', 'Gaurav', 'updhyay', 'department@gmail.com', '1234', 'Department', '', '2018-03-28 17:48:18', '', '2018-03-29 05:50:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ems_departments`
--
ALTER TABLE `ems_departments`
  ADD PRIMARY KEY (`department_code`);

--
-- Indexes for table `ems_department_branches`
--
ALTER TABLE `ems_department_branches`
  ADD PRIMARY KEY (`branch_code`),
  ADD KEY `ems_department_branches_ibfk_1` (`department_code`);

--
-- Indexes for table `ems_employees`
--
ALTER TABLE `ems_employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `ems_employee_attendance`
--
ALTER TABLE `ems_employee_attendance`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `ems_employee_details`
--
ALTER TABLE `ems_employee_details`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `job_interview_centers`
--
ALTER TABLE `job_interview_centers`
  ADD PRIMARY KEY (`center_code`);

--
-- Indexes for table `job_interview_registrations`
--
ALTER TABLE `job_interview_registrations`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `job_interview_candicate_code` (`candicate_code`),
  ADD KEY `job_interview_registrations_ibfk_1` (`department_code`),
  ADD KEY `job_interview_registrations_ibfk_2` (`prefred_schedule_id`),
  ADD KEY `job_interview_registrations_ibfk_3` (`alloted_schedule_id`);

--
-- Indexes for table `job_interview_schedules`
--
ALTER TABLE `job_interview_schedules`
  ADD PRIMARY KEY (`interview_schedule_id`);

--
-- Indexes for table `job_offers`
--
ALTER TABLE `job_offers`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `job_postings`
--
ALTER TABLE `job_postings`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `job_code` (`job_code`),
  ADD KEY `job_postings_ibfk_1` (`department_code`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ems_employees`
--
ALTER TABLE `ems_employees`
  MODIFY `employee_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ems_employee_attendance`
--
ALTER TABLE `ems_employee_attendance`
  MODIFY `row_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ems_employee_details`
--
ALTER TABLE `ems_employee_details`
  MODIFY `row_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `job_interview_registrations`
--
ALTER TABLE `job_interview_registrations`
  MODIFY `row_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `job_interview_schedules`
--
ALTER TABLE `job_interview_schedules`
  MODIFY `interview_schedule_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `job_postings`
--
ALTER TABLE `job_postings`
  MODIFY `row_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ems_department_branches`
--
ALTER TABLE `ems_department_branches`
  ADD CONSTRAINT `ems_department_branches_ibfk_1` FOREIGN KEY (`department_code`) REFERENCES `ems_departments` (`department_code`);

--
-- Constraints for table `ems_employee_attendance`
--
ALTER TABLE `ems_employee_attendance`
  ADD CONSTRAINT `ems_employee_attendance_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `ems_employees` (`employee_id`);

--
-- Constraints for table `ems_employee_details`
--
ALTER TABLE `ems_employee_details`
  ADD CONSTRAINT `ems_employees_details_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `ems_employees` (`employee_id`);

--
-- Constraints for table `job_interview_registrations`
--
ALTER TABLE `job_interview_registrations`
  ADD CONSTRAINT `job_interview_registrations_ibfk_1` FOREIGN KEY (`department_code`) REFERENCES `ems_departments` (`department_code`),
  ADD CONSTRAINT `job_interview_registrations_ibfk_2` FOREIGN KEY (`prefred_schedule_id`) REFERENCES `job_interview_schedules` (`interview_schedule_id`),
  ADD CONSTRAINT `job_interview_registrations_ibfk_3` FOREIGN KEY (`alloted_schedule_id`) REFERENCES `job_interview_schedules` (`interview_schedule_id`);

--
-- Constraints for table `job_postings`
--
ALTER TABLE `job_postings`
  ADD CONSTRAINT `job_postings_ibfk_1` FOREIGN KEY (`department_code`) REFERENCES `ems_departments` (`department_code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
