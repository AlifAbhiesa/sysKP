-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01 Apr 2019 pada 06.08
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

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
(9, 1, '1', 1, '2019-03-23', '1', '1', '1', '2019-04-01 03:59:43', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
