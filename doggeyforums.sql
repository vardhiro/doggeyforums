-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 09:17 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doggeyforums`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `doc` int(20) NOT NULL,
  `creator` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `doc`, `creator`) VALUES
(1, 'python', 'python is a programming language created in the early 1990s', 1645206781, 'vardhiro'),
(2, 'c++', 'c++ is a programing language created in 1972', 1645277036, 'shaggy'),
(3, 'c#', '', 0, ''),
(4, 'dogs', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `body` varchar(10000) NOT NULL,
  `creator` varchar(225) NOT NULL,
  `doc` int(20) NOT NULL,
  `category` varchar(225) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `creator`, `doc`, `category`, `views`) VALUES
(1, 'Problem in printing \"hello world\"', 'I cannot print \"Hello World\" in python', 'vardhiro', 1645206781, 'python', 22),
(3, 'Problem feeding my dog', 'I have a labrador and it is terribly ill. What should I feed to him?', 'sanjsam', 1645301239, 'dogs', 3);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `body` varchar(1000) NOT NULL,
  `doc` int(20) NOT NULL,
  `creator` varchar(225) NOT NULL,
  `replyto` varchar(225) NOT NULL,
  `unid` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `body`, `doc`, `creator`, `replyto`, `unid`) VALUES
(1, 'Use print(\"hello world\")', 1645275792, 'nanpro', 'shaggy-1645275017', 'nanpro-1645275792'),
(1, 'Try using print(\"Hello World\")', 1645275017, 'shaggy', 'main', 'shaggy-1645275017'),
(1, 'run print(\"hello world\") on python shell', 1645294742, 'vardhiro', 'main', 'vardhiro-1645294742'),
(3, 'Feet it with petfood ', 1645301297, 'vardhiro', 'main', 'vardhiro-1645301297');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `bio` varchar(1000) NOT NULL,
  `doj` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `bio`, `doj`) VALUES
(1, 'Dhirodatto Biswas', 'vardhiro', 'meow_1991', 'Imma pro noob', 1645271890),
(2, 'Sagnik Mallik', 'shaggy', 'shag_017', 'imma pro', 1645277036),
(3, 'Nandish Sarkar', 'nanpro', 'nan_eats_cerelac', 'imma pro in js and css', 1645277677),
(4, 'Sanjukta Samanta', 'sanjsam', 'samsanj99', '', 1645301019);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`unid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
