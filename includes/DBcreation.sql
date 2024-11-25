-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2021 at 10:36 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------
create schema loginsystem;
use loginsystem;
--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `idUsers` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  `gender` char(1) NOT NULL,
  `headline` varchar(40) DEFAULT NULL,
  `bio` varchar(1000) DEFAULT NULL,
  `userImg` varchar(500) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`idUsers`, `f_name`, `l_name`, `uidUsers`, `emailUsers`, `pwdUsers`, `gender`, `headline`, `bio`, `userImg`) VALUES
(0, 'Elias', 'Austria', 'Eli123', 'eliaustria@test.com', '$2y$10$vvdlB7AP99fc2kJx.zxnm.neZuNfadqoNwI.RveluFB1TFtsGlasG', 'm', 'Hello World!', 'Hi There!', '5be88033bdc294.35939237.jpg'),
(30, 'jefferson abrea ', 'costales', 'jefferson', 'jeffersoncostales@gmail.com', '$2y$10$EWrSwsZYOw.okyYWN4lyIOKOlAS.S.OAmxjXWWWMK7uhWzKYJI27u', 'm', 'i love badminton.', 'ababab', '6100684f4e55b0.08127386.png'),
(31, 'jeffrey', 'costales', 'jeffrey', 'jeffrey@gmail.com', '$2y$10$mIV4Qh9JIxGiEZBVdQeKEulK2N6p90U8ZrfHr8oMTD.hJLegriFre', 'm', 'math', '2+2 = 4', '61006898a96436.85298906.png'),
(32, 'lemuel dong', 'damole', 'dong', 'dong@gmail.com', '$2y$10$Nk/mM25lntxjri86oxy6Je6Us2RAVje.i7ymUgrQckEDCSkUNzRNS', 'm', 'ate lonniiieee', 'sarap luto ni ate looniiiee', '610069cee90850.14323295.png'),
(33, 'roehl ', 'espiritu', 'roehl', 'espiritu@gmail.com', '$2y$10$RgdOMXhjiCdB3dPLBiDdVuyov1kRjXgNvB1EGcw/UtpcVheWVjssm', 'm', 'family is <3', 'powerbi master', '61006a0b149fa0.43959962.png'),
(34, 'elias', 'austria', 'eli', 'elias@gmail.com', '$2y$10$Q8Sib7fxMjpHhZt/RhS.Weu2OtdOHzX2qJrCPhwzO22LoRjcY04BS', 'm', '333', '0912345678', '61006a648ceb18.93979108.png');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `teamname` varchar(50) DEFAULT NULL,
  `projname` varchar(50) DEFAULT NULL,
  `createdby` varchar(50) DEFAULT NULL,
  `projdesc` varchar(50) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `duedate` date DEFAULT NULL,
  `leader` int(11) DEFAULT NULL,
  `projcode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `teamname`, `projname`, `createdby`, `projdesc`, `datetime`, `duedate`, `leader`, `projcode`) VALUES
(2, 'Group JJJAM', 'IT Elective 2 Project', 'Jefferson Costales', NULL, '2021-07-27 21:06:16', '0000-00-00', 0, '12345jjjam');

-- --------------------------------------------------------

--
-- Table structure for table `projsubmit`
--

CREATE TABLE `projsubmit` (
  `id` int(11) NOT NULL,
  `projname` int(11) DEFAULT NULL,
  `projleader` int(11) DEFAULT NULL,
  `projmember` int(11) DEFAULT NULL,
  `datesubmit` datetime NOT NULL DEFAULT current_timestamp(),
  `file` int(11) DEFAULT NULL,
  `projgrade` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `idUsers` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  `gender` char(1) NOT NULL,
  `headline` varchar(40) DEFAULT NULL,
  `bio` varchar(1000) DEFAULT NULL,
  `userImg` varchar(500) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`idUsers`, `f_name`, `l_name`, `uidUsers`, `emailUsers`, `pwdUsers`, `gender`, `headline`, `bio`, `userImg`) VALUES
(30, 'Jefferson', 'Uy', 'jeff', 'jeffersonuy2413@gmail.com', '$2y$10$9VKPIinym/p1/rdle5aviOrcgCe/GrgPp8x2Lae3q0E.fKh/l7.6q', 'm', 'magaling ako sa valorant', 'Immortal \r\npogi \r\nsan ka pa', '61005c0c06ebc9.32492726.png'),
(31, 'madelaine', 'mercado', 'madel', 'madel123@gmail.com', '$2y$10$D8eJsNSd30VBObInas8UqumMcVAAmdPx0smXp2KiZqDRmwme.q97y', 'f', '<3 ', 'qt ko', '61005edf2d3a67.24544990.png'),
(32, 'jerusa eden', 'dionco', 'je', 'jeden@gmail.com', '$2y$10$IrEnR2MfBoRJRuUBq1VXqep3xa2JcmwI3LFaQFSPRhiw38xpcMjr.', 'f', 'tashi', 'love god ', '61005f235eda43.19523877.png'),
(33, 'jose enrico', 'leuterio', 'jose', 'jose02192000@gmail.com', '$2y$10$RRBGpcyLFjENreP7doREZ.iVwhtQASBIZ1kxJNQwp4fl14nGfOjHi', 'm', 'breyshesh', 'picture perfect you dont need no filter <3', '61005f87a578e4.83386475.png'),
(34, 'guian marc', 'cosmok', 'cosmok', 'cosmopolitan@gmail.com', '$2y$10$C93uJpO3WNjiF9pYZSrSvOs2.3hCFOhz6z4zKypjd52vLhyQgBXti', 'm', 'axie lord rk', 'axie por layp', '61005fcdca35a4.21422785.png'),
(35, 'allan ron', 'casingal', 'ron', 'ronron@gmail.com', '$2y$10$C0JImv/gX9XoTy/yJjyhGeba6iUKl2hCub6QBCB8DbFJd/dbAU4VS', 'm', 'ty', 'hahaha ronronpog ako', '6100601973d079.92222578.png'),
(36, 'jythro joey', 'siapno', 'joey', 'joey69@gmail.com', '$2y$10$nPaFoMny6/m39qvcfKhLiegX1dS43DceZZeEHeotiT8vLrmVQdDjq', 'm', 'joey @ bumble', 'open to any relationship', '6100606fb40f48.20880077.png'),
(37, 'Vincent ', 'bucao', 'bucs', 'bucsxdia@gmail.com', '$2y$10$QZv/GyUNZ6Ak.DuAUx1WeecesZXJ2B/SAngNwMKi552mBDlLI/9Tu', 'm', ' pinagpalit </3', 'Mas gwapo ako sa pinagpalit', '610060bb716119.78172294.png'),
(38, 'Joseph Matthew ', 'Pada', 'pada', 'padabot@gmail.com', '$2y$10$3bvQ2kzzbccjS8B9zDpRR.wUJfXyeZHy2dd7GtTC8QjVFOpe5wqtC', 'm', '111', 'bot lane lang ako', '610060f39a89f7.58007535.png'),
(39, 'adrian ace', 'carbon', 'ace', 'adrian@gmail.com', '$2y$10$818SnkWqPhefMiE5ucjeT.MO6GFnUwLX2p9jvvpWQYbhfzqMjSF1O', 'm', 'carbonell', 'acebading', '610063facb2ab6.22734433.png');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `taskname` varchar(50) DEFAULT NULL,
  `taskdesc` varchar(50) DEFAULT NULL,
  `taskmember` varchar(50) DEFAULT NULL,
  `tduration` date DEFAULT NULL,
  `taskstat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`idUsers`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projsubmit`
--
ALTER TABLE `projsubmit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`idUsers`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projsubmit`
--
ALTER TABLE `projsubmit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
