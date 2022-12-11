-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 11:26 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laposh_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `check_in_date` datetime NOT NULL,
  `check_out_date` datetime NOT NULL,
  `special_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `room_id`, `check_in_date`, `check_out_date`, `special_info`, `reference`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 4, 5, '2022-11-30 09:00:00', '2022-12-28 09:00:00', NULL, 'DSB-9292331', 4, '2022-11-29 05:01:16', '2022-11-29 06:13:45'),
(2, 5, 3, '2022-11-30 09:00:00', '2022-12-14 09:00:00', NULL, 'CRR-2453836', 1, '2022-11-29 05:06:04', '2022-11-29 05:55:36'),
(3, 5, 4, '2022-05-10 10:02:00', '2022-06-28 10:02:00', NULL, 'HSH-1544272', 1, '2022-11-29 06:02:45', '2022-11-29 06:03:29'),
(4, 6, 3, '2022-06-15 10:05:00', '2022-06-30 10:05:00', NULL, 'EFT-1141087', 1, '2022-11-29 06:05:36', '2022-11-29 06:06:26'),
(5, 6, 4, '2022-07-14 10:05:00', '2022-07-29 10:05:00', NULL, 'SFM-1462327', 1, '2022-11-29 06:07:18', '2022-11-29 06:07:53'),
(6, 6, 4, '2022-08-10 10:05:00', '2022-08-31 10:05:00', NULL, 'KHK-9766380', 1, '2022-11-29 06:09:11', '2022-11-29 06:09:45'),
(7, 5, 2, '2022-12-09 21:29:00', '2022-12-24 21:29:00', NULL, 'JQR-5108640', 5, '2022-12-02 17:31:49', '2022-12-02 17:31:49'),
(8, 5, 1, '2022-12-04 21:51:00', '2022-12-29 21:51:00', NULL, 'ZIG-9191227', 5, '2022-12-03 18:38:49', '2022-12-03 18:38:49'),
(9, 7, 5, '2021-11-30 09:00:00', '2021-12-28 09:00:00', NULL, 'DSB-9292331', 4, '2022-11-29 05:01:16', '2022-11-29 06:13:45'),
(10, 5, 4, '2022-12-05 18:49:00', '2022-12-09 22:55:00', 'hot water', 'YJX-8943563', 2, '2022-12-05 14:51:21', '2022-12-05 15:06:58'),
(11, 5, 4, '2022-12-30 19:58:00', '2023-01-01 19:58:00', NULL, 'GHO-9339651', 1, '2022-12-05 16:06:09', '2022-12-05 16:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Single', '2022-11-29 04:35:25', '2022-11-29 04:35:25'),
(2, 'Double', '2022-11-29 04:35:31', '2022-11-29 04:35:31'),
(4, 'Queen', '2022-11-29 04:35:44', '2022-11-29 04:35:44'),
(5, 'King', '2022-11-29 04:35:49', '2022-11-29 04:35:49'),
(6, 'Deluxe', '2022-11-29 04:35:57', '2022-11-29 04:35:57'),
(7, 'Executive', '2022-11-29 04:36:03', '2022-12-04 07:19:27'),
(8, 'Standard', '2022-12-05 07:44:48', '2022-12-05 07:44:48'),
(9, 'Twin', '2022-12-05 13:41:12', '2022-12-05 13:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `hotel-info`
--

CREATE TABLE `hotel-info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel-info`
--

INSERT INTO `hotel-info` (`id`, `name`, `address`, `email`, `phone`, `logo`, `about`, `created_at`, `updated_at`) VALUES
(1, 'La posh Hotel', 'kigali, Rwanda', 'info@laposh.com', '+250780919691', 'https://res.cloudinary.com/dcwfma8py/image/upload/v1670142882/ceu73lxfqjubidlxjfju.png', 'jkhllhkj', NULL, '2022-12-05 15:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `email`, `content`, `created_at`, `updated_at`) VALUES
(1, 'hicode250@gmail.com', 'vgnjghgvhgfh', '2022-12-02 19:05:28', '2022-12-02 19:05:28'),
(2, 'hicode250@gmail.com', 'zdfsdfsdfad', '2022-12-02 19:07:04', '2022-12-02 19:07:04');

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
(20, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(21, '2022_10_26_191336_create_categories_table', 1),
(22, '2022_10_26_191823_create_rooms_table', 1),
(23, '2022_10_26_192336_create_status_table', 1),
(24, '2022_10_29_184258_create_hotel-info_table', 1),
(25, '2022_11_10_164929_create_permission_tables', 1),
(26, '2022_11_10_165257_create_users_table', 1),
(27, '2022_11_14_095452_create_bookings_table', 1),
(28, '2022_11_15_051725_create_payments_table', 1),
(29, '2022_11_15_051811_create_subscriptions_table', 1),
(30, '2022_11_15_071943_create_messages_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(6, 'App\\Models\\User', 5),
(6, 'App\\Models\\User', 6),
(6, 'App\\Models\\User', 7),
(6, 'App\\Models\\User', 8),
(6, 'App\\Models\\User', 9);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `payment_option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(9,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `booking_id`, `payment_option`, `reference`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 'card', 'WFZ-5409481', '76.00', '2022-11-29 05:04:35', '2022-11-29 05:04:35'),
(2, 2, 'card', 'GRU-6480429', '15120.00', '2022-11-29 05:34:30', '2022-11-29 05:34:30'),
(3, 3, 'card', 'QEQ-9632042', '64680.00', '2022-11-29 06:03:29', '2022-11-29 06:03:29'),
(4, 3, 'card', 'UHL-9596869', '64680.00', '2022-11-29 06:03:33', '2022-11-29 06:03:33'),
(5, 4, 'card', 'MIH-4290228', '16200.00', '2022-11-29 06:06:26', '2022-11-29 06:06:26'),
(6, 5, 'card', 'APD-6686458', '19800.00', '2022-11-29 06:07:52', '2022-11-29 06:07:52'),
(7, 6, 'card', 'EYA-4743807', '27720.00', '2022-11-29 06:09:45', '2022-11-29 06:09:45'),
(8, 10, 'card', 'GGL-2455938', '864.00', '2022-12-05 14:52:35', '2022-12-05 14:52:35'),
(9, 11, 'card', 'AWZ-7467118', '432.00', '2022-12-05 16:12:23', '2022-12-05 16:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create-room', 'web', '2022-11-29 04:28:28', '2022-11-29 04:28:28'),
(2, 'update-room', 'web', '2022-11-29 04:28:28', '2022-11-29 04:28:28'),
(3, 'edit-room', 'web', '2022-11-29 04:28:28', '2022-11-29 04:28:28'),
(4, 'delete-room', 'web', '2022-11-29 04:28:28', '2022-11-29 04:28:28'),
(5, 'view-room', 'web', '2022-11-29 04:28:28', '2022-11-29 04:28:28'),
(6, 'dashboard', 'web', '2022-11-29 04:28:28', '2022-11-29 04:28:28'),
(7, 'create-user', 'web', '2022-11-29 04:28:28', '2022-11-29 04:28:28'),
(8, 'update-user', 'web', '2022-11-29 04:28:29', '2022-11-29 04:28:29'),
(9, 'edit-user', 'web', '2022-11-29 04:28:29', '2022-11-29 04:28:29'),
(10, 'delete-user', 'web', '2022-11-29 04:28:29', '2022-11-29 04:28:29'),
(11, 'view-user', 'web', '2022-11-29 04:28:29', '2022-11-29 04:28:29'),
(12, 'create-category', 'web', '2022-11-29 04:28:29', '2022-11-29 04:28:29'),
(13, 'update-category', 'web', '2022-11-29 04:28:29', '2022-11-29 04:28:29'),
(14, 'edit-category', 'web', '2022-11-29 04:28:29', '2022-11-29 04:28:29'),
(15, 'delete-category', 'web', '2022-11-29 04:28:29', '2022-11-29 04:28:29'),
(16, 'view-category', 'web', '2022-11-29 04:28:29', '2022-11-29 04:28:29'),
(17, 'check-in', 'web', '2022-11-29 04:28:29', '2022-11-29 04:28:29'),
(18, 'check-out', 'web', '2022-11-29 04:28:29', '2022-11-29 04:28:29'),
(19, 'view-reservation', 'web', '2022-11-29 04:28:29', '2022-11-29 04:28:29'),
(20, 'cancel-reservation', 'web', '2022-11-29 04:28:29', '2022-11-29 04:28:29'),
(21, 'extend-reservation', 'web', '2022-11-29 04:28:29', '2022-11-29 04:28:29'),
(22, 'view-payment', 'web', '2022-11-29 04:28:29', '2022-11-29 04:28:29'),
(23, 'check-paymemt', 'web', '2022-11-29 04:28:29', '2022-11-29 04:28:29'),
(24, 'generate-report', 'web', '2022-11-29 04:28:29', '2022-11-29 04:28:29');

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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'web', '2022-11-29 04:28:29', '2022-11-29 04:28:29'),
(2, 'Manager', 'web', '2022-11-29 04:28:29', '2022-11-29 04:28:29'),
(3, 'Accountant', 'web', '2022-11-29 04:28:29', '2022-11-29 04:28:29'),
(4, 'Room-operator', 'web', '2022-11-29 04:28:29', '2022-11-29 04:28:29'),
(5, 'Receptionist', 'web', '2022-11-29 04:28:29', '2022-11-29 04:28:29'),
(6, 'Client', 'web', '2022-11-29 04:28:29', '2022-11-29 04:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(16, 2),
(16, 4),
(17, 1),
(17, 2),
(17, 4),
(18, 1),
(18, 2),
(18, 4),
(19, 1),
(19, 2),
(19, 4),
(19, 5),
(20, 1),
(21, 1),
(21, 4),
(22, 1),
(22, 3),
(23, 1),
(23, 2),
(23, 3),
(24, 1),
(24, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `specifications` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`images`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `category_id`, `price`, `specifications`, `images`, `created_at`, `updated_at`) VALUES
(1, 'King Size Four Poster', 1, '7.99', 'Our king size four poster provides views over landscaped gardens. It has a seating area, ample storage, digital safe and mini fridge.', '[\"https:\\/\\/res.cloudinary.com\\/dcwfma8py\\/image\\/upload\\/v1670234539\\/v9mooparcenihlekgyed.jpg\",\"https:\\/\\/res.cloudinary.com\\/dcwfma8py\\/image\\/upload\\/v1670234549\\/sadif6r53ylxv3rj9qy0.jpg\",\"https:\\/\\/res.cloudinary.com\\/dcwfma8py\\/image\\/upload\\/v1670234553\\/qyrphovkoi5uhh3sintr.jpg\"]', '2022-11-29 04:39:41', '2022-12-05 13:30:12'),
(2, 'King Size Sleigh Bed', 4, '10.00', 'Our king size sleigh bedded also provides views over landscaped gardens. It has ample storage, a seating area, digital safe and mini fridge.', '[\"https:\\/\\/res.cloudinary.com\\/dcwfma8py\\/image\\/upload\\/v1670234471\\/gl7zeinhvosux5jymmfq.jpg\",\"https:\\/\\/res.cloudinary.com\\/dcwfma8py\\/image\\/upload\\/v1670234475\\/ipifdpuimnm7byrdo4ym.jpg\",\"https:\\/\\/res.cloudinary.com\\/dcwfma8py\\/image\\/upload\\/v1670234485\\/jbxlvaqpkek241gsufq4.jpg\"]', '2022-11-29 04:40:31', '2022-12-05 08:01:26'),
(3, 'Deluxe King Size', 1, '5.00', 'Our Deluxe king size room has a seating area, ample storage, digital safe and mini fridge. This room can also be configured with an extra roll-away bed for families of 3.', '[\"https:\\/\\/res.cloudinary.com\\/dcwfma8py\\/image\\/upload\\/v1670234355\\/bxnlp1c8ygodst4dxkdk.jpg\",\"https:\\/\\/res.cloudinary.com\\/dcwfma8py\\/image\\/upload\\/v1670234366\\/vv99eepkkwa1pmjj4jxm.jpg\",\"https:\\/\\/res.cloudinary.com\\/dcwfma8py\\/image\\/upload\\/v1670234376\\/c8ynkeezq6pv0ihtjv8g.jpg\"]', '2022-11-29 04:44:26', '2022-12-05 07:59:37'),
(4, 'Deluxe Twin Double', 2, '9.00', 'Our Deluxe Twin/Large Double also provides views over landscaped gardens. It has a seating area, digital safe and mini fridge. This room can be configured with either 2 single beds or zip and linked to provide a large double bed.', '[\"https:\\/\\/res.cloudinary.com\\/dcwfma8py\\/image\\/upload\\/v1670234230\\/vj7wlc9obiuu0tv9v9js.jpg\",\"https:\\/\\/res.cloudinary.com\\/dcwfma8py\\/image\\/upload\\/v1670234235\\/sd1bjt9fo2xjotdb3i5j.jpg\",\"https:\\/\\/res.cloudinary.com\\/dcwfma8py\\/image\\/upload\\/v1670234238\\/rmfwjkjzor267ayqq4o0.jpg\"]', '2022-11-29 04:46:03', '2022-12-05 07:57:20'),
(5, 'Compact Double', 1, '5.00', 'As our smallest budget rooms, the Compact bedrooms are suited for single occupancy or short-stay double occupancy as they have limited space and storage.', '[\"https:\\/\\/res.cloudinary.com\\/dcwfma8py\\/image\\/upload\\/v1670234119\\/ypdzmeroeadxguic6dka.jpg\",\"https:\\/\\/res.cloudinary.com\\/dcwfma8py\\/image\\/upload\\/v1670234125\\/xufbvdyfkmkykq4ry9oe.jpg\",\"https:\\/\\/res.cloudinary.com\\/dcwfma8py\\/image\\/upload\\/v1670234131\\/hwhlxggaftvae5vie01x.jpg\"]', '2022-11-29 04:46:38', '2022-12-05 07:55:31'),
(6, 'Family Room', 7, '22.00', 'Our Family room sleigh bedded also provides views over landscaped gardens. It has ample storage, a seating area, digital safe and mini fridge.', '[\"https:\\/\\/res.cloudinary.com\\/dcwfma8py\\/image\\/upload\\/v1670234762\\/fznioab3r8taby8gq9bw.jpg\",\"https:\\/\\/res.cloudinary.com\\/dcwfma8py\\/image\\/upload\\/v1670234768\\/pbpnpffyvae7cpuhtj41.jpg\",\"https:\\/\\/res.cloudinary.com\\/dcwfma8py\\/image\\/upload\\/v1670234774\\/dtbtigmfgleisqdxj3ry.jpg\"]', '2022-12-05 08:06:15', '2022-12-05 08:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'pending', NULL, NULL),
(2, 'ongoing', NULL, NULL),
(3, 'closed', NULL, NULL),
(4, 'cancelled', NULL, NULL),
(5, 'unpaid', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'hicode250@gmail.com', NULL, NULL),
(2, 'uwamahoroangel78@gmail.com', NULL, NULL),
(3, 'jdamanibishaka@gmail.com', NULL, NULL),
(4, 'yubahwesc@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `role`, `title`, `avatar`, `birthdate`, `password`, `created_at`, `updated_at`) VALUES
(1, 'HIRWA', 'Jean Claude', 'hicode250@gmail.com', 'Administrator', 'Mr.', 'https://res.cloudinary.com/dcwfma8py/image/upload/v1670236081/pwtkguxwwipuvanbhr6y.jpg', NULL, '$2y$12$MGhHPRTmLgACho4cPNeimeQG6/dpZDKdwpFdNsWTkbF9zUL.SbtFe', '2022-11-29 04:34:03', '2022-11-29 04:34:03'),
(2, 'Angel', 'Bidas', 'uwamahoroangel78@gmail.com', 'Manager', 'Miss', 'https://res.cloudinary.com/dcwfma8py/image/upload/v1670236061/mghffiywo4569v1ff7lm.jpg', NULL, '$2y$12$kwHUfw1odksHZa97aGJ7nu3iTD5uX1RocDMomB6vKfux3a3mjJwIW', '2022-11-29 04:47:38', '2022-11-29 04:47:38'),
(3, 'AHIMANA', 'Jado', 'intiti@gmail.com', 'Accountant', 'Mr.', 'https://res.cloudinary.com/dcwfma8py/image/upload/v1669704521/gqyst7gdoidacncx8cyd.jpg', NULL, '$2y$12$HPg9HHXRIZWx8reERSQpLuVANICCtLyw65clPbdl6c6Fp.36oL.3G', '2022-11-29 04:48:43', '2022-11-29 04:48:43'),
(4, 'MUNEZERO', 'Nadine', 'nadine@gmail.com', 'Room-operator', 'Miss.', 'https://res.cloudinary.com/dcwfma8py/image/upload/v1669704593/wakovajrtuqedpehbyqy.jpg', NULL, '$2y$12$zl0m./RVjL0QiK41IWew4u/5yZxEYdPAxF/rUST5pD9pcuZPddrtW', '2022-11-29 04:49:54', '2022-11-29 04:49:54'),
(5, 'HABWIKUZO', 'Henriette', 'hicode251@gmail.com', 'client', 'Miss.', 'https://dl.memuplay.com/new_market/img/com.vicman.newprofilepic.icon.2022-06-07-21-33-07.png', '2001-07-16', '$2y$12$tpBZdAAKox6jOc3jHTd3SO0uNauYwb4MDIDXYpVhBS15yj8EqSqfu', '2022-11-29 04:51:11', '2022-11-29 04:51:11'),
(6, 'KARASISI', 'Trophime', 'hicode252@gmail.com', 'client', 'Mr.', NULL, '2001-07-27', '$2y$12$fX3AQzmJn5Yo7Yn0TgWL9eYd7cOwIx89fAYWt2kx522zoXlsPE8uG', '2022-11-29 04:51:54', '2022-11-29 04:51:54'),
(7, 'CYIZERE', 'Nadege', 'hicode253@gmail.com', 'client', 'Miss.', NULL, '2003-08-28', '$2y$12$ZFbl86txkxa5Fj8so/r.kuAH6byi2PrSGftbybXJgjaZt6oAIdbwK', '2022-11-29 04:52:36', '2022-11-29 04:52:36'),
(9, 'HIRWA', 'Jean Claude', 'hicode25@gmail.com', 'client', 'Mr.', NULL, NULL, '$2y$12$GIg/p99SHxl0kPQRvZiQ3evN0muxVFx6dccY1u3vJl2hgnCCdYmIq', '2022-12-05 18:22:25', '2022-12-05 18:22:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_status_id_foreign` (`status_id`),
  ADD KEY `bookings_room_id_foreign` (`room_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel-info`
--
ALTER TABLE `hotel-info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rooms_name_unique` (`name`),
  ADD KEY `rooms_category_id_foreign` (`category_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hotel-info`
--
ALTER TABLE `hotel-info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
