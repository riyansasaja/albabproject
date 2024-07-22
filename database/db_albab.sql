-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 22, 2024 at 03:05 AM
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
-- Database: `db_albab`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '9218111b5e525d4794483e52d767a6f5', '2024-07-06 08:11:56'),
(2, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'ab91bfae5e355f1d12bf20e700bea059', '2024-07-06 11:11:08'),
(3, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '48e446c206a1debc27cccb216eba9c08', '2024-07-06 11:20:35');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'administrator', 'Administrator'),
(2, 'operator', 'Operator'),
(3, 'user', 'User'),
(4, 'bendahara', 'Bendahara');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `id` int(11) NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`id`, `group_id`, `user_id`) VALUES
(2, 1, 4),
(1, 3, 2),
(3, 3, 5),
(4, 3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '127.0.0.1', 'riyanboyuhu@gmail.com', 1, '2024-07-06 08:12:06', 1),
(2, '127.0.0.1', 'riyanboyuhu@gmail.com', 1, '2024-07-06 08:18:21', 1),
(3, '127.0.0.1', 'riyanboyuhu@gmail.com', 2, '2024-07-06 11:11:14', 1),
(4, '127.0.0.1', 'info.ipramanado@gmail.com', 3, '2024-07-06 11:20:42', 1),
(5, '127.0.0.1', 'info.ipramanado@gmail.com', 4, '2024-07-06 15:01:07', 1),
(6, '127.0.0.1', 'riyanboyuhu@gmail.com', 2, '2024-07-06 15:11:33', 1),
(7, '127.0.0.1', 'riyanboyuhu@gmail.com', 2, '2024-07-06 15:27:11', 1),
(8, '127.0.0.1', 'riyanboyuhu@gmail.com', 2, '2024-07-06 15:38:52', 1),
(9, '127.0.0.1', 'info.ipramanado@gmail.com', 4, '2024-07-06 15:40:38', 1),
(10, '127.0.0.1', 'info.ipramanado@gmail.com', 4, '2024-07-06 15:43:20', 1),
(11, '127.0.0.1', 'riyanboyuhu@gmail.com', 2, '2024-07-06 16:06:26', 1),
(12, '127.0.0.1', 'info.ipramanado@gmail.com', 4, '2024-07-06 16:06:51', 1),
(13, '127.0.0.1', 'info.ipramanado@gmail.com', 4, '2024-07-06 16:11:19', 1),
(14, '127.0.0.1', 'riyanboyuhu@gmail.com', 2, '2024-07-06 16:21:16', 1),
(15, '127.0.0.1', 'info.ipramanado@gmail.com', 4, '2024-07-06 16:21:42', 1),
(16, '127.0.0.1', 'info.ipramanado@gmail.com', 4, '2024-07-06 16:22:45', 1),
(17, '127.0.0.1', 'riyanboyuhu@gmail.com', 2, '2024-07-06 16:23:15', 1),
(18, '127.0.0.1', 'info.ipramanado@gmail.com', 4, '2024-07-06 16:23:32', 1),
(19, '127.0.0.1', 'tes', NULL, '2024-07-07 02:37:13', 0),
(20, '127.0.0.1', 'riyanboyuhu@gmail.com', 2, '2024-07-07 02:37:30', 1),
(21, '127.0.0.1', 'riyanboyuhu@gmail.com', 2, '2024-07-07 03:30:29', 1),
(22, '127.0.0.1', 'Yahya@gmail.com', 5, '2024-07-07 06:12:43', 1),
(23, '127.0.0.1', 'yahya@gmail.com', NULL, '2024-07-07 06:51:57', 0),
(24, '127.0.0.1', 'yahya@gmail.com', 5, '2024-07-07 06:52:07', 1),
(25, '127.0.0.1', 'yahya@gmail.com', 5, '2024-07-08 02:51:25', 1),
(26, '127.0.0.1', 'yahya@gmail.com', 5, '2024-07-08 11:44:20', 1),
(27, '127.0.0.1', 'yahyaganteng', NULL, '2024-07-10 00:51:43', 0),
(28, '127.0.0.1', 'yahyaganteng', NULL, '2024-07-10 00:52:03', 0),
(29, '127.0.0.1', 'yahyaganteng', NULL, '2024-07-10 00:52:29', 0),
(30, '127.0.0.1', 'yahya@gmail.com', NULL, '2024-07-10 00:52:55', 0),
(31, '127.0.0.1', 'yahya@gmail.com', NULL, '2024-07-10 00:53:13', 0),
(32, '127.0.0.1', 'yahya@gmail.com', 5, '2024-07-10 00:53:24', 1),
(33, '127.0.0.1', 'yahya@gmail.com', NULL, '2024-07-11 01:13:12', 0),
(34, '127.0.0.1', 'yahyaganteng', NULL, '2024-07-11 01:13:26', 0),
(35, '127.0.0.1', 'yahya@gmail.com', 5, '2024-07-11 01:13:38', 1),
(36, '127.0.0.1', 'yahya@gmail.com', 5, '2024-07-11 06:16:21', 1),
(37, '127.0.0.1', 'yahya@gmail.com', 5, '2024-07-12 07:11:25', 1),
(38, '127.0.0.1', 'yahya@gmail.com', 5, '2024-07-14 01:21:57', 1),
(39, '127.0.0.1', 'bustomi@gmail.com', 7, '2024-07-14 01:29:55', 1),
(40, '127.0.0.1', 'admin ipra', NULL, '2024-07-14 03:32:03', 0),
(41, '127.0.0.1', 'admin ipra', NULL, '2024-07-14 03:32:15', 0),
(42, '127.0.0.1', 'info.ipramanado@gmail.com', 4, '2024-07-14 03:32:27', 1),
(43, '127.0.0.1', 'yahya ganteng', NULL, '2024-07-16 03:07:52', 0),
(44, '127.0.0.1', 'yahya@gmail.com', 5, '2024-07-16 03:08:01', 1),
(45, '127.0.0.1', 'info.ipramanado@gmail.com', 4, '2024-07-16 03:09:09', 1),
(46, '127.0.0.1', 'info.ipramanado@gmail.com', 4, '2024-07-16 07:24:07', 1),
(47, '127.0.0.1', 'yahya ganteng', NULL, '2024-07-16 07:34:30', 0),
(48, '127.0.0.1', 'yahya@gmail.com', 5, '2024-07-16 07:34:41', 1),
(49, '127.0.0.1', 'info.ipramanado@gmail.com', 4, '2024-07-16 07:53:15', 1),
(50, '127.0.0.1', 'info.ipramanado@gmail.com', 4, '2024-07-17 01:51:29', 1),
(51, '127.0.0.1', 'info.ipramanado@gmail.com', 4, '2024-07-18 05:56:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1720253395, 1),
(2, '2024-07-08-040943', 'App\\Database\\Migrations\\CreateTablePersonalData', 'default', 'App', 1720412651, 2),
(3, '2024-07-11-025922', 'App\\Database\\Migrations\\CreateTbBayar', 'default', 'App', 1720667523, 3),
(4, '2024-07-16-031506', 'App\\Database\\Migrations\\CreateTbMenu', 'default', 'App', 1721100567, 4),
(5, '2024-07-16-031735', 'App\\Database\\Migrations\\CreateTbMenuAccess', 'default', 'App', 1721101354, 5);

-- --------------------------------------------------------

--
-- Table structure for table `personal_data`
--

CREATE TABLE `personal_data` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(30) DEFAULT NULL,
  `asal_sekolah` varchar(100) DEFAULT NULL,
  `cita_cita` varchar(100) DEFAULT NULL,
  `motivasi` varchar(255) DEFAULT NULL,
  `ukuran_baju` varchar(10) DEFAULT NULL,
  `nomor_telpon` varchar(18) DEFAULT NULL,
  `nomor_telpon_ortu` varchar(18) DEFAULT NULL,
  `pengalaman` varchar(255) DEFAULT NULL,
  `aktivitas` varchar(100) DEFAULT NULL,
  `opbdh` varchar(255) DEFAULT NULL,
  `nm` varchar(255) DEFAULT NULL,
  `bi` varchar(255) DEFAULT NULL,
  `smpad` varchar(255) DEFAULT NULL,
  `stmdka` varchar(255) DEFAULT NULL,
  `apypbdha` varchar(255) DEFAULT NULL,
  `kytt` varchar(255) DEFAULT NULL,
  `amtad` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_data`
--

INSERT INTO `personal_data` (`id`, `user_id`, `email`, `fullname`, `jenis_kelamin`, `asal_sekolah`, `cita_cita`, `motivasi`, `ukuran_baju`, `nomor_telpon`, `nomor_telpon_ortu`, `pengalaman`, `aktivitas`, `opbdh`, `nm`, `bi`, `smpad`, `stmdka`, `apypbdha`, `kytt`, `amtad`) VALUES
(11, 7, 'bustomi@gmail.com', 'Bustomi Kadir', 'Laki-laki', 'MAN Model Manado', 'Guru', 'Untuk Belajar Agama Lebih Jauh', 'L', '0811444499', '0812444499', 'Ketua Osis\r\nKetua Rohis', 'Sekolah/Kuliah', 'Orang Tua', 'Jujur itu Baik', 'IPS', 'Orang Tua', 'Bruce Lee', 'Ketika Nonton Bruce Lee', 'Waktu Bruce Lee Kalah', 'Instagram');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bayar`
--

CREATE TABLE `tb_bayar` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `jmlh_bayar` decimal(10,0) NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL,
  `log` int(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_menu` varchar(20) NOT NULL,
  `routes` varchar(25) NOT NULL,
  `icon` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id`, `nama_menu`, `routes`, `icon`) VALUES
(1, 'Daftar Peserta', 'peserta', 'fa-user-astronaut'),
(2, 'Validasi Pembayaran', 'validasi', 'fa-tasks'),
(3, 'Bendahara', 'bendahara', 'fa-cash-register'),
(4, 'User Management', 'usersetting', 'fa-user-check');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu_access`
--

CREATE TABLE `tb_menu_access` (
  `id` int(11) UNSIGNED NOT NULL,
  `auth_group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `menu_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_menu_access`
--

INSERT INTO `tb_menu_access` (`id`, `auth_group_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 1),
(6, 2, 4),
(7, 4, 2),
(8, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'riyanboyuhu@gmail.com', 'riyanboyuhu', 'Riyan Boyuhu', '$2y$10$V4OSL1n7bHQugMCq7NjqfOqPdj/0gaOrC6YDeeKORlQcfonjggP9y', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-07-06 11:10:55', '2024-07-06 11:11:08', NULL),
(4, 'info.ipramanado@gmail.com', 'admin ipra', 'Admin Ipra', '$2y$10$n2BJcm16C8qYvRchp3/fiOFxXgyHd1l9FGwPZjGW4ycV4Pos3uMRS', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-07-06 22:59:28', '2024-07-06 22:59:38', NULL),
(5, 'yahya@gmail.com', 'yahyaganteng', 'Yahya Saputra', '$2y$10$j6dK8ePBLFH0qgshTzQ2geoAWY4rp4trLG71gw8sBdeyr8T7hj0/6', NULL, NULL, NULL, '9fb22b0a4b9520ed75796fcd6f9764ee', NULL, NULL, 1, 0, '2024-07-07 06:12:02', '2024-07-07 06:12:02', NULL),
(7, 'bustomi@gmail.com', 'bustomi17', 'Bustomi Kadir', '$2y$10$3kiki410ys4tDFO8I.KoyO1cpbCpVyktwQy1pp1t9rxNJ3KsuF2Bq', NULL, NULL, NULL, 'd7e64a244bc20d5510e7ffc75499642f', NULL, NULL, 1, 0, '2024-07-14 01:29:02', '2024-07-14 01:29:02', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_data`
--
ALTER TABLE `personal_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_menu_access`
--
ALTER TABLE `tb_menu_access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_menu_access_auth_group_id_foreign` (`auth_group_id`),
  ADD KEY `tb_menu_access_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_data`
--
ALTER TABLE `personal_data`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_menu_access`
--
ALTER TABLE `tb_menu_access`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_menu_access`
--
ALTER TABLE `tb_menu_access`
  ADD CONSTRAINT `tb_menu_access_auth_group_id_foreign` FOREIGN KEY (`auth_group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_menu_access_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `tb_menu` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
