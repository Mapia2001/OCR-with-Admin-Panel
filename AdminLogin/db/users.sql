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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varbinary(200) DEFAULT NULL,
  `user_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `flag` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `password`, `flag`) VALUES
(1, 'Admin', 0x61646d696e406f75746c6f6f6b2e636f6d, 'Admin', 'c4ca4238a0b923820dcc509a6f75849b', 0),
(3, 'user2', 0x7573657232406f75746c6f6f6b2e636f6d, 'user', '7e58d63b60197ceb55a1c487989a3720', 0),
(15, 'per', 0x706572406f75746c6f6f6b2e636f6d, 'user', '2eec2245df990aa35a2a05db29fbfb06', 0),
(16, 'ui', 0x7569406f75746c6f6f6b2e636f6d, 'user', 'c492f8de2d00b6c4282e766bfadaf2e7', 1),
(18, '12', 0x3132, 'user', 'c20ad4d76fe97759aa27a0c99bff6710', 0),
(23, 'user11', 0x757365723131406f75746c6f6f6b2e636f6d, 'user', '03aa1a0b0375b0461c1b8f35b234e67a', 0),
(20, 'popo', 0x706f706f406f75746c6f6f6b2e636f6d, 'user', 'f6122c971aeb03476bf01623b09ddfd4', 0),
(24, 'Cont', 0x636f6e7440672e636f6d, 'user', '202cb962ac59075b964b07152d234b70', 1),
(26, 'cont', 0x636f6e7440672e636f6d, 'user', '202cb962ac59075b964b07152d234b70', 0),
(25, 'user99', 0x757365723939406f75746c6f6f6b2e636f6d, 'user', 'b4b147bc522828731f1a016bfa72c073', 1),
(27, 'cont', 0x636f6e7440672e636f6d, 'user', '202cb962ac59075b964b07152d234b70', 1),
(28, 'ppppp', 0x70704070702e636f6d, 'user', 'c483f6ce851c9ecd9fb835ff7551737c', 0),
(29, 'del', 0x64656c40672e636f6d, 'user', '202cb962ac59075b964b07152d234b70', 0),
(30, 'user22', 0x757365723232406f75746c6f6f6b2e636f6d, 'user', '87dc1e131a1369fdf8f1c824a6a62dff', 0),
(31, 'user21', 0x757365723231406f75746c6f6f6b2e636f6d, 'user', '2e129db15b6d6db5342ba5d328642262', 0),
(32, 'cor', 0x636f7240672e636f6d, 'user', '202cb962ac59075b964b07152d234b70', 0),
(33, 'usersend', 0x726f7365666c6f7765726b696e6731393933406f75746c6f6f6b2e636f6d, 'user', '8c820b61ed659601ab839e6d0fc48ed5', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
