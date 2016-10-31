-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2016 at 11:59 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `english`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `sign_up_date` date NOT NULL,
  `activated` enum('0','1') NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `bio` text,
  `profile_pic` text,
  `friend_array` text
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `sign_up_date`, `activated`, `birthdate`, `gender`, `bio`, `profile_pic`, `friend_array`) VALUES
(2, 'caddydz', 'salim', 'djerbouh', 'caddydz4@gmail.com', 'd413eb6d8c9764ad63762b29afb41031', '2016-10-09', '0', '1994-10-02', 'm', NULL, 'ZCDnsaHmq0S9B3e/anime-girl-glasses.jpg', 'queen, lyly'),
(6, 'queen', 'limo', 'queen', 'queen@gmail.com', '94454b1241ad2cfbd0c44efda1b6b6ba', '2016-10-20', '0', '1994-10-02', 'f', NULL, '8PjQ0B7kN4mOhgY/Anime-girl-Wallpaper-for-Android-2.jpg', 'caddydz'),
(7, 'lyly', 'leila', 'Zouaoui', 'lyly@outlook.com', 'd413eb6d8c9764ad63762b29afb41031', '2016-10-16', '0', '1993-12-05', 'f', NULL, 'RzPSdf4vNJeWo2F/rezi_serious_anime_girl-1920x1080.jpg', 'caddydz');

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
