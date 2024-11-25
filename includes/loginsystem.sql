-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 03:51 PM
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
  `gender` char(6) NOT NULL,
  `headline` varchar(40) NOT NULL,
  `bio` varchar(1000) NOT NULL,
  `userImg` varchar(500) DEFAULT 'default.png',
  `created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`idUsers`, `f_name`, `l_name`, `uidUsers`, `emailUsers`, `pwdUsers`, `gender`, `headline`, `bio`, `userImg`, `created`) VALUES
(1, 'Jefferson', 'Costales', 'cstlsjeff', 'jeffersoncostales@gmail.com', '$2y$10$iL7NxibATQD30Ez3T6XjD.Mid5OEXYPLa5BtgsfbDoPyCpAffeuK.', 'm', 'Database Administration Professor', 'Hello everyone! Feel free to message me on this account if you have questions for your project!', '610459f93a5589.49189221.png', '2021-07-31 03:58:49'),
(2, 'Elias', 'Austria', 'austriaeli', 'eliaustria123@gmail.com', '$2y$10$GAiJIxzDUxWqmcsUV.ZAo.xVgorSXcaYVHUfLnp2aoPCmDriJV7.a', 'm', 'I love IT', 'Hello everyone! I am a professor at PUP San Juan! Please feel free to email me for project questions', '61045cf43f04d7.57497312.png', '2021-07-31 04:11:32'),
(3, 'Dong Lemuel', 'Damole', 'dongdamole', 'dongdamole@gmail.com', '$2y$10$TnDNWRUG/1NdU3V4bWH2AeBBZdaQwss1KYy/SYBdoETBjTHMnoA6m', 'Male', 'Drakky', '', '6104802066b086.86871023.png', '2021-07-31 06:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `course` varchar(50) NOT NULL,
  `yrsec` varchar(50) NOT NULL,
  `projname` varchar(50) NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `projdesc` varchar(50) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `duedate` date NOT NULL,
  `leader` varchar(20) NOT NULL,
  `projcode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `course`, `yrsec`, `projname`, `createdby`, `projdesc`, `datetime`, `duedate`, `leader`, `projcode`) VALUES
(1, 'BSIT 3-1 (Group 1)', 'Database Admin Project', 'Jefferson Costales', 'Create a website that manages projects and show th', '2021-07-31 04:48:25', '2021-08-07', 'Jefferson Uy', 'projdba001'),
(2, 'Group JJJAM', 'IT Elective 2 Project', 'Jefferson Costales', 'Create a website that can help us during the pande', '2021-07-31 04:50:33', '2021-09-25', 'Madelaine Mercado', 'ITElec2prj'),
(3, 'JJJAM Team', 'System Analysis and Design Project', 'Elias Austria', 'Create an app that can showcase a system with thor', '2021-07-31 04:54:57', '2021-08-26', 'Jerusa Eden Dionco', 'SADProject'),
(4, 'Team Webby', 'Applications Development and Emerging Technologies', 'Elias Austria', 'Create an application that has AI', '2021-07-31 04:57:27', '2021-08-07', 'Jose Enrico Leuterio', 'ADETProj01'),
(5, 'Team Webby Collab with Group JJJAM', 'Information and Security Final Project', 'Elias Austria', 'Create a secure website', '2021-07-31 04:58:58', '2021-10-14', 'Adrian Ace Carbon', '1234567890'),
(6, 'Project Team', 'Team 1', 'Student 123', 'Create a website that manages projects', '2021-07-31 15:42:48', '2021-08-04', 'Jose Enrico Leuterio', '1234567890');

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
  `gender` char(6) NOT NULL,
  `headline` varchar(40) NOT NULL,
  `bio` varchar(1000) NOT NULL,
  `userImg` varchar(500) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`idUsers`, `f_name`, `l_name`, `uidUsers`, `emailUsers`, `pwdUsers`, `gender`, `headline`, `bio`, `userImg`, `created`) VALUES
(1, 'Jefferson', 'Uy', 'jeffyuy', 'jeffersonuy2413@gmail.com', '$2y$10$o8ySxzc/k3eI9Yu8TAFf5eb7aCrSyI8ipYYKx42WV0OpThxdxf/Wm', 'Male', 'TrickyPanda (coder, gamer)', 'Please follow my youtube channel and facebook page TrickyPanda, Thank you so much!', '61045e430cc384.90744145.png', '2021-07-31 04:17:07'),
(2, 'Madelaine', 'Mercado', 'maddie123', 'mrcdmdln@gmail.com', '$2y$10$AsZlp.kdcXm4c1wOxD3rDOS9xKy3/Hx7Dsb7Vj02SK8tot/atKIvG', 'Female', 'Hello World!', 'Hello! I am responsible and willing to help in projects!', '61045eaac385a0.90853934.png', '2021-07-31 04:18:50'),
(3, 'Jose Enrico', 'Leuterio', 'leutz', 'joseleutz@gmail.com', '$2y$10$3dbJpXarTzWJRlU2g9hI2u.mUwYzeCVHjD3n6O5M2ZOQ87E9l2d0S', 'Male', 'PUP San Juan Students', 'Ready to help in projects!', '61045efd671d36.31198158.png', '2021-07-31 04:20:13'),
(4, 'Jerusa Eden', 'Dionco', 'jeden', 'jerusadionco@gmail.com', '$2y$10$i6Gc1sJaEsVo.RpcHEw9luJ31vb38WRdvSXGiuBqLwCuXUmguOpFW', 'Female', 'Graphic Designer', 'I am mostly helpful in coding and i also enjoy graphic design!', '61045f3ab55ea4.10326471.png', '2021-07-31 04:21:14'),
(5, 'Adrian Ace', 'Carbon', 'carbonace', 'acecarbon123@gmail.com', '$2y$10$AtLWXxHqWBNkNz/7dMnU/uPHi7nb4IMA7C0w2bGZ.0.Z6.Zos4qX.', 'Male', 'Hi Im Ace Carbon!', 'Projects. Projects. Projects.', '61045f796243f6.20515607.png', '2021-07-31 04:22:17'),
(6, 'Vincent', 'Bucao', 'vncntbc', 'bucaovincent@gmail.com', '$2y$10$KGgdtznGgEDrzZMriJXQp.OkhY/XoWVAvpN5iycyRdjgY3xUP5N3i', 'Male', 'Future It Programerist', 'Tamang tulog lang muna', '61045fc2843048.84449416.png', '2021-07-31 04:23:30'),
(7, 'Ron Allan', 'Casingal', 'allan123', 'ronallancsngl@gmail.com', '$2y$10$OUTTBcs9uS6BOrlvler.1uoceviYT3OFiseMwkYt5UnOtyRieJeOK', 'Male', 'Mr PUP San Juan', 'Mr. PUP and IT programerist.', '61046026003808.06967738.png', '2021-07-31 04:25:10'),
(8, 'Joey', 'Siapno', 'joey123', 'joeysiapno@gmail.com', '$2y$10$7HxBkWbRZsw8LaCHAyoQyugy8SEKPbM/o46JSXG8fuoe94JnFEIHW', 'Male', 'Hi ;)', 'Follow me on tinder hehe', '610460c2015655.87419352.png', '2021-07-31 04:27:46'),
(9, 'Guian', 'Cosmo', 'cosmogn', 'cosmoguian@gmail.com', '$2y$10$ixI8/YXqexVs/0AZY1G/z.7DYKLzUwo/qhCYbhpoZISdzWMgkM1Ui', 'Male', 'PUP Pogi', 'Crush ng bayan', '610461331f50b3.02163394.png', '2021-07-31 04:29:39'),
(10, 'Joseph Matthew', 'Pada', 'paduhh', 'josephpada@gmail.com', '$2y$10$VFoW6wtr25nog5L/Pf2t3.CspaayWbLEfTatR/08T5fZ.onodyCd2', 'Male', 'Werking Girl', 'Libre ko kayo samgyup!', '6104616e66e6e0.23172203.png', '2021-07-31 04:30:38'),
(11, 'Student', '123', 'student123', 'student123@gmail.com', '$2y$10$jTwfIMFKaVVcIkrjZzKfw./TKJIZKWLQcOSQbroPjFLM8jEdG4SYW', 'Male', '', '', 'default.png', '2021-07-31 15:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `projname` varchar(50) NOT NULL,
  `taskname` varchar(50) NOT NULL,
  `taskdesc` varchar(50) DEFAULT NULL,
  `taskmember` varchar(50) NOT NULL,
  `tduration` date NOT NULL,
  `tend` date NOT NULL,
  `taskstat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `projname`, `taskname`, `taskdesc`, `taskmember`, `tduration`, `tend`, `taskstat`) VALUES
(1, 'Database Admin Project', 'Task 1', 'Task Add', 'Jose Leuterio', '2021-08-07', '2021-07-01', NULL),
(2, 'Database Admin Project', 'Task 2', 'Task Task', 'Vincent Bucao', '2021-07-22', '2021-07-21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `f_name`, `l_name`, `uidUsers`, `emailUsers`, `pwdUsers`, `gender`, `headline`, `bio`, `userImg`) VALUES
(24, '', '', 'saad', 'saad@test.com', '$2y$10$vvdlB7AP99fc2kJx.zxnm.neZuNfadqoNwI.RveluFB1TFtsGlasG', 'm', '', '', '5be88033bdc294.35939237.jpg');

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
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projsubmit`
--
ALTER TABLE `projsubmit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
