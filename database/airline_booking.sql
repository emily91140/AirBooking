-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-09-23 18:01:17
-- 伺服器版本： 10.4.13-MariaDB
-- PHP 版本： 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `airline_booking`
--

-- --------------------------------------------------------

--
-- 資料表結構 `airport`
--

CREATE TABLE `airport` (
  `name` char(4) NOT NULL,
  `code` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `airport`
--

INSERT INTO `airport` (`name`, `code`) VALUES
('台北松山', 'TSA'),
('澎湖馬公', 'MZG');

-- --------------------------------------------------------

--
-- 資料表結構 `flight_info`
--

CREATE TABLE `flight_info` (
  `id` char(4) NOT NULL,
  `company_name` char(4) NOT NULL,
  `origin` char(4) NOT NULL,
  `destination` char(4) NOT NULL,
  `left_time` time NOT NULL,
  `arrive_time` time NOT NULL,
  `price` int(5) NOT NULL,
  `available_num` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `flight_info`
--

INSERT INTO `flight_info` (`id`, `company_name`, `origin`, `destination`, `left_time`, `arrive_time`, `price`, `available_num`) VALUES
('0001', '立榮航空', '台北松山', '澎湖馬公', '11:30:00', '12:30:00', 1500, 29),
('0002', '華信航空', '澎湖馬公', '台北松山', '17:00:00', '18:00:00', 1500, 27);

-- --------------------------------------------------------

--
-- 資料表結構 `order_record`
--

CREATE TABLE `order_record` (
  `id` int(11) NOT NULL,
  `user_account` char(40) NOT NULL,
  `flight_id` char(4) NOT NULL,
  `price` int(5) NOT NULL,
  `ticket_num` int(4) NOT NULL,
  `total_price` int(11) NOT NULL,
  `action` char(10) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `order_record`
--

INSERT INTO `order_record` (`id`, `user_account`, `flight_id`, `price`, `ticket_num`, `total_price`, `action`, `time_stamp`) VALUES
(3, '0313217', '0001', 1500, 1, 1500, 'add', '2021-09-15 16:20:52'),
(5, '0313217', '0002', 1500, 3, 4500, 'add', '2021-09-15 16:45:45');

-- --------------------------------------------------------

--
-- 資料表結構 `plane_company`
--

CREATE TABLE `plane_company` (
  `name` char(4) NOT NULL,
  `code` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `plane_company`
--

INSERT INTO `plane_company` (`name`, `code`) VALUES
('立榮航空', 'B7'),
('華信航空', 'AE');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `account` char(40) NOT NULL,
  `password` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `account`, `password`) VALUES
(4, '0313217', '123'),
(5, '0313216', '123');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`name`);

--
-- 資料表索引 `flight_info`
--
ALTER TABLE `flight_info`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `order_record`
--
ALTER TABLE `order_record`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `plane_company`
--
ALTER TABLE `plane_company`
  ADD PRIMARY KEY (`name`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_record`
--
ALTER TABLE `order_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
