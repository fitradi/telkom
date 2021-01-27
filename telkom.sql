-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2021 at 09:50 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

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
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `data_id` varchar(64) NOT NULL,
  `nama_lop` varchar(255) NOT NULL,
  `koordinat` varchar(255) NOT NULL,
  `segment` varchar(255) NOT NULL,
  `distribusi` int(10) NOT NULL,
  `core_distribusi` int(10) NOT NULL,
  `slot_olt` int(10) NOT NULL,
  `port_olt` int(10) NOT NULL,
  `nama_olt` varchar(100) NOT NULL,
  `no_rak_ea` int(10) NOT NULL,
  `panel_ea` int(10) NOT NULL,
  `port_ea` int(10) NOT NULL,
  `no_rak_oa` int(10) NOT NULL,
  `panel_oa` int(10) NOT NULL,
  `port_oa` int(10) NOT NULL,
  `panel_feeder` int(10) NOT NULL,
  `port_feeder` int(10) NOT NULL,
  `urutan_pasif_odc` int(10) NOT NULL,
  `port_pasif_odc` int(10) NOT NULL,
  `panel_dist_odc` int(10) NOT NULL,
  `port_dist_odc` int(10) NOT NULL,
  `jalan` varchar(255) NOT NULL,
  `ancer` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `qr_code` varchar(255) NOT NULL DEFAULT 'TFO0',
  `tipe_odp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`data_id`, `nama_lop`, `koordinat`, `segment`, `distribusi`, `core_distribusi`, `slot_olt`, `port_olt`, `nama_olt`, `no_rak_ea`, `panel_ea`, `port_ea`, `no_rak_oa`, `panel_oa`, `port_oa`, `panel_feeder`, `port_feeder`, `urutan_pasif_odc`, `port_pasif_odc`, `panel_dist_odc`, `port_dist_odc`, `jalan`, `ancer`, `kecamatan`, `kelurahan`, `qr_code`, `tipe_odp`) VALUES
('60079345023c5', 'ganti', '696969696969', 'hahahahah899', 7, 20, 14, 15, 'halo nama olt', 10, 42, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 'jalan kenanagan', 'sandkan', 'sakdnak', 'ksandksa', 'TFO012345', 'CA-16'),
('6007d1119db0a', 'anyar', '192.168.200', '0128401238021983, 2103821038012', 15, 31, 15, 6, 'fikishu', 23, 22, 21, 20, 19, 18, 17, 16, 15, 14, 13, 12, 'kenangan', 'hatimu', 'cintaku', 'padamu', 'TFO0192168000', 'CA-SOLID-16');

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
  `datel` enum('Magelang','Muntilan','Purworejo','Kebumen','Temanggung','Wonosobo') NOT NULL,
  `sto` varchar(3) NOT NULL,
  `status` enum('Submitted','Designed','On Progress','Checking','Drawing','Push UIM','GOLIVE') NOT NULL,
  `odc` varchar(30) DEFAULT NULL,
  `jml_odp` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `pt2`, `image`, `datel`, `sto`, `status`, `odc`, `jml_odp`) VALUES
('5ff5308cb2304', 'Testing', 2147483647, 'default.jpg', 'Magelang', '', 'Submitted', '', 0),
('5ff54fbeef867', 'MTY', 9827391, '5ff54fbeef867.rar', 'Muntilan', 'MUN', 'Push UIM', 'satu', 0),
('5ff553838c722', 'Muntilan', 219873192, 'default.jpg', 'Purworejo', '', 'On Progress', '', 0),
('5ff668357013a', 'tes download', 34729723, '5ff668357013a.rar', 'Purworejo', '', 'Checking', '', 0),
('600e3bb03ca72', 'MTA2019M0518018_Fitradi_Rizki', 13, 'MTA2019M0518018_Fitradi_Rizki.rar', 'Magelang', '2', 'Submitted', 'sadasdas', 10);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(99) NOT NULL,
  `datel` enum('Magelang','Muntilan','Purworejo','Kebumen','Temanggung','Wonosobo') NOT NULL,
  `myir` int(99) NOT NULL,
  `sales` varchar(99) DEFAULT NULL,
  `spv` varchar(99) DEFAULT NULL,
  `cust_name` varchar(99) NOT NULL,
  `project` varchar(99) NOT NULL,
  `latitude` int(255) NOT NULL,
  `longitude` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `datel`, `myir`, `sales`, `spv`, `cust_name`, `project`, `latitude`, `longitude`) VALUES
(1, 'Magelang', 21312, 'fiki', 'gendon', 'ryan', 'magelang', 2131231, 2313213),
(2, 'Magelang', 24123, NULL, NULL, 'fiki', 'pikoel', 213109, 210318),
(3, 'Magelang', 24123, NULL, NULL, 'fiki', 'pikoel', 213109, 210318),
(4, 'Muntilan', 12312, 'tes', 'tus', 'anu', 'mama', 921030, 73281),
(5, 'Purworejo', 98172391, 'zero', NULL, 'null', 'aku', 19237, 12839),
(6, 'Kebumen', 72163, NULL, 'gaada', 'kamu', 'kita', 2139, 2329),
(7, 'Temanggung', 98734, NULL, NULL, 'fend', 'nui', 219, 232),
(8, 'Wonosobo', 8299, 'aku', 'aku', 'aku', 'aku', 28193, 3219),
(9, 'Magelang', 91238, NULL, 'mama', 'huhu', 'idont', 28391, 1329),
(10, 'Magelang', 24123, NULL, NULL, 'fiki', 'pikoel', 213109, 210318),
(11, 'Muntilan', 12312, 'tes', 'tus', 'anu', 'mama', 921030, 73281),
(12, 'Purworejo', 98172391, 'zero', NULL, 'null', 'aku', 19237, 12839),
(13, 'Kebumen', 72163, NULL, 'gaada', 'kamu', 'kita', 2139, 2329),
(14, 'Temanggung', 98734, NULL, NULL, 'fend', 'nui', 219, 232),
(15, 'Wonosobo', 8299, 'aku', 'aku', 'aku', 'aku', 28193, 3219),
(16, 'Magelang', 91238, NULL, 'mama', 'huhu', 'idont', 28391, 1329);

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
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `photo` varchar(64) NOT NULL DEFAULT 'user_no_image.jpg',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `datel` enum('MGE','MTY','SWT','MUN','PWJ','KTA','KBM','KTW','KAK','GOM','TEM','PRN','WOS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel untuk menyimpan data user';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `full_name`, `phone`, `role`, `last_login`, `photo`, `created_at`, `is_active`, `datel`) VALUES
(1, 'dian', '$2y$10$TpipIS3PDfeHTJWggvnFO.eT/dVBMyVKI5OcYV1avGMnt8wTqOt5O', 'dian@petanikode.com', 'Ahmad Muhardian', '08123456789', 'admin', '2021-01-04 08:01:50', 'user_no_image.jpg', '2019-12-10 15:46:40', 1, ''),
(3, 'fiki', '$2y$10$RmfUmP2gYUk0HfvF1sY4reuVTMUPg6EN45iLFGdWUNRGescU4bWkC', 'fitradi.fn@student.uns.ac.id', 'Fitradi Rizki Nugraha', '082242805330', 'admin', '2021-01-25 08:13:06', 'user_no_image.jpg', '2021-01-04 08:04:46', 0, 'MUN'),
(4, 'admin', '$2y$10$6QoH4SLAOvDA5dZ8oV.ON.oJDEVrEbnxMGretPEGnMoDS/7RlUcPO', 'blabla@gmail.com', 'blablal', '02183012830', 'admin', '2021-01-20 14:06:15', 'user_no_image.jpg', '2021-01-04 09:51:58', 0, 'KTA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`data_id`);

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
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
