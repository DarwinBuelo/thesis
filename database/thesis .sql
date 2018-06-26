-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD:database/thesis.sql
-- Generation Time: Jun 23, 2018 at 03:01 PM
=======
-- Generation Time: Apr 13, 2018 at 04:17 AM
>>>>>>> master:database/thesis .sql
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
<<<<<<< HEAD:database/thesis.sql
  `level` int(11) NOT NULL,
  `video_link` varchar(255) NOT NULL,
  `defination` varchar(255) NOT NULL
=======
  `level` int(11) NOT NULL
>>>>>>> master:database/thesis .sql
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

<<<<<<< HEAD:database/thesis.sql
INSERT INTO `content` (`id`, `userid`, `title`, `media_link`, `note`, `english`, `tagalog`, `bicol`, `level`, `video_link`, `defination`) VALUES
(7, 2, 'funk rocker', 'dclcwq_1.jpg', 'sddfs dfgsdfsdfdsdfdsfsdf', 'funk ', 'cver', 'rakista ka bay', 1, '', ''),
(12, 2, 'fasdfas', 'dclcwq_4.jpg', 'sdfasdfasdf', 'sdfas', 'fasdfa', 'asdfasd', 1, '', ''),
(13, 2, 'joco', 'dclcwq_2.jpg', 'this is a test if the data can be post outside the admin panel', 'this is a test if the data can be post outside the admin panel', 'this is a test if the data can be post outside the admin panel', 'this is a test if the data can be post outside the admin panel', 1, '', '');
=======
INSERT INTO `content` (`id`, `userid`, `title`, `media_link`, `note`, `english`, `tagalog`, `bicol`, `level`) VALUES
(1, 0, 'Note', '3d-abstract-art-light-points-wallpaper.jpg', 'Note here', 'englsih', 'tagalog', 'bicol', 0),
(2, 0, 'Note', 'dclcwq_5.jpg', 'Note here', 'englsih', 'tagalog', 'bicol', 0),
(3, 0, 'Mabel', 'dclcwq_6.jpg', 'Try lang muna', 'Cejes', 'mabel', 'cejes', 0),
(4, 0, 'CS', 'dclcwq.gif', 'try lang', 'Logo', 'logo', 'logo', 1),
(5, 2, 'JellyFish', 'dclcwq_7.jpg', 'try lang ulit', 'JellyFish', 'jellyisda', 'labog', 1);
>>>>>>> master:database/thesis .sql

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
<<<<<<< HEAD:database/thesis.sql
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '', '', '', '', '2018-04-04 14:38:54', '2018-06-19 17:22:28', '0000-00-00'),
(3, 'darwin', '3750c667d5cd8aecc0a9213b362066e9', 0, 'Darwin', 'Buelo', 'Buelva', '', '2018-04-07 00:28:20', '2018-06-22 11:36:58', '1994-09-09'),
(4, 'JoanMae', 'dd54d716aaa387acf14d145d0c89d106', 0, 'Joan Mae', 'Ceneta', 'Molarca', '', '2018-06-19 07:55:16', '2018-06-19 07:55:47', '1995-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `contentId` int(11) NOT NULL,
  `viewtimes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(21, 3, '[\"7\",\"12\",\"13\"]', '2018-06-16 07:28:53', 1, 'ongoing');
=======
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '', '', '', '', '2018-04-04 14:38:54', '2018-04-13 02:12:49', '0000-00-00'),
(3, 'darwin', '416c13a5d48fa9ed41e9518c2a2c4a39', 0, 'Darwin', 'Buelo', 'Buelva', '', '2018-04-07 00:28:20', '2018-04-12 12:46:30', '1994-09-09');
>>>>>>> master:database/thesis .sql

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
<<<<<<< HEAD:database/thesis.sql
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
>>>>>>> master:database/thesis .sql

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_study_guide`
--
ALTER TABLE `user_study_guide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
