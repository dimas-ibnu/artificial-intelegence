-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2020 at 10:18 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spforwardbasicv1`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id` int(5) NOT NULL,
  `pertanyaan` text NOT NULL,
  `ifyes` varchar(5) NOT NULL DEFAULT '0',
  `ifno` varchar(5) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id`, `pertanyaan`, `ifyes`, `ifno`) VALUES
(10, 'Gatal ?', '6', 'P0007'),
(9, 'Peradangan Mata ?', '5', '10'),
(8, 'Kemerahan ?', '9', 'P0007'),
(7, 'Digigit Serangga ?', '8', 'P0007'),
(6, 'Galukoma ?', 'P0004', 'P0007'),
(5, 'Gatal ?', 'P0003', 'P0007'),
(3, 'Digigit Serangga ?', '8', '9'),
(1, 'Alergi ?', '2', '9'),
(2, 'Sekret Konjungtiva ?', 'P0001', '3');

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
('P0001', 'Penyakit Dermatitis Palpebra\r\n', '0', '0'),
('P0003', 'Penyakit Edema Palpebra Infla', '0', '0'),
('P0004', 'Penyakit Blefaritis', '0', '0'),
('P0007', 'Penyakit Tidak Di Temukan', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `rule_temporary`
--

CREATE TABLE `rule_temporary` (
  `id_pilihan` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pilihan` varchar(5) NOT NULL,
  `jawaban` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  MODIFY `id_pilihan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
