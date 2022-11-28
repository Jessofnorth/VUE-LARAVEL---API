-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 27, 2022 at 09:23 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `discgolfbutiken`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_phone` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_contact` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_phone`, `brand_contact`, `brand_email`, `created_at`, `updated_at`) VALUES
(1, 'Discraft', '0701234567', 'Paul Hansen', 'Paul@discraft.com', '2022-10-26 19:43:43', '2022-10-26 19:43:43'),
(2, 'Latitude 64', '0709876543', 'Jonathan Sensson', 'jonathan@latitude64.com', '2022-10-26 19:45:08', '2022-10-26 19:45:08'),
(3, 'Innova', '07038471294', 'Nathan Koling', 'nate@innova.com', '2022-10-26 19:45:41', '2022-10-26 19:45:41'),
(4, 'Dynamic Discs', '0702538594', 'Ricky Stone', 'ricky@dynamic.com', '2022-10-26 19:46:37', '2022-10-26 19:46:37'),
(6, 'Discmania', '0701425365', 'Simon Persson', 'simon@discmania.com', '2022-10-26 20:00:34', '2022-10-26 20:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Putt & Approach', '2022-10-26 19:54:44', '2022-10-26 19:54:44'),
(2, 'Distance Driver', '2022-10-26 19:56:04', '2022-10-26 19:56:04'),
(3, 'Midrange', '2022-10-26 19:56:12', '2022-10-26 19:56:12'),
(4, 'Fairway Driver', '2022-10-26 19:56:20', '2022-10-26 19:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `discount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `discount`, `created_at`, `updated_at`) VALUES
(1, 10, '2022-10-26 19:32:49', '2022-10-26 19:32:49'),
(2, 20, '2022-10-26 19:36:00', '2022-10-26 19:36:00'),
(3, 25, '2022-10-26 19:36:54', '2022-10-26 19:36:54'),
(4, 50, '2022-10-26 19:37:27', '2022-10-26 19:37:27'),
(5, 75, '2022-10-26 19:37:33', '2022-10-26 19:37:33'),
(6, 0, '2022-10-26 20:00:01', '2022-10-26 20:00:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_10_183218_create_categorys_table', 1),
(6, '2022_10_10_183236_create_discounts_table', 1),
(7, '2022_10_10_183246_create_brands_table', 1),
(8, '2022_10_10_183350_create_products_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'APITOKEN', '90285a7a511f4dcc3515f7e0901a4d5dd319c72b97a57b6908aae692f9c0ffa8', '[\"*\"]', NULL, NULL, '2022-10-26 19:23:53', '2022-10-26 19:23:53'),
(2, 'App\\Models\\User', 1, 'APITOKEN', 'f39c51a8482988aaff93d56dc6e0d75611986879a812376eb92cda9574701236', '[\"*\"]', '2022-10-27 05:28:27', NULL, '2022-10-26 19:24:53', '2022-10-27 05:28:27'),
(3, 'App\\Models\\User', 2, 'APITOKEN', 'ef1b0a694e8a23d9936047cf2854bdf31ae82a066acbf305ca17fcd8f05159a9', '[\"*\"]', NULL, NULL, '2022-10-26 19:31:40', '2022-10-26 19:31:40'),
(4, 'App\\Models\\User', 1, 'APITOKEN', '8eb1c68bb1770439a3efc2bd5c386d1e36acf2b137d517a020359f15ad65e102', '[\"*\"]', '2022-10-27 05:04:56', NULL, '2022-10-27 05:04:43', '2022-10-27 05:04:56'),
(5, 'App\\Models\\User', 1, 'APITOKEN', '194867357e253ba03de4961e630de789cdf619ec95332bf6b9629905822cf2b5', '[\"*\"]', '2022-10-27 05:38:57', NULL, '2022-10-27 05:37:37', '2022-10-27 05:38:57'),
(6, 'App\\Models\\User', 1, 'APITOKEN', '386f2fb65e50792a7efd539729c74f33254e530c4cae2c1c2106aecbafb23c06', '[\"*\"]', '2022-10-27 07:01:50', NULL, '2022-10-27 06:38:28', '2022-10-27 07:01:50'),
(7, 'App\\Models\\User', 1, 'APITOKEN', '9e2512e82083ae91e0a79ba4389cf1a924b628f65e944368dc349f00e34b10ac', '[\"*\"]', '2022-10-27 07:23:16', NULL, '2022-10-27 07:02:28', '2022-10-27 07:23:16');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `discount_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `img`, `price`, `info`, `stock`, `category_id`, `brand_id`, `discount_id`, `created_at`, `updated_at`) VALUES
(1, 'Tilt', '9EvHw7daWEEakOn7qI9v.jpg', 399, 'Speed: 9. Glide: 1. Turn: 1. Fade: 6.', 256, 4, 6, 6, '2022-10-26 19:59:46', '2022-10-26 20:00:48'),
(2, 'Eagle', '6wWtQrhc47A4sk3LhG2b.jpg', 249, 'Speed: 7. Glide: 4. Turn: -1. Fade: 3.', 123, 4, 3, 5, '2022-10-26 20:03:33', '2022-10-26 20:03:33'),
(3, 'Bolt', '80wn8k0pr04DPH8oA3lp.jpg', 349, 'Speed: 13. Glide: 6. Turn: -2. Fade: 3.', 456, 2, 2, 4, '2022-10-26 20:07:36', '2022-10-26 20:07:36'),
(4, 'Slammer', 'WjDcxMBNrcP2Y6wcxc9J.jpg', 179, 'Speed: 3. Glide: 1. Turn: 0,5. Fade: 4.', 0, 1, 4, 1, '2022-10-26 20:09:39', '2022-10-26 20:09:39'),
(6, 'Bolt', 'PYztJzCBJSODnOYIXwyI.jpg', 399, 'Speed: 13. Glide: 6. Turn: -2. Fade: 3.', 129, 2, 2, 2, '2022-10-27 04:55:34', '2022-10-27 04:55:34'),
(7, 'Slammer', 'vvkpHakC1gj4CA9iOCIL.jpg', 179, 'Speed: 3. Glide: 1. Turn: 0,5. Fade: 4.', 452, 1, 4, 6, '2022-10-27 04:56:09', '2022-10-27 04:56:09'),
(8, 'Destroyer', 'WprK32g1Xp9smXhv67br.jpg', 279, 'Speed: 12. Glide: 5. Turn: -1. Fade: 3.', 362, 2, 3, 6, '2022-10-27 05:00:42', '2022-10-27 05:00:42');

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

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jess', 'jess@mail.com', NULL, '$2y$10$6X.FR2/SI9msgRloq9gSAOKTkujEC23/bSCcFCTofKwdh0Tgpc81a', NULL, '2022-10-26 19:23:53', '2022-10-26 19:23:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_discount_id_foreign` (`discount_id`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`),
  ADD CONSTRAINT `products_discount_id_foreign` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`id`);
