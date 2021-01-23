-- MySQL dump 10.13  Distrib 8.0.22, for osx10.15 (x86_64)
--
-- Host: localhost    Database: mds_tracking
-- ------------------------------------------------------
-- Server version	8.0.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (75,'2014_10_12_000000_create_users_table',1),(76,'2014_10_12_100000_create_password_resets_table',1),(77,'2019_08_19_000000_create_failed_jobs_table',1),(78,'2021_01_19_175454_create_tracker_table',1),(79,'2021_01_23_093329_add_mail_sent_to_tracker_table',1),(80,'2021_01_23_103726_add_stato_to_tracker_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tracker`
--

DROP TABLE IF EXISTS `tracker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tracker` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `codice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrizione` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_sent` tinyint(1) NOT NULL,
  `stato` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Non in reception',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tracker_codice_unique` (`codice`),
  KEY `tracker_user_id_foreign` (`user_id`),
  CONSTRAINT `tracker_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tracker`
--

LOCK TABLES `tracker` WRITE;
/*!40000 ALTER TABLE `tracker` DISABLE KEYS */;
INSERT INTO `tracker` VALUES (1,2,'43353-049','Spedizione 1 test',0,'Non in reception'),(2,4,'0071-0418','Spedizione 2',0,'Non in reception'),(3,4,'35356-876','Altra spedizione',0,'Non in reception'),(4,5,'56062-873','Spedizione -Consegnata',0,'Non in reception');
/*!40000 ALTER TABLE `tracker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `cognome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag_reception` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Reception','Reception','mds.devel+testphpreception@gmail.com','nsterndale0','$2y$10$w9MhaNVs7KAtWubELbj2K.SQJBiXsC5A.im1tOLy0tJxK0iZeX7kG',1),(2,'Kaylyn','Blackwood','mds.devel+testphp2@gmail.com','kblackwood1','$2y$10$l4VTqCKtCkO9TirReyAUR.Cb8d5ZNEUVDwd3MXOL1sOFEyO64urbq',0),(3,'Cori','Markus','mds.devel+testphp3@gmail.com','cmarkus2','$2y$10$l4VTqCKtCkO9TirReyAUR.Cb8d5ZNEUVDwd3MXOL1sOFEyO64urbq',0),(4,'Alvie','Triplett','mds.devel+testphp4@gmail.com','atriplett3','$2y$10$l4VTqCKtCkO9TirReyAUR.Cb8d5ZNEUVDwd3MXOL1sOFEyO64urbq',0),(5,'Rip','Odlin','mds.devel+testphp5@gmail.com','rodlin4','$2y$10$l4VTqCKtCkO9TirReyAUR.Cb8d5ZNEUVDwd3MXOL1sOFEyO64urbq',0),(6,'Decca','Scotter','mds.devel+testphp6@gmail.com','dscotter5','$2y$10$l4VTqCKtCkO9TirReyAUR.Cb8d5ZNEUVDwd3MXOL1sOFEyO64urbq',0),(7,'Stefano','Matic','mds.devel+testphp7@gmail.com','smatic6','$2y$10$l4VTqCKtCkO9TirReyAUR.Cb8d5ZNEUVDwd3MXOL1sOFEyO64urbq',0),(8,'Shaine','Boyen','mds.devel+testphp8@gmail.com','sboyen7','$2y$10$l4VTqCKtCkO9TirReyAUR.Cb8d5ZNEUVDwd3MXOL1sOFEyO64urbq',0),(9,'Elisabet','Eglinton','mds.devel+testphp9@gmail.com','eeglinton8','$2y$10$l4VTqCKtCkO9TirReyAUR.Cb8d5ZNEUVDwd3MXOL1sOFEyO64urbq',0),(10,'Sephira','Berthome','mds.devel+testphp10@gmail.com','sberthome9','$2y$10$l4VTqCKtCkO9TirReyAUR.Cb8d5ZNEUVDwd3MXOL1sOFEyO64urbq',0),(11,'Celka','Tabbernor','mds.devel+testphp11@gmail.com','ctabbernora','$2y$10$l4VTqCKtCkO9TirReyAUR.Cb8d5ZNEUVDwd3MXOL1sOFEyO64urbq',0),(12,'Fidel','Renison','mds.devel+testphp12@gmail.com','frenisonb','$2y$10$l4VTqCKtCkO9TirReyAUR.Cb8d5ZNEUVDwd3MXOL1sOFEyO64urbq',0),(13,'Lonny','Larver','mds.devel+testphp13@gmail.com','llarverc','$2y$10$l4VTqCKtCkO9TirReyAUR.Cb8d5ZNEUVDwd3MXOL1sOFEyO64urbq',0),(14,'Hardy','Agge','mds.devel+testphp14@gmail.com','hagged','$2y$10$l4VTqCKtCkO9TirReyAUR.Cb8d5ZNEUVDwd3MXOL1sOFEyO64urbq',0),(15,'Inger','Corson','mds.devel+testphp15@gmail.com','icorsone','$2y$10$l4VTqCKtCkO9TirReyAUR.Cb8d5ZNEUVDwd3MXOL1sOFEyO64urbq',0),(16,'Britt','Twiddle','mds.devel+testphp16@gmail.com','btwiddlef','$2y$10$l4VTqCKtCkO9TirReyAUR.Cb8d5ZNEUVDwd3MXOL1sOFEyO64urbq',0),(17,'Kaye','Astin','mds.devel+testphp17@gmail.com','kasting','$2y$10$l4VTqCKtCkO9TirReyAUR.Cb8d5ZNEUVDwd3MXOL1sOFEyO64urbq',0),(18,'Rickie','Antao','mds.devel+testphp18@gmail.com','rantaoh','$2y$10$l4VTqCKtCkO9TirReyAUR.Cb8d5ZNEUVDwd3MXOL1sOFEyO64urbq',0),(19,'Aluino','Pinchback','mds.devel+testphp19@gmail.com','apinchbacki','$2y$10$l4VTqCKtCkO9TirReyAUR.Cb8d5ZNEUVDwd3MXOL1sOFEyO64urbq',0),(20,'Stefan','Gonzalvo','mds.devel+testphp20@gmail.com','sgonzalvoj','$2y$10$l4VTqCKtCkO9TirReyAUR.Cb8d5ZNEUVDwd3MXOL1sOFEyO64urbq',0);
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

-- Dump completed on 2021-01-23 13:09:40
