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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_postings`
--
ALTER TABLE `job_postings`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `job_code` (`job_code`),
  ADD KEY `department_code` (`department_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_postings`
--
ALTER TABLE `job_postings`
  MODIFY `row_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `job_postings`
--
ALTER TABLE `job_postings`
  ADD CONSTRAINT `job_postings_ibfk_1` FOREIGN KEY (`department_code`) REFERENCES `ems_departments` (`department_code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
