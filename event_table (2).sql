-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2020 at 01:40 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_table`
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
-- Dumping data for table `event_table`
--

INSERT INTO `event_table` (`eventid`, `eventcategory`, `eventtype`, `eventname`, `datepicker`, `appt`, `appt1`, `venue`, `description`, `compulsory`) VALUES
(1, 'Training', 'Workshop', 'dell', '2020-11-02', '10:00:00', '12:00:00', 'Room 1', 'Lorem ipsum dolor sit, amet consectetur adipisicin', 'Yes'),
(2, 'Training', 'Webminar', 'dell2hack', '2020-11-09', '16:00:00', '18:00:00', 'Room 1', 'Lorem ipsum dolor sit, amet consectetur adipisicin', 'No'),
(3, 'Other Events', 'Team Building', 'dellhire', '2020-11-19', '11:30:00', '13:30:00', 'Room 2', 'Lorem ipsum dolor sit, amet consectetur adipisicin', 'Yes'),
(4, 'Other Events', 'Volunteering', 'dell2hire', '2020-11-19', '14:30:00', '16:30:00', 'Room 2', 'Lorem ipsum dolor sit, amet consectetur adipisicin', 'Yes'),
(5, 'Training', 'Workshop', 'dell', '2020-11-25', '10:53:00', '12:53:00', 'Room 1', '', 'Yes'),
(6, 'Training', 'Workshop', 'dell', '2020-11-25', '10:53:00', '12:53:00', 'Room 1', '', 'Yes'),
(7, 'Training', 'Workshop', 'dell', '2020-11-24', '08:39:00', '10:39:00', 'Room 1', '', 'No');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_table`
--
ALTER TABLE `event_table`
  ADD PRIMARY KEY (`eventid`),
  ADD UNIQUE KEY `eventid` (`eventid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_table`
--
ALTER TABLE `event_table`
  MODIFY `eventid` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
