-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2019 at 12:37 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mur-scm`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertInventory` (IN `idGoodsIn` INT)  BEGIN
insert into inventory (idGoods) VALUES(idGoodsIn);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateStock` (IN `idGoodsIn` INT, IN `qtyIn` INT)  BEGIN
update inventory set qty = (qty+qtyIn) where inventory.idGoods = idGoodsIn;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `idGoods` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` longtext,
  `type` enum('1','2') DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` int(11) DEFAULT NULL,
  `active` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`idGoods`, `name`, `description`, `type`, `createdAt`, `updatedAt`, `createdBy`, `active`) VALUES
(2, 'Bawang', 'Bawang Putih', '1', '2019-02-19 04:36:35', '2019-02-23 02:26:53', NULL, 'N'),
(3, 'Tomat', 'Tomat merah', '1', '2019-02-23 02:27:13', '2019-03-07 14:13:20', NULL, 'Y'),
(15, 'sebalak', 'enak', NULL, '2019-03-08 01:31:56', '2019-03-08 01:31:56', 1, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `idInventory` int(11) NOT NULL,
  `idGoods` int(11) DEFAULT NULL,
  `idProduction` int(11) DEFAULT NULL,
  `availability` enum('Y','N') DEFAULT 'Y',
  `qty` int(11) DEFAULT '0',
  `unit` varchar(10) DEFAULT 'ons',
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` int(11) DEFAULT NULL,
  `active` enum('Y','N') DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`idInventory`, `idGoods`, `idProduction`, `availability`, `qty`, `unit`, `createdAt`, `updatedAt`, `createdBy`, `active`) VALUES
(1, 2, 1, 'Y', 105, 'pcs', '2019-02-23 02:55:50', '2019-03-07 15:05:25', NULL, 'Y'),
(2, 3, 1, 'Y', 1011, 'ons', '2019-02-23 02:57:39', '2019-03-08 11:26:17', NULL, 'N'),
(7, 15, NULL, 'Y', 1, 'ons', '2019-03-08 01:31:56', '2019-03-08 11:34:11', NULL, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `idPo` int(11) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `customerName` varchar(50) DEFAULT NULL,
  `customerAddress` longtext,
  `customerPhone` varchar(14) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` int(11) DEFAULT NULL,
  `active` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`idPo`, `photo`, `customerName`, `customerAddress`, `customerPhone`, `createdAt`, `updatedAt`, `createdBy`, `active`) VALUES
(1, 'lalala.jpg', 'Alif Abhiesa', 'Bandung', '0991212', '2019-02-23 03:05:05', '2019-03-08 07:26:10', NULL, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `po_inventory`
--

CREATE TABLE `po_inventory` (
  `id` int(11) NOT NULL,
  `idPo` int(11) DEFAULT NULL,
  `idInventory` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` bigint(20) DEFAULT '0',
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` int(11) DEFAULT NULL,
  `active` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_inventory`
--

INSERT INTO `po_inventory` (`id`, `idPo`, `idInventory`, `qty`, `price`, `createdAt`, `updatedAt`, `createdBy`, `active`) VALUES
(1, 1, 1, 100, 20000, '2019-02-23 03:18:45', '2019-02-23 03:19:57', NULL, 'Y'),
(2, 1, 1, 10, 1000, '2019-02-23 03:37:33', '2019-02-23 03:38:12', NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `po_receipt`
--

CREATE TABLE `po_receipt` (
  `id` int(11) NOT NULL,
  `idPo` int(11) DEFAULT NULL,
  `idReceipt` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` bigint(20) DEFAULT '0',
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` int(11) DEFAULT NULL,
  `active` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_receipt`
--

INSERT INTO `po_receipt` (`id`, `idPo`, `idReceipt`, `qty`, `price`, `createdAt`, `updatedAt`, `createdBy`, `active`) VALUES
(1, 1, 2, 100, 2000, '2019-03-01 13:02:19', '2019-03-01 13:02:19', NULL, 'Y'),
(3, 1, 2, 100, 1000, '2019-03-01 13:05:46', '2019-03-01 13:06:35', NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `idProduction` int(11) NOT NULL,
  `idReceipt` int(11) DEFAULT NULL,
  `idPo` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` timestamp NULL DEFAULT NULL,
  `active` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`idProduction`, `idReceipt`, `idPo`, `qty`, `createdAt`, `updatedAt`, `createdBy`, `active`) VALUES
(1, 1, NULL, 100, '2019-03-01 13:41:52', '2019-03-01 13:41:52', NULL, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `production_goods`
--

CREATE TABLE `production_goods` (
  `id` int(11) NOT NULL,
  `idGoods` int(11) DEFAULT NULL,
  `idProduction` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `price` bigint(20) DEFAULT '0',
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` int(11) DEFAULT NULL,
  `active` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `idReceipt` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` longtext,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` int(11) DEFAULT NULL,
  `active` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`idReceipt`, `name`, `description`, `createdAt`, `updatedAt`, `createdBy`, `active`) VALUES
(1, 'seblak enak', 'enak bangettt', '2019-02-19 01:35:44', '2019-02-19 01:53:14', 1, 'N'),
(2, 'bakso', 'enak', '2019-02-19 01:40:22', '2019-02-19 01:40:22', NULL, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_goods`
--

CREATE TABLE `receipt_goods` (
  `id` int(11) NOT NULL,
  `idReceipt` int(11) DEFAULT NULL,
  `idGoods` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` int(11) DEFAULT NULL,
  `active` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt_goods`
--

INSERT INTO `receipt_goods` (`id`, `idReceipt`, `idGoods`, `qty`, `unit`, `createdAt`, `updatedAt`, `createdBy`, `active`) VALUES
(1, 1, 2, 1, 'ons', '2019-02-23 02:28:20', '2019-02-23 02:28:20', NULL, 'Y'),
(2, 1, 3, 2, 'ons', '2019-02-23 02:28:35', '2019-02-23 02:28:43', NULL, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `shopping`
--

CREATE TABLE `shopping` (
  `idShopping` int(11) NOT NULL,
  `idPo` int(11) DEFAULT NULL,
  `market` varchar(50) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` int(11) DEFAULT NULL,
  `active` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopping`
--

INSERT INTO `shopping` (`idShopping`, `idPo`, `market`, `createdAt`, `updatedAt`, `createdBy`, `active`) VALUES
(1, NULL, 'pasar updated', '2019-02-23 02:32:35', '2019-03-05 15:35:38', 1, 'N'),
(3, NULL, 'Pasar Cikalong', '2019-02-23 02:38:22', '2019-03-07 01:45:52', 1, 'Y'),
(17, NULL, 'Pasar updated', '2019-03-06 08:13:35', '2019-03-07 01:45:55', 1, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `shop_goods`
--

CREATE TABLE `shop_goods` (
  `id` int(11) NOT NULL,
  `idShopping` int(11) DEFAULT NULL,
  `idGoods` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` int(11) DEFAULT NULL,
  `active` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_goods`
--

INSERT INTO `shop_goods` (`id`, `idShopping`, `idGoods`, `qty`, `price`, `unit`, `createdAt`, `updatedAt`, `createdBy`, `active`) VALUES
(2, 17, 2, 2, 2, 'ons', '2019-03-06 08:43:11', '2019-03-06 09:17:55', NULL, 'Y'),
(3, 17, 2, 10, 10000, 'ons', '2019-03-06 09:26:25', '2019-03-07 01:42:56', 1, 'N'),
(4, 17, 2, 100, 10000, 'ons', '2019-03-08 01:33:48', '2019-03-08 01:34:21', 1, 'N'),
(8, 17, 3, 1000, 100000, 'ons', '2019-03-08 01:37:04', '2019-03-08 01:37:04', 1, 'Y'),
(9, 17, 3, 1, 1, 'kg', '2019-03-08 11:26:17', '2019-03-08 11:26:17', 1, 'Y'),
(10, 17, 15, 1, 1, 'Liter', '2019-03-08 11:34:11', '2019-03-08 11:34:11', 1, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(2) DEFAULT NULL,
  `lastLogin` datetime DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` int(11) DEFAULT NULL,
  `active` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `username`, `password`, `level`, `lastLogin`, `createdAt`, `updatedAt`, `createdBy`, `active`) VALUES
(1, 'alif', '21232f297a57a5a743894a0e4a801fc3', '2', '2019-03-08 10:16:37', '2019-02-19 00:35:08', '2019-03-08 09:16:37', 1, 'Y'),
(3, 'abhiesa', '099a147c0c6bcd34009896b2cc88633c', '2', NULL, '2019-02-19 01:08:52', '2019-02-19 01:08:52', NULL, 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`idGoods`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`idInventory`),
  ADD KEY `FK_inventory_goods` (`idGoods`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`idPo`);

--
-- Indexes for table `po_inventory`
--
ALTER TABLE `po_inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_po_inventory_po` (`idPo`),
  ADD KEY `FK_po_inventory_inventory` (`idInventory`);

--
-- Indexes for table `po_receipt`
--
ALTER TABLE `po_receipt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_po_receipt_po` (`idPo`),
  ADD KEY `FK_po_receipt_receipt` (`idReceipt`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`idProduction`),
  ADD KEY `FK_production_receipt` (`idReceipt`),
  ADD KEY `FK_production_po` (`idPo`);

--
-- Indexes for table `production_goods`
--
ALTER TABLE `production_goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_production_goods_goods` (`idGoods`),
  ADD KEY `FK_production_goods_production` (`idProduction`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`idReceipt`);

--
-- Indexes for table `receipt_goods`
--
ALTER TABLE `receipt_goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_receipt_goods_receipt` (`idReceipt`),
  ADD KEY `FK_receipt_goods_goods` (`idGoods`);

--
-- Indexes for table `shopping`
--
ALTER TABLE `shopping`
  ADD PRIMARY KEY (`idShopping`),
  ADD KEY `FK_shopping_po` (`idPo`);

--
-- Indexes for table `shop_goods`
--
ALTER TABLE `shop_goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_shop_goods_shopping` (`idShopping`),
  ADD KEY `FK_shop_goods_goods` (`idGoods`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `idGoods` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `idInventory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
  MODIFY `idPo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `po_inventory`
--
ALTER TABLE `po_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `po_receipt`
--
ALTER TABLE `po_receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `idProduction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `production_goods`
--
ALTER TABLE `production_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `idReceipt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `receipt_goods`
--
ALTER TABLE `receipt_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shopping`
--
ALTER TABLE `shopping`
  MODIFY `idShopping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `shop_goods`
--
ALTER TABLE `shop_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `FK_inventory_goods` FOREIGN KEY (`idGoods`) REFERENCES `goods` (`idGoods`);

--
-- Constraints for table `po_inventory`
--
ALTER TABLE `po_inventory`
  ADD CONSTRAINT `FK_po_inventory_inventory` FOREIGN KEY (`idInventory`) REFERENCES `inventory` (`idInventory`),
  ADD CONSTRAINT `FK_po_inventory_po` FOREIGN KEY (`idPo`) REFERENCES `po` (`idPo`);

--
-- Constraints for table `po_receipt`
--
ALTER TABLE `po_receipt`
  ADD CONSTRAINT `FK_po_receipt_po` FOREIGN KEY (`idPo`) REFERENCES `po` (`idPo`),
  ADD CONSTRAINT `FK_po_receipt_receipt` FOREIGN KEY (`idReceipt`) REFERENCES `receipt` (`idReceipt`);

--
-- Constraints for table `production`
--
ALTER TABLE `production`
  ADD CONSTRAINT `FK_production_po` FOREIGN KEY (`idPo`) REFERENCES `po` (`idPo`),
  ADD CONSTRAINT `FK_production_receipt` FOREIGN KEY (`idReceipt`) REFERENCES `receipt` (`idReceipt`);

--
-- Constraints for table `production_goods`
--
ALTER TABLE `production_goods`
  ADD CONSTRAINT `FK_production_goods_goods` FOREIGN KEY (`idGoods`) REFERENCES `goods` (`idGoods`),
  ADD CONSTRAINT `FK_production_goods_production` FOREIGN KEY (`idProduction`) REFERENCES `production` (`idProduction`);

--
-- Constraints for table `receipt_goods`
--
ALTER TABLE `receipt_goods`
  ADD CONSTRAINT `FK_receipt_goods_goods` FOREIGN KEY (`idGoods`) REFERENCES `goods` (`idGoods`),
  ADD CONSTRAINT `FK_receipt_goods_receipt` FOREIGN KEY (`idReceipt`) REFERENCES `receipt` (`idReceipt`);

--
-- Constraints for table `shopping`
--
ALTER TABLE `shopping`
  ADD CONSTRAINT `FK_shopping_po` FOREIGN KEY (`idPo`) REFERENCES `po` (`idPo`) ON UPDATE CASCADE;

--
-- Constraints for table `shop_goods`
--
ALTER TABLE `shop_goods`
  ADD CONSTRAINT `FK_shop_goods_goods` FOREIGN KEY (`idGoods`) REFERENCES `goods` (`idGoods`),
  ADD CONSTRAINT `FK_shop_goods_shopping` FOREIGN KEY (`idShopping`) REFERENCES `shopping` (`idShopping`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
