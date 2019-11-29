-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 20, 2019 lúc 03:31 PM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sale_management`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `description`) VALUES
(1, 'Giày thể thao nam', NULL),
(2, 'Giày thể thao nu', NULL),
(3, 'Sandal nam', NULL),
(4, 'Sandal nu', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(111) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `id_user`, `prod_id`, `comment`) VALUES
(1, 10, 1, ' sản phẩm tốt\n'),
(2, 13, 1, ' cũng đẹp'),
(3, 10, 2, 'chất liệu ok\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `img_banner`
--

CREATE TABLE `img_banner` (
  `id` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `img_banner`
--

INSERT INTO `img_banner` (`id`, `img`) VALUES
(1, 'Image/123.png'),
(2, 'Image/124.jpg'),
(3, 'Image/125.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `ord_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `ship_id` int(11) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `required_date` datetime DEFAULT NULL,
  `ship_date` datetime DEFAULT NULL,
  `ship_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`ord_id`, `id_user`, `ship_id`, `order_date`, `required_date`, `ship_date`, `ship_address`) VALUES
(20, 10, 0, '2019-01-20 00:00:00', NULL, NULL, '101B Lê Hữu Trác'),
(21, 10, 0, '2019-01-20 00:00:00', NULL, NULL, '101B Lê Hữu Trác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `cat_id` int(11) NOT NULL,
  `sup_price` int(11) NOT NULL,
  `sell_price` int(11) NOT NULL,
  `sale_price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `imported_date` datetime DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `favorite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `image`, `cat_id`, `sup_price`, `sell_price`, `sale_price`, `quantity`, `status`, `imported_date`, `note`, `views`, `favorite`) VALUES
(1, 'Giày thể thao công sở nam', 'Image/ttnam7.jpg', 1, 850000, 950000, 670000, 56, 1, '2018-12-02 00:00:00', 'Nam tính, đàn ông đích thực', 1, 10),
(2, 'Giày thể thao nhập khẩu từ Úc', 'Image/ttnam1.jpg', 1, 570000, 690000, NULL, 52, 1, '2018-12-02 00:00:00', 'Cá tính đầy mạnh mẽ', 1, 10),
(3, 'Giày thể thao nhập khẩu từ Mỹ', 'Image/ttnam2.jpg', 1, 570000, 690000, NULL, 56, 1, '2018-12-02 00:00:00', 'Cá tính đầy mạnh mẽ', 6, 10),
(4, 'Giày thể thao màu hồng cá tính', 'Image/1.jpg', 2, 270000, 380000, NULL, 60, 1, '2018-02-02 00:00:00', 'Cá tính đầy mạnh mẽ', 3, 10),
(5, 'Giày thể thao adidas', 'Image/15.jpg', 2, 280000, 380000, NULL, 58, 1, '2018-08-02 00:00:00', 'Cá tính đầy mạnh mẽ', 5, 10),
(6, 'Giày thể thao nữ Nike ', 'Image/ttnu.jpg', 2, 370000, 480000, NULL, 58, 1, '2018-12-02 00:00:00', 'Cá tính đầy mạnh mẽ', 0, NULL),
(7, 'Sandal nam đen ', 'Image/dnam3.jpg', 3, 570000, 690000, NULL, 60, 1, '2018-12-02 00:00:00', 'Dịu dàng tự tin khoe cá tính', 0, NULL),
(8, 'Sandal nam xám', 'Image/dnam2.jpg', 3, 570000, 690000, NULL, 60, 1, '2018-12-02 00:00:00', 'Lôi cuốn mọi ánh nhìn', 0, 6),
(9, 'Giày Sandal nữ', 'Image/3.jpg', 4, 570000, 690000, NULL, 60, 1, '2018-12-02 00:00:00', 'Tự tin khoe cá tính', 0, 10),
(10, 'Sandal nữ cá tính', 'Image/sdnu1.jpg', 4, 570000, 690000, 660000, 60, 1, '2018-12-02 00:00:00', 'Cá tính tự tin khoe cá tính', 0, NULL),
(11, 'Sandal nữ nhập từ Úc', 'Image/sdnu2.jpg', 4, 570000, 690000, 650000, 60, 1, '2018-12-02 00:00:00', 'Sang tringj tự tin khoe cá tính', 0, NULL),
(12, 'Sandal công sở', 'Image/sdnam1.jpg', 3, 570000, 690000, NULL, 60, 1, '2018-12-02 00:00:00', 'Nhẹ nhàng uyển chuyển', 1, NULL),
(13, 'Sandal công sở nhẹ nhàng uyển chuyển', 'Image/sdnam10.jpg', 3, 570000, 690000, 650000, 60, 1, '2018-12-02 00:00:00', 'Lôi cuốn mọi ánh nhìn', 0, NULL),
(14, 'Sandal nam đen ', 'Image/dnam4.jpg', 3, 570000, 690000, 650000, 60, 1, '2018-12-02 00:00:00', 'Dịu dàng tự tin khoe cá tính', 0, NULL),
(15, 'Giày thể thao nhập khẩu từ Pháp', 'Image/ttnam3.jpg', 1, 570000, 690000, 600000, 60, 1, '2018-12-02 00:00:00', 'Cá tính đầy mạnh mẽ', 0, NULL),
(16, 'Giày thể thao nam nhập khẩu từ Thái Lan', 'Image/ttnam4.jpg', 1, 570000, 690000, 600000, 60, 1, '2018-12-02 00:00:00', 'Cá tính đầy mạnh mẽ', 0, NULL),
(17, 'Giày thể thao nam nhập khẩu từ Paris Pháp', 'Image/ttnam5.jpg', 1, 570000, 690000, 600000, 60, 1, '2018-12-02 00:00:00', 'Cá tính đầy mạnh mẽ', 0, NULL),
(18, 'Giày thể thao nữ Convert', 'Image/ttnu2.jpg', 2, 170000, 250000, 230000, 60, 1, '2018-09-06 00:00:00', 'Cá tính đầy mạnh mẽ', 0, NULL),
(19, 'Giày da bò nữ siêu mềm', 'Image/7.jpg', 2, 670000, 890000, 880000, 60, 1, '2018-12-02 00:00:00', 'Nữ tính, uyển chuyển', 0, NULL),
(20, 'Giày da bò sáp bụi', 'Image/ttn6.jpg', 2, 570000, 690000, 650000, 60, 1, '2018-12-02 00:00:00', 'Thu hút mọi ánh nhìn', 0, NULL),
(21, 'Giày thể thao UNK', 'Image/15.jpg', 2, 280000, 380000, 340000, 60, 1, '2018-08-02 00:00:00', 'Cá tính đầy mạnh mẽ', 0, NULL),
(22, 'Giày thể thao nữ ML ', 'Image/ttnu7.jpg', 2, 370000, 480000, 450000, 60, 1, '2018-12-02 00:00:00', 'Cá tính đầy mạnh mẽ', 0, NULL),
(23, 'Giày thể thao nữ đế nhẹ', 'Image/ttnu8.jpg', 2, 170000, 250000, 230000, 60, 1, '2018-09-06 00:00:00', 'Cá tính đầy mạnh mẽ', 0, NULL),
(24, 'Giày da bò nữ siêu mềm DF', 'Image/ttnu9.jpg', 2, 670000, 890000, 880000, 60, 1, '2018-12-02 00:00:00', 'Nữ tính, uyển chuyển', 0, NULL),
(25, 'Giày da bò sáp bụi DF', 'Image/ttnu10.jpg', 2, 570000, 690000, 650000, 60, 1, '2018-12-02 00:00:00', 'Nữ tính, uyển chuyển', 0, NULL),
(26, 'Sandal nam xám', 'Image/sdnam5.jpg', 3, 570000, 690000, 650000, 60, 1, '2018-12-02 00:00:00', 'Nhẹ nhàng uyển chuyển', 0, NULL),
(27, 'Sandal công sở cá tính', 'Image/sdnam7.jpg', 3, 570000, 690000, 650000, 60, 1, '2018-12-02 00:00:00', 'Dịu dàng tự tin khoe cá tính', 0, NULL),
(28, 'Sandal nam đen nhập từ Úc ', 'Image/dnam8.jpg', 3, 570000, 690000, 650000, 60, 1, '2018-12-02 00:00:00', 'Lôi cuốn mọi ánh nhìn', 0, NULL),
(29, 'Sandal nam xám nhập từ Pháp', 'Image/sdnam6.jpg', 3, 570000, 690000, 650000, 60, 1, '2018-12-02 00:00:00', 'Dịu dàng tự tin khoe cá tính', 0, NULL),
(30, 'Sandal công sở nhập từ Thái Lan', 'Image/sdnam9.jpg', 3, 570000, 690000, 650000, 60, 1, '2018-12-02 00:00:00', 'Nhẹ nhàng uyển chuyển', 0, NULL),
(31, 'Sandal nữ nhẹ nhàng', 'Image/38.jpg', 4, 570000, 690000, NULL, 60, 1, '2018-12-02 00:00:00', 'Năng động tự tin khoe cá tính', 0, NULL),
(32, 'Sandal nữ', 'Image/21.jpg', 4, 570000, 69000, NULL, 59, 1, '2018-12-02 00:00:00', 'Cá tính tự tin khoe cá tính', 0, NULL),
(33, 'Giày Sandal nữ nhập từ Paris Pháp', 'Image/sdnu3.jpg', 4, 570000, 690000, 640000, 60, 1, '2018-12-02 00:00:00', 'Thu hút tự tin khoe cá tính', 0, NULL),
(34, 'Sandal nữ nhẹ nhàng uyển chuyển', 'Image/sdnu4.jpg', 4, 570000, 690000, 660000, 60, 1, '2018-12-02 00:00:00', 'Sang trọng tự tin khoe cá tính', 0, NULL),
(35, 'Sandal nữ lôi cuối', 'Image/sdnu5.jpg', 4, 570000, 720000, 650000, 60, 1, '2018-12-02 00:00:00', 'Mạnh mẽ tự tin khoe cá tính', 0, NULL),
(36, 'Giày Sandal nữ nhập từ Thái Lan', 'Image/sdnu6.jpg', 4, 570000, 690000, 640000, 60, 1, '2018-12-02 00:00:00', 'Đàn ông đích thực ', 0, NULL),
(37, 'Giày Sandal nữ black', 'Image/sdnu7.jpg', 4, 570000, 690000, 650000, 60, 1, '2018-12-02 00:00:00', 'Đàn ông đích thực', 0, NULL),
(38, 'Giày da bò nam', 'Image/ttnam6.jpg', 1, 770000, 990000, 950000, 60, 1, '2018-12-02 00:00:00', 'Nam tính, đàn ông đích thực', 0, NULL),
(39, 'Giày thể thao nam black nhập khẩu từ Thái Lan', 'Image/ttnam8.jpg', 1, 570000, 690000, 600000, 60, 1, '2018-12-02 00:00:00', 'Cá tính đầy mạnh mẽ', 0, NULL),
(40, 'Giày thể thao nam nhập khẩu từ Paris Pháp', 'Image/ttnam9.jpg', 1, 570000, 690000, 600000, 60, 1, '2018-12-02 00:00:00', 'Cá tính đầy mạnh mẽ', 0, NULL),
(41, 'Giày thể thao nam nhập từ Pháp', 'Image/ttnam10.jpg', 1, 770000, 990000, 950000, 60, 1, '2018-12-02 00:00:00', 'Nam tính, đàn ông đích thực', 0, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `prod_orders`
--

CREATE TABLE `prod_orders` (
  `ord_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `prod_orders`
--

INSERT INTO `prod_orders` (`ord_id`, `prod_id`, `quantity`) VALUES
(20, 1, 1),
(21, 2, 1),
(21, 6, 1),
(21, 32, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phonenumber` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id_user`, `user_name`, `birthday`, `address`, `phonenumber`, `email`, `password`, `role`) VALUES
(10, 'trang', '1988-01-16', 'Sơn Trà Đà Nẵng', '0163477816', 'trang@gmail.com', '$2y$10$gWe4yjy7a8rHDeFIckt6MeHL0QjmB9vDyOZZC9bC2XJKMwbR8eqlq', 'member'),
(11, 'admin', NULL, NULL, '0334778516', 'admin@gmail.com', '$2y$10$oBlKT4s9Edo68LIAj/xfpeuBCYsEbAURShwIU0XyzzBmwszCsQyY.', 'admin'),
(12, 'quankho', NULL, NULL, '0163477816', 'quankho@gmail.com', '$2y$10$GAO6FUwtsIljKaJ.wglMfOm/sTDDVVKNaF3uqkrpJjo.MM4zAiCGi', 'quankho'),
(13, 'yen', '1994-01-10', 'Sơn Trà Đà Nẵng', '0163477816', 'yen@gmail.com', '$2y$10$DVs7UJsrOyc1BYt5mCI4y.yAwsu5V4C6mdmdtEPVEI6AXwWzWGeZS', 'member');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Chỉ mục cho bảng `img_banner`
--
ALTER TABLE `img_banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Chỉ mục cho bảng `prod_orders`
--
ALTER TABLE `prod_orders`
  ADD PRIMARY KEY (`ord_id`,`prod_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `img_banner`
--
ALTER TABLE `img_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`);

--
-- Các ràng buộc cho bảng `prod_orders`
--
ALTER TABLE `prod_orders`
  ADD CONSTRAINT `prod_orders_ibfk_1` FOREIGN KEY (`ord_id`) REFERENCES `orders` (`ord_id`),
  ADD CONSTRAINT `prod_orders_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
