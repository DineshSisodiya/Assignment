-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2019 at 04:03 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cartoq`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `income` decimal(13,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `dob`, `address`, `income`) VALUES
(10, 'Abha', 'abha@mail.com', '1990-04-09', '89,Andrehi East Mumbai, Pin-440040', '999999999.99'),
(11, 'Abha Singh', 'abhasingh@mail.com', '1995-04-09', '90, Andrehi West Mumbai, Pin-470040', '999999999.99'),
(9, 'Abhay Kumar', 'abhay@mail.com', '1998-09-03', '92 Delhi West, Pin-110092', '4080432.00'),
(8, 'Dhanush', 'dhanush@gmail.com', '2019-03-21', 'fgag agag adf', '0.00'),
(17, 'Divya Kanvar', 'divyak@mail.com', '1996-01-29', 'East Mumbai, Pin-440048', '99999999999.99'),
(15, 'Diya ', 'diya@gmail.com', '1999-01-29', '92 Delhi West, Pin-110092', '999999999.99'),
(5, 'Dinesh', 'erdscs@gmail.com', '1997-05-16', 'Plot no. 12, shiv shankar colony near sanganer railway station', '45353.00'),
(7, 'Dinesh', 'erdscsd@gmail.com', '1997-05-16', 'Plot no. 12, shiv shankar colony near sanganer railway station', '45353.00');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `income` decimal(11,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `name`, `email`, `dob`, `address`, `income`) VALUES
(1, 'Dinesh', 'erdscsd@gmail.com', '1997-05-16', 'Plot no. 12, shiv shankar colony near sanganer railway station', '45353.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`email`) REFERENCES `employee` (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
