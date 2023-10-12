-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 04:50 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peternakan`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `kode_produk` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subharga` float(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `username`, `kode_produk`, `jumlah`, `subharga`) VALUES
(1, 'bangjago', 'X0002', 3, 45000000.00),
(2, 'bangjago', 'X0003', 1, 30000000.00),
(3, 'bangjago', 'X0002', 2, 30000000.00),
(4, 'bangjago', 'X0003', 1, 30000000.00),
(5, 'bangjago', 'X0003', 2, 60000000.00),
(6, 'bangjago', 'X0002', 1, 15000000.00);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kode_produk` char(5) NOT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `deskripsi_produk` text DEFAULT NULL,
  `kategori_produk` varchar(255) DEFAULT NULL,
  `harga_produk` float(12,2) DEFAULT NULL,
  `stok_produk` int(11) NOT NULL,
  `gambar_produk` varchar(255) DEFAULT NULL,
  `penjual` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kode_produk`, `nama_produk`, `deskripsi_produk`, `kategori_produk`, `harga_produk`, `stok_produk`, `gambar_produk`, `penjual`) VALUES
('X0002', 'Kambing >7 thn 120kg btn', 'Kambing >7 thn \r\nberat 120kg \r\nbetina', 'Kambing', 15000000.00, 47, 'upload/kambing.jpg', 'bangjago'),
('X0003', 'Sapi >10 thn 970kg btn', 'Sapi >10 thn berat >970kg betina\r\n                                ', 'Sapi', 30000000.00, 97, 'upload/sapi.jpg', 'bangjago');

-- --------------------------------------------------------

--
-- Table structure for table `user_pembeli`
--

CREATE TABLE `user_pembeli` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_identitas` varchar(255) DEFAULT NULL,
  `no_ponsel` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_pembeli`
--

INSERT INTO `user_pembeli` (`username`, `password`, `nama_lengkap`, `email`, `no_identitas`, `no_ponsel`, `alamat`, `foto`) VALUES
('bangjago', '81dc9bdb52d04dc20036dbd8313ed055', 'Abang Jago', 'bangjago@gmail.com', 'AF672CX', '081281823', 'Bandung', 'upload/seminar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_penjual`
--

CREATE TABLE `user_penjual` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `no_identitas` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_ponsel` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_penjual`
--

INSERT INTO `user_penjual` (`username`, `password`, `no_identitas`, `nama_lengkap`, `email`, `no_ponsel`, `alamat`, `foto`) VALUES
('bangjago', '81dc9bdb52d04dc20036dbd8313ed055', 'AF672CX', 'Abang Jago', 'bangjago@gmail.com', '0821111', 'Oke', 'upload/SubScribe Arah Pemuda.PNG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode_produk`),
  ADD KEY `penjual` (`penjual`);

--
-- Indexes for table `user_pembeli`
--
ALTER TABLE `user_pembeli`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `user_penjual`
--
ALTER TABLE `user_penjual`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user_pembeli` (`username`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`kode_produk`) REFERENCES `produk` (`kode_produk`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`penjual`) REFERENCES `user_penjual` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
