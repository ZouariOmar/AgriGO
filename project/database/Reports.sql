-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 12, 2024 at 07:05 PM
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
-- Database: `Reports`
--

-- --------------------------------------------------------

--
-- Table structure for table `rapports`
--

CREATE TABLE `rapports` (
  `Report_ID` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `pièce jointe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rapportstat`
--

CREATE TABLE `rapportstat` (
  `Stat_ID` int(11) NOT NULL,
  `Report_ID` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD PRIMARY KEY (`Stat_ID`),
  ADD KEY `fk_reportid` (`Report_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rapports`
--
ALTER TABLE `rapports`
  MODIFY `Report_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapportstat`
--
ALTER TABLE `rapportstat`
  MODIFY `Stat_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rapportstat`
--
ALTER TABLE `rapportstat`
  ADD CONSTRAINT `fk_reportid` FOREIGN KEY (`Report_ID`) REFERENCES `rapports` (`Report_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
