-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 25, 2021 at 11:47 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `vqa_accounts`
--

CREATE TABLE `vqa_accounts` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `hash` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `vqa_accounts`
--

INSERT INTO `vqa_accounts` (`id`, `login`, `hash`) VALUES
(1, 'admin', '$2y$10$nSO.mrM8EY8.Uc4g9ruobeZKswmnAjj9mZ0W16hey1TDCw/9Pmm9e');

-- --------------------------------------------------------

--
-- Table structure for table `vqa_articles`
--

CREATE TABLE `vqa_articles` (
  `id` int(11) NOT NULL,
  `status` text COLLATE utf8_polish_ci NOT NULL,
  `date` int(11) NOT NULL,
  `title` text COLLATE utf8_polish_ci NOT NULL,
  `content` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `vqa_articles`
--

INSERT INTO `vqa_articles` (`id`, `status`, `date`, `title`, `content`) VALUES
(1, 'ready', 1034002243, 'Test Title', 'This is test content, i have to make it pretty long to trigger the shorting function so that i could test it well');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vqa_accounts`
--
ALTER TABLE `vqa_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vqa_articles`
--
ALTER TABLE `vqa_articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vqa_accounts`
--
ALTER TABLE `vqa_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vqa_articles`
--
ALTER TABLE `vqa_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
