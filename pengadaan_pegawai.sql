-- MySQL dump 10.16  Distrib 10.1.10-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: pengadaan_pegawai
-- ------------------------------------------------------
-- Server version	10.1.10-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alokasi`
--

DROP TABLE IF EXISTS `alokasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alokasi` (
  `cpns_nik` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `divisi` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `kebutuhan` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cpns_nik`,`divisi`,`kebutuhan`),
  KEY `alokasi_divisi_foreign` (`divisi`),
  KEY `alokasi_kebutuhan_foreign` (`kebutuhan`),
  CONSTRAINT `alokasi_cpns_nik_foreign` FOREIGN KEY (`cpns_nik`) REFERENCES `cpns` (`nik`),
  CONSTRAINT `alokasi_divisi_foreign` FOREIGN KEY (`divisi`) REFERENCES `divisi` (`nama_divisi`),
  CONSTRAINT `alokasi_kebutuhan_foreign` FOREIGN KEY (`kebutuhan`) REFERENCES `kebutuhan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alokasi`
--

LOCK TABLES `alokasi` WRITE;
/*!40000 ALTER TABLE `alokasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `alokasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cpns`
--

DROP TABLE IF EXISTS `cpns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cpns` (
  `nik` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `no_telp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ipk` double(4,3) NOT NULL,
  `hasil_tes` double(6,4) NOT NULL,
  `jurusan` int(10) unsigned NOT NULL,
  `pendidikan_akhir` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`nik`),
  UNIQUE KEY `cpns_nik_unique` (`nik`),
  KEY `cpns_jurusan_foreign` (`jurusan`),
  KEY `cpns_pendidikan_akhir_foreign` (`pendidikan_akhir`),
  CONSTRAINT `cpns_jurusan_foreign` FOREIGN KEY (`jurusan`) REFERENCES `jurusan` (`id`),
  CONSTRAINT `cpns_pendidikan_akhir_foreign` FOREIGN KEY (`pendidikan_akhir`) REFERENCES `pendidikan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cpns`
--

LOCK TABLES `cpns` WRITE;
/*!40000 ALTER TABLE `cpns` DISABLE KEYS */;
INSERT INTO `cpns` VALUES ('3578091503950002','Ivan Andrianto2','MJP3D17','083857147117','andrianto.ivan@yahoo.co.id','images/foto_ivan',3.000,50.0000,1,1,'2016-03-29 02:38:57','2016-03-28 19:39:25');
/*!40000 ALTER TABLE `cpns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `divisi`
--

DROP TABLE IF EXISTS `divisi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `divisi` (
  `syarat_hasil_tes` text COLLATE utf8_unicode_ci NOT NULL,
  `nama_departemen` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nama_divisi` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `kuota` int(11) NOT NULL,
  `ipk` double(4,3) NOT NULL,
  `syarat_pendidikan` int(10) unsigned NOT NULL,
  `syarat_jurusan` int(10) unsigned NOT NULL,
  `kebutuhan_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`nama_divisi`,`kebutuhan_id`),
  KEY `divisi_syarat_pendidikan_foreign` (`syarat_pendidikan`),
  KEY `divisi_syarat_jurusan_foreign` (`syarat_jurusan`),
  KEY `divisi_kebutuhan_id_foreign` (`kebutuhan_id`),
  CONSTRAINT `divisi_kebutuhan_id_foreign` FOREIGN KEY (`kebutuhan_id`) REFERENCES `kebutuhan` (`id`),
  CONSTRAINT `divisi_syarat_jurusan_foreign` FOREIGN KEY (`syarat_jurusan`) REFERENCES `jurusan` (`id`),
  CONSTRAINT `divisi_syarat_pendidikan_foreign` FOREIGN KEY (`syarat_pendidikan`) REFERENCES `pendidikan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `divisi`
--

LOCK TABLES `divisi` WRITE;
/*!40000 ALTER TABLE `divisi` DISABLE KEYS */;
/*!40000 ALTER TABLE `divisi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jurusan`
--

DROP TABLE IF EXISTS `jurusan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jurusan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `jurusan_id_unique` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jurusan`
--

LOCK TABLES `jurusan` WRITE;
/*!40000 ALTER TABLE `jurusan` DISABLE KEYS */;
INSERT INTO `jurusan` VALUES (1,'Teknik Informatika',NULL,NULL);
/*!40000 ALTER TABLE `jurusan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kebutuhan`
--

DROP TABLE IF EXISTS `kebutuhan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kebutuhan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_instansi` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kebutuhan_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kebutuhan`
--

LOCK TABLES `kebutuhan` WRITE;
/*!40000 ALTER TABLE `kebutuhan` DISABLE KEYS */;
/*!40000 ALTER TABLE `kebutuhan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_03_28_073959_create_pendidikan_table',1),('2016_03_28_074012_create_jurusan_table',1),('2016_03_28_110858_create_kebutuhan_table',1),('2016_03_28_113426_create_divisi_table',1),('2016_03_28_124927_create_cpns_table',1),('2016_03_28_124928_create_alokasi_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pendidikan`
--

DROP TABLE IF EXISTS `pendidikan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pendidikan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tingkat` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pendidikan_id_unique` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pendidikan`
--

LOCK TABLES `pendidikan` WRITE;
/*!40000 ALTER TABLE `pendidikan` DISABLE KEYS */;
INSERT INTO `pendidikan` VALUES (1,'SMA');
/*!40000 ALTER TABLE `pendidikan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-29 10:00:22
