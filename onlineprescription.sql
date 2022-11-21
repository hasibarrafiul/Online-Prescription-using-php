-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2022 at 01:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineprescription`
--

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `indication` varchar(20) NOT NULL,
  `usages` varchar(50) NOT NULL,
  `instruction` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `indication`, `usages`, `instruction`) VALUES
(5, 'Napa', 'Antibiotic', 'Eat and drink', 'Daily 2 times'),
(9, 'Monas 10 mg', 'Tablet', 'Eat', ' Once daily in the evening');

-- --------------------------------------------------------

--
-- Table structure for table `patientinfo`
--

CREATE TABLE `patientinfo` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientinfo`
--

INSERT INTO `patientinfo` (`id`, `name`, `gender`, `age`, `address`, `number`) VALUES
(1, 'Fahim', 'Male', 23, 'Banasree, Dhaka', 1941100584),
(3, 'Hasib', 'Male', 23, 'Dhaka', 1794798101),
(4, 'Safa', 'Female', 22, 'Mirpur, Dhaka', 1992339969);

-- --------------------------------------------------------

--
-- Table structure for table `prescribedmedicines`
--

CREATE TABLE `prescribedmedicines` (
  `id` int(11) NOT NULL,
  `prescribedby` int(11) NOT NULL,
  `prescribedto` int(11) NOT NULL,
  `med1` int(11) NOT NULL,
  `med2` int(11) NOT NULL,
  `med3` int(11) NOT NULL,
  `med4` int(11) NOT NULL,
  `med5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescribedmedicines`
--

INSERT INTO `prescribedmedicines` (`id`, `prescribedby`, `prescribedto`, `med1`, `med2`, `med3`, `med4`, `med5`) VALUES
(10, 15, 3, 5, 9, 5, 9, 9),
(11, 15, 1, 5, 9, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phonenumber` int(11) DEFAULT NULL,
  `specialist` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `username`, `name`, `email`, `phonenumber`, `specialist`, `address`, `file_name`, `uploaded_on`, `status`) VALUES
(6, 'fahim', 'TosTech LLC', 'tostechllc@gmail.com', 1794798101, '', 'Mawna, Gazipur', 'logo1flip.jpg', '2022-08-05 12:17:47', '1'),
(7, 'admin', 'Hasib Ar Rafiul Fahim', 'tostechllc@gmail.com', 1794798101, '', 'Gazipur', 'logo1flip.jpg', '2022-08-06 15:29:29', '1'),
(10, 'Safa', 'Noor Fabi Shah', 'safashah@gmail.com', 1992339969, 'Human Heart', 'Mirpur, Dhaka', '297475355_2323829667764967_8580462172583336594_n.jpg', '2022-08-09 20:42:55', '1'),
(16, 'sumit', 'fwa', 'ff@g', 4651, 'afa', 'faf', 'adada.png', '2022-08-18 18:48:55', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(11, 'fahim', 'b94c5dbc799331f0ee036db0c145b5438b9a39dc6984ca5fa1260ca0170df32b'),
(12, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
(14, 'fahimmars', 'b94c5dbc799331f0ee036db0c145b5438b9a39dc6984ca5fa1260ca0170df32b'),
(15, 'Safa', '1d6717d20624c7d6dca15e40625edb3135f6710d60f48f22d84e7e5b9ab7464a'),
(16, 'sumit', '3caeb1fe9939783e2a8f3649df883ff935b2e4bfa66cd08bc258e169f686d692');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patientinfo`
--
ALTER TABLE `patientinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescribedmedicines`
--
ALTER TABLE `prescribedmedicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patientinfo`
--
ALTER TABLE `patientinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prescribedmedicines`
--
ALTER TABLE `prescribedmedicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
