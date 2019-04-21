-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 21, 2019 at 06:56 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rfsantennas`
--

-- --------------------------------------------------------

--
-- Table structure for table `antennafamily`
--

DROP TABLE IF EXISTS `antennafamily`;
CREATE TABLE IF NOT EXISTS `antennafamily` (
  `antennaFamilyId` int(11) NOT NULL AUTO_INCREMENT,
  `antennaFamilyName` text,
  PRIMARY KEY (`antennaFamilyId`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `antennafamily`
--

INSERT INTO `antennafamily` (`antennaFamilyId`, `antennaFamilyName`) VALUES
(54, 'Small Size'),
(55, 'High Band'),
(56, 'TDD'),
(57, 'Low Band'),
(58, 'Multi-Beam'),
(59, 'Multi-Band'),
(60, 'Hybrid FDD/TDD');

-- --------------------------------------------------------

--
-- Table structure for table `help`
--

DROP TABLE IF EXISTS `help`;
CREATE TABLE IF NOT EXISTS `help` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` text NOT NULL,
  `imagePath` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `help`
--

INSERT INTO `help` (`id`, `body`, `imagePath`) VALUES
(1, 'help help help help help help help help help help help helphelp h', 'http://www.cmgme.com/images/help.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_04_21_154917_create_xg_bands_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `optionName` text NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `optionName`, `active`) VALUES
(1, 'accessControl', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'alimorsel', 'aaa', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `usersweb`
--

DROP TABLE IF EXISTS `usersweb`;
CREATE TABLE IF NOT EXISTS `usersweb` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disabled',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usersweb_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usersweb`
--

INSERT INTO `usersweb` (`id`, `name`, `type`, `status`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'disabled', 'mohamad.naji@ahmad.said.com', NULL, '$2y$10$w.eYcLTXUPWb.09jnbl75eP7xj1R217N/IEfUB86nn0oPf1q4E./K', NULL, '2019-04-21 12:51:48', '2019-04-21 12:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `welcome`
--

DROP TABLE IF EXISTS `welcome`;
CREATE TABLE IF NOT EXISTS `welcome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE latin1_general_ci NOT NULL,
  `footer` text COLLATE latin1_general_ci NOT NULL,
  `Body` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `welcome`
--

INSERT INTO `welcome` (`id`, `title`, `footer`, `Body`) VALUES
(1, 'title title ', 'footer footer', 'body body');

-- --------------------------------------------------------

--
-- Table structure for table `xg_bands`
--

DROP TABLE IF EXISTS `xg_bands`;
CREATE TABLE IF NOT EXISTS `xg_bands` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `xg` int(11) NOT NULL,
  `bands` int(11) NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `xg_bands`
--

INSERT INTO `xg_bands` (`id`, `xg`, `bands`, `symbol`) VALUES
(57, 0, 5000, 'D'),
(56, 0, 4200, 'D'),
(55, 0, 3500, 'D'),
(54, 0, 2550, 'D'),
(53, 0, 2350, 'D'),
(52, 0, 2100, 'D'),
(51, 0, 1950, 'D'),
(50, 0, 1900, 'D'),
(49, 0, 1850, 'D'),
(48, 0, 1800, 'D'),
(47, 0, 1750, 'D'),
(46, 0, 1700, 'D'),
(45, 0, 1400, 'D'),
(44, 0, 900, 'D'),
(43, 0, 850, 'D'),
(42, 0, 800, 'D'),
(41, 0, 750, 'D'),
(40, 0, 700, 'D'),
(39, 0, 600, 'D');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
