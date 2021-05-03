-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 03, 2021 at 02:54 PM
-- Server version: 5.7.33-0ubuntu0.18.04.1
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u_190133551_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoptions`
--

CREATE TABLE `adoptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userID` bigint(20) UNSIGNED NOT NULL,
  `animalID` bigint(20) UNSIGNED NOT NULL,
  `status` enum('accepted','denied','pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adoptions`
--

INSERT INTO `adoptions` (`id`, `userID`, `animalID`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'accepted', '2021-04-29 20:40:37', '2021-05-01 14:21:43'),
(2, 3, 1, 'denied', '2021-04-29 20:40:39', '2021-05-01 14:21:43'),
(3, 3, 1, 'denied', '2021-04-29 20:40:39', '2021-05-01 14:21:43'),
(4, 3, 1, 'denied', '2021-04-29 20:40:40', '2021-05-01 14:21:43'),
(5, 3, 1, 'denied', '2021-04-29 20:40:40', '2021-05-01 14:21:43'),
(6, 3, 1, 'denied', '2021-04-29 20:40:40', '2021-05-01 14:21:43'),
(7, 3, 1, 'denied', '2021-04-29 20:40:41', '2021-05-01 14:21:43'),
(8, 3, 1, 'denied', '2021-04-29 20:40:41', '2021-05-01 14:21:43'),
(9, 3, 1, 'denied', '2021-04-29 20:40:41', '2021-05-01 14:21:43'),
(10, 3, 1, 'denied', '2021-04-29 20:40:41', '2021-05-01 14:21:43'),
(11, 3, 1, 'denied', '2021-04-29 20:40:41', '2021-05-01 14:21:43'),
(12, 3, 1, 'denied', '2021-04-29 20:40:41', '2021-05-01 14:21:43'),
(13, 3, 1, 'denied', '2021-04-29 20:40:41', '2021-05-01 14:21:43'),
(14, 3, 1, 'denied', '2021-04-29 20:40:42', '2021-05-01 14:21:43'),
(15, 3, 1, 'denied', '2021-04-29 20:40:42', '2021-05-01 14:21:43'),
(16, 3, 1, 'denied', '2021-04-29 20:40:42', '2021-05-01 14:21:43'),
(17, 3, 1, 'denied', '2021-04-29 20:40:42', '2021-05-01 14:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` enum('dog','cat','bird','fish','other') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'other',
  `image` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `availability` enum('available','unavailable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `dob`, `description`, `group`, `image`, `image2`, `availability`, `created_at`, `updated_at`) VALUES
(1, 'Harvey', '2021-03-04', 'Harvey is a lively, young german sheppard, he loves daily walks and will love you to bits! He is very playful and enjoys playing catch in the park.', 'dog', 'German-Shepherd-on-White-00_1619457545.jpg', 'GermanShepherdAdultDogLayInGrassOutside_1619457545.jpg', 'unavailable', '2021-04-26 16:19:05', '2021-05-01 14:21:43');

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
(55, '2014_10_12_000000_create_users_table', 1),
(56, '2014_10_12_100000_create_password_resets_table', 1),
(57, '2019_08_19_000000_create_failed_jobs_table', 1),
(58, '2021_04_02_094333_create_people_table', 1),
(59, '2021_04_02_094345_create_animals_table', 1),
(60, '2021_04_07_134838_create_adoptions_table', 1);

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
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Staff', 'staff@admin.co.uk', NULL, 1, '$2y$10$kPyJD0OH3aAhEThdOpD1cucAX2InT8/.ujwQIMoeU9S7/TEkTZVPi', NULL, '2021-04-26 16:18:17', '2021-04-26 16:18:17'),
(2, 'Nonadmin', 'nonadmin@admin.co.uk', NULL, 0, '$2y$10$2lOSlvinxKw40It.wz3i3u5tVFU3i.4I3de5HqmSh.r90w4es2Gc2', NULL, '2021-04-26 16:19:33', '2021-04-26 16:19:33'),
(3, 'monkymonky', 'monkymonky@monky.ac.uk', NULL, 0, '$2y$10$MpVaSY7SpzgNTvy/5UqrxeDKzdGZsh7PO.73gIDQs97q/w.VaZdo6', NULL, '2021-04-29 20:40:31', '2021-04-29 20:40:31'),
(4, 'test', 'test@test.com', NULL, 0, '$2y$10$FBl/n8jTzAMTQElxvfEqHumY26DAUGZeJOHHq0b/l7/ZEo8S1JhyO', NULL, '2021-04-30 21:35:59', '2021-04-30 21:35:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoptions`
--
ALTER TABLE `adoptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adoptions_userid_foreign` (`userID`),
  ADD KEY `adoptions_animalid_foreign` (`animalID`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
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
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `people_username_unique` (`username`),
  ADD KEY `people_userid_foreign` (`userid`);

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
-- AUTO_INCREMENT for table `adoptions`
--
ALTER TABLE `adoptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoptions`
--
ALTER TABLE `adoptions`
  ADD CONSTRAINT `adoptions_animalid_foreign` FOREIGN KEY (`animalID`) REFERENCES `animals` (`id`),
  ADD CONSTRAINT `adoptions_userid_foreign` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constraints for table `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `people_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
