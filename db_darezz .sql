-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2025 at 04:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_darezz`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `id_alamat` int(11) NOT NULL,
  `alamat_pengirim` text NOT NULL,
  `alamat_penerima` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`id_alamat`, `alamat_pengirim`, `alamat_penerima`) VALUES
(1, 'aa', 'aa'),
(2, 'aa', 'aa'),
(3, 'aa', 'aa'),
(4, 'depok', 'jakarta'),
(5, 'depok', 'jakarta'),
(6, 'depok', 'jakarta'),
(7, 'depok', 'jakarta'),
(8, 'depok', 'jakarta'),
(9, 'depok', 'jakarta'),
(10, 'depok', 'jakarta'),
(11, 'depok', 'jakarta'),
(12, 'depok', 'jakarta'),
(13, 'depok', 'jakarta'),
(14, 'depok', 'jakarta'),
(15, 'depok', 'jakarta'),
(16, 'depok', 'jakarta'),
(17, 'depok', 'jakarta'),
(18, 'depok', 'jakarta'),
(19, 'depok', 'jakarta'),
(20, 'depok', 'jakarta'),
(21, 'Depok jalan Pekapuran', 'Depok jalan Juanda'),
(22, '', ''),
(23, '', ''),
(24, 'Depok jalan Pekapuran', 'Depok jalan Juanda'),
(25, 'gdc', 'pekapuran'),
(26, 'Tapos', 'Jakarta'),
(27, 'Tapos', 'Jakarta'),
(28, 'Tapos', 'Jakarta'),
(29, 'Depok', 'Bogor'),
(30, 'Depok', 'Bogor'),
(31, 'Depok', 'Bogor'),
(32, 'Depok', 'Tanggerang'),
(33, 'Depok', 'Banten'),
(34, 'Sukabumi', 'Banten'),
(35, 'Depok', 'Banten'),
(36, 'satu', 'dua'),
(37, 'satu', 'dua'),
(38, 'Pekapuran', 'Tapos'),
(39, 'Pekapuran', 'Tapos');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` int(11) NOT NULL,
  `nama_kurir` varchar(100) NOT NULL,
  `no_hp_kurir` varchar(15) NOT NULL,
  `kendaraan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `nama_kurir`, `no_hp_kurir`, `kendaraan`) VALUES
(1, 'Darrell', '123', 'Motor'),
(2, 'Ezra', '456', 'Mobil'),
(3, 'Adni', '789', 'Pickup'),
(4, 'Tangguh', '012', 'Van'),
(5, 'Aryo', '345', 'Truk');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `id_alamat` int(11) NOT NULL,
  `id_kurir` int(11) DEFAULT NULL,
  `nama_pengirim` varchar(100) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `jarak` decimal(5,2) NOT NULL,
  `berat` decimal(5,2) NOT NULL,
  `kendaraan` varchar(50) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL,
  `total_biaya` int(11) DEFAULT NULL,
  `status_pengiriman` enum('Pending','Diproses','Dikirim','Selesai') DEFAULT 'Pending',
  `status_pembayaran` enum('belum dibayar','menunggu konfirmasi','terkonfirmasi') DEFAULT 'belum dibayar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `id_pengirim`, `id_alamat`, `id_kurir`, `nama_pengirim`, `nama_penerima`, `jarak`, `berat`, `kendaraan`, `tanggal_pengiriman`, `metode_pembayaran`, `total_biaya`, `status_pengiriman`, `status_pembayaran`) VALUES
(12, 4, 17, 1, 'tes', 'tess', 3.00, 1.00, 'Truck', '2025-04-29', 'Cash', 56500, 'Dikirim', 'belum dibayar'),
(13, 4, 18, 1, 'tes', 'tess', 3.00, 1.00, 'Pickup', '2025-04-29', 'Cash', 36500, 'Dikirim', 'belum dibayar'),
(14, 4, 19, 1, 'tes', 'tess', 3.00, 1.00, 'Pickup', '2025-04-29', 'Cash', 36500, 'Dikirim', 'belum dibayar'),
(15, 4, 20, 1, 'tes', 'tess', 3.00, 1.00, 'Pickup', '2025-04-29', 'Transfer Bank', 36500, 'Dikirim', 'belum dibayar'),
(16, 6, 21, 2, 'hilda', 'adlih', 12.00, 4.00, 'Mobil', '2025-04-29', 'E-Wallet', 46000, 'Dikirim', 'belum dibayar'),
(17, 6, 24, 3, 'hilda', 'adlih', 12.00, 4.00, 'Pickup', '2025-04-29', 'Transfer Bank', 56000, 'Dikirim', 'belum dibayar'),
(18, 6, 25, 2, 'darrell', 'ezra', 8.00, 12.00, 'Pickup', '2025-04-30', 'Cash', 52000, 'Dikirim', 'belum dibayar'),
(19, 8, 26, 2, 'hilda', 'Ezra', 10.00, 2.00, 'Motor', '2025-04-29', 'Transfer Bank', 31000, 'Dikirim', 'belum dibayar'),
(20, 8, 27, 2, 'hilda', 'Ezra', 10.00, 2.00, 'Motor', '2025-04-29', 'Transfer Bank', 31000, 'Dikirim', 'belum dibayar'),
(21, 4, 28, 2, 'hilda', 'Ezra', 10.00, 2.00, 'Mobil', '2025-04-29', 'Transfer Bank', 41000, 'Dikirim', 'belum dibayar'),
(22, 4, 29, 3, 'ezra', 'darrell', 0.00, 12.00, 'Pickup', '2025-05-04', 'Cash', 36000, 'Dikirim', 'belum dibayar'),
(23, 4, 30, NULL, 'ezra', 'darrell', 0.00, 12.00, 'Pickup', '2025-05-04', 'Transfer Bank', 36000, 'Dikirim', 'belum dibayar'),
(24, 4, 31, 3, 'Darrell', 'Ezra', 0.00, 12.00, 'Pickup', '2025-05-04', 'Cash', 36000, 'Diproses', 'terkonfirmasi'),
(25, 4, 32, NULL, 'Darrell', 'tes', 0.00, 10.00, 'Pickup', '2025-05-04', 'E-Wallet', 35000, 'Dikirim', 'belum dibayar'),
(26, 4, 33, NULL, 'Darrell', 'Ezra', 10.00, 30.00, 'Motor', '2025-05-04', 'Transfer Bank', 45000, 'Dikirim', 'belum dibayar'),
(37, 4, 34, NULL, 'Darrell', 'Ezra', 10.00, 30.00, 'Motor', '2025-05-04', 'Transfer Bank', 45000, 'Dikirim', 'belum dibayar'),
(38, 4, 35, NULL, 'ezra', 'darrell', 10.00, 12.00, 'Truck', '2025-05-04', 'Transfer Bank', 76000, 'Dikirim', 'belum dibayar'),
(39, 4, 36, NULL, 'satu', 'dua', 10.00, 13.00, 'Van', '2025-05-04', 'Cash', 66500, 'Diproses', 'terkonfirmasi'),
(40, 4, 37, NULL, 'satu', 'dua', 10.00, 13.00, 'Van', '2025-05-04', 'Cash', 66500, 'Diproses', 'terkonfirmasi'),
(41, 4, 38, NULL, 'Keyza', 'Salwa', 10.00, 5.00, 'Pickup', '2025-05-04', 'E-Wallet', 52500, 'Diproses', 'terkonfirmasi'),
(42, 4, 39, NULL, 'Keyza', 'Salwa', 10.00, 5.00, 'Pickup', '2025-05-04', 'E-Wallet', 52500, 'Diproses', 'terkonfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_pengirim` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `no_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_pengirim`, `username`, `password`, `nama_lengkap`, `no_telepon`) VALUES
(4, 'tes', '$2y$10$0fkTwnhg.Pxp31huUFWZ2uDQPwX5OlTLtS6MtdyxDmCz7H3bk2raa', 'tes', '123'),
(5, 'user', '$2y$10$YrhzuwJbpBpuo3dUrYhbJuZo6STJWZr.9u1Rj7pm6.svVMoyOtN9.', 'user', '123'),
(6, 'hilda', '$2y$10$q0xS40OjW218faeXrIcwkei6JYfcSHSBZHEb4caUUmooSGpwfIpcW', 'hilda', '123'),
(8, 'Hilda2', '$2y$10$IJSOd/Cqp4i2S6Px1frfAexUlZlWIab9YLSTmkbf7RCElHdtYs33K', 'Hilda Rahmawati', '09867465788');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_pengirim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id_alamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id_kurir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_pengirim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
