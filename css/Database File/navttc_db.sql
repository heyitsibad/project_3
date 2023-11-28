-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 07:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `navttc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `c_name`, `c_image`) VALUES
(9, 'Men', 'selling-products17.jpg'),
(10, 'Women', 'selling-products10.jpg'),
(11, 'Kids', 'single-image2.jpg'),
(12, 'New Born Baby', 'baby-product-detail.jpg'),
(13, 'Accessories', 'chain.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `u_id`, `u_name`, `p_id`, `p_name`, `p_price`, `p_qty`, `p_image`, `p_status`, `date`) VALUES
(1, 2, 'Abc', 2, 'Only Check Trouser', 2000, 2, 'product-03.jpg', 'Pending', '2023-08-10 17:36:32'),
(2, 0, 'Admin', 13, 'Black Shirt', 2500, 5, 'banner-01.jpg', 'Pending', '2023-08-21 15:02:23'),
(3, 0, 'Admin', 25, 'White Nike Shoes', 4500, 3, 'selling-products16.jpg', 'Pending', '2023-08-21 16:28:50');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_desc` varchar(255) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `p_status` varchar(255) NOT NULL,
  `p_category` varchar(255) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `p_name`, `p_desc`, `p_price`, `p_qty`, `p_status`, `p_category`, `p_image`, `date`) VALUES
(12, 'Black Coat', 'Best Quailty Provider', 3000, 34, 'New', 'Women', 'slide-05.jpg', '2023-08-21 13:41:12'),
(13, 'Black Shirt', 'Best Provider Quality', 2500, 12, 'New', 'Women', 'banner-01.jpg', '2023-08-21 13:42:42'),
(14, 'Black Topa with White Shirt', 'Best Provider Quality', 4000, 15, 'New', 'Kids', 'single-image2.jpg', '2023-08-21 13:43:49'),
(15, 'Baby Cloth 1', 'Best Provider Quality', 1000, 13, 'New', 'New Born Baby', 'baby1.jpg', '2023-08-21 13:56:10'),
(16, 'Baby Cloth 2', 'Best Provider Quality', 15, 1100, 'New', 'New Born Baby', 'baby2.jpg', '2023-08-21 13:57:10'),
(17, 'Baby Cloth 3', 'Best Provider Quality', 1200, 14, 'New', 'New Born Baby', 'baby3.jpg', '2023-08-21 14:00:26'),
(18, 'Orange Shirt', 'Best Provider Quality', 1400, 32, 'New', 'Women', 'about-02.jpg', '2023-08-21 14:18:48'),
(19, 'Female Pink Shirt', 'Best Provider Quality', 2500, 14, 'New', 'Women', 'banner1.jpg', '2023-08-21 14:20:02'),
(20, 'Blue ', 'Brilliant Quality Provider', 4400, 14, 'New', 'Accessories', 'watch1.jpg', '2023-08-21 14:26:30'),
(21, 'Brown Rolex Watch', 'Brilliant Quality Provider', 4500, 44, 'New', 'Accessories', 'Watch2.jpg', '2023-08-21 14:26:59'),
(22, 'Golden Watch', 'Brilliant Quality Provider', 5500, 15, 'New', 'Accessories', 'Watch3.jpg', '2023-08-21 14:27:31'),
(23, 'White Hoodies', 'Brilliant Quality Provider', 3400, 15, 'New', 'Men', 'selling-products17.jpg', '2023-08-21 14:34:53'),
(24, 'Black Full Sleeves Shirt', 'Brilliant Quality Provider', 900, 55, 'New', 'Men', 'cat-item3.jpg', '2023-08-21 14:35:42'),
(25, 'White Nike Shoes', 'Good Quality Provider', 4500, 13, 'New', 'Men', 'selling-products16.jpg', '2023-08-21 14:38:43'),
(26, 'White Half Sleeves Shirt', 'Good Quality Provider', 800, 13, 'New', 'Men', 'selling-products8.jpg', '2023-08-21 14:39:36'),
(27, 'White Full Sleeves shirt', 'Best Quality Provider', 1200, 16, 'New', 'Men', 'selling-products9.jpg', '2023-08-21 14:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE `registers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`id`, `name`, `email`, `password`, `role`, `date`) VALUES
(1, 'Admin', 'Admin@gmail.com', 'Admin123', 'Admin', '2023-08-02 05:12:42'),
(2, 'Abc', 'Abc@gmail.com', '123123', 'User', '2023-08-02 05:07:34'),
(3, 'Saad', 'Saad@gmail.com', '123123', 'User', '2023-08-02 05:07:38'),
(4, 'Ali', 'Ali@gmail.com', '123123', 'User', '2023-08-02 05:07:40'),
(5, 'Muhammad Ashraf', 'Ashraf@gmail.com', '123123', 'User', '2023-08-02 05:07:44'),
(6, 'Test', 'Test@gmail.com', '123123', 'User', '2023-08-02 05:07:46'),
(7, 'Ibad', 'Ibad@gmail.com', '123456', 'User', '2023-08-21 13:09:52'),
(8, 'Ali', 'Ali@gmail.com', '123456', 'User', '2023-08-21 13:10:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `registers`
--
ALTER TABLE `registers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
