-- Active: 1719836222363@@127.0.0.1@3306@atlas

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


DROP DATABASE IF EXISTS `Atlas`;
CREATE DATABASE IF NOT EXISTS `Atlas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `Atlas`;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
CREATE TABLE IF NOT EXISTS `gender` (
  `genderId` int(1) NOT NULL AUTO_INCREMENT,
  `gender` varchar(20) NOT NULL DEFAULT '',
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `dateupdated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`genderId`),
  UNIQUE KEY `gender` (`gender`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`genderId`, `gender`, `datecreated`, `dateupdated`) VALUES
(1, 'Female', '2024-06-10 14:51:05', '2024-06-10 14:51:05'),
(2, 'Male', '2024-06-10 14:51:05', '2024-06-10 14:51:05'),
(3, 'Rather not say', '2024-06-10 14:51:05', '2024-06-10 14:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `roleId` int(1) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) NOT NULL DEFAULT '',
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `dateupdated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`roleId`),
  UNIQUE KEY `role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `role`, `datecreated`, `dateupdated`) VALUES
(1, 'Admin', '2024-06-10 14:50:04', '2024-06-10 14:50:04'),
(2, 'Customer', '2024-06-10 14:50:04', '2024-06-10 14:50:04'),
(3, 'Employee', '2024-06-10 14:50:04', '2024-06-10 14:50:04');


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` bigint(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(60) NOT NULL DEFAULT '',
  `genderId` int(1) NOT NULL DEFAULT 0,
  `roleId` int(1) NOT NULL DEFAULT 0,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `dateupdated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`userId`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--


DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `serviceId` bigint(11) NOT NULL AUTO_INCREMENT,
  `serviceName` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(200) NOT NULL DEFAULT '',
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `dateupdated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`serviceId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `services` (`serviceId`,`serviceName`, `description`) VALUES
(1,  'Air Freight', 'Air freight shipping service'),
(2,  'Ocean Freight', 'Ocean freight shipping service'),
(3,  'Express Shipping', 'Express shipping service'),
(4,  'Cargo Insurance', 'Cargo insurance service'),
(5,  'Local Shipping', 'Local shipping service');

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderId` bigint(11) NOT NULL AUTO_INCREMENT,
  `serviceId` bigint(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  PRIMARY KEY (`orderId`),
  FOREIGN KEY (`serviceId`) REFERENCES `services` (`serviceId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedbackId` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`feedbackId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;