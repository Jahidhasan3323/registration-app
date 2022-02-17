-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 17, 2022 at 11:27 AM
-- Server version: 5.7.33
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE `boards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `boards`
--

INSERT INTO `boards` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dhaka', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `bn_name`, `url`, `division_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dhaka', NULL, NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`, `url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dhaka', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SSC', NULL, NULL, NULL);

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
-- Table structure for table `general_educational_qualifications`
--

CREATE TABLE `general_educational_qualifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `result` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `board_id` bigint(20) UNSIGNED NOT NULL,
  `institute_id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_educational_qualifications`
--

INSERT INTO `general_educational_qualifications` (`id`, `result`, `board_id`, `institute_id`, `exam_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '53', 1, 1, 1, 15, '2022-02-16 12:25:13', '2022-02-16 12:25:13', NULL),
(2, '53', 1, 1, 1, 15, '2022-02-16 12:30:19', '2022-02-16 12:30:19', NULL),
(3, '53', 1, 1, 1, 19, '2022-02-16 12:32:54', '2022-02-16 12:32:54', NULL),
(4, '53', 1, 1, 1, 20, '2022-02-16 12:38:08', '2022-02-16 12:38:08', NULL),
(5, '53', 1, 1, 1, 22, '2022-02-16 12:38:35', '2022-02-16 12:38:35', NULL),
(6, '53', 1, 1, 1, 23, '2022-02-16 12:39:57', '2022-02-16 12:39:57', NULL),
(7, '53', 1, 1, 1, 25, '2022-02-16 12:45:52', '2022-02-16 12:45:52', NULL),
(8, '84', 1, 1, 1, 26, '2022-02-17 02:21:53', '2022-02-17 02:21:53', NULL),
(9, '81', 1, 1, 1, 27, '2022-02-17 02:43:45', '2022-02-17 02:43:45', NULL),
(10, '27', 1, 1, 1, 28, '2022-02-17 03:39:49', '2022-02-17 03:39:49', NULL),
(11, '27', 1, 1, 1, 29, '2022-02-17 03:44:01', '2022-02-17 03:44:01', NULL),
(12, '80', 1, 1, 1, 30, '2022-02-17 03:44:15', '2022-02-17 03:44:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `general_languages`
--

CREATE TABLE `general_languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_languages`
--

INSERT INTO `general_languages` (`id`, `language`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '0', 25, '2022-02-16 12:39:57', '2022-02-16 12:39:57', NULL),
(2, '0', 25, '2022-02-16 12:45:52', '2022-02-16 12:45:52', NULL),
(3, '1', 26, '2022-02-17 02:21:53', '2022-02-17 02:21:53', NULL),
(4, '2', 26, '2022-02-17 02:21:53', '2022-02-17 02:21:53', NULL),
(5, '1', 27, '2022-02-17 02:43:45', '2022-02-17 02:43:45', NULL),
(6, '2', 28, '2022-02-17 03:39:49', '2022-02-17 03:39:49', NULL),
(7, '2', 29, '2022-02-17 03:44:01', '2022-02-17 03:44:01', NULL),
(8, '0', 30, '2022-02-17 03:44:15', '2022-02-17 03:44:15', NULL),
(9, '1', 30, '2022-02-17 03:44:15', '2022-02-17 03:44:15', NULL),
(10, '2', 30, '2022-02-17 03:44:15', '2022-02-17 03:44:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `general_trainings`
--

CREATE TABLE `general_trainings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_trainings`
--

INSERT INTO `general_trainings` (`id`, `name`, `details`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'jjh', 'kjkj', NULL, '2022-02-16 12:38:35', '2022-02-16 12:38:35', NULL),
(2, 'jjh', 'kjkj', NULL, '2022-02-16 12:39:57', '2022-02-16 12:39:57', NULL),
(3, 'jjh', 'kjkj', NULL, '2022-02-16 12:45:52', '2022-02-16 12:45:52', NULL),
(4, 'Jennifer Montoya', 'Assumenda commodo si', NULL, '2022-02-17 02:21:53', '2022-02-17 02:21:53', NULL),
(5, 'Shafira Mcfarland', 'Provident dolores m', NULL, '2022-02-17 02:43:45', '2022-02-17 02:43:45', NULL),
(6, 'Evelyn Moore', 'Eligendi occaecat re', NULL, '2022-02-17 03:39:49', '2022-02-17 03:39:49', NULL),
(7, 'Evelyn Moore', 'Eligendi occaecat re', NULL, '2022-02-17 03:44:01', '2022-02-17 03:44:01', NULL),
(8, 'Indira Carver', 'Et omnis neque unde ', NULL, '2022-02-17 03:44:15', '2022-02-17 03:44:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `general_users`
--

CREATE TABLE `general_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `upazila_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_users`
--

INSERT INTO `general_users` (`id`, `name`, `email`, `address`, `division_id`, `district_id`, `upazila_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(15, 'Haviva Wagner', 'qomy@mailinator.com', 'Aut mollit excepteur', 1, 1, 1, '2022-02-16 12:25:13', '2022-02-16 12:25:13', NULL),
(17, 'Haviva Wagner', 'qomy22@mailinator.com', 'Aut mollit excepteur', 1, 1, 1, '2022-02-16 12:30:19', '2022-02-16 12:30:19', NULL),
(19, 'Haviva Wagner', 'qomy222@mailinator.com', 'Aut mollit excepteur', 1, 1, 1, '2022-02-16 12:32:54', '2022-02-16 12:32:54', NULL),
(20, 'Haviva Wagner', 'qomy2222@mailinator.com', 'Aut mollit excepteur', 1, 1, 1, '2022-02-16 12:38:08', '2022-02-16 12:38:08', NULL),
(22, 'Haviva Wagner', 'qomy2252@mailinator.com', 'Aut mollit excepteur', 1, 1, 1, '2022-02-16 12:38:35', '2022-02-16 12:38:35', NULL),
(23, 'Haviva Wagner', 'qomy287@mailinator.com', 'Aut mollit excepteur', 1, 1, 1, '2022-02-16 12:39:57', '2022-02-16 12:39:57', NULL),
(25, 'Haviva Wagner', 'qomy254@mailinator.com', 'Aut mollit excepteur', 1, 1, 1, '2022-02-16 12:45:52', '2022-02-16 12:45:52', NULL),
(26, 'Jenna Gates', 'degigapa@mailinator.com', 'Sit quidem aliquip q', 1, 1, 1, '2022-02-17 02:21:53', '2022-02-17 02:21:53', NULL),
(27, 'Ulric Browning', 'wyzameh@mailinator.com', 'Soluta aliquip recus', 1, 1, 1, '2022-02-17 02:43:45', '2022-02-17 02:43:45', NULL),
(28, 'Anne Kemp', 'mogobyr@mailinator.com', 'Voluptatem officia ', 1, 1, 1, '2022-02-17 03:39:49', '2022-02-17 03:39:49', NULL),
(29, 'Anne Kemp', 'mogobyaar@mailinator.com', 'Voluptatem officia ', 1, 1, 1, '2022-02-17 03:44:01', '2022-02-17 03:44:01', NULL),
(30, 'Shafira Lawrence', 'qybizemy@mailinator.com', 'Sit amet occaecat c', 1, 1, 1, '2022-02-17 03:44:15', '2022-02-17 03:44:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `institutes`
--

CREATE TABLE `institutes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institutes`
--

INSERT INTO `institutes` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'DIU', NULL, NULL, NULL);

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
(5, '2022_02_15_150540_create_divisions_table', 1),
(6, '2022_02_15_150554_create_districts_table', 1),
(7, '2022_02_15_150612_create_upazilas_table', 1),
(8, '2022_02_15_150648_create_boards_table', 1),
(9, '2022_02_15_150703_create_institutes_table', 1),
(10, '2022_02_15_150727_create_exams_table', 1),
(11, '2022_02_15_150858_create_general_users_table', 1),
(15, '2022_02_15_161058_create_general_educational_qualifications_table', 2),
(16, '2022_02_15_161120_create_general_languages_table', 3),
(17, '2022_02_15_161140_create_general_trainings_table', 3);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `name`, `bn_name`, `url`, `district_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dhanmondi', NULL, NULL, 1, NULL, NULL, NULL);

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
(1, 'admin', 'admin@gmail.com', NULL, '$2a$12$nsw5Zja1jHIhB2Y8P9jf0e3kg9ZTaHe4jD6Dbn3CNxPWDJiL4TXra', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_division_id_index` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_educational_qualifications`
--
ALTER TABLE `general_educational_qualifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `general_educational_qualifications_board_id_index` (`board_id`),
  ADD KEY `general_educational_qualifications_institute_id_index` (`institute_id`),
  ADD KEY `general_educational_qualifications_exam_id_index` (`exam_id`),
  ADD KEY `general_educational_qualifications_user_id_index` (`user_id`);

--
-- Indexes for table `general_languages`
--
ALTER TABLE `general_languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `general_languages_user_id_index` (`user_id`);

--
-- Indexes for table `general_trainings`
--
ALTER TABLE `general_trainings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `general_trainings_user_id_index` (`user_id`);

--
-- Indexes for table `general_users`
--
ALTER TABLE `general_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `general_users_email_unique` (`email`),
  ADD KEY `general_users_division_id_index` (`division_id`),
  ADD KEY `general_users_district_id_index` (`district_id`),
  ADD KEY `general_users_upazila_id_index` (`upazila_id`);

--
-- Indexes for table `institutes`
--
ALTER TABLE `institutes`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upazilas_district_id_index` (`district_id`);

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
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_educational_qualifications`
--
ALTER TABLE `general_educational_qualifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `general_languages`
--
ALTER TABLE `general_languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `general_trainings`
--
ALTER TABLE `general_trainings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `general_users`
--
ALTER TABLE `general_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `institutes`
--
ALTER TABLE `institutes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `general_educational_qualifications`
--
ALTER TABLE `general_educational_qualifications`
  ADD CONSTRAINT `general_educational_qualifications_board_id_foreign` FOREIGN KEY (`board_id`) REFERENCES `boards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `general_educational_qualifications_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `general_educational_qualifications_institute_id_foreign` FOREIGN KEY (`institute_id`) REFERENCES `institutes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `general_educational_qualifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `general_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `general_languages`
--
ALTER TABLE `general_languages`
  ADD CONSTRAINT `general_languages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `general_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `general_trainings`
--
ALTER TABLE `general_trainings`
  ADD CONSTRAINT `general_trainings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `general_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `general_users`
--
ALTER TABLE `general_users`
  ADD CONSTRAINT `general_users_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `general_users_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `general_users_upazila_id_foreign` FOREIGN KEY (`upazila_id`) REFERENCES `upazilas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD CONSTRAINT `upazilas_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
