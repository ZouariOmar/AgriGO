-- phpMyAdmin SQL Dump
-- version 5.2.1deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2024 at 04:52 PM
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
  `Name` varchar(255) NOT NULL COMMENT 'Image Name',
  `Path` varchar(255) NOT NULL COMMENT 'Image path',
  `Type` varchar(50) DEFAULT NULL COMMENT 'Image Type (jpeg/png)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `Images`
--

INSERT INTO `Images` (`Image_ID`, `Name`, `Path`, `Type`) VALUES
(39, '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', 'uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', 'image/png'),
(40, '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', 'uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', 'image/png'),
(41, 'Linkedin Banner.png', 'uploads/Linkedin Banner.png', 'image/png'),
(42, '401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png', '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png', 'image/png'),
(43, 'Linkedin Banner.png', '../../public/assets/uploads/Linkedin Banner.png', 'image/png'),
(44, 'Linkedin Banner.png', '../../public/assets/uploads/Linkedin Banner.png', 'image/png'),
(45, '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', 'image/png'),
(46, '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', 'image/png'),
(47, '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', 'image/png'),
(48, '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', 'image/png'),
(49, '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', 'image/png'),
(50, '401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png', '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png', 'image/png'),
(51, '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', 'image/png'),
(52, '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', 'image/png'),
(53, '401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png', '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png', 'image/png'),
(54, '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', 'image/png'),
(55, '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', 'image/png'),
(56, '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', 'image/png'),
(57, '', '../../public/assets/uploads/', ''),
(58, '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png', 'image/png'),
(59, '401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png', '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png', 'image/png'),
(60, '401700700_201885956291933_7864594178641459272_n-removebg-preview.png', '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview.png', 'image/png'),
(61, '401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png', '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png', 'image/png'),
(62, '401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png', '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png', 'image/png'),
(63, '401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png', '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png', 'image/png'),
(64, '401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png', '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png', 'image/png');

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
(116, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-02 14:53:59', 'SUCCESS'),
(117, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-02 14:56:06', 'SUCCESS'),
(118, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-02 20:20:18', 'SUCCESS'),
(119, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-02 20:20:24', 'SUCCESS'),
(120, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-02 20:21:34', 'SUCCESS'),
(121, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-02 21:17:31', 'SUCCESS'),
(122, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-02 21:17:39', 'SUCCESS'),
(123, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-02 21:20:26', 'SUCCESS'),
(124, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-02 21:31:32', 'SUCCESS'),
(125, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-02 22:04:59', 'FAILED'),
(126, 61, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-02 22:08:27', 'SUCCESS'),
(127, 61, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-02 22:08:53', 'FAILED'),
(128, 61, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-02 22:09:17', 'FAILED'),
(129, 61, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-02 22:10:49', 'FAILED'),
(130, 61, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-02 22:12:40', 'FAILED'),
(131, 61, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-02 22:13:05', 'FAILED'),
(132, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-02 22:13:40', 'SUCCESS'),
(133, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-05 17:40:11', 'SUCCESS'),
(134, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-06 18:17:41', 'SUCCESS'),
(135, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-06 21:03:48', 'SUCCESS'),
(136, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-06 21:06:55', 'SUCCESS'),
(137, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-09 08:34:54', 'SUCCESS'),
(138, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-09 08:44:41', 'SUCCESS'),
(139, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-09 08:49:16', 'SUCCESS'),
(140, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-09 09:09:53', 'SUCCESS'),
(141, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-09 13:58:45', 'SUCCESS'),
(142, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-09 14:01:59', 'SUCCESS'),
(143, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-09 14:15:16', 'SUCCESS'),
(144, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-09 14:47:24', 'SUCCESS'),
(145, 60, '127.0.0.1', NULL, '127.0.0.1', 'localhost', 'HTTP/1.1', '2024-12-09 14:52:03', 'SUCCESS');

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
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Last profile update timestamp',
  `Status` enum('ACTIVE','INACTIVE','SUSPENDED') NOT NULL COMMENT 'Status of the account'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `Usrs`
--

INSERT INTO `Usrs` (`ID`, `Username`, `Email`, `Password_hash`, `Created_at`, `Updated_at`, `Status`) VALUES
(60, 'admin', 'admin@admin.com', '$2y$10$Jm0i/zt9sXVJsJK1VIVsoeJnqDXYfAuyL.K9tZ9Ilb2J1zGznq6fG', '2024-11-23 22:03:03', '2024-12-05 17:44:14', 'ACTIVE'),
(61, 'omarzouari', 'rvrrv@fefef.com', '$2y$10$T5qOq0J8.8LE5KyQmyFKuew52eCI5Dbsc3PiAU0LnuwqQ646UO42C', '2024-01-23 22:23:17', '2024-12-02 13:53:47', 'ACTIVE'),
(64, 'emnaWeb', 'emna@gmail.com', '$2y$10$XCDWyX72y4qHCRuA/5w5M.aBMeSj21FTOpmqlXebsOFy1sQ1ZRF22', '2024-11-25 13:21:31', '2024-11-27 15:14:36', 'ACTIVE'),
(65, 'test123', 'help@gmail.com', '$2y$10$KQaiijBR/016Qy.O3/ceR.cMFig8BQBzyPYHybdFe43JllmA4Djye', '2024-11-26 19:31:16', '2024-11-26 19:31:16', 'ACTIVE'),
(66, 'omarzouaridsdsd', 'dsdef@gmail.com', '$2y$10$rKr5yCeX7Z1wGzLxlMO94.sJ8iPPJ./sTnmhO1vdPtRa3YeyLSnfa', '2024-11-26 21:17:12', '2024-11-29 16:47:48', 'ACTIVE'),
(67, 'aazaz555', 'efzerg@fefz.com', '$2y$10$dxWfGIeJ3qEzf4Fyassd5.iZCF6fRbBWdaOOOY0d7KKQ7B6o5//QK', '2024-11-26 21:18:07', '2024-11-29 16:50:47', 'SUSPENDED'),
(69, 'contact', 'contact@contact.com', '$2y$10$9wQsOY9naDktz1AwXQGzc.QptUk.K36bJWIxzJ1NnUQn1sxnN5nyS', '2024-11-28 21:42:46', '2024-11-28 22:34:30', 'ACTIVE'),
(70, 'hhehhz', 'zzg@ezgz.com', '$2y$10$Bo518m/Ndj/sJXTfAxghuOIQz/XHBubJiX26iHk2A/FqljLQLZp06', '2024-11-29 23:22:55', '2024-12-02 14:12:30', 'INACTIVE');

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
(21, 60, 64, 'omar', 'zouari', '93940909', 'MALE', 'Beja', 'Tunis, Sfax', 4445, 'HelloWorld!																					', '2024-11-23 22:03:03', '2024-12-02 22:03:22'),
(22, 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-23 22:23:17', '2024-11-23 22:23:17'),
(25, 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-25 13:21:31', '2024-11-25 13:21:31'),
(26, 65, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-26 19:31:16', '2024-11-26 19:31:16'),
(27, 66, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-26 21:17:12', '2024-11-26 21:17:12'),
(28, 67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-26 21:18:07', '2024-11-26 21:18:07'),
(30, 69, 60, 'omare', 'zouari', '97900213', 'MALE', 'Kef', 'kef, serse', 3000, 'my name is youssef 7alawa', '2024-11-28 21:42:46', '2024-11-28 22:48:46'),
(31, 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-29 23:22:55', '2024-11-29 23:22:55');

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
(29, 64, 3),
(30, 65, 4),
(31, 66, 3),
(32, 67, 3),
(34, 69, 2),
(35, 70, 4);

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
  MODIFY `Image_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Image ID', AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `Login_History`
--
ALTER TABLE `Login_History`
  MODIFY `Login_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for each login attempt', AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `Roles`
--
ALTER TABLE `Roles`
  MODIFY `Role_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for each role', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Usrs`
--
ALTER TABLE `Usrs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for each user', AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `Usr_Profile`
--
ALTER TABLE `Usr_Profile`
  MODIFY `Usr_profile_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for the profile', AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `Usr_Roles`
--
ALTER TABLE `Usr_Roles`
  MODIFY `Usr_Role_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for each entry', AUTO_INCREMENT=36;

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