-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 13, 2019 at 06:50 AM
-- Server version: 5.7.23
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tailieuweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `serializes`
--

DROP TABLE IF EXISTS `serializes`;
CREATE TABLE IF NOT EXISTS `serializes` (
  `serialize_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `serial_topic_id` int(11) DEFAULT 0,
  `sequence` int(11) DEFAULT 0,
  `slideshow_id` int(11) DEFAULT NULL,
  `serialize_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `serialize_slug` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serialize_overview` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serialize_description` longtext COLLATE utf8_unicode_ci,
  `serialize_image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `serialize_files` varchar(10000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serialize_status` tinyint(4) DEFAULT NULL,
  `cache_comments` text COLLATE utf8_unicode_ci,
  `cache_other_serializes` text COLLATE utf8_unicode_ci,
  `cache_time` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`serialize_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
