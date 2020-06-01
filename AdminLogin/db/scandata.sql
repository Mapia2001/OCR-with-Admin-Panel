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
-- Table structure for table `scandata`
--

CREATE TABLE `scandata` (
  `id` int(11) NOT NULL,
  `companyname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regno` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trailerno` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `containerno` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `isocode` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sealno` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loadstatus` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `scandate` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `scantime` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isscan` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scandata`
--

INSERT INTO `scandata` (`id`, `companyname`, `regno`, `trailerno`, `containerno`, `isocode`, `sealno`, `loadstatus`, `scandate`, `scantime`, `isscan`, `userid`) VALUES
(1, NULL, NULL, NULL, 'DAYLIGHT DONUTs\n1917 S HARVARD AVE\nTULSA, OK 74112\n9187495272', '-WE LoVE OUR CUSTOMERs', NULL, 'Y', 'IN', NULL, 'IN', 1),
(2, NULL, NULL, NULL, 'DAYLIGHT DONUTs\n1917 S HARVARD AVE\nTULSA, OK 74112\n9187495272', '-WE LoVE OUR CUSTOMERs', NULL, 'Y', 'IN', NULL, 'IN', 1),
(3, NULL, NULL, NULL, 'ww.w', '', NULL, 'N', 'IN', NULL, 'IN', 29),
(4, NULL, NULL, NULL, 'USER PROFILE', 'ser Name', NULL, 'Y', '2020-03-07', '03:24:17', 'IN', 31),
(5, NULL, NULL, NULL, 'JNX 575 MP', 'nsM I (', NULL, 'Y', '2020-03-09', '22:03:42', 'IN', 31),
(6, NULL, NULL, NULL, 'JNX 575 MP', 'nsM I (', NULL, 'Y', '2020-03-10', '00:59:45', 'IN', 33),
(7, 'nsM I (', 'nsM I (', 'nsM I (', 'JNX 575 MP', 'nsM I (', 'nsM I (', 'Y', '2020-03-10', '01:41:27', 'IN', 33);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `scandata`
--
ALTER TABLE `scandata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `scandata`
--
ALTER TABLE `scandata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
