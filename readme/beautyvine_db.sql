-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2025 at 02:18 PM
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

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userId`, `productId`, `quantity`, `created_at`) VALUES
(9, '1', '3', 1, '2025-10-24 04:00:23');

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
(1, '7', '16', '5', 6250.00, 'declined', '2025-10-24 11:44:19'),
(2, '7', '17', '15', 18750.00, 'shipped', '2025-10-24 11:48:46'),
(5, '1', '8', '20', 2462460.00, 'shipped', '2025-10-24 12:50:54'),
(6, '1', '6', '5', 9450.00, 'pending', '2025-10-24 13:03:33'),
(19, '6', '3', '12', 15000.00, 'shipped', '2025-10-26 04:04:36'),
(20, '6', '3', '29', 36250.00, 'declined', '2025-10-26 07:38:27'),
(21, '6', '3', '3', 3750.00, 'declined', '2025-10-26 07:38:37'),
(22, '6', '15', '1', 540.00, 'pending', '2025-10-26 07:42:42'),
(23, '6', '3', '1', 1250.00, 'shipped', '2025-10-26 09:13:54'),
(24, '6', '4', '2', 19998.00, 'pending', '2025-10-26 09:43:21');

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
(3, 'ProBase Full Cover Matte Powder', 'The Pro/Base Full Cover Matte Powder is a lightweight pressed powder that provides full coverage with a smooth, matte finish. Ideal for oily or combination skin, it helps control shine and evens out the complexion without feeling heavy or cakey. Its talc-free, vegan, and cruelty-free formula includes skin-friendly ingredients like mica and vitamin E, making it both effective and gentle. Whether worn alone or over foundation, this powder offers a natural-looking, long-lasting finish perfect for everyday use.', 'face', 1250.00, 27, 'uploads/1761226768_ProBase Full Cover Matte Powder.png', '2025-10-23 13:39:28'),
(4, 'Miss Rose Shimmer Highlighter Powder Palette', 'The Pro/Base Full Cover Matte Powder is a lightweight pressed powder that provides full coverage with a smooth, matte finish. Ideal for oily or combination skin, it helps control shine and evens out the complexion without feeling heavy or cakey. Its talc-free, vegan, and cruelty-free formula includes skin-friendly ingredients like mica and vitamin E, making it both effective and gentle. Whether worn alone or over foundation, this powder offers a natural-looking, long-lasting finish perfect for everyday use.', 'face', 9999.00, 5, 'uploads/1761381846_Miss Rose Shimmer Highlighter Powder Palette.png', '2025-10-23 13:55:59'),
(7, 'Liquid Cream Blush', 'The Pro/Base Full Cover Matte Powder is a lightweight pressed powder that provides full coverage with a smooth, matte finish. Ideal for oily or combination skin, it helps control shine and evens out the complexion without feeling heavy or cakey. Its talc-free, vegan, and cruelty-free formula includes skin-friendly ingredients like mica and vitamin E, making it both effective and gentle. Whether worn alone or over foundation, this powder offers a natural-looking, long-lasting finish perfect for everyday use.', 'cheeks', 1300.00, 69696, 'uploads/1761228993_Liquid Cream Blush.png', '2025-10-23 14:16:33'),
(9, 'NARS CONCEALER', 'The Maybelline Fit Me Dewy + Smooth Liquid Foundation is a medium-coverage, hydrating foundation designed for normal to dry skin types. It provides a luminous finish that enhances skin\'s natural radiance while smoothing rough patches. Enriched with Vitamin E and glycerin, it helps maintain skin\'s moisture balance. The formula includes SPF 18 to offer basic sun protection. Dermatologist-tested and non-comedogenic, it aims to deliver a fresh, dewy complexion without clogging pores.', 'face', 1250.00, 345, 'uploads/1761369094_NARS CONCEALER.png', '2025-10-25 05:11:34'),
(10, 'LANCOME LA BASE PRO MAKE-UP PRIMER', 'The Lancôme La Base Pro Oil-Free Longwear Makeup Primer is a lightweight, silicone-based primer designed to create a smooth, matte canvas for makeup application. Its formula helps to minimize the appearance of pores and fine lines, enhancing the longevity and finish of foundation. The primer\'s oil-free composition makes it suitable for oily and combination skin types, providing a velvety texture that allows makeup to glide on effortlessly and stay in place throughout the day.', 'face', 1450.00, 431, 'uploads/1761369181_LANCOME LA BASE PRO MAKE-UP PRIMER.png', '2025-10-25 05:13:01'),
(11, 'MAYBELLINE FIT ME SMOOTH FOUNATION', 'The Maybelline Fit Me Dewy + Smooth Liquid Foundation is a medium-coverage, hydrating foundation designed for normal to dry skin types. It provides a luminous finish that enhances skin\'s natural radiance while smoothing rough patches. Enriched with Vitamin E and glycerin, it helps maintain skin\'s moisture balance. The formula includes SPF 18 to offer basic sun protection. Dermatologist-tested and non-comedogenic, it aims to deliver a fresh, dewy complexion without clogging pores.', 'face', 1450.00, 765, 'uploads/1761369215_MAYBELLINE FIT ME SMOOTH FOUNATION.png', '2025-10-25 05:13:35'),
(12, 'Airbrush Bronzer', 'The Pro/Base Full Cover Matte Powder is a lightweight pressed powder that provides full coverage with a smooth, matte finish. Ideal for oily or combination skin, it helps control shine and evens out the complexion without feeling heavy or cakey. Its talc-free, vegan, and cruelty-free formula includes skin-friendly ingredients like mica and vitamin E, making it both effective and gentle. Whether worn alone or over foundation, this powder offers a natural-looking, long-lasting finish perfect for everyday use.', 'cheeks', 1100.00, 8554, 'uploads/1761369257_Airbrush Bronzer.png', '2025-10-25 05:14:17');

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
(6, 'neo', 'neo@gmail.com', '$2y$10$amQh/Klkxun7iIBcnud9Muenh5mUVROuXNpO9xH8jYomAvzhAf.p2', 'user', 'verified', '2025-10-24 03:40:43'),
(8, 'camaro', 'camaro@gmail.com', '$2y$10$ARE8foFLeKddXROyub2xuOtlgQoafjsiREElYkA7TWxPlJwblgNxq', 'user', 'unverified', '2025-10-25 05:40:37');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `ordered`
--
ALTER TABLE `ordered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
