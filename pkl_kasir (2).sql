-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2024 at 02:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` text NOT NULL,
  `kode_kategori` varchar(10) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `kode_kategori`, `harga_beli`, `harga_jual`, `stok`) VALUES
('BR00000001', 'Jeruk Medan (1 Kg)', 'KT00000005', 13000, 20000, 20),
('BR00000002', 'Apel Korea', 'KT00000005', 83000, 90000, 15),
('BR00000003', 'Tomat (1 Kg)', 'KT00000004', 8000, 16000, 5),
('BR00000004', 'Paket bumbu dapur (Soto-Ayam)', 'KT00000002', 5500, 8500, 30),
('BR00000005', 'Paket bumbu dapur (Nasi Liwet)', 'KT00000002', 7500, 12500, 30),
('BR00000006', 'Indomie Soto Ayam', 'KT00000003', 3000, 3500, 50),
('BR00000007', 'Roma Sari Gandum Coklat (Isi 4)', 'KT00000001', 2000, 2500, 40),
('BR00000008', 'Indomie Goreng', 'KT00000006', 3000, 3500, 64);

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `no_transaksi` varchar(10) NOT NULL,
  `tanggal` datetime NOT NULL,
  `jenis_pembayaran` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`no_transaksi`, `tanggal`, `jenis_pembayaran`, `jumlah`) VALUES
('TR00000001', '2024-04-01 00:00:00', 'belum', 0),
('TR00000002', '2024-04-01 00:00:00', 'belum', 0),
('TR00000003', '2024-04-02 00:00:00', 'belum', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `kode` int(11) NOT NULL,
  `nama_akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`kode`, `nama_akses`) VALUES
(1, 'owner'),
(2, 'admin'),
(3, 'operator');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kode_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `nama_kategori`) VALUES
('KT00000001', 'Makanan Ringan'),
('KT00000002', 'Bumbu Dapur'),
('KT00000003', 'Makanan Siap Saji'),
('KT00000004', 'Sayuran'),
('KT00000005', 'Buah-buahan'),
('KT00000006', 'Mie dan Pasta');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `kode_operator` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `hak_akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`kode_operator`, `nama`, `alamat`, `no_hp`, `username`, `password`, `hak_akses`) VALUES
('OP00000001', 'Faiz Sutejo', 'Ngawi Jatim', '081234567890', 'admin', '0000', 'admin'),
('OP00000002', 'Owner', 'Surabaya', '08134567890', 'owner', '0000', 'owner'),
('OP00000003', 'Operator', 'Malang', '085234567890', 'operator', '0000', 'operator'),
('OP00000004', 'Rizal Sukses Sumarno', 'Nginden', '081234567890', 'Rizal', '0000', 'operator');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kode_pelanggan` varchar(10) NOT NULL,
  `nama_pelanggan` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kode_pelanggan`, `nama_pelanggan`, `alamat`, `no_hp`) VALUES
('PL00000001', 'agus', 'sukabumi', '081279473758'),
('PL00000002', 'Cahyono', 'Bogor', '081279473758');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` varchar(10) NOT NULL,
  `tanggal` datetime NOT NULL,
  `kode_operator` varchar(10) NOT NULL,
  `kode_pelanggan` varchar(10) NOT NULL,
  `grandtotal` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no_transaksi`, `tanggal`, `kode_operator`, `kode_pelanggan`, `grandtotal`, `jumlah_bayar`) VALUES
('TR00000001', '2024-04-01 00:00:00', 'OP00000001', 'PL00000001', 35000, 0),
('TR00000002', '2024-04-01 00:00:00', 'OP00000001', 'PL00000002', 130000, 0),
('TR00000003', '2024-04-02 00:00:00', 'OP00000001', 'PL00000002', 90000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `no_transaksi` varchar(10) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`no_transaksi`, `kode_barang`, `harga_beli`, `harga_jual`, `jumlah`, `subtotal`) VALUES
('TR00000001', 'BR00000008', 3000, 3500, 5, 17500),
('TR00000001', 'BR00000006', 3000, 3500, 5, 17500),
('TR00000002', 'BR00000001', 13000, 20000, 2, 40000),
('TR00000002', 'BR00000002', 83000, 90000, 1, 90000),
('TR00000003', 'BR00000002', 83000, 90000, 1, 90000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_tmp`
--

CREATE TABLE `transaksi_tmp` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(10) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `kode_operator` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `kode_kategori` (`kode_kategori`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`kode_operator`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `kode_operator` (`kode_operator`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `no_transaksi` (`no_transaksi`);

--
-- Indexes for table `transaksi_tmp`
--
ALTER TABLE `transaksi_tmp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi_tmp`
--
ALTER TABLE `transaksi_tmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kode_kategori`) REFERENCES `kategori` (`kode_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`kode_operator`) REFERENCES `operator` (`kode_operator`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_ibfk_1` FOREIGN KEY (`no_transaksi`) REFERENCES `transaksi` (`no_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_detail_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
