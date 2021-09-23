-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2021 at 03:16 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cv.jayaindahtea`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_laporan`
--

CREATE TABLE `tb_detail_laporan` (
  `id_laporan` varchar(50) NOT NULL,
  `penjualan_produk` bigint(20) NOT NULL,
  `pembelian_bahan_baku` bigint(20) NOT NULL,
  `biaya_gaji` bigint(20) NOT NULL,
  `biaya_listrik_air` bigint(20) NOT NULL,
  `biaya_transportasi` bigint(20) NOT NULL,
  `biaya_telepon` bigint(20) NOT NULL,
  `biaya_atk` bigint(20) NOT NULL,
  `biaya_pengeringan` bigint(20) NOT NULL,
  `total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_pembelian`
--

CREATE TABLE `tb_detail_pembelian` (
  `id_pengeluaran` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `asal_kirim` varchar(50) NOT NULL,
  `berat` bigint(20) NOT NULL,
  `harga_per_kg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail_pembelian`
--

INSERT INTO `tb_detail_pembelian` (`id_pengeluaran`, `nama_barang`, `asal_kirim`, `berat`, `harga_per_kg`) VALUES
('PK-210909-001', 'PEKO', 'CV. One', 90, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kas`
--

CREATE TABLE `tb_kas` (
  `id_kas` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `id_pemasukan` varchar(50) DEFAULT NULL,
  `id_pengeluaran` varchar(50) DEFAULT NULL,
  `jenis_pemasukan` varchar(50) NOT NULL,
  `jenis_pengeluaran` varchar(50) NOT NULL,
  `nominal_pemasukan` bigint(20) DEFAULT NULL,
  `nominal_pengeluaran` bigint(20) NOT NULL,
  `saldo` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kas`
--

INSERT INTO `tb_kas` (`id_kas`, `tanggal`, `id_pemasukan`, `id_pengeluaran`, `jenis_pemasukan`, `jenis_pengeluaran`, `nominal_pemasukan`, `nominal_pengeluaran`, `saldo`) VALUES
(54, '2021-09-09', 'PM-210909-001', NULL, 'Penjualan Produk', '', 20400000, 0, 20400000),
(55, '2021-09-09', NULL, 'PK-210909-001', '', 'Pembelian Bahan Baku', NULL, 1350000, 19050000),
(56, '2021-09-09', NULL, 'PK-210909-002', '', 'Biaya Pengeringan', NULL, 1000000, 18050000),
(57, '2021-09-09', 'PM-210909-002', NULL, 'Penjualan Produk', '', 1350000, 0, 19400000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `id_laporan` varchar(50) NOT NULL,
  `jenis_periode` varchar(50) NOT NULL,
  `periode` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `petugas_admin` varchar(50) NOT NULL,
  `penyetuju` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` varchar(50) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_tlp` bigint(12) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nama_pegawai`, `jabatan`, `alamat`, `no_tlp`, `created_at`, `updated_at`) VALUES
('PG001', 'Nadia Dwi Puji Lestari', 'Asisten Administrasi', 'Bandung', 82214567363, '2021-08-28 14:18:30', NULL),
('PG002', 'Muhamad Faisal', 'Direktur', 'Bandung', 82214567366, '2021-08-28 14:18:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemasukan`
--

CREATE TABLE `tb_pemasukan` (
  `id_pemasukan` varchar(50) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `jenis_pemasukan` varchar(50) NOT NULL,
  `tujuan_kirim` varchar(50) NOT NULL,
  `berat` int(11) NOT NULL,
  `harga_per_kg` bigint(20) NOT NULL,
  `nominal_pemasukan` bigint(20) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pemasukan`
--

INSERT INTO `tb_pemasukan` (`id_pemasukan`, `nama_produk`, `jenis_pemasukan`, `tujuan_kirim`, `berat`, `harga_per_kg`, `nominal_pemasukan`, `nama_pegawai`, `created_at`, `updated_at`) VALUES
('PM-210909-001', 'BT', 'Penjualan Produk', 'PT.  Cakra', 1200, 17000, 20400000, 'Nadia Dwi Puji Lestari', '2021-09-09 11:56:03', NULL),
('PM-210909-002', 'Dust', 'Penjualan Produk', 'PT.  Cakra', 90, 15000, 1350000, 'Nadia Dwi Puji Lestari', '2021-09-09 12:03:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengeluaran`
--

CREATE TABLE `tb_pengeluaran` (
  `id_pengeluaran` varchar(50) NOT NULL,
  `jenis_pengeluaran` varchar(50) NOT NULL,
  `nominal_pengeluaran` bigint(20) NOT NULL,
  `keterangan_lainnya` varchar(150) DEFAULT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengeluaran`
--

INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `nominal_pengeluaran`, `keterangan_lainnya`, `nama_pegawai`, `created_at`, `updated_at`) VALUES
('PK-210909-001', 'Pembelian Bahan Baku', 1350000, 'PEKO', 'Nadia Dwi Puji Lestari', '2021-09-09 06:59:42', NULL),
('PK-210909-002', 'Biaya Pengeringan', 1000000, 'Kayu Bakar 100 batang', 'Nadia Dwi Puji Lestari', '2021-09-09 07:00:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `foto_produk` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `foto_produk`, `created_at`, `updated_at`) VALUES
('PD001', 'Puder', 'http://localhost/CV.JayaIndahTea/assets/images/products/Dust,_Puder.jpg', '2021-08-25 09:31:16', '2021-09-08 14:16:55'),
('PD002', 'Cunmi 1', 'http://localhost/CV.JayaIndahTea/assets/images/products/Cunmi_11.jpg', '2021-08-25 06:54:27', '2021-09-08 14:18:05'),
('PD003', 'Cunmi 2', 'http://localhost/CV.JayaIndahTea/assets/images/products/Cunmi_2.jpg', '2021-08-25 09:31:16', '2021-09-08 14:17:34'),
('PD004', 'Peko Super 1', 'http://localhost/CV.JayaIndahTea/assets/images/products/Peko_Super_1.jpg', '2021-08-25 09:31:16', '2021-09-08 14:18:31'),
('PD005', 'Peko Super 2', 'http://localhost/CV.JayaIndahTea/assets/images/products/Peko_Super_2.jpg', '2021-08-25 09:31:16', '2021-09-08 14:19:24'),
('PD006', 'BT', 'http://localhost/CV.JayaIndahTea/assets/images/products/BT.jpg', '2021-08-25 09:31:16', '2021-09-08 14:27:45'),
('PD007', 'Paning', 'http://localhost/CV.JayaIndahTea/assets/images/products/Paning.jpg', '2021-08-25 09:31:16', '2021-09-08 14:27:55'),
('PD008', 'Dust', 'http://localhost/CV.JayaIndahTea/assets/images/products/Dust,_Puder1.jpg', '2021-08-25 09:31:16', '2021-09-08 14:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_users` int(11) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak_akses` varchar(50) NOT NULL,
  `pass_foto` text NOT NULL,
  `qr_code_ttd` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_users`, `id_pegawai`, `nama_pegawai`, `email`, `password`, `hak_akses`, `pass_foto`, `qr_code_ttd`, `created_at`, `updated_at`) VALUES
(1, 'PG001', 'Nadia Dwi Puji Lestari', 'nadhia430@gmail.com', 'njonghyun', 'Admin', '', '', '2021-08-28 14:15:04', '2021-07-19 06:20:00'),
(2, 'PG002', 'Muhamad Faisal', 'faisal123@gmail.com', 'faisal123', 'Direktur', '', '', '2021-08-28 14:18:57', '2021-07-22 05:55:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_laporan`
--
ALTER TABLE `tb_detail_laporan`
  ADD UNIQUE KEY `id_laporan` (`id_laporan`);

--
-- Indexes for table `tb_kas`
--
ALTER TABLE `tb_kas`
  ADD PRIMARY KEY (`id_kas`),
  ADD UNIQUE KEY `id_pemasukan` (`id_pemasukan`),
  ADD UNIQUE KEY `id_pengeluaran` (`id_pengeluaran`);

--
-- Indexes for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tb_pemasukan`
--
ALTER TABLE `tb_pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indexes for table `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kas`
--
ALTER TABLE `tb_kas`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_laporan`
--
ALTER TABLE `tb_detail_laporan`
  ADD CONSTRAINT `tb_detail_laporan_ibfk_1` FOREIGN KEY (`id_laporan`) REFERENCES `tb_laporan` (`id_laporan`);

--
-- Constraints for table `tb_kas`
--
ALTER TABLE `tb_kas`
  ADD CONSTRAINT `tb_kas_ibfk_1` FOREIGN KEY (`id_pemasukan`) REFERENCES `tb_pemasukan` (`id_pemasukan`),
  ADD CONSTRAINT `tb_kas_ibfk_2` FOREIGN KEY (`id_pengeluaran`) REFERENCES `tb_pengeluaran` (`id_pengeluaran`);

--
-- Constraints for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD CONSTRAINT `tb_users_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
