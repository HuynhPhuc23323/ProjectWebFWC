-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 01, 2021 lúc 03:46 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `product_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` decimal(15,4) NOT NULL,
  `product_image` text COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(10) NOT NULL,
  `total_price` decimal(15,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `idUser`, `product_name`, `product_price`, `product_image`, `quantity`, `total_price`) VALUES
(10, 4292, 'HYDRA VIZOR INVISIBLE MOISTURIZER BROAD SPECTRUM SPF 30 SUNSCREEN', '30.0000', 'HYDRA VIZOR INVISIBLE MOISTURIZER BROAD SPECTRUM SPF 30 SUNSCREEN.jpg', 2, '60.0000'),
(11, 4292, 'HYDRA VIZOR INVISIBLE MOISTURIZER BROAD SPECTRUM SPF 30 SUNSCREEN REFILL', '30.0000', 'HYDRA VIZOR INVISIBLE MOISTURIZER BROAD SPECTRUM SPF 30 SUNSCREEN REFILL.jpg', 1, '30.0000'),
(15, 4292, 'LoT.Patjdu', '20000.0000', '1200px-Man_Utd_FC_.svg.png', 2, '40000.0000'),
(17, 4294, 'LoT.Patjdu', '20000.0000', '1200px-Man_Utd_FC_.svg.png', 2, '40000.0000'),
(19, 4294, 'HYDRA VIZOR INVISIBLE MOISTURIZER BROAD SPECTRUM SPF 30 SUNSCREEN', '30.0000', 'HYDRA VIZOR INVISIBLE MOISTURIZER BROAD SPECTRUM SPF 30 SUNSCREEN.jpg', 3, '90.0000'),
(20, 4294, 'HYDRA VIZOR INVISIBLE MOISTURIZER BROAD SPECTRUM SPF 30 SUNSCREEN REFILL', '30.0000', 'HYDRA VIZOR INVISIBLE MOISTURIZER BROAD SPECTRUM SPF 30 SUNSCREEN REFILL.jpg', 2, '60.0000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_catalog`
--

CREATE TABLE `tbl_catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `tbl_catalog`
--

INSERT INTO `tbl_catalog` (`id`, `name`, `parent_id`) VALUES
(1, 'Son', 0),
(2, 'Phấn Mắt', 0),
(25, 'Kem nền', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(255) NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `image_link` text COLLATE utf8_unicode_ci NOT NULL,
  `image_list` text COLLATE utf8_unicode_ci NOT NULL,
  `created` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `view` int(11) NOT NULL DEFAULT 0,
  `brand` text COLLATE utf8_unicode_ci NOT NULL,
  `madeIn` text COLLATE utf8_unicode_ci NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `capacity` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `catalog_id`, `name`, `price`, `content`, `discount`, `image_link`, `image_list`, `created`, `view`, `brand`, `madeIn`, `type`, `capacity`) VALUES
(26, 2, 'HYDRA VIZOR INVISIBLE MOISTURIZER BROAD SPECTRUM SPF 30 SUNSCREEN REFILL', '30.0000', 'null', 0, 'HYDRA VIZOR INVISIBLE MOISTURIZER BROAD SPECTRUM SPF 30 SUNSCREEN REFILL.jpg', '', '28', 0, 'null', 'null', 'null', 'null'),
(27, 2, 'HYDRA VIZOR INVISIBLE MOISTURIZER BROAD SPECTRUM SPF 30 SUNSCREEN', '30.0000', 'null', 0, 'HYDRA VIZOR INVISIBLE MOISTURIZER BROAD SPECTRUM SPF 30 SUNSCREEN.jpg', '', '28', 0, 'null', 'null', 'null', 'null'),
(25, 2, 'KILLAWATT FOIL FREESTYLE HIGHLIGHTER DUO', '30.0000', 'null', 0, 'KILLAWATT FOIL FREESTYLE HIGHLIGHTER DUO.jpg', '', '28', 0, 'null', 'null', 'null', 'null'),
(28, 2, 'SUN STALKR INSTANT WARMTH BRONZER', '30.0000', 'null', 0, 'brs4.jpg', '', '28/11/2021', 0, 'null', 'null', 'null', 'null');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(255) NOT NULL,
  `role` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created` text COLLATE utf8_unicode_ci NOT NULL,
  `avtUser` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `role`, `name`, `email`, `phone`, `address`, `password`, `created`, `avtUser`) VALUES
(19, 1, 'admin', 'gido@gmail.com', '0123456789', '2x đường XXXX, phường xxxx', '123456', '0', ''),
(20, 1, 'user', 'chuaco@gmail.com', '0987654321', 'xxxx', '123456', '0', ''),
(23, 2, 'HUYNH HUU PHUC', 'markkevin396@gmail.com', '', '', '123', '0', ''),
(4286, 2, 'Phúc', '321321@yo.cow', '', '', '321', '0', ''),
(4287, 2, '32123113221', '321321312213@gmail.com', '', '', '321', '27', ''),
(4288, 2, '32131232', '3213213122133@gmail.com', '', '', '321', '27/11/2021', ''),
(4289, 2, 'Phúc', '4444444444@gmail.com', '', '', '444', '27/11/2021', ''),
(4290, 2, 'Phúc', '321344@gmail.com', '', '', '556', '27/11/2021', ''),
(4291, 2, 'Phúc', '5555555@gmail.com', '', '', '8989', '27/11/2021', ''),
(4292, 1, 'Nguyễn Thị Kiều My', '4444@gmail.com', '098452xxx', 'mật khẩu là 4444', 'dbc4d84bfcfe2284ba11beffb853a8c4', '27/11/2021', ''),
(4293, 2, 'Phúc', '333@gmail.com', '091728xxxxx', '4444', 'dbc4d84bfcfe2284ba11beffb853a8c4', '28/11/2021', ''),
(4294, 2, 'abc', '55556@gmail.com', '', '', 'dbc4d84bfcfe2284ba11beffb853a8c4', '29/11/2021', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `tbl_catalog`
--
ALTER TABLE `tbl_catalog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catalog_id` (`catalog_id`);
ALTER TABLE `tbl_products` ADD FULLTEXT KEY `name` (`name`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_catalog`
--
ALTER TABLE `tbl_catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4295;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
