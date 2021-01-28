-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 22, 2021 at 03:43 AM
-- Server version: 8.0.22-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_foward_chaining`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id` int NOT NULL,
  `pertanyaan` text NOT NULL,
  `ifyes` varchar(5) NOT NULL DEFAULT '0',
  `ifno` varchar(5) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id`, `pertanyaan`, `ifyes`, `ifno`) VALUES
(8, 'Suhu PC Panas', 'M2', 'M99'),
(7, 'PC Sering Mati Tiba-Tiba', '8', 'M99'),
(6, 'Tegangan Listrik Tidak Stabil', '7', 'M99'),
(5, 'Tidak Ada Aliran Listrik', '6', '9'),
(3, 'Memori Kotor', '4', 'M99'),
(4, 'Memori Tidak Terdeteksi', 'M1', 'M99'),
(2, 'Power Supply Rusak', '3', 'M99'),
(1, 'Motherbord Rusak', '2', '5'),
(9, 'Semua Perangkat Tidak Terdeteksi Oleh OS', '10', 'M99'),
(10, 'Suhu PC Panas', 'M3', 'M99');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` varchar(5) NOT NULL,
  `penyakit` text NOT NULL,
  `ifyes` varchar(5) NOT NULL DEFAULT '0',
  `ifno` varchar(5) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `penyakit`, `ifyes`, `ifno`) VALUES
('M99', 'Tidak Bisa Mendeteksi Kerusakan', '0', '0'),
('M3', 'Motherboard Mengalami Masalah', '0', '0'),
('M2', 'PC Mati', '0', '0'),
('M1', 'PC Over Head', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `rule_temporary`
--

CREATE TABLE `rule_temporary` (
  `id_pilihan` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `pilihan` varchar(5) NOT NULL,
  `jawaban` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rule_temporary`
--

INSERT INTO `rule_temporary` (`id_pilihan`, `username`, `pilihan`, `jawaban`) VALUES
(370, 'alopakar', 'M99', 'N'),
(369, 'alopakar', '2', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `rule_temporary`
--
ALTER TABLE `rule_temporary`
  ADD PRIMARY KEY (`id_pilihan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rule_temporary`
--
ALTER TABLE `rule_temporary`
  MODIFY `id_pilihan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=371;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
