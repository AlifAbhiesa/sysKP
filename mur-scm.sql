-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2019 at 04:43 PM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertInventory` (IN `idGoodsIn` INT, IN `createdByIn` VARCHAR(50), IN `qtyIn` INT, IN `idProductionIn` INT)  BEGIN
insert into inventory (idGoods, createdBy, qty, idProduction) VALUES(idGoodsIn, createdByIn, qtyIn, idProductionIn);
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
  `type` enum('1','2','3') DEFAULT NULL,
  `unit` varchar(50) DEFAULT 'pcs',
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` int(11) DEFAULT NULL,
  `active` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`idGoods`, `name`, `description`, `type`, `unit`, `createdAt`, `updatedAt`, `createdBy`, `active`) VALUES
(2, 'Bawang merah', 'Bawang merah', '1', NULL, '2019-03-09 11:45:59', '2019-03-09 15:42:13', 1, 'Y'),
(3, 'Bawang Putih', 'Bawang putih', '1', NULL, '2019-03-09 11:46:11', '2019-03-09 15:42:17', 1, 'Y'),
(4, 'Bumbu Seblak', 'Bumbunya seblak', '2', NULL, '2019-03-09 11:46:23', '2019-03-09 15:42:20', 1, 'Y'),
(5, 'Wadah Seblak', 'Wadahnya seblak', '2', NULL, '2019-03-09 11:46:33', '2019-03-09 15:42:24', 1, 'Y'),
(38, 'PO ID : 3 | Receipt : Bumbu seblak', 'Barang hasil production', '3', 'pcs', '2019-03-10 14:47:14', '2019-03-10 14:47:14', 1, 'Y');

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
  `unit` varchar(10) DEFAULT 'pcs',
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` int(11) DEFAULT NULL,
  `active` enum('Y','N') DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`idInventory`, `idGoods`, `idProduction`, `availability`, `qty`, `unit`, `createdAt`, `updatedAt`, `createdBy`, `active`) VALUES
(2, 2, NULL, 'Y', 4940, 'gram', '2019-03-09 11:45:59', '2019-03-10 14:47:14', NULL, 'Y'),
(3, 3, NULL, 'Y', 4940, 'gram', '2019-03-09 11:46:11', '2019-03-10 14:47:14', NULL, 'Y'),
(4, 4, NULL, 'Y', 1000, 'pcs', '2019-03-09 11:46:23', '2019-03-10 15:29:50', NULL, 'Y'),
(5, 5, NULL, 'Y', 100, 'pcs', '2019-03-09 11:46:33', '2019-03-10 07:29:26', NULL, 'Y'),
(31, 38, 30, 'Y', 5, 'pcs', '2019-03-10 14:47:14', '2019-03-10 14:47:14', 1, 'Y');

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
(3, 'nodejs (1).JPG', 'M. Alif Abhiesa', 'Bandung', '091291820', '2019-03-09 11:18:36', '2019-03-09 11:19:47', NULL, 'Y'),
(4, '147.png', 'Ajie', 'Bandung', '0192012912', '2019-03-10 07:27:44', '2019-03-10 07:27:44', 1, 'Y');

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
(3, 3, 1, 10, 1000, '2019-03-09 12:04:31', '2019-03-09 12:04:31', 1, 'Y'),
(4, 4, 2, 100, 7000, '2019-03-10 07:28:21', '2019-03-10 07:28:21', 1, 'Y');

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
  `createdBy` int(2) DEFAULT NULL,
  `active` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`idProduction`, `idReceipt`, `idPo`, `qty`, `createdAt`, `updatedAt`, `createdBy`, `active`) VALUES
(30, 1, 3, 5, '2019-03-10 14:47:14', '2019-03-10 14:47:14', 1, 'Y');

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

--
-- Dumping data for table `production_goods`
--

INSERT INTO `production_goods` (`id`, `idGoods`, `idProduction`, `qty`, `unit`, `price`, `createdAt`, `updatedAt`, `createdBy`, `active`) VALUES
(7, 2, 30, 5, 'gram', 12000, '2019-03-10 14:47:14', '2019-03-10 14:47:14', 1, 'Y'),
(8, 3, 30, 5, 'gram', 10000, '2019-03-10 14:47:14', '2019-03-10 14:47:14', 1, 'Y');

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
(1, 'Bumbu seblak', 'bumbunya seblak', '2019-03-09 11:45:15', '2019-03-09 11:45:15', 1, 'Y'),
(2, 'Seblak Enak', 'Seblak yang enak', '2019-03-09 11:45:29', '2019-03-09 11:45:29', 1, 'Y');

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
(1, 1, 2, 1, 'gram', '2019-03-09 12:09:05', '2019-03-09 12:09:11', 1, 'Y'),
(2, 1, 3, 1, 'gram', '2019-03-09 12:12:36', '2019-03-09 12:12:37', 1, 'Y'),
(3, 2, 4, 1, 'pcs', '2019-03-09 12:12:56', '2019-03-09 12:12:56', 1, 'Y'),
(4, 2, 5, 1, 'pcs', '2019-03-09 12:13:14', '2019-03-09 12:13:14', 2, 'Y');

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
(4, 3, 'Pasar Bandung', '2019-03-09 14:16:01', '2019-03-09 14:16:01', 1, 'Y'),
(5, 4, 'Gudang', '2019-03-10 07:28:59', '2019-03-10 07:28:59', 1, 'Y');

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
(6, 4, 2, 5000, 12000, 'gram', '2019-03-09 15:28:31', '2019-03-09 15:28:31', 1, 'Y'),
(7, 4, 3, 5000, 10000, 'gram', '2019-03-09 15:29:33', '2019-03-09 15:29:33', 1, 'Y'),
(8, 5, 4, 100, 1000, 'Pcs', '2019-03-10 07:29:18', '2019-03-10 07:29:18', 1, 'Y'),
(9, 5, 5, 100, 1000, 'Pcs', '2019-03-10 07:29:26', '2019-03-10 07:29:26', 1, 'Y');

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
(1, 'alif', '21232f297a57a5a743894a0e4a801fc3', '2', '2019-03-10 01:35:00', '2019-02-19 00:35:08', '2019-03-10 12:35:00', 1, 'Y'),
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
  MODIFY `idGoods` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `idInventory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
  MODIFY `idPo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `po_inventory`
--
ALTER TABLE `po_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `po_receipt`
--
ALTER TABLE `po_receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `idProduction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `production_goods`
--
ALTER TABLE `production_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `idReceipt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `receipt_goods`
--
ALTER TABLE `receipt_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shopping`
--
ALTER TABLE `shopping`
  MODIFY `idShopping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shop_goods`
--
ALTER TABLE `shop_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
