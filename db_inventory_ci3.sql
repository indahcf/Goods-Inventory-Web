-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2022 at 03:35 AM
-- Server version: 5.7.24
-- PHP Version: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory_ci3`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Elektronik', 'Sunt repudiandae ear', 'active', '2022-03-28 17:27:39', '2022-06-08 01:06:47'),
(3, 'Makanan', NULL, 'active', '2022-03-28 17:27:49', '2022-04-01 20:33:08'),
(15, 'Kesehatan', NULL, 'active', '2022-03-31 10:35:12', '2022-04-01 20:33:18'),
(16, 'Furniture', '', 'active', '2022-03-31 10:38:11', '2022-06-08 01:07:17'),
(17, 'Pakaian', 'Ex duis repudiandae ', 'inactive', '2022-03-31 10:38:57', '2022-06-08 01:07:05'),
(22, 'Alat Tulis Kantor', NULL, 'active', '2022-04-01 19:04:43', '2022-04-02 02:04:43'),
(24, 'Adminsas', NULL, 'active', '2022-04-19 07:17:21', '2022-04-19 14:17:21'),
(26, 'Ifeoma Cook', 'Rerum ipsum amet it', 'active', '2022-06-07 18:05:15', '2022-06-08 01:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Grant Young', '+1 (563) 782-5828', 'Eu porro et et sint ', 'active', '2022-04-03 10:33:07', '2022-06-07 20:25:12'),
(2, 'Gary Emerson', '1323987281', 'Est quis voluptatem ', 'active', '2022-04-03 10:33:28', '2022-04-03 17:33:28'),
(3, 'Yen Estes', '+1 (845) 798-2279', 'Non alias est minus ', 'active', '2022-04-03 10:41:48', '2022-04-03 17:41:48'),
(5, 'Cullen Moss', '+1 (105) 838-7275', 'Tenetur voluptates q', 'active', '2022-04-04 14:08:30', '2022-04-04 21:08:30'),
(6, 'Lara Aguilar', '+1 (687) 746-2828', 'Consequatur neque au', 'active', '2022-04-19 06:36:18', '2022-06-07 20:21:59'),
(7, 'Wang Caldwell', '4547353634', '76 Green Nobel Boulevard', 'active', '2022-04-19 07:18:58', '2022-04-19 14:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `incoming_items`
--

CREATE TABLE `incoming_items` (
  `id` bigint(20) NOT NULL,
  `supplier_id` bigint(20) DEFAULT NULL,
  `item_id` bigint(20) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incoming_items`
--

INSERT INTO `incoming_items` (`id`, `supplier_id`, `item_id`, `price`, `qty`, `created_at`, `updated_at`) VALUES
(10, 21, 1, 0, 251, '2022-06-07 15:44:05', '2022-06-07 22:44:05'),
(11, 17, 1, 0, 512, '2022-06-07 15:48:06', '2022-06-07 22:48:06'),
(12, 14, 26, 0, 99, '2022-06-07 17:08:01', '2022-06-08 00:08:01'),
(13, 14, 20, 0, 222, '2022-06-08 01:47:10', '2022-06-08 08:47:10'),
(14, 12, 20, 0, 924, '2022-06-08 01:47:18', '2022-06-08 08:47:18'),
(15, 22, 22, 0, 718, '2022-06-08 01:47:25', '2022-06-08 08:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `unit_id` bigint(20) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `stock`, `category_id`, `unit_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Warren Dickson', NULL, 843, 17, 26, 1, 'active', '2022-06-07 18:20:17', '2022-06-08 01:20:17'),
(3, 'Macon Burks', NULL, 871, 46, 17, 1, 'active', '2022-06-07 18:20:55', '2022-06-08 01:20:55'),
(5, 'Ursula Potter', NULL, 882, 18, 26, 3, 'active', '2022-06-07 18:22:47', '2022-06-08 01:23:38'),
(6, 'Chaim Tran', NULL, 573, 38, 22, 5, 'active', '2022-06-07 18:22:54', '2022-06-08 01:23:50'),
(7, 'Autumn Bradley', NULL, 517, 75, 16, 5, 'active', '2022-06-07 18:23:01', '2022-06-08 01:23:01'),
(11, 'Linus Greer', NULL, 951, 29, 1, 5, 'active', '2022-06-07 18:23:21', '2022-06-08 01:23:21'),
(12, 'Zeph Mcintyre', NULL, 700, 3, 24, 6, 'inactive', '2022-06-07 18:23:25', '2022-06-08 01:23:25'),
(13, 'Avye Bates', NULL, 407, 91, 15, 3, 'active', '2022-06-07 18:23:29', '2022-06-08 01:23:29'),
(16, 'Xanthus Leblanc', NULL, 873, 92, 26, 2, 'inactive', '2022-06-07 18:47:09', '2022-06-08 01:47:09'),
(17, 'Amity Pace', NULL, 916, 85, 17, 6, 'active', '2022-06-07 18:47:16', '2022-06-08 01:47:16'),
(18, 'Risa Michael', NULL, 849, 30, 16, 6, 'inactive', '2022-06-07 18:47:21', '2022-06-08 01:47:21'),
(19, 'Shana Vasquez', 'Vero aut et consequu', 996, 96, 17, 10, 'active', '2022-06-07 18:48:05', '2022-06-08 09:29:29'),
(20, 'Miranda Allison', NULL, 601, 1146, 24, 10, 'active', '2022-06-07 18:48:13', '2022-06-08 08:47:18'),
(21, 'Kirby Allison', 'Culpa non eaque dolo', 452, 65, 1, 8, 'inactive', '2022-06-07 18:48:18', '2022-06-08 09:29:19'),
(22, 'Quincy Sweeney', NULL, 237, 727, 16, 10, 'active', '2022-06-07 18:48:22', '2022-06-08 08:47:41'),
(23, 'Phyllis Garza', NULL, 384, 3, 16, 8, 'inactive', '2022-06-07 18:54:31', '2022-06-08 01:54:31'),
(28, 'Isabella Kelly', 'Impedit tempor iste', 39, 83, 17, 9, 'active', '2022-06-08 02:28:39', '2022-06-08 09:28:39'),
(29, 'Callum Parker', 'Exercitation do ut t', 88, 96, 24, 8, 'active', '2022-06-08 02:28:52', '2022-06-08 09:28:52'),
(30, 'Yvette Beard', 'Ab excepturi asperna', 169, 76, 15, 11, 'active', '2022-06-08 02:29:00', '2022-06-08 09:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `outcoming_items`
--

CREATE TABLE `outcoming_items` (
  `id` bigint(20) NOT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `item_id` bigint(20) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outcoming_items`
--

INSERT INTO `outcoming_items` (`id`, `customer_id`, `item_id`, `price`, `qty`, `created_at`, `updated_at`) VALUES
(1, 5, 2, 0, 20, '2022-06-07 16:10:45', '2022-06-07 23:10:45'),
(2, 3, 2, 0, 55, '2022-06-07 17:18:29', '2022-06-08 00:18:29'),
(3, 9, 22, 0, 22, '2022-06-07 18:56:30', '2022-06-08 01:56:30'),
(4, 2, 20, 0, 16, '2022-06-07 19:06:53', '2022-06-08 02:06:53'),
(5, 3, 21, 0, 2, '2022-06-07 19:08:23', '2022-06-08 02:08:23'),
(6, 5, 22, 0, 22, '2022-06-08 01:47:41', '2022-06-08 08:47:41'),
(7, 3, 21, 0, 22, '2022-06-08 01:47:51', '2022-06-08 08:47:51');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(10, 'Benedict Bassddd', '2437544957', 'Purwokerto', 'inactive', '2022-03-28 19:27:15', '2022-06-07 20:16:49'),
(12, 'Cristiano Ronaldo', '2437544957', '99 North First Street', 'inactive', '2022-03-31 12:30:51', '2022-06-07 20:17:30'),
(14, 'Lionel Messi', '085870005110', 'Argentina', 'active', '2022-04-01 13:44:16', '2022-04-01 20:44:16'),
(15, 'David Beckham', '11323446356', 'London, Inggris', 'active', '2022-04-01 13:45:43', '2022-04-01 20:45:43'),
(16, 'Keane Herrera', '33222', 'Ratione suscipit err', 'active', '2022-04-01 19:02:45', '2022-06-07 20:04:15'),
(17, 'Quinlan Villarreal', '+1(598)746-6006', 'Quibusdam veritatis ', 'active', '2022-04-03 03:19:29', '2022-06-07 20:04:19'),
(18, 'Damian Mullins', '22333333', 'Incididunt maiores f', 'active', '2022-04-03 10:29:22', '2022-04-03 17:29:22'),
(21, 'Octavius Reese', '+1 (759) 414-5629', 'Nesciunt ut et qui sdsdsds', 'inactive', '2022-06-07 13:11:57', '2022-06-07 20:12:04'),
(22, 'Sage Carlson', '+1 (579) 351-5543', 'Non veritatis minus ', 'inactive', '2022-06-07 13:23:49', '2022-06-07 20:23:49'),
(23, 'Carly Lindsey', '+1 (175) 983-3826', 'Incidunt minus enim', 'active', '2022-06-07 18:54:50', '2022-06-08 01:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`) VALUES
(8, 'm'),
(9, 'kg'),
(10, 'pcs'),
(11, 'box');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','pegawai') NOT NULL DEFAULT 'pegawai',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$RBlETLbBnyk4J6T1DTIIlOsSHsOYH.xHZ4UOT/EFBcH65tK8YeT1a', 'admin', 'active', '2022-03-31 12:38:28', '2022-06-08 06:23:37'),
(2, 'Wang Caldwell', 'zyrexoji@mailinator.com', '$2y$10$.bj8P2LKaNWS3xIIo2VTY.NCcIzxm0aMSj70BrfHLbj1bJMTIizD.', 'pegawai', 'active', '2022-03-31 12:43:13', '2022-06-08 04:06:24'),
(3, 'Wang Caldwell', 'gajo@mailinator.com', '$2y$10$rYDZrZPDtPNeKYlaNl5F/.9Ii8do/nEJNkbJESw2.Q5BMyOAdfpEq', 'admin', 'active', '2022-04-01 17:04:39', '2022-06-08 04:06:21'),
(4, 'Sacha Anthony', 'sds@gmail.com', '$2y$10$Gf/r/5DipnxPb6b1fF0K3OD5PleqM6.vJdvRz3DcCmR4dmDQE9zOu', 'admin', 'active', '2022-04-01 17:07:16', '2022-04-02 00:07:16'),
(5, 'Makanan Lezat', 'aldy@gmail.com', '$2y$10$7BOch87Qwn8nHJu7Q0XYU.3y1kIT1kFkrGdm9Qj6gNg0ZVQIphukq', 'admin', 'active', '2022-04-01 17:11:53', '2022-04-02 00:11:53'),
(6, 'Baxter Norton', 'hucaguz@mailinator.com', '$2y$10$Kz8WlHGqwVFHDLWjFeVrW.4v6bS7LywXox80a1ic9y4HjSJ0UhPdO', 'pegawai', 'active', '2022-04-01 17:17:01', '2022-06-08 04:06:17'),
(7, 'Leroy Vasquez', 'netikihimu@mailinator.com', '$2y$10$T/gAQu3N6YsG1nj9dJJJ0.D4nnJi5WOE4fBXy45kdyoZaIwDJsP6i', 'pegawai', 'active', '2022-04-01 18:58:40', '2022-06-08 04:06:27'),
(8, 'May Flowers', 'qobucimyf@mailinator.com', '$2y$10$nMbpZmDC4sZoGArdoivl1uP4yq3Flr73MgB6z0a.TJQ2Y5iu3tx0y', 'pegawai', 'active', '2022-04-01 19:00:30', '2022-04-02 02:00:30'),
(11, 'Alexandra Woods', 'tididuli@mailinator.com', '$2y$10$K8PR7BYh5tOXfglX4zp6YeZwH4vCj8Se0vacF/Rxw9Xj1kEK0zRuy', 'pegawai', 'inactive', '2022-06-07 23:14:19', '2022-06-08 06:17:15'),
(12, 'Lareina Conner', 'pegawai@gmail.com', '$2y$10$RBlETLbBnyk4J6T1DTIIlOsSHsOYH.xHZ4UOT/EFBcH65tK8YeT1a', 'pegawai', 'active', '2022-06-07 23:18:49', '2022-06-08 06:18:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incoming_items`
--
ALTER TABLE `incoming_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `outcoming_items`
--
ALTER TABLE `outcoming_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`customer_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `incoming_items`
--
ALTER TABLE `incoming_items`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `outcoming_items`
--
ALTER TABLE `outcoming_items`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `incoming_items`
--
ALTER TABLE `incoming_items`
  ADD CONSTRAINT `incoming_items_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `incoming_items_ibfk_3` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `outcoming_items`
--
ALTER TABLE `outcoming_items`
  ADD CONSTRAINT `outcoming_items_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `outcoming_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
