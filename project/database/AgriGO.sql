-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 02, 2024 at 02:36 PM
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
(111, 'feedback', 'adx', 'zadx', 'RECIEVED', '2024-11-26 16:41:48'),
(112, 'feedback', 'fbvd', 'gbdfsvcx', 'RECIEVED', '2024-11-26 16:41:48'),
(118, 'service', 'prob', 'prob\r\n', 'RECIEVED', '2024-11-30 11:29:29'),
(120, 'service', 'esd', 'dse', 'RECIEVED', '2024-12-01 10:40:10'),
(124, 'service', 'eee', 'eee', 'RECIEVED', '2024-12-01 10:42:10'),
(127, 'other', 'rsoghlvjd', 'z\'ùfoietlnks,dc', 'RECIEVED', '2024-12-02 13:30:26'),
(128, 'technical', 'zefoilhdksnqv', 'zooielg=sdfknqv<mù', 'RECIEVED', '2024-12-02 13:30:45'),
(129, 'technical', 'zeflknds', 'zeflsqhjbgorleikd', 'RECIEVED', '2024-12-02 13:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `rapportstat`
--

CREATE TABLE `rapportstat` (
  `StatID` int(11) NOT NULL,
  `StatRapportID` int(11) NOT NULL,
  `ST` enum('RECIEVED','IN PROCESS','DONE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rapportstat`
--

INSERT INTO `rapportstat` (`StatID`, `StatRapportID`, `ST`) VALUES
(1, 112, 'RECIEVED'),
(7, 118, 'DONE'),
(11, 127, 'RECIEVED'),
(12, 128, 'RECIEVED'),
(13, 129, 'RECIEVED');

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
  MODIFY `Report_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `rapportstat`
--
ALTER TABLE `rapportstat`
  MODIFY `StatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
