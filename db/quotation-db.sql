-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 10:04 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quotation-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(225) NOT NULL,
  `customer_name` varchar(225) NOT NULL,
  `customer_num` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `customer_num`, `address`) VALUES
(1, 'Jade Riel Abuela', '09123456788', 'Blk 1 Lot 4 Larlin Village Sampaloc, Apalit, Pampanga'),
(3, 'Eldrian Rabajante', '09987654321', 'St. Thomas, Batangas'),
(4, 'Kizza Mae Monticod', '09111111111', 'Cedar 1, Lantic Carmona Cavite');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(225) NOT NULL,
  `product_name` varchar(225) NOT NULL,
  `product_id` varchar(225) NOT NULL,
  `product_price` varchar(225) NOT NULL,
  `product_description` varchar(225) NOT NULL,
  `product_category` varchar(225) NOT NULL,
  `product_img` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_id`, `product_price`, `product_description`, `product_category`, `product_img`) VALUES
(1, 'Fire Helmet (China)', '1212', '9856', 'Outer shell', 'Fire Fighting Equipment', '1212.jpg'),
(5, 'F6 Fire Helmet, made in New Zeland', '1211', '53223', 'Outer shell', 'Fire Fighting Equipment', '1211.jpg'),
(7, 'Try', '11', '100', 'sample', 'Lighting', 'mam_angel.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_items`
--

CREATE TABLE `quotation_items` (
  `id` int(225) NOT NULL,
  `quotation_num` varchar(225) NOT NULL,
  `quotation_product` varchar(225) NOT NULL,
  `quotation_description` varchar(225) NOT NULL,
  `quotation_item` varchar(225) NOT NULL,
  `quotation_qty` varchar(225) NOT NULL,
  `quotation_unit` varchar(225) NOT NULL,
  `quotation_uprice` varchar(225) NOT NULL,
  `quotation_amount` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotation_items`
--

INSERT INTO `quotation_items` (`id`, `quotation_num`, `quotation_product`, `quotation_description`, `quotation_item`, `quotation_qty`, `quotation_unit`, `quotation_uprice`, `quotation_amount`) VALUES
(1, '1', '', '', '', '', '', '', ''),
(2, '3', '1212', 'Outer shell', 'Fire Helmet (China)', '', '', '9856', '9856'),
(3, '4', '1212', 'Outer shell', 'Fire Helmet (China)', '', '', '9856', '9856'),
(4, '5', '1212', 'Outer shell', 'Fire Helmet (China)', '', '', '9856', '9856'),
(5, '6', '1212', 'Outer shell', 'Fire Helmet (China)', '', '', '9856', '9856'),
(6, '7', '1212', 'Outer shell', 'Fire Helmet (China)', '2', 'pieces', '9856', '9856'),
(7, '8', '1212', 'Outer shell', 'Fire Helmet (China)', '2', 'pieces', '9856', '9856'),
(8, '9', '1212', 'Outer shell', 'Fire Helmet (China)', '1', 'pieces', '9856', '9856'),
(9, '14', '1212', 'Outer shell', 'Fire Helmet (China)', '2', 'pieces', '9856', '9856');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_list`
--

CREATE TABLE `quotation_list` (
  `id` int(225) NOT NULL,
  `quotation_num` varchar(225) NOT NULL,
  `quotation_for` varchar(225) NOT NULL,
  `quotation_billing` varchar(225) NOT NULL,
  `quotation_pimage` varchar(225) NOT NULL,
  `quotation_product` varchar(225) NOT NULL,
  `quotation_description` varchar(225) NOT NULL,
  `quotation_item` varchar(225) NOT NULL,
  `quotation_qty` varchar(225) NOT NULL,
  `quotation_unit` varchar(225) NOT NULL,
  `quotation_uprice` varchar(225) NOT NULL,
  `quotation_amount` varchar(225) NOT NULL,
  `quotation_stotal` varchar(225) NOT NULL,
  `quotation_vat` varchar(225) NOT NULL,
  `quotation_charge` varchar(225) NOT NULL,
  `quotation_grandtotal` varchar(225) NOT NULL,
  `quotation_date` varchar(225) NOT NULL,
  `quotation_expires` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotation_list`
--

INSERT INTO `quotation_list` (`id`, `quotation_num`, `quotation_for`, `quotation_billing`, `quotation_pimage`, `quotation_product`, `quotation_description`, `quotation_item`, `quotation_qty`, `quotation_unit`, `quotation_uprice`, `quotation_amount`, `quotation_stotal`, `quotation_vat`, `quotation_charge`, `quotation_grandtotal`, `quotation_date`, `quotation_expires`) VALUES
(24, '0123', 'Donald Ramolete', 'Taga cavite na', '1212.jpg', '1212', 'Outer shell', 'Fire Helmet (China)', '2', 'pieces', '9856', '19712', '₱19,712.00', '₱1,379.84', '100', '₱21,191.84', '2024-05-16', '2024-05-18'),
(26, '124', 'Melanie Lopez', 'Imus, Cavite', '1212.jpg', '1212', 'Outer shell', 'Fire Helmet (China)', '2', 'pieces', '9856', '19712', '₱126,158.00', '₱8,831.06', '5000', '₱139,989.06', '2024-05-17', '2024-05-17'),
(27, '124', 'Melanie Lopez', 'Imus, Cavite', '1211.jpg', '1211', 'Outer shell', 'F6 Fire Helmet, made in New Zeland', '2', 'pieces', '53223', '106446', '₱126,158.00', '₱8,831.06', '5000', '₱139,989.06', '2024-05-17', '2024-05-17'),
(47, '124', 'Eldrian Rabajante', 'Sto. Thomas, Batangas', '1212.jpg', '1212', 'Outer shell', 'Fire Helmet (China)', '2', 'pieces', '9856', '19712', '₱19,712.00', '₱1,379.84', '9000', '₱30,091.84', '2024-05-17', '2024-05-25'),
(48, '125', 'Monica Ocampo', 'Carmona Cavite', '1212.jpg', '1212', 'Outer shell', 'Fire Helmet (China)', '3', 'pieces', '9856', '29568', '₱29,568.00', '₱2,069.76', '5000', '₱36,637.76', '2024-05-17', '2024-05-24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`) VALUES
(1, 'admin', 'pass123', 'Monica Ocampo'),
(5, 'melanie.ojt', 'MELANIE', 'Melanie Aina Lopez');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_items`
--
ALTER TABLE `quotation_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_list`
--
ALTER TABLE `quotation_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quotation_items`
--
ALTER TABLE `quotation_items`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `quotation_list`
--
ALTER TABLE `quotation_list`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
