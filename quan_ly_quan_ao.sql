-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 11, 2022 lúc 10:34 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quan_ly_quan_ao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `Phone_Number` varchar(20) DEFAULT NULL,
  `Email` varchar(150) DEFAULT NULL,
  `Address` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `content` varchar(500) NOT NULL,
  `more` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`ID`, `title`, `thumbnail`, `price`, `type`, `content`, `more`) VALUES
(1, 'POLOCHON', 'POLOCHON', 2780, 'highlights', 'The Polochon is a compact men’s bag with a removable shoulder strap, signed Louis Vuitton. It’s made from a combination of grained and Monogram-embossed Taurillon leather with with big, bold LV initials stitched onto the leather. It includes a coin purse that can be hooked to the strap or slipped into a bag as a compact wallet.', '100% Polyester<br>Bleu Graphique<br> Regular Fit'),
(2, 'LVSE FLOWER QUILTED HOODIE JACKET', 'LVSE FLOWER QUILTED HOODIE JACKET', 3450, 'highlights', 'This lightweight hoodie featuring a quilted Monogram Flower motif is an iconic item from the Staples Edition. The current iteration in a seasonal blue is made from shiny recylced technical fabric and has two zipped pockets at the front. Finishing touches include an engraved staple signature on the back and a removable carabiner with a tonal Louis Vuitton Staples Edition card. ', ''),
(3, 'LVSE PADDED MONOGRAM FLOWER GILET', 'LVSE PADDED MONOGRAM FLOWER GILET', 2630, 'highlights', 'Find in Store This lightweight sleeveless gilet presents a popular Staples Edition item in a seasonal blue. Made from shiny recycled technical fabric featuring the quilted Monogram Flower motif, it makes a bold addition to a layered look. It has two side pockets, a signature tag on the back, and a removable Louis Vuitton Staples Edition card on the right pocket. ', ''),
(4, 'MONOGRAM MOHAIR CARDIGAN', 'MONOGRAM MOHAIR CARDIGAN\n', 1800, 'highlights', 'This cozy statement cardigan features exuberant fluorescent hues that are overlaid with a black allover LV Monogram motif. It is made from responsibly sourced fine-brushed mohair and has a chunky feel. It has two patch pockets in the front and horn button closures', ''),
(5, 'LV TRAINER SNEAKER', 'LV TRAINER SNEAKER\n', 1380, 'shoes', 'Designed for Louis Vuitton by Virgil Abloh, and inspired by vintage basketball sneakers, the LV Trainer sneaker is an icon of the shoe collection. This version comes in Monogram denim and features a velcro strap with injected Monogram Flowers. The elaborate construction of the upper takes Louis Vuitton artisans seven hours to stitch.', ''),
(6, 'DISCOVERY BACKPACK', 'DISCOVERY BACKPACK', 2910, 'bags', 'The Discovery Backpack looks fresh in the gradient blues of Damier Stripes canvas, a reimagining of the stripes found on vintage Louis Vuitton trunks. The fading stripes, together with the new leather patch, inspired by the signage on the sides of Louis Vuitton historic trucks, bring a contemporary feel to this backpack’s boxy shape.', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `fullname`, `address`) VALUES
(1, 'ad', '$2y$10$LHP7chF1b02GotDsuICO/ujr6Z0rz7HFoqqAmHIYcMeZOA8IprZfK', 'ad@gmail.com', 'ad', '123 abc'),
(2, 'ad', '$2y$10$F81Qo2hTo8uNl9JnnVp94./7b3VhydSnd2R1FWMIbC6Q/XMjcdXCC', 'ad@gmail.com', 'ad', '123 abc'),
(3, 'ad', '$2y$10$mUXkjT/Wi6j88PvLn3y5K.33yUPgNkQiqV4o3y/pzI94exh9TRgiu', 'ad@gmail.com', 'ad', '123 abc'),
(4, 'ad', '$2y$10$hjnHNbf6h.i9fz0lOHSwu.T7pjAqA4NiQCMl7sJUEcVMAQ2WtHiMe', 'ad@gmail.com', 'ad', '123 abc'),
(5, '123', '$2y$10$RvEgdYvbig9hy1YkstRaAuitH40v1SfzC/p442xqJR7hM9bxPPTt.', '123@gmail', '123', '123'),
(6, '123', '$2y$10$GxWcgXKFN9nVS6CzxuYB9eFm25HbPC.fiAaaPtrmETRZqWmLpsoem', '123@gmail', '123', '123'),
(7, '123', '$2y$10$k2NkkwAFoRyuMLb250vZvOlKbge0kgAQBU.f5Mc8PMAQqeoH/7vN2', '123@gmail', '123', '123'),
(8, '', '$2y$10$FcrcrCRl2ITRVj8YZnjgnuZKzt7ToUj1dEz5dV9rJKcpfflQkWeSa', '', '', ''),
(9, '', '$2y$10$ZMKLhFMpT7cA6h5i4QDTFuq.nLCfJqi91Y8OpsftLSxDDLnDKsYiO', '', '', ''),
(10, '', '$2y$10$gow7fr8NZI4CGcSSDIqcjOCsQVJ0ob3bOb1G34n1IZV3p3EeGiPjy', '', '', ''),
(11, '', '$2y$10$2SMXQwniO/VW9ntnJtJTp.c3y1a0PQc5QmN/V7cEj/7/YQc1dFi9y', '', '', ''),
(12, '', '$2y$10$jmA9pN4FAsa17DsASd.5iusWZOYQUwg99rDBJrkY67CoZE67DEATO', '', '', ''),
(13, '', '$2y$10$EvDnYrNExjwTd5//0ecC1OHi9sU5r1edU.UqZGCzu0EZAOYhm/ihS', '', '', ''),
(14, '', '$2y$10$MIXpFKL9mfoRi2P.7HJiyussvBqe5uTgnDWmn7vwD/Sw3OMU7m8gy', '', '', ''),
(15, '', '$2y$10$rgyJWfxUh0Ty5DjOfP/UaewnQPhcKtx3Kk6GIq9bmDJj9ZiVl.3t6', '', '', ''),
(16, '123', '$2y$10$QpZkVkRFbjzFSPvMLgOuL.xNDGuqe8.Cd7QcvP3/8EwbC1BGhEOJS', '123@gmail', '123', '123'),
(17, '123', '$2y$10$V6XCsHT6pXGms4IZ88l9sOuAVF3.ruVISyxjUPlEDKWiKPcwlhWaO', '123@gmail', '123', '123'),
(18, '', '$2y$10$9W65HNamNm4HOudgG9zdP.UgBWMrTRAwDQDT2QawS/FLC1G58CWqa', '', '', ''),
(19, '', '$2y$10$307u.bnAcXS9wIiXZMeB0ezxFrufViEw8O9FxAKTLbwlY/V1D.Eai', '', '', ''),
(20, 'xxx', '$2y$10$uXTZ6zeCdzfH4UiFI45SwugBWlx.RlI8yHcVFPb3MFhBr2cY63A.u', 'ad@gmail.com', 'xxx', 'xxx');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
