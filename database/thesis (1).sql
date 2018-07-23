-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2018 at 02:58 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesis`
--
CREATE DATABASE IF NOT EXISTS `thesis` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `thesis`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `label`) VALUES
(1, 'Letter'),
(2, 'Words'),
(3, 'Phrases');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `media_link` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `english` varchar(255) NOT NULL,
  `tagalog` varchar(255) NOT NULL,
  `bicol` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `video_link` varchar(255) NOT NULL,
  `definition` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `userid`, `title`, `media_link`, `note`, `english`, `tagalog`, `bicol`, `level`, `video_link`, `definition`) VALUES
(18, 2, 'Son', 'dclcwq_5.jpg', '', 'Son', 'Anak na lalaki', '', 2, '', ''),
(20, 2, 'Female', 'dclcwq_8.jpg', '', 'Female', 'Babae', 'Babayi', 2, '', ''),
(21, 2, 'Before', 'dclcwq_9.jpg', '', 'Before', 'Sa Harap', 'Sa Hampang', 1, '', ''),
(22, 2, 'Philslan', 'dclcwq_10.jpg', 'PhilsLan stands for Philippine Sign Language', 'PhilsLan', 'senyas', '', 2, '', ''),
(23, 2, 'Magician', 'dclcwq_11.jpg', '', 'Magician', 'Salamangkero', 'Para Magic', 2, '', 'Some one who perform magic trick');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `tries` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `name` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `mname` varchar(45) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `datereg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastlogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `type`, `name`, `lastname`, `mname`, `gender`, `datereg`, `lastlogin`, `birthday`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '', '', '', '', '2018-04-04 14:38:54', '2018-07-01 05:42:19', '0000-00-00'),
(3, 'darwin', '3750c667d5cd8aecc0a9213b362066e9', 0, 'Darwin', 'Buelo', 'Buelva', '', '2018-04-07 00:28:20', '2018-07-01 18:17:51', '1994-09-09'),
(4, 'JoanMae', 'dd54d716aaa387acf14d145d0c89d106', 0, 'Joan Mae', 'Ceneta', 'Molarca', '', '2018-06-19 07:55:16', '2018-06-19 07:55:47', '1995-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `id` int(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `contentId` int(11) NOT NULL,
  `time_spent` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`id`, `userid`, `contentId`, `time_spent`) VALUES
(11, 3, 22, 7.404),
(12, 3, 23, 4.027);

-- --------------------------------------------------------

--
-- Table structure for table `user_study_guide`
--

CREATE TABLE `user_study_guide` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `studyResource` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `level` int(11) NOT NULL,
  `stat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_study_guide`
--

INSERT INTO `user_study_guide` (`id`, `userid`, `studyResource`, `date`, `level`, `stat`) VALUES
(22, 3, '[\"21\"]', '2018-07-01 05:43:18', 1, 'ongoing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_study_guide`
--
ALTER TABLE `user_study_guide`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_study_guide`
--
ALTER TABLE `user_study_guide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
