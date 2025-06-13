-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 06:19 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uwangku`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggaran`
--

CREATE TABLE `anggaran` (
  `id_anggaran` int(11) NOT NULL,
  `jumlah_anggaran` double NOT NULL,
  `periode_awal` date NOT NULL,
  `periode_akhir` date NOT NULL,
  `catatan_anggaran` text NOT NULL,
  `anggaran_digunakan` double NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggaran`
--

INSERT INTO `anggaran` (`id_anggaran`, `jumlah_anggaran`, `periode_awal`, `periode_akhir`, `catatan_anggaran`, `anggaran_digunakan`, `email`, `id_kategori`) VALUES
(9, 10000000000, '2023-12-01', '2023-12-31', '', 0, 'ridwan@amikom.id', 8);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `status_kategori` varchar(50) NOT NULL,
  `icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `status_kategori`, `icon`) VALUES
(1, 'Gaji', 'Pemasukan', 'gaji.png'),
(2, 'Pemasukan lainnya', 'Pemasukan', 'pem_lain.png'),
(3, 'Transfer masuk', 'Pemasukan', 'tf_masuk.png'),
(4, 'Asuransi', 'Pengeluaran', 'asuransi.png'),
(5, 'Bayar Bunga', 'Pengeluaran', 'bayar_bunga.png'),
(6, 'Hadiah & Donasi', 'Pengeluaran', 'hadiah.png'),
(7, 'Investasi', 'Pengeluaran', 'investasi.png'),
(8, 'Makanan & Minuman', 'Pengeluaran', 'makan.png'),
(9, 'Pendidikan', 'Pengeluaran', 'pendidikan.png'),
(10, 'Pengeluaran lainnya', 'Pengeluaran', 'peng_lain.png'),
(11, 'Transfer keluar', 'Pengeluaran', 'tf_keluar.png'),
(12, 'Transportasi', 'Pengeluaran', 'transportasi.png'),
(13, 'Tagihan listrik', 'Pengeluaran', 'listrik.png'),
(16, 'Keperluan dapur', 'Pengeluaran', 'dapur.png'),
(17, 'Peralatan rumah', 'Pengeluaran', 'prabotan.png'),
(18, 'Olahraga', 'Pengeluaran', 'olahraga.png');

-- --------------------------------------------------------

--
-- Table structure for table `midtrans`
--

CREATE TABLE `midtrans` (
  `order_id` char(20) NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `transaction_time` varchar(20) NOT NULL,
  `status_code` char(3) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `midtrans`
--

INSERT INTO `midtrans` (`order_id`, `gross_amount`, `payment_type`, `transaction_time`, `status_code`, `email`) VALUES
('120381694', 19000, 'bank_transfer', '2023-11-25 20:27:57', '201', 'aulia@gmail.com'),
('1490725722', 19000, 'bank_transfer', '2023-11-29 21:05:43', '201', 'aulia@gmail.com'),
('1541406315', 19000, 'bank_transfer', '2023-11-28 19:39:36', '201', 'aulia@gmail.com'),
('1617464463', 19000, 'bank_transfer', '2023-11-28 19:50:26', '201', 'aulia@gmail.com'),
('1872123827', 19000, 'bank_transfer', '2023-11-25 20:03:21', '201', 'aulia@gmail.com'),
('2098755174', 19000, 'bank_transfer', '2023-11-27 12:37:55', '201', 'aulia@gmail.com'),
('526717883', 19000, 'bank_transfer', '2023-11-28 19:31:00', '201', 'aulia@gmail.com'),
('679071723', 19000, 'bank_transfer', '2023-11-28 19:11:12', '201', 'aulia@gmail.com'),
('786598426', 19000, 'bank_transfer', '2023-11-30 10:37:39', '201', 'aulia@gmail.com'),
('937900044', 19000, 'bank_transfer', '2023-11-28 19:34:32', '201', 'aulia@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `email` varchar(100) NOT NULL,
  `password` varchar(120) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `no_tlp` varchar(13) DEFAULT NULL,
  `total_saldo` double NOT NULL,
  `status_pengguna` int(1) NOT NULL,
  `batas_langganan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`email`, `password`, `nama_lengkap`, `no_tlp`, `total_saldo`, `status_pengguna`, `batas_langganan`) VALUES
('admin@gmail.com', '$2y$10$useZk.aTeVTLYghEb1SdJOzhWp/Q8eb45lt5h4BPR1xKSpcaX4l5q', 'Admin', NULL, 0, 1, NULL),
('aulia@gmail.com', '$2y$10$adLusFMtPYwDqKQo3W3v8OXwk3ucdW/V7XnIdmsKj6/./kSoFUC52', 'Aulia', NULL, 989986, 1, NULL),
('ridwan@amikom.id', '$2y$10$Ya.f7EtLxCyqsgIgkUgyMOuSyj9l8a4Gfw64EQcpBeDq2gS.l7Xgy', 'Ridhwan Shodiq', '0895392427066', 88043009, 2, '2026-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `jumlah_transaksi` double NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `catatan_transaksi` text NOT NULL,
  `transaksi_dibuat` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `jumlah_transaksi`, `tanggal_transaksi`, `catatan_transaksi`, `transaksi_dibuat`, `email`, `id_kategori`) VALUES
(32, 15000, '2023-11-23', 'Nasi sarden + jamur', 1700744887, 'ridwan@amikom.id', 8),
(33, 13000, '2023-11-23', 'Susu cimori, aqua, dan permen', 1700744920, 'ridwan@amikom.id', 8),
(34, 25000, '2023-11-22', 'pertalite', 1700745011, 'ridwan@amikom.id', 12),
(35, 75000, '2023-11-09', 'Spin dukati', 1700792646, 'ridwan@amikom.id', 10),
(36, 10000, '2023-11-24', 'Topup cilik', 1700792738, 'ridwan@amikom.id', 10),
(37, 100000, '2023-11-27', 'Honor Asisten', 1701059754, 'ridwan@amikom.id', 1),
(38, 100000, '2023-11-27', 'Honor Asisten', 1701059815, 'ridwan@amikom.id', 1),
(39, 18000, '2023-11-27', 'Ayam Gongso + Nutrisari', 1701059885, 'ridwan@amikom.id', 8),
(40, 12000000, '2023-11-27', 'Belli beras', 1701075122, 'ridwan@amikom.id', 16),
(41, 12, '2023-11-28', 'jhgfhj', 1701178238, 'aulia@gmail.com', 7),
(42, 12, '2023-11-28', '123eww', 1701178512, 'aulia@gmail.com', 5),
(43, 16000, '2023-11-29', 'Olive + Parkir', 1701258683, 'ridwan@amikom.id', 8),
(44, 12000, '2023-12-02', 'oke', 1701505299, 'ridwan@amikom.id', 4),
(45, 89, '2023-12-21', 'sdf', 1703160216, 'ridwan@amikom.id', 2),
(46, 120, '2023-12-21', 'hjk', 1703161285, 'ridwan@amikom.id', 2),
(48, 1200, '2023-12-21', 'huj', 1703160725, 'ridwan@amikom.id', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`id_anggaran`),
  ADD KEY `username` (`email`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `midtrans`
--
ALTER TABLE `midtrans`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `username` (`email`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggaran`
--
ALTER TABLE `anggaran`
  MODIFY `id_anggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggaran`
--
ALTER TABLE `anggaran`
  ADD CONSTRAINT `anggaran_ibfk_1` FOREIGN KEY (`email`) REFERENCES `pengguna` (`email`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `anggaran_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `midtrans`
--
ALTER TABLE `midtrans`
  ADD CONSTRAINT `midtrans_ibfk_1` FOREIGN KEY (`email`) REFERENCES `pengguna` (`email`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`email`) REFERENCES `pengguna` (`email`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
