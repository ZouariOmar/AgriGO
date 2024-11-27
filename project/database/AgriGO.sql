-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2024 at 03:39 PM
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
-- Database: `AgriGO`
--

-- --------------------------------------------------------

--
-- Table structure for table `rapports`
--

CREATE TABLE `rapports` (
  `Report_ID` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `sta` enum('RECIEVED','IN PROGRESS','DONE') DEFAULT NULL,
  `Update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Update date/time'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rapports`
--

INSERT INTO `rapports` (`Report_ID`, `category`, `subject`, `description`, `sta`, `Update_at`) VALUES
(50, 'technical', 'test', 'test', 'RECIEVED', '2024-11-26 16:41:48'),
(104, 'technical', 'LOREM', 'LOREM', 'RECIEVED', '2024-11-26 16:41:48'),
(109, 'other', 'ml', 'iokln', 'RECIEVED', '2024-11-26 16:41:48'),
(110, 'service', 'ujk', 'jnk', 'RECIEVED', '2024-11-26 16:41:48'),
(111, 'feedback', 'adx', 'zadx', 'RECIEVED', '2024-11-26 16:41:48'),
(112, 'feedback', 'fbvd', 'gbdfsvcx', 'RECIEVED', '2024-11-26 16:41:48'),
(116, 'service', 'jjjj', 'mlkj', 'RECIEVED', '2024-11-26 16:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `rapportstat`
--

CREATE TABLE `rapportstat` (
  `StatID` int(11) NOT NULL,
  `StatRapportID` int(11) NOT NULL,
  `Status` enum('RECIEVED','IN PROCESS','DONE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rapportstat`
--

INSERT INTO `rapportstat` (`StatID`, `StatRapportID`, `Status`) VALUES
(1, 112, 'RECIEVED'),
(5, 116, 'RECIEVED');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rapports`
--
ALTER TABLE `rapports`
  MODIFY `Report_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `rapportstat`
--
ALTER TABLE `rapportstat`
  MODIFY `StatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rapportstat`
--
ALTER TABLE `rapportstat`
  ADD CONSTRAINT `fk_stat` FOREIGN KEY (`StatRapportID`) REFERENCES `rapports` (`Report_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
