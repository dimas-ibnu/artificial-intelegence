-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 04, 2021 at 09:33 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_backward`
--

-- --------------------------------------------------------

--
-- Table structure for table `base_knowledge`
--

CREATE TABLE `base_knowledge` (
  `id` int(11) NOT NULL,
  `kode_penyakit` varchar(100) NOT NULL,
  `daftar_gejala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `base_knowledge`
--

INSERT INTO `base_knowledge` (`id`, `kode_penyakit`, `daftar_gejala`) VALUES
(1, 'P1', 'G01 G02 G03 G04 G05 G06 G07'),
(2, 'P2', 'G01 G06 G08 G09 G10'),
(3, 'P3', 'G15 G16 G17'),
(4, 'P4', 'G01 G18 G19 G20');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `kode` varchar(5) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kode`, `nama_gejala`) VALUES
('G01', 'Sakit kepala'),
('G02', 'Pusing'),
('G03', 'Migran'),
('G04', 'Pendarahan dari hidung'),
('G05', 'Wajah kemerahan'),
('G06', 'Mudah Lelah'),
('G07', 'Penglihatan kabur'),
('G08', 'Mual berlebihan'),
('G09', 'Berkeringat'),
('G10', 'Cemas'),
('G11', 'Tegang'),
('G12', 'Nyeri pada bagian tubuh'),
('G13', 'Denyut jantung tidak teratur'),
('G14', 'Pembengkakan pada kaki dan perut'),
('G15', 'Cepat haus'),
('G16', 'Sering kencing'),
('G17', 'Penurunan berat badan'),
('G18', 'Berat badan berlebihan'),
('G19', 'Mengalami aterosklerosis seacara spontan'),
('G20', 'Kurang aktivitas'),
('G21', 'Mudah mengantuk'),
('G22', 'Kaki bengkak'),
('G23', 'Rasa sakit atau pegal pada tengkuk kepala'),
('G24', 'Pegal sampai ke pundak'),
('G25', 'Selulit'),
('G26', 'Sakit pada lutut'),
('G27', 'Varices'),
('G28', 'Sulit bernafas'),
('G29', 'Sendi Terasa nyeri'),
('G30', 'Sendi meradang'),
('G31', 'Sendi bengkak'),
('G32', 'Sendi panas'),
('G33', 'Sendi kaku'),
('G34', 'Kaki keseleo'),
('G35', 'Benjolan disekitar sendi yang meradang'),
('G36', 'Tidak keluar urin'),
('G37', 'Nafsu makan menurun'),
('G38', 'merasa anemia'),
('G39', 'Proporsi lemak bertambah'),
('G40', 'Sakit pada lambung'),
('G41', 'Sakit pada usus');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `kode` varchar(5) NOT NULL,
  `nama_penyakit` varchar(200) NOT NULL,
  `keterangan` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`kode`, `nama_penyakit`, `keterangan`) VALUES
('P1', 'Hipertensi', 'Hipertensi primer\r\n\r\nHipertensi primer menyerang 90% penderita hipertensi. Penyebabnya tidak diketahui dengan pasti dan cenderung terjadi bertahap selama bertahun-tahun. Faktor gaya hidup dan genetik diduga memiliki peranan penting.\r\n\r\nHipertensi sekunder\r\n\r\nHipertensi yang diketahui penyebabnya, terjadi pada 5-10% penderita hipertensi. Biasanya muncul tiba-tiba dan menyebabkan tekanan darah yang lebih tinggi daripada hipertensi primer.'),
('P2', 'Jantung', '<span>Penyakit jantung adalah kondisi ketika jantung mengalami gangguan. Beberapa jenis penyakit jantung, antara lain:</span>\r\n<ul>\r\n<li>Penyakit jantung koroner, merupakan suatu penyakit jantung yang terjadi akibat penyempitan pembuluh darah di jantung.</li>\r\n<li>Penyakit jantung bawaan, merupakan suatu masalah jantung yang ditemukan sejak bayi, yang paling umum ditemukan adalah kebocoran katup jantung.</li>\r\n<li>Infeksi jantung (endokarditis), merupakan suatu infeksi pada lapisan dalam jantung.</li>\r\n<li>Gagal jantung, merupakan suatu kegagalan otot jantung untuk memompakan darah secara memadai ke seluruh tubuh.</li>\r\n</ul>'),
('P3', 'Diabetes Militus', 'Diabetes mellitus merupakan penyakit kronis yang disebabkan oleh gagalnya organ pankreas memproduksi jumlah hormon insulin secara memadai sehingga menyebabkan peningkatan kadar glukosa dalam darah. DM merupakan salah satu penyakit tidak menular dan merupakan salah satu masalah kesehatan masyarakat yang penting.'),
('P4', 'Hiperklosterolemia', 'Hiperkolesterolemia adalah kondisi berbahaya yang ditandai dengan tingginya kadar kolesterol dalam darah. Bila tidak ditangani, kolesterol dapat menumpuk serta mempersempit pembuluh darah. Akibatnya, penderita berisiko terserang penyakit jantung koroner.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `base_knowledge`
--
ALTER TABLE `base_knowledge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `base_knowledge`
--
ALTER TABLE `base_knowledge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
