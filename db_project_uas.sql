-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2022 at 06:48 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project_uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `nama_admin`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Al Kausar', 'alka@gmail.com', '$2y$10$iIPVm80f.11044.cnFJ6N.7O1lwcMdSmPLeAh8nuQ5CFNUxjV/eEO', '2022-06-25 04:32:36', '2022-06-25 04:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nama_category`, `created_at`, `updated_at`) VALUES
(1, 'Pemrograman', '2022-06-25 04:32:36', '2022-06-25 04:32:36'),
(2, 'Bahasa', '2022-06-25 04:32:36', '2022-06-25 04:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirement` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipelajarin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_subcategory` bigint(20) UNSIGNED NOT NULL,
  `id_admin` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `top_course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_langganan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `judul_course`, `deskripsi`, `requirement`, `dipelajarin`, `id_subcategory`, `id_admin`, `level`, `tujuan`, `thumbnail`, `top_course`, `harga_langganan`, `created_at`, `updated_at`) VALUES
(1, 'Judul Pertama', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta pariatur reprehenderit porro voluptatem consequuntur</div><div>quo, corporis quas reiciendis impedit non! Ipsum quis dicta aliquam, eligendi repudiandae, eaque laudantium similique</div><div>tempora doloremque ex debitis asperiores. Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</div><div>modi pariatur ex ducimus est qui?</div>', '<ul><li>eligendi repudiandae, eaque laudantium similique</li><li>eligendi repudiandae, eaque laudantium similique</li><li>eligendi repudiandae, eaque laudantium similique</li></ul>', '<ol><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li></ol>', 1, 1, 'Beginer', 'Bisa Membuat Tampilan Aplikasi', 'input-gambar/8NXBoWCf8I86GQoyeDDvXug4vYA92AVZzvs0L500.jpg', 'Normal', 165000, '2022-06-25 04:36:05', '2022-06-25 04:36:05'),
(2, 'Judul Kedua', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta pariatur reprehenderit porro voluptatem consequuntur</div><div>quo, corporis quas reiciendis impedit non! Ipsum quis dicta aliquam, eligendi repudiandae, eaque laudantium similique</div><div>tempora doloremque ex debitis asperiores. Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</div><div>modi pariatur ex ducimus est qui?</div>', '<ul><li>eligendi repudiandae, eaque laudantium similique</li><li>eligendi repudiandae, eaque laudantium similique</li><li>eligendi repudiandae, eaque laudantium similique</li></ul>', '<ol><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li></ol>', 2, 1, 'Beginer', 'Bisa Membuat Tampilan Website', 'input-gambar/dy9UNpl2YsT3Blyrh5Kad3ZmV0jROymYj28I506x.jpg', 'Normal', 175000, '2022-06-25 04:37:54', '2022-06-25 04:37:54'),
(3, 'Judul Ketiga', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta pariatur reprehenderit porro voluptatem consequuntur</div><div>quo, corporis quas reiciendis impedit non! Ipsum quis dicta aliquam, eligendi repudiandae, eaque laudantium similique</div><div>tempora doloremque ex debitis asperiores. Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</div><div>modi pariatur ex ducimus est qui?</div>', '<ol><li>eligendi repudiandae, eaque laudantium similique</li><li>eligendi repudiandae, eaque laudantium similique</li><li>eligendi repudiandae, eaque laudantium similique</li></ol>', '<ul><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li></ul>', 3, 1, 'Beginer', 'Fasih Berbahasa Indonesia', 'input-gambar/Su0HmWeCGm3TaWrb9LSBQGVcgmD6UN1l94UWlJJL.png', 'Normal', 135000, '2022-06-25 04:38:44', '2022-06-25 04:38:44'),
(4, 'Judul Keempat', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta pariatur reprehenderit porro voluptatem consequuntur</div><div>quo, corporis quas reiciendis impedit non! Ipsum quis dicta aliquam, eligendi repudiandae, eaque laudantium similique</div><div>tempora doloremque ex debitis asperiores. Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</div><div>modi pariatur ex ducimus est qui?</div>', '<ol><li>eligendi repudiandae, eaque laudantium similique</li><li>eligendi repudiandae, eaque laudantium similique</li><li>eligendi repudiandae, eaque laudantium similique</li></ol>', '<ul><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li></ul>', 1, 1, 'Advance', 'Bisa Membuat Login dan Register', 'input-gambar/sJu191R3ttpr3RlWRG2Dwe48EIQCdiRLBM70TMck.jpg', 'Normal', 265000, '2022-06-25 04:40:04', '2022-06-25 04:40:04'),
(5, 'Judul Kelima', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta pariatur reprehenderit porro voluptatem consequuntur</div><div>quo, corporis quas reiciendis impedit non! Ipsum quis dicta aliquam, eligendi repudiandae, eaque laudantium similique</div><div>tempora doloremque ex debitis asperiores. Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</div><div>modi pariatur ex ducimus est qui?</div>', '<ul><li>eligendi repudiandae, eaque laudantium similique</li><li>eligendi repudiandae, eaque laudantium similique</li><li>eligendi repudiandae, eaque laudantium similique</li></ul>', '<ol><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li></ol>', 2, 1, 'Advance', 'Bisa Membuat Login dan Register', 'input-gambar/QQFqeRFxShDcHx9uA8stQctdFItfIwTJkureNtAE.jpg', 'Normal', 285000, '2022-06-25 04:41:02', '2022-06-25 04:41:02'),
(6, 'Judul Keenam', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta pariatur reprehenderit porro voluptatem consequuntur</div><div>quo, corporis quas reiciendis impedit non! Ipsum quis dicta aliquam, eligendi repudiandae, eaque laudantium similique</div><div>tempora doloremque ex debitis asperiores. Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</div><div>modi pariatur ex ducimus est qui?</div>', '<ol><li>eligendi repudiandae, eaque laudantium similique</li><li>eligendi repudiandae, eaque laudantium similique</li><li>eligendi repudiandae, eaque laudantium similique</li></ol>', '<ul><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li></ul>', 3, 1, 'Advance', 'Bisa Fasih Menulis dan Berbicara', 'input-gambar/ePyeH0wyLxKUM5kRGx6gDBx1PfmUpCgTSLOBnzpq.jpg', 'Normal', 235000, '2022-06-25 04:42:13', '2022-06-25 04:42:13'),
(7, 'Judul Ketujuh', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta pariatur reprehenderit porro voluptatem consequuntur</div><div>quo, corporis quas reiciendis impedit non! Ipsum quis dicta aliquam, eligendi repudiandae, eaque laudantium similique</div><div>tempora doloremque ex debitis asperiores. Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</div><div>modi pariatur ex ducimus est qui?</div>', '<ul><li>eligendi repudiandae, eaque laudantium similique</li><li>eligendi repudiandae, eaque laudantium similique</li><li>eligendi repudiandae, eaque laudantium similique</li></ul>', '<ol><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li></ol>', 1, 1, 'Profesional', 'Bisa Membuat 1 Aplikasi Mobile', 'input-gambar/2GysSQAfqAxmW202oA7Xx9qZ9OapyGsWeyQ63AZi.jpg', 'Top', 415000, '2022-06-25 04:43:17', '2022-06-25 04:43:17'),
(8, 'Judul Kedelapan', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta pariatur reprehenderit porro voluptatem consequuntur</div><div>quo, corporis quas reiciendis impedit non! Ipsum quis dicta aliquam, eligendi repudiandae, eaque laudantium similique</div><div>tempora doloremque ex debitis asperiores. Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</div><div>modi pariatur ex ducimus est qui?</div>', '<ol><li>eligendi repudiandae, eaque laudantium similique</li><li>eligendi repudiandae, eaque laudantium similique</li><li>eligendi repudiandae, eaque laudantium similique</li></ol>', '<ul><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li></ul>', 2, 1, 'Profesional', 'Bisa Membuat Aplikasi E - Commerce', 'input-gambar/8qW0kxM9VQlNY4il5pq1jhduQztufzpuoFD1WVN2.jpg', 'Top', 455000, '2022-06-25 04:44:04', '2022-06-25 04:44:04'),
(9, 'Judul Kesembilan', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta pariatur reprehenderit porro voluptatem consequuntur</div><div>quo, corporis quas reiciendis impedit non! Ipsum quis dicta aliquam, eligendi repudiandae, eaque laudantium similique</div><div>tempora doloremque ex debitis asperiores. Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</div><div>modi pariatur ex ducimus est qui?</div>', '<ul><li>eligendi repudiandae, eaque laudantium similique</li><li>eligendi repudiandae, eaque laudantium similique</li><li>eligendi repudiandae, eaque laudantium similique</li><li>eligendi repudiandae, eaque laudantium similiqueww</li></ul>', '<ol><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li></ol>', 3, 1, 'Profesional', 'Menjadi Pengajar', 'input-gambar/aL8oY61Bx0LWZCGmme3V3pd3WpxbRcHE4HaQ6aA2.png', 'Top', 315000, '2022-06-25 04:45:21', '2022-06-26 05:57:53'),
(10, 'Judul Kesepuluh', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta pariatur reprehenderit porro voluptatem consequuntur</div><div>quo, corporis quas reiciendis impedit non! Ipsum quis dicta aliquam, eligendi repudiandae, eaque laudantium similique</div><div>tempora doloremque ex debitis asperiores. Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</div><div>modi pariatur ex ducimus est qui?</div>', '<ul><li>eligendi repudiandae, eaque laudantium similique</li><li>eligendi repudiandae, eaque laudantium similique</li><li>eligendi repudiandae, eaque laudantium similique</li></ul>', '<ol><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li><li>Eius praesentium nostrum voluptates ipsum, sint inventore repellat labore ad</li></ol>', 2, 1, 'Profesional', 'Bisa Membuat Website Chatting', 'input-gambar/a07gPxxkRRPYH3nWN5rL6F9IcU7YusN66TcdG3xR.png', 'Normal', 467000, '2022-06-26 01:54:14', '2022-06-26 01:54:14');

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
-- Table structure for table `matericourses`
--

CREATE TABLE `matericourses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_materi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `link_yt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumen_pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matericourses`
--

INSERT INTO `matericourses` (`id`, `nama_materi`, `deskripsi`, `course_id`, `link_yt`, `dokumen_pdf`, `created_at`, `updated_at`) VALUES
(1, 'Materi Pertama', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta pariatur reprehenderit porro voluptatem consequuntur</div><div>quo, corporis quas reiciendis impedit non! Ipsum quis dicta aliquam, eligendi repudiandae, eaque laudantium similique</div>', 9, 'wYZux3BMc5k', NULL, '2022-06-25 05:46:47', '2022-06-25 05:46:47'),
(2, 'Materi Kedua', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta pariatur reprehenderit porro voluptatem consequuntur</div><div>quo, corporis quas reiciendis impedit non! Ipsum quis dicta aliquam, eligendi repudiandae, eaque laudantium similique</div>', 9, NULL, 'dokumen/HaSNm9T0n3QJoDKHEVYH8ac2cREXHPbZu3ucaOhX.pdf', '2022-06-25 05:47:10', '2022-06-25 05:47:10'),
(3, 'Materi Ketiga', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta pariatur reprehenderit porro voluptatem consequuntur</div><div>quo, corporis quas reiciendis impedit non! Ipsum quis dicta aliquam, eligendi repudiandae, eaque laudantium similique</div>', 9, 'o9PQDQxcYBw', 'dokumen/FKaLscivcPyRkbdJxoqjidBN9TZlUf4KEUtlO1FA.pdf', '2022-06-25 05:47:29', '2022-06-25 05:47:29');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_30_234354_create_admins_table', 1),
(6, '2022_06_01_062809_create_categories_table', 1),
(7, '2022_06_01_065430_create_subcategories_table', 1),
(8, '2022_06_02_082901_create_courses_table', 1),
(9, '2022_06_07_135608_add_column_to_subcategories_table', 1),
(10, '2022_06_07_135631_add_column_to_courses_table', 1),
(11, '2022_06_14_131445_create_matericourses_table', 1),
(12, '2022_06_14_131542_add_column_to_matericourses', 1),
(13, '2022_06_23_112834_create_transaksis_table', 1),
(14, '2022_06_23_112858_add_column_to_transaksis', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_subcategory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `nama_subcategory`, `id_category`, `created_at`, `updated_at`) VALUES
(1, 'Pemrograman Mobile', 1, '2022-06-25 04:32:36', '2022-06-25 04:32:36'),
(2, 'Pemrograman Website', 1, '2022-06-25 04:32:36', '2022-06-25 04:32:36'),
(3, 'Bahasa Indonesia', 2, '2022-06-25 04:32:36', '2022-06-25 04:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bukti_upload` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `course_id`, `user_id`, `bukti_upload`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 'uploadTransaksi/WGbklpiP01iwc3CjuJF7yO1i4ak0FiJzQvmsR015.jpg', 2, '2022-06-25 04:48:11', '2022-06-25 04:48:25'),
(2, 9, 1, 'uploadTransaksi/MtVCccsjIboSdr8C7HQLaBA1REijIKT5P5UHYrFB.png', 2, '2022-06-25 05:59:05', '2022-06-25 05:59:19'),
(3, 9, 2, 'uploadTransaksi/fljOoX9GNJoL9yC0EXSIscLSyesfEC8ZQAWt3pkK.png', 2, '2022-06-26 01:45:34', '2022-06-26 01:46:17'),
(4, 10, 1, 'uploadTransaksi/9hFfzNJmapGL7z0pUWTbVUpGYAP6QIcbaMshZeLz.png', 2, '2022-06-27 20:32:41', '2022-06-27 20:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Budi', 'Setiawan', 'budi@gmail.com', NULL, '$2y$10$160IkLIVAEG7E0g5wRsArODyKyUS768eiff/OuPhhOd/MA0btR5rW', 2, NULL, '2022-06-25 04:32:36', '2022-06-25 04:45:30'),
(2, 'Sanjaya', 'Buswan', 'sanjaya@gmail.com', NULL, '$2y$10$Sm4XAG8jJ4J3qi7454mCq.4GcHrTH9oP7HrtXxtyTu3BR.KNVAWu.', 2, NULL, '2022-06-26 01:42:35', '2022-06-26 01:43:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_id_subcategory_foreign` (`id_subcategory`),
  ADD KEY `courses_id_admin_foreign` (`id_admin`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `matericourses`
--
ALTER TABLE `matericourses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matericourses_course_id_foreign` (`course_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_id_category_foreign` (`id_category`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_course_id_foreign` (`course_id`),
  ADD KEY `transaksis_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matericourses`
--
ALTER TABLE `matericourses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_id_subcategory_foreign` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `matericourses`
--
ALTER TABLE `matericourses`
  ADD CONSTRAINT `matericourses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
