-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2022 at 01:40 AM
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
-- Database: `tasktalk`
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
(1, 'jcostales', '2022-03-16 04:27:03', 'Add Subject'),
(2, 'jcostales', '2022-03-16 04:27:03', 'Add Section'),
(3, 'jcostales', '2022-03-16 04:27:03', 'Add Groups'),
(4, 'jcostales', '2022-03-16 04:27:03', 'Add Project'),
(5, 'jcostales', '2022-03-16 04:41:35', 'Add Subject'),
(6, 'jcostales', '2022-03-16 04:41:35', 'Add Section'),
(7, 'jcostales', '2022-03-16 04:41:35', 'Add Groups'),
(8, 'jcostales', '2022-03-16 04:41:35', 'Add Project'),
(9, 'jcostales', '2022-03-16 04:47:20', 'Edit Project'),
(10, 'jcostales', '2022-03-16 04:47:54', 'Edit Project'),
(11, 'jcostales', '2022-03-16 10:54:27', 'Add Groups'),
(12, 'jcostales', '2022-03-16 10:54:27', 'Add Subject'),
(13, 'jcostales', '2022-03-16 10:54:27', 'Add Project'),
(14, 'jcostales', '2022-03-16 11:03:39', 'Add Subject'),
(15, 'jcostales', '2022-03-16 11:03:39', 'Add Section'),
(16, 'jcostales', '2022-03-16 11:03:39', 'Add Groups'),
(17, 'jcostales', '2022-03-16 11:03:39', 'Add Project'),
(18, 'jcostales', '2022-03-16 11:07:01', 'Add Subject'),
(19, 'jcostales', '2022-03-16 11:07:10', 'Add-Section'),
(20, 'jcostales', '2022-03-16 11:09:18', 'Add Groups'),
(21, 'jcostales', '2022-03-16 11:09:18', 'Add Subject'),
(22, 'jcostales', '2022-03-16 11:09:18', 'Add Project'),
(23, 'jcostales', '2022-03-16 11:10:06', 'Add Subject'),
(24, 'jcostales', '2022-03-16 11:10:06', 'Add Section'),
(25, 'jcostales', '2022-03-16 11:10:06', 'Add Groups'),
(26, 'jcostales', '2022-03-16 11:10:06', 'Add Project'),
(27, 'jcostales', '2022-03-16 11:15:55', 'Edit Project'),
(28, 'jcostales', '2022-03-16 11:18:29', 'Edit Project'),
(29, 'jcostales', '2022-03-16 11:19:28', 'Add Subject'),
(30, 'jcostales', '2022-03-16 11:19:28', 'Add Section'),
(31, 'jcostales', '2022-03-16 11:19:28', 'Add Groups'),
(32, 'jcostales', '2022-03-16 11:19:28', 'Add Project'),
(33, 'jcostales', '2022-03-16 11:26:54', 'Add Groups'),
(34, 'jcostales', '2022-03-16 11:26:54', 'Add Subject'),
(35, 'jcostales', '2022-03-16 11:26:54', 'Add Project'),
(36, 'jcostales', '2022-03-16 11:27:08', 'Edit Project'),
(37, 'jcostales', '2022-03-16 11:28:02', 'Edit Project'),
(38, 'jcostales', '2022-03-16 11:28:13', 'Delete Project'),
(39, 'jcostales', '2022-03-16 11:28:57', 'Add Project'),
(40, 'jcostales', '2022-03-16 11:29:03', 'Add Group Members'),
(41, 'jcostales', '2022-03-16 11:29:42', 'Add Task'),
(42, 'jcostales', '2022-03-16 11:29:48', 'Add Project'),
(43, 'jcostales', '2022-03-16 11:29:53', 'Add Group Members'),
(44, '2018-00103-SJ-0', '2022-03-16 11:30:51', 'Add Subtask'),
(45, '2018-00103-SJ-0', '2022-03-16 11:52:55', 'Add Task'),
(46, '2018-00103-SJ-0', '2022-03-16 13:02:03', 'Edit File'),
(47, '2018-00103-SJ-0', '2022-03-16 13:17:25', 'Edit File'),
(48, '2018-00103-SJ-0', '2022-03-16 13:55:49', 'Edit File'),
(49, '2018-00103-SJ-0', '2022-03-16 13:56:34', 'Edit File'),
(50, '2018-00103-SJ-0', '2022-03-16 13:57:33', 'Edit File'),
(51, '2018-00103-SJ-0', '2022-03-16 13:59:28', 'Edit File'),
(52, '2018-00103-SJ-0', '2022-03-16 14:00:38', 'Edit File'),
(53, '2018-00103-SJ-0', '2022-03-16 14:23:05', 'Edit File'),
(54, '2018-00103-SJ-0', '2022-03-16 14:23:17', 'Edit File'),
(55, '2018-00103-SJ-0', '2022-03-16 14:25:54', 'Edit File'),
(56, '2018-00103-SJ-0', '2022-03-16 14:26:15', 'Edit File'),
(57, '2018-00103-SJ-0', '2022-03-16 14:26:25', 'Edit File'),
(58, '2018-00103-SJ-0', '2022-03-16 14:37:40', 'Delete Task'),
(59, '2018-00103-SJ-0', '2022-03-16 14:38:56', 'Delete Task'),
(60, '2018-00103-SJ-0', '2022-03-16 14:53:37', 'Logout'),
(61, '2018-00103-SJ-0', '2022-03-16 15:44:52', 'Login'),
(62, '2018-00103-SJ-0', '2022-03-16 15:44:59', 'Logout'),
(63, '2018-00043-SJ-0', '2022-03-16 15:45:07', 'Login'),
(64, '2018-00043-SJ-0', '2022-03-16 16:34:11', 'Delete Task'),
(65, '2018-00043-SJ-0', '2022-03-16 16:35:50', 'Upload File'),
(66, '2018-00043-SJ-0', '2022-03-16 16:36:05', 'Delete Task'),
(67, '2018-00043-SJ-0', '2022-03-16 16:37:51', 'Delete Task'),
(68, '2018-00043-SJ-0', '2022-03-16 16:38:29', 'Upload File'),
(69, '2018-00043-SJ-0', '2022-03-16 16:38:51', 'Edit File'),
(70, '2018-00043-SJ-0', '2022-03-16 16:43:49', 'Add Group Member'),
(71, '2018-00043-SJ-0', '2022-03-16 16:58:10', 'Add Group Member'),
(72, '2018-00043-SJ-0', '2022-03-16 17:00:38', 'Add Group Member'),
(73, '2018-00043-SJ-0', '2022-03-16 17:01:19', 'Add Group Member'),
(74, '2018-00043-SJ-0', '2022-03-16 17:01:45', 'Add Group Member'),
(75, '2018-00043-SJ-0', '2022-03-16 17:02:33', 'Add Group Member'),
(76, '2018-00043-SJ-0', '2022-03-16 17:02:39', 'Add Group Member'),
(77, '2018-00043-SJ-0', '2022-03-16 17:03:54', 'Add Group Member'),
(78, '2018-00043-SJ-0', '2022-03-16 17:04:54', 'Add Group Member'),
(79, '2018-00043-SJ-0', '2022-03-16 17:05:21', 'Add Group Member'),
(80, '2018-00043-SJ-0', '2022-03-16 17:05:35', 'Add Group Member'),
(81, '2018-00043-SJ-0', '2022-03-16 17:06:15', 'Add Group Member'),
(82, '2018-00043-SJ-0', '2022-03-16 17:07:30', 'Add Group Member'),
(83, '2018-00043-SJ-0', '2022-03-16 17:07:38', 'Add Group Member'),
(84, '2018-00043-SJ-0', '2022-03-16 17:07:45', 'Add Group Member'),
(85, '2018-00043-SJ-0', '2022-03-16 17:08:12', 'Add Group Member'),
(86, '2018-00043-SJ-0', '2022-03-16 17:18:31', 'Add Group Members'),
(87, '2018-00043-SJ-0', '2022-03-16 17:21:25', 'Logout'),
(88, '2018-00103-SJ-0', '2022-03-16 17:21:34', 'Login'),
(89, '2018-00103-SJ-0', '2022-03-16 17:23:24', 'Delete Task'),
(90, '2018-00103-SJ-0', '2022-03-16 17:23:34', 'Subtask Status Changed'),
(91, '2018-00103-SJ-0', '2022-03-16 17:23:45', 'Delete Subtask'),
(92, '2018-00103-SJ-0', '2022-03-16 17:23:56', 'Task Status Changed'),
(93, '2018-00103-SJ-0', '2022-03-16 17:24:08', 'Upload File'),
(94, '2018-00103-SJ-0', '2022-03-16 17:24:20', 'Upload File'),
(95, '2018-00103-SJ-0', '2022-03-16 17:26:34', 'Add Subtask'),
(96, '2018-00103-SJ-0', '2022-03-16 17:26:58', 'Add Subtask'),
(97, '2018-00103-SJ-0', '2022-03-16 17:27:34', 'Upload File'),
(98, '2018-00103-SJ-0', '2022-03-16 17:28:10', 'Upload File'),
(99, 'jcostales', '2022-03-16 17:32:47', 'Login'),
(100, 'jcostales', '2022-03-16 17:33:14', 'Edit Project'),
(101, 'jcostales', '2022-03-16 17:36:46', 'Edit Project'),
(102, '2018-00103-SJ-0', '2022-03-16 19:18:55', 'Add Subtask'),
(103, 'jcostales', '2022-03-16 19:44:51', 'Add Task'),
(104, 'jcostales', '2022-03-16 19:46:24', 'Add Task'),
(105, 'jcostales', '2022-03-16 19:48:40', 'Add Task'),
(106, 'jcostales', '2022-03-16 19:49:26', 'Add Task'),
(107, '2018-00103-SJ-0', '2022-03-16 20:11:04', 'Add Subtask'),
(108, '2018-00103-SJ-0', '2022-03-16 20:12:26', 'Logout'),
(109, '2018-00043-SJ-0', '2022-03-16 20:12:33', 'Login'),
(110, '2018-00043-SJ-0', '2022-03-16 21:25:46', 'Add Task'),
(111, '2018-00043-SJ-0', '2022-03-16 21:27:51', 'Add Task'),
(112, '2018-00043-SJ-0', '2022-03-16 21:28:49', 'Add Task'),
(113, '2018-00043-SJ-0', '2022-03-16 22:06:00', 'Add Subtask'),
(114, '2018-00043-SJ-0', '2022-03-16 22:06:43', 'Task Status Changed'),
(115, '2018-00043-SJ-0', '2022-03-16 22:07:23', 'Task Status Changed'),
(116, '2018-00043-SJ-0', '2022-03-16 22:26:55', 'Task Status Changed'),
(117, '2018-00043-SJ-0', '2022-03-16 22:27:04', 'Task Status Changed'),
(118, '2018-00043-SJ-0', '2022-03-16 22:29:26', 'Task Status Changed'),
(119, '2018-00043-SJ-0', '2022-03-16 22:31:01', 'Task Status Changed'),
(120, '2018-00043-SJ-0', '2022-03-16 22:41:05', 'Subtask Status Changed'),
(121, '2018-00043-SJ-0', '2022-03-16 22:41:55', 'Add Subtask'),
(122, '2018-00043-SJ-0', '2022-03-16 22:42:28', 'Add Subtask'),
(123, '2018-00043-SJ-0', '2022-03-16 22:42:37', 'Subtask Status Changed'),
(124, '2018-00043-SJ-0', '2022-03-16 22:43:05', 'Add Subtask'),
(125, '2018-00043-SJ-0', '2022-03-16 22:43:21', 'Subtask Status Changed'),
(126, '2018-00043-SJ-0', '2022-03-16 22:43:33', 'Delete Task'),
(127, '2018-00043-SJ-0', '2022-03-16 22:43:58', 'Add Task'),
(128, '2018-00043-SJ-0', '2022-03-16 22:44:24', 'Add Subtask'),
(129, '2018-00043-SJ-0', '2022-03-16 22:44:36', 'Subtask Status Changed'),
(130, '2018-00043-SJ-0', '2022-03-16 22:51:25', 'Subtask Status Changed'),
(131, '2018-00043-SJ-0', '2022-03-16 22:51:39', 'Subtask Status Changed'),
(132, '2018-00043-SJ-0', '2022-03-16 22:51:52', 'Subtask Status Changed'),
(133, '2018-00043-SJ-0', '2022-03-16 22:59:07', 'Add Task'),
(134, '2018-00043-SJ-0', '2022-03-16 22:59:43', 'Add Task'),
(135, '2018-00043-SJ-0', '2022-03-16 23:32:04', 'Subtask Status Changed'),
(136, '2018-00043-SJ-0', '2022-03-16 23:32:11', 'Subtask Status Changed'),
(137, '2018-00043-SJ-0', '2022-03-16 23:32:21', 'Subtask Status Changed'),
(138, '2018-00043-SJ-0', '2022-03-16 23:35:39', 'Subtask Status Changed'),
(139, '2018-00043-SJ-0', '2022-03-16 23:35:54', 'Subtask Status Changed'),
(140, '2018-00043-SJ-0', '2022-03-16 23:37:35', 'Task Status Changed'),
(141, '2018-00043-SJ-0', '2022-03-16 23:38:19', 'Add Task'),
(142, '2018-00043-SJ-0', '2022-03-16 23:38:27', 'Task Status Changed'),
(143, '2018-00043-SJ-0', '2022-03-16 23:38:37', 'Logout'),
(144, '2018-00103-SJ-0', '2022-03-16 23:38:44', 'Login'),
(145, '2018-00103-SJ-0', '2022-03-16 23:40:02', 'Add Group Member'),
(146, '2018-00103-SJ-0', '2022-03-16 23:40:34', 'Submit Grading'),
(147, '2018-00103-SJ-0', '2022-03-16 23:42:08', 'Logout'),
(148, '2018-00043-SJ-0', '2022-03-16 23:42:18', 'Login'),
(149, '2018-00043-SJ-0', '2022-03-16 23:42:31', 'Logout'),
(150, '2018-00103-SJ-0', '2022-03-16 23:42:37', 'Login'),
(151, '2018-00103-SJ-0', '2022-03-16 23:59:59', 'Add Task'),
(152, '2018-00103-SJ-0', '2022-03-17 00:31:39', 'Add Task'),
(153, '2018-00103-SJ-0', '2022-03-17 01:02:11', 'Added Leader Using Project Code'),
(154, 'jcostales', '2022-03-17 01:05:17', 'Delete Group'),
(155, '2018-00103-SJ-0', '2022-03-17 01:06:57', 'Added Leader Using Project Code'),
(156, '2018-00103-SJ-0', '2022-03-17 01:08:01', 'Added Leader Using Project Code'),
(157, '2018-00103-SJ-0', '2022-03-17 01:11:06', 'Added Leader Using Project Code'),
(158, 'jcostales', '2022-03-17 01:13:47', 'Delete Group'),
(159, '2018-00103-SJ-0', '2022-03-17 01:14:00', 'Added Leader Using Project Code'),
(160, 'jcostales', '2022-03-17 01:15:38', 'Delete Group'),
(161, '2018-00103-SJ-0', '2022-03-17 01:15:57', 'Added Leader Using Project Code'),
(162, 'jcostales', '2022-03-17 12:53:53', 'Delete Project'),
(163, 'jcostales', '2022-03-17 12:53:58', 'Delete Project'),
(164, 'jcostales', '2022-03-17 12:54:01', 'Delete Project'),
(165, 'jcostales', '2022-03-17 12:54:05', 'Delete Project'),
(166, 'jcostales', '2022-03-17 12:56:49', 'Edit Project'),
(167, 'jcostales', '2022-03-17 13:00:06', 'Add Groups'),
(168, 'jcostales', '2022-03-17 13:00:06', 'Add Subject'),
(169, 'jcostales', '2022-03-17 13:00:06', 'Add Project'),
(170, 'jcostales', '2022-03-17 13:00:13', 'Delete Group'),
(171, 'jcostales', '2022-03-17 13:00:36', 'Add Group Member'),
(172, 'jcostales', '2022-03-17 13:00:55', 'Delete Group'),
(173, 'jcostales', '2022-03-17 13:01:41', 'Delete Project'),
(174, 'jcostales', '2022-03-17 13:02:01', 'Edit Project'),
(175, 'jcostales', '2022-03-17 13:04:49', 'Add Subject'),
(176, 'jcostales', '2022-03-17 13:04:49', 'Add Section'),
(177, 'jcostales', '2022-03-17 13:04:49', 'Add Groups'),
(178, 'jcostales', '2022-03-17 13:04:49', 'Add Project'),
(179, 'jcostales', '2022-03-17 13:10:14', 'Edit Project'),
(180, 'jcostales', '2022-03-17 13:12:52', 'Add Subject'),
(181, 'jcostales', '2022-03-17 13:12:52', 'Add Section'),
(182, 'jcostales', '2022-03-17 13:12:52', 'Add Groups'),
(183, 'jcostales', '2022-03-17 13:12:52', 'Add Project'),
(184, 'jcostales', '2022-03-17 13:14:02', 'Edit Project'),
(185, 'jcostales', '2022-03-17 13:14:38', 'Add Groups'),
(186, 'jcostales', '2022-03-17 13:14:38', 'Add Subject'),
(187, 'jcostales', '2022-03-17 13:14:38', 'Add Project'),
(188, 'jcostales', '2022-03-17 13:15:37', 'Add Subject'),
(189, 'jcostales', '2022-03-17 13:15:37', 'Add Section'),
(190, 'jcostales', '2022-03-17 13:15:37', 'Add Groups'),
(191, 'jcostales', '2022-03-17 13:15:37', 'Add Project'),
(192, 'jcostales', '2022-03-17 13:17:02', 'Edit Project'),
(193, 'jcostales', '2022-03-17 13:18:25', 'Add Subject'),
(194, 'jcostales', '2022-03-17 13:18:25', 'Add Section'),
(195, 'jcostales', '2022-03-17 13:18:25', 'Add Groups'),
(196, 'jcostales', '2022-03-17 13:18:25', 'Add Project'),
(197, 'jcostales', '2022-03-17 13:19:17', 'Delete Project'),
(198, 'jcostales', '2022-03-17 13:20:14', 'Delete Project'),
(199, 'jcostales', '2022-03-17 13:21:47', 'Delete Project'),
(200, 'jcostales', '2022-03-17 13:23:00', 'Delete Project'),
(201, 'jcostales', '2022-03-17 13:24:08', 'Delete Project'),
(202, 'jcostales', '2022-03-17 13:25:32', 'Add Subject'),
(203, 'jcostales', '2022-03-17 13:25:32', 'Add Section'),
(204, 'jcostales', '2022-03-17 13:25:32', 'Add Groups'),
(205, 'jcostales', '2022-03-17 13:25:32', 'Add Project'),
(206, 'jcostales', '2022-03-17 13:26:15', 'Add Subject'),
(207, 'jcostales', '2022-03-17 13:26:15', 'Add Section'),
(208, 'jcostales', '2022-03-17 13:26:15', 'Add Groups'),
(209, 'jcostales', '2022-03-17 13:26:15', 'Add Project'),
(210, 'jcostales', '2022-03-17 13:26:48', 'Add Subject'),
(211, 'jcostales', '2022-03-17 13:26:57', 'Add-Section'),
(212, 'jcostales', '2022-03-17 13:27:24', 'Add Groups'),
(213, 'jcostales', '2022-03-17 13:27:24', 'Add Subject'),
(214, 'jcostales', '2022-03-17 13:27:24', 'Add Project'),
(215, 'jcostales', '2022-03-17 13:59:18', 'Add Group Members'),
(216, 'jcostales', '2022-03-17 14:06:55', 'Add Group Member'),
(217, 'jcostales', '2022-03-17 14:17:38', 'post'),
(218, 'jcostales', '2022-03-17 14:17:52', 'post'),
(219, 'jcostales', '2022-03-17 14:18:18', 'Add Task'),
(220, '2018-00043-SJ-0', '2022-03-17 14:46:23', 'Logout'),
(221, '2018-00103-SJ-0', '2022-03-17 14:46:31', 'Login'),
(222, 'jcostales', '2022-03-17 14:48:03', 'Add Task'),
(223, '2018-00103-SJ-0', '2022-03-17 15:32:26', 'Add Subtask'),
(224, '2018-00103-SJ-0', '2022-03-17 15:32:57', 'Add Subtask'),
(225, '2018-00103-SJ-0', '2022-03-17 15:35:24', 'Subtask Status Changed'),
(226, '2018-00103-SJ-0', '2022-03-17 15:38:11', 'Subtask Status Changed'),
(227, '2018-00103-SJ-0', '2022-03-17 15:38:22', 'Task Status Changed'),
(228, '2018-00103-SJ-0', '2022-03-17 15:38:36', 'Add Group Members'),
(229, '2018-00103-SJ-0', '2022-03-17 15:38:55', 'Submit Grading'),
(230, 'jcostales', '2022-03-17 15:39:11', 'Logout'),
(231, '2018-00281-SJ-0', '2022-03-17 15:39:36', 'Login'),
(232, '2018-00281-SJ-0', '2022-03-17 15:40:44', 'Upload File'),
(233, '2018-00281-SJ-0', '2022-03-17 15:53:23', 'Submit Grading'),
(234, '2018-00281-SJ-0', '2022-03-17 15:53:41', 'Submit Grading'),
(235, '2018-00281-SJ-0', '2022-03-17 15:53:49', 'Logout'),
(236, '2018-00043-SJ-0', '2022-03-17 15:54:16', 'Login'),
(237, '2018-00103-SJ-0', '2022-03-17 15:56:19', 'Submit Grading'),
(238, '2018-00103-SJ-0', '2022-03-17 18:43:19', 'Logout'),
(239, '2018-00103-SJ-0', '2022-03-17 18:43:27', 'Login'),
(240, '2018-00103-SJ-0', '2022-03-17 18:45:17', 'Login'),
(241, '2018-00043-SJ-0', '2022-03-17 18:48:31', 'Logout'),
(242, 'jcostales', '2022-03-17 18:48:41', 'Login'),
(243, 'jcostales', '2022-03-17 18:55:37', 'Login'),
(244, '2018-00103-SJ-0', '2022-03-17 18:56:38', 'Login'),
(245, 'jcostales', '2022-03-17 19:03:51', 'Logout'),
(246, '2018-00103-SJ-0', '2022-03-17 19:38:54', 'Submit Grading'),
(247, '2018-00103-SJ-0', '2022-03-17 20:19:14', 'Submit Grading'),
(248, '2018-00103-SJ-0', '2022-03-17 20:32:41', 'Submit Grading'),
(249, '2018-00103-SJ-0', '2022-03-17 20:36:06', 'Submit Grading'),
(250, '2018-00103-SJ-0', '2022-03-17 20:36:15', 'Logout'),
(251, '2018-00387-SJ-0', '2022-03-17 20:36:22', 'Login'),
(252, '2018-00387-SJ-0', '2022-03-17 20:36:26', 'Logout'),
(253, '2018-00281-SJ-0', '2022-03-17 20:37:14', 'Login'),
(254, '2018-00281-SJ-0', '2022-03-17 20:49:59', 'Logout'),
(255, '2018-00103-SJ-0', '2022-03-17 20:50:07', 'Login'),
(256, '2018-00103-SJ-0', '2022-03-17 20:50:39', 'Submit Grading'),
(257, '2018-00103-SJ-0', '2022-03-17 20:51:01', 'Submit Grading'),
(258, '2018-00043-SJ-0', '2022-03-17 20:51:43', 'Login'),
(259, '2018-00043-SJ-0', '2022-03-17 20:53:28', 'Submit Grading'),
(260, '2018-00043-SJ-0', '2022-03-17 20:53:46', 'Submit Grading'),
(261, '2018-00043-SJ-0', '2022-03-17 20:54:07', 'Logout'),
(262, '2018-00281-SJ-0', '2022-03-17 20:54:19', 'Login'),
(263, '2018-00281-SJ-0', '2022-03-17 20:57:21', 'Submit Grading'),
(264, '2018-00281-SJ-0', '2022-03-17 20:57:54', 'Submit Grading'),
(265, '2018-00281-SJ-0', '2022-03-17 21:07:18', 'Submit Grading'),
(266, '2018-00281-SJ-0', '2022-03-17 21:07:42', 'Submit Grading'),
(267, '2018-00103-SJ-0', '2022-03-17 21:08:23', 'Add Task'),
(268, '2018-00281-SJ-0', '2022-03-17 21:20:52', 'Logout'),
(269, 'jcostales', '2022-03-17 21:22:11', 'Login'),
(270, 'jcostales', '2022-03-18 01:24:34', 'Uploaded Grade'),
(271, 'jcostales', '2022-03-18 01:26:33', 'Uploaded Grade'),
(272, 'jcostales', '2022-03-18 01:28:16', 'Uploaded Grade'),
(273, 'jcostales', '2022-03-18 01:34:46', 'Uploaded Grade'),
(274, 'jcostales', '2022-03-18 01:38:41', 'Uploaded Grade'),
(275, 'jcostales', '2022-03-18 01:39:19', 'Uploaded Grade'),
(276, 'jcostales', '2022-03-18 01:40:44', 'Uploaded Grade'),
(277, 'jcostales', '2022-03-18 01:45:11', 'Uploaded Grade'),
(278, 'jcostales', '2022-03-18 01:45:58', 'Uploaded Grade'),
(279, 'jcostales', '2022-03-18 01:49:16', 'Uploaded Grade'),
(280, 'jcostales', '2022-03-18 01:50:05', 'Uploaded Grade'),
(281, 'jcostales', '2022-03-18 01:56:39', 'Uploaded Grade'),
(282, 'jcostales', '2022-03-18 01:57:35', 'Uploaded Grade'),
(283, 'jcostales', '2022-03-18 02:01:01', 'Uploaded Grade'),
(284, 'jcostales', '2022-03-18 02:01:35', 'Uploaded Grade'),
(285, 'jcostales', '2022-03-18 02:02:44', 'Uploaded Grade'),
(286, 'jcostales', '2022-03-18 02:04:23', 'Uploaded Grade'),
(287, 'jcostales', '2022-03-18 02:05:41', 'Uploaded Grade'),
(288, 'jcostales', '2022-03-18 02:08:31', 'Uploaded Grade'),
(289, 'jcostales', '2022-03-18 02:11:56', 'Uploaded Grade'),
(290, 'jcostales', '2022-03-18 02:15:16', 'Uploaded Grade'),
(291, 'jcostales', '2022-03-18 02:15:43', 'Uploaded Grade'),
(292, 'jcostales', '2022-03-18 02:25:30', 'Uploaded Grade'),
(293, 'jcostales', '2022-03-18 02:31:06', 'Uploaded Grade'),
(294, 'jcostales', '2022-03-18 08:45:09', 'Logout'),
(295, '2018-00103-SJ-0', '2022-03-18 08:45:30', 'Logout'),
(296, 'jcostales', '2022-03-18 08:46:14', 'Login'),
(297, 'jcostales', '2022-03-18 08:47:54', 'Logout'),
(298, 'jcostales', '2022-03-18 08:48:05', 'Login'),
(299, '2018-00103-SJ-0', '2022-03-18 08:48:35', 'Login'),
(300, 'jcostales', '2022-03-18 08:49:40', 'Logout'),
(301, '2018-00043-SJ-0', '2022-03-18 08:55:07', 'Login'),
(302, '2018-00043-SJ-0', '2022-03-18 08:55:13', 'Logout'),
(303, 'jcostales', '2022-03-18 09:06:27', 'Login'),
(304, 'jcostales', '2022-03-18 09:08:30', 'Uploaded Grade'),
(305, 'jcostales', '2022-03-18 09:24:08', 'Logout'),
(306, '2018-00103-SJ-0', '2022-03-18 09:25:03', 'Login'),
(307, '2018-00103-SJ-0', '2022-03-18 09:55:46', 'Logout'),
(308, 'jcostales', '2022-03-18 09:56:05', 'Login'),
(309, 'jcostales', '2022-03-18 10:12:22', 'Logout'),
(310, '2018-00043-SJ-0', '2022-03-18 10:12:42', 'Login'),
(311, '2018-00043-SJ-0', '2022-03-18 10:15:35', 'Login'),
(312, '2018-00043-SJ-0', '2022-03-18 10:16:17', 'Submit Grading'),
(313, '2018-00043-SJ-0', '2022-03-18 10:17:00', 'Submit Grading'),
(314, '2018-00043-SJ-0', '2022-03-18 10:17:20', 'Logout'),
(315, '2018-00281-SJ-0', '2022-03-18 10:17:36', 'Login'),
(316, '2018-00281-SJ-0', '2022-03-18 10:18:04', 'Submit Grading'),
(317, '2018-00103-SJ-0', '2022-03-18 10:18:29', 'Submit Grading'),
(318, '2018-00103-SJ-0', '2022-03-18 10:18:46', 'Submit Grading'),
(319, '2018-00281-SJ-0', '2022-03-18 10:19:05', 'Submit Grading'),
(320, '2018-00103-SJ-0', '2022-03-18 10:19:28', 'Add Task'),
(321, '2018-00103-SJ-0', '2022-03-18 10:22:04', 'Add Task'),
(322, '2018-00281-SJ-0', '2022-03-18 10:31:51', 'Logout'),
(323, 'jcostales', '2022-03-18 10:37:12', 'Login'),
(324, 'jcostales', '2022-03-18 11:12:39', 'Uploaded Grade'),
(325, 'jcostales', '2022-03-18 11:21:21', 'Uploaded Grade'),
(326, 'jcostales', '2022-03-18 11:22:19', 'Uploaded Grade'),
(327, 'jcostales', '2022-03-18 11:31:35', 'Uploaded Grade'),
(328, 'jcostales', '2022-03-18 11:32:06', 'Uploaded Grade'),
(329, 'jcostales', '2022-03-18 11:33:39', 'Uploaded Grade'),
(330, 'jcostales', '2022-03-18 12:22:12', 'Uploaded Grade'),
(331, 'jcostales', '2022-03-18 12:41:15', 'Uploaded Grade'),
(332, 'jcostales', '2022-03-18 12:47:25', 'Uploaded Grade'),
(333, 'jcostales', '2022-03-18 12:49:08', 'Uploaded Grade'),
(334, 'jcostales', '2022-03-18 13:32:01', 'Uploaded Grade'),
(335, 'jcostales', '2022-03-18 13:33:59', 'Uploaded Grade'),
(336, 'jcostales', '2022-03-18 13:36:36', 'Uploaded Grade'),
(337, 'jcostales', '2022-03-18 13:37:09', 'Uploaded Grade'),
(338, 'jcostales', '2022-03-18 13:37:16', 'Uploaded Grade'),
(339, 'jcostales', '2022-03-18 13:37:33', 'Uploaded Grade'),
(340, 'jcostales', '2022-03-18 13:37:41', 'Uploaded Grade'),
(341, 'jcostales', '2022-03-18 13:41:30', 'Uploaded Grade'),
(342, 'jcostales', '2022-03-18 13:41:48', 'Uploaded Grade'),
(343, 'jcostales', '2022-03-18 13:42:17', 'Uploaded Grade'),
(344, 'jcostales', '2022-03-18 13:42:26', 'Uploaded Grade'),
(345, 'jcostales', '2022-03-18 13:42:32', 'Uploaded Grade'),
(346, 'jcostales', '2022-03-18 14:23:53', 'Post Announcement'),
(347, 'jcostales', '2022-03-18 14:28:57', 'Edit Project'),
(348, 'jcostales', '2022-03-18 14:29:25', 'Edit Project'),
(349, 'jcostales', '2022-03-18 15:03:19', 'Add Subject'),
(350, 'jcostales', '2022-03-18 15:03:19', 'Add Section'),
(351, 'jcostales', '2022-03-18 15:03:19', 'Add Groups'),
(352, 'jcostales', '2022-03-18 15:03:19', 'Add Project'),
(353, 'jcostales', '2022-03-18 15:06:04', 'Add Group Members'),
(354, 'jcostales', '2022-03-18 15:06:09', 'Add Group Members'),
(355, 'jcostales', '2022-03-18 15:06:59', 'Add Task'),
(356, 'jcostales', '2022-03-18 15:15:35', 'Edit Project'),
(357, 'jcostales', '2022-03-18 15:16:13', 'Add Group Member'),
(358, '2018-00103-SJ-0', '2022-03-18 15:29:08', 'Post Comment'),
(359, 'jcostales', '2022-03-18 15:33:59', 'Delete Project'),
(360, 'jcostales', '2022-03-18 15:52:14', 'Add Subject'),
(361, 'jcostales', '2022-03-18 15:52:14', 'Add Section'),
(362, 'jcostales', '2022-03-18 15:52:14', 'Add Groups'),
(363, 'jcostales', '2022-03-18 15:52:14', 'Add Project'),
(364, 'jcostales', '2022-03-18 15:52:31', 'Delete Project'),
(365, '2018-00103-SJ-0', '2022-03-18 16:03:18', 'Logout'),
(366, 'jcostales', '2022-03-18 16:03:36', 'Login'),
(367, 'jcostales', '2022-03-18 16:04:04', 'Logout'),
(368, '2018-00103-SJ-0', '2022-03-18 16:04:16', 'Login'),
(369, '2018-00103-SJ-0', '2022-03-18 16:05:09', 'Logout'),
(370, '2018-00103-SJ-0', '2022-03-18 16:05:15', 'Login'),
(371, 'jcostales', '2022-03-18 16:07:22', 'Logout'),
(372, 'jcostales', '2022-03-18 16:07:39', 'Login'),
(373, '2018-00103-SJ-0', '2022-03-18 16:07:59', 'Logout'),
(374, '2018-00103-SJ-0', '2022-03-18 16:08:08', 'Login'),
(375, '2018-00103-SJ-0', '2022-03-18 16:09:00', 'Logout'),
(376, 'tinatamadie', '2022-03-18 16:15:48', 'New Student Sign-Up'),
(377, 'tinatamadie', '2022-03-18 16:16:53', 'Login'),
(378, 'tinatamadie', '2022-03-18 16:17:28', 'Logout'),
(379, 'jcostales', '2022-03-18 16:46:59', 'Login'),
(380, 'jcostales', '2022-03-18 16:51:53', 'Login'),
(381, '2018-00281-SJ-0', '2022-03-18 17:18:55', 'Login'),
(382, '2018-00281-SJ-0', '2022-03-18 17:29:05', 'Logout'),
(383, 'jcostales', '2022-03-18 17:38:35', 'Login'),
(384, 'jcostales', '2022-03-18 17:42:10', 'Logout'),
(385, 'nkagapay', '2022-03-18 17:57:37', 'New Student Sign-Up'),
(386, 'nkagapay', '2022-03-18 17:59:58', 'Login'),
(387, 'nkagapay', '2022-03-18 18:02:46', 'Logout'),
(388, '2018-00043-SJ-0', '2022-03-18 18:16:11', 'Login'),
(389, '2018-00043-SJ-0', '2022-03-18 18:17:04', 'Add Task'),
(390, '2018-00043-SJ-0', '2022-03-18 18:17:26', 'Add Subtask'),
(391, '2018-00043-SJ-0', '2022-03-18 18:17:52', 'Upload File'),
(392, '2018-00043-SJ-0', '2022-03-18 18:18:17', 'Add Group Members'),
(393, '2018-00043-SJ-0', '2022-03-18 18:21:43', 'Logout'),
(394, 'jcostales', '2022-03-18 18:25:10', 'Login'),
(395, 'jcostales', '2022-03-18 18:27:18', 'Add Subject'),
(396, 'jcostales', '2022-03-18 18:27:29', 'Add-Section'),
(397, 'jcostales', '2022-03-18 18:28:33', 'Add Groups'),
(398, 'jcostales', '2022-03-18 18:28:33', 'Add Subject'),
(399, 'jcostales', '2022-03-18 18:28:33', 'Add Project'),
(400, 'jcostales', '2022-03-18 18:28:43', 'Delete Project'),
(401, '2018-00043-SJ-0', '2022-03-18 18:31:12', 'Login'),
(402, '2018-00043-SJ-0', '2022-03-18 18:33:52', 'Logout'),
(403, 'jcostales', '2022-03-18 18:43:00', 'Login'),
(404, '2018-00103-SJ-0', '2022-03-18 18:45:41', 'Login'),
(405, '2018-00103-SJ-0', '2022-03-18 18:46:29', 'Logout'),
(406, 'jcostales', '2022-03-18 18:46:45', 'Login'),
(407, 'jcostales', '2022-03-18 18:50:32', 'Add Subject'),
(408, 'jcostales', '2022-03-18 18:50:32', 'Add Section'),
(409, 'jcostales', '2022-03-18 18:50:32', 'Add Groups'),
(410, 'jcostales', '2022-03-18 18:50:32', 'Add Project'),
(411, '2018-00281-SJ-0', '2022-03-18 18:52:24', 'Login'),
(412, 'jcostales', '2022-03-18 18:55:49', 'Add Groups'),
(413, 'jcostales', '2022-03-18 18:55:49', 'Add Subject'),
(414, 'jcostales', '2022-03-18 18:55:49', 'Add Project'),
(415, '2018-00281-SJ-0', '2022-03-18 18:56:28', 'Logout'),
(416, 'jcostales', '2022-03-18 18:56:35', 'Add Group Members'),
(417, 'jcostales', '2022-03-18 19:00:03', 'Delete Group'),
(418, 'jcostales', '2022-03-18 19:01:43', 'Add Task'),
(419, 'jcostales', '2022-03-18 19:02:41', 'Logout'),
(420, '2018-00103-SJ-0', '2022-03-18 19:04:54', 'Login'),
(421, '2018-00103-SJ-0', '2022-03-18 19:05:35', 'Add Task'),
(422, '2018-00103-SJ-0', '2022-03-18 19:05:58', 'Add Subtask'),
(423, '2018-00103-SJ-0', '2022-03-18 19:06:09', 'Subtask Status Changed'),
(424, '2018-00103-SJ-0', '2022-03-18 19:07:01', 'Submit Grading'),
(425, '2018-00103-SJ-0', '2022-03-18 19:07:38', 'Logout'),
(426, '2018-00281-SJ-0', '2022-03-18 19:07:54', 'Login'),
(427, '2018-00281-SJ-0', '2022-03-18 19:08:38', 'Submit Grading'),
(428, '2018-00281-SJ-0', '2022-03-18 19:08:52', 'Logout'),
(429, '2018-00103-SJ-0', '2022-03-18 19:09:05', 'Login'),
(430, 'nkagapay', '2022-03-18 19:16:06', 'New Student Sign-Up'),
(431, 'nkagapay', '2022-03-18 19:16:24', 'Login'),
(432, 'nkagapay', '2022-03-18 19:27:31', 'Logout'),
(433, 'jcostales', '2022-03-18 19:27:40', 'Login'),
(434, 'jcostales', '2022-03-18 19:28:29', 'Add Group Members'),
(435, 'jcostales', '2022-03-18 19:28:54', 'Add Group Members'),
(436, 'jcostales', '2022-03-18 19:30:21', 'Logout'),
(437, 'nkagapay', '2022-03-18 19:30:39', 'Login'),
(438, 'jcostales', '2022-03-18 19:51:55', 'Login'),
(439, 'jcostales', '2022-03-18 19:54:14', 'post'),
(440, 'jcostales', '2022-03-18 19:54:33', 'post'),
(441, 'jcostales', '2022-03-18 19:55:46', 'Logout'),
(442, '2018-00043-SJ-0', '2022-03-18 19:56:01', 'Login'),
(443, '2018-00043-SJ-0', '2022-03-18 20:13:51', 'Logout'),
(444, 'jcostales', '2022-03-18 20:14:24', 'Login'),
(445, 'jcostales', '2022-03-18 20:15:12', 'Add Subject'),
(446, 'jcostales', '2022-03-18 20:15:12', 'Add Section'),
(447, 'jcostales', '2022-03-18 20:15:12', 'Add Groups'),
(448, 'jcostales', '2022-03-18 20:15:12', 'Add Project'),
(449, 'jcostales', '2022-03-18 20:15:28', 'Add Project'),
(450, 'jcostales', '2022-03-18 20:15:58', 'Add Group Member'),
(451, 'jcostales', '2022-03-18 20:17:19', 'Post Announcement'),
(452, 'jcostales', '2022-03-18 20:17:30', 'post'),
(453, 'jcostales', '2022-03-18 20:20:00', 'Add Subject'),
(454, 'jcostales', '2022-03-18 20:20:00', 'Add Section'),
(455, 'jcostales', '2022-03-18 20:20:00', 'Add Groups'),
(456, 'jcostales', '2022-03-18 20:20:00', 'Add Project'),
(457, 'jcostales', '2022-03-18 20:26:38', 'Logout'),
(458, 'jcostales', '2022-03-18 20:29:50', 'Login'),
(459, 'jcostales', '2022-03-18 20:38:36', 'Add Project'),
(460, 'jcostales', '2022-03-18 20:44:01', 'Add Group Members'),
(461, 'jcostales', '2022-03-18 20:45:01', 'Delete Group'),
(462, 'jcostales', '2022-03-18 20:48:45', 'Add Subject'),
(463, 'jcostales', '2022-03-18 20:48:54', 'Add-Section'),
(464, 'jcostales', '2022-03-18 21:05:33', 'Logout'),
(465, '2018-00103-SJ-0', '2022-03-18 21:05:45', 'Login'),
(466, '2018-00103-SJ-0', '2022-03-18 21:09:18', 'Added Leader Using Project Code'),
(467, '2018-00103-SJ-0', '2022-03-18 21:09:29', 'Added Member Using Group Code'),
(468, 'jcostales', '2022-03-18 21:32:01', 'Login'),
(469, 'jcostales', '2022-03-18 21:33:00', 'Logout'),
(470, 'jcostales', '2022-03-18 21:33:12', 'Login'),
(471, 'jcostales', '2022-03-18 21:41:38', 'Add Subject'),
(472, 'jcostales', '2022-03-18 21:41:38', 'Add Section'),
(473, 'jcostales', '2022-03-18 21:41:38', 'Add Groups'),
(474, 'jcostales', '2022-03-18 21:41:38', 'Add Project'),
(475, 'jcostales', '2022-03-18 21:42:25', 'Add Subject'),
(476, 'jcostales', '2022-03-18 21:42:25', 'Add Section'),
(477, 'jcostales', '2022-03-18 21:42:25', 'Add Groups'),
(478, 'jcostales', '2022-03-18 21:42:25', 'Add Project'),
(479, 'jcostales', '2022-03-18 21:45:31', 'Add Group Members'),
(480, 'jcostales', '2022-03-18 22:21:06', 'Post Announcement'),
(481, 'jcostales', '2022-03-18 22:22:02', 'Add Group Member'),
(482, 'jcostales', '2022-03-18 22:22:27', 'Add Group Member'),
(483, 'jcostales', '2022-03-18 22:37:06', 'Add Subject'),
(484, 'jcostales', '2022-03-18 22:37:06', 'Add Section'),
(485, 'jcostales', '2022-03-18 22:37:06', 'Add Groups'),
(486, 'jcostales', '2022-03-18 22:37:06', 'Add Project'),
(487, 'jcostales', '2022-03-18 22:37:45', 'Add Subject'),
(488, 'jcostales', '2022-03-18 22:37:45', 'Add Section'),
(489, 'jcostales', '2022-03-18 22:37:45', 'Add Groups'),
(490, 'jcostales', '2022-03-18 22:37:45', 'Add Project'),
(491, 'jcostales', '2022-03-18 22:38:02', 'Add Group Member'),
(492, 'jcostales', '2022-03-18 22:38:14', 'Add Group Member'),
(493, 'jcostales', '2022-03-18 22:50:27', 'Upload File'),
(494, 'jcostales', '2022-03-18 22:59:11', 'Logout'),
(495, '2018-00103-SJ-0', '2022-03-18 22:59:24', 'Login'),
(496, '2018-00103-SJ-0', '2022-03-18 23:07:57', 'Add Task'),
(497, '2018-00103-SJ-0', '2022-03-18 23:09:15', 'Add Task'),
(498, '2018-00103-SJ-0', '2022-03-18 23:09:56', 'Add Task'),
(499, '2018-00103-SJ-0', '2022-03-18 23:10:19', 'Add Task'),
(500, '2018-00103-SJ-0', '2022-03-18 23:10:29', 'Task Status Changed'),
(501, '2018-00103-SJ-0', '2022-03-18 23:10:40', 'Task Status Changed'),
(502, '2018-00103-SJ-0', '2022-03-18 23:10:56', 'Task Status Changed'),
(503, '2018-00103-SJ-0', '2022-03-18 23:11:40', 'Add Task'),
(504, '2018-00103-SJ-0', '2022-03-18 23:12:30', 'Add Subtask'),
(505, '2018-00103-SJ-0', '2022-03-18 23:12:44', 'Delete Subtask'),
(506, '2018-00103-SJ-0', '2022-03-18 23:13:14', 'Add Subtask'),
(507, '2018-00103-SJ-0', '2022-03-18 23:13:37', 'Add Subtask'),
(508, '2018-00103-SJ-0', '2022-03-18 23:13:46', 'Subtask Status Changed'),
(509, '2018-00103-SJ-0', '2022-03-18 23:14:02', 'Task Status Changed'),
(510, '2018-00103-SJ-0', '2022-03-18 23:20:43', 'Add Group Member'),
(511, '2018-00103-SJ-0', '2022-03-18 23:23:25', 'Add Task'),
(512, '2018-00103-SJ-0', '2022-03-18 23:23:36', 'Task Status Changed'),
(513, '2018-00103-SJ-0', '2022-03-18 23:23:54', 'Logout'),
(514, '2018-00043-SJ-0', '2022-03-18 23:24:02', 'Login'),
(515, '2018-00043-SJ-0', '2022-03-18 23:24:35', 'Submit Grading'),
(516, '2018-00043-SJ-0', '2022-03-18 23:24:42', 'Logout'),
(517, '2018-00103-SJ-0', '2022-03-18 23:24:53', 'Login'),
(518, '2018-00103-SJ-0', '2022-03-18 23:26:02', 'Submit Grading'),
(519, '2018-00103-SJ-0', '2022-03-18 23:46:12', 'Add Group Members'),
(520, 'tinatamadie', '2022-03-18 23:49:21', 'Logout'),
(521, '2018-00043-SJ-0', '2022-03-18 23:49:28', 'Login'),
(522, '2018-00103-SJ-0', '2022-03-18 23:57:24', 'Add Task'),
(523, '2018-00103-SJ-0', '2022-03-18 23:57:31', 'Task Status Changed'),
(524, '2018-00103-SJ-0', '2022-03-18 23:57:48', 'Submit Grading'),
(525, '2018-00043-SJ-0', '2022-03-18 23:58:53', 'Logout'),
(526, '2018-00393-SJ-0', '2022-03-18 23:59:58', 'Login'),
(527, '2018-00393-SJ-0', '2022-03-19 00:01:43', 'Submit Grading'),
(528, '2018-00103-SJ-0', '2022-03-19 00:02:14', 'Add Task'),
(529, '2018-00103-SJ-0', '2022-03-19 00:09:11', 'Logout'),
(530, 'jcostales', '2022-03-19 00:09:24', 'Login'),
(531, 'jcostales', '2022-03-19 00:10:32', 'Add Subject'),
(532, 'jcostales', '2022-03-19 00:10:32', 'Add Section'),
(533, 'jcostales', '2022-03-19 00:10:32', 'Add Groups'),
(534, 'jcostales', '2022-03-19 00:10:32', 'Add Project'),
(535, 'jcostales', '2022-03-19 00:11:06', 'Add Subject'),
(536, 'jcostales', '2022-03-19 00:11:06', 'Add Section'),
(537, 'jcostales', '2022-03-19 00:11:06', 'Add Groups'),
(538, 'jcostales', '2022-03-19 00:11:06', 'Add Project'),
(539, 'jcostales', '2022-03-19 00:11:37', 'Add Subject'),
(540, 'jcostales', '2022-03-19 00:11:37', 'Add Section'),
(541, 'jcostales', '2022-03-19 00:11:37', 'Add Groups'),
(542, 'jcostales', '2022-03-19 00:11:37', 'Add Project'),
(543, 'jcostales', '2022-03-19 00:11:48', 'Add Group Members'),
(544, 'jcostales', '2022-03-19 00:12:01', 'Add Group Members'),
(545, 'jcostales', '2022-03-19 00:12:10', 'Add Group Members'),
(546, 'jcostales', '2022-03-19 00:12:18', 'Logout'),
(547, '2018-00103-SJ-0', '2022-03-19 00:12:28', 'Login'),
(548, '2018-00103-SJ-0', '2022-03-19 00:13:33', 'Add Task'),
(549, '2018-00103-SJ-0', '2022-03-19 00:13:58', 'Add Task'),
(550, '2018-00103-SJ-0', '2022-03-19 00:14:15', 'Add Task'),
(551, '2018-00103-SJ-0', '2022-03-19 00:14:23', 'Task Status Changed'),
(552, '2018-00103-SJ-0', '2022-03-19 00:14:29', 'Task Status Changed'),
(553, '2018-00103-SJ-0', '2022-03-19 00:14:38', 'Task Status Changed'),
(554, '2018-00103-SJ-0', '2022-03-19 00:15:17', 'Add Task'),
(555, '2018-00103-SJ-0', '2022-03-19 00:15:25', 'Task Status Changed'),
(556, '2018-00103-SJ-0', '2022-03-19 00:16:05', 'Add Task'),
(557, '2018-00103-SJ-0', '2022-03-19 00:16:12', 'Task Status Changed'),
(558, '2018-00103-SJ-0', '2022-03-19 00:16:20', 'Logout'),
(559, '2018-00393-SJ-0', '2022-03-19 00:16:34', 'Logout'),
(560, '2018-00043-SJ-0', '2022-03-19 00:16:47', 'Login'),
(561, '2018-00043-SJ-0', '2022-03-19 00:17:15', 'Submit Grading'),
(562, '2018-00043-SJ-0', '2022-03-19 00:17:33', 'Submit Grading'),
(563, '2018-00043-SJ-0', '2022-03-19 00:17:46', 'Logout'),
(564, '2018-00043-SJ-0', '2022-03-19 00:17:55', 'Login'),
(565, '2018-00043-SJ-0', '2022-03-19 00:18:58', 'Submit Grading'),
(566, '2018-00043-SJ-0', '2022-03-19 00:19:17', 'Submit Grading'),
(567, '2018-00043-SJ-0', '2022-03-19 00:19:23', 'Logout'),
(568, '2018-00281-SJ-0', '2022-03-19 00:19:30', 'Login'),
(569, '2018-00281-SJ-0', '2022-03-19 00:20:00', 'Submit Grading'),
(570, '2018-00281-SJ-0', '2022-03-19 00:20:18', 'Submit Grading'),
(571, '2018-00281-SJ-0', '2022-03-19 00:20:53', 'Submit Grading'),
(572, '2018-00281-SJ-0', '2022-03-19 00:21:12', 'Submit Grading'),
(573, '2018-00281-SJ-0', '2022-03-19 00:21:34', 'Logout'),
(574, '2018-00103-SJ-0', '2022-03-19 00:21:43', 'Login'),
(575, '2018-00103-SJ-0', '2022-03-19 00:22:05', 'Submit Grading'),
(576, '2018-00103-SJ-0', '2022-03-19 00:22:23', 'Submit Grading'),
(577, '2018-00103-SJ-0', '2022-03-19 00:26:25', 'Add Task'),
(578, '2018-00103-SJ-0', '2022-03-19 00:26:59', 'Submit Grading'),
(579, '2018-00103-SJ-0', '2022-03-19 00:27:16', 'Submit Grading'),
(580, '2018-00103-SJ-0', '2022-03-19 00:28:30', 'Logout'),
(581, '2018-00043-SJ-0', '2022-03-19 00:28:39', 'Login'),
(582, '2018-00043-SJ-0', '2022-03-19 00:29:08', 'Submit Grading'),
(583, '2018-00043-SJ-0', '2022-03-19 00:29:28', 'Submit Grading'),
(584, '2018-00043-SJ-0', '2022-03-19 00:29:36', 'Logout'),
(585, '2018-00281-SJ-0', '2022-03-19 00:29:43', 'Login'),
(586, '2018-00281-SJ-0', '2022-03-19 00:30:13', 'Submit Grading'),
(587, '2018-00281-SJ-0', '2022-03-19 00:31:12', 'Submit Grading'),
(588, '2018-00281-SJ-0', '2022-03-19 00:31:26', 'Logout'),
(589, '2018-00103-SJ-0', '2022-03-19 00:31:34', 'Login'),
(590, '2018-00103-SJ-0', '2022-03-19 00:32:13', 'Add Task'),
(591, 'jcostales', '2022-03-19 00:32:32', 'Login'),
(592, 'jcostales', '2022-03-19 00:32:56', 'Login'),
(593, '2018-00103-SJ-0', '2022-03-19 00:35:21', 'Submit Grading'),
(594, '2018-00103-SJ-0', '2022-03-19 00:35:39', 'Submit Grading'),
(595, '2018-00103-SJ-0', '2022-03-19 00:36:04', 'Add Task'),
(596, 'jcostales', '2022-03-19 00:36:28', 'Uploaded Grade'),
(597, 'jcostales', '2022-03-19 00:37:05', 'Uploaded Grade'),
(598, '2018-00103-SJ-0', '2022-03-19 00:39:50', 'Submit Grading');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `projid` int(11) NOT NULL,
  `grpid` int(11) NOT NULL,
  `grpno` int(11) NOT NULL,
  `createdby` varchar(1000) NOT NULL,
  `leader` varchar(1000) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `text` varchar(2000) NOT NULL,
  `user` varchar(1000) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `course`, `section`, `subject`, `projid`, `grpid`, `grpno`, `createdby`, `leader`, `title`, `text`, `user`, `datetime`) VALUES
(1, 3, 7, 'Computer Programming 2', 1, 0, 0, '', '', 'Sample Announcement', 'Announce to all.', 'jcostales', '2022-03-19 06:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `projid` int(11) NOT NULL,
  `grpid` int(11) NOT NULL,
  `grpno` int(11) NOT NULL,
  `createdby` varchar(1000) NOT NULL,
  `leader` varchar(1000) NOT NULL,
  `postid` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `user` varchar(1000) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `id` int(11) NOT NULL,
  `projid` int(11) NOT NULL,
  `uploadedby` varchar(1000) NOT NULL,
  `filename` varchar(500) NOT NULL,
  `filesize` varchar(255) NOT NULL,
  `uploaded_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` date NOT NULL,
  `end_event` date NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fileupload`
--

CREATE TABLE `fileupload` (
  `id` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `projid` int(11) NOT NULL,
  `grpno` int(11) NOT NULL,
  `grpid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `subtaskid` int(11) NOT NULL,
  `leader` varchar(1000) NOT NULL,
  `uploadedby` varchar(1000) NOT NULL,
  `updatedby` varchar(1000) NOT NULL,
  `filename` varchar(500) NOT NULL,
  `filesize` varchar(255) NOT NULL,
  `uploaded_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fileupload`
--

INSERT INTO `fileupload` (`id`, `course`, `section`, `subject`, `projid`, `grpno`, `grpid`, `taskid`, `subtaskid`, `leader`, `uploadedby`, `updatedby`, `filename`, `filesize`, `uploaded_at`) VALUES
(1, 3, 7, 'Computer Programming 2', 1, 0, 0, 0, 0, '', 'jcostales', '', 'Jefferson Matthew Uy.pdf', '305.505', '2022-03-19 06:50:26'),
(2, 3, 4, 'Purposive Communication', 3, 1, 8, 0, 0, '2018-00103-SJ-0', '2018-00103-SJ-0', '', 'DFD.pdf', '33.137', '2022-03-19 07:23:46'),
(3, 3, 7, 'Mathematics in the Modern World', 4, 1, 11, 0, 0, '2018-00103-SJ-0', '2018-00103-SJ-0', '', 'Doc1.docx', '49.311', '2022-03-19 08:02:08'),
(4, 3, 6, 'Individual/Dual/Combative Sports', 5, 1, 13, 0, 0, '2018-00103-SJ-0', '2018-00103-SJ-0', '', 'Revised-Final Case Study IT ELECTIVE 3 (1) (1).docx', '68.881', '2022-03-19 08:26:18'),
(5, 4, 29, 'Rhythmic Activities', 7, 1, 15, 0, 0, '2018-00103-SJ-0', '2018-00103-SJ-0', '', 'Revised-Final Case Study IT ELECTIVE 3 (1) (1).docx', '68.881', '2022-03-19 08:32:04'),
(6, 5, 40, 'Understanding the Self', 6, 1, 14, 0, 0, '2018-00103-SJ-0', '2018-00103-SJ-0', '', 'JJJAM-TaskTalk-Final-Project.xlsx', '797.81', '2022-03-19 08:35:57');

-- --------------------------------------------------------

--
-- Table structure for table `gradedproject`
--

CREATE TABLE `gradedproject` (
  `id` int(11) NOT NULL,
  `projid` int(11) NOT NULL,
  `grpid` int(11) NOT NULL,
  `grpno` int(11) NOT NULL,
  `projsubid` varchar(1000) NOT NULL,
  `member` varchar(1000) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `gradetype` varchar(1000) NOT NULL,
  `uploadedby` varchar(1000) NOT NULL,
  `uploaded_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gradedproject`
--

INSERT INTO `gradedproject` (`id`, `projid`, `grpid`, `grpno`, `projsubid`, `member`, `grade`, `gradetype`, `uploadedby`, `uploaded_at`) VALUES
(1, 5, 13, 1, '2', '2018-00103-SJ-0', '100', 'Individual', 'jcostales', '2022-03-19 08:36:27'),
(2, 5, 13, 1, '2', '2018-00043-SJ-0', '99', 'Individual', 'jcostales', '2022-03-19 08:36:27'),
(3, 5, 13, 1, '2', '2018-00281-SJ-0', '98', 'Individual', 'jcostales', '2022-03-19 08:36:28'),
(4, 6, 14, 1, '4', 'Group', '100', 'Group', 'jcostales', '2022-03-19 08:36:43'),
(5, 7, 15, 1, '3', '2018-00103-SJ-0', '100', 'Both', 'jcostales', '2022-03-19 08:37:05'),
(6, 7, 15, 1, '3', '2018-00043-SJ-0', '98', 'Both', 'jcostales', '2022-03-19 08:37:05'),
(7, 7, 15, 1, '3', '2018-00281-SJ-0', '97', 'Both', 'jcostales', '2022-03-19 08:37:05'),
(8, 7, 15, 1, '3', 'Group', '94', 'Both', 'jcostales', '2022-03-19 08:37:05');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `idGroups` int(11) NOT NULL,
  `course` varchar(1000) NOT NULL,
  `section` varchar(1000) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `projid` int(11) NOT NULL,
  `groupno` int(11) NOT NULL,
  `leader` varchar(1000) NOT NULL,
  `members` varchar(1000) NOT NULL,
  `projstat` varchar(1000) NOT NULL,
  `grpcode` varchar(20) NOT NULL,
  `createdby` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`idGroups`, `course`, `section`, `subject`, `projid`, `groupno`, `leader`, `members`, `projstat`, `grpcode`, `createdby`, `created_at`) VALUES
(1, '3', '7', 'Computer Programming 2', 1, 1, '2018-00103-SJ-0', '2018-00065-SJ-0,2018-00387-SJ-0,2018-00153-SJ-0', 'On-Going', '3ca2ea73', 'jcostales', '2022-03-18 21:41:38'),
(2, '3', '7', 'Computer Programming 2', 1, 2, '2018-00043-SJ-0', '2018-00048-SJ-0,2018-00331-SJ-0', 'On-Going', '3ca2ea74', 'jcostales', '2022-03-18 21:41:38'),
(3, '3', '7', 'Computer Programming 2', 1, 3, '2018-00393-SJ-0', '', 'On-Going', '3ca2ea75', 'jcostales', '2022-03-18 21:41:38'),
(4, '3', '7', 'Computer Programming 2', 1, 4, '2018-00281-SJ-0', '', 'On-Going', '3ca2ea76', 'jcostales', '2022-03-18 21:41:38'),
(5, '1', '15', 'Accounting Principles', 2, 1, '2018-00259-SJ-0', '2018-00103-SJ-0,2018-00043-SJ-0', 'On-Going', 'f20e33e3', 'jcostales', '2022-03-18 21:42:25'),
(6, '1', '15', 'Accounting Principles', 2, 2, '2018-00048-SJ-0', '', 'On-Going', 'f20e33e4', 'jcostales', '2022-03-18 21:42:25'),
(7, '1', '15', 'Accounting Principles', 2, 3, '2018-00331-SJ-0', '', 'On-Going', 'f20e33e5', 'jcostales', '2022-03-18 21:42:25'),
(8, '3', '4', 'Purposive Communication', 3, 1, '2018-00103-SJ-0', '2018-00043-SJ-0', 'On-Going', '27e1ba19', 'jcostales', '2022-03-18 22:37:06'),
(9, '3', '4', 'Purposive Communication', 3, 2, '2018-00043-SJ-0', '', 'On-Going', '27e1ba20', 'jcostales', '2022-03-18 22:37:06'),
(10, '3', '4', 'Purposive Communication', 3, 3, '2018-00393-SJ-0', '', 'On-Going', '27e1ba21', 'jcostales', '2022-03-18 22:37:06'),
(11, '3', '7', 'Mathematics in the Modern World', 4, 1, '2018-00103-SJ-0', '2018-00393-SJ-0', 'On-Going', '24111c78', 'jcostales', '2022-03-18 22:37:45'),
(12, '3', '7', 'Mathematics in the Modern World', 4, 2, '2018-00043-SJ-0', '2018-00281-SJ-0', 'On-Going', '24111c79', 'jcostales', '2022-03-18 22:37:45'),
(13, '3', '6', 'Individual/Dual/Combative Sports', 5, 1, '2018-00103-SJ-0', '2018-00043-SJ-0,2018-00281-SJ-0', 'Done', '1769f731', 'jcostales', '2022-03-19 00:10:31'),
(14, '5', '40', 'Understanding the Self', 6, 1, '2018-00103-SJ-0', '2018-00043-SJ-0,2018-00281-SJ-0', '', 'e78ac282', 'jcostales', '2022-03-19 00:11:06'),
(15, '4', '29', 'Rhythmic Activities', 7, 1, '2018-00103-SJ-0', '2018-00043-SJ-0,2018-00281-SJ-0', 'Done', '7c58b7b5', 'jcostales', '2022-03-19 00:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(1, 1, '2022-03-18 21:33:12', 'no'),
(2, 7, '2022-03-18 22:59:24', 'no'),
(3, 8, '2022-03-18 23:24:02', 'no'),
(4, 7, '2022-03-18 23:24:53', 'no'),
(5, 8, '2022-03-18 23:49:28', 'no'),
(6, 9, '2022-03-18 23:59:58', 'no'),
(7, 1, '2022-03-19 00:09:24', 'no'),
(8, 7, '2022-03-19 00:12:28', 'no'),
(9, 8, '2022-03-19 00:16:47', 'no'),
(10, 8, '2022-03-19 00:17:54', 'no'),
(11, 10, '2022-03-19 00:19:30', 'no'),
(12, 7, '2022-03-19 00:21:43', 'no'),
(13, 8, '2022-03-19 00:28:39', 'no'),
(14, 10, '2022-03-19 00:29:43', 'no'),
(15, 7, '2022-03-19 00:31:34', 'no'),
(16, 1, '2022-03-19 00:32:32', 'no'),
(17, 1, '2022-03-19 00:32:56', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `projid` int(11) NOT NULL,
  `grpid` int(11) NOT NULL,
  `grpno` int(11) NOT NULL,
  `uidUsers` varchar(50) NOT NULL,
  `leader` varchar(1000) NOT NULL,
  `members` varchar(1000) NOT NULL,
  `createdby` varchar(1000) NOT NULL,
  `action` text NOT NULL,
  `comment` text NOT NULL,
  `status` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `course`, `section`, `subject`, `projid`, `grpid`, `grpno`, `uidUsers`, `leader`, `members`, `createdby`, `action`, `comment`, `status`, `date`) VALUES
(1, 3, 7, 'Computer Programming 2', 1, 1, 1, 'jcostales', '2018-00103-SJ-0', '', '', 'Add Project', '', 'unread', '0000-00-00 00:00:00'),
(2, 3, 7, 'Computer Programming 2', 1, 2, 2, 'jcostales', '2018-00043-SJ-0', '', '', 'Add Project', '', 'unread', '0000-00-00 00:00:00'),
(3, 3, 7, 'Computer Programming 2', 1, 3, 3, 'jcostales', '2018-00393-SJ-0', '', '', 'Add Project', '', 'unread', '0000-00-00 00:00:00'),
(4, 3, 7, 'Computer Programming 2', 1, 4, 4, 'jcostales', '2018-00281-SJ-0', '', '', 'Add Project', '', 'unread', '0000-00-00 00:00:00'),
(5, 1, 15, 'Accounting Principles', 2, 5, 1, 'jcostales', '2018-00259-SJ-0', '', '', 'Add Project', '', 'unread', '0000-00-00 00:00:00'),
(6, 1, 15, 'Accounting Principles', 2, 6, 2, 'jcostales', '2018-00048-SJ-0', '', '', 'Add Project', '', 'unread', '0000-00-00 00:00:00'),
(7, 1, 15, 'Accounting Principles', 2, 7, 3, 'jcostales', '2018-00331-SJ-0', '', '', 'Add Project', '', 'unread', '0000-00-00 00:00:00'),
(8, 3, 7, 'Computer Programming 2', 1, 2, 2, 'jcostales', '2018-00043-SJ-0', '2018-00048-SJ-0', '', 'Add Group Member', '', 'unread', '0000-00-00 00:00:00'),
(9, 3, 7, 'Computer Programming 2', 1, 2, 2, 'jcostales', '2018-00043-SJ-0', '2018-00331-SJ-0', '', 'Add Group Member', '', 'unread', '0000-00-00 00:00:00'),
(10, 1, 15, 'Accounting Principles', 2, 5, 1, 'jcostales', '2018-00259-SJ-0', '2018-00103-SJ-0', '', 'Add Group Member', '', 'unread', '0000-00-00 00:00:00'),
(11, 1, 15, 'Accounting Principles', 2, 5, 1, 'jcostales', '2018-00259-SJ-0', '2018-00043-SJ-0', '', 'Add Group Member', '', 'unread', '0000-00-00 00:00:00'),
(12, 3, 4, 'Purposive Communication', 3, 8, 1, 'jcostales', '2018-00103-SJ-0', '', '', 'Add Project', '', 'unread', '0000-00-00 00:00:00'),
(13, 3, 4, 'Purposive Communication', 3, 9, 2, 'jcostales', '2018-00043-SJ-0', '', '', 'Add Project', '', 'unread', '0000-00-00 00:00:00'),
(14, 3, 4, 'Purposive Communication', 3, 10, 3, 'jcostales', '2018-00393-SJ-0', '', '', 'Add Project', '', 'unread', '0000-00-00 00:00:00'),
(15, 3, 7, 'Mathematics in the Modern World', 4, 11, 1, 'jcostales', '2018-00103-SJ-0', '', '', 'Add Project', '', 'unread', '0000-00-00 00:00:00'),
(16, 3, 7, 'Mathematics in the Modern World', 4, 12, 2, 'jcostales', '2018-00043-SJ-0', '', '', 'Add Project', '', 'unread', '0000-00-00 00:00:00'),
(17, 3, 7, 'Mathematics in the Modern World', 4, 11, 1, 'jcostales', '2018-00103-SJ-0', '2018-00393-SJ-0', '', 'Add Group Member', '', 'unread', '0000-00-00 00:00:00'),
(18, 3, 7, 'Mathematics in the Modern World', 4, 12, 2, 'jcostales', '2018-00043-SJ-0', '2018-00281-SJ-0', '', 'Add Group Member', '', 'unread', '0000-00-00 00:00:00'),
(19, 3, 4, 'Purposive Communication', 3, 8, 1, '2018-00103-SJ-0', '2018-00103-SJ-0', '2018-00043-SJ-0', '', 'Add Group Member', '', 'unread', '0000-00-00 00:00:00'),
(20, 3, 4, 'Purposive Communication', 3, 8, 1, '2018-00103-SJ-0', '2018-00103-SJ-0', '2018-00393-SJ-0', '', 'Add Group Members', '', 'unread', '0000-00-00 00:00:00'),
(21, 3, 6, 'Individual/Dual/Combative Sports', 5, 13, 1, 'jcostales', '2018-00103-SJ-0', '', '', 'Add Project', '', 'unread', '0000-00-00 00:00:00'),
(22, 5, 40, 'Understanding the Self', 6, 14, 1, 'jcostales', '2018-00103-SJ-0', '', '', 'Add Project', '', 'unread', '0000-00-00 00:00:00'),
(23, 4, 29, 'Rhythmic Activities', 7, 15, 1, 'jcostales', '2018-00103-SJ-0', '', '', 'Add Project', '', 'unread', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `passreset`
--

CREATE TABLE `passreset` (
  `passResetID` int(11) NOT NULL,
  `passResetEmail` text NOT NULL,
  `passResetSelector` text NOT NULL,
  `passResetToken` longtext NOT NULL,
  `passResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `peer_grading`
--

CREATE TABLE `peer_grading` (
  `id` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `projid` int(11) NOT NULL,
  `grpid` int(11) NOT NULL,
  `grpno` int(11) NOT NULL,
  `createdby` varchar(1000) NOT NULL,
  `leader` varchar(1000) NOT NULL,
  `user` varchar(1000) NOT NULL,
  `member` varchar(1000) NOT NULL,
  `q1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `q4` int(11) NOT NULL,
  `q5` int(11) NOT NULL,
  `q6` int(11) NOT NULL,
  `q7` int(11) NOT NULL,
  `q8` int(11) NOT NULL,
  `q9` int(11) NOT NULL,
  `q10` int(11) NOT NULL,
  `total` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peer_grading`
--

INSERT INTO `peer_grading` (`id`, `course`, `section`, `subject`, `projid`, `grpid`, `grpno`, `createdby`, `leader`, `user`, `member`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `total`, `created_at`) VALUES
(1, 3, 4, 'Purposive Communication', 3, 8, 1, 'jcostales', '2018-00103-SJ-0', '2018-00043-SJ-0', '2018-00103-SJ-0', 5, 5, 5, 4, 4, 5, 5, 4, 4, 5, '92', '2022-03-19 07:24:35'),
(3, 3, 7, 'Mathematics in the Modern World', 4, 11, 1, 'jcostales', '2018-00103-SJ-0', '2018-00103-SJ-0', '2018-00393-SJ-0', 5, 5, 4, 5, 5, 5, 5, 5, 4, 5, '96', '2022-03-19 07:57:48'),
(4, 3, 7, 'Mathematics in the Modern World', 4, 11, 1, 'jcostales', '2018-00103-SJ-0', '2018-00393-SJ-0', '2018-00103-SJ-0', 5, 4, 5, 5, 4, 5, 5, 4, 5, 5, '94', '2022-03-19 08:01:42'),
(5, 3, 6, 'Individual/Dual/Combative Sports', 5, 13, 1, 'jcostales', '2018-00103-SJ-0', '2018-00043-SJ-0', '2018-00103-SJ-0', 5, 5, 5, 4, 4, 5, 5, 4, 4, 5, '92', '2022-03-19 08:17:15'),
(6, 3, 6, 'Individual/Dual/Combative Sports', 5, 13, 1, 'jcostales', '2018-00103-SJ-0', '2018-00043-SJ-0', '2018-00281-SJ-0', 5, 5, 5, 4, 5, 5, 5, 4, 4, 4, '92', '2022-03-19 08:17:33'),
(7, 5, 40, 'Understanding the Self', 6, 14, 1, 'jcostales', '2018-00103-SJ-0', '2018-00043-SJ-0', '2018-00103-SJ-0', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '100', '2022-03-19 08:18:58'),
(8, 5, 40, 'Understanding the Self', 6, 14, 1, 'jcostales', '2018-00103-SJ-0', '2018-00043-SJ-0', '2018-00281-SJ-0', 5, 5, 4, 3, 4, 5, 5, 4, 3, 5, '86', '2022-03-19 08:19:16'),
(9, 3, 6, 'Individual/Dual/Combative Sports', 5, 13, 1, 'jcostales', '2018-00103-SJ-0', '2018-00281-SJ-0', '2018-00103-SJ-0', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '100', '2022-03-19 08:20:00'),
(10, 3, 6, 'Individual/Dual/Combative Sports', 5, 13, 1, 'jcostales', '2018-00103-SJ-0', '2018-00281-SJ-0', '2018-00043-SJ-0', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '100', '2022-03-19 08:20:18'),
(11, 5, 40, 'Understanding the Self', 6, 14, 1, 'jcostales', '2018-00103-SJ-0', '2018-00281-SJ-0', '2018-00103-SJ-0', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '100', '2022-03-19 08:20:53'),
(12, 5, 40, 'Understanding the Self', 6, 14, 1, 'jcostales', '2018-00103-SJ-0', '2018-00281-SJ-0', '2018-00043-SJ-0', 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, '96', '2022-03-19 08:21:12'),
(13, 3, 6, 'Individual/Dual/Combative Sports', 5, 13, 1, 'jcostales', '2018-00103-SJ-0', '2018-00103-SJ-0', '2018-00043-SJ-0', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '100', '2022-03-19 08:22:05'),
(14, 3, 6, 'Individual/Dual/Combative Sports', 5, 13, 1, 'jcostales', '2018-00103-SJ-0', '2018-00103-SJ-0', '2018-00281-SJ-0', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '100', '2022-03-19 08:22:23'),
(15, 4, 29, 'Rhythmic Activities', 7, 15, 1, 'jcostales', '2018-00103-SJ-0', '2018-00103-SJ-0', '2018-00043-SJ-0', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '100', '2022-03-19 08:26:59'),
(16, 4, 29, 'Rhythmic Activities', 7, 15, 1, 'jcostales', '2018-00103-SJ-0', '2018-00103-SJ-0', '2018-00281-SJ-0', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '100', '2022-03-19 08:27:16'),
(17, 4, 29, 'Rhythmic Activities', 7, 15, 1, 'jcostales', '2018-00103-SJ-0', '2018-00043-SJ-0', '2018-00103-SJ-0', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '100', '2022-03-19 08:29:08'),
(18, 4, 29, 'Rhythmic Activities', 7, 15, 1, 'jcostales', '2018-00103-SJ-0', '2018-00043-SJ-0', '2018-00281-SJ-0', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '100', '2022-03-19 08:29:28'),
(19, 4, 29, 'Rhythmic Activities', 7, 15, 1, 'jcostales', '2018-00103-SJ-0', '2018-00281-SJ-0', '2018-00103-SJ-0', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '100', '2022-03-19 08:30:13'),
(20, 4, 29, 'Rhythmic Activities', 7, 15, 1, 'jcostales', '2018-00103-SJ-0', '2018-00281-SJ-0', '2018-00043-SJ-0', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '100', '2022-03-19 08:31:12'),
(21, 5, 40, 'Understanding the Self', 6, 14, 1, 'jcostales', '2018-00103-SJ-0', '2018-00103-SJ-0', '2018-00043-SJ-0', 5, 5, 5, 5, 5, 4, 4, 4, 4, 4, '90', '2022-03-19 08:35:21'),
(22, 5, 40, 'Understanding the Self', 6, 14, 1, 'jcostales', '2018-00103-SJ-0', '2018-00103-SJ-0', '2018-00281-SJ-0', 5, 5, 5, 4, 4, 4, 4, 4, 5, 5, '90', '2022-03-19 08:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `projname` varchar(50) NOT NULL,
  `subj_name` varchar(1000) NOT NULL,
  `course` varchar(1000) NOT NULL,
  `section` varchar(1000) NOT NULL,
  `leader` varchar(1000) NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `projdesc` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `duedate` date NOT NULL,
  `score` int(20) NOT NULL,
  `criteria` varchar(100) NOT NULL,
  `filesize` varchar(1000) NOT NULL,
  `projstat` varchar(50) NOT NULL,
  `projcode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `projname`, `subj_name`, `course`, `section`, `leader`, `createdby`, `projdesc`, `datetime`, `duedate`, `score`, `criteria`, `filesize`, `projstat`, `projcode`) VALUES
(1, 'Collaboration 1', 'Computer Programming 2', '3', '7', '2018-00103-SJ-0,2018-00043-SJ-0,2018-00393-SJ-0,2018-00281-SJ-0', 'jcostales', 'Sample Collaboration 1', '2022-03-19 05:41:38', '2022-03-23', 100, 'Criteria1.png', '588.579', 'On-Going', '3bda37'),
(2, 'Collaboration 2', 'Accounting Principles', '1', '15', '2018-00259-SJ-0,2018-00048-SJ-0,2018-00331-SJ-0', 'jcostales', 'Sample Collaboration 2', '2022-03-19 05:42:25', '2022-03-16', 100, 'Criteria1.png', '588.579', 'On-Going', '5bcd73'),
(3, 'Collaboration 3', 'Purposive Communication', '3', '4', '2018-00103-SJ-0,2018-00043-SJ-0,2018-00393-SJ-0', 'jcostales', 'Sample Collaboration 3', '2022-03-19 06:37:06', '2022-03-18', 100, 'Criteria1.png', '588.579', 'On-Going', 'c61bef'),
(4, 'Collaboration 4', 'Mathematics in the Modern World', '3', '7', '2018-00103-SJ-0,2018-00043-SJ-0', 'jcostales', 'Sample Collaboration 4', '2022-03-19 06:37:45', '2022-03-24', 100, 'Criteria1.png', '588.579', 'On-Going', '1628e7'),
(5, 'Collaboration 5', 'Individual/Dual/Combative Sports', '3', '6', '2018-00103-SJ-0', 'jcostales', 'Sample Collaboration 5', '2022-03-19 08:10:31', '2022-03-25', 100, 'Criteria1.png', '588.579', 'On-Going', '106c30'),
(6, 'Collaboration 6', 'Understanding the Self', '5', '40', '2018-00103-SJ-0', 'jcostales', 'Sample Collaboration 6', '2022-03-19 08:11:06', '2022-03-26', 100, 'Criteria1.png', '588.579', 'On-Going', '76a18d'),
(7, 'Collaboration 7', 'Rhythmic Activities', '4', '29', '2018-00103-SJ-0', 'jcostales', 'Sample Collaboration 7', '2022-03-19 08:11:37', '2022-03-26', 100, 'Criteria1.png', '588.579', 'On-Going', '249034');

-- --------------------------------------------------------

--
-- Table structure for table `projsubmit`
--

CREATE TABLE `projsubmit` (
  `id` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `projid` int(11) NOT NULL,
  `grpid` int(11) NOT NULL,
  `grpno` int(11) NOT NULL,
  `submitted_to` varchar(1000) NOT NULL,
  `leader` varchar(1000) NOT NULL,
  `members` varchar(1000) NOT NULL,
  `filename` varchar(1000) NOT NULL,
  `completed_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projsubmit`
--

INSERT INTO `projsubmit` (`id`, `course`, `section`, `subject`, `projid`, `grpid`, `grpno`, `submitted_to`, `leader`, `members`, `filename`, `completed_at`, `created_at`) VALUES
(1, 3, 7, 'Mathematics in the Modern World', 4, 11, 1, 'jcostales', '2018-00103-SJ-0', '2018-00393-SJ-0', 'Doc1.docx', '2022-03-19 00:02:14', '2022-03-19 08:02:14'),
(2, 3, 6, 'Individual/Dual/Combative Sports', 5, 13, 1, 'jcostales', '2018-00103-SJ-0', '2018-00043-SJ-0,2018-00281-SJ-0', 'Revised-Final Case Study IT ELECTIVE 3 (1) (1).docx', '2022-03-19 00:26:25', '2022-03-19 08:26:25'),
(3, 4, 29, 'Rhythmic Activities', 7, 15, 1, 'jcostales', '2018-00103-SJ-0', '2018-00043-SJ-0,2018-00281-SJ-0', 'Revised-Final Case Study IT ELECTIVE 3 (1) (1).docx', '2022-03-19 00:32:13', '2022-03-19 08:32:13'),
(4, 5, 40, 'Understanding the Self', 6, 14, 1, 'jcostales', '2018-00103-SJ-0', '2018-00043-SJ-0,2018-00281-SJ-0', 'JJJAM-TaskTalk-Final-Project.xlsx', '2022-03-19 00:36:04', '2022-03-19 08:36:04');

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
(7, 'BSIT 4-1', 3),
(8, 'BSIT 4-2', 3),
(9, 'BSA 1-1', 1),
(10, 'BSA 1-2', 1),
(11, 'BSA 2-1', 1),
(12, 'BSA 2-2', 1),
(13, 'BSA 3-1', 1),
(14, 'BSA 3-2', 1),
(15, 'BSA 4-1', 1),
(16, 'BSA 4-2', 1),
(17, 'BSE 1-1', 2),
(18, 'BSE 1-2', 2),
(19, 'BSE 2-1', 2),
(20, 'BSE 2-2', 2),
(21, 'BSE 3-1', 2),
(22, 'BSE 3-2', 2),
(23, 'BSE 4-1', 2),
(24, 'BSE 4-2', 2),
(25, 'BSEDEN 1-1', 4),
(26, 'BSEDEN 1-2', 4),
(27, 'BSEDEN 2-1', 4),
(28, 'BSEDEN 2-2', 4),
(29, 'BSEDEN 3-1', 4),
(30, 'BSEDEN 3-2', 4),
(31, 'BSEDEN 4-1', 4),
(32, 'BSEDEN 4-2', 4),
(33, 'BSBA-FM 1-1', 5),
(34, 'BSBA-FM 1-2', 5),
(35, 'BSBA-FM 2-1', 5),
(36, 'BSBA-FM 2-2', 5),
(37, 'BSBA-FM 2-3', 5),
(38, 'BSBA-FM 3-1', 5),
(39, 'BSBA-FM 3-2', 5),
(40, 'BSBA-FM 3-3', 5),
(41, 'BSBA-FM 4-1', 5),
(42, 'BSBA-FM 4-2', 5),
(43, 'BSBA-FM 4-3', 5),
(44, 'BSHM 1-1', 6),
(45, 'BSHM 1-2', 6),
(46, 'BSHM 2-1', 6),
(47, 'BSHM 2-2', 6),
(48, 'BSHM 3-1', 6),
(49, 'BSHM 3-2', 6),
(50, 'BSHM 4-1', 6),
(51, 'BSHM 4-2', 6),
(52, 'BSP 1-1', 7),
(53, 'BSP 2-1', 7);

-- --------------------------------------------------------

--
-- Table structure for table `section_add`
--

CREATE TABLE `section_add` (
  `idSections` int(11) NOT NULL,
  `course` varchar(1000) NOT NULL,
  `section` varchar(1000) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `uidUsers` varchar(50) NOT NULL,
  `projid` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section_add`
--

INSERT INTO `section_add` (`idSections`, `course`, `section`, `subject`, `uidUsers`, `projid`, `created_at`) VALUES
(1, '3', '7', 'Computer Programming 2', 'jcostales', 1, '2022-03-19 05:41:38'),
(2, '1', '15', 'Accounting Principles', 'jcostales', 2, '2022-03-19 05:42:25'),
(3, '3', '4', 'Purposive Communication', 'jcostales', 3, '2022-03-19 06:37:06'),
(4, '3', '7', 'Mathematics in the Modern World', 'jcostales', 4, '2022-03-19 06:37:45'),
(5, '3', '6', 'Individual/Dual/Combative Sports', 'jcostales', 5, '2022-03-19 08:10:32'),
(6, '5', '40', 'Understanding the Self', 'jcostales', 6, '2022-03-19 08:11:06'),
(7, '4', '29', 'Rhythmic Activities', 'jcostales', 7, '2022-03-19 08:11:37');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `subj_add`
--

CREATE TABLE `subj_add` (
  `idSubjects` int(11) NOT NULL,
  `course` varchar(1000) NOT NULL,
  `section` varchar(1000) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `uidUsers` varchar(50) NOT NULL,
  `projid` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subj_add`
--

INSERT INTO `subj_add` (`idSubjects`, `course`, `section`, `subject`, `uidUsers`, `projid`, `datetime`) VALUES
(1, '', '', 'Computer Programming 2', 'jcostales', 1, '2022-03-19 05:41:38'),
(2, '', '', 'Accounting Principles', 'jcostales', 2, '2022-03-19 05:42:25'),
(3, '', '', 'Purposive Communication', 'jcostales', 3, '2022-03-19 06:37:06'),
(4, '', '', 'Mathematics in the Modern World', 'jcostales', 4, '2022-03-19 06:37:45'),
(5, '', '', 'Individual/Dual/Combative Sports', 'jcostales', 5, '2022-03-19 08:10:31'),
(6, '', '', 'Understanding the Self', 'jcostales', 6, '2022-03-19 08:11:06'),
(7, '', '', 'Rhythmic Activities', 'jcostales', 7, '2022-03-19 08:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `subtasks`
--

CREATE TABLE `subtasks` (
  `id` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `subj_name` varchar(1000) NOT NULL,
  `projid` int(11) NOT NULL,
  `grpid` int(11) NOT NULL,
  `grpno` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `taskname` varchar(50) NOT NULL,
  `subtaskname` varchar(50) NOT NULL,
  `taskdesc` varchar(50) DEFAULT NULL,
  `taskmember` varchar(50) NOT NULL,
  `tduration` date NOT NULL,
  `tend` date NOT NULL,
  `leader` varchar(1000) NOT NULL,
  `createdby` varchar(1000) NOT NULL,
  `status` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subtasks`
--

INSERT INTO `subtasks` (`id`, `course`, `section`, `subj_name`, `projid`, `grpid`, `grpno`, `taskid`, `taskname`, `subtaskname`, `taskdesc`, `taskmember`, `tduration`, `tend`, `leader`, `createdby`, `status`, `created_at`) VALUES
(2, 3, 7, 'Computer Programming 2', 1, 1, 1, 3, '', 'Subtask 1', '<p>Sample Subtask 1</p>', '2018-00065-SJ-0', '2022-03-20', '2022-03-22', '2018-00103-SJ-0', '2018-00103-SJ-0', 'Done', '2022-03-19 07:13:14'),
(3, 3, 7, 'Computer Programming 2', 1, 1, 1, 3, '', 'Subtask 2', '<p>Sample Subtask 2</p>', '2018-00387-SJ-0', '2022-03-23', '2022-03-25', '2018-00103-SJ-0', '2018-00103-SJ-0', 'On-Going', '2022-03-19 07:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `course` varchar(1000) NOT NULL,
  `section` varchar(1000) NOT NULL,
  `subj_name` varchar(1000) NOT NULL,
  `projid` int(11) NOT NULL,
  `grpid` int(11) NOT NULL,
  `grpno` int(11) NOT NULL,
  `createdby` varchar(1000) NOT NULL,
  `leader` varchar(1000) NOT NULL,
  `taskname` varchar(50) NOT NULL,
  `taskdesc` varchar(50) DEFAULT NULL,
  `taskmember` varchar(50) NOT NULL,
  `tduration` date NOT NULL,
  `tend` date NOT NULL,
  `taskstat` varchar(50) DEFAULT NULL,
  `statdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `course`, `section`, `subj_name`, `projid`, `grpid`, `grpno`, `createdby`, `leader`, `taskname`, `taskdesc`, `taskmember`, `tduration`, `tend`, `taskstat`, `statdate`, `created_at`) VALUES
(1, '3', '7', 'Computer Programming 2', 1, 1, 1, '2018-00103-SJ-0', '2018-00103-SJ-0', 'Task 1', '<p>Sample task 1</p>', '2018-00065-SJ-0', '2022-03-22', '2022-03-20', 'Done', '2022-03-18 23:10:56', '2022-03-18 23:07:57'),
(2, '3', '7', 'Computer Programming 2', 1, 1, 1, '2018-00103-SJ-0', '2018-00103-SJ-0', 'Task 2', '<p>Sample task 2</p>', '2018-00387-SJ-0', '2022-03-26', '2022-03-18', 'Pending', '2022-03-18 23:09:15', '2022-03-18 23:09:15'),
(3, '3', '7', 'Computer Programming 2', 1, 1, 1, '2018-00103-SJ-0', '2018-00103-SJ-0', 'Task 3', '<p>Sample task 3</p>', '2018-00153-SJ-0', '2022-03-31', '2022-03-23', 'On-Going', '2022-03-18 23:12:30', '2022-03-18 23:09:56'),
(4, '3', '7', 'Computer Programming 2', 1, 1, 1, '2018-00103-SJ-0', '2018-00103-SJ-0', 'Task 4', '<p>Sample Task 4</p>', '2018-00103-SJ-0', '2022-03-23', '2022-03-21', 'On-Hold', '2022-03-18 23:14:02', '2022-03-18 23:10:19'),
(5, '3', '7', 'Computer Programming 2', 1, 1, 1, '2018-00103-SJ-0', '2018-00103-SJ-0', 'Task 5', '<p>Sample Task 5</p>', '2018-00065-SJ-0', '2022-03-30', '2022-03-21', 'Pending', '2022-03-18 23:11:40', '2022-03-18 23:11:40'),
(6, '3', '4', 'Purposive Communication', 3, 8, 1, '2018-00103-SJ-0', '2018-00103-SJ-0', 'Task 1', '<p>Sample 1</p>', '2018-00043-SJ-0', '2022-04-02', '2022-03-26', 'Done', '2022-03-18 23:23:36', '2022-03-18 23:23:25'),
(7, '3', '7', 'Mathematics in the Modern World', 4, 11, 1, '2018-00103-SJ-0', '2018-00103-SJ-0', 'Task 1', '<p>Sample Task 1</p>', '2018-00393-SJ-0', '2022-03-26', '2022-03-25', 'Done', '2022-03-18 23:57:31', '2022-03-18 23:57:24'),
(8, '3', '6', 'Individual/Dual/Combative Sports', 5, 13, 1, '2018-00103-SJ-0', '2018-00103-SJ-0', 'Task 1', '<p>Sample Task 1</p>', '2018-00043-SJ-0', '2022-03-26', '2022-03-25', 'Done', '2022-03-19 00:14:23', '2022-03-19 00:13:33'),
(9, '3', '6', 'Individual/Dual/Combative Sports', 5, 13, 1, '2018-00103-SJ-0', '2018-00103-SJ-0', 'Task 2', '<p>Sample Task 2</p>', '2018-00043-SJ-0', '2022-03-24', '2022-03-20', 'Done', '2022-03-19 00:14:29', '2022-03-19 00:13:58'),
(10, '3', '6', 'Individual/Dual/Combative Sports', 5, 13, 1, '2018-00103-SJ-0', '2018-00103-SJ-0', 'Task 3', '<p>Sample</p>', '2018-00043-SJ-0', '2022-04-01', '2022-03-26', 'Done', '2022-03-19 00:14:38', '2022-03-19 00:14:15'),
(11, '5', '40', 'Understanding the Self', 6, 14, 1, '2018-00103-SJ-0', '2018-00103-SJ-0', 'Task 1', '<p>Sample Task 1</p>', '2018-00043-SJ-0', '2022-03-24', '2022-03-22', 'Done', '2022-03-19 00:15:25', '2022-03-19 00:15:16'),
(12, '4', '29', 'Rhythmic Activities', 7, 15, 1, '2018-00103-SJ-0', '2018-00103-SJ-0', 'Task 1', '<p>Sample task 1</p>', '2018-00281-SJ-0', '2022-03-25', '2022-03-23', 'Done', '2022-03-19 00:16:12', '2022-03-19 00:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUsers` int(11) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  `gender` char(1) NOT NULL,
  `headline` varchar(100) NOT NULL,
  `bio` varchar(500) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `userImg` varchar(500) NOT NULL,
  `userType` varchar(100) NOT NULL,
  `course` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUsers`, `f_name`, `l_name`, `uidUsers`, `emailUsers`, `pwdUsers`, `gender`, `headline`, `bio`, `phone`, `address`, `userImg`, `userType`, `course`, `section`, `created_at`) VALUES
(1, 'Jefferson', 'Costales', 'jcostales', 'jeffcostales@gmail.com', '$2y$10$//ppecWllud0KJLqzYzwZubH8OQtTwGS3ah/S7L4RNPonHqxLQVom', 'M', 'Database Administration Professor', 'Hello everyone! Feel free to message me on this account if you have questions for your project!', '', '', '623508ad72b930.16182524.png', 'faculty', 0, 0, '2022-03-19 02:14:36'),
(2, 'Jefferson', 'Costales', 'jcostales', 'jeffcostales@gmail.com', '$2y$10$//ppecWllud0KJLqzYzwZubH8OQtTwGS3ah/S7L4RNPonHqxLQVom', 'M', 'Database Administration Professor', 'Hello everyone! Feel free to message me on this account if you have questions for your project!', '', '', '623508ad72b930.16182524.png', 'faculty', 0, 0, '2021-07-31 03:58:49'),
(3, 'Elias', 'Austria', 'eaustria', 'eliaustria123@gmail.com', '$2y$10$GAiJIxzDUxWqmcsUV.ZAo.xVgorSXcaYVHUfLnp2aoPCmDriJV7.a', 'm', 'I love IT', 'Hello everyone! I am a professor at PUP San Juan! Please feel free to email me for project questions', '', '', '61045cf43f04d7.57497312.png', 'faculty', 0, 0, '2021-07-31 04:11:32'),
(4, 'Dong Lemuel', 'Damole', 'dldamole', 'dongdamole@gmail.com', '$2y$10$TnDNWRUG/1NdU3V4bWH2AeBBZdaQwss1KYy/SYBdoETBjTHMnoA6m', 'M', 'Drakky', '', '', '', '6104802066b086.86871023.png', 'faculty', 0, 0, '2021-07-31 06:41:36'),
(5, 'Rizaa', 'Valdez', 'rvaldez', 'zzzs@gmail.com', '$2y$10$8qm3LVVOPpesTFaPRiP4g.W.OIjh3lyVdOtfLVAxiygYN.vMQJ/zy', 'F', '', '', '', '', 'default.png', 'faculty', 0, 0, '2021-08-20 02:40:54'),
(6, 'John Dustin', 'Santos', 'jdsantos', 'jds@gmail.com', '$2y$10$7dPn8WJr0zONFeX7e9UTUehhYEWcJV3DtgVSJd92oWZlwF5TwnysK', 'M', '', '', '', '', 'default.png', 'faculty', 0, 0, '2021-08-20 02:42:14'),
(7, 'Jefferson', 'Uy', '2018-00103-SJ-0', 'jeffersonuy2413@gmail.com', '$2y$10$o8ySxzc/k3eI9Yu8TAFf5eb7aCrSyI8ipYYKx42WV0OpThxdxf/Wm', 'M', 'TrickyPanda (coder, gamer)', 'Please follow my youtube channel and facebook page TrickyPanda, Thank you so much!', '', '', '6235107184d545.52676475.png', 'student', 3, 5, '2021-07-31 04:17:07'),
(8, 'Madelaine', 'Mercado', '2018-00043-SJ-0', 'mrcdmdln@gmail.com', '$2y$10$AsZlp.kdcXm4c1wOxD3rDOS9xKy3/Hx7Dsb7Vj02SK8tot/atKIvG', 'F', 'PUPSJ Student', 'Hello! I am responsible and willing to help in projects!', '', '', 'default.png', 'student', 3, 5, '2021-07-31 04:18:50'),
(9, 'Jose Enrico', 'Leuterio', '2018-00393-SJ-0', 'dave.leuteriopogi@gmail.com', '$2y$10$3dbJpXarTzWJRlU2g9hI2u.mUwYzeCVHjD3n6O5M2ZOQ87E9l2d0S', 'M', 'PUP San Juan Students', 'Ready to help in projects!', '', '', '61045efd671d36.31198158.png', 'student', 3, 5, '2021-07-31 04:20:13'),
(10, 'Jerusa Eden', 'Dionco', '2018-00281-SJ-0', 'dnc.jerusa@gmail.com', '$2y$10$i6Gc1sJaEsVo.RpcHEw9luJ31vb38WRdvSXGiuBqLwCuXUmguOpFW', 'F', 'Graphic Designer', 'I am mostly helpful in coding and i also enjoy graphic design!', '', '', '61045f3ab55ea4.10326471.png', 'student', 3, 5, '2021-07-31 04:21:14'),
(11, 'Adrian Ace', 'Carbon', '2018-00065-SJ-0', 'acecarbon006@gmail.com', '$2y$10$AtLWXxHqWBNkNz/7dMnU/uPHi7nb4IMA7C0w2bGZ.0.Z6.Zos4qX.', 'M', 'Hi Im Ace Carbon!', 'Projects. Projects. Projects.', '', '', '61045f796243f6.20515607.png', 'student', 3, 5, '2021-07-31 04:22:17'),
(12, 'Vincent', 'Bucao', '2018-00387-SJ-0', 'vincentbucao6@gmail.com', '$2y$10$KGgdtznGgEDrzZMriJXQp.OkhY/XoWVAvpN5iycyRdjgY3xUP5N3i', 'M', 'Future It Programerist', 'Tamang tulog lang muna', '', '', '61045fc2843048.84449416.png', 'student', 3, 5, '2021-07-31 04:23:30'),
(13, 'Ron Allan', 'Casingal', '2018-00153-SJ-0', 'ronronpog@gmail.com', '$2y$10$OUTTBcs9uS6BOrlvler.1uoceviYT3OFiseMwkYt5UnOtyRieJeOK', 'M', 'Mr PUP San Juan', 'Mr. PUP and IT programerist.', '', '', '61046026003808.06967738.png', 'student', 3, 5, '2021-07-31 04:25:10'),
(14, 'Jythro', 'Siapno', '2018-00034-SJ-0', 'jythrosiapno.9@gmail.com', '$2y$10$7HxBkWbRZsw8LaCHAyoQyugy8SEKPbM/o46JSXG8fuoe94JnFEIHW', 'M', 'Hi ;)', 'Follow me on tinder hehe', '', '', '610460c2015655.87419352.png', 'student', 3, 5, '2021-07-31 04:27:46'),
(15, 'Guian', 'Cosmo', '2018-00272-SJ-0', 'cosmoguian@gmail.com', '$2y$10$ixI8/YXqexVs/0AZY1G/z.7DYKLzUwo/qhCYbhpoZISdzWMgkM1Ui', 'M', 'PUP Pogi', 'Crush ng bayan', '', '', '610461331f50b3.02163394.png', 'student', 3, 5, '2021-07-31 04:29:39'),
(16, 'Joseph Matthew', 'Pada', '2018-00259-SJ-0', 'josephpada1@gmail.com', '$2y$10$VFoW6wtr25nog5L/Pf2t3.CspaayWbLEfTatR/08T5fZ.onodyCd2', 'M', 'Werking Girl', 'Libre ko kayo samgyup!', '', '', '6104616e66e6e0.23172203.png', 'student', 3, 5, '2021-07-31 04:30:38'),
(17, 'Shiela', 'Forbes', '2018-00048-SJ-0', 'shiela.forbes@gmail.com', '$2y$10$o8ySxzc/k3eI9Yu8TAFf5eb7aCrSyI8ipYYKx42WV0OpThxdxf/Wm', 'F', '', '', '', '', 'default.png', 'student', 3, 5, '2021-10-03 03:17:59'),
(18, 'Arnel', 'Evangelio', '2018-00331-SJ-0', 'arnelevangelio@gmail.com', '$2y$10$aqSiZwAwfhtSw0A6yr.CHusMtztGY0xnVVaTpvKjcz91sLP6vhdt6', 'M', '', '', '', '', 'default.png', 'student', 3, 5, '2021-10-03 03:18:53'),
(19, 'Kin', 'Vargas', '2018-00365-SJ-0', 'vkin76429@gmail.com', '$2y$10$DgsVV0x3bF9yIncOToMwMOZK10RpvEexpIUfMKjRY3oJehL2kUw1i', 'M', '', '', '', '', 'default.png', 'student', 3, 5, '2021-10-03 03:19:35'),
(20, 'Ronen', 'Santos', '2018-00015-SJ-0', 'santosronen@gmail.com', '$2y$10$QKfuxB9pajkTRUKufNNwIuxsQa94hWFSkSuTxQrUcA7pkBO7NhCl2', 'M', '', '', '', '', 'default.png', 'student', 3, 5, '2021-10-03 03:20:18'),
(21, 'Vincent', 'Llego', '2018-00013-SJ-0', 'proudycatllego11@gmail.com', '$2y$10$lUFKqH80KSLuedGp7ApDd.7ORDAprBmLKaKg6jeWzrySyZrBIsgYG', 'M', '', '', '', '', 'default.png', 'student', 3, 5, '2021-10-03 03:20:53'),
(22, 'Justine', 'Bautista', '2018-00063-SJ-0', 'justinebautista47@gmail.com', '$2y$10$//ppecWllud0KJLqzYzwZubH8OQtTwGS3ah/S7L4RNPonHqxLQVom', 'M', 'PUPSJ Student', 'Hello everyone! Feel free to message me on this account!', '', '', 'default.png', 'student', 3, 1, '2021-07-31 03:58:49'),
(23, 'Elventh', 'Buenventura', '2018-00040-SJ-0', 'belventh@gmail.com', '$2y$10$//ppecWllud0KJLqzYzwZubH8OQtTwGS3ah/S7L4RNPonHqxLQVom', 'M', 'PUPSJ Student', 'Hello everyone! Feel free to message me on this account!', '', '', 'default.png', 'student', 3, 1, '2021-07-31 03:58:49'),
(24, 'Raymond Dave', 'Cruz', '2018-00388-SJ-0', 'davecruz0900@gmail.com', '$2y$10$//ppecWllud0KJLqzYzwZubH8OQtTwGS3ah/S7L4RNPonHqxLQVom', 'M', 'PUPSJ Student', 'Hello everyone! Feel free to message me on this account!', '', '', 'default.png', 'student', 3, 1, '2021-07-31 03:58:49'),
(25, 'Jamill Lowell', 'Garlit', '2018-00247-SJ-0', 'lowellgarlit@gmail.com', '$2y$10$//ppecWllud0KJLqzYzwZubH8OQtTwGS3ah/S7L4RNPonHqxLQVom', 'M', 'PUPSJ Student', 'Hello everyone! Feel free to message me on this account!', '', '', 'default.png', 'student', 3, 1, '2021-07-31 03:58:49'),
(26, 'John Miguel', 'Gravines', '2018-00041-SJ-0', 'johnmiguelgravines17@gmail.com', '$2y$10$//ppecWllud0KJLqzYzwZubH8OQtTwGS3ah/S7L4RNPonHqxLQVom', 'M', 'PUPSJ Student', 'Hello everyone! Feel free to message me on this account!', '', '', 'default.png', 'student', 3, 1, '2021-07-31 03:58:49'),
(27, 'Joel Angelo', 'Infante', '2018-00182-SJ-0', 'joelangeloinfante@gmail.com', '$2y$10$//ppecWllud0KJLqzYzwZubH8OQtTwGS3ah/S7L4RNPonHqxLQVom', 'M', 'PUPSJ Student', 'Hello everyone! Feel free to message me on this account!', '', '', 'default.png', 'student', 3, 1, '2021-07-31 03:58:49'),
(28, 'Romeo', 'Javier Jr.', '2018-00073-SJ-0', 'babsforthe3@gmail.com', '$2y$10$//ppecWllud0KJLqzYzwZubH8OQtTwGS3ah/S7L4RNPonHqxLQVom', 'M', 'PUPSJ Student', 'Hello everyone! Feel free to message me on this account!', '', '', 'default.png', 'student', 3, 1, '2021-07-31 03:58:49'),
(29, 'Justin Wayne', 'Li', '2018-00033-SJ-0', 'lijustin35@gmail.com', '$2y$10$//ppecWllud0KJLqzYzwZubH8OQtTwGS3ah/S7L4RNPonHqxLQVom', 'M', 'PUPSJ Student', 'Hello everyone! Feel free to message me on this account!', '', '', 'default.png', 'student', 3, 1, '2021-07-31 03:58:49'),
(30, 'Harley', 'Llevado', '2018-00122-SJ-0', 'harleyllevado2017@gmail.com', '$2y$10$//ppecWllud0KJLqzYzwZubH8OQtTwGS3ah/S7L4RNPonHqxLQVom', 'M', 'PUPSJ Student', 'Hello everyone! Feel free to message me on this account!', '', '', 'default.png', 'student', 3, 1, '2021-07-31 03:58:49'),
(31, 'John Paul', 'Madrid', '2018-00037-SJ-0', 'johnpaulmadrid.m@gmail.com', '$2y$10$//ppecWllud0KJLqzYzwZubH8OQtTwGS3ah/S7L4RNPonHqxLQVom', 'M', 'PUPSJ Student', 'Hello everyone! Feel free to message me on this account!', '', '', 'default.png', 'student', 3, 1, '2021-07-31 03:58:49'),
(32, 'Rayne', 'Mallari', '2018-00012-SJ-0', 'blurredlines0508@gmail.com', '$2y$10$//ppecWllud0KJLqzYzwZubH8OQtTwGS3ah/S7L4RNPonHqxLQVom', 'M', 'PUPSJ Student', 'Hello everyone! Feel free to message me on this account!', '', '', 'default.png', 'student', 3, 1, '2021-07-31 03:58:49'),
(33, 'Patrick', 'Padolina', '2018-00279-SJ-0', 'patrickpaul2626@gmail.com', '$2y$10$//ppecWllud0KJLqzYzwZubH8OQtTwGS3ah/S7L4RNPonHqxLQVom', 'M', 'PUPSJ Student', 'Hello everyone! Feel free to message me on this account!', '', '', 'default.png', 'student', 3, 1, '2021-07-31 03:58:49'),
(34, 'Kenneth James', 'Palisoc', '2018-00260-SJ-0', 'kennethjamespalisoc@gmail.com', '$2y$10$//ppecWllud0KJLqzYzwZubH8OQtTwGS3ah/S7L4RNPonHqxLQVom', 'M', 'PUPSJ Student', 'Hello everyone! Feel free to message me on this account!', '', '', 'default.png', 'student', 3, 1, '2021-07-31 03:58:49'),
(35, 'Jerald', 'Relucio', '2018-00201-SJ-0', 'jerald.relucio026@gmail.com', '$2y$10$//ppecWllud0KJLqzYzwZubH8OQtTwGS3ah/S7L4RNPonHqxLQVom', 'M', 'PUPSJ Student', 'Hello everyone! Feel free to message me on this account!', '', '', 'default.png', 'student', 3, 1, '2021-07-31 03:58:49'),
(36, 'Raphael Rance', 'Reyeslao', '2018-00170-SJ-0', 'rcube1999@gmail.com', '$2y$10$//ppecWllud0KJLqzYzwZubH8OQtTwGS3ah/S7L4RNPonHqxLQVom', 'M', 'PUPSJ Student', 'Hello everyone! Feel free to message me on this account!', '', '', 'default.png', 'student', 3, 1, '2021-07-31 03:58:49'),
(37, 'John Paul', 'Sia', '2018-00183-SJ-0', 'johnpaulsia4@gmail.com', '$2y$10$//ppecWllud0KJLqzYzwZubH8OQtTwGS3ah/S7L4RNPonHqxLQVom', 'M', 'PUPSJ Student', 'Hello everyone! Feel free to message me on this account!', '', '', 'default.png', 'student', 3, 1, '2021-07-31 03:58:49'),
(38, 'Natasha Kaye', 'Agapay', 'nkagapay', 'natasha.kagapay@gmail.com', '$2y$10$guknInMDgnKVofWMCjCjz.bNJWJBj8fZMK7GsCQ5/uxUHWgVdDkey', 'F', '', '', '', '', '6234da76152f60.14625867.jpg', 'student', 3, 3, '2022-03-19 03:16:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`activity_log_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`idCourse`);

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fileupload`
--
ALTER TABLE `fileupload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gradedproject`
--
ALTER TABLE `gradedproject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`idGroups`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passreset`
--
ALTER TABLE `passreset`
  ADD PRIMARY KEY (`passResetID`);

--
-- Indexes for table `peer_grading`
--
ALTER TABLE `peer_grading`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`idSection`),
  ADD KEY `section_ibfk_1` (`department`);

--
-- Indexes for table `section_add`
--
ALTER TABLE `section_add`
  ADD PRIMARY KEY (`idSections`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `subj_add`
--
ALTER TABLE `subj_add`
  ADD PRIMARY KEY (`idSubjects`);

--
-- Indexes for table `subtasks`
--
ALTER TABLE `subtasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=599;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `idCourse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fileupload`
--
ALTER TABLE `fileupload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gradedproject`
--
ALTER TABLE `gradedproject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `idGroups` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `passreset`
--
ALTER TABLE `passreset`
  MODIFY `passResetID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peer_grading`
--
ALTER TABLE `peer_grading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `projsubmit`
--
ALTER TABLE `projsubmit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `idSection` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `section_add`
--
ALTER TABLE `section_add`
  MODIFY `idSections` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `subj_add`
--
ALTER TABLE `subj_add`
  MODIFY `idSubjects` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subtasks`
--
ALTER TABLE `subtasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
