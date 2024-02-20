-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2020 at 08:54 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `image_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `control_panel_pass`
--

CREATE TABLE `control_panel_pass` (
  `index` tinyint(1) NOT NULL,
  `type` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `hash` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `control_panel_pass`
--

INSERT INTO `control_panel_pass` (`index`, `type`, `passwd`, `hash`) VALUES
(1, 'panel password', '$1$IcfyhEuS$.V0mtr7hkurIsMYR/pMQa/', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `image_catg`
--

CREATE TABLE `image_catg` (
  `index` int(11) NOT NULL,
  `filter_id` varchar(255) NOT NULL,
  `catg_id` varchar(255) NOT NULL,
  `catg_name` text NOT NULL,
  `year` varchar(10) NOT NULL,
  `lim` int(10) NOT NULL DEFAULT 25,
  `catg_hidden` tinyint(4) NOT NULL DEFAULT 0,
  `num_of_imgs` int(11) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image_catg`
--

INSERT INTO `image_catg` (`index`, `filter_id`, `catg_id`, `catg_name`, `year`, `lim`, `catg_hidden`, `num_of_imgs`, `date_created`, `date_modified`) VALUES
(18, 'f_unc171201092510', 'met171202122308', 'Parents Meeting 2017', '2017', 0, 0, 11, '2020-12-24 09:18:59', '2017-12-02 12:23:08'),
(20, 'f_sch171202122129 ', 'sch171208055759', 'School Day 2017', '2017', 0, 1, NULL, '2020-12-23 06:25:06', '2017-12-08 05:57:59'),
(21, 'f_gre171206100546 ', 'gre171208055831', 'Green Day 2017', '2017', 0, 0, 5, '2020-12-23 06:25:09', '2017-12-08 05:58:31'),
(23, 'f_blu171208050329 ', 'blu171208060012', 'Blue Day 2017', '2017', 0, 0, 1, '2020-12-23 06:25:11', '2017-12-08 06:00:12'),
(24, 'f_doc171206091143 ', 'doc171208060333', 'Doctors Day 2017', '2017', 0, 0, 6, '2020-12-23 06:25:14', '2017-12-08 06:03:33'),
(25, 'f_red171208050445 ', 'red171208060618', 'Red Day 2017', '2017', 0, 0, 4, '2020-12-23 06:25:16', '2017-12-08 06:06:18'),
(26, 'f_unc171201092510', 'fru171208060701', 'Fruits and Vegetables Day 2017', '2017', 0, 1, 2, '2020-12-23 06:25:19', '2017-12-08 06:07:01'),
(27, 'f_ann171208050539 ', 'ann171208060729', 'Annual Day 2017', '2017', 0, 0, 14, '2020-12-23 06:25:22', '2017-12-08 06:07:29'),
(28, 'f_unc171201092510', 'spo171208050743', 'Sports Day 2017', '2017', 0, 0, 4, '2020-12-23 06:25:25', '2017-12-08 17:07:43'),
(29, 'f_sch171215063047 ', 'sch171215063142', 'School Inaguration 2017', '2017', 0, 0, 5, '2020-12-23 06:25:27', '2017-12-15 06:31:42'),
(30, 'f_mon171217022910 ', 'mon171215083939', 'Monthly Competitions Dec 2017', '2017', 0, 0, 11, '2020-12-23 06:25:32', '2017-12-15 08:39:39'),
(31, 'f_ind171217023030 ', 'ind171215084059', 'Independence Day 2017', '2017', 0, 0, 6, '2020-12-23 06:25:34', '2017-12-15 08:40:59'),
(33, 'f_col171216044436 ', 'col171216044453', 'Colouring Day 2017', '2017', 0, 0, 4, '2020-12-23 07:34:16', '2017-12-16 04:44:53'),
(34, 'f_abo171217025706 ', 'abo171216062711', 'About us', '', 0, 0, 2, '2017-12-17 02:57:33', '2017-12-16 06:27:11'),
(35, 'f_yel171220112741', 'yel171220112914', 'Yellow Day 2017-18', '2017', 0, 0, 4, '2020-12-23 07:41:18', '2017-12-20 11:29:14'),
(38, 'f_unc171201092510', 'fou171221044547', 'Founder chairman', '', 0, 0, 4, '2017-12-21 05:49:01', '2017-12-21 04:45:47'),
(39, 'f_app171222053419', 'app171222053438', 'Appreciation day', '2017', 0, 0, 17, '2020-12-23 07:42:49', '2017-12-22 05:34:38'),
(40, 'f_sch180117065602', 'sch180117065613', 'School van', '', 0, 0, 1, '2018-01-17 06:57:19', '2018-01-17 06:56:13'),
(42, 'f_fac180131083215', 'fac180131083229', 'Faculty Development Program', '', 0, 0, 6, '2018-06-28 09:33:28', '2018-01-31 08:32:29'),
(44, 'f_wri180227054352', 'cal180227054905', 'Calligraphy', '', 0, 0, 4, '2018-02-27 05:53:15', '2018-02-27 05:49:05'),
(45, 'f_wor180227062426', 'wor180227062523', 'Workshop', '', 0, 0, 4, '2018-02-27 06:38:43', '2018-02-27 06:25:23'),
(46, 'f_pin180412071130', 'pin180412071236', 'Pink Day', '2017', 25, 0, 2, '2020-12-25 06:43:23', '2018-04-12 07:12:36'),
(47, 'f_ora180413091553', 'ora180413091752', 'Orange Day', '2017', 25, 0, 3, '2020-12-25 06:43:19', '2018-04-13 09:17:52'),
(48, 'f_red171208050445', 'red190209074544', 'Red Day 2018-19', '2018', 25, 0, 4, '2020-12-25 06:43:17', '2019-02-09 07:45:44'),
(49, 'f_yel190213052839', 'yel190213052932', 'Yellow Day 2018-19', '2018', 25, 0, 17, '2020-12-25 06:43:15', '2019-02-13 05:29:32'),
(51, 'f_fru190219070034', 'fru190219070111', 'Fruits and Vegetables Day 2018-19', '2018', 25, 0, 8, '2020-12-25 06:43:13', '2019-02-19 07:01:11'),
(52, 'f_ind190219073746', 'ind190219073820', 'Independence Day 2018-19', '2018', 25, 0, 4, '2020-12-25 06:43:10', '2019-02-19 07:38:20'),
(53, 'f_chr190220072539', 'chr190220073025', 'Christmas Celebration 2018-19', '2018', 25, 0, 5, '2020-12-25 06:43:07', '2019-02-20 07:30:25'),
(56, 'f_gre191008050500', 'gre191008050517', 'Green Day  2019-2020', '2019', 25, 0, 9, '2020-12-25 06:43:05', '2019-10-08 05:05:17'),
(57, 'f_ind191019075559 ', 'ind191019075455', 'INDEPENDENCE DAY 2019-20', '2019', 25, 0, 11, '2020-12-25 06:43:03', '2019-10-19 07:54:55'),
(58, 'f_blu191112061029', 'blu191112061040', 'BLUE DAY 2019-2020', '2019', 25, 0, 10, '2020-12-25 06:43:00', '2019-11-12 06:10:40'),
(59, 'f_red200121060813', 'red200121060844', 'RED DAY 2019-20', '2019', 25, 0, 6, '2020-12-25 06:42:58', '2020-01-21 06:08:44'),
(60, 'f_fru200121061544', 'fru200121061611', 'FRUITS &amp; VEGETABLES DAY 2019-20', '2019', 25, 0, 14, '2020-12-25 06:42:55', '2020-01-21 06:16:11'),
(61, 'f_yel171220112741', 'yel200622100627', 'YELLOW DAY 2019-2020', '2019', 25, 0, 1, '2020-12-25 06:42:52', '2020-06-22 10:06:27'),
(66, 'f_app171222053419', 'pri200622105913', 'Prize winners 2019-2020', '2019', 25, 0, 9, '2020-12-25 06:42:50', '2020-06-22 10:59:13'),
(68, 'f_unc171201092510', 'fie200622111952', 'Field Visit 2019-2020', '2019', 25, 0, 1, '2020-12-25 06:42:47', '2020-06-22 11:19:52');

-- --------------------------------------------------------

--
-- Table structure for table `image_collection`
--

CREATE TABLE `image_collection` (
  `id` int(11) NOT NULL,
  `catg_id` varchar(255) NOT NULL,
  `img_loc` text DEFAULT NULL,
  `img_extension` varchar(255) NOT NULL,
  `img_description` text DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image_collection`
--

INSERT INTO `image_collection` (`id`, `catg_id`, `img_loc`, `img_extension`, `img_description`, `date_added`) VALUES
(85, 'met171202122308', './gallery/5a28fba46a3fb5.37609268.jpg', 'jpg', '', '2017-12-07 08:28:20'),
(87, 'doc171208060333', './gallery/5a2a37301404f6.35548527.jpg', 'jpg', '', '2017-12-08 06:54:40'),
(88, 'gre171208055831', './gallery/5a2a38ef214f33.73493966.jpg', 'jpg', '', '2017-12-08 07:02:07'),
(89, 'gre171208055831', './gallery/5a2a39152e9693.62733592.jpg', 'jpg', '', '2017-12-08 07:02:45'),
(90, 'gre171208055831', './gallery/5a2a39da2949e7.58907147.jpg', 'jpg', '', '2017-12-08 07:06:02'),
(91, 'gre171208055831', './gallery/5a2a3a1c254142.59180830.jpg', 'jpg', '', '2017-12-08 07:07:08'),
(92, 'gre171208055831', './gallery/5a2a3a2aa32756.80501819.jpg', 'jpg', '', '2017-12-08 07:07:22'),
(93, 'ann171208060729', './gallery/5a30c16a32d3c1.91524648.jpg', 'jpg', '', '2017-12-13 05:58:02'),
(94, 'ann171208060729', './gallery/5a30c3d3997c39.34797228.jpg', 'jpg', '', '2017-12-13 06:08:19'),
(96, 'ann171208060729', './gallery/5a30c645477e48.69255069.jpg', 'jpg', '', '2017-12-13 06:18:45'),
(97, 'ann171208060729', './gallery/5a30c8d6b66532.67221582.jpg', 'jpg', '', '2017-12-13 06:29:42'),
(98, 'ann171208060729', './gallery/5a30c8e5c29fe8.21485328.jpg', 'jpg', '', '2017-12-13 06:29:57'),
(99, 'ann171208060729', './gallery/5a30c8ed782dd9.01422076.jpg', 'jpg', '', '2017-12-13 06:30:05'),
(100, 'ann171208060729', './gallery/5a30c90ed87a42.49337070.jpg', 'jpg', '', '2017-12-13 06:30:38'),
(101, 'ann171208060729', './gallery/5a30c9b01af106.98487183.jpg', 'jpg', '', '2017-12-13 06:33:20'),
(103, 'ann171208060729', './gallery/5a30cccae2a946.52362303.jpg', 'jpg', '', '2017-12-13 06:46:34'),
(104, 'ann171208060729', './gallery/5a30cdbf974496.45063057.jpg', 'jpg', '', '2017-12-13 06:50:39'),
(106, 'ann171208060729', './gallery/5a30ceb8ae8d27.80107807.jpg', 'jpg', '', '2017-12-13 06:54:49'),
(107, 'doc171208060333', './gallery/5a30d05767c731.95678694.jpg', 'jpg', '', '2017-12-13 07:01:43'),
(109, 'doc171208060333', './gallery/5a30d061bc3c74.86701489.jpg', 'jpg', '', '2017-12-13 07:01:53'),
(110, 'doc171208060333', './gallery/5a30d061d21d66.63386763.jpg', 'jpg', '', '2017-12-13 07:01:53'),
(111, 'met171202122308', './gallery/5a3364fe6f23b4.90288676.jpg', 'jpg', '', '2017-12-15 06:00:30'),
(112, 'met171202122308', './gallery/5a33650f65b925.97855910.jpg', 'jpg', '', '2017-12-15 06:00:47'),
(113, 'ann171208060729', './gallery/5a33662be259d9.94342341.jpg', 'jpg', '', '2017-12-15 06:05:34'),
(115, 'ann171208060729', './gallery/5a336b6c573071.35655547.jpg', 'jpg', '', '2017-12-15 06:27:56'),
(117, 'ann171208060729', './gallery/5a336ba7362643.16492492.jpg', 'jpg', '', '2017-12-15 06:28:55'),
(118, 'sch171215063142', './gallery/5a336c7c802ec5.70792898.jpg', 'jpg', '', '2017-12-15 06:32:28'),
(119, 'sch171215063142', './gallery/5a336cb1664fe3.68987422.jpg', 'jpg', '', '2017-12-15 06:33:21'),
(120, 'sch171215063142', './gallery/5a336cb1a41371.37408682.jpg', 'jpg', '', '2017-12-15 06:33:21'),
(121, 'sch171215063142', './gallery/5a336cca2131e3.92338613.jpg', 'jpg', '', '2017-12-15 06:33:46'),
(122, 'sch171215063142', './gallery/5a336d4b0cad86.48128766.jpg', 'jpg', '', '2017-12-15 06:35:55'),
(124, 'doc171208060333', './gallery/5a336f8b86d4d1.46497791.jpg', 'jpg', '', '2017-12-15 06:45:31'),
(125, 'doc171208060333', './gallery/5a336ffb5e23f6.78508320.jpg', 'jpg', '', '2017-12-15 06:47:23'),
(126, 'red171208060618', './gallery/5a33735da9e7c4.40181988.jpg', 'jpg', '', '2017-12-15 07:01:49'),
(127, 'red171208060618', './gallery/5a33752453cc72.67074174.jpg', 'jpg', '', '2017-12-15 07:09:24'),
(128, 'red171208060618', './gallery/5a33752471eb76.58552609.png', 'png', '', '2017-12-15 07:09:24'),
(129, 'red171208060618', './gallery/5a3375ac517617.95952104.png', 'png', '', '2017-12-15 07:11:40'),
(130, 'spo171208050743', './gallery/5a3379f09e9c76.34692189.png', 'png', '', '2017-12-15 07:29:52'),
(131, 'mon171215083939', './gallery/5a338bc5c582b2.75725165.jpg', 'jpg', '', '2017-12-15 08:45:57'),
(132, 'mon171215083939', './gallery/5a338bc602d837.66063230.jpg', 'jpg', '', '2017-12-15 08:45:58'),
(133, 'mon171215083939', './gallery/5a338c71960f98.14555598.jpg', 'jpg', '', '2017-12-15 08:48:49'),
(134, 'mon171215083939', './gallery/5a338c7fbb8b17.81289443.jpg', 'jpg', '', '2017-12-15 08:49:03'),
(135, 'mon171215083939', './gallery/5a338c87da4284.25797842.jpg', 'jpg', '', '2017-12-15 08:49:11'),
(136, 'mon171215083939', './gallery/5a338c912454b8.81451126.jpg', 'jpg', '', '2017-12-15 08:49:21'),
(137, 'mon171215083939', './gallery/5a338c9b910924.89131851.jpg', 'jpg', '', '2017-12-15 08:49:31'),
(138, 'mon171215083939', './gallery/5a338ca2b7eeb8.21138608.jpg', 'jpg', '', '2017-12-15 08:49:38'),
(139, 'ind171215084059', './gallery/5a338d859c39e0.50638510.jpg', 'jpg', '', '2017-12-15 08:53:25'),
(140, 'ind171215084059', './gallery/5a338d9364e579.28132440.jpg', 'jpg', '', '2017-12-15 08:53:41'),
(141, 'ind171215084059', './gallery/5a338db63101b1.49634237.jpg', 'jpg', '', '2017-12-15 08:54:14'),
(142, 'ind171215084059', './gallery/5a338dde98ca71.14787160.jpg', 'jpg', '', '2017-12-15 08:54:54'),
(143, 'spo171208050743', './gallery/5a338e3964bea9.88033834.jpg', 'jpg', '', '2017-12-15 08:56:25'),
(144, 'spo171208050743', './gallery/5a338e4f13c775.23380188.jpg', 'jpg', '', '2017-12-15 08:56:47'),
(145, 'spo171208050743', './gallery/5a338e5fde6448.57551182.jpg', 'jpg', '', '2017-12-15 08:57:03'),
(148, 'blu171208060012', './gallery/5a34a36e4228d6.96896383.jpg', 'jpg', '', '2017-12-16 04:39:10'),
(149, 'col171216044453', './gallery/5a34a4e0bdca07.25734244.jpg', 'jpg', '', '2017-12-16 04:45:20'),
(150, 'col171216044453', './gallery/5a34a4f086ca62.92066705.jpg', 'jpg', '', '2017-12-16 04:45:36'),
(151, 'col171216044453', './gallery/5a34a4fdbcbd62.22857895.jpg', 'jpg', '', '2017-12-16 04:45:49'),
(152, 'col171216044453', './gallery/5a34a5091c2913.86351618.jpg', 'jpg', '', '2017-12-16 04:46:01'),
(153, 'abo171216062711', './gallery/5a34cdf7753a08.25207256.jpg', 'jpg', '', '2017-12-16 07:40:39'),
(154, 'abo171216062711', './gallery/5a34ce3d24ecd2.25285519.jpg', 'jpg', '', '2017-12-16 07:41:49'),
(155, 'yel171220112914', './gallery/5a3a4b53578755.15678329.jpg', 'jpg', '', '2017-12-20 11:36:51'),
(156, 'yel171220112914', './gallery/5a3a4b664ffde8.52292393.jpg', 'jpg', '', '2017-12-20 11:37:10'),
(157, 'yel171220112914', './gallery/5a3a4b7245c369.58215116.jpg', 'jpg', '', '2017-12-20 11:37:22'),
(158, 'yel171220112914', './gallery/5a3a4b80320ef0.93081025.jpg', 'jpg', '', '2017-12-20 11:37:36'),
(159, 'mon171215083939', './gallery/5a3a4c27ee1484.69255049.jpg', 'jpg', '', '2017-12-20 11:40:26'),
(160, 'mon171215083939', './gallery/5a3a4c35995af2.44739023.jpg', 'jpg', '', '2017-12-20 11:40:37'),
(161, 'mon171215083939', './gallery/5a3a4c51b89822.23320803.jpg', 'jpg', '', '2017-12-20 11:41:05'),
(162, 'ind171215084059', './gallery/5a3a4e7b437fe7.01475823.jpg', 'jpg', '', '2017-12-20 11:50:19'),
(163, 'ind171215084059', './gallery/5a3a4e8c3a1873.80261972.jpg', 'jpg', '', '2017-12-20 11:50:36'),
(166, 'fou171221044547', './gallery/5a3b3d702e6491.16178285.jpg', 'jpg', '', '2017-12-21 04:49:52'),
(167, 'fou171221044547', './gallery/5a3b3fd171a211.20871219.jpg', 'jpg', '', '2017-12-21 05:00:01'),
(168, 'fou171221044547', './gallery/5a3b483a1bc014.87157030.png', 'png', '', '2017-12-21 05:36:00'),
(169, 'fou171221044547', './gallery/5a3b4b4d2f9bf9.85973525.jpg', 'jpg', '', '2017-12-21 05:49:01'),
(170, 'sch180117065613', './gallery/5a5ef3c5353058.21284303.jpg', 'jpg', '', '2018-01-17 06:57:12'),
(178, 'fac180131083229', './gallery/5a717f52494a19.06760297.png', 'png', '', '2018-01-31 08:33:23'),
(179, 'fac180131083229', './gallery/5a717f75392ce8.51099124.jpg', 'jpg', '', '2018-01-31 08:33:57'),
(180, 'fac180131083229', './gallery/5a717fed52b110.70189608.jpg', 'jpg', '', '2018-01-31 08:35:57'),
(181, 'cal180227054905', './gallery/5a94f18c217c73.13007383.jpg', 'jpg', '', '2018-02-27 05:50:04'),
(182, 'cal180227054905', './gallery/5a94f20a8fe092.35550620.jpg', 'jpg', '', '2018-02-27 05:52:10'),
(183, 'cal180227054905', './gallery/5a94f21887eca1.88076464.jpg', 'jpg', '', '2018-02-27 05:52:24'),
(184, 'cal180227054905', './gallery/5a94f24ba806e5.32269170.jpg', 'jpg', '', '2018-02-27 05:53:15'),
(185, 'wor180227062523', './gallery/5a94fc50019122.96799445.jpg', 'jpg', '', '2018-02-27 06:36:00'),
(187, 'wor180227062523', './gallery/5a94fc6fa16704.43200890.jpg', 'jpg', '', '2018-02-27 06:36:31'),
(188, 'wor180227062523', './gallery/5a94fc80499335.69485403.jpg', 'jpg', '', '2018-02-27 06:36:48'),
(189, 'wor180227062523', './gallery/5a94fc96a8f101.74893813.jpg', 'jpg', '', '2018-02-27 06:37:10'),
(190, 'app171222053438', './gallery/5a94fd7c7781e7.02584082.jpg', 'jpg', '', '2018-02-27 06:41:00'),
(192, 'app171222053438', './gallery/5a94fe150dc458.88075267.jpg', 'jpg', '', '2018-02-27 06:43:33'),
(193, 'app171222053438', './gallery/5a94fe2124cd49.63754072.jpg', 'jpg', '', '2018-02-27 06:43:45'),
(194, 'pin180412071236', './gallery/5acf072d2032d6.24591965.jpg', 'jpg', '', '2018-04-12 07:13:49'),
(195, 'pin180412071236', './gallery/5acf0740950640.78668468.jpg', 'jpg', '', '2018-04-12 07:14:08'),
(196, 'ora180413091752', './gallery/5ad6efd7bb4804.75581001.jpg', 'jpg', '', '2018-04-18 07:12:23'),
(197, 'ora180413091752', './gallery/5ad6f06e65a988.22921304.jpg', 'jpg', '', '2018-04-18 07:14:54'),
(198, 'ora180413091752', './gallery/5ad6f0ad640e30.64851038.jpg', 'jpg', '', '2018-04-18 07:15:57'),
(202, 'fac180131083229', './gallery/5b34ab04411c00.80190346.jpg', 'jpg', '', '2018-06-28 09:31:48'),
(203, 'fac180131083229', './gallery/5b34ab0d636216.54922458.jpg', 'jpg', '', '2018-06-28 09:31:57'),
(204, 'fac180131083229', './gallery/5b34ab12b35956.82539138.jpg', 'jpg', '', '2018-06-28 09:32:02'),
(205, 'app171222053438', './gallery/5b3606f9b066b9.01700967.jpg', 'jpg', '', '2018-06-29 10:16:25'),
(206, 'app171222053438', './gallery/5b36070443bb56.86616839.jpg', 'jpg', '', '2018-06-29 10:16:36'),
(207, 'app171222053438', './gallery/5b36070e1cf141.22156376.jpg', 'jpg', '', '2018-06-29 10:16:46'),
(208, 'app171222053438', './gallery/5b36071828a4f2.40348460.jpg', 'jpg', '', '2018-06-29 10:16:56'),
(209, 'app171222053438', './gallery/5b36071e25a2e1.68787596.jpg', 'jpg', '', '2018-06-29 10:17:02'),
(210, 'app171222053438', './gallery/5b36072959cde5.96561178.jpg', 'jpg', '', '2018-06-29 10:17:13'),
(211, 'app171222053438', './gallery/5b360734091178.06322805.jpg', 'jpg', '', '2018-06-29 10:17:24'),
(212, 'app171222053438', './gallery/5b36074006c039.16006214.jpg', 'jpg', '', '2018-06-29 10:17:36'),
(213, 'app171222053438', './gallery/5b360748a3b231.41603185.jpg', 'jpg', '', '2018-06-29 10:17:44'),
(214, 'app171222053438', './gallery/5b360754b41a59.59878884.jpg', 'jpg', '', '2018-06-29 10:17:56'),
(215, 'app171222053438', './gallery/5b36075f28fea5.20145187.jpg', 'jpg', '', '2018-06-29 10:18:07'),
(216, 'app171222053438', './gallery/5b36076f219368.71573508.jpg', 'jpg', '', '2018-06-29 10:18:23'),
(217, 'app171222053438', './gallery/5b36077b337629.98045585.jpg', 'jpg', '', '2018-06-29 10:18:35'),
(218, 'app171222053438', './gallery/5b360789108a87.86066572.jpg', 'jpg', '', '2018-06-29 10:18:49'),
(219, 'yel190213052932', './gallery/5c63c7a0252c82.53876230.jpg', 'jpg', '', '2019-02-13 07:30:40'),
(221, 'yel190213073638', './gallery/5c63e23851a8b0.51087338.jpg', 'jpg', '', '2019-02-13 09:24:08'),
(222, 'yel190213073638', './gallery/5c63e277caa1e7.31548152.jpg', 'jpg', '', '2019-02-13 09:25:11'),
(223, 'yel190213073638', './gallery/5c63e29625d620.72430380.jpg', 'jpg', '', '2019-02-13 09:25:42'),
(224, 'yel190213052932', './gallery/5c63e32d6e7540.65941425.jpg', 'jpg', '', '2019-02-13 09:28:13'),
(225, 'yel190213052932', './gallery/5c63e345c77874.65631006.jpg', 'jpg', '', '2019-02-13 09:28:37'),
(226, 'yel190213052932', './gallery/5c63e4630d9ee4.48186663.jpg', 'jpg', '', '2019-02-13 09:33:23'),
(227, 'yel190213052932', './gallery/5c63e487ae8ef9.51332981.jpg', 'jpg', '', '2019-02-13 09:33:59'),
(228, 'yel190213052932', './gallery/5c63e4f369ac18.88995225.jpg', 'jpg', '', '2019-02-13 09:35:47'),
(229, 'yel190213052932', './gallery/5c63e50b1dc4e8.57838275.jpg', 'jpg', '', '2019-02-13 09:36:11'),
(230, 'yel190213052932', './gallery/5c63e51480b798.85115262.jpg', 'jpg', '', '2019-02-13 09:36:20'),
(231, 'yel190213052932', './gallery/5c63e52a98e2d5.02278221.jpg', 'jpg', '', '2019-02-13 09:36:42'),
(232, 'yel190213052932', './gallery/5c63e532c18c33.21597406.jpg', 'jpg', '', '2019-02-13 09:36:50'),
(233, 'yel190213052932', './gallery/5c63e53cc9c148.39346737.jpg', 'jpg', '', '2019-02-13 09:37:01'),
(234, 'yel190213052932', './gallery/5c63e547b284c4.03507777.jpg', 'jpg', '', '2019-02-13 09:37:11'),
(235, 'yel190213052932', './gallery/5c63e5504f9bd7.99895295.jpg', 'jpg', '', '2019-02-13 09:37:20'),
(236, 'yel190213052932', './gallery/5c63e55d1007f2.02435487.jpg', 'jpg', '', '2019-02-13 09:37:33'),
(237, 'yel190213052932', './gallery/5c63e5a873f870.23559272.jpg', 'jpg', '', '2019-02-13 09:38:48'),
(238, 'yel190213052932', './gallery/5c63e64ba168f1.44461415.jpg', 'jpg', '', '2019-02-13 09:41:31'),
(239, 'yel190213052932', './gallery/5c63e6cc1b93f4.22512706.jpg', 'jpg', '', '2019-02-13 09:43:40'),
(240, 'red190209074544', './gallery/5c6a8659a25b63.19172093.jpg', 'jpg', '', '2019-02-18 10:18:01'),
(241, 'red190209074544', './gallery/5c6a8899f12a84.83290555.jpg', 'jpg', '', '2019-02-18 10:27:37'),
(242, 'red190209074544', './gallery/5c6ba7aa4ce6e5.65166421.jpg', 'jpg', '', '2019-02-19 06:52:26'),
(243, 'red190209074544', './gallery/5c6ba92d778544.41721397.jpg', 'jpg', '', '2019-02-19 06:58:53'),
(244, 'fru190219070111', './gallery/5c6baa69778194.57022042.jpg', 'jpg', '', '2019-02-19 07:04:09'),
(245, 'fru190219070111', './gallery/5c6bab21231925.03954905.jpg', 'jpg', '', '2019-02-19 07:07:13'),
(246, 'fru190219070111', './gallery/5c6bac5958a2d7.57344719.jpg', 'jpg', '', '2019-02-19 07:12:25'),
(247, 'fru190219070111', './gallery/5c6bac6d1c9d43.10458552.jpg', 'jpg', '', '2019-02-19 07:12:45'),
(248, 'fru190219070111', './gallery/5c6bac7be14ab2.94163398.jpg', 'jpg', '', '2019-02-19 07:12:59'),
(249, 'fru190219070111', './gallery/5c6bad4f940b75.95701396.jpg', 'jpg', '', '2019-02-19 07:16:31'),
(250, 'ind190219073820', './gallery/5c6bb282dcfd22.28179289.jpg', 'jpg', '', '2019-02-19 07:38:42'),
(251, 'ind190219073820', './gallery/5c6bb288c5a1d2.52469938.jpg', 'jpg', '', '2019-02-19 07:38:48'),
(252, 'ind190219073820', './gallery/5c6bb28c89d1f7.10649528.jpg', 'jpg', '', '2019-02-19 07:38:52'),
(253, 'ind190219073820', './gallery/5c6bb290604418.72228708.jpg', 'jpg', '', '2019-02-19 07:38:56'),
(254, 'chr190220073025', './gallery/5c6d02804a9102.77125570.jpg', 'jpg', '', '2019-02-20 07:32:16'),
(255, 'chr190220073025', './gallery/5c6d02b2d03211.91157329.jpg', 'jpg', '', '2019-02-20 07:33:06'),
(256, 'chr190220073025', './gallery/5c6d02e4643500.75093278.jpg', 'jpg', '', '2019-02-20 07:33:56'),
(257, 'chr190220073025', './gallery/5c6d030f719220.24671362.jpg', 'jpg', '', '2019-02-20 07:34:39'),
(258, 'chr190220073025', './gallery/5c6d0338b53ef2.83473659.jpg', 'jpg', '', '2019-02-20 07:35:20'),
(262, 'gre191008050517', './gallery/5d9c1951d85598.49111468.jpg', 'jpg', '', '2019-10-08 05:06:25'),
(263, 'gre191008050517', './gallery/5d9c1951e95af1.64994123.jpg', 'jpg', '', '2019-10-08 05:06:25'),
(264, 'gre191008050517', './gallery/5d9c19520fa807.14568900.jpg', 'jpg', '', '2019-10-08 05:06:26'),
(265, 'gre191008050517', './gallery/5daabd7dcf37d4.38255687.jpg', 'jpg', '', '2019-10-19 07:38:37'),
(267, 'gre191008050517', './gallery/5daabd7e07ea88.36323276.jpg', 'jpg', '', '2019-10-19 07:38:38'),
(269, 'gre191008050517', './gallery/5daabd7e46b4a0.13038287.jpg', 'jpg', '', '2019-10-19 07:38:38'),
(270, 'gre191008050517', './gallery/5daabd7e4ec296.47836278.jpg', 'jpg', '', '2019-10-19 07:38:38'),
(271, 'gre191008050517', './gallery/5daabd7e584de5.49100040.jpg', 'jpg', '', '2019-10-19 07:38:38'),
(273, 'gre191008050517', './gallery/5daabd7e78ad06.96465518.jpg', 'jpg', '', '2019-10-19 07:38:38'),
(276, 'ind191019075455', './gallery/5daac2d223e614.65582865.jpg', 'jpg', '', '2019-10-19 08:01:22'),
(277, 'ind191019075455', './gallery/5daac2d236a161.02387792.jpg', 'jpg', '', '2019-10-19 08:01:22'),
(278, 'ind191019075455', './gallery/5daac2d250e815.13986339.jpg', 'jpg', '', '2019-10-19 08:01:22'),
(279, 'ind191019075455', './gallery/5daac2d2668e20.82843492.jpg', 'jpg', '', '2019-10-19 08:01:22'),
(280, 'ind191019075455', './gallery/5daac2d26eb132.38986752.jpg', 'jpg', '', '2019-10-19 08:01:22'),
(281, 'ind191019075455', './gallery/5daac2d276d007.35635136.jpg', 'jpg', '', '2019-10-19 08:01:22'),
(282, 'ind191019075455', './gallery/5daac2d27ee7f4.54677980.jpg', 'jpg', '', '2019-10-19 08:01:22'),
(283, 'ind191019075455', './gallery/5daac2d28b01c1.94755243.jpg', 'jpg', '', '2019-10-19 08:01:22'),
(284, 'ind191019075455', './gallery/5daac2d29bba17.11149363.jpg', 'jpg', '', '2019-10-19 08:01:22'),
(285, 'ind191019075455', './gallery/5daac2d2bc2638.57854793.jpg', 'jpg', '', '2019-10-19 08:01:22'),
(286, 'ind191019075455', './gallery/5daac2d2d56945.52630219.jpg', 'jpg', '', '2019-10-19 08:01:22'),
(287, 'blu191112061040', './gallery/5dca73d2b86ff3.02732797.jpg', 'jpg', '', '2019-11-12 08:56:50'),
(288, 'blu191112061040', './gallery/5dca73d2d679e6.15224367.jpg', 'jpg', '', '2019-11-12 08:56:50'),
(289, 'blu191112061040', './gallery/5dca73d2e49ee2.26464993.jpg', 'jpg', '', '2019-11-12 08:56:50'),
(290, 'blu191112061040', './gallery/5dca73d3030e93.55243846.jpg', 'jpg', '', '2019-11-12 08:56:51'),
(291, 'blu191112061040', './gallery/5dca73d319c8c7.47794762.jpg', 'jpg', '', '2019-11-12 08:56:51'),
(293, 'blu191112061040', './gallery/5dca73d56f58d4.88982317.jpg', 'jpg', '', '2019-11-12 08:56:53'),
(294, 'blu191112061040', './gallery/5dca73d588d4f9.35666551.jpg', 'jpg', '', '2019-11-12 08:56:53'),
(295, 'blu191112061040', './gallery/5dca73d59d1bf5.97316580.jpg', 'jpg', '', '2019-11-12 08:56:53'),
(296, 'blu191112061040', './gallery/5dca73d5adf104.57265362.jpg', 'jpg', '', '2019-11-12 08:56:53'),
(297, 'blu191112061040', './gallery/5dca73d5c84619.03177245.jpg', 'jpg', '', '2019-11-12 08:56:53'),
(298, 'red200121060844', './gallery/5e269593dd9cc0.40055162.jpg', 'jpg', '', '2020-01-21 06:09:23'),
(299, 'red200121060844', './gallery/5e269613f22185.39247082.jpg', 'jpg', '', '2020-01-21 06:11:32'),
(303, 'fru200121061611', './gallery/5e2699a8c47d97.51231658.jpg', 'jpg', '', '2020-01-21 06:26:48'),
(304, 'fru200121061611', './gallery/5e27e3b9d59ae1.35916646.jpg', 'jpg', '', '2020-01-22 05:55:05'),
(305, 'fru200121061611', './gallery/5e27e3d29ff3c9.89498916.jpg', 'jpg', '', '2020-01-22 05:55:30'),
(309, 'fru200121061611', './gallery/5e27e444b02339.18476698.jpg', 'jpg', '', '2020-01-22 05:57:24'),
(311, 'fru200121061611', './gallery/5e27e61b187af6.53847402.jpg', 'jpg', '', '2020-01-22 06:05:15'),
(312, 'fru200121061611', './gallery/5e27e61b295d35.45546763.jpg', 'jpg', '', '2020-01-22 06:05:15'),
(315, 'fru200121061611', './gallery/5e27e61b6578c0.41674847.jpg', 'jpg', '', '2020-01-22 06:05:15'),
(319, 'fru200121061611', './gallery/5e27e61b886200.21270313.jpg', 'jpg', '', '2020-01-22 06:05:15'),
(321, 'fru200121061611', './gallery/5e27e61b98b2a0.51272435.jpg', 'jpg', '', '2020-01-22 06:05:15'),
(322, 'fru200121061611', './gallery/5e27e61bc72b02.86591782.jpg', 'jpg', '', '2020-01-22 06:05:15'),
(323, 'fru200121061611', './gallery/5e27e61be1f166.98869912.jpg', 'jpg', '', '2020-01-22 06:05:15'),
(324, 'red200121060844', './gallery/5e27e6a6747bc1.83338743.jpg', 'jpg', '', '2020-01-22 06:07:34'),
(325, 'red200121060844', './gallery/5e27e6a69058f8.57231753.jpg', 'jpg', '', '2020-01-22 06:07:34'),
(326, 'red200121060844', './gallery/5e27e736137ee9.61607519.jpg', 'jpg', '', '2020-01-22 06:09:58'),
(327, 'red200121060844', './gallery/5e27e7362760e9.27011613.jpg', 'jpg', '', '2020-01-22 06:09:58'),
(328, 'fru171208060701', './gallery/5ef064cf1fa039.80613240.jpg', 'jpg', '', '2020-06-22 07:59:11'),
(329, 'met171202122308', './gallery/5ef06b688b17a4.00488114.jpg', 'jpg', '', '2020-06-22 08:27:20'),
(332, 'fru171208060701', './gallery/5ef071c0207a79.82555732.jpg', 'jpg', '', '2020-06-22 08:54:24'),
(333, 'fru190219070111', './gallery/5ef0722f81bd12.66085145.jpg', 'jpg', '', '2020-06-22 08:56:15'),
(334, 'fru190219070111', './gallery/5ef0729150ea33.79819880.jpg', 'jpg', '', '2020-06-22 08:57:53'),
(335, 'fru200121061611', './gallery/5ef072f40737e4.80138514.jpg', 'jpg', '', '2020-06-22 08:59:32'),
(336, 'fru200121061611', './gallery/5ef0771dc84cc8.87875826.jpg', 'jpg', '', '2020-06-22 09:17:17'),
(340, 'fru200121061611', './gallery/5ef08222c847c7.09679120.jpg', 'jpg', '', '2020-06-22 10:04:18'),
(341, 'yel200622100627', './gallery/5ef083a9096bc2.81510509.jpg', 'jpg', '', '2020-06-22 10:10:49'),
(354, 'pri200622105248', './gallery/5ef08efa0ac9b8.57719909.jpg', 'jpg', '', '2020-06-22 10:59:06'),
(355, 'pri200622105248', './gallery/5ef08efa1cd353.35456153.jpg', 'jpg', '', '2020-06-22 10:59:06'),
(356, 'pri200622105248', './gallery/5ef08f01a7a3d2.97226973.jpg', 'jpg', '', '2020-06-22 10:59:13'),
(357, 'pri200622105248', './gallery/5ef08f01b24c21.77244087.jpg', 'jpg', '', '2020-06-22 10:59:13'),
(358, 'pri200622105248', './gallery/5ef08f01b6cfe4.39066267.jpg', 'jpg', '', '2020-06-22 10:59:13'),
(359, 'pri200622105913', './gallery/5ef090b21dc293.25230518.jpg', 'jpg', '', '2020-06-22 11:06:26'),
(360, 'pri200622105913', './gallery/5ef090b2367892.93403332.jpg', 'jpg', '', '2020-06-22 11:06:26'),
(361, 'pri200622105913', './gallery/5ef090b250c235.05492709.jpg', 'jpg', '', '2020-06-22 11:06:26'),
(362, 'pri200622105913', './gallery/5ef090b275b4d5.30614491.jpg', 'jpg', '', '2020-06-22 11:06:26'),
(363, 'pri200622105913', './gallery/5ef090b289ef69.64156444.jpg', 'jpg', '', '2020-06-22 11:06:26'),
(364, 'pri200622105913', './gallery/5ef090b29a21a4.49341173.jpg', 'jpg', '', '2020-06-22 11:06:26'),
(365, 'pri200622105913', './gallery/5ef090b2b7e3d4.76205625.jpg', 'jpg', '', '2020-06-22 11:06:26'),
(366, 'pri200622105913', './gallery/5ef090b2d70b83.92897972.jpg', 'jpg', '', '2020-06-22 11:06:26'),
(367, 'pri200622105913', './gallery/5ef090b2f08797.07930902.jpg', 'jpg', '', '2020-06-22 11:06:26'),
(368, 'fie200622111952', './gallery/5ef094d7c65a21.48858456.jpg', 'jpg', '', '2020-06-22 11:24:07');

-- --------------------------------------------------------

--
-- Table structure for table `image_filter`
--

CREATE TABLE `image_filter` (
  `index` int(11) NOT NULL,
  `default_filter` tinyint(4) NOT NULL,
  `filter_id` varchar(255) NOT NULL,
  `filter_name` text NOT NULL,
  `filter_hidden` tinyint(4) NOT NULL DEFAULT 0,
  `num_of_albums` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image_filter`
--

INSERT INTO `image_filter` (`index`, `default_filter`, `filter_id`, `filter_name`, `filter_hidden`, `num_of_albums`) VALUES
(1, 1, 'f_unc171201092510', 'Uncategorized', 1, 0),
(26, 0, 'f_sch171202122129', 'School day', 0, 0),
(29, 0, 'f_doc171206091143', 'Doctors Day', 0, 0),
(30, 0, 'f_gre171206100546', 'Green Day', 0, 0),
(31, 0, 'f_blu171208050329', 'Blue Day', 0, 0),
(32, 0, 'f_red171208050445', 'Red Day', 0, 0),
(34, 0, 'f_ann171208050539', 'Annual Day', 0, 0),
(35, 0, 'f_sch171215063047', 'School Inaguration', 0, 0),
(36, 0, 'f_col171216044436', 'Colouring Day', 0, 0),
(38, 0, 'f_mon171217022910', 'Monthly Competitions', 0, 0),
(39, 0, 'f_ind171217023030', 'Independence Day', 0, 0),
(42, 0, 'f_abo171217025706', 'About us', 0, 0),
(43, 0, 'f_yel171220112741', 'Yellow Day', 0, 0),
(45, 0, 'f_app171222053419', 'Appreciation day', 0, 0),
(46, 0, 'f_sch180117065602', 'School van', 0, 0),
(48, 0, 'f_fac180131083215', 'Faculty Development Program', 0, 0),
(50, 0, 'f_wri180227054352', 'Writing Excellence Training for Teachers', 0, 0),
(53, 0, 'f_wor180227062426', 'Workshop', 0, 0),
(54, 0, 'f_pin180412071130', 'Pink Day', 0, 0),
(55, 0, 'f_ora180413091553', 'Orange Day', 0, 0),
(56, 0, 'f_yel190213052839', 'Yellow Day 2018-19', 0, 0),
(57, 0, 'f_fru190219070034', 'Fruits and Vegetables Day 2018-19', 0, 0),
(58, 0, 'f_ind190219073746', 'Independence Day 2018-19', 0, 0),
(59, 0, 'f_ext190219085028', 'Extracurricular Activities 2018-19', 0, 0),
(60, 0, 'f_chr190220072539', 'Christmas Celebration 2018-19', 0, 0),
(63, 0, 'f_gre191008050500', 'Green Day  2019-2020', 0, 0),
(64, 0, 'f_ind191019075559', 'INDEPENDENCE DAY 2019-20', 0, 0),
(65, 0, 'f_blu191112061029', 'BLUE DAY 2019-2020', 0, 0),
(67, 0, 'f_red200121060813', 'RED DAY 2019-20', 0, 0),
(68, 0, 'f_fru200121061544', 'FRUITS &amp; VEGETABLES DAY 2019-20', 0, 0),
(69, 0, 'f_tes201224102239', 'test', 0, 0),
(70, 0, 'f_tes201224105511', 'test', 0, 0),
(71, 0, 'f_tes201224105600', 'test', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `limitop`
--

CREATE TABLE `limitop` (
  `id` int(5) NOT NULL,
  `lim` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `limitop`
--

INSERT INTO `limitop` (`id`, `lim`) VALUES
(1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `video_collection`
--

CREATE TABLE `video_collection` (
  `index` int(11) NOT NULL,
  `video_id` text NOT NULL,
  `year` varchar(10) NOT NULL,
  `video_description` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `video_collection`
--

INSERT INTO `video_collection` (`index`, `video_id`, `year`, `video_description`, `date_added`) VALUES
(5, 'wKXJai70WfQ', '2017', 'Blue Day 2017', '2020-12-23 12:53:22'),
(6, 'VLPm8ctW85c', '2017', 'Annual day program on October 2017', '2020-12-23 12:53:26'),
(7, 'fpWvrf2MJOk', '2017', 'Harvard International School Annual Day program  - October 2017', '2020-12-23 12:53:39'),
(8, 'lXsC4g0PAxM', '2017', 'I.S. Inbadurai.,M.A.,B.L.,M.L.A.,   Rhadhapuram constituency', '2020-12-23 12:54:24'),
(9, 'QDPD8P-3d1w', '2017', 'Annual day Report - October 2017', '2020-12-23 12:53:52'),
(10, 'mQS8zDtZPQ4', '2018', 'Christmas program - 2018  by  L.K.G  students.', '2020-12-23 12:53:58'),
(11, 'OEVcH-1_Pr4', '2018', 'Orange Day Celebration', '2020-12-23 12:54:02'),
(12, 'GRxD30x9FGw', '2018', 'Orange day celebration for Pre.KG', '2020-12-23 12:54:07'),
(13, 'z97nmPLCBi8', '2018', 'Orange day celebration for LKG', '2020-12-23 12:54:11'),
(19, 'PYIGWFQ9Lfs', '2019', 'Yellow Day Celebration 2018-19', '2020-12-23 12:54:15');

-- --------------------------------------------------------

--
-- Table structure for table `years_cat`
--

CREATE TABLE `years_cat` (
  `id` int(5) NOT NULL,
  `years` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `years_cat`
--

INSERT INTO `years_cat` (`id`, `years`) VALUES
(1, '2017'),
(2, '2018'),
(3, '2019'),
(4, '2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `control_panel_pass`
--
ALTER TABLE `control_panel_pass`
  ADD PRIMARY KEY (`index`);

--
-- Indexes for table `image_catg`
--
ALTER TABLE `image_catg`
  ADD PRIMARY KEY (`index`),
  ADD UNIQUE KEY `catg_id` (`catg_id`);

--
-- Indexes for table `image_collection`
--
ALTER TABLE `image_collection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_filter`
--
ALTER TABLE `image_filter`
  ADD PRIMARY KEY (`index`);

--
-- Indexes for table `limitop`
--
ALTER TABLE `limitop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_collection`
--
ALTER TABLE `video_collection`
  ADD PRIMARY KEY (`index`);

--
-- Indexes for table `years_cat`
--
ALTER TABLE `years_cat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image_catg`
--
ALTER TABLE `image_catg`
  MODIFY `index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `image_collection`
--
ALTER TABLE `image_collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=374;

--
-- AUTO_INCREMENT for table `image_filter`
--
ALTER TABLE `image_filter`
  MODIFY `index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `limitop`
--
ALTER TABLE `limitop`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `video_collection`
--
ALTER TABLE `video_collection`
  MODIFY `index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `years_cat`
--
ALTER TABLE `years_cat`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
