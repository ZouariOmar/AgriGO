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
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Database: `AGTN`
--

-- --------------------------------------------------------
-- ### Main branch tables ###
-- --------------------------------------------------------
--
-- Table structure for table `Images`
--

CREATE TABLE `Images` (
  `Image_ID` int(11) NOT NULL COMMENT 'Image ID',
  `Name` varchar(255) NOT NULL COMMENT 'Image Name',
  `Path` varchar(255) NOT NULL COMMENT 'Image path',
  `Type` varchar(50) DEFAULT NULL COMMENT 'Image Type (jpeg/png)'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_uca1400_ai_ci;
--
-- Dumping data for table `Images`
--

INSERT INTO `Images` (`Image_ID`, `Name`, `Path`, `Type`)
VALUES (
    39,
    '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    'uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    'image/png'
  ),
  (
    40,
    '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    'uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    'image/png'
  ),
  (
    41,
    'Linkedin Banner.png',
    'uploads/Linkedin Banner.png',
    'image/png'
  ),
  (
    42,
    '401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png',
    '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png',
    'image/png'
  ),
  (
    43,
    'Linkedin Banner.png',
    '../../public/assets/uploads/Linkedin Banner.png',
    'image/png'
  ),
  (
    44,
    'Linkedin Banner.png',
    '../../public/assets/uploads/Linkedin Banner.png',
    'image/png'
  ),
  (
    45,
    '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    'image/png'
  ),
  (
    46,
    '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    'image/png'
  ),
  (
    47,
    '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    'image/png'
  ),
  (
    48,
    '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    'image/png'
  ),
  (
    49,
    '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    'image/png'
  ),
  (
    50,
    '401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png',
    '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png',
    'image/png'
  ),
  (
    51,
    '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    'image/png'
  ),
  (
    52,
    '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    'image/png'
  ),
  (
    53,
    '401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png',
    '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png',
    'image/png'
  ),
  (
    54,
    '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    'image/png'
  ),
  (
    55,
    '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    'image/png'
  ),
  (
    56,
    '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    'image/png'
  ),
  (57, '', '../../public/assets/uploads/', ''),
  (
    58,
    '401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (2).png',
    'image/png'
  ),
  (
    59,
    '401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png',
    '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png',
    'image/png'
  ),
  (
    60,
    '401700700_201885956291933_7864594178641459272_n-removebg-preview.png',
    '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview.png',
    'image/png'
  ),
  (
    61,
    '401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png',
    '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png',
    'image/png'
  ),
  (
    62,
    '401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png',
    '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png',
    'image/png'
  ),
  (
    63,
    '401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png',
    '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png',
    'image/png'
  ),
  (
    64,
    '401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png',
    '../../public/assets/uploads/401700700_201885956291933_7864594178641459272_n-removebg-preview (1).png',
    'image/png'
  );
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
  `Status` enum('SUCCESS', 'FAILED') NOT NULL COMMENT 'Status of the login attempt'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_uca1400_ai_ci;
--
-- Dumping data for table `Login_History`
--

INSERT INTO `Login_History` (
    `Login_ID`,
    `Usr_ID`,
    `IP_Address`,
    `Usr_Host`,
    `Server_Address`,
    `Server_Name`,
    `Server_Protocol`,
    `Login_timestamp`,
    `Status`
  )
VALUES (
    116,
    60,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-02 14:53:59',
    'SUCCESS'
  ),
  (
    117,
    60,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-02 14:56:06',
    'SUCCESS'
  ),
  (
    118,
    60,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-02 20:20:18',
    'SUCCESS'
  ),
  (
    119,
    60,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-02 20:20:24',
    'SUCCESS'
  ),
  (
    120,
    60,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-02 20:21:34',
    'SUCCESS'
  ),
  (
    121,
    60,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-02 21:17:31',
    'SUCCESS'
  ),
  (
    122,
    60,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-02 21:17:39',
    'SUCCESS'
  ),
  (
    123,
    60,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-02 21:20:26',
    'SUCCESS'
  ),
  (
    124,
    60,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-02 21:31:32',
    'SUCCESS'
  ),
  (
    125,
    60,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-02 22:04:59',
    'FAILED'
  ),
  (
    126,
    61,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-02 22:08:27',
    'SUCCESS'
  ),
  (
    127,
    61,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-02 22:08:53',
    'FAILED'
  ),
  (
    128,
    61,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-02 22:09:17',
    'FAILED'
  ),
  (
    129,
    61,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-02 22:10:49',
    'FAILED'
  ),
  (
    130,
    61,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-02 22:12:40',
    'FAILED'
  ),
  (
    131,
    61,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-02 22:13:05',
    'FAILED'
  ),
  (
    132,
    60,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-02 22:13:40',
    'SUCCESS'
  ),
  (
    133,
    60,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-05 17:40:11',
    'SUCCESS'
  ),
  (
    134,
    60,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-06 18:17:41',
    'SUCCESS'
  ),
  (
    135,
    60,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-06 21:03:48',
    'SUCCESS'
  ),
  (
    136,
    60,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-06 21:06:55',
    'SUCCESS'
  ),
  (
    137,
    60,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-09 08:34:54',
    'SUCCESS'
  ),
  (
    138,
    60,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-09 08:44:41',
    'SUCCESS'
  ),
  (
    139,
    60,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-09 08:49:16',
    'SUCCESS'
  ),
  (
    140,
    60,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-09 09:09:53',
    'SUCCESS'
  ),
  (
    141,
    60,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-09 13:58:45',
    'SUCCESS'
  ),
  (
    142,
    60,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-09 14:01:59',
    'SUCCESS'
  ),
  (
    143,
    60,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-09 14:15:16',
    'SUCCESS'
  ),
  (
    144,
    60,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-09 14:47:24',
    'SUCCESS'
  ),
  (
    145,
    60,
    '127.0.0.1',
    NULL,
    '127.0.0.1',
    'localhost',
    'HTTP/1.1',
    '2024-12-09 14:52:03',
    'SUCCESS'
  );
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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_uca1400_ai_ci;
-- --------------------------------------------------------
--
-- Table structure for table `Roles`
--

CREATE TABLE `Roles` (
  `Role_ID` int(11) NOT NULL COMMENT 'Unique identifier for each role',
  `Role_Name` enum('SUPER ADMIN', 'ADMIN', 'CLIENT', 'FARMER') NOT NULL COMMENT 'Role name',
  `Description` text NOT NULL COMMENT 'Description of the role'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_uca1400_ai_ci;
--
-- Dumping data for table `Roles`
--

INSERT INTO `Roles` (`Role_ID`, `Role_Name`, `Description`)
VALUES (
    1,
    'SUPER ADMIN',
    'Has full access to all system functionalities.'
  ),
  (
    2,
    'ADMIN',
    'Has administrative access with some restrictions.'
  ),
  (
    3,
    'CLIENT',
    'Can access and interact with certain parts of the system.'
  ),
  (
    4,
    'FARMER',
    'Has limited access related to farming functionalities.'
  );
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
  `Status` enum('ACTIVE', 'INACTIVE', 'SUSPENDED') NOT NULL COMMENT 'Status of the account'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_uca1400_ai_ci;
--
-- Dumping data for table `Usrs`
--

INSERT INTO `Usrs` (
    `ID`,
    `Username`,
    `Email`,
    `Password_hash`,
    `Created_at`,
    `Updated_at`,
    `Status`
  )
VALUES (
    60,
    'admin',
    'admin@admin.com',
    '$2y$10$Jm0i/zt9sXVJsJK1VIVsoeJnqDXYfAuyL.K9tZ9Ilb2J1zGznq6fG',
    '2024-11-23 22:03:03',
    '2024-12-05 17:44:14',
    'ACTIVE'
  ),
  (
    61,
    'omarzouari',
    'rvrrv@fefef.com',
    '$2y$10$T5qOq0J8.8LE5KyQmyFKuew52eCI5Dbsc3PiAU0LnuwqQ646UO42C',
    '2024-01-23 22:23:17',
    '2024-12-02 13:53:47',
    'ACTIVE'
  ),
  (
    64,
    'emnaWeb',
    'emna@gmail.com',
    '$2y$10$XCDWyX72y4qHCRuA/5w5M.aBMeSj21FTOpmqlXebsOFy1sQ1ZRF22',
    '2024-11-25 13:21:31',
    '2024-11-27 15:14:36',
    'ACTIVE'
  ),
  (
    65,
    'test123',
    'help@gmail.com',
    '$2y$10$KQaiijBR/016Qy.O3/ceR.cMFig8BQBzyPYHybdFe43JllmA4Djye',
    '2024-11-26 19:31:16',
    '2024-11-26 19:31:16',
    'ACTIVE'
  ),
  (
    66,
    'omarzouaridsdsd',
    'dsdef@gmail.com',
    '$2y$10$rKr5yCeX7Z1wGzLxlMO94.sJ8iPPJ./sTnmhO1vdPtRa3YeyLSnfa',
    '2024-11-26 21:17:12',
    '2024-11-29 16:47:48',
    'ACTIVE'
  ),
  (
    67,
    'aazaz555',
    'efzerg@fefz.com',
    '$2y$10$dxWfGIeJ3qEzf4Fyassd5.iZCF6fRbBWdaOOOY0d7KKQ7B6o5//QK',
    '2024-11-26 21:18:07',
    '2024-11-29 16:50:47',
    'SUSPENDED'
  ),
  (
    69,
    'contact',
    'contact@contact.com',
    '$2y$10$9wQsOY9naDktz1AwXQGzc.QptUk.K36bJWIxzJ1NnUQn1sxnN5nyS',
    '2024-11-28 21:42:46',
    '2024-11-28 22:34:30',
    'ACTIVE'
  ),
  (
    70,
    'hhehhz',
    'zzg@ezgz.com',
    '$2y$10$Bo518m/Ndj/sJXTfAxghuOIQz/XHBubJiX26iHk2A/FqljLQLZp06',
    '2024-11-29 23:22:55',
    '2024-12-02 14:12:30',
    'INACTIVE'
  );
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
  `Sex` enum('FEMALE', 'MALE') DEFAULT NULL COMMENT 'Sex of user',
  `State` varchar(255) DEFAULT NULL COMMENT 'Address information (Tunis, sfax, sousse...)',
  `Address` varchar(255) DEFAULT NULL COMMENT 'Home/Work address',
  `Zip_Code` int(11) DEFAULT NULL COMMENT 'Zip code of the user',
  `About` mediumtext DEFAULT NULL COMMENT 'About the user (about yourself section)',
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Profile creation timestamp',
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Profile update timestamp'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_uca1400_ai_ci;
--
-- Dumping data for table `Usr_Profile`
--

INSERT INTO `Usr_Profile` (
    `Usr_profile_ID`,
    `Usr_ID`,
    `Image_ID`,
    `First_Name`,
    `Last_Name`,
    `Tel`,
    `Sex`,
    `State`,
    `Address`,
    `Zip_Code`,
    `About`,
    `Created_at`,
    `Updated_at`
  )
VALUES (
    21,
    60,
    64,
    'omar',
    'zouari',
    '93940909',
    'MALE',
    'Beja',
    'Tunis, Sfax',
    4445,
    'HelloWorld!																					',
    '2024-11-23 22:03:03',
    '2024-12-02 22:03:22'
  ),
  (
    22,
    61,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '2024-11-23 22:23:17',
    '2024-11-23 22:23:17'
  ),
  (
    25,
    64,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '2024-11-25 13:21:31',
    '2024-11-25 13:21:31'
  ),
  (
    26,
    65,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '2024-11-26 19:31:16',
    '2024-11-26 19:31:16'
  ),
  (
    27,
    66,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '2024-11-26 21:17:12',
    '2024-11-26 21:17:12'
  ),
  (
    28,
    67,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '2024-11-26 21:18:07',
    '2024-11-26 21:18:07'
  ),
  (
    30,
    69,
    60,
    'omare',
    'zouari',
    '97900213',
    'MALE',
    'Kef',
    'kef, serse',
    3000,
    'my name is youssef 7alawa',
    '2024-11-28 21:42:46',
    '2024-11-28 22:48:46'
  ),
  (
    31,
    70,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '2024-11-29 23:22:55',
    '2024-11-29 23:22:55'
  );
-- --------------------------------------------------------
--
-- Table structure for table `Usr_Roles`
--

CREATE TABLE `Usr_Roles` (
  `Usr_Role_ID` int(11) NOT NULL COMMENT 'Unique identifier for each entry',
  `Usr_ID` int(11) NOT NULL COMMENT 'References user_id in Users',
  `Role_ID` int(11) NOT NULL COMMENT 'References role_id in Roles'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_uca1400_ai_ci;
--
-- Dumping data for table `Usr_Roles`
--

INSERT INTO `Usr_Roles` (`Usr_Role_ID`, `Usr_ID`, `Role_ID`)
VALUES (25, 60, 2),
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
MODIFY `Image_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Image ID',
  AUTO_INCREMENT = 65;
--
-- AUTO_INCREMENT for table `Login_History`
--
ALTER TABLE `Login_History`
MODIFY `Login_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for each login attempt',
  AUTO_INCREMENT = 146;
--
-- AUTO_INCREMENT for table `Roles`
--
ALTER TABLE `Roles`
MODIFY `Role_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for each role',
  AUTO_INCREMENT = 5;
--
-- AUTO_INCREMENT for table `Usrs`
--
ALTER TABLE `Usrs`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for each user',
  AUTO_INCREMENT = 71;
--
-- AUTO_INCREMENT for table `Usr_Profile`
--
ALTER TABLE `Usr_Profile`
MODIFY `Usr_profile_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for the profile',
  AUTO_INCREMENT = 32;
--
-- AUTO_INCREMENT for table `Usr_Roles`
--
ALTER TABLE `Usr_Roles`
MODIFY `Usr_Role_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for each entry',
  AUTO_INCREMENT = 36;
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
-- --------------------------------------------------------
-- ### Alpha branch tables ###
-- --------------------------------------------------------
--
-- Table structure for table `rapports`
--

CREATE TABLE `rapports` (
  `Report_ID` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `sta` varchar(255) DEFAULT NULL,
  `Update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Update date/time'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Dumping data for table `rapports`
--

INSERT INTO `rapports` (
    `Report_ID`,
    `category`,
    `subject`,
    `description`,
    `sta`,
    `Update_at`
  )
VALUES (
    112,
    'technical',
    'fbvd',
    'gbdfsvcx',
    'DONE',
    '2024-12-09 07:57:22'
  ),
  (
    118,
    'service',
    'prob',
    'prob\r\n',
    'RECIEVED',
    '2024-11-30 11:29:29'
  ),
  (
    120,
    'service',
    'esd',
    'dse',
    'RECIEVED',
    '2024-12-01 10:40:10'
  ),
  (
    124,
    'service',
    'eee',
    'eee',
    'RECIEVED',
    '2024-12-01 10:42:10'
  ),
  (
    127,
    'other',
    'rsoghlvjd',
    'z\'ùfoietlnks,dc',
    'RECIEVED',
    '2024-12-02 13:30:26'
  ),
  (
    128,
    'technical',
    'zefoilhdksnqv',
    'zooielg=sdfknqv<mù',
    'RECIEVED',
    '2024-12-02 13:30:45'
  ),
  (
    129,
    'technical',
    'zeflknds',
    'zeflsqhjbgorleikd',
    'RECIEVED',
    '2024-12-02 13:30:57'
  ),
  (
    130,
    'service',
    'ddd',
    'ddd',
    'RECIEVED',
    '2024-12-02 15:37:21'
  ),
  (
    131,
    'service',
    'ismail',
    'ennaifer\r\n',
    'RECIEVED',
    '2024-12-03 09:51:18'
  ),
  (
    132,
    'technical',
    'zaerfv',
    'aze',
    'RECIEVED',
    '2024-12-08 14:39:06'
  ),
  (
    138,
    'technical',
    'ok',
    'ok',
    'DONE',
    '2024-12-09 07:56:18'
  );
-- --------------------------------------------------------
--
-- Table structure for table `rapportstat`
--

CREATE TABLE `rapportstat` (
  `StatID` int(11) NOT NULL,
  `StatRapportID` int(11) NOT NULL,
  `ST` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Dumping data for table `rapportstat`
--

INSERT INTO `rapportstat` (`StatID`, `StatRapportID`, `ST`)
VALUES (1, 112, 'DONE'),
  (7, 118, 'DONE'),
  (11, 127, 'IN PROCESS'),
  (12, 128, 'DONE'),
  (13, 129, 'RECIEVED'),
  (14, 130, 'RECIEVED'),
  (15, 131, 'DONE'),
  (16, 132, 'RECIEVED'),
  (22, 138, 'DONE');
-- --------------------------------------------------------
--
-- Table structure for table `Responses`
--

CREATE TABLE `Responses` (
  `ResponseID` int(11) NOT NULL,
  `reportid` int(11) NOT NULL,
  `Response` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Dumping data for table `Responses`
--

INSERT INTO `Responses` (`ResponseID`, `reportid`, `Response`)
VALUES (3, 112, '??????'),
  (5, 112, 'byebyebye'),
  (7, 127, 'pppp'),
  (8, 112, 'mllmkkln');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `rapports`
--
ALTER TABLE `rapports`
ADD PRIMARY KEY (`Report_ID`);
--
-- Indexes for table `rapportstat`
--
ALTER TABLE `rapportstat`
ADD PRIMARY KEY (`StatID`),
  ADD KEY `fk_stat` (`StatRapportID`);
--
-- Indexes for table `Responses`
--
ALTER TABLE `Responses`
ADD PRIMARY KEY (`ResponseID`),
  ADD KEY `fk_response` (`reportid`);
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rapports`
--
ALTER TABLE `rapports`
MODIFY `Report_ID` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 139;
--
-- AUTO_INCREMENT for table `rapportstat`
--
ALTER TABLE `rapportstat`
MODIFY `StatID` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 23;
--
-- AUTO_INCREMENT for table `Responses`
--
ALTER TABLE `Responses`
MODIFY `ResponseID` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `rapportstat`
--
ALTER TABLE `rapportstat`
ADD CONSTRAINT `fk_stat` FOREIGN KEY (`StatRapportID`) REFERENCES `rapports` (`Report_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Constraints for table `Responses`
--
ALTER TABLE `Responses`
ADD CONSTRAINT `fk_response` FOREIGN KEY (`reportid`) REFERENCES `rapports` (`Report_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
-- --------------------------------------------------------
-- ### Gamma branch tables ###
-- --------------------------------------------------------
--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_creation` date NOT NULL,
  `date_fin` date NOT NULL,
  `partner_id` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `id_partner` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(20) NOT NULL,
  `status` enum('active', 'inactive') NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
ADD PRIMARY KEY (`id`),
  ADD KEY `partner_id` (`partner_id`);
--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
ADD PRIMARY KEY (`id_partner`);
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
MODIFY `id_partner` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`partner_id`) REFERENCES `partner` (`id_partner`) ON DELETE CASCADE;
COMMIT;
-- --------------------------------------------------------
-- ### Beta & Delta branch tables ###
-- --------------------------------------------------------
--
-- Table structure for table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `icone` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 AUTO_INCREMENT = 21;
--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (
    `id`,
    `libelle`,
    `description`,
    `date_creation`,
    `icone`
  )
VALUES (
    18,
    'food',
    'tunisian food',
    '2024-12-09 10:28:40',
    'dsq'
  ),
  (
    19,
    'outil d''agriculture',
    'nothing',
    '2024-12-09 10:29:01',
    'jkl'
  ),
  (
    20,
    'job',
    'job''s offres',
    '2024-12-09 14:24:41',
    'mpo'
  );
-- --------------------------------------------------------
--
-- Table structure for table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `total` decimal(10, 0) NOT NULL,
  `valide` int(11) NOT NULL DEFAULT '0',
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_client` (`id_client`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 AUTO_INCREMENT = 90;
--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (
    `id`,
    `id_client`,
    `total`,
    `valide`,
    `date_creation`
  )
VALUES (71, 9, '15', 0, '2024-12-09 14:56:57'),
  (72, 9, '45', 1, '2024-12-09 16:21:32'),
  (73, 9, '42', 0, '2024-12-09 16:22:50'),
  (74, 9, '18', 1, '2024-12-09 16:24:00'),
  (75, 7, '16', 1, '2024-12-13 00:23:47'),
  (76, 7, '16', 0, '2024-12-13 11:24:31'),
  (77, 7, '16', 0, '2024-12-13 15:50:16'),
  (78, 7, '0', 0, '2024-12-13 15:52:27'),
  (79, 7, '0', 0, '2024-12-13 15:52:57'),
  (80, 7, '0', 0, '2024-12-13 15:55:57'),
  (81, 7, '0', 0, '2024-12-13 15:56:31'),
  (82, 7, '118', 0, '2024-12-13 16:33:28'),
  (83, 7, '49', 0, '2024-12-13 16:37:58'),
  (84, 7, '13', 0, '2024-12-14 13:19:58'),
  (85, 7, '16', 0, '2024-12-14 13:29:11'),
  (86, 7, '8', 0, '2024-12-14 13:35:39'),
  (87, 7, '0', 0, '2024-12-14 13:43:52'),
  (88, 7, '0', 0, '2024-12-14 13:43:52'),
  (89, 7, '44', 0, '2024-12-14 14:01:39');
-- --------------------------------------------------------
--
-- Table structure for table `ligne_commande`
--

CREATE TABLE IF NOT EXISTS `ligne_commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `prix` decimal(10, 0) NOT NULL,
  `quantite` int(11) NOT NULL,
  `total` decimal(10, 0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_produit` (`id_produit`),
  KEY `id_commande` (`id_commande`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 AUTO_INCREMENT = 88;
--
-- Dumping data for table `ligne_commande`
--

INSERT INTO `ligne_commande` (
    `id`,
    `id_produit`,
    `id_commande`,
    `prix`,
    `quantite`,
    `total`
  )
VALUES (70, 45, 71, '15', 1, '15'),
  (71, 46, 72, '15', 3, '45'),
  (72, 40, 73, '8', 4, '32'),
  (73, 41, 73, '5', 2, '10'),
  (74, 40, 74, '8', 1, '8'),
  (75, 41, 74, '5', 2, '10'),
  (76, 40, 75, '8', 2, '16'),
  (77, 40, 76, '8', 2, '16'),
  (78, 40, 77, '8', 2, '16'),
  (79, 50, 82, '44', 2, '88'),
  (80, 45, 82, '15', 2, '30'),
  (81, 41, 83, '5', 1, '5'),
  (82, 50, 83, '44', 1, '44'),
  (83, 41, 84, '5', 1, '5'),
  (84, 40, 84, '8', 1, '8'),
  (85, 40, 85, '8', 2, '16'),
  (86, 40, 86, '8', 1, '8'),
  (87, 50, 89, '44', 1, '44');
-- --------------------------------------------------------
--
-- Table structure for table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  `prix` decimal(10, 0) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(150) NOT NULL,
  `location` varchar(255) DEFAULT NULL COMMENT 'Location of the product',
  `Quantitie` int(11) DEFAULT NULL COMMENT 'Quantity of the product',
  PRIMARY KEY (`id`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 AUTO_INCREMENT = 51;
--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (
    `id`,
    `libelle`,
    `prix`,
    `id_categorie`,
    `date_creation`,
    `description`,
    `image`,
    `location`,
    `Quantitie`
  )
VALUES (
    40,
    'orange',
    '8',
    18,
    '0000-00-00 00:00:00',
    '',
    'Fiche-aliment-Images-36.jpg',
    NULL,
    0
  ),
  (
    41,
    'mais',
    '5',
    18,
    '0000-00-00 00:00:00',
    '',
    'download.jpg',
    NULL,
    0
  ),
  (
    45,
    'agriculteure',
    '15',
    20,
    '0000-00-00 00:00:00',
    '15dt/H',
    'submarine.png',
    NULL,
    0
  ),
  (
    46,
    'pasta',
    '15',
    20,
    '0000-00-00 00:00:00',
    'hfgqshfs',
    'pasta.jpg',
    NULL,
    0
  ),
  (
    47,
    'male',
    '15',
    19,
    '0000-00-00 00:00:00',
    'f;sfd',
    '../upload/produit/675c1600479a7.jpg',
    NULL,
    0
  ),
  (
    48,
    'aziz',
    '10',
    20,
    '0000-00-00 00:00:00',
    'tafar',
    '../upload/produit/675c16355eca3.png',
    NULL,
    0
  ),
  (
    49,
    'nike',
    '15',
    18,
    '0000-00-00 00:00:00',
    'dsqds',
    '../upload/produit/675c172364c62.jpg',
    NULL,
    0
  ),
  (
    50,
    'bza3 bheyim',
    '44',
    18,
    '0000-00-00 00:00:00',
    'plkoijiuhiu ohhhh bza3',
    '',
    NULL,
    0
  );
-- --------------------------------------------------------
--
-- Table structure for table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `date_creation` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 AUTO_INCREMENT = 11;
--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`, `date_creation`)
VALUES (7, 'mortadha', 'amaidi', '2024-12-06'),
  (8, 'mortadha amaidi', '123456789', '2024-12-06'),
  (9, 'mortadha', 'mourta', '2024-12-08'),
  (10, 'mortadha', 'mourta', '2024-12-08');
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ligne_commande`
--
ALTER TABLE `ligne_commande`
ADD CONSTRAINT `ligne_commande_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ligne_commande_ibfk_2` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;