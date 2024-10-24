-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2024 at 06:55 AM
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
-- Database: `tmcp`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `datetime_field` datetime NOT NULL,
  `description` text DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `icon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `datetime_field`, `description`, `color`, `icon`) VALUES
(51, 'New order for CheCinense', '2024-01-31 08:18:00', 'Pickup for CheCinense - Receipt #141', 'fc-bg-default', 'circle'),
(52, 'New order for CheCinense', '2024-01-31 08:26:00', 'Pickup for CheCinense - Receipt #142', 'fc-bg-default', 'circle'),
(53, 'New order for CheCinense', '2024-01-30 11:27:00', 'Pickup for CheCinense - Receipt #143', 'fc-bg-default', 'circle'),
(54, 'New order for AdminTMCP', '2024-02-01 08:52:00', 'Pickup for AdminTMCP - Receipt #144', 'fc-bg-default', 'circle'),
(55, 'New order for AdminTMCP', '2024-01-31 08:48:00', 'Pickup for AdminTMCP - Receipt #145', 'fc-bg-default', 'circle'),
(56, 'New order for AdminTMCP', '2024-02-01 09:11:00', 'Pickup for AdminTMCP - Receipt #146', 'fc-bg-default', 'circle'),
(57, 'New order for AdminTMCP', '2024-02-02 09:12:00', 'Pickup for AdminTMCP - Receipt #147', 'fc-bg-default', 'circle'),
(58, 'New order for AdminTMCP', '2024-02-08 09:12:00', 'Pickup for AdminTMCP - Receipt #148', 'fc-bg-default', 'circle'),
(59, 'New order for AdminTMCP', '2024-02-26 09:13:00', 'Pickup for AdminTMCP - Receipt #149', 'fc-bg-default', 'circle'),
(60, 'New order for AdminTMCP', '2024-02-02 15:14:00', 'Pickup for AdminTMCP - Receipt #150', 'fc-bg-default', 'circle');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
