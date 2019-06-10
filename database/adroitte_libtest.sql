-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2019 at 11:42 AM
-- Server version: 5.6.43
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adroitte_libtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_reset_token` varchar(128) NOT NULL,
  `auth_key` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `username`, `password`, `password_reset_token`, `auth_key`, `email`, `status`, `date_added`) VALUES
(3, 'Keval Thacker', 'admin', '$2y$13$eWoUoF7kbk09jL3pX76gHu0/QRCC.a0HXrTC/U9TNdEK5PbLfTiya', '', 'PcPxXB71zB6wz-wunBSdwj9bAYRUYQun', 'admin@admin.com', 1, '2019-06-07 13:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(128) DEFAULT NULL,
  `book_author` varchar(128) DEFAULT NULL,
  `book_published_year` int(4) NOT NULL,
  `book_img` varchar(255) NOT NULL,
  `book_inventory` int(1) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `book_author`, `book_published_year`, `book_img`, `book_inventory`, `created_by`, `date_added`) VALUES
(19, 'Book 1', 'Test Authot', 2011, 'C9O9k5QtHEVpe1PrbueIyiiGk3vY59L9.jpg', 0, 3, '0000-00-00 00:00:00'),
(20, 'Book 13', 'Test Authot', 2011, 'S-_95A4TyLgjBkQDAKD8LSskLu3G8ho3.jpg', 5, 3, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `book_lend_track`
--

CREATE TABLE `book_lend_track` (
  `lend_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `special_notes` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_lend_track`
--

INSERT INTO `book_lend_track` (`lend_id`, `user_id`, `book_id`, `start_date`, `end_date`, `special_notes`, `created_by`, `date_added`) VALUES
(12, 3, 20, '2015-12-05', '2015-12-06', '', 3, '2019-06-10 06:04:44'),
(11, 3, 20, '2019-06-06', '2019-06-07', '', 3, '2019-06-10 06:04:21'),
(10, 3, 19, '2019-05-06', '2019-05-08', 'asdfasdfad', 3, '2019-06-10 05:42:39'),
(13, 4, 20, '2019-05-05', '2019-05-06', '', 3, '2019-06-10 06:05:51'),
(14, 5, 20, '2019-05-05', '2019-05-08', '', 3, '2019-06-10 06:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `salutation` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `streetnumber` varchar(45) DEFAULT NULL,
  `zip` varchar(45) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `description` text,
  `photo` varchar(255) NOT NULL,
  `register_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `salutation`, `title`, `firstname`, `lastname`, `street`, `streetnumber`, `zip`, `city`, `description`, `photo`, `register_date`, `created_by`, `date_added`) VALUES
(4, 'Mr', 'Suku', 'Bakul', 'Thacker', '07, Dev, Near Vayamshalla', '15', '370001', 'Bhuj', 'sdfasdfas', '6tRKqA0lsYXSETL0eZzoIcAFJgNFXvsH.jpg', '2019-06-10 06:04:05', 3, '0000-00-00 00:00:00'),
(5, 'Mr', 'KUNG', 'Keval', 'Thacker', '07, Dev, Near Vayamshalla', '010', '370001', 'Bhuj', 'adfasdfasfsd', '8Fi89LYpjf8dfz05EyLbqYIDufmq2E7-.jpg', '2019-06-10 06:06:16', 3, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_lend_track`
--
ALTER TABLE `book_lend_track`
  ADD PRIMARY KEY (`lend_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `book_lend_track`
--
ALTER TABLE `book_lend_track`
  MODIFY `lend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
