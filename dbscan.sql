-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th6 14, 2017 lúc 02:21 AM
-- Phiên bản máy phục vụ: 5.7.18-0ubuntu0.16.04.1
-- Phiên bản PHP: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbscan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ip`
--

CREATE TABLE `ip` (
  `ip` varchar(15) COLLATE utf8_vietnamese_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `port` text COLLATE utf8_vietnamese_ci,
  `vtf` int(11) DEFAULT NULL,
  `user` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `ip`
--

INSERT INTO `ip` (`ip`, `status`, `port`, `vtf`, `user`) VALUES
('188.166.217.66', 'up', '22\n80\n3000', NULL, 'user'),
('203.113.130.250', 'up', '22\n25\n80\n111\n2049\n3389\n8080\n8081', NULL, 'admin'),
('216.58.221.142', 'up', '80\n443', NULL, 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL DEFAULT '10001',
  `username` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `pass` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `pass`, `role`) VALUES
(10001, 'admin', 'zxcvzxcv', 1),
(10001, 'user', 'zxcvzxcv', 0),
(10001, 'user1', 'zxcvzxcv', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ip`
--
ALTER TABLE `ip`
  ADD PRIMARY KEY (`ip`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `id` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
