-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2024 at 07:47 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts`
--

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id_transaksi` int NOT NULL,
  `tanggal` datetime NOT NULL,
  `jenis_transaksi` enum('Pemasukan','Pengeluaran') NOT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `jumlah` decimal(15,2) NOT NULL,
  `metode_pembayaran` enum('Tunai','Transfer','Kartu Kredit','E-wallet') NOT NULL,
  `status` enum('Selesai','Pending','Batal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id_transaksi`, `tanggal`, `jenis_transaksi`, `kategori`, `deskripsi`, `jumlah`, `metode_pembayaran`, `status`) VALUES
(1, '2024-11-20 10:00:00', 'Pemasukan', 'Gaji', 'Pemasukan bulanan dari gaji', 5000000.00, 'Transfer', 'Selesai'),
(2, '2024-11-21 12:30:00', 'Pengeluaran', 'Makanan', 'Pembelian makan siang', 150000.00, 'Tunai', 'Selesai'),
(3, '2024-11-22 09:00:00', 'Pengeluaran', 'Transportasi', 'Biaya transportasi harian', 100000.00, 'E-wallet', 'Pending'),
(4, '2024-11-24 00:00:00', 'Pemasukan', 'Transfer', 'Gaji saya', 10000000.00, 'Transfer', 'Selesai'),
(5, '2024-11-18 00:00:00', 'Pemasukan', 'Lainnya', 'TPS', 10000000.00, 'Transfer', 'Selesai'),
(6, '2024-11-25 00:00:00', 'Pengeluaran', 'Makanan', 'Beli Burger', 20000.00, 'Transfer', 'Batal'),
(7, '2024-11-25 00:00:00', 'Pengeluaran', 'Belanja', 'Beli baju 100 pcs buat nanti lebaran', 1000000.00, 'Tunai', 'Selesai'),
(8, '2024-11-05 00:00:00', 'Pemasukan', 'Gaji', 'Gajian boss', 1000000.00, 'Transfer', 'Selesai'),
(9, '2024-10-14 00:00:00', 'Pengeluaran', 'Lainnya', 'Belo mobil', 200000000.00, 'Tunai', 'Batal'),
(10, '2024-02-12 00:00:00', 'Pengeluaran', 'Lainnya', 'Beli motor', 28000000.00, 'Tunai', 'Batal'),
(11, '2024-11-04 00:00:00', 'Pengeluaran', 'Lainnya', 'Beli helikopter', 2000000000.00, 'Tunai', 'Batal'),
(12, '2024-11-07 00:00:00', 'Pemasukan', 'Lainnya', 'Ada yang tf', 10000.00, 'E-wallet', 'Pending'),
(13, '2024-11-19 00:00:00', 'Pengeluaran', 'Belanja', 'Belanja', 100000.00, 'Tunai', 'Batal'),
(14, '2024-11-13 00:00:00', 'Pengeluaran', 'Makanan', 'Makan', 10000.00, 'E-wallet', 'Batal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
