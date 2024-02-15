-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 14, 2024 at 10:25 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukm_syana`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `divisi` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `content` text,
  `email` varchar(100) DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `title`, `divisi`, `jabatan`, `content`, `email`, `prodi`) VALUES
(1, 'Rachma', 'Modern Dancee', 'Ketua Koordinasi Modern Dance', 'Lahir di Karawang', NULL, NULL),
(2, 'Firda', 'Tradisional Dance', 'Anggota Syandana Nawasena', 'Lahir di Bandung', NULL, NULL),
(5, 'Rania', 'Tradisional Dance', 'Ketua Umum', 'Universitas Logistik dan Bisnis Internasional', NULL, NULL),
(8, 'Aulia', 'Bendahara', 'Bendahara Utama', 'Universitas Logistik dan Bisnis Internasional', NULL, NULL),
(10, 'Wangi S S', 'Tari Tradisional', 'Anggota', 'ULBI', 'wangi@gmail.com', 'D3 Sistem Informasi'),
(11, 'Ahmad Fadilah', 'Anggota ajah', 'Anggota', 'anggota baru', 'ahmad@gmail.com', 'D3 Sistem Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `dokumentasi`
--

CREATE TABLE `dokumentasi` (
  `id_dokumentasi` int NOT NULL,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dokumentasi`
--

INSERT INTO `dokumentasi` (`id_dokumentasi`, `nama_kegiatan`, `tanggal`, `gambar`, `content`) VALUES
(2, 'Tampil Pembukaan Acara ULBI', '2023-12-25', 'IMG-20231212-WA0017.jpg', 'Tampil Pembukaan Acara di Ulbi'),
(4, 'Tampil Kegiatan Himanbis', '2024-01-07', 'IMG-20231212-WA0019.jpg', 'Kegiatan MD Himanbis'),
(5, 'Tambil TD Wisuda', '2024-01-07', 'IMG-20231212-WA0020.jpg', 'Tampil Wisudaaaaaaaa'),
(7, 'Diesnatalis ULBI 2025', '2024-01-15', 'IMG-20231212-WA0021.jpg', ' Diesnatalis ULBI yang ke sekian'),
(8, 'Kegiatan terakhir', '2024-01-14', 'IMG-20231212-WA0022.jpg', ' alsjdahsldjasldjasldj');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `name`, `email`, `message`, `created_at`) VALUES
('657ba98568ce48.04979938', 'rachma', 'rachma@gmail.com', 'coba dulu', '2023-12-15 01:19:01'),
('657d90e799d396.98069589', 'Rachma', 'rachma@gmail.com', 'Bagaimana cara masuk Syana?', '2023-12-16 11:58:31'),
('657fe62eaa7947.59395026', 'firda', 'firda@gmail.com', 'coba', '2023-12-18 06:26:54');

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `id_kas` int NOT NULL,
  `status` enum('masuk','keluar') DEFAULT NULL,
  `jumlah` decimal(10,2) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `total_uang` decimal(10,2) NOT NULL DEFAULT '0.00',
  `id_dokumentasi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`id_kas`, `status`, `jumlah`, `tanggal`, `deskripsi`, `total_uang`, `id_dokumentasi`) VALUES
(1, 'masuk', '120000.00', '2023-12-22', 'kita coba dulu gaes', '0.00', 2),
(2, 'keluar', '10000.00', '2023-12-17', 'coba', '0.00', 5),
(5, 'masuk', '10000.00', '2023-12-18', 'uang kas', '0.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(32) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `username`, `password`, `avatar`, `last_login`) VALUES
(6118, 'Administrator', 'admin@mail.com', 'admin', '$2y$10$hRi1qju2KOeEPcBZ0wYfhu/PN5e9Wl.ddWeDTds8Uokad764X9D1a', NULL, '2024-01-14 03:24:11'),
(6119, 'Rachma', 'rachma@gmail.com', 'rachma', 'rachma123', NULL, '2023-12-25 10:08:23'),
(6120, 'Firda', 'firda@gmail.com', 'firda', 'firda123', NULL, '2023-12-27 03:37:03'),
(6121, 'Rania', 'rania@gmail.com', 'rania', 'rania123', NULL, '2023-12-26 03:37:27'),
(6122, 'Aulia', 'aulia@gmail.com', 'aulia', 'aulia123', NULL, '2023-12-27 03:37:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD PRIMARY KEY (`id_dokumentasi`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id_kas`),
  ADD KEY `fk_kas_dokumentasi` (`id_dokumentasi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  MODIFY `id_dokumentasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id_kas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6123;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kas`
--
ALTER TABLE `kas`
  ADD CONSTRAINT `fk_kas_dokumentasi` FOREIGN KEY (`id_dokumentasi`) REFERENCES `dokumentasi` (`id_dokumentasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
