-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2021 at 06:28 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pathshaladb`
--

-- --------------------------------------------------------

--
-- Table structure for table `classdata`
--

CREATE TABLE `classdata` (
  `id` varchar(255) NOT NULL,
  `classcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classdata`
--

INSERT INTO `classdata` (`id`, `classcode`) VALUES
('123', 'nainai1');

-- --------------------------------------------------------

--
-- Table structure for table `dashboardinfo`
--

CREATE TABLE `dashboardinfo` (
  `id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `temail` varchar(255) NOT NULL,
  `postid` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dashboardinfo`
--

INSERT INTO `dashboardinfo` (`id`, `title`, `description`, `temail`, `postid`, `date`) VALUES
('123', 'nai', 'ahdasd', 'test@gmail.com', 1, '2021-04-12 22:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `pathshaladata`
--

CREATE TABLE `pathshaladata` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pathshaladata`
--

INSERT INTO `pathshaladata` (`id`, `name`, `address`, `email`, `phone`, `password`, `role`) VALUES
('123', 'sawg', 'saetsg', 'test@gmail.com', 212434, '123', 'Teacher'),
('4653', 'adsaf', 'ADSDS', 'stu@gmai.com', 12343, '456', 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dashboardinfo`
--
ALTER TABLE `dashboardinfo`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `pathshaladata`
--
ALTER TABLE `pathshaladata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dashboardinfo`
--
ALTER TABLE `dashboardinfo`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
