-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 21, 2020 at 11:32 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greenwich`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Game Controler'),
(2, 'Accessories'),
(3, 'Smart Phone'),
(4, 'Laptops'),
(6, 'Headphone');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `order_id` int(11) NOT NULL,
  `quantity` int(30) NOT NULL,
  `order_product` int(11) NOT NULL,
  `user_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`order_id`, `quantity`, `order_product`, `user_order`) VALUES
(1, 1, 4, 3),
(2, 2, 2, 4),
(3, 1, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`) VALUES
(1, '2020-08-25'),
(2, '2020-08-27'),
(3, '2020-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `product_price` decimal(20,0) NOT NULL,
  `product_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_image`, `product_price`, `product_category`) VALUES
(2, 'Nintendo Switch', 'pro2.jpg', '80', 1),
(3, 'JBL Speaker', 'pro3.jpg', '10', 2),
(4, 'PS4', 'pro2.png', '120', 1),
(5, 'Macbook Pro 13 inches', 'pro7.png', '120', 4),
(6, 'Samsung Galaxy S20', 'pro6.jpg', '150', 3),
(7, 'Retro Game Collection', 'pro4.png', '100', 1),
(8, 'Laptop Asus Vivobook (15.6 FH)', 'pro8.jpg', '590', 4),
(9, 'Airpods 2', 'pro9.jpg', '50', 2),
(10, 'IPhone 11 Pro', 'pro10.png', '1000', 3),
(11, 'Joysticks', 'pro11.png', '9', 2),
(12, 'Laptop Lenovo Ideapad L340', 'pro12.jpg', '520', 4),
(14, 'IPhone 11 Pro Max', 'pro14.jpg', '1200', 3),
(15, 'Samsung Headphone', 'pro15.jpg', '80', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'dcddb75469b4b4875094e14561e573d8'),
(3, 'quanganh', 'quanganhlb2508@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f'),
(4, 'quangbinh', 'binh123@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f'),
(5, 'thuyhien', 'hienboo@gmail.com', '3d2172418ce305c7d16d4b05597c6a59'),
(6, 'quangtrung', 'quangtrung123@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f'),
(7, 'manhhung', 'manhhung123@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_product` (`order_product`),
  ADD KEY `user_order` (`user_order`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_category` (`product_category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`order_product`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`user_order`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orderdetail` (`order_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_category`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
