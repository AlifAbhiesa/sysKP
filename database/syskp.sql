-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Mar 2019 pada 12.54
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
  `idBbg` int(11) NOT NULL,
  `nrp` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `judulKp` varchar(50) DEFAULT NULL,
  `pembimbingPrshn` varchar(50) DEFAULT NULL,
  `pembimbingDsn` varchar(50) DEFAULT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `id` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nidn` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` longtext NOT NULL,
  `tempatTglLhr` varchar(50) NOT NULL,
  `gender` enum('MALE','FEMALE') NOT NULL,
  `urutanAkademik` varchar(50) NOT NULL,
  `noHp` int(11) NOT NULL,
  `createAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'lala', '12345', 'mhsw', '2019-03-14 07:33:34', NULL),
(2, 'dessi', '123456', 'dosenwali', '2019-03-14 07:33:34', NULL),
(3, 'riri', '1234567', 'dosenpembimbing', '2019-03-14 07:33:34', NULL),
(4, 'admin', '12345678', 'admin', '2019-03-14 07:33:34', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id` int(11) NOT NULL,
  `nrp` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` longtext NOT NULL,
  `gender` enum('MALE','FEMALE') NOT NULL,
  `tempatTglLhr` varchar(50) NOT NULL,
  `angkatan` varchar(4) NOT NULL,
  `noHp` varchar(14) NOT NULL,
  `createAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE IF NOT EXISTS `perusahaan` (
  `idPrshn` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` longtext NOT NULL,
  `noHp` int(11) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `noHpCp` int(11) NOT NULL,
  `createAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sidangkp`
--

CREATE TABLE IF NOT EXISTS `sidangkp` (
  `idKp` int(11) NOT NULL,
  `judulKp` varchar(50) DEFAULT NULL,
  `nrp` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tglSidang` varchar(50) DEFAULT NULL,
  `penguji` varchar(50) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`idBbg`);

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
  ADD PRIMARY KEY (`idPrshn`);

--
-- Indexes for table `sidangkp`
--
ALTER TABLE `sidangkp`
  ADD PRIMARY KEY (`idKp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `idBbg` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `idPrshn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sidangkp`
--
ALTER TABLE `sidangkp`
  MODIFY `idKp` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kerjapraktek`
--
ALTER TABLE `kerjapraktek`
ADD CONSTRAINT `FK_kerjapraktek_bimbingan` FOREIGN KEY (`idbbg`) REFERENCES `bimbingan` (`idBbg`),
ADD CONSTRAINT `FK_kerjapraktek_dosen` FOREIGN KEY (`idDsn`) REFERENCES `dosen` (`id`),
ADD CONSTRAINT `FK_kerjapraktek_mahasiswa` FOREIGN KEY (`idMhs`) REFERENCES `mahasiswa` (`id`),
ADD CONSTRAINT `FK_kerjapraktek_perusahaan` FOREIGN KEY (`idPrshn`) REFERENCES `perusahaan` (`idPrshn`),
ADD CONSTRAINT `FK_kerjapraktek_sidangkp` FOREIGN KEY (`idSidang`) REFERENCES `sidangkp` (`idKp`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
