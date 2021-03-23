-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2019 at 04:52 AM
-- Server version: 5.7.28
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ennvisio_casemang`
--

-- --------------------------------------------------------

--
-- Table structure for table `addmp`
--

CREATE TABLE `addmp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_mp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ba_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mp_mb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addmp`
--

INSERT INTO `addmp` (`id`, `name_mp`, `ba_no`, `mp_mb`, `created_at`, `updated_at`) VALUES
(1, 'Cpl Al amin', '4045064', '01769321230', '2019-11-05 05:34:08', '2019-11-06 06:35:14'),
(2, 'Sgt Shekh Forid Ahmed', '1219588', '017914681625', '2019-11-05 06:17:13', '2019-11-06 06:37:05'),
(3, 'Sgt Md Abdul Hannan', '1220016', '01769091292', '2019-11-06 06:37:47', '2019-11-06 06:37:47'),
(4, 'Cpl Md Aminul Islam', '4501790', '01723210528', '2019-11-06 06:38:37', '2019-11-06 06:38:37'),
(5, 'Sgt Md Kabirul Hasan', '1220221', '01863947871', '2019-11-06 06:49:59', '2019-11-06 06:49:59'),
(6, 'Sgt Md sarful Islam', '4025554', '01776363275', '2019-11-06 06:50:59', '2019-11-06 06:50:59'),
(7, 'Sgt Md al mamun', '1221216', '01770590939', '2019-11-06 08:54:00', '2019-11-06 08:54:00'),
(8, 'Sgt Md Mamunur Rashid', '4029811', '01921099335', '2019-11-06 08:55:13', '2019-11-06 08:55:13'),
(9, 'Sgt Abul Hasnat Shihab', '1221747', '01716080895', '2019-11-06 08:57:06', '2019-11-06 08:57:06'),
(10, 'Cpl Nurozzaman', '1220775', '01703747602', '2019-11-06 08:57:57', '2019-11-06 08:57:57'),
(11, 'Cpl Johirul Islam Ripon', '4032674', '01721148689', '2019-11-06 08:58:54', '2019-11-06 08:58:54'),
(12, 'Cpl Md Rofiqul Islam', '1810892', '01715035869', '2019-11-06 08:59:53', '2019-11-06 08:59:53'),
(13, 'Cpl Md Mosiur Rohman', '1444225', '01843738085', '2019-11-06 09:01:00', '2019-11-06 09:01:00'),
(14, 'Cpl Md Abdur Rohim', '4040038', '01816529117', '2019-11-06 09:02:17', '2019-11-07 02:23:54'),
(15, 'Cpl Md Alomgir Hosen', '4039422', '01723645636', '2019-11-06 09:03:17', '2019-11-06 09:03:17'),
(16, 'Cpl Md Abul Basar', '1221306', '01720338245', '2019-11-06 09:04:05', '2019-11-06 09:04:05'),
(17, 'Cpl Sumon Chandra Dus', '1225630', '01837629677', '2019-11-06 09:05:12', '2019-11-06 09:05:12'),
(18, 'Cpl Md Habibur Rohman', '1445531', '01747482672', '2019-11-06 09:06:06', '2019-11-06 09:06:06'),
(19, 'Cpl Md Rezaul Karim', '4031734', '01703259082', '2019-11-06 09:07:06', '2019-11-06 09:07:06'),
(20, 'Cpl Md Lutfor Rohman', '1227683', '01721904622', '2019-11-06 09:08:21', '2019-11-06 09:08:21'),
(21, 'Cpl Dipok Chandra Rai', '1228150', '01734411002', '2019-11-06 09:09:38', '2019-11-06 09:09:38'),
(22, 'Cpl Nirmol Ray', '1229193', '01734121720', '2019-11-06 09:11:01', '2019-11-06 09:11:01'),
(23, 'Cpl Md Abul Hasan', '4503712', '01736492221', '2019-11-06 09:14:11', '2019-11-06 09:14:11'),
(24, 'Cpl Mosahid Khan', '1229860', '01739266085', '2019-11-06 09:14:55', '2019-11-06 09:14:55'),
(25, 'Cpl Md Mahfuzul Haque', '1615476', '01683688269', '2019-11-06 09:15:50', '2019-11-06 09:15:50'),
(26, 'Cpl Md Abdul Aziz', '2411272', '01718984964', '2019-11-06 09:16:54', '2019-11-06 09:16:54'),
(27, 'Cpl Md Asaduzzaman', '4047279', '01928705236', '2019-11-06 09:18:14', '2019-11-06 09:18:14'),
(28, 'Cpl Md Pantu Hosen', '1616464', '01749732625', '2019-11-06 09:19:31', '2019-11-06 09:19:31'),
(29, 'Cpl Sre Razib Chandra Debnath', '4506762', '01731509212', '2019-11-06 09:20:41', '2019-11-06 09:20:41'),
(30, 'Cpl Md Delower Hosen', '4043471', '01794442281', '2019-11-06 09:21:31', '2019-11-06 09:21:31'),
(31, 'Cpl Md Asiquer Rohman', '1230492', '01844138936', '2019-11-06 09:23:21', '2019-11-06 09:23:21'),
(32, 'Cpl Md Shahin Raza', '1006023', '01778767523', '2019-11-06 09:24:30', '2019-11-06 09:24:30'),
(33, 'Lcpl Md Enayatur Rohman', '4044892', '01750327448', '2019-11-06 09:31:56', '2019-11-06 09:31:56'),
(34, 'Lcpl  Md Samsul hoqe', '1228781', '0172722416', '2019-11-06 09:35:41', '2019-11-06 09:37:33'),
(35, 'Lcpl Md Sarafat', '4505415', '01732997003', '2019-11-06 09:37:01', '2019-11-06 09:37:01'),
(36, 'Lcpl Md Monirujjaman', '1004919', '01720049492', '2019-11-06 09:38:41', '2019-11-06 09:38:41'),
(37, 'Lcpl  Shak Somanur', '4044828', '01725474023', '2019-11-06 09:40:18', '2019-11-08 14:31:53'),
(38, 'Lcpl Md Shafiqul islam 1', '1446548', '01724504897', '2019-11-06 09:41:27', '2019-11-09 03:22:06'),
(39, 'Lcpl Shabbir Hossain Khan', '4051312', '01921919185', '2019-11-06 13:28:48', '2019-11-06 13:28:48'),
(40, 'Lcpl Md Jafor Ekbal', '4506213', '01788524713', '2019-11-06 13:31:22', '2019-11-06 13:31:48'),
(41, 'Lcpl Md Shafiqul islam', '1813186', '01615142682', '2019-11-06 13:32:45', '2019-11-06 13:32:45'),
(42, 'Lcpl Md Mohibul Islam', '4506794', '01960620561', '2019-11-06 13:33:45', '2019-11-06 13:33:45'),
(43, 'Lcpl Md Abu Bakkar Siddik', '4507845', '01992052454', '2019-11-06 13:34:38', '2019-11-06 13:34:38'),
(44, 'Lcpl Md Suzan Mollah', '4047824', '01714708696', '2019-11-06 13:35:23', '2019-11-06 13:35:23'),
(45, 'Lcpl Md Faroque Hosen', '1616592', '01723864289', '2019-11-06 13:36:12', '2019-11-06 13:36:12'),
(46, 'Lcpl Md A Sobhan', '1232742', '01750461173', '2019-11-06 13:37:04', '2019-11-08 18:10:03'),
(47, 'Lcpl Md Motaleb Hosen', '4051171', '01766068691', '2019-11-06 13:37:43', '2019-11-06 13:37:43'),
(48, 'Lcpl Md Shariful Islam', '1232665', '01910774482', '2019-11-06 14:01:47', '2019-11-06 14:01:47'),
(49, 'Lcpl Md Shohel Rana', '4507304', '01764181575', '2019-11-06 14:02:30', '2019-11-06 14:02:30'),
(50, 'Lcpl Deponkar Shaha', '1006340', '01739948462', '2019-11-06 14:03:37', '2019-11-06 14:03:37'),
(51, 'Lcpl Md Asaduzzaman', '1616387', '01719096892', '2019-11-06 14:04:27', '2019-11-06 14:04:27'),
(52, 'Lcpl Sre Biplob Chandra Nath', '4050140', '01778464064', '2019-11-06 14:05:49', '2019-11-06 14:05:49'),
(53, 'Lcpl Md Rasel Miah 1', '1232973', '01742789571', '2019-11-06 14:06:59', '2019-11-09 03:30:43'),
(54, 'Lcpl MD Rasel Rana', '4049527', '01767354366', '2019-11-06 14:08:11', '2019-11-06 14:08:11'),
(55, 'Lcpl Md Tabarak Hosen', '1813815', '01762637204', '2019-11-06 14:09:04', '2019-11-06 14:09:04'),
(56, 'Lcpl Md Toriqul Islam', '4048595', '01747369947', '2019-11-06 14:10:09', '2019-11-06 14:10:09'),
(57, 'Lcpl Mostafizur Rohman Buyan', '1813363', '01714270456', '2019-11-06 14:12:16', '2019-11-06 14:12:16'),
(58, 'Lcpl Md Babul Akter', '1448648', '01794482812', '2019-11-06 14:13:07', '2019-11-06 14:13:07'),
(59, 'Lcpl Md Azizul Haque', '3001139', '01708100399', '2019-11-06 14:14:38', '2019-11-06 14:14:38'),
(60, 'Lcpl Md Rohul Amin', '1449009', '01740451628', '2019-11-06 14:15:33', '2019-11-06 14:15:33'),
(61, 'Lcpl Md Al amin', '1449178', '01786570111', '2019-11-06 14:16:18', '2019-11-06 14:16:18'),
(62, 'Lcpl Md Alfaz Uddin', '1006682', '01779804211', '2019-11-06 14:17:06', '2019-11-06 14:17:06'),
(63, 'Lcpl Md Mofazzol Hosen', '4510287', '01728781078', '2019-11-06 14:17:52', '2019-11-06 14:17:52'),
(64, 'SNK Md Emran Hossain', '1449358', '01743531681', '2019-11-06 14:18:58', '2019-11-06 14:18:58'),
(65, 'SNK Md Jafor Alom', '1234162', '01755380180', '2019-11-06 14:19:38', '2019-11-06 14:19:38'),
(66, 'SNK Md Anower hosen Parves', '4512404', '01751858932', '2019-11-06 14:20:35', '2019-11-06 14:20:35'),
(67, 'SNK Md Ekbal Hossain', '4513499', '01767588045', '2019-11-06 14:21:46', '2019-11-06 14:21:46'),
(68, 'SNK Md Hafizur Rohman', '4053605', '01765905622', '2019-11-06 14:22:42', '2019-11-06 14:22:42'),
(69, 'Sgt Md Abu Said Suzan Ali Mollah', '4019048', '01716055536', '2019-11-07 02:32:07', '2019-11-07 02:32:07'),
(70, 'Sgt Md Alauddin', '4019228', '01718157572', '2019-11-07 02:33:08', '2019-11-07 02:33:08'),
(71, 'Sgt Md Mohiuddin', '4023339', '01769015207', '2019-11-07 02:34:07', '2019-11-07 02:34:07'),
(72, 'Sgt Md Harun Or Rashid', '4023348', '01769202917', '2019-11-07 02:36:49', '2019-11-07 02:36:49'),
(73, 'Sgt Md Mozammel Haque Mrida', '4019962', '01716378671', '2019-11-07 02:38:01', '2019-11-07 02:38:01'),
(74, 'Sgt Md Selim Miah', '1220360', '01729864920', '2019-11-07 02:38:53', '2019-11-07 02:38:53'),
(75, 'Sgt Md Rezaul Haque', '4024697', '01769098405', '2019-11-07 02:40:51', '2019-11-07 02:40:51'),
(76, 'Sgt Md Mokhlesur Rohman', '4031814', '01850584476', '2019-11-07 02:46:29', '2019-11-07 02:46:29'),
(77, 'Sgt Md Alomgir Hosen', '1441054', '01735848567', '2019-11-07 02:47:33', '2019-11-07 02:47:33'),
(78, 'Sgt Md Kamal Hossain', '1441996', '01724070686', '2019-11-07 02:48:30', '2019-11-07 02:48:30'),
(79, 'Cpl Md Harun Or Rosid', '1221088', '01764883468', '2019-11-07 02:49:47', '2019-11-07 02:49:47'),
(80, 'Cpl Md Shohidul Islam', '1612969', '01716953168', '2019-11-07 02:50:47', '2019-11-07 02:50:47'),
(81, 'Cpl Md Rezaul Karim', '4036184', '01740719298', '2019-11-07 02:51:36', '2019-11-07 02:51:36'),
(82, 'Cpl Asif Akter', '4035608', '01769241102', '2019-11-07 02:53:06', '2019-11-07 02:53:06'),
(83, 'Cpl Md Nasir Uddin', '1443657', '01769120197', '2019-11-07 02:53:53', '2019-11-07 02:53:53'),
(84, 'Cpl Md Arifuzzaman', '1222045', '01733205220', '2019-11-07 02:54:46', '2019-11-07 02:54:46'),
(85, 'Cpl Md Mizanur Rohman', '1224135', '01720338395', '2019-11-07 02:55:33', '2019-11-07 02:55:33'),
(86, 'Cpl Md Ali Afsar', '1226268', '01722927986', '2019-11-07 02:56:59', '2019-11-07 02:56:59'),
(87, 'Cpl Md Sumon Mahbub Joy', '4500609', '01736787666', '2019-11-07 02:58:13', '2019-11-07 02:58:13'),
(88, 'Cpl Md Abul Kasem Miah', '1225792', '01752707745', '2019-11-07 02:59:13', '2019-11-07 02:59:13'),
(89, 'Cpl Md Mahbubur Rohman', '4043915', '01715565380', '2019-11-07 03:00:07', '2019-11-07 03:00:07'),
(90, 'Cpl Khairul Islam', '1231073', '01991175604', '2019-11-07 03:01:04', '2019-11-07 03:01:04'),
(91, 'Cpl Md Shakil Al Mamun', '1616205', '01907682904', '2019-11-07 03:02:10', '2019-11-07 03:02:10'),
(92, 'Cpl Md Ebna Masud', '4042500', '01724729277', '2019-11-07 03:03:18', '2019-11-07 03:03:18'),
(93, 'Cpl Md Shamim Miah', '4048108', '01749726894', '2019-11-07 03:04:29', '2019-11-07 03:04:29'),
(94, 'Cpl Md Habibul Karim', '4048562', '01737967877', '2019-11-07 03:05:23', '2019-11-07 03:05:23'),
(95, 'Lcpl Mehedi Hasan', '1230067', '01303429069', '2019-11-07 03:10:01', '2019-11-07 03:10:01'),
(96, 'Lcpl Md Basarul Islam', '4509863', '01747129750', '2019-11-07 03:12:22', '2019-11-07 03:12:22'),
(97, 'Lcpl Mohammad Nur Miah', '1448919', '01765603735', '2019-11-07 03:13:10', '2019-11-07 03:13:10'),
(98, 'Lcpl Md Foridul Islam', '4509672', '01737443370', '2019-11-07 03:13:59', '2019-11-07 03:13:59'),
(99, 'Lcpl Md Aminul Islam', '4509621', '01992052080', '2019-11-07 03:14:38', '2019-11-07 03:14:38'),
(100, 'Lcpl Ali Ahammod Khan', '1232302', '01303067987', '2019-11-07 03:15:25', '2019-11-07 03:15:25'),
(101, 'Lcpl Md Anwarul Islam', '4510007', '01751110668', '2019-11-07 03:16:35', '2019-11-07 03:16:35'),
(102, 'Lcpl Md Anisur Rohman', '4049992', '01988891387', '2019-11-07 03:17:24', '2019-11-07 03:17:24'),
(103, 'Lcpl Md Raju Ahmmed', '4509950', '01963634655', '2019-11-07 03:18:11', '2019-11-07 03:18:11'),
(104, 'Lcpl Md Shaiful Islam 1', '4046243', '01723297171', '2019-11-07 03:19:16', '2019-11-09 03:20:58'),
(105, 'Lcpl Md Shaiful Islam', '3001144', '01737391521', '2019-11-07 03:20:02', '2019-11-07 03:20:02'),
(106, 'Lcpl Md Azizul Islam', '1233881', '01788349367', '2019-11-07 03:20:57', '2019-11-07 03:20:57'),
(107, 'Lcpl Md Emarot Ali', '4049489', '01744686825', '2019-11-07 03:21:51', '2019-11-07 03:21:51'),
(108, 'Lcpl Md Abul Basar', '1449159', '01710055963', '2019-11-07 03:22:43', '2019-11-07 03:22:43'),
(109, 'Lcpl Md Anamul Haque', '4051126', '01722884968', '2019-11-07 03:23:46', '2019-11-07 03:23:46'),
(110, 'Lcpl  Md Mokhlesur Rohman', '1006015', '01729448105', '2019-11-07 03:24:52', '2019-11-07 03:24:52'),
(111, 'Snk Razib Howlader', '4052755', '01747690408', '2019-11-07 03:25:53', '2019-11-07 03:25:53'),
(112, 'Snk Md Salman Hosen', '1235227', '01714576366', '2019-11-07 03:26:43', '2019-11-07 03:26:43'),
(113, 'Snk Rahen Ahmed', '1814441', '01747669984', '2019-11-07 03:27:23', '2019-11-07 03:27:23'),
(114, 'Sgt Md Nasir Uddin', '4028539', '01724205376', '2019-11-07 03:28:59', '2019-11-07 03:28:59'),
(115, 'Cpl Md Kobir Hosen', '4027304', '01769205570', '2019-11-07 03:29:47', '2019-11-07 03:29:47'),
(116, 'Cpl Md Liton Hosen', '4041179', '01992230720', '2019-11-07 03:30:42', '2019-11-07 03:30:42'),
(117, 'Cpl Md Anwar Hosen Shikder', '4027190', '01798171198', '2019-11-07 03:31:47', '2019-11-07 03:31:47'),
(118, 'Cpl Md Mazharul Islam', '1614546', '01718959520', '2019-11-07 03:32:35', '2019-11-07 03:32:35'),
(119, 'Cpl Md Nurol Alom', '1226529', '01722932667', '2019-11-07 03:33:23', '2019-11-07 03:33:23'),
(120, 'Snk Md Shofiqul Islam', '1814119', '01730605282', '2019-11-07 03:34:54', '2019-11-07 03:34:54'),
(121, 'Snk Md Anwarul Haque', '1814230', '01765699682', '2019-11-07 03:35:52', '2019-11-07 03:35:52'),
(122, 'SNK MD Raseduzzaman', '4515500', '01795764377', '2019-11-08 15:09:12', '2019-11-08 15:09:12');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin1@gmail.com', '$2y$10$YsrMjqLgtZX4BKsHQ5XSk.K4uixtfKyKOq10Y9NYTjxXWxrjUnpB6', '0aPU526k978EODE20ZtnggIZwz2IK8KMKlU8CkfBbwGaIzbXQ3PDsNElVM1M', '2019-10-31 09:36:23', '2019-10-31 09:36:23'),
(2, 'Admin2', 'admin2@gmail.com', '$2y$10$c.Sm1RFZoF/88b6z4i13J.fptfWDHshEUZX2Zowl63n.XB/jMIXlq', 'wbLJF7oESYZbPDUL4bIUKCqOJLqH1USSTvXQFiP1lj4iiYO5jYA31sX43Rym', '2019-10-31 09:37:54', '2019-10-31 09:37:54');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `armies`
--

CREATE TABLE `armies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `army_password_resets`
--

CREATE TABLE `army_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bafs`
--

CREATE TABLE `bafs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `baf_password_resets`
--

CREATE TABLE `baf_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `casereg`
--

CREATE TABLE `casereg` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_mp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `victim_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `victim_mb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehical_reg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_off` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_off` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_disposal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_disposal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehical_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `victim` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `crime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paper` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forwared` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `drop_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `accept` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `forwared_cantroment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `paid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `paper_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outher_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `casereg`
--

INSERT INTO `casereg` (`id`, `id_mp`, `case_no`, `victim_name`, `victim_mb`, `vehical_reg`, `date_off`, `time_off`, `date_disposal`, `time_disposal`, `loc`, `vehical_type`, `victim`, `crime_type`, `paper`, `forwared`, `drop_type`, `accept`, `forwared_cantroment`, `paid`, `paper_image`, `outher_image`, `created_at`, `updated_at`) VALUES
(4, '1', '666666', NULL, NULL, NULL, '2019-11-06', '10:31:AM', '2019-12-06', NULL, NULL, NULL, NULL, 'null', 'null', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 04:32:06', '2019-11-06 10:41:57'),
(5, '1', '3333', 'MR.Rafiq', '0173333333', 'Dhaka Metro-Ha-33-0454', '2019-11-06', '16:42', '2019-12-06', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Car', 'owner', '[\"Over speeding\",\"Use of unauthorized door glass\"]', '[\"Driving Licence\",\"Route Permit\",\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 10:44:27', '2019-11-06 10:47:32'),
(6, '2', '333', 'Mr. Kamal', '01353535353', 'Dhaka Metro-Ha-33-0454', '2019-11-06', '16:49', '2019-12-06', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Car', 'owner', '[\"Traffic signal violation\"]', '[\"Driving Licence\"]', '0', '1', '0', '0', '0', NULL, NULL, '2019-11-06 10:49:39', '2019-11-06 10:51:23'),
(7, '28', '34031', 'Nahid', NULL, 'Dhaka Metro-La 25-2778', '2019-11-06', '20:10', '2019-12-06', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 13:42:11', '2019-11-06 15:31:20'),
(8, '39', '34180', 'Tanbir', NULL, 'Dhaka Metro-HA 43-6763', '2019-11-06', '12:10', '2019-12-06', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"insurance\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 13:44:37', '2019-11-06 15:31:20'),
(9, '28', '34029', 'Sumon', NULL, 'Dhaka Metro-HA 46-2351', '2019-11-06', '19:50', '2019-12-06', NULL, NULL, 'Motorcycle', 'driver', '[\"U-Tern in unauthorized place\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 13:47:22', '2019-11-06 15:31:20'),
(10, '27', '26191', 'Md Ayob Ali', NULL, 'Dhaka Metro-Taw 14-7188', '2019-11-06', '11:55', '2019-12-06', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'CNG', 'driver', '[\"U-Tern in unauthorized place\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 13:50:25', '2019-11-06 15:31:20'),
(11, '28', '34030', 'Milon', NULL, 'Dhaka Metro-BA 11-8605', '2019-11-06', '20:00', '2019-12-06', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Bus', 'driver', '[\"Overloaded passengers\\/cargo\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 13:52:35', '2019-11-06 15:31:20'),
(12, '27', '26198', 'Abdul Kader', NULL, 'Dhaka Metro-GA 17-6733', '2019-11-06', '13:25', '2019-12-06', NULL, 'L-8 (Moinl Rood Circle)', 'Car', 'driver', '[\"Traffic signal violation\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 13:55:20', '2019-11-06 15:31:20'),
(13, '27', '26199', 'Romiz', NULL, 'Dhaka Metro-GA 17-5898', '2019-11-06', '13:30', '2019-12-06', NULL, 'L-8 (Moinl Rood Circle)', 'Car', 'driver', '[\"Traffic signal violation\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 13:57:32', '2019-11-06 15:31:20'),
(14, '27', '26200', 'Md Shabbir', NULL, 'Dhaka Metro-LA 20-1654', '2019-11-06', '20:10', '2019-12-06', NULL, 'L-8 (Moinl Rood Circle)', 'Motorcycle', NULL, '[\"Traffic signal violation\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 13:59:32', '2019-11-06 15:31:20'),
(15, '50', '28200', NULL, NULL, 'Dhaka Metro-GA-19-2624', '2019-11-06', '21:00', '2019-12-06', NULL, 'L-8 (Moinl Rood Circle)', 'Car', 'driver', '[\"Traffic signal violation\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 14:32:17', '2019-11-06 15:31:20'),
(16, '52', '4111', NULL, NULL, 'Dhaka Metro-GA-11-3473', '2019-11-06', '17:00', '2019-12-06', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Car', 'driver', '[\"Traffic signal violation\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 14:34:18', '2019-11-06 15:31:20'),
(17, '27', '3600', NULL, NULL, 'Dhaka Metro-HA -53-9801', '2019-11-06', '15:40', '2019-12-06', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'MicroBus', 'driver', '[\"Traffic signal violation\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 14:37:59', '2019-11-06 15:31:20'),
(18, '27', '3599', NULL, NULL, 'Dhaka Metro-GA -33-1691', '2019-11-06', '09:30', '2019-12-06', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Car', 'driver', '[\"Careless driving\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 14:40:30', '2019-11-06 15:31:20'),
(19, '40', '2458', NULL, NULL, 'Dhaka Metro-JA-142812', '2019-11-06', '16:00', '2019-12-06', NULL, 'L-9 (Shadhinota Shoroni MP Check Post  ( Banani))', 'Bus', NULL, '[\"Overloaded passengers\\/cargo\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 14:44:09', '2019-11-06 15:31:20'),
(20, '38', '7239', NULL, NULL, 'Dhaka Metro-LA -36-3523', '2019-11-06', '19:00', '2019-12-06', NULL, 'L-8 (Moinl Rood Circle)', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 14:47:28', '2019-11-06 15:31:20'),
(21, '56', '1130', 'Md Shozib', NULL, 'Dhaka Metro-HA 60-5995', '2019-11-06', '21:30', '2019-12-06', NULL, 'L-35, 36 & 37(MC Mobile)', 'Motorcycle', 'driver', '[\"Use of unauthorized road\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 14:53:08', '2019-11-06 15:31:20'),
(22, '56', '1131', NULL, '-1', 'Dhaka Metro-GHA 18-4454', '2019-11-06', '14:15', '2019-12-06', NULL, 'L-35, 36 & 37(MC Mobile)', 'Car', 'driver', '[\"Careless driving\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 15:00:58', '2019-11-06 15:31:20'),
(23, '28', '34033', 'Shohel', NULL, 'Dhaka Metro-CHA 53-3340', '2019-11-06', '22:07', '2019-12-06', NULL, NULL, NULL, NULL, 'null', 'null', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 16:08:10', '2019-11-08 03:35:15'),
(24, '47', '27542', NULL, NULL, 'Dhaka Metro-HA 28-6217', '2019-11-06', '22:08', '2019-12-06', NULL, NULL, NULL, NULL, 'null', 'null', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 16:09:14', '2019-11-08 03:35:15'),
(25, '45', '1230', NULL, NULL, 'Dhaka Metro-BA 11-9005', '2019-11-06', '22:09', '2019-12-06', NULL, NULL, NULL, NULL, 'null', 'null', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 16:10:21', '2019-11-08 03:35:15'),
(26, '35', '33694', NULL, NULL, 'Dhaka Metro-GHA -11-6946', '2019-11-06', '22:10', '2019-12-06', NULL, NULL, NULL, NULL, 'null', 'null', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 16:11:36', '2019-11-08 03:35:15'),
(27, '12', '3738', NULL, NULL, 'Dhaka Metro-GA -22-7444', '2019-11-06', '22:11', '2019-12-06', NULL, NULL, NULL, NULL, 'null', 'null', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 16:12:43', '2019-11-08 03:35:15'),
(28, '35', '33693', NULL, NULL, 'Dhaka Metro-GA -31-3613', '2019-11-06', '22:12', '2019-12-06', NULL, NULL, NULL, NULL, 'null', 'null', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 16:13:29', '2019-11-08 03:35:15'),
(29, '52', '4110', NULL, NULL, 'Dhaka Metro-GA -42-1414', '2019-11-06', '22:15', '2019-12-06', NULL, NULL, NULL, NULL, 'null', 'null', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 16:15:53', '2019-11-08 03:35:15'),
(30, '48', '3621', NULL, NULL, 'Dhaka Metro-LA -41-2759', '2019-11-06', '22:15', '2019-12-06', NULL, NULL, NULL, NULL, 'null', 'null', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 16:16:50', '2019-11-08 03:35:15'),
(31, '48', '3620', NULL, NULL, 'Dhaka Metro-HA -60-5045', '2019-11-07', '22:16', '2019-12-07', NULL, 'L-3', NULL, 'driver', 'null', 'null', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 16:17:49', '2019-11-08 03:35:15'),
(32, '27', '26194', NULL, NULL, 'Dhaka Metro-HA -59-7766', '2019-11-07', '22:18', '2019-12-07', NULL, 'L-3', NULL, 'driver', 'null', 'null', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 16:19:16', '2019-11-08 03:35:15'),
(33, '27', '26195', NULL, NULL, 'Dhaka Metro-KHA-12-3475', '2019-11-07', '22:19', '2019-12-07', NULL, NULL, NULL, 'driver', 'null', '[\"Driving Licence\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-06 16:20:14', '2019-11-08 03:35:15'),
(34, '64', '221', NULL, NULL, 'dhaka metro- 44-5862', '2019-11-07', '09:46', '2019-12-07', NULL, NULL, NULL, NULL, 'null', 'null', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-07 03:47:24', '2019-11-08 03:35:15'),
(35, '1', '1895', NULL, NULL, NULL, '2019-11-07', '11:00', '2019-12-07', NULL, NULL, NULL, 'driver', 'null', 'null', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-07 05:01:14', '2019-11-08 03:35:15'),
(36, NULL, '1056', NULL, NULL, NULL, '2019-11-07', '16:43', '2019-12-07', NULL, NULL, NULL, NULL, 'null', 'null', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-07 10:43:36', '2019-11-08 03:35:15'),
(37, '24', '32119', NULL, NULL, 'Dhaka Metro-GA-29-2396', '2019-11-10', '07:30', '2019-12-10', NULL, 'L-31 (Adomji College Circle)', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 03:38:00', '2019-11-12 06:39:18'),
(38, '61', '3593', NULL, NULL, 'Dhaka Metro-CHA-19-0123', '2019-11-10', '08:00', '2019-12-10', NULL, 'L-25 (In front of 16 BIR Trg Grd)', 'MicroBus', 'driver', '[\"Careless driving\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 03:39:07', '2019-11-12 06:39:18'),
(39, '61', '3597', NULL, NULL, 'Dhaka Metro-GA-21-2156', '2019-11-10', '15:00', '2019-12-10', NULL, NULL, 'Car', 'driver', '[\"Use of unauthorized door glass\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 03:39:55', '2019-11-12 06:42:07'),
(40, '61', '3596', NULL, NULL, 'Dhaka Metro-GA-25-2417', '2019-11-10', '14:00', '2019-12-10', NULL, 'L-25 (In front of 16 BIR Trg Grd)', 'Car', 'driver', '[\"Over speeding\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 03:40:58', '2019-11-12 06:42:07'),
(41, '48', '3619', NULL, NULL, 'Dhaka Metro-HA-56-9043', '2019-11-10', '18:25', '2019-12-10', NULL, 'L-17 (In front of MES Convention Hall)', 'Motorcycle', 'driver', '[\"Use of unauthorized road\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 03:43:01', '2019-11-12 06:42:07'),
(42, '67', '2926', NULL, NULL, 'Dhaka Metro-19-5503', '2019-11-08', '09:43', '2019-12-08', NULL, NULL, NULL, NULL, 'null', 'null', '0', '1', '0', '0', '0', NULL, NULL, '2019-11-08 03:44:45', '2019-11-10 09:04:00'),
(43, '61', '3592', NULL, NULL, 'Dhaka Metro-GA-19-0248', '2019-11-10', '17:00', '2019-12-10', NULL, 'L-26,27 (Speed Check Duty)', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 03:45:33', '2019-11-12 06:42:07'),
(44, '67', '2925', NULL, NULL, 'Dhaka Metro-GA-42-9402', '2019-11-10', '15:40', '2019-12-10', NULL, 'L-26,27 (Speed Check Duty)', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 03:46:26', '2019-11-12 06:42:07'),
(45, '61', '3591', NULL, NULL, 'Dhaka Metro-CHA-19-3179', '2019-11-10', '17:00', '2019-12-10', NULL, 'L-26,27 (Speed Check Duty)', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 03:47:44', '2019-11-12 06:42:07'),
(46, '67', '2924', NULL, NULL, 'Dhaka Metro-GA-27-0465', '2019-11-10', '15:10', '2019-12-10', NULL, 'L-26,27 (Speed Check Duty)', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 03:48:47', '2019-11-12 06:42:07'),
(47, '61', '3589', NULL, NULL, 'Dhaka Metro-GA-22-4543', '2019-11-10', '17:00', '2019-12-10', NULL, 'L-26,27 (Speed Check Duty)', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 03:49:35', '2019-11-12 06:42:07'),
(48, '61', '3590', NULL, NULL, 'Dhaka Metro-JA-11-3258', '2019-11-10', '18:17', '2019-12-10', NULL, 'L-26,27 (Speed Check Duty)', 'Bus', 'driver', '[\"Dropping\\/ Picking up in unauthorized place\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 03:50:48', '2019-11-12 06:42:07'),
(49, '61', '3586', NULL, NULL, 'Dhaka Metro-KA-11-3897', '2019-11-10', '16:00', '2019-12-10', NULL, 'L-26,27 (Speed Check Duty)', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 03:51:43', '2019-11-12 06:42:07'),
(50, '40', '2463', NULL, NULL, 'Dhaka Metro-GA-28-1800', '2019-11-10', '19:30', '2019-12-10', NULL, 'L-9 (Shadhinota Shoroni MP Check Post  ( Banani))', 'Car', 'driver', '[\"Use of unauthorized door glass\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 03:52:43', '2019-11-12 06:42:07'),
(51, '59', '4004', NULL, NULL, 'Dhaka Metro-GA-29-5654', '2019-11-10', '11:30', '2019-12-10', NULL, 'L-41(East Side of shaheed  Anower School  & College)', 'Car', 'driver', '[\"Parking in unauthorized place\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 03:54:14', '2019-11-12 06:42:07'),
(52, '59', '4003', NULL, NULL, 'Dhaka Metro-GA-28-7044', '2019-11-10', '22:30', '2019-12-10', NULL, 'L-41(East Side of shaheed  Anower School  & College)', 'Car', 'driver', '[\"Parking in unauthorized place\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 03:54:59', '2019-11-12 06:42:07'),
(53, '59', '4002', NULL, NULL, 'Dhaka Metro-GA-23-8806', '2019-11-10', '10:30', '2019-12-10', NULL, 'L-41(East Side of shaheed  Anower School  & College)', 'Car', 'driver', '[\"Parking in unauthorized place\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 04:17:30', '2019-11-12 06:42:07'),
(54, '59', '4001', NULL, NULL, 'Dhaka Metro-GA-33-0670', '2019-11-10', '19:00', '2019-12-10', NULL, 'L-25 (In front of 16 BIR Trg Grd)', 'Car', 'driver', '[\"Use of unauthorized door glass\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 04:18:18', '2019-11-12 06:42:07'),
(55, '67', '2917', NULL, NULL, 'Dhaka Metro-GA-26-5350', '2019-11-10', '07:20', '2019-12-10', NULL, 'L-26,27 (Speed Check Duty)', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 04:19:08', '2019-11-12 06:42:07'),
(56, '67', '2919', NULL, NULL, 'Dhaka Metro-GA-35-1480', '2019-11-10', '07:19', '2019-12-10', NULL, 'L-26,27 (Speed Check Duty)', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 04:19:44', '2019-11-12 06:42:07'),
(57, '67', '2923', NULL, NULL, 'Dhaka Metro-GA-35-3784', '2019-11-10', '09:30', '2019-12-10', NULL, 'L-26,27 (Speed Check Duty)', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 04:20:19', '2019-11-12 06:42:07'),
(58, '61', '3582', NULL, NULL, 'Dhaka Metro-JA-11-3257', '2019-11-11', '09:00', '2019-12-11', NULL, 'L-26,27 (Speed Check Duty)', 'Bus', 'driver', '[\"Driving with overloaded weight\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 04:22:37', '2019-11-12 06:42:07'),
(59, '61', '3572', NULL, NULL, 'Dhaka Metro-GA-20-4232', '2019-11-11', '07:00', '2019-12-11', NULL, 'L-26,27 (Speed Check Duty)', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 04:23:18', '2019-11-12 06:42:07'),
(60, '61', '3574', NULL, NULL, 'Dhaka Metro-GA-43-1952', '2019-11-11', '07:00', '2019-12-11', NULL, 'L-26,27 (Speed Check Duty)', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 04:24:02', '2019-11-12 06:42:07'),
(61, '61', '3570', NULL, NULL, 'Dhaka Metro-GA-23-3425', '2019-11-11', '07:00', '2019-12-11', NULL, 'L-26,27 (Speed Check Duty)', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 04:24:52', '2019-11-12 06:42:07'),
(62, '61', '3580', NULL, NULL, 'Dhaka Metro-BA-11-9041', '2019-11-11', '09:00', '2019-12-11', NULL, 'L-26,27 (Speed Check Duty)', 'Bus', 'driver', '[\"Driving with overloaded weight\"]', '[\"Traffic police case\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 04:26:18', '2019-11-12 06:42:07'),
(63, '61', '3576', NULL, NULL, 'Dhaka Metro-GA-37-1997', '2019-11-11', '07:30', '2019-12-11', NULL, 'L-26,27 (Speed Check Duty)', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 04:27:03', '2019-11-12 06:42:07'),
(64, '4', '24729', NULL, NULL, 'Dhaka Metro-HA-11-3576', '2019-11-11', '07:00', '2019-12-11', NULL, 'L-35, 36 & 37(MC Mobile)', 'Motorcycle', 'driver', '[\"U-Tern in unauthorized place\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 04:27:50', '2019-11-12 06:42:07'),
(65, '61', '3577', NULL, NULL, 'Dhaka Metro-BA-11-9889', '2019-11-11', '08:00', '2019-12-11', NULL, 'L-26,27 (Speed Check Duty)', 'Bus', 'driver', '[\"Driving with overloaded weight\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 04:28:41', '2019-11-12 06:42:07'),
(66, '61', '3579', NULL, NULL, 'Dhaka Metro-JA-14-2616', '2019-11-11', '08:20', '2019-12-11', NULL, 'L-26,27 (Speed Check Duty)', 'Bus', 'driver', '[\"Driving with overloaded weight\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 04:29:34', '2019-11-12 06:42:07'),
(67, '61', '3575', NULL, NULL, 'Dhaka Metro-KHA-12-1082', '2019-11-11', '07:00', '2019-12-11', NULL, 'L-26,27 (Speed Check Duty)', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 04:30:29', '2019-11-12 06:42:07'),
(68, '64', '215', NULL, NULL, 'Dhaka Metro-GA-28-7677', '2019-11-11', '15:30', '2019-12-11', NULL, 'L-8 (Moinl Rood Circle)', 'Car', 'driver', '[\"Traffic signal violation\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 04:31:07', '2019-11-12 06:42:07'),
(69, '8', '21536', NULL, NULL, 'Dhaka Metro-BA-11-8875', '2019-11-11', '14:00', '2019-12-11', NULL, 'L-11 (Shadinota chattor MP CP (kachukhet))', 'Bus', 'driver', '[\"Dropping\\/ Picking up in unauthorized place\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 04:32:11', '2019-11-12 06:42:07'),
(70, '9', '1651', NULL, NULL, 'Dhaka Metro-GA-37-2828', '2019-11-11', '09:15', '2019-12-11', NULL, 'L-9 (Shadhinota Shoroni MP Check Post  ( Banani))', 'Car', 'driver', '[\"Traffic signal violation\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 04:51:50', '2019-11-12 06:42:07'),
(71, '5', '34832', NULL, NULL, 'Dhaka Metro-CHA-56-2568', '2019-11-11', '07:40', '2019-12-11', NULL, 'L-12 (Accident Sqd, Ni Mobile)', 'MicroBus', 'driver', '[\"U-Tern in unauthorized place\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 04:53:20', '2019-11-12 06:42:07'),
(72, '8', '21535', NULL, NULL, 'Dhaka Metro-GA-17-2569', '2019-11-11', '14:00', '2019-12-11', NULL, 'L-11 (Shadinota chattor MP CP (kachukhet))', 'Car', 'driver', '[\"Dropping\\/ Picking up in unauthorized place\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 04:54:05', '2019-11-12 06:42:07'),
(73, '67', '2916', NULL, NULL, 'Dhaka Metro-GA-37-2348', '2019-11-11', '07:15', '2019-12-11', NULL, 'L-26,27 (Speed Check Duty)', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 04:54:56', '2019-11-12 06:42:07'),
(74, '4', '28733', NULL, NULL, 'Dhaka Metro-HA-20-6793', '2019-11-11', '07:30', '2019-12-11', NULL, 'L-35, 36 & 37(MC Mobile)', 'Motorcycle', 'driver', '[\"U-Tern in unauthorized place\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 04:55:42', '2019-11-12 06:42:07'),
(75, '61', '3583', NULL, NULL, 'Dhaka Metro-GA-19-9619', '2019-11-11', '15:00', '2019-12-11', NULL, 'L-26,27 (Speed Check Duty)', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 04:56:32', '2019-11-12 06:42:07'),
(76, '61', '2526', NULL, NULL, 'Dhaka Metro-GA-23-6288', '2019-11-10', '07:00', '2019-12-10', NULL, 'L-26,27 (Speed Check Duty)', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Driving Licence\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 04:57:44', '2019-11-12 06:42:07'),
(77, '27', '26192', NULL, NULL, 'Dhaka Metro-HA-59-0584', '2019-11-10', '08:10', '2019-12-10', NULL, 'L-8 (Moinl Rood Circle)', 'Motorcycle', 'driver', '[\"Careless driving\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 14:14:09', '2019-11-12 06:42:07'),
(78, '40', '2464', NULL, NULL, 'Dhaka Metro-HA-28-3584', '2019-11-10', '14:00', '2019-12-10', NULL, 'L-9 (Shadhinota Shoroni MP Check Post  ( Banani))', 'Motorcycle', 'owner', '[\"Driving without valid license\"]', '[\"Driving Licence\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 14:16:16', '2019-11-12 06:42:07'),
(79, '39', '34179', NULL, NULL, 'Dhaka Metro-LA-33-9227', '2019-11-10', '12:10', '2019-12-10', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 14:17:18', '2019-11-12 06:42:07'),
(80, '27', '26190', NULL, NULL, 'Dhaka Metro-HA-58-7846', '2019-11-10', '10:30', '2019-12-10', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Motorcycle', 'driver', '[\"U-Tern in unauthorized place\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 14:18:26', '2019-11-12 06:42:07'),
(81, '42', '21579', NULL, NULL, 'Dhaka Metro-LA-34-4878', '2019-11-10', '15:30', '2019-12-10', NULL, 'L-35, 36 & 37(MC Mobile)', 'Motorcycle', 'driver', '[\"2nd seater without helmet\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 14:19:40', '2019-11-12 06:42:07'),
(82, '61', '3573', NULL, NULL, 'Dhaka Metro-GA-15-1056', '2019-11-10', '19:00', '2019-12-10', NULL, 'L-26,27 (Speed Check Duty)', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 14:21:02', '2019-11-12 06:42:07'),
(83, '4', '28732', NULL, NULL, 'Dhaka Metro-CHA-51-3599', '2019-11-10', '07:30', '2019-12-10', NULL, 'L-35, 36 & 37(MC Mobile)', 'MicroBus', 'owner', '[\"Dropping\\/ Picking up in unauthorized place\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 14:22:41', '2019-11-12 06:42:07'),
(84, '48', '3624', NULL, NULL, 'Dhaka Metro-TAW-13-7628', '2019-11-10', '08:50', '2019-12-10', NULL, 'L-25 (In front of 16 BIR Trg Grd)', 'CNG', 'driver', '[\"Dropping\\/ Picking up in unauthorized place\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 14:25:24', '2019-11-12 06:42:07'),
(85, '10', '3317', NULL, NULL, 'Dhaka Metro-LA-43-1028', '2019-11-10', '15:12', '2019-12-10', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Motorcycle', 'driver', '[\"Use of unauthorized road\"]', '[\"Registration acknowledgement slip\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 14:26:19', '2019-11-12 06:42:07'),
(86, '112', '2706', NULL, NULL, 'Dhaka Metro-HA-57-0901', '2019-11-10', '18:45', '2019-12-10', NULL, NULL, 'Motorcycle', 'driver', '[\"2nd seater without helmet\"]', '[\"Registration acknowledgement slip\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 14:27:13', '2019-11-12 06:42:07'),
(87, '112', '2707', NULL, NULL, 'Dhaka Metro-HA-58-9415', '2019-11-10', '19:00', '2019-12-10', NULL, NULL, 'Motorcycle', 'driver', '[\"2nd seater without helmet\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 14:28:10', '2019-11-12 06:42:07'),
(88, '112', '2703', NULL, NULL, 'Dhaka Metro-LA-44-3005', '2019-11-10', '07:00', '2019-12-10', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Motorcycle', 'driver', '[\"2nd seater without helmet\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 14:28:49', '2019-11-12 06:42:07'),
(89, '37', '21783', NULL, NULL, 'Dhaka Metro-HA-22-5128', '2019-11-10', '10:00', '2019-12-10', NULL, NULL, 'Motorcycle', 'driver', '[\"Driving without license\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 14:33:04', '2019-11-12 06:42:07'),
(90, '112', '2702', NULL, NULL, 'Dhaka Metro-LA-33-1912', '2019-11-10', '07:00', '2019-12-10', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Motorcycle', 'driver', '[\"2nd seater without helmet\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 14:34:48', '2019-11-12 06:42:07'),
(91, '112', '2705', NULL, NULL, 'Dhaka Metro-LA-34-5286', '2019-11-10', '18:30', '2019-12-10', NULL, NULL, 'Motorcycle', 'driver', '[\"Driving without license\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 14:35:35', '2019-11-12 06:42:07'),
(92, '37', '21785', NULL, NULL, 'Dhaka Metro-LA-17-5409', '2019-11-10', '09:00', '2019-12-10', NULL, NULL, 'Motorcycle', 'driver', '[\"Careless driving\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 14:36:48', '2019-11-12 06:42:07'),
(93, '46', '1329', NULL, NULL, 'Dhaka Metro-BA-11-7442', '2019-11-10', '10:00', '2019-12-10', NULL, 'L-25 (In front of 16 BIR Trg Grd)', 'Bus', 'driver', '[\"Dropping\\/ Picking up in unauthorized place\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 14:37:54', '2019-11-12 06:42:07'),
(94, '112', '2709', NULL, NULL, 'Dhaka Metro-HA-22-6073', '2019-11-10', '16:50', '2019-12-10', NULL, NULL, 'Motorcycle', 'driver', '[\"2nd seater without helmet\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 14:39:15', '2019-11-12 06:42:07'),
(95, '37', '21786', NULL, NULL, 'Dhaka Metro-MA-11-5110', '2019-11-10', '19:00', '2019-12-10', NULL, NULL, 'Pickup', 'driver', '[\"Careless driving\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 14:40:35', '2019-11-12 06:42:07'),
(96, '122', '2003', NULL, NULL, 'B-Baria-HA-11-3566', '2019-11-10', '07:50', '2019-12-10', NULL, 'L-1', 'Motorcycle', 'driver', '[\"2nd seater without helmet\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 14:42:21', '2019-11-12 06:42:07'),
(97, '61', '3585', NULL, NULL, 'Dhaka Metro-GA-11-2325', '2019-11-10', '16:00', '2019-12-10', NULL, 'L-26,27 (Speed Check Duty)', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 14:58:17', '2019-11-12 06:42:07'),
(98, '109', '20588', NULL, NULL, 'Gazipur-Sho-11-0673', '2019-11-10', '16:50', '2019-12-10', NULL, NULL, 'Pickup', 'driver', '[\"Careless driving\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 15:00:48', '2019-11-12 06:42:07'),
(99, '46', '1330', NULL, NULL, 'Dhaka Metro-MA-51-0480', '2019-11-10', '12:30', '2019-12-10', NULL, 'L-15 (Captains Bakery)', 'Pickup', 'driver', '[\"Dropping\\/ Picking up in unauthorized place\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 15:02:08', '2019-11-12 06:42:07'),
(100, '46', '1328', NULL, NULL, 'Dhaka Metro-CHA-11-3761', '2019-11-10', '09:31', '2019-12-10', NULL, 'L-26,27 (Speed Check Duty)', 'Laguna', 'owner', '[\"Traffic signal violation\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 15:06:07', '2019-11-12 06:42:07'),
(101, '37', '21772', NULL, NULL, 'Dhaka Metro-TA-20-8962', '2019-11-10', '14:00', '2019-12-10', NULL, NULL, 'Truck', 'owner', '[\"Driving without license\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-08 15:11:38', '2019-11-12 06:42:07'),
(102, '34', '1058', 'MD Hanif', NULL, 'Dhaka Metro-THA-13-6197', '2019-11-11', '11:50', '2019-12-11', NULL, 'L-11 (Shadinota chattor MP CP (kachukhet))', 'CNG', 'driver', '[\"Use of unauthorized road\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 03:16:39', '2019-11-12 06:42:07'),
(103, '34', '1059', 'Roni', NULL, 'Dhaka Metro-THA-13-7696', '2019-11-11', '18:30', '2019-12-11', NULL, 'L-11 (Shadinota chattor MP CP (kachukhet))', 'CNG', 'driver', '[\"Use of unauthorized road\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 03:18:46', '2019-11-12 06:42:07'),
(104, '41', '4243', NULL, NULL, 'Dhaka Metro-HA-59-5864', '2019-11-11', '09:10', '2019-12-11', NULL, 'L-17 (In front of MES Convention Hall)', 'Motorcycle', 'driver', '[\"Use of unauthorized road\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 03:23:23', '2019-11-12 06:42:07'),
(105, '63', '4525', 'Jabed Hosen', NULL, 'Dhaka Metro-NA-15-4638', '2019-11-11', '09:00', '2019-12-11', NULL, 'L-11 (Shadinota chattor MP CP (kachukhet))', 'Pickup', 'driver', '[\"Traffic signal violation\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 03:25:46', '2019-11-12 06:42:07'),
(106, '20', '4604', 'Jasi', NULL, 'Dhaka Metro-GA-34-9391', '2019-11-11', '17:45', '2019-12-11', NULL, 'L-9 (Shadhinota Shoroni MP Check Post  ( Banani))', 'Car', 'driver', '[\"Careless driving\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 03:27:42', '2019-11-12 06:42:07'),
(107, '39', '34182', 'Julfikar', NULL, 'Dhaka Metro-HA-51-7328', '2019-11-11', '18:50', '2019-12-11', NULL, 'L-25 (In front of 16 BIR Trg Grd)', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 03:29:39', '2019-11-12 06:42:07'),
(108, '53', '3123', NULL, NULL, 'Dhaka Metro-HA-32-7620', '2019-11-11', '09:35', '2019-12-11', NULL, 'L-9 (Shadhinota Shoroni MP Check Post  ( Banani))', 'Motorcycle', 'driver', '[\"Use of unauthorized road\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 03:32:03', '2019-11-12 06:42:07'),
(109, '53', '3122', 'Md Kabir', NULL, 'Dhaka Metro-CHA-16-0479', '2019-11-11', '07:11', '2019-12-11', NULL, 'L-9 (Shadhinota Shoroni MP Check Post  ( Banani))', 'MicroBus', 'driver', '[\"Overloaded passengers\\/cargo\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 03:34:10', '2019-11-12 06:42:07'),
(110, '26', '1980', NULL, NULL, 'Dhaka Metro-GA-12-7001', '2019-11-11', '09:45', '2019-12-11', NULL, 'L-6 (Aziz Polli Offrs Res Area Entrance)', 'Car', 'driver', '[\"Over speeding\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 03:35:31', '2019-11-12 06:42:07'),
(111, '25', '4207', NULL, NULL, 'Dhaka Metro-JA-14-2708', '2019-11-11', '16:25', '2019-12-11', NULL, 'L-8 (Moinl Rood Circle)', 'Bus', 'driver', '[\"Defected Veh\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:05:40', '2019-11-12 06:42:07'),
(112, '25', '4206', NULL, NULL, 'Dhaka Metro-HA-41-6195', '2019-11-11', '16:20', '2019-12-11', NULL, 'L-8 (Moinl Rood Circle)', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:07:45', '2019-11-12 06:42:07'),
(113, '25', '4205', NULL, NULL, 'Dhaka Metro-LA-39-3773', '2019-11-11', '16:20', '2019-12-11', NULL, 'L-8 (Moinl Rood Circle)', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:09:23', '2019-11-12 06:42:07'),
(114, '25', '4204', NULL, NULL, 'JHENIDAH -LA-11-1525', '2019-11-11', '16:20', '2019-12-11', NULL, 'L-8 (Moinl Rood Circle)', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:10:27', '2019-11-12 06:42:07'),
(115, '25', '4202', NULL, NULL, 'Dhaka Metro-KHA-13-2445', '2019-11-11', '16:00', '2019-12-11', NULL, 'L-8 (Moinl Rood Circle)', 'Car', 'driver', '[\"Traffic signal violation\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:11:39', '2019-11-12 06:42:07'),
(116, '25', '4201', NULL, NULL, 'Dhaka Metro-HA-58-4808', '2019-11-11', '12:05', '2019-12-11', NULL, 'L-8 (Moinl Rood Circle)', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:13:02', '2019-11-12 06:42:07'),
(117, '25', '18300', NULL, NULL, 'Dhaka Metro-LA-18-2236', '2019-11-11', '12:00', '2019-12-11', NULL, 'L-8 (Moinl Rood Circle)', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:15:06', '2019-11-12 06:42:07'),
(118, '25', '18299', NULL, NULL, 'Dhaka Metro-MA-51-8588', '2019-11-11', '11:50', '2019-12-11', NULL, 'L-8 (Moinl Rood Circle)', 'MicroBus', 'driver', '[\"Traffic signal violation\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:16:55', '2019-11-12 06:42:07'),
(119, '25', '18298', NULL, NULL, 'Dhaka Metro-LA-20-3602', '2019-11-11', '11:20', '2019-12-11', NULL, 'L-8 (Moinl Rood Circle)', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:18:09', '2019-11-12 06:42:07'),
(120, '25', '18297', NULL, NULL, 'Dhaka Metro-HA-32-9091', '2019-11-11', '11:00', '2019-12-11', NULL, 'L-8 (Moinl Rood Circle)', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:19:13', '2019-11-12 06:42:07'),
(121, '25', '18295', NULL, NULL, 'Dhaka Metro-GA-31-4797', '2019-11-11', '11:00', '2019-12-11', NULL, 'L-8 (Moinl Rood Circle)', 'Car', 'driver', '[\"Traffic signal violation\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:20:28', '2019-11-12 06:42:07'),
(122, '25', '18293', NULL, NULL, 'Dhaka Metro-GA-27-2524', '2019-11-11', '10:30', '2019-12-11', NULL, 'L-8 (Moinl Rood Circle)', 'Car', 'driver', 'null', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:21:36', '2019-11-12 06:42:07'),
(123, '25', '18292', NULL, NULL, 'Dhaka Metro-LA-38-7045', '2019-11-11', '10:25', '2019-12-11', NULL, 'L-8 (Moinl Rood Circle)', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:22:40', '2019-11-12 06:42:07'),
(124, '25', '18291', NULL, NULL, 'Dhaka Metro-LA-15-9975', '2019-11-11', '10:10', '2019-12-11', NULL, 'L-8 (Moinl Rood Circle)', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:23:55', '2019-11-12 06:42:07'),
(125, '25', '18290', NULL, NULL, 'Dhaka Metro-HA-53-9416', '2019-11-12', '10:05', '2019-12-12', NULL, 'L-8 (Moinl Rood Circle)', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:25:00', '2019-11-12 06:42:07'),
(126, '25', '18289', NULL, NULL, 'Dhaka Metro-GA-11-6329', '2019-11-12', '10:05', '2019-12-12', NULL, 'L-8 (Moinl Rood Circle)', 'Car', 'driver', '[\"Traffic signal violation\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:25:54', '2019-11-12 06:42:07'),
(127, '25', '18288', NULL, NULL, 'Dhaka Metro-GA-25-6638', '2019-11-12', '10:00', '2019-12-12', NULL, 'L-8 (Moinl Rood Circle)', 'Car', 'driver', '[\"Traffic signal violation\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:26:50', '2019-11-12 06:42:07'),
(128, '25', '18287', NULL, NULL, 'Dhaka Metro-HA-25-8349', '2019-11-12', '09:50', '2019-12-12', NULL, 'L-8 (Moinl Rood Circle)', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:30:43', '2019-11-12 06:42:07'),
(129, '25', '18286', NULL, NULL, 'Dhaka Metro-GA-17-2371', '2019-11-12', '09:08', '2019-12-12', NULL, 'L-8 (Moinl Rood Circle)', 'Pajaro', 'driver', '[\"Traffic signal violation\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:31:35', '2019-11-12 06:42:07'),
(130, '25', '18285', NULL, NULL, 'Dhaka Metro-GA-17-2203', '2019-11-12', '09:40', '2019-12-12', NULL, 'L-8 (Moinl Rood Circle)', 'Car', 'driver', '[\"Traffic signal violation\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:32:27', '2019-11-12 06:42:07'),
(131, '25', '18284', NULL, NULL, 'Dhaka Metro-GA-22-0481', '2019-11-12', '09:35', '2019-12-12', NULL, 'L-8 (Moinl Rood Circle)', 'Car', 'driver', '[\"Traffic signal violation\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:33:36', '2019-11-12 06:42:07'),
(132, '25', '18283', NULL, NULL, 'Dhaka Metro-GA-32-7991', '2019-11-12', '09:30', '2019-12-12', NULL, 'L-8 (Moinl Rood Circle)', 'Car', 'driver', '[\"Traffic signal violation\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:34:36', '2019-11-12 06:42:07'),
(133, '25', '18282', NULL, NULL, 'Dhaka Metro-LA-23-6948', '2019-11-12', '09:30', '2019-12-12', NULL, 'L-8 (Moinl Rood Circle)', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:35:40', '2019-11-12 06:42:07'),
(134, '45', '1233', NULL, NULL, 'Dhaka Metro-HA-13-2503', '2019-11-12', '11:00', '2019-12-12', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Motorcycle', 'driver', '[\"Careless driving\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:37:35', '2019-11-12 06:42:07'),
(135, '45', '1232', NULL, NULL, 'Dhaka Metro-HA-20-6179', '2019-11-12', '10:35', '2019-12-12', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:38:42', '2019-11-12 06:42:07'),
(136, '47', '27551', NULL, NULL, 'Dhaka Metro-HA-41-4821', '2019-11-12', '14:00', '2019-12-12', NULL, 'L-8 (Moinl Rood Circle)', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:40:39', '2019-11-12 06:42:07'),
(137, '28', '34039', NULL, NULL, 'Dhaka Metro-LA-23-6448', '2019-11-12', '14:05', '2019-12-12', NULL, 'L-8 (Moinl Rood Circle)', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:42:03', '2019-11-12 06:42:07'),
(138, '28', '34036', NULL, NULL, 'Dhaka Metro-GA-34-6587', '2019-11-12', '17:35', '2019-12-12', NULL, 'L-8 (Moinl Rood Circle)', 'Car', 'driver', '[\"Traffic signal violation\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-09 14:43:27', '2019-11-12 06:42:07'),
(139, '33', '1741', NULL, NULL, 'Dhaka Metro-LA-43-4346', '2019-11-12', '04:15', '2019-12-12', NULL, 'L-9 (Shadhinota Shoroni MP Check Post  ( Banani))', 'Motorcycle', 'driver', '[\"Use of unauthorized road\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 04:19:31', '2019-11-12 06:42:07'),
(140, '29', '3446', NULL, NULL, 'Dhaka Metro-JA-14-2813', '2019-11-12', '13:00', '2019-12-12', NULL, 'L-11 (Shadinota chattor MP CP (kachukhet))', 'Bus', 'driver', '[\"Overloaded passengers\\/cargo\"]', '[\"insurance\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 04:24:53', '2019-11-12 06:42:07'),
(141, '40', '2468', NULL, NULL, 'Dhaka Metro-LA-27-4250', '2019-11-12', '14:25', '2019-12-12', NULL, 'L-9 (Shadhinota Shoroni MP Check Post  ( Banani))', 'Motorcycle', 'driver', '[\"Use of unauthorized road\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 04:26:16', '2019-11-12 06:42:07'),
(142, '20', '4605', NULL, NULL, 'Dhaka Metro-GA-32-2095', '2019-11-12', '13:40', '2019-12-12', NULL, 'L-9 (Shadhinota Shoroni MP Check Post  ( Banani))', 'Car', 'driver', '[\"Use of unauthorized door glass\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 04:27:18', '2019-11-12 06:42:07'),
(143, '49', '1899', NULL, NULL, 'Dhaka Metro-JA-11-3194', '2019-11-12', '09:30', '2019-12-12', NULL, 'L-9 (Shadhinota Shoroni MP Check Post  ( Banani))', 'Bus', 'driver', '[\"Dropping\\/ Picking up in unauthorized place\"]', '[\"Route Permit\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 04:28:56', '2019-11-12 06:42:07'),
(144, '49', '1898', NULL, NULL, 'Dhaka Metro-GA-21-9427', '2019-11-12', '09:20', '2019-12-12', NULL, 'L-9 (Shadhinota Shoroni MP Check Post  ( Banani))', 'Car', 'driver', '[\"Driving without seat belt\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 04:31:21', '2019-11-12 06:42:07'),
(145, '28', '34041', NULL, NULL, 'Dhaka Metro-TAW-13-6394', '2019-11-12', '19:30', '2019-12-12', NULL, 'L-8 (Moinl Rood Circle)', 'CNG', 'driver', '[\"Traffic signal violation\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 04:35:45', '2019-11-12 06:42:07'),
(146, '28', '34042', NULL, NULL, 'Dhaka Metro-LA-11-5340', '2019-11-12', '19:50', '2019-12-12', NULL, 'L-8 (Moinl Rood Circle)', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 04:37:07', '2019-11-12 06:42:07'),
(147, '12', '3762', NULL, NULL, 'Dhaka Metro-HA-59-2807', '2019-11-12', '17:00', '2019-12-12', NULL, 'L-35, 36 & 37(MC Mobile)', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 16:22:59', '2019-11-12 06:42:07'),
(148, '12', '3761', NULL, NULL, 'Dhaka Metro-GA-19-5227', '2019-11-12', '16:00', '2019-12-12', NULL, 'L-35, 36 & 37(MC Mobile)', 'Car', 'driver', '[\"Careless driving\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 16:26:00', '2019-11-12 06:42:07'),
(149, '14', '20159', NULL, NULL, 'Dhaka Metro-HA-57-5377', '2019-11-12', '16:30', '2019-12-12', NULL, 'L-26,27 (Speed Check Duty)', 'Motorcycle', 'driver', '[\"Use of unauthorized road\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 16:27:04', '2019-11-12 06:42:07'),
(150, '14', '20163', NULL, NULL, 'Dhaka Metro-GA-11-5265', '2019-11-12', '16:50', '2019-12-12', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 16:33:20', '2019-11-12 06:42:07'),
(151, '14', '20161', NULL, NULL, 'Dhaka Metro-GA-35-3886', '2019-11-12', '16:55', '2019-12-12', NULL, 'L-26,27 (Speed Check Duty)', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 16:36:31', '2019-11-12 06:42:07'),
(152, '14', '20158', NULL, NULL, 'Dhaka Metro-GA-32-4038', '2019-11-12', '15:30', '2019-12-12', NULL, 'L-26,27 (Speed Check Duty)', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 16:40:03', '2019-11-12 06:42:07'),
(153, '26', '1981', NULL, NULL, 'Dhaka Metro-GA-KHA-12-7459', '2019-11-12', '18:50', '2019-12-12', NULL, 'L-31 (Adomji College Circle)', 'Car', 'driver', '[\"Using cantonment road with false statement\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 16:40:49', '2019-11-12 06:42:07'),
(154, '25', '4217', NULL, NULL, 'Dhaka Metro-HA 43-6115', '2019-11-12', '13:00', '2019-12-12', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Motorcycle', 'driver', '[\"Use of unauthorized road\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 16:48:36', '2019-11-12 06:42:07'),
(155, '25', '4218', NULL, NULL, 'Dhaka Metro-LA 35-1986', '2019-11-12', '13:50', '2019-12-12', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Motorcycle', 'driver', '[\"Driving using mobile\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 16:49:40', '2019-11-12 06:42:07'),
(156, '25', '4216', NULL, NULL, 'Dhaka Metro-HA 24-6052', '2019-11-12', '13:00', '2019-12-12', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Motorcycle', 'driver', '[\"Use of unauthorized road\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 16:50:37', '2019-11-12 06:42:07'),
(157, '25', '4215', NULL, NULL, 'Dhaka Metro-HA 15-3347', '2019-11-12', '12:45', '2019-12-12', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Motorcycle', 'driver', '[\"Use of unauthorized road\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 16:51:32', '2019-11-12 06:42:07'),
(158, '25', '4212', NULL, NULL, 'Dhaka Metro-HA 60-2861', '2019-11-12', '14:25', '2019-12-12', NULL, 'L-8 (Moinl Rood Circle)', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 16:52:15', '2019-11-12 06:42:07'),
(159, '25', '4211', NULL, NULL, 'Dhaka Metro-THA-15-0190', '2019-11-12', '22:40', '2019-12-12', NULL, 'L-8 (Moinl Rood Circle)', 'CNG', 'driver', '[\"Traffic signal violation\"]', '[\"Driving Licence\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 16:53:18', '2019-11-12 06:42:07'),
(160, '25', '4210', NULL, NULL, 'Dhaka Metro-GA-29-8049', '2019-11-12', '21:10', '2019-12-12', NULL, 'L-8 (Moinl Rood Circle)', 'Car', 'driver', '[\"Traffic signal violation\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 16:53:58', '2019-11-12 06:42:07'),
(161, '25', '4209', NULL, NULL, 'Dhaka Metro-GHA-18-0774', '2019-11-12', '20:50', '2019-12-12', NULL, 'L-8 (Moinl Rood Circle)', 'Pajaro', 'driver', '[\"Traffic signal violation\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 16:54:59', '2019-11-12 06:42:07'),
(162, '28', '34043', NULL, NULL, 'Dhaka Metro-ha-54-8652', '2019-11-12', '12:10', '2019-12-12', NULL, 'L-8 (Moinl Rood Circle)', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 17:02:46', '2019-11-12 06:42:07'),
(163, '22', '3840', NULL, NULL, 'Dhaka Metro-GA-35-0027', '2019-11-12', '15:30', '2019-12-12', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Car', 'driver', '[\"Use of unauthorized door glass\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 17:03:52', '2019-11-12 06:42:07'),
(164, '22', '3841', NULL, NULL, 'Dhaka Metro-LA-26-7878', '2019-11-12', '15:40', '2019-12-12', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 17:04:32', '2019-11-12 06:42:07'),
(165, '22', '3842', NULL, NULL, 'Dhaka Metro-GA-42-9533', '2019-11-12', '23:04', '2019-12-12', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 17:05:04', '2019-11-12 06:42:07'),
(166, '22', '3843', NULL, NULL, 'Dhaka Metro-GA-CHA-16-2437', '2019-11-12', '15:50', '2019-12-12', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Motorcycle', 'driver', '[\"Use of unauthorized road\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 17:05:34', '2019-11-12 06:42:07'),
(167, '22', '3846', NULL, NULL, 'Dhaka Metro-HA-59-2222', '2019-11-12', '16:00', '2019-12-12', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Motorcycle', 'driver', '[\"Use of unauthorized road\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 17:06:06', '2019-11-12 06:42:07'),
(168, '22', '3847', NULL, NULL, 'Dhaka Metro-GA-29-1859', '2019-11-12', '23:06', '2019-12-12', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 17:06:35', '2019-11-12 06:42:07'),
(169, '22', '3848', NULL, NULL, 'Dhaka Metro-CHA-19-5519', '2019-11-12', '16:20', '2019-12-12', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'MicroBus', 'driver', '[\"Use of unauthorized road\"]', '[\"Fitness\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 17:07:24', '2019-11-12 06:42:07'),
(170, '22', '3849', NULL, NULL, 'Dhaka Metro-BA-11-8882', '2019-11-12', '16:30', '2019-12-12', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Bus', 'driver', '[\"Overloaded passengers\\/cargo\"]', '[\"Tax Token\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 17:07:55', '2019-11-12 06:42:07'),
(171, '22', '3845', NULL, NULL, 'Dhaka Metro-GA-33-8473', '2019-11-12', '16:00', '2019-12-12', NULL, 'L-5 (In Fornt of BNS Hazi Mohosin )', 'Car', 'driver', '[\"Use of unauthorized road\"]', '[\"Registration\"]', '1', '0', '0', '0', '0', NULL, NULL, '2019-11-10 17:08:45', '2019-11-12 06:42:07'),
(172, '64', '225', NULL, NULL, 'Dhaka Metro-LA-43-9576', '2019-11-11', '21:31', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:32:45', '2019-11-11 15:32:45'),
(173, '64', '223', NULL, NULL, 'Dhaka Metro-LA-43-2963', '2019-11-11', '21:32', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:33:53', '2019-11-11 15:33:53'),
(174, '24', '32121', NULL, NULL, 'Dhaka Metro-CHA-13-1442', '2019-11-11', '21:33', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:35:08', '2019-11-11 15:35:08'),
(175, '33', '1742', NULL, NULL, 'Foridpur-LA-11-1782', '2019-11-11', '21:35', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:38:23', '2019-11-11 15:38:23'),
(176, '33', '1743', NULL, NULL, 'Nowga-LA-12-1384', '2019-11-11', '21:38', '2019-12-11', NULL, NULL, NULL, 'driver', 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:38:58', '2019-11-11 16:27:07'),
(177, '34', '1061', NULL, NULL, 'Dhaka Metro-TAW-13-7035', '2019-11-11', '21:38', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:40:10', '2019-11-11 15:40:10'),
(178, '34', '1062', NULL, NULL, 'Dhaka Metro-MA-55-0375', '2019-11-11', '21:40', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:41:35', '2019-11-11 15:41:35'),
(179, '20', '4607', NULL, NULL, 'Dhaka Metro-KA-11-3034', '2019-11-11', '21:41', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:42:29', '2019-11-11 15:42:29'),
(180, '20', '4606', NULL, NULL, 'Dhaka Metro-HA-22-2678', '2019-11-11', '21:42', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:43:05', '2019-11-11 15:43:05');
INSERT INTO `casereg` (`id`, `id_mp`, `case_no`, `victim_name`, `victim_mb`, `vehical_reg`, `date_off`, `time_off`, `date_disposal`, `time_disposal`, `loc`, `vehical_type`, `victim`, `crime_type`, `paper`, `forwared`, `drop_type`, `accept`, `forwared_cantroment`, `paid`, `paper_image`, `outher_image`, `created_at`, `updated_at`) VALUES
(181, '53', '3125', NULL, NULL, 'Dhaka Metro-LA-12-2880', '2019-11-11', '21:43', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:43:58', '2019-11-11 15:43:58'),
(182, '50', '4902', NULL, NULL, 'Dhaka Metro-HA-58-6242', '2019-11-11', '21:43', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:44:52', '2019-11-11 15:44:52'),
(183, '50', '4901', NULL, NULL, 'Dhaka Metro-GA-33-7643', '2019-11-11', '21:44', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:45:35', '2019-11-11 15:45:35'),
(184, '57', '2641', NULL, NULL, 'Dhaka Metro-LA-43-0567', '2019-11-11', '21:45', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:46:50', '2019-11-11 15:46:50'),
(185, '20', '4608', NULL, NULL, 'Dhaka Metro-LA-25-5989', '2019-11-11', '21:46', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:47:55', '2019-11-11 15:47:55'),
(186, '50', '4903', NULL, NULL, 'Tangail-LA-11-5090', '2019-11-11', '21:47', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:48:45', '2019-11-11 15:48:45'),
(187, '53', '3127', NULL, NULL, 'Dhaka Metro-LA-20-0834', '2019-11-11', '21:48', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:49:57', '2019-11-11 15:49:57'),
(188, '64', '227', NULL, NULL, 'Dhaka Metro-HA-59-1437', '2019-11-11', '21:49', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:50:51', '2019-11-11 15:50:51'),
(189, '113', '29018', NULL, NULL, 'Dhaka Metro-LA-38-0601', '2019-11-11', '21:50', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:51:56', '2019-11-11 15:51:56'),
(190, '113', '29019', NULL, NULL, 'Dhaka Metro-GA-21-4626', '2019-11-11', '21:51', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:52:54', '2019-11-11 15:52:54'),
(191, '64', '222', NULL, NULL, 'Dhaka Metro-HA-23-8044', '2019-11-11', '21:52', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:53:45', '2019-11-11 15:53:45'),
(192, '27', '5105', NULL, NULL, 'Dhaka Metro-HA-57-6785', '2019-11-11', '21:53', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:54:30', '2019-11-11 15:54:30'),
(193, '27', '5104', NULL, NULL, 'Dhaka Metro-GA-20-1697', '2019-11-11', '21:54', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:55:22', '2019-11-11 15:55:22'),
(194, '27', '5103', NULL, NULL, 'Dhaka Metro-GA-39-7152', '2019-11-11', '21:55', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:55:59', '2019-11-11 15:55:59'),
(195, '27', '5102', NULL, NULL, 'Dhaka Metro-HA-22-2974', '2019-11-11', '21:56', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:56:37', '2019-11-11 15:56:37'),
(196, '30', '28950', NULL, NULL, 'Dhaka Metro-CHA-15-6220', '2019-11-11', '21:56', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:58:03', '2019-11-11 15:58:03'),
(197, '30', '28951', NULL, NULL, 'Dhaka Metro-LA-41-6324', '2019-11-11', '21:58', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:58:48', '2019-11-11 15:58:48'),
(198, '30', '28953', NULL, NULL, 'Dhaka Metro-LA-18-5465', '2019-11-11', '21:58', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 15:59:32', '2019-11-11 15:59:32'),
(199, '30', '28954', NULL, NULL, 'Dhaka Metro-LA-33-5717', '2019-11-11', '21:59', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 16:00:25', '2019-11-11 16:00:25'),
(200, '26', '1982', NULL, NULL, 'Dhaka Metro-BA-11-8713', '2019-11-11', '22:00', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 16:01:24', '2019-11-11 16:01:24'),
(201, '24', '32120', NULL, NULL, 'Dhaka Metro-BA-11-8643', '2019-11-11', '22:01', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 16:02:30', '2019-11-11 16:02:30'),
(202, '26', '1984', NULL, NULL, 'Dhaka Metro-BA-11-7813', '2019-11-11', '22:02', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 16:03:57', '2019-11-11 16:03:57'),
(203, '26', '1985', NULL, NULL, 'Dhaka Metro-BA-15-1153', '2019-11-11', '22:03', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 16:04:29', '2019-11-11 16:04:29'),
(204, '26', '1983', NULL, NULL, 'Dhaka Metro-BA-11-8551', '2019-11-11', '22:04', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 16:06:39', '2019-11-11 16:06:39'),
(205, '59', '4009', NULL, NULL, 'Dhaka Metro-LA-24-7467', '2019-11-11', '22:06', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 16:08:06', '2019-11-11 16:08:06'),
(206, '59', '4010', NULL, NULL, 'Dhaka Metro-HA-32-9327', '2019-11-11', '22:08', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 16:08:54', '2019-11-11 16:08:54'),
(207, '59', '4011', NULL, NULL, 'Dhaka Metro-LA-36-9909', '2019-11-11', '22:08', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 16:09:40', '2019-11-11 16:09:40'),
(208, '59', '4012', NULL, NULL, 'Dhaka Metro-HA-24-1685', '2019-11-11', '22:09', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 16:10:27', '2019-11-11 16:10:27'),
(209, '26', '1987', NULL, NULL, 'Dhaka Metro-BA-11-8601', '2019-11-11', '22:10', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 16:11:06', '2019-11-11 16:11:06'),
(210, '26', '1986', NULL, NULL, 'Dhaka Metro-GA-19-3757', '2019-11-11', '22:11', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 16:11:53', '2019-11-11 16:11:53'),
(211, '64', '224', NULL, NULL, 'Dhaka Metro-GA-LA-36-4607', '2019-11-11', '22:11', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 16:12:51', '2019-11-11 16:12:51'),
(212, '18', '2444', NULL, NULL, 'Dhaka Metro-NA-29-6170', '2019-11-11', '22:12', '2019-12-11', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-11 16:13:58', '2019-11-11 16:13:58'),
(213, '113', '29020', 'Nahid', NULL, 'Dhaka Metro-GA-14-4138', '2019-11-12', '21:20', '2019-12-12', NULL, NULL, 'Car', 'driver', 'null', '[\"Fitness\"]', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-12 02:34:42', '2019-11-12 02:34:42'),
(214, '32', '1154', 'Obaidul haque', NULL, 'Dhaka Metro-LA-19-7661', '2019-11-12', '16:10', '2019-12-12', NULL, 'L-6 (Aziz Polli Offrs Res Area Entrance)', 'Motorcycle', NULL, 'null', '[\"Tax Token\"]', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-12 07:33:01', '2019-11-12 07:33:01'),
(215, '25', '4223', 'Abdul kuddus', NULL, 'Dhaka Metro-CHA-535674', '2019-11-13', '19:00', '2019-12-13', NULL, 'L-45 (Bonani DOHS In Gate)', 'MicroBus', 'driver', '[\"Traffic signal violation\"]', '[\"Registration\"]', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-13 00:40:23', '2019-11-13 00:40:23'),
(216, '52', '4116', 'Azade', NULL, 'Dhaka Metro-HA-58-3738', '2019-11-13', '08:00', '2019-12-13', NULL, 'L-8 (Moinl Rood Circle)', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Registration\"]', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-13 00:43:15', '2019-11-13 00:43:15'),
(217, '52', '4115', 'Shaiful', NULL, 'Dhaka Metro-GA-23-3105', '2019-11-13', '07:30', '2019-12-13', NULL, 'L-8 (Moinl Rood Circle)', 'Car', NULL, '[\"Traffic signal violation\"]', '[\"Tax Token\"]', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-13 00:47:06', '2019-11-13 00:47:06'),
(218, '52', '4114', 'Main', NULL, 'Bogra-HA-13-0514', '2019-11-13', '22:00', '2019-12-13', NULL, 'L-25 (In front of 16 BIR Trg Grd)', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Registration\"]', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-13 00:49:23', '2019-11-13 01:08:10'),
(219, '62', '093', 'Shahadat hosen', NULL, 'Dhaka Metro-GA-28-6267', '2019-11-13', '17:55', '2019-12-13', NULL, 'L-25 (In front of 16 BIR Trg Grd)', 'Car', 'driver', '[\"Traffic signal violation\"]', '[\"Fitness\"]', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-13 00:51:39', '2019-11-13 00:51:39'),
(220, '112', '2710', 'Al Amin', NULL, 'Bhola -LA-11-0568', '2019-11-13', '16:20', '2019-12-13', NULL, 'L-17 (In front of MES Convention Hall)', 'Motorcycle', 'driver', '[\"Traffic signal violation\"]', '[\"Registration\"]', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-13 00:53:32', '2019-11-13 00:53:32'),
(221, '46', '1331', 'Al Amin', NULL, 'Dhaka Metro-CHA-53-9265', '2019-11-13', '09:08', '2019-12-13', NULL, NULL, 'MicroBus', 'driver', '[\"Parking in unauthorized place\"]', '[\"Registration\"]', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-13 00:56:01', '2019-11-13 00:56:01'),
(222, '47', '27554', 'Shibu', NULL, 'Dhaka Metro-GA-25-5899', '2019-11-13', '16:50', '2019-12-13', NULL, 'L-8 (Moinl Rood Circle)', 'Car', 'driver', '[\"Traffic signal violation\"]', '[\"Tax Token\"]', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-13 00:57:47', '2019-11-13 00:57:47'),
(223, '47', '27552', NULL, NULL, 'Dhaka Metro-GA-42-4117', '2019-11-13', '16:40', '2019-12-13', NULL, 'L-8 (Moinl Rood Circle)', 'Car', 'driver', '[\"Traffic signal violation\"]', '[\"Fitness\"]', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-13 00:59:12', '2019-11-13 00:59:12'),
(224, '43', '1541', 'kased', NULL, 'Dhaka Metro-GA-42-2422', '2019-11-13', '08:30', '2019-12-13', NULL, 'L-8 (Moinl Rood Circle)', 'Car', 'driver', '[\"Disobedience of ordes, disruphions and disallowance of informatio\"]', '[\"Fitness\"]', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-13 03:43:48', '2019-11-13 03:43:48'),
(225, '53', '3129', NULL, NULL, 'Dhaka Metro-HA-56-0594', '2019-11-13', '16:50', '2019-12-13', NULL, NULL, 'Motorcycle', NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-13 04:40:05', '2019-11-13 04:40:05'),
(226, '49', '5003', NULL, NULL, 'Dhaka Metro-LA-44-5599', '2019-11-13', '07:10', '2019-12-13', NULL, NULL, NULL, NULL, 'null', 'null', '0', '0', '0', '0', '0', NULL, NULL, '2019-11-13 04:41:09', '2019-11-13 04:41:09');

-- --------------------------------------------------------

--
-- Table structure for table `crime_models`
--

CREATE TABLE `crime_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `crime` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crime_models`
--

INSERT INTO `crime_models` (`id`, `type`, `crime`, `created_at`, `updated_at`) VALUES
(3, 'mp', 'Disobedience of ordes, disruphions and disallowance of informatio', '2019-10-31 04:00:40', '2019-11-03 03:57:06'),
(2, 'mp', 'Traffic signal violation', '2019-10-31 04:00:28', '2019-11-03 23:07:24'),
(1, 'mp', 'Careless driving', '2019-10-31 04:00:17', '2019-11-03 03:56:30'),
(4, 'mp', 'Changing lanes without indicator', '2019-10-31 04:00:50', '2019-11-03 03:57:21'),
(5, 'mp', 'Driving in inappropriate state (Physically/Mentally)', '2019-10-31 04:00:54', '2019-11-03 23:05:01'),
(6, 'mp', 'U-Tern in unauthorized place', '2019-10-31 04:01:03', '2019-11-03 23:09:07'),
(7, 'mp', 'Over speeding', '2019-11-03 03:58:14', '2019-11-03 23:09:45'),
(8, 'mp', 'Use of unauthorized road', '2019-11-03 03:58:35', '2019-11-03 03:58:35'),
(9, 'mp', 'Use of unauthorized door glass', '2019-11-03 03:58:45', '2019-11-03 23:11:02'),
(10, 'mp', 'Defected Veh', '2019-11-03 03:58:55', '2019-11-03 23:13:06'),
(11, 'mp', 'Overloaded passengers/cargo', '2019-11-03 03:59:05', '2019-11-03 23:13:51'),
(12, 'mp', 'Driving without license', '2019-11-03 03:59:14', '2019-11-03 23:14:15'),
(13, 'mp', 'Dropping/ Picking up in unauthorized place', '2019-11-03 03:59:25', '2019-11-03 23:16:22'),
(14, 'mp', 'Driving without registration/fitness certificate /permit', '2019-11-03 03:59:35', '2019-11-03 23:16:46'),
(15, 'mp', 'Driving motor cycle without insurance', '2019-11-03 03:59:51', '2019-11-03 23:17:02'),
(16, 'mp', 'Driving with overloaded weight', '2019-11-03 04:00:01', '2019-11-03 23:17:47'),
(17, 'mp', 'Using cantonment road with false statement', '2019-11-03 04:00:11', '2019-11-03 23:18:06'),
(18, 'mp', 'Driving without valid license', '2019-11-03 04:00:24', '2019-11-03 23:18:20'),
(19, 'mp', 'Others', '2019-11-03 04:00:35', '2019-11-03 23:18:29'),
(20, 'mp', 'Driving using mobile', '2019-11-03 23:19:01', '2019-11-03 23:19:01'),
(21, 'mp', 'Driving without seat belt', '2019-11-03 23:19:18', '2019-11-03 23:19:18'),
(22, 'mp', 'Parking in unauthorized place', '2019-11-03 23:19:50', '2019-11-03 23:19:50'),
(23, 'mp', 'Use of excess horn', '2019-11-03 23:20:11', '2019-11-03 23:20:11'),
(24, 'mp', 'Driving with high volume music', '2019-11-03 23:20:40', '2019-11-03 23:20:40'),
(25, 'mp', '2nd seater without helmet', '2019-11-03 23:21:15', '2019-11-03 23:21:15');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `type`, `location`, `created_at`, `updated_at`) VALUES
(3, 'mp', 'L-3', '2019-10-31 03:59:44', '2019-11-03 19:18:20'),
(2, 'mp', 'L-2', '2019-10-31 03:59:41', '2019-10-31 03:59:41'),
(1, 'mp', 'L-1', '2019-10-31 03:59:38', '2019-10-31 03:59:38'),
(4, 'mp', 'L-5 (In Fornt of BNS Hazi Mohosin )', '2019-11-03 03:40:28', '2019-11-03 03:40:28'),
(5, 'mp', 'L-6 (Aziz Polli Offrs Res Area Entrance)', '2019-11-03 03:47:10', '2019-11-03 03:47:10'),
(6, 'mp', 'L-8 (Moinl Rood Circle)', '2019-11-03 03:47:25', '2019-11-03 03:47:25'),
(7, 'mp', 'L-9 (Shadhinota Shoroni MP Check Post  ( Banani))', '2019-11-03 03:47:35', '2019-11-03 03:47:35'),
(8, 'mp', 'L-10 (Rojonigondha Pocket Gate)', '2019-11-03 03:47:45', '2019-11-03 03:47:45'),
(9, 'mp', 'L-11 (Shadinota chattor MP CP (kachukhet))', '2019-11-03 03:47:53', '2019-11-03 03:47:53'),
(10, 'mp', 'L-12 (Accident Sqd, Ni Mobile)', '2019-11-03 03:48:03', '2019-11-03 03:48:03'),
(11, 'mp', 'L-15 (Captains Bakery)', '2019-11-03 03:48:12', '2019-11-03 03:48:12'),
(12, 'mp', 'L-17 (In front of MES Convention Hall)', '2019-11-03 03:48:21', '2019-11-03 03:48:21'),
(13, 'mp', 'L-24 (HQ Log Area Entrance)', '2019-11-03 03:48:30', '2019-11-03 03:48:30'),
(14, 'mp', 'L-25 (In front of 16 BIR Trg Grd)', '2019-11-03 03:48:41', '2019-11-03 03:48:41'),
(15, 'mp', 'L-23 (901 Cen Wksp Bus  Stand)', '2019-11-03 03:48:50', '2019-11-03 03:48:50'),
(16, 'mp', 'L-26,27 (Speed Check Duty)', '2019-11-03 03:49:00', '2019-11-03 03:49:00'),
(17, 'mp', 'L-30 (Adomji Foot Over  Bridge)', '2019-11-03 03:49:08', '2019-11-03 03:49:08'),
(18, 'mp', 'L-31 (Adomji College Circle)', '2019-11-03 03:49:18', '2019-11-03 03:49:18'),
(19, 'mp', 'L-35, 36 & 37(MC Mobile)', '2019-11-03 03:49:27', '2019-11-03 03:49:27'),
(20, 'mp', 'L-40(Ni Ptl)', '2019-11-03 03:49:36', '2019-11-03 03:49:36'),
(21, 'mp', 'L-41(East Side of shaheed  Anower School  & College)', '2019-11-03 03:49:48', '2019-11-03 03:49:48'),
(22, 'mp', 'L-45 (Bonani DOHS In Gate)', '2019-11-03 03:49:56', '2019-11-03 03:49:56'),
(23, 'mp', 'L-51 (Adomji College Rear Gate)', '2019-11-03 03:50:05', '2019-11-03 03:50:05'),
(24, 'mp', 'L-52 (Adomji  School Rear Gate)', '2019-11-03 03:50:15', '2019-11-03 03:50:15'),
(25, 'mp', 'L-61 (Banani MP CP Pedestrian Check)', '2019-11-03 03:50:23', '2019-11-03 03:50:23'),
(26, 'mp', 'L-62 (Kochukhet Pedestrian Check)', '2019-11-03 03:50:34', '2019-11-03 03:50:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(89, '2014_10_12_000000_create_users_table', 1),
(90, '2014_10_12_100000_create_password_resets_table', 1),
(91, '2019_10_15_035102_create_mps_table', 1),
(92, '2019_10_15_035103_create_mp_password_resets_table', 1),
(93, '2019_10_15_035119_create_bafs_table', 1),
(94, '2019_10_15_035120_create_baf_password_resets_table', 1),
(95, '2019_10_15_035129_create_armies_table', 1),
(96, '2019_10_15_035130_create_army_password_resets_table', 1),
(97, '2019_10_15_035149_create_superadmins_table', 1),
(98, '2019_10_15_035150_create_superadmin_password_resets_table', 1),
(99, '2019_10_15_044344_create_casereg_table', 1),
(100, '2019_10_15_054918_create_systemadmins_table', 1),
(101, '2019_10_15_054919_create_systemadmin_password_resets_table', 1),
(102, '2019_10_15_054924_create_admins_table', 1),
(103, '2019_10_15_054925_create_admin_password_resets_table', 1),
(104, '2019_10_16_124803_create_location_table', 1),
(105, '2019_10_17_145714_create_vehicle_models_table', 1),
(106, '2019_10_17_155316_create_crime_models_table', 1),
(107, '2019_11_05_111408_create_addmp_table', 2),
(108, '2019_11_05_132107_create_paper_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mps`
--

CREATE TABLE `mps` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mps`
--

INSERT INTO `mps` (`id`, `name`, `email`, `banumber`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Cpl Md Al amin', '01712345678', 'BA-1234', '$2y$10$ZYbj1XUrdelA6BfcQ4zC/.DPmeqLoL0huiP.f/U0An2nPE82JrqI2', NULL, '2019-11-06 03:45:42', '2019-11-06 06:41:16'),
(2, 'Cpl Khairul Bashar', '01709900231', '3001137', '$2y$10$b1ZMbQINt9hTZhE3NQ6HN.Ls.OfhO4cwtUXmNEx1QnzCV.uVFTLPi', NULL, '2019-11-06 06:44:17', '2019-11-06 06:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `mp_password_resets`
--

CREATE TABLE `mp_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE `paper` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paper` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`id`, `paper`, `created_at`, `updated_at`) VALUES
(1, 'Driving Licence', '2019-11-05 07:27:41', '2019-11-06 06:13:17'),
(2, 'insurance', '2019-11-06 06:13:59', '2019-11-06 06:13:59'),
(3, 'Fitness', '2019-11-06 06:15:06', '2019-11-06 06:15:06'),
(4, 'Route Permit', '2019-11-06 06:15:38', '2019-11-06 06:15:38'),
(5, 'Registration', '2019-11-06 06:16:05', '2019-11-06 06:16:05'),
(6, 'Tax Token', '2019-11-06 06:16:53', '2019-11-06 06:16:53'),
(7, 'Registration acknowledgement slip', '2019-11-06 06:17:57', '2019-11-06 06:17:57'),
(8, 'Military  case', '2019-11-11 06:55:28', '2019-11-11 06:55:28'),
(9, 'Traffic police case', '2019-11-11 06:55:42', '2019-11-11 06:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `superadmins`
--

CREATE TABLE `superadmins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `superadmins`
--

INSERT INTO `superadmins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'superadmin@gmail.com', '$2y$10$BYPRfctEXiucFVeOpC5wu.PZub0YbMOoZ4pFbThh7eqBqfC2GLcV.', NULL, '2019-11-03 04:26:49', '2019-11-03 04:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin_password_resets`
--

CREATE TABLE `superadmin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `systemadmins`
--

CREATE TABLE `systemadmins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `systemadmins`
--

INSERT INTO `systemadmins` (`id`, `name`, `email`, `banumber`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Desk Admin', '01712345678', 'BA333', '$2y$10$Tfby9aNMygH8Iy8jY49ceuA83.ljeV6zmGOPgJV.cP2K/0UNi8UU.', NULL, '2019-11-03 04:30:44', '2019-11-03 04:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `systemadmin_password_resets`
--

CREATE TABLE `systemadmin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_models`
--

CREATE TABLE `vehicle_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_models`
--

INSERT INTO `vehicle_models` (`id`, `type`, `vehicle`, `created_at`, `updated_at`) VALUES
(1, 'mp', 'Car', '2019-11-06 03:59:55', '2019-11-06 03:59:55'),
(2, 'mp', 'CNG', '2019-11-06 03:59:58', '2019-11-06 03:59:58'),
(3, 'mp', 'MicroBus', '2019-11-06 04:00:03', '2019-11-06 04:00:03'),
(4, 'mp', 'Bus', '2019-11-06 06:31:48', '2019-11-06 06:31:48'),
(5, 'mp', 'Motorcycle', '2019-11-06 06:32:17', '2019-11-06 06:32:17'),
(6, 'mp', 'Pickup', '2019-11-06 06:32:45', '2019-11-06 06:32:45'),
(7, 'mp', 'Laguna', '2019-11-06 06:34:03', '2019-11-06 06:34:03'),
(8, 'mp', 'Truck', '2019-11-10 04:07:22', '2019-11-10 04:07:22'),
(9, 'mp', 'Pajaro', '2019-11-10 04:09:11', '2019-11-10 04:09:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addmp`
--
ALTER TABLE `addmp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `addmp_ba_no_unique` (`ba_no`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`),
  ADD KEY `admin_password_resets_token_index` (`token`);

--
-- Indexes for table `armies`
--
ALTER TABLE `armies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `armies_email_unique` (`email`);

--
-- Indexes for table `army_password_resets`
--
ALTER TABLE `army_password_resets`
  ADD KEY `army_password_resets_email_index` (`email`),
  ADD KEY `army_password_resets_token_index` (`token`);

--
-- Indexes for table `bafs`
--
ALTER TABLE `bafs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bafs_email_unique` (`email`);

--
-- Indexes for table `baf_password_resets`
--
ALTER TABLE `baf_password_resets`
  ADD KEY `baf_password_resets_email_index` (`email`),
  ADD KEY `baf_password_resets_token_index` (`token`);

--
-- Indexes for table `casereg`
--
ALTER TABLE `casereg`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `casereg_case_no_unique` (`case_no`);

--
-- Indexes for table `crime_models`
--
ALTER TABLE `crime_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mps`
--
ALTER TABLE `mps`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mps_email_unique` (`email`),
  ADD UNIQUE KEY `mps_banumber_unique` (`banumber`);

--
-- Indexes for table `mp_password_resets`
--
ALTER TABLE `mp_password_resets`
  ADD KEY `mp_password_resets_email_index` (`email`),
  ADD KEY `mp_password_resets_token_index` (`token`);

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `paper_paper_unique` (`paper`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `superadmins`
--
ALTER TABLE `superadmins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `superadmins_email_unique` (`email`);

--
-- Indexes for table `superadmin_password_resets`
--
ALTER TABLE `superadmin_password_resets`
  ADD KEY `superadmin_password_resets_email_index` (`email`),
  ADD KEY `superadmin_password_resets_token_index` (`token`);

--
-- Indexes for table `systemadmins`
--
ALTER TABLE `systemadmins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `systemadmins_email_unique` (`email`),
  ADD UNIQUE KEY `systemadmins_banumber_unique` (`banumber`);

--
-- Indexes for table `systemadmin_password_resets`
--
ALTER TABLE `systemadmin_password_resets`
  ADD KEY `systemadmin_password_resets_email_index` (`email`),
  ADD KEY `systemadmin_password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicle_models`
--
ALTER TABLE `vehicle_models`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addmp`
--
ALTER TABLE `addmp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `armies`
--
ALTER TABLE `armies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bafs`
--
ALTER TABLE `bafs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `casereg`
--
ALTER TABLE `casereg`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `crime_models`
--
ALTER TABLE `crime_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `mps`
--
ALTER TABLE `mps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paper`
--
ALTER TABLE `paper`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `superadmins`
--
ALTER TABLE `superadmins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `systemadmins`
--
ALTER TABLE `systemadmins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_models`
--
ALTER TABLE `vehicle_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
