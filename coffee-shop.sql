-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2022 at 02:44 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesan`
--

CREATE TABLE `detail_pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_pesanan_index` int(11) NOT NULL,
  `id_masakan` int(11) NOT NULL,
  `nama_masakan` varchar(255) NOT NULL,
  `jumlah_pesanan` varchar(255) NOT NULL,
  `jumlah_harga` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pesan`
--

INSERT INTO `detail_pesan` (`id_pesan`, `id_pesanan_index`, `id_masakan`, `nama_masakan`, `jumlah_pesanan`, `jumlah_harga`, `keterangan`) VALUES
(1, 2, 1, 'White Coffee', '1', '4000', ''),
(2, 2, 5, 'Spageti', '1', '10000', ''),
(3, 5, 8, 'Burger', '1', '10000', ''),
(4, 5, 7, 'Es Susu', '1', '4000', ''),
(5, 5, 4, 'Chiken Steak', '1', '10000', ''),
(6, 5, 2, 'Kopi hitam', '1', '3000', ''),
(7, 4, 4, 'Chiken Steak', '1', '10000', ''),
(9, 6, 8, 'Burger', '1', '10000', ''),
(10, 6, 6, 'Es teh', '1', '3000', ''),
(11, 1, 1, 'White Coffee', '1', '4000', ''),
(12, 1, 8, 'Burger', '1', '10000', ''),
(13, 1, 4, 'Chiken Steak', '1', '10000', ''),
(14, 1, 6, 'Es teh', '1', '3000', ''),
(15, 3, 6, 'Es teh', '1', '3000', ''),
(16, 3, 4, 'Chiken Steak', '1', '10000', ''),
(17, 3, 8, 'Burger', '1', '10000', ''),
(18, 4, 6, 'Es teh', '1', '3000', ''),
(19, 4, 8, 'Burger', '1', '10000', ''),
(20, 4, 4, 'Chiken Steak', '1', '10000', '');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `nama`) VALUES
(1, 'Admin'),
(2, 'kasir'),
(3, 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id_log` int(11) NOT NULL,
  `log_user` varchar(255) NOT NULL,
  `log_tipe` int(11) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `log_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id_log`, `log_user`, `log_tipe`, `log_time`, `log_desc`) VALUES
(1, 'Admin', 1, '2022-03-31 07:04:32', 'logout'),
(2, 'manager', 0, '2022-03-31 07:04:40', 'telah login'),
(3, 'manager', 1, '2022-03-31 07:05:48', 'logout'),
(4, 'kasir', 0, '2022-03-31 07:05:54', 'telah login'),
(5, 'kasir', 2, '2022-03-31 07:06:14', 'menambahkan pesanan baru'),
(6, 'kasir', 2, '2022-03-31 07:07:30', 'menyimpan transaksi'),
(7, 'kasir', 1, '2022-03-31 07:08:09', 'logout'),
(8, 'manager', 0, '2022-03-31 07:08:17', 'telah login'),
(9, 'manager', 1, '2022-03-31 07:10:07', 'logout'),
(10, 'Admin', 0, '2022-04-02 00:11:19', 'telah login'),
(11, 'Admin', 2, '2022-04-02 00:12:08', 'menyimpan transaksi'),
(12, 'Admin', 2, '2022-04-02 00:12:38', 'menyimpan transaksi'),
(13, 'Admin', 0, '2022-04-03 00:04:48', 'telah login'),
(14, 'Admin', 1, '2022-04-03 00:07:56', 'logout'),
(15, 'kasir', 0, '2022-04-03 00:08:06', 'telah login'),
(16, 'kasir', 2, '2022-04-03 00:10:02', 'menambahkan pesanan baru'),
(17, 'kasir', 2, '2022-04-03 00:10:20', 'menambahkan pesanan baru'),
(18, 'kasir', 2, '2022-04-03 00:11:40', 'menyimpan transaksi'),
(19, 'kasir', 1, '2022-04-03 00:17:02', 'logout'),
(20, 'manager', 0, '2022-04-03 00:17:12', 'telah login'),
(21, 'manager', 1, '2022-04-03 00:37:02', 'logout');

-- --------------------------------------------------------

--
-- Table structure for table `masakan`
--

CREATE TABLE `masakan` (
  `id_masakan` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `nama_masakan` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `status_masakan` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masakan`
--

INSERT INTO `masakan` (`id_masakan`, `image`, `nama_masakan`, `harga`, `status_masakan`) VALUES
(1, 'white coffee.jpg', 'White Coffee', '4000', '1'),
(2, 'black coffee.jpg', 'Kopi hitam', '3000', '1'),
(4, 'chiken steak.jpg', 'Chiken Steak', '10000', '1'),
(5, 'spageti.jpg', 'Spageti', '10000', '1'),
(6, 'es teh.jpg', 'Es teh', '3000', '1'),
(7, 'es susu.jpg', 'Es Susu', '4000', '1'),
(8, 'burger.jpg', 'Burger', '10000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `id_meja` int(11) NOT NULL,
  `no_meja` varchar(255) NOT NULL,
  `kapasitas` varchar(255) NOT NULL,
  `status_meja` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id_meja`, `no_meja`, `kapasitas`, `status_meja`) VALUES
(1, '1', '6', 1),
(2, '2', '6', 1),
(3, '3', '6', 1),
(4, '4', '6', 1),
(5, '5', '6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `id_meja` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_pesanan` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `customer`, `id_meja`, `tanggal`, `id_user`, `status_pesanan`) VALUES
(1, 'Said murtadha', '1', '2022-03-30', 1, '1'),
(2, 'Nuril', '2', '2022-03-30', 2, '1'),
(3, 'Antik', '1', '2022-03-30', 1, '1'),
(4, 'Sayyid Syafiq A.A', '3', '2022-03-30', 2, '1'),
(5, 'Luthfi', '1', '2022-03-30', 2, '1'),
(6, 'Iqbal', '2', '2022-03-31', 2, '1'),
(7, 'Alif', '2', '2022-04-03', 2, '0'),
(8, 'Riski', '3', '2022-04-03', 2, '0');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pesanan_index2` int(11) NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uang` varchar(50) NOT NULL,
  `total_bayar` varchar(40) NOT NULL,
  `kembalian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `id_pesanan_index2`, `tanggal_transaksi`, `uang`, `total_bayar`, `kembalian`) VALUES
(1, 2, 2, '2022-03-29 17:00:00', '50000', '14000', '36000'),
(2, 2, 5, '2022-03-29 17:00:00', '100000', '27000', '73000'),
(3, 2, 6, '2022-03-30 17:00:00', '50000', '13000', '37000'),
(4, 1, 1, '2022-03-29 17:00:00', '50000', '27000', '23000'),
(5, 1, 3, '2022-03-29 17:00:00', '50000', '23000', '27000'),
(6, 2, 4, '2022-03-29 17:00:00', '40000', '33000', '7000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `id_level`) VALUES
(1, 'Admin', 'Admin', 'Admin', 1),
(2, 'kasir', 'kasir', 'kasir', 2),
(3, 'manager', 'manager', 'manager', 3),
(4, 'sayyid', 'sayyid', 'sayyid', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesan`
--
ALTER TABLE `detail_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `masakan`
--
ALTER TABLE `masakan`
  ADD PRIMARY KEY (`id_masakan`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pesan`
--
ALTER TABLE `detail_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `masakan`
--
ALTER TABLE `masakan`
  MODIFY `id_masakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
