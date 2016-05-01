-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2016 at 05:49 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `proyeku-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accepted_job`
--

CREATE TABLE IF NOT EXISTS `accepted_job` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `job_id` int(10) unsigned NOT NULL,
  `seeker_id` int(10) unsigned NOT NULL,
  `waktu_mulai` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `waktu_selesai` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `deskripsi` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `accepted_job_job_id_foreign` (`job_id`),
  KEY `accepted_job_seeker_id_foreign` (`seeker_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `accepted_job_links`
--

CREATE TABLE IF NOT EXISTS `accepted_job_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `accepted_job_id` int(10) unsigned NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `accepted_job_links_accepted_job_id_foreign` (`accepted_job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `kategori`) VALUES
(1, 'Test Alpha Category'),
(2, 'Test Beta Category'),
(3, 'Test Charlie Category'),
(4, 'Test Delta Category');

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_info`
--

CREATE TABLE IF NOT EXISTS `freelancer_info` (
  `user_info_id` int(10) unsigned NOT NULL,
  `available` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `freelancer_info`
--

INSERT INTO `freelancer_info` (`user_info_id`, `available`) VALUES
(2, 1),
(3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_info_skill`
--

CREATE TABLE IF NOT EXISTS `freelancer_info_skill` (
  `freelancer_info_id` int(10) unsigned NOT NULL,
  `skill` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`freelancer_info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `freelancer_info_id` int(10) unsigned NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8_unicode_ci NOT NULL,
  `upah_max` int(11) NOT NULL,
  `upah_min` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `job_freelancer_info_id_foreign` (`freelancer_info_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `freelancer_info_id`, `judul`, `deskripsi`, `upah_max`, `upah_min`) VALUES
(1, 2, 'First Admin Test Job', 'lorem ipsum dolor. this is an updated admin job test instance', 502, 252),
(2, 2, 'Admin Test Job Version 2', 'lorem ipsum dolor. this is second admin job test instance', 1000, 250),
(4, 2, 'Proyeku Software Engineer Job', 'Proyeku Software Engineer Job Desc', 200, 100),
(7, 2, 'Proyeku Data Scientist', 'machine learning, data mining', 5000000, 2000000),
(8, 3, 'Job from the moon', 'go to the moon', 200, 10);

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE IF NOT EXISTS `job_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `job_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `job_category_job_id_foreign` (`job_id`),
  KEY `job_category_category_id_foreign` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`id`, `job_id`, `category_id`) VALUES
(1, 1, 2),
(2, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_04_11_022111_create-user-info', 1),
('2016_04_11_025340_create-freelancer-info', 1),
('2016_04_13_150422_create-job-accjob', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Administrator', 'admin@proyeku.id', '$2y$10$.Prn3goHu7j6p3DZYSLB0.UAYTv8MpnrYOtbATWUzEtNOXhGwmD56', 'daJ9LVG06MCOEjmOcX9fPQT8ewGBHP5VYtXik9MoRXsY8d366y01hFWDxo4O', '2016-04-13 10:04:36', '2016-04-30 20:47:55'),
(3, 'Alpha', 'alpha@alpha.com', '$2y$10$lf8yeZlaeDjZAhqICCtbH.pCSriMVuPF18ANblLlH7dSeBLyLnnTS', 'HN4Zs5ab4hIRRktcvsnyvlBH1pcLIiHAtj50QteUeELQOdjFpYJFMhhWrNfY', '2016-04-13 18:31:25', '2016-04-13 18:31:27'),
(4, 'Beta', 'beta@beta.com', '$2y$10$GAOd4I0JnILzKxHWlC.SUun3tL7otgJ0SYdJ6B7sCuj4e4LxO7nJO', 'yL5o6SvTifhcCT1wLcoW4ttYgsElZwVFex7j58ryMGRwvI68dlylSe4eriuh', '2016-04-13 18:31:39', '2016-04-13 18:31:42'),
(5, 'Charlie', 'charlie@charlie.com', '$2y$10$euki6q5VF.uP99PN5ppBbeQxVoxNuQcmE0oicVs/bO0UTqShbBuA2', 'KqDmgjQ0ZW2Xs2iQ7slu0p2OSMcvA6kU44CTPY49Rmb3autIzqE5uFR6lOsu', '2016-04-13 18:31:57', '2016-04-13 18:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` int(10) unsigned NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `tanggal_lahir`, `alamat`, `jenis_kelamin`) VALUES
(2, '2016-04-14', 'Alamat administrator', 'P'),
(3, '2016-04-14', 'Alamat alpha', 'W'),
(4, '2016-04-14', 'Alamat Beta', 'P'),
(5, '2016-04-14', 'Alamat Charlie', 'W');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accepted_job`
--
ALTER TABLE `accepted_job`
  ADD CONSTRAINT `accepted_job_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`),
  ADD CONSTRAINT `accepted_job_seeker_id_foreign` FOREIGN KEY (`seeker_id`) REFERENCES `user_info` (`user_id`);

--
-- Constraints for table `accepted_job_links`
--
ALTER TABLE `accepted_job_links`
  ADD CONSTRAINT `accepted_job_links_accepted_job_id_foreign` FOREIGN KEY (`accepted_job_id`) REFERENCES `accepted_job` (`id`);

--
-- Constraints for table `freelancer_info`
--
ALTER TABLE `freelancer_info`
  ADD CONSTRAINT `freelancer_info_user_info_id_foreign` FOREIGN KEY (`user_info_id`) REFERENCES `user_info` (`user_id`);

--
-- Constraints for table `freelancer_info_skill`
--
ALTER TABLE `freelancer_info_skill`
  ADD CONSTRAINT `freelancer_info_skill_freelancer_info_id_foreign` FOREIGN KEY (`freelancer_info_id`) REFERENCES `freelancer_info` (`user_info_id`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_freelancer_info_id_foreign` FOREIGN KEY (`freelancer_info_id`) REFERENCES `freelancer_info` (`user_info_id`);

--
-- Constraints for table `job_category`
--
ALTER TABLE `job_category`
  ADD CONSTRAINT `job_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `job_category_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`);

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
