-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2016 at 03:38 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fruitfun`
--

-- --------------------------------------------------------

--
-- Table structure for table `foradmin`
--

CREATE TABLE `foradmin` (
  `AdminId` int(11) NOT NULL,
  `AdminName` varchar(255) NOT NULL,
  `AdminUser` varchar(255) NOT NULL,
  `AdminPass` varchar(255) NOT NULL,
  `AdminEmail` varchar(255) NOT NULL,
  `AdminImage` varchar(255) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `AdminDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foradmin`
--

INSERT INTO `foradmin` (`AdminId`, `AdminName`, `AdminUser`, `AdminPass`, `AdminEmail`, `AdminImage`, `level`, `AdminDate`) VALUES
(1, 'Md. Raqibul Hasan Rumman', 'rumman', 'rumman57', 'rumman142228@gmail.com', 'dist/img/f7eb61232e.jpg', 0, '2016-11-20 18:45:59'),
(2, 'Demo Admin', 'admin', 'demo', 'demo@gmail.com', 'dist/img/0effa4f4a3.png', 0, '2016-11-20 19:21:58'),
(4, 'Yeamoon Nishi', 'nishi', 'nishi', 'nishi@gmail.com', 'dist/img/a326cbd1d2.jpg', 1, '2016-11-21 12:47:33'),
(5, 'Shanta Alam Khan', 'shanta', 'shanta', 'shanta@gmail.com', 'dist/img/59537d60fb.jpg', 2, '2016-11-21 12:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `forbrand`
--

CREATE TABLE `forbrand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL,
  `brandRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forbrand`
--

INSERT INTO `forbrand` (`brandId`, `brandName`, `brandRole`) VALUES
(8, 'BlackBerry', 2),
(9, 'Raspberry Pi', 2),
(10, 'Tangerine', 2),
(11, 'Greenplum', 2),
(12, 'pran', 2),
(13, 'All Time', 2),
(14, 'Coffee World', 2),
(15, 'Red Bull', 2),
(16, 'Red Gold', 2),
(17, 'Simple and Crisp', 2),
(18, 'Balconi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `forcart`
--

CREATE TABLE `forcart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forcart`
--

INSERT INTO `forcart` (`cartId`, `sId`, `productId`, `productName`, `price`, `quantity`, `image`) VALUES
(15, '0skkd3hjfeqtb79fd0hfnd0d83', 5, 'Grape All In One', 13.25, 3, 'dist/img/50ccfc3f5b.jpg'),
(16, '0skkd3hjfeqtb79fd0hfnd0d83', 12, 'Guava Yeshorse', 422.43, 2, 'dist/img/29f10f7d37.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `forcat`
--

CREATE TABLE `forcat` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL,
  `catRole` int(11) NOT NULL,
  `catParent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forcat`
--

INSERT INTO `forcat` (`catId`, `catName`, `catRole`, `catParent`) VALUES
(11, 'Mango', 2, 0),
(12, 'Grape', 2, 0),
(13, 'Guava', 2, 0),
(14, 'Lemon', 2, 0),
(15, 'Orange', 2, 0),
(16, 'Pineapple', 2, 0),
(17, 'Strawberry', 2, 0),
(18, 'Apple', 2, 0),
(19, 'Blackberry', 2, 0),
(20, 'Lychee', 2, 0),
(22, 'ATAULFOS', 2, 11),
(23, 'FRANCIS', 2, 11),
(24, 'HADEN', 2, 11),
(34, 'Sugarloaf Pineapple', 2, 16),
(36, 'Red Spanish Pineapple', 2, 16),
(37, 'Queen Pineapple', 2, 16),
(38, 'Smooth Cayenne Pineapple', 2, 16),
(39, 'Pomegranate', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `forcustomer`
--

CREATE TABLE `forcustomer` (
  `customerId` int(11) NOT NULL,
  `customerUsname` varchar(255) NOT NULL,
  `cusFirstName` varchar(255) NOT NULL,
  `cusLastName` varchar(255) NOT NULL,
  `customerCity` varchar(255) NOT NULL,
  `customerZipCode` int(11) NOT NULL,
  `customerEmail` varchar(255) NOT NULL,
  `customerAddress` text NOT NULL,
  `customerAddress1` text NOT NULL,
  `customerCountry` varchar(255) NOT NULL,
  `customerPhone` varchar(255) NOT NULL,
  `customerPass` varchar(255) NOT NULL,
  `CuCompName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forcustomer`
--

INSERT INTO `forcustomer` (`customerId`, `customerUsname`, `cusFirstName`, `cusLastName`, `customerCity`, `customerZipCode`, `customerEmail`, `customerAddress`, `customerAddress1`, `customerCountry`, `customerPhone`, `customerPass`, `CuCompName`) VALUES
(7, 'rumman', 'Md.Raqibul Hasan', 'Rumman', 'Shilkupa', 7320, 'rumman142228@gmail.com', 'Jalshuka,Khulumbaria, Sahilkupa,Jhenaidah', 'Jalshuka,Khulumbaria', 'Bangladesh', '01757571237', '7f5b23b1d9653a03581f65345c328096', 'T-Lab');

-- --------------------------------------------------------

--
-- Table structure for table `forproduct`
--

CREATE TABLE `forproduct` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productCat` int(11) NOT NULL,
  `productBrand` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `productRole` int(11) NOT NULL,
  `productAvail` int(11) NOT NULL DEFAULT '0',
  `productCond` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forproduct`
--

INSERT INTO `forproduct` (`productId`, `productName`, `productCat`, `productBrand`, `body`, `price`, `image`, `type`, `productRole`, `productAvail`, `productCond`, `date`) VALUES
(1, 'Mango Twist', 24, 12, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 234.43, 'dist/img/72e270de6b.jpg', 0, 2, 0, 0, '2016-11-28 02:12:47'),
(2, 'Mango Virtual', 22, 12, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 2432.23, 'dist/img/40e6ba91c0.jpg', 1, 2, 0, 0, '2016-11-28 02:13:38'),
(3, 'Litchi Sweetheart', 20, 9, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 134.00, 'dist/img/9dba5c0d05.jpg', 0, 2, 0, 0, '2016-11-28 02:14:35'),
(4, 'Litchi Non Stop', 20, 9, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 432.00, 'dist/img/dff2724ecc.jpg', 1, 2, 0, 0, '2016-11-28 02:15:05'),
(5, 'Grape All In One', 12, 11, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 13.25, 'dist/img/50ccfc3f5b.jpg', 0, 2, 0, 0, '2016-11-28 02:16:09'),
(6, 'Grape Twist', 12, 11, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 242.24, 'dist/img/d11913ad6f.jpg', 1, 2, 0, 0, '2016-11-28 02:16:41'),
(7, 'Lemon Ranging', 14, 10, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 141.25, 'dist/img/0ae73acfbf.jpg', 0, 2, 0, 0, '2016-11-28 02:17:45'),
(8, 'Lemon Fighting', 14, 10, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 131.42, 'dist/img/14306489d6.jpg', 1, 2, 0, 0, '2016-11-28 02:18:19'),
(9, 'Orange To The Point', 15, 15, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 3221.00, 'dist/img/3c2d517ebd.jpg', 0, 2, 0, 0, '2016-11-28 02:18:56'),
(10, 'Orange Outer', 15, 15, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 52.52, 'dist/img/785594f387.jpg', 1, 2, 1, 1, '2016-11-28 02:19:55'),
(11, 'Guava Tictac', 13, 13, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 22.23, 'dist/img/54f4875e78.jpg', 1, 2, 0, 0, '2016-11-28 02:20:46'),
(12, 'Guava Yeshorse', 13, 13, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 422.43, 'dist/img/29f10f7d37.jpg', 0, 2, 1, 1, '2016-11-28 02:21:53'),
(13, 'Lemo YoYo', 14, 13, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 342.52, 'dist/img/7a39214f39.jpg', 0, 2, 0, 0, '2016-11-28 07:38:32'),
(14, 'Orange  Fighter', 15, 11, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 423.25, 'dist/img/640c04dfe5.jpg', 0, 2, 0, 0, '2016-11-28 07:39:23'),
(15, 'Apple Pagol', 18, 18, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 31.31, 'dist/img/3b3b575683.jpg', 0, 2, 0, 0, '2016-11-28 23:24:35'),
(16, 'Apple BlackFighter', 18, 18, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 42.14, 'dist/img/882def7007.jpg', 1, 2, 0, 0, '2016-11-28 23:25:15'),
(17, 'Apple Jungle Book', 18, 17, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 1242.43, 'dist/img/880983e0f6.png', 0, 2, 0, 0, '2016-11-28 23:29:46'),
(18, 'Apple Mis Values', 18, 17, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum\r\n\r\n.Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 424.24, 'dist/img/ca09d875a2.jpg', 1, 2, 0, 0, '2016-11-28 23:30:24'),
(19, 'Blackberry Amajon', 19, 9, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 322.34, 'dist/img/4e205b1618.jpg', 0, 2, 0, 0, '2016-11-28 23:31:34'),
(20, 'Blackberry Nilnod', 19, 9, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 3234.24, 'dist/img/a5687cad5c.png', 1, 2, 0, 0, '2016-11-28 23:32:30'),
(21, 'Blackberry Yo Yo', 19, 16, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 2334.24, 'dist/img/632d2e1f57.png', 0, 2, 0, 0, '2016-11-28 23:33:13'),
(22, 'Blackberry Tasty', 19, 9, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 633.23, 'dist/img/593bb0e8e2.jpg', 1, 2, 0, 0, '2016-11-29 00:18:38'),
(23, 'Guava Brown', 13, 17, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum\r\n', 42.32, 'dist/img/88ace0157b.jpg', 0, 2, 0, 0, '2016-11-29 00:20:15'),
(24, 'Guava Sweet', 13, 17, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum\r\n', 424.24, 'dist/img/d422bb04e9.jpg', 1, 2, 0, 0, '2016-11-29 00:22:08'),
(25, 'Pineapple Yellow', 16, 16, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum\r\n', 424.23, 'dist/img/97053c066a.jpg', 0, 2, 0, 0, '2016-11-29 00:24:18'),
(26, 'Pineapple GreenRow', 16, 18, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum\r\n', 5232.23, 'dist/img/e6c9ddb436.jpg', 1, 2, 1, 1, '2016-11-29 00:25:11'),
(27, 'Pineapple Tothepoint', 16, 11, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum\r\n', 4234.23, 'dist/img/665aab92a0.png', 0, 2, 0, 0, '2016-11-29 00:26:14'),
(28, 'Grape Sweet', 12, 12, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum\r\n', 523.43, 'dist/img/df9671c87c.jpg', 0, 2, 0, 0, '2016-11-29 00:29:26'),
(29, 'Grape Australia', 12, 16, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum\r\n', 4242.23, 'dist/img/3655ee53d2.jpg', 1, 2, 0, 0, '2016-11-29 00:30:09'),
(30, 'Strawberry  Chomok', 17, 9, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 5232.42, 'dist/img/c681f82d80.jpg', 0, 2, 0, 0, '2016-11-29 02:46:41'),
(31, 'Strawberry Vijan', 17, 16, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 5353.43, 'dist/img/ba2a846516.jpg', 1, 2, 0, 0, '2016-11-29 02:47:33'),
(32, 'Strawberry  AtoZ', 17, 9, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 8729.34, 'dist/img/04869cb8a9.jpg', 0, 2, 0, 0, '2016-11-29 02:48:25'),
(33, 'Strawberry  Hmm', 17, 15, 'Lorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem IpsumÂ is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 72.34, 'dist/img/4d6e7af0f2.jpg', 1, 2, 0, 0, '2016-11-29 02:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `forproductreviews`
--

CREATE TABLE `forproductreviews` (
  `reviewId` int(11) NOT NULL,
  `reviewName` varchar(255) NOT NULL,
  `reviewEmail` varchar(255) NOT NULL,
  `reviewbody` text NOT NULL,
  `reviewrole` int(11) NOT NULL DEFAULT '0',
  `reviewProId` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forproductreviews`
--

INSERT INTO `forproductreviews` (`reviewId`, `reviewName`, `reviewEmail`, `reviewbody`, `reviewrole`, `reviewProId`, `date`) VALUES
(4, 'Rumman', 'rumman57@engineer.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 0, 25, '2016-12-01 05:34:22'),
(5, 'Nishi', 'nisi@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 0, 25, '2016-12-01 05:34:41'),
(6, 'yahida', 'rumman5768@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 0, 12, '2016-12-01 05:37:52'),
(7, 'yahida', 'rumman5768@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 0, 12, '2016-12-01 05:38:51'),
(8, 'rweq', 'rumman57@engineer.com5757', 'rew', 0, 14, '2016-12-01 08:19:47'),
(9, 'rweq', 'rumman57@engineer.com5757', 'rew', 0, 14, '2016-12-01 08:20:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foradmin`
--
ALTER TABLE `foradmin`
  ADD PRIMARY KEY (`AdminId`);

--
-- Indexes for table `forbrand`
--
ALTER TABLE `forbrand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `forcart`
--
ALTER TABLE `forcart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `forcat`
--
ALTER TABLE `forcat`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `forcustomer`
--
ALTER TABLE `forcustomer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `forproduct`
--
ALTER TABLE `forproduct`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `forproductreviews`
--
ALTER TABLE `forproductreviews`
  ADD PRIMARY KEY (`reviewId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foradmin`
--
ALTER TABLE `foradmin`
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `forbrand`
--
ALTER TABLE `forbrand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `forcart`
--
ALTER TABLE `forcart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `forcat`
--
ALTER TABLE `forcat`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `forcustomer`
--
ALTER TABLE `forcustomer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `forproduct`
--
ALTER TABLE `forproduct`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `forproductreviews`
--
ALTER TABLE `forproductreviews`
  MODIFY `reviewId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
