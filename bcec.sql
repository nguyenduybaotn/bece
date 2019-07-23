-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 23, 2019 lúc 11:04 AM
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
-- Cấu trúc bảng cho bảng `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `hinh` text NOT NULL,
  `loai` int(11) NOT NULL,
  `sapxep` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `hinhthumb` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `album`
--

INSERT INTO `album` (`id`, `hinh`, `loai`, `sapxep`, `trangthai`, `hinhthumb`) VALUES
(14, '/datauploads/sanpham/1/home_12.jpg', 1, 2, 1, ''),
(15, '/datauploads/sanpham/1/home_13.jpg', 1, 2, 1, ''),
(16, '/datauploads/sanpham/1/home_14.jpg', 1, 2, 1, '');

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucsanpham`
--

CREATE TABLE `danhmucsanpham` (
  `id` int(11) NOT NULL,
  `ten` varchar(200) NOT NULL,
  `hinhdaidien` text NOT NULL,
  `mota` text NOT NULL,
  `lienkettrong` text NOT NULL,
  `lienketngoai` text NOT NULL,
  `trangthai` int(11) NOT NULL,
  `sapxep` int(11) NOT NULL,
  `danhmuccha` int(11) NOT NULL,
  `ten2` varchar(200) NOT NULL,
  `mota2` text NOT NULL,
  `lienkettrong2` text NOT NULL,
  `lienketngoai2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `danhmucsanpham`
--

INSERT INTO `danhmucsanpham` (`id`, `ten`, `hinhdaidien`, `mota`, `lienkettrong`, `lienketngoai`, `trangthai`, `sapxep`, `danhmuccha`, `ten2`, `mota2`, `lienkettrong2`, `lienketngoai2`) VALUES
(20, '', '/datauploads/sanpham/product-category-demo-03.jpg', '', '', '', 1, 1, 0, 'Classic Guitar', 'Classic Guitar', 'classic-guitar', 'classic-guitar.html'),
(21, '', '/datauploads/sanpham/product-category-demo-04.jpg', '', '', '', 1, 2, 0, '	Acoustic Guitar', '	Acoustic Guitar', 'acoustic-guitar', 'acoustic-guitar.html'),
(22, '', '/datauploads/sanpham/product-category-demo-05.jpg', '', '', '', 1, 3, 0, 'Cymbal', 'Cymbal', 'cymbal', 'cymbal.html');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(11) NOT NULL,
  `ten` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tieude` varchar(500) NOT NULL,
  `noidung` text NOT NULL,
  `tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='bảng lưu trữ các liên hệ của khách hàng gửi qua form';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `tenmenu` text NOT NULL,
  `danhmuccha` int(11) NOT NULL,
  `lienket` text NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `sapxep` int(11) NOT NULL,
  `tenmenu2` text NOT NULL,
  `lienket2` text NOT NULL,
  `img` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id`, `tenmenu`, `danhmuccha`, `lienket`, `trangthai`, `sapxep`, `tenmenu2`, `lienket2`, `img`) VALUES
(4, 'Home', 0, 'home', 1, 1, 'Trang chủ', 'trang-chu', ''),
(5, 'About', 0, 'about', 1, 2, 'Giới thiệu', 'gioi-thieu', ''),
(9, 'Services', 0, 'services', 1, 3, 'Dịch vụ', 'dich-vu', ''),
(13, 'Blog', 0, 'blog', 1, 7, 'Blog', 'blog', ''),
(21, 'Customer', 0, 'customer', 1, 8, 'Khách hàng', 'khach-hang', ''),
(22, 'Job', 0, 'job', 1, 9, 'Tuyển dụng', 'tuyen-dung', ''),
(23, 'Contact', 0, 'contact', 1, 10, 'Liên hệ', 'lien-he', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `tendangnhap` varchar(30) NOT NULL,
  `tendangnhapmd5` text NOT NULL,
  `hoten` text NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `hinhdaidien` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `tendangnhap`, `tendangnhapmd5`, `hoten`, `matkhau`, `trangthai`, `hinhdaidien`) VALUES
(1, 'nguyenduybaotn', 'ca7382a8942ed3d0308df15bbed74bf7', 'Nguyễn Duy Bảo', 'e10adc3949ba59abbe56e057f20f883e', 1, '/datauploads/menu/our-showcase-demo-035.jpg'),
(3, 'administrator', '200ceb26807d6bf99fd6f4f0d1ca54d4', 'Admin', '40fbe32a8a5789ea8f62f978c81d2ba7', 1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `ten` text NOT NULL,
  `ma` varchar(100) NOT NULL,
  `thongsochung` text NOT NULL,
  `chitiet` text NOT NULL,
  `filetailieu` text NOT NULL,
  `hinhdaidien` text NOT NULL,
  `album` text NOT NULL,
  `danhmuccha` int(11) NOT NULL,
  `lienket` text NOT NULL,
  `sapxep` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `ten2` text NOT NULL,
  `thongsochung2` text NOT NULL,
  `chitiet2` text NOT NULL,
  `filetailieu2` text NOT NULL,
  `lienket2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `ten`, `ma`, `thongsochung`, `chitiet`, `filetailieu`, `hinhdaidien`, `album`, `danhmuccha`, `lienket`, `sapxep`, `trangthai`, `ten2`, `thongsochung2`, `chitiet2`, `filetailieu2`, `lienket2`) VALUES
(1, 'LED PANEL LIGHT', 'LPL-00001', '<p><strong>Input Voltage</strong>: 85-265V/50-60Hz</p>\r\n\r\n<p><strong>Power</strong>&nbsp;&nbsp;&nbsp; : 3W/6W/9W/12W/18W</p>\r\n\r\n<p><strong>CRI</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &ge; 80</p>\r\n\r\n<p><strong>Color temperature</strong> : 2800-3200K/ 6000-6500K/7000-7500K</p>\r\n\r\n<p><strong>Lumen Mainteenance</strong>: 30,000hrsL90@25oC</p>\r\n\r\n<p><strong>Long life</strong>: 50,000hrs</p>\r\n', '<table align=\"left\" border=\"1\" cellspacing=\"0\" style=\"width:509.2pt\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"height:20.55pt; width:70.3pt\">\r\n			<p><strong>Model</strong></p>\r\n			</td>\r\n			<td style=\"height:20.55pt; width:61.05pt\">\r\n			<p><strong>Lamp Power</strong></p>\r\n			</td>\r\n			<td style=\"height:20.55pt; width:60.4pt\">\r\n			<p><strong>Lumens</strong></p>\r\n			</td>\r\n			<td style=\"height:20.55pt; width:82.6pt\">\r\n			<p><strong>Dimension(mm)</strong><strong>&nbsp;</strong></p>\r\n			</td>\r\n			<td style=\"height:20.55pt; width:74.65pt\">\r\n			<p><strong>Cut out </strong><strong>(mm)</strong></p>\r\n			</td>\r\n			<td style=\"height:20.55pt; width:80.1pt\">\r\n			<p><strong>Weight (gram)</strong></p>\r\n			</td>\r\n			<td style=\"height:20.55pt; width:80.1pt\">\r\n			<p><strong>Unit Price</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:3.55pt; width:70.3pt\">\r\n			<p><strong>LPL-01001-3</strong></p>\r\n			</td>\r\n			<td style=\"height:3.55pt; width:61.05pt\">\r\n			<p>3W</p>\r\n			</td>\r\n			<td style=\"height:3.55pt; width:60.4pt\">\r\n			<p>150lm</p>\r\n			</td>\r\n			<td style=\"height:3.55pt; width:82.6pt\">\r\n			<p>85*75</p>\r\n			</td>\r\n			<td style=\"height:3.55pt; width:74.65pt\">\r\n			<p>70</p>\r\n			</td>\r\n			<td style=\"height:3.55pt; width:80.1pt\">\r\n			<p>80</p>\r\n			</td>\r\n			<td style=\"height:3.55pt; width:80.1pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:12.45pt; width:70.3pt\">\r\n			<p><strong>LPL-01001-6</strong></p>\r\n			</td>\r\n			<td style=\"height:12.45pt; width:61.05pt\">\r\n			<p>6W</p>\r\n			</td>\r\n			<td style=\"height:12.45pt; width:60.4pt\">\r\n			<p>380lm</p>\r\n			</td>\r\n			<td style=\"height:12.45pt; width:82.6pt\">\r\n			<p>120*105</p>\r\n			</td>\r\n			<td style=\"height:12.45pt; width:74.65pt\">\r\n			<p>120</p>\r\n			</td>\r\n			<td style=\"height:12.45pt; width:80.1pt\">\r\n			<p>120</p>\r\n			</td>\r\n			<td style=\"height:12.45pt; width:80.1pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:3.55pt; width:70.3pt\">\r\n			<p><strong>LPL-01001-9</strong></p>\r\n			</td>\r\n			<td style=\"height:3.55pt; width:61.05pt\">\r\n			<p>9W</p>\r\n			</td>\r\n			<td style=\"height:3.55pt; width:60.4pt\">\r\n			<p>520lm</p>\r\n			</td>\r\n			<td style=\"height:3.55pt; width:82.6pt\">\r\n			<p>145*135</p>\r\n			</td>\r\n			<td style=\"height:3.55pt; width:74.65pt\">\r\n			<p>145</p>\r\n			</td>\r\n			<td style=\"height:3.55pt; width:80.1pt\">\r\n			<p>175</p>\r\n			</td>\r\n			<td style=\"height:3.55pt; width:80.1pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:13.1pt; width:70.3pt\">\r\n			<p><strong>LPL-01001-12</strong></p>\r\n			</td>\r\n			<td style=\"height:13.1pt; width:61.05pt\">\r\n			<p>12W</p>\r\n			</td>\r\n			<td style=\"height:13.1pt; width:60.4pt\">\r\n			<p>780lm</p>\r\n			</td>\r\n			<td style=\"height:13.1pt; width:82.6pt\">\r\n			<p>170*155</p>\r\n			</td>\r\n			<td style=\"height:13.1pt; width:74.65pt\">\r\n			<p>170</p>\r\n			</td>\r\n			<td style=\"height:13.1pt; width:80.1pt\">\r\n			<p>210</p>\r\n			</td>\r\n			<td style=\"height:13.1pt; width:80.1pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:13.1pt; width:70.3pt\">\r\n			<p><strong>LPL-01001-18</strong></p>\r\n			</td>\r\n			<td style=\"height:13.1pt; width:61.05pt\">\r\n			<p>18W</p>\r\n			</td>\r\n			<td style=\"height:13.1pt; width:60.4pt\">\r\n			<p>1230m</p>\r\n			</td>\r\n			<td style=\"height:13.1pt; width:82.6pt\">\r\n			<p>225*205</p>\r\n			</td>\r\n			<td style=\"height:13.1pt; width:74.65pt\">\r\n			<p>223</p>\r\n			</td>\r\n			<td style=\"height:13.1pt; width:80.1pt\">\r\n			<p>320</p>\r\n			</td>\r\n			<td style=\"height:13.1pt; width:80.1pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '', '/datauploads/sanpham/product-3_03.jpg', '', 13, 'led-panel-light-lpl-00001.html', 1, 1, 'LED PANEL LIGHT', '<p><strong>Input Voltage</strong>: 85-265V/50-60Hz</p>\r\n\r\n<p><strong>Power</strong>&nbsp;&nbsp;&nbsp; : 3W/6W/9W/12W/18W</p>\r\n\r\n<p><strong>CRI</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &ge; 80</p>\r\n\r\n<p><strong>Color temperature</strong> : 2800-3200K/ 6000-6500K/7000-7500K</p>\r\n\r\n<p><strong>Lumen Mainteenance</strong>: 30,000hrsL90@25oC</p>\r\n\r\n<p><strong>Long life</strong>: 50,000hrs</p>\r\n', '<table align=\"left\" border=\"1\" cellspacing=\"0\" style=\"width:509.2pt\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"height:20.55pt; width:70.3pt\">\r\n			<p><strong>Model</strong></p>\r\n			</td>\r\n			<td style=\"height:20.55pt; width:61.05pt\">\r\n			<p><strong>Lamp Power</strong></p>\r\n			</td>\r\n			<td style=\"height:20.55pt; width:60.4pt\">\r\n			<p><strong>Lumens</strong></p>\r\n			</td>\r\n			<td style=\"height:20.55pt; width:82.6pt\">\r\n			<p><strong>Dimension (mm)</strong><strong>&nbsp;</strong></p>\r\n			</td>\r\n			<td style=\"height:20.55pt; width:74.65pt\">\r\n			<p><strong>Cut out </strong><strong>(mm)</strong></p>\r\n			</td>\r\n			<td style=\"height:20.55pt; width:80.1pt\">\r\n			<p><strong>Weight (gram)</strong></p>\r\n			</td>\r\n			<td style=\"height:20.55pt; width:80.1pt\">\r\n			<p><strong>Unit Price</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:3.55pt; width:70.3pt\">\r\n			<p><strong>LPL-01001-3</strong></p>\r\n			</td>\r\n			<td style=\"height:3.55pt; width:61.05pt\">\r\n			<p>3W</p>\r\n			</td>\r\n			<td style=\"height:3.55pt; width:60.4pt\">\r\n			<p>150lm</p>\r\n			</td>\r\n			<td style=\"height:3.55pt; width:82.6pt\">\r\n			<p>85*75</p>\r\n			</td>\r\n			<td style=\"height:3.55pt; width:74.65pt\">\r\n			<p>70</p>\r\n			</td>\r\n			<td style=\"height:3.55pt; width:80.1pt\">\r\n			<p>80</p>\r\n			</td>\r\n			<td style=\"height:3.55pt; width:80.1pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:12.45pt; width:70.3pt\">\r\n			<p><strong>LPL-01001-6</strong></p>\r\n			</td>\r\n			<td style=\"height:12.45pt; width:61.05pt\">\r\n			<p>6W</p>\r\n			</td>\r\n			<td style=\"height:12.45pt; width:60.4pt\">\r\n			<p>380lm</p>\r\n			</td>\r\n			<td style=\"height:12.45pt; width:82.6pt\">\r\n			<p>120*105</p>\r\n			</td>\r\n			<td style=\"height:12.45pt; width:74.65pt\">\r\n			<p>120</p>\r\n			</td>\r\n			<td style=\"height:12.45pt; width:80.1pt\">\r\n			<p>120</p>\r\n			</td>\r\n			<td style=\"height:12.45pt; width:80.1pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:3.55pt; width:70.3pt\">\r\n			<p><strong>LPL-01001-9</strong></p>\r\n			</td>\r\n			<td style=\"height:3.55pt; width:61.05pt\">\r\n			<p>9W</p>\r\n			</td>\r\n			<td style=\"height:3.55pt; width:60.4pt\">\r\n			<p>520lm</p>\r\n			</td>\r\n			<td style=\"height:3.55pt; width:82.6pt\">\r\n			<p>145*135</p>\r\n			</td>\r\n			<td style=\"height:3.55pt; width:74.65pt\">\r\n			<p>145</p>\r\n			</td>\r\n			<td style=\"height:3.55pt; width:80.1pt\">\r\n			<p>175</p>\r\n			</td>\r\n			<td style=\"height:3.55pt; width:80.1pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:13.1pt; width:70.3pt\">\r\n			<p><strong>LPL-01001-12</strong></p>\r\n			</td>\r\n			<td style=\"height:13.1pt; width:61.05pt\">\r\n			<p>12W</p>\r\n			</td>\r\n			<td style=\"height:13.1pt; width:60.4pt\">\r\n			<p>780lm</p>\r\n			</td>\r\n			<td style=\"height:13.1pt; width:82.6pt\">\r\n			<p>170*155</p>\r\n			</td>\r\n			<td style=\"height:13.1pt; width:74.65pt\">\r\n			<p>170</p>\r\n			</td>\r\n			<td style=\"height:13.1pt; width:80.1pt\">\r\n			<p>210</p>\r\n			</td>\r\n			<td style=\"height:13.1pt; width:80.1pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:13.1pt; width:70.3pt\">\r\n			<p><strong>LPL-01001-18</strong></p>\r\n			</td>\r\n			<td style=\"height:13.1pt; width:61.05pt\">\r\n			<p>18W</p>\r\n			</td>\r\n			<td style=\"height:13.1pt; width:60.4pt\">\r\n			<p>1230m</p>\r\n			</td>\r\n			<td style=\"height:13.1pt; width:82.6pt\">\r\n			<p>225*205</p>\r\n			</td>\r\n			<td style=\"height:13.1pt; width:74.65pt\">\r\n			<p>223</p>\r\n			</td>\r\n			<td style=\"height:13.1pt; width:80.1pt\">\r\n			<p>320</p>\r\n			</td>\r\n			<td style=\"height:13.1pt; width:80.1pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '', 'led-panel-light-lpl-00001.html'),
(5, 'LED PANEL LIGHT', 'LPL-00002', '<p>LED PANEL LIGHT</p>\r\n', '<p>LED PANEL LIGHT</p>\r\n', '', '/datauploads/sanpham/product-3_05.jpg', '', 13, 'led-panel-light-lpl-00002.html', 2, 1, 'LED PANEL LIGHT', '<p>LPL-00002</p>\r\n', '<p>LPL-00002</p>\r\n', '', 'led-panel-light-lpl-00002.html'),
(6, 'LED PANEL LIGHT', 'LPL-00003', '<p>LED PANEL LIGHT</p>\r\n', '<p>LED PANEL LIGHT</p>\r\n', '', '/datauploads/sanpham/product-3_07.jpg', '', 13, 'led-panel-light-lpl-00003.html', 3, 1, 'LED PANEL LIGHT', '<p>LED PANEL LIGHT</p>\r\n', '<p>LED PANEL LIGHT</p>\r\n', '', 'led-panel-light-lpl-00003.html');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `truycap`
--

CREATE TABLE `truycap` (
  `id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `thoigian` datetime NOT NULL,
  `noidung` text NOT NULL,
  `trangthai` int(11) NOT NULL DEFAULT '0',
  `danhmuc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `truycap`
--

INSERT INTO `truycap` (`id`, `ip`, `thoigian`, `noidung`, `trangthai`, `danhmuc`) VALUES
(920, '::1', '2019-07-23 12:53:49', '<b>nguyenduybaotn1</b> đăng nhập không thành công', 0, ''),
(921, '::1', '2019-07-23 12:53:53', '<b>nguyenduybaotn</b> đăng nhập thành công', 1, 'Đăng nhập/Đăng xuất'),
(922, '::1', '2019-07-23 12:53:58', '<b>nguyenduybaotn</b> đã đăng xuất', 0, ''),
(923, '::1', '2019-07-23 12:58:01', '<b>nguyenduybaotn</b> đăng nhập thành công', 1, 'Đăng nhập/Đăng xuất'),
(924, '::1', '2019-07-23 01:03:42', 'Vào trang profile của nguyenduybaotn', 0, ''),
(925, '::1', '2019-07-23 01:33:00', 'Vào trang profile của nguyenduybaotn', 0, ''),
(926, '::1', '2019-07-23 01:34:19', 'Vào trang profile của nguyenduybaotn', 0, ''),
(927, '::1', '2019-07-23 01:43:20', 'Vào trang profile của nguyenduybaotn', 0, ''),
(928, '::1', '2019-07-23 01:43:22', 'Vào trang profile của nguyenduybaotn', 0, ''),
(929, '::1', '2019-07-23 01:43:23', 'Vào trang profile của nguyenduybaotn', 0, ''),
(930, '::1', '2019-07-23 01:49:28', 'Vào trang profile của nguyenduybaotn', 0, ''),
(931, '::1', '2019-07-23 01:49:46', 'Vào trang profile của nguyenduybaotn', 0, ''),
(932, '::1', '2019-07-23 01:54:01', 'Vào trang profile của nguyenduybaotn', 0, ''),
(933, '::1', '2019-07-23 01:54:43', 'Vào trang profile của nguyenduybaotn', 0, ''),
(934, '::1', '2019-07-23 01:54:59', 'Vào trang profile của nguyenduybaotn', 0, ''),
(935, '::1', '2019-07-23 01:55:57', 'Vào trang profile của nguyenduybaotn', 0, ''),
(936, '::1', '2019-07-23 01:57:02', 'Vào trang profile của nguyenduybaotn', 0, ''),
(937, '::1', '2019-07-23 01:57:52', 'Vào trang profile của nguyenduybaotn', 0, ''),
(938, '::1', '2019-07-23 01:57:57', 'Vào trang profile của nguyenduybaotn', 0, ''),
(939, '::1', '2019-07-23 01:58:03', 'Vào trang profile của nguyenduybaotn', 0, ''),
(940, '::1', '2019-07-23 01:58:08', 'Vào trang profile của nguyenduybaotn', 0, ''),
(941, '::1', '2019-07-23 01:58:11', 'Vào trang profile của nguyenduybaotn', 0, ''),
(942, '::1', '2019-07-23 02:00:53', 'Vào trang profile của nguyenduybaotn', 0, ''),
(943, '::1', '2019-07-23 02:01:00', 'Vào trang profile của nguyenduybaotn', 0, ''),
(944, '::1', '2019-07-23 02:01:04', 'Vào trang profile của nguyenduybaotn', 0, ''),
(945, '::1', '2019-07-23 02:03:14', 'Vào trang profile của nguyenduybaotn', 0, ''),
(946, '::1', '2019-07-23 02:03:15', 'Vào trang profile của nguyenduybaotn', 0, ''),
(947, '::1', '2019-07-23 02:03:20', 'Vào trang profile của nguyenduybaotn', 0, ''),
(948, '::1', '2019-07-23 02:06:53', 'Vào trang profile của nguyenduybaotn', 0, ''),
(949, '::1', '2019-07-23 02:06:58', 'Vào trang profile của nguyenduybaotn', 0, ''),
(950, '::1', '2019-07-23 02:08:32', 'Vào trang profile của nguyenduybaotn', 0, ''),
(951, '::1', '2019-07-23 02:12:24', 'Vào trang profile của nguyenduybaotn', 0, ''),
(952, '::1', '2019-07-23 02:38:38', 'Vào trang profile của nguyenduybaotn', 0, ''),
(953, '::1', '2019-07-23 02:38:45', 'Vào trang profile của nguyenduybaotn', 0, ''),
(954, '::1', '2019-07-23 02:38:50', 'Vào trang profile của nguyenduybaotn', 0, ''),
(955, '::1', '2019-07-23 02:39:41', 'Vào trang menu', 0, ''),
(956, '::1', '2019-07-23 02:39:44', 'Vào trang menu', 0, ''),
(957, '::1', '2019-07-23 02:45:19', '<b>nguyenduybaotn</b> đã đăng xuất', 0, '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cauhinh`
--
ALTER TABLE `cauhinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `truycap`
--
ALTER TABLE `truycap`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `cauhinh`
--
ALTER TABLE `cauhinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `truycap`
--
ALTER TABLE `truycap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=958;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
