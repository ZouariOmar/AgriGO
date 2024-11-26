-- phpMyAdmin SQL Dump
-- version 5.2.1deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 26, 2024 at 12:39 PM
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
-- Table structure for table `Images`
--

CREATE TABLE `Images` (
  `Image_ID` int(11) NOT NULL COMMENT 'Image ID',
  `Image_Name` varchar(255) NOT NULL COMMENT 'Image Name',
  `Image_Type` varchar(50) NOT NULL COMMENT 'Image Type (jpeg/png)',
  `Image_Data` longblob NOT NULL COMMENT 'Image binary data'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Login_History`
--

CREATE TABLE `Login_History` (
  `Login_ID` int(11) NOT NULL COMMENT 'Unique identifier for each login attempt',
  `Usr_ID` int(11) NOT NULL COMMENT 'References user_id in Users',
  `IP_Address` varchar(45) DEFAULT NULL COMMENT 'The IP address from which the user is viewing the current page',
  `Usr_Host` varchar(45) DEFAULT NULL COMMENT 'The Host name from which the user is viewing the current page. The reverse dns lookup is based on the REMOTE_ADDR of the user',
  `Server_Address` varchar(45) DEFAULT NULL COMMENT 'The IP address of the server under which the current script is executing',
  `Server_Name` varchar(45) DEFAULT NULL COMMENT 'The name of the server host under which the current script is executing. If the script is running on a virtual host, this will be the value defined for that virtual host',
  `Server_Protocol` varchar(45) DEFAULT NULL COMMENT 'Name and revision of the information protocol via which the page was requested; e.g. ''HTTP/1.0''',
  `Login_timestamp` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Login time',
  `Status` enum('SUCCESS','FAILED') NOT NULL COMMENT 'Status of the login attempt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `Login_History`
--

INSERT INTO `Login_History` (`Login_ID`, `Usr_ID`, `IP_Address`, `Usr_Host`, `Server_Address`, `Server_Name`, `Server_Protocol`, `Login_timestamp`, `Status`) VALUES
(78, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-11-23 22:03:46', 'SUCCESS'),
(79, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-11-23 22:33:16', 'SUCCESS'),
(80, 61, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-11-24 13:22:22', 'SUCCESS'),
(81, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-11-24 13:22:49', 'SUCCESS'),
(82, 61, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-11-25 12:19:23', 'SUCCESS'),
(83, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-11-25 12:19:43', 'SUCCESS'),
(84, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-11-25 13:15:05', 'SUCCESS'),
(85, 64, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-11-25 13:22:34', 'SUCCESS'),
(86, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-11-25 13:22:58', 'SUCCESS'),
(87, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-11-26 08:13:26', 'SUCCESS');

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
  `Role_Name` enum('SUPER ADMIN','ADMIN','CLIENT','FARMER') NOT NULL COMMENT 'Role name',
  `Description` text NOT NULL COMMENT 'Description of the role'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `Roles`
--

INSERT INTO `Roles` (`Role_ID`, `Role_Name`, `Description`) VALUES
(1, 'SUPER ADMIN', 'Has full access to all system functionalities.'),
(2, 'ADMIN', 'Has administrative access with some restrictions.'),
(3, 'CLIENT', 'Can access and interact with certain parts of the system.'),
(4, 'FARMER', 'Has limited access related to farming functionalities.');

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
(60, 'admin', 'admin@admin.com', '$2y$10$Jm0i/zt9sXVJsJK1VIVsoeJnqDXYfAuyL.K9tZ9Ilb2J1zGznq6fG', '2024-11-23 22:03:03', '2024-11-23 22:03:03', 'ACTIVE'),
(61, 'omarzouari', 'rvrrv@fefef.com', '$2y$10$T5qOq0J8.8LE5KyQmyFKuew52eCI5Dbsc3PiAU0LnuwqQ646UO42C', '2024-11-23 22:23:17', '2024-11-23 22:23:17', 'ACTIVE'),
(64, 'emnaWeb', 'emna@gmail.com', '$2y$10$XCDWyX72y4qHCRuA/5w5M.aBMeSj21FTOpmqlXebsOFy1sQ1ZRF22', '2024-11-25 13:21:31', '2024-11-25 13:21:31', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `Usr_Profile`
--

CREATE TABLE `Usr_Profile` (
  `Usr_profile_ID` int(11) NOT NULL COMMENT 'Unique identifier for the profile',
  `Usr_ID` int(11) NOT NULL COMMENT 'References user_id in Users',
  `Image_ID` int(11) DEFAULT NULL COMMENT 'Image ID',
  `First_Name` varchar(50) DEFAULT NULL COMMENT 'First name of the user',
  `Last_Name` varchar(50) DEFAULT NULL COMMENT 'Last name of the user',
  `Tel` varchar(15) DEFAULT NULL COMMENT 'Contact phone number',
  `Sex` enum('FEMALE','MALE') DEFAULT NULL COMMENT 'Sex of user',
  `State` varchar(255) DEFAULT NULL COMMENT 'Address information (Tunis, sfax, sousse...)',
  `Address` varchar(255) DEFAULT NULL COMMENT 'Home/Work address',
  `Zip_Code` int(11) DEFAULT NULL COMMENT 'Zip code of the user',
  `About` mediumtext DEFAULT NULL COMMENT 'About the user (about yourself section)',
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Profile creation timestamp',
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Profile update timestamp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `Usr_Profile`
--

INSERT INTO `Usr_Profile` (`Usr_profile_ID`, `Usr_ID`, `Image_ID`, `First_Name`, `Last_Name`, `Tel`, `Sex`, `State`, `Address`, `Zip_Code`, `About`, `Created_at`, `Updated_at`) VALUES
(21, 60, NULL, 'omar', 'zouari', '93940909', 'FEMALE', 'Bangladesh', 'Tunis, Sfax', 4445, 'HelloWorld!																					', '2024-11-23 22:03:03', '2024-11-26 12:37:53'),
(22, 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-23 22:23:17', '2024-11-23 22:23:17'),
(25, 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-25 13:21:31', '2024-11-25 13:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `Usr_Roles`
--

CREATE TABLE `Usr_Roles` (
  `Usr_Role_ID` int(11) NOT NULL COMMENT 'Unique identifier for each entry',
  `Usr_ID` int(11) NOT NULL COMMENT 'References user_id in Users',
  `Role_ID` int(11) NOT NULL COMMENT 'References role_id in Roles'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `Usr_Roles`
--

INSERT INTO `Usr_Roles` (`Usr_Role_ID`, `Usr_ID`, `Role_ID`) VALUES
(25, 60, 2),
(26, 61, 3),
(29, 64, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Images`
--
ALTER TABLE `Images`
  ADD PRIMARY KEY (`Image_ID`);

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
  ADD KEY `R02` (`Usr_ID`),
  ADD KEY `Image_ID` (`Image_ID`);

--
-- Indexes for table `Usr_Roles`
--
ALTER TABLE `Usr_Roles`
  ADD PRIMARY KEY (`Usr_Role_ID`),
  ADD KEY `R00` (`Usr_ID`),
  ADD KEY `R01` (`Role_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Images`
--
ALTER TABLE `Images`
  MODIFY `Image_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Image ID';

--
-- AUTO_INCREMENT for table `Login_History`
--
ALTER TABLE `Login_History`
  MODIFY `Login_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for each login attempt', AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `Roles`
--
ALTER TABLE `Roles`
  MODIFY `Role_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for each role', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Usrs`
--
ALTER TABLE `Usrs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for each user', AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `Usr_Profile`
--
ALTER TABLE `Usr_Profile`
  MODIFY `Usr_profile_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for the profile', AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `Usr_Roles`
--
ALTER TABLE `Usr_Roles`
  MODIFY `Usr_Role_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for each entry', AUTO_INCREMENT=30;

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
  ADD CONSTRAINT `R02` FOREIGN KEY (`Usr_ID`) REFERENCES `Usrs` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Usr_Profile_ibfk_1` FOREIGN KEY (`Image_ID`) REFERENCES `Images` (`Image_ID`);

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
