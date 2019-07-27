-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 27, 2019 lúc 05:47 AM
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
-- Cấu trúc bảng cho bảng `blacklist`
--

CREATE TABLE `blacklist` (
  `id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `lydo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `ten` text NOT NULL,
  `mota` mediumtext NOT NULL,
  `noidung` mediumtext NOT NULL,
  `hinhdaidien` text NOT NULL,
  `ngaydang` datetime NOT NULL,
  `trangthai` int(11) NOT NULL,
  `sapxep` int(11) NOT NULL,
  `lienket` text NOT NULL,
  `solangui` int(11) NOT NULL,
  `ten2` text NOT NULL,
  `mota2` text NOT NULL,
  `noidung2` text NOT NULL,
  `lienket2` text NOT NULL,
  `loai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`id`, `ten`, `mota`, `noidung`, `hinhdaidien`, `ngaydang`, `trangthai`, `sapxep`, `lienket`, `solangui`, `ten2`, `mota2`, `noidung2`, `lienket2`, `loai`) VALUES
(1, 'Blog 1', 'Blog 1', '', '/datauploads/tintuc/orther-product-demo-051.jpg', '2019-07-24 13:26:45', 1, 1, 'blog-1-1.html', 0, 'Blog 1', 'Blog 1', '<p>Blog 1</p>\r\n', 'blog-1-1.html', 0);

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
-- Cấu trúc bảng cho bảng `dichvu`
--

CREATE TABLE `dichvu` (
  `id` int(11) NOT NULL,
  `ten` text NOT NULL,
  `mota` mediumtext NOT NULL,
  `noidung` mediumtext NOT NULL,
  `hinhdaidien` text NOT NULL,
  `ngaydang` datetime NOT NULL,
  `trangthai` int(11) NOT NULL,
  `sapxep` int(11) NOT NULL,
  `lienket` text NOT NULL,
  `solangui` int(11) NOT NULL,
  `ten2` text NOT NULL,
  `mota2` text NOT NULL,
  `noidung2` text NOT NULL,
  `lienket2` text NOT NULL,
  `loai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `ten` text NOT NULL,
  `hinhdaidien` text NOT NULL,
  `lienket` text NOT NULL,
  `sapxep` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `ten2` text NOT NULL,
  `mota` text NOT NULL,
  `mota2` text NOT NULL,
  `lienket2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `ten`, `hinhdaidien`, `lienket`, `sapxep`, `trangthai`, `ten2`, `mota`, `mota2`, `lienket2`) VALUES
(3, 'Khách hàng 01', '/datauploads/khachhang/our-showcase-demo-05.jpg', '#xxx', 0, 1, 'Khách hàng 011', 'Khách hàng 01', 'Khách hàng 01', '#xxx'),
(4, 'Khách hàng 02', '/datauploads/khachhang/our-showcase-demo-06.jpg', '#xx', 1, 1, 'Khách hàng 02', 'Khách hàng 0 f', 'Khách hàng 0 f', '#xx');

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
  `hinhdaidien` text NOT NULL,
  `email` text NOT NULL,
  `spam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `tendangnhap`, `tendangnhapmd5`, `hoten`, `matkhau`, `trangthai`, `hinhdaidien`, `email`, `spam`) VALUES
(1, 'nguyenduybaotn', 'ca7382a8942ed3d0308df15bbed74bf7', 'Nguyễn Duy Bảo', '59db60a30c0d87dfe93c3f3600b391c2', 1, '/datauploads/menu/our-showcase-demo-035.jpg', 'nguyenduybaotn@gmail.com', 0),
(3, 'administrator', '200ceb26807d6bf99fd6f4f0d1ca54d4', 'Admin', '41e59652474161d751acba735488d615', 1, '', 'nguyenduybaovn@gmail.com', 0);

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
  `danhmuc` text NOT NULL,
  `mota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `truycap`
--

INSERT INTO `truycap` (`id`, `ip`, `thoigian`, `noidung`, `trangthai`, `danhmuc`, `mota`) VALUES
(988, '::1', '2019-07-24 13:53:35', '', 1, 'Đăng nhập/Đăng xuất', '<b>nguyenduybaotn</b> đã đăng xuất'),
(989, '::1', '2019-07-24 13:53:37', '{\"id\":\"1\",\"tendangnhap\":\"nguyenduybaotn\",\"tinhtrang\":\"1\",\"logged_in\":true}', 1, 'Đăng nhập/Đăng xuất', '<b>nguyenduybaotn</b> đăng nhập thành công'),
(990, '::1', '2019-07-24 15:28:12', '[{\"id\":\"0\",\"ten\":\"1\",\"mota\":\"1\",\"noidung\":\"\",\"hinhdaidien\":\"\\/datauploads\\/dichvu\\/product-category-demo-04.jpg\",\"ngaydang\":\"2019-07-24 15:28:12\",\"trangthai\":\"1\",\"sapxep\":\"1\",\"lienket\":\"1-1.html\",\"solangui\":\"0\",\"ten2\":\"1\",\"mota2\":\"1\",\"noidung2\":\"<p>1<\\/p>\\r\\n\",\"lienket2\":\"1-1.html\",\"loai\":\"0\"}]', 1, 'Dịch vụ', '<b>nguyenduybaotn</b> đã thêm dịch vụ: 1'),
(991, '::1', '2019-07-24 15:28:19', '[{\"id\":\"0\",\"ten\":\"1\",\"mota\":\"1\",\"noidung\":\"\",\"hinhdaidien\":\"\\/datauploads\\/dichvu\\/product-category-demo-04.jpg\",\"ngaydang\":\"2019-07-24 15:28:12\",\"trangthai\":\"1\",\"sapxep\":\"1\",\"lienket\":\"1-1.html\",\"solangui\":\"0\",\"ten2\":\"1\",\"mota2\":\"1\",\"noidung2\":\"<p>1<\\/p>\\r\\n\",\"lienket2\":\"1-1.html\",\"loai\":\"0\"}] <--> [{\"id\":\"0\",\"ten\":\"1\",\"mota\":\"1\",\"noidung\":\"\",\"hinhdaidien\":\"\\/datauploads\\/dichvu\\/product-category-demo-04.jpg\",\"ngaydang\":\"2019-07-24 15:28:12\",\"trangthai\":\"1\",\"sapxep\":\"1\",\"lienket\":\"1-1.html\",\"solangui\":\"0\",\"ten2\":\"12\",\"mota2\":\"1\",\"noidung2\":\"<p>1<\\/p>\\r\\n\",\"lienket2\":\"12-1.html\",\"loai\":\"0\"}]', 1, 'Dịch vụ', '<b>nguyenduybaotn</b> đã sửa dịch vụ: 1 thành: 12'),
(992, '::1', '2019-07-24 15:28:21', '[]', 1, 'Dịch vụ', '<b>nguyenduybaotn</b> đã xóa dịch vụ: 12'),
(993, '::1', '2019-07-26 09:47:40', '{\"id\":\"1\",\"tendangnhap\":\"nguyenduybaotn\",\"tinhtrang\":\"1\",\"logged_in\":true}', 1, 'Đăng nhập/Đăng xuất', '<b>nguyenduybaotn</b> đăng nhập thành công'),
(994, '::1', '2019-07-26 10:37:41', '', 1, 'Đăng nhập/Đăng xuất', '<b>nguyenduybaotn</b> đã đăng xuất'),
(995, '::1', '2019-07-26 10:37:46', '{\"tendangnhap\":\"nguyenduybaotn\",\"matkhau\":\"1340camdung1\"}', 0, '', '<b>nguyenduybaotn</b> đăng nhập không thành công'),
(996, '::1', '2019-07-26 10:37:55', '{\"tendangnhap\":\"nguyenduybaotn\",\"matkhau\":\"1340camdung1222\"}', 0, '', '<b>nguyenduybaotn</b> đăng nhập không thành công'),
(997, '::1', '2019-07-26 10:38:05', '{\"tendangnhap\":\"nguyenduybaotn\",\"matkhau\":\"1340camdung1222\"}', 0, '', '<b>nguyenduybaotn</b> đăng nhập không thành công'),
(998, '::1', '2019-07-26 10:38:08', '{\"tendangnhap\":\"nguyenduybaotn\",\"matkhau\":\"1340camdung1222\"}', 0, '', '<b>nguyenduybaotn</b> đăng nhập không thành công'),
(999, '::1', '2019-07-26 10:38:09', '{\"tendangnhap\":\"nguyenduybaotn\",\"matkhau\":\"1340camdung1222\"}', 0, '', '<b>nguyenduybaotn</b> đăng nhập không thành công'),
(1000, '::1', '2019-07-26 10:38:11', '{\"tendangnhap\":\"nguyenduybaotn\",\"matkhau\":\"1340camdung1222\"}', 0, '', '<b>nguyenduybaotn</b> đăng nhập không thành công'),
(1001, '::1', '2019-07-26 10:38:12', '{\"tendangnhap\":\"nguyenduybaotn\",\"matkhau\":\"1340camdung1222\"}', 0, '', '<b>nguyenduybaotn</b> đăng nhập không thành công'),
(1002, '::1', '2019-07-26 10:53:42', '{\"id\":\"1\",\"tendangnhap\":\"nguyenduybaotn\",\"tinhtrang\":\"1\",\"logged_in\":true}', 1, 'Đăng nhập/Đăng xuất', '<b>nguyenduybaotn</b> đăng nhập thành công');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blacklist`
--
ALTER TABLE `blacklist`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
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
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
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
-- AUTO_INCREMENT cho bảng `blacklist`
--
ALTER TABLE `blacklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `truycap`
--
ALTER TABLE `truycap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
