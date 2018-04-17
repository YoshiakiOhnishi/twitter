-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018 年 4 月 17 日 09:00
-- サーバのバージョン： 5.7.21-log
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oniyoshi`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `datas`
--

CREATE TABLE `datas` (
  `tweetid` int(11) NOT NULL,
  `username` char(20) NOT NULL,
  `message` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `datas`
--

INSERT INTO `datas` (`tweetid`, `username`, `message`, `created`) VALUES
(1, 'ohnishi', 'sdf', '2018-04-16 23:01:42'),
(2, 'ohnishi', 'ert', '2018-04-16 23:05:05'),
(3, 'ohnishi', 'ert', '2018-04-16 23:05:21'),
(4, '12345', 'aaaaa', '2018-04-16 23:12:34');

-- --------------------------------------------------------

--
-- テーブルの構造 `follows`
--

CREATE TABLE `follows` (
  `id` int(11) NOT NULL,
  `username` char(20) NOT NULL,
  `followuser` char(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `username` char(20) NOT NULL,
  `password` char(100) NOT NULL,
  `name` char(20) NOT NULL,
  `mail` char(100) NOT NULL,
  `secret` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`username`, `password`, `name`, `mail`, `secret`) VALUES
('assss', '$2y$10$rcjT/V.HromQ9BGaImSRA.EjgkK7nJZ.n2SDxqH1oE6ApzA45eDnq', 'hhhhh', 'hhhhh', 1),
('hhhhh', '$2y$10$DdP5ustencYgridm6fynyu8jr/V4gaNuEqWUPYQ6TuoENZl3tU1eC', 'hhhhh', 'hhhhh', 1),
('hiroaki', '$2y$10$ooWH/PO4n/IcQCDuHj8BQuj6SxS/xrTcJn1EQomkih0Wr3kgNxz4.', 'hiroaki', 'hiroaki', 0),
('kazusi', '$2y$10$VALzQCbemXnRM2GwPvOO0.tOkh25wre1qqf/GH4ETKrTGJiV7F562', 'kazusi', 'kazusi', 0),
('masaaki', '$2y$10$mI6nqPbkejcyZKNiuw7S7OQ3Jn17vdYmM3CYW4v2V1zVk6.SULrM.', 'masaaki', 'masaaki', 0),
('ohnishi', '$2y$10$tIbRvOGcZNSlmAGrs9G1hOJu1gH/IjAeHe1rNJqb1nIDVryX.Bfhq', 'ohnishi', 'ohnsihi', 0),
('onioni', '$2y$10$qHZr6jqivkRwMaVX5R.g6uB3uLnSK7WoBo3zsnoUxkCXj0BGek8t.', 'onioni', 'onioni', 0),
('oniyoshi', '$2y$10$F2ES60mXQmjWp15bmpjT4eH5CmAdPb8T3DAKJDoI5pJ1t48porJNC', 'oniyoshi', 'oniyoshi', 0),
('ooooo', '$2y$10$XP0LdqkVfVjGid5aapczLOQ2ETgIfCfMGoH9do1Ur4QAP3gIVEi22', 'ooooo', 'ooooo', 0),
('sssss', '$2y$10$1vk57NPehYqMX2wcjjW6COBbGhP7ZszQ7lM4wgazDPOOlPciJKvna', 'sssss', 'sssss', 0),
('wwwww', '$2y$10$vBmW9X3X1x9oGZq6p0HbAeBk4zew96WSznbVnEGmndMVK3qmKplPe', 'wwwww', 'wwwww', 0),
('yoshiaki', '$2y$10$A9rhhWqg5G931rOcbkC.EebcrI2okSTVlc0tPaTtGSVNx135jCfQa', 'yoshiaki', 'yoshiaki', 0),
('zzzzz', '$2y$10$rvIzWcMyfzrmcjL5K63.Hep1TaxoLrrMMUWPsecHm2y///Wom5ypy', 'zzzzz', 'zzzzzz', 0),
('qwer', '$2y$10$Lh7CSxjdHzZHuvx7T9BRZeF2Vl2bq3pP26JCkZv5p/QeANXM0zvra', 'qwer', 'qwer', 0),
('12345', '$2y$10$yjOAvfV2YXe3uee5aQyoMOzH4bO0Xh9sliMdaYdIbfaawx0d8dAYO', '12345', '12345', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datas`
--
ALTER TABLE `datas`
  ADD PRIMARY KEY (`tweetid`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `followuser` (`followuser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datas`
--
ALTER TABLE `datas`
  MODIFY `tweetid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
