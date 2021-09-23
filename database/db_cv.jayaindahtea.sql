-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2021 at 01:40 PM
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
('PK-210909-001', 'PEKO', 'CV. One', 90, 15000),
('PK-210915-001', 'PEKO', 'CV. One', 90, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kas`
--

CREATE TABLE `tb_kas` (
  `id_kas` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `id_pemasukan` varchar(50) DEFAULT NULL,
  `id_pengeluaran` varchar(50) DEFAULT NULL,
  `nominal_pemasukan` bigint(20) DEFAULT NULL,
  `nominal_pengeluaran` bigint(20) NOT NULL,
  `saldo` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_pemasukan`
--

CREATE TABLE `tb_kategori_pemasukan` (
  `id_kategori` varchar(50) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori_pemasukan`
--

INSERT INTO `tb_kategori_pemasukan` (`id_kategori`, `nama_kategori`) VALUES
('K-PM-001', 'Penjualan Produk'),
('K-PM-002', 'Penanaman Modal');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_pengeluaran`
--

CREATE TABLE `tb_kategori_pengeluaran` (
  `id_kategori` varchar(50) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori_pengeluaran`
--

INSERT INTO `tb_kategori_pengeluaran` (`id_kategori`, `nama_kategori`) VALUES
('K-PK-001', 'Pembelian Bahan Baku'),
('K-PK-002', 'Biaya Telepon'),
('K-PK-003', 'Biaya Alat Tulis Kantor'),
('K-PK-004', 'Biaya Pengeringan'),
('K-PK-005', 'Biaya Transportasi'),
('K-PK-006', 'Biaya Gaji'),
('K-PK-007', 'Biaya Listrik dan Air');

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `id_laporan` varchar(50) DEFAULT NULL,
  `uraian` varchar(50) DEFAULT NULL,
  `nominal` bigint(20) DEFAULT NULL,
  `periode` varchar(50) DEFAULT NULL,
  `petugas_admin` varchar(50) DEFAULT NULL,
  `penyetuju` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_laporan`
--

INSERT INTO `tb_laporan` (`id_laporan`, `uraian`, `nominal`, `periode`, `petugas_admin`, `penyetuju`) VALUES
('LP-210923-001', NULL, NULL, ' 2021-09', 'Nadia Dwi Puji Lestari', NULL);

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
  `nama_produk` varchar(50) DEFAULT NULL,
  `kategori_pemasukan` varchar(50) NOT NULL,
  `tujuan_kirim` varchar(50) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `harga_per_kg` bigint(20) DEFAULT NULL,
  `nominal_pemasukan` bigint(20) NOT NULL,
  `keterangan` varchar(150) DEFAULT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pemasukan`
--

INSERT INTO `tb_pemasukan` (`id_pemasukan`, `nama_produk`, `kategori_pemasukan`, `tujuan_kirim`, `berat`, `harga_per_kg`, `nominal_pemasukan`, `keterangan`, `nama_pegawai`, `created_at`, `updated_at`) VALUES
('PM-210921-001', 'Puder', 'Penjualan Produk', 'CV. one', 1200, 17000, 20400000, NULL, 'Nadia Dwi Puji Lestari', '2021-09-21 05:32:38', NULL),
('PM-210921-002', 'Cunmi 1', 'Penjualan Produk', 'CV. one', 90, 17000, 1530000, NULL, 'Nadia Dwi Puji Lestari', '2021-09-21 14:39:33', NULL),
('PM-210921-003', NULL, 'Penanaman Modal', NULL, NULL, NULL, 1000000, 'Tes', 'Nadia Dwi Puji Lestari', '2021-09-21 14:45:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengeluaran`
--

CREATE TABLE `tb_pengeluaran` (
  `id_pengeluaran` varchar(50) NOT NULL,
  `kategori_pengeluaran` varchar(50) NOT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `asal_kirim` varchar(50) DEFAULT NULL,
  `berat` bigint(20) DEFAULT NULL,
  `harga_per_kg` int(11) DEFAULT NULL,
  `nominal_pengeluaran` bigint(20) NOT NULL,
  `keterangan` varchar(150) DEFAULT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengeluaran`
--

INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `kategori_pengeluaran`, `nama_barang`, `asal_kirim`, `berat`, `harga_per_kg`, `nominal_pengeluaran`, `keterangan`, `nama_pegawai`, `created_at`, `updated_at`) VALUES
('PK-210922-001', 'Pembelian Bahan Baku', 'PEKO', 'CV. One', 90, 15000, 1350000, NULL, 'Nadia Dwi Puji Lestari', '2021-09-22 03:55:39', NULL);

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
('PD-001', 'Puder', 'http://localhost/CV.JayaIndahTea/assets/images/products/Dust,_Puder.jpg', '2021-08-25 09:31:16', '2021-09-10 09:00:39'),
('PD-002', 'Cunmi 1', 'http://localhost/CV.JayaIndahTea/assets/images/products/Cunmi_1.jpg', '2021-08-25 06:54:27', '2021-09-10 09:00:48'),
('PD-003', 'Cunmi 2', 'http://localhost/CV.JayaIndahTea/assets/images/products/Cunmi_2.jpg', '2021-08-25 09:31:16', '2021-09-10 09:01:00'),
('PD-004', 'Peko Super 1', 'http://localhost/CV.JayaIndahTea/assets/images/products/Peko_Super_1.jpg', '2021-08-25 09:31:16', '2021-09-10 09:01:10'),
('PD-005', 'Peko Super 2', 'http://localhost/CV.JayaIndahTea/assets/images/products/Peko_Super_2.jpg', '2021-08-25 09:31:16', '2021-09-10 09:01:21'),
('PD-006', 'BT', 'http://localhost/CV.JayaIndahTea/assets/images/products/BT.jpg', '2021-08-25 09:31:16', '2021-09-10 09:01:32'),
('PD-007', 'Paning', 'http://localhost/CV.JayaIndahTea/assets/images/products/Paning.jpg', '2021-08-25 09:31:16', '2021-09-10 09:01:41'),
('PD-008', 'Dust', 'http://localhost/CV.JayaIndahTea/assets/images/products/Dust,_Puder1.jpg', '2021-08-25 09:31:16', '2021-09-10 09:01:51');

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
-- Indexes for table `tb_kas`
--
ALTER TABLE `tb_kas`
  ADD PRIMARY KEY (`id_kas`),
  ADD UNIQUE KEY `id_pengeluaran` (`id_pengeluaran`);

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
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD CONSTRAINT `tb_users_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
