-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 22, 2019 lúc 11:51 AM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bcec`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cauhinh`
--

CREATE TABLE `cauhinh` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `name2` text NOT NULL,
  `logo` text NOT NULL,
  `tel` text NOT NULL,
  `phone` text NOT NULL,
  `fax` text NOT NULL,
  `address` text NOT NULL,
  `address2` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `youtube` text NOT NULL,
  `google` text NOT NULL,
  `map` text NOT NULL,
  `sort` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `about` text NOT NULL,
  `about2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='cấu hình chung cho website';

--
-- Đang đổ dữ liệu cho bảng `cauhinh`
--

INSERT INTO `cauhinh` (`id`, `name`, `name2`, `logo`, `tel`, `phone`, `fax`, `address`, `address2`, `facebook`, `twitter`, `youtube`, `google`, `map`, `sort`, `active`, `about`, `about2`) VALUES
(1, 'Trung Tâm Hội Nghị và Triển Lãm Bình Dương', '', '', '', '', '', '', '', '', '', '', '', '', 0, 1, '', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cauhinh`
--
ALTER TABLE `cauhinh`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cauhinh`
--
ALTER TABLE `cauhinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
