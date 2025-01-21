-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 21, 2025 at 09:44 AM
-- Server version: 8.3.0
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clt`
--
CREATE DATABASE IF NOT EXISTS `clt` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `clt`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'کمره', '2024-12-11 07:46:16', '2024-12-11 07:46:16'),
(2, 'پاورسپلای', '2024-12-11 07:46:33', '2024-12-11 07:46:33'),
(3, 'اچ دی ام آی', '2024-12-11 07:47:15', '2024-12-11 07:47:15'),
(4, 'وی جی ای', '2024-12-11 07:47:23', '2024-12-11 07:47:23'),
(5, 'سویچ', '2024-12-11 07:47:36', '2024-12-11 07:47:36'),
(6, 'اسپلیتور', '2024-12-11 07:48:01', '2024-12-11 07:48:01'),
(7, 'مخابره', '2024-12-11 07:48:24', '2024-12-11 07:48:24'),
(8, 'کیبل آر جی 45', '2024-12-11 07:48:39', '2024-12-11 07:48:39'),
(9, 'کیبل آر جی 59', '2024-12-11 07:49:27', '2024-12-11 07:49:27'),
(10, 'جاین باکس', '2024-12-11 07:50:07', '2024-12-11 07:50:07'),
(11, 'پیپ خرتوم', '2024-12-11 07:50:26', '2024-12-11 07:50:26'),
(12, 'هاردیسک', '2024-12-11 07:50:37', '2024-12-11 07:50:37'),
(13, 'دی وی آر ', '2024-12-11 07:50:55', '2024-12-11 07:50:55'),
(14, 'ان وی آر', '2024-12-11 07:51:01', '2024-12-11 07:51:01'),
(15, 'مانیتور', '2024-12-11 07:53:17', '2024-12-11 07:53:17');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `post_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

DROP TABLE IF EXISTS `income`;
CREATE TABLE IF NOT EXISTS `income` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `info` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `customer_name`, `project_name`, `project_quantity`, `quantity`, `price`, `project_date`, `bill_image`, `status`, `info`, `created_at`, `updated_at`) VALUES
(1, 'کل پروژه', 'کل پروژه', '1', '1', '143000', '2024-12-13', 'noimage.jpg', 0, '<p>کل عاید تمام پروژه ها در مدت 6 ماه 2024</p>', '2024-12-11 09:01:03', '2024-12-13 13:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `asset_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asset_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `asset_code`, `asset_image`, `asset_name`, `quantity`, `specification`, `model`, `serial`, `price`, `purchase_date`, `status`, `created_at`, `updated_at`, `info`) VALUES
(13, 'کل موجودی پروژه', '000951.jpg', 'کل موجودی پروژه', 'نامحدود', 'وسایل کمره', 'وسایل مختلف', 'وسایل دفتر', '143000', '2024-12-13', 0, '2024-12-11 09:06:04', '2024-12-13 13:23:25', '<p>کل موجودی به مبلغ 143000 افغانی به خانه انتقال داده شد</p>');

-- --------------------------------------------------------

--
-- Table structure for table `outcome`
--

DROP TABLE IF EXISTS `outcome`;
CREATE TABLE IF NOT EXISTS `outcome` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bill_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `belongs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `bill_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outcome`
--

INSERT INTO `outcome` (`id`, `bill_no`, `name`, `belongs`, `category`, `quantity`, `price`, `date`, `bill_image`, `info`, `created_at`, `updated_at`) VALUES
(1, 'کل پروژه', 'کل پروژه', 'کل پروژه', 'تمام مصارف', '1', '143000', '2024-12-13', 'noimage.jpg', '<p>کل مصارف تمام پروژه ها در مدت 6 ماه 2024</p>', '2024-12-11 09:04:24', '2024-12-13 13:21:27');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `user_id` int NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `post_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0:active 1:inactive',
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `info` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `code`, `slug`, `name`, `model`, `body`, `post_image`, `status`, `amount`, `price`, `created_at`, `updated_at`, `info`) VALUES
(1, 1, 2, '000951', '000951', 'کمره داخلی داهوا', 'DH-HAC-T1A21P-A', '<p class=\"text\" style=\"direction: ltr; box-sizing: border-box; margin: 0px; padding: 0px; font-size: 24px; color: #333333; font-family: \'Open Sans\';\" data-v-253bec56=\"\" data-gtm-vis-recent-on-screen10552706_181=\"1602\" data-gtm-vis-first-on-screen10552706_181=\"1602\" data-gtm-vis-total-visible-time10552706_181=\"100\" data-gtm-vis-has-fired10552706_181=\"1\" data-gtm-vis-first-on-screen10552706_184=\"1606\" data-gtm-vis-first-on-screen10552706_192=\"1615\" data-gtm-vis-first-on-screen10552706_193=\"1625\" data-gtm-vis-first-on-screen10552706_194=\"1637\" data-gtm-vis-recent-on-screen10552706_195=\"1652\" data-gtm-vis-first-on-screen10552706_195=\"1652\" data-gtm-vis-total-visible-time10552706_195=\"100\" data-gtm-vis-has-fired10552706_195=\"1\" data-gtm-vis-first-on-screen10552706_196=\"1655\" data-gtm-vis-first-on-screen10552706_217=\"1675\" data-gtm-vis-recent-on-screen10552706_194=\"517637\" data-gtm-vis-total-visible-time10552706_194=\"100\" data-gtm-vis-has-fired10552706_194=\"1\" data-gtm-vis-recent-on-screen10552706_193=\"517653\" data-gtm-vis-total-visible-time10552706_193=\"100\" data-gtm-vis-has-fired10552706_193=\"1\" data-gtm-vis-recent-on-screen10552706_184=\"517669\" data-gtm-vis-total-visible-time10552706_184=\"100\" data-gtm-vis-has-fired10552706_184=\"1\" data-gtm-vis-recent-on-screen10552706_192=\"517686\" data-gtm-vis-total-visible-time10552706_192=\"100\" data-gtm-vis-has-fired10552706_192=\"1\" data-gtm-vis-recent-on-screen10552706_196=\"517702\" data-gtm-vis-total-visible-time10552706_196=\"100\" data-gtm-vis-has-fired10552706_196=\"1\" data-gtm-vis-recent-on-screen10552706_217=\"517718\" data-gtm-vis-total-visible-time10552706_217=\"100\" data-gtm-vis-has-fired10552706_217=\"1\">2MP HDCVI IR Eyeball Camera</p>\r\n<div style=\"box-sizing: border-box; line-height: 1.5; color: #333333; font-family: \'Open Sans\';\" data-v-253bec56=\"\">\r\n<p style=\"direction: ltr; box-sizing: border-box; margin: 0px; padding: 0px;\" data-gtm-vis-has-fired10552706_181=\"1\" data-gtm-vis-first-on-screen10552706_184=\"1609\" data-gtm-vis-first-on-screen10552706_192=\"1616\" data-gtm-vis-first-on-screen10552706_193=\"1626\" data-gtm-vis-first-on-screen10552706_194=\"1639\" data-gtm-vis-has-fired10552706_195=\"1\" data-gtm-vis-first-on-screen10552706_196=\"1657\" data-gtm-vis-first-on-screen10552706_217=\"1677\" data-gtm-vis-recent-on-screen10552706_194=\"517640\" data-gtm-vis-total-visible-time10552706_194=\"100\" data-gtm-vis-has-fired10552706_194=\"1\" data-gtm-vis-recent-on-screen10552706_193=\"517656\" data-gtm-vis-total-visible-time10552706_193=\"100\" data-gtm-vis-has-fired10552706_193=\"1\" data-gtm-vis-recent-on-screen10552706_184=\"517671\" data-gtm-vis-total-visible-time10552706_184=\"100\" data-gtm-vis-has-fired10552706_184=\"1\" data-gtm-vis-recent-on-screen10552706_192=\"517688\" data-gtm-vis-total-visible-time10552706_192=\"100\" data-gtm-vis-has-fired10552706_192=\"1\" data-gtm-vis-recent-on-screen10552706_196=\"517704\" data-gtm-vis-total-visible-time10552706_196=\"100\" data-gtm-vis-has-fired10552706_196=\"1\" data-gtm-vis-recent-on-screen10552706_217=\"517722\" data-gtm-vis-total-visible-time10552706_217=\"100\" data-gtm-vis-has-fired10552706_217=\"1\">&gt; Max. 30 fps@1080p</p>\r\n<p style=\"direction: ltr; box-sizing: border-box; margin: 0px; padding: 0px;\" data-gtm-vis-has-fired10552706_181=\"1\" data-gtm-vis-first-on-screen10552706_184=\"1610\" data-gtm-vis-first-on-screen10552706_192=\"1617\" data-gtm-vis-first-on-screen10552706_193=\"1627\" data-gtm-vis-first-on-screen10552706_194=\"1641\" data-gtm-vis-has-fired10552706_195=\"1\" data-gtm-vis-first-on-screen10552706_196=\"1658\" data-gtm-vis-first-on-screen10552706_217=\"1679\" data-gtm-vis-recent-on-screen10552706_194=\"517646\" data-gtm-vis-total-visible-time10552706_194=\"100\" data-gtm-vis-has-fired10552706_194=\"1\" data-gtm-vis-recent-on-screen10552706_193=\"517662\" data-gtm-vis-total-visible-time10552706_193=\"100\" data-gtm-vis-has-fired10552706_193=\"1\" data-gtm-vis-recent-on-screen10552706_184=\"517679\" data-gtm-vis-total-visible-time10552706_184=\"100\" data-gtm-vis-has-fired10552706_184=\"1\" data-gtm-vis-recent-on-screen10552706_192=\"517696\" data-gtm-vis-total-visible-time10552706_192=\"100\" data-gtm-vis-has-fired10552706_192=\"1\" data-gtm-vis-recent-on-screen10552706_196=\"517711\" data-gtm-vis-total-visible-time10552706_196=\"100\" data-gtm-vis-has-fired10552706_196=\"1\" data-gtm-vis-recent-on-screen10552706_217=\"517730\" data-gtm-vis-total-visible-time10552706_217=\"100\" data-gtm-vis-has-fired10552706_217=\"1\"><span style=\"box-sizing: border-box;\">&gt;</span>&nbsp;CVI/CVBS/AHD/TVI switchable</p>\r\n<p style=\"direction: ltr; box-sizing: border-box; margin: 0px; padding: 0px;\" data-gtm-vis-has-fired10552706_181=\"1\" data-gtm-vis-first-on-screen10552706_184=\"1611\" data-gtm-vis-first-on-screen10552706_192=\"1618\" data-gtm-vis-first-on-screen10552706_193=\"1629\" data-gtm-vis-first-on-screen10552706_194=\"1642\" data-gtm-vis-has-fired10552706_195=\"1\" data-gtm-vis-first-on-screen10552706_196=\"1664\" data-gtm-vis-first-on-screen10552706_217=\"1681\" data-gtm-vis-recent-on-screen10552706_194=\"517648\" data-gtm-vis-total-visible-time10552706_194=\"100\" data-gtm-vis-has-fired10552706_194=\"1\" data-gtm-vis-recent-on-screen10552706_193=\"517664\" data-gtm-vis-total-visible-time10552706_193=\"100\" data-gtm-vis-has-fired10552706_193=\"1\" data-gtm-vis-recent-on-screen10552706_184=\"517681\" data-gtm-vis-total-visible-time10552706_184=\"100\" data-gtm-vis-has-fired10552706_184=\"1\" data-gtm-vis-recent-on-screen10552706_192=\"517698\" data-gtm-vis-total-visible-time10552706_192=\"100\" data-gtm-vis-has-fired10552706_192=\"1\" data-gtm-vis-recent-on-screen10552706_196=\"517713\" data-gtm-vis-total-visible-time10552706_196=\"100\" data-gtm-vis-has-fired10552706_196=\"1\" data-gtm-vis-recent-on-screen10552706_217=\"517732\" data-gtm-vis-total-visible-time10552706_217=\"100\" data-gtm-vis-has-fired10552706_217=\"1\"><span style=\"box-sizing: border-box;\">&gt;</span>&nbsp;3.6 mm fixed lens (2.8 mm, 6 mm optional)</p>\r\n<p style=\"direction: ltr; box-sizing: border-box; margin: 0px; padding: 0px;\" data-gtm-vis-has-fired10552706_181=\"1\" data-gtm-vis-first-on-screen10552706_184=\"1612\" data-gtm-vis-first-on-screen10552706_192=\"1619\" data-gtm-vis-first-on-screen10552706_193=\"1630\" data-gtm-vis-first-on-screen10552706_194=\"1644\" data-gtm-vis-has-fired10552706_195=\"1\" data-gtm-vis-first-on-screen10552706_196=\"1666\" data-gtm-vis-first-on-screen10552706_217=\"1682\" data-gtm-vis-recent-on-screen10552706_194=\"517650\" data-gtm-vis-total-visible-time10552706_194=\"100\" data-gtm-vis-has-fired10552706_194=\"1\" data-gtm-vis-recent-on-screen10552706_193=\"517666\" data-gtm-vis-total-visible-time10552706_193=\"100\" data-gtm-vis-has-fired10552706_193=\"1\" data-gtm-vis-recent-on-screen10552706_184=\"517682\" data-gtm-vis-total-visible-time10552706_184=\"100\" data-gtm-vis-has-fired10552706_184=\"1\" data-gtm-vis-recent-on-screen10552706_192=\"517699\" data-gtm-vis-total-visible-time10552706_192=\"100\" data-gtm-vis-has-fired10552706_192=\"1\" data-gtm-vis-recent-on-screen10552706_196=\"517715\" data-gtm-vis-total-visible-time10552706_196=\"100\" data-gtm-vis-has-fired10552706_196=\"1\" data-gtm-vis-recent-on-screen10552706_217=\"517734\" data-gtm-vis-total-visible-time10552706_217=\"100\" data-gtm-vis-has-fired10552706_217=\"1\"><span style=\"box-sizing: border-box;\">&gt;</span>&nbsp;Max. IR length 20 m, Smart IR</p>\r\n<p style=\"direction: ltr; box-sizing: border-box; margin: 0px; padding: 0px;\" data-gtm-vis-has-fired10552706_181=\"1\" data-gtm-vis-first-on-screen10552706_184=\"1613\" data-gtm-vis-first-on-screen10552706_192=\"1620\" data-gtm-vis-first-on-screen10552706_193=\"1631\" data-gtm-vis-first-on-screen10552706_194=\"1645\" data-gtm-vis-has-fired10552706_195=\"1\" data-gtm-vis-first-on-screen10552706_196=\"1667\" data-gtm-vis-first-on-screen10552706_217=\"1684\" data-gtm-vis-recent-on-screen10552706_194=\"517651\" data-gtm-vis-total-visible-time10552706_194=\"100\" data-gtm-vis-has-fired10552706_194=\"1\" data-gtm-vis-recent-on-screen10552706_193=\"517667\" data-gtm-vis-total-visible-time10552706_193=\"100\" data-gtm-vis-has-fired10552706_193=\"1\" data-gtm-vis-recent-on-screen10552706_184=\"517684\" data-gtm-vis-total-visible-time10552706_184=\"100\" data-gtm-vis-has-fired10552706_184=\"1\" data-gtm-vis-recent-on-screen10552706_192=\"517701\" data-gtm-vis-total-visible-time10552706_192=\"100\" data-gtm-vis-has-fired10552706_192=\"1\" data-gtm-vis-recent-on-screen10552706_196=\"517717\" data-gtm-vis-total-visible-time10552706_196=\"100\" data-gtm-vis-has-fired10552706_196=\"1\" data-gtm-vis-recent-on-screen10552706_217=\"517735\" data-gtm-vis-total-visible-time10552706_217=\"100\" data-gtm-vis-has-fired10552706_217=\"1\">&gt; Built-in Mic(-A)</p>\r\n<p style=\"direction: ltr; box-sizing: border-box; margin: 0px; padding: 0px;\" data-gtm-vis-has-fired10552706_181=\"1\" data-gtm-vis-first-on-screen10552706_184=\"1613\" data-gtm-vis-first-on-screen10552706_192=\"1622\" data-gtm-vis-first-on-screen10552706_193=\"1633\" data-gtm-vis-first-on-screen10552706_194=\"1647\" data-gtm-vis-has-fired10552706_195=\"1\" data-gtm-vis-first-on-screen10552706_196=\"1669\" data-gtm-vis-first-on-screen10552706_217=\"1685\" data-gtm-vis-recent-on-screen10552706_194=\"517595\" data-gtm-vis-total-visible-time10552706_194=\"100\" data-gtm-vis-has-fired10552706_194=\"1\" data-gtm-vis-recent-on-screen10552706_193=\"517599\" data-gtm-vis-total-visible-time10552706_193=\"100\" data-gtm-vis-has-fired10552706_193=\"1\" data-gtm-vis-recent-on-screen10552706_184=\"517602\" data-gtm-vis-total-visible-time10552706_184=\"100\" data-gtm-vis-has-fired10552706_184=\"1\" data-gtm-vis-recent-on-screen10552706_192=\"517614\" data-gtm-vis-total-visible-time10552706_192=\"100\" data-gtm-vis-has-fired10552706_192=\"1\" data-gtm-vis-recent-on-screen10552706_196=\"517618\" data-gtm-vis-total-visible-time10552706_196=\"100\" data-gtm-vis-has-fired10552706_196=\"1\" data-gtm-vis-recent-on-screen10552706_217=\"517633\" data-gtm-vis-total-visible-time10552706_217=\"100\" data-gtm-vis-has-fired10552706_217=\"1\"><span style=\"box-sizing: border-box;\">&gt;</span>&nbsp;12 VDC</p>\r\n</div>', '000951.jpg', 0, '4', '951', '2024-12-11 07:58:27', '2024-12-11 08:16:51', '<p>دو عدد داخی و دو عدد بیرونی موجود میباشد</p>'),
(2, 1, 2, '000952', '000952', 'کمره بیرونی داهوا', 'DH-HAC-B1A21P-A', '<p class=\"text\" style=\"direction: ltr; box-sizing: border-box; margin: 0px; padding: 0px; font-size: 24px; color: #333333; font-family: \'Open Sans\';\" data-v-253bec56=\"\" data-gtm-vis-recent-on-screen10552706_181=\"1246\" data-gtm-vis-first-on-screen10552706_181=\"1246\" data-gtm-vis-total-visible-time10552706_181=\"100\" data-gtm-vis-has-fired10552706_181=\"1\" data-gtm-vis-recent-on-screen10552706_184=\"1251\" data-gtm-vis-first-on-screen10552706_184=\"1251\" data-gtm-vis-total-visible-time10552706_184=\"100\" data-gtm-vis-has-fired10552706_184=\"1\" data-gtm-vis-recent-on-screen10552706_192=\"1281\" data-gtm-vis-first-on-screen10552706_192=\"1281\" data-gtm-vis-total-visible-time10552706_192=\"100\" data-gtm-vis-has-fired10552706_192=\"1\" data-gtm-vis-recent-on-screen10552706_193=\"1301\" data-gtm-vis-first-on-screen10552706_193=\"1301\" data-gtm-vis-total-visible-time10552706_193=\"100\" data-gtm-vis-has-fired10552706_193=\"1\" data-gtm-vis-recent-on-screen10552706_194=\"1319\" data-gtm-vis-first-on-screen10552706_194=\"1319\" data-gtm-vis-total-visible-time10552706_194=\"100\" data-gtm-vis-has-fired10552706_194=\"1\" data-gtm-vis-recent-on-screen10552706_195=\"1337\" data-gtm-vis-first-on-screen10552706_195=\"1337\" data-gtm-vis-total-visible-time10552706_195=\"100\" data-gtm-vis-has-fired10552706_195=\"1\" data-gtm-vis-recent-on-screen10552706_196=\"1341\" data-gtm-vis-first-on-screen10552706_196=\"1341\" data-gtm-vis-total-visible-time10552706_196=\"100\" data-gtm-vis-has-fired10552706_196=\"1\" data-gtm-vis-recent-on-screen10552706_217=\"1358\" data-gtm-vis-first-on-screen10552706_217=\"1358\" data-gtm-vis-total-visible-time10552706_217=\"100\" data-gtm-vis-has-fired10552706_217=\"1\">2MP HDCVI IR Bullet Camera</p>\r\n<div style=\"box-sizing: border-box; line-height: 1.5; color: #333333; font-family: \'Open Sans\';\" data-v-253bec56=\"\">\r\n<p style=\"direction: ltr; box-sizing: border-box; margin: 0px; padding: 0px;\" data-gtm-vis-has-fired10552706_181=\"1\" data-gtm-vis-recent-on-screen10552706_184=\"1254\" data-gtm-vis-first-on-screen10552706_184=\"1254\" data-gtm-vis-total-visible-time10552706_184=\"100\" data-gtm-vis-has-fired10552706_184=\"1\" data-gtm-vis-recent-on-screen10552706_192=\"1284\" data-gtm-vis-first-on-screen10552706_192=\"1285\" data-gtm-vis-total-visible-time10552706_192=\"100\" data-gtm-vis-has-fired10552706_192=\"1\" data-gtm-vis-recent-on-screen10552706_193=\"1303\" data-gtm-vis-first-on-screen10552706_193=\"1303\" data-gtm-vis-total-visible-time10552706_193=\"100\" data-gtm-vis-has-fired10552706_193=\"1\" data-gtm-vis-recent-on-screen10552706_194=\"1321\" data-gtm-vis-first-on-screen10552706_194=\"1321\" data-gtm-vis-total-visible-time10552706_194=\"100\" data-gtm-vis-has-fired10552706_194=\"1\" data-gtm-vis-has-fired10552706_195=\"1\" data-gtm-vis-recent-on-screen10552706_196=\"1344\" data-gtm-vis-first-on-screen10552706_196=\"1344\" data-gtm-vis-total-visible-time10552706_196=\"100\" data-gtm-vis-has-fired10552706_196=\"1\" data-gtm-vis-recent-on-screen10552706_217=\"1360\" data-gtm-vis-first-on-screen10552706_217=\"1360\" data-gtm-vis-total-visible-time10552706_217=\"100\" data-gtm-vis-has-fired10552706_217=\"1\">&gt; Max. 30 fps@1080p</p>\r\n<p style=\"direction: ltr; box-sizing: border-box; margin: 0px; padding: 0px;\" data-gtm-vis-has-fired10552706_181=\"1\" data-gtm-vis-recent-on-screen10552706_184=\"1264\" data-gtm-vis-first-on-screen10552706_184=\"1264\" data-gtm-vis-total-visible-time10552706_184=\"100\" data-gtm-vis-has-fired10552706_184=\"1\" data-gtm-vis-recent-on-screen10552706_192=\"1286\" data-gtm-vis-first-on-screen10552706_192=\"1286\" data-gtm-vis-total-visible-time10552706_192=\"100\" data-gtm-vis-has-fired10552706_192=\"1\" data-gtm-vis-recent-on-screen10552706_193=\"1305\" data-gtm-vis-first-on-screen10552706_193=\"1305\" data-gtm-vis-total-visible-time10552706_193=\"100\" data-gtm-vis-has-fired10552706_193=\"1\" data-gtm-vis-recent-on-screen10552706_194=\"1325\" data-gtm-vis-first-on-screen10552706_194=\"1325\" data-gtm-vis-total-visible-time10552706_194=\"100\" data-gtm-vis-has-fired10552706_194=\"1\" data-gtm-vis-has-fired10552706_195=\"1\" data-gtm-vis-recent-on-screen10552706_196=\"1345\" data-gtm-vis-first-on-screen10552706_196=\"1345\" data-gtm-vis-total-visible-time10552706_196=\"100\" data-gtm-vis-has-fired10552706_196=\"1\" data-gtm-vis-recent-on-screen10552706_217=\"1362\" data-gtm-vis-first-on-screen10552706_217=\"1362\" data-gtm-vis-total-visible-time10552706_217=\"100\" data-gtm-vis-has-fired10552706_217=\"1\"><span style=\"box-sizing: border-box;\">&gt;</span>&nbsp;CVI/CVBS/AHD/TVI switchable</p>\r\n<p style=\"direction: ltr; box-sizing: border-box; margin: 0px; padding: 0px;\" data-gtm-vis-has-fired10552706_181=\"1\" data-gtm-vis-recent-on-screen10552706_184=\"1266\" data-gtm-vis-first-on-screen10552706_184=\"1266\" data-gtm-vis-total-visible-time10552706_184=\"100\" data-gtm-vis-has-fired10552706_184=\"1\" data-gtm-vis-recent-on-screen10552706_192=\"1288\" data-gtm-vis-first-on-screen10552706_192=\"1288\" data-gtm-vis-total-visible-time10552706_192=\"100\" data-gtm-vis-has-fired10552706_192=\"1\" data-gtm-vis-recent-on-screen10552706_193=\"1308\" data-gtm-vis-first-on-screen10552706_193=\"1308\" data-gtm-vis-total-visible-time10552706_193=\"100\" data-gtm-vis-has-fired10552706_193=\"1\" data-gtm-vis-recent-on-screen10552706_194=\"1327\" data-gtm-vis-first-on-screen10552706_194=\"1327\" data-gtm-vis-total-visible-time10552706_194=\"100\" data-gtm-vis-has-fired10552706_194=\"1\" data-gtm-vis-has-fired10552706_195=\"1\" data-gtm-vis-recent-on-screen10552706_196=\"1347\" data-gtm-vis-first-on-screen10552706_196=\"1347\" data-gtm-vis-total-visible-time10552706_196=\"100\" data-gtm-vis-has-fired10552706_196=\"1\" data-gtm-vis-recent-on-screen10552706_217=\"1365\" data-gtm-vis-first-on-screen10552706_217=\"1365\" data-gtm-vis-total-visible-time10552706_217=\"100\" data-gtm-vis-has-fired10552706_217=\"1\"><span style=\"box-sizing: border-box;\">&gt;</span>&nbsp;3.6 mm fixed lens (2.8 mm, 6 mm optional)</p>\r\n<p style=\"direction: ltr; box-sizing: border-box; margin: 0px; padding: 0px;\" data-gtm-vis-has-fired10552706_181=\"1\" data-gtm-vis-recent-on-screen10552706_184=\"1268\" data-gtm-vis-first-on-screen10552706_184=\"1268\" data-gtm-vis-total-visible-time10552706_184=\"100\" data-gtm-vis-has-fired10552706_184=\"1\" data-gtm-vis-recent-on-screen10552706_192=\"1290\" data-gtm-vis-first-on-screen10552706_192=\"1290\" data-gtm-vis-total-visible-time10552706_192=\"100\" data-gtm-vis-has-fired10552706_192=\"1\" data-gtm-vis-recent-on-screen10552706_193=\"1310\" data-gtm-vis-first-on-screen10552706_193=\"1310\" data-gtm-vis-total-visible-time10552706_193=\"100\" data-gtm-vis-has-fired10552706_193=\"1\" data-gtm-vis-recent-on-screen10552706_194=\"1329\" data-gtm-vis-first-on-screen10552706_194=\"1329\" data-gtm-vis-total-visible-time10552706_194=\"100\" data-gtm-vis-has-fired10552706_194=\"1\" data-gtm-vis-has-fired10552706_195=\"1\" data-gtm-vis-recent-on-screen10552706_196=\"1349\" data-gtm-vis-first-on-screen10552706_196=\"1349\" data-gtm-vis-total-visible-time10552706_196=\"100\" data-gtm-vis-has-fired10552706_196=\"1\" data-gtm-vis-recent-on-screen10552706_217=\"1368\" data-gtm-vis-first-on-screen10552706_217=\"1368\" data-gtm-vis-total-visible-time10552706_217=\"100\" data-gtm-vis-has-fired10552706_217=\"1\"><span style=\"box-sizing: border-box;\">&gt;</span>&nbsp;Max. IR length 20 m, Smart IR</p>\r\n<p style=\"direction: ltr; box-sizing: border-box; margin: 0px; padding: 0px;\" data-gtm-vis-has-fired10552706_181=\"1\" data-gtm-vis-recent-on-screen10552706_184=\"1270\" data-gtm-vis-first-on-screen10552706_184=\"1270\" data-gtm-vis-total-visible-time10552706_184=\"100\" data-gtm-vis-has-fired10552706_184=\"1\" data-gtm-vis-recent-on-screen10552706_192=\"1292\" data-gtm-vis-first-on-screen10552706_192=\"1292\" data-gtm-vis-total-visible-time10552706_192=\"100\" data-gtm-vis-has-fired10552706_192=\"1\" data-gtm-vis-recent-on-screen10552706_193=\"1312\" data-gtm-vis-first-on-screen10552706_193=\"1312\" data-gtm-vis-total-visible-time10552706_193=\"100\" data-gtm-vis-has-fired10552706_193=\"1\" data-gtm-vis-recent-on-screen10552706_194=\"1331\" data-gtm-vis-first-on-screen10552706_194=\"1331\" data-gtm-vis-total-visible-time10552706_194=\"100\" data-gtm-vis-has-fired10552706_194=\"1\" data-gtm-vis-has-fired10552706_195=\"1\" data-gtm-vis-recent-on-screen10552706_196=\"1350\" data-gtm-vis-first-on-screen10552706_196=\"1350\" data-gtm-vis-total-visible-time10552706_196=\"100\" data-gtm-vis-has-fired10552706_196=\"1\" data-gtm-vis-recent-on-screen10552706_217=\"1371\" data-gtm-vis-first-on-screen10552706_217=\"1371\" data-gtm-vis-total-visible-time10552706_217=\"100\" data-gtm-vis-has-fired10552706_217=\"1\">&gt; Built-in Mic(-A)</p>\r\n<p style=\"direction: ltr; box-sizing: border-box; margin: 0px; padding: 0px;\" data-gtm-vis-has-fired10552706_181=\"1\" data-gtm-vis-recent-on-screen10552706_184=\"1272\" data-gtm-vis-first-on-screen10552706_184=\"1272\" data-gtm-vis-total-visible-time10552706_184=\"100\" data-gtm-vis-has-fired10552706_184=\"1\" data-gtm-vis-recent-on-screen10552706_192=\"1294\" data-gtm-vis-first-on-screen10552706_192=\"1294\" data-gtm-vis-total-visible-time10552706_192=\"100\" data-gtm-vis-has-fired10552706_192=\"1\" data-gtm-vis-recent-on-screen10552706_193=\"1314\" data-gtm-vis-first-on-screen10552706_193=\"1314\" data-gtm-vis-total-visible-time10552706_193=\"100\" data-gtm-vis-has-fired10552706_193=\"1\" data-gtm-vis-recent-on-screen10552706_194=\"1332\" data-gtm-vis-first-on-screen10552706_194=\"1332\" data-gtm-vis-total-visible-time10552706_194=\"100\" data-gtm-vis-has-fired10552706_194=\"1\" data-gtm-vis-has-fired10552706_195=\"1\" data-gtm-vis-recent-on-screen10552706_196=\"1351\" data-gtm-vis-first-on-screen10552706_196=\"1351\" data-gtm-vis-total-visible-time10552706_196=\"100\" data-gtm-vis-has-fired10552706_196=\"1\" data-gtm-vis-recent-on-screen10552706_217=\"1375\" data-gtm-vis-first-on-screen10552706_217=\"1375\" data-gtm-vis-total-visible-time10552706_217=\"100\" data-gtm-vis-has-fired10552706_217=\"1\"><span style=\"box-sizing: border-box;\">&gt;</span>&nbsp;IP67,12 VDC</p>\r\n</div>', '000952.jpg', 0, '4', '1235', '2024-12-11 08:48:52', '2024-12-11 08:48:52', '');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0: Completion, 1: Incomplete',
  `bill_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project_name`, `customer_name`, `status`, `bill_image`, `price`, `start_date`, `end_date`, `created_at`, `updated_at`, `info`) VALUES
(1, 'ریاست اقتصاد کاپیسا', 'انجنیر روح الله روحین', 0, 'noimage.jpg', '20000', '2024-08-13', '2024-09-20', '2024-12-11 08:55:14', '2024-12-11 08:55:14', '<p>بل، تاریخ و قیمت بعدا درج میگردد</p>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `task`, `username`, `password`, `user_image`, `register_date`) VALUES
(1, 'نجیب الله', 'حسینی', 'najeeb@gmail.com', 'ادمین کورکنس تکنالوژی', 'najeeb.hussaini', '202cb962ac59075b964b07152d234b70', 'user7-128x128.jpg', '2024-10-30 09:02:15'),
(2, 'اسدالله', 'گوهری', 'asadullah.gawhari@gmail.com', 'مدیر دیتابس کورلنکس', 'asadullah.gawhari', '202cb962ac59075b964b07152d234b70', 'user2-160x160.jpg', '2024-11-11 15:15:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
