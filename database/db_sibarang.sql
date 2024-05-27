-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_sibarang
CREATE DATABASE IF NOT EXISTS `db_sibarang` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_sibarang`;

-- Dumping structure for table db_sibarang.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` char(10) NOT NULL,
  `nama_admin` varchar(50) DEFAULT NULL,
  `alamat_admin` varchar(255) DEFAULT NULL,
  `posisi_admin` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_sibarang.admin: ~2 rows (approximately)
INSERT INTO `admin` (`id_admin`, `nama_admin`, `alamat_admin`, `posisi_admin`, `password`) VALUES
	('K202405001', 'Chitos', 'Denpasar, Bali', 'Admin Maintenance', 'ch1');

-- Dumping structure for table db_sibarang.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `kode_barang` char(6) NOT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  PRIMARY KEY (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_sibarang.barang: ~2 rows (approximately)
INSERT INTO `barang` (`kode_barang`, `nama_barang`, `jumlah`) VALUES
	('BRG001', 'Laptop Acer', 10),
	('BRG002', 'Laptop ASUS', 10),
	('BRG003', 'Solder', 10),
	('BRG004', 'Router', 10);

-- Dumping structure for table db_sibarang.detail_peminjaman
CREATE TABLE IF NOT EXISTS `detail_peminjaman` (
  `id_detail_peminjaman` int NOT NULL AUTO_INCREMENT,
  `kode_peminjaman` char(12) DEFAULT NULL,
  `kode_barang` char(6) DEFAULT NULL,
  PRIMARY KEY (`id_detail_peminjaman`),
  KEY `kode_peminjaman` (`kode_peminjaman`),
  KEY `kode_barang` (`kode_barang`),
  CONSTRAINT `detail_peminjaman_ibfk_1` FOREIGN KEY (`kode_peminjaman`) REFERENCES `peminjaman` (`kode_peminjaman`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_peminjaman_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_sibarang.detail_peminjaman: ~4 rows (approximately)

-- Dumping structure for table db_sibarang.karyawan
CREATE TABLE IF NOT EXISTS `karyawan` (
  `id_karyawan` char(10) NOT NULL,
  `nama_karyawan` varchar(50) DEFAULT NULL,
  `alamat_karyawan` varchar(255) DEFAULT NULL,
  `posisi_karyawan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_sibarang.karyawan: ~1 rows (approximately)
INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `alamat_karyawan`, `posisi_karyawan`) VALUES
	('K202405011', 'Karyawan 1', 'Buleleng, Bali', 'Posisi 1'),
	('K202405012', 'Karyawan 2', 'Gianyar, Bali', 'Posisi 2');

-- Dumping structure for table db_sibarang.peminjaman
CREATE TABLE IF NOT EXISTS `peminjaman` (
  `kode_peminjaman` char(12) NOT NULL,
  `id_admin` char(10) DEFAULT NULL,
  `id_karyawan` char(10) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `tgl_peminjaman` date DEFAULT NULL,
  PRIMARY KEY (`kode_peminjaman`),
  KEY `id_admin` (`id_admin`),
  KEY `id_karyawan` (`id_karyawan`),
  CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_sibarang.peminjaman: ~0 rows (approximately)

-- Dumping structure for table db_sibarang.profile
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int NOT NULL AUTO_INCREMENT,
  `appName` varchar(50) DEFAULT NULL,
  `companyName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_sibarang.profile: ~2 rows (approximately)
INSERT INTO `profile` (`id`, `appName`, `companyName`) VALUES
	(1, 'SIBARANG', 'PT. MABUK KODING');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
