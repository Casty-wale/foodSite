-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 04:39 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE `dish` (
  `id` int(11) NOT NULL,
  `food` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`id`, `food`) VALUES
(1, 'Rice and Meat stew'),
(2, 'Waakye and fish Stew'),
(3, 'Yam and Garding Stew'),
(4, 'Fufu and light soup'),
(5, 'Banku and cow soup'),
(6, 'Beans with Reap plantian'),
(7, 'Servery rice and Chicken');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `food_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `time` time(6) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `date`, `food_id`, `user_id`, `time`) VALUES
(3, '2021-11-05', 1, 3, '16:53:57.000000'),
(15, '2021-11-05', 2, 3, '16:53:57.000000'),
(24, '2021-11-05', 3, 3, '16:53:57.000000'),
(33, '2021-11-09', 3, 6, '17:33:21.000000'),
(34, '2021-11-09', 7, 3, '17:49:36.000000'),
(37, '2021-11-13', 1, 3, '12:20:40.000000'),
(38, '2021-11-15', 2, 3, '15:20:59.000000'),
(39, '2021-11-10', 4, 3, '15:34:49.000000'),
(40, '2021-11-09', 1, 3, '15:35:46.000000'),
(41, '2021-11-09', 3, 3, '15:35:46.000000'),
(42, '2021-11-09', 1, 3, '15:36:45.000000'),
(43, '2021-11-09', 3, 3, '15:36:45.000000'),
(44, '2021-11-09', 1, 3, '15:36:45.000000'),
(45, '2021-11-09', 3, 3, '15:36:45.000000'),
(46, '2021-11-09', 1, 3, '15:36:45.000000'),
(47, '2021-11-09', 3, 3, '15:36:45.000000'),
(48, '2021-11-09', 1, 3, '15:36:45.000000'),
(49, '2021-11-09', 3, 3, '15:36:45.000000'),
(50, '2021-11-09', 1, 3, '15:36:45.000000'),
(51, '2021-11-09', 3, 3, '15:36:45.000000'),
(52, '2021-11-09', 1, 3, '15:36:45.000000'),
(53, '2021-11-09', 3, 3, '15:36:45.000000'),
(54, '2021-11-09', 1, 3, '15:36:45.000000'),
(55, '2021-11-09', 3, 3, '15:36:45.000000'),
(56, '2021-11-09', 1, 3, '15:36:45.000000'),
(57, '2021-11-09', 3, 3, '15:36:45.000000'),
(58, '2021-11-09', 1, 3, '15:36:45.000000'),
(59, '2021-11-09', 3, 3, '15:36:45.000000'),
(60, '2021-11-09', 1, 3, '15:36:45.000000'),
(61, '2021-11-09', 3, 3, '15:36:45.000000'),
(62, '2021-11-09', 1, 3, '15:36:45.000000'),
(63, '2021-11-09', 3, 3, '15:36:45.000000'),
(64, '2021-11-09', 1, 3, '15:36:45.000000'),
(65, '2021-11-09', 3, 3, '15:36:45.000000'),
(66, '2021-11-09', 1, 3, '15:36:45.000000'),
(67, '2021-11-09', 3, 3, '15:36:45.000000'),
(68, '2021-11-09', 1, 3, '15:36:45.000000'),
(69, '2021-11-09', 3, 3, '15:36:45.000000'),
(70, '2021-11-09', 1, 3, '15:36:45.000000'),
(71, '2021-11-09', 3, 3, '15:36:45.000000'),
(72, '2021-11-09', 1, 3, '15:36:45.000000'),
(73, '2021-11-09', 3, 3, '15:36:45.000000'),
(74, '2021-11-09', 1, 3, '15:36:45.000000'),
(75, '2021-11-09', 3, 3, '15:36:45.000000'),
(76, '2021-11-09', 1, 3, '15:36:45.000000'),
(77, '2021-11-09', 3, 3, '15:36:45.000000'),
(78, '2021-11-09', 1, 3, '15:36:45.000000'),
(79, '2021-11-09', 3, 3, '15:36:45.000000'),
(80, '2021-11-09', 1, 3, '15:36:45.000000'),
(81, '2021-11-09', 3, 3, '15:36:45.000000'),
(82, '2021-11-09', 1, 3, '15:36:45.000000'),
(83, '2021-11-09', 3, 3, '15:36:45.000000'),
(84, '2021-11-09', 1, 3, '15:36:45.000000'),
(85, '2021-11-09', 3, 3, '15:36:45.000000'),
(86, '2021-11-09', 1, 3, '15:36:45.000000'),
(87, '2021-11-09', 3, 3, '15:36:45.000000'),
(88, '2021-11-09', 1, 3, '15:36:45.000000'),
(89, '2021-11-09', 3, 3, '15:36:45.000000'),
(90, '2021-11-09', 1, 3, '15:36:45.000000'),
(91, '2021-11-09', 3, 3, '15:36:45.000000'),
(92, '2021-11-09', 1, 3, '15:36:45.000000'),
(93, '2021-11-09', 3, 3, '15:36:45.000000'),
(94, '2021-11-09', 1, 3, '15:36:45.000000'),
(95, '2021-11-09', 3, 3, '15:36:45.000000'),
(96, '2021-11-09', 1, 3, '15:36:45.000000'),
(97, '2021-11-09', 3, 3, '15:36:45.000000'),
(98, '2021-11-09', 1, 3, '15:36:45.000000'),
(99, '2021-11-09', 3, 3, '15:36:45.000000'),
(100, '2021-11-09', 1, 3, '15:36:45.000000'),
(101, '2021-11-09', 3, 3, '15:36:45.000000'),
(102, '2021-11-09', 1, 3, '15:36:45.000000'),
(103, '2021-11-09', 3, 3, '15:36:45.000000'),
(104, '2021-11-09', 1, 3, '15:36:45.000000'),
(105, '2021-11-09', 3, 3, '15:36:45.000000'),
(106, '2021-11-09', 1, 3, '15:36:45.000000'),
(107, '2021-11-09', 3, 3, '15:36:45.000000'),
(108, '2021-11-09', 1, 3, '15:36:45.000000'),
(109, '2021-11-09', 3, 3, '15:36:45.000000'),
(110, '2021-11-09', 1, 3, '15:36:45.000000'),
(111, '2021-11-09', 3, 3, '15:36:45.000000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `access`) VALUES
(3, 'Yaw', 'Owusu Akoto', 'yaw@gmail.com', '$2y$10$H1NMl56nlOeJgy2l08.PnOgXB3aXffZhvCxkcZDqcialQ2k5VensK', ''),
(6, 'sir', 'osei', 'ama@gmail.com', '$2y$10$JXD2N29Sjs/pA27LNofg7eGY0eYCX3XB.31nfpXCvSHgBB5Oravdi', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_id` (`food_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dish`
--
ALTER TABLE `dish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `dish` (`id`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
