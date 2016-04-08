-- MySQL dump 10.16  Distrib 10.1.10-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: ardana
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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_id_unique` (`id`),
  UNIQUE KEY `admin_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'ivan','andrianto.ivan@yahoo.co.id','software_engineer','$2a$04$8.3FjpktiduEcJjiq7XLAusbdfNbIvLIkGhZFw6jHQwW34LvnkcP.','nJmsEY0PpNBnZvvSGHc3tsScsaaquK7JWjqFKM5bvjR9WWyPHNiOCZ8fwogK','2016-03-31 18:11:03','2016-04-01 01:51:13');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jenis` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `item_id_unique` (`id`),
  KEY `item_jenis_foreign` (`jenis`),
  CONSTRAINT `item_jenis_foreign` FOREIGN KEY (`jenis`) REFERENCES `jenis_item` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'Pulsa Operator A 50rb',52500,'2016-04-04 22:04:27','2016-04-04 22:07:33',1),(3,'Listrik',NULL,'2016-04-05 18:24:03','2016-04-05 18:24:03',2);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_item`
--

DROP TABLE IF EXISTS `jenis_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jenis_item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `jenis` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hasSelections` tinyint(1) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `jenis_item_id_unique` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_item`
--

LOCK TABLES `jenis_item` WRITE;
/*!40000 ALTER TABLE `jenis_item` DISABLE KEYS */;
INSERT INTO `jenis_item` VALUES (1,'pulsa','2016-04-05 15:26:31','2016-04-05 15:26:31',1,'Pembelian Pulsa','Masukkan no HP Anda'),(2,'listrik','2016-04-05 17:16:29','2016-04-05 17:16:29',0,'Pembayaran Listrik','Masukkan no Pelanggan Anda');
/*!40000 ALTER TABLE `jenis_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keuntungan`
--

DROP TABLE IF EXISTS `keuntungan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `keuntungan` (
  `tanggal` date NOT NULL,
  `merchant_id` int(10) unsigned NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  PRIMARY KEY (`tanggal`,`merchant_id`),
  KEY `keuntungan_merchant_id_foreign` (`merchant_id`),
  CONSTRAINT `keuntungan_merchant_id_foreign` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keuntungan`
--

LOCK TABLES `keuntungan` WRITE;
/*!40000 ALTER TABLE `keuntungan` DISABLE KEYS */;
/*!40000 ALTER TABLE `keuntungan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `merchant`
--

DROP TABLE IF EXISTS `merchant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `merchant` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telepon` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Diproses','Ditolak','Diterima') COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `merchant_id_unique` (`id`),
  UNIQUE KEY `merchant_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `merchant`
--

LOCK TABLES `merchant` WRITE;
/*!40000 ALTER TABLE `merchant` DISABLE KEYS */;
INSERT INTO `merchant` VALUES (1,'chibi','buntu1','0385','a.i@y.co.id','Diterima','1234',NULL,NULL,NULL),(2,'merchant A','Jl. Gila','08384714','andrianto.ivan@gmail.com','Diterima','$2a$04$Lbaq2uuaIlo1Sjsq8lb02ePAr6ryfernX0C803QLXVFVrGWRje2me','mh36qGZGVH1UqFmJsajcDzlAHx2ez8MegsRrwrbUwCyXvPyuux3qOlf33Bww','2016-04-01 01:41:43','2016-04-06 06:32:02'),(3,'Mesum','almt_mesum','0315991165','gila@yahoo.com','Diterima','12345678',NULL,'2016-04-04 22:47:11','2016-04-04 22:47:11'),(4,'Merchant Z','Gg Buntu 1','031599165','andrianto.ivan2@yahoo.co.id','Diterima','12345678',NULL,'2016-04-05 06:41:15','2016-04-05 06:41:15'),(5,'Merchant Z','Gg Buntu 1','031599165','andrianto.ivan3@yahoo.co.id','Diterima','12345678',NULL,'2016-04-05 06:43:53','2016-04-05 06:43:53'),(6,'Merchant Z','Gg Buntu 1','031599165','andrianto.ivan4@yahoo.co.id','Diterima','12345678',NULL,'2016-04-05 06:44:47','2016-04-05 06:44:47'),(7,'Chibi','Gg Buntu 1','0315991165','andrianto.ivan@yahoo.co.id','Diterima','abcdefgh',NULL,'2016-04-06 10:45:48','2016-04-06 10:45:48'),(8,'a','b','083857147117','andrianto.ivan5@yahoo.co.id','Diterima','abcdefgh',NULL,'2016-04-06 11:17:48','2016-04-06 11:17:48'),(9,'a','b','083857147117','andrianto.ivan6@yahoo.co.id','Diterima','abcdefgh',NULL,'2016-04-06 11:18:15','2016-04-06 11:18:15'),(10,'abc','abc','0315991165','andrianto.ivan7@yahoo.co.id','Diterima','abcdefgh',NULL,'2016-04-06 11:19:05','2016-04-06 11:19:05'),(11,'Gila','Gila','0315991165','gila@yahoo.co.id','Diterima','abcdefgh',NULL,'2016-04-06 11:57:47','2016-04-06 11:57:47'),(12,'Gila','Gila','0315991165','gila2@yahoo.com','Diterima','$2y$10$EmBaSFqdi15szEhUW3UczOGbZX7bmOy1qszOxtcT/GBR4x3CagAgO',NULL,'2016-04-06 12:13:53','2016-04-06 12:13:53');
/*!40000 ALTER TABLE `merchant` ENABLE KEYS */;
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
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_03_31_072004_create_merchant_table',1),('2016_03_31_072059_create_permohonan_table',1),('2016_03_31_072113_create_item_table',1),('2016_03_31_072136_create_transaksi_table',1),('2016_03_31_072155_create_keuntungan_table',1),('2016_03_31_142836_create_admin_table',2),('2016_04_05_151125_create_jenis_item_table',3),('2016_04_05_151353_modify_jenis_item',4),('2016_04_05_151640_modify_jenis_item_add',5),('2016_04_05_172757_add_columns_jenis_item',6),('2016_04_07_010542_add_keterangan_to_transaksi',7);
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
-- Table structure for table `permohonan`
--

DROP TABLE IF EXISTS `permohonan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permohonan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `merchant_id` int(10) unsigned NOT NULL,
  `status` enum('Diproses','Ditolak','Diterima') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permohonan_id_unique` (`id`),
  KEY `permohonan_merchant_id_foreign` (`merchant_id`),
  CONSTRAINT `permohonan_merchant_id_foreign` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permohonan`
--

LOCK TABLES `permohonan` WRITE;
/*!40000 ALTER TABLE `permohonan` DISABLE KEYS */;
INSERT INTO `permohonan` VALUES (1,6,'Diproses','2016-04-05 06:44:47','2016-04-05 06:44:47'),(2,7,'Diproses','2016-04-06 10:45:49','2016-04-06 10:45:49'),(3,8,'Diproses','2016-04-06 11:17:48','2016-04-06 11:17:48'),(4,9,'Diproses','2016-04-06 11:18:15','2016-04-06 11:18:15'),(5,10,'Diproses','2016-04-06 11:19:05','2016-04-06 11:19:05'),(6,11,'Diproses','2016-04-06 11:57:47','2016-04-06 11:57:47'),(7,12,'Diproses','2016-04-06 12:13:53','2016-04-06 12:13:53');
/*!40000 ALTER TABLE `permohonan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaksi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `merchant_id` int(10) unsigned NOT NULL,
  `item_id` int(10) unsigned NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `transaksi_id_unique` (`id`),
  KEY `transaksi_merchant_id_foreign` (`merchant_id`),
  KEY `transaksi_item_id_foreign` (`item_id`),
  CONSTRAINT `transaksi_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`),
  CONSTRAINT `transaksi_merchant_id_foreign` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` VALUES (1,12,1,52500,'2016-04-06 18:31:59','2016-04-06 18:31:59',''),(2,12,1,52500,'2016-04-06 18:41:04','2016-04-06 18:41:04','083857147117'),(3,12,1,52500,'2016-04-06 18:42:23','2016-04-06 18:42:23','083857147117');
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
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

-- Dump completed on 2016-04-08  8:30:24
