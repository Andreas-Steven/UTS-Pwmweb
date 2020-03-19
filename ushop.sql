-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2020 at 06:22 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ushop`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` varchar(10) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_stock` int(11) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_stock`, `item_price`, `item_desc`) VALUES
('1000', 'PACORI SWAET', 20, 8000, 'Sebuah minuman penganti oin'),
('1001', 'SUSU ULTI', 12, 10000, 'Susu untuk menambah nutrisi'),
('1002', 'BLUE SAND', 6, 12000, 'Minuman berkarbonasi'),
('1003', 'ROOT BEER', 25, 14000, 'Minuman beralkhohol'),
('1004', 'CIKI TORA', 9, 4000, 'Snack ringan yang tidak bergizi'),
('1005', 'WAFER ENAK', 13, 7000, 'Wafer yang enak rasanya');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `role_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_desc`) VALUES
(1, 'Admin', 'CRUD pada user'),
(2, 'Manager', 'CRUD pada item'),
(3, 'Kasir', 'Read barang, Update Stock dan Harga barang'),
(4, 'Pembeli', 'Read barang');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`, `first_name`, `last_name`, `role_id`, `address`) VALUES
('1000', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Admin', 1, 'UMN, Serpong'),
('1001', 'a6fb09317477cd074b8830e54b8c4931', 'Fenri', 'Antonia', 2, 'Osaka, Japan'),
('1002', '0c7ac90cea5a8f30d0d1c4e8f6e1dde6', 'Alucard', 'Asterix', 3, 'Semarang'),
('1003', '3210171f1d3ee274034f2fd6032c4375', 'Dangle', 'Digger', 3, 'Surabaya'),
('1004', '6297229392e6005f8231dd4c91fada47', 'Ian', 'Jelard', 4, 'Jakarta pusat'),
('1005', '50b6526c7088a6a0056bae3d03e9ce4a', 'Lunar', 'Mosee', 4, 'Tangerang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
