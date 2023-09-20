-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 02, 2022 lúc 06:24 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2
create database ass_web;
use ass_web;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ass_web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(1, 'Bộ sưu tập Osaka ', 'Category_4791.jpg', 'Yes', 'Yes'),
(2, 'Bộ sưu tập Elegence', 'Category_5098.jpg', 'Yes', 'Yes'),
(12, 'Bộ sưu tập Bridge', 'Category_8462.jpg', 'Yes', 'Yes'),
(13, 'Bộ sưu tập Mây', 'Category_7811.jpg', 'Yes', 'Yes'),
(17, 'Bộ sưu tập Maxine', 'Category_5580.jpg', 'No', 'Yes'),
(18, 'Bộ sưu tập Jazz', 'Category_4162.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `food`
--

CREATE TABLE `food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `food`
--

INSERT INTO `food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(1, 'Sofa Osaka', 'Sofa 3 chỗ OSAKA – màu 1 vải 65 - Kích thước: D2060 - R750 - C820/400 mm', '12.00', 'interior_8028.jpg', 1, 'Yes', 'Yes'),
(2, 'Bàn nước Osaka', 'Bàn nước Osaka KA - Kích thước: D1374 - R770 - C455 mm', '14.00', 'interior_4287.jpg', 1, 'No', 'Yes'),
(9, 'Bàn bên Osaka', 'Bàn bên Osaka - Kích thước: D420 - R420 - C610 mm', '15.00', 'interior_5623.jpg', 1, 'No', 'Yes'),
(10, 'Sofa Elegence', 'Sofa 3 chỗ Elegance màu tự nhiên, da cognac - Kích thước: D2250 - R905 - C790 mm', '14.00', 'interior_2559.jpg', 2, 'No', 'Yes'),
(11, 'Bàn nước Elegence', 'Bàn nước Elegance màu tự nhiên - Kích thước: D1200 - R600 - C400 mm', '15.00', 'interior_197.jpg', 2, 'Yes', 'Yes'),
(12, 'Bàn ăn Elegence', 'Bàn ăn 1m6 Elegance màu tự nhiên - Kích thướcD1600 - R850 - C710 mm', '15.00', 'interior_8939.jpg', 2, 'No', 'Yes'),
(13, 'Sofa Bridge', 'Sofa Bridge 3 chỗ hiện đại da Beige - Kích thước: D2100- R900- C750 mm', '11.00', 'interior_2880.jpg', 12, 'Yes', 'Yes'),
(15, 'Armchair Bridge', 'Armchair Bridge Gỗ Nâu Da Beige - Kích thước: D900 - R900 - C750', '12.00', 'interior_7986.jpg', 12, 'No', 'Yes'),
(17, 'Bàn nước Bridge', 'Bàn nước Bridge Gỗ màu nâu - Kích thước: D1200 - R600 - C400 mm', '12.00', 'interior_9522.jpg', 12, 'No', 'Yes'),
(18, 'Sofa  Mây', 'Sofa Mây 2.5 chỗ hiện đại da Mushroom - Kích thước: D1800 - R750 - C860', '14.00', 'interior_6867.jpg', 13, 'Yes', 'Yes'),
(19, 'Tủ Tivi Mây', 'Tủ tivi Mây - Kích thước: D1850 - R420 - C550', '14.00', 'interior_111.png', 13, 'No', 'Yes'),
(20, 'Sofa Jazz', 'Sofa Jazz 3 chỗ hiện đại da cognac - Kích thước: D2300 - R840 - C760 mm', '8.00', 'interior_504.jpg', 18, 'Yes', 'Yes'),
(21, 'Tủ Tivi Jazz', 'Tủ Tivi Jazz - Kích thước: D1600-R450-C580mm', '8.00', 'interior_6197.jpg', 18, 'No', 'Yes'),
(22, 'Bàn nước Jazz', 'Bàn Nước Jazz - Kích thước: D1200 - R700 - C400 mm', '9.00', 'interior_4963.jpg', 18, 'No', 'Yes'),
(23, 'Tủ Tivi Osaka', 'Tủ Tivi Osaka - Kích thước: D1800 - R400 - C550 mm', '6.00', 'interior_9899.jpg', 1, 'Yes', 'Yes'),
(24, 'Sofa Maxine', 'Sofa Maxine 3 chỗ hiện đại da Mushroom bọc vải KD - Kích thước: D2100 - R850 - C830 mm', '7.00', 'interior_6524.jpg', 17, 'No', 'Yes'),
(25, 'Bàn tròn Maxine', 'Bàn nước tròn Maxine - Kích thước: Ø1000 - C400 mm', '6.00', 'interior_8590.jpg', 17, 'No', 'Yes');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `food_order`
--

CREATE TABLE `food_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(500) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `food_order`
--

INSERT INTO `food_order` (`id`, `food`, `price`, `quantity`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `note`) VALUES
(13, '<span class=\"font-weight-bold\">1) </span>Monte Steak(x1); <span class=\"font-weight-bold\">2) </span>Italian Salad(x2); ', '25.00', 3, '75.00', '2021-11-28 14:54:11', 'Delivered', 'Bach Khoa', '123456', 'bachkhoa@yahoo.com', '268 Ly THuong Kiet', 'salad khong co rau'),
(14, '<span class=\"font-weight-bold\">1) </span>Triple Cheese Whopper Burger(x1); ', '15.00', 1, '15.00', '2021-11-28 15:04:31', 'Delivered', 'loi', '', '', '', ''),
(15, '<span class=\"font-weight-bold\">1) </span>Triple Cheese Whopper Burger(x4); <span class=\"font-weight-bold\">2) </span>Cheese Pizza(x5); ', '27.00', 9, '243.00', '2021-11-28 17:09:33', 'Delivered', 'Luong Huu Phu Loi', '1911545', 'loi.luonglucasia@hcmut.edu.vn', '268 Ly thuong Kkiet', ''),
(16, '<span class=\"font-weight-bold\">1) </span>Italian Salad(x4); ', '11.00', 4, '44.00', '2021-11-28 17:15:03', 'On Delivery', 'Bach Khoa', '1911545', 'bachkhoa@hcmut.edu.vn', '', 'salad khong co rau'),
(17, '<span class=\"font-weight-bold\">1) </span>Triple Cheese Whopper Burger(x5); ', '15.00', 5, '75.00', '2021-11-28 17:15:29', 'Ordered', 'test guest', '123456', 'guest@yahoo.com', '', ''),
(18, '<span class=\"font-weight-bold\">1) </span>Monte Steak(x1); <span class=\"font-weight-bold\">2) </span>Italian Salad(x1); ', '25.00', 2, '25.00', '2021-11-28 20:29:53', 'Ordered', 'Luong', '123456', 'testing@yahoo.com', '1665654', '565465459'),
(19, '<span class=\"font-weight-bold\">1) </span>Chocolate New York Cheesecake(x1); ', '8.00', 1, '8.00', '2021-11-28 20:31:39', 'Ordered', 'Viet', '111111', 'prnhub@hub.com', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manager`
--

CREATE TABLE `manager` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `manager`
--

INSERT INTO `manager` (`id`, `full_name`, `username`, `password`) VALUES
(3, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(10, 'phu', 'phupro', '25d55ad283aa400af464c76d713c07ad'),
(21, 'Luong', 'luong', 'cd67e095aa87a04d2bfb63a3b8f24309'),
(22, 'Viet', 'viet', 'a4e614247683e150b2b9812a8fa33a71'),
(23, 'Trung', 'trung', 'c2d8730c4cdd662573b0214a0183bf98');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `birthday`, `phone`, `email`, `rating`, `feedback`) VALUES
(15, 'thanhluong', 'f288bd2c10f6fa568fa813222adf6ed8', 'Thang Luong', '1/1/2001', '914076', 'luong.cao2202@hcmut.edu.vn', '', ''),
(16, 'vanviet', '080b6971159e2a47e8d0105719a9820e', 'Van Viet', '1/2/2001', '1912436', 'vanviet@hcmut.edu.vn', '', ''),
(17, 'phupro', '25d55ad283aa400af464c76d713c07ad', 'nguyen thanh phu', '03/02/2002', '0769769939', 'phu.nguyen03022002@hcmut.edu.vn', 'Very Good', 'helloo');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `food_order`
--
ALTER TABLE `food_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `food`
--
ALTER TABLE `food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `food_order`
--
ALTER TABLE `food_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
