-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 10, 2020 lúc 06:56 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbtest`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `idfrom` int(11) NOT NULL,
  `idto` int(11) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `message`
--

INSERT INTO `message` (`id`, `idfrom`, `idto`, `message`) VALUES
(1, 8, 9, 'oke baby'),
(2, 9, 8, 'hung'),
(3, 9, 8, 'hai'),
(4, 1, 8, 'hello'),
(5, 8, 9, 'Gửi'),
(6, 8, 9, 'bạn đến từ đâu'),
(7, 8, 1, 'hung'),
(8, 1, 8, 'bạn đến từ đâu'),
(9, 8, 1, 'BN bạn ơi'),
(10, 1, 1, 'bạn đến từ đâu'),
(11, 1, 1, 'hung'),
(12, 1, 8, 'oke ban'),
(13, 1, 8, 'hihi ban'),
(14, 1, 8, 'chao ban'),
(15, 1, 8, 'a'),
(16, 1, 8, 'bạn đến từ đâu'),
(17, 1, 8, 'hihi ban'),
(18, 8, 1, 'chao ban'),
(19, 8, 5, 'aaa'),
(20, 5, 8, 'oke ban'),
(22, 1, 5, 'chao ban'),
(23, 17, 1, 'chao thay'),
(28, 5, 16, 'bạn đến từ đâu'),
(31, 16, 5, 'BN bạn ơi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subtask`
--

CREATE TABLE `subtask` (
  `id` int(11) NOT NULL,
  `idsv` int(11) NOT NULL,
  `idtask` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `subtask`
--

INSERT INTO `subtask` (`id`, `idsv`, `idtask`, `link`, `time`) VALUES
(11, 8, 7, 'subtask/Book1.xlsx', '2020-10-07 09:58:48'),
(12, 9, 6, 'subtask/DIPN08STT30B17DCCN284AS501.docx', '2020-10-07 14:35:15'),
(13, 9, 7, 'subtask/Screenshot (275).png', '2020-10-08 04:55:31'),
(14, 17, 9, 'subtask/note_LT-Web.txt', '2020-10-09 16:40:55'),
(15, 17, 11, 'subtask/goi-y-chu-de-bai-tap-lon.pdf', '2020-10-09 16:48:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `tieude` varchar(100) NOT NULL,
  `ngaybatdau` text NOT NULL,
  `ngayketthuc` text NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `task`
--

INSERT INTO `task` (`id`, `tieude`, `ngaybatdau`, `ngayketthuc`, `link`) VALUES
(8, 'Home1', '2020-10-09', '2020-10-10', 'task/note.txt'),
(9, 'home2', '2020-10-10', '2020-10-14', 'task/note_LT-Web.txt'),
(10, 'home3', '2020-10-09', '2020-10-16', 'task/a.jpg'),
(11, 'home4', '2020-10-09', '2020-10-16', 'task/quanlybanhang1.doc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT 0,
  `updated_at` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `phone`, `email`, `level`, `updated_at`, `created_at`) VALUES
(1, 'Trung Quan', 'quan', '$2y$10$rDXfQRy3IK6nquiTps1RmuuMbonvTEpylPwBKM8jOVx0eiL3lLJW6', '0336445423', 'quan@gmail.com', 1, '', ''),
(5, 'Nguyen Hoang Hung', 'admin', '$2y$10$X52Y3GXwuvjDHiMu3xk4Fev5DgjJGz4XrxpYPCXOOLtRSD1JWahI.', '199987', 'huyen96mtc@gmail.com', 1, '2020-10-05 09:02:45', '2020-10-03 16:43:29'),
(16, 'Nguyen Hoang Hung', '1', '$2y$10$9GsrL23khE3RDfB0jo4TXOYq4e8AOUJ4ihgbOeiFU1PAbfbUdlG4S', '0335038168', 'hungcn8b@gmail.com', 0, '2020-10-09 16:35:20', '2020-10-09 16:35:20'),
(17, 'Hoàng Thanh Hải', '2', '$2y$10$N/hMNsjnPPIRW93Ma6ZFJOMX6Cr4rx1fT8FZDUmFKwKXNZvGxt5DC', '03528461288', 'haicn8b@gmail.com', 0, '2020-10-10 04:39:50', '2020-10-09 16:35:47'),
(18, 'datanoname', '3', '$2y$10$IXpdwn6moyjgGS6VCee/nOyR0St1M3qWjS.M11shTEXw6AEEFnq56', '0985645874', 'hungbn99@gmail.com', 0, '2020-10-09 16:36:16', '2020-10-09 16:36:16');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `subtask`
--
ALTER TABLE `subtask`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `subtask`
--
ALTER TABLE `subtask`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
