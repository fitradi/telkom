-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 07:55 AM
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
  `data_id` varchar(100) NOT NULL,
  `nama_lop` int(255) NOT NULL,
  `lop` varchar(255) NOT NULL,
  `koordinat` varchar(255) NOT NULL,
  `segment` varchar(255) NOT NULL,
  `distribusi` int(10) NOT NULL,
  `core_distribusi` int(10) NOT NULL,
  `slot_olt` int(10) NOT NULL,
  `port_olt` int(10) NOT NULL,
  `sto` int(11) DEFAULT NULL,
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
  `tipe_odp` varchar(20) NOT NULL,
  `rar` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `detail_id` int(11) NOT NULL,
  `detail_package_id` int(64) NOT NULL,
  `detail_product_id` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`detail_id`, `detail_package_id`, `detail_product_id`) VALUES
(58, 30, 421),
(59, 31, 422),
(60, 32, 422);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(99) NOT NULL,
  `username` varchar(99) NOT NULL,
  `password` varchar(99) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `level`) VALUES
(1, 'fiki', 'c25c073370ab7ccb2cc1b665193c06a0', 'admin'),
(2, 'ryan', '10c7ccc7a4f0aff03c915c485565b9da', 'sales'),
(3, 'p', 'p', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `id_lop` int(11) NOT NULL,
  `id_sales` int(11) NOT NULL,
  `nama_lop` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`id_lop`, `id_sales`, `nama_lop`) VALUES
(1, 4, 'LOP_TEST'),
(2, 5, 'LOP_TEST');

-- --------------------------------------------------------

--
-- Table structure for table `olt`
--

CREATE TABLE `olt` (
  `id_olt` int(11) NOT NULL,
  `olt` varchar(99) NOT NULL,
  `id_sto` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `olt`
--

INSERT INTO `olt` (`id_olt`, `olt`, `id_sto`) VALUES
(1, 'GPON00-D4-GOM-4', 10),
(2, 'GPON02-D4-GOM-5\r\n', 10),
(3, 'GPON03-D4-GOM-3\r\n', 10),
(4, 'GPON00-D4-GOM-4FAE\r\n', 10),
(5, 'GPON00-D4-GOM-4FAG\r\n', 10),
(6, 'GPON00-D4-GOM-4FAP\r\n', 10),
(7, 'GPON00-D4-KAK-4\r\n', 9),
(8, 'GPON01-D4-KAK-3\r\n', 9),
(9, 'GPON00-D4-KAK-4FAG\r\n', 9),
(10, 'GPON00-D4-KBM-4\r\n', 7),
(11, 'GPON02-D4-KBM-5\r\n', 7),
(12, 'GPON03-D4-KBM-4\r\n', 7),
(13, 'GPON04-D4-KBM-3\r\n', 7),
(14, 'GPON05-D4-KBM-4\r\n', 7),
(15, 'GPON00-D4-KTW-4\r\n', 8),
(16, 'GPON01-D4-KTW-3\r\n', 8),
(17, 'GPON00-D4-KTW-4FAA\r\n', 8),
(18, 'GPON00-D4-MGE-4\r\n', 1),
(19, 'GPON02-D4-MGE-3\r\n', 1),
(20, 'GPON03-D4-MGE-5\r\n', 1),
(21, 'GPON04-D4-MGE-4\r\n', 1),
(22, 'GPON05-D4-MGE-4\r\n', 1),
(23, 'GPON06-D4-MGE-4\r\n', 1),
(24, 'GPON07-D4-MGE-4\r\n', 1),
(25, 'GPON00-D4-MGE-4FAY\r\n', 1),
(26, 'GPON00-D4-MGE-4FBA\r\n', 1),
(27, 'GPON00-D4-MGE-4FN\r\n', 1),
(28, 'GPON00-D4-MGE-4FRAK\r\n', 1),
(29, 'GPON00-D4-MGE-4FU\r\n', 1),
(30, 'GPON00-D4-MGE-4FV\r\n', 1),
(31, 'GPON00-D4-MGE-4FW\r\n', 1),
(32, 'GPON01-D4-MGE-4FU\r\n', 1),
(33, 'GPON00-D4-MTY-4\r\n', 2),
(34, 'GPON01-D4-MTY-3\r\n', 2),
(35, 'GPON00-D4-MUN-4\r\n', 4),
(36, 'GPON01-D4-MUN-3\r\n', 4),
(37, 'GPON02-D4-MUN-5\r\n', 4),
(38, 'GPON00-D4-MUN-4FDLA\r\n', 4),
(39, 'GPON00-D4-MNK-3\r\n', 3),
(40, 'GPON01-D4-MNK-5\r\n', 3),
(41, 'GPON02-D4-MNK-4\r\n', 3),
(42, 'GPON00-D4-MNK-4FMRF\r\n', 3),
(43, 'GPON00-D4-KTA-4\r\n', 6),
(44, 'GPON01-D4-KTA-3\r\n', 6),
(45, 'GPON02-D4-KTA-5\r\n', 6),
(46, 'GPON00-D4-KTA-4FAS\r\n', 6),
(47, 'GPON00-D4-PWJ-4\r\n', 5),
(48, 'GPON02-D4-PWJ-3\r\n', 5),
(49, 'GPON03-D4-PWJ-5\r\n', 5),
(50, 'GPON04-D4-PWJ-4\r\n', 5),
(51, 'GPON00-D4-PWJ-4FAB\r\n', 5),
(52, 'GPON00-D4-PWJ-4FAD\r\n', 5),
(53, 'GPON00-D4-PWJ-4FAM\r\n', 5),
(54, 'GPON00-D4-PWJ-4FAV\r\n', 5),
(55, 'GPON00-D4-PRN-4\r\n', 12),
(56, 'GPON01-D4-PRN-3\r\n', 12),
(57, 'GPON00-D4-PRN-4FAL\r\n', 12),
(58, 'GPON00-D4-PRN-4FAG\r\n', 12),
(59, 'GPON00-D4-PRN-4FAH\r\n', 12),
(60, 'GPON00-D4-TEM-4\r\n', 11),
(61, 'GPON02-D4-TEM-5\r\n', 11),
(62, 'GPON03-D4-TEM-3\r\n', 11),
(63, 'GPON00-D4-TEM-4FAS\r\n', 11),
(64, 'GPON00-D4-WOS-4\r\n', 13),
(65, 'GPON02-D4-WOS-4\r\n', 13),
(66, 'GPON03-D4-WOS-5\r\n', 13),
(67, 'GPON04-D4-WOS-3\r\n', 13),
(68, 'GPON05-D4-WOS-4\r\n', 13),
(69, 'GPON00-D4-WOS-4FAJ\r\n', 13),
(70, 'GPON00-D4-WOS-4FAK\r\n', 13),
(71, 'GPON00-D4-WOS-4FAU\r\n', 13),
(72, 'GPON00-D4-WOS-4FAV\r\n', 13),
(73, 'GPON01-D4-WOS-4FAV\r\n', 13);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(64) NOT NULL,
  `package_created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`, `package_created_at`) VALUES
(30, 'MTA2019M0518018_Fitradi_Rizki', '2021-02-18 11:57:32'),
(31, 'MTA2019M0518018_Fitradi_Rizki', '2021-02-18 12:04:51'),
(32, 'MTA2019M0518018_Fitradi_Rizki', '2021-02-18 12:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pt2` int(255) DEFAULT '1',
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `datel` enum('Magelang','Muntilan','Purworejo','Kebumen','Temanggung','Wonosobo') DEFAULT 'Magelang',
  `sto` varchar(3) DEFAULT '1',
  `status` enum('Submitted','Fisik DONE','On Progress','Checking','Drawing','Push UIM','GOLIVE') DEFAULT 'Submitted',
  `odc` varchar(30) DEFAULT '1',
  `jml_odp` int(100) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `pt2`, `image`, `datel`, `sto`, `status`, `odc`, `jml_odp`) VALUES
(23, 'MTA2019M0518018_Fitradi_Rizki', 1, 'MTA2019M0518018_Fitradi_Rizki.rar', 'Magelang', '1', 'Submitted', '1', 1);

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
  `longitude` int(255) NOT NULL,
  `lop` text,
  `mitra` varchar(64) DEFAULT NULL,
  `status` enum('Submitted','Fisik DONE','On Progress','Checking','Drawing','Push UIM','GOLIVE','Inputted') NOT NULL DEFAULT 'Inputted',
  `tgl_glive` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `datel`, `myir`, `sales`, `spv`, `cust_name`, `project`, `latitude`, `longitude`, `lop`, `mitra`, `status`, `tgl_glive`) VALUES
(422, 'Muntilan', 87686, 'anjani', 'rukmini', 'hanafi', 'muntilan', 1099, 1877, 'MTA2019M0518018_Fitradi_Rizki', NULL, 'Submitted', NULL);

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
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`id_lop`);

--
-- Indexes for table `olt`
--
ALTER TABLE `olt`
  ADD PRIMARY KEY (`id_olt`),
  ADD KEY `id_sto` (`id_sto`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

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
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lop`
--
ALTER TABLE `lop`
  MODIFY `id_lop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `olt`
--
ALTER TABLE `olt`
  MODIFY `id_olt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=423;

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
-- Constraints for table `olt`
--
ALTER TABLE `olt`
  ADD CONSTRAINT `olt_ibfk_1` FOREIGN KEY (`id_sto`) REFERENCES `sto` (`id_sto`);

--
-- Constraints for table `sto`
--
ALTER TABLE `sto`
  ADD CONSTRAINT `id_datel` FOREIGN KEY (`id_datel`) REFERENCES `datel` (`id_datel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
