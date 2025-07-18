-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: taskmanager
-- ------------------------------------------------------
-- Server version	8.0.42

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `attachments`
--

DROP TABLE IF EXISTS `attachments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attachments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `issue_id` bigint unsigned NOT NULL,
  `uploaded_by` bigint unsigned NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attachments_issue_id_foreign` (`issue_id`),
  KEY `attachments_uploaded_by_foreign` (`uploaded_by`),
  CONSTRAINT `attachments_issue_id_foreign` FOREIGN KEY (`issue_id`) REFERENCES `issues` (`id`) ON DELETE CASCADE,
  CONSTRAINT `attachments_uploaded_by_foreign` FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attachments`
--

LOCK TABLES `attachments` WRITE;
/*!40000 ALTER TABLE `attachments` DISABLE KEYS */;
/*!40000 ALTER TABLE `attachments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('laravel_cache_356a192b7913b04c54574d18c28d46e6395428ab:timer','i:1752748656;',1752748656),('laravel_cache_spatie.permission.cache','a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:25:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:9:\"user-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:3;i:1;i:4;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:11:\"user-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:3;i:1;i:4;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:9:\"user-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:3;i:1;i:4;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:11:\"user-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:9:\"user-view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:3;i:1;i:4;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:11:\"module-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:13:\"module-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:3;i:1;i:4;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:11:\"module-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:3;i:1;i:4;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:13:\"module-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:11:\"module-view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:3;i:1;i:4;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:10:\"issue-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:4:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:12:\"issue-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:10:\"issue-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:12:\"issue-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:10:\"issue-view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:4:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:9:\"role-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:3;i:1;i:4;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:11:\"role-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:3;i:1;i:4;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:9:\"role-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:3;i:1;i:4;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:11:\"role-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:9:\"role-view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:3;i:1;i:4;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:15:\"permission-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:3;i:1;i:4;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:17:\"permission-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:3;i:1;i:4;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:15:\"permission-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:3;i:1;i:4;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:17:\"permission-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:15:\"permission-view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:3;i:1;i:4;}}}s:5:\"roles\";a:4:{i:0;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:4;s:1:\"b\";s:11:\"super_admin\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:8:\"reporter\";s:1:\"c\";s:3:\"web\";}i:3;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:6:\"vendor\";s:1:\"c\";s:3:\"web\";}}}',1752794394);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `issue_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `visibility` enum('public','internal') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_issue_id_foreign` (`issue_id`),
  KEY `comments_user_id_foreign` (`user_id`),
  CONSTRAINT `comments_issue_id_foreign` FOREIGN KEY (`issue_id`) REFERENCES `issues` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Table structure for table `issues`
--

DROP TABLE IF EXISTS `issues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issues` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `reporter_id` bigint unsigned NOT NULL,
  `module_id` bigint unsigned NOT NULL,
  `assigned_to` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` enum('low','medium','high','critical') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'medium',
  `status` enum('new','assigned','in_progress','resolved','closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `reported_date` timestamp NULL DEFAULT NULL,
  `sla_due_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `issues_reporter_id_foreign` (`reporter_id`),
  KEY `issues_module_id_foreign` (`module_id`),
  KEY `issues_assigned_to_foreign` (`assigned_to`),
  CONSTRAINT `issues_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `issues_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE,
  CONSTRAINT `issues_reporter_id_foreign` FOREIGN KEY (`reporter_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issues`
--

LOCK TABLES `issues` WRITE;
/*!40000 ALTER TABLE `issues` DISABLE KEYS */;
INSERT INTO `issues` VALUES (6,7,9,NULL,'BRD of CRM for Ticket management','Admin power to HO Complaint Cell for addition/modification of categories/sub-categories','high','new','2025-03-26 18:30:00','2025-07-06 18:30:00','2025-07-07 01:18:38','2025-07-07 01:18:38'),(7,7,10,NULL,'BRD of CRM for Ticket management','All Reporting Requirements as per BRD shared by Complaint cell','high','new','2025-03-26 18:30:00','2025-07-06 18:30:00','2025-07-07 01:19:29','2025-07-07 01:19:29'),(8,7,10,NULL,'Test checks screenshots','Observation points from Complaint cell','high','new','2025-06-04 18:30:00','2025-07-06 18:30:00','2025-07-07 01:20:11','2025-07-07 01:20:11'),(9,7,9,NULL,'SPGRS module | Grievances module','SPGRS observations and Reporting requirements shared by Complaint cell','high','new','2025-06-17 18:30:00','2025-07-06 18:30:00','2025-07-07 01:23:24','2025-07-07 01:23:24'),(10,7,9,NULL,'Sharing of HO/ZO/BO wise assignee details for assignment of Leads and Tickets in the CRM solution','Implementation of the assignment logic in the solution as per trail mail for complaints and leads.','high','new','2025-06-23 18:30:00','2025-07-06 18:30:00','2025-07-07 01:24:21','2025-07-07 01:24:21'),(11,7,9,NULL,'Reports of CRM complaints','Make the \"Description of complaint field as mandatory field\" while lodging complaints in the Grievance/Ticket module in CRM.','high','new','2025-06-26 18:30:00','2025-07-06 18:30:00','2025-07-07 01:24:56','2025-07-07 01:24:56'),(12,7,10,NULL,'Data Migration approach document and APIs request and response parameters','Data Migration approach document and APIs request and response parameters. The document which was shared didn\'t contain the required APIs request and response for daily data sync, customer tab, acocunts tab and customer 360.','medium','new','2025-05-16 18:30:00','2025-07-06 18:30:00','2025-07-07 01:26:18','2025-07-07 01:26:18'),(13,7,11,NULL,'Regarding events in the CRM solution for triggering of sms\'es','Not all whitelisted sms\'es were configured into CRM solution','critical','new','2025-05-19 18:30:00','2025-07-06 18:30:00','2025-07-07 01:27:38','2025-07-07 01:27:38'),(14,7,12,NULL,'Email Integration | CRM Solution | Karix','Email integration with the Marketing instance','high','new','2025-05-25 18:30:00','2025-07-06 18:30:00','2025-07-07 01:28:59','2025-07-07 01:28:59'),(15,7,13,NULL,'Request for Confirmation and Screenshots of Licensed Software Configuration (UAT, DC & DR Sites)','Confirmation regarding the licensed versions of all third-party software components being used in the CRM solution across the UAT, Data Center (DC), and Disaster Recovery (DR) environments','medium','new','2025-05-26 18:30:00','2025-07-06 18:30:00','2025-07-07 01:30:28','2025-07-07 01:30:28'),(16,7,14,NULL,'Marketing Instance Observations','Issues in Marketing UAT solution','high','new','2025-05-27 18:30:00','2025-07-06 18:30:00','2025-07-07 01:34:03','2025-07-07 01:34:03'),(17,7,16,NULL,'Regarding Contact Centre staff- Hyderabad and Noida','Complete staff details of the contact center of both the Hyderabad and Noida locations','medium','new','2025-06-02 18:30:00','2025-07-06 18:30:00','2025-07-07 01:35:06','2025-07-07 01:35:06'),(18,7,17,NULL,'Password vaulting in new PAM || Transformation','Password vaulting in new PAM','medium','new','2025-06-04 18:30:00','2025-07-06 18:30:00','2025-07-07 01:35:56','2025-07-07 01:35:56'),(19,7,18,NULL,'Go-Live Planning Activity','Installation for EPC and OPM agents on a Windows server','medium','new','2025-06-08 18:30:00','2025-07-06 18:30:00','2025-07-07 01:36:39','2025-07-07 01:36:39'),(20,7,19,NULL,'Email sign off doc','Email signoff of CRM UAT along with CR for production movement','medium','new','2025-06-09 18:30:00','2025-07-06 18:30:00','2025-07-07 01:37:25','2025-07-07 01:37:25'),(21,7,20,NULL,'Go-Live Planning Activity','Marketing solution not opening via Internet (you were requested to provide the Root Cause Analysis (RCA) for this inaccessibility, along with the current status)','high','new','2025-06-09 18:30:00','2025-07-06 18:30:00','2025-07-07 01:39:23','2025-07-07 01:39:23'),(22,7,16,NULL,'Asset Inventory update for Contact Center','Asset Inventory update for Contact Center','high','new','2025-06-10 18:30:00','2025-07-06 18:30:00','2025-07-07 01:40:36','2025-07-07 01:40:36'),(23,7,21,NULL,'Go-Live Planning Activity','CRM DR Solution not configured','high','new','2025-06-10 18:30:00','2025-07-06 18:30:00','2025-07-07 01:45:36','2025-07-07 01:45:36'),(24,7,20,NULL,'Go-Live Planning Activity','Unable to login Marketing DR via AD credentials','high','new','2025-06-10 18:30:00','2025-07-06 18:30:00','2025-07-07 01:49:56','2025-07-07 01:49:56'),(25,7,37,NULL,'Debit Card Block APIs | CRM Integration','Debit Card APIs testing','high','new','2025-06-11 18:30:00','2025-07-06 18:30:00','2025-07-07 01:51:50','2025-07-07 01:51:50'),(26,7,22,NULL,'Progress Status for observations','Further UAT observations on the 35 observations','high','new','2025-06-11 18:30:00','2025-07-06 18:30:00','2025-07-07 01:52:31','2025-07-07 01:52:31'),(27,7,23,NULL,'Progress Status for observations','Customer Account Transaction view with date range for customer enquiry purposes.\r\nAccount Lien Balance.\r\nAccount Hold Balance (Cheques in Clearing).\r\nFreeze Remarks.','high','new','2025-06-11 18:30:00','2025-07-06 18:30:00','2025-07-07 01:53:20','2025-07-07 01:53:20'),(28,7,23,NULL,'CRM UAT Not Working','Nonfunctioning of API\'s and RCA sought','critical','new','2025-06-12 18:30:00','2025-07-06 18:30:00','2025-07-07 01:54:44','2025-07-07 01:54:44'),(29,7,23,NULL,'Go-Live Planning Activity','SSL Certificate installation in Marketing DR via Internet','critical','new','2025-06-15 18:30:00','2025-07-06 18:30:00','2025-07-07 01:55:33','2025-07-07 01:55:33'),(30,7,23,NULL,'Enabling Document Previews supportive document','Unable to view documents in CRM UAT','high','new','2025-06-15 18:30:00','2025-07-06 18:30:00','2025-07-07 01:56:36','2025-07-07 01:56:36'),(31,7,23,NULL,'Punjab & Sind Bank: UAT Release - SPGRS','Brief positive testing observations on the SPGRS UAT','high','new','2025-06-16 18:30:00','2025-07-06 18:30:00','2025-07-07 01:57:50','2025-07-07 01:57:50'),(32,7,23,NULL,'Progress Status for observations','Provide the eye view icon with the account number to open the customer 360.','critical','new','2025-06-17 18:30:00','2025-07-06 18:30:00','2025-07-07 01:58:30','2025-07-07 01:58:30'),(33,7,24,NULL,'SPGRS UAT Observations','To enhance look and feel of the main SPGRS page, we have already discussed with Harsh/Pranav, sample screenshot is attached.','high','new','2025-06-18 18:30:00','2025-07-06 18:30:00','2025-07-07 01:59:02','2025-07-07 01:59:02'),(34,7,24,NULL,'SPGRS UAT Observations','Send OTP button should come behind or beside the captcha field similar to track complaint','medium','new','2025-06-18 18:30:00','2025-07-06 18:30:00','2025-07-07 02:00:11','2025-07-07 02:00:11'),(35,7,24,NULL,'SPGRS UAT Observations','Not all accounts are getting populated with existing mobile number (sample-\"9878550304\"entered)','high','new','2025-06-18 18:30:00','2025-07-06 18:30:00','2025-07-07 02:00:37','2025-07-07 02:00:37'),(36,7,24,NULL,'SPGRS UAT Observations','State not getting populated','high','new','2025-06-18 18:30:00','2025-07-06 18:30:00','2025-07-07 02:01:16','2025-07-07 02:01:16'),(37,7,24,NULL,'SPGRS UAT Observations','District not getting populated','high','new','2025-06-18 18:30:00','2025-07-06 18:30:00','2025-07-07 02:02:16','2025-07-07 02:02:16'),(38,7,24,NULL,'SPGRS UAT Observations','Captcha should not come again after OTP is generated','medium','new','2025-06-18 18:30:00','2025-07-06 18:30:00','2025-07-07 02:02:44','2025-07-07 02:02:44'),(39,7,24,NULL,'SPGRS UAT Observations','Unable to lodge or track complaint via email id, no otp getting generated or otp authentication is failing when otp is received','high','new','2025-06-18 18:30:00','2025-07-06 18:30:00','2025-07-07 02:03:20','2025-07-07 02:03:20'),(40,7,24,NULL,'SPGRS UAT Observations','Extreme delay in generation of the complaint id (Reference Number) after the complaint is lodged/saved','critical','new','2025-06-18 18:30:00','2025-07-06 18:30:00','2025-07-07 02:04:16','2025-07-07 02:04:16'),(41,7,24,NULL,'SPGRS UAT Observations','Assignment details not coming CRMUAT against the complaint lodged via SPGRS thereby affecting visibility','high','new','2025-06-18 18:30:00','2025-07-06 18:30:00','2025-07-07 02:04:46','2025-07-07 02:04:46'),(42,7,24,NULL,'SPGRS UAT Observations','The complaint lodged via SPGRS is being allowed to be edited by any user in CRMUAT whereas it should only be allowed to be edited by the concerned users (i.e., it should follow the process of grievance/complaint module of CRM solution- when complaint is lodged in CRM itself)','critical','new','2025-06-18 18:30:00','2025-07-06 18:30:00','2025-07-07 02:05:45','2025-07-07 02:05:45'),(43,7,24,NULL,'SPGRS UAT Observations','Correct the date-time format in tracking complaint','high','new','2025-06-18 18:30:00','2025-07-06 18:30:00','2025-07-07 02:06:21','2025-07-07 02:06:21'),(44,7,24,NULL,'SPGRS UAT Observations','Resolution field in tracking complaint should come below the other fields as a standalone field','high','new','2025-06-18 18:30:00','2025-07-06 18:30:00','2025-07-07 02:07:05','2025-07-07 02:07:05'),(45,7,24,NULL,'SPGRS UAT Observations','Session doesn\'t get idle timed out','high','new','2025-06-19 18:30:00','2025-07-06 18:30:00','2025-07-07 02:07:43','2025-07-07 02:07:43'),(46,7,24,NULL,'SPGRS UAT Observations','unable to view documents in CRM UAT after complaint lodged in SPGRS (mail was already sent on 16.06.2025)','high','new','2025-06-15 18:30:00','2025-07-06 18:30:00','2025-07-07 02:08:35','2025-07-07 02:08:35'),(47,7,24,NULL,'Regarding Pendency\'s/Observations','Additional field required in the form for Customer ID. On the basis of selected customer ID, account no should be fetched on SPGRS webform','high','new','2025-06-19 18:30:00','2025-07-06 18:30:00','2025-07-07 02:09:19','2025-07-07 02:09:19'),(48,7,25,NULL,'Email sign off doc','CR for email production movement','high','new','2025-06-19 18:30:00','2025-07-06 18:30:00','2025-07-07 02:10:32','2025-07-07 02:10:32'),(49,7,23,NULL,'Regarding Pendency\'s/Observations','Hamburger menu must be expanded by default in CRM/Marketing, currently it is in contracted form.','high','new','2025-06-22 18:30:00','2025-07-06 18:30:00','2025-07-07 02:13:23','2025-07-07 02:13:23'),(50,7,24,NULL,'Regarding Pendency\'s/Observations','Description of the complaint lodged in SPGRS has to be made symmetrical while getting viewed in CRM (i.e. field must be along-side rest of the Complaint details.','high','new','2025-06-22 18:30:00','2025-07-06 18:30:00','2025-07-07 02:14:25','2025-07-07 02:14:25'),(51,7,24,NULL,'Regarding Pendency\'s/Observations','OTP not getting received on email while lodging complaint in SPGRS via email id','high','new','2025-06-22 18:30:00','2025-07-06 18:30:00','2025-07-07 02:16:33','2025-07-07 02:16:33'),(52,7,24,NULL,'Regarding Pendency\'s/Observations','For a new customer trying to lodge complaint in SPGRS, state, district, branch details must be auto populated with the entered pin code.','medium','new','2025-06-22 18:30:00','2025-07-06 18:30:00','2025-07-07 02:17:33','2025-07-07 02:17:33'),(53,7,24,NULL,'Regarding Pendency\'s/Observations','For a new customer trying to lodge complaint in SPGRS, district must be auto populated with the entered state, currently it is not.','high','new','2025-06-22 18:30:00','2025-07-06 18:30:00','2025-07-07 02:19:53','2025-07-07 02:19:53'),(54,7,26,NULL,'Progress Status for observations','Assignment of complaint on the basis of category/subcategory is not working.\r\nComplaint was lodged in ATM category but visible on UPI reconciliation department ID.','high','new','2025-06-22 18:30:00','2025-07-06 18:30:00','2025-07-07 02:20:50','2025-07-07 06:20:08'),(55,7,24,NULL,'PSB Loader icon','PSB Loader which need to integrate with the SPGRS Portal.','medium','new','2025-06-22 18:30:00','2025-07-06 18:30:00','2025-07-07 02:21:30','2025-07-07 02:21:30'),(56,7,27,NULL,'Qbuddy discussion and way forward','Front end modifications- size of chatbot, suggestions options, sending button in the type box and its size.\r\nQbuddy Integrations with Vindhyanidhi','high','new','2025-06-24 18:30:00','2025-07-06 18:30:00','2025-07-07 02:23:43','2025-07-07 02:23:43'),(57,7,9,NULL,'Progress Status for observations','Report Generation option is not working.','high','new','2025-06-24 18:30:00','2025-07-06 18:30:00','2025-07-07 02:25:02','2025-07-07 02:25:02'),(58,7,9,NULL,'Progress Status for observations','Limited number of options while changing the status of the complaints based on the User group is not implemented.','high','new','2025-06-24 18:30:00','2025-07-06 18:30:00','2025-07-07 02:26:15','2025-07-07 02:26:15'),(59,7,26,NULL,'Progress Status for observations','If any complaint is already pending, system to give alert that another complaint is already pending (with complaint no.) and option to view the existing complaint if user select “Yes \"button, existing complaint to be shown. If user select “No” option, new complaint should be captured without any restriction.','medium','in_progress','2025-06-24 18:30:00','2025-07-06 18:30:00','2025-07-07 02:27:45','2025-07-07 05:29:14'),(60,7,37,NULL,'Cheque book request API not working','GAURAV GODBOLE | HEAD OFFICE | PMO\r\n​Subrato Mukherjee;​Raj Ramesh Gupta​\r\n​Sumanta Chakraborty;​SUNAYAN KASHYAP|HEAD OFFICE|PMO;​+2 others​​\r\nDear Sir/Ma\'am,\r\n\r\nKindly update on the trail mail and resolve the issue at earliest.\r\n\r\n\r\nधन्यवाद, सादर  / Thanks and regards \r\n \r\n\r\nGAURAV GODBOLE','high','assigned','2025-07-04 18:30:00','2025-07-06 18:30:00','2025-07-07 06:19:55','2025-07-08 04:48:09');
/*!40000 ALTER TABLE `issues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_07_06_000006_add_role_to_users_table',2),(5,'2025_07_06_000105_create_modules_table',2),(6,'2025_07_06_000132_create_issues_table',2),(7,'2025_07_06_000247_create_comments_table',2),(8,'2025_07_06_000347_create_attachments_table',2),(9,'2025_07_07_061503_add_reported_date_to_issues_table',3),(10,'2025_07_07_062741_add_reported_date_to_issues_table',4),(12,'2025_07_13_115932_create_permission_tables',5),(14,'2025_07_15_160925_remove_role_column_from_users_table',6),(15,'2025_07_16_141017_add_force_password_reset_to_users_table',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (4,'App\\Models\\User',1),(1,'App\\Models\\User',2),(1,'App\\Models\\User',3),(2,'App\\Models\\User',5),(4,'App\\Models\\User',7),(3,'App\\Models\\User',8),(1,'App\\Models\\User',9),(3,'App\\Models\\User',10),(3,'App\\Models\\User',11),(1,'App\\Models\\User',14),(1,'App\\Models\\User',15);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modules` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `modules_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` VALUES (1,'Lead Management',NULL,NULL),(2,'Complaint Module',NULL,NULL),(3,'Call Center',NULL,NULL),(6,'Genesys - ACD','2025-07-06 03:24:22','2025-07-06 03:24:35'),(8,'Infra keys and licenses','2025-07-06 04:34:01','2025-07-06 04:34:01'),(9,'CRM - Complaint Cell','2025-07-06 04:37:41','2025-07-06 04:37:41'),(10,'CRM-Data Migration Approach','2025-07-06 05:51:41','2025-07-06 05:51:41'),(11,'CRM-Whitelisted SMS','2025-07-07 01:27:02','2025-07-07 01:27:02'),(12,'CRM-API based Email Integration','2025-07-07 01:28:15','2025-07-07 01:28:15'),(13,'CRM- Bill of Material','2025-07-07 01:29:49','2025-07-07 01:29:49'),(14,'Marketing-UAT','2025-07-07 01:31:38','2025-07-07 01:31:38'),(16,'Call Centre','2025-07-07 01:34:35','2025-07-07 01:34:35'),(17,'CRM-Password Vaulting','2025-07-07 01:35:26','2025-07-07 01:35:26'),(18,'CRM- EPC/OPM','2025-07-07 01:36:12','2025-07-07 01:36:12'),(19,'CRM- CR','2025-07-07 01:36:56','2025-07-07 01:36:56'),(20,'Marketing-Prod','2025-07-07 01:38:52','2025-07-07 01:38:52'),(21,'CRM-DR','2025-07-07 01:44:55','2025-07-07 01:44:55'),(22,'CRM-UAT Observations','2025-07-07 01:46:59','2025-07-07 01:46:59'),(23,'CRM','2025-07-07 01:47:13','2025-07-07 01:47:13'),(24,'SPGRS','2025-07-07 01:47:20','2025-07-07 01:47:20'),(25,'Marketing- Integration','2025-07-07 01:47:32','2025-07-07 01:47:32'),(26,'SPGRS- Complaint cell','2025-07-07 01:47:39','2025-07-07 01:47:39'),(27,'Qbuddy','2025-07-07 01:47:50','2025-07-07 01:47:50'),(28,'CRM-IVR','2025-07-07 01:47:55','2025-07-07 01:47:55'),(29,'SPGRS- Prod','2025-07-07 01:48:18','2025-07-07 01:48:18'),(30,'CRM-BRD v2.3','2025-07-07 01:48:25','2025-07-07 01:48:25'),(31,'CRM-RBIO','2025-07-07 01:48:30','2025-07-07 01:48:30'),(32,'AD-ID','2025-07-07 01:48:36','2025-07-07 01:48:36'),(33,'CRM-Prod','2025-07-07 01:48:47','2025-07-07 01:48:47'),(34,'CRM/IVR','2025-07-07 01:48:53','2025-07-07 01:48:53'),(35,'CRM-SPGRS','2025-07-07 01:49:02','2025-07-07 01:49:02'),(36,'Marketing','2025-07-07 01:49:11','2025-07-07 01:49:11'),(37,'CRM - API','2025-07-07 01:51:17','2025-07-07 01:51:17');
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'user-list','web','2025-07-15 03:04:28','2025-07-15 09:12:21'),(2,'user-create','web','2025-07-15 03:09:30','2025-07-15 03:09:30'),(3,'user-edit','web','2025-07-15 03:09:38','2025-07-15 03:09:38'),(4,'user-delete','web','2025-07-15 03:09:46','2025-07-15 03:09:46'),(5,'user-view','web','2025-07-15 03:09:56','2025-07-15 03:09:56'),(6,'module-list','web','2025-07-15 03:20:13','2025-07-15 03:20:13'),(7,'module-create','web','2025-07-15 03:20:22','2025-07-15 03:20:22'),(8,'module-edit','web','2025-07-15 03:20:30','2025-07-15 03:20:30'),(9,'module-delete','web','2025-07-15 03:20:39','2025-07-15 03:20:39'),(10,'module-view','web','2025-07-15 03:23:49','2025-07-15 03:23:49'),(11,'issue-list','web','2025-07-15 03:24:00','2025-07-15 03:24:00'),(12,'issue-create','web','2025-07-15 03:24:09','2025-07-15 03:24:09'),(13,'issue-edit','web','2025-07-15 03:24:21','2025-07-15 03:24:21'),(14,'issue-delete','web','2025-07-15 03:24:33','2025-07-15 03:24:33'),(15,'issue-view','web','2025-07-15 03:24:42','2025-07-15 03:24:42'),(16,'role-list','web','2025-07-15 03:24:59','2025-07-15 03:24:59'),(17,'role-create','web','2025-07-15 03:25:07','2025-07-15 03:25:07'),(18,'role-edit','web','2025-07-15 03:26:20','2025-07-15 03:26:20'),(19,'role-delete','web','2025-07-15 08:57:47','2025-07-15 08:57:47'),(20,'role-view','web','2025-07-15 08:57:53','2025-07-15 08:57:53'),(21,'permission-list','web','2025-07-15 08:58:05','2025-07-15 08:58:05'),(22,'permission-create','web','2025-07-15 08:58:12','2025-07-15 08:58:12'),(23,'permission-edit','web','2025-07-15 08:58:19','2025-07-15 08:58:19'),(24,'permission-delete','web','2025-07-15 08:58:25','2025-07-15 08:58:25'),(25,'permission-view','web','2025-07-15 08:58:32','2025-07-15 08:58:32');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (6,1),(11,1),(12,1),(13,1),(15,1),(11,2),(15,2),(1,3),(2,3),(3,3),(5,3),(6,3),(7,3),(8,3),(10,3),(11,3),(12,3),(13,3),(15,3),(16,3),(17,3),(18,3),(20,3),(21,3),(22,3),(23,3),(25,3),(1,4),(2,4),(3,4),(4,4),(5,4),(6,4),(7,4),(8,4),(9,4),(10,4),(11,4),(12,4),(13,4),(14,4),(15,4),(16,4),(17,4),(18,4),(19,4),(20,4),(21,4),(22,4),(23,4),(24,4),(25,4);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'reporter','web','2025-07-15 09:41:35','2025-07-15 09:41:35'),(2,'vendor','web','2025-07-15 10:04:29','2025-07-15 10:04:29'),(3,'admin','web','2025-07-15 10:05:21','2025-07-15 10:05:21'),(4,'super_admin','web','2025-07-15 10:07:58','2025-07-15 10:07:58');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('npDuaXCCkEuJGAeiKB7fEF3uvItO0G0vSfj1YV2x',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUWpsY0ZHbkJubjM3empPOHoyMXRMc2tUbGljU3BzanBlcUFiMmZYZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=',1752749255);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `force_password_reset` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Kumar Prabhakar Singh','kps2706@gmail.com',NULL,'$2y$12$lcAiQEXtPmz3xedHqRPrDOuWLUlOH4IfT1TZ9mijI9LJY/PAbGw46',NULL,'2025-07-05 03:43:12','2025-07-16 23:21:24',0),(2,'Sunayan Kashyap','sunayan.kashyap@psb.co.in',NULL,'$2y$12$Q9EJw3EYMabkbRB.XjAzX.HpddXue7t3jflUxJfx99H7w/V0IZvzu',NULL,'2025-07-05 19:10:29','2025-07-15 14:08:19',1),(3,'Gaurav','Gaurav.godbole@psb.co.in',NULL,'$2y$12$51t5I6T.4isl4KA6BBWWmuL2sNu3SR0ebtAQ56MhrfJ8XS9mHD8N2',NULL,'2025-07-05 19:11:24','2025-07-06 01:34:45',1),(5,'Debdatta Das','Debdatta.das@digitide.com',NULL,'$2y$12$N6Ptx2oflaPFt.2.AkVqXORi4C5OjbBhpYk5LU.CAjTeWFXIBdVwq',NULL,'2025-07-05 19:27:07','2025-07-05 19:27:07',1),(7,'Arunya Singh','arunya.singh@psb.co.in',NULL,'$2y$12$Cx3FNTLYgBS/88IEYPkRse7YgxeejstU94vBF33KqqOx9H6W3Fnr6',NULL,'2025-07-06 03:22:05','2025-07-06 05:50:34',1),(15,'Arunya Singh','kr.prabhakar.sigh@gmail.com',NULL,'$2y$12$OLzrDMIINvDkeCHRGa3Ule6udFW6pOV64wJXI5ZI2y.LFcL.mNuZm',NULL,'2025-07-16 22:42:33','2025-07-16 23:19:54',0);
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

-- Dump completed on 2025-07-17 16:21:25
