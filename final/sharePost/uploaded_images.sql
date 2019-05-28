-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2018 at 07:03 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_images`
--

CREATE TABLE `uploaded_images` (
  `id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `reply_id` int(11) DEFAULT NULL,
  `src` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploaded_images`
--

INSERT INTO `uploaded_images` (`id`, `question_id`, `reply_id`, `src`) VALUES
(3, 45, 0, '5b098bb8dba04.jpg'),
(4, 46, 0, '5b098bd50eb27.jpg'),
(5, 47, 0, '5b098c74c364f.jpg'),
(6, 47, 0, '5b098d134c06a.jpg'),
(7, 47, 0, '5b098d5152435.jpg'),
(8, 52, 0, '5b0991b6957d7.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uploaded_images`
--
ALTER TABLE `uploaded_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uploaded_images`
--
ALTER TABLE `uploaded_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
