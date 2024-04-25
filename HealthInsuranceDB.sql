SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

DROP DATABASE IF EXISTS `HealthInsuranceDB`;

CREATE DATABASE `HealthInsuranceDB` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `HealthInsuranceDB`;

CREATE TABLE `policies` (
  `policy_id` INT UNSIGNED AUTO_INCREMENT,
  `number` TEXT NOT NULL UNIQUE,
  CONSTRAINT PRIMARY KEY (`policy_id`)
);

CREATE TABLE `users` (
  `user_id` INT UNSIGNED AUTO_INCREMENT,
  `username` TEXT COLLATE utf8mb4_bin NOT NULL UNIQUE,
  `password_hash` TEXT COLLATE utf8mb4_bin NOT NULL,
  `policy_id` INT UNSIGNED NOT NULL,
  `name` TEXT NOT NULL,
  `email` TEXT NOT NULL,
  `address` TEXT NOT NULL,
  CONSTRAINT PRIMARY KEY (`user_id`),
  CONSTRAINT FOREIGN KEY (`policy_id`) REFERENCES `policies` (`policy_id`)
);

CREATE TABLE `admins` (
  `admin_id` INT UNSIGNED AUTO_INCREMENT,
  `username` TEXT COLLATE utf8mb4_bin NOT NULL UNIQUE,
  `password_hash` TEXT COLLATE utf8mb4_bin NOT NULL,
  `name` TEXT NOT NULL,
  CONSTRAINT PRIMARY KEY (`admin_id`)
);

CREATE TABLE `claims` (
  `claim_id` INT UNSIGNED AUTO_INCREMENT,
  `date_submitted` DATE NOT NULL,
  `user_id` INT UNSIGNED NOT NULL,
  `number` INT UNSIGNED NOT NULL,
  `expense_date` DATE NOT NULL,
  `status` ENUM('awaiting_processing','awaiting_member_info','processed', 'paid', 'cancelled') NOT NULL,
  CONSTRAINT PRIMARY KEY (`claim_id`),
  CONSTRAINT FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
);

INSERT INTO `policies` VALUES (DEFAULT, '1', 'AAOS Dummy Insurance Policy');

INSERT INTO `users` VALUES (DEFAULT, 'username1', 'passwdhash', 0, 'Alex', 'useremail@email.com', '100 Garden St.');

INSERT INTO `claims` VALUES (DEFAULT, CURDATE(), 0, 1, '2024-04-20', DEFAULT);

INSERT INTO `admins` VALUES (DEFAULT, 'an_admin_username', 'admin_pwd_hash', 'John Admin');


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;