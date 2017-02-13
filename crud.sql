-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.6.21 - MySQL Community Server (GPL)
-- OS Server:                    Win32
-- HeidiSQL Versi:               9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Membuang struktur basisdata untuk crud
CREATE DATABASE IF NOT EXISTS `crud` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `crud`;

-- membuang struktur untuk table crud.tbl_article
CREATE TABLE IF NOT EXISTS `tbl_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) DEFAULT NULL,
  `isi` text,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel crud.tbl_article: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `tbl_article` DISABLE KEYS */;
REPLACE INTO `tbl_article` (`id`, `judul`, `isi`, `created_at`, `updated_at`) VALUES
	(2, 'Judul2', 'ini adalah judul 244', '2017-02-10', '2017-02-11'),
	(3, 'Judul 3', 'Ini adalah judul 33', '2017-02-10', '2017-02-11');
/*!40000 ALTER TABLE `tbl_article` ENABLE KEYS */;

-- membuang struktur untuk table crud.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel crud.users: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `username`, `password`, `email`, `created_at`) VALUES
	(11, 'aldi', '$2y$10$j7376a/MuKO/f/GimkyCg.ErwyzujiGPkOKgLWGtxpYYTO9ZVoBVO', 'aldi@gmail.com', '2017-02-13 09:29:46'),
	(12, 'edwin', '$2y$10$6LkllVbpbUKubULb/xZHhe7Y7ZsChwtNjuWnxJz9UnqLQSP4xvDLe', 'eputra35@gmail.com', '2017-02-13 09:29:48'),
	(14, 'rina', '$2y$10$NFALTqt1Umd.iCBxXIazRe1UF2Sfw4kF4gUq.vHkVwkQ7avwa6Uwu', 'rina', '2017-02-13 03:33:10');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
