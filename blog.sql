-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2021 at 09:39 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

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
(1, 'admin', '$2y$10$nSO.mrM8EY8.Uc4g9ruobeZKswmnAjj9mZ0W16hey1TDCw/9Pmm9e'),
(3, 'jan', '$2y$10$/8RYdLtSpE/TLQLE/kdfi.Jieu2HEavwQvA4n4HDl7wj68jApveJ2'),
(4, 'test', '$2y$10$95dEC.r0.L7jzN1b4bwt0.OLkCzyr6oWYsT1gCpLq96.md40RRDbS'),
(6, 'test2', '$2y$10$oBw15qM81tZM.lxQ3rGh1uixHjiD8B/LL6Up20BxhZgjynp.bnkkK');

-- --------------------------------------------------------

--
-- Table structure for table `vqa_articles`
--

CREATE TABLE `vqa_articles` (
  `id` int(11) NOT NULL,
  `status` text COLLATE utf8_polish_ci NOT NULL,
  `date` int(11) NOT NULL,
  `title` text COLLATE utf8_polish_ci NOT NULL,
  `content` text COLLATE utf8_polish_ci NOT NULL,
  `author` int(11) NOT NULL,
  `readCount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `vqa_articles`
--

INSERT INTO `vqa_articles` (`id`, `status`, `date`, `title`, `content`, `author`, `readCount`) VALUES
(1, 'ready', 1034002243, 'Test Title', 'This is test content, i have to make it pretty long to trigger the shorting function so that i could test it well', 1, 9),
(2, 'draft', 1623740745, 'markdown', '## **RIFI v1.4**\r\nThis is the official repo for Wireless Multimedia controller App/Program \"RIFI\"\r\n\r\nTested on : MacOS | Windows 10 | Manjaro *Linux*\r\n\r\n---\r\n\r\n##  [![Watch OS version](https://img.shields.io/badge/WatchOS-6.1-skyblue?style=flat-square)](https://www.apple.com/ca/watchos/watchos-6/)   [![python 3.8](https://img.shields.io/badge/Python-3.8.1-brightred?style=flat-square)](https://www.python.org/) [![ask me why](https://img.shields.io/badge/Rifi-v1.4-purple?style=flat-square)](http://aayush.wtf) [![Xcode 11](https://img.shields.io/badge/Xcode-11-blue?style=flat-square)](https://www.apple.com/) [![iOS 13](https://img.shields.io/badge/iOS-13-pink?style=flat-square)](https://www.apple.com/ios/)\r\n  Watch Connect and Player View</br>\r\n  <img src=\"Images/wc.png\" width=\"128\" >\r\n  <img src=\"Images/wp.png\" width=\"128\" ></br>\r\n  \r\n  iOS APP and Web Controller View</br>\r\n  \r\n  <img src=\"Images/ipapp.png\" width=\"256\"> <img src=\"images/rx6900xt.png\" width=\"256\"></br>\r\n  Android Web Controller View</br>\r\n  <img src=\"Images/pps.png\" width=\"256\"></br>\r\n\r\n---\r\n**Installation**\r\n\r\n git clone [repo](https://github.com/Aayush9029/Rifi.git) or Download .zip/.tar file from the [releases](https://github.com/Aayush9029/Rifi/releases).\r\n\r\n `cd PythonApp`\r\n\r\n `pip install -r requirements.txt`\r\n\r\nComplie the watchApp/Remote Controller.xcodeproj and install in apple watch\r\n\r\nOr Scan qr code to get acces to web interface.\r\n\r\n### Usage:\r\n\r\n> `python main.py` *on the host computer*\r\n\r\n> *Select Y on show barcode* > *Scan barcode* > Go to the link.\r\n\r\n> (For apple watch app) *Open App > input ip of the computer > Save > Scroll to multimedia.*\r\n\r\n---\r\n\r\n### So how does this work?\r\n\r\n- Python stars a local server *using flask (library)* \r\n  - Port : 8000 (configurable)\r\n  - ip : Local host ip (eg: 192.168.1.4)\r\n- Listens for Inputs (Play/pause, volume up...)\r\n- Performs the keystrokes in the Laptop that is running flask.\r\n\r\n\r\n\r\nBasically this transforms an Apple Watch or a phone to a virtual remote enabling it to controll multimedia.\r\n\r\nUses:\r\n\r\n- While Playing a music in laptop (Play/Pause) (Skip) (Volume up/down) \r\n\r\n- While Watching Movie and keyboard/mouse is a bit too far to reach.\r\n\r\n- While playing music to skip tracks and since the keystrokes are configurable they can be use to initiate custom shortcuts.\r\n\r\n---\r\n### How to install iOS and watchOS app?\r\n\r\n- Clone the repo\r\n- Open xcodeproj file for iOS_Rifi\r\n  - Change the bundle id and team \r\n  - Connect your iphone and run\r\n- Open xcodeproj file for applewatchApp\r\n  - Connect you iphone and apple watch \r\n  - Change the bundle id and team\r\n  - Run\r\n\r\n\r\n*Thanks a lot to*:\r\n- [kvosbur](https://github.com/kvosbur)\r\n', 1, 48),
(3, 'ready', 1623586273, 'syf', '###to jest test \r\n\r\nczy system działa tak jak należy\r\n\r\n - jeden\r\n - dwa\r\n - trzy', 1, 3),
(6, 'ready', 1623742376, 'test', '### kldsjlfkjsdlkjf;laskdjfl;ksjdl;kfjksdjfkjsdlkjfl;kjsdlkfjlskdjfeogijijbndfonvojknspdklbkndl;knbl;knslkjlk\r\n![](images/rx6900xt.png)', 4, 6),
(7, 'ready', 1623742573, 'Administrator to: admin admin', 'każdy użytkownik ma takie samo hasło jak login  \r\nMiłego dnia :)', 4, 3);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vqa_articles`
--
ALTER TABLE `vqa_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
