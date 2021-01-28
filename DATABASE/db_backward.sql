-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 24, 2021 at 01:05 AM
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
-- Database: `db_coba`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_gejala`
--

CREATE TABLE `tb_gejala` (
  `id` int NOT NULL,
  `G001` tinyint(1) DEFAULT NULL,
  `G002` tinyint(1) DEFAULT NULL,
  `G003` tinyint(1) DEFAULT NULL,
  `G004` tinyint(1) DEFAULT NULL,
  `G005` tinyint(1) DEFAULT NULL,
  `G006` tinyint(1) DEFAULT NULL,
  `G007` tinyint(1) DEFAULT NULL,
  `G008` tinyint(1) DEFAULT NULL,
  `G009` tinyint(1) DEFAULT NULL,
  `G010` tinyint(1) DEFAULT NULL,
  `G011` tinyint(1) DEFAULT NULL,
  `G012` tinyint(1) DEFAULT NULL,
  `G013` tinyint(1) DEFAULT NULL,
  `G014` tinyint(1) DEFAULT NULL,
  `G015` tinyint(1) DEFAULT NULL,
  `G016` tinyint(1) DEFAULT NULL,
  `G017` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gejala`
--

INSERT INTO `tb_gejala` (`id`, `G001`, `G002`, `G003`, `G004`, `G005`, `G006`, `G007`, `G008`, `G009`, `G010`, `G011`, `G012`, `G013`, `G014`, `G015`, `G016`, `G017`) VALUES
(1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1),
(5, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0),
(7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gejala_1`
--

CREATE TABLE `tb_gejala_1` (
  `id` int NOT NULL,
  `kode` varchar(5) NOT NULL,
  `gejala` varchar(200) NOT NULL,
  `id_penyakit` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gejala_1`
--

INSERT INTO `tb_gejala_1` (`id`, `kode`, `gejala`, `id_penyakit`) VALUES
(1, 'G001', 'Mata menutup', 1),
(2, 'G002', 'Jengger kebiruan', 1),
(3, 'G003', 'Nafsu makan berkurang\r\n', 1),
(4, 'G004', 'Kelemahan kaki\r\n', 1),
(5, 'G005', 'Nafsu Makan Berkurang', 2),
(6, 'G006', 'Mata Menutup', 2),
(7, 'G007', 'Tumuh Lambat', 2),
(8, 'G008', 'Lumpuh\r\n', 2),
(9, 'G009', 'Tumbuh Lambat\r\n', 3),
(10, 'G010', 'Diare\r\n', 3),
(11, 'G011', 'Bulu Berdiri', 3),
(12, 'G012', 'Becak Putih Pada Jengger\r\n', 3),
(13, 'G013', 'Bercak Putih berjengger', 4),
(14, 'G014', 'Diare\r\n', 4),
(15, 'G015', 'anemia', 7),
(16, 'G016', 'produksi telur turun\r\n', 7),
(17, 'G017', 'Stress', 7),
(18, 'G018', 'Diare', 5),
(19, 'G019', 'Tumbuh Lambat', 5),
(20, 'G020', 'Bulu berdiri', 6),
(21, 'G021', 'Depresi', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyakit`
--

CREATE TABLE `tb_penyakit` (
  `id` int NOT NULL,
  `penyakit` varchar(100) NOT NULL,
  `info` varchar(1000) NOT NULL,
  `solusi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`id`, `penyakit`, `info`, `solusi`) VALUES
(1, 'Pullorum', 'Pullorum disebabkan oleh bakteri Salmonella pullorum, yaitu suatu bakteri bersifat gram negatif, tidak bergerak, berbentuk batang, fakultatif aerob dan tidak berspora, dan mampu bertahan di tanah hingga satu tahun. Penyakit Pullorum merupakan penyakit menular pada ayam yang menimbulkan kerugian ekonomi yang besar, menyebabkan kematian yang sangat tinggi terutama pada anak ayam umur 1-10 hari.', 'Pencegahan diutamakan pada sanitasi dan tata laksana serta manajemen pemeliharaan yang baik. Pengobatan pullorum dapat dilakukan dengan penyuntikan antibiotik seperti cocillin, neo terramycin ke dada ayam.'),
(2, 'Aspergillosis atau Brooder Pneumonia', 'Aspergillosis atau Brooder Pneumonia adalah suatu penyakit yang disebabkan oleh jamur atau cendawan dari genus Aspergillus, yang paling patogen adalah Aspergillus fumigatus, Aspergillus flavus dan Aspergillus niger. Penyakit ini menyerang manusia dan hewan. Pada unggas terutama menyerang alat pernapasan.', 'Belum ada vaksin yang efektif untuk pencegahan. Hewan penderita sebaiknya diisolasi. Pakan ternak dijaga jangan sampai terkontaminasi cendawan. Belum ada obat yang efektif dan ekonomis untuk aspergillosis pada unggas.'),
(3, 'Candidiasis', 'Candidiasis merupakan penyakit mikal yang disebabkan oleh Candida. Candida telah dikenal dan dipelajari sejak abad ke-18. Penyakit ini terutama disebabkan oleh hygiene yang tidak baik. Candida dapat hidup sebagai saprobe tanpa menyebabkan kelainan pada berbagai permukaan tubuh manusia dan hewan. Spesies Candida yang dikenal banyak menimbulkan penyakit baik pada manusia maupun hewan adalah Candida albicans.', 'Pencegahan candidiasis hanya bisa dilakukan dengan meningkat kan standar sanitasi, menghindari pemberian obat, antibiotik, dan coccidiostat, serta menghindari stimulan pertumbuhan berlebihan yang dapat mempengaruhi flora normal pada saluran pencernaan. Pengobatan dapat dilakukan menggunakan cooper sulfat dengan takaran 1 : 2000 (1 bagian cooper sulfat dan 2000 bagian air minum).'),
(4, 'Ringworm', 'Ringworm adalah penyakit menular pada permukaan kulit yang disebabkah oleh cendawan. Cendawan penyebab penyakit ini termasuk dalam kelompok Dermatophyta. Terdapat 4 (empat) genus yaitu Trichophyton, Microsporum, Epidermophyton, dan Keratinomyces, yang menyebabkan penyakit badan hewan adalah Trichophyton dan Microsporum.', 'Pencegahan ringworm dilakukan dengan menjaga kebersihan kulit dan kesehatan tubuh hewan. Ringworm jenis tertentu dapat sembuh dengan sendirinya. Pengobatan dapat dilakukan dengan 2 (dua)  cara, yaitu dengan olesan atau pengobatan per oral melalui mulut. Obat yang digunakan mengandung lemak, jodium sulfa atau asam salisilat.'),
(5, 'Ascariasis', 'Ascariasis adalah penyakit cacing yang menyerang unggas dan disebabkan oleh Ascaridia galli. Sinonim spesies ini adalah A.lineata, A.perspicillum. Cacing ini terdapat di usus  dan duodenum hewan unggas. Pada ternak ayam sering menyerang baik tipe pedaging maupun tipe petelur, sedangkan pada ayam buras  kemungkinan tertular lebih besar karena sistem pemeliharaan yang bebas berkeliaran.', 'Pencegahan dapat dilakukan dengen menerapkan manajemen pemeliharaan yang baik dan benar. Pengobatan terhadap Ascaridia galli yang paling sering dilakukan dengan pemberian piperazine. Anthelmentik ini sangat efektif, dapat diberikan melalui makanan atau minuman.'),
(6, 'Coccidiosis', 'Coccidiosis merupakan penyakit parasiter pada sistem pencernaan unggas akibat infeksi protozoa genus Emeria. Penyakit ini tersebar di seluruh dunia dan menyebabkan kerugian ekonomi yang besar. Coccidiosis menyebabkan pertumbuhan unggas yang tidak optimal akibat menurunnya efisiensi penyerapan nutrisi pakan. Pada kejadian yang kronis, penyakit ini dapat menyebabkan kematian yang cukup tinggi pada unggas.', 'Pencegahan Coccidiosis pada unggas dapat dilakukan dengan penerapan tindakan biosecurity dan pemberian vaksin secara teratur. Pengobatan Coccidiosis dapat dilakukan dengan pemberian obat-obatan yang bersifat coccidiostat atau coccidiocidal. Pemberian coccidiostat tidak mengeliminasi seluruh parasit dari dalam tubuh tetapi hanya menekan jumlah parasit yang ada di dalam tubuh.'),
(7, 'Gurem (Ornithonyssus bursa)', 'Gurem (Ornithonyssus bursa) termasuk sub ordo Mesostigmata, sub kelas Ascari dan kelas Arachnida. Hama ini sangat kecil dan sulit diberantas. Gurem menghisap darah, hidup bergerombol, dan keluar pada malam hari. Gurem betina menghisap darah ayam sebanyak 0.077 mg atau jumlah yang dihisap adalah 1.8 kali berat tubuh gurem.', 'Pencegahan dapat dilakukan dengan menerapkan manajemen pemeliharaan yang baik dan menjaga kebersihan kandang dan sekitarnya. Ayam yang terserang gurem dapat diobati dengan cara memandikannya dengan campuran air sabun dan belerang.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_gejala_1`
--
ALTER TABLE `tb_gejala_1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_gejala_1`
--
ALTER TABLE `tb_gejala_1`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
