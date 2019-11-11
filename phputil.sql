-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2019 at 10:22 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phputil`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `first_name`, `last_name`, `created_at`) VALUES
(1, 'Manojit', 'Nandi', '2019-11-11 14:48:26'),
(2, 'Sourav', 'Nandi', '2019-11-11 14:48:27'),
(3, 'Tanmoy', 'Basak', '2019-11-11 14:48:28'),
(4, 'Subhasish', 'Pal', '2019-11-11 14:48:29'),
(5, 'Anusua', 'Putatunda', '2019-11-11 14:48:30'),
(6, 'Devdeep', 'Nandi', '2019-11-11 14:48:31'),
(7, 'Poulami', 'Dey', '2019-11-11 14:48:32'),
(8, 'Debasish', 'Nandi', '2019-11-11 14:48:33'),
(9, 'Ajit Kumar', 'Nandi', '2019-11-11 14:48:34'),
(10, 'Shipra', 'Nandi', '2019-11-11 14:48:36'),
(11, 'Sandeepan', 'Nandi', '2019-11-11 14:48:37'),
(12, 'Sourav', 'Das', '2019-11-11 14:48:38'),
(13, 'Moupiya', 'Nandi', '2019-11-11 14:48:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
