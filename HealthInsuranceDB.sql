-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 25, 2024 at 07:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `HealthInsuranceDB`
--
CREATE DATABASE IF NOT EXISTS `HealthInsuranceDB` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `HealthInsuranceDB`;

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

DROP TABLE IF EXISTS `Admin`;
CREATE TABLE `Admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Audit_Result`
--

DROP TABLE IF EXISTS `Audit_Result`;
CREATE TABLE `Audit_Result` (
  `audit_id` int(11) NOT NULL,
  `claim_id` int(11) NOT NULL,
  `audit_date` datetime NOT NULL,
  `auditor_name` varchar(100) NOT NULL,
  `findings` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Claim`
--

DROP TABLE IF EXISTS `Claim`;
CREATE TABLE `Claim` (
  `claim_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `policy_id` int(11) NOT NULL,
  `claim_type` varchar(50) NOT NULL,
  `submission_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `claim_details` text NOT NULL,
  `health_insurance_number` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Claim`
--

INSERT INTO `Claim` (`claim_id`, `user_id`, `policy_id`, `claim_type`, `submission_date`, `status`, `claim_details`, `health_insurance_number`) VALUES
(1, 1, 1, 'health', '2024-04-24 00:00:00', 'Pending', 'dwwd', 'dwdw');

-- --------------------------------------------------------

--
-- Table structure for table `Claim_Assignment`
--

DROP TABLE IF EXISTS `Claim_Assignment`;
CREATE TABLE `Claim_Assignment` (
  `assignment_id` int(11) NOT NULL,
  `claim_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `assignment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Claim_Category`
--

DROP TABLE IF EXISTS `Claim_Category`;
CREATE TABLE `Claim_Category` (
  `category_id` int(11) NOT NULL,
  `claim_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Claim_Document`
--

DROP TABLE IF EXISTS `Claim_Document`;
CREATE TABLE `Claim_Document` (
  `document_id` int(11) NOT NULL,
  `claim_id` int(11) NOT NULL,
  `document_name` varchar(50) NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `file_size` decimal(10,0) NOT NULL,
  `upload_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Claim_Interaction`
--

DROP TABLE IF EXISTS `Claim_Interaction`;
CREATE TABLE `Claim_Interaction` (
  `interaction_id` int(11) NOT NULL,
  `claim_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `interaction_type` varchar(50) NOT NULL,
  `timestamp` datetime NOT NULL,
  `interaction_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Claim_Review`
--

DROP TABLE IF EXISTS `Claim_Review`;
CREATE TABLE `Claim_Review` (
  `review_id` int(11) NOT NULL,
  `claim_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `review_date` datetime NOT NULL,
  `review_outcome` varchar(60) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Feedback`
--

DROP TABLE IF EXISTS `Feedback`;
CREATE TABLE `Feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  `feedback_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Notification`
--

DROP TABLE IF EXISTS `Notification`;
CREATE TABLE `Notification` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  `notification_type` varchar(50) NOT NULL,
  `notification_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

DROP TABLE IF EXISTS `Payment`;
CREATE TABLE `Payment` (
  `payment_id` int(11) NOT NULL,
  `claim_id` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `payment_date` datetime NOT NULL,
  `payment_method` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Policy`
--

DROP TABLE IF EXISTS `Policy`;
CREATE TABLE `Policy` (
  `policy_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `policy_number` text NOT NULL,
  `policy_type` varchar(50) NOT NULL,
  `coverage_amount` decimal(10,0) NOT NULL,
  `premium_amount` decimal(10,0) NOT NULL,
  `policy_start_date` datetime NOT NULL,
  `policy_end_date` datetime NOT NULL,
  `payment_method` varchar(60) NOT NULL,
  `renewal_date` datetime NOT NULL,
  `policy_status` varchar(60) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Policy`
--

INSERT INTO `Policy` (`policy_id`, `user_id`, `policy_number`, `policy_type`, `coverage_amount`, `premium_amount`, `policy_start_date`, `policy_end_date`, `payment_method`, `renewal_date`, `policy_status`, `date_created`) VALUES
(1, 1, 'POL001', 'Health Insurance', 50000, 1000, '2024-04-01 16:09:17', '2025-04-23 16:09:17', 'Credit Card', '2024-04-23 22:09:17', 'Active', '2024-04-23 22:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `Profile`
--

DROP TABLE IF EXISTS `Profile`;
CREATE TABLE `Profile` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `profile_picture` text NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

DROP TABLE IF EXISTS `Role`;
CREATE TABLE `Role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Ticket`
--

DROP TABLE IF EXISTS `Ticket`;
CREATE TABLE `Ticket` (
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  `ticket_text` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `AssignedTo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
CREATE TABLE `User` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `role_id` enum('1') NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(50) NOT NULL,
  `secret` varchar(32) DEFAULT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`user_id`, `username`, `password_hash`, `email`, `role_id`, `full_name`, `phone`, `address`, `secret`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(1, 'amerklaus', '$2y$10$tsG/Ktrt7vhEHPW4VRWtM.wFx/kXxRntNAJ3ucxDrMkPFxyXO4jCy', 'amer1jawabra@gmail.com', '1', 'amer', '222-444-1111', '202 rue saint-marce', NULL, NULL, NULL),
(6, 'Olivier', '$2y$10$5J.wsFOJsOwFQLQuE.htVOrSpIPNO4yiEeIVAdGJFdw6z1jqt0CCS', 'fatecasual@gmail.com', '1', 'Olivier', '450-377-8434', 'testingstreet', NULL, '5468920b44c0049a085202a0237f5cc15182570ef5a3488c60f73e21cc282687', '2024-04-25 07:24:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `Audit_Result`
--
ALTER TABLE `Audit_Result`
  ADD PRIMARY KEY (`audit_id`),
  ADD KEY `claimId_foreignKey7` (`claim_id`);

--
-- Indexes for table `Claim`
--
ALTER TABLE `Claim`
  ADD PRIMARY KEY (`claim_id`),
  ADD KEY `userId_foreignKey` (`user_id`),
  ADD KEY `policyId_foreignKey` (`policy_id`);

--
-- Indexes for table `Claim_Assignment`
--
ALTER TABLE `Claim_Assignment`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `claimId_foreignKey5` (`claim_id`),
  ADD KEY `roleId_foreignKey` (`role_id`);

--
-- Indexes for table `Claim_Category`
--
ALTER TABLE `Claim_Category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `claimId_foreignKey4` (`claim_id`);

--
-- Indexes for table `Claim_Document`
--
ALTER TABLE `Claim_Document`
  ADD PRIMARY KEY (`document_id`),
  ADD KEY `claimId_foreignKey` (`claim_id`);

--
-- Indexes for table `Claim_Interaction`
--
ALTER TABLE `Claim_Interaction`
  ADD PRIMARY KEY (`interaction_id`),
  ADD KEY `claimId_foreignKey6` (`claim_id`),
  ADD KEY `userId_foreignKey5` (`user_id`);

--
-- Indexes for table `Claim_Review`
--
ALTER TABLE `Claim_Review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `userId_foreignKey2` (`claim_id`),
  ADD KEY `adminId_foreignKey` (`admin_id`);

--
-- Indexes for table `Feedback`
--
ALTER TABLE `Feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `userId_foreignKey4` (`user_id`);

--
-- Indexes for table `Notification`
--
ALTER TABLE `Notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `userId_foreignKey3` (`user_id`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `claimId_foreignKey3` (`claim_id`);

--
-- Indexes for table `Policy`
--
ALTER TABLE `Policy`
  ADD PRIMARY KEY (`policy_id`),
  ADD KEY `userId_foreignKey8` (`user_id`);

--
-- Indexes for table `Profile`
--
ALTER TABLE `Profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `userId_foreignKey7` (`user_id`);

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `Ticket`
--
ALTER TABLE `Ticket`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `userId_foreignKey6` (`user_id`),
  ADD KEY `roleId_foreignKey2` (`AssignedTo`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Audit_Result`
--
ALTER TABLE `Audit_Result`
  MODIFY `audit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Claim`
--
ALTER TABLE `Claim`
  MODIFY `claim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Claim_Assignment`
--
ALTER TABLE `Claim_Assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Claim_Category`
--
ALTER TABLE `Claim_Category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Claim_Document`
--
ALTER TABLE `Claim_Document`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Claim_Interaction`
--
ALTER TABLE `Claim_Interaction`
  MODIFY `interaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Claim_Review`
--
ALTER TABLE `Claim_Review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Feedback`
--
ALTER TABLE `Feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Notification`
--
ALTER TABLE `Notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Payment`
--
ALTER TABLE `Payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Policy`
--
ALTER TABLE `Policy`
  MODIFY `policy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Profile`
--
ALTER TABLE `Profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Role`
--
ALTER TABLE `Role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Ticket`
--
ALTER TABLE `Ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Audit_Result`
--
ALTER TABLE `Audit_Result`
  ADD CONSTRAINT `claimId_foreignKey7` FOREIGN KEY (`claim_id`) REFERENCES `Claim` (`claim_id`);

--
-- Constraints for table `Claim`
--
ALTER TABLE `Claim`
  ADD CONSTRAINT `policyId_foreignKey` FOREIGN KEY (`policy_id`) REFERENCES `Policy` (`policy_id`),
  ADD CONSTRAINT `userId_foreignKey` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`);

--
-- Constraints for table `Claim_Assignment`
--
ALTER TABLE `Claim_Assignment`
  ADD CONSTRAINT `claimId_foreignKey5` FOREIGN KEY (`claim_id`) REFERENCES `Claim` (`claim_id`),
  ADD CONSTRAINT `roleId_foreignKey` FOREIGN KEY (`role_id`) REFERENCES `Role` (`role_id`);

--
-- Constraints for table `Claim_Category`
--
ALTER TABLE `Claim_Category`
  ADD CONSTRAINT `claimId_foreignKey4` FOREIGN KEY (`claim_id`) REFERENCES `Claim` (`claim_id`);

--
-- Constraints for table `Claim_Document`
--
ALTER TABLE `Claim_Document`
  ADD CONSTRAINT `claimId_foreignKey` FOREIGN KEY (`claim_id`) REFERENCES `Claim` (`claim_id`);

--
-- Constraints for table `Claim_Interaction`
--
ALTER TABLE `Claim_Interaction`
  ADD CONSTRAINT `claimId_foreignKey6` FOREIGN KEY (`claim_id`) REFERENCES `Claim` (`claim_id`),
  ADD CONSTRAINT `userId_foreignKey5` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`);

--
-- Constraints for table `Claim_Review`
--
ALTER TABLE `Claim_Review`
  ADD CONSTRAINT `adminId_foreignKey` FOREIGN KEY (`admin_id`) REFERENCES `Admin` (`admin_id`),
  ADD CONSTRAINT `userId_foreignKey2` FOREIGN KEY (`claim_id`) REFERENCES `Claim` (`claim_id`);

--
-- Constraints for table `Feedback`
--
ALTER TABLE `Feedback`
  ADD CONSTRAINT `userId_foreignKey4` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`);

--
-- Constraints for table `Notification`
--
ALTER TABLE `Notification`
  ADD CONSTRAINT `userId_foreignKey3` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`);

--
-- Constraints for table `Payment`
--
ALTER TABLE `Payment`
  ADD CONSTRAINT `claimId_foreignKey3` FOREIGN KEY (`claim_id`) REFERENCES `Claim` (`claim_id`);

--
-- Constraints for table `Policy`
--
ALTER TABLE `Policy`
  ADD CONSTRAINT `userId_foreignKey8` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`);

--
-- Constraints for table `Profile`
--
ALTER TABLE `Profile`
  ADD CONSTRAINT `userId_foreignKey7` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`);

--
-- Constraints for table `Ticket`
--
ALTER TABLE `Ticket`
  ADD CONSTRAINT `roleId_foreignKey2` FOREIGN KEY (`AssignedTo`) REFERENCES `Role` (`role_id`),
  ADD CONSTRAINT `userId_foreignKey6` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
