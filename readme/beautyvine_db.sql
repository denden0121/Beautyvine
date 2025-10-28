-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2025 at 09:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beautyvine_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userId` varchar(250) NOT NULL,
  `productId` varchar(250) NOT NULL,
  `quantity` int(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ordered`
--

CREATE TABLE `ordered` (
  `id` int(11) NOT NULL,
  `userId` varchar(250) NOT NULL,
  `productId` varchar(250) NOT NULL,
  `quantity` varchar(250) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordered`
--

INSERT INTO `ordered` (`id`, `userId`, `productId`, `quantity`, `total`, `status`, `created_at`) VALUES
(39, '6', '3', '2', 2500.00, 'received', '2025-10-28 08:10:31'),
(40, '6', '17', '22', 11220.00, 'received', '2025-10-28 08:12:55'),
(41, '6', '12', '50', 55000.00, 'received', '2025-10-28 08:13:28');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `tags` varchar(225) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) DEFAULT 0,
  `img_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `tags`, `price`, `quantity`, `img_url`, `created_at`) VALUES
(3, 'ProBase Full Cover Matte Powder', 'The Pro/Base Full Cover Matte Powder is a lightweight pressed powder that provides full coverage with a smooth, matte finish. Ideal for oily or combination skin, it helps control shine and evens out the complexion without feeling heavy or cakey. Its talc-free, vegan, and cruelty-free formula includes skin-friendly ingredients like mica and vitamin E, making it both effective and gentle. Whether worn alone or over foundation, this powder offers a natural-looking, long-lasting finish perfect for everyday use.', 'face', 1250.00, 20, 'uploads/1761226768_ProBase Full Cover Matte Powder.png', '2025-10-23 13:39:28'),
(4, 'Miss Rose Shimmer Highlighter Powder Palette', 'The Pro/Base Full Cover Matte Powder is a lightweight pressed powder that provides full coverage with a smooth, matte finish. Ideal for oily or combination skin, it helps control shine and evens out the complexion without feeling heavy or cakey. Its talc-free, vegan, and cruelty-free formula includes skin-friendly ingredients like mica and vitamin E, making it both effective and gentle. Whether worn alone or over foundation, this powder offers a natural-looking, long-lasting finish perfect for everyday use.', 'face', 9999.00, 3, 'uploads/1761381846_Miss Rose Shimmer Highlighter Powder Palette.png', '2025-10-23 13:55:59'),
(7, 'Liquid Cream Blush', 'The Pro/Base Full Cover Matte Powder is a lightweight pressed powder that provides full coverage with a smooth, matte finish. Ideal for oily or combination skin, it helps control shine and evens out the complexion without feeling heavy or cakey. Its talc-free, vegan, and cruelty-free formula includes skin-friendly ingredients like mica and vitamin E, making it both effective and gentle. Whether worn alone or over foundation, this powder offers a natural-looking, long-lasting finish perfect for everyday use.', 'cheeks', 1300.00, 69695, 'uploads/1761228993_Liquid Cream Blush.png', '2025-10-23 14:16:33'),
(9, 'NARS CONCEALER', 'The Maybelline Fit Me Dewy + Smooth Liquid Foundation is a medium-coverage, hydrating foundation designed for normal to dry skin types. It provides a luminous finish that enhances skin\'s natural radiance while smoothing rough patches. Enriched with Vitamin E and glycerin, it helps maintain skin\'s moisture balance. The formula includes SPF 18 to offer basic sun protection. Dermatologist-tested and non-comedogenic, it aims to deliver a fresh, dewy complexion without clogging pores.', 'face', 1250.00, 335, 'uploads/1761369094_NARS CONCEALER.png', '2025-10-25 05:11:34'),
(10, 'LANCOME LA BASE PRO MAKE-UP PRIMER', 'The Lancôme La Base Pro Oil-Free Longwear Makeup Primer is a lightweight, silicone-based primer designed to create a smooth, matte canvas for makeup application. Its formula helps to minimize the appearance of pores and fine lines, enhancing the longevity and finish of foundation. The primer\'s oil-free composition makes it suitable for oily and combination skin types, providing a velvety texture that allows makeup to glide on effortlessly and stay in place throughout the day.', 'face', 1450.00, 431, 'uploads/1761369181_LANCOME LA BASE PRO MAKE-UP PRIMER.png', '2025-10-25 05:13:01'),
(11, 'MAYBELLINE FIT ME SMOOTH FOUNATION', 'The Maybelline Fit Me Dewy + Smooth Liquid Foundation is a medium-coverage, hydrating foundation designed for normal to dry skin types. It provides a luminous finish that enhances skin\'s natural radiance while smoothing rough patches. Enriched with Vitamin E and glycerin, it helps maintain skin\'s moisture balance. The formula includes SPF 18 to offer basic sun protection. Dermatologist-tested and non-comedogenic, it aims to deliver a fresh, dewy complexion without clogging pores.', 'face', 1450.00, 764, 'uploads/1761369215_MAYBELLINE FIT ME SMOOTH FOUNATION.png', '2025-10-25 05:13:35'),
(12, 'Airbrush Bronzer', 'The Pro/Base Full Cover Matte Powder is a lightweight pressed powder that provides full coverage with a smooth, matte finish. Ideal for oily or combination skin, it helps control shine and evens out the complexion without feeling heavy or cakey. Its talc-free, vegan, and cruelty-free formula includes skin-friendly ingredients like mica and vitamin E, making it both effective and gentle. Whether worn alone or over foundation, this powder offers a natural-looking, long-lasting finish perfect for everyday use.', 'cheeks', 1100.00, 8496, 'uploads/1761369257_Airbrush Bronzer.png', '2025-10-25 05:14:17'),
(17, 'Eyelash Curler', 'The Pro/Base Full Cover Matte Powder is a lightweight pressed powder that provides full coverage with a smooth, matte finish. Ideal for oily or combination skin, it helps control shine and evens out the complexion without feeling heavy or cakey. Its talc-free, vegan, and cruelty-free formula includes skin-friendly ingredients like mica and vitamin E, making it both effective and gentle. Whether worn alone or over foundation, this powder offers a natural-looking, long-lasting finish perfect for everyday use.', 'tools', 510.00, 101, 'uploads/1761639142_Eyelash Curler.png', '2025-10-28 08:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `userId` varchar(250) NOT NULL,
  `productId` varchar(250) NOT NULL,
  `productQuantity` varchar(250) NOT NULL,
  `productTotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `userId`, `productId`, `productQuantity`, `productTotal`, `created_at`) VALUES
(7, '6', '3', '2', 2500.00, '2025-10-28 08:11:06'),
(8, '6', '17', '22', 11220.00, '2025-10-28 08:13:49'),
(9, '6', '12', '50', 55000.00, '2025-10-28 08:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `designation` varchar(100) DEFAULT 'user',
  `status` varchar(250) NOT NULL DEFAULT 'unverified',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `designation`, `status`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$Fj68wRfoBa8Ex4KmvsJk0ONgEcBRI8CaaRPKqQcA8fd51HuZn7zRe', 'admin', 'verified', '2025-10-22 10:54:52'),
(6, 'neo', 'neo@gmail.com', '$2y$10$amQh/Klkxun7iIBcnud9Muenh5mUVROuXNpO9xH8jYomAvzhAf.p2', 'user', 'verified', '2025-10-24 03:40:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered`
--
ALTER TABLE `ordered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `ordered`
--
ALTER TABLE `ordered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
