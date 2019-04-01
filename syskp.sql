-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01 Apr 2019 pada 08.32
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `syskp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bimbingan`
--

CREATE TABLE IF NOT EXISTS `bimbingan` (
  `id` int(11) NOT NULL,
  `nrp` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `judulKp` varchar(50) NOT NULL,
  `pembimbingPrshn` varchar(50) NOT NULL,
  `pembimbingDsn` varchar(50) NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` enum('Y','N') DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `bimbingan`
--

INSERT INTO `bimbingan` (`id`, `nrp`, `nama`, `judulKp`, `pembimbingPrshn`, `pembimbingDsn`, `createAt`, `active`) VALUES
(1, 0, '', '', '', '', '2019-03-17 05:30:24', 'N'),
(2, 1, '2', '', '5', '6', '2019-03-18 04:23:05', 'N'),
(4, 123, '', '', '', '', '2019-03-18 04:43:24', 'N'),
(5, 12, '12', '12', '12', '12', '2019-03-22 07:59:23', 'N'),
(6, 1, '2', '1', '1', '1', '2019-03-23 12:41:42', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `id` int(11) NOT NULL,
  `nrp` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `noHp` int(11) NOT NULL,
  `tanggalDftr` date NOT NULL,
  `tempatUslnKp` varchar(11) NOT NULL,
  `tahunAjrn` varchar(20) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` enum('Y','N') DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `nrp`, `nama`, `noHp`, `tanggalDftr`, `tempatUslnKp`, `tahunAjrn`, `semester`, `createAt`, `active`) VALUES
(1, 123, 'fitri', 877123, '0000-00-00', '0', '', '', '2019-03-17 04:02:21', 'N'),
(2, 0, '', 0, '0000-00-00', '0', '', '', '2019-03-17 05:17:48', 'N'),
(3, 3, '1', 1, '0000-00-00', '0', '', '', '2019-03-23 13:31:36', 'N'),
(4, 1, '1', 1, '0000-00-00', '0', '', '', '2019-03-25 04:26:38', 'N'),
(5, 0, '1', 11, '0000-00-00', '2', '2', '2', '2019-04-01 03:33:36', 'N'),
(6, 2, '2', 2, '0000-00-00', '2', '2', '2', '2019-04-01 03:33:56', 'N'),
(7, 2131, '12134f42vg35f34tdc', 23131, '0000-00-00', '12312', '12412', '412412', '2019-04-01 03:35:45', 'N'),
(8, 123, 'gibran', 2147483647, '2019-04-01', 'Konoha', '123', 'Ganjil', '2019-04-01 03:48:01', 'N'),
(9, 1, '1', 1, '2019-03-23', '1', '1', '1', '2019-04-01 03:59:43', 'N'),
(10, 1, '1', 1, '2019-04-01', '1', '1', 'Genap', '2019-04-01 04:48:22', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerjapraktek`
--

CREATE TABLE IF NOT EXISTS `kerjapraktek` (
  `idKp` int(11) NOT NULL,
  `idMhs` int(11) DEFAULT NULL,
  `idDsn` int(11) DEFAULT NULL,
  `idbbg` int(11) DEFAULT NULL,
  `idPrshn` int(11) DEFAULT NULL,
  `idSidang` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` enum('mhsw','dosenwali','dosenpembimbing','admin') DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `level`, `createdAt`, `active`) VALUES
(1, 'lala', '12345', 'mhsw', '2019-03-14 07:33:34', 'Y'),
(2, 'dessi', '123456', 'dosenwali', '2019-03-14 07:33:34', 'Y'),
(3, 'riri', '1234567', 'dosenpembimbing', '2019-03-14 07:33:34', 'Y'),
(4, 'admin', '12345678', 'admin', '2019-03-14 07:33:34', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id` int(11) NOT NULL,
  `nrp` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `noHp` varchar(14) DEFAULT NULL,
  `perusahaan` varchar(14) DEFAULT NULL,
  `dosenWali` varchar(14) DEFAULT NULL,
  `dosenPmbg` varchar(14) DEFAULT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` enum('Y','N') DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nrp`, `nama`, `noHp`, `perusahaan`, `dosenWali`, `dosenPmbg`, `createAt`, `active`) VALUES
(1, 0, '', '', NULL, NULL, NULL, '2019-03-17 05:23:04', 'N'),
(2, 0, '', '', NULL, NULL, NULL, '2019-03-17 06:12:54', 'N'),
(3, 1, '2', '6', NULL, NULL, NULL, '2019-03-18 03:34:40', 'N'),
(4, 11, 'SELAMAT', '6', NULL, NULL, NULL, '2019-03-18 06:38:19', 'N'),
(5, 1, '2', '6', NULL, NULL, NULL, '2019-03-19 05:03:30', 'N'),
(6, 1, '1', '1', NULL, NULL, NULL, '2019-03-21 01:23:43', 'N'),
(7, 3, '22', '6', NULL, NULL, NULL, '2019-03-25 01:54:55', 'N'),
(8, 12, '1', '4', NULL, NULL, NULL, '2019-03-25 03:36:42', 'N'),
(9, 1, '1', 'noHp', '1p', '1', '1', '2019-03-25 04:21:57', 'Y'),
(10, 1, '1', '1', '1', '1', '2121121', '2019-03-27 06:50:49', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE IF NOT EXISTS `perusahaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` longtext,
  `noHp` int(11) DEFAULT NULL,
  `cp` varchar(50) DEFAULT NULL,
  `noHpCp` int(11) DEFAULT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` enum('Y','N') DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama`, `alamat`, `noHp`, `cp`, `noHpCp`, `createAt`, `active`) VALUES
(1, '1', '23', 3, '4', 5, '2019-03-18 02:18:41', 'N'),
(2, '1', '1', 1, '1', 1, '2019-03-18 03:20:11', 'N'),
(3, '1', '11', 111, '1', 1, '2019-03-18 07:07:40', 'N'),
(4, '1', '11', 2, '111', 1, '2019-03-19 02:17:23', 'N'),
(5, '1', '265', 3, '4', 5, '2019-03-19 02:17:38', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sidangkp`
--

CREATE TABLE IF NOT EXISTS `sidangkp` (
  `id` int(11) NOT NULL,
  `judulKp` varchar(50) DEFAULT NULL,
  `nrp` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tglSidang` varchar(50) DEFAULT NULL,
  `penguji` varchar(50) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` enum('Y','N') DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `sidangkp`
--

INSERT INTO `sidangkp` (`id`, `judulKp`, `nrp`, `nama`, `tglSidang`, `penguji`, `nilai`, `createAt`, `active`) VALUES
(1, '12', 2, '3', '', '5', 6, '2019-03-18 02:57:05', 'N'),
(2, '1', 2, '3', '', '5', 6, '2019-03-18 02:57:38', 'N'),
(3, '1', 2, '3', '', '56', 6, '2019-03-18 03:03:47', 'N'),
(4, '1', 1, '1', '', '1', 1, '2019-03-21 01:24:32', 'N'),
(5, '1', 1, '1', '', '1', 1, '2019-03-24 04:23:38', 'N'),
(6, '1', 2, '3', '', '5', 6, '2019-03-24 04:34:51', 'N'),
(7, '1', 2, '3', '', '4', 5, '2019-03-24 04:37:40', 'N'),
(8, '1', 1, '1', '1', '5', 1, '2019-03-24 04:37:55', 'N'),
(9, '1', 2, '3', '4', '5', 6, '2019-03-25 01:52:40', 'N'),
(10, '1', 2, '245', '4', '5', 6, '2019-03-25 01:52:58', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kerjapraktek`
--
ALTER TABLE `kerjapraktek`
  ADD PRIMARY KEY (`idKp`), ADD KEY `idDsn` (`idDsn`), ADD KEY `idMhs` (`idMhs`), ADD KEY `idbbg` (`idbbg`), ADD KEY `idPrshn` (`idPrshn`), ADD KEY `idSidang` (`idSidang`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sidangkp`
--
ALTER TABLE `sidangkp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kerjapraktek`
--
ALTER TABLE `kerjapraktek`
  MODIFY `idKp` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sidangkp`
--
ALTER TABLE `sidangkp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kerjapraktek`
--
ALTER TABLE `kerjapraktek`
ADD CONSTRAINT `FK_kerjapraktek_bimbingan` FOREIGN KEY (`idbbg`) REFERENCES `bimbingan` (`id`),
ADD CONSTRAINT `FK_kerjapraktek_dosen` FOREIGN KEY (`idDsn`) REFERENCES `dosen` (`id`),
ADD CONSTRAINT `FK_kerjapraktek_mahasiswa` FOREIGN KEY (`idMhs`) REFERENCES `mahasiswa` (`id`),
ADD CONSTRAINT `FK_kerjapraktek_perusahaan` FOREIGN KEY (`idPrshn`) REFERENCES `perusahaan` (`id`),
ADD CONSTRAINT `FK_kerjapraktek_sidangkp` FOREIGN KEY (`idSidang`) REFERENCES `sidangkp` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
