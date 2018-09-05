-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2018 at 01:41 AM
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
(21, 2, 'Before', 'dclcwq_9.jpg', '', 'Before', 'Sa Harap', 'Sa Hampang', 2, '', ''),
(22, 2, 'Philslan', 'dclcwq_10.jpg', 'PhilsLan stands for Philippine Sign Language', 'PhilsLan', 'senyas', '', 2, '', ''),
(23, 2, 'Magician', 'dclcwq_11.jpg', '', 'Magician', 'Salamangkero', 'Para Magic', 2, '', 'Some one who perform magic trick'),
(24, 2, 'A', 'dclcwq_1.jpg', '', 'A', 'A', '', 1, '', 'A is the first letter and the first vowel of the ISO basic Latin alphabet. It is similar to the Ancient Greek letter alpha'),
(25, 2, 'B', 'dclcwq_2.jpg', '', 'B', 'B', 'B', 1, '', 'B or b (pronounced /biË/ BEE) is the second letter of the ISO basic Latin alphabet. It represents the voiced bilabial stop in many languages'),
(26, 2, 'C', 'dclcwq_3.jpg', '', 'C', 'C', 'C', 1, '', 'C is the third letter in the English alphabet and a letter of the alphabets of many other writing systems which inherited it from the Latin alphabet'),
(27, 2, 'D', 'dclcwq_4.jpg', '', 'D', 'D', 'D', 1, '', 'D (named dee /diË/) is the fourth letter of the modern English alphabet'),
(28, 2, 'E', 'dclcwq_6.jpg', '', 'E', 'E', 'E', 1, '', 'E (named e /iË/, plural ees) is the fifth letter and the second vowel in the modern English alphabet '),
(29, 2, 'F', 'dclcwq_12.jpg', '', 'F', 'F', 'F', 1, '', 'F (named ef/É›f/) is the sixth letter in the modern English alphabet'),
(30, 2, 'G', 'dclcwq_13.jpg', 'This is the traditional \"G\".\r\n\r\nThere are two \"G\" hand position now in use in the Philippines. The latest \"G\" can easily  confused with the \"Q\" hand position if the signer is not careful. Therefore, the traditional \"G\" is still used by many', 'G', 'G', 'G', 1, '', 'G (named gee /dÊ’iË/) is the 7th letter in the ISO basic Latin alphabet.'),
(31, 2, 'H', 'dclcwq_14.jpg', '', 'H', 'H', 'H', 1, '', 'H (named aitch /eÉªtÊƒ/ or, regionally, haitch /heÉªtÊƒ/, plural aitches) is the eighth letter in the ISO basic Latin alphabet. '),
(32, 2, 'I', 'dclcwq_15.jpg', '', 'I', 'I', 'I', 1, '', 'I (named i /aÉª/, plural ies) is the ninth letter and the third vowel in the ISO basic Latin alphabet. '),
(33, 2, 'J', 'dclcwq_16.jpg', '', 'J', 'J', 'J', 1, '', 'J is the tenth letter in the modern English alphabet and the ISO basic Latin alphabet.'),
(34, 2, 'K', 'dclcwq_17.jpg', '', 'K', 'K', 'K', 1, '', 'K (named kay /keÉª/) is the eleventh letter of the modern English alphabet'),
(35, 2, 'L', 'dclcwq_18.jpg', '', 'L', 'L', 'L', 1, '', 'L (named el /É›l/) is the twelfth letter of the modern English alphabet '),
(36, 2, 'M', 'dclcwq_19.jpg', '', 'M', 'M', 'M', 1, '', 'M (named em /É›m/) is the thirteenth letter of the modern English alphabet'),
(37, 2, 'N', 'dclcwq_20.jpg', '', 'N', 'N', 'N', 1, '', 'N (named en /É›n/) is the fourteenth letter in the modern English alphabet'),
(38, 2, 'O', 'dclcwq_21.jpg', '', 'O', 'O', 'O', 1, '', 'O (named o /oÊŠ/, plural oes) is the 15th letter and the fourth vowel in the modern English alphabet'),
(39, 2, 'P', 'dclcwq_22.jpg', 'The position of the thumb down to the middle of the index finger for the \"P\" is to make it different from the \"K\" position of the hand.', 'P', 'P', 'P', 1, '', 'P (named pee /piË/ ) is the 16th letter of the modern English alphabet'),
(40, 2, 'Q', 'dclcwq_23.jpg', '', 'Q', '', '', 1, '', 'Q (named cue /kjuË/) is the 17th letter of the modern English alphabet'),
(41, 2, 'R', 'dclcwq_24.jpg', '', 'R', 'R', '', 1, '', 'R (named ar/or /É‘Ër/) is the 18th letter of the modern English alphabet'),
(42, 2, 'S', 'dclcwq_25.jpg', '', 'S', 'S', 'S', 1, '', 'S (named ess /É›s/, plural esses) is the 19th letter in the Modern English alphabet'),
(43, 2, 'T', 'dclcwq_26.jpg', '', 'T', 'T', 'T', 1, '', 'T (named tee /tiË/) is the 20th letter in the modern English alphabet and the ISO basic Latin alphabet. It is the most commonly used consonant and the second most common letter in English-language texts.'),
(44, 2, 'U', 'dclcwq_27.jpg', '', 'U', 'U', '', 1, '', 'U (named u /juË/, plural ues) is the 21st letter and the fifth vowel in the ISO basic Latin alphabet'),
(45, 2, 'V', 'dclcwq_28.jpg', '', 'V', 'V', '', 1, '', 'V (named vee /viË/) is the 22nd letter in the modern English alphabet'),
(46, 2, 'W', 'dclcwq_29.jpg', '', 'W', 'W', '', 1, '', 'W (named double-u,[note 1] plural double-ues)is the 23rd letter of the modern English'),
(47, 2, 'X', 'dclcwq_30.jpg', '', 'X', 'X', '', 1, '', 'X (named ex /É›ks/, plural exes) is the 24th and antepenultimate letter in the modern English alphabet'),
(48, 2, 'Y', 'dclcwq_31.jpg', '', 'Y', 'Y', '', 1, '', 'Y (named wye /waÉª/, plural wyes) is the 25th and penultimate letter in the modern English alphabet '),
(49, 2, 'Z', 'dclcwq_32.jpg', '', 'Z', 'Z', '', 1, '', 'Z (named zed /zÉ›d/ or zee /ziË/) is the 26th and final letter of the modern English alphabet');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `tries` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`id`, `userid`, `level`, `score`, `duration`, `tries`) VALUES
(15, 3, 1, 86, '0mins 33secs', NULL);

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
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '', '', '', '', '2018-04-04 14:38:54', '2018-07-24 02:55:07', '0000-00-00'),
(3, 'darwin', '3750c667d5cd8aecc0a9213b362066e9', 0, 'Darwin', 'Buelo', 'Buelva', '', '2018-04-07 00:28:20', '2018-07-24 16:59:30', '1994-09-09'),
(4, 'JoanMae', 'dd54d716aaa387acf14d145d0c89d106', 0, 'Joan Mae', 'Ceneta', 'Molarca', '', '2018-06-19 07:55:16', '2018-06-19 07:55:47', '1995-07-12'),
(5, 'try', '21232f297a57a5a743894a0e4a801fc3', 0, 'Darwin', 'Buelo', 'Buelva', '', '2018-07-18 21:03:49', '2018-07-24 08:29:57', '1995-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `user_level_status`
--

CREATE TABLE `user_level_status` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_level_status`
--

INSERT INTO `user_level_status` (`id`, `userid`, `level`, `status`, `date_created`) VALUES
(1, 3, 2, 'passed', '2018-07-24');

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
(32, 5, '[\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\"]', '2018-07-24 08:30:00', 1, 'passed'),
(33, 5, '[\"18\",\"20\",\"22\",\"23\",\"21\"]', '2018-07-24 08:31:11', 2, 'ongoing'),
(36, 3, '[\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\"]', '2018-07-24 17:44:57', 1, 'passed'),
(37, 3, '[\"20\",\"21\",\"23\",\"18\",\"22\"]', '2018-07-24 17:48:08', 2, 'ongoing');

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
-- Indexes for table `user_level_status`
--
ALTER TABLE `user_level_status`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_level_status`
--
ALTER TABLE `user_level_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_study_guide`
--
ALTER TABLE `user_study_guide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
