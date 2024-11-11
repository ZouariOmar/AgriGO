-- phpMyAdmin SQL Dump
-- version 5.2.1deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 11, 2024 at 09:21 PM
-- Server version: 11.4.3-MariaDB-1
-- PHP Version: 8.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `AgriGO`
--

-- --------------------------------------------------------

--
-- Table structure for table `Login_History`
--

CREATE TABLE `Login_History` (
  `Login_ID` int(11) NOT NULL COMMENT 'Unique identifier for each login attempt',
  `Usr_ID` int(11) NOT NULL COMMENT 'References user_id in Users',
  `Login_timestamp` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Login time',
  `IP_address` varchar(45) NOT NULL COMMENT 'IP address used during login',
  `status` enum('SUCCESS','FAILED') NOT NULL COMMENT 'Status of the login attempt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Password_Resets`
--

CREATE TABLE `Password_Resets` (
  `Reset_ID` int(11) NOT NULL COMMENT 'Unique identifier for reset request',
  `Usr_ID` int(11) NOT NULL COMMENT 'References user_id in Users',
  `Reset_token` varchar(255) NOT NULL COMMENT 'Token for password reset',
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Reset request timestamp',
  `Expires_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Expiration time for the token'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

CREATE TABLE `Roles` (
  `Role_ID` int(11) NOT NULL COMMENT 'Unique identifier for each role',
  `Role_name` enum('SUPER ADMIN','ADMIN','CLIENT','FARMER') NOT NULL COMMENT 'Role name',
  `Description` text NOT NULL COMMENT 'Description of the role'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Usrs`
--

CREATE TABLE `Usrs` (
  `ID` int(11) NOT NULL COMMENT 'Unique identifier for each user',
  `Username` varchar(50) NOT NULL COMMENT 'Username for login',
  `Email` varchar(100) NOT NULL COMMENT 'Email address',
  `Password_hash` varchar(255) NOT NULL COMMENT 'Hashed password',
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Account creation date',
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Last profile update timestamp',
  `Status` enum('ACTIVE','INACTIVE','SUSPENDED') NOT NULL COMMENT 'Status of the account'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `Usrs`
--

INSERT INTO `Usrs` (`ID`, `Username`, `Email`, `Password_hash`, `Created_at`, `Updated_at`, `Status`) VALUES
(1, 'zouariomar', 'zouariomar20@gmail.com', 'CCCDDDSSS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `Usr_Profile`
--

CREATE TABLE `Usr_Profile` (
  `Usr_profile_ID` int(11) NOT NULL COMMENT 'Unique identifier for the profile',
  `Usr_ID` int(11) NOT NULL COMMENT 'References user_id in Users',
  `Full_name` varchar(100) NOT NULL COMMENT 'Full name of the user',
  `Tel` varchar(15) NOT NULL COMMENT 'Contact phone number',
  `State` varchar(255) NOT NULL COMMENT 'Address information',
  `Sex` enum('FEMALE','MALE') NOT NULL COMMENT 'Sex of user',
  `About` mediumtext NOT NULL COMMENT 'About the user (about yourself section)',
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Profile creation timestamp',
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Profile update timestamp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Usr_Roles`
--

CREATE TABLE `Usr_Roles` (
  `Usr_role_ID` int(11) NOT NULL COMMENT 'Unique identifier for each entry',
  `Usr_ID` int(11) NOT NULL COMMENT 'References user_id in Users',
  `Role_ID` int(11) NOT NULL COMMENT 'References role_id in Roles'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Login_History`
--
ALTER TABLE `Login_History`
  ADD PRIMARY KEY (`Login_ID`),
  ADD KEY `R03` (`Usr_ID`);

--
-- Indexes for table `Password_Resets`
--
ALTER TABLE `Password_Resets`
  ADD PRIMARY KEY (`Reset_ID`),
  ADD KEY `R04` (`Usr_ID`);

--
-- Indexes for table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`Role_ID`);

--
-- Indexes for table `Usrs`
--
ALTER TABLE `Usrs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Usr_Profile`
--
ALTER TABLE `Usr_Profile`
  ADD PRIMARY KEY (`Usr_profile_ID`),
  ADD KEY `R02` (`Usr_ID`);

--
-- Indexes for table `Usr_Roles`
--
ALTER TABLE `Usr_Roles`
  ADD PRIMARY KEY (`Usr_role_ID`),
  ADD KEY `R00` (`Usr_ID`),
  ADD KEY `R01` (`Role_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Usrs`
--
ALTER TABLE `Usrs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for each user', AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Login_History`
--
ALTER TABLE `Login_History`
  ADD CONSTRAINT `R03` FOREIGN KEY (`Usr_ID`) REFERENCES `Usrs` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Password_Resets`
--
ALTER TABLE `Password_Resets`
  ADD CONSTRAINT `R04` FOREIGN KEY (`Usr_ID`) REFERENCES `Usrs` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Usr_Profile`
--
ALTER TABLE `Usr_Profile`
  ADD CONSTRAINT `R02` FOREIGN KEY (`Usr_ID`) REFERENCES `Usrs` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Usr_Roles`
--
ALTER TABLE `Usr_Roles`
  ADD CONSTRAINT `R00` FOREIGN KEY (`Usr_ID`) REFERENCES `Usrs` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `R01` FOREIGN KEY (`Role_ID`) REFERENCES `Roles` (`Role_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
