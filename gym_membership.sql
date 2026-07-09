-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2026 at 05:57 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym.membership`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('gym-membership-cache-admin@gym.com|127.0.0.1', 'i:2;', 1783572614),
('gym-membership-cache-admin@gym.com|127.0.0.1:timer', 'i:1783572614;', 1783572614);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `invoice_date` date NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` enum('Unpaid','Paid') NOT NULL DEFAULT 'Unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `member_id`, `invoice_number`, `invoice_date`, `subtotal`, `tax`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'INV/2026/07/00001', '2026-07-09', 2500000.00, 275000.00, 2775000.00, 'Paid', '2026-07-08 16:45:57', '2026-07-08 18:50:49'),
(2, 4, 'INV/2026/07/00002', '2026-07-09', 750000.00, 82500.00, 832500.00, 'Paid', '2026-07-08 19:03:52', '2026-07-08 19:04:00'),
(3, 5, 'INV/2026/07/00003', '2026-07-09', 850000.00, 93500.00, 943500.00, 'Paid', '2026-07-08 19:11:40', '2026-07-08 19:12:48'),
(4, 6, 'INV/2026/07/00004', '2026-07-09', 750000.00, 82500.00, 832500.00, 'Paid', '2026-07-08 20:09:42', '2026-07-08 20:09:46'),
(5, 7, 'INV/2026/07/00005', '2026-07-09', 750000.00, 82500.00, 832500.00, 'Paid', '2026-07-08 20:28:46', '2026-07-08 20:56:06'),
(6, 8, 'INV/2026/07/00006', '2026-07-09', 850000.00, 93500.00, 943500.00, 'Paid', '2026-07-08 20:56:03', '2026-07-08 20:56:07'),
(7, 11, 'INV/2026/07/00007', '2026-07-09', 2500000.00, 275000.00, 2775000.00, 'Paid', '2026-07-08 21:01:30', '2026-07-08 21:01:34'),
(8, 13, 'INV/2026/07/00008', '2026-07-09', 2500000.00, 275000.00, 2775000.00, 'Paid', '2026-07-08 21:24:36', '2026-07-08 21:24:40'),
(9, 14, 'INV/2026/07/00009', '2026-07-09', 850000.00, 93500.00, 943500.00, 'Paid', '2026-07-08 21:52:10', '2026-07-08 21:52:15'),
(10, 15, 'INV/2026/07/00010', '2026-07-09', 2500000.00, 275000.00, 2775000.00, 'Paid', '2026-07-08 21:55:59', '2026-07-08 21:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `membership_id` bigint(20) UNSIGNED NOT NULL,
  `join_date` date NOT NULL,
  `status` varchar(255) DEFAULT 'suspend',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `phone`, `address`, `membership_id`, `join_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Pitri', '08123456789', 'Jl balikpapan', 2, '2026-06-15', 'active', '2026-07-08 15:26:48', '2026-07-08 18:51:20'),
(4, 'Eka', '08785673882', 'jl manunggal', 8, '2026-06-06', 'active', '2026-07-08 19:03:45', '2026-07-08 19:31:38'),
(5, 'Rio', '081972787382', 'jl hebat', 9, '2026-06-16', 'active', '2026-07-08 19:11:28', '2026-07-08 19:12:48'),
(6, 'Marcel', '082345466487', 'Jl Islamic', 8, '2026-07-15', 'suspend', '2026-07-08 20:09:35', '2026-07-08 20:09:46'),
(7, 'Ilham', '08192878267468', 'Jl merdeka no 16', 8, '2026-07-09', 'Active', '2026-07-08 20:28:09', '2026-07-08 20:56:06'),
(8, 'Bahri', '0874267376378', 'Jl Manunggal', 9, '2026-08-07', 'Active', '2026-07-08 20:37:22', '2026-07-08 20:56:07'),
(11, 'Yusril', '081566379923', 'Jl Tiga generasi', 2, '2026-08-07', 'Active', '2026-07-08 20:58:03', '2026-07-08 21:01:34'),
(13, 'cici', '084278729831', 'jkdjaqeja', 2, '2026-07-09', 'Active', '2026-07-08 21:24:30', '2026-07-08 21:24:40'),
(14, 'Mariana', '087856471231', 'Jl Agung Tunggal', 9, '2026-06-15', 'Active', '2026-07-08 21:50:59', '2026-07-08 21:52:15'),
(15, 'Elsa', '12343537373', 'Jl taman adipura', 2, '2026-07-15', 'Active', '2026-07-08 21:55:36', '2026-07-08 21:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `monthly_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `name`, `description`, `monthly_price`, `created_at`, `updated_at`) VALUES
(2, 'VIP', 'Paket setahun gym Excluseive promo 5%', 2500000.00, '2026-07-08 13:23:32', '2026-07-08 15:50:01'),
(8, 'Basic', 'paket 3 bulan gym', 750000.00, '2026-07-08 15:32:59', '2026-07-08 15:32:59'),
(9, 'Premium', 'Paket 6 bulan gym', 850000.00, '2026-07-08 15:33:20', '2026-07-08 15:33:20');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_07_08_130354_create_memberships_table', 2),
(5, '2026_07_08_214543_create_members_table', 3),
(6, '2026_07_08_235045_create_invoices_table', 4),
(7, '2026_07_09_022534_create_payments_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `payment_date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `invoice_id`, `payment_date`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, '2026-07-09', 2775000.00, '2026-07-08 18:50:49', '2026-07-08 18:50:49'),
(2, 2, '2026-07-09', 832500.00, '2026-07-08 19:04:00', '2026-07-08 19:04:00'),
(3, 3, '2026-07-09', 943500.00, '2026-07-08 19:12:48', '2026-07-08 19:12:48'),
(4, 4, '2026-07-09', 832500.00, '2026-07-08 20:09:46', '2026-07-08 20:09:46'),
(5, 5, '2026-07-09', 832500.00, '2026-07-08 20:56:06', '2026-07-08 20:56:06'),
(6, 6, '2026-07-09', 943500.00, '2026-07-08 20:56:07', '2026-07-08 20:56:07'),
(7, 7, '2026-07-09', 2775000.00, '2026-07-08 21:01:34', '2026-07-08 21:01:34'),
(8, 8, '2026-07-09', 2775000.00, '2026-07-08 21:24:40', '2026-07-08 21:24:40'),
(9, 9, '2026-07-09', 943500.00, '2026-07-08 21:52:15', '2026-07-08 21:52:15'),
(10, 10, '2026-07-09', 2775000.00, '2026-07-08 21:56:02', '2026-07-08 21:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Xnk0jR3U5aV7RoFLjBIL0b0CdA86n2wdwD7OABLx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36 Edg/150.0.0.0', 'eyJfdG9rZW4iOiIwcVRuVUNNeWpGM1d0T2xhQWJSYTZ5dlJJOW9PajlXcTRkNVlTYWtpIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDAiLCJyb3V0ZSI6bnVsbH19', 1783576580);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'admin@admin.com', NULL, '$2y$12$UAvScJgY1AS6jOsrtiduo.TRYmkNgPDAlq8L6e2rM8bXDeuCHz.0.', '02vyfWUGhbpse9vk2MtPkbCqjhZzU0MKcW8IxZLLcwyJS9eOcHL5OUoQpCBc', '2026-07-08 02:00:40', '2026-07-08 02:00:40'),
(2, 'mirsa', 'admin@mirsa.com', NULL, 'admin123', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_member_id_foreign` (`member_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_membership_id_foreign` (`membership_id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_membership_id_foreign` FOREIGN KEY (`membership_id`) REFERENCES `memberships` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
