-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 03:14 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `classses`
--

CREATE TABLE `classses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zoom_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starting_time` datetime DEFAULT NULL,
  `ending_time` datetime DEFAULT NULL,
  `date` date DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classses`
--

INSERT INTO `classses` (`id`, `course_id`, `subject_id`, `title`, `zoom_link`, `banner`, `url_link`, `description`, `starting_time`, `ending_time`, `date`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 2, 10, 'The World of ABCDE:\r\nManagement of the\r\nhaemodynamically unstable\r\npatient', NULL, 'http://127.0.0.1:8000/uploads/classes/1.jpg', NULL, 'Aperiam et quis facilis voluptatem unde saepe id est explicabo.', '2021-05-19 15:07:29', NULL, '2021-05-19', 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(2, 6, 7, 'Cough, SOB, Breathlessness', NULL, 'http://127.0.0.1:8000/uploads/classes/2.jpg', NULL, 'Odit temporibus a quis qui cupiditate quia repellendus.', '2021-05-19 15:07:29', NULL, '2021-05-19', 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(3, 3, 9, 'Chest pain, palpitations', NULL, 'http://127.0.0.1:8000/uploads/classes/3.jpg', NULL, 'Sed dolor sed molestiae rem beatae ipsa blanditiis id voluptate porro autem.', '2021-05-19 15:07:29', NULL, '2021-05-19', 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(4, 2, 8, 'Rash, Patient with bleeding\r\nmanifestations', NULL, 'http://127.0.0.1:8000/uploads/classes/4.jpg', NULL, 'Dolorum distinctio fugit est ea architecto et id labore beatae quos aut repudiandae.', '2021-05-19 15:07:29', NULL, '2021-05-19', 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(5, 7, 5, 'Adrenal insufficiency crisis\r\nand Thyrotoxic Crisis', NULL, 'http://127.0.0.1:8000/uploads/classes/5.jpg', NULL, 'Excepturi molestiae nostrum fugiat officia ab vel.', '2021-05-19 15:07:29', NULL, '2021-05-19', 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(6, 6, 6, 'Pneumothorax and chest drain principles', NULL, 'http://127.0.0.1:8000/uploads/classes/6.jpg', NULL, 'Unde est molestiae sunt facilis porro reprehenderit.', '2021-05-19 15:07:29', NULL, '2021-05-19', 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(7, 4, 10, 'Paraquat Poisoning,\r\nAluminium Phosphide\r\nPoisoning', NULL, 'http://127.0.0.1:8000/uploads/classes/1.jpg', NULL, 'Maiores consectetur beatae numquam quia laudantium doloribus ut impedit sint facilis.', '2021-05-19 15:07:29', NULL, '2021-05-19', 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(8, 8, 3, 'Migraine, Neuralgiform\r\nHeadaches', NULL, 'http://127.0.0.1:8000/uploads/classes/2.jpg', NULL, 'Suscipit voluptatem voluptatum culpa nihil dicta ipsa quibusdam ducimus id rerum et.', '2021-05-19 15:07:29', NULL, '2021-05-19', 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(9, 10, 6, 'Hepatic Failure, SBP', NULL, 'http://127.0.0.1:8000/uploads/classes/3.jpg', NULL, 'Qui maxime autem ipsum et enim neque sunt.', '2021-05-19 15:07:29', NULL, '2021-05-19', 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(10, 3, 6, 'Meningitis, Encephalitis', NULL, 'http://127.0.0.1:8000/uploads/classes/4.jpg', NULL, 'Mollitia voluptatem illo animi repellat maxime vero error omnis qui.', '2021-05-19 15:07:29', NULL, '2021-05-19', 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `class_comments`
--

CREATE TABLE `class_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_comment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_comments`
--

INSERT INTO `class_comments` (`id`, `class_id`, `user_id`, `comment`, `parent_comment_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 'Magni ipsum eum ea sed est impedit.', NULL, 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(2, 8, 1, 'Veniam architecto repudiandae eius autem voluptatem expedita placeat.', NULL, 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(3, 3, 1, 'Cupiditate vel sint quod laboriosam laudantium aut vel excepturi.', NULL, 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(4, 3, 1, 'Laboriosam aut illo deserunt sint labore non cum repellendus.', NULL, 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(5, 2, 1, 'Voluptas sint voluptas magni incidunt perferendis in aspernatur animi accusantium quidem quis.', NULL, 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(6, 4, 1, 'Temporibus culpa ipsam ratione maxime quos rerum expedita aut molestiae eum doloribus explicabo.', NULL, 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(7, 10, 1, 'Corporis aut dolor saepe qui provident eaque quis veniam vitae praesentium.', NULL, 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(8, 4, 1, 'Cum velit unde maxime exercitationem magni a quis blanditiis dolor eos animi omnis doloremque.', NULL, 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(9, 3, 1, 'Rerum facilis non dolore laborum incidunt eos non.', NULL, 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(10, 9, 1, 'Eos voluptatem pariatur molestiae delectus expedita ea quidem.', NULL, 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(11, 9, 1, 'hi', NULL, 1, '2021-05-19 13:22:49', '2021-05-19 13:22:49'),
(12, 9, 1, 'hello', NULL, 1, '2021-05-19 13:23:04', '2021-05-19 13:23:04'),
(13, 9, 1, 'nice class', NULL, 1, '2021-05-19 13:23:45', '2021-05-19 13:23:45'),
(14, 9, 1, 'welcome', NULL, 1, '2021-05-19 13:25:51', '2021-05-19 13:25:51'),
(15, 9, 1, 'welcome', NULL, 1, '2021-05-19 13:25:53', '2021-05-19 13:25:53'),
(16, 9, 1, 'riadkhan', NULL, 1, '2021-05-19 13:35:26', '2021-05-19 13:35:26'),
(17, 9, 1, 'nice', NULL, 1, '2021-05-19 13:38:29', '2021-05-19 13:38:29'),
(18, 3, 1, 'test comment', NULL, 1, '2021-05-19 14:31:23', '2021-05-19 14:31:23'),
(19, 7, 1, 'hi', NULL, 1, '2021-05-19 14:32:48', '2021-05-19 14:32:48'),
(20, 7, 1, 'test', NULL, 1, '2021-05-19 14:33:44', '2021-05-19 14:33:44');

-- --------------------------------------------------------

--
-- Table structure for table `class_resources`
--

CREATE TABLE `class_resources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_resources`
--

INSERT INTO `class_resources` (`id`, `file_type`, `course_id`, `class_id`, `title`, `video_url`, `download_url`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'pdf', 1, 4, 'Class 1 Suggestion Pdf', 'https://drive.google.com/uc?export=download&id=0Bw_zlyYosRtuc3RhcnRlcl9maWxl', 'http://127.0.0.1:8000/uploads/users/user_2.png', 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(2, 'video', 1, 3, NULL, 'http://www.halvorson.com/delectus-aut-error-sed-aliquid', '', 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(3, 'txt', 1, 5, NULL, 'http://www.thompson.com/possimus-explicabo-consequatur-dolorem-praesentium-voluptatem.html', 'http://www.koepp.org/', 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(4, 'audio', 1, 7, NULL, 'http://cormier.com/', 'https://www.spinka.com/laudantium-doloribus-sed-minima-itaque-nihil', 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(5, 'doc', 1, 8, NULL, 'http://leffler.org/et-esse-voluptatem-totam-accusantium-ea-labore-labore.html', 'http://balistreri.com/', 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(6, 'pptx', 1, 7, NULL, 'http://www.jerde.com/exercitationem-aut-sapiente-asperiores-et', 'http://bashirian.com/', 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(7, 'pdf', 1, 9, NULL, 'http://www.west.com/quibusdam-est-dicta-repellat-rerum-placeat-aperiam-consequatur.html', 'http://www.wiza.org/incidunt-consequuntur-quis-excepturi-facilis.html', 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(8, 'pdf', 1, 3, NULL, 'https://torphy.org/autem-nihil-autem-distinctio-illo.html', 'http://spencer.com/suscipit-et-laudantium-omnis-dolorum-natus-ut-dolore.html', 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(9, 'pdf', 1, 2, NULL, 'http://www.ebert.info/', 'http://kling.net/dignissimos-ut-ad-laborum-animi.html', 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(10, 'pdf', 7, 10, NULL, 'http://eichmann.com/praesentium-quo-voluptatem-exercitationem-accusamus.html', 'http://www.trantow.org/et-ut-a-adipisci-enim-adipisci-occaecati.html', 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `complain_boxes`
--

CREATE TABLE `complain_boxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `subscription_id`, `title`, `banner`, `short_desc`, `description`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1976, 'Certificate Course on Acute Medicine', 'http://127.0.0.1:8000/uploads/courses/1.jpg', 'Course Includes 44 Lecture Sessions , Lecture Notes, Mid Term &amp; Final Exams, Certificates', 'Target Group Intern Doctors &amp; Above ,\r\nDoctors working in Emergency Ward.\r\nDoctors working in ICU, CCU &amp; HDU\r\nAny interested doctors who wants to learn acute medicine. Course Includes 44 Lecture Sessions , Lecture Notes, Mid Term &amp; Final Exams, Certificates.', 1, 1, 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(2, 3696, 'Certificate Course on Acute Medicine 2', 'http://127.0.0.1:8000/uploads/courses/2.jpg', 'Course Includes 44 Lecture Sessions , Lecture Notes, Mid Term &amp; Final Exams, Certificates', 'Target Group Intern Doctors &amp; Above ,\r\nDoctors working in Emergency Ward.\r\nDoctors working in ICU, CCU &amp; HDU\r\nAny interested doctors who wants to learn acute medicine. Course Includes 44 Lecture Sessions , Lecture Notes, Mid Term &amp; Final Exams, Certificates.', 1, 1, 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(3, 4152, 'Certificate Course on Acute Medicine 3', 'http://127.0.0.1:8000/uploads/courses/3.jpg', 'Course Includes 44 Lecture Sessions , Lecture Notes, Mid Term &amp; Final Exams, Certificates', 'Target Group Intern Doctors &amp; Above ,\r\nDoctors working in Emergency Ward.\r\nDoctors working in ICU, CCU &amp; HDU\r\nAny interested doctors who wants to learn acute medicine. Course Includes 44 Lecture Sessions , Lecture Notes, Mid Term &amp; Final Exams, Certificates.', 1, 1, 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(4, 1009, 'Certificate Course on Acute Medicine 4', 'http://127.0.0.1:8000/uploads/courses/4.jpg', 'Course Includes 44 Lecture Sessions , Lecture Notes, Mid Term &amp; Final Exams, Certificates', 'Target Group Intern Doctors &amp; Above ,\r\nDoctors working in Emergency Ward.\r\nDoctors working in ICU, CCU &amp; HDU\r\nAny interested doctors who wants to learn acute medicine. Course Includes 44 Lecture Sessions , Lecture Notes, Mid Term &amp; Final Exams, Certificates.', 1, 1, 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(5, 1931, 'Certificate Course on Acute Medicine 5', 'http://127.0.0.1:8000/uploads/courses/5.jpg', 'Course Includes 44 Lecture Sessions , Lecture Notes, Mid Term &amp; Final Exams, Certificates', 'Target Group Intern Doctors &amp; Above ,\r\nDoctors working in Emergency Ward.\r\nDoctors working in ICU, CCU &amp; HDU\r\nAny interested doctors who wants to learn acute medicine. Course Includes 44 Lecture Sessions , Lecture Notes, Mid Term &amp; Final Exams, Certificates.', 1, 1, 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(6, 9869, 'Certificate Course on Acute Medicine 6', 'http://127.0.0.1:8000/uploads/courses/6.jpg', 'Course Includes 44 Lecture Sessions , Lecture Notes, Mid Term &amp; Final Exams, Certificates', 'Target Group Intern Doctors &amp; Above ,\r\nDoctors working in Emergency Ward.\r\nDoctors working in ICU, CCU &amp; HDU\r\nAny interested doctors who wants to learn acute medicine. Course Includes 44 Lecture Sessions , Lecture Notes, Mid Term &amp; Final Exams, Certificates.', 1, 1, 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(7, 1881, 'Certificate Course on Acute Medicine 7', 'http://127.0.0.1:8000/uploads/courses/1.jpg', 'Course Includes 44 Lecture Sessions , Lecture Notes, Mid Term &amp; Final Exams, Certificates', 'Target Group Intern Doctors &amp; Above ,\r\nDoctors working in Emergency Ward.\r\nDoctors working in ICU, CCU &amp; HDU\r\nAny interested doctors who wants to learn acute medicine. Course Includes 44 Lecture Sessions , Lecture Notes, Mid Term &amp; Final Exams, Certificates.', 1, 1, 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(8, 8197, 'Certificate Course on Acute Medicine 8', 'http://127.0.0.1:8000/uploads/courses/2.jpg', 'Course Includes 44 Lecture Sessions , Lecture Notes, Mid Term &amp; Final Exams, Certificates', 'Target Group Intern Doctors &amp; Above ,\r\nDoctors working in Emergency Ward.\r\nDoctors working in ICU, CCU &amp; HDU\r\nAny interested doctors who wants to learn acute medicine. Course Includes 44 Lecture Sessions , Lecture Notes, Mid Term &amp; Final Exams, Certificates.', 1, 1, 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(9, 2314, 'Certificate Course on Acute Medicine 9', 'http://127.0.0.1:8000/uploads/courses/3.jpg', 'Course Includes 44 Lecture Sessions , Lecture Notes, Mid Term &amp; Final Exams, Certificates', 'Target Group Intern Doctors &amp; Above ,\r\nDoctors working in Emergency Ward.\r\nDoctors working in ICU, CCU &amp; HDU\r\nAny interested doctors who wants to learn acute medicine. Course Includes 44 Lecture Sessions , Lecture Notes, Mid Term &amp; Final Exams, Certificates.', 1, 1, 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(10, 3052, 'Certificate Course on Acute Medicine 10', 'http://127.0.0.1:8000/uploads/courses/4.jpg', 'Course Includes 44 Lecture Sessions , Lecture Notes, Mid Term &amp; Final Exams, Certificates', 'Target Group Intern Doctors &amp; Above ,\r\nDoctors working in Emergency Ward.\r\nDoctors working in ICU, CCU &amp; HDU\r\nAny interested doctors who wants to learn acute medicine. Course Includes 44 Lecture Sessions , Lecture Notes, Mid Term &amp; Final Exams, Certificates.', 1, 1, 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `enroll_courses`
--

CREATE TABLE `enroll_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enroll_courses`
--

INSERT INTO `enroll_courses` (`id`, `user_id`, `course_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 3, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(2, 1, 10, 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(3, 1, 4, 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(4, 1, 9, 10, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(5, 1, 5, 5, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(6, 1, 3, 1, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(7, 1, 6, 8, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(8, 1, 1, 7, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(9, 1, 8, 4, '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(10, 1, 2, 5, '2021-04-28 01:53:46', '2021-04-28 01:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `exam_type` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `total_question` int(11) DEFAULT NULL,
  `marks_per_question` int(11) DEFAULT NULL,
  `negative_marks` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `course_id`, `subject_id`, `exam_type`, `title`, `banner`, `duration`, `total_question`, `marks_per_question`, `negative_marks`, `date`, `order`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(11, 1, 10, 1, 'Exam title 00001', 'http://127.0.0.1:8000/uploads/courses/1.jpg', 10000, 100, 1, NULL, '2021-05-19', 1, 1, NULL, NULL, NULL, NULL);

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_25_045034_create_courses_table', 1),
(5, '2021_04_25_045215_create_subjects_table', 1),
(6, '2021_04_25_045216_create_exams_table', 1),
(11, '2021_04_26_093405_create_classses_table', 1),
(12, '2021_04_26_094038_create_class_comments_table', 1),
(13, '2021_04_26_094407_create_class_resources_table', 1),
(14, '2021_04_26_095034_create_results_table', 1),
(16, '2021_04_26_095500_create_complain_boxes_table', 1),
(17, '2021_04_27_083541_create_enroll_courses_table', 1),
(18, '2021_04_26_091046_create_notices_table', 2),
(19, '2021_04_26_091854_create_schedules_table', 3),
(20, '2021_04_25_045337_create_options_table', 4),
(21, '2021_04_26_095100_create_result_details_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button` tinyint(1) NOT NULL DEFAULT 0,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `course_id`, `subject_id`, `title`, `description`, `button`, `button_text`, `button_url`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'This is test Notice 1', 'This is test Notice 1 description', 1, 'test Button', 'https://facebook.com', 1, '2021-05-19 11:14:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `option_letter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `explanation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `option_letter`, `option_text`, `explanation`, `order`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'A', 'this is first option', 'this is first option explaination', 1, 1, 0, 0, NULL, NULL),
(2, 1, 'B', 'this is first option 2', 'this is first option explaination 2', 2, 1, 0, 0, NULL, NULL),
(3, 2, 'B', 'this is first option', 'this is first option explaination', 2, 1, 0, 0, NULL, NULL),
(4, 2, 'A', 'this is first option 2', 'this is first option explaination 2', 1, 1, 0, 0, NULL, NULL);

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
-- Table structure for table `questio`
--

CREATE TABLE `questio` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `question_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correct_ans` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `explanation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `exam_id`, `question_text`, `question_type`, `correct_ans`, `explanation`, `order`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 11, 'test question 00001', 'multiple', '[1,1]', 'this is question explaination..', 1, 1, NULL, NULL, NULL, NULL),
(2, 11, 'test question 00002', 'multiple', '[1,1]', 'this is question explaination..', 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `total_question` int(11) DEFAULT NULL,
  `total_correct` int(11) DEFAULT NULL,
  `total_wrong` int(11) DEFAULT NULL,
  `not_answer` int(11) DEFAULT NULL,
  `total_gain_marks` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `user_id`, `exam_id`, `total_question`, `total_correct`, `total_wrong`, `not_answer`, `total_gain_marks`, `created_at`, `updated_at`) VALUES
(2, 1, 11, 2, 3, 1, 0, 3, '2021-05-19 13:19:15', '2021-05-19 16:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `result_details`
--

CREATE TABLE `result_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `user_ans` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`user_ans`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button` tinyint(1) NOT NULL DEFAULT 0,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `course_id`, `subject_id`, `title`, `banner`, `date`, `button`, `button_text`, `button_url`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'this is demo schedule title', 'http://127.0.0.1:8000/uploads/courses/1.jpg', '', 1, 'demo Button', 'https://facebook.com', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `course_id`, `title`, `banner`, `description`, `created_at`, `updated_at`) VALUES
(1, 4, 'ACUTE Emergencies', 'https://via.placeholder.com/60x60.png/007799?text=iusto', '7z3Nu0NOZ6u7WTuC0yUV', '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(2, 9, 'Radio-imaging', 'https://via.placeholder.com/60x60.png/00ffee?text=possimus', 'eQ6tgqY2AKXSmGSzhXVh', '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(3, 3, 'investigations, ECG, ', 'https://via.placeholder.com/60x60.png/00ccbb?text=enim', 'Ny7m9kmNV6BmzJjXDyml', '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(4, 5, 'Interpretation of Emergency', 'https://via.placeholder.com/60x60.png/008855?text=enim', '6Ks0q27zyBdMy9kocwxz', '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(5, 7, 'infectious disease emergencies', 'https://via.placeholder.com/60x60.png/001133?text=sit', 'KgZnViz9oR9L5W8sH9fe', '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(6, 2, 'Management of poisoning cases', 'https://via.placeholder.com/60x60.png/009900?text=voluptas', 'X6Cfj1Ps1lKklk6BvM5K', '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(7, 9, 'Neuro ermegencies ', 'https://via.placeholder.com/60x60.png/00ccaa?text=recusandae', 'R7ZmndHDjKwrJNVOTlTL', '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(8, 9, 'Respiratory, GI', 'https://via.placeholder.com/60x60.png/00aa11?text=officiis', 'o7FlaHID6O6nzIGJ01Dm', '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(9, 10, 'Management Metabolic', 'https://via.placeholder.com/60x60.png/008833?text=omnis', '5prVKe7S5CjpYfkj9tJs', '2021-04-28 01:53:46', '2021-04-28 01:53:46'),
(10, 2, 'Cardiovascular', 'https://via.placeholder.com/60x60.png/003366?text=et', 'lBHlAPJFAx1m7qqXmHHJ', '2021-04-28 01:53:46', '2021-04-28 01:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `photo`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '018000000000', 'admin@admin.com', 'http://127.0.0.1:8000/uploads/users/user_2.png', NULL, '$2y$10$GaUcY6/CiDK8zkeCTQ.iEeNfSY0ikflwHtwPEk8TcK7rkAcxZRC8.', NULL, '2021-04-28 01:53:46', '2021-04-28 01:53:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classses`
--
ALTER TABLE `classses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classses_course_id_foreign` (`course_id`),
  ADD KEY `classses_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `class_comments`
--
ALTER TABLE `class_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_comments_class_id_foreign` (`class_id`),
  ADD KEY `class_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `class_resources`
--
ALTER TABLE `class_resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_resources_class_id_foreign` (`class_id`);

--
-- Indexes for table `complain_boxes`
--
ALTER TABLE `complain_boxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complain_boxes_user_id_foreign` (`user_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enroll_courses`
--
ALTER TABLE `enroll_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enroll_courses_user_id_foreign` (`user_id`),
  ADD KEY `enroll_courses_course_id_foreign` (`course_id`),
  ADD KEY `enroll_courses_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exams_course_id_foreign` (`course_id`),
  ADD KEY `exams_subject_id_foreign` (`subject_id`);

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
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notices_course_id_foreign` (`course_id`),
  ADD KEY `notices_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `options_question_id_foreign` (`question_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `questio`
--
ALTER TABLE `questio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_user_id_foreign` (`user_id`),
  ADD KEY `results_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `result_details`
--
ALTER TABLE `result_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `result_details_user_id_foreign` (`user_id`),
  ADD KEY `result_details_exam_id_foreign` (`exam_id`),
  ADD KEY `result_details_question_id_foreign` (`question_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_course_id_foreign` (`course_id`),
  ADD KEY `schedules_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_course_id_foreign` (`course_id`);

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
-- AUTO_INCREMENT for table `classses`
--
ALTER TABLE `classses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `class_comments`
--
ALTER TABLE `class_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `class_resources`
--
ALTER TABLE `class_resources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `complain_boxes`
--
ALTER TABLE `complain_boxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `enroll_courses`
--
ALTER TABLE `enroll_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `questio`
--
ALTER TABLE `questio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `result_details`
--
ALTER TABLE `result_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classses`
--
ALTER TABLE `classses`
  ADD CONSTRAINT `classses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `classses_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `class_comments`
--
ALTER TABLE `class_comments`
  ADD CONSTRAINT `class_comments_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `class_resources`
--
ALTER TABLE `class_resources`
  ADD CONSTRAINT `class_resources_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `complain_boxes`
--
ALTER TABLE `complain_boxes`
  ADD CONSTRAINT `complain_boxes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `enroll_courses`
--
ALTER TABLE `enroll_courses`
  ADD CONSTRAINT `enroll_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enroll_courses_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enroll_courses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exams_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notices`
--
ALTER TABLE `notices`
  ADD CONSTRAINT `notices_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notices_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questio`
--
ALTER TABLE `questio`
  ADD CONSTRAINT `questions_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `result_details`
--
ALTER TABLE `result_details`
  ADD CONSTRAINT `result_details_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `result_details_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `result_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedules_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
