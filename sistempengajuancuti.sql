-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for sistempengajuancuti
CREATE DATABASE IF NOT EXISTS `sistempengajuancuti` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sistempengajuancuti`;

-- Dumping structure for table sistempengajuancuti.cuti
CREATE TABLE IF NOT EXISTS `cuti` (
  `ID_Cuti` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Jenis_Cuti` int(11) NOT NULL,
  `Tanggal_Pengajuan` date DEFAULT NULL,
  `Tanggal_Mulai` date NOT NULL,
  `Tanggal_Berakhir` date NOT NULL,
  `Alasan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Surat_Hamil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Persetujuan` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `Pegawai_ID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID_Cuti`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sistempengajuancuti.cuti: ~12 rows (approximately)
/*!40000 ALTER TABLE `cuti` DISABLE KEYS */;
INSERT INTO `cuti` (`ID_Cuti`, `Jenis_Cuti`, `Tanggal_Pengajuan`, `Tanggal_Mulai`, `Tanggal_Berakhir`, `Alasan`, `Surat_Hamil`, `Persetujuan`, `Status`, `Pegawai_ID`, `created_at`, `updated_at`) VALUES
	(1, 3, '2020-09-07', '2020-09-26', '2020-09-26', 'Mager', '', 1, 0, '2', '2020-09-07 10:08:32', '2020-09-07 10:08:32'),
	(2, 3, '2020-09-07', '2020-09-19', '2020-09-19', 'Mager', '', 2, 1, '2', '2020-09-07 11:12:38', '2020-09-17 07:34:49'),
	(3, 1, '2020-09-07', '2020-09-19', '2020-09-19', 'Mager', '', 0, 3, '2', '2020-09-07 11:13:06', '2020-09-16 18:12:02'),
	(4, 4, '2020-09-07', '2020-09-17', '2020-09-17', 'Mager', '', 2, 1, '2', '2020-09-07 11:13:59', '2020-09-16 18:07:33'),
	(5, 3, '2020-09-07', '2020-09-19', '2020-09-19', 'Mager :(', '', 2, 0, '2', '2020-09-07 11:16:37', '2020-09-16 17:37:54'),
	(6, 2, '2020-09-07', '2020-09-26', '2020-09-26', 'Mager :(', '', 2, 0, '2', '2020-09-07 11:17:07', '2020-09-16 15:33:32'),
	(7, 2, '2020-09-07', '2020-09-18', '2020-09-18', 'Mager', '', 2, 0, '2', '2020-09-07 13:43:51', '2020-09-16 15:28:56'),
	(8, 2, '2020-09-07', '2020-09-19', '2020-09-19', 'Mager', '', 0, 0, '2', '2020-09-07 13:45:23', '2020-09-16 17:31:21'),
	(9, 2, '2020-09-12', '2020-09-19', '2020-09-19', 'Mager', '', 2, 0, '2', '2020-09-12 19:29:27', '2020-09-16 15:32:40'),
	(10, 5, '2020-09-19', '2020-09-30', '2020-09-30', 'Mager', '', 1, 0, '7', '2020-09-19 14:25:22', '2020-09-19 14:25:22'),
	(11, 4, '2020-09-20', '2020-09-22', '2020-09-30', 'Mager', '', 1, 2, '7', '2020-09-20 05:37:09', '2020-09-22 10:30:26'),
	(16, 6, '2020-09-22', '2020-09-30', '2020-10-08', 'Mager pake banget', '21694-2020-09-22-10-57-24.jpg', 1, 0, '7', '2020-09-22 10:57:24', '2020-09-22 10:57:24');
/*!40000 ALTER TABLE `cuti` ENABLE KEYS */;

-- Dumping structure for table sistempengajuancuti.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sistempengajuancuti.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table sistempengajuancuti.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sistempengajuancuti.migrations: ~6 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2020_08_17_154052_create_pegawai_tables', 1),
	(5, '2020_08_27_052542_create_cuti_tables', 1),
	(6, '2020_08_27_053138_create_perizinan_tables', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table sistempengajuancuti.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sistempengajuancuti.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('ikotori55@gmail.com', '$2y$10$hOJreEb/F9aiOZkzcA2PJ.58E1HshvTDv8p0huaEU0ybTJ1ihmbKq', '2020-09-19 13:40:10');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table sistempengajuancuti.pegawai
CREATE TABLE IF NOT EXISTS `pegawai` (
  `ID_Pegawai` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Nama_Depan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama_Belakang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jenis_Kelamin` int(11) NOT NULL,
  `Alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tempat_Lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `Jabatan` int(11) NOT NULL,
  `Divisi` int(11) NOT NULL DEFAULT '0',
  `Atasan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID_Pegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sistempengajuancuti.pegawai: ~4 rows (approximately)
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` (`ID_Pegawai`, `Nama_Depan`, `Nama_Belakang`, `Jenis_Kelamin`, `Alamat`, `Tempat_Lahir`, `Tanggal_Lahir`, `Jabatan`, `Divisi`, `Atasan`, `Foto`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'Rizal', 'Febrian', 1, 'Cisarua', 'Bandung', '2020-08-20', 2, 6, NULL, NULL, 1, '2020-08-28 20:27:50', '2020-08-29 08:14:37'),
	(2, 'Rizal', 'Febrian', 1, 'cisarua', 'bandung', '2020-08-28', 2, 4, NULL, NULL, 2, '2020-08-28 20:39:11', '2020-08-29 08:15:16'),
	(4, 'Danu', 'Nunu', 2, 'Cisarua Lembang', 'Bandung', '2020-09-30', 2, 1, 'Rizal Febrian', '17419-2020-09-03-13-53-09.png', 7, '2020-09-03 13:53:10', '2020-09-21 16:35:09'),
	(5, 'Rahandanu', 'Raachmat', 2, 'Cisarua Lembang', 'Bandung', '2020-09-17', 2, 2, 'Rahandanu Raachmat', '59119-2020-09-04-03-25-44.png', 8, '2020-09-03 14:02:24', '2020-09-04 03:25:44'),
	(6, 'Rahan', 'Danu', 2, 'Bandung', 'Bandung', '2020-09-25', 1, 2, 'Rizal Febrian', '80812-2020-09-12-09-01-43.jpg', 9, '2020-09-12 09:01:43', '2020-09-21 16:37:00'),
	(7, 'Itsuka', 'Kotori', 2, 'Jalan Haji Bakar', 'Bandung', '2020-09-25', 1, 3, 'Rizal Febrian', '90579-2020-09-19-10-44-32.jpg', 10, '2020-09-19 10:44:33', '2020-09-22 11:34:28');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;

-- Dumping structure for table sistempengajuancuti.perizinan
CREATE TABLE IF NOT EXISTS `perizinan` (
  `ID_Perizinan` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Status_Perizinan` int(11) DEFAULT NULL,
  `Tanggal_Persetujuan` date NOT NULL,
  `Pemegang_Persetujuan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `Catatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cuti_ID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID_Perizinan`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sistempengajuancuti.perizinan: ~11 rows (approximately)
/*!40000 ALTER TABLE `perizinan` DISABLE KEYS */;
INSERT INTO `perizinan` (`ID_Perizinan`, `Status_Perizinan`, `Tanggal_Persetujuan`, `Pemegang_Persetujuan`, `Catatan`, `Cuti_ID`, `created_at`, `updated_at`) VALUES
	(1, NULL, '2020-09-16', 'Rizal Febrian', NULL, 8, '2020-09-16 15:29:13', '2020-09-16 15:29:13'),
	(2, 1, '2020-09-16', 'Rizal Febrian', NULL, 9, '2020-09-16 15:30:10', '2020-09-16 15:30:10'),
	(3, 1, '2020-09-16', 'Rizal Febrian', NULL, 9, '2020-09-16 15:30:37', '2020-09-16 15:30:37'),
	(4, 1, '2020-09-16', 'Rizal Febrian', NULL, 9, '2020-09-16 15:32:40', '2020-09-16 15:32:40'),
	(5, 1, '2020-09-16', 'Rizal Febrian', NULL, 6, '2020-09-16 15:33:32', '2020-09-16 15:33:32'),
	(6, 1, '2020-09-16', 'Rizal Febrian', NULL, 9, '2020-09-16 15:34:59', '2020-09-16 15:34:59'),
	(7, 0, '2020-09-16', 'Rizal Febrian', 'Lu Nubb', 8, '2020-09-16 17:31:21', '2020-09-16 17:31:21'),
	(8, 0, '2020-09-16', 'Rizal Febrian', 'Lu nubb', 8, '2020-09-16 17:33:13', '2020-09-16 17:33:13'),
	(9, 1, '2020-09-16', 'Rizal Febrian', NULL, 5, '2020-09-16 17:37:54', '2020-09-16 17:37:54'),
	(10, 1, '2020-09-16', 'Rizal Febrian', NULL, 4, '2020-09-16 18:07:33', '2020-09-16 18:07:33'),
	(11, 0, '2020-09-16', 'Rizal Febrian', 'Tolak', 3, '2020-09-16 18:12:02', '2020-09-16 18:12:02'),
	(12, 1, '2020-09-17', 'Rizal Febrian', NULL, 2, '2020-09-17 07:34:49', '2020-09-17 07:34:49');
/*!40000 ALTER TABLE `perizinan` ENABLE KEYS */;

-- Dumping structure for table sistempengajuancuti.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table sistempengajuancuti.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `status`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Rizal', 2, 'rizal@gmail.com', NULL, '$2y$10$boSegqcCftAQpcuOX1C6X.u1IEFXuhTcxWk6SKoPnv7R3yXO0wuXi', 1, '', 'M1IBlqu6hVqij1huKlCAkJhcxjCbf67hkESul7rgkXAy23njTNWRM6YAoHak', '2020-08-28 20:27:50', '2020-09-21 16:36:19'),
	(2, 'Rizal', 2, 'rizal12@gmail.com', NULL, '$2y$10$4wxGOxPoZzC8nXp7ZMUa4eydzFFtEIK8i9mL06nlOTYiy.y1.u436', 1, '41801-2020-09-12-19-49-36.jpeg', 'TSjhhQ30RxErtYcpZ4hpB0YuQoHlIlyw16rprRLB1iTjBhJiL4hQQvWGvb97', '2020-08-28 20:39:11', '2020-09-12 19:55:15'),
	(7, 'Danu', 2, 'danu@gmail.com', NULL, '$2y$10$83qasmriX8Bwyqk.Ysinuupms8L6Uq9WyM86Cb8kEDEdhCfwhyYvS', 1, '17419-2020-09-03-13-53-09.png', 'UR0r2PfA09uP8GOL2cgwIWFONyohfbTvdktzhiX9C4GkSWu16e9qUBX3UYVz', '2020-09-03 13:53:10', '2020-09-03 13:53:10'),
	(8, 'Rahandanu', 2, 'danu45@gmail.com', NULL, '$2y$10$KCtBpSR6K/WPMVJg98rQIeYpcD7qOEKnU.C2PR.rJcgYy9C6GWHM6', 1, '55276-2020-09-03-14-02-24.jpeg', 'YoMQ51SWr8ypcBUNGvEc8VBJe9k1UlRFNk433sMxSPdruQ2GZXCXtIxbxZPF', '2020-09-03 14:02:24', '2020-09-12 11:17:11'),
	(9, 'Rahan', 1, 'rahandanu77@gmail.com', NULL, '$2y$10$4wxGOxPoZzC8nXp7ZMUa4eydzFFtEIK8i9mL06nlOTYiy.y1.u436', 1, '80812-2020-09-12-09-01-43.jpg', 'e3QBobs3AVwi9itEeGAsClCcv0RttDa02scMx0Whp2EOnfN3Z5z0uogEjOoJ', '2020-09-12 09:01:43', '2020-09-12 19:50:55'),
	(10, 'Itsuka', 3, 'ikotori55@gmail.com', NULL, '$2y$10$qnPzhXmN/bjPW0jQH5ViZ.Sy3m32yFq1N273ww.zEQqVGmRlOyPjy', 1, '90579-2020-09-19-10-44-32.jpg', 'NdSrOgmr4iI0asXbDtl7sIkx3s62HFRdJauSLdbdEfB1WjVZ1BbD9GbsGu1c', '2020-09-19 10:44:33', '2020-09-25 11:39:24');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
