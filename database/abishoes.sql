-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2018 at 10:41 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abishoes`
--

-- --------------------------------------------------------

--
-- Table structure for table `donvi_ship`
--

CREATE TABLE `donvi_ship` (
  `id` int(11) NOT NULL,
  `ten_dv` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donvi_ship`
--

INSERT INTO `donvi_ship` (`id`, `ten_dv`) VALUES
(1, 'GHTK'),
(2, 'GHN');

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `id` int(11) NOT NULL,
  `ten_kh` text COLLATE utf8_unicode_ci NOT NULL,
  `so_dt` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` text COLLATE utf8_unicode_ci NOT NULL,
  `kenh_bh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dv_ship` int(255) DEFAULT NULL,
  `id_loaiship` int(11) DEFAULT NULL,
  `ma_vd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trang_thai` int(11) DEFAULT NULL,
  `phi_ship` double DEFAULT NULL,
  `ghi_chu` text COLLATE utf8_unicode_ci,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoa_don`
--

INSERT INTO `hoa_don` (`id`, `ten_kh`, `so_dt`, `dia_chi`, `kenh_bh`, `dv_ship`, `id_loaiship`, `ma_vd`, `trang_thai`, `phi_ship`, `ghi_chu`, `updated_at`, `created_at`) VALUES
(38, 'Tô Bình Nguyên', '01659444980', '200 Quang Trung, 200 Quang Trung, 200 Quang Trung, 200 Quang Trung', NULL, 2, NULL, '0014545', 3, 100000, NULL, '2018-11-24 09:19:26', '2018-11-24 09:08:39'),
(39, 'hjhj', '22421', '545445', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2018-11-24 09:33:39', '2018-11-24 09:33:39'),
(40, 'Tô Bình Nguyên', '01659494944', '200 Quang Trung, 200 Quang Trung, 200 Quang Trung, 200 Quang Trung', NULL, 1, NULL, '54545', 3, 10000, NULL, '2018-11-24 09:37:33', '2018-11-24 09:37:16');

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don_muti`
--

CREATE TABLE `hoa_don_muti` (
  `id` int(255) NOT NULL,
  `id_hd` int(255) NOT NULL,
  `id_sp` int(255) NOT NULL,
  `gia_ban` double NOT NULL,
  `gia_nhap` double NOT NULL,
  `size` int(11) NOT NULL,
  `color` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoa_don_muti`
--

INSERT INTO `hoa_don_muti` (`id`, `id_hd`, `id_sp`, `gia_ban`, `gia_nhap`, `size`, `color`, `so_luong`, `updated_at`, `created_at`) VALUES
(22, 38, 3, 300000, 215000, 1, 1, 2, '2018-11-24 09:08:39', '2018-11-24 09:08:39'),
(23, 38, 4, 300000, 215000, 4, 1, 4, '2018-11-24 09:08:39', '2018-11-24 09:08:39'),
(24, 38, 5, 300000, 215000, 7, 2, 5, '2018-11-24 09:08:39', '2018-11-24 09:08:39'),
(25, 38, 6, 300000, 215000, 8, 1, 1, '2018-11-24 09:08:39', '2018-11-24 09:08:39'),
(26, 38, 5, 300000, 215000, 9, 1, 1, '2018-11-24 09:08:39', '2018-11-24 09:08:39'),
(27, 39, 3, 300000, 215000, 1, 1, 1, '2018-11-24 09:33:39', '2018-11-24 09:33:39'),
(28, 39, 5, 300000, 215000, 9, 1, 1, '2018-11-24 09:33:39', '2018-11-24 09:33:39'),
(29, 39, 3, 300000, 215000, 1, 2, 3, '2018-11-24 09:33:39', '2018-11-24 09:33:39'),
(30, 39, 4, 300000, 215000, 1, 1, 1, '2018-11-24 09:33:39', '2018-11-24 09:33:39'),
(31, 40, 3, 300000, 215000, 1, 1, 1, '2018-11-24 09:37:16', '2018-11-24 09:37:16'),
(32, 40, 5, 300000, 215000, 4, 1, 5, '2018-11-24 09:37:16', '2018-11-24 09:37:16'),
(33, 40, 6, 300000, 215000, 3, 1, 3, '2018-11-24 09:37:16', '2018-11-24 09:37:16'),
(34, 40, 4, 300000, 215000, 7, 1, 3, '2018-11-24 09:37:16', '2018-11-24 09:37:16');

-- --------------------------------------------------------

--
-- Table structure for table `loai_ship`
--

CREATE TABLE `loai_ship` (
  `id` int(11) NOT NULL,
  `ten_loaiship` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loai_ship`
--

INSERT INTO `loai_ship` (`id`, `ten_loaiship`) VALUES
(1, 'COD'),
(2, 'Nội Thành');

-- --------------------------------------------------------

--
-- Table structure for table `mau_sac`
--

CREATE TABLE `mau_sac` (
  `id` int(11) NOT NULL,
  `mau_sac` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mau_sac`
--

INSERT INTO `mau_sac` (`id`, `mau_sac`) VALUES
(1, 'Trắng'),
(2, 'Đen');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nguon_don`
--

CREATE TABLE `nguon_don` (
  `id` int(11) NOT NULL,
  `ten_nguon` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguon_don`
--

INSERT INTO `nguon_don` (`id`, `ten_nguon`) VALUES
(1, 'Facebook'),
(2, 'Web');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('vananh@gmail.com', '$2y$10$ad2Q9a/Zf/lpukI20UwY4.D6jMWPDASNIbTO3bpfkqfpUhdJovEXK', '2018-11-22 20:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `ten_sp` text COLLATE utf8_unicode_ci NOT NULL,
  `ma_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gia_nhap` double NOT NULL,
  `gia_ban` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten_sp`, `ma_sp`, `gia_nhap`, `gia_ban`, `created_at`, `updated_at`) VALUES
(3, 'Bộ viền Gucci trắng không cổ cao cấp', 'BTT001', 215000, 300000, '2018-11-23 09:41:05', '2018-11-23 09:41:05'),
(4, 'Bộ không cổ MC Queen khóa họa tiết cao cấp', 'BTT002', 215000, 300000, '2018-11-23 09:47:43', '2018-11-23 09:47:43'),
(5, 'Bộ Thể thao GUCCI', 'BTT003', 215000, 300000, '2018-11-23 09:47:57', '2018-11-23 09:47:57'),
(6, 'Bộ không cổ khóa vai cao cấp', 'BTT005', 215000, 300000, '2018-11-23 10:15:40', '2018-11-23 10:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `size` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `type`, `size`) VALUES
(1, 1, 'M'),
(2, 1, 'X'),
(3, 1, 'XL'),
(4, 1, 'S'),
(5, 2, '36'),
(6, 2, '37'),
(7, 2, '38'),
(8, 2, '39'),
(9, 2, '40'),
(10, 2, '41');

-- --------------------------------------------------------

--
-- Table structure for table `ton_kho`
--

CREATE TABLE `ton_kho` (
  `id` int(11) NOT NULL,
  `id_sanpham` int(255) NOT NULL,
  `so_luong` int(255) NOT NULL,
  `size` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ton_kho`
--

INSERT INTO `ton_kho` (`id`, `id_sanpham`, `so_luong`, `size`, `created_at`, `updated_at`) VALUES
(1, 1, 50, 1, '2018-11-23 09:06:34', '0000-00-00 00:00:00'),
(2, 1, 20, 2, '2018-11-23 09:06:52', '0000-00-00 00:00:00'),
(3, 2, 10, 1, '2018-11-23 09:21:35', '0000-00-00 00:00:00'),
(4, 3, 10, 1, '2018-11-23 09:45:07', '2018-11-23 09:45:07'),
(5, 3, 2, 2, '2018-11-23 09:45:33', '2018-11-23 09:45:33'),
(6, 4, 5, 1, '2018-11-23 09:48:11', '2018-11-23 09:48:11'),
(7, 5, 4, 1, '2018-11-23 09:48:20', '2018-11-23 09:48:20'),
(8, 6, 5, 1, '2018-11-23 10:17:39', '2018-11-23 10:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai`
--

CREATE TABLE `trang_thai` (
  `id` int(11) NOT NULL,
  `ten_trangthai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trang_thai`
--

INSERT INTO `trang_thai` (`id`, `ten_trangthai`) VALUES
(1, 'Đang chờ'),
(2, 'Xác nhận'),
(3, 'Đang giao'),
(4, 'Thành Công');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tô Nguyên', 'binhnguyen19988', NULL, '$2y$10$OqpE60.ahG4fpt8O2f9Y4uor2dLlr3pQ5T1.B1Shjj5fj5xpnSpne', 'HUv7IQxBsyezf5o5hRWHnAYa8ORnNBn7zxQQWy2Ha6sluSNDBDf1qCEdugva', '2018-11-22 20:21:19', '2018-11-22 20:21:19'),
(2, 'Vân Anh', 'vananh@gmail.com', NULL, '$2y$10$KR06mV.CWarzcqme77y4Quco9qnnO5uThHuo5wX7qnNSzMza1jZhe', '796JZWcOAH4qepU3ldaF4rzJtelYdFKDOzTbgPmsGT5PLMPgvBddjEnspXya', '2018-11-22 20:22:24', '2018-11-22 20:22:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donvi_ship`
--
ALTER TABLE `donvi_ship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoa_don_muti`
--
ALTER TABLE `hoa_don_muti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loai_ship`
--
ALTER TABLE `loai_ship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mau_sac`
--
ALTER TABLE `mau_sac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nguon_don`
--
ALTER TABLE `nguon_don`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ton_kho`
--
ALTER TABLE `ton_kho`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trang_thai`
--
ALTER TABLE `trang_thai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donvi_ship`
--
ALTER TABLE `donvi_ship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `hoa_don_muti`
--
ALTER TABLE `hoa_don_muti`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `loai_ship`
--
ALTER TABLE `loai_ship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mau_sac`
--
ALTER TABLE `mau_sac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nguon_don`
--
ALTER TABLE `nguon_don`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ton_kho`
--
ALTER TABLE `ton_kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trang_thai`
--
ALTER TABLE `trang_thai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
