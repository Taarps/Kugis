-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2015 at 05:56 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `norelit_test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE IF NOT EXISTS `parts` (
  `id` int(11) NOT NULL,
  `add_user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `part` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Detaļu tabula';

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`id`, `add_user_id`, `category_id`, `created_at`, `updated_at`, `part`, `note`) VALUES
(1, 1, 24, '2015-11-07 08:52:53', '2015-11-07 06:52:53', 'Toshiba Q300 RG4 (TLC) SSD 240GB 2.5-inch SATAIII 6GB/s SSD disks', NULL),
(2, 2, 24, '2015-11-07 08:53:16', '2015-11-07 06:53:16', 'KINGSTON SSDNow 120GB V300 SATA3 6,4cm SSD disks', NULL),
(3, 1, 24, '2015-11-07 08:53:16', '2015-11-07 06:53:16', 'SAMSUNG 850 EVO 250GB SSD 2.5inch SSD disks', NULL),
(4, 1, 3, '2015-11-07 11:09:21', '2015-11-07 09:09:21', 'Intel Pentium Dual Core G3450 3.4GHz 3MB LGA1150 procesors', NULL),
(5, 1, 3, '2015-11-07 11:16:09', '2015-11-07 09:16:09', 'Intel Core i7-4790 3.6GHz 8MB LGA1150 procesors', NULL),
(6, 1, 3, '2015-11-07 11:16:36', '2015-11-07 09:16:36', 'Intel Core i5-4460 3.2GHz 6MB LGA1150 procesors', NULL),
(7, 1, 3, '2015-11-07 11:18:17', '2015-11-07 09:18:17', 'AMD FX-Series FX-6350 SAM3+ BOX procesors', NULL),
(8, 1, 3, '2015-11-07 11:18:39', '2015-11-07 09:18:39', 'INTEL Core i3-4170 3 7GHz procesors', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parts_category`
--

CREATE TABLE IF NOT EXISTS `parts_category` (
  `id` int(11) NOT NULL,
  `add_user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `parts_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Detaļu kategorijas';

--
-- Dumping data for table `parts_category`
--

INSERT INTO `parts_category` (`id`, `add_user_id`, `created_at`, `updated_at`, `parts_category`, `note`) VALUES
(1, 1, '2015-11-06 14:32:02', '2015-11-06 12:32:02', 'hdd', NULL),
(2, 1, '2015-11-06 14:32:02', '2015-11-06 12:32:02', 'ram', NULL),
(3, 1, '2015-11-06 14:33:07', '2015-11-06 12:33:07', 'cpu', NULL),
(4, 1, '2015-11-06 14:33:07', '2015-11-06 12:33:07', 'korpusi', NULL),
(5, 1, '2015-11-06 14:53:58', '2015-11-06 12:53:58', 'monitori', NULL),
(6, 1, '2015-11-06 14:53:58', '2015-11-06 12:53:58', 'klaviatūras', NULL),
(7, 1, '2015-11-06 14:54:23', '2015-11-06 12:54:23', 'peles', NULL),
(8, 1, '2015-11-06 14:54:23', '2015-11-06 12:54:23', 'ventilatori', NULL),
(9, 1, '2015-11-06 14:54:44', '2015-11-06 12:54:44', 'mātesplates', NULL),
(10, 1, '2015-11-06 14:54:44', '2015-11-06 12:54:44', 'barošanas bloki', NULL),
(24, 1, '2015-11-07 08:51:54', '2015-11-07 06:51:54', 'ssd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` char(70) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(60) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` char(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `status`, `position`, `created_at`, `updated_at`, `email`, `password`, `last_name`, `first_name`, `remember_token`) VALUES
(1, 0, 0, '2015-11-08 18:54:11', '2015-11-08 16:54:21', '4andrisbriedis@gmail.com', '$2y$10$jJWSv2PZDweFxCdKlwOVhO0qLIBdxxvHt4D4zBMWCHnqVWJNvD262', 'Briedis', 'Andris', 'HFvTqmeXLdaVM8UeunPwJtWYn8GzN7mUcZtSPtOgaqy0H5WsiGdJWi2YLBhz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id`), ADD KEY `Index_p` (`part`), ADD KEY `Index_pi` (`part`,`category_id`);

--
-- Indexes for table `parts_category`
--
ALTER TABLE `parts_category`
  ADD PRIMARY KEY (`id`), ADD KEY `Index_p` (`parts_category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD KEY `Index_e` (`email`), ADD KEY `Index_lfe` (`last_name`,`first_name`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `parts_category`
--
ALTER TABLE `parts_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
