-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2025 at 08:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auth_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_12_045203_add_role_to_users_table', 2),
(5, '2025_06_13_064047_create_tbl_admin_table', 3),
(6, '2025_06_19_031138_create_table_cartegory_product', 4),
(7, '2025_06_26_025507_create_tbl_product', 5),
(8, '2025_07_04_033659_create_tbl_brand_table', 5),
(9, '2025_07_07_152113_create_tbl_student_table', 6),
(10, '2025_07_08_151919_create_tbl_pages_table', 7),
(11, '2025_07_08_152418_create_tbl_student_table', 8),
(12, '2025_07_08_152756_create_tbl_student_table', 9),
(13, '2025_07_09_043525_create_tbl_pages_table', 10),
(14, '2025_07_09_074213_create_tbl_curriculums_table', 11),
(15, '2025_07_09_081042_create_tbl_instructors_table', 12),
(16, '2025_07_09_082440_create_tbl_faqs_table', 13),
(17, '2025_07_09_084335_create_tbl_reviews_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('HzLfEiQ1cqAzxRjsvunLPfyKETUTew2S8azj3jBX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVmg3NUhGWEdnWmEwZndpcU1wdGdlYTlnVkhLWE1CcGdRT1UxZkVNUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hbGwtY2hpdGlldGtob2Fob2MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjc6Im1lc3NhZ2UiO047fQ==', 1752123414);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '$2y$12$HI1DCkb/zrrj7uTCtAyuj.15Jl./DYVcGFSqn6sHdlt7ivOcT00JK', 'Admin', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_desc` text NOT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_desc`, `brand_status`, `created_at`, `updated_at`) VALUES
(1, '23423', '23423', 1, NULL, NULL),
(2, 'ducanh123', 'ducanh30012', 1, NULL, NULL),
(3, 'ducanh1', '123123123', 1, NULL, NULL),
(4, 'qưeqw', 'qưeqw', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `catgory_id` int(10) UNSIGNED NOT NULL,
  `catgory_name` varchar(255) NOT NULL,
  `catgory_desc` text NOT NULL,
  `catgory_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`catgory_id`, `catgory_name`, `catgory_desc`, `catgory_status`, `created_at`, `updated_at`) VALUES
(6, 'ádasdas', 'đây là lớp học adroi 82183182', 1, NULL, NULL),
(7, 'ádashdahsd', 'ádasdasjdajsdja', 0, NULL, NULL),
(8, '23423423', 'ducanh hoang 1234565', 0, NULL, NULL),
(9, 'ducanh123', 'ádasdasdasdas', 1, NULL, NULL),
(10, 'khóa học laaoj t rình', 'đây là khóa học ......', 1, NULL, NULL),
(11, 'ducanh', '# 🎨 Khóa Học UI/UX Design Cơ Bản\r\n\r\n> Khóa học giúp bạn nắm vững nền tảng về thiết kế giao diện và trải nghiệm người dùng – từ lý thuyết đến thực hành.\r\n\r\n---\r\n\r\n## 📚 Nội Dung Khóa Học\r\n\r\n### 📦 Phần 1: UI/UX Introduction\r\n\r\n- ✅ Bài 1: Giới thiệu về UI/UX\r\n- ✅ Bài 2: Nguyên lý cơ bản trong UX\r\n- ✅ Bài 3: Wireframe và Prototyping\r\n\r\n### 🌈 Phần 2: Color Theory\r\n\r\n- 🎨 Bài 1: Cơ bản về phối màu\r\n- 🎨 Bài 2: Tâm lý học màu sắc\r\n- 🎨 Bài 3: Ứng dụng màu trong thiết kế\r\n\r\n### 🔤 Phần 3: Typography\r\n\r\n- ✍️ Bài 1: Kiến thức cơ bản về phông chữ\r\n- ✍️ Bài 2: Ghép cặp font hiệu quả\r\n- ✍️ Bài 3: Tối ưu khả năng đọc trong UI\r\n\r\n---\r\n\r\n## 💡 Yêu Cầu\r\n\r\n- Biết sử dụng máy tính cơ bản\r\n- Có kiến thức nền tảng về thiết kế là một lợi thế\r\n\r\n---\r\n\r\n## 🎓 Sau Khóa Học Bạn Sẽ\r\n\r\n- ✅ Biết cách xây dựng wireframe\r\n- ✅ Sử dụng màu và font chữ một cách chuyên nghiệp\r\n- ✅ Tự tin thiết kế UI/UX cơ bản\r\n\r\n---\r\n\r\n## 🔗 Đăng ký ngay: [https://yourcourse.link](https://yourcourse.link)', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_curriculums`
--

CREATE TABLE `tbl_curriculums` (
  `curriculums_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `curriculums_title` varchar(255) NOT NULL,
  `curriculums_content` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_curriculums`
--

INSERT INTO `tbl_curriculums` (`curriculums_id`, `product_id`, `curriculums_title`, `curriculums_content`, `created_at`, `updated_at`) VALUES
(1, 4, 'ducanh', 'ducanh123', '2025-07-09 19:26:04', '2025-07-09 19:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faqs`
--

CREATE TABLE `tbl_faqs` (
  `faqs_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `faqs_question` varchar(255) NOT NULL,
  `faqs_answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instructors`
--

CREATE TABLE `tbl_instructors` (
  `instructors_id` int(10) UNSIGNED NOT NULL,
  `instructors_name` varchar(255) NOT NULL,
  `instructors_bio` varchar(255) NOT NULL,
  `instructors_image` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `page_id` int(10) UNSIGNED NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_slug` varchar(255) NOT NULL,
  `page_content` longtext NOT NULL,
  `page_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `product_content` text NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `brand_id`, `product_desc`, `product_content`, `product_price`, `product_image`, `product_status`, `created_at`, `updated_at`) VALUES
(3, 'qưqw', 10, 2, 'Hi there, welcome to PHP Zone, để tôi chia sẻ với bạn điều này PHP là một trong những ngôn ngữ lập trình lâu đời nhất hiện nay. Nền tảng WordPress được tạo ra từ PHP, ở đó hầu hết các trang web trình bày nội dung và kinh doanh được tạo ra. Có thể nói, PHP là một ngôn ngữ tuyệt vời cho các “newbie”. Khi CV của bạn được trang trí bằng việc làm chủ ngôn ngữ này, chắc chắn nhiều cơ hội việc làm lớn sẽ mở ra với bạn.', 'Hi there, welcome to PHP Zone, để tôi chia sẻ với bạn điều này PHP là một trong những ngôn ngữ lập trình lâu đời nhất hiện nay. Nền tảng WordPress được tạo ra từ PHP, ở đó hầu hết các trang web trình bày nội dung và kinh doanh được tạo ra. Có thể nói, PHP là một ngôn ngữ tuyệt vời cho các “newbie”. Khi CV của bạn được trang trí bằng việc làm chủ ngôn ngữ này, chắc chắn nhiều cơ hội việc làm lớn sẽ mở ra với bạn.', '123', '1751617368_tour-list3.jpg', 1, NULL, NULL),
(4, 'ducanh123', 10, 2, 'Hi there, welcome to PHP Zone, để tôi chia sẻ với bạn điều này PHP là một trong những ngôn ngữ lập trình lâu đời nhất hiện nay. Nền tảng WordPress được tạo ra từ PHP, ở đó hầu hết các trang web trình bày nội dung và kinh doanh được tạo ra. Có thể nói, PHP là một ngôn ngữ tuyệt vời cho các “newbie”. Khi CV của bạn được trang trí bằng việc làm chủ ngôn ngữ này, chắc chắn nhiều cơ hội việc làm lớn sẽ mở ra với bạn.', 'Hi there, welcome to PHP Zone, để tôi chia sẻ với bạn điều này PHP là một trong những ngôn ngữ lập trình lâu đời nhất hiện nay. Nền tảng WordPress được tạo ra từ PHP, ở đó hầu hết các trang web trình bày nội dung và kinh doanh được tạo ra. Có thể nói, PHP là một ngôn ngữ tuyệt vời cho các “newbie”. Khi CV của bạn được trang trí bằng việc làm chủ ngôn ngữ này, chắc chắn nhiều cơ hội việc làm lớn sẽ mở ra với bạn.', '123123123', '1751617346_tour-list4.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reviews`
--

CREATE TABLE `tbl_reviews` (
  `review_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `review_username` varchar(255) NOT NULL,
  `review_rating` int(11) NOT NULL,
  `review_comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(10) UNSIGNED NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_phone` varchar(255) NOT NULL,
  `student_note` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `student_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `student_name`, `student_email`, `student_phone`, `student_note`, `product_id`, `student_status`, `created_at`, `updated_at`) VALUES
(2, 'ducanh', 'ducanhhoang2@gmail.com', '0911331581', 'ducanh3001', 4, 1, '2025-07-08 19:04:26', '2025-07-08 20:59:42'),
(3, 'ducanhhoang2', 'dsasudasd@gmail.com', '098123123', 'ducanhhoang21312313', 4, 1, '2025-07-08 21:08:37', '2025-07-08 21:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'ducanh3001', 'ducanh30012003@gmail.com', NULL, '$2y$12$Xsqg87Yvl5LZGR0cAq9LHeCNQkKqDkiNeaHTk46ni6IR2wZP0tT5.', NULL, '2025-06-11 21:40:29', '2025-06-11 21:40:29', 'user'),
(2, 'Ducanh30012003', 'hoangducanh68@gmail.com', NULL, '$2y$12$0fuYwvjf5Qt9vWAAZvbMc.kDNjX8eU2Ey5U/3W4cm7vI6ot5bVSLi', NULL, '2025-06-11 21:46:48', '2025-06-11 21:46:48', 'user'),
(3, 'ducanh846', 'ducanh30012004@gmail.com', NULL, '$2y$12$xTkUL5WNtbhdwfYGnwYyO.3hnbPiIVNQVU7RtjBxEJWeiBEMzKA1.', NULL, '2025-06-11 21:48:19', '2025-06-11 21:48:19', 'user'),
(4, 'ducanh30012003', 'hducanh58@gmail.com', NULL, '$2y$12$1mxS8B/ogQBmYXW1VNJTJucrlVZ6gJ0pjLwOADZXt0uY5Gc.G/PIm', NULL, '2025-06-12 19:39:38', '2025-06-12 19:39:38', 'user'),
(5, 'Ducanh20037', 'ducanh30012006@gmail.com', NULL, '$2y$12$zIIed/pt4Mv6/2pByztlNugbFl2xRphb.gX2PBNq1GOfeClcAkmM.', NULL, '2025-06-12 19:40:23', '2025-06-12 19:40:23', 'user'),
(6, 'hducanh68@gmail', 'ducanh30012005@gmail.com', NULL, '$2y$12$DnRSNiVntmqNgFfyUvd0Qetlv1jucjDZsYLM0rYnVvryu5s2Wd5eu', NULL, '2025-06-13 00:46:01', '2025-06-13 00:46:01', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`catgory_id`);

--
-- Indexes for table `tbl_curriculums`
--
ALTER TABLE `tbl_curriculums`
  ADD PRIMARY KEY (`curriculums_id`);

--
-- Indexes for table `tbl_faqs`
--
ALTER TABLE `tbl_faqs`
  ADD PRIMARY KEY (`faqs_id`);

--
-- Indexes for table `tbl_instructors`
--
ALTER TABLE `tbl_instructors`
  ADD PRIMARY KEY (`instructors_id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `catgory_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_curriculums`
--
ALTER TABLE `tbl_curriculums`
  MODIFY `curriculums_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_faqs`
--
ALTER TABLE `tbl_faqs`
  MODIFY `faqs_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_instructors`
--
ALTER TABLE `tbl_instructors`
  MODIFY `instructors_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `page_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  MODIFY `review_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
