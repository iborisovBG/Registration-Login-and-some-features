-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 26 авг 2019 в 18:48
-- Версия на сървъра: 10.0.38-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aatraini_survivory`
--

-- --------------------------------------------------------

--
-- Структура на таблица `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', '908fd8b9cf8a9034d7f25a25e7163668');

-- --------------------------------------------------------

--
-- Структура на таблица `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dog` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `cards`
--

INSERT INTO `cards` (`id`, `number`, `name`, `dog`) VALUES
(1, 'bamchou@abv.bg', 'Ivaylo Borisov', 'Пурко'),
(2, '88888', 'Ivaylo Borisov', 'Айра');

-- --------------------------------------------------------

--
-- Структура на таблица `deletedcards`
--

CREATE TABLE `deletedcards` (
  `id` int(11) NOT NULL,
  `number` varchar(255) NOT NULL,
  `deltime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `deleteduser`
--

CREATE TABLE `deleteduser` (
  `id` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `deltime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `deleteduser`
--

INSERT INTO `deleteduser` (`id`, `email`, `deltime`) VALUES
(21, 'ivaylo@borisov.eu', '2019-08-23 11:39:04');

-- --------------------------------------------------------

--
-- Структура на таблица `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `sender` varchar(50) CHARACTER SET utf8 NOT NULL,
  `reciver` varchar(50) CHARACTER SET utf8 NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `feedbackdata` varchar(500) CHARACTER SET utf8 NOT NULL,
  `attachment` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `feedback`
--

INSERT INTO `feedback` (`id`, `sender`, `reciver`, `title`, `feedbackdata`, `attachment`) VALUES
(19, 'asen@aatraining.bg', 'Admin', '???? ?????', '?????', 'document.rtf');

-- --------------------------------------------------------

--
-- Структура на таблица `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `notiuser` varchar(50) CHARACTER SET utf8 NOT NULL,
  `notireciver` varchar(50) CHARACTER SET utf8 NOT NULL,
  `notitype` varchar(50) CHARACTER SET utf8 NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `notification`
--

INSERT INTO `notification` (`id`, `notiuser`, `notireciver`, `notitype`, `time`) VALUES
(30, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 12:19:12'),
(31, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 12:25:20'),
(32, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 12:25:40'),
(33, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 12:27:20'),
(34, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 12:30:45'),
(35, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 12:31:05'),
(36, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 12:39:20'),
(37, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 12:40:00'),
(38, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 12:43:55'),
(39, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 12:46:25'),
(40, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 12:49:12'),
(41, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 12:49:41'),
(42, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 12:49:46'),
(43, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 12:54:08'),
(44, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 12:55:06'),
(45, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 12:58:48'),
(46, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 13:01:32'),
(47, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 13:21:36'),
(48, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 13:21:43'),
(49, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 13:22:18'),
(50, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 13:23:00'),
(51, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 13:24:35'),
(52, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 13:25:10'),
(53, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 13:26:04'),
(54, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 13:28:11'),
(55, 'Ивайло Борисов', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 13:48:51'),
(56, 'аСЕН', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 13:59:23'),
(57, 'аСЕН', 'Admin', 'Създаване на Freed в мойте тренировки', '2019-08-26 13:59:55'),
(58, 'Admin', 'Admin', 'Създаване на Седмични задания: за куче :  и собств', '2019-08-26 15:25:52'),
(59, 'Admin', 'Admin', 'Създаване на Седмични задания: за куче :  и собств', '2019-08-26 15:29:27'),
(60, 'Admin', 'Admin', 'Създаване на Седмични задания: за куче :  и собств', '2019-08-26 15:30:37'),
(61, 'Admin', 'Admin', 'Създаване на Седмични задания: за куче :  и собств', '2019-08-26 15:30:39'),
(62, 'Admin', 'Admin', 'Създаване на Седмични задания: за куче :  и собств', '2019-08-26 15:31:24'),
(63, 'Admin', 'Admin', 'Създаване на Седмични задания: за куче :  и собств', '2019-08-26 15:34:58'),
(64, 'Admin', 'Admin', 'Създаване на Седмични задания: за куче :  и собств', '2019-08-26 15:35:00'),
(65, 'Admin', 'Admin', 'Създаване на Седмични задания: за куче :  и собств', '2019-08-26 15:35:24'),
(66, 'Admin', 'Admin', 'Създаване на Седмични задания: за куче :  и собств', '2019-08-26 15:35:33'),
(67, 'Admin', 'Admin', 'Създаване на Седмични задания: за куче :  и собств', '2019-08-26 15:36:39'),
(68, 'Admin', 'Admin', 'Създаване на Седмични задания: за куче :  и собств', '2019-08-26 15:36:55'),
(69, 'Admin', 'Admin', 'Създаване на Седмични задания: за куче :  и собств', '2019-08-26 15:37:12'),
(70, 'Admin', 'Admin', 'Създаване на Седмични задания: за куче :  и собств', '2019-08-26 15:37:13'),
(71, 'Admin', 'Admin', 'Създаване на Седмични задания: за куче :  и собств', '2019-08-26 15:37:32'),
(72, 'Admin', 'Admin', 'Създаване на Седмични задания: за куче :  и собств', '2019-08-26 15:37:50'),
(73, 'Admin', 'Admin', 'Създаване на Седмични задания: за куче :  и собств', '2019-08-26 15:38:04'),
(74, 'Admin', 'Admin', 'Създаване на Седмични задания: за куче :  и собств', '2019-08-26 15:38:29'),
(75, 'Admin', 'Admin', 'Създаване на Седмични задания: за куче :  и собств', '2019-08-26 15:38:43'),
(76, 'Admin', 'Admin', 'Създаване на Седмични задания: за куче :  и собств', '2019-08-26 15:39:57');

-- --------------------------------------------------------

--
-- Структура на таблица `timeline`
--

CREATE TABLE `timeline` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wasgood` text NOT NULL,
  `wasnotgood` text NOT NULL,
  `notes` text NOT NULL,
  `fromdate` text NOT NULL,
  `todate` text NOT NULL,
  `dogname` varchar(255) NOT NULL,
  `monday` tinyint(4) NOT NULL,
  `tuesday` tinyint(4) NOT NULL,
  `wednesday` tinyint(4) NOT NULL,
  `thursday` tinyint(4) NOT NULL,
  `friday` tinyint(4) NOT NULL,
  `saturday` tinyint(4) NOT NULL,
  `sunday` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `timeline`
--

INSERT INTO `timeline` (`id`, `user_id`, `wasgood`, `wasnotgood`, `notes`, `fromdate`, `todate`, `dogname`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`) VALUES
(1, 1, 'Test mobile ', 'Test mobile', 'Test mobile', '2019-08-17', '2019-08-24', 'Айра', 1, 1, 1, 1, 0, 0, 0),
(2, 22, 'сегсдфг', 'ЯВФРТФГ РЕВСБГФТТЕ', 'ТГР534Е5ТГТ6545Т', '2019-08-17', '2019-08-24', '', 1, 0, 0, 0, 0, 0, 0),
(3, 22, 'Я32ТГВЕФГРТ1', 'ЯВЕРР', 'ЯФТГРЕВ', '2019-08-17', '2019-08-24', '', 0, 0, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `card_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(50) CHARACTER SET utf8 NOT NULL,
  `mobile` varchar(50) CHARACTER SET utf8 NOT NULL,
  `designation` varchar(50) CHARACTER SET utf8 NOT NULL,
  `dogname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image` varchar(50) CHARACTER SET utf8 NOT NULL,
  `status` int(10) NOT NULL,
  `goal1` text CHARACTER SET utf8 NOT NULL,
  `goal2` text CHARACTER SET utf8 NOT NULL,
  `goal3` text CHARACTER SET utf8 NOT NULL,
  `goal4` text CHARACTER SET utf8 NOT NULL,
  `goal5` text CHARACTER SET utf8 NOT NULL,
  `goal6` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `card_id`, `name`, `email`, `password`, `gender`, `mobile`, `designation`, `dogname`, `image`, `status`, `goal1`, `goal2`, `goal3`, `goal4`, `goal5`, `goal6`) VALUES
(1, '', 'Ивайло Борисов', 'ivaylo@borisov.eu', '908fd8b9cf8a9034d7f25a25e7163668', 'Male', '0878550460', 'След обучението останах много доволен 16161616', 'Айра', '1512.jpg', 1, 'цел1', 'цел2', 'цел3', 'цел4', 'цел5', 'цел6'),
(21, '', 'Поли Генова', 'poli@genova.com', '908fd8b9cf8a9034d7f25a25e7163668', 'Female', '077777777', 'Кучето ми е адски лудо', '', '1odq43g.jpg', 1, 'цел1', 'цел2', 'цел3', 'цел4', 'цел5', 'цел6'),
(22, '', 'аСЕН', 'asen@aatraining.bg', '30e9dc33758ec80205abcc968cd2b773', 'Male', '1222122', 'Asen', '', '51254666_1889910451119163_5607192882826969088_n.jp', 1, 'weewt', '`1wwerqer', 'qrwrt', 'RWRW3RWR', ' 2R2Q 2', 'RQ3RQ'),
(23, '2DF1535', 'Ivan kolev', 'ivan@mail.com', '908fd8b9cf8a9034d7f25a25e7163668', 'Male', '29292929', '9999999', '', '1odq43g.jpg', 1, 'цел1', 'цел2', 'цел3', 'цел4', 'цел5', 'цел6'),
(25, 'ivo1234', 'ERGERG', 'ERGERG@GMAIL.COM', '81dc9bdb52d04dc20036dbd8313ed055', 'Female', '24254235235', 'EWGERGERG', '', 'image1.jpeg', 1, 'WTGRDESRGBF', 'weasdgfdeawsdfb', 'qwsdgfgwesfdgvbg', 'ASDFG', 'wasfdvb', 'QASDFVB');

-- --------------------------------------------------------

--
-- Структура на таблица `weektasks`
--

CREATE TABLE `weektasks` (
  `id` int(11) NOT NULL,
  `task1` text NOT NULL,
  `task2` text NOT NULL,
  `task3` text NOT NULL,
  `task4` text NOT NULL,
  `fromdate` text NOT NULL,
  `todate` text NOT NULL,
  `user_id` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `weektasks`
--

INSERT INTO `weektasks` (`id`, `task1`, `task2`, `task3`, `task4`, `fromdate`, `todate`, `user_id`) VALUES
(1, 'test1', 'test2', 'test3', 'test4', '2019-08-17', '2019-08-24', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deletedcards`
--
ALTER TABLE `deletedcards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deleteduser`
--
ALTER TABLE `deleteduser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weektasks`
--
ALTER TABLE `weektasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deletedcards`
--
ALTER TABLE `deletedcards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deleteduser`
--
ALTER TABLE `deleteduser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `weektasks`
--
ALTER TABLE `weektasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
