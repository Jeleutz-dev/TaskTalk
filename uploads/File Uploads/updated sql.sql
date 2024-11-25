-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2021 at 11:01 AM
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
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `activity_log_id` int(11) NOT NULL,
  `uidUsers` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `action` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`activity_log_id`, `uidUsers`, `date`, `action`) VALUES
(1, 'jeffuy123', '2021-09-02 07:07:44', 'New Sign-Up'),
(2, 'jeffy1234', '2021-09-02 07:12:17', 'New Sign-Up');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `idCourse` int(11) NOT NULL,
  `depart_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`idCourse`, `depart_name`) VALUES
(1, 'Bachelor of Science in Accountancy (BSA)'),
(2, 'Bachelor of Science in Entrepreneurship (BSE)'),
(3, 'Bachelor of Science in Information Technology (BSIT)'),
(4, 'Bachelor of Science Education major in English (BSEDEN)'),
(5, 'Bachelor of Science in Business Administration major in Financial Management (BSBA-FM)'),
(6, 'Bachelor of Science and Hospitality Management (BSHM)'),
(7, 'Bachelor of Science in Psychology (BSP)');

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
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`idUsers`, `f_name`, `l_name`, `uidUsers`, `emailUsers`, `pwdUsers`, `gender`, `headline`, `bio`, `userImg`, `created_at`) VALUES
(1, 'Jefferson', 'Costales', 'jeff123', 'jeffersoncostales@gmail.com', '$2y$10$//ppecWllud0KJLqzYzwZubH8OQtTwGS3ah/S7L4RNPonHqxLQVom', 'Male', 'Database Administration Professor - Upda', 'Hello everyone! Feel free to message me on this account if you have questions for your project!', '611ebb7f4e7690.48809172.png', '2021-07-31 03:58:49'),
(2, 'Elias', 'Austria', 'austriaeli', 'eliaustria123@gmail.com', '$2y$10$GAiJIxzDUxWqmcsUV.ZAo.xVgorSXcaYVHUfLnp2aoPCmDriJV7.a', 'm', 'I love IT', 'Hello everyone! I am a professor at PUP San Juan! Please feel free to email me for project questions', '61045cf43f04d7.57497312.png', '2021-07-31 04:11:32'),
(3, 'Dong Lemuel', 'Damole', 'dongdamole', 'dongdamole@gmail.com', '$2y$10$TnDNWRUG/1NdU3V4bWH2AeBBZdaQwss1KYy/SYBdoETBjTHMnoA6m', 'Male', 'Drakky', '', '6104802066b086.86871023.png', '2021-07-31 06:41:36'),
(4, 'Jefferson', 'Costales', 'jeden', 'jeffcostales123@gmail.com', '$2y$10$VU1Qpk9LYWJMppLxtUjqv.cGNcDNFyNseMWEmFD2kzmY38L/mB2vK', 'Female', '', '', 'default.png', '2021-08-20 02:37:12'),
(5, 'Rizaa', 'Valdez', 'rizza123', 'zzzs@gmail.com', '$2y$10$8qm3LVVOPpesTFaPRiP4g.W.OIjh3lyVdOtfLVAxiygYN.vMQJ/zy', 'Female', '', '', 'default.png', '2021-08-20 02:40:54'),
(6, 'John Dustin', 'Santos', 'jds123', 'jds@gmail.com', '$2y$10$7dPn8WJr0zONFeX7e9UTUehhYEWcJV3DtgVSJd92oWZlwF5TwnysK', 'Male', '', '', 'default.png', '2021-08-20 02:42:14'),
(7, 'Vincent ', 'llego', 'vinllego123', 'vincentllego@gmail.com', '$2y$10$C6OxGzvhLIKdU//vJNAOYOb4XxaAGshbELWHK2rWxdFgjxdztFqUa', 'Male', '', '', 'default.png', '2021-08-20 04:36:57'),
(8, 'Macki', 'Dog', 'macki123', 'mackidog@gmail.com', '$2y$10$S7Zx3N3/EDy9GiscqG7wpOO00221T1nIbav35k9QXqef6Fzixw2lm', 'Male', '', '', 'default.png', '2021-08-20 04:41:58'),
(15, 'Jefferson', 'Uy', 'jeffuy123', 'jeffersonuy2413@gmail.com', '$2y$10$BE1JQKdNio.8hqwSjLE3LuPGlWBYgiKLbTiTeQrHwgvrwqwJ90N2G', 'Male', '', '', 'default.png', '2021-09-02 15:07:44');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `teamname` varchar(50) NOT NULL,
  `projname` varchar(50) NOT NULL,
  `course` int(11) NOT NULL,
  `section` int(11) NOT NULL,
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

INSERT INTO `projects` (`id`, `teamname`, `projname`, `course`, `section`, `createdby`, `projdesc`, `datetime`, `duedate`, `leader`, `projcode`) VALUES
(1, 'BSIT 3-1 (Group 1)', 'Database Admin Project', 3, 1, 'Jefferson Costales', 'Create a website that manages projects and show th', '2021-07-31 04:48:25', '2021-08-07', 'Jefferson Uy', 'projdba001'),
(2, 'Group JJJAM', 'IT Elective 2 Project', 3, 2, 'Jefferson Costales', 'Create a website that can help us during the pande', '2021-07-31 04:50:33', '2021-09-25', 'Madelaine Mercado', 'ITElec2prj'),
(3, 'JJJAM Team', 'System Analysis and Design Project', 3, 1, 'Elias Austria', 'Create an app that can showcase a system with thor', '2021-07-31 04:54:57', '2021-08-26', 'Jerusa Eden Dionco', 'SADProject'),
(4, 'Team Webby', 'Applications Development and Emerging Technologies', 3, 2, 'Elias Austria', 'Create an application that has AI', '2021-07-31 04:57:27', '2021-08-07', 'Jose Enrico Leuterio', 'ADETProj01'),
(5, 'Team Webby Collab with Group JJJAM', 'Information and Security Final Project', 3, 2, 'Elias Austria', 'Create a secure website', '2021-07-31 04:58:58', '2021-10-14', 'Adrian Ace Carbon', '1234567890'),
(6, 'Project Team', 'Team 1', 3, 1, 'Student 123', 'Create a website that manages projects', '2021-07-31 15:42:48', '2021-08-04', 'Jose Enrico Leuterio', '1234567890'),
(7, 'Team PUP Students', 'Project 3 - PUP', 3, 1, 'cstlsjeff', 'Create an application that has artificial intellig', '2021-08-20 03:51:07', '2021-08-31', 'Joey Siapno', '12345weare'),
(9, 'Different Group', 'Something Project', 3, 4, 'Jefferson Costales', 'Something description', '2021-08-31 00:57:00', '2021-09-11', 'Joseph Matthew Pada', '1234123455');

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
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `idSection` int(11) NOT NULL,
  `section` varchar(50) NOT NULL,
  `department` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`idSection`, `section`, `department`) VALUES
(1, 'BSIT 1-1', 3),
(2, 'BSIT 1-2', 3),
(3, 'BSIT 2-1', 3),
(4, 'BSIT 2-2', 3),
(5, 'BSIT 3-1', 3),
(6, 'BSIT 3-2', 3),
(7, 'BSA 1-1', 1),
(8, 'BSA 1-2', 1),
(9, 'BSA 2-1', 1),
(10, 'BSA 2-2', 1),
(11, 'BSA 3-1', 1),
(12, 'BSA 3-1', 1),
(13, 'BSE 1-1', 2),
(14, 'BSE 1-2', 2),
(15, 'BSE 2-1', 2),
(16, 'BSE 2-2', 2),
(17, 'BSE 3-1', 2),
(18, 'BSE 3-2', 2),
(19, 'BSEDEN 1-1', 4),
(20, 'BSEDEN 1-2', 4),
(21, 'BSEDEN 2-1', 4),
(22, 'BSEDEN 2-2', 4),
(23, 'BSEDEN 3-1', 4),
(24, 'BSEDEN 3-2', 4),
(25, 'BSBA-FM 1-1', 5),
(26, 'BSBA-FM 1-2', 5),
(27, 'BSBA-FM 2-1', 5),
(28, 'BSBA-FM 2-2', 5),
(29, 'BSBA-FM 2-3', 5),
(30, 'BSBA-FM 3-1', 5),
(31, 'BSBA-FM 3-2', 5),
(32, 'BSBA-FM 3-3', 5),
(33, 'BSHM 1-1', 6),
(34, 'BSHM 1-2', 6),
(35, 'BSHM 2-1', 6),
(36, 'BSHM 2-2', 6),
(37, 'BSHM 3-1', 6),
(38, 'BSHM 3-2', 6),
(39, 'BSP 1-1', 7);

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
  `course` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `headline` varchar(40) NOT NULL,
  `bio` varchar(1000) NOT NULL,
  `userImg` varchar(500) NOT NULL DEFAULT 'default.png',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`idUsers`, `f_name`, `l_name`, `uidUsers`, `emailUsers`, `pwdUsers`, `gender`, `course`, `section`, `headline`, `bio`, `userImg`, `created_at`) VALUES
(1, 'Jefferson', 'Uy', 'jeffyuy', 'jeffersonuy2413@gmail.com', '$2y$10$o8ySxzc/k3eI9Yu8TAFf5eb7aCrSyI8ipYYKx42WV0OpThxdxf/Wm', 'Male', 3, 2, 'TrickyPanda (coder, gamer)', 'Please follow my youtube channel and facebook page TrickyPanda, Thank you so much!', '61045e430cc384.90744145.png', '2021-07-31 04:17:07'),
(2, 'Madelaine', 'Mercado', 'maddie123', 'mrcdmdln@gmail.com', '$2y$10$AsZlp.kdcXm4c1wOxD3rDOS9xKy3/Hx7Dsb7Vj02SK8tot/atKIvG', 'Female', 3, 2, 'Hello World!', 'Hello! I am responsible and willing to help in projects!', '61045eaac385a0.90853934.png', '2021-07-31 04:18:50'),
(3, 'Jose Enrico', 'Leuterio', 'leutz', 'joseleutz@gmail.com', '$2y$10$3dbJpXarTzWJRlU2g9hI2u.mUwYzeCVHjD3n6O5M2ZOQ87E9l2d0S', 'Male', 3, 2, 'PUP San Juan Students', 'Ready to help in projects!', '61045efd671d36.31198158.png', '2021-07-31 04:20:13'),
(4, 'Jerusa Eden', 'Dionco', 'jeden', 'jerusadionco@gmail.com', '$2y$10$i6Gc1sJaEsVo.RpcHEw9luJ31vb38WRdvSXGiuBqLwCuXUmguOpFW', 'Female', 3, 2, 'Graphic Designer', 'I am mostly helpful in coding and i also enjoy graphic design!', '61045f3ab55ea4.10326471.png', '2021-07-31 04:21:14'),
(5, 'Adrian Ace', 'Carbon', 'carbonace', 'acecarbon123@gmail.com', '$2y$10$AtLWXxHqWBNkNz/7dMnU/uPHi7nb4IMA7C0w2bGZ.0.Z6.Zos4qX.', 'Male', 3, 2, 'Hi Im Ace Carbon!', 'Projects. Projects. Projects.', '61045f796243f6.20515607.png', '2021-07-31 04:22:17'),
(6, 'Vincent', 'Bucao', 'vncntbc', 'bucaovincent@gmail.com', '$2y$10$KGgdtznGgEDrzZMriJXQp.OkhY/XoWVAvpN5iycyRdjgY3xUP5N3i', 'Male', 3, 1, 'Future It Programerist', 'Tamang tulog lang muna', '61045fc2843048.84449416.png', '2021-07-31 04:23:30'),
(7, 'Ron Allan', 'Casingal', 'allan123', 'ronallancsngl@gmail.com', '$2y$10$OUTTBcs9uS6BOrlvler.1uoceviYT3OFiseMwkYt5UnOtyRieJeOK', 'Male', 3, 1, 'Mr PUP San Juan', 'Mr. PUP and IT programerist.', '61046026003808.06967738.png', '2021-07-31 04:25:10'),
(8, 'Joey', 'Siapno', 'joey123', 'joeysiapno@gmail.com', '$2y$10$7HxBkWbRZsw8LaCHAyoQyugy8SEKPbM/o46JSXG8fuoe94JnFEIHW', 'Male', 3, 1, 'Hi ;)', 'Follow me on tinder hehe', '610460c2015655.87419352.png', '2021-07-31 04:27:46'),
(9, 'Guian', 'Cosmo', 'cosmogn', 'cosmoguian@gmail.com', '$2y$10$ixI8/YXqexVs/0AZY1G/z.7DYKLzUwo/qhCYbhpoZISdzWMgkM1Ui', 'Male', 3, 1, 'PUP Pogi', 'Crush ng bayan', '610461331f50b3.02163394.png', '2021-07-31 04:29:39'),
(10, 'Joseph Matthew', 'Pada', 'paduhh', 'josephpada@gmail.com', '$2y$10$VFoW6wtr25nog5L/Pf2t3.CspaayWbLEfTatR/08T5fZ.onodyCd2', 'Male', 3, 1, 'Werking Girl', 'Libre ko kayo samgyup!', '6104616e66e6e0.23172203.png', '2021-07-31 04:30:38'),
(11, 'Student', '123', 'student123', 'student123@gmail.com', '$2y$10$jTwfIMFKaVVcIkrjZzKfw./TKJIZKWLQcOSQbroPjFLM8jEdG4SYW', 'Male', 3, 1, '', '', 'default.png', '2021-07-31 15:41:42'),
(12, 'Random', 'Student', 'rdmstud123', 'rdmstud123@gmail.com', '$2y$10$lV/7NaROsUwS/uNEMKfgfu9MG7jQMKLe8oJ.sgIsYGkgdMrhVuUsS', 'Female', 3, 1, '', '', 'default.png', '2021-08-27 04:16:12'),
(13, 'One ', 'Last', '1lasttime', '1lasttime@gmail.com', '$2y$10$DPdbx4NodQRo.lbJ4jzjXOLTXbdCPFAIhJ64APgLO/W/7NXJOeySG', 'Male', 3, 2, '', '', 'default.png', '2021-08-27 04:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `unit` int(11) NOT NULL,
  `Pre_req` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_title`, `category`, `description`, `unit`, `Pre_req`, `semester`) VALUES
(1, 'ACCO 20213', 'Accounting Principles', '', '', 3, '', '1st'),
(2, 'COMP 20013', 'Introduction to Computing', '', '', 3, '', '1st'),
(3, 'COMP 20023', 'Computer Programming 1', '', '', 3, '', '1st'),
(4, 'CWTS 10013', 'Civic Welfare Training Service 1', '', '', 3, '', '1st'),
(5, 'GEED 10053', 'Mathematics in the Modern World', '', '', 3, '', '1st'),
(6, 'GEED 10063', 'Purposive Communication', '', '', 3, '', '1st'),
(7, 'GEED 10103', 'Filipinolohiya at Pambansang Kaunlaran', '', '', 3, '', '1st'),
(8, 'PHED 10012', 'Physical Fitness and Self-Testing Activities', '', '', 3, '', '1st'),
(9, 'PHED 10022', 'Rhythmic Activities', '', '', 3, '', '1st'),
(10, 'GEED 20023', 'Politics, Governance and Citizenship', '', '', 3, '', '1st'),
(11, 'GEED 10113', 'Pagsasalin sa Kontekstong Filipino', '', '', 3, '', '1st'),
(12, 'GEED 10033', 'Readings in Philippine History', '', '', 3, '', '1st'),
(13, 'COMP 20043', 'Discrete Structures 1', '', '', 3, '', '1st'),
(14, 'COMP 20033', 'Computer Programming 2', '', '', 3, '', '1st'),
(15, 'PHED 10032', 'Individual/Dual/Combative Sports', '', '', 3, '', '1st'),
(16, 'INTE 30013', 'Programming 3 (Structured Programming)', '', '', 3, '', '1st'),
(17, 'GEED 20093', 'Reading Visual Arts', '', '', 3, '', '1st'),
(18, 'GEED 10223', 'World Literature', '', '', 3, '', '1st'),
(19, 'GEED 10023', 'Understanding the Self', '', '', 3, '', '1st'),
(20, 'COMP 20173', 'Data Communications and Networking', '', '', 3, '', '1st'),
(21, 'COMP 20103', 'Operating Systems', '', '', 3, '', '1st'),
(22, 'COMP 20063', 'Data Structures and Algorithms', '', '', 3, '', '1st'),
(23, 'PHED 10042', 'Team Sports', '', '', 3, '', '1st'),
(24, 'INTE 30023', 'Integrative Programming and Technologies 1', '', '', 3, '', '1st'),
(25, 'GEED 20113', 'People and the Earth`s Ecosystem', '', '', 3, '', '1st'),
(26, 'COMP 20203', 'Quantitative Methods with Modeling and Simulation', '', '', 3, '', '1st'),
(27, 'COMP 20193', 'Network Administration', '', '', 3, '', '1st'),
(28, 'COMP 20143', 'Human Computer Interaction', '', '', 3, '', '1st'),
(29, 'COMP 20093', 'Information Management', '', '', 3, '', '1st'),
(30, 'COMP 20083', 'Object Oriented Programming', '', '', 3, '', '1st'),
(31, 'INTE 30043', 'Multimedia', '', '', 3, '', '1st'),
(32, 'INTE 30033', 'Systems Integration and Architecture 1', '', '', 3, '', '1st'),
(33, 'GEED 10073', 'Art Appreciation', '', '', 3, '', '1st'),
(34, 'COMP 20213', 'Database Administration', '', '', 3, '', '1st'),
(35, 'COMP 20163', 'Web Development', '', '', 3, '', '1st'),
(36, 'COMP 20123', 'Fundamentals of Research', '', '', 3, '', '1st'),
(37, 'INTE-E2', 'IT Elective 2', '', '', 3, '', '1st'),
(38, 'INTE 30063', 'Information Assurance and Security 1', '', '', 3, '', '1st'),
(39, 'GEED 10043', 'The Contemporary World', '', '', 3, '', '1st'),
(40, 'COMP 20243', 'Systems Analysis and Design', '', '', 3, '', '1st'),
(41, 'COMP 20233', 'Technopreneurship', '', '', 3, '', '1st'),
(42, 'COMP 20133', 'Applications Development and Emerging Technologies', '', '', 3, '', '1st');

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
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`activity_log_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`idCourse`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`idUsers`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course` (`course`),
  ADD KEY `section` (`section`);

--
-- Indexes for table `projsubmit`
--
ALTER TABLE `projsubmit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`idSection`),
  ADD KEY `section_ibfk_1` (`department`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`idUsers`),
  ADD KEY `section` (`section`),
  ADD KEY `course` (`course`);

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
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `idCourse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `projsubmit`
--
ALTER TABLE `projsubmit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `idSection` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`course`) REFERENCES `course` (`idCourse`),
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`section`) REFERENCES `section` (`idSection`);

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`department`) REFERENCES `course` (`idCourse`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`section`) REFERENCES `section` (`idSection`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`course`) REFERENCES `course` (`idCourse`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
