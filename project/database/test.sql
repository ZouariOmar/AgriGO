-- phpMyAdmin SQL Dump
-- version 5.2.1deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 09, 2024 at 08:49 AM
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
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `d` int(11) NOT NULL,
  `s` int(11) NOT NULL,
  `q` int(11) NOT NULL,
  `W` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
COMMIT;

-- My Tables aziz
CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(255) NOT NULL,
  type ENUM('job', 'produce', 'lending') NOT NULL,
  date_in DATE NOT NULL,
  date_out DATE NOT NULL,
  Qnt INT NOT NULL

);

CREATE TABLE offres (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titre VARCHAR(255) NOT NULL,
  prix FLOAT NOT NULL,
  telephone VARCHAR(20) NOT NULL,
  localisation VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  image VARCHAR(255) NOT NULL,
  detail TEXT NOT NULL,
  date_creation DATETIME NOT NULL,
  categorie_id INT NOT NULL,
  FOREIGN KEY (categorie_id) REFERENCES categories(id)
);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
