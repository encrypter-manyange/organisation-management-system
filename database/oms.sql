-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 06:43 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oms`
--

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

CREATE TABLE `contributions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `member_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contributions`
--

INSERT INTO `contributions` (`id`, `description`, `reference`, `member_id`, `amount`, `created_at`, `updated_at`, `status`) VALUES
(2, 'Subscription January 2024', '65adfe975e2a1', 1, '20', '2024-01-22 03:35:19', '2024-01-22 03:35:19', 1),
(3, 'Subscription February 2024', '65adfee5c92e8', 1, '20', '2024-01-22 03:36:37', '2024-01-22 03:43:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `marital_status` enum('Single','Married','Divorced') NOT NULL DEFAULT 'Single',
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `first_name`, `middle_name`, `last_name`, `id_number`, `dob`, `gender`, `marital_status`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Witness', 'Archbold', 'Manyange', '63-239800F70', '1996-10-09', 'Male', 'Married', '+263783916321', 'Harare', '2024-01-22 02:56:19', '2024-01-22 02:56:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2012_12_25_194329_create_roles_table', 1),
(2, '2012_12_25_194346_create_permissions_table', 1),
(3, '2012_12_25_194401_create_role_permissions_table', 1),
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2023_12_11_174406_add_status_to_user_table', 2),
(8, '2024_01_13_093749_add_last_login_to_users_table', 3),
(9, '2024_01_13_094424_add_last_login_ip_to_users_table', 4),
(17, '2024_01_22_024037_create_members_table', 5),
(18, '2024_01_22_024049_create_contributions_table', 5),
(19, '2024_01_22_050847_add_status_to_contributions_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'view-users', '2022-12-27 17:35:06', '2023-01-07 13:36:58'),
(2, 'update-user', '2022-12-27 17:44:31', '2022-12-27 17:44:31'),
(3, 'store-permission', '2022-12-27 17:45:20', '2022-12-27 17:45:20'),
(4, 'view-permissions', '2022-12-27 17:45:59', '2022-12-27 17:47:21'),
(5, 'store-user', '2023-01-08 14:19:42', '2023-01-08 14:19:42'),
(6, 'update-permission', '2023-01-08 14:35:40', '2023-01-08 14:35:40'),
(7, 'store-role', '2023-01-08 14:35:48', '2023-01-08 14:35:48'),
(8, 'update-role', '2023-01-08 14:35:55', '2023-01-08 14:35:55'),
(9, 'view-roles', '2023-01-08 14:36:04', '2023-01-08 14:36:04'),
(10, 'configure-role', '2023-01-08 14:38:35', '2023-01-08 14:38:35'),
(11, 'remove-permission', '2023-01-08 14:40:10', '2023-01-08 14:40:10'),
(12, 'add-permission', '2023-01-08 14:40:18', '2023-01-08 14:40:18'),
(17, 'user-management', '2023-12-11 15:43:09', '2023-12-11 15:43:09'),
(27, 'view-members', '2024-01-22 01:12:04', '2024-01-22 01:12:04'),
(28, 'view-contributions', '2024-01-22 01:12:16', '2024-01-22 01:12:16'),
(29, 'store-member', '2024-01-22 01:12:22', '2024-01-22 02:55:31'),
(30, 'store-contribution', '2024-01-22 01:12:29', '2024-01-22 02:55:43'),
(31, 'update-member', '2024-01-22 01:12:37', '2024-01-22 01:12:37'),
(32, 'update-contribution', '2024-01-22 01:12:43', '2024-01-22 01:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2023-12-11 15:02:33', '2023-12-11 15:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `permission_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(9, 1, 4, '2023-01-08 14:39:42', '2023-01-08 14:39:42'),
(10, 1, 6, '2023-01-08 14:39:42', '2023-01-08 14:39:42'),
(11, 1, 7, '2023-01-08 14:39:42', '2023-01-08 14:39:42'),
(12, 1, 8, '2023-01-08 14:39:42', '2023-01-08 14:39:42'),
(13, 1, 9, '2023-01-08 14:39:42', '2023-01-08 14:39:42'),
(15, 1, 11, '2023-01-08 14:40:55', '2023-01-08 14:40:55'),
(16, 1, 12, '2023-01-08 14:40:55', '2023-01-08 14:40:55'),
(17, 1, 10, '2023-01-08 14:41:43', '2023-01-08 14:41:43'),
(18, 1, 17, '2023-12-11 15:43:22', '2023-12-11 15:43:22'),
(19, 1, 2, '2023-12-11 15:45:18', '2023-12-11 15:45:18'),
(20, 1, 1, '2024-01-13 08:08:28', '2024-01-13 08:08:28'),
(21, 1, 3, '2024-01-13 08:08:28', '2024-01-13 08:08:28'),
(22, 1, 5, '2024-01-13 08:08:28', '2024-01-13 08:08:28'),
(32, 1, 27, '2024-01-22 01:12:56', '2024-01-22 01:12:56'),
(33, 1, 28, '2024-01-22 01:12:56', '2024-01-22 01:12:56'),
(34, 1, 29, '2024-01-22 01:12:56', '2024-01-22 01:12:56'),
(35, 1, 30, '2024-01-22 01:12:56', '2024-01-22 01:12:56'),
(36, 1, 31, '2024-01-22 01:12:56', '2024-01-22 01:12:56'),
(37, 1, 32, '2024-01-22 01:12:56', '2024-01-22 01:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `last_login` datetime DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`, `last_login`, `last_login_ip`) VALUES
(1, 'OMS Admin', 1, 'admin@oms.com', NULL, '$2y$10$4stldBAT/2DFhmqXf31Vbu8fhu5B7y1iW4a3gfI8lZZC54igMutEq', NULL, '2023-12-11 15:07:53', '2024-01-22 00:30:11', 1, '2024-01-22 02:30:11', '127.0.0.1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contributions`
--
ALTER TABLE `contributions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contributions_member_id_foreign` (`member_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permissions_role_id_foreign` (`role_id`),
  ADD KEY `role_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contributions`
--
ALTER TABLE `contributions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contributions`
--
ALTER TABLE `contributions`
  ADD CONSTRAINT `contributions_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
