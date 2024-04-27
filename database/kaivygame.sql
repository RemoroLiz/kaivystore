-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2024 at 05:03 PM
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
-- Database: `kaivygame`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_carousel`
--

CREATE TABLE `tb_carousel` (
  `id_carousel` int(11) NOT NULL,
  `carousel_name` varchar(255) NOT NULL,
  `img_carousel` varchar(255) NOT NULL,
  `description_carousel` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dmff`
--

CREATE TABLE `tb_dmff` (
  `id_dmff` int(11) NOT NULL,
  `kategori_ff` varchar(255) NOT NULL,
  `jumlah_dmff` int(11) DEFAULT NULL,
  `harga_dmff` decimal(10,2) DEFAULT NULL,
  `img_dmff` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dmlbb`
--

CREATE TABLE `tb_dmlbb` (
  `id_dmlbb` int(11) NOT NULL,
  `kategori_dmlbb` varchar(255) NOT NULL,
  `jumlah_dmlbb` int(11) DEFAULT NULL,
  `bonus_dmlbb` varchar(20) NOT NULL,
  `harga_dmlbb` int(20) DEFAULT NULL,
  `img_dmlbb` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dmlbb`
--

INSERT INTO `tb_dmlbb` (`id_dmlbb`, `kategori_dmlbb`, `jumlah_dmlbb`, `bonus_dmlbb`, `harga_dmlbb`, `img_dmlbb`) VALUES
(1, 'Mobile Legends A', 85, '77+8', 24000, ''),
(2, 'Mobile Legends A', 148, '134+14', 40000, ''),
(3, 'Mobile Legends A', 258, '233+25', 69000, NULL),
(4, 'Mobile Legends A', 370, '333+37', 100000, NULL),
(5, 'Mobile Legends A', 408, '367+41', 108000, NULL),
(6, 'Mobile Legends A', 568, '503+65', 148000, NULL),
(7, 'Mobile Legends A', 642, '570+72)', 165000, NULL),
(8, 'Mobile Legends A', 716, '637+79', 185000, NULL),
(9, 'Mobile Legends A', 845, '753+92', 220000, NULL),
(10, 'Mobile Legends A', 966, '862+104', 298000, NULL),
(11, 'Mobile Legends A', 2010, '708+302', 488000, NULL),
(12, 'Mobile Legends A', 1045, '928+117', 272000, NULL),
(13, 'Mobile Legends A', 1443, '1277+166', 370000, NULL),
(14, 'Mobile Legends A', 284, '257+27', 77000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_listgame`
--

CREATE TABLE `tb_listgame` (
  `id_listgame` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `publisher_name` varchar(255) DEFAULT NULL,
  `notes_game` text DEFAULT NULL,
  `img_game` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_listgame`
--

INSERT INTO `tb_listgame` (`id_listgame`, `game_name`, `publisher_name`, `notes_game`, `img_game`) VALUES
(1, 'Mobile Legends', 'Moonton', NULL, '661e8bb0bc508.webp'),
(13, 'Weekly Diamond Pass', 'Montoon', NULL, '661e8d580c4a2.jpg'),
(14, 'FreeFire', 'Garena', NULL, 'ff661e90a1a5f14.webp');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wdp`
--

CREATE TABLE `tb_wdp` (
  `id_wdp` int(11) NOT NULL,
  `jumlah_wdp` int(11) NOT NULL,
  `harga_wdp` decimal(10,2) NOT NULL,
  `img_wdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_carousel`
--
ALTER TABLE `tb_carousel`
  ADD PRIMARY KEY (`id_carousel`);

--
-- Indexes for table `tb_dmff`
--
ALTER TABLE `tb_dmff`
  ADD PRIMARY KEY (`id_dmff`);

--
-- Indexes for table `tb_dmlbb`
--
ALTER TABLE `tb_dmlbb`
  ADD PRIMARY KEY (`id_dmlbb`);

--
-- Indexes for table `tb_listgame`
--
ALTER TABLE `tb_listgame`
  ADD PRIMARY KEY (`id_listgame`);

--
-- Indexes for table `tb_wdp`
--
ALTER TABLE `tb_wdp`
  ADD PRIMARY KEY (`id_wdp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_carousel`
--
ALTER TABLE `tb_carousel`
  MODIFY `id_carousel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_dmff`
--
ALTER TABLE `tb_dmff`
  MODIFY `id_dmff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_dmlbb`
--
ALTER TABLE `tb_dmlbb`
  MODIFY `id_dmlbb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_listgame`
--
ALTER TABLE `tb_listgame`
  MODIFY `id_listgame` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_wdp`
--
ALTER TABLE `tb_wdp`
  MODIFY `id_wdp` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
