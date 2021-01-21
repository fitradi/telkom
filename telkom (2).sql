-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2021 at 09:33 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telkom`
--

-- --------------------------------------------------------

--
-- Table structure for table `datel`
--

CREATE TABLE `datel` (
  `id_datel` int(1) NOT NULL,
  `datel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datel`
--

INSERT INTO `datel` (`id_datel`, `datel`) VALUES
(1, 'Magelang'),
(2, 'Muntilan'),
(3, 'Purworejo'),
(4, 'Kebumen'),
(5, 'Temanggung'),
(6, 'Wonosobo');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pt2` int(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `datel` varchar(11) NOT NULL,
  `sto` varchar(3) NOT NULL,
  `status` enum('Submitted','Designed','On Progress','Checking','Drawing','Push UIM','GOLIVE') NOT NULL,
  `odc` varchar(30) DEFAULT NULL,
  `jml_odp` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `pt2`, `image`, `datel`, `sto`, `status`, `odc`, `jml_odp`) VALUES
('5ff5308cb2304', 'Testing', 2147483647, 'default.jpg', '1', '', 'Submitted', '', 0),
('5ff54fbeef867', 'MTY', 9827391, '5ff54fbeef867.rar', '6', '', 'Push UIM', 'satu', 0),
('5ff553838c722', 'Muntilan', 219873192, 'default.jpg', '3', '', 'On Progress', '', 0),
('5ff668357013a', 'tes download', 34729723, '5ff668357013a.rar', '3', '', 'Checking', '', 0),
('5ffc2188a0a42', 'anononono', 3, 'anononono.rar', 'Muntilan', '', 'Submitted', 'jhasgdjasdg', 31);

-- --------------------------------------------------------

--
-- Table structure for table `sto`
--

CREATE TABLE `sto` (
  `id_sto` int(11) NOT NULL,
  `sto` varchar(30) DEFAULT NULL,
  `id_datel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sto`
--

INSERT INTO `sto` (`id_sto`, `sto`, `id_datel`) VALUES
(1, 'MGE', 1),
(2, 'MTY', 1),
(3, 'SWT', 2),
(4, 'MUN', 2),
(5, 'PWJ', 3),
(6, 'KTA', 3),
(7, 'KBM', 4),
(8, 'KTW', 4),
(9, 'KAK', 4),
(10, 'GOM', 4),
(11, 'TEM', 5),
(12, 'PRN', 5),
(13, 'WOS', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `photo` varchar(64) NOT NULL DEFAULT 'user_no_image.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `datel` enum('MGE','MTY','SWT','MUN','PWJ','KTA','KBM','KTW','KAK','GOM','TEM','PRN','WOS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel untuk menyimpan data user';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `full_name`, `phone`, `role`, `last_login`, `photo`, `created_at`, `is_active`, `datel`) VALUES
(1, 'dian', '$2y$10$TpipIS3PDfeHTJWggvnFO.eT/dVBMyVKI5OcYV1avGMnt8wTqOt5O', 'dian@petanikode.com', 'Ahmad Muhardian', '08123456789', 'admin', '2021-01-04 08:01:50', 'user_no_image.jpg', '2019-12-10 15:46:40', 1, ''),
(3, 'fiki', '$2y$10$RmfUmP2gYUk0HfvF1sY4reuVTMUPg6EN45iLFGdWUNRGescU4bWkC', 'fitradi.fn@student.uns.ac.id', 'Fitradi Rizki Nugraha', '082242805330', 'admin', '2021-01-17 12:34:10', 'user_no_image.jpg', '2021-01-04 08:04:46', 0, 'MUN'),
(4, 'admin', '$2y$10$6QoH4SLAOvDA5dZ8oV.ON.oJDEVrEbnxMGretPEGnMoDS/7RlUcPO', 'blabla@gmail.com', 'blablal', '02183012830', 'admin', '2021-01-07 07:54:15', 'user_no_image.jpg', '2021-01-04 09:51:58', 0, 'KTA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datel`
--
ALTER TABLE `datel`
  ADD PRIMARY KEY (`id_datel`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sto`
--
ALTER TABLE `sto`
  ADD PRIMARY KEY (`id_sto`),
  ADD KEY `id_datel` (`id_datel`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sto`
--
ALTER TABLE `sto`
  MODIFY `id_sto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sto`
--
ALTER TABLE `sto`
  ADD CONSTRAINT `id_datel` FOREIGN KEY (`id_datel`) REFERENCES `datel` (`id_datel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
