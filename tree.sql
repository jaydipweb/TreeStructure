-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 27, 2020 at 07:45 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `treestructure`
--

-- --------------------------------------------------------

--
-- Table structure for table `tree`
--

DROP TABLE IF EXISTS `tree`;
CREATE TABLE IF NOT EXISTS `tree` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Test` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tree`
--

INSERT INTO `tree` (`id`, `title`, `parent_id`, `created_at`, `updated_at`) VALUES
(146, 'Food', NULL, '2020-12-27 12:34:36', '2020-12-27 12:34:36'),
(147, 'Punjabi', 146, '2020-12-27 12:34:46', '2020-12-27 12:34:46'),
(148, 'Gujrati', 146, '2020-12-27 12:34:55', '2020-12-27 12:34:55'),
(149, 'Chinese', 146, '2020-12-27 12:35:13', '2020-12-27 12:35:13'),
(150, 'Paneer Tikka', 147, '2020-12-27 12:35:37', '2020-12-27 12:35:37'),
(151, 'Normal  Tikka', 150, '2020-12-27 12:36:28', '2020-12-27 12:36:28'),
(152, 'Jain Tikka', 150, '2020-12-27 12:36:45', '2020-12-27 12:36:45'),
(153, 'Sev Tameta', 148, '2020-12-27 12:37:50', '2020-12-27 12:37:50'),
(154, 'Dal Chaval', 148, '2020-12-27 12:38:14', '2020-12-27 12:38:14'),
(155, 'Manchurian', 149, '2020-12-27 12:38:35', '2020-12-27 12:38:35'),
(156, 'Chinese Bhel', 149, '2020-12-27 12:39:06', '2020-12-27 12:39:06'),
(157, 'Gravy Manchurian', 155, '2020-12-27 12:39:29', '2020-12-27 12:39:29'),
(158, 'Dry Manchurian', 155, '2020-12-27 12:39:52', '2020-12-27 12:39:52'),
(159, 'South Indian', 146, '2020-12-27 12:40:30', '2020-12-27 12:40:30'),
(160, 'Dosa', 159, '2020-12-27 12:40:57', '2020-12-27 12:40:57'),
(161, 'idli', 159, '2020-12-27 12:41:27', '2020-12-27 12:41:27');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tree`
--
ALTER TABLE `tree`
  ADD CONSTRAINT `Test` FOREIGN KEY (`parent_id`) REFERENCES `tree` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
