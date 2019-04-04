-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Apr 2019 pada 05.34
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
-- Struktur dari tabel `pengujian`
--

CREATE TABLE IF NOT EXISTS `pengujian` (
  `id` int(11) NOT NULL,
  `nmmhsw` varchar(50) NOT NULL,
  `nrp` int(11) NOT NULL,
  `instansi` varchar(128) NOT NULL,
  `judulKp` varchar(256) NOT NULL,
  `dpmbg` varchar(50) NOT NULL,
  `jdwlSdng` varchar(25) NOT NULL,
  `createAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengujian`
--

INSERT INTO `pengujian` (`id`, `nmmhsw`, `nrp`, `instansi`, `judulKp`, `dpmbg`, `jdwlSdng`, `createAt`, `active`) VALUES
(1, '12', 12, '12', 'undefined', '1', '1', '2019-04-04 03:20:45', 'N'),
(2, '', 0, '', '1', '', '', '2019-04-04 03:21:33', 'N'),
(3, '12', 12, '12', '12', '12', '12', '2019-04-04 03:25:05', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengujian`
--
ALTER TABLE `pengujian`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengujian`
--
ALTER TABLE `pengujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
