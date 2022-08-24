-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2022 at 04:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ptkami`
--

-- --------------------------------------------------------

--
-- Table structure for table `ptkami`
--

CREATE TABLE `ptkami` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `noPeg` varchar(12) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `direktorat` varchar(255) NOT NULL,
  `agama` enum('Hindu','Buddha','Islam','Konghucu','Protestan','Katolik') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ptkami`
--

INSERT INTO `ptkami` (`id`, `nama`, `noPeg`, `jenis_kelamin`, `direktorat`, `agama`) VALUES
(1, 'pegawai1', '100001', 'Laki-Laki', 'Utama', 'Islam'),
(2, 'Pegawai2', '100011', 'Laki-Laki', 'Keuangan', 'Islam'),
(3, 'Pegawai3', '100012', 'Perempuan', 'Keuangan', 'Katolik'),
(4, 'Pegawai4', '100013', 'Laki-Laki', 'Development', 'Protestan'),
(6, 'Pegawai5', '100014', 'Laki-Laki', 'Development', 'Hindu');

-- --------------------------------------------------------

--
-- Table structure for table `ref_log`
--

CREATE TABLE `ref_log` (
  `noPeg` int(11) NOT NULL,
  `tglMasuk` date NOT NULL,
  `tglKeluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_log`
--

INSERT INTO `ref_log` (`noPeg`, `tglMasuk`, `tglKeluar`) VALUES
(1, '2022-08-02', '2022-08-04'),
(2, '2022-08-01', '2022-08-17'),
(3, '2022-08-04', '2022-08-07'),
(4, '2022-08-14', '2022-08-23'),
(6, '2022-08-18', '2022-08-20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `direktorat` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_gaji`
--

INSERT INTO `tb_gaji` (`direktorat`, `nominal`) VALUES
('Development', 7000000),
('Keuangan', 5000000),
('Utama', 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `noPeg` int(11) NOT NULL,
  `namaLengkap` varchar(250) NOT NULL,
  `nomorWA` int(11) NOT NULL,
  `alamat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`noPeg`, `namaLengkap`, `nomorWA`, `alamat`) VALUES
(1, 'PegawaiSatu', 855555555, 'Tegal'),
(2, 'Pegawaidua', 877777777, 'Brebes'),
(3, 'Pegawaitiga', 855324234, 'Pemalang'),
(4, 'Pegawaiempat', 877734341, 'Tegal'),
(6, 'Pegawailima', 855342334, 'Tegal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ptkami`
--
ALTER TABLE `ptkami`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `noPeg_unique` (`noPeg`),
  ADD KEY `noPeg` (`noPeg`),
  ADD KEY `direktorat` (`direktorat`);

--
-- Indexes for table `ref_log`
--
ALTER TABLE `ref_log`
  ADD UNIQUE KEY `noPeg` (`noPeg`),
  ADD KEY `noPeg_2` (`noPeg`);

--
-- Indexes for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD UNIQUE KEY `direktorat` (`direktorat`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD UNIQUE KEY `noPeg` (`noPeg`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ptkami`
--
ALTER TABLE `ptkami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ref_log`
--
ALTER TABLE `ref_log`
  ADD CONSTRAINT `ref_log_ibfk_1` FOREIGN KEY (`noPeg`) REFERENCES `ptkami` (`id`);

--
-- Constraints for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD CONSTRAINT `tb_gaji_ibfk_1` FOREIGN KEY (`direktorat`) REFERENCES `ptkami` (`direktorat`);

--
-- Constraints for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD CONSTRAINT `tb_pegawai_ibfk_1` FOREIGN KEY (`noPeg`) REFERENCES `ptkami` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
