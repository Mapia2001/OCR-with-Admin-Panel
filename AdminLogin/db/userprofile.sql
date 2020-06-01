-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 09, 2020 at 10:20 PM
-- Server version: 5.6.45
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `containe_multi_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `id` int(100) NOT NULL,
  `refno` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `companyname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tellno` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eaddress1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eaddress2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eaddress3` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ownernametell` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `userid` int(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`id`, `refno`, `companyname`, `address`, `tellno`, `eaddress1`, `eaddress2`, `eaddress3`, `ownernametell`, `notes`, `userid`) VALUES
(1, '213', '7878', '987', '3453', '345@outlook.com', '435@outlook.com', '345@outlook.com', '654', 'qweqwe', 2),
(3, 'qwq', 'qqq', 'qqq', 'user2', 'qq', 'qq', 'qq', '321', 'qq', 3),
(4, '888', '888', '888', '888', '888', '888', '888', '888', '888', NULL),
(5, '111', '11', '11', '11', '11', '11', '11', '11', '11111', 4),
(6, '555', '555', '555', '555', '555@out', '', '', '', '', 10),
(7, '12', '12', '12', '12', '12', '12', '12', '12', '', 8),
(8, 'cont', 'cont', '12', '12', '12@1.com', '2@2.com', '3@3.com', '123', '12', 13),
(9, '', '', '', '', '', '', '', '', '', 14),
(10, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 15),
(11, '123', '123', '123', '1231', '123', '123', '123', '123', '123', 16),
(12, '123', '123', '123', '123', '123', '123', 'popo', '987po', 'asd', 20),
(14, 'pi', 'pi', 'pi', 'pi', 'pi', 'pi', 'pi', 'pi', 'pi', 17),
(15, 'cont123', 'cont test', 'skdkd', 'kdkd', 'besharewise@gmail.com', 'info@delcorsecurity.com', 'delcorrep@gmail.com', 'abc', 'test', 26),
(16, 'del123', 'delcor', 'dss', '341', 'info@delcorsecurity.com', 'besharewise@gmail.com', 'delcorrep@gmail.com', 'dds', 'dds', 29),
(17, 'user21', 'user21', 'user21', 'user21', '345@outlook.com', 'user21', 'user21', 'user21', 'user21', 31),
(18, 'asdf', 'asdf', 'asdf', 'asdf', 'mapiaboss200200@gmail.com', 'mapiaboss200200@gmail.com', 'mapiaboss200200@gmail.com', 'qw', 'qw', 33);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
