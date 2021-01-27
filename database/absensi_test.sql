-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.36-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for absensi_test
CREATE DATABASE IF NOT EXISTS `absensi_test` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `absensi_test`;

-- Dumping structure for table absensi_test.absences
CREATE TABLE IF NOT EXISTS `absences` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `in_hour` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `out_hour` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `absences_user_id_foreign` (`user_id`),
  CONSTRAINT `absences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table absensi_test.absences: ~2 rows (approximately)
/*!40000 ALTER TABLE `absences` DISABLE KEYS */;
INSERT INTO `absences` (`id`, `in_hour`, `out_hour`, `user_id`, `created_at`, `updated_at`) VALUES
	(32, '2021-01-27 09:04:21', '2021-01-27 09:04:29', 4, '2021-01-27 09:04:21', '2021-01-27 09:04:29'),
	(33, '2021-01-27 09:06:44', '2021-01-27 09:06:53', 11, '2021-01-27 09:06:44', '2021-01-27 09:06:53');
/*!40000 ALTER TABLE `absences` ENABLE KEYS */;

-- Dumping structure for table absensi_test.divisions
CREATE TABLE IF NOT EXISTS `divisions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table absensi_test.divisions: ~5 rows (approximately)
/*!40000 ALTER TABLE `divisions` DISABLE KEYS */;
INSERT INTO `divisions` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(2, 'IT', '2021-01-26 16:23:13', '2021-01-26 16:23:13'),
	(3, 'Finance', '2021-01-26 16:23:13', '2021-01-26 16:23:13'),
	(4, 'Accounting', '2021-01-26 16:23:13', '2021-01-26 16:23:13'),
	(8, 'Food and Beverage', '2021-01-26 21:20:01', '2021-01-26 21:26:26'),
	(9, 'QA', '2021-01-26 21:23:54', '2021-01-26 21:28:45');
/*!40000 ALTER TABLE `divisions` ENABLE KEYS */;

-- Dumping structure for table absensi_test.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table absensi_test.migrations: ~7 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(11, '2014_10_12_000000_create_users_table', 1),
	(12, '2021_01_26_151833_create_role_table', 1),
	(13, '2021_01_26_151925_set_user_role_foreign', 1),
	(14, '2021_01_26_152131_create_absence_table', 1),
	(15, '2021_01_26_152328_set_user_absence_foreign', 1),
	(16, '2021_01_26_171120_add_remember_token_column', 2),
	(17, '2021_01_26_190917_chage_email_length', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table absensi_test.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` bigint(20) unsigned DEFAULT NULL,
  `role` enum('EMPLOYEE','ADMIN') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'EMPLOYEE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_division_id_foreign` (`division_id`),
  CONSTRAINT `users_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table absensi_test.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `name`, `password`, `division_id`, `role`, `created_at`, `updated_at`, `remember_token`) VALUES
	(1, 'admin@mail.com', 'Admin', '$2y$10$LlQk4SKTfr4yn7rcE9LiaOtxjG.XjbBxTpOSDPhleRp/ReYEgETSm', NULL, 'ADMIN', '2021-01-26 16:03:31', '2021-01-26 16:03:31', 'zIKkk5al23vLnLtZ5d3H6VQh3iQyREocgvZWn1dL73k9SIC0CJw2QKobxCFq'),
	(4, 'jeje@gmail.com', 'Elvina Hermawan', '$2y$10$wTQJ8VzVwR62rW7GksqtpuchpOct5xuTjndRhSjrSVUIh4lQoDvHG', 4, 'EMPLOYEE', '2021-01-26 18:54:49', '2021-01-26 18:54:49', '52hvgzjAxlyjLgLgHWnXzAFhaz7SwMUVylUrJt2pj42KwIO7IqnqktQHkJp0'),
	(11, 'test@gmail.com', 'Hitsam Tiammar', '$2y$10$SqMKHaqmCqH8KciZsUgFPugyl13ONvIM2XcL7kKR093sq.cArNBKe', 2, 'EMPLOYEE', '2021-01-26 21:33:57', '2021-01-27 09:05:58', 'AB0wvr3ce8Qk9sLUpoHNVEqaQaKU57lueJeYJzsfuWmDiQ6scEXcXaZ1Stf7');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
