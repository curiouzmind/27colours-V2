-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2016 at 10:57 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `27colours`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `read_more` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `blogs_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `caption` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_count` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cat` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `galleries_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `published`, `caption`, `image`, `comment_count`, `user_id`, `created_at`, `updated_at`, `cat`) VALUES
(63, 1, 'Zoobar party bus', 'img/galleries/cJLkxxt8NBkT.jpg', 0, 63, '2015-02-26 11:20:41', '2015-02-26 11:20:41', 'modelling'),
(64, 1, 'The Baddest•', 'img/galleries/Fv8g9ohLqx9I.jpg', 0, 65, '2015-02-27 04:06:10', '2015-02-27 04:06:10', 'others'),
(65, 1, 'Make over kit', 'img/galleries/Sd6bMcEdLtcX.PNG', 0, 68, '2015-02-28 00:58:53', '2015-02-28 00:58:53', 'modelling'),
(66, 1, '', 'img/galleries/CHKORwxrbJAg.JPG', 0, 71, '2015-02-28 16:21:43', '2015-02-28 16:21:43', 'others'),
(67, 1, '', 'img/galleries/OsfkyPR2Pz3r.png', 0, 72, '2015-02-28 20:13:33', '2015-02-28 20:13:33', 'others'),
(68, 1, 'recent work', 'img/galleries/ywa6mDFxuGJF.jpg', 0, 72, '2015-02-28 20:16:26', '2015-02-28 20:16:26', 'modelling'),
(69, 1, '', 'img/galleries/yVJMIKGt1hgc.jpg', 0, 73, '2015-02-28 22:03:45', '2015-02-28 22:03:45', 'modelling'),
(70, 1, 'what a man wants...', 'img/galleries/fMnqpCI0p96D.jpg', 0, 64, '2015-02-28 22:44:41', '2015-02-28 22:44:41', 'others'),
(71, 1, 'loyalty...', 'img/galleries/Hj7yWNgw9L8n.jpeg', 0, 64, '2015-02-28 22:46:39', '2015-02-28 22:46:39', 'others'),
(72, 1, '', 'img/galleries/1sxGJEcm4CSS.jpg', 0, 74, '2015-03-01 00:05:00', '2015-03-01 00:05:00', 'others'),
(73, 1, '', 'img/galleries/5a3cVehC0LpX.jpg', 0, 76, '2015-03-01 01:57:20', '2015-03-01 01:57:20', 'modelling'),
(74, 1, '', 'img/galleries/Qc4dJOoINZdG.jpg', 0, 78, '2015-03-01 02:56:38', '2015-03-01 02:56:38', 'modelling'),
(75, 1, 'Cameey', 'img/galleries/wJPmPIQgQVX2.jpg', 0, 78, '2015-03-03 05:05:58', '2015-03-03 05:05:58', 'others'),
(76, 1, 'Make up by Urs truly...', 'img/galleries/6cMCjo9aizeR.jpg', 0, 71, '2015-03-05 00:41:33', '2015-03-05 00:41:33', 'modelling'),
(77, 1, 'Upcoming Make up wiz...', 'img/galleries/SA5MWa1Fj3oG.jpg', 0, 71, '2015-03-05 00:44:42', '2015-03-05 00:44:42', 'modelling'),
(78, 1, '', 'img/galleries/274Amc2ws4wm.jpg', 0, 78, '2015-03-06 23:01:45', '2015-03-06 23:01:45', 'modelling'),
(79, 1, 'colour play ', 'img/galleries/K4ZXtIXLpelD.jpg', 0, 71, '2015-03-07 23:14:29', '2015-03-07 23:14:29', 'modelling'),
(80, 1, '', 'img/galleries/3AaJ47cVneNY.jpg', 0, 84, '2015-03-09 13:22:31', '2015-03-09 13:22:31', 'modelling'),
(81, 1, '', 'img/galleries/jm8ytOFKdiig.jpg', 0, 72, '2015-03-10 16:01:20', '2015-03-10 16:01:20', 'modelling'),
(82, 1, 'simpleMode', 'img/galleries/0tkyJVAEJPwH.jpg', 0, 63, '2015-03-11 04:00:17', '2015-03-11 04:00:17', 'modelling'),
(83, 1, 'Portrait picture with different grades', 'img/galleries/26cerfzWfryb.jpg', 0, 84, '2015-03-12 20:42:10', '2015-03-12 20:42:10', 'modelling'),
(84, 1, 'nikkai bridal look', 'img/galleries/SIS3M8Nz2I1R.jpg', 0, 89, '2015-03-15 21:06:43', '2015-03-15 21:06:43', 'modelling'),
(85, 1, 'editorial makeup look', 'img/galleries/M8bdiQSDJQlU.jpg', 0, 89, '2015-03-15 21:08:29', '2015-03-15 21:08:29', 'modelling'),
(86, 1, '', 'img/galleries/kOoq0hfhJrz7.jpg', 0, 89, '2015-03-15 21:10:02', '2015-03-15 21:10:02', 'modelling'),
(87, 1, '', 'img/galleries/MWDzRdv4YcUn.jpg', 0, 89, '2015-03-15 21:14:29', '2015-03-15 21:14:29', 'modelling'),
(88, 1, '', 'img/galleries/czDNEGyajgb4.jpg', 0, 89, '2015-03-15 21:15:00', '2015-03-15 21:15:00', 'modelling'),
(89, 1, 'Kicked off The Journey of a thousand mile | new single #yourlove out sooon !!! ', 'img/galleries/sSFYtGumN3SQ.jpg', 0, 65, '2015-03-17 16:42:10', '2015-03-17 16:42:10', 'others'),
(90, 1, '', 'img/galleries/k5w9LegwT7uu.jpg', 0, 78, '2015-03-21 04:50:04', '2015-03-21 04:50:04', 'others'),
(91, 1, '', 'img/galleries/pih8dn4Z3YD0.jpg', 0, 78, '2015-03-21 04:57:33', '2015-03-21 04:57:33', 'modelling'),
(92, 1, 'makeup and photography lover...', 'img/galleries/2d7471tnIIFF.jpg', 0, 96, '2015-03-23 17:09:58', '2015-03-23 17:09:58', 'others'),
(93, 1, 'family...........thE grEatEst', 'img/galleries/XEd4skLlR4lP.jpg', 0, 98, '2015-03-26 04:23:29', '2015-03-26 04:23:29', 'modelling'),
(94, 1, 'whEn sOmEbOdy lOvEs yOu.......', 'img/galleries/Co8y1zSyaNlV.jpg', 0, 98, '2015-03-26 04:24:41', '2015-03-26 04:24:41', 'modelling'),
(95, 1, 'this is how i feel', 'img/galleries/kMQWgKjHeeAy.jpg', 0, 102, '2015-04-23 02:50:11', '2015-04-23 02:50:11', 'others'),
(97, 1, 'He is in the house', 'img/galleries/TV46WSPMzHb1.jpg', 0, 103, '2015-06-22 11:32:47', '2015-06-22 11:32:47', 'Others'),
(98, 1, 'Mother and cute daughter', 'img/galleries/fmatFUWKGu1n.jpg', 0, 103, '2015-06-22 12:06:19', '2015-06-22 12:06:19', 'Others'),
(100, 1, 'It''s almost that time of the year again', 'img/galleries/ZORqN5Bzz0Gi.jpg', 0, 103, '2015-06-22 12:11:40', '2015-06-22 12:11:40', 'Others'),
(102, 1, 'It was time to buggy down', 'img/galleries/C0DftdcAgIOR.jpg', 0, 103, '2015-06-22 12:17:14', '2015-06-22 12:17:14', 'Modelling'),
(109, 1, 'This is submitting oh', 'img/galleries/2MsHtUihUTJj.jpg', 0, 103, '2015-06-24 21:20:18', '2015-06-24 21:20:18', 'Others'),
(110, 1, 'Isn''t she lovely', 'img/galleries/j3mZnotEDCFB.jpg', 0, 103, '2015-06-24 21:22:18', '2015-06-24 21:22:18', 'Others'),
(111, 1, '1 on 1', 'img/galleries/2AwzhAXZbf1E.png', 0, 63, '2015-07-01 14:51:49', '2015-07-01 14:51:49', 'Others'),
(112, 1, 'joswaggz', 'img/galleries/h504P35IZFgY.jpg', 0, 111, '2015-07-06 20:01:48', '2015-07-06 20:01:48', 'Others'),
(113, 1, 'Chopstix', 'img/galleries/pWO4Yow20QbN.jpg', 0, 64, '2015-07-10 07:36:30', '2015-07-10 07:36:30', 'Modelling'),
(114, 1, 'Ajaa- One girl....Coming soon', 'img/galleries/26a0K7XV20zg.jpg', 0, 64, '2015-07-14 17:54:48', '2015-07-14 17:54:48', 'Others'),
(115, 1, 'Icon', 'img/galleries/qLJ1ADo4lB2J.png', 0, 64, '2015-07-19 18:50:53', '2015-07-19 18:50:53', 'Modelling'),
(116, 1, 'Cameey ', 'img/galleries/iM76XZS8LjBt.JPG', 0, 64, '2015-07-19 18:58:34', '2015-07-19 18:58:34', 'Modelling'),
(117, 1, 'Grenadines homes', 'img/galleries/cs7phmFD95qz.jpg', 0, 130, '2015-08-09 02:17:55', '2015-08-09 02:17:55', 'Others'),
(118, 1, 'getting higher ', 'img/galleries/pVEXMsnz0bnz.jpg', 0, 120, '2015-08-13 02:11:37', '2015-08-13 02:11:37', 'Others'),
(119, 1, '#EMIMIMO BY OMOBOY OUT SOON', 'img/galleries/XbwU8SjL9A6C.jpg', 0, 112, '2015-08-25 08:36:35', '2015-08-25 08:36:35', 'Others'),
(120, 1, '', 'img/galleries/DYMviJknI82T.jpg', 0, 78, '2015-08-29 04:28:47', '2015-08-29 04:28:47', 'Modelling'),
(121, 1, '', 'img/galleries/DV3LcWa4cnov.jpg', 0, 78, '2015-08-29 04:30:41', '2015-08-29 04:30:41', 'Modelling'),
(122, 1, '', 'img/galleries/Nq58ZGVKiVmJ.jpg', 0, 78, '2015-08-29 04:32:23', '2015-08-29 04:32:23', 'Modelling'),
(123, 1, '', 'img/galleries/fnNXp8rwBc5Q.jpg', 0, 137, '2015-09-25 18:27:31', '2015-09-25 18:27:31', 'Modelling');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_tag`
--

DROP TABLE IF EXISTS `gallery_tag`;
CREATE TABLE IF NOT EXISTS `gallery_tag` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `gallery_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_tag_gallery_id_foreign` (`gallery_id`),
  KEY `gallery_tag_tag_id_foreign` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT,
  `likeable_id` int(15) UNSIGNED NOT NULL,
  `likeable_type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_11_07_104803_confide_setup_users_table', 1),
('2014_11_07_155916_create_tables_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reminders`
--

DROP TABLE IF EXISTS `password_reminders`;
CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_reminders`
--

INSERT INTO `password_reminders` (`email`, `token`, `created_at`) VALUES
('Godot41@yahoo.com', '884a575594147a796b68cab4ef8fc614', '2015-02-19 21:40:43'),
('Godot41@yahoo.com', '32d3ee68c2f47e22859613d9c5571617', '2015-02-19 21:40:44'),
('justmuaa@yahoo.com', 'b0a79a5b9ef27a35e68fcc6bec414f07', '2015-03-03 00:41:54'),
('femzyxboiz@rocketmail.com', '60481c07da75699c43e88069d9787144', '2015-06-10 18:44:26'),
('femzyxboiz@rocketmail.com', 'a27c904da3b447a384cddec5e9168f66', '2015-06-10 18:48:14'),
('femzyxboiz@rocketmail.com', 'f70f7f89c26f6ed8c82a5557dc2839fb', '2015-06-10 19:10:05'),
('femzyxboiz@rocketmail.com', '1d38c6fb08476f70190b86add2ce6db6', '2015-06-10 19:19:37'),
('femzyxboiz@rocketmail.com', '06c49ae393599af7a4e3db8e41dcf0b0', '2015-06-10 19:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `profile_photos`
--

DROP TABLE IF EXISTS `profile_photos`;
CREATE TABLE IF NOT EXISTS `profile_photos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `profile_photos_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile_photos`
--

INSERT INTO `profile_photos` (`id`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(24, 'img/profile_photos/BUSJPPg4wogv.png', 63, '2015-02-26 11:15:38', '2016-01-14 04:47:51'),
(25, 'img/profile_photos/f9hHbVPP9Xvn', 65, '2015-02-27 03:31:19', '2015-02-27 03:31:19'),
(26, 'img/profile_photos/gozr0CO1uvtV', 64, '2015-02-27 06:04:30', '2015-02-27 06:04:30'),
(27, 'img/profile_photos/V9Uu5G2P9Y87', 66, '2015-02-27 14:13:49', '2015-02-27 14:13:49'),
(28, 'img/profile_photos/DjaapFO7jyOs', 67, '2015-02-27 14:39:24', '2015-02-27 16:00:23'),
(29, 'img/profile_photos/0vHaQBnxYSWb', 68, '2015-02-28 00:51:38', '2015-02-28 00:51:38'),
(30, 'img/profile_photos/wN9LobVm8kPK', 72, '2015-02-28 20:11:43', '2015-02-28 20:11:43'),
(31, 'img/profile_photos/fC0jVwTU3yxL', 73, '2015-02-28 21:46:34', '2015-02-28 21:46:34'),
(32, 'img/profile_photos/wDO0JrXlwBlq', 74, '2015-03-01 00:00:27', '2015-03-01 00:00:27'),
(33, 'img/profile_photos/Katny4qsrfhY.png', 78, '2015-03-01 03:05:05', '2015-08-27 16:13:26'),
(34, 'img/profile_photos/H9bYpmgicjLZ', 79, '2015-03-01 20:16:22', '2015-03-01 20:16:22'),
(35, 'img/profile_photos/hv0SbzsONhuX', 82, '2015-03-03 00:46:28', '2015-03-03 00:46:28'),
(36, 'img/profile_photos/p2rcr7tYjNEy', 71, '2015-03-05 00:38:44', '2015-06-24 02:27:47'),
(37, 'img/profile_photos/zRVY1j7ucGrI', 84, '2015-03-09 13:26:24', '2015-03-09 13:26:24'),
(38, 'img/profile_photos/LwRjzTIHc8CK', 86, '2015-03-13 16:01:05', '2015-03-13 16:01:05'),
(39, 'img/profile_photos/952PxycWpPUG', 89, '2015-03-15 21:04:43', '2015-03-15 21:04:43'),
(40, 'img/profile_photos/TIvOkcuqtdJa', 90, '2015-03-16 06:19:48', '2015-03-16 06:19:48'),
(41, 'img/profile_photos/B4xqQmluCbfK', 98, '2015-03-26 04:15:04', '2015-03-26 04:15:04'),
(42, 'img/profile_photos/uaWSifQdxoEr', 100, '2015-03-31 20:35:47', '2015-03-31 20:35:47'),
(43, 'img/profile_photos/TkejP7xV55aS.jpg', 103, '2015-04-20 08:06:36', '2015-07-27 22:50:22'),
(44, 'img/profile_photos/mSSFWgwEYHyk.jpg', 102, '2015-04-23 02:46:59', '2015-09-05 12:47:03'),
(45, 'img/profile_photos/Y1uposE82YCr', 104, '2015-05-02 07:14:27', '2015-05-02 07:14:27'),
(46, 'img/profile_photos/LdYxrC4bWkLN', 107, '2015-06-22 18:25:11', '2015-06-22 18:25:11'),
(47, 'img/profile_photos/jYpm8fp9bx5t.jpg', 109, '2015-06-24 23:31:11', '2015-06-24 23:31:11'),
(48, 'img/profile_photos/4U7La8lL1YOJ.jpg', 111, '2015-07-06 19:06:43', '2015-07-06 19:06:43'),
(49, 'img/profile_photos/lQv2GJoH7ZcU.jpg', 69, '2015-07-25 17:10:51', '2015-07-25 17:10:51'),
(50, 'img/profile_photos/5ltCoUBzDvge.jpg', 125, '2015-07-28 21:41:19', '2015-07-28 21:41:19'),
(51, 'img/profile_photos/WDxzy75OwB7y.jpg', 127, '2015-07-28 21:51:21', '2015-07-28 21:51:21'),
(52, 'img/profile_photos/LveWYQvcDq29.jpg', 128, '2015-07-29 04:32:57', '2015-07-29 04:32:57'),
(53, 'img/profile_photos/CyRPAK0phkKX.jpg', 115, '2015-08-02 05:17:50', '2015-08-02 05:17:50'),
(54, 'img/profile_photos/xpdVRdIHBoB7.jpg', 129, '2015-08-03 23:48:27', '2015-08-03 23:48:27'),
(55, 'img/profile_photos/AUgO0AOXrtKC.jpg', 130, '2015-08-09 02:12:34', '2015-08-09 02:12:34'),
(56, 'img/profile_photos/4G6JRwKNtGx2.jpg', 120, '2015-08-13 01:56:38', '2015-08-13 01:56:38'),
(57, 'img/profile_photos/r1UdKfhWcCeI.jpg', 112, '2015-08-25 08:30:44', '2015-08-25 08:30:44'),
(58, 'img/profile_photos/TbVn1ZWh7TRE.jpg', 118, '2015-08-26 11:06:45', '2015-08-26 11:06:45'),
(59, 'img/profile_photos/cS6gHXVBlhcZ.jpg', 132, '2015-08-27 03:12:54', '2015-08-27 03:12:54'),
(60, 'img/profile_photos/PJPV7PueUqSh.jpg', 136, '2015-09-04 16:35:23', '2015-09-04 16:35:23'),
(61, 'img/profile_photos/ou3omdClbj0d.jpg', 138, '2015-09-08 23:44:38', '2015-09-08 23:44:38'),
(62, 'img/profile_photos/U5SqwVg37M7c.jpg', 137, '2015-09-25 17:39:27', '2015-09-25 18:14:08'),
(63, 'img/profile_photos/LE5qOPFfyTRP.jpg', 151, '2016-02-19 20:33:48', '2016-02-19 20:33:48');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

DROP TABLE IF EXISTS `songs`;
CREATE TABLE IF NOT EXISTS `songs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `song` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soundcloud` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `songs_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `published`, `description`, `genre`, `song`, `image`, `soundcloud`, `youtube`, `user_id`, `created_at`, `updated_at`) VALUES
(95, 'Nicki Minaj -Only', 1, 'Blast', 'Afrobeat', 'img/songs/9J1aHh_Nicki Minaj Ft Drake Lil Wayne Chris Brown Only - 1414605248.mp3', 'img/songs/images/mnN5Wn_davido.jpg', NULL, NULL, 63, '2015-02-26 11:19:15', '2015-02-26 11:19:15'),
(96, 'Ako Mi Ti Poju', 1, 'Naeto C', 'Afrobeat', 'img/songs/3FhBLn_01_Ako_Mi_Ti_Poju_(Radio_Edit).mp3', 'img/songs/images/QQmaSv_IMG-20141125-WA0002.jpg', NULL, NULL, 64, '2015-02-26 12:11:14', '2015-02-26 12:11:14'),
(97, 'All For You', 1, 'A deep love song just for you, yes you!. Khenzy decided to drop a new single which he featured tobbiloke . Listen and share', 'RnB', 'img/songs/yuaoNy_ALL FOR YOU_by_KHENZY (mixed by omoboy).mp3', 'img/songs/images/wq3TTF_KHENZY.jpg', NULL, NULL, 65, '2015-02-27 04:35:31', '2015-02-27 04:35:31'),
(98, 'Murda(freestyle)', 1, 'Murda by Ibeh', 'Others', 'img/songs/vqxu5l_AUD-20141008-WA0005.mp3', 'img/songs/images/UJ7naS_IMG_20150122_185204.jpg', NULL, NULL, 66, '2015-02-27 14:27:11', '2015-02-27 14:27:11'),
(99, 'Break Your Heart', 1, 'love song', 'Afrobeat', 'img/songs/z3nzMb_2. Break Your Heart.mp3', 'img/songs/images/zechKz_IMG_3951d.jpg', NULL, NULL, 67, '2015-02-27 15:53:16', '2015-02-27 15:53:16'),
(100, 'MAN 4 d NIGHT', 1, '', 'Afrobeat', 'img/songs/OG0msp_7. Man 4 D Night ft Mani lapussh.mp3', 'img/songs/images/OIjW02_mani (2).jpg', NULL, NULL, 67, '2015-02-27 15:59:29', '2015-02-27 15:59:29'),
(101, 'Amin', 1, 'Dammy krane', 'Afrobeat', 'img/songs/fVewPH_Amin.mp3', 'img/songs/images/DSL397_Screenshot_2015-03-14-19-13-13.png', NULL, NULL, 68, '2015-02-28 00:55:19', '2015-02-28 00:55:19'),
(102, 'Magic- coldplay', 1, 'Coldplay', 'RnB', 'img/songs/nKdKsA_02. Magic.mp3', 'img/songs/images/I2yIIU_20150215_162604.jpg', NULL, NULL, 64, '2015-02-28 22:54:27', '2015-02-28 22:54:27'),
(103, 'kilofe ', 1, '', 'Afrobeat', 'img/songs/G76dnW_AUD-20150130-WA0000.mp3', 'img/songs/images/4wanfq_IMG_20141214_120119.jpg', NULL, NULL, 66, '2015-03-01 04:43:42', '2015-03-01 04:43:42'),
(106, 'Surulere''s finest', 1, 'Cameerizy', 'Hip-hop', 'img/songs/Zo2pmD_Camerizy_Baby_Surulere_Finest.mp3', 'img/songs/images/a1ud5m_IMG-20150204-WA0005.jpg', NULL, NULL, 78, '2015-03-03 02:36:58', '2015-03-03 02:36:58'),
(107, 'chandelier ', 1, 'Reggae', 'RnB', 'img/songs/Pij8aZ_01 - Chandelier.mp3', 'img/songs/images/FQRuHZ_1425381902660_630045.jpeg', NULL, NULL, 76, '2015-03-03 23:57:50', '2015-03-03 23:57:50'),
(116, 'Oleku', 1, 'Ice Prince ft. Brymo', 'Afrobeat', 'img/songs/lsiVlM_2 Oleku..mp3', 'img/songs/images/953MUU_aarrgh.png', NULL, NULL, 64, '2015-03-13 19:12:47', '2015-03-13 19:12:47'),
(119, 'Beast of no Nation - Fela', 1, 'Fela Classic', 'Afrobeat', 'img/songs/GHrGb9_FELLA-BEAST__OF_NO_NATION.mp3', 'img/songs/images/Us8bqP_20140820083001.png', NULL, NULL, 64, '2015-03-27 13:03:43', '2015-03-27 13:03:43'),
(120, 'Thinking out loud ', 1, 'Ed sheeran ', 'Others', 'img/songs/KrRkum_AUD-20150326-WA0001.mp3', 'img/songs/images/rwEWRf_IMG_20150327_000949.JPG', NULL, NULL, 71, '2015-03-27 15:09:45', '2015-03-27 15:09:45'),
(121, 'Your Love', 1, 'another fresh music from khenzy which he tiyles ''your love''...download, lisen and tell a friend about it', 'Afrobeat', 'img/songs/oxdnHC_Khenzy -- Your Love.mp3', 'img/songs/images/NF88cN_KHENZY.jpg', NULL, NULL, 65, '2015-03-28 00:24:35', '2015-03-28 00:24:35'),
(122, 'crace  ', 1, 'crace is a new hot song by black son prod by Mickky G, mix by saint uzi.....it a dance all song especially play in clubs. Listen and download.', 'Others', 'img/songs/nNbgEY_2.Black%20son-Crace.mp3', 'img/songs/images/f74Gwq_PicStory-2015-02-26-08-58-53.jpg', NULL, NULL, 100, '2015-03-31 20:48:43', '2015-03-31 20:48:43'),
(123, 'Reality', 1, 'This piece is lyrically huge...\r\nReality is a medium of passing message {musically} to Nigerians about the happenings in our country and to the youths to wake up from their slumber. Chuchu BC ft. some young talented upcoming artiste Slow wise, N.I, Ajaa and Strapp.', 'Others', 'img/songs/j7oIDX_#REALITY.mp3', 'img/songs/images/Rv7MwI_Reality 2.jpg', NULL, NULL, 82, '2015-04-04 21:49:08', '2015-04-04 21:49:08'),
(124, 'Wizbaba Jaiye jaiye', 1, 'Great song from the hit maker wizzy', 'Afrobeat', 'img/songs/upJgvu_Jaiye_Jaiye_Ft__Femi_Kuti.mp3', 'img/songs/images/0Rz6iv_wiz-kid.jpg', NULL, NULL, 103, '2015-04-20 08:10:37', '2015-04-20 08:10:37'),
(126, 'Ed Sheran-Give me love', 1, 'Blazing love song from Ed Sheran', 'RnB', '', 'img/songs/images/qKnGe1_ed-sheran.jpg', NULL, NULL, 103, '2015-04-20 08:57:07', '2015-04-20 08:57:07'),
(127, 'ergrvdfvf', 1, 'bbgngb', 'Afrobeat', 'img/songs/cN5Lj1_BrymO-Eko.mp3', 'img/songs/images/64TG8K_amber-rose-dbanj.jpg', NULL, NULL, 103, '2015-04-22 06:13:55', '2015-04-22 06:13:55'),
(128, 'Trying this out', 1, 'Am going to be so furious', 'Hip-hop', '', 'img/songs/images/3Gn2io_beyonce-blue-1.jpg', NULL, NULL, 103, '2015-04-22 06:27:35', '2015-04-22 06:27:35'),
(133, 'superman (prod. by H beats)', 1, 'dOpE track.....dEEpEr than rap', 'Hip-hop', 'img/songs/Ts3bue_ATT_1429605409577_SUPERMAN - ME2(PROD BY H BEAT)FT GWEN PRO...mp3', 'img/songs/images/AFXNeW_Superman.jpg', NULL, NULL, 98, '2015-04-24 11:55:13', '2015-04-24 11:55:13'),
(134, 'Alobam ( Prod. by H beats)', 1, 'mixtapE Of thE Original phynO''s alObam...', 'Hip-hop', 'img/songs/EnYdWB_ME2-Alobam-Prod-by-HBeatPRO_Primevibez.com_.mp3', 'img/songs/images/Hgeqx9_Alobam.jpg', NULL, NULL, 98, '2015-04-24 12:01:20', '2015-04-24 12:01:20'),
(143, 'One girl', 1, 'Ajaa fresh jam', 'Afrobeat', 'img/songs/jK3CqZ_Ajaa_One girl.mp3', 'img/songs/images/u4UG1U_IMG_20150523_142608.jpg', NULL, NULL, 64, '2015-05-28 12:17:36', '2015-05-28 12:17:36'),
(145, 'Major Lazer [OFFICIAL]   Major Lazer & DJ Snake - Lean On (feat. MØ)', 1, '', 'Hip-hop', '', '', '193781466', NULL, 63, '2015-06-22 04:17:58', '2015-06-22 04:17:58'),
(146, 'Great song, anytime anyday', 1, '				This is what we are talking about		', 'Afrobeat', 'img/songs/rrvpSy_Davido ft DJ Arafat - Naughty.mp3', 'img/songs/images/juujLp_davido-Afrimma.jpg', NULL, NULL, 103, '2015-06-22 13:22:29', '2015-06-22 13:22:29'),
(147, 'Cameey', 1, 'Camerizzy 						', 'Afrobeat', 'img/songs/fDQqP0_Camerizy Baby- surulere finest master2.mp3', '', NULL, NULL, 64, '2015-06-22 19:57:37', '2015-06-22 19:57:37'),
(148, 'Ajuju', 1, 'Mr International 						', 'Afrobeat', 'img/songs/LLxHBK_ajuju_fall-in-love.mp3', '', NULL, NULL, 64, '2015-06-22 19:59:24', '2015-06-22 19:59:24'),
(149, 'G nax', 1, 'Mona lisa						', 'Afrobeat', 'img/songs/oxApNg_g-nax-mona-lisa.mp3', '', NULL, NULL, 64, '2015-06-22 20:00:27', '2015-06-22 20:00:27'),
(150, 'This is song upload', 1, '						This is song upload, this ', 'Afrobeat', 'img/songs/YCbJgr_Blame it on Me ~ George Ezra [Full].mp3', '', NULL, NULL, 103, '2015-06-22 20:23:53', '2015-06-22 20:23:53'),
(151, 'eko', 1, 'Brymo', 'Afrobeat', 'img/songs/2Nks2o_04 Eko.mp3', '', NULL, NULL, 104, '2015-06-29 20:05:35', '2015-06-29 20:05:35'),
(152, 'Booty dance produced by runtnz and mix by K9', 1, 'club hit', 'Afrobeat', 'img/songs/AyPMMJ_JO''SWAGGZ - Booty Dance (prod.Runtnz&Mix by K9).mp3', 'img/songs/images/JRpLKb_Cover.jpg', NULL, NULL, 111, '2015-07-06 19:41:19', '2015-07-06 19:41:19'),
(153, 'Somebody', 1, 'Cameey baby', 'Hip-hop', 'img/songs/2gYJTV_Somebody - Cameey.mp3', '', NULL, NULL, 64, '2015-07-11 23:25:44', '2015-07-11 23:25:44'),
(154, 'Iwo Nikan', 1, 'Iwo nikan is a RnB/hiphop track. Listen and enjoy ', 'RnB', 'img/songs/sM5EHT_Haiby ~ Iwo Nikan.mp3', 'img/songs/images/ovZK9d_IMG_20150113_141105_edit.jpg', NULL, NULL, 113, '2015-07-13 17:17:16', '2015-07-13 17:17:16'),
(155, 'Wole (freestyle)', 1, 'A cover of mafikizolo''s khona. Haiby delivers a dope freestyle on the beat and displays creativity. Listen and enjoy.', 'Hip-hop', 'img/songs/nbTiK8_Haiby - Wole (freestyle).mp3', 'img/songs/images/pCoUIx_IMG_20150113_141105_edit.jpg', NULL, NULL, 113, '2015-07-13 17:41:05', '2015-07-13 17:41:05'),
(156, 'You Should Know', 1, 'Two rappers rapping about motivation to succeed or fail', 'Afrobeat', 'img/songs/Tl85tH_Fshadow & May Owoyele You should know.mp3', 'img/songs/images/FzS2me_YOU SHOULD KNOW ARTWORK.jpg', NULL, NULL, 117, '2015-07-14 23:49:32', '2015-07-14 23:49:32'),
(157, 'Ma Fimisere', 1, '\r\nCalculuxx (Olusoga Gbenga Daniel) is an hip hop act and Song Writer. He is an undergraduate student of University of Lagos\r\nwhere he studies Psychology... "Ma Fimisere" is for the ladies that love to be loved .it''s a jam you will want to hear always...', 'Hip-hop', 'img/songs/lTvKzK_Ma fimisere.mp3', 'img/songs/images/ct1u11_IMG-20150715-WA000_edit_edit_edit1.jpg', NULL, NULL, 127, '2015-07-28 21:55:39', '2015-07-28 21:55:39'),
(158, 'wayback', 1, 'Just my free style', 'Afrobeat', 'img/songs/RuBIWG_VN-20150303-WA000.mp3', '', NULL, NULL, 128, '2015-07-29 05:14:14', '2015-07-29 05:14:14'),
(159, 'Fantasy', 1, 'Different dancehall tune..', 'Hip-hop', 'img/songs/R4fkzS_Calculuxx_-_Fantasy.mp3', 'img/songs/images/uQlImQ_CACULUXX 2 (2)_edit_edit_edit_edit_edit_edit.jpg', NULL, NULL, 127, '2015-07-29 09:39:04', '2015-07-29 09:39:04'),
(160, 'HATERS', 1, 'Sir Hamza', 'Hip-hop', 'img/songs/2TVcoV_Sir_Hamza_Ft_Haywire_-__Hate_freestyle_-01.mp3', '', NULL, NULL, 64, '2015-08-02 05:51:58', '2015-08-02 05:51:58'),
(161, 'Oremi', 1, 'A sensational song about a guy who fell in love with his girl friend.', 'RnB', 'img/songs/rkVNAX_Oremi.mp3', 'img/songs/images/gz7LV0_IMG_20150801_121551.jpg', NULL, NULL, 129, '2015-08-03 23:58:54', '2015-08-03 23:58:54'),
(162, 'High freestyle', 1, 'If you love partying hard then you should listen to this hot freestyle from @khenzyminati which was produced by omoboy , listen and share to all...', 'Others', 'img/songs/ExIHMX_KHENZY - HIGH freestyle (prod. by omoboy).mp3', 'img/songs/images/3oBx55_high.jpg', NULL, NULL, 65, '2015-08-07 20:42:48', '2015-08-07 20:42:48'),
(164, 'Roomate', 1, 'Mad fire tune from the stables from the reggae sensation CHORUS who titles this one #ROOMATE.....listen and enjoy...#shaneh', 'Others', 'img/songs/Z1rrqT_VN-20141231-WA000.mp3', 'img/songs/images/iuSO6H_facebook-20150821-180521.png', NULL, NULL, 132, '2015-08-27 04:00:22', '2015-08-27 04:00:22'),
(165, 'dreamers ', 1, 'Afro trap sound so dope ', 'Hip-hop', 'img/songs/LDkwHj_2nd verse dreamers.amr', '', NULL, NULL, 78, '2015-08-27 13:48:09', '2015-08-27 13:48:09'),
(166, 'school of hardknocks', 1, 'Afro trap sound so original n truthful ', 'Hip-hop', 'img/songs/C9CiJe_Camerizy Baby_School of hardknocks.mp3', 'img/songs/images/lU1kIU_S14178_279_edit.png', NULL, NULL, 78, '2015-08-27 13:51:09', '2015-08-27 13:51:09'),
(167, 'Cool Cat ', 1, 'Soft sweet trap afro ', 'Hip-hop', 'img/songs/2TzRTq_Camerizy Baby-cool cat master.mp3', 'img/songs/images/Mtvofm_S14178_279_edit.png', NULL, NULL, 78, '2015-08-27 14:01:31', '2015-08-27 14:01:31'),
(168, 'somebody ', 1, 'Hot dance hall hip hop ', 'Hip-hop', 'img/songs/Yipb8V_camerizy baby-sombody master.mp3', 'img/songs/images/3za2Gy_IMG_20150725_122129.jpg', NULL, NULL, 78, '2015-08-27 14:06:34', '2015-08-27 14:06:34'),
(169, 'Letter 2 Mama ', 1, 'Hiphop soul', 'Hip-hop', 'img/songs/ihK7K3_Camerizy Baby-Letter to mama master.mp3', 'img/songs/images/qhdAfx_S10332_280_edit.png', NULL, NULL, 78, '2015-08-28 00:38:30', '2015-08-28 00:38:30'),
(170, 'mashup D place ', 1, 'Trap ', 'Hip-hop', 'img/songs/pNsCeW_Camerizy Baby-mashup D place master.mp3', 'img/songs/images/i02tv4_S14178_279_edit.png', NULL, NULL, 78, '2015-08-29 04:12:58', '2015-08-29 04:12:58'),
(171, 'Cool n nice ', 1, 'Hip hop smooth streets ', 'Hip-hop', 'img/songs/4OsDcD_camerizy baby-cool and nice edit master.mp3', 'img/songs/images/hnueIF_S14178_279_edit.png', NULL, NULL, 78, '2015-08-29 04:16:59', '2015-08-29 04:16:59'),
(172, 'your body ', 1, 'Afro trap ', 'Hip-hop', 'img/songs/R9IHar_Camerizy BabyYour body clean.mp3', 'img/songs/images/XDVIYa_S14178_279_edit.png', NULL, NULL, 78, '2015-09-01 01:02:00', '2015-09-01 01:02:00'),
(173, 'critisice ', 1, 'Trap dance hall afro ', 'Hip-hop', 'img/songs/LyyF1p_Camerizy Baby -criticize feat I-rap master.mp3', '', NULL, NULL, 78, '2015-09-01 01:06:18', '2015-09-01 01:06:18'),
(174, 'HUSTLE', 1, 'HUSTLING', 'Afrobeat', 'img/songs/XVotZQ_HUSTLE.mp3', '', NULL, NULL, 136, '2015-09-05 11:18:06', '2015-09-05 11:18:06'),
(175, 'FILIE', 1, 'FEEL IT', 'Afrobeat', 'img/songs/dA4yEb_FILIE BY ABDALLAH.mp3', '', NULL, NULL, 136, '2015-09-05 11:20:35', '2015-09-05 11:20:35'),
(176, 'BADDER DAN', 1, 'BADDER DAN', 'Afrobeat', 'img/songs/iZCgpB_BADDER DAN BY ABDALLAH.mp3', '', NULL, NULL, 136, '2015-09-05 11:23:14', '2015-09-05 11:23:14'),
(177, 'WALA', 1, 'COME AND LYK', 'Afrobeat', 'img/songs/fBOTAM_WALA.mp3', '', NULL, NULL, 136, '2015-09-05 11:26:26', '2015-09-05 11:26:26'),
(178, 'Gallant', 1, 'This is an Afrobeat tune that will surely inspire and motivate you.. Listen and Share!', 'Afrobeat', 'img/songs/JLBYZn_Oscaruzo - Gallant.mp3', 'img/songs/images/mcDF9S_Gallant.jpg', NULL, NULL, 138, '2015-09-09 00:31:17', '2015-09-09 00:31:17'),
(179, 'Duro', 1, 'My stage name is slimfresh ', 'Afrobeat', 'img/songs/V06VC9_SlimFresh_Duro-Prod by Switch1 (master)_2.mp3', '', NULL, NULL, 142, '2015-09-14 16:12:45', '2015-09-14 16:12:45'),
(180, 'NA MONEY KILL AM', 1, 'commercial hip hop with afro tunes', 'Hip-hop', 'img/songs/FYeh6I_AUD-20150803-WA0000 - Copy.mp3', 'img/songs/images/PER94s_album cover.jpg', NULL, NULL, 137, '2015-09-25 18:18:33', '2015-09-25 18:18:33'),
(181, 'LONE WOLF', 1, '', 'Hip-hop', 'img/songs/jDT4Vm_Lone Wolf.mp3', 'img/songs/images/AJJerL_lone cover.jpg', NULL, NULL, 148, '2015-10-02 10:00:45', '2015-10-02 10:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `song_tag`
--

DROP TABLE IF EXISTS `song_tag`;
CREATE TABLE IF NOT EXISTS `song_tag` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `song_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `song_tag_song_id_foreign` (`song_id`),
  KEY `song_tag_tag_id_foreign` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'songs,Asa', 'Video', '2014-12-11 05:30:29', '2014-12-11 05:30:29'),
(2, 'Asa,cute', 'Video', '2014-12-11 05:37:20', '2014-12-11 05:37:20'),
(3, 'baddest,superstar', 'Song', '2014-12-11 06:22:59', '2014-12-11 06:22:59'),
(4, 'cute', 'Gallery', '2014-12-11 06:33:06', '2014-12-11 06:33:06'),
(5, 'talents, great voice', 'Song', '2014-12-11 13:03:19', '2014-12-11 13:03:19'),
(6, 'dance', 'Song', '2014-12-11 13:41:48', '2014-12-11 13:41:48'),
(7, 'cute', 'Gallery', '2014-12-11 13:52:20', '2014-12-11 13:52:20'),
(8, 'flexing guy, Awilo', 'dance', '2014-12-11 14:01:10', '2014-12-11 14:01:10'),
(9, 'cute', 'Gallery', '2014-12-11 14:26:08', '2014-12-11 14:26:08'),
(10, 'Asa,beautiful', 'Video', '2014-12-11 21:14:58', '2014-12-11 21:14:58'),
(11, 'dance', 'Video', '2014-12-11 21:21:20', '2014-12-11 21:21:20'),
(12, 'Asa,', 'Video', '2014-12-12 04:39:02', '2014-12-12 04:39:02'),
(13, 'cool,Nice', 'Song', '2014-12-12 22:48:12', '2014-12-12 22:48:12'),
(14, 'asa,cool', 'Song', '2014-12-12 22:50:02', '2014-12-12 22:50:02'),
(15, 'asa', 'Video', '2014-12-16 17:52:45', '2014-12-16 17:52:45'),
(16, 'dance', 'Song', '2014-12-16 20:50:11', '2014-12-16 20:50:11'),
(17, 'Enter your tags here', 'Video', '2014-12-30 14:37:56', '2014-12-30 14:37:56'),
(18, '', 'Song', '2014-12-30 16:11:10', '2014-12-30 16:11:10'),
(19, '', 'Song', '2015-01-03 05:44:12', '2015-01-03 05:44:12'),
(20, '', 'Song', '2015-01-03 23:16:08', '2015-01-03 23:16:08'),
(21, 'Enter your tags here', 'Video', '2015-01-03 23:21:09', '2015-01-03 23:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `tag_video`
--

DROP TABLE IF EXISTS `tag_video`;
CREATE TABLE IF NOT EXISTS `tag_video` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `video_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `video_tag_video_id_foreign` (`video_id`),
  KEY `video_tag_tag_id_foreign` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `first_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `talents` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(200) COLLATE utf8_unicode_ci DEFAULT '#',
  `twitter` varchar(200) COLLATE utf8_unicode_ci DEFAULT '#',
  `soundcloud` varchar(200) COLLATE utf8_unicode_ci DEFAULT '#',
  `youtube` varchar(200) COLLATE utf8_unicode_ci DEFAULT '#',
  `tagline` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `googleID` int(100) DEFAULT NULL,
  `facebookID` int(100) DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fb_id` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `confirmation_code`, `remember_token`, `confirmed`, `is_admin`, `created_at`, `updated_at`, `first_name`, `last_name`, `talents`, `facebook`, `twitter`, `soundcloud`, `youtube`, `tagline`, `googleID`, `facebookID`, `access_token`, `fb_id`) VALUES
(63, 'gentleRebel', 'gbolahanalade@gmail.com', '$2y$10$i/n8mR0qiCTy46Nngr7rEexFwgfgpvgWQoMdeRoeu0nFPfTqx7tci', '9e50c98cdb5a2659fa9b4d4c90ef7cdb', 'bIcGFAd2UWgoVkhdI7trpgL5AeCZliR14tDKYM74jM8cjMxlT4k2ZbSZZ8CV', 1, 0, '2015-02-26 11:14:23', '2016-01-18 23:47:10', 'Gentle', 'Rebel', 'dancing', 'https://www.facebook.com/GbolahanBabs', 'https://twitter.com/Gbolahanalade', 'https://soundcloud.com/bolaji-alade', 'https://www.youtube.com/user/MrGbolahanalade/videos', 'God only...', NULL, NULL, NULL, NULL),
(64, 'Nas', 'flagcareng@gmail.com', '$2y$10$sKPw0N6ibfmWy.Jcn1uMIekXvD5eIhMhApx5vDRcS91GXJarXLnhe', '94b59c32d935887977d3a11115a35f94', 'MSj176Brw3WmLwYAEow9NQAxXtOsW4ZSGCSc9II9dAardf4psxtGo0a0CMHA', 1, 0, '2015-02-26 12:02:40', '2015-07-28 02:05:37', 'Nonso ', 'Odigz', 'modelling', 'Enter your facebook profile ID', 'Enter your twitter username', '', '', 'More action less talk.', NULL, NULL, NULL, NULL),
(65, 'Khenzy', 'Khenzysmusic@yahoo.com', '$2y$10$fhAJmNYaLDV1PRSCXuKCAu8iA3acN.7vn9ZIK/Jm47Ye5j/vGEpV2', 'c86a9c7a0c5a032e1985a4e487228bf4', 'gPWF49RIJjwpTioUKjANmwvwiW7sIDDwwspKw57YfGeXAKDB6l6jxxsNNLqt', 1, 0, '2015-02-27 02:43:33', '2015-03-28 00:28:51', 'Daniel ', 'Egba', 'singing', 'Enter your facebook profile ID', 'www.twitter.com/khenzyminati', '', '', 'IcreateMelody', NULL, NULL, NULL, NULL),
(66, 'ibeh', 'ibehxmen@gmail.com', '$2y$10$ACkHg2vHcE5dlKr3QItwa.XjCckq22DSny6Ck3vFejOkKh52LhYSC', 'c5173b15cf1a0e89619847ba92caf02a', 'qsumMIPa3ykrDLztYXTDIRgngJrLL01BGz1onxFA3JGHsyDaalSdR2CPCY69', 1, 0, '2015-02-27 14:06:43', '2015-02-27 14:21:47', 'ibeh', 'ifeanyi', 'singing', 'ibeh ifeanyi', 'ibeh_', 'http://soundcloud.com/ibeh-gibson/murda-ibeh-at-murda-ibeh', '', '#bard', NULL, NULL, NULL, NULL),
(67, 'lapussh', 'emmant2003@yahoo.com', '$2y$10$xObF.dw3c5BZQCp/Y59Omeh2a8FflrFlH1HDaD4kBl/LkwpceT96u', '55aed85f63e7bafd9f053a9086a24284', NULL, 1, 0, '2015-02-27 14:37:14', '2015-02-27 14:42:47', 'mani', 'ede', 'singing', 'www.facebook.com/mani.ed''s', '@manimuuzzik', 'www.soundcloud.com/manimuuzzik', 'https://www.youtube.com/results?search_query=mani+lapussh', 'lapussh', NULL, NULL, NULL, NULL),
(68, 'Claire', 'adeluclaire@gmail.com', '$2y$10$t9/f.qr1Bg6gFLWu//5mDON6DntGDQ1JbiDeXlXM3mjp2/6CY84sy', '62b0c002750fb28bd209c9ec4980e950', 'qshvT9aUxTSAAnsJrkeHHCa9wTE4GKvHdWbOAdUUaDxDVJRT3vTVoRGEI788', 1, 0, '2015-02-28 00:50:37', '2015-02-28 00:51:03', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL, NULL, NULL),
(69, 'Nohi', 'onohiokus@yahoo.com', '$2y$10$o9Zs0TccB7oRzBGrJNy9SuQuDB2Q54O0RsX19oDFH2LNhbVCGGEo6', '67778d785938daf05805c17b48b1ddc2', '4WxDlROhk2JPgahXwwYCh8aYME8wVeKnIMwEkTVHVc0QPk06ctz6lgjrIwcq', 1, 0, '2015-02-28 03:43:01', '2015-07-25 17:06:43', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL, NULL, NULL),
(70, 'cupid', 'moreel02@yahoo.com', '$2y$10$sDX2GCWVXh6nGtc.tRw7iuaVDk9XeQna491MDAKU967CPXa3cEkF.', '73df2a9f9625e79997550a61b3ed532f', NULL, 0, 0, '2015-02-28 05:19:51', '2015-02-28 05:19:51', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL, NULL, NULL),
(71, 'qupid', 'Amoreel@ymail.com', '$2y$10$mthx0SU178sgATPyf3FAY.LauJxyaJa/NncI08NIq6D.wJtRSbuge', 'c6d334f9fc5acc2c0c6b457718e3125c', 'j4etYZ3G5WKgoB7YJKIfq2C3695YcXp9VdSy509X9pAw56yOTdGdwJw6bUJq', 1, 0, '2015-02-28 05:40:29', '2015-03-06 20:40:00', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL, NULL, NULL),
(72, 'Azukaimagery', 'ebbiebbi43@gmail.com', '$2y$10$Q0YxnQ4KTdftobJ.56dpiucRKGktPDTy8EJOJORzEDCcxi3LeCXnO', 'b5d368cb0849f641acb99fa4d3ae4e69', 'Zcg4rKB8l41FqOmuvozMrjiSJH4zooS55ioD1pQms9Tf9w7wQ0NQsqcmt7uq', 1, 0, '2015-02-28 20:04:33', '2015-03-27 04:59:40', 'okechukwu', 'ebbi', 'others', 'Enter your facebook profile ID', 'Enter your twitter username', '', '', '', NULL, NULL, NULL, NULL),
(73, 'atinuke_bello', 'atinukeb5@gmail.com', '$2y$10$P44Ba/gri0O6/hmfxUZA..GIa8mK.TZ9ToVWU7yD0i9ZL6RkJRQOa', '058365f7df67a6aa2adc950214cffbb1', 'rQBACm2LSZNAQQL5b6hjWm1URha5FRPPURhe4YVcZFxLsUfAfz0bGzJL6os5', 1, 0, '2015-02-28 21:40:40', '2015-02-28 21:43:15', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL, NULL, NULL),
(74, 'sopheeya', 'sophbabyface@yahoo.com', '$2y$10$7FlE46T6ZTqxi4iuNtLmSO2D7Mbfm6hBfYfMHJEnnwQPT/J2tD2A6', 'af1df9b1e6cfa5fca465d02b65b35794', 'd05c9WqI4Lfus8lx3yxZhHhOluVmUhi18YBzowJdZirkQ2rJv0Mtylxvxj9S', 1, 0, '2015-02-28 23:54:15', '2015-07-26 13:47:01', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL, NULL, NULL),
(75, 'krm002', 'kaynormensah@rocketmail.com', '$2y$10$Y5e9HjQsnTlcBSoaUMhpuuUOqGN.qHke5ip9NFKlCrba4Ac3E2vDq', '64642bb090fa015fd0fcf52a2a0c3fe2', NULL, 0, 0, '2015-03-01 01:30:08', '2015-03-01 01:30:08', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL, NULL, NULL),
(76, 'krm003', 'kaynormensah@gmail.com', '$2y$10$iRXuk3TcDN0OwcLA/Rl5mO3EbVM49F8aosZoaO.BTZEs8m5631MYq', '904771aeb2eddeff9e8d440dbe4557b3', 'l15NLWilYfR0dWLzisVXE8GkRC1fJpVazBY78LJBe9ANJw9GcxAUktOpDBtq', 1, 0, '2015-03-01 01:33:29', '2015-03-04 00:17:50', 'rachael', 'smith', 'others', 'Enter your facebook profile ID', 'Enter your twitter username', '', '', '', NULL, NULL, NULL, NULL),
(77, 'cameeOriginal', 'camerizybaby@gmail.com', '$2y$10$ZKieBRYEJ6GAiVmAKcn3NuF1mnIMqGPkOGVfLsrCak45GfL5Mr0wi', 'a5edd3356427341d8275b90b46e109f9', NULL, 0, 0, '2015-03-01 02:23:33', '2015-03-01 02:23:33', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL, NULL, NULL),
(78, 'cameebabyOriginal', 'skboysexuallycrooners@gmail.com', '$2y$10$X1O8F16GmcK/4RVl7BaKl.vApoHZBBImN2zGhglwDTR2YW2dFsCdG', '6985c574f9df8ea93e59f1b9b52fcfd3', '7jlrWsxDpilLJs4DLCLh89pHNLYRjy9Wqacv5fQIJIJjgE4lITB7m6fATSVK', 1, 0, '2015-03-01 02:34:18', '2015-08-27 16:05:52', 'Cameey', 'Da Cool Cat ', 'dancing', 'Camerizy camee Camerizy', 'skboy_pj', '', '', '', NULL, NULL, NULL, NULL),
(79, 'chuchu20', 'chuchuokafor@yahoo.com', '$2y$10$S9LBhi82/hPdqAvpsof9HedwkKmK5VAQd7ElC8.zJV7QmLu5EJiNG', 'a2caaf6f54d4f3086b5d18f6cd3206ec', 'q9ZqwPSFCcOAeZtzC8JrG0uCzmSn2j9AtBAPSHMez1baDQ0FyLIOvpr6z3fT', 1, 0, '2015-03-01 19:00:07', '2015-03-01 19:06:15', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL, NULL, NULL),
(80, 'buchi', 'www.Nkemdi266@gmail.com', '$2y$10$vVnF47ZvxL/1WERVArn0EuiCCRirIyUAjfB0YrCotpuV9BEr0dB1K', 'fe5a7c1992da29109b7d44e6f5ac81b9', NULL, 0, 0, '2015-03-01 20:40:41', '2015-03-01 20:40:41', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL, NULL, NULL),
(81, 'nkem', 'nkemdi266@gmail.com', '$2y$10$OwJbvDzLDwHKy/RaPDZXX./Pth8B9q0jyqSj.d8aIjyT.3RRXS3H6', 'fa85e20fe2f5565f9839ec5d965c0027', NULL, 0, 0, '2015-03-02 01:23:40', '2015-03-02 01:23:40', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL, NULL, NULL),
(82, 'ChuchuBC', 'justmuaa@yahoo.com', '$2y$10$jRZScNlggy2skPBPr9QjKeNlEuefBECTIAgRyWyHuI.zUN5YM.0eO', 'dace9d167c16834b99dc6717885654f8', '9sNNBfygJlLbNEeREy4OT9Xi0a7fGYEkcLincQV9dahlIeWBCI5sWVQ8lf8E', 1, 0, '2015-03-03 00:40:12', '2015-03-03 00:50:04', 'Chuchu', 'BC', 'others', 'Chuchu BC', 'Chuchu__BC', '', 'Chuchu BC', 'Gentlelity without activity is nothing but stupidity', NULL, NULL, NULL, NULL),
(83, 'Alvinsj01', 'fexzy4life@gmail.com', '$2y$10$.DTObQXPwJtxTjTSQELF3..xKR5NUJWkJ4NLPcn2gTQ527ZPdRru.', '6b6aef239ed2c0c67af773027cd0840d', NULL, 0, 0, '2015-03-08 05:47:08', '2015-03-08 05:47:08', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL, NULL, NULL),
(84, 'Basilchukwu', 'shridex@yahoo.com', '$2y$10$sPOOobtUm0OOI8SOXgoR.uRoVJIFAQlqAhVIvIRABEMqbv2bByufe', '32e65e3cfcad35bb2556111605add632', 'jGiA8NYv60naAPAdT6TyZWsBh2SDcaZjtZ284ILcg3e9BBEKNtkFNgzgcFm2', 1, 0, '2015-03-09 13:17:02', '2015-03-09 13:56:22', 'Basil', 'Chukwu', 'others', 'Enter your facebook profile ID', 'Enter your twitter username', '', '', 'Trust in God always', NULL, NULL, NULL, NULL),
(85, 'Mpk', 'michaelplange@rocketmail.com', '$2y$10$unSqMR0wryC2BFqfTP9P6.Dw.9IZ5MjTEB0BYbAp.Ap0vg.u449mK', '06e06f7bf144a8cf9d5ebb0f4b093306', NULL, 0, 0, '2015-03-11 07:09:13', '2015-03-11 07:09:13', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL, NULL, NULL),
(86, 'PoetForte', 'poetforte@gmail.com', '$2y$10$5zZAEnYoR6dKl2TqbJtQUO.xxJW6S8wE5i/jpqt08dHZgDr9MxPmG', '3f9b09e177f02df5028b10497444e92a', 'abHYd5bJjw2iTWHtAwCD3jmMtaW6cxcZf0pe5kpGOp9NJRO0RTDnGfBsUdc5', 1, 0, '2015-03-13 14:04:18', '2015-03-20 21:35:16', 'poet', 'forte', 'others', 'https://www.facebook.com/odom.ben', 'https://twitter.com/poet_forte', '', '', 'Thank God for social media and networks, I feel like it was all made for me.  Twitter, facebook // vevo, youtube, // Amazon and itunes,  It all works for me plus reverbnation and kicktone.', NULL, NULL, NULL, NULL),
(87, 'Mpk_byb', 'michaelplangeiz@gmail.com', '$2y$10$gqshHY1QbxNxvYnT/rGcdu08O9K9urbCUMVS3XYT8kEbs8CFDXaPS', 'f09aac75c3475a734896edf28b114d3c', NULL, 0, 0, '2015-03-14 17:22:35', '2015-03-15 11:06:30', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL, NULL, NULL),
(88, 'Chopstix', 'drealchopsix@gmail.com', '$2y$10$Rm3K3agvveemv51sUwXwiODkvgVF0zc1StxI.FfPgup6eDkAmuzVq', '115c81a4d127a85354eac5ca61a1dc71', NULL, 0, 0, '2015-03-14 21:44:12', '2015-03-14 21:44:12', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL, NULL, NULL),
(89, 'ellesvisage', 'emmanuellautomi@yahoo.com', '$2y$10$qUG0rIGYFMcjLXwu7TlQheZVH6mcqD3DB3wbLS07cSzhVzDXhzOoW', '95a25ffc0fd216345334695d83b6ca41', NULL, 1, 0, '2015-03-15 21:02:17', '2015-03-15 21:02:56', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL, NULL, NULL),
(90, 'kidarocks', 'mrkidarocks@yahoo.com', '$2y$10$LLjDgaiDfh9Ju7BwrHmBqeIGAKxAr/xjYonPdwYYc3HupRD3x4s.a', '6640b354cbd306b42d1453e4a6e8fb8a', '4rZL1aH3Q8sCWnHoY1ENGOKjiLS8DHTJgkCvm63VdB2dsMerGhypUyxEDTAB', 1, 0, '2015-03-16 06:08:27', '2015-03-16 06:22:20', 'paul', 'nwachukwu', 'others', 'www.facebokk.com/pauldaslimkid', 'www.twitter.com/kida_rocks', 'www.purevolume.com/kidarocks', '', 'Number one in ma hood no one does it better than me......ITz yA Boyyyyyyyyy', NULL, NULL, NULL, NULL),
(91, 'damieloxzy', 'youngteeleo101@gmail.com', '$2y$10$L25Xoj1rBXo7s6.Yo96Mve5TshrkOD3ddb/KFs4yyMaDJL39hWDhu', '789318e085d31e8aace99962f586c422', 'NY85jWGlgffVmMyiZQSQuS0mf9CIM7kD55Cqd7wZgwxx3rdaVQ2AeKNQjOnZ', 1, 0, '2015-03-17 19:18:14', '2015-05-29 00:30:45', 'tunde', 'damie', 'singing', 'Enter your facebook profile ID', 'Enter your twitter username', '', '', '', NULL, NULL, NULL, NULL),
(92, 'tommeyanaempire', 'tommeyanaempirestateofmind@gmail.com', '$2y$10$NCCzbFAj/oSM3cww4e9Ld.grG0i5WGSzcqIWvOsdQ6.b.jAtIZOJm', 'cd69de94d9109cfc41258fe27b72808c', NULL, 0, 0, '2015-03-17 20:53:12', '2015-03-17 20:53:12', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL, NULL, NULL),
(93, 'eberebliss', 'eberebliss1995@gmail.com', '$2y$10$xmoEmOsYjcjvG/DSs/65/uNAYDKRTxhk5QfYxPt48Sj386CQLFSQe', 'f0ddf4396687b22f9fa51493cc4803a4', NULL, 1, 0, '2015-03-18 17:30:58', '2015-03-18 17:34:53', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL, NULL, NULL),
(94, 'jayxin', 'lekky.johnson@yahoo.com', '$2y$10$3uC98//z8sBtv1zXepRfoO4fy/Bacmd569.WuUwnC/P9tQlIlMPju', 'd8721b72d5d27f6e9383e26564e76f9f', NULL, 0, 0, '2015-03-19 23:08:46', '2015-03-19 23:08:46', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL, NULL, NULL),
(95, 'Makzico', 'Makzicoyung@hotmail.com', '$2y$10$Cv210Df3wfTY5tnGpBMlzeuQUx9bcVI6FTZ9Oyr7CKV58IsLkxE0C', 'c668b60a83e6b881758e6966b1165a86', NULL, 0, 0, '2015-03-22 05:50:46', '2015-03-22 05:50:46', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL, NULL, NULL),
(96, 'bibyonce', 'bibyonce@yahoo.com', '$2y$10$.RaGuHBewMUQ4o9Zd6A.W.nm7tmzkYVdunc4/pPMB2EXSwyGLC.YG', '76fc4dc14b03a8f7008a64746f6ccfe3', NULL, 1, 0, '2015-03-23 05:29:38', '2015-03-23 16:56:10', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL, NULL, NULL),
(97, 'bemjohn', 'bemjohn1994@gmail.com', '$2y$10$h4D.y.10KHsl5k.7JiacMO0LM085JFrU9dIWrbIOgQMn9DiCtlsH2', '9e0711e2726743f1e66c8891d9534984', '7COsdoSO1TruwQfvXyhHTDXIYsUwjFR1EOJp0r9db4G1oM7t8PsraDjjSKCZ', 1, 0, '2015-03-24 04:25:17', '2015-03-24 04:45:03', 'bem', 'gbateman', 'singing', 'Enter your facebook profile ID', 'Enter your twitter username', '', '', 'a simple normal guy that reside in lagos.school in unilag and aspiring to blow  one day like a bad fuse in the music industry', NULL, NULL, NULL, NULL),
(98, 'ME2', 'lyricallyendowed@yahoo.com', '$2y$10$wE8jUJ8iAoMNMyT9UcXw7uCd8MEztZb6afphi4XlkOp2hMrgH7V4.', 'fc7fb14d1e748b2010888daa67ca703e', NULL, 1, 0, '2015-03-26 04:07:50', '2015-04-24 11:37:17', 'Metu', 'Francis', 'singing', 'Metu Francis', '@wwdmusik', '', '', 'mystical rappEr with a lyrical vEnOm...', NULL, NULL, NULL, NULL),
(99, 'Alvinsj', 'fexzy4allbabes@yahoo.com', '$2y$10$guYm8z1vmJoSUZwjhZ8qU.vHQ7QsbOUD1UOpye6mJlpqo87ugIda.', '4e38b23e217d5496ff5ed80fb9995a0a', NULL, 0, 0, '2015-03-27 05:03:12', '2015-03-27 05:03:12', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL, NULL, NULL),
(100, 'bson2015', 'blackson2015@yahoo.com', '$2y$10$GJ0QbAJj8r791ez.ZynktOsMXshUG3ov.1fsTUjfkmTv4HWRGfEg2', '5cc44aa0374fdf68d8ef2087c8c22dcd', 'OPZrRU4nO5Ndj8rj8x6wxeKq8siHqARWuANI0c3EKFxq92sdVGmv83MsJl9c', 1, 0, '2015-03-31 20:17:02', '2015-04-01 08:48:27', 'Awoyinka ', 'Oluwaseun', 'singing', 'black son', '@omodudu2020', '', '', '', NULL, NULL, NULL, NULL),
(101, 'djslim', 'mycitymag01@gmail.com', '$2y$10$.4/wCl6PdQNR4regzZurteLS1InSBnN78mI3Jt97Bnh5hW9nJ9FJy', '7e10620c28dcbd72a8ca990628ae2162', 'gyv1XFDXhS0AmUqW7IMGKPRBNGBN3nkqg80KNitUdMLMxJdrXBocAfSvYlvb', 1, 0, '2015-04-03 21:42:30', '2015-04-03 21:50:02', 'flex', 'records', 'singing', 'hammed slim yusuf', 'Enter your twitter username', '', '', 'i am dj slim', NULL, NULL, NULL, NULL),
(102, 'ixrael', 'princeisrael5@gmail.com', '$2y$10$yQwjKc2CJ6GICToVWmqvJekm1N24OKrN/CB5o9RPpXivdIm561pNm', '7212d8233f95e2831a6acdabae2a1d77', 'sXdu9aFq7MrsUtHP7Ryca6tPVlApsDRlRFvMS4Nf0rkuPiig8m8r82rSR6pW', 1, 0, '2015-04-10 22:11:14', '2015-05-01 21:34:40', 'ixrael', 'bobo', 'singing', 'facebook.com/prinze.israel', 'Enter your twitter username', '', '', 'I’m the illegitimate love-child of Strategy and Creativity. Now neither parent admits to having me…', NULL, NULL, NULL, NULL),
(103, 'samizares', 'samizares@hotmail.com', '$2y$10$W598BMC/XJlJfYAeIASw6uz5AqQWgApPYUnpoJ/aU0G6nVjDt8th6', '12d9eebc1c94c08e336fb85c0d9fb2d6', '8V0M8uYNMPXKKoY6fUlW2DU4Cb2n2TaVH12pWNF3HtUdjOwWL1OIYki4eHaR', 1, 0, '2015-04-20 08:04:23', '2016-05-02 00:55:07', 'Sammy', 'Yoor', 'dancing', '#', '#', '#', '#', '', NULL, NULL, NULL, NULL),
(104, 'amadeeoha', 'kennedyajekwu@yahoo.com', '$2y$10$DRyJtTkj714qqKubbNPMyOKUxo6GXC/8CvXhCeDQWo4NNhe8lwJsG', 'a2d6e0bffe4371244d9938786596fe3e', 'nqTpIDEeJXFpNmSJlu7bp8w8n0Y33Du29tUJ2ijv1O8Zu55Fi5eC6PRUUXbS', 1, 0, '2015-05-02 06:38:49', '2015-07-05 00:27:08', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL, NULL, NULL),
(105, 'Dominus3D', 'donchedozio@gmail.com', '$2y$10$v3JoHJHoCCjmBFemJ16m8.QrYxTY1H2REswjf/vdX4b0Ecu0kjwTu', '34254c21e82fde2621037fd9a0805395', 'ZIYs1gzdNF6u1NfsnBSJQgV0ArJMc5FLeGKape4V4jJOcAlsEcYM7cAiVlpn', 1, 0, '2015-06-07 00:17:12', '2015-06-07 00:36:41', 'Mbanugo', 'Don', 'singing', 'Enter your facebook profile ID', 'Enter your twitter username', '', '', '', NULL, NULL, NULL, NULL),
(106, 'femzy', 'femzyxboiz@rocketmail.com', '$2y$10$Jo.9mxVe2fQhWJBBSjwu1unqwKK4BHmRykyVl7xpbK3CWov7e01ga', '2434f2f0cc681299ed34376bda3243a7', NULL, 0, 0, '2015-06-10 18:40:57', '2015-07-02 16:26:03', NULL, NULL, NULL, 'Enter your facebook profile ID', 'Enter your twitter username', '', '', NULL, NULL, NULL, NULL, NULL),
(107, 'Liljim', 'liljimkhalifa@gmail.com', '$2y$10$S4WifJZwq8hzf9iksIr3xeliAnsn3MLWNZQGYIsGf8x1d92Qwzz/e', '30b4c454c422d0552adc6ec7cf5f6a4d', 'I3pu1PIl4rjFBHtAorMBjehCOX5TqZEW85aWAHIeUfV2mdRu6hHms4w0kW2I', 1, 0, '2015-06-22 18:00:30', '2015-06-22 20:19:12', 'khalifa', 'junior', 'singing', 'liljim khalifa', '@iamliljim', '#', '#', '', NULL, NULL, NULL, NULL),
(108, 'tosin', 'toakwag@yahoo.com', '$2y$10$PYMVs0/DTofvpIlIIGB6PuI62DZ6drZTOWZ/ZifMH9yTekTJMJZyq', 'c82a869d1f18149720096f7f582f64c5', NULL, 1, 0, '2015-06-24 16:26:09', '2015-06-24 16:34:18', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(109, 'randoman', 'gbolahanalade@live.com', '$2y$10$nCGvuVVEXm9N/NWnRi2kjOw2ZexMffSMyhLkjM4s507NXNUQ06KzC', '8e9db94bf5add3312f23906141e5dc86', NULL, 1, 0, '2015-06-24 23:26:53', '2015-06-24 23:33:23', 'random', 'man', 'comedy', '#', '#', '#', '#', '', NULL, NULL, NULL, NULL),
(110, 'ajaa', 'kelechiodom@gmail.com', '$2y$10$uezmbciE1rZy7sqJ7/EzluWTBJOH3NZhf6sf9wmLpcJS7MYCGlvfG', '089a13068ff0c514d590624eca426d6e', 'pbfurUcfF7bzAQxfz1tUzSlRp7Zhloo0GBkTAU6qfuvCveiJeYFddha8HsyH', 1, 0, '2015-06-30 04:04:33', '2015-07-14 13:40:07', 'kelechi', 'odom', 'singing', '#kelechi odom ajaa', '#', '#', '#', 'rapper/singer ', NULL, NULL, NULL, NULL),
(111, 'JOswaggz', 'john2face2007@yahoo.com', '$2y$10$K/rL6.tc4NFIoT4Gd.Yzu.IT2i0YwSgxQoGxLN9LiEw89DJ5oU1Wy', 'de87271b6b9903db083e7c2dffb7189e', NULL, 1, 0, '2015-07-06 15:40:53', '2015-07-06 19:34:44', 'john', 'eke', 'singing', '#https://www.facebook.com/joswaggz', '#https://www.twitter.com/johnekeh', '#', '#', 'eke john eleanya(born 18 january 1990),popularly known by his stage name Jo''swaggz,is no doubt one of the finest promising Nigerian afro pop sensation artist,songwriter and performer.a native of ABIRIBA of Ohafia L..G,A, Abia state-is a product of cr', NULL, NULL, NULL, NULL),
(112, 'OMOBOY', 'temy_babs@yahoo.com', '$2y$10$S7qUIN0n0/wRjJ9SYq.18OITuglqTVerkcDjTgKtZDtuu79UNsZYO', '98ee2cb7cae9ab27b8ad0f32a944ec55', 'DkzQkRihMVfps3HpVhlHlzwxglXTzOZSJYPoKR6IdfVbkaHTDySQOrHazE8s', 1, 0, '2015-07-12 04:38:07', '2015-07-12 05:11:37', 'Abolade', 'Babasola', 'others', '#', 'https://twitter.com/iam_omoboy', '#', '#', 'recording artist/song writer/sound engineer/producer..THE NEXT BIG THING TO HAPEN', NULL, NULL, NULL, NULL),
(113, 'HoDaBz', 'i_adeyy@yahoo.com', '$2y$10$MRYxMCZYf9KmnLPfuQ6/ge.QidWj/1QHsXicRbVz6WMqwd7Ncb4Z6', '562157b62c212e7a7712cc2712d0c326', 'i83GSezxMQ1jneOSj8zhjAEGb9j7s0Uzbg2z8AZUmJrcWa3XOmFgrXjWVrNp', 1, 0, '2015-07-13 16:28:36', '2015-07-13 16:56:49', 'Ibrahim', 'Adey', 'singing', '#', '#', '#', '#', '', NULL, NULL, NULL, NULL),
(114, 'chuza', 'cidflex@gmail.com', '$2y$10$zfIDE0s/K7K6rqIeJDGUGOwW1xbfJ25kmzxO4/2a5w5JjShFxpS.i', '569460ea5da822e30355b837fb5d586c', NULL, 0, 0, '2015-07-14 13:42:46', '2015-07-14 13:42:46', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(115, 'sir_hamza', 'agboluajehamzat@gmail.com', '$2y$10$V4K7UGGQuvuP1qgNJUyIku1zY9oT6gTQsSMIFmF8I7sYKK5k8Lt7e', 'e6bee1a06b05be5dc9d1b28de24b3b7d', 'Q4kvfITck0iyCV4JzW4Rx2g1IeL3H1PUWddJ8qzUpfeCoVSM58u9WlYSXYr0', 1, 0, '2015-07-14 15:53:46', '2015-08-02 05:54:29', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(116, 'tillion', 'precious123@gmail.com', '$2y$10$ca2.nduwvC6BRAtoJW4Jf.OVAZPrK7xRQkAUEuPY3WD1WQ.XZofdK', '10a849b92c0edb6e8ca0deb319e348ec', NULL, 0, 0, '2015-07-14 19:19:45', '2015-07-14 19:19:45', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(117, 'mayowoyele', 'owoyelebeckley@yahoo.com', '$2y$10$V/SR8ogCMOXRJzj2ObxJoeYAhnAwAI.zzkhBZKbS9.WEcwO2jOJqu', 'be933c4c3dc4336af2d8757650080d97', 'AMWwVBlELtpserL4FUPkvXyv9NkFLw4GBoP0m4SLOeXr4t4fyHLKONwFEjK5', 1, 0, '2015-07-14 23:38:17', '2015-07-14 23:44:43', 'May', 'Owoyele', 'singing', 'Facebook.com/mayowoyele', 'twitter.com/mayowoyele', '#', '#', 'rapper', NULL, NULL, NULL, NULL),
(118, 'sylarrbaby', 'pappilo2207@yahoo.com', '$2y$10$tTQbO0rS6GMDdwTuPppdHela6mSIHAijw7huRH9sfkr5.VkIfWkaW', '452978fc0228ef5ae9237f244ff43195', 'rePLelwRk5IRVGG6SVIHtFBE0FORCLuJRnLPMe7V31BVQf0EEnrhiPvuYofs', 1, 0, '2015-07-15 15:30:23', '2015-08-26 11:12:45', 'Sylarr ', 'Ardei', 'singing', '#www.facebook.com /sylarr ardei', '#www.twitter.com /sylarrbaby', '#www.soundcloud.com /sylarrbaby', '#www.youtube.com /sylarrbaby', 'sylarr is an exceptionally talented artise  check out one of my stuffs here     http://yourlisten.com/Manina.Tamzie.Adetutu/sylar-trip-in  ', NULL, NULL, NULL, NULL),
(119, 'Dajasper', 'Eadah9004@gmail.com', '$2y$10$giu..l98Dy9FfGv7uKzaSecufbq6k7slAbuW/qKfmEHL4jwC/9JmW', 'e48f044fdfd31e854279f099bd09a5fa', NULL, 0, 0, '2015-07-15 16:02:03', '2015-07-15 16:02:03', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(120, 'PETERjeezy', 'peterjesse27@gmail.com', '$2y$10$OKd/o7vJDsXQFyIE2nMUGeUO178RWzAFV81FoHt4GRhmJPdKe4tXm', 'd7fe0bbf33ae5ef23342fb1b8d506cad', 'gghJcYCEBhsh3edtl8EXZ1v4IhG02ijF5vM75DCdzDeXTg2pYmk3YE91SfHZ', 1, 0, '2015-07-16 05:42:14', '2016-03-07 05:41:10', 'umuarohor', 'peter jesse', 'singing', 'facebook.com/jesseotega', 'twitter.com/peterjeezy', 'soundcloud.com/peterjeezy', 'peterjesse27@gmail. com', 'I''m an all round entertainer.. music is every part of me', NULL, NULL, NULL, NULL),
(121, 'moduolusanya', 'moduolusanya@gmail.com', '$2y$10$BhTBTVy3sQgFjQHVllunXO1YoFSgQ9FYnOzLArTl6F4icqg7X.ssO', '42838b6148ff759ba55491171c6ef424', NULL, 1, 0, '2015-07-19 18:25:08', '2015-07-19 18:36:35', 'Modupeoluwa ', 'Olusanya ', 'others', 'moduolusanya', 'moduolusanya', '', '', 'Make up artistry @ it''s zenith', NULL, NULL, NULL, NULL),
(122, 'holuwabenny', 'saintjude43@yahoo.com', '$2y$10$rcBvNRf9d10H3fSxqyeBQu0WFlT9xWd2q4PCJKBQZ2xEYe.29MafS', 'b3b2a5ed5f2ffe9993e4c095ce516b5f', 'lC2EpcCjtpr9iPmGU4uyWylIUFuCYUb0zRvgiPN683GqZ001p1Nl7gonEMCh', 1, 0, '2015-07-26 03:10:01', '2015-07-26 03:14:12', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(123, '4laxh', 'emmyprince7074real@gmail.com', '$2y$10$erM0Q/jHdR8cCmwUuHKCcOH5/gqHTpWI6bd4Z1dhX.jqPo294ujGW', '9e115c530970ac08abf17cd2cf3451c9', 'unV1JcSbraSYWSp30d03Yn9BYhITw06R8oFGHWznUH4VMUSyh8HJO7gguLWW', 1, 0, '2015-07-26 07:01:07', '2015-07-26 07:04:29', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(124, 'Skibo', 'emmanwachukwu16@yahoo.com', '$2y$10$y1pddQLNMsQ5IHppPEUWCOK1iOqENQnQmyQ0jXcdDno691f.ksmJu', '6644435e45821218b4c75e203b864bd5', NULL, 0, 0, '2015-07-26 07:08:51', '2015-07-26 07:08:51', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(125, 'BeekAce', 'biowo@rocketmail.com', '$2y$10$nypMKzkAFG5nvGfrb1WrHeEcJEkit1TptmZEHeEdFsLUtXI6jg4AK', '489c6108459c6998fbf1bfaa320345a8', 'FOFwKK6Zb1G2iwX0pAyetK6CT6e0KrWygOjhPzL1psLUxtyewfJcJ67HXI8l', 1, 0, '2015-07-27 03:15:46', '2015-07-28 21:45:30', 'Abiodun', 'Owo', 'singing', '', '#@iam_beekace', '#', '#', '', NULL, NULL, NULL, NULL),
(126, 'flexrazzy', 'keanywallace@gmail.com', '$2y$10$IgHsRRdRuPvXiNrB7qJBN.ByfCTvxTzWaeiku2XiFlh/5jX4ilSRi', '36df89421257c98511d6b49def7bc28b', NULL, 0, 0, '2015-07-28 06:03:09', '2015-07-28 06:03:09', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(127, 'calculuxx', 'calculuxx@gmail.com', '$2y$10$4qzsW87G2952DOM/4I0ane9/7SxCgNNvywaO1aXFv95uNEfP2Ifim', 'c038eca70348355621723b999032787d', NULL, 1, 0, '2015-07-28 21:43:10', '2015-07-29 09:44:28', 'Olusoga Gbenga', 'Daniel ', 'singing', 'https://m.facebook.com/home.php', '#', '#', '#', 'Artiste,Model,Song Writer.........07032348816....08083213193', NULL, NULL, NULL, NULL),
(128, 'flexrazzypm', 'marykent121@gmail.com', '$2y$10$aPQZIWItxbPxgFGntWMVS.KewF/h/hgvbFhUjlQLGgYFcGk9TEbK6', '1bcc4e6f4fb4b02336b2b4cae56a2956', NULL, 1, 0, '2015-07-29 04:23:01', '2015-07-29 05:17:10', 'Flexrazzy', 'pm', 'dancing', 'flexrazzy felix', '#', '#', '#', 'I am flexrazzy a hip pop and r&b singer from East of Nigeria a producer singer and song writer start music at the age of early age looking for a record to work with you can contact me my number 08062525700 I promise to make you never regret having me', NULL, NULL, NULL, NULL),
(129, 'MistaSkies', 'ogbonnaikennap@gmail.com', '$2y$10$VvY7WcAS5ZFQwnkpirw2sOqxh43q6PQIk6A4VEFeLG6mImdhTeGs6', '9eb9736485c54de215a8319c5615f7fa', 'J935vpt0cSC8wAtvDYwLQ2oZ4fBwKw4czybSnPEOZLJv1MCkL6XkcNsukEOf', 1, 0, '2015-08-03 23:38:49', '2015-08-04 00:05:31', 'Ikenna', 'Ogbonna', 'singing', 'https://www.facebook.com/mrskies', 'https://www.twitter.com/mrskies', '', '#', 'An amazing singer/songwriter from the heart of Nigeria.', NULL, NULL, NULL, NULL),
(130, 'Uju17', 'ujuodigboh17@yahoo.com', '$2y$10$HzTlcrL4gFfqeS1uTHOaL.aPQrbf6./PbkI3bat3Jp2qOb8P2lU1W', '7ddfdf52cb9a1482364ed58ad04b4e73', '6TqbjKq3YCBXeHcwPjjaAomlgkTWNrC0fhSzndrU2884twzMFe02vv51Mf32', 1, 0, '2015-08-09 02:06:35', '2015-08-09 02:08:27', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(131, 'oz_blah', 'ameenolumide@yahoo.com', '$2y$10$b4GkdqHOGXFAmqJqZ/H.0elz6c5W231jdMOdoHvtY2PdwlkcZPguW', '2b13076c704a2a8a1b6ba1acac873e99', NULL, 1, 0, '2015-08-17 20:01:43', '2015-08-17 20:08:35', 'ameen', 'olumide ', 'singing', '#ameen oz olumide', '#oz_blah', '#', '#', 'a rapper', NULL, NULL, NULL, NULL),
(132, 'Chorus101', 'chorusugo@yahoo.com', '$2y$10$iAgkIqWs9zPLmj4Lfm9bbu5qHoG60I5r16X4klT6YzkSfyjSvCZ8O', '1700e75c4ffde13eaa177a410cbd3e59', 'LG8V0FUjOGE0bW3Vmu78wJOrfKbUUCFzsXiWd3j44qwRtirje5IXPIe8RhCo', 1, 0, '2015-08-27 02:55:08', '2015-08-27 03:02:35', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(133, 'Chiddytunez', 'Profchidos@yahoo.com', '$2y$10$VbSKsiTUxdNP7SowO4Pbyea1Y16LsM.mwqPnCcdl16gnMy0dG8e5u', '2a97a1753ac78c9bf167aabebd33acd9', NULL, 0, 0, '2015-08-29 17:43:41', '2015-08-29 17:43:41', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(134, 'kzelery', 'kzelery@naij.com', '$2y$10$451..RVrY7u49BIjkFWhquAldRazp29keiSJbJpdaX5hWmF3OyvPq', 'ccbcfb00a015df511694b2d8772cb5e2', '7mId2bHHZCWkKPhzXbfIcOBNXFocNjbANxssjScWi1wRdCHxhCWTi6Ouj0n0', 1, 0, '2015-08-30 14:25:14', '2015-08-30 14:30:45', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(135, 'UNITT', 'Tottigreatest@gmail.com', '$2y$10$dl2Gf04Z.INZnTXPbg2HweZV63bpDynsL3R1IChrCCVKabvnT05TG', '8f751dcf3a643d37548b672f5e0092c1', NULL, 1, 0, '2015-08-31 15:25:44', '2015-08-31 15:27:37', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(136, 'Abdallah', 'giwaabdallahgao@gmail.com', '$2y$10$tSROn/57Ef96e3VUz.VgHuwvIZGnSxJMK0sByq4Tx75NyUCvkngsi', 'e2f76282a5024c806748d4be3f60e415', '5LkD0B2qdZJW8NMcqFoV3TvGRi28jaGLMOL1XszArvl07JcEhyYqiLrHbe11', 1, 0, '2015-08-31 16:17:16', '2015-09-12 01:40:02', 'giwa', 'abdullahi', 'singing', 'abdallah giwa', '@eminiabdallah', 'GIWAABDALLAHGAO@GMAIL.COM', '#', 'my names are: abdallah,mcflow,dextro,and werepe, i stay at no. 68c bankolemoh off akerele road surulere lagos. i''m a rapper, and i du it with my local tongue "YORUBA"', NULL, NULL, NULL, NULL),
(137, 'hizzib01', 'hiziogba@yahoo.com', '$2y$10$SommyrMFD.pZMojnd/bsdeuxlRGnS2As9xpB/2.5/HdzJR7jw.gu.', 'bf92cde6f488d0aef610adf02f75c8e5', 'sPW6x0hX3aulx2VgRJH4vBQKHfOPI5IpmjAZGlCtRMBcXlnELGdJfbQWVHZ2', 1, 0, '2015-09-08 05:03:24', '2015-09-25 18:27:56', 'Henry', 'Iziogba', 'dancing', 'Iziogba Hizzi''B Henry', '#@hizzib01', '#', '#', 'am a graduate of microbiology,leadcity university.hail from Edo state though born and groomed in Ibadan .from the family of seven and last of my siblings. I love rapping and making good music, touring , meeting people and spreading good news.am a Chr', NULL, NULL, NULL, NULL),
(138, 'oscaruzo', 'oscaruzo4u@gmail.com', '$2y$10$gppi2EnkR/7NskfZsYBzs..gr49JK8rDSYvCwjzCy1gtCXVDpqvRe', 'cb6bdeacb553588d6d3902416b92d38f', 'wajWqCk01VP8GYZZC2NMwoi5PLrU1pRBVG9yKRX8EeZBrPzegMKC15L5aGCZ', 1, 0, '2015-09-08 23:40:50', '2015-09-09 01:05:48', 'Onuoha', 'Oscaruzo', 'singing', 'https://www.facebook.com/oscaruzoonuoha', 'https://twitter.com/oscaruzo1', 'https://soundcloud.com/oscaruzo', '#', 'SINGER, SONG WRITER, PERFORMING ARTISTE. Ff on Instagram and Twitter @oscaruzo1', NULL, NULL, NULL, NULL),
(139, 'fash', 'fasogbono@gmail.com', '$2y$10$ar8r8MBMD21vi6akLgmSCutoI2zbnv5EC3bqC792YTPwXBKFIUe4e', 'e86e7f089e11b163a95872838ec68f63', NULL, 1, 0, '2015-09-12 03:10:06', '2015-09-12 14:11:49', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(140, 'CowardPt', 'kate@epromail.pl', '$2y$10$WZeUxs2HYaS3lmCc8cffa.bU/8SfMFDgJDhAi5b/BFwoUwkS3Wnse', 'f0ca204d8f3171116d6827c75db86ec2', NULL, 0, 0, '2015-09-12 10:37:18', '2015-09-12 10:37:18', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(141, 'Patrick', 'patmaxi2000@yahoo.com', '$2y$10$FvZTFtHdzv4HePtlOqzhlu3qS8CaC9G1QL7oAqIqM7HooH29oZpoW', '9a5b40bbeaf2e7ab0442fbe17dbe8f85', 'DetCpj8pofn6nLIi1uTFpkFHzuqyvugarWnwrujmHqtySt53HdNR6K9MKmh6', 1, 0, '2015-09-12 20:54:45', '2015-09-14 19:53:49', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(142, 'slimfresh', 'slimfreshjahboy@gmail.com', '$2y$10$/cTnjVyFl8ahiz1uUyDuKuPJrCCSuyEuZdPbk9p20kwHkcI6xqLzy', '11bd9fb18c836df1e53fae140257d5ee', NULL, 1, 0, '2015-09-14 00:22:06', '2015-09-14 15:56:41', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(143, 'flawless', 'anyagwachimezie@yahoo.com', '$2y$10$oYeDX4ra4n4gXrfK.Bz44OBqb2eNOHJ39wJ9Fv/p7PNPNeSSecwZe', '773d298097a6eed0b31b7fdf07d18ee8', NULL, 0, 0, '2015-09-15 10:37:57', '2015-09-15 10:37:57', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(144, 'boluhwtf', 'ademolubolu@gmail.com', '$2y$10$vWFMhJJGvePZTT/uy0LXZ.r4F/9yDRU10UbRuUOp5tT3VIxex2h4O', '360d15191f736e4e4268681843975384', 'CydSWF8iLcJbW86xyTXjARokhbf2r2Msedn3NLS63f5bGvdozf7ZU8Fb0VAb', 1, 0, '2015-09-15 20:53:50', '2015-09-15 21:13:04', 'boluwatife', 'ademolu', 'others', '#', '#', '#soundcloud.com/vybzcheq412', '#', 'i''m an ip and coming producer from lagos,lover of alternative and soul music.watch out for the EP "rhythm n black"', NULL, NULL, NULL, NULL),
(145, 'Chiddytunes', 'Chiddytunes@gmail.com', '$2y$10$ibY1BCTy.y9Sb1/CJRGbgeFLn8hcfZz8utjlZ7f16Fe78GZQBN/p6', '75c2d7c1429985b4eaa3e0d8c4aae6d2', NULL, 0, 0, '2015-09-24 06:19:34', '2015-09-24 06:19:34', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(146, 'Kay_hennessey', 'elofulume@gmail.com', '$2y$10$/rmYqQbvliR5N6bziRlyCewxm8qKlxS82x.IEBsRzoJ5QEI8soQ.S', '4ee49c5f3b635d5256d20f2706dd9b2b', 'qdITvT4e6PzmcFkruPNTH4yxKcAuNlwjC1JXtiMjVjPVRqGzzx7R6tCQFQsB', 1, 0, '2015-09-24 19:57:30', '2015-09-24 20:01:16', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(147, 'Row-d', 'lugzpink@gmail.com', '$2y$10$np58h6VgrRyoe/Jlk8VsHemTX6uuHT359V2RRwDt9ZwBomKqP3siO', 'd05c9d99969e5b7176f2ec7ec7531032', NULL, 0, 0, '2015-09-30 17:44:43', '2015-09-30 17:44:43', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(148, 'ralphofficial', 'lugzpink2@gmail.com', '$2y$10$bjV1kFV8rjnxmRejHdBNmOa6Xmh6ihyUp48eiqJ.sAa68ySePjX8a', '2cc9e7346634df44c2361f7345fc0d33', 'vuNTYQcysUIpSLGjFWD1nXagSCdRsR17wARK7L92y9IXxkhRxlRJXREGdkLp', 1, 0, '2015-10-02 09:53:46', '2015-10-02 09:57:07', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(149, 'Staceyzzspen', 'staceyzzka@mail.ru', '$2y$10$84pCIPvds8q/uFbzAi8vG.tPJ/hkFNPmXqolfQK.9sBsTZTrYeLWK', '8caaf9cc159c8bf0dcf29ead00fdf805', NULL, 0, 0, '2016-01-07 03:53:20', '2016-01-07 03:53:20', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(150, 'ThomasKl', 'thomasKl@mngr10.xzzy.info', '$2y$10$yaJ1HineXHUK5Aap2.xHc./H2WDPU5EIcPRT6k97jPdkOXUJ3b1OG', 'f40d8a6800aee0c215c8dd9311683dc1', NULL, 0, 0, '2016-01-28 23:59:27', '2016-01-28 23:59:27', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(151, 'Tintolee', 'vicolu08@gmail.com', '$2y$10$rXIj.TM6I8BSmVSysDX.hOk9T5WXR7S9WRqPb2Ye5Aj8EvO2K1Lrq', '1d56dc0173b55ce37fc1e29a2155c5bf', 'lNAFuAyh5882EqqyPBrBrMDycTNMSXRJsJsNP4UKq1g3kUdrHXKlgV4gAbVd', 1, 0, '2016-02-18 22:51:21', '2016-02-19 20:37:43', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(152, 'JustinCep', 'saminsky1@yandex.com', '$2y$10$zi3z5VUWXZaEdGSFgqKECuW0UIGWfeuaL/HeeCGKsOsiOvW9Lny8y', 'e12b1c0569933cac29ac580194259413', NULL, 0, 0, '2016-02-27 17:50:29', '2016-02-27 17:50:29', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(153, 'MatilysPl', 'iana.khazieva@yandex.com', '$2y$10$1shdnyVH77jwB60mmgrD3ObZHppjQ.Sc.ox3Gfsv6ggYRmpnDWsMq', '9a4c3c5effea245e34612e5efb299db6', NULL, 0, 0, '2016-03-14 04:58:13', '2016-03-14 04:58:13', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(154, 'Warrencymn', 'warrencymn@mngr12.xzzy.info', '$2y$10$PTgDDwyyQloZIUVLmR1d8O0iDqmoexAFX9qpXuEtgwfKH8YySR.ry', '60aa702b280b5a84c5deecaa206db4b1', NULL, 0, 0, '2016-03-25 08:28:47', '2016-03-25 08:28:47', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(155, 'GeorPault', 'emailk@sildenafilusfor.com', '$2y$10$Ln/paqrV8JFr9R.tw4O9yeF1wbf9.H0Wi/li931S8he.Rm7M73mhi', '1e1b3ca716398fc12977729260e94d73', NULL, 0, 0, '2016-04-03 05:20:06', '2016-04-03 05:20:06', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(156, 'RonaldSose', 'madlenoldbridgea+22a@gmail.com', '$2y$10$jtGieLQmmVK7yHaPri7F3OtsJjHtINBDbLkv9UgLYxrvTeXkavOV2', '62002dcf2699b75c7f83506311c03175', NULL, 0, 0, '2016-04-03 10:42:14', '2016-04-03 10:42:14', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL),
(159, 'sammylee', 'samizares@gmail.com', '$2y$10$VRThFte6CTQqZIbf2tO5ZOzsbg.M95UboIfmHgVm6TYuVyGcEc962', '7a6jAAe7PoKA9lpwVwEl3eMGl3ITUc', NULL, 0, 0, '2016-05-02 01:01:15', '2016-05-02 01:01:15', NULL, NULL, NULL, '#', '#', '#', '#', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_count` int(10) UNSIGNED NOT NULL,
  `video_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `videos_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `published`, `description`, `image`, `video`, `comment_count`, `video_type`, `youtube`, `user_id`, `created_at`, `updated_at`) VALUES
(44, 'MI Endorsement', 1, '', 'img/videos/images/6Htbly_davido.jpg', 'img/videos/hjneSr_27colours MI Endorsement.mp4', 0, 'Music video', NULL, 63, '2015-02-26 11:20:03', '2015-02-26 11:20:03'),
(45, 'Falz d bad guy', 1, 'Funny skit', 'img/videos/images/prAnpb_IMG_20150218_134420.png', 'img/videos/yP04qz_VID-20150222-WA000.mp4', 0, 'Comedy', NULL, 68, '2015-02-28 01:08:22', '2015-02-28 01:08:22'),
(47, 'Mall drama', 1, 'Funny skit', 'img/videos/images/jE8FRz_1424900595724_777292.jpeg', 'img/videos/IAXqRF_906654101583508565_270805588.mp4', 0, 'Comedy', NULL, 68, '2015-02-28 01:15:29', '2015-02-28 01:15:29'),
(49, 'Mc shaggy ', 1, 'Comedy ', 'img/videos/images/4dCitL_DSC_0451.jpg', 'img/videos/GSwIBF_10923859_389619641218733_932758697_n.mp4', 0, 'Comedy', NULL, 71, '2015-02-28 16:34:33', '2015-02-28 16:34:33'),
(51, 'Funny video', 1, 'Silly dude', 'img/videos/images/lYvK0B_IMG-20150216-WA000.jpg', 'img/videos/2bv8j6_VID-20150207-WA000.mp4', 0, 'Comedy', NULL, 64, '2015-02-28 22:51:01', '2015-02-28 22:51:01'),
(52, 'MI Endorsement', 1, '', 'img/videos/images/uxeNqq_Wizkid.jpg', 'img/videos/M7EGxw_27colors-mi.mp4', 0, 'Music video', NULL, 63, '2015-03-11 06:28:22', '2015-03-11 06:28:22'),
(53, 'Tony Elumelu interview', 1, 'Nigeria Entrepreneur', 'img/videos/images/xTQ5OG_alpha_amalfi_coast.jpg', '', 0, 'Music video', NULL, 64, '2015-03-11 19:58:32', '2015-03-11 19:58:32'),
(55, 'D''jia rocks this so much', 1, 'Mavin Artist D''jia rocks this song so much.', 'img/videos/images/Gig3aY_dija.jpg', '', 0, 'Music video', 'w0MiYMNheiM', 103, '2015-04-20 08:22:09', '2015-04-20 08:22:09'),
(56, 'Kesh - Shoki Rmx [Official Video] ft. Davido, Olamide', 1, '', '', '', 0, 'Music video', 'ctCcb48gYS4', 63, '2015-06-22 04:19:08', '2015-06-22 04:19:08'),
(57, 'Brand New one', 1, 'Brand New video ft. legends Awilo Longomba and Psuare', 'img/videos/images/PiudeG_psquare-brothers.jpg', '', 0, 'Music video', 'v_sMYUVyw4I', 103, '2015-06-22 15:10:16', '2015-06-22 15:10:16'),
(58, 'Genenny and Ice', 1, 'Genenny and Ice', 'img/videos/images/8hIiTW_don-jazzy-mtn.png', 'img/videos/ybN8S5_genevievennaji-ice-bucket-challenge.mp4', 0, 'Comedy', NULL, 103, '2015-06-22 19:57:53', '2015-06-22 19:57:53'),
(60, 'Pushaz', 1, 'Fashion forward', '', 'img/videos/mDlWA7_VID-20150623-WA0003.mp4', 0, 'Music video', NULL, 64, '2015-07-19 03:27:33', '2015-07-19 03:27:33');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallery_tag`
--
ALTER TABLE `gallery_tag`
  ADD CONSTRAINT `gallery_tag_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gallery_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile_photos`
--
ALTER TABLE `profile_photos`
  ADD CONSTRAINT `profile_photos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `song_tag`
--
ALTER TABLE `song_tag`
  ADD CONSTRAINT `song_tag_song_id_foreign` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `song_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tag_video`
--
ALTER TABLE `tag_video`
  ADD CONSTRAINT `video_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `video_tag_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
