-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2023 at 02:27 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lodge`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bid` int(100) NOT NULL,
  `custId` int(11) NOT NULL,
  `roomId` int(11) NOT NULL,
  `bookStartDate` date NOT NULL,
  `bookEndDate` date NOT NULL,
  `bookingComments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `custId`, `roomId`, `bookStartDate`, `bookEndDate`, `bookingComments`) VALUES
(29, 31, 8, '2022-05-06', '2022-05-06', ''),
(30, 36, 9, '2022-08-17', '2022-08-18', 'Deluxe size room');

-- --------------------------------------------------------

--
-- Table structure for table `ldg_customer`
--

CREATE TABLE `ldg_customer` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ldg_customer`
--

INSERT INTO `ldg_customer` (`id`, `name`, `address`, `email`) VALUES
(30, 'Dipti kc', 'Sinamangal', 'diptikc69@gmail.com'),
(31, 'Aadisesh Kc', 'Pepsi cola', 'aadisesh@gmail.com'),
(32, 'Sujana Ghimire', 'Lalitpur', 'sujanaghimire@gmail.com'),
(33, 'Dikshya K.C.', 'Bhaktapur', 'dikshyakc@gmail.com'),
(34, 'Susnita Ghimire', 'Sanepa', 'susnitaghimire@gmail.com'),
(35, 'Prapti K.C.', 'Dolakha', 'praptikc@gmail.com'),
(36, 'Prabesh Poudel', 'Airport', 'prabeshpoudel123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `roomId` int(100) NOT NULL,
  `roomName` varchar(20) NOT NULL,
  `roomNumber` int(100) NOT NULL,
  `totalCapacity` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomId`, `roomName`, `roomNumber`, `totalCapacity`) VALUES
(8, 'Mount Everest', 1, 'AC Single Bed Room'),
(9, 'Makalu', 2, 'AC Single Bed Room'),
(10, 'Yangra', 3, 'AC Double Bed Room'),
(11, 'Manaslu', 4, 'AC Single Bed Room'),
(12, 'Annapurna', 5, 'Deluxe Single Bed Ro'),
(13, 'Dhaulagiri', 7, 'Deluxe Single Bed Ro'),
(14, 'Gangapurna', 8, 'Deluxe Double Bed Ro'),
(15, 'Kabru', 9, 'Deluxe Double Bed Ro'),
(16, 'Jannu', 9, 'Deluxe Double Bed Ro'),
(17, 'Nyptse', 10, 'Premium Double Bed R'),
(18, 'ABC', 1223, 'Deluxe Double Bed Ro');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `full_name` varchar(100) NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `phone` int(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `status`, `full_name`, `is_admin`, `phone`, `address`) VALUES
(10, 'diptikc69@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 1, 'Dipti K.C.', 0, 0, ''),
(11, 'saugat69@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Saugat Khadka', 0, 0, ''),
(12, 'milanbaral1@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 1, 'Milan Baral', 0, 0, ''),
(13, 'prabeshpoudel123@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 1, 'Prabesh Poudel', 0, 0, ''),
(14, 'Ursha02@gmail.com', '78be1f20d3b5763d6df622535c5b7753', 1, 'Ursha Dangol', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip_code` int(100) DEFAULT NULL,
  `facebook_profile` varchar(100) DEFAULT NULL,
  `twitter_profile` varchar(100) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `profile_image` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `country`, `city`, `state`, `zip_code`, `facebook_profile`, `twitter_profile`, `phone`, `profile_image`, `gender`) VALUES
(9, '10', ' Nepal', 'Kathmandu', 'Nepal', 0, 'diptikc69', 'diptikc69', 2147483647, NULL, 'female'),
(10, '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '12', ' ksma,s', 'kathmandu', 'Nepal', 444, 'milan', 'milan', 989889, NULL, 'male'),
(12, '13', ' Nepal', 'Kathmandu', 'Nepal', 0, '', '', 0, NULL, 'male'),
(13, '14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `bookingId` (`custId`),
  ADD KEY `bookingId_2` (`roomId`);

--
-- Indexes for table `ldg_customer`
--
ALTER TABLE `ldg_customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`email`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`roomId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userEmail` (`email`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `ldg_customer`
--
ALTER TABLE `ldg_customer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `roomId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`roomId`) REFERENCES `rooms` (`roomId`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`custId`) REFERENCES `ldg_customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
