-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2017 at 05:11 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `acc_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `acc_type` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_id`, `user_id`, `acc_type`, `email`, `password`, `firstname`) VALUES
(12, 9, 'User', 'karen@yahoo.com', '123', 'Karen'),
(13, 10, 'Admin', 'adminako@gmail.com', 'admin', 'Admin'),
(14, 11, 'User', 'worms234@yahoo.com', 'asdf', 'WWW'),
(15, 12, 'User', 'Ivan@gmail.com', '123', 'Ivan'),
(16, 13, 'User', 'karen@gmail.com', '123', 'Karen'),
(17, 14, 'User', 'augusto@gmail.com', '123', 'Augusto');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(10) NOT NULL,
  `brand_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_title`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(3, 'Vans');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_title` varchar(50) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `total_amt` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `user_id`, `product_title`, `product_image`, `qty`, `price`, `total_amt`) VALUES
(26, 51, 11, 'FredPerry1', 'fp1.JPG', 1, 3500, 3500),
(27, 54, 11, 'FredPerry4', 'fp4.jpg', 1, 3700, 3700),
(28, 53, 11, 'FredPerry3', 'fp3.jpg', 1, 4000, 4000),
(29, 52, 11, 'FredPerry2', 'fp2.jpg', 1, 4000, 4000),
(30, 49, 11, 'Navi Dota2', 'cc.jpg', 1, 500, 500),
(31, 81, 9, 'Nike(4)', 'nike4.jpg', 3, 1567, 4701),
(32, 80, 9, 'Nike(3)', 'nike3.jpg', 1, 1200, 1200),
(33, 79, 9, 'Nike(2)', 'nike2.jpg', 1, 1000, 1000),
(34, 78, 9, 'Nike(1)', 'nike1.jpg', 1, 1000, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Clothes'),
(2, 'Pants'),
(3, 'Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `product_cat` int(10) NOT NULL,
  `product_brand` int(10) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` varchar(100) NOT NULL,
  `product_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`) VALUES
(78, 1, 1, 'Nike(1)', 1000, 'nike1', 'nike1.jpg'),
(79, 1, 1, 'Nike(2)', 1000, 'nike2', 'nike2.jpg'),
(80, 1, 1, 'Nike(3)', 1200, 'nike3', 'nike3.jpg'),
(81, 1, 1, 'Nike(4)', 1567, 'nike4', 'nike4.jpg'),
(82, 1, 1, 'Nike(5)', 1200, 'nike5', 'nike5.jpg'),
(83, 1, 1, 'Nike(6)', 1300, 'nike6', 'nike6.jpg'),
(84, 1, 1, 'Nike(7)', 1500, 'nike7', 'nike7.jpg'),
(85, 1, 1, 'Nike(8)', 1200, 'nike8', 'nike9.jpg'),
(86, 1, 1, 'Nike(9)', 1100, 'nike9', 'nike10.jpg'),
(87, 1, 1, 'Nike(10)', 1140, 'nike10', 'nike11.jpg'),
(88, 1, 1, 'Nike(11)', 1240, 'nike11', 'nike12.jpg'),
(89, 1, 1, 'Nike(12)', 1100, 'nike12', 'nike13.jpg'),
(90, 1, 1, 'Nike(13)', 1100, 'nike13', 'nike14.jpg'),
(91, 1, 1, 'Nike(14)', 780, 'nike14', 'nike15.jpg'),
(92, 1, 1, 'Nike(15)', 890, 'nike15', 'nike16.jpg'),
(93, 1, 1, 'Nike(16)', 900, 'nike16', 'nike17.jpg'),
(94, 1, 1, 'Nike(17)', 1100, 'nike17', 'nike18.jpg'),
(95, 1, 1, 'Nike(18)', 1200, 'nike18', 'nike19.jpg'),
(96, 1, 1, 'Nike(19)', 1300, 'nike19', 'nike20.jpg'),
(97, 3, 3, 'Vans(1)', 3500, 'vans1', 'vans1.jpg'),
(98, 3, 3, 'Vans(2)', 4000, 'vans2', 'vans2.jpg'),
(99, 3, 3, 'Vans(3)', 3800, 'vans3', 'vans3.JPG'),
(100, 3, 3, 'Vans(4)', 3700, 'vans4', 'vans4.jpg'),
(101, 3, 3, 'Vans(5)', 3780, 'vans5', 'vans5.jpg'),
(102, 3, 3, 'Vans(6)', 4000, 'vans6', 'vans6.jpg'),
(103, 3, 3, 'Vans(7)', 3900, 'vans7', 'vans7.jpg'),
(104, 3, 3, 'Vans(8)', 3800, 'vans8', 'vans8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `firstname`, `lastname`, `email`, `password`, `mobile`, `address`, `address2`) VALUES
(9, 'Karen', 'Ditchon', 'karen@yahoo.com', '123', '2147483647', 'RH2', 'RH2'),
(10, 'Admin', 'Admin', 'adminako@gmail.com', 'admin', '2147483647', 'RH2', 'RH2'),
(11, 'Worms', 'Worms', 'worms234@yahoo.com', 'asdfffff', '2147483647', 'LUNAAA', 'COTABATOO'),
(12, 'Ivan', 'Ditchon', 'Ivan@gmail.com', '123', '2147483647', 'Rh2, Cotabato City', 'Rh2, Cotabato City'),
(13, 'Karen', 'Ditchon', 'karen@gmail.com', '123', '09876543211', 'Rh2', 'Rh2'),
(14, 'Augusto', 'Ditchon', 'augusto@gmail.com', '123', '12345678900', 'Rh2', 'Rh2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_cat` (`product_cat`),
  ADD KEY `product_brand` (`product_brand`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
