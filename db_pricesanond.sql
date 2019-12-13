-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2019 at 04:18 AM
-- Server version: 10.4.10-MariaDB
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
-- Database: `db_pricesanond`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_10_073812_create_client_table', 1),
(4, '2019_12_10_074543_create_address_table', 1),
(5, '2019_12_10_075633_create_operation_table', 1),
(6, '2019_12_12_095648_create_yellowfiles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_address_clients`
--

CREATE TABLE `tb_address_clients` (
  `ct_ad_id` bigint(20) UNSIGNED NOT NULL,
  `ct_ad` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ct_ad_branch` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ct_ad_road` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ct_ad_subarea` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ct_ad_area` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ct_ad_province` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ct_ad_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ct_ad_country` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ct_ad_phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ct_ad_fax` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ct_ad_mail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ct_ad_atten` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ct_ad_invoice` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ct_ad_ref` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_address_clients`
--

INSERT INTO `tb_address_clients` (`ct_ad_id`, `ct_ad`, `ct_ad_branch`, `ct_ad_road`, `ct_ad_subarea`, `ct_ad_area`, `ct_ad_province`, `ct_ad_code`, `ct_ad_country`, `ct_ad_phone`, `ct_ad_fax`, `ct_ad_mail`, `ct_ad_atten`, `ct_ad_invoice`, `ct_ad_ref`, `created_at`, `updated_at`) VALUES
(1, '635  Brown Bear Drive', 'xxxxxxx', 'CA', NULL, NULL, 'Los Angeles -California', '90017', NULL, '951-552-9569', '951-552-9569', 'qfckd0st5xr@groupbuff.com', 'xxxxx', '0', '9940', NULL, NULL),
(2, '2679 Buck Drive', 'xxxxxxx', NULL, NULL, 'Salt Lake City', 'UT', '84119', NULL, '801-975-8058', '801-975-8058', 'LauraSRosales@rhyta.com', 'xxxxx', '0', '197365', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_clients`
--

CREATE TABLE `tb_clients` (
  `id_ct` bigint(20) UNSIGNED NOT NULL,
  `ct_fn` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ct_inn` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ct_tax` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ct_ad_ref` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ct_images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_clients`
--

INSERT INTO `tb_clients` (`id_ct`, `ct_fn`, `ct_inn`, `ct_tax`, `ct_ad_ref`, `ct_images`, `created_at`, `updated_at`) VALUES
(1, 'Jo King', 'Jo King', '8858741733761', '9940', '2019-12-13-03-04-40522191494.jpg', '2019-12-12 19:57:12', '2019-12-12 20:04:40'),
(2, 'Laura S. Rosales', 'Laura S. Rosales', '8858741733761', '197365', '2019-12-13-03-02-461607580636.jpg', '2019-12-12 20:02:46', '2019-12-12 20:02:46');

-- --------------------------------------------------------

--
-- Table structure for table `tb_operations`
--

CREATE TABLE `tb_operations` (
  `id_ot` bigint(20) UNSIGNED NOT NULL,
  `ot_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `yellowfiles`
--

CREATE TABLE `yellowfiles` (
  `id_yf` bigint(20) UNSIGNED NOT NULL,
  `id_ct_yf` int(11) NOT NULL,
  `yf_mtt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_currency` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_currencyter` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_fixfee` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_discount` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_rates_a` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_rates_b` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_rates_c` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_rates_d` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_rates_e` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_rates_f` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_taxnumber` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_inv_num` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_road` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_dis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_subdis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_provice` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_country` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_fax` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_atten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_invioctext` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_refer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yf_confict` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tb_address_clients`
--
ALTER TABLE `tb_address_clients`
  ADD PRIMARY KEY (`ct_ad_id`);

--
-- Indexes for table `tb_clients`
--
ALTER TABLE `tb_clients`
  ADD PRIMARY KEY (`id_ct`);

--
-- Indexes for table `tb_operations`
--
ALTER TABLE `tb_operations`
  ADD PRIMARY KEY (`id_ot`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `yellowfiles`
--
ALTER TABLE `yellowfiles`
  ADD PRIMARY KEY (`id_yf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_address_clients`
--
ALTER TABLE `tb_address_clients`
  MODIFY `ct_ad_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_clients`
--
ALTER TABLE `tb_clients`
  MODIFY `id_ct` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_operations`
--
ALTER TABLE `tb_operations`
  MODIFY `id_ot` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `yellowfiles`
--
ALTER TABLE `yellowfiles`
  MODIFY `id_yf` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
