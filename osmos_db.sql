-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 18, 2026 at 12:01 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osmos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(19) NOT NULL,
  `post_id` bigint(19) NOT NULL,
  `user_id` bigint(19) NOT NULL,
  `post` text NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `comments` int(11) NOT NULL DEFAULT 0,
  `likes` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `has_image` tinyint(1) NOT NULL DEFAULT 0,
  `is_profile_image` tinyint(1) NOT NULL,
  `is_cover_image` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_id`, `user_id`, `post`, `image`, `comments`, `likes`, `date`, `has_image`, `is_profile_image`, `is_cover_image`) VALUES
(1, 716818368, 0, 'yoyoyo 1.post', NULL, 0, 0, '2026-05-31 12:35:01', 0, 0, 0),
(2, 935970, 0, 'yoyoyo 1.post', NULL, 0, 0, '2026-05-31 12:36:27', 0, 0, 0),
(3, 126426118, 0, 'yoyoyo 1.post', NULL, 0, 0, '2026-05-31 12:36:43', 0, 0, 0),
(4, 604489993, 0, 'yessir', NULL, 0, 0, '2026-05-31 12:39:01', 0, 0, 0),
(5, 386758003954, 0, 'yessir', NULL, 0, 0, '2026-05-31 12:40:01', 0, 0, 0),
(6, 33704, 0, 'yessir', NULL, 0, 0, '2026-05-31 12:40:12', 0, 0, 0),
(7, 895367719198886768, 0, 'yessir', NULL, 0, 0, '2026-06-01 11:06:35', 0, 0, 0),
(8, 54248626521577, 0, 'yessir', NULL, 0, 0, '2026-06-01 11:08:10', 0, 0, 0),
(9, 48411966864622, 0, '3.posting lololo\r\n', NULL, 0, 0, '2026-06-01 11:12:19', 0, 0, 0),
(10, 5241920696, 0, '3.posting lololo\r\n', NULL, 0, 0, '2026-06-01 11:12:23', 0, 0, 0),
(11, 80960596917244, 0, '3.posting lololo\r\n', NULL, 0, 0, '2026-06-01 11:13:57', 0, 0, 0),
(12, 2467007267672180, 0, '4.post ', NULL, 0, 0, '2026-06-01 11:14:42', 0, 0, 0),
(13, 625691004, 0, 'testeju vai posto un refresho ', NULL, 0, 0, '2026-06-01 12:25:03', 0, 0, 0),
(14, 34002710913237, 0, 'this is my first image post\r\n', 'uploads//vVVfVQTNfo6m7jT', 0, 0, '2026-06-17 12:23:20', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userid` bigint(19) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `url_address` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `profile_image` varchar(1000) NOT NULL,
  `cover_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `first_name`, `last_name`, `gender`, `email`, `password`, `url_address`, `date`, `profile_image`, `cover_image`) VALUES
(1, 0, 'FirstUser', 'FirstUserr', 'Male', 'example@example.lv', 'password', '1', '2026-06-17 11:07:34', 'uploads/0/2WK0kehacVmJVtw', 'uploads/0/M25xrGj34i2nUzh'),
(6, 485112447712956, 'Gustavs', 'Kiwi', 'Female', 'Gustavs@gmail.com', '1', 'gustavs.kiwi', '2026-05-04 13:58:33', '', ''),
(7, 787030638396, 'Gustavs', 'Kiwi', 'Female', 'Gustavs@gmail.com', '1', 'gustavs.kiwi', '2026-05-04 13:58:33', '', ''),
(8, 837552, 'Gustavs', 'Kiwi', 'Female', 'Gustavs@gmail.com', '1', 'gustavs.kiwi', '2026-05-04 13:58:33', '', ''),
(9, 9380176016, 'Gustavs', 'Kiwi', 'Female', 'Gustavs@gmail.com', '1', 'gustavs.kiwi', '2026-05-04 13:58:33', '', ''),
(10, 80947938408, 'Gustavs', 'Kiwi', 'Female', 'Gustavs@gmail.com', '1', 'gustavs.kiwi', '2026-05-04 13:58:33', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `comments` (`comments`),
  ADD KEY `likes` (`likes`),
  ADD KEY `date` (`date`),
  ADD KEY `has_image` (`has_image`),
  ADD KEY `is_profile_image` (`is_profile_image`),
  ADD KEY `is_cover_image` (`is_cover_image`);
ALTER TABLE `posts` ADD FULLTEXT KEY `post` (`post`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `first_name` (`first_name`),
  ADD KEY `last_name` (`last_name`),
  ADD KEY `gender` (`gender`),
  ADD KEY `email` (`email`),
  ADD KEY `url_address` (`url_address`),
  ADD KEY `date` (`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
