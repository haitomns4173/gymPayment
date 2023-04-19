-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2023 at 04:55 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymbill`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminregistereduser`
--

CREATE TABLE `adminregistereduser` (
  `userIdentity` int(11) NOT NULL,
  `userEmail` tinytext NOT NULL,
  `userPermissionNo` int(11) NOT NULL,
  `userName` tinytext NOT NULL,
  `passwordHash` tinytext NOT NULL,
  `createdDateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

INSERT INTO `adminregistereduser` (`userIdentity`, `userEmail`, `userPermissionNo`, `userName`, `passwordHash`, `createdDateTime`) VALUES
(1, 'haitomnsgroups@gmail.com', 1, 'haitomnsGroups', '$2y$10$AX/MqXTs6raPoUXuo0QEYONBrAyQNjgbhcYQwO8/v94zROPP2nZTC', '2023-04-19 08:43:34');

--
-- Table structure for table `members_list`
--

CREATE TABLE `members_list` (
  `member_id` int(11) NOT NULL,
  `full_name` varchar(256) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(512) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `height` varchar(5) NOT NULL,
  `weight` varchar(5) NOT NULL,
  `member_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_list`
--

CREATE TABLE `payment_list` (
  `payment_Id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `payment_amt` float NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminregistereduser`
--
ALTER TABLE `adminregistereduser`
  ADD PRIMARY KEY (`userIdentity`);

--
-- Indexes for table `members_list`
--
ALTER TABLE `members_list`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `payment_list`
--
ALTER TABLE `payment_list`
  ADD PRIMARY KEY (`payment_Id`),
  ADD KEY `members_payment_ref` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminregistereduser`
--
ALTER TABLE `adminregistereduser`
  MODIFY `userIdentity` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members_list`
--
ALTER TABLE `members_list`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_list`
--
ALTER TABLE `payment_list`
  MODIFY `payment_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment_list`
--
ALTER TABLE `payment_list`
  ADD CONSTRAINT `members_payment_ref` FOREIGN KEY (`member_id`) REFERENCES `members_list` (`member_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
