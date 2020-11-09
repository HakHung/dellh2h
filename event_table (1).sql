-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2020-11-09 13:27:28
-- 服务器版本： 10.4.13-MariaDB
-- PHP 版本： 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `delldb`
--

-- --------------------------------------------------------

--
-- 表的结构 `event_table`
--

CREATE TABLE `event_table` (
  `eventid` bigint(10) UNSIGNED NOT NULL,
  `eventcategory` varchar(30) NOT NULL,
  `eventtype` varchar(30) NOT NULL,
  `eventname` varchar(30) NOT NULL,
  `datepicker` date NOT NULL,
  `appt` time NOT NULL,
  `appt1` time NOT NULL,
  `venue` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `compulsory` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `event_table`
--

INSERT INTO `event_table` (`eventid`, `eventcategory`, `eventtype`, `eventname`, `datepicker`, `appt`, `appt1`, `venue`, `description`, `compulsory`) VALUES
(1, 'Training', 'Workshop', 'dell', '2020-11-02', '10:00:00', '12:00:00', 'Room 1', 'Lorem ipsum dolor sit, amet consectetur adipisicin', 'Yes'),
(2, 'Training', 'Webminar', 'dell2hack', '2020-11-09', '16:00:00', '18:00:00', 'Room 1', 'Lorem ipsum dolor sit, amet consectetur adipisicin', 'No'),
(3, 'Other Events', 'Team Building', 'dellhire', '2020-11-19', '11:30:00', '13:30:00', 'Room 2', 'Lorem ipsum dolor sit, amet consectetur adipisicin', 'Yes'),
(4, 'Other Events', 'Volunteering', 'dell2hire', '2020-11-19', '14:30:00', '16:30:00', 'Room 2', 'Lorem ipsum dolor sit, amet consectetur adipisicin', 'Yes'),
(5, 'Other Events', 'Team Building', 'training 1', '2020-11-12', '17:23:00', '19:23:00', 'Dell', 'This is training 1', 'Yes'),
(6, 'Training', 'Workshop', 'training 1', '2020-11-28', '17:26:00', '19:24:00', 'Dell', 'Hooray', 'No'),
(7, 'Other Events', 'Team Building', 'training 1', '2020-11-18', '03:28:00', '06:28:00', 'Dell', '', 'Yes'),
(8, 'Training', 'Webminar', 'training 1', '2020-11-22', '19:29:00', '22:29:00', 'Dell', '', 'No'),
(9, 'Training', 'Webminar', 'training 1', '2020-11-22', '19:29:00', '22:29:00', 'Dell', '', 'No'),
(10, 'Training', 'Webminar', 'training 1', '2020-11-22', '19:29:00', '22:29:00', 'Dell', '', 'No'),
(11, 'Training', 'Webminar', 'training 1', '2020-11-22', '19:29:00', '22:29:00', 'Dell', '', 'No'),
(12, 'Other Events', 'Team Building', 'training 1', '2021-01-01', '19:00:00', '20:00:00', 'Dell', '', 'No'),
(13, 'Other Events', 'Volunteering', 'training 1', '2021-02-11', '19:15:00', '22:15:00', 'Dell', '', 'No');

--
-- 转储表的索引
--

--
-- 表的索引 `event_table`
--
ALTER TABLE `event_table`
  ADD PRIMARY KEY (`eventid`),
  ADD UNIQUE KEY `eventid` (`eventid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `event_table`
--
ALTER TABLE `event_table`
  MODIFY `eventid` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
