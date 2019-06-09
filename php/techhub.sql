-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2019 at 06:57 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Laptops'),
(2, 'Mobiles'),
(3, 'Drones'),
(4, 'Microprocesadores');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` int(11) DEFAULT NULL,
  `avatar` varchar(999) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `email`, `password`, `admin`, `avatar`) VALUES
(1, 'Pablo', 'Monaco', 'pablo@gmail.com', '$2y$10$n/WCX/FDhB4LYTx98BCjJOrnbsJ.CXHOlVSNKW5hBU.p4Zl2Kdsf.', NULL, 'default.jpeg'),
(2, 'Tomas', 'Monaco', 'tomas@gmail.com', '$2y$10$rcAYVYJjj2Pe3W0SbnrdpuadRCZpC3ykQCsIFMMKkALjVa.6j3Rl2', 1, '5cfc766a89766.jpg'),
(3, 'Lau', 'Monaco', 'lau@gmail.com', '$2y$10$X.oynri5I1AQcm8j2DaStutFj2BthYu4ezgtKtfw34zWY4YTCpcKq', NULL, '5cfad2109c763.png'),
(4, 'Anto', 'Monaco', 'anto@gmail.com', '$2y$10$jZC08LLOEIJ/glLpdW8tb.t8J2g9w7yIgEZ.DJ.YFSHhVq/8W6zaa', NULL, 'default.jpeg'),
(5, 'Julian', 'Rodriguez', 'julianr@gmail.com', '$2y$10$h9Uofx3zeI.6ly1eIcPACeQ1IvyWIhznjBGJ9mCkTgNmxYK7BPgPO', NULL, 'default.jpeg'),
(6, 'Oscar', 'Lee', 'oscarlee80@gmail.com', '$2y$10$qbrqIYywootk8S6hVmrkgugW1V6fZE7jA.cKDXLWI5W32hCon6sZC', 1, 'default.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `avatar` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trending` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `avatar`, `trending`, `active`, `category_id`) VALUES
(1, 'MacBook PRO', 'Alta Compu', '2000.00', '5cfc00e60d93e.jpg', NULL, NULL, 1),
(2, 'Asus zenBook', 'Ideal para diseñdores', '1800.00', '5cfc0118b02cb.jpg', NULL, NULL, 1),
(4, 'Samsung s10+', 'La rompe todaaa!', '1000.00', '5cfc7c02ac96a.jpg', NULL, NULL, 2),
(5, 'Intel i7', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem, perspiciatis laborum. Repellat voluptas, distinctio ipsum atque consequuntur cumque illo quis dicta cum ullam nesciunt blanditiis ea laudantium odio quos inventore!', '15000.00', '5cfd3365a2d32.jpg', 1, NULL, 4),
(6, 'Laptop Acer Aspire 3', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus laboriosam neque optio hic iure repudiandae distinctio? Vero, nobis placeat natus, ad accusamus illum recusandae rerum adipisci, libero delectus distinctio non.', '50000.00', '5cfd3759c5779.jpg', 1, NULL, 1),
(7, 'Drone 01', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus laboriosam neque optio hic iure repudiandae distinctio? Vero, nobis placeat natus, ad accusamus illum recusandae rerum adipisci, libero delectus distinctio non.', '1000.00', '5cfd37a23f3c3.jpg', 1, NULL, 3),
(8, 'Drone 02', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus laboriosam neque optio hic iure repudiandae distinctio? Vero, nobis placeat natus, ad accusamus illum recusandae rerum adipisci, libero delectus distinctio non.', '2000.00', '5cfd37b1d7b1d.jpg', NULL, NULL, 3),
(9, 'Drone 03', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus laboriosam neque optio hic iure repudiandae distinctio? Vero, nobis placeat natus, ad accusamus illum recusandae rerum adipisci, libero delectus distinctio non.', '3000.00', '5cfd37ce93188.jpg', 1, NULL, 3),
(10, 'Celular Huawei', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus laboriosam neque optio hic iure repudiandae distinctio? Vero, nobis placeat natus, ad accusamus illum recusandae rerum adipisci, libero delectus distinctio non.', '20000.00', '5cfd37e75a9f6.jpg', NULL, NULL, 2),
(11, 'Intel i3', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus laboriosam neque optio hic iure repudiandae distinctio? Vero, nobis placeat natus, ad accusamus illum recusandae rerum adipisci, libero delectus distinctio non.', '12000.00', '5cfd37fc7be56.jpg', 1, NULL, 4),
(12, 'Google Pixel 3', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus laboriosam neque optio hic iure repudiandae distinctio? Vero, nobis placeat natus, ad accusamus illum recusandae rerum adipisci, libero delectus distinctio non.', '60000.00', '5cfd380c90639.jpg', NULL, NULL, 2),
(13, 'Iphone X Red', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus laboriosam neque optio hic iure repudiandae distinctio? Vero, nobis placeat natus, ad accusamus illum recusandae rerum adipisci, libero delectus distinctio non.', '50000.00', '5cfd38275edeb.png', 1, NULL, 2),
(14, 'Laptop Lenovo Grosa', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus laboriosam neque optio hic iure repudiandae distinctio? Vero, nobis placeat natus, ad accusamus illum recusandae rerum adipisci, libero delectus distinctio non.', '180000.00', '5cfd384ac0e84.jpg', NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_categories_id_idx` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
