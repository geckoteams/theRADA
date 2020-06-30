-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 18, 2020 at 05:33 PM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `therada`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answer_id` int(11) NOT NULL,
  `que_id` int(11) NOT NULL,
  `chield_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `comment` text NOT NULL,
  `age` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `capa_red_extras_answers`
--

CREATE TABLE `capa_red_extras_answers` (
  `extra_ans_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `main_ques_id` int(11) NOT NULL,
  `extra_qus_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `extra_comment` text NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `capa_red_extras_answers`
--

INSERT INTO `capa_red_extras_answers` (`extra_ans_id`, `user_id`, `main_ques_id`, `extra_qus_id`, `child_id`, `answer`, `extra_comment`, `creation_date`) VALUES
(1, 60, 1, 1, 18, 'yes2', '', '2019-12-06 14:49:48'),
(2, 60, 1, 2, 18, 'no', '', '2019-12-06 14:50:09'),
(3, 60, 2, 4, 18, 'yes', '', '2019-12-06 14:50:20'),
(4, 60, 2, 6, 18, 'yes', '', '2019-12-06 14:50:36'),
(5, 60, 9, 18, 18, 'maybe', '', '2019-12-06 14:54:06'),
(6, 60, 11, 23, 18, 'maybe', '', '2019-12-06 14:55:53'),
(7, 60, 12, 24, 18, 'yes', '', '2019-12-06 14:57:20'),
(8, 60, 12, 25, 18, 'yes2', '', '2019-12-06 14:57:28'),
(9, 60, 14, 27, 18, 'maybe', '', '2019-12-06 14:57:47'),
(10, 60, 14, 28, 18, 'maybe', '', '2019-12-06 14:57:54'),
(11, 60, 14, 29, 18, 'yes', '', '2019-12-06 14:57:58'),
(12, 60, 15, 30, 18, 'yes', '', '2019-12-06 14:58:11'),
(13, 60, 15, 31, 18, 'yes', '', '2019-12-06 14:58:21'),
(14, 60, 23, 50, 18, 'maybe', '', '2019-12-06 14:59:04'),
(15, 60, 24, 51, 18, 'maybe', '', '2019-12-06 14:59:10'),
(16, 60, 24, 52, 18, 'maybe', '', '2019-12-06 14:59:14'),
(17, 60, 24, 53, 18, 'maybe', '', '2019-12-06 14:59:15'),
(18, 60, 24, 54, 18, 'maybe', '', '2019-12-06 14:59:17'),
(19, 49, 1, 1, 13, 'maybe', '', '2020-03-02 10:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `capa_red_main_answers`
--

CREATE TABLE `capa_red_main_answers` (
  `ans_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `clinician_id` int(11) NOT NULL,
  `clinician_comment` text NOT NULL,
  `clinician_diagnosis` varchar(255) NOT NULL,
  `parent_comment` text NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `capa_red_main_answers`
--

INSERT INTO `capa_red_main_answers` (`ans_id`, `child_id`, `user_id`, `question_id`, `answer`, `clinician_id`, `clinician_comment`, `clinician_diagnosis`, `parent_comment`, `creation_date`) VALUES
(1, 1, 4, 1, 'no', 0, '', '', '', '2017-11-03 14:52:36'),
(2, 1, 4, 2, 'no', 0, '', '', 'Worried', '2017-11-03 14:52:37'),
(3, 1, 4, 3, 'no', 0, '', '', '', '2017-10-24 23:33:49'),
(4, 1, 4, 4, 'no', 0, '', '', '', '2017-10-24 23:33:51'),
(5, 1, 4, 5, 'no', 0, '', '', '', '2017-10-24 23:33:52'),
(6, 1, 4, 6, 'no', 0, '', '', '', '2017-10-24 23:33:54'),
(7, 1, 4, 7, 'no', 0, '', '', '', '2017-10-24 23:33:56'),
(8, 1, 4, 8, 'no', 0, '', '', 'Will this crash?', '2017-11-03 14:52:45'),
(9, 1, 4, 9, 'no', 0, '', '', '', '2017-10-24 23:34:49'),
(10, 1, 4, 10, 'no', 0, '', '', '', '2017-10-24 23:34:50'),
(11, 1, 4, 11, 'yes2', 0, '', '', 'Yes', '2017-11-03 14:53:01'),
(12, 1, 4, 12, 'yes2', 0, '', '', 'Alot', '2017-11-03 14:54:13'),
(13, 1, 4, 13, 'yes2', 0, '', '', '', '2017-11-03 14:54:48'),
(14, 1, 4, 14, 'yes2', 0, '', '', '', '2017-11-03 14:54:55'),
(15, 1, 4, 15, 'yes2', 0, '', '', '', '2017-11-03 14:55:04'),
(16, 1, 4, 16, 'yes2', 0, '', '', '', '2017-11-03 14:55:18'),
(17, 1, 4, 17, 'yes2', 0, '', '', '', '2017-11-03 14:55:24'),
(18, 1, 4, 18, 'yes2', 0, '', '', '', '2017-11-03 14:55:30'),
(19, 1, 4, 19, 'yes2', 0, '', '', '', '2017-11-03 14:55:36'),
(20, 1, 4, 20, 'yes2', 0, '', '', '', '2017-11-03 14:55:55'),
(21, 1, 4, 21, 'no', 0, '', '', '', '2017-10-24 23:35:07'),
(22, 1, 4, 22, 'no', 0, '', '', '', '2017-10-24 23:35:14'),
(23, 1, 4, 23, 'no', 0, '', '', '', '2017-10-24 23:35:15'),
(24, 1, 4, 24, 'no', 0, '', '', '', '2017-10-24 23:35:16'),
(25, 1, 4, 25, 'no', 0, '', '', '', '2017-10-24 23:35:18'),
(26, 1, 4, 26, 'no', 0, '', '', '', '2017-10-24 23:35:20'),
(27, 1, 4, 27, 'no', 0, '', '', '', '2017-10-24 23:35:22'),
(28, 1, 4, 28, 'no', 0, '', '', '', '2017-10-24 23:35:25'),
(29, 1, 4, 29, 'no', 0, '', '', '', '2017-10-24 23:35:26'),
(30, 1, 4, 30, 'no', 0, '', '', '', '2017-10-24 23:35:28'),
(31, 1, 5, 1, 'maybe', 0, '', '', 'This is a worryddd', '2017-10-28 14:15:32'),
(32, 1, 5, 2, 'maybe', 0, '', '', '', '2017-10-28 12:44:20'),
(33, 1, 5, 3, 'yes2', 0, '', '', '', '2017-10-28 12:44:55'),
(34, 2, 9, 1, 'yes2', 0, '', '', 'a little', '2017-11-30 16:43:32'),
(35, 2, 9, 2, 'yes', 0, '', '', '', '2017-11-12 22:05:40'),
(36, 2, 9, 3, 'yes2', 0, '', '', 'Not good', '2017-11-28 11:18:22'),
(37, 2, 9, 4, 'yes2', 0, '', '', 'This is a problem', '2017-11-28 11:38:37'),
(38, 2, 9, 5, 'no', 0, '', '', '', '2017-11-08 10:31:21'),
(39, 2, 9, 6, 'no', 0, '', '', '', '2017-11-08 10:31:22'),
(40, 2, 9, 7, 'no', 0, '', '', '', '2017-11-08 10:31:23'),
(41, 2, 9, 8, 'no', 0, '', '', '', '2017-11-08 10:31:24'),
(42, 2, 9, 9, 'no', 0, '', '', '', '2017-11-08 10:31:25'),
(43, 2, 9, 10, 'no', 0, '', '', '', '2017-11-08 10:31:26'),
(44, 2, 9, 11, 'no', 0, '', '', '', '2017-11-08 10:31:27'),
(45, 2, 9, 12, 'yes2', 0, '', '', 'Please work', '2017-11-28 11:40:17'),
(46, 2, 9, 13, 'no', 0, '', '', '', '2017-11-08 10:31:29'),
(47, 2, 9, 14, 'yes2', 0, '', '', 'A problem', '2017-11-28 11:35:06'),
(48, 2, 9, 15, 'yes2', 0, '', '', 'No way is this not gonna happen', '2017-11-28 11:35:16'),
(49, 2, 9, 16, 'no', 0, '', '', '', '2017-11-08 10:31:32'),
(50, 2, 9, 17, 'no', 0, '', '', '', '2017-11-08 10:31:33'),
(51, 2, 9, 18, 'no', 0, '', '', '', '2017-11-08 10:31:34'),
(52, 2, 9, 19, 'no', 0, '', '', '', '2017-11-08 10:31:35'),
(53, 2, 9, 20, 'no', 0, '', '', '', '2017-11-08 10:31:35'),
(54, 2, 9, 21, 'no', 0, '', '', '', '2017-11-08 10:31:36'),
(55, 2, 9, 22, 'no', 0, '', '', '', '2017-11-08 10:31:37'),
(56, 2, 9, 23, 'no', 0, '', '', '', '2017-11-08 10:31:38'),
(57, 2, 9, 24, 'yes', 0, '', '', 'A bit', '2017-11-28 11:35:28'),
(58, 2, 9, 25, 'no', 0, '', '', '', '2017-11-08 10:31:40'),
(59, 2, 9, 26, 'yes2', 0, '', '', 'Worried', '2017-11-28 11:47:34'),
(60, 2, 9, 27, 'yes2', 0, '', '', 'This is a worry', '2017-11-28 11:47:43'),
(61, 2, 9, 28, 'no', 0, '', '', '', '2017-11-08 10:31:44'),
(62, 2, 9, 29, 'no', 0, '', '', '', '2017-11-08 10:31:45'),
(63, 2, 9, 30, 'no', 0, '', '', '', '2017-11-08 10:31:46'),
(64, 3, 14, 1, 'yes', 0, '', '', 'This is a bit of a worry', '2017-11-30 11:53:21'),
(65, 8, 40, 1, 'yes2', 0, '', '', 'A lot', '2017-12-10 22:37:36'),
(66, 8, 39, 1, 'yes', 0, '', '', 'a lot', '2017-12-13 15:54:55'),
(67, 8, 39, 2, 'yes', 0, '', '', 'Yes', '2017-12-04 16:54:53'),
(68, 8, 39, 3, 'yes', 0, '', '', 'a bit', '2017-12-06 11:37:46'),
(69, 8, 39, 4, 'no', 0, '', '', '', '2017-12-06 11:40:45'),
(70, 8, 39, 5, 'no', 0, '', '', '', '2017-12-06 11:40:47'),
(71, 8, 39, 6, 'yes', 0, '', '', 'A bit', '2017-12-06 11:40:54'),
(72, 9, 44, 1, 'no', 0, '', '', '', '2017-12-06 20:37:10'),
(73, 9, 44, 2, 'no', 0, '', '', '', '2017-12-06 20:37:15'),
(74, 9, 44, 3, 'no', 0, '', '', '', '2017-12-06 20:37:22'),
(75, 9, 44, 4, 'no', 0, '', '', '', '2017-12-06 20:37:30'),
(76, 9, 44, 5, 'yes', 0, '', '', 'In a restaurant he might go behind the counter\n', '2017-12-06 20:39:57'),
(77, 9, 44, 6, 'no', 0, '', '', '', '2017-12-06 20:41:01'),
(78, 9, 44, 7, 'no', 0, '', '', '', '2017-12-06 20:41:15'),
(79, 9, 44, 8, 'no', 0, '', '', '', '2017-12-06 20:41:23'),
(80, 9, 44, 9, 'yes2', 0, '', '', 'At home or in the car, he needs to be the centre of attention and struggles even to let adults talk to each other.  Out and about he doesn\'t need to be the centre of attention, nor when amongst children. ', '2017-12-06 20:43:32'),
(81, 9, 44, 10, 'yes2', 0, '', '', 'When hurt or sad he seeks out hugs.', '2017-12-06 20:44:04'),
(82, 9, 44, 11, 'yes', 0, '', '', 'Lucas accepts comfort and reassurance from us quite easily when sad or hurt. But if his distress is caused by anger he pushes us away and can be aggressive', '2017-12-06 20:48:06'),
(83, 9, 44, 12, 'no', 0, '', '', '', '2017-12-06 20:53:41'),
(84, 9, 44, 13, 'yes', 0, '', '', 'He can, if he thinks he\'s done something wrong, or with unfamiliar people .  Perhaps more than other children.', '2017-12-06 20:56:09'),
(85, 9, 44, 14, 'yes2', 0, '', '', 'More recently, yes, from our family.', '2017-12-06 20:57:09'),
(86, 9, 44, 15, 'yes', 0, '', '', 'We are seeing the happy boy more and more as he settles back with us and we learn more about how to parent him effectively. There are still spells when he is very sad and angry, and very difficult to reach. ', '2017-12-06 21:04:35'),
(87, 9, 44, 16, 'yes2', 0, '', '', 'Out with his episodes of anger, and outbursts he is affectionate appropriately \n\n', '2017-12-06 21:09:51'),
(88, 9, 44, 17, 'yes2', 0, '', '', 'This is one of our main challenges. Even on reflection, we can\'t see the trigger. This happens on almost a daily basis. ', '2017-12-06 21:11:28'),
(89, 9, 44, 18, 'yes', 0, '', '', 'Not so much with me (foster \'mother\') but with others he  does this. He may reject any contact or conversation.', '2017-12-06 21:15:06'),
(90, 9, 44, 19, 'yes', 0, '', '', 'He seems more wary and watchful than other children, but we can usually see what he is concerned about.  ', '2017-12-06 21:18:52'),
(91, 9, 44, 20, 'no', 0, '', '', '', '2017-12-06 21:19:26'),
(92, 9, 44, 21, 'no', 0, '', '', '', '2017-12-06 21:19:33'),
(93, 9, 44, 22, 'no', 0, '', '', '', '2017-12-06 21:20:09'),
(94, 9, 44, 23, 'yes', 0, '', '', 'He generally is sorry, but not when he is in an anxious, distressed or angry state.', '2017-12-06 21:24:41'),
(95, 9, 44, 24, 'yes2', 0, '', '', 'He seems to understand feelings of happiness, anger, sadness, and fear in others and in pictures. ', '2017-12-06 21:26:40'),
(96, 9, 44, 25, 'yes2', 0, '', '', 'He likes to be in control of who does specific tasks for him, and his eating. ', '2017-12-06 21:27:47'),
(97, 9, 44, 26, 'yes2', 0, '', '', 'His facial expressions and mannerisms and body language all feel genuine. ', '2017-12-06 21:29:38'),
(98, 9, 44, 27, 'yes2', 0, '', '', 'This happens  more when adults try to do other things together. If just one of us is on the house, he is much less like this. ', '2017-12-06 21:32:26'),
(99, 9, 44, 28, 'no', 0, '', '', '', '2017-12-06 21:33:01'),
(100, 9, 44, 29, 'no', 0, '', '', '', '2017-12-06 21:33:58'),
(101, 9, 44, 30, 'no', 0, '', '', '', '2017-12-06 21:34:04'),
(102, 8, 40, 2, 'no', 0, '', '', '', '2017-12-10 22:38:06'),
(103, 8, 40, 3, 'no', 0, '', '', '', '2017-12-10 22:38:08'),
(104, 8, 40, 4, 'no', 0, '', '', '', '2017-12-10 22:38:09'),
(105, 8, 40, 5, 'no', 0, '', '', '', '2017-12-10 22:38:11'),
(106, 8, 40, 6, 'yes2', 0, '', '', 'A lot', '2017-12-10 22:38:17'),
(107, 8, 40, 7, 'maybe', 0, '', '', '', '2017-12-10 22:38:48'),
(108, 8, 40, 8, 'no', 0, '', '', '', '2017-12-10 22:38:56'),
(109, 8, 40, 9, 'no', 0, '', '', '', '2017-12-10 22:38:57'),
(110, 8, 40, 10, 'yes', 0, '', '', 'A little', '2017-12-10 22:39:03'),
(111, 8, 40, 11, 'yes', 0, '', '', 'A little', '2017-12-10 22:39:11'),
(112, 8, 40, 12, 'yes', 0, '', '', '13a?', '2017-12-10 22:39:21'),
(113, 8, 40, 13, 'yes2', 0, '', '', 'A lot 14a', '2017-12-10 22:39:29'),
(114, 8, 39, 7, 'no', 0, '', '', '', '2017-12-10 22:41:31'),
(115, 8, 39, 8, 'no', 0, '', '', '', '2017-12-10 22:41:33'),
(116, 8, 39, 9, 'no', 0, '', '', '', '2017-12-10 22:41:34'),
(117, 8, 39, 10, 'yes', 0, '', '', 'little', '2017-12-10 22:41:42'),
(118, 8, 39, 11, 'no', 0, '', '', '', '2017-12-10 22:41:45'),
(119, 8, 39, 12, 'no', 0, '', '', '', '2017-12-10 22:41:46'),
(120, 8, 39, 13, 'no', 0, '', '', '', '2017-12-10 22:41:47'),
(121, 8, 39, 14, 'no', 0, '', '', '', '2017-12-10 22:41:49'),
(122, 8, 39, 15, 'yes', 0, '', '', 'little', '2017-12-10 22:41:56'),
(123, 8, 39, 16, 'no', 0, '', '', '', '2017-12-10 22:41:57'),
(124, 8, 39, 17, 'no', 0, '', '', '', '2017-12-10 22:41:59'),
(125, 8, 39, 18, 'no', 0, '', '', '', '2017-12-10 22:42:02'),
(126, 8, 39, 19, 'no', 0, '', '', '', '2017-12-10 22:42:03'),
(127, 8, 39, 20, 'no', 0, '', '', '', '2017-12-10 22:42:05'),
(128, 8, 39, 21, 'no', 0, '', '', '', '2017-12-10 22:42:06'),
(129, 8, 39, 22, 'yes2', 0, '', '', 'lot', '2017-12-10 22:42:13'),
(130, 8, 39, 23, 'no', 0, '', '', '', '2017-12-10 22:42:16'),
(131, 8, 39, 24, 'yes2', 0, '', '', '', '2017-12-10 22:42:17'),
(132, 8, 39, 25, 'no', 0, '', '', '', '2017-12-10 22:42:32'),
(133, 8, 39, 26, 'no', 0, '', '', '', '2017-12-10 22:42:33'),
(134, 8, 39, 27, 'no', 0, '', '', '', '2017-12-10 22:42:35'),
(135, 8, 39, 28, 'no', 0, '', '', '', '2017-12-10 22:42:37'),
(136, 8, 39, 29, 'no', 0, '', '', '', '2017-12-10 22:42:38'),
(137, 8, 39, 30, 'maybe', 0, '', '', '', '2017-12-12 10:43:44'),
(138, 10, 39, 1, 'yes2', 0, '', '', '', '2018-02-05 08:44:47'),
(139, 10, 39, 6, 'no', 0, '', '', '', '2018-01-11 11:37:36'),
(140, 10, 39, 2, 'no', 0, '', '', '', '2018-01-11 11:37:16'),
(141, 10, 39, 3, 'no', 0, '', '', '', '2018-01-11 11:37:18'),
(142, 10, 39, 4, 'no', 0, '', '', '', '2018-01-11 11:37:20'),
(143, 10, 39, 5, 'no', 0, '', '', '', '2018-01-11 11:37:23'),
(144, 10, 39, 7, 'no', 0, '', '', '', '2018-01-11 11:37:42'),
(145, 10, 39, 8, 'no', 0, '', '', '', '2018-01-11 11:37:45'),
(146, 10, 39, 9, 'yes2', 0, '', '', 'Comment here', '2018-01-11 11:37:57'),
(147, 10, 39, 10, 'no', 0, '', '', '', '2018-01-11 11:38:04'),
(148, 10, 39, 11, 'no', 0, '', '', '', '2018-01-11 11:38:05'),
(149, 10, 39, 12, 'no', 0, '', '', '', '2018-01-11 11:38:06'),
(150, 10, 39, 13, 'no', 0, '', '', '', '2018-01-11 11:38:08'),
(151, 10, 39, 14, 'no', 0, '', '', '', '2018-01-11 11:38:11'),
(152, 10, 39, 15, 'yes2', 0, '', '', 'Appears happy when doing things he wants to do, but little positive or joy outside that!', '2018-01-11 11:38:38'),
(153, 10, 39, 16, 'yes2', 0, '', '', 'to fizzy to be affectionate often displays taunting interactions instead', '2018-01-11 11:39:11'),
(154, 10, 39, 17, 'yes2', 0, '', '', 'Angry/irritable as a result of a deneance.  Agression as result of hyper excited dyslequlated behaviour', '2018-01-11 11:39:57'),
(155, 10, 39, 18, 'no', 0, '', '', '', '2018-01-11 11:40:01'),
(156, 10, 39, 19, 'no', 0, '', '', '', '2018-01-11 11:40:03'),
(157, 10, 39, 20, 'no', 0, '', '', '', '2018-01-11 11:40:04'),
(158, 10, 39, 21, 'no', 0, '', '', '', '2018-01-11 11:40:08'),
(159, 10, 39, 22, 'no', 0, '', '', '', '2018-01-11 11:40:10'),
(160, 10, 39, 23, 'yes2', 0, '', '', 'Has little appreciation of others emotions.  Says sorry but does not feel it.  More instantly to asking for things happily.  ', '2018-01-11 11:40:53'),
(161, 10, 39, 24, 'yes2', 0, '', '', 'Laughs sometimes if we are hurt.  finds violence entertaining.  can\'t read others emotions, except if extreme', '2018-01-11 11:41:26'),
(162, 10, 39, 25, 'yes2', 0, '', '', 'hugely', '2018-01-11 11:41:37'),
(163, 10, 39, 26, 'no', 0, '', '', '', '2018-01-11 11:41:41'),
(164, 10, 39, 27, 'no', 0, '', '', '', '2018-01-11 11:41:44'),
(165, 10, 39, 28, 'no', 0, '', '', '', '2018-01-11 11:41:47'),
(166, 10, 39, 29, 'no', 0, '', '', '', '2018-01-11 11:41:49'),
(167, 10, 39, 30, 'yes2', 0, '', '', 'N/A', '2018-01-11 11:42:02'),
(168, 17, 55, 1, 'yes2', 0, '', '', 'Zac is very affectionate, always looking for kisses and cuddles.', '2018-07-19 23:50:33'),
(169, 17, 55, 2, 'yes', 0, '', '', 'Sometimes Zac seems unsure about who people are in his life. E.g. If we meet an acquaintance he may think it’s family and give cuddles/be overly friendly. ', '2018-07-18 15:15:24'),
(170, 17, 55, 3, 'no', 0, '', '', '', '2018-07-18 15:15:40'),
(171, 17, 55, 4, 'yes2', 0, '', '', 'If someone has a birth mark for example Zac will ask them about it, or inappropriate questions about their appearance.  He also asks people if they have a family. ', '2018-07-19 23:39:49'),
(172, 17, 55, 5, 'yes2', 0, '', '', 'In places like soft play, shop, etc you have to constantly keep an eye on Zac as he will go into staff only area.  ', '2018-07-19 23:38:23'),
(173, 17, 55, 6, 'yes2', 0, '', '', 'I always have to keep Zac close or hold his hand because he could take off at any time. ', '2018-07-19 23:41:23'),
(174, 17, 55, 7, 'yes', 0, '', '', 'This hasn’t actually happened as Zac is always closely supervised but I believe he would if the situation arose .', '2018-07-19 23:55:19'),
(175, 17, 55, 8, 'yes', 0, '', '', 'Zac has one real friend from school and he is desperate for affection from her.  With other children if they are smaller than him he will be asking for cuddles and wanting to hold their hand etc. ', '2018-07-19 23:58:33'),
(176, 17, 55, 9, 'yes', 0, '', '', 'Zac always need to know that he has your attention as opposed to being the centre of attention. ', '2018-07-20 09:32:01'),
(177, 17, 55, 10, 'yes', 0, '', '', 'Zac will look for comfort in certain situations but if he has hurt himself or is particularly angry or upset he won’t let you near him. ', '2018-07-20 00:06:58'),
(178, 17, 55, 11, 'yes2', 0, '', '', 'If he is distressed he doesn’t want you to go near him and it take some time and perseverance to reassure him. ', '2018-07-20 00:09:21'),
(179, 17, 55, 12, 'no', 0, '', '', '', '2018-07-20 00:09:32'),
(180, 17, 55, 13, 'yes', 0, '', '', 'Often when you are speaking to him he will avoid eye contact. At other times, when he’s angry for example he’ll stare hard into your eyes.', '2018-07-20 00:17:25'),
(181, 17, 55, 14, 'yes2', 0, '', '', 'Zac is a very affectionate little boy. Especially when he is feeling calm he is very loving. ', '2018-07-20 00:18:44'),
(182, 17, 55, 15, 'yes', 0, '', '', 'Zac can seem happy and settled but everyday there will be times when he will become dysregulated or extremely angry.', '2018-07-22 12:33:46'),
(183, 17, 55, 16, 'yes2', 0, '', '', 'When Zac is feeling calm and settled he is very loving and affectionate. ', '2018-07-20 00:21:53'),
(184, 17, 55, 17, 'yes2', 0, '', '', 'Asking Zac the simplest question can be met with a very angry response.  You can feel like you’re walking on egg shells a lot with Zac. ', '2018-07-20 00:23:38'),
(185, 17, 55, 18, 'no', 0, '', '', '', '2018-07-20 00:23:52'),
(186, 17, 55, 19, 'yes2', 0, '', '', 'Zac will be aware of everything that going on around him. E.g. if you can on the telephone and he’s playing in the other room when come off the phone he will question what you were talking about who you were talking too.  He will also notice if there is anything different in the house, no matter how small. ', '2018-07-20 00:26:55'),
(187, 17, 55, 20, 'yes', 0, '', '', 'Sometimes Zac can become very still and it’s almost like he’s gone off into his own world in his head. ', '2018-07-20 00:30:02'),
(188, 17, 55, 21, 'yes', 0, '', '', 'If he sees you crying he will ask if it’s happy tears or sad tears. Sometimes he will think you’re angry with him if your concentrating on something or if you’ve a headache . ', '2018-07-20 00:32:22'),
(189, 17, 55, 22, 'yes2', 0, '', '', 'Zac will often comment that he is a bad boy, or that he can’t do things.', '2018-07-20 00:33:59'),
(190, 17, 55, 23, 'yes', 0, '', '', 'Zac will easily say sorry but will then do the same thing again and again.  I don’t get the impression he is genuinely sorry. ', '2018-07-20 00:36:26'),
(191, 17, 55, 24, 'yes', 0, '', '', 'Sometimes he seems to understand how others are feeling but other times he will think you are angry if you aren’t or if he is playing with another child and they are unhappy he won’t notice this and carry on doing whatever is upsetting the child until someone intervenes. ', '2018-07-22 12:36:01'),
(192, 17, 55, 25, 'yes2', 0, '', '', 'Zac will try to control everything, when he gets dressed, when he eats, when we leave the house, everything. ', '2018-07-20 00:39:26'),
(193, 17, 55, 26, 'yes2', 0, '', '', 'It does feel very genuine but sometimes it feels quite fake, like he is saying the kind things and being affectionate but there isn’t any feeling behind it. ', '2018-07-20 11:20:01'),
(194, 17, 55, 27, 'yes2', 0, '', '', 'He doesn’t necessarily hang onto you but he will do anything to let you know he’s there and  to get your attention even if it’s a negative act like pouring out a bottle of something onto the floor or hitting his brother. ', '2018-07-22 12:37:49'),
(195, 17, 55, 28, 'yes', 0, '', '', 'Zac’s brother isn’t affectionate at all and I think Zac likes this as he feels like he can always have you. ', '2018-07-20 11:22:03'),
(196, 17, 55, 29, 'no', 0, '', '', '', '2018-07-20 00:45:21'),
(197, 17, 55, 30, 'yes', 0, '', '', 'He has wiped his bottom on the bed sheets of a number of occasions.', '2018-07-20 00:46:46'),
(198, 16, 55, 1, 'no', 0, '', '', '', '2018-07-21 22:09:07'),
(199, 16, 55, 2, 'no', 0, '', '', '', '2018-07-22 11:24:57'),
(200, 16, 55, 3, 'no', 0, '', '', '', '2018-07-20 00:54:27'),
(201, 16, 55, 4, 'yes2', 0, '', '', 'Reiley will ask people about their appearance eg “why do you have that tattoo?”, “why have you got that hair?” He will often ask where people live or do they have a home. ', '2018-07-22 11:25:04'),
(202, 16, 55, 5, 'yes2', 0, '', '', 'I always have to keep Reiley close or hold his hand as he will often run off. If in school to collect his brother he will run into the office, or behind the counter in shops for example.', '2018-07-20 11:23:38'),
(203, 16, 55, 6, 'yes2', 0, '', '', 'There is alway the potential for Reiley to wonder off, he seems to lack any sense of danger. ', '2018-07-20 02:02:58'),
(204, 16, 55, 7, 'yes', 0, '', '', 'If it’s someone he likes to look of I feel he would. ', '2018-07-21 22:11:25'),
(205, 16, 55, 8, 'yes', 0, '', '', 'Reiley likes to have a friend whether it’s in the park or at nursery.  He will be somewhat tactile with his friends.', '2018-07-22 11:43:53'),
(206, 16, 55, 9, 'yes2', 0, '', '', 'Reiley always likes to have your attention as opposed to being the centre of attention. He wants you to go with him to the toilet, be in his room while he plays, etc.', '2018-07-22 11:49:24'),
(207, 16, 55, 10, 'no', 0, '', '', '', '2018-07-22 11:49:31'),
(208, 16, 55, 11, 'no', 0, '', '', '', '2018-07-22 11:49:52'),
(209, 16, 55, 12, 'no', 0, '', '', '', '2018-07-22 11:50:13'),
(210, 16, 55, 13, 'yes2', 0, '', '', 'When you’re speaking to Reiley he will always avoid eye contact, often turnin his head or pushing his cheek out with his tongue. ', '2018-07-22 11:51:32'),
(211, 16, 55, 14, 'no', 0, '', '', '', '2018-07-22 11:51:39'),
(212, 16, 55, 15, 'yes', 0, '', '', 'Reiley is a happy child and very lively but he also seems angry a lot of the time. ', '2018-07-22 11:52:48'),
(213, 16, 55, 16, 'no', 0, '', '', '', '2018-07-22 11:52:53'),
(214, 16, 55, 17, 'yes2', 0, '', '', 'Reiley will do this often! If you walk past him and touch him he’ll throw himself down and scream you pushed me. Or he’ll hit out for apparently no reason.', '2018-07-22 11:54:51'),
(215, 16, 55, 18, 'yes2', 0, '', '', 'It can seem as if Reiley is dangling a carrot trying to draw you in and then will push you away just as quickly. ', '2018-07-22 11:58:10'),
(216, 16, 55, 19, 'yes2', 0, '', '', 'Reiley notices everything! Even minor details that no one else would pick up on. He will also repeat things back that you have said to other people when he wasn’t in the room. ', '2018-07-22 12:02:55'),
(217, 16, 55, 20, 'no', 0, '', '', '', '2018-07-22 12:03:07'),
(218, 16, 55, 21, 'yes', 0, '', '', 'Reiley will often think you are angry with him,!when you aren’t at all. ', '2018-07-22 12:07:49'),
(219, 16, 55, 22, 'no', 0, '', '', '', '2018-07-22 12:09:57'),
(220, 16, 55, 23, 'yes', 0, '', '', 'If he hits you he will say sorry quickly but could then go on the hit you again straight after. The apology doesn’t feel genuine. ', '2018-07-22 12:11:18'),
(221, 16, 55, 24, 'no', 0, '', '', '', '2018-07-22 12:17:27'),
(222, 16, 55, 25, 'yes2', 0, '', '', 'Reiley wants to do things in his time. He can also be very bossy, more so with adults than other children. ', '2018-07-22 12:21:02'),
(223, 16, 55, 26, 'no', 0, '', '', '', '2018-07-22 12:21:08'),
(224, 16, 55, 27, 'yes', 0, '', '', 'Reiley always likes to have your attention. He won’t necessarily hang onto you he will do everything he can to keep the focus on him. ', '2018-07-22 12:23:04'),
(225, 16, 55, 28, 'no', 0, '', '', '', '2018-07-22 12:23:10'),
(226, 16, 55, 29, 'no', 0, '', '', '', '2018-07-22 12:23:16'),
(227, 16, 55, 30, 'no', 0, '', '', '', '2018-07-22 12:23:21'),
(228, 18, 60, 1, 'yes2', 0, '', '', 'example', '2019-12-06 14:51:26'),
(229, 18, 60, 2, 'yes', 0, '', '', '', '2019-12-06 14:53:05'),
(230, 18, 60, 3, 'yes', 0, '', '', '', '2019-12-06 14:53:11'),
(231, 18, 60, 4, 'yes2', 0, '', '', '', '2019-12-06 14:53:25'),
(232, 18, 60, 5, 'yes2', 0, '', '', '', '2019-12-06 14:53:35'),
(233, 18, 60, 6, 'yes2', 0, '', '', '', '2019-12-06 14:53:42'),
(234, 18, 60, 7, 'yes', 0, '', '', '', '2019-12-06 14:53:49'),
(235, 18, 60, 8, 'no', 0, '', '', '', '2019-12-06 14:53:54'),
(236, 18, 60, 9, 'maybe', 0, '', '', '', '2019-12-06 14:53:58'),
(237, 18, 60, 10, 'yes2', 0, '', '', '', '2019-12-06 14:54:24'),
(238, 18, 60, 11, 'yes', 0, '', '', '', '2019-12-06 14:56:51'),
(239, 18, 60, 12, 'maybe', 0, '', '', '', '2019-12-06 14:57:10'),
(240, 18, 60, 13, 'yes2', 0, '', '', '', '2019-12-06 14:57:38'),
(241, 18, 60, 14, 'maybe', 0, '', '', '', '2019-12-06 14:57:45'),
(242, 18, 60, 15, 'maybe', 0, '', '', '', '2019-12-06 14:58:07'),
(243, 18, 60, 16, 'yes2', 0, '', '', '', '2019-12-06 14:58:28'),
(244, 18, 60, 17, 'yes', 0, '', '', '', '2019-12-06 14:58:41'),
(245, 18, 60, 18, 'no', 0, '', '', '', '2019-12-06 14:58:51'),
(246, 18, 60, 19, 'no', 0, '', '', '', '2019-12-06 14:58:53'),
(247, 18, 60, 20, 'no', 0, '', '', '', '2019-12-06 14:58:54'),
(248, 18, 60, 21, 'yes', 0, '', '', '', '2019-12-06 14:58:57'),
(249, 18, 60, 22, 'no', 0, '', '', '', '2019-12-06 14:59:01'),
(250, 18, 60, 23, 'maybe', 0, '', '', '', '2019-12-06 14:59:02'),
(251, 18, 60, 24, 'maybe', 0, '', '', '', '2019-12-06 14:59:08'),
(252, 18, 60, 25, 'yes', 0, '', '', '', '2019-12-06 14:59:20'),
(253, 18, 60, 26, 'yes', 0, '', '', '', '2019-12-06 14:59:26'),
(254, 18, 60, 27, 'yes', 0, '', '', '', '2019-12-06 14:59:30'),
(255, 18, 60, 28, 'yes', 0, '', '', '', '2019-12-06 14:59:36'),
(256, 18, 60, 29, 'yes', 0, '', '', '', '2019-12-06 14:59:40'),
(257, 18, 60, 30, 'yes', 0, '', '', '', '2019-12-06 14:59:44'),
(258, 13, 49, 1, 'maybe', 0, '', '', '', '2020-03-02 10:46:58'),
(259, 13, 49, 30, 'maybe', 0, '', '', '', '2020-03-02 10:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `capa_red_probes_answers`
--

CREATE TABLE `capa_red_probes_answers` (
  `prob_ans_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `main_ques_id` int(11) NOT NULL,
  `probes_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `ans_comment` text NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `capa_red_probes_answers`
--

INSERT INTO `capa_red_probes_answers` (`prob_ans_id`, `user_id`, `main_ques_id`, `probes_id`, `child_id`, `answer`, `ans_comment`, `creation_date`) VALUES
(1, 4, 1, 1, 1, 'no', 'I am worried about this', '2017-11-03 14:53:46'),
(2, 4, 8, 13, 1, 'yes', 'I dont like it', '2017-10-24 23:34:18'),
(3, 5, 1, 1, 1, 'yes', 'I find this a great worry!!', '2017-10-28 13:44:49'),
(4, 9, 1, 1, 2, 'yes', 'yes', '2017-11-30 16:43:40'),
(5, 39, 1, 1, 8, 'yes', 'this is a worry', '2017-12-06 11:37:36'),
(6, 40, 1, 1, 8, 'yes', 'I worry', '2017-12-10 22:37:45'),
(7, 40, 6, 4, 8, 'yes', 'YEst', '2017-12-10 22:38:31'),
(8, 55, 6, 4, 14, 'yes', 'Zac doesn’t seem to have any sense of danger when it comes to wandering into areas he shouldn’t. ', '2018-07-22 12:29:14'),
(9, 55, 1, 1, 2, 'yes', 'Zac always likes you to know he’s there. If you are busy with something or someone else he will do whatever it takes to get the attention back to him. ', '2018-07-20 09:23:09'),
(10, 55, 8, 13, 17, 'yes', 'Zac can change so quickly from being affectionate to lashing out. ', '2018-07-22 12:31:59'),
(11, 60, 1, 1, 18, 'yes', 'Testing the RADA.', '2019-12-06 14:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `capa_red_yes_answers`
--

CREATE TABLE `capa_red_yes_answers` (
  `yes_ans_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `main_ques_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `clinician_email` varchar(255) NOT NULL,
  `parent_1_email` varchar(255) NOT NULL,
  `parent_2_email` varchar(255) NOT NULL,
  `teacher_email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `reviewd_user` int(11) NOT NULL,
  `p_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `user_id`, `group_id`, `name`, `birthdate`, `gender`, `clinician_email`, `parent_1_email`, `parent_2_email`, `teacher_email`, `status`, `reviewd_user`, `p_data`) VALUES
(9, 43, 11, 'Lucas Robertson', '2014-06-12', 'Male', 'helen.minnis@glasgow.ac.uk', 'robert.fraser2@gov.scot', '', 's.koepplinger@gmail.com', '', 0, 'a:4:{s:23:\"robert.fraser2@gov.scot\";s:8:\"iNkhprdW\";s:0:\"\";s:8:\"9kD61lqD\";s:26:\"helen.minnis@glasgow.ac.uk\";s:8:\"2MgrvdB9\";s:23:\"s.koepplinger@gmail.com\";s:8:\"WbGzVWXq\";}'),
(10, 38, 10, 'child', '2018-01-01', 'Male', 'sk.oepplinger@gmail.com', 'sko.epplinger@gmail.com', 'skoep.plinger@gmail.com', 'skoepp.linger@gmail.com', '', 0, 'a:4:{s:23:\"sko.epplinger@gmail.com\";s:8:\"hbZPsyG7\";s:23:\"skoep.plinger@gmail.com\";s:8:\"5vfvmQgQ\";s:23:\"sk.oepplinger@gmail.com\";s:8:\"owZiNDwJ\";s:23:\"skoepp.linger@gmail.com\";s:8:\"ieOmvZWx\";}'),
(13, 43, 11, 'Ciaran McMahon', '2010-02-23', 'Male', 'helen.minnis@glasgow.ac.uk', 'skoepplinger@gmail.com', 's.koepplinger@gmail.com', 's.k.oepplinger@gmail.com', '', 0, 'a:4:{s:22:\"skoepplinger@gmail.com\";s:8:\"Amit@123\";s:23:\"s.koepplinger@gmail.com\";s:8:\"WbGzVWXq\";s:26:\"helen.minnis@glasgow.ac.uk\";s:8:\"2MgrvdB9\";s:24:\"s.k.oepplinger@gmail.com\";s:8:\"AXM0GA0g\";}'),
(14, 51, 12, 'GVB', '2018-02-26', 'Male', 'vaibhav.w3nuts@gmail.com', 'vaibhav.w3nuts@gmail.com', 'vaibhav.w3nuts@gmail.com', 'vaibhav.w3nuts@gmail.com', '', 0, 'a:1:{s:24:\"vaibhav.w3nuts@gmail.com\";s:10:\"Wfp7GgRBs9\";}'),
(15, 51, 12, 'GVB', '2018-02-26', 'Male', 'vaibhav.w3nuts@gmail.com', 'vaibhav.w3nuts@gmail.com', 'vaibhav.w3nuts@gmail.com', 'vaibhav.w3nuts@gmail.com', '', 0, 'a:1:{s:24:\"vaibhav.w3nuts@gmail.com\";s:10:\"e5KwhTQLoL\";}'),
(16, 54, 15, 'Reiley Lappin', '2011-07-03', 'Male', 'Helen.Minnis@glasgow.ac.uk', 'shanielappin@gmail.com', '', '', '', 0, 'a:3:{s:22:\"shanielappin@gmail.com\";s:8:\"Ldp7K99K\";s:0:\"\";s:8:\"9kD61lqD\";s:26:\"Helen.Minnis@glasgow.ac.uk\";s:8:\"2MgrvdB9\";}'),
(17, 54, 15, 'Zac Lappin', '2013-05-28', 'Male', 'sk.oeppling.e.r@gmail.com', 'shanielappin@gmail.com', '', '', '', 0, 'a:3:{s:22:\"shanielappin@gmail.com\";s:8:\"Ldp7K99K\";s:0:\"\";s:8:\"9kD61lqD\";s:26:\"Helen.Minnis@glasgow.ac.uk\";s:8:\"2MgrvdB9\";}'),
(18, 59, 19, 'Florence Monette', '2013-06-12', 'Female', 'sebastien_monette@hotmail.com', 'sebastien.monette.sm@gmail.com', '', 'sebastien.monette@cjm-iu.qc.ca', '', 0, 'a:4:{s:30:\"sebastien.monette.sm@gmail.com\";s:8:\"gtmBQugP\";s:0:\"\";s:8:\"9kD61lqD\";s:29:\"sebastien_monette@hotmail.com\";s:11:\"P$ych0l0g13\";s:30:\"sebastien.monette@cjm-iu.qc.ca\";s:8:\"EUBdxWTy\";}'),
(19, 0, 0, 'yIVmDubLOxkqlE', '1970-01-01', 'Male', 'danielmarilynn17@gmail.com', 'danielmarilynn17@gmail.com', 'danielmarilynn17@gmail.com', 'danielmarilynn17@gmail.com', '', 0, 'a:1:{s:26:\"danielmarilynn17@gmail.com\";s:13:\"X9V0ATy5YwuI!\";}'),
(20, 0, 0, 'xRpCLlKovdXSNju', '1970-01-01', 'Male', 'danielmarilynn17@gmail.com', 'danielmarilynn17@gmail.com', 'danielmarilynn17@gmail.com', 'danielmarilynn17@gmail.com', '', 0, 'a:1:{s:26:\"danielmarilynn17@gmail.com\";s:13:\"X9V0ATy5YwuI!\";}'),
(21, 0, 0, 'poexNMPwgUGlkdc', '1970-01-01', 'Male', 'davidmiller10802@gmail.com', 'davidmiller10802@gmail.com', 'davidmiller10802@gmail.com', 'davidmiller10802@gmail.com', '', 0, 'a:1:{s:26:\"davidmiller10802@gmail.com\";s:13:\"D0oNf45VAqIp!\";}'),
(22, 0, 0, 'qBjlkAJUoVHMnyc', '1970-01-01', 'Male', 'davidmiller10802@gmail.com', 'davidmiller10802@gmail.com', 'davidmiller10802@gmail.com', 'davidmiller10802@gmail.com', '', 0, 'a:1:{s:26:\"davidmiller10802@gmail.com\";s:13:\"D0oNf45VAqIp!\";}'),
(23, 0, 0, 'WcDNQlMqVShpu', '1970-01-01', 'Male', 'franklinbrandi93@gmail.com', 'franklinbrandi93@gmail.com', 'franklinbrandi93@gmail.com', 'franklinbrandi93@gmail.com', '', 0, 'a:1:{s:26:\"franklinbrandi93@gmail.com\";s:13:\"kzuIFvO9chiC!\";}'),
(24, 0, 0, 'CyvXTfbsBWaVG', '1970-01-01', 'Male', 'franklinbrandi93@gmail.com', 'franklinbrandi93@gmail.com', 'franklinbrandi93@gmail.com', 'franklinbrandi93@gmail.com', '', 0, 'a:1:{s:26:\"franklinbrandi93@gmail.com\";s:13:\"kzuIFvO9chiC!\";}'),
(25, 0, 0, 'cRfuqCJvwDshTLEk', '1970-01-01', 'Male', 'pud75@gmail.com', 'pud75@gmail.com', 'pud75@gmail.com', 'pud75@gmail.com', '', 0, 'a:1:{s:15:\"pud75@gmail.com\";s:13:\"SmZDGrPp4u7l!\";}'),
(26, 0, 0, 'JDIOjKoWCsFu', '1970-01-01', 'Male', 'pud75@gmail.com', 'pud75@gmail.com', 'pud75@gmail.com', 'pud75@gmail.com', '', 0, 'a:1:{s:15:\"pud75@gmail.com\";s:13:\"SmZDGrPp4u7l!\";}'),
(27, 0, 0, 'BoIYwsQhmnv', '1970-01-01', 'Male', 'christineburk0027@gmail.com', 'christineburk0027@gmail.com', 'christineburk0027@gmail.com', 'christineburk0027@gmail.com', '', 0, 'a:1:{s:27:\"christineburk0027@gmail.com\";s:13:\"xeUEtv7Oi2AJ!\";}'),
(28, 0, 0, 'XWFqExgZdlAyLhQ', '1970-01-01', 'Male', 'christineburk0027@gmail.com', 'christineburk0027@gmail.com', 'christineburk0027@gmail.com', 'christineburk0027@gmail.com', '', 0, 'a:1:{s:27:\"christineburk0027@gmail.com\";s:13:\"xeUEtv7Oi2AJ!\";}'),
(29, 0, 0, 'xeDtzvCKwPryjA', '1970-01-01', 'Male', 'joannmaaser@hotmail.com', 'joannmaaser@hotmail.com', 'joannmaaser@hotmail.com', 'joannmaaser@hotmail.com', '', 0, 'a:1:{s:23:\"joannmaaser@hotmail.com\";s:13:\"e6gp0joB9Rtm!\";}'),
(30, 0, 0, 'gnLjtcdwMYCRZ', '1970-01-01', 'Male', 'joannmaaser@hotmail.com', 'joannmaaser@hotmail.com', 'joannmaaser@hotmail.com', 'joannmaaser@hotmail.com', '', 0, 'a:1:{s:23:\"joannmaaser@hotmail.com\";s:13:\"e6gp0joB9Rtm!\";}'),
(31, 0, 0, 'fkPtDywcXiTIsO', '1970-01-01', 'Male', 'tanianashay@gmail.com', 'tanianashay@gmail.com', 'tanianashay@gmail.com', 'tanianashay@gmail.com', '', 0, 'a:1:{s:21:\"tanianashay@gmail.com\";s:13:\"aWkEzUve7PoK!\";}'),
(32, 0, 0, 'NVGvzsQcULdw', '1970-01-01', 'Male', 'tanianashay@gmail.com', 'tanianashay@gmail.com', 'tanianashay@gmail.com', 'tanianashay@gmail.com', '', 0, 'a:1:{s:21:\"tanianashay@gmail.com\";s:13:\"aWkEzUve7PoK!\";}'),
(33, 0, 0, 'JAuyimEB', '1970-01-01', 'Male', 'jemmerson21@yahoo.com', 'jemmerson21@yahoo.com', 'jemmerson21@yahoo.com', 'jemmerson21@yahoo.com', '', 0, 'a:1:{s:21:\"jemmerson21@yahoo.com\";s:13:\"aDX1Escyu02v!\";}'),
(34, 0, 0, 'SJbmdAsoaMklwCTj', '1970-01-01', 'Male', 'jemmerson21@yahoo.com', 'jemmerson21@yahoo.com', 'jemmerson21@yahoo.com', 'jemmerson21@yahoo.com', '', 0, 'a:1:{s:21:\"jemmerson21@yahoo.com\";s:13:\"aDX1Escyu02v!\";}'),
(35, 0, 0, 'WDUMFTXfRQzbSyt', '1970-01-01', 'Male', 't.couling@aol.com', 't.couling@aol.com', 't.couling@aol.com', 't.couling@aol.com', '', 0, 'a:1:{s:17:\"t.couling@aol.com\";s:13:\"in3jcylm2J0M!\";}'),
(36, 0, 0, 'rUnAPtcbEeS', '1970-01-01', 'Male', 't.couling@aol.com', 't.couling@aol.com', 't.couling@aol.com', 't.couling@aol.com', '', 0, 'a:1:{s:17:\"t.couling@aol.com\";s:13:\"in3jcylm2J0M!\";}'),
(37, 0, 0, 'TywqgkCUlEoXOv', '1970-01-01', 'Male', 'bertolero16@gmail.com', 'bertolero16@gmail.com', 'bertolero16@gmail.com', 'bertolero16@gmail.com', '', 0, 'a:1:{s:21:\"bertolero16@gmail.com\";s:13:\"4PqGAirVTL0t!\";}'),
(38, 0, 0, 'MGHJhnVgpeRPDNS', '1970-01-01', 'Male', 'bertolero16@gmail.com', 'bertolero16@gmail.com', 'bertolero16@gmail.com', 'bertolero16@gmail.com', '', 0, 'a:1:{s:21:\"bertolero16@gmail.com\";s:13:\"4PqGAirVTL0t!\";}'),
(39, 0, 0, 'BKNvPOzfQuewnUC', '1970-01-01', 'Male', 'anissa077@aol.com', 'anissa077@aol.com', 'anissa077@aol.com', 'anissa077@aol.com', '', 0, 'a:1:{s:17:\"anissa077@aol.com\";s:13:\"W82lzFcCZ1Uu!\";}'),
(40, 0, 0, 'KrlGjdQJTSeVCbOu', '1970-01-01', 'Male', 'anissa077@aol.com', 'anissa077@aol.com', 'anissa077@aol.com', 'anissa077@aol.com', '', 0, 'a:1:{s:17:\"anissa077@aol.com\";s:13:\"W82lzFcCZ1Uu!\";}'),
(41, 0, 0, 'tLaxrYlQchEzj', '1970-01-01', 'Male', 'galmjl@yahoo.com', 'galmjl@yahoo.com', 'galmjl@yahoo.com', 'galmjl@yahoo.com', '', 0, 'a:1:{s:16:\"galmjl@yahoo.com\";s:13:\"VgCPjIru5v3k!\";}'),
(42, 0, 0, 'SjupdJLbNn', '1970-01-01', 'Male', 'galmjl@yahoo.com', 'galmjl@yahoo.com', 'galmjl@yahoo.com', 'galmjl@yahoo.com', '', 0, 'a:1:{s:16:\"galmjl@yahoo.com\";s:13:\"VgCPjIru5v3k!\";}'),
(43, 0, 0, 'aGWPeFJoKyjHY', '1970-01-01', 'Male', 'arcox2005@yahoo.com', 'arcox2005@yahoo.com', 'arcox2005@yahoo.com', 'arcox2005@yahoo.com', '', 0, 'a:1:{s:19:\"arcox2005@yahoo.com\";s:13:\"sgAhfjquyR0C!\";}'),
(44, 0, 0, 'foTqOFjtvxil', '1970-01-01', 'Male', 'arcox2005@yahoo.com', 'arcox2005@yahoo.com', 'arcox2005@yahoo.com', 'arcox2005@yahoo.com', '', 0, 'a:1:{s:19:\"arcox2005@yahoo.com\";s:13:\"sgAhfjquyR0C!\";}'),
(45, 0, 0, 'KedfDZQWaXScU', '1970-01-01', 'Male', 'rrbardsley@aol.com', 'rrbardsley@aol.com', 'rrbardsley@aol.com', 'rrbardsley@aol.com', '', 0, 'a:1:{s:18:\"rrbardsley@aol.com\";s:13:\"Q8Pcus9GmYUp!\";}'),
(46, 0, 0, 'TkNJZhduyoev', '1970-01-01', 'Male', 'rrbardsley@aol.com', 'rrbardsley@aol.com', 'rrbardsley@aol.com', 'rrbardsley@aol.com', '', 0, 'a:1:{s:18:\"rrbardsley@aol.com\";s:13:\"Q8Pcus9GmYUp!\";}'),
(47, 0, 0, 'KlFvyhCBOcMPJd', '1970-01-01', 'Male', 'jeffw1209@yahoo.com', 'jeffw1209@yahoo.com', 'jeffw1209@yahoo.com', 'jeffw1209@yahoo.com', '', 0, 'a:1:{s:19:\"jeffw1209@yahoo.com\";s:13:\"6ECsiK4YzoQD!\";}'),
(48, 0, 0, 'fipKsRVa', '1970-01-01', 'Male', 'jeffw1209@yahoo.com', 'jeffw1209@yahoo.com', 'jeffw1209@yahoo.com', 'jeffw1209@yahoo.com', '', 0, 'a:1:{s:19:\"jeffw1209@yahoo.com\";s:13:\"6ECsiK4YzoQD!\";}'),
(49, 0, 0, 'rcNhzCPHeKXyqO', '1970-01-01', 'Male', 'mb7407@aol.com', 'mb7407@aol.com', 'mb7407@aol.com', 'mb7407@aol.com', '', 0, 'a:1:{s:14:\"mb7407@aol.com\";s:13:\"7GAa1mXLBzlq!\";}'),
(50, 0, 0, 'pRKBZDyTf', '1970-01-01', 'Male', 'mb7407@aol.com', 'mb7407@aol.com', 'mb7407@aol.com', 'mb7407@aol.com', '', 0, 'a:1:{s:14:\"mb7407@aol.com\";s:13:\"7GAa1mXLBzlq!\";}'),
(51, 0, 0, 'oKYzdieVkR', '1970-01-01', 'Male', 'wohs2013pg@yahoo.com', 'wohs2013pg@yahoo.com', 'wohs2013pg@yahoo.com', 'wohs2013pg@yahoo.com', '', 0, 'a:1:{s:20:\"wohs2013pg@yahoo.com\";s:13:\"v0AN1ljg2mF0!\";}'),
(52, 0, 0, 'CgPpqGyOveTbI', '1970-01-01', 'Male', 'wohs2013pg@yahoo.com', 'wohs2013pg@yahoo.com', 'wohs2013pg@yahoo.com', 'wohs2013pg@yahoo.com', '', 0, 'a:1:{s:20:\"wohs2013pg@yahoo.com\";s:13:\"v0AN1ljg2mF0!\";}'),
(53, 0, 0, 'iDEClycmYxvOzSba', '1970-01-01', 'Male', 'jonesy3tre@gmail.com', 'jonesy3tre@gmail.com', 'jonesy3tre@gmail.com', 'jonesy3tre@gmail.com', '', 0, 'a:1:{s:20:\"jonesy3tre@gmail.com\";s:13:\"ZQo2Gd4jmO5z!\";}'),
(54, 0, 0, 'gcQJPwBCNdLfvIzo', '1970-01-01', 'Male', 'jonesy3tre@gmail.com', 'jonesy3tre@gmail.com', 'jonesy3tre@gmail.com', 'jonesy3tre@gmail.com', '', 0, 'a:1:{s:20:\"jonesy3tre@gmail.com\";s:13:\"ZQo2Gd4jmO5z!\";}'),
(55, 0, 0, 'rshZQHybTOCP', '1970-01-01', 'Male', 'aldrichstopp@yahoo.com', 'aldrichstopp@yahoo.com', 'aldrichstopp@yahoo.com', 'aldrichstopp@yahoo.com', '', 0, 'a:1:{s:22:\"aldrichstopp@yahoo.com\";s:13:\"z7KZMu0iGpyl!\";}'),
(56, 0, 0, 'rlSKfFUWhTOk', '1970-01-01', 'Male', 'aldrichstopp@yahoo.com', 'aldrichstopp@yahoo.com', 'aldrichstopp@yahoo.com', 'aldrichstopp@yahoo.com', '', 0, 'a:1:{s:22:\"aldrichstopp@yahoo.com\";s:13:\"z7KZMu0iGpyl!\";}'),
(57, 0, 0, 'pgmEjGdiC', '1970-01-01', 'Male', 'wohs2013pg@yahoo.com', 'wohs2013pg@yahoo.com', 'wohs2013pg@yahoo.com', 'wohs2013pg@yahoo.com', '', 0, 'a:1:{s:20:\"wohs2013pg@yahoo.com\";s:13:\"v0AN1ljg2mF0!\";}'),
(58, 0, 0, 'TVZzxCneYU', '1970-01-01', 'Male', 'wohs2013pg@yahoo.com', 'wohs2013pg@yahoo.com', 'wohs2013pg@yahoo.com', 'wohs2013pg@yahoo.com', '', 0, 'a:1:{s:20:\"wohs2013pg@yahoo.com\";s:13:\"v0AN1ljg2mF0!\";}'),
(59, 0, 0, 'ObwaVHEF', '1970-01-01', 'Male', 'horaceunknownbut@yahoo.com', 'horaceunknownbut@yahoo.com', 'horaceunknownbut@yahoo.com', 'horaceunknownbut@yahoo.com', '', 0, 'a:1:{s:26:\"horaceunknownbut@yahoo.com\";s:13:\"x0juvb7TleM0!\";}'),
(60, 0, 0, 'mYvlhuzAE', '1970-01-01', 'Male', 'horaceunknownbut@yahoo.com', 'horaceunknownbut@yahoo.com', 'horaceunknownbut@yahoo.com', 'horaceunknownbut@yahoo.com', '', 0, 'a:1:{s:26:\"horaceunknownbut@yahoo.com\";s:13:\"x0juvb7TleM0!\";}'),
(61, 0, 0, 'fgwTFQBACtp', '1970-01-01', 'Male', 'beckycbm@yahoo.com', 'beckycbm@yahoo.com', 'beckycbm@yahoo.com', 'beckycbm@yahoo.com', '', 0, 'a:1:{s:18:\"beckycbm@yahoo.com\";s:13:\"Z1JSDxUdVcyk!\";}'),
(62, 0, 0, 'LRIxkXZOj', '1970-01-01', 'Male', 'beckycbm@yahoo.com', 'beckycbm@yahoo.com', 'beckycbm@yahoo.com', 'beckycbm@yahoo.com', '', 0, 'a:1:{s:18:\"beckycbm@yahoo.com\";s:13:\"Z1JSDxUdVcyk!\";}'),
(63, 0, 0, 'dYHIQKSm', '1970-01-01', 'Male', 'rithomas2003@yahoo.com', 'rithomas2003@yahoo.com', 'rithomas2003@yahoo.com', 'rithomas2003@yahoo.com', '', 0, 'a:1:{s:22:\"rithomas2003@yahoo.com\";s:13:\"a0o3ND4cGHfy!\";}'),
(64, 0, 0, 'YdWyGJksiufpRLI', '1970-01-01', 'Male', 'rithomas2003@yahoo.com', 'rithomas2003@yahoo.com', 'rithomas2003@yahoo.com', 'rithomas2003@yahoo.com', '', 0, 'a:1:{s:22:\"rithomas2003@yahoo.com\";s:13:\"a0o3ND4cGHfy!\";}'),
(65, 0, 0, 'FCeOBqGXi', '1970-01-01', 'Male', 'minimer53@aol.com', 'minimer53@aol.com', 'minimer53@aol.com', 'minimer53@aol.com', '', 0, 'a:1:{s:17:\"minimer53@aol.com\";s:13:\"mUGRe3pcbZNQ!\";}'),
(66, 0, 0, 'cGgDMyNSVXIar', '1970-01-01', 'Male', 'minimer53@aol.com', 'minimer53@aol.com', 'minimer53@aol.com', 'minimer53@aol.com', '', 0, 'a:1:{s:17:\"minimer53@aol.com\";s:13:\"mUGRe3pcbZNQ!\";}'),
(67, 0, 0, 'gkwHmuFYX', '1970-01-01', 'Male', 'debcastel@hotmail.com', 'debcastel@hotmail.com', 'debcastel@hotmail.com', 'debcastel@hotmail.com', '', 0, 'a:1:{s:21:\"debcastel@hotmail.com\";s:13:\"1PzKkGhaRNdB!\";}'),
(68, 0, 0, 'LmTSlHBdjfkY', '1970-01-01', 'Male', 'debcastel@hotmail.com', 'debcastel@hotmail.com', 'debcastel@hotmail.com', 'debcastel@hotmail.com', '', 0, 'a:1:{s:21:\"debcastel@hotmail.com\";s:13:\"1PzKkGhaRNdB!\";}'),
(69, 0, 0, 'fakmrotu', '1970-01-01', 'Male', 'peesmall@aol.com', 'peesmall@aol.com', 'peesmall@aol.com', 'peesmall@aol.com', '', 0, 'a:1:{s:16:\"peesmall@aol.com\";s:13:\"tRMNneX0xavA!\";}'),
(70, 0, 0, 'YcnlvmXzbe', '1970-01-01', 'Male', 'peesmall@aol.com', 'peesmall@aol.com', 'peesmall@aol.com', 'peesmall@aol.com', '', 0, 'a:1:{s:16:\"peesmall@aol.com\";s:13:\"tRMNneX0xavA!\";}'),
(71, 0, 0, 'JQKXuxCrTsol', '1970-01-01', 'Male', 'csriquelme@comercialrym.es', 'csriquelme@comercialrym.es', 'csriquelme@comercialrym.es', 'csriquelme@comercialrym.es', '', 0, 'a:1:{s:26:\"csriquelme@comercialrym.es\";s:13:\"1msLkEvwz7G9!\";}'),
(72, 0, 0, 'yKxwzTSZpbQmrG', '1970-01-01', 'Male', 'csriquelme@comercialrym.es', 'csriquelme@comercialrym.es', 'csriquelme@comercialrym.es', 'csriquelme@comercialrym.es', '', 0, 'a:1:{s:26:\"csriquelme@comercialrym.es\";s:13:\"1msLkEvwz7G9!\";}'),
(73, 0, 0, 'hEZwCvkLqSrgpWy', '1970-01-01', 'Male', 'edef4210@gmail.com', 'edef4210@gmail.com', 'edef4210@gmail.com', 'edef4210@gmail.com', '', 0, 'a:1:{s:18:\"edef4210@gmail.com\";s:13:\"yLZ1MRHtkK6u!\";}'),
(74, 0, 0, 'LgzFJDuInRTXvaC', '1970-01-01', 'Male', 'edef4210@gmail.com', 'edef4210@gmail.com', 'edef4210@gmail.com', 'edef4210@gmail.com', '', 0, 'a:1:{s:18:\"edef4210@gmail.com\";s:13:\"yLZ1MRHtkK6u!\";}'),
(75, 0, 0, 'zgonivOcLt', '1970-01-01', 'Male', 'blackbear428@verizon.net', 'blackbear428@verizon.net', 'blackbear428@verizon.net', 'blackbear428@verizon.net', '', 0, 'a:1:{s:24:\"blackbear428@verizon.net\";s:13:\"qsT8jHe05EQh!\";}'),
(76, 0, 0, 'muMzvSEIxgaLne', '1970-01-01', 'Male', 'blackbear428@verizon.net', 'blackbear428@verizon.net', 'blackbear428@verizon.net', 'blackbear428@verizon.net', '', 0, 'a:1:{s:24:\"blackbear428@verizon.net\";s:13:\"qsT8jHe05EQh!\";}'),
(77, 0, 0, 'XQJCHlgzTEoj', '1970-01-01', 'Male', 'renegademiyagi@gmail.com', 'renegademiyagi@gmail.com', 'renegademiyagi@gmail.com', 'renegademiyagi@gmail.com', '', 0, 'a:1:{s:24:\"renegademiyagi@gmail.com\";s:13:\"iAgRXUWy7258!\";}'),
(78, 0, 0, 'JlWPZxgHi', '1970-01-01', 'Male', 'renegademiyagi@gmail.com', 'renegademiyagi@gmail.com', 'renegademiyagi@gmail.com', 'renegademiyagi@gmail.com', '', 0, 'a:1:{s:24:\"renegademiyagi@gmail.com\";s:13:\"iAgRXUWy7258!\";}'),
(79, 0, 0, 'xMhlDWRXOw', '1970-01-01', 'Male', '4lindenb@comcast.net', '4lindenb@comcast.net', '4lindenb@comcast.net', '4lindenb@comcast.net', '', 0, 'a:1:{s:20:\"4lindenb@comcast.net\";s:13:\"v0Y1lTo4n0rC!\";}'),
(80, 0, 0, 'HDegOwNxJGjUyn', '1970-01-01', 'Male', '4lindenb@comcast.net', '4lindenb@comcast.net', '4lindenb@comcast.net', '4lindenb@comcast.net', '', 0, 'a:1:{s:20:\"4lindenb@comcast.net\";s:13:\"v0Y1lTo4n0rC!\";}'),
(81, 0, 0, 'gVGyITHXifSumEC', '1970-01-01', 'Male', 'kdbrazil@gmail.com', 'kdbrazil@gmail.com', 'kdbrazil@gmail.com', 'kdbrazil@gmail.com', '', 0, 'a:1:{s:18:\"kdbrazil@gmail.com\";s:13:\"u0dCUcNpl4O2!\";}'),
(82, 0, 0, 'RimaLdrSzM', '1970-01-01', 'Male', 'kdbrazil@gmail.com', 'kdbrazil@gmail.com', 'kdbrazil@gmail.com', 'kdbrazil@gmail.com', '', 0, 'a:1:{s:18:\"kdbrazil@gmail.com\";s:13:\"u0dCUcNpl4O2!\";}'),
(83, 0, 0, 'easPqJtjKIvHhfM', '1970-01-01', 'Male', 'nawalabdul@gmail.com', 'nawalabdul@gmail.com', 'nawalabdul@gmail.com', 'nawalabdul@gmail.com', '', 0, 'a:1:{s:20:\"nawalabdul@gmail.com\";s:13:\"W1a0CoBGTXse!\";}'),
(84, 0, 0, 'ZYoKLTwIljpWy', '1970-01-01', 'Male', 'nawalabdul@gmail.com', 'nawalabdul@gmail.com', 'nawalabdul@gmail.com', 'nawalabdul@gmail.com', '', 0, 'a:1:{s:20:\"nawalabdul@gmail.com\";s:13:\"W1a0CoBGTXse!\";}'),
(85, 0, 0, 'WjDOlPesLBSdrMAi', '1970-01-01', 'Male', 'rbuerki@cox.net', 'rbuerki@cox.net', 'rbuerki@cox.net', 'rbuerki@cox.net', '', 0, 'a:1:{s:15:\"rbuerki@cox.net\";s:13:\"W3b4FiLyNJ2c!\";}'),
(86, 0, 0, 'wvZGeFIaE', '1970-01-01', 'Male', 'rbuerki@cox.net', 'rbuerki@cox.net', 'rbuerki@cox.net', 'rbuerki@cox.net', '', 0, 'a:1:{s:15:\"rbuerki@cox.net\";s:13:\"W3b4FiLyNJ2c!\";}'),
(87, 0, 0, 'wpIEvOBc', '1970-01-01', 'Male', 'michael.block@oicls.com', 'michael.block@oicls.com', 'michael.block@oicls.com', 'michael.block@oicls.com', '', 0, 'a:1:{s:23:\"michael.block@oicls.com\";s:13:\"pcByYNe0AtUu!\";}'),
(88, 0, 0, 'YlVSsATfXjCpJMwr', '1970-01-01', 'Male', 'michael.block@oicls.com', 'michael.block@oicls.com', 'michael.block@oicls.com', 'michael.block@oicls.com', '', 0, 'a:1:{s:23:\"michael.block@oicls.com\";s:13:\"pcByYNe0AtUu!\";}'),
(89, 0, 0, 'HWTaMEJlxQkjA', '1970-01-01', 'Male', 'rej3381@embarqmail.com', 'rej3381@embarqmail.com', 'rej3381@embarqmail.com', 'rej3381@embarqmail.com', '', 0, 'a:1:{s:22:\"rej3381@embarqmail.com\";s:13:\"C75ezdbUv1HF!\";}'),
(90, 0, 0, 'KmqcwetWlpSg', '1970-01-01', 'Male', 'rej3381@embarqmail.com', 'rej3381@embarqmail.com', 'rej3381@embarqmail.com', 'rej3381@embarqmail.com', '', 0, 'a:1:{s:22:\"rej3381@embarqmail.com\";s:13:\"C75ezdbUv1HF!\";}'),
(91, 0, 0, 'KpeVJHORhaAmnQu', '1970-01-01', 'Male', 'kayodeijalana@gmail.com', 'kayodeijalana@gmail.com', 'kayodeijalana@gmail.com', 'kayodeijalana@gmail.com', '', 0, 'a:1:{s:23:\"kayodeijalana@gmail.com\";s:13:\"KBhNu2cXRq7Y!\";}'),
(92, 0, 0, 'vBEDhbMwkOx', '1970-01-01', 'Male', 'kayodeijalana@gmail.com', 'kayodeijalana@gmail.com', 'kayodeijalana@gmail.com', 'kayodeijalana@gmail.com', '', 0, 'a:1:{s:23:\"kayodeijalana@gmail.com\";s:13:\"KBhNu2cXRq7Y!\";}'),
(93, 0, 0, 'FaYngCXWIt', '1970-01-01', 'Male', 'bstoneaz79@gmail.com', 'bstoneaz79@gmail.com', 'bstoneaz79@gmail.com', 'bstoneaz79@gmail.com', '', 0, 'a:1:{s:20:\"bstoneaz79@gmail.com\";s:13:\"giDwU89szTt2!\";}'),
(94, 0, 0, 'HkFJGTjK', '1970-01-01', 'Male', 'bstoneaz79@gmail.com', 'bstoneaz79@gmail.com', 'bstoneaz79@gmail.com', 'bstoneaz79@gmail.com', '', 0, 'a:1:{s:20:\"bstoneaz79@gmail.com\";s:13:\"giDwU89szTt2!\";}'),
(95, 0, 0, 'fLdCsYRuMm', '1970-01-01', 'Male', 'nella.a@comcast.net', 'nella.a@comcast.net', 'nella.a@comcast.net', 'nella.a@comcast.net', '', 0, 'a:1:{s:19:\"nella.a@comcast.net\";s:13:\"QvNuHBjwi8ZF!\";}'),
(96, 0, 0, 'QZdgcmkB', '1970-01-01', 'Male', 'nella.a@comcast.net', 'nella.a@comcast.net', 'nella.a@comcast.net', 'nella.a@comcast.net', '', 0, 'a:1:{s:19:\"nella.a@comcast.net\";s:13:\"QvNuHBjwi8ZF!\";}'),
(97, 0, 0, 'MDxWXzrJR', '1970-01-01', 'Male', 'flaviatamieli7@gmail.com', 'flaviatamieli7@gmail.com', 'flaviatamieli7@gmail.com', 'flaviatamieli7@gmail.com', '', 0, 'a:1:{s:24:\"flaviatamieli7@gmail.com\";s:13:\"Dh6yK58l2NqX!\";}'),
(98, 0, 0, 'bdHqOFeXAzkVpx', '1970-01-01', 'Male', 'flaviatamieli7@gmail.com', 'flaviatamieli7@gmail.com', 'flaviatamieli7@gmail.com', 'flaviatamieli7@gmail.com', '', 0, 'a:1:{s:24:\"flaviatamieli7@gmail.com\";s:13:\"Dh6yK58l2NqX!\";}'),
(99, 0, 0, 'bBWxYyZvRepjDQX', '1970-01-01', 'Male', 'brookwilson416@gmail.com', 'brookwilson416@gmail.com', 'brookwilson416@gmail.com', 'brookwilson416@gmail.com', '', 0, 'a:1:{s:24:\"brookwilson416@gmail.com\";s:13:\"wR4EfXPhWZob!\";}'),
(100, 0, 0, 'lDpgQUCRLNuVZ', '1970-01-01', 'Male', 'brookwilson416@gmail.com', 'brookwilson416@gmail.com', 'brookwilson416@gmail.com', 'brookwilson416@gmail.com', '', 0, 'a:1:{s:24:\"brookwilson416@gmail.com\";s:13:\"wR4EfXPhWZob!\";}'),
(101, 0, 0, 'acjALxTgMEpedPO', '1970-01-01', 'Male', 'patriciadavis5975@gmail.com', 'patriciadavis5975@gmail.com', 'patriciadavis5975@gmail.com', 'patriciadavis5975@gmail.com', '', 0, 'a:1:{s:27:\"patriciadavis5975@gmail.com\";s:13:\"Ix5nMv9tOoG7!\";}'),
(102, 0, 0, 'VviakoMPFJze', '1970-01-01', 'Male', 'patriciadavis5975@gmail.com', 'patriciadavis5975@gmail.com', 'patriciadavis5975@gmail.com', 'patriciadavis5975@gmail.com', '', 0, 'a:1:{s:27:\"patriciadavis5975@gmail.com\";s:13:\"Ix5nMv9tOoG7!\";}'),
(103, 0, 0, 'JungklZeiOAVxIj', '1970-01-01', 'Male', 'isaac.walberg@gmail.com', 'isaac.walberg@gmail.com', 'isaac.walberg@gmail.com', 'isaac.walberg@gmail.com', '', 0, 'a:1:{s:23:\"isaac.walberg@gmail.com\";s:13:\"N32gMKtHGBaF!\";}'),
(104, 0, 0, 'pyECAtunUNQqBma', '1970-01-01', 'Male', 'isaac.walberg@gmail.com', 'isaac.walberg@gmail.com', 'isaac.walberg@gmail.com', 'isaac.walberg@gmail.com', '', 0, 'a:1:{s:23:\"isaac.walberg@gmail.com\";s:13:\"N32gMKtHGBaF!\";}'),
(105, 0, 0, 'NphjewXi', '1970-01-01', 'Male', 'thegeisels@outlook.com', 'thegeisels@outlook.com', 'thegeisels@outlook.com', 'thegeisels@outlook.com', '', 0, 'a:1:{s:22:\"thegeisels@outlook.com\";s:13:\"VgRopYD53BXf!\";}'),
(106, 0, 0, 'rKxucRINoCG', '1970-01-01', 'Male', 'thegeisels@outlook.com', 'thegeisels@outlook.com', 'thegeisels@outlook.com', 'thegeisels@outlook.com', '', 0, 'a:1:{s:22:\"thegeisels@outlook.com\";s:13:\"VgRopYD53BXf!\";}'),
(107, 0, 0, 'EBjQRXHye', '1970-01-01', 'Male', 'ahgerkman@gmail.com', 'ahgerkman@gmail.com', 'ahgerkman@gmail.com', 'ahgerkman@gmail.com', '', 0, 'a:1:{s:19:\"ahgerkman@gmail.com\";s:13:\"9BXY0pIGArWe!\";}'),
(108, 0, 0, 'cpCueWSrdPR', '1970-01-01', 'Male', 'ahgerkman@gmail.com', 'ahgerkman@gmail.com', 'ahgerkman@gmail.com', 'ahgerkman@gmail.com', '', 0, 'a:1:{s:19:\"ahgerkman@gmail.com\";s:13:\"9BXY0pIGArWe!\";}'),
(109, 0, 0, 'ptwsyOPAl', '1970-01-01', 'Male', 'devjgibson@gmail.com', 'devjgibson@gmail.com', 'devjgibson@gmail.com', 'devjgibson@gmail.com', '', 0, 'a:1:{s:20:\"devjgibson@gmail.com\";s:13:\"oKfhkNsbtEV2!\";}'),
(110, 0, 0, 'krphyDRsTUgE', '1970-01-01', 'Male', 'devjgibson@gmail.com', 'devjgibson@gmail.com', 'devjgibson@gmail.com', 'devjgibson@gmail.com', '', 0, 'a:1:{s:20:\"devjgibson@gmail.com\";s:13:\"oKfhkNsbtEV2!\";}'),
(111, 0, 0, 'SyVEkxvJM', '1970-01-01', 'Male', 'halliman.liam@yahoo.com', 'halliman.liam@yahoo.com', 'halliman.liam@yahoo.com', 'halliman.liam@yahoo.com', '', 0, 'a:1:{s:23:\"halliman.liam@yahoo.com\";s:13:\"72Dp0kxCev9X!\";}'),
(112, 0, 0, 'MnHDWgvpYo', '1970-01-01', 'Male', 'halliman.liam@yahoo.com', 'halliman.liam@yahoo.com', 'halliman.liam@yahoo.com', 'halliman.liam@yahoo.com', '', 0, 'a:1:{s:23:\"halliman.liam@yahoo.com\";s:13:\"72Dp0kxCev9X!\";}'),
(113, 0, 0, 'kLfcGqmwU', '1970-01-01', 'Male', 'mooware@comcast.net', 'mooware@comcast.net', 'mooware@comcast.net', 'mooware@comcast.net', '', 0, 'a:1:{s:19:\"mooware@comcast.net\";s:13:\"vQhj3Uta7mHL!\";}'),
(114, 0, 0, 'LwhdDvijNVSkBty', '1970-01-01', 'Male', 'mooware@comcast.net', 'mooware@comcast.net', 'mooware@comcast.net', 'mooware@comcast.net', '', 0, 'a:1:{s:19:\"mooware@comcast.net\";s:13:\"vQhj3Uta7mHL!\";}'),
(115, 0, 0, 'BFxPTMCwbnQauXrY', '1970-01-01', 'Male', 'sckemeter@gmail.com', 'sckemeter@gmail.com', 'sckemeter@gmail.com', 'sckemeter@gmail.com', '', 0, 'a:1:{s:19:\"sckemeter@gmail.com\";s:13:\"52Q6tn70icCs!\";}'),
(116, 0, 0, 'iFpqZWVjEHe', '1970-01-01', 'Male', 'sckemeter@gmail.com', 'sckemeter@gmail.com', 'sckemeter@gmail.com', 'sckemeter@gmail.com', '', 0, 'a:1:{s:19:\"sckemeter@gmail.com\";s:13:\"52Q6tn70icCs!\";}'),
(117, 0, 0, 'XtdJamRfAGvYbk', '1970-01-01', 'Male', 'jkfrost2000@gmail.com', 'jkfrost2000@gmail.com', 'jkfrost2000@gmail.com', 'jkfrost2000@gmail.com', '', 0, 'a:1:{s:21:\"jkfrost2000@gmail.com\";s:13:\"xaCqbd2FGtyh!\";}'),
(118, 0, 0, 'uidIcKnXwbhTRSUO', '1970-01-01', 'Male', 'jkfrost2000@gmail.com', 'jkfrost2000@gmail.com', 'jkfrost2000@gmail.com', 'jkfrost2000@gmail.com', '', 0, 'a:1:{s:21:\"jkfrost2000@gmail.com\";s:13:\"xaCqbd2FGtyh!\";}'),
(119, 0, 0, 'GlrZsIkVAHumxtT', '1970-01-01', 'Male', 'draimondi2019@gmail.com', 'draimondi2019@gmail.com', 'draimondi2019@gmail.com', 'draimondi2019@gmail.com', '', 0, 'a:1:{s:23:\"draimondi2019@gmail.com\";s:13:\"MFfHWhPEAj64!\";}'),
(120, 0, 0, 'PDWSJICtGMx', '1970-01-01', 'Male', 'draimondi2019@gmail.com', 'draimondi2019@gmail.com', 'draimondi2019@gmail.com', 'draimondi2019@gmail.com', '', 0, 'a:1:{s:23:\"draimondi2019@gmail.com\";s:13:\"MFfHWhPEAj64!\";}'),
(121, 0, 0, 'BpVzxIrN', '1970-01-01', 'Male', 'browntm@windstream.net', 'browntm@windstream.net', 'browntm@windstream.net', 'browntm@windstream.net', '', 0, 'a:1:{s:22:\"browntm@windstream.net\";s:13:\"EwLtaSdFU3v0!\";}'),
(122, 0, 0, 'vRsmkVDpwtB', '1970-01-01', 'Male', 'browntm@windstream.net', 'browntm@windstream.net', 'browntm@windstream.net', 'browntm@windstream.net', '', 0, 'a:1:{s:22:\"browntm@windstream.net\";s:13:\"EwLtaSdFU3v0!\";}'),
(123, 0, 0, 'xlmVXcgQrLAbafMi', '1970-01-01', 'Male', 'tonnie.dick@yahoo.com', 'tonnie.dick@yahoo.com', 'tonnie.dick@yahoo.com', 'tonnie.dick@yahoo.com', '', 0, 'a:1:{s:21:\"tonnie.dick@yahoo.com\";s:13:\"qjld1ZvSbOw8!\";}'),
(124, 0, 0, 'wDbmcFaTxd', '1970-01-01', 'Male', 'tonnie.dick@yahoo.com', 'tonnie.dick@yahoo.com', 'tonnie.dick@yahoo.com', 'tonnie.dick@yahoo.com', '', 0, 'a:1:{s:21:\"tonnie.dick@yahoo.com\";s:13:\"qjld1ZvSbOw8!\";}'),
(125, 0, 0, 'RQmujdsMnvwczlp', '1970-01-01', 'Male', 'teresaleskew@cox.net', 'teresaleskew@cox.net', 'teresaleskew@cox.net', 'teresaleskew@cox.net', '', 0, 'a:1:{s:20:\"teresaleskew@cox.net\";s:13:\"X3wDrRZPo0tp!\";}'),
(126, 0, 0, 'lEUasVMrOBwbi', '1970-01-01', 'Male', 'teresaleskew@cox.net', 'teresaleskew@cox.net', 'teresaleskew@cox.net', 'teresaleskew@cox.net', '', 0, 'a:1:{s:20:\"teresaleskew@cox.net\";s:13:\"X3wDrRZPo0tp!\";}'),
(127, 0, 0, 'iAYVsLyftZo', '1970-01-01', 'Male', 'jmarello@cox.net', 'jmarello@cox.net', 'jmarello@cox.net', 'jmarello@cox.net', '', 0, 'a:1:{s:16:\"jmarello@cox.net\";s:13:\"Io0Y37ynTu9e!\";}'),
(128, 0, 0, 'LCfHpuZqJSwTWkdx', '1970-01-01', 'Male', 'jmarello@cox.net', 'jmarello@cox.net', 'jmarello@cox.net', 'jmarello@cox.net', '', 0, 'a:1:{s:16:\"jmarello@cox.net\";s:13:\"Io0Y37ynTu9e!\";}'),
(129, 0, 0, 'fzIhQgCjaVP', '1970-01-01', 'Male', 'marymartin9077@gmail.com', 'marymartin9077@gmail.com', 'marymartin9077@gmail.com', 'marymartin9077@gmail.com', '', 0, 'a:1:{s:24:\"marymartin9077@gmail.com\";s:13:\"0Epr8Z14HOBL!\";}'),
(130, 0, 0, 'GdReVtLIJUDP', '1970-01-01', 'Male', 'marymartin9077@gmail.com', 'marymartin9077@gmail.com', 'marymartin9077@gmail.com', 'marymartin9077@gmail.com', '', 0, 'a:1:{s:24:\"marymartin9077@gmail.com\";s:13:\"0Epr8Z14HOBL!\";}'),
(131, 0, 0, 'arBYHUZIqKslWLb', '1970-01-01', 'Male', 'rohrabacher.hobard@yahoo.com', 'rohrabacher.hobard@yahoo.com', 'rohrabacher.hobard@yahoo.com', 'rohrabacher.hobard@yahoo.com', '', 0, 'a:1:{s:28:\"rohrabacher.hobard@yahoo.com\";s:13:\"fURTewEjQWI4!\";}'),
(132, 0, 0, 'OcgYbASP', '1970-01-01', 'Male', 'rohrabacher.hobard@yahoo.com', 'rohrabacher.hobard@yahoo.com', 'rohrabacher.hobard@yahoo.com', 'rohrabacher.hobard@yahoo.com', '', 0, 'a:1:{s:28:\"rohrabacher.hobard@yahoo.com\";s:13:\"fURTewEjQWI4!\";}'),
(133, 0, 0, 'HkWOEgCXwMh', '1970-01-01', 'Male', 'llloyd57@yahoo.com', 'llloyd57@yahoo.com', 'llloyd57@yahoo.com', 'llloyd57@yahoo.com', '', 0, 'a:1:{s:18:\"llloyd57@yahoo.com\";s:13:\"p2aFMHtzg7Ch!\";}'),
(134, 0, 0, 'daAlXRLbx', '1970-01-01', 'Male', 'llloyd57@yahoo.com', 'llloyd57@yahoo.com', 'llloyd57@yahoo.com', 'llloyd57@yahoo.com', '', 0, 'a:1:{s:18:\"llloyd57@yahoo.com\";s:13:\"p2aFMHtzg7Ch!\";}'),
(135, 0, 0, 'JYDEovSX', '1970-01-01', 'Male', 'elinorwilkerson8@gmail.com', 'elinorwilkerson8@gmail.com', 'elinorwilkerson8@gmail.com', 'elinorwilkerson8@gmail.com', '', 0, 'a:1:{s:26:\"elinorwilkerson8@gmail.com\";s:13:\"24Uz0qTeWmF8!\";}'),
(136, 0, 0, 'EqJMWRouaip', '1970-01-01', 'Male', 'elinorwilkerson8@gmail.com', 'elinorwilkerson8@gmail.com', 'elinorwilkerson8@gmail.com', 'elinorwilkerson8@gmail.com', '', 0, 'a:1:{s:26:\"elinorwilkerson8@gmail.com\";s:13:\"24Uz0qTeWmF8!\";}'),
(137, 0, 0, 'wCPKHykZTAqagDY', '1970-01-01', 'Male', 'ecroydgery@yahoo.com', 'ecroydgery@yahoo.com', 'ecroydgery@yahoo.com', 'ecroydgery@yahoo.com', '', 0, 'a:1:{s:20:\"ecroydgery@yahoo.com\";s:13:\"S9ciYkXZbjC0!\";}'),
(138, 0, 0, 'GbYeXEcPfUhAJyn', '1970-01-01', 'Male', 'ecroydgery@yahoo.com', 'ecroydgery@yahoo.com', 'ecroydgery@yahoo.com', 'ecroydgery@yahoo.com', '', 0, 'a:1:{s:20:\"ecroydgery@yahoo.com\";s:13:\"S9ciYkXZbjC0!\";}'),
(139, 0, 0, 'VEelPRiKdUQZD', '1970-01-01', 'Male', 'baylor.carey@yahoo.com', 'baylor.carey@yahoo.com', 'baylor.carey@yahoo.com', 'baylor.carey@yahoo.com', '', 0, 'a:1:{s:22:\"baylor.carey@yahoo.com\";s:13:\"g7T6qfO8zyoJ!\";}'),
(140, 0, 0, 'OjdkCgfynpKhT', '1970-01-01', 'Male', 'baylor.carey@yahoo.com', 'baylor.carey@yahoo.com', 'baylor.carey@yahoo.com', 'baylor.carey@yahoo.com', '', 0, 'a:1:{s:22:\"baylor.carey@yahoo.com\";s:13:\"g7T6qfO8zyoJ!\";}'),
(141, 0, 0, 'HixreNhkYjwESv', '1970-01-01', 'Male', 'williamsonarleen767@gmail.com', 'williamsonarleen767@gmail.com', 'williamsonarleen767@gmail.com', 'williamsonarleen767@gmail.com', '', 0, 'a:1:{s:29:\"williamsonarleen767@gmail.com\";s:13:\"iMGn4SpUdhwm!\";}'),
(142, 0, 0, 'yTSDFwYAK', '1970-01-01', 'Male', 'williamsonarleen767@gmail.com', 'williamsonarleen767@gmail.com', 'williamsonarleen767@gmail.com', 'williamsonarleen767@gmail.com', '', 0, 'a:1:{s:29:\"williamsonarleen767@gmail.com\";s:13:\"iMGn4SpUdhwm!\";}'),
(143, 0, 0, 'QDOKWlNHAa', '1970-01-01', 'Male', 'winsland.dom@yahoo.com', 'winsland.dom@yahoo.com', 'winsland.dom@yahoo.com', 'winsland.dom@yahoo.com', '', 0, 'a:1:{s:22:\"winsland.dom@yahoo.com\";s:13:\"HChGmJKxLqn2!\";}'),
(144, 0, 0, 'DciUxZHesmOYuWgB', '1970-01-01', 'Male', 'winsland.dom@yahoo.com', 'winsland.dom@yahoo.com', 'winsland.dom@yahoo.com', 'winsland.dom@yahoo.com', '', 0, 'a:1:{s:22:\"winsland.dom@yahoo.com\";s:13:\"HChGmJKxLqn2!\";}'),
(145, 0, 0, 'fjTMELcZCDRNudSh', '1970-01-01', 'Male', 'merritf1@earthlink.net', 'merritf1@earthlink.net', 'merritf1@earthlink.net', 'merritf1@earthlink.net', '', 0, 'a:1:{s:22:\"merritf1@earthlink.net\";s:13:\"6rz4yYctRxKv!\";}'),
(146, 0, 0, 'EHILMRqoTepGizB', '1970-01-01', 'Male', 'merritf1@earthlink.net', 'merritf1@earthlink.net', 'merritf1@earthlink.net', 'merritf1@earthlink.net', '', 0, 'a:1:{s:22:\"merritf1@earthlink.net\";s:13:\"6rz4yYctRxKv!\";}'),
(147, 0, 0, 'TxSEvsNzDVG', '1970-01-01', 'Male', 'smmoll@msn.com', 'smmoll@msn.com', 'smmoll@msn.com', 'smmoll@msn.com', '', 0, 'a:1:{s:14:\"smmoll@msn.com\";s:13:\"48kXjsagESbf!\";}'),
(148, 0, 0, 'vONYVoDJBhqRQaW', '1970-01-01', 'Male', 'msrebacaffee@gmail.com', 'msrebacaffee@gmail.com', 'msrebacaffee@gmail.com', 'msrebacaffee@gmail.com', '', 0, 'a:1:{s:22:\"msrebacaffee@gmail.com\";s:13:\"vK30LAwQC8zT!\";}'),
(149, 0, 0, 'etQfJxuHy', '1970-01-01', 'Male', 'msrebacaffee@gmail.com', 'msrebacaffee@gmail.com', 'msrebacaffee@gmail.com', 'msrebacaffee@gmail.com', '', 0, 'a:1:{s:22:\"msrebacaffee@gmail.com\";s:13:\"vK30LAwQC8zT!\";}'),
(150, 0, 0, 'HixbPnpwrdmu', '1970-01-01', 'Male', 'jody_thomas001@comcast.net', 'jody_thomas001@comcast.net', 'jody_thomas001@comcast.net', 'jody_thomas001@comcast.net', '', 0, 'a:1:{s:26:\"jody_thomas001@comcast.net\";s:13:\"GKme7gYFvr1s!\";}'),
(151, 0, 0, 'chqWNiMsaroPgbv', '1970-01-01', 'Male', 'jody_thomas001@comcast.net', 'jody_thomas001@comcast.net', 'jody_thomas001@comcast.net', 'jody_thomas001@comcast.net', '', 0, 'a:1:{s:26:\"jody_thomas001@comcast.net\";s:13:\"GKme7gYFvr1s!\";}'),
(152, 0, 0, 'ecfMHXTGnlD', '1970-01-01', 'Male', 'john@belsitoassociates.com', 'john@belsitoassociates.com', 'john@belsitoassociates.com', 'john@belsitoassociates.com', '', 0, 'a:1:{s:26:\"john@belsitoassociates.com\";s:13:\"2FVkb5BfXiQj!\";}'),
(153, 0, 0, 'wEfiQBdvukqYjI', '1970-01-01', 'Male', 'john@belsitoassociates.com', 'john@belsitoassociates.com', 'john@belsitoassociates.com', 'john@belsitoassociates.com', '', 0, 'a:1:{s:26:\"john@belsitoassociates.com\";s:13:\"2FVkb5BfXiQj!\";}'),
(154, 0, 0, 'JMrqesxUmQF', '1970-01-01', 'Male', 'holtmainstone@yahoo.com', 'holtmainstone@yahoo.com', 'holtmainstone@yahoo.com', 'holtmainstone@yahoo.com', '', 0, 'a:1:{s:23:\"holtmainstone@yahoo.com\";s:13:\"oZd2fzQteWaC!\";}'),
(155, 0, 0, 'tdeICoJFYKRX', '1970-01-01', 'Male', 'holtmainstone@yahoo.com', 'holtmainstone@yahoo.com', 'holtmainstone@yahoo.com', 'holtmainstone@yahoo.com', '', 0, 'a:1:{s:23:\"holtmainstone@yahoo.com\";s:13:\"oZd2fzQteWaC!\";}'),
(156, 0, 0, 'iSfKEVAkczvrdD', '1970-01-01', 'Male', 'tim.reid@southwire.com', 'tim.reid@southwire.com', 'tim.reid@southwire.com', 'tim.reid@southwire.com', '', 0, 'a:1:{s:22:\"tim.reid@southwire.com\";s:13:\"iDN6W2ZYh7u4!\";}'),
(157, 0, 0, 'ObVzlYps', '1970-01-01', 'Male', 'tim.reid@southwire.com', 'tim.reid@southwire.com', 'tim.reid@southwire.com', 'tim.reid@southwire.com', '', 0, 'a:1:{s:22:\"tim.reid@southwire.com\";s:13:\"iDN6W2ZYh7u4!\";}'),
(158, 0, 0, 'RPZzeWhFyKCmjX', '1970-01-01', 'Male', 'greencolton70@gmail.com', 'greencolton70@gmail.com', 'greencolton70@gmail.com', 'greencolton70@gmail.com', '', 0, 'a:1:{s:23:\"greencolton70@gmail.com\";s:13:\"yV9cmIlrFeLj!\";}'),
(159, 0, 0, 'ngFQOCjUY', '1970-01-01', 'Male', 'greencolton70@gmail.com', 'greencolton70@gmail.com', 'greencolton70@gmail.com', 'greencolton70@gmail.com', '', 0, 'a:1:{s:23:\"greencolton70@gmail.com\";s:13:\"yV9cmIlrFeLj!\";}'),
(160, 0, 0, 'FJphyoTeUq', '1970-01-01', 'Male', 'tom@hometek.org', 'tom@hometek.org', 'tom@hometek.org', 'tom@hometek.org', '', 0, 'a:1:{s:15:\"tom@hometek.org\";s:13:\"5pzYe1s4yhqL!\";}'),
(161, 0, 0, 'xjqwWEYJPScNou', '1970-01-01', 'Male', 'tom@hometek.org', 'tom@hometek.org', 'tom@hometek.org', 'tom@hometek.org', '', 0, 'a:1:{s:15:\"tom@hometek.org\";s:13:\"5pzYe1s4yhqL!\";}'),
(162, 0, 0, 'sIaSwqZl', '1970-01-01', 'Male', 'cgignac47@gmail.com', 'cgignac47@gmail.com', 'cgignac47@gmail.com', 'cgignac47@gmail.com', '', 0, 'a:1:{s:19:\"cgignac47@gmail.com\";s:13:\"lFhA4tN7IpxS!\";}'),
(163, 0, 0, 'ZvPYblVO', '1970-01-01', 'Male', 'cgignac47@gmail.com', 'cgignac47@gmail.com', 'cgignac47@gmail.com', 'cgignac47@gmail.com', '', 0, 'a:1:{s:19:\"cgignac47@gmail.com\";s:13:\"lFhA4tN7IpxS!\";}'),
(164, 0, 0, 'LFnpCyBzrmwoWsY', '1970-01-01', 'Male', 'mccormickrobert014@gmail.com', 'mccormickrobert014@gmail.com', 'mccormickrobert014@gmail.com', 'mccormickrobert014@gmail.com', '', 0, 'a:1:{s:28:\"mccormickrobert014@gmail.com\";s:13:\"G6jpU2rV7eKW!\";}'),
(165, 0, 0, 'ckPawZptvMIKqF', '1970-01-01', 'Male', 'mccormickrobert014@gmail.com', 'mccormickrobert014@gmail.com', 'mccormickrobert014@gmail.com', 'mccormickrobert014@gmail.com', '', 0, 'a:1:{s:28:\"mccormickrobert014@gmail.com\";s:13:\"G6jpU2rV7eKW!\";}'),
(166, 0, 0, 'fthwZUPYujK', '1970-01-01', 'Male', 'coritaselby@gmail.com', 'coritaselby@gmail.com', 'coritaselby@gmail.com', 'coritaselby@gmail.com', '', 0, 'a:1:{s:21:\"coritaselby@gmail.com\";s:13:\"nyskvQ5Wzupi!\";}'),
(167, 0, 0, 'XRfUcFBhQ', '1970-01-01', 'Male', 'coritaselby@gmail.com', 'coritaselby@gmail.com', 'coritaselby@gmail.com', 'coritaselby@gmail.com', '', 0, 'a:1:{s:21:\"coritaselby@gmail.com\";s:13:\"nyskvQ5Wzupi!\";}'),
(168, 0, 0, 'pKQyBEoqIlv', '1970-01-01', 'Male', 'joshua.t.riddle@hotmail.com', 'joshua.t.riddle@hotmail.com', 'joshua.t.riddle@hotmail.com', 'joshua.t.riddle@hotmail.com', '', 0, 'a:1:{s:27:\"joshua.t.riddle@hotmail.com\";s:13:\"S6FIwt7EkQDV!\";}'),
(169, 0, 0, 'RxZnfEtFGwMhuPL', '1970-01-01', 'Male', 'ingmar.mimmack@yahoo.com', 'ingmar.mimmack@yahoo.com', 'ingmar.mimmack@yahoo.com', 'ingmar.mimmack@yahoo.com', '', 0, 'a:1:{s:24:\"ingmar.mimmack@yahoo.com\";s:13:\"qbhwEWR1e2dj!\";}'),
(170, 0, 0, 'VuUboRNhYwrHA', '1970-01-01', 'Male', 'ingmar.mimmack@yahoo.com', 'ingmar.mimmack@yahoo.com', 'ingmar.mimmack@yahoo.com', 'ingmar.mimmack@yahoo.com', '', 0, 'a:1:{s:24:\"ingmar.mimmack@yahoo.com\";s:13:\"qbhwEWR1e2dj!\";}'),
(171, 0, 0, 'uiNlasDpP', '1970-01-01', 'Male', 'sandra.johnson@hqda.army.mil', 'sandra.johnson@hqda.army.mil', 'sandra.johnson@hqda.army.mil', 'sandra.johnson@hqda.army.mil', '', 0, 'a:1:{s:28:\"sandra.johnson@hqda.army.mil\";s:13:\"LDjCdfw48XAa!\";}'),
(172, 0, 0, 'adXehJVHL', '1970-01-01', 'Male', 'sandra.johnson@hqda.army.mil', 'sandra.johnson@hqda.army.mil', 'sandra.johnson@hqda.army.mil', 'sandra.johnson@hqda.army.mil', '', 0, 'a:1:{s:28:\"sandra.johnson@hqda.army.mil\";s:13:\"LDjCdfw48XAa!\";}'),
(173, 0, 0, 'RiqLcjlTXdO', '1970-01-01', 'Male', 'agstetson@msn.com', 'agstetson@msn.com', 'agstetson@msn.com', 'agstetson@msn.com', '', 0, 'a:1:{s:17:\"agstetson@msn.com\";s:13:\"TCNQnri1LaXm!\";}'),
(174, 0, 0, 'AMEVIhGanzo', '1970-01-01', 'Male', 'agstetson@msn.com', 'agstetson@msn.com', 'agstetson@msn.com', 'agstetson@msn.com', '', 0, 'a:1:{s:17:\"agstetson@msn.com\";s:13:\"TCNQnri1LaXm!\";}'),
(175, 0, 0, 'CayxSHGRj', '1970-01-01', 'Male', 'lisa@bigdpaving.com', 'lisa@bigdpaving.com', 'lisa@bigdpaving.com', 'lisa@bigdpaving.com', '', 0, 'a:1:{s:19:\"lisa@bigdpaving.com\";s:13:\"FgV68Cz07DlW!\";}'),
(176, 0, 0, 'EWASituNHlz', '1970-01-01', 'Male', 'lisa@bigdpaving.com', 'lisa@bigdpaving.com', 'lisa@bigdpaving.com', 'lisa@bigdpaving.com', '', 0, 'a:1:{s:19:\"lisa@bigdpaving.com\";s:13:\"FgV68Cz07DlW!\";}'),
(177, 0, 0, 'QxUhscdlkoGCytIv', '1970-01-01', 'Male', 'bjeanmarm@gmail.com', 'bjeanmarm@gmail.com', 'bjeanmarm@gmail.com', 'bjeanmarm@gmail.com', '', 0, 'a:1:{s:19:\"bjeanmarm@gmail.com\";s:13:\"YrR0fiBnVTmU!\";}'),
(178, 0, 0, 'HoIWdklLaBORbFTu', '1970-01-01', 'Male', 'bjeanmarm@gmail.com', 'bjeanmarm@gmail.com', 'bjeanmarm@gmail.com', 'bjeanmarm@gmail.com', '', 0, 'a:1:{s:19:\"bjeanmarm@gmail.com\";s:13:\"YrR0fiBnVTmU!\";}'),
(179, 0, 0, 'mEefgoVhlXiB', '1970-01-01', 'Male', 'lisa@bigdpaving.com', 'lisa@bigdpaving.com', 'lisa@bigdpaving.com', 'lisa@bigdpaving.com', '', 0, 'a:1:{s:19:\"lisa@bigdpaving.com\";s:13:\"FgV68Cz07DlW!\";}'),
(180, 0, 0, 'sNkTdrSKv', '1970-01-01', 'Male', 'lisa@bigdpaving.com', 'lisa@bigdpaving.com', 'lisa@bigdpaving.com', 'lisa@bigdpaving.com', '', 0, 'a:1:{s:19:\"lisa@bigdpaving.com\";s:13:\"FgV68Cz07DlW!\";}'),
(181, 0, 0, 'SIctexraELX', '1970-01-01', 'Male', 'cdanderson2468@hotmail.com', 'cdanderson2468@hotmail.com', 'cdanderson2468@hotmail.com', 'cdanderson2468@hotmail.com', '', 0, 'a:1:{s:26:\"cdanderson2468@hotmail.com\";s:13:\"BkqHM8cYUEo0!\";}'),
(182, 0, 0, 'eNELzamXpOqVTG', '1970-01-01', 'Male', 'cdanderson2468@hotmail.com', 'cdanderson2468@hotmail.com', 'cdanderson2468@hotmail.com', 'cdanderson2468@hotmail.com', '', 0, 'a:1:{s:26:\"cdanderson2468@hotmail.com\";s:13:\"BkqHM8cYUEo0!\";}'),
(183, 0, 0, 'aZbXLxOIEUhjY', '1970-01-01', 'Male', 'gene.msa@outlook.com', 'gene.msa@outlook.com', 'gene.msa@outlook.com', 'gene.msa@outlook.com', '', 0, 'a:1:{s:20:\"gene.msa@outlook.com\";s:13:\"eMw2LmPDQY6p!\";}'),
(184, 0, 0, 'sWGpnyqLDASh', '1970-01-01', 'Male', 'gene.msa@outlook.com', 'gene.msa@outlook.com', 'gene.msa@outlook.com', 'gene.msa@outlook.com', '', 0, 'a:1:{s:20:\"gene.msa@outlook.com\";s:13:\"eMw2LmPDQY6p!\";}'),
(185, 0, 0, 'XURkWgBAEorib', '1970-01-01', 'Male', 'benny.farmary@yahoo.com', 'benny.farmary@yahoo.com', 'benny.farmary@yahoo.com', 'benny.farmary@yahoo.com', '', 0, 'a:1:{s:23:\"benny.farmary@yahoo.com\";s:13:\"4zL90WVaQlnO!\";}'),
(186, 0, 0, 'CBaLkwDSOzNAYiH', '1970-01-01', 'Male', 'benny.farmary@yahoo.com', 'benny.farmary@yahoo.com', 'benny.farmary@yahoo.com', 'benny.farmary@yahoo.com', '', 0, 'a:1:{s:23:\"benny.farmary@yahoo.com\";s:13:\"4zL90WVaQlnO!\";}'),
(187, 0, 0, 'GqBLFmoAjK', '1970-01-01', 'Male', 'treyaubr@gmail.com', 'treyaubr@gmail.com', 'treyaubr@gmail.com', 'treyaubr@gmail.com', '', 0, 'a:1:{s:18:\"treyaubr@gmail.com\";s:13:\"GuZ0fEb2JF5N!\";}'),
(188, 0, 0, 'YgizdVswRlIHrTub', '1970-01-01', 'Male', 'treyaubr@gmail.com', 'treyaubr@gmail.com', 'treyaubr@gmail.com', 'treyaubr@gmail.com', '', 0, 'a:1:{s:18:\"treyaubr@gmail.com\";s:13:\"GuZ0fEb2JF5N!\";}'),
(189, 0, 0, 'mcbsJdpvWhLaorfF', '1970-01-01', 'Male', 'gookrules@gmail.com', 'gookrules@gmail.com', 'gookrules@gmail.com', 'gookrules@gmail.com', '', 0, 'a:1:{s:19:\"gookrules@gmail.com\";s:13:\"RDX32LvVKw7h!\";}'),
(190, 0, 0, 'SVDRYkOi', '1970-01-01', 'Male', 'ichenc@me.com', 'ichenc@me.com', 'ichenc@me.com', 'ichenc@me.com', '', 0, 'a:1:{s:13:\"ichenc@me.com\";s:13:\"mD5R0GVr0on2!\";}'),
(191, 0, 0, 'bGSFEwlTMCfhrcvt', '1970-01-01', 'Male', 'ichenc@me.com', 'ichenc@me.com', 'ichenc@me.com', 'ichenc@me.com', '', 0, 'a:1:{s:13:\"ichenc@me.com\";s:13:\"mD5R0GVr0on2!\";}'),
(192, 0, 0, 'MRypdiqk', '1970-01-01', 'Male', 'leachjonathan837@gmail.com', 'leachjonathan837@gmail.com', 'leachjonathan837@gmail.com', 'leachjonathan837@gmail.com', '', 0, 'a:1:{s:26:\"leachjonathan837@gmail.com\";s:13:\"uRjFVZeEx3Kz!\";}'),
(193, 0, 0, 'WRzEoDPBg', '1970-01-01', 'Male', 'leachjonathan837@gmail.com', 'leachjonathan837@gmail.com', 'leachjonathan837@gmail.com', 'leachjonathan837@gmail.com', '', 0, 'a:1:{s:26:\"leachjonathan837@gmail.com\";s:13:\"uRjFVZeEx3Kz!\";}'),
(194, 0, 0, 'fGVWZpSOUctjR', '1970-01-01', 'Male', 'gautier.inc@mindspring.com', 'gautier.inc@mindspring.com', 'gautier.inc@mindspring.com', 'gautier.inc@mindspring.com', '', 0, 'a:1:{s:26:\"gautier.inc@mindspring.com\";s:13:\"WODR3ILm5TeU!\";}'),
(195, 0, 0, 'gFeqYAiWkXHP', '1970-01-01', 'Male', 'gautier.inc@mindspring.com', 'gautier.inc@mindspring.com', 'gautier.inc@mindspring.com', 'gautier.inc@mindspring.com', '', 0, 'a:1:{s:26:\"gautier.inc@mindspring.com\";s:13:\"WODR3ILm5TeU!\";}'),
(196, 0, 0, 'SQvjfpYaFtcKLTMJ', '1970-01-01', 'Male', 'jhmedina_61@hotmail.com', 'jhmedina_61@hotmail.com', 'jhmedina_61@hotmail.com', 'jhmedina_61@hotmail.com', '', 0, 'a:1:{s:23:\"jhmedina_61@hotmail.com\";s:13:\"iHT2hrsxDEgJ!\";}'),
(197, 0, 0, 'GfLltRVYIkqEWJM', '1970-01-01', 'Male', 'jhmedina_61@hotmail.com', 'jhmedina_61@hotmail.com', 'jhmedina_61@hotmail.com', 'jhmedina_61@hotmail.com', '', 0, 'a:1:{s:23:\"jhmedina_61@hotmail.com\";s:13:\"iHT2hrsxDEgJ!\";}'),
(198, 0, 0, 'BoAXDdrza', '1970-01-01', 'Male', 'willyloves311@gmail.com', 'willyloves311@gmail.com', 'willyloves311@gmail.com', 'willyloves311@gmail.com', '', 0, 'a:1:{s:23:\"willyloves311@gmail.com\";s:13:\"O9REslorZhw8!\";}'),
(199, 0, 0, 'PRovrgLaHTqxFpy', '1970-01-01', 'Male', 'willyloves311@gmail.com', 'willyloves311@gmail.com', 'willyloves311@gmail.com', 'willyloves311@gmail.com', '', 0, 'a:1:{s:23:\"willyloves311@gmail.com\";s:13:\"O9REslorZhw8!\";}');

-- --------------------------------------------------------

--
-- Table structure for table `child_of_user`
--

CREATE TABLE `child_of_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `child_of_user`
--

INSERT INTO `child_of_user` (`id`, `user_id`, `child_id`, `group_id`) VALUES
(1, 4, 1, 3),
(2, 5, 1, 3),
(3, 6, 1, 3),
(4, 7, 1, 3),
(5, 9, 2, 4),
(6, 10, 2, 4),
(7, 11, 2, 4),
(8, 12, 2, 4),
(9, 14, 3, 5),
(10, 15, 3, 5),
(11, 16, 3, 5),
(12, 17, 3, 5),
(13, 19, 4, 6),
(14, 20, 4, 6),
(15, 21, 4, 6),
(16, 22, 4, 6),
(17, 24, 5, 7),
(18, 25, 5, 7),
(19, 26, 5, 7),
(20, 27, 5, 7),
(21, 29, 6, 8),
(22, 30, 6, 8),
(23, 31, 6, 8),
(24, 32, 6, 8),
(25, 34, 7, 9),
(26, 35, 7, 9),
(27, 36, 7, 9),
(28, 37, 7, 9),
(29, 39, 8, 10),
(30, 40, 8, 10),
(31, 41, 8, 10),
(32, 42, 8, 10),
(33, 44, 9, 11),
(34, 45, 9, 11),
(35, 38, 9, 11),
(36, 39, 10, 10),
(37, 42, 10, 10),
(38, 41, 10, 10),
(39, 46, 10, 10),
(47, 49, 13, 11),
(48, 38, 13, 11),
(49, 45, 13, 11),
(50, 50, 13, 11),
(51, 52, 14, 12),
(52, 55, 16, 15),
(53, 45, 16, 15),
(54, 55, 17, 15),
(55, 45, 17, 15),
(56, 60, 18, 19),
(57, 59, 18, 19),
(58, 61, 18, 19),
(59, 62, 19, 0),
(60, 62, 19, 0),
(61, 62, 19, 0),
(62, 62, 19, 0),
(63, 62, 20, 0),
(64, 62, 20, 0),
(65, 62, 20, 0),
(66, 62, 20, 0),
(67, 63, 21, 0),
(68, 63, 21, 0),
(69, 63, 21, 0),
(70, 63, 21, 0),
(71, 63, 22, 0),
(72, 63, 22, 0),
(73, 63, 22, 0),
(74, 63, 22, 0),
(75, 64, 23, 0),
(76, 64, 23, 0),
(77, 64, 23, 0),
(78, 64, 23, 0),
(79, 64, 24, 0),
(80, 64, 24, 0),
(81, 64, 24, 0),
(82, 64, 24, 0),
(83, 65, 25, 0),
(84, 65, 25, 0),
(85, 65, 25, 0),
(86, 65, 25, 0),
(87, 65, 26, 0),
(88, 65, 26, 0),
(89, 65, 26, 0),
(90, 65, 26, 0),
(91, 66, 27, 0),
(92, 66, 27, 0),
(93, 66, 27, 0),
(94, 66, 27, 0),
(95, 66, 28, 0),
(96, 66, 28, 0),
(97, 66, 28, 0),
(98, 66, 28, 0),
(99, 67, 29, 0),
(100, 67, 29, 0),
(101, 67, 29, 0),
(102, 67, 29, 0),
(103, 67, 30, 0),
(104, 67, 30, 0),
(105, 67, 30, 0),
(106, 67, 30, 0),
(107, 68, 31, 0),
(108, 68, 31, 0),
(109, 68, 31, 0),
(110, 68, 31, 0),
(111, 68, 32, 0),
(112, 68, 32, 0),
(113, 68, 32, 0),
(114, 68, 32, 0),
(115, 69, 33, 0),
(116, 69, 33, 0),
(117, 69, 33, 0),
(118, 69, 33, 0),
(119, 69, 34, 0),
(120, 69, 34, 0),
(121, 69, 34, 0),
(122, 69, 34, 0),
(123, 70, 35, 0),
(124, 70, 35, 0),
(125, 70, 35, 0),
(126, 70, 35, 0),
(127, 70, 36, 0),
(128, 70, 36, 0),
(129, 70, 36, 0),
(130, 70, 36, 0),
(131, 71, 37, 0),
(132, 71, 37, 0),
(133, 71, 37, 0),
(134, 71, 37, 0),
(135, 71, 38, 0),
(136, 71, 38, 0),
(137, 71, 38, 0),
(138, 71, 38, 0),
(139, 72, 39, 0),
(140, 72, 39, 0),
(141, 72, 39, 0),
(142, 72, 39, 0),
(143, 72, 40, 0),
(144, 72, 40, 0),
(145, 72, 40, 0),
(146, 72, 40, 0),
(147, 73, 41, 0),
(148, 73, 41, 0),
(149, 73, 41, 0),
(150, 73, 41, 0),
(151, 73, 42, 0),
(152, 73, 42, 0),
(153, 73, 42, 0),
(154, 73, 42, 0),
(155, 74, 43, 0),
(156, 74, 43, 0),
(157, 74, 43, 0),
(158, 74, 43, 0),
(159, 74, 44, 0),
(160, 74, 44, 0),
(161, 74, 44, 0),
(162, 74, 44, 0),
(163, 75, 45, 0),
(164, 75, 45, 0),
(165, 75, 45, 0),
(166, 75, 45, 0),
(167, 75, 46, 0),
(168, 75, 46, 0),
(169, 75, 46, 0),
(170, 75, 46, 0),
(171, 76, 47, 0),
(172, 76, 47, 0),
(173, 76, 47, 0),
(174, 76, 47, 0),
(175, 76, 48, 0),
(176, 76, 48, 0),
(177, 76, 48, 0),
(178, 76, 48, 0),
(179, 77, 49, 0),
(180, 77, 49, 0),
(181, 77, 49, 0),
(182, 77, 49, 0),
(183, 77, 50, 0),
(184, 77, 50, 0),
(185, 77, 50, 0),
(186, 77, 50, 0),
(187, 78, 51, 0),
(188, 78, 51, 0),
(189, 78, 51, 0),
(190, 78, 51, 0),
(191, 78, 52, 0),
(192, 78, 52, 0),
(193, 78, 52, 0),
(194, 78, 52, 0),
(195, 79, 53, 0),
(196, 79, 53, 0),
(197, 79, 53, 0),
(198, 79, 53, 0),
(199, 79, 54, 0),
(200, 79, 54, 0),
(201, 79, 54, 0),
(202, 79, 54, 0),
(203, 80, 55, 0),
(204, 80, 55, 0),
(205, 80, 55, 0),
(206, 80, 55, 0),
(207, 80, 56, 0),
(208, 80, 56, 0),
(209, 80, 56, 0),
(210, 80, 56, 0),
(211, 78, 57, 0),
(212, 78, 57, 0),
(213, 78, 57, 0),
(214, 78, 57, 0),
(215, 78, 58, 0),
(216, 78, 58, 0),
(217, 78, 58, 0),
(218, 78, 58, 0),
(219, 81, 59, 0),
(220, 81, 59, 0),
(221, 81, 59, 0),
(222, 81, 59, 0),
(223, 81, 60, 0),
(224, 81, 60, 0),
(225, 81, 60, 0),
(226, 81, 60, 0),
(227, 82, 61, 0),
(228, 82, 61, 0),
(229, 82, 61, 0),
(230, 82, 61, 0),
(231, 82, 62, 0),
(232, 82, 62, 0),
(233, 82, 62, 0),
(234, 82, 62, 0),
(235, 83, 63, 0),
(236, 83, 63, 0),
(237, 83, 63, 0),
(238, 83, 63, 0),
(239, 83, 64, 0),
(240, 83, 64, 0),
(241, 83, 64, 0),
(242, 83, 64, 0),
(243, 84, 65, 0),
(244, 84, 65, 0),
(245, 84, 65, 0),
(246, 84, 65, 0),
(247, 84, 66, 0),
(248, 84, 66, 0),
(249, 84, 66, 0),
(250, 84, 66, 0),
(251, 85, 67, 0),
(252, 85, 67, 0),
(253, 85, 67, 0),
(254, 85, 67, 0),
(255, 85, 68, 0),
(256, 85, 68, 0),
(257, 85, 68, 0),
(258, 85, 68, 0),
(259, 86, 69, 0),
(260, 86, 69, 0),
(261, 86, 69, 0),
(262, 86, 69, 0),
(263, 86, 70, 0),
(264, 86, 70, 0),
(265, 86, 70, 0),
(266, 86, 70, 0),
(267, 87, 71, 0),
(268, 87, 71, 0),
(269, 87, 71, 0),
(270, 87, 71, 0),
(271, 87, 72, 0),
(272, 87, 72, 0),
(273, 87, 72, 0),
(274, 87, 72, 0),
(275, 88, 73, 0),
(276, 88, 73, 0),
(277, 88, 73, 0),
(278, 88, 73, 0),
(279, 88, 74, 0),
(280, 88, 74, 0),
(281, 88, 74, 0),
(282, 88, 74, 0),
(283, 89, 75, 0),
(284, 89, 75, 0),
(285, 89, 75, 0),
(286, 89, 75, 0),
(287, 89, 76, 0),
(288, 89, 76, 0),
(289, 89, 76, 0),
(290, 89, 76, 0),
(291, 90, 77, 0),
(292, 90, 77, 0),
(293, 90, 77, 0),
(294, 90, 77, 0),
(295, 90, 78, 0),
(296, 90, 78, 0),
(297, 90, 78, 0),
(298, 90, 78, 0),
(299, 91, 79, 0),
(300, 91, 79, 0),
(301, 91, 79, 0),
(302, 91, 79, 0),
(303, 91, 80, 0),
(304, 91, 80, 0),
(305, 91, 80, 0),
(306, 91, 80, 0),
(307, 92, 81, 0),
(308, 92, 81, 0),
(309, 92, 81, 0),
(310, 92, 81, 0),
(311, 92, 82, 0),
(312, 92, 82, 0),
(313, 92, 82, 0),
(314, 92, 82, 0),
(315, 93, 83, 0),
(316, 93, 83, 0),
(317, 93, 83, 0),
(318, 93, 83, 0),
(319, 93, 84, 0),
(320, 93, 84, 0),
(321, 93, 84, 0),
(322, 93, 84, 0),
(323, 94, 85, 0),
(324, 94, 85, 0),
(325, 94, 85, 0),
(326, 94, 85, 0),
(327, 94, 86, 0),
(328, 94, 86, 0),
(329, 94, 86, 0),
(330, 94, 86, 0),
(331, 95, 87, 0),
(332, 95, 87, 0),
(333, 95, 87, 0),
(334, 95, 87, 0),
(335, 95, 88, 0),
(336, 95, 88, 0),
(337, 95, 88, 0),
(338, 95, 88, 0),
(339, 96, 89, 0),
(340, 96, 89, 0),
(341, 96, 89, 0),
(342, 96, 89, 0),
(343, 96, 90, 0),
(344, 96, 90, 0),
(345, 96, 90, 0),
(346, 96, 90, 0),
(347, 97, 91, 0),
(348, 97, 91, 0),
(349, 97, 91, 0),
(350, 97, 91, 0),
(351, 97, 92, 0),
(352, 97, 92, 0),
(353, 97, 92, 0),
(354, 97, 92, 0),
(355, 98, 93, 0),
(356, 98, 93, 0),
(357, 98, 93, 0),
(358, 98, 93, 0),
(359, 98, 94, 0),
(360, 98, 94, 0),
(361, 98, 94, 0),
(362, 98, 94, 0),
(363, 99, 95, 0),
(364, 99, 95, 0),
(365, 99, 95, 0),
(366, 99, 95, 0),
(367, 99, 96, 0),
(368, 99, 96, 0),
(369, 99, 96, 0),
(370, 99, 96, 0),
(371, 100, 97, 0),
(372, 100, 97, 0),
(373, 100, 97, 0),
(374, 100, 97, 0),
(375, 100, 98, 0),
(376, 100, 98, 0),
(377, 100, 98, 0),
(378, 100, 98, 0),
(379, 101, 99, 0),
(380, 101, 99, 0),
(381, 101, 99, 0),
(382, 101, 99, 0),
(383, 101, 100, 0),
(384, 101, 100, 0),
(385, 101, 100, 0),
(386, 101, 100, 0),
(387, 102, 101, 0),
(388, 102, 101, 0),
(389, 102, 101, 0),
(390, 102, 101, 0),
(391, 102, 102, 0),
(392, 102, 102, 0),
(393, 102, 102, 0),
(394, 102, 102, 0),
(395, 103, 103, 0),
(396, 103, 103, 0),
(397, 103, 103, 0),
(398, 103, 103, 0),
(399, 103, 104, 0),
(400, 103, 104, 0),
(401, 103, 104, 0),
(402, 103, 104, 0),
(403, 104, 105, 0),
(404, 104, 105, 0),
(405, 104, 105, 0),
(406, 104, 105, 0),
(407, 104, 106, 0),
(408, 104, 106, 0),
(409, 104, 106, 0),
(410, 104, 106, 0),
(411, 105, 107, 0),
(412, 105, 107, 0),
(413, 105, 107, 0),
(414, 105, 107, 0),
(415, 105, 108, 0),
(416, 105, 108, 0),
(417, 105, 108, 0),
(418, 105, 108, 0),
(419, 106, 109, 0),
(420, 106, 109, 0),
(421, 106, 109, 0),
(422, 106, 109, 0),
(423, 106, 110, 0),
(424, 106, 110, 0),
(425, 106, 110, 0),
(426, 106, 110, 0),
(427, 107, 111, 0),
(428, 107, 111, 0),
(429, 107, 111, 0),
(430, 107, 111, 0),
(431, 107, 112, 0),
(432, 107, 112, 0),
(433, 107, 112, 0),
(434, 107, 112, 0),
(435, 108, 113, 0),
(436, 108, 113, 0),
(437, 108, 113, 0),
(438, 108, 113, 0),
(439, 108, 114, 0),
(440, 108, 114, 0),
(441, 108, 114, 0),
(442, 108, 114, 0),
(443, 110, 115, 0),
(444, 110, 115, 0),
(445, 110, 115, 0),
(446, 110, 115, 0),
(447, 110, 116, 0),
(448, 110, 116, 0),
(449, 110, 116, 0),
(450, 110, 116, 0),
(451, 111, 117, 0),
(452, 111, 117, 0),
(453, 111, 117, 0),
(454, 111, 117, 0),
(455, 111, 118, 0),
(456, 111, 118, 0),
(457, 111, 118, 0),
(458, 111, 118, 0),
(459, 112, 119, 0),
(460, 112, 119, 0),
(461, 112, 119, 0),
(462, 112, 119, 0),
(463, 112, 120, 0),
(464, 112, 120, 0),
(465, 112, 120, 0),
(466, 112, 120, 0),
(467, 113, 121, 0),
(468, 113, 121, 0),
(469, 113, 121, 0),
(470, 113, 121, 0),
(471, 113, 122, 0),
(472, 113, 122, 0),
(473, 113, 122, 0),
(474, 113, 122, 0),
(475, 114, 123, 0),
(476, 114, 123, 0),
(477, 114, 123, 0),
(478, 114, 123, 0),
(479, 114, 124, 0),
(480, 114, 124, 0),
(481, 114, 124, 0),
(482, 114, 124, 0),
(483, 115, 125, 0),
(484, 115, 125, 0),
(485, 115, 125, 0),
(486, 115, 125, 0),
(487, 115, 126, 0),
(488, 115, 126, 0),
(489, 115, 126, 0),
(490, 115, 126, 0),
(491, 116, 127, 0),
(492, 116, 127, 0),
(493, 116, 127, 0),
(494, 116, 127, 0),
(495, 116, 128, 0),
(496, 116, 128, 0),
(497, 116, 128, 0),
(498, 116, 128, 0),
(499, 117, 129, 0),
(500, 117, 129, 0),
(501, 117, 129, 0),
(502, 117, 129, 0),
(503, 117, 130, 0),
(504, 117, 130, 0),
(505, 117, 130, 0),
(506, 117, 130, 0),
(507, 118, 131, 0),
(508, 118, 131, 0),
(509, 118, 131, 0),
(510, 118, 131, 0),
(511, 118, 132, 0),
(512, 118, 132, 0),
(513, 118, 132, 0),
(514, 118, 132, 0),
(515, 119, 133, 0),
(516, 119, 133, 0),
(517, 119, 133, 0),
(518, 119, 133, 0),
(519, 119, 134, 0),
(520, 119, 134, 0),
(521, 119, 134, 0),
(522, 119, 134, 0),
(523, 120, 135, 0),
(524, 120, 135, 0),
(525, 120, 135, 0),
(526, 120, 135, 0),
(527, 120, 136, 0),
(528, 120, 136, 0),
(529, 120, 136, 0),
(530, 120, 136, 0),
(531, 121, 137, 0),
(532, 121, 137, 0),
(533, 121, 137, 0),
(534, 121, 137, 0),
(535, 121, 138, 0),
(536, 121, 138, 0),
(537, 121, 138, 0),
(538, 121, 138, 0),
(539, 122, 139, 0),
(540, 122, 139, 0),
(541, 122, 139, 0),
(542, 122, 139, 0),
(543, 122, 140, 0),
(544, 122, 140, 0),
(545, 122, 140, 0),
(546, 122, 140, 0),
(547, 123, 141, 0),
(548, 123, 141, 0),
(549, 123, 141, 0),
(550, 123, 141, 0),
(551, 123, 142, 0),
(552, 123, 142, 0),
(553, 123, 142, 0),
(554, 123, 142, 0),
(555, 124, 143, 0),
(556, 124, 143, 0),
(557, 124, 143, 0),
(558, 124, 143, 0),
(559, 124, 144, 0),
(560, 124, 144, 0),
(561, 124, 144, 0),
(562, 124, 144, 0),
(563, 125, 145, 0),
(564, 125, 145, 0),
(565, 125, 145, 0),
(566, 125, 145, 0),
(567, 125, 146, 0),
(568, 125, 146, 0),
(569, 125, 146, 0),
(570, 125, 146, 0),
(571, 126, 147, 0),
(572, 126, 147, 0),
(573, 126, 147, 0),
(574, 126, 147, 0),
(575, 127, 148, 0),
(576, 127, 148, 0),
(577, 127, 148, 0),
(578, 127, 148, 0),
(579, 127, 149, 0),
(580, 127, 149, 0),
(581, 127, 149, 0),
(582, 127, 149, 0),
(583, 128, 150, 0),
(584, 128, 150, 0),
(585, 128, 150, 0),
(586, 128, 150, 0),
(587, 128, 151, 0),
(588, 128, 151, 0),
(589, 128, 151, 0),
(590, 128, 151, 0),
(591, 129, 152, 0),
(592, 129, 152, 0),
(593, 129, 152, 0),
(594, 129, 152, 0),
(595, 129, 153, 0),
(596, 129, 153, 0),
(597, 129, 153, 0),
(598, 129, 153, 0),
(599, 130, 154, 0),
(600, 130, 154, 0),
(601, 130, 154, 0),
(602, 130, 154, 0),
(603, 130, 155, 0),
(604, 130, 155, 0),
(605, 130, 155, 0),
(606, 130, 155, 0),
(607, 131, 156, 0),
(608, 131, 156, 0),
(609, 131, 156, 0),
(610, 131, 156, 0),
(611, 131, 157, 0),
(612, 131, 157, 0),
(613, 131, 157, 0),
(614, 131, 157, 0),
(615, 132, 158, 0),
(616, 132, 158, 0),
(617, 132, 158, 0),
(618, 132, 158, 0),
(619, 132, 159, 0),
(620, 132, 159, 0),
(621, 132, 159, 0),
(622, 132, 159, 0),
(623, 133, 160, 0),
(624, 133, 160, 0),
(625, 133, 160, 0),
(626, 133, 160, 0),
(627, 133, 161, 0),
(628, 133, 161, 0),
(629, 133, 161, 0),
(630, 133, 161, 0),
(631, 134, 162, 0),
(632, 134, 162, 0),
(633, 134, 162, 0),
(634, 134, 162, 0),
(635, 134, 163, 0),
(636, 134, 163, 0),
(637, 134, 163, 0),
(638, 134, 163, 0),
(639, 135, 164, 0),
(640, 135, 164, 0),
(641, 135, 164, 0),
(642, 135, 164, 0),
(643, 135, 165, 0),
(644, 135, 165, 0),
(645, 135, 165, 0),
(646, 135, 165, 0),
(647, 136, 166, 0),
(648, 136, 166, 0),
(649, 136, 166, 0),
(650, 136, 166, 0),
(651, 136, 167, 0),
(652, 136, 167, 0),
(653, 136, 167, 0),
(654, 136, 167, 0),
(655, 137, 168, 0),
(656, 137, 168, 0),
(657, 137, 168, 0),
(658, 137, 168, 0),
(659, 138, 169, 0),
(660, 138, 169, 0),
(661, 138, 169, 0),
(662, 138, 169, 0),
(663, 138, 170, 0),
(664, 138, 170, 0),
(665, 138, 170, 0),
(666, 138, 170, 0),
(667, 139, 171, 0),
(668, 139, 171, 0),
(669, 139, 171, 0),
(670, 139, 171, 0),
(671, 139, 172, 0),
(672, 139, 172, 0),
(673, 139, 172, 0),
(674, 139, 172, 0),
(675, 140, 173, 0),
(676, 140, 173, 0),
(677, 140, 173, 0),
(678, 140, 173, 0),
(679, 140, 174, 0),
(680, 140, 174, 0),
(681, 140, 174, 0),
(682, 140, 174, 0),
(683, 141, 175, 0),
(684, 141, 175, 0),
(685, 141, 175, 0),
(686, 141, 175, 0),
(687, 141, 176, 0),
(688, 141, 176, 0),
(689, 141, 176, 0),
(690, 141, 176, 0),
(691, 142, 177, 0),
(692, 142, 177, 0),
(693, 142, 177, 0),
(694, 142, 177, 0),
(695, 142, 178, 0),
(696, 142, 178, 0),
(697, 142, 178, 0),
(698, 142, 178, 0),
(699, 141, 179, 0),
(700, 141, 179, 0),
(701, 141, 179, 0),
(702, 141, 179, 0),
(703, 141, 180, 0),
(704, 141, 180, 0),
(705, 141, 180, 0),
(706, 141, 180, 0),
(707, 143, 181, 0),
(708, 143, 181, 0),
(709, 143, 181, 0),
(710, 143, 181, 0),
(711, 143, 182, 0),
(712, 143, 182, 0),
(713, 143, 182, 0),
(714, 143, 182, 0),
(715, 144, 183, 0),
(716, 144, 183, 0),
(717, 144, 183, 0),
(718, 144, 183, 0),
(719, 144, 184, 0),
(720, 144, 184, 0),
(721, 144, 184, 0),
(722, 144, 184, 0),
(723, 145, 185, 0),
(724, 145, 185, 0),
(725, 145, 185, 0),
(726, 145, 185, 0),
(727, 145, 186, 0),
(728, 145, 186, 0),
(729, 145, 186, 0),
(730, 145, 186, 0),
(731, 146, 187, 0),
(732, 146, 187, 0),
(733, 146, 187, 0),
(734, 146, 187, 0),
(735, 146, 188, 0),
(736, 146, 188, 0),
(737, 146, 188, 0),
(738, 146, 188, 0),
(739, 147, 189, 0),
(740, 147, 189, 0),
(741, 147, 189, 0),
(742, 147, 189, 0),
(743, 148, 190, 0),
(744, 148, 190, 0),
(745, 148, 190, 0),
(746, 148, 190, 0),
(747, 148, 191, 0),
(748, 148, 191, 0),
(749, 148, 191, 0),
(750, 148, 191, 0),
(751, 149, 192, 0),
(752, 149, 192, 0),
(753, 149, 192, 0),
(754, 149, 192, 0),
(755, 149, 193, 0),
(756, 149, 193, 0),
(757, 149, 193, 0),
(758, 149, 193, 0),
(759, 150, 194, 0),
(760, 150, 194, 0),
(761, 150, 194, 0),
(762, 150, 194, 0),
(763, 150, 195, 0),
(764, 150, 195, 0),
(765, 150, 195, 0),
(766, 150, 195, 0),
(767, 151, 196, 0),
(768, 151, 196, 0),
(769, 151, 196, 0),
(770, 151, 196, 0),
(771, 151, 197, 0),
(772, 151, 197, 0),
(773, 151, 197, 0),
(774, 151, 197, 0),
(775, 152, 198, 0),
(776, 152, 198, 0),
(777, 152, 198, 0),
(778, 152, 198, 0),
(779, 152, 199, 0),
(780, 152, 199, 0),
(781, 152, 199, 0),
(782, 152, 199, 0);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `createdby` varchar(255) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `number_of_child` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`group_id`, `group_name`, `createdby`, `created_time`, `number_of_child`, `filename`, `is_active`) VALUES
(1, 'test1', '1', '2017-10-24 13:27:52', 5, '', 1),
(2, 'test1', '2', '2017-10-24 13:32:05', 5, '', 1),
(3, 'center', '3', '2017-10-24 23:03:08', 5, '', 1),
(4, 'Test', '8', '2017-11-03 15:04:05', 1, '', 1),
(5, 'Tester', '13', '2017-11-30 11:48:49', 2, '', 1),
(6, 'tester', '18', '2017-11-30 16:47:09', 1, '', 1),
(7, 'tester', '23', '2017-11-30 16:51:43', 1, '', 1),
(8, 'Tester', '28', '2017-11-30 16:57:36', 1, '', 1),
(9, 'Test Center', '33', '2017-11-30 17:06:23', 1, '', 1),
(10, 'tester', '38', '2017-11-30 17:20:19', 1, '', 1),
(11, 'ACE Centre ', '43', '2018-01-09 10:18:29', 3, '', 1),
(12, 'test', '51', '2018-02-26 07:26:46', 2, '', 1),
(13, 'asas', '51', '2018-02-26 07:27:28', 0, '', 1),
(14, 'Glasgow Minnis', '53', '2018-07-17 20:11:06', 5, '', 1),
(15, 'Lappin', '54', '2018-07-18 13:23:17', 2, '', 1),
(16, 'University of Glasgow', '56', '2019-01-15 10:23:23', 1, '', 1),
(17, 'skoepplin.ger@gmail.com', '57', '2019-11-28 13:19:27', 5, '', 1),
(18, 'gecko', '58', '2019-11-29 22:48:37', 1, '', 1),
(19, 'IUJD', '59', '2019-12-06 14:30:38', 1, '', 1),
(20, 'qOWcXIAwd', '62', '2019-12-30 16:04:50', 1, '', 1),
(21, 'tqhmTpYAfIBLQOV', '63', '2020-02-24 23:46:29', 1, '', 1),
(22, 'JxHzcWrvXVSLDNal', '64', '2020-02-25 18:13:16', 1, '', 1),
(23, 'SuiZUOQsADwt', '65', '2020-02-25 20:11:38', 1, '', 1),
(24, 'nBasZNHe', '66', '2020-02-25 22:00:30', 1, '', 1),
(25, 'VZbyzOnieKHN', '67', '2020-02-25 22:36:02', 1, '', 1),
(26, 'AdaWbnSwQjZeGtKs', '68', '2020-02-25 23:23:24', 1, '', 1),
(27, 'tHjArexGmTKFXNSP', '69', '2020-02-26 17:51:22', 1, '', 1),
(28, 'vjRzaJeu', '70', '2020-02-26 21:25:54', 1, '', 1),
(29, 'QIncvoUu', '71', '2020-02-26 23:15:25', 1, '', 1),
(30, 'HaOuVYtSq', '72', '2020-02-27 00:37:52', 1, '', 1),
(31, 'JYNZxGTIX', '73', '2020-02-27 01:00:20', 1, '', 1),
(32, 'CYUXfVwI', '74', '2020-02-27 03:05:23', 1, '', 1),
(33, 'trSVaviHLuCBqZxI', '75', '2020-02-27 10:29:45', 1, '', 1),
(34, 'KNArGmzpeyTJxhH', '76', '2020-02-27 11:44:47', 1, '', 1),
(35, 'JjgUunfMvpoRzySG', '77', '2020-02-27 12:13:32', 1, '', 1),
(36, 'NCRzbGJYsIltdk', '78', '2020-02-27 15:17:32', 1, '', 1),
(37, 'SEHTeICLaWFPkOu', '79', '2020-02-27 17:40:41', 1, '', 1),
(38, 'fLKOSZvomgr', '80', '2020-02-27 20:17:16', 1, '', 1),
(39, 'tajgiIXoPS', '81', '2020-02-27 20:30:35', 1, '', 1),
(40, 'UXHALhxNVkjtlOsW', '82', '2020-02-27 22:33:42', 1, '', 1),
(41, 'WTkqmzseb', '83', '2020-02-28 01:40:32', 1, '', 1),
(42, 'GlzBtQAYspMyDun', '84', '2020-02-28 06:07:51', 1, '', 1),
(43, 'ygfnSUXTZouiW', '85', '2020-02-28 06:52:11', 1, '', 1),
(44, 'RYDOmGEI', '86', '2020-02-28 06:57:14', 1, '', 1),
(45, 'UbPDKVWOZ', '87', '2020-02-28 14:19:39', 1, '', 1),
(46, 'LDVpExNtioG', '88', '2020-02-28 17:51:54', 1, '', 1),
(47, 'cmDWUgjipQ', '89', '2020-02-28 21:06:30', 1, '', 1),
(48, 'dtzxEkFYVfmCQXB', '90', '2020-02-28 22:08:41', 1, '', 1),
(49, 'CSXojUTeH', '91', '2020-02-28 23:39:31', 1, '', 1),
(50, 'LJlTWNikMbDZr', '92', '2020-03-02 06:43:04', 1, '', 1),
(51, 'HtPjvNSMoZpe', '93', '2020-03-02 14:30:16', 1, '', 1),
(52, 'EOherKGYTDb', '94', '2020-03-02 17:55:58', 1, '', 1),
(53, 'EBYcUZifF', '95', '2020-03-02 18:28:25', 1, '', 1),
(54, 'MfkmVoWutKlwez', '96', '2020-03-02 19:28:05', 1, '', 1),
(55, 'QMrpIVGnfTBt', '97', '2020-03-02 21:31:42', 1, '', 1),
(56, 'XvZYqrxagMQB', '98', '2020-03-03 10:10:29', 1, '', 1),
(57, 'HCXLhqKxztrGpjWJ', '99', '2020-03-03 11:38:18', 1, '', 1),
(58, 'ikedHPzchX', '100', '2020-03-03 12:17:59', 1, '', 1),
(59, 'kFrWDZSYBL', '101', '2020-03-03 22:41:13', 1, '', 1),
(60, 'ciARJSpQ', '102', '2020-03-03 22:51:17', 1, '', 1),
(61, 'FCUHkDaguGczy', '103', '2020-03-04 05:38:24', 1, '', 1),
(62, 'BUZWOcdhqGpEaCb', '104', '2020-03-04 08:07:58', 1, '', 1),
(63, 'zEQuUVCXDKZHvFxJ', '105', '2020-03-04 20:44:08', 1, '', 1),
(64, 'ncGXNtOsiajEMkwW', '106', '2020-03-04 21:08:11', 1, '', 1),
(65, 'bZdVMFEAozlqCQ', '107', '2020-03-05 05:42:28', 1, '', 1),
(66, 'mNIyAdGEucWj', '108', '2020-03-05 07:50:56', 1, '', 1),
(67, 'LUHoNiEvhk', '109', '2020-03-05 08:51:57', 1, '', 1),
(68, 'yFOhUPztjfivV', '110', '2020-03-06 06:02:43', 1, '', 1),
(69, 'LlDMwXGRby', '111', '2020-03-07 00:57:24', 1, '', 1),
(70, 'kxeOjzsEcMwLmVNU', '112', '2020-03-09 14:44:07', 1, '', 1),
(71, 'fQcuWJzyopOa', '113', '2020-03-10 17:27:41', 1, '', 1),
(72, 'FGIgbJMBiLP', '114', '2020-03-11 10:40:18', 1, '', 1),
(73, 'RUWCXxvdte', '115', '2020-03-11 18:07:35', 1, '', 1),
(74, 'yomtlsSZBOIfJxF', '116', '2020-03-11 18:15:41', 1, '', 1),
(75, 'ukajIFDRtxqA', '117', '2020-03-12 00:30:30', 1, '', 1),
(76, 'FbZwIJRoQBnfWDY', '118', '2020-03-17 17:58:05', 1, '', 1),
(77, 'MaKpEXeC', '119', '2020-03-17 18:28:58', 1, '', 1),
(78, 'fvXFbrKzaopHx', '120', '2020-03-19 23:42:00', 1, '', 1),
(79, 'jDHzWBSGcfE', '121', '2020-03-23 07:59:50', 1, '', 1),
(80, 'QzEXxRiPuHtAZp', '122', '2020-03-25 22:11:50', 1, '', 1),
(81, 'FAdDvgqosxSQ', '123', '2020-04-02 01:46:11', 1, '', 1),
(82, 'vXwPfMQSHDpYe', '124', '2020-04-05 16:43:26', 1, '', 1),
(83, 'fyEASuGThUBDsz', '125', '2020-04-05 23:28:47', 1, '', 1),
(84, 'NOkjYTUcy', '126', '2020-04-06 20:38:11', 1, '', 1),
(85, 'jHMeBQCzASZlJoN', '127', '2020-04-06 20:39:51', 1, '', 1),
(86, 'UEjNiOrHDZa', '128', '2020-04-07 01:06:12', 1, '', 1),
(87, 'yOvDouSxgBHfN', '129', '2020-04-07 04:19:26', 1, '', 1),
(88, 'WZPHgVmb', '130', '2020-04-07 05:00:46', 1, '', 1),
(89, 'ljDecMTodUWYbB', '131', '2020-04-07 15:27:23', 1, '', 1),
(90, 'YNuGtcxJhVPz', '132', '2020-04-08 09:25:05', 1, '', 1),
(91, 'XNRbwZaKB', '133', '2020-04-09 07:15:58', 1, '', 1),
(92, 'IgPfvsleDXhU', '134', '2020-04-09 09:57:01', 1, '', 1),
(93, 'euWHRGnq', '135', '2020-04-09 21:29:53', 1, '', 1),
(94, 'WIKEFSrLzXxBM', '136', '2020-04-10 17:21:14', 1, '', 1),
(95, 'dFeGZfuq', '137', '2020-04-12 15:35:17', 1, '', 1),
(96, 'GYzQpwAMKCf', '138', '2020-04-12 22:39:22', 1, '', 1),
(97, 'EHlaXifcGFqKNAS', '139', '2020-04-13 16:38:22', 1, '', 1),
(98, 'QlvmrCftUVA', '140', '2020-04-13 17:22:02', 1, '', 1),
(99, 'DLUyTkAnFSaHwKRB', '141', '2020-04-13 18:20:19', 1, '', 1),
(100, 'enZJDFNRydcY', '142', '2020-04-13 20:08:29', 1, '', 1),
(101, 'JnYKQtzEyax', '143', '2020-04-13 23:56:49', 1, '', 1),
(102, 'akQGceyj', '144', '2020-04-14 08:19:36', 1, '', 1),
(103, 'PetkrCXEdnlNmZgJ', '145', '2020-04-14 09:29:30', 1, '', 1),
(104, 'dREisNtSbkQu', '146', '2020-04-14 15:33:58', 1, '', 1),
(105, 'kFigzXqeNBSYy', '147', '2020-04-15 09:12:13', 1, '', 1),
(106, 'yXYuLlMoDVQWGxAv', '148', '2020-04-15 09:14:05', 1, '', 1),
(107, 'mDztefhiUVN', '149', '2020-04-15 14:41:15', 1, '', 1),
(108, 'FRBAmpJMO', '150', '2020-04-15 18:15:08', 1, '', 1),
(109, 'HQipyfMas', '151', '2020-04-15 18:59:46', 1, '', 1),
(110, 'bWgrhYxFNGHfedV', '152', '2020-04-16 05:58:44', 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `information_children`
--

CREATE TABLE `information_children` (
  `info_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `information_children`
--

INSERT INTO `information_children` (`info_id`, `child_id`, `user_id`, `status`, `creation_date`) VALUES
(6, 0, 43, 'document', '2017-12-05 14:25:25'),
(7, 9, 43, 'document', '2017-12-05 14:44:26');

-- --------------------------------------------------------

--
-- Table structure for table `oberservational_answers`
--

CREATE TABLE `oberservational_answers` (
  `obersev_ans_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `observation_id` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `observation_comment` text NOT NULL,
  `clinician_id` int(11) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oberservational_survey`
--

CREATE TABLE `oberservational_survey` (
  `observation_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `question` text NOT NULL,
  `description` text NOT NULL,
  `oberservation_type` varchar(255) NOT NULL,
  `score_yes` int(11) NOT NULL,
  `score_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parent_children_answers`
--

CREATE TABLE `parent_children_answers` (
  `ans_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `clinician_id` int(11) NOT NULL,
  `clinician_comment` text NOT NULL,
  `clinician_diagnosis` varchar(255) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent_children_answers`
--

INSERT INTO `parent_children_answers` (`ans_id`, `child_id`, `question_id`, `user_id`, `answer`, `clinician_id`, `clinician_comment`, `clinician_diagnosis`, `creation_date`) VALUES
(1, 2, 16, 9, '1', 0, '', '', '2017-11-28 11:33:59'),
(2, 2, 17, 9, '2', 0, '', '', '2017-11-28 11:34:01'),
(3, 2, 18, 9, '3', 0, '', '', '2017-11-28 11:34:04'),
(4, 2, 19, 9, '4', 0, '', '', '2017-11-28 11:34:07'),
(5, 2, 20, 9, '1', 0, '', '', '2017-11-28 11:34:10'),
(6, 2, 21, 9, '2', 0, '', '', '2017-11-28 11:34:12'),
(7, 2, 22, 9, '3', 0, '', '', '2017-11-28 11:34:14'),
(8, 2, 23, 9, '4', 0, '', '', '2017-11-28 11:34:16'),
(9, 2, 24, 9, '1', 0, '', '', '2017-11-28 11:34:19'),
(10, 2, 25, 9, '2', 0, '', '', '2017-11-28 11:34:21'),
(11, 2, 26, 9, '3', 0, '', '', '2017-11-28 11:34:23'),
(12, 8, 1, 42, '1', 0, '', '', '2017-11-30 17:23:41'),
(13, 9, 16, 44, '4', 0, '', '', '2017-12-05 19:29:47'),
(14, 9, 17, 44, '4', 0, '', '', '2017-12-05 19:29:52'),
(15, 9, 18, 44, '4', 0, '', '', '2017-12-05 19:30:03'),
(16, 9, 19, 44, '3', 0, '', '', '2017-12-06 20:35:29'),
(17, 9, 20, 44, '3', 0, '', '', '2017-12-06 20:35:37'),
(18, 9, 21, 44, '4', 0, '', '', '2017-12-06 20:35:42'),
(19, 9, 22, 44, '4', 0, '', '', '2017-12-06 20:35:48'),
(20, 9, 23, 44, '3', 0, '', '', '2017-12-06 20:35:56'),
(21, 9, 24, 44, '4', 0, '', '', '2017-12-06 20:36:01'),
(22, 9, 25, 44, '3', 0, '', '', '2017-12-06 20:36:14'),
(23, 9, 26, 44, '4', 0, '', '', '2017-12-06 20:36:31'),
(24, 17, 16, 55, '2', 0, '', '', '2018-07-18 15:04:13'),
(25, 17, 17, 55, '3', 0, '', '', '2018-07-18 15:04:50'),
(26, 17, 18, 55, '1', 0, '', '', '2018-07-19 23:12:43'),
(27, 17, 19, 55, '2', 0, '', '', '2018-07-18 15:05:37'),
(28, 17, 20, 55, '3', 0, '', '', '2018-07-18 15:05:53'),
(29, 17, 21, 55, '1', 0, '', '', '2018-07-18 15:06:19'),
(30, 17, 22, 55, '2', 0, '', '', '2018-07-18 15:06:42'),
(31, 17, 23, 55, '2', 0, '', '', '2018-07-19 23:19:48'),
(32, 17, 24, 55, '3', 0, '', '', '2018-07-18 15:08:27'),
(33, 17, 25, 55, '1', 0, '', '', '2018-07-18 15:08:38'),
(34, 17, 26, 55, '1', 0, '', '', '2018-07-18 15:09:00'),
(35, 16, 16, 55, '4', 0, '', '', '2018-07-20 00:52:26'),
(36, 16, 17, 55, '4', 0, '', '', '2018-07-20 00:52:33'),
(37, 16, 18, 55, '2', 0, '', '', '2018-07-20 00:52:40'),
(38, 16, 19, 55, '1', 0, '', '', '2018-07-20 00:52:47'),
(39, 16, 20, 55, '3', 0, '', '', '2018-07-20 00:53:01'),
(40, 16, 21, 55, '4', 0, '', '', '2018-07-20 00:53:08'),
(41, 16, 22, 55, '4', 0, '', '', '2018-07-20 00:53:14'),
(42, 16, 23, 55, '1', 0, '', '', '2018-07-20 00:53:21'),
(43, 16, 24, 55, '1', 0, '', '', '2018-07-20 00:53:35'),
(44, 16, 25, 55, '1', 0, '', '', '2018-07-20 00:53:45'),
(45, 16, 26, 55, '1', 0, '', '', '2018-07-20 00:53:54'),
(46, 18, 1, 61, '2', 0, '', '', '2019-12-06 14:42:42'),
(47, 18, 2, 61, '2', 0, '', '', '2019-12-06 14:42:45'),
(48, 18, 3, 61, '3', 0, '', '', '2019-12-06 14:42:49'),
(49, 18, 4, 61, '2', 0, '', '', '2019-12-06 14:42:51'),
(50, 18, 5, 61, '4', 0, '', '', '2019-12-06 14:42:53'),
(51, 18, 6, 61, '2', 0, '', '', '2019-12-06 14:42:56'),
(52, 18, 7, 61, '4', 0, '', '', '2019-12-06 14:42:59'),
(53, 18, 8, 61, '2', 0, '', '', '2019-12-06 14:43:03'),
(54, 18, 9, 61, '2', 0, '', '', '2019-12-06 14:43:06'),
(55, 18, 10, 61, '3', 0, '', '', '2019-12-06 14:43:08'),
(56, 18, 11, 61, '4', 0, '', '', '2019-12-06 14:43:10'),
(57, 18, 12, 61, '4', 0, '', '', '2019-12-06 14:43:12'),
(58, 18, 13, 61, '3', 0, '', '', '2019-12-06 14:43:20'),
(59, 18, 14, 61, '3', 0, '', '', '2019-12-06 14:43:26'),
(60, 18, 15, 61, '4', 0, '', '', '2019-12-06 14:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `p_master`
--

CREATE TABLE `p_master` (
  `p_email` varchar(255) NOT NULL,
  `p_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `p_master`
--

INSERT INTO `p_master` (`p_email`, `p_text`) VALUES
('', '/<2x;d8>'),
('4lindenb@comcast.net', '9cE`%0if%q9hD'),
('a@aa.com', 'HlQ[{>9#'),
('agstetson@msn.com', 'W?FFKm92<bo%u'),
('ahgerkman@gmail.com', '/E+FMlwy2l[:-'),
('aldrichstopp@yahoo.com', '6/]-XlWuL-X^/'),
('amit.w3nuts@gmail.com', 'HlQ[{>9#'),
('anissa077@aol.com', 'n7]43j-S1xfS%'),
('arcox2005@yahoo.com', 'w]@:Kmm[`(=_Z'),
('baylor.carey@yahoo.com', 'zF!H%z MsV0!='),
('beckycbm@yahoo.com', '0h@7RFYh3@I3f'),
('benny.farmary@yahoo.com', 'rl4W`jSs>}b$V'),
('bertolero16@gmail.com', 'r25re)*R|LeXT'),
('bjeanmarm@gmail.com', '*vo6xlw2Yu$mQ'),
('blackbear428@verizon.net', 'hqGmvuEi>!}zM'),
('brookwilson416@gmail.com', '4,AL=Wh,T;EUn'),
('browntm@windstream.net', '#!/hH r^Il[xK'),
('bstoneaz79@gmail.com', 'znOpH4]+-AC#i'),
('cdanderson2468@hotmail.com', 'i:t#Aj0]*e~Es'),
('cgignac47@gmail.com', 'quh:T}~Tk?j-S'),
('christineburk0027@gmail.com', 'pIKG1|W4!J#~c'),
('clinician@gmail.com', ']XSQZNV}'),
('coritaselby@gmail.com', '{3+65_JWO+Aqb'),
('csriquelme@comercialrym.es', 'ZFTUEa!x@J$e5'),
('danielmarilynn17@gmail.com', 'b4<OMzIC:_i2_'),
('davidmiller10802@gmail.com', '!*`/*l.,=q2ap'),
('debcastel@hotmail.com', 'Zz7:*!@Q`&~B$'),
('devjgibson@gmail.com', '3i6`+Qs.V[x&%'),
('draimondi2019@gmail.com', 'R@espnU6T3k@L'),
('ecroydgery@yahoo.com', 'v5c/|<w)gKE]?'),
('edef4210@gmail.com', '@RVb)uu+y#Saw'),
('elinorwilkerson8@gmail.com', 'etlU+Quuj]YNY'),
('flaviatamieli7@gmail.com', '!r3.6:.k=b%bi'),
('franklinbrandi93@gmail.com', '&1Na{o3?E+O**'),
('galmjl@yahoo.com', 'Y#i[^MuT3a7p3'),
('gautier.inc@mindspring.com', 'nScH|Z:))S=,G'),
('gene.msa@outlook.com', 'Iu@VK#JFaKknm'),
('gookrules@gmail.com', 'N8T[Q+~dlVdcC'),
('greencolton70@gmail.com', '@n1?4gl=@iF6_'),
('halliman.liam@yahoo.com', 'G}Tf;dV<hd>p>'),
('helen.minnis@glasgow.ac.uk', 'eIE$Ek9C'),
('holtmainstone@yahoo.com', '3, Yv` <)Ad.B'),
('horaceunknownbut@yahoo.com', 'p%73,Q<DI,#Bb'),
('ichenc@me.com', '1/Jhe%xMW4;U '),
('ingmar.mimmack@yahoo.com', 'h0/bMO/kK xKR'),
('irene.oneill@glasgow.ac.uk', 'vJk$WNdNh[cE'),
('isaac.walberg@gmail.com', '}zLQ.TNSW|Jw<'),
('jeffw1209@yahoo.com', 'lE.>&1:##q_ZI'),
('jemmerson21@yahoo.com', 'ET;i[Y1(VNEXD'),
('jhmedina_61@hotmail.com', '[/*Up,_#}T:jf'),
('jkfrost2000@gmail.com', 'pEg(,*,17(MH]'),
('jmarello@cox.net', ';)6us,n*r7U,='),
('joannmaaser@hotmail.com', 'IP,F/E/biT:_I'),
('jody_thomas001@comcast.net', '~pe|ONU5a<c,4'),
('john@belsitoassociates.com', 'e^;BOvVVK18zR'),
('jonesy3tre@gmail.com', '0rEXxMx2hv$=6'),
('joshua.t.riddle@hotmail.com', 'v3qW;!@bhnX?%'),
('kayodeijalana@gmail.com', 'tw<wg`FW.=T%R'),
('kdbrazil@gmail.com', '7T[DKe?_Bv8Z4'),
('keoplinger@gmail.com', '4QeG^4lI'),
('leachjonathan837@gmail.com', '7Mr@7#IASouY6'),
('lisa@bigdpaving.com', '$::Bh!eTbR8uk'),
('llloyd57@yahoo.com', '` ^p2F~L@,[-p'),
('marymartin9077@gmail.com', '%0^G].Bn^,MfY'),
('mb7407@aol.com', 'Gkx7TLaLd{ 2-'),
('mccormickrobert014@gmail.com', '~o4{rYA*c9SsD'),
('merritf1@earthlink.net', 'l%Q7!s5Rh/fu#'),
('michael.block@oicls.com', '`0`|_r}s!L%|K'),
('minimer53@aol.com', '1L](w[>RrR(~V'),
('mooware@comcast.net', '9M|x7kbv7,K=L'),
('msrebacaffee@gmail.com', '9;+g%z98VS*H7'),
('nawalabdul@gmail.com', 'n{<X.0bqgryss'),
('nella.a@comcast.net', ',MN#cU2/XwI[7'),
('Olga.Karagiorgou@glasgow.ac.uk', '!:L1aQq<Jw)]d5'),
('parent1@gmail.com', 'Z{~=1Scj'),
('parent2@gmail.com', '{[}@>be<'),
('patriciadavis5975@gmail.com', ';;DOs9grCd/wC'),
('paula.mcmahon1@hotmail.co.uk', 'Q6zwuV$f'),
('peesmall@aol.com', '_}wEvN[ji*dF,'),
('pud75@gmail.com', 'v(*_^.mVz)*Jn'),
('rbuerki@cox.net', 'n`SI}_JjTiF%!'),
('rebecca.dyas@glasgow.ac.uk', 'vto-kp2}Kb'),
('rej3381@embarqmail.com', 'QAC?d#b0` dbW'),
('renegademiyagi@gmail.com', '[eISr4oxrMX{%'),
('rithomas2003@yahoo.com', 'E9teM;N<r+d{-'),
('robert.fraser2@gov.scot', '[x9o)G%z'),
('rohrabacher.hobard@yahoo.com', 'OQj/Nq9[vy>Qy'),
('rrbardsley@aol.com', ',3__1S,z%/=s`'),
('s.k.o.epplinger@gmail.com', ''),
('s.k.oepplinger@gmail.com', 'HghJk9R '),
('s.koepplinger@gmail.com', 'nHQ|`KHa'),
('sandra.johnson@hqda.army.mil', '-9e54~`NQlqR>'),
('sckemeter@gmail.com', ':-l=^21DmKU+g'),
('sebastien.monette.sm@gmail.com', 'zoydm w='),
('sebastien.monette@cjm-iu.qc.ca', '#P&h[OCa'),
('sebastien_monette@hotmail.com', 'a0 5Xr_]Gdo'),
('shanielappin@gmail.com', '-KnRgQY7'),
('sk.oepplinge.r@gmail.com', ''),
('sk.oepplinger@gmail.com', '3{.A7Gh&'),
('sko.epplinger@gmail.com', 'U,4^aX+a'),
('skoe.pplinger@gmail.com', 'M%0E,xHy'),
('skoep.plinger@gmail.com', ':|Z;*-Bx'),
('skoepp.linger@gmail.com', '[+h@{7*<'),
('skoeppl.inger@gmail.com', '/D8D<&I+'),
('skoeppli.nger@gmail.com', 'r;-*|3`q'),
('skoepplin.ger@gmail.com', 'M6{Zc=yW'),
('skoeppling.er@gmail.com', '#c;&/rWN'),
('skoepplinge.r@gmail.com', '@q0T|_*3'),
('skoepplinger1@gmail.com', 'HlQ[{>9#'),
('skoepplinger@gmail.com', 'HlQ[{>9#'),
('smmoll@msn.com', 'r,vqX7La4c>f.'),
('snowrs@hotmail.com', '9$SHrYvXAct&3'),
('t.couling@aol.com', '[j^qQ,Odk3?{p'),
('tanianashay@gmail.com', 'E)3e[]Y,1dgZ^'),
('teacher@gmail.com', '{#|S9f&:'),
('teresaleskew@cox.net', 'bh$ZAW>a*E]wA'),
('thegeisels@outlook.com', 'Y#,/Qd]2q9jBP'),
('tim.reid@southwire.com', '[:M^McW^kFQYo'),
('tom@hometek.org', ':Tx:#[mFDZdlz'),
('tonnie.dick@yahoo.com', 'ho#*agS}#IR1c'),
('treyaubr@gmail.com', '~!;xVx&X2jOC3'),
('williamsonarleen767@gmail.com', '[J,Q6&II54*fl'),
('willyloves311@gmail.com', 'M{wN#KQxj*81c'),
('winsland.dom@yahoo.com', '(hV]X;k-I?v8N'),
('wohs2013pg@yahoo.com', '9c(7x{-t*?%03');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaires_extras`
--

CREATE TABLE `questionnaires_extras` (
  `extra_id` int(11) NOT NULL,
  `que_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionnaires_extras`
--

INSERT INTO `questionnaires_extras` (`extra_id`, `que_id`, `question`, `description`) VALUES
(1, 1, 'Is s/he overly friendly with strangers?', ''),
(2, 1, 'Does s/he seem to need affection from whatever adult is near?', ''),
(4, 2, 'Is s/he too cuddly with peers of his/her own age s/he doesn\'t know well?', ''),
(5, 2, 'Does s/he get too physically close to strangers?', ''),
(6, 2, 'Does this cuddliness feel sociable?', ''),
(8, 3, 'Does s/he allow others to soothe him/her if s/he is hurt frightened	 or sick?', ''),
(10, 4, 'Does s/he say things that other children would know to be nosey or intrusive?', ''),
(11, 4, 'Does s/he disclose personal information to strangers?', ''),
(12, 4, 'Does this have a sociable quality?', ''),
(13, 5, 'Does s/he use or explore things which other young people would know to be someone else\'s personal property e.g. rummaging in your locked drawer or in your purse	 using other peoples clothes or makeup without asking', ''),
(14, 6, 'Do you have to supervise him/her more than other children to prevent him wandering off?', ''),
(15, 7, 'How would s/he react if a stranger rang the door and asked the child to follow him?', ''),
(16, 8, 'Is s/he overly friendly with children s/he doesn\'t know well?', ''),
(17, 8, 'Does s/he seem to be really needy or clingy?', ''),
(18, 9, 'Can s/he be demanding?', ''),
(19, 10, 'How does he/she react when sad?', ''),
(20, 10, 'How does he /she react when worried?', ''),
(21, 10, 'How does he/she react when he/she hurts him/herself?', ''),
(22, 10, 'How does he/she react when he/she feels sick (headache	 nausea	 flu	 etc.)?', ''),
(23, 11, 'Does he/she allow adults who take care of him/her to comfort him/her when he/she seems distressed (sad	 anxious	 hurt	 sick or other physical indisposition)?', ''),
(24, 12, 'Does s/he avoid social interaction e.g by turning away	 hiding under a hood?', ''),
(25, 12, 'Is s/he dismissive of attempts at social interaction e.g. by not responding or by giving gruff or one-word responses?', ''),
(26, 13, 'Does s/he turn his/her eyes or body away to avoid eye to eye contact?', ''),
(27, 14, 'Does s/he move away from you or from others so that s/he won\'t be touched?', ''),
(28, 14, 'Does s/he stiffen up like a board when you or someone else tries to hug him/her?', ''),
(29, 14, 'Will s/he let you kiss or cuddle him/her?', ''),
(30, 15, 'Does he/she manage to experience joy	 satisfaction	 pride?', ''),
(31, 15, 'Would you say that X seems to experience few positive emotions?', ''),
(32, 16, 'Is s/he able to show love	 either with hugs or kisses	 or warm feelings to you?', ''),
(33, 16, 'Or your partner?', ''),
(34, 16, 'Or other people in his/her life?', ''),
(35, 16, 'When did s/he start having difficulty being affectionate?', ''),
(36, 17, 'Does he/she ever become frightened or fearful with you for no apparent reason?', ''),
(37, 17, 'Does he/she ever become sad or burst into tears with you for no apparent reason?', ''),
(38, 17, 'When you have been separated for a while (e.g. after an overnight apart)	 is it difficult to tell whether s/he will be friendly or unfriendly?', ''),
(39, 18, 'Does s/he ask for help and then reject you (or someone else) when you try to give him/her what s/he wants?', ''),
(40, 18, 'How about with other adults who are taking care of him/her?', ''),
(41, 19, 'Is s/he a jumpy child?', ''),
(42, 19, 'Does s/he sometimes have to check things out before they can settle into a situation?', ''),
(43, 20, 'Does s/he often act as if s/he is trying to be invisible?', ''),
(44, 20, 'Do you get the feeling that s/he acts as if s/he needs to avoid being hit or hurt?', ''),
(45, 21, 'Does s/he think you are angry when you are only mildly annoyed?', ''),
(46, 21, 'Does s/he misinterpret your facial expressions more often than other children the same age?', ''),
(47, 21, 'Does s/he perceive silence as a threat?', ''),
(48, 21, 'Does his/her teacher report this?', ''),
(49, 22, 'Does s/he harm herself physically? ', ''),
(50, 23, 'Will s/he accept that something is his/her fault?', ''),
(51, 24, 'Can s/he usually tell when other people are upset? If another child is crying	 does s/he try to comfort the child?', ''),
(52, 24, 'Does his/her response ever seem inappropriate?', ''),
(53, 24, 'Like s/he laughs if a child is crying?', ''),
(54, 24, 'Can s/he tell if s/he is making someone upset?', ''),
(55, 25, 'Does s/he want to be his/her own boss?', ''),
(56, 25, 'Does s/he get very upset if someone else is making the rules?', ''),
(57, 26, 'Does s/he often come across as superficially charming?', ''),
(58, 26, 'Can hugs kisses etc. feel over-the-top or irritating?', ''),
(59, 27, 'Who is s/he like that with? Family? Strangers?', ''),
(60, 27, 'Does s/he crowd people?  ', ''),
(61, 27, 'Does this happen even if you have not been away or s/he is not upset?', ''),
(62, 28, 'Does s/he react badly to close friends giving attention/affection to other friends than him/her', ''),
(63, 29, 'Does s/he quickly interact with other adults as if on an equal footing?', ''),
(64, 29, 'Does s/he sometimes act as if s/he thinks s/he is an adult?', ''),
(65, 18, 'When you have been separated for a while (e.g. after an overnight apart), is it difficult to tell whether s/he will be friendly or unfriendly?', '');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaires_extrasbk`
--

CREATE TABLE `questionnaires_extrasbk` (
  `extra_id` int(11) NOT NULL,
  `que_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questionnaires_master`
--

CREATE TABLE `questionnaires_master` (
  `que_id` int(11) NOT NULL,
  `question_heading` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `description` text NOT NULL,
  `question_type` varchar(255) NOT NULL,
  `score_yes` int(11) NOT NULL,
  `score_yes2` int(11) NOT NULL,
  `score_no` int(11) NOT NULL,
  `score_maybe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionnaires_master`
--

INSERT INTO `questionnaires_master` (`que_id`, `question_heading`, `question`, `description`, `question_type`, `score_yes`, `score_yes2`, `score_no`, `score_maybe`) VALUES
(1, 'INDISCRIMINATE ADULT RELATIONSHIPS', 'Is s/he desperate for affection from adults?', 'The child/young person is reported to be willing to be friendly towards almost any adult, to a degree unusually to his/her developmental age, social group, and familiarity with the adult. The child/young person demonstrates reduced or absent reticence around unfamiliar adults. Behaviour is inappropriate for contact with unfamiliar adults. In older children/teenagers it could include inappropriate behavior over the internet. This behaviour should not have a quality in which adults are simply being used as objects (as can be seen in ASD), but should be social in nature. Often the child/young person appears ‘needy’ or ‘clingy’, and behaves inappropriately with unfamiliar adults. This item should only be coded as being present when the child/young person’s behaviour is clearly outside normal limits. If in doubt, code this item as being absent. A child/young person who is simply friendly or polite to adults would not code here', 'Disinhibitied', 1, 2, 0, 0),
(2, 'CUDDLINESS WITH STRANGERS', 'Is s/he too cuddly with adults s/he doesn’t know well?', 'The child/young person invades the social boundaries of strangers and acts in a pseudo-intimate way as if the stranger is a loved one.  This behaviour should not have quality in which adults are simply being used as objects (as can be seen in ASD), but should be social in nature.', 'Disinhibitied', 1, 2, 0, 0),
(3, 'COMFORT SEEKING WITH STRANGERS', 'Does s/he preferentially seek comfort from strangers over those s/he is close to?', 'Only code here is the parent/carer is able to give an example of e.g. the child/young person hurting him/herself when both parent/carer and stranger are present and child/young person goes to stranger for comfort rather than parent/carer.', 'Disinhibitied', 1, 2, 0, 0),
(4, 'PERSONAL QUESTIONS', 'Does s/he ask very personal questions of strangers in an attempt to be sociable?', 'This has a sociable quality as if the child/young person is trying to get to know the stranger, but does not recognize social boundaries or hierarchies. This behaviour should not have quality in which the adult is being questioned because of a stereotyped interest of the child/young person’s (as can be seen in ASD), but should be social in nature.', 'Disinhibitied', 1, 2, 0, 0),
(5, 'INVADING SOCIAL BOUNDARIES', 'If you take him/her to a new place, does s/he go into areas other children/young people would know to be out of bounds e.g. the staff room in a clinic, or behind the counter in a shop?', 'Distinguish from impulsivity. The child/young person should clearly feel s/he has a right to be in places other children/young persons would know to be out of bounds.', 'Disinhibitied', 1, 2, 0, 0),
(6, 'MINIMAL CHECKING IN UNFAMILIAR SETTINGS', 'If you are in a new place, does X tend to wander away from you?', 'Child rarely or minimally checks back with parent/carer after venturing away even in unfamiliar settings.', 'Disinhibitied', 1, 2, 0, 0),
(7, 'WANDERING OFF WITH A STRANGER', 'Would your child go off with a stranger?', 'This item probes the likelihood that a child/young person will actually wander off with a stranger – for example if the stranger said “can I show something really interesting in my car? Come over and I’ll show you”', 'Others', 1, 2, 0, 0),
(8, 'INDISCRIMINATE PEER RELATIONSHIP', 'Does X seem desperate for affection from other children?', 'The child/young person is willing to be friendly towards almost any peer, to a degree unusual for his/her developmental age, social group, and previous familiarity with the peer in question. Behavior is inappropriate for contact with unfamiliar peers. For example, the child/young person might call another child his/her best friend or hug, kiss, or touch another child who is unfamiliar to the childhim/her.', 'Others', 1, 2, 0, 0),
(9, 'DEMANDING AND ATTENTION-SEEKING BEHAVIOR', 'Does s/he need to be the centre of attention?', 'The child/young person will go to great lengths to get an adult’s attention and will resent the adult giving attention to other people or activities.', 'Disinhibitied', 1, 2, 0, 0),
(10, 'INABILITY TO SEEK COMFORT', 'Does he/she seek comfort from adults who take care of him/her?', 'This item receives a positive score if the child/young person does not normally seek comforting when he/she is distressed emotionally. If the child/young person does not react much to the different events capable of generating distress but nevertheless does experience distress on extremely rare occasions and, on these occasions, seeks comfort, a positive score is not to be given.', 'Others', 0, 0, 2, 0),
(11, 'INABILITY TO ACCEPT COMFORT', 'How does he/she react when an adult who takes care of him/her tries to comfort him/her when he/she seems distressed (sad, anxious, hurt, sick or other physical indisposition)?', 'This item is scored positively if the child/young person does not usually accept comfort when he/she is emotionally distressed. The child/young person might say everything is fine or that he/she does not need help, push the adult parent/carer away or even have a more violent reaction. If the child/young person does not react much to events capable of generating distress but nevertheless experiences distress on very rare occasions and that on those occasions he/she accepts comfort, a positive score is not to be given.', 'Others', 0, 0, 2, 0),
(12, 'EMOTIONAL AND SOCIAL WITHDRAWAL', 'Is s/he unusually emotionally withdrawn?', 'Code if the child/young person is routinely emotionally withdrawn, particularly during attempts at social interaction.  For example, sitting with hair or hoodie over face during attempts at conversation, turning physically away from the person trying to initiate conversation, or being dismissive of conversation (e.g. by monosyllabic responses or irritable disparagement of the social interaction). Code as positive if the child/young person was unusually emotionally withdrawn during the first interaction with a new person or during the beginning of a social interaction, even if they “warm up” later.', 'Inhibitied', 1, 2, 0, 0),
(13, 'AVOIDS EYE CONTACT', 'Does s/he avoid looking you or others directly in the eyes?', 'Parent/carer’s generalized evaluation that the child/young person characteristically avoids making eye contact with others and that s/he often turns his/her eyes away when others try to initiate eye contact. This can still be rated as positive if the parent/carer says there is only eye contact when the child/young person is lying. Distinguish from avoidance of eye contact which occurs with shyness, e.g. when the child meets new people or is in an unfamiliar setting.  Distinguish also from culturally dictated strictures.', 'Inhibitied', 1, 2, 0, 0),
(14, 'AVOID PHYSICAL CONTACT', 'Does s/he like to be hugged and cuddled?', 'Parent/carer\'s evaluation that the child/young person tries to avoid being physically close with others.', 'Others', 0, 0, 2, 0),
(15, 'LIMITED POSITIVE AFFECT', 'Is [child’s first name] a child who generally seems to be happy?', 'Lack of warmth or emotional or physical affection in most, if not all, interactions with other people. Multiple interactions means that the lack of affection is pervasive and recurrent in many interactions. Do not code a child/young person\'s lack of affection if s/he is angry at a parent or is preoccupied with another task. This item is addressing a pervasive, not an episodic, lack of affection or inability to show affection.', 'Others', 0, 0, 2, 0),
(16, 'DIFFICULTIES BEING AFFECTIONATE', 'Is X an affectionate child?', 'Lack of warmth, emotional or physical affection in most, if not all, interactions with others. Means that lack of affection is pervasive and recurring in many interactions. Do not code if the child/young person is angry with the caregivers or occupied with other activities. This item addresses a pervasive, not episodic lack of affection or lack of ability to show affection.', 'Others', 0, 0, 2, 0),
(17, 'EMOTIONAL UNPREDICTABILITY', 'Does he/she ever get angry or become irritable with you for no apparent reason (e.g., you are not punishing him/her or forbidding him/her from doing something)?', 'This item receives a positive score if the child/young person demonstrates unpredictable episodes of irritability, sadness or fright during non-threatening interactions with parents/carers. These episodes of irritability, sadness or fear do not manifest themselves only when the child/young person receives punishment, denied a request, is facing a request or requirement on the part of a parent/careror any other situation that typically can evoke these emotional reactions.', 'Inhibitied', 1, 2, 0, 0),
(18, 'APPROACH/AVOIDANCE TOWARD CAREGIVERS', 'Does X often approach you and then suddenly withdraw from or avoid contact with you?', 'On a regular basis, child/young person responds to parents or other caregivers (such as grandparents, teachers) in contradictory ways. Child may approach a person for help and then withdraw, avoid, or reject that person as s/he tries to respond to the needs/requests of the child.', 'Others', 1, 2, 0, 0),
(19, 'HYPERVIGILANCE', 'Does s/he seem wary or watchful, even though you can’t see any reason why?', 'Looks wary or watchful despite literal threat. Parents/carers may note that s/he scans the environment. There is a fearful quality to this.', 'Inhibitied', 1, 2, 0, 0),
(20, 'FROZEN WATCHFULNESS', 'Does s/he often stand or sit as if frozen?', 'A child/young person who stands/sits so still that it is as if s/he is frozen, wants to be invisible or wants to avoid being hurt despite a literal threat.  There is a fearful quality to this.', 'Inhibitied', 1, 2, 0, 0),
(21, 'MISUNDERSTANDING EMOTIONS', 'Does s/he often misunderstand people’s  emotions?', 'When present, this item has the quality of the child/young person not being able to gauge the type and intensity of emotion being expressed by others.  This could include perceiving a parent/carer or teacher’s mild annoyance as anger, or perceiving praise as manipulation.    It should be distinguished from the lack of focus on faces/eyes and difficulty recognizing basic facial expressions found in autism spectrum disorders.', 'Others', 1, 2, 0, 0),
(22, 'NEGATIVE ATTITUDE TOWARD SELF', 'Does s/he often bad mouth him/herself?', 'The child/young person has a negative attitude towards him/herself as demonstrated by bad language about him/herself, self-harm e.g. cutting, scratching, headbanging, and/or by losing/breaking/refusing possessions/gifts as if these things are too good for him/her.  Self-harm activities should be clearly associated with a sense of the child disliking or being angry with him/herself and should not include self-stimulation.   ', 'Others', 1, 2, 0, 0),
(23, 'LACK OF REMORSE', 'Is s/he sorry if s/he has done something wrong?', '', 'Others', 0, 0, 2, 0),
(24, 'LACK OF EMPATHY/EMOTIONAL RESPONSIVENESS', 'Is s/he good at understanding other people’s feelings?', 'Lack of awareness of, and sensitivity to, other people’s feelings. Lack of ability to detect other’s feelings, not lack of willingness to respond to them.  This lack is pervasive and not specific to any particular relationship.', 'Others', 0, 0, 2, 0),
(25, 'NEED TO BE IN CONTROL', 'Does s/he have a need to control things?', 'The quality of this item is that the child/young person will not ask for, or accept help from, adults or other children, as if s/he is used to always deciding what to do for him/herself.', 'Others', 1, 2, 0, 0),
(26, 'FALSE AFFECTION', 'When s/he is affectionate, does it feel genuine?', 'This item has the quality that there is a superficial, cloying or irritating quality to demonstrations of affection by the child/young person.', 'Others', 1, 2, 2, 2),
(27, 'HANGING ON BEHAVIOUR', 'Some children/young people have an irritating habit of hanging on to adults when they try to do other things and clearly signal that they need to focus on other chores. The parents/carers often end up having to either put away their other chores, or directly reject the child. Is s/he like that?', 'This behaviour has an irritating limpet-like quality in which the child/young person crowds the adult physically and may have to be peeled off.  The child’s/young person’s affect is likely to be false or cloying.    Should be distinguished from separation anxiety in which the child/young person is likely to be displaying anxiety and upset at being separated. Because this behaviour is difficult to describe unless it has been experienced, we recommend beginning by giving the parent the following example:', 'Others', 1, 2, 0, 0),
(28, 'POSSESSIVENESS', 'Does s/he react badly to you giving affection to another member of the family?', 'This has the quality that the child/young personwants the parent/carer all to him/herself and will physically try to get between the parent/carer and a rival e.g. spouse, sibling or other close family member or friend.', 'Others', 1, 2, 0, 0),
(29, 'PSEUDO-ADULT BEHAVIOUR', 'Is s/he drawn towards adults, even when in the company of other children?', 'This is not simply a lack of understanding of the social hierarchy (as in ASD): in order to score positively on this item the child/young person should be aware of who is “the boss”, but appear to think s/he is at the same level of the social hierarchy.', 'Others', 1, 2, 0, 0),
(30, 'SMEARING FAECES', 'Does s/he ever smear faeces on clothes, towels, furniture etc.?', 'Since s/he was toilet trained, has s/he ever moved his/her bowels anywhere other than the toilet?', 'Others', 1, 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questionnaires_masterbk`
--

CREATE TABLE `questionnaires_masterbk` (
  `que_id` int(11) NOT NULL,
  `question_heading` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `description` text NOT NULL,
  `question_type` varchar(255) NOT NULL,
  `score_yes` int(11) NOT NULL,
  `score_no` int(11) NOT NULL,
  `score_maybe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionnaires_masterbk`
--

INSERT INTO `questionnaires_masterbk` (`que_id`, `question_heading`, `question`, `description`, `question_type`, `score_yes`, `score_no`, `score_maybe`) VALUES
(1, 'INDISCRIMINATE ADULT RELATIONSHIPS', 'Is s/he desperate for affection from adults?', 'The child/young person is reported to be willing to be friendly towards almost any adult, to a degree unusually to his/her developmental age, social group, and familiarity with the adult. The child/young person demonstrates reduced or absent reticence around unfamiliar adults. Behaviour is inappropriate for contact with unfamiliar adults. In older children/teenagers it could include inappropriate behavior over the internet. This behaviour should not have a quality in which adults are simply being used as objects (as can be seen in ASD), but should be social in nature. Often the child/young person appears ‘needy’ or ‘clingy’, and behaves inappropriately with unfamiliar adults. This item should only be coded as being present when the child/young person’s behaviour is clearly outside normal limits. If in doubt, code this item as being absent. A child/young person who is simply friendly or polite to adults would not code here', 'Disinhibitied', 2, 0, 0),
(2, 'CUDDLINESS WITH STRANGERS', 'Is s/he too cuddly with adults s/he doesn’t know well?', 'The child/young person invades the social boundaries of strangers and acts in a pseudo-intimate way as if the stranger is a loved one.  This behaviour should not have quality in which adults are simply being used as objects (as can be seen in ASD), but should be social in nature.', 'Disinhibitied', 2, 0, 0),
(3, 'COMFORT SEEKING WITH STRANGERS', 'Does s/he preferentially seek comfort from strangers over those s/he is close to?', 'Only code here is the parent/carer is able to give an example of e.g. the child/young person hurting him/herself when both parent/carer and stranger are present and child/young person goes to stranger for comfort rather than parent/carer.', 'Disinhibitied', 2, 0, 0),
(4, 'PERSONAL QUESTIONS', 'Does s/he ask very personal questions of strangers in an attempt to be sociable?', 'This has a sociable quality as if the child/young person is trying to get to know the stranger, but does not recognize social boundaries or hierarchies. This behaviour should not have quality in which the adult is being questioned because of a stereotyped interest of the child/young person’s (as can be seen in ASD), but should be social in nature.', 'Disinhibitied', 2, 0, 0),
(5, 'INVADING SOCIAL BOUNDARIES', 'If you take him/her to a new place, does s/he go into areas other children/young people would know to be out of bounds e.g. the staff room in a clinic, or behind the counter in a shop?', 'Distinguish from impulsivity. The child/young person should clearly feel s/he has a right to be in places other children/young persons would know to be out of bounds.', 'Disinhibitied', 2, 0, 0),
(6, 'MINIMAL CHECKING IN UNFAMILIAR SETTINGS', 'If you are in a new place, does X tend to wander away from you?', 'Child rarely or minimally checks back with parent/carer after venturing away even in unfamiliar settings.', 'Disinhibitied', 2, 0, 0),
(7, 'WANDERING OFF WITH A STRANGER', 'Would your child go off with a stranger?', 'This item probes the likelihood that a child/young person will actually wander off with a stranger – for example if the stranger said “can I show something really interesting in my car? Come over and I’ll show you”', 'Others', 2, 0, 0),
(8, 'INDISCRIMINATE PEER RELATIONSHIP', 'Does X seem desperate for affection from other children?', 'The child/young person is willing to be friendly towards almost any peer, to a degree unusual for his/her developmental age, social group, and previous familiarity with the peer in question. Behavior is inappropriate for contact with unfamiliar peers. For example, the child/young person might call another child his/her best friend or hug, kiss, or touch another child who is unfamiliar to the childhim/her.', 'Others', 2, 0, 0),
(9, 'DEMANDING AND ATTENTION-SEEKING BEHAVIOR', 'Does s/he need to be the centre of attention?', 'The child/young person will go to great lengths to get an adult’s attention and will resent the adult giving attention to other people or activities.', 'Disinhibitied', 2, 0, 0),
(10, 'INABILITY TO SEEK COMFORT', 'Does he/she seek comfort from adults who take care of him/her?', 'This item receives a positive score if the child/young person does not normally seek comforting when he/she is distressed emotionally. If the child/young person does not react much to the different events capable of generating distress but nevertheless does experience distress on extremely rare occasions and, on these occasions, seeks comfort, a positive score is not to be given.', 'Others', 0, 2, 0),
(11, 'INABILITY TO ACCEPT COMFORT', 'How does he/she react when an adult who takes care of him/her tries to comfort him/her when he/she seems distressed (sad, anxious, hurt, sick or other physical indisposition)?', 'This item is scored positively if the child/young person does not usually accept comfort when he/she is emotionally distressed. The child/young person might say everything is fine or that he/she does not need help, push the adult parent/carer away or even have a more violent reaction. If the child/young person does not react much to events capable of generating distress but nevertheless experiences distress on very rare occasions and that on those occasions he/she accepts comfort, a positive score is not to be given.', 'Others', 0, 2, 0),
(12, 'EMOTIONAL AND SOCIAL WITHDRAWAL', 'Is s/he unusually emotionally withdrawn?', 'Code if the child/young person is routinely emotionally withdrawn, particularly during attempts at social interaction.  For example, sitting with hair or hoodie over face during attempts at conversation, turning physically away from the person trying to initiate conversation, or being dismissive of conversation (e.g. by monosyllabic responses or irritable disparagement of the social interaction). Code as positive if the child/young person was unusually emotionally withdrawn during the first interaction with a new person or during the beginning of a social interaction, even if they “warm up” later.', 'Inhibitied', 2, 0, 0),
(13, 'AVOIDS EYE CONTACT', 'Does s/he avoid looking you or others directly in the eyes?', 'Parent/carer’s generalized evaluation that the child/young person characteristically avoids making eye contact with others and that s/he often turns his/her eyes away when others try to initiate eye contact. This can still be rated as positive if the parent/carer says there is only eye contact when the child/young person is lying. Distinguish from avoidance of eye contact which occurs with shyness, e.g. when the child meets new people or is in an unfamiliar setting.  Distinguish also from culturally dictated strictures.', 'Inhibitied', 2, 0, 0),
(14, 'AVOID PHYSICAL CONTACT', 'Does s/he like to be hugged and cuddled?', 'Parent/carer\'s evaluation that the child/young person tries to avoid being physically close with others.', 'Others', 0, 2, 0),
(15, 'LIMITED POSITIVE AFFECT', 'Is [child’s first name] a child who generally seems to be happy?', 'Lack of warmth or emotional or physical affection in most, if not all, interactions with other people. Multiple interactions means that the lack of affection is pervasive and recurrent in many interactions. Do not code a child/young person\'s lack of affection if s/he is angry at a parent or is preoccupied with another task. This item is addressing a pervasive, not an episodic, lack of affection or inability to show affection.', 'Others', 0, 2, 0),
(16, 'DIFFICULTIES BEING AFFECTIONATE', 'Is X an affectionate child?', 'Lack of warmth, emotional or physical affection in most, if not all, interactions with others. Means that lack of affection is pervasive and recurring in many interactions. Do not code if the child/young person is angry with the caregivers or occupied with other activities. This item addresses a pervasive, not episodic lack of affection or lack of ability to show affection.', 'Others', 0, 2, 0),
(17, 'RELATIONAL UNPREDICTABILITY', 'Does he/she ever get angry or become irritable with you for no apparent reason (e.g., you are not punishing him/her or forbidding him/her from doing something)?', 'This item receives a positive score if the child/young person demonstrates unpredictable episodes of irritability, sadness or fright during non-threatening interactions with parents/carers. These episodes of irritability, sadness or fear do not manifest themselves only when the child/young person receives punishment, denied a request, is facing a request or requirement on the part of a parent/careror any other situation that typically can evoke these emotional reactions.', 'Inhibitied', 2, 0, 0),
(18, 'APPROACH/AVOIDANCE TOWARD CAREGIVERS', 'Does X often approach you and then suddenly withdraw from or avoid contact with you?', 'On a regular basis, child/young person responds to parents or other caregivers (such as grandparents, teachers) in contradictory ways. Child may approach a person for help and then withdraw, avoid, or reject that person as s/he tries to respond to the needs/requests of the child.', 'Others', 2, 0, 0),
(19, 'HYPERVIGILANCE', 'Does s/he seem wary or watchful, even though you can’t see any reason why?', 'Looks wary or watchful despite literal threat. Parents/carers may note that s/he scans the environment. There is a fearful quality to this.', 'Inhibitied', 2, 0, 0),
(20, 'FROZEN WATCHFULNESS', 'Does s/he often stand or sit as if frozen?', 'A child/young person who stands/sits so still that it is as if s/he is frozen, wants to be invisible or wants to avoid being hurt despite a literal threat.  There is a fearful quality to this.', 'Inhibitied', 2, 0, 0),
(21, 'MISUNDERSTANDING EMOTIONS', 'Does s/he often misunderstand people’s  emotions?', 'When present, this item has the quality of the child/young person not being able to gauge the type and intensity of emotion being expressed by others.  This could include perceiving a parent/carer or teacher’s mild annoyance as anger, or perceiving praise as manipulation.    It should be distinguished from the lack of focus on faces/eyes and difficulty recognizing basic facial expressions found in autism spectrum disorders.', 'Others', 2, 0, 0),
(22, 'NEGATIVE ATTITUDE TOWARD SELF', 'Does s/he often bad mouth him/herself?', 'The child/young person has a negative attitude towards him/herself as demonstrated by bad language about him/herself, self-harm e.g. cutting, scratching, headbanging, and/or by losing/breaking/refusing possessions/gifts as if these things are too good for him/her.  Self-harm activities should be clearly associated with a sense of the child disliking or being angry with him/herself and should not include self-stimulation.   ', 'Others', 2, 0, 0),
(23, 'LACK OF REMORSE', 'Is s/he sorry if s/he has done something wrong?', '', 'Others', 0, 2, 0),
(24, 'LACK OF EMPATHY/EMOTIONAL RESPONSIVENESS', 'Is s/he good at understanding other people’s feelings?', 'Lack of awareness of, and sensitivity to, other people’s feelings. Lack of ability to detect other’s feelings, not lack of willingness to respond to them.  This lack is pervasive and not specific to any particular relationship.', 'Others', 0, 2, 0),
(25, 'NEED TO BE IN CONTROL', 'Does s/he have a need to control things?', 'The quality of this item is that the child/young person will not ask for, or accept help from, adults or other children, as if s/he is used to always deciding what to do for him/herself.', 'Others', 2, 0, 0),
(26, 'FALSE AFFECTION', 'When s/he is affectionate, does it feel genuine?', 'This item has the quality that there is a superficial, cloying or irritating quality to demonstrations of affection by the child/young person.', 'Others', 2, 2, 2),
(27, 'HANGING ON BEHAVIOUR', 'Some children/young people have an irritating habit of hanging on to adults when they try to do other things and clearly signal that they need to focus on other chores. The parents/carers often end up having to either put away their other chores, or directly reject the child. Is s/he like that?', 'This behaviour has an irritating limpet-like quality in which the child/young person crowds the adult physically and may have to be peeled off.  The child’s/young person’s affect is likely to be false or cloying.    Should be distinguished from separation anxiety in which the child/young person is likely to be displaying anxiety and upset at being separated. Because this behaviour is difficult to describe unless it has been experienced, we recommend beginning by giving the parent the following example:', 'Others', 2, 0, 0),
(28, 'POSSESSIVENESS', 'Does s/he react badly to you giving affection to another member of the family?', 'This has the quality that the child/young personwants the parent/carer all to him/herself and will physically try to get between the parent/carer and a rival e.g. spouse, sibling or other close family member or friend.', 'Others', 2, 0, 0),
(29, 'PSEUDO-ADULT BEHAVIOUR', 'Is s/he drawn towards adults, even when in the company of other children?', 'This is not simply a lack of understanding of the social hierarchy (as in ASD): in order to score positively on this item the child/young person should be aware of who is “the boss”, but appear to think s/he is at the same level of the social hierarchy.', 'Others', 2, 0, 0),
(30, 'SMEARING FAECES', 'Does s/he ever smear faeces on clothes, towels, furniture etc.?', 'Since s/he was toilet trained, has s/he ever moved his/her bowels anywhere other than the toilet?', 'Others', 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questionnaires_probes`
--

CREATE TABLE `questionnaires_probes` (
  `probes_id` int(11) NOT NULL,
  `que_id` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionnaires_probes`
--

INSERT INTO `questionnaires_probes` (`probes_id`, `que_id`, `question`) VALUES
(1, 1, 'Does it worry you?'),
(4, 6, 'Does it worry you?'),
(13, 8, 'Does it worry you?');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaires_probesbk`
--

CREATE TABLE `questionnaires_probesbk` (
  `probes_id` int(11) NOT NULL,
  `que_id` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionnaires_probesbk`
--

INSERT INTO `questionnaires_probesbk` (`probes_id`, `que_id`, `question`) VALUES
(1, 1, 'Does it worry you?'),
(2, 1, 'Do you think it’s a problem?  '),
(3, 1, 'Has s/he always been like that?'),
(4, 6, 'Does s/he check in with you?'),
(5, 6, 'Either by making eye contact with you or coming back to where you are?'),
(6, 6, ' Does this behaviour worry you?  Do you think it’s a problem?'),
(7, 6, 'Does it ever put him/her in danger?'),
(8, 6, 'Does s/he fail to let you know where s/he is, and/or when s/he is coming home?'),
(9, 6, 'Is s/he away for long periods of time without you knowing where s/he is?'),
(10, 6, 'Does this behaviour worry you?  '),
(11, 6, 'Do you think it’s a problem?'),
(12, 6, 'Does it ever put him/her in danger?'),
(13, 8, 'Does it worry you?'),
(14, 8, 'Do you think it\'s a problem?'),
(15, 8, 'When did s/he start acting this way?'),
(16, 13, 'Does this happen with everyone?'),
(17, 13, 'When did this start?'),
(18, 14, 'Does s/he like to sit on someone’s lap?'),
(19, 14, 'Whose?'),
(20, 14, 'How about with other people, like her grandparents?'),
(21, 14, 'How often does it happen?'),
(22, 14, 'When did this start?'),
(23, 20, 'Was he ever like this?');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `question_type` enum('teacher','parent') NOT NULL,
  `status` enum('yes','no') NOT NULL,
  `rpq_question_type` varchar(255) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question`, `question_type`, `status`, `rpq_question_type`, `creation_date`) VALUES
(1, 'Gets too physically close to strangers ', 'teacher', 'yes', '', '2016-10-24 17:46:23'),
(2, 'Is too cuddly with people s/he doesn’t know well', 'teacher', 'yes', '', '2016-10-24 17:46:23'),
(3, 'Often asks very personal questions of strangers even though s/he does not mean to be rude', 'teacher', 'yes', '', '2016-10-24 17:47:22'),
(4, 'Can be aggressive towards him/herself e.g. using bad language about him/herself, headbanging, cutting etc.', 'teacher', 'yes', '', '2016-10-24 17:47:22'),
(5, 'Has problems with conscience', 'teacher', 'yes', '', '2016-10-24 17:48:06'),
(6, 'Is too friendly with strangers', 'teacher', 'yes', '', '2016-10-24 17:48:06'),
(7, 'Sometimes looks frozen with fear, without an obvious reason', 'teacher', 'yes', '', '2016-10-24 17:48:53'),
(8, 'If you approach him/her, he/she often runs away or refuses to be approached', 'teacher', 'yes', '', '2016-10-24 17:48:53'),
(9, 'There is a false quality to the affection s/he gives', 'teacher', 'yes', '', '2016-10-24 17:49:24'),
(10, 'If you approach him/her, you never know whether s/he will be friendly or unfriendly', 'teacher', 'yes', '', '2016-10-24 17:49:24'),
(11, 'Will not admit that they cannot do tasks', 'teacher', 'yes', '', '2016-10-24 18:50:30'),
(12, 'Will not ask for help with tasks', 'teacher', 'yes', '', '2016-10-24 18:50:30'),
(13, 'Tends to copy other children', 'teacher', 'yes', '', '2016-10-24 18:50:57'),
(14, 'Is too keen to get to know school staff, eg teachers, janitor, playground supervisors', 'teacher', 'yes', '', '2016-10-24 18:50:57'),
(15, 'Does not seek comfort when hurt or upset', 'teacher', 'yes', '', '2016-10-24 18:51:13'),
(16, 'Gets too physically close to strangers', 'parent', 'yes', '', '2016-10-24 18:54:10'),
(17, 'Is too cuddly with people s/he doesn’t know well', 'parent', 'yes', '', '2016-10-24 18:54:10'),
(18, 'Often asks very personal questions of strangers even though s/he does not mean to be rude', 'parent', 'yes', '', '2016-10-24 18:54:52'),
(19, 'Can be aggressive towards him/herself e.g. using bad language about him/herself, headbanging, cutting etc.', 'parent', 'yes', '', '2016-10-24 18:54:52'),
(20, 'Has no conscience', 'parent', 'yes', '', '2016-10-24 18:55:19'),
(21, 'Is too friendly with strangers', 'parent', 'yes', '', '2016-10-24 18:55:19'),
(22, 'Sometimes looks frozen with fear, without an obvious reason', 'parent', 'yes', '', '2016-10-24 18:55:54'),
(23, 'If you approach him/her, he/she often runs away or refuses to be approached', 'parent', 'yes', '', '2016-10-24 18:55:54'),
(24, 'There is a false quality to the affection s/he gives', 'parent', 'yes', '', '2016-10-24 18:56:24'),
(25, 'If you approach him/her, you never know whether s/he will be friendly or unfriendly', 'parent', 'yes', '', '2016-10-24 18:56:24'),
(26, 'Does not tend to go to parents/caregivers for comfort or soothing', 'parent', 'yes', '', '2016-10-24 18:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_password` varchar(255) NOT NULL,
  `center_name` varchar(255) NOT NULL,
  `number_of_child` varchar(255) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `forgot_string` varchar(255) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `role`, `email`, `password`, `updated_password`, `center_name`, `number_of_child`, `time_stamp`, `forgot_string`, `total_amount`, `payment_status`, `transaction_id`, `admin_password`) VALUES
(38, 'name', 'admin', 's.koepplinger@gmail.com', '99ee4887dab8c8639cb8adbd150963d6', '', 'tester', '1', '2017-11-30 17:20:19', '7cbbc409ec990f19c78c75bd1e06f215', 10, '', '', ''),
(39, '', 'parent', 'sko.epplinger@gmail.com', '72cf0a1f0adbe4fdf8a6b69c44218335', '', '', '', '2017-11-30 17:21:16', '67c6a1e7ce56d3d6fa748ab6d9af3fd7', 0, '', '', ''),
(40, '', 'parent', 'skoe.pplinger@gmail.com', '72cf0a1f0adbe4fdf8a6b69c44218335', '', '', '', '2017-11-30 17:21:16', 'f457c545a9ded88f18ecee47145a72c0', 0, '', '', ''),
(41, '', 'clinical', 'sk.oepplinger@gmail.com', '8cae93758c9874e80821d404262602a8', '', '', '', '2017-11-30 17:21:17', '43ec517d68b6edd3015b3edc9a11367b', 0, '', '', ''),
(42, '', 'teacher', 'skoep.plinger@gmail.com', '99ee4887dab8c8639cb8adbd150963d6', '', '', '', '2017-11-30 17:21:17', 'f457c545a9ded88f18ecee47145a72c0', 0, '', '', ''),
(43, 'Irene O\'Neill ', 'admin', 'irene.oneill@glasgow.ac.uk', '151c8559aecde9edcb1e0c9fa8949b2a', '', 'ACE Centre ', '1', '2017-12-05 14:13:56', '', 10, '', '', ''),
(44, '', 'parent', 'robert.fraser2@gov.scot', '1dc25378797f54660373b95bfb6fbbcd', '', '', '', '2017-12-05 14:19:58', '', 0, '', '', ''),
(45, '', 'clinical', 'helen.minnis@glasgow.ac.uk', '99ee4887dab8c8639cb8adbd150963d6', '', '', '', '2017-12-05 14:19:59', '182be0c5cdcd5072bb1864cdee4d3d6e', 0, '', '', ''),
(46, '', 'teacher', 'skoepp.linger@gmail.com', '99ee4887dab8c8639cb8adbd150963d6', '', '', '', '2018-01-03 10:31:54', 'f033ab37c30201f73f142449d037028d', 0, '', '', ''),
(47, '', 'parent', 'paula.mcmahon1@hotmail.co.uk', '3c004ae68f6fdb4eba48769aae655f51', '', '', '', '2018-01-05 15:18:15', '', 0, '', '', ''),
(48, '', 'teacher', 'keoplinger@gmail.com', '326f75bdfe91b80abbeb8363a296ab16', '', '', '', '2018-01-05 15:18:16', '', 0, '', '', ''),
(49, '', 'parent', 'skoepplinger@gmail.com', '85c7d3693f5974c2234d3ed9d7ab015c', '', '', '', '2018-01-08 14:44:12', '735b90b4568125ed6c3f678819b6e058', 0, '', '', ''),
(50, '', 'teacher', 's.k.oepplinger@gmail.com', '12e1adff891bfe78684e3fc3004be3ef', '', '', '', '2018-01-09 10:20:27', '', 0, '', '', ''),
(51, 'Test', 'admin', 'testerw3nuts@gmail.com', '381cfd916b51f8e091970b1a04ce6d0e', '', 'test', '2', '2018-02-26 07:26:44', '', 20, '1', '55g9q33g', ''),
(52, '', 'parent', 'vaibhav.w3nuts@gmail.com', '39b912b27086992d02639cc376c8f377', '', '', '', '2018-02-26 07:28:09', '', 0, '', '', ''),
(53, 'steve koepplinger', 'admin', 'sk.oepplinge.r@gmail.com', '90cf7fcf7958d2934cd6ce3e5999b653', '', 'Glasgow Minnis', '5', '2018-07-17 20:11:06', '', 50, '', '', ''),
(54, 'Olga', 'admin', 'Olga.Karagiorgou@glasgow.ac.uk', '99ee4887dab8c8639cb8adbd150963d6', '99ee4887dab8c8639cb8adbd150963d6', 'Lappin', '2', '2018-07-18 13:23:17', '', 20, '', '', ''),
(55, '', 'parent', 'shanielappin@gmail.com', '04598347352581f6f5d268434c219c6e', '', '', '', '2018-07-18 13:49:53', '', 0, '', '', ''),
(56, 'Rebecca', 'admin', 'rebecca.dyas@glasgow.ac.uk', 'af14168de729df5e1ed091265a15dbff', '', 'University of Glasgow', '1', '2019-01-15 10:23:23', '', 10, '', '', ''),
(57, 'stephen koepplinger', 'admin', 'skoepplin.ger@gmail.com', '06e4dff3c420e66ae6927dc539ba82c6', '', 'skoepplin.ger@gmail.com', '5', '2019-11-28 13:19:27', '54229abfcfa5649e7003b83dd4755294', 0, '', '', ''),
(58, 'stephen koepplinger', 'admin', 'skoepplinge.r@gmail.com', '85c7d3693f5974c2234d3ed9d7ab015c', '', 'gecko', '1', '2019-11-29 22:48:37', '', 10, '', '', ''),
(59, 'Sebastien Monette', 'admin', 'sebastien_monette@hotmail.com', '9a3a18435d653cf77b9bef64360696e3', '', 'IUJD', '1', '2019-12-06 14:30:38', '', 10, '0', '', ''),
(60, '', 'parent', 'sebastien.monette.sm@gmail.com', '59654ef22773a29a752f4abee4de6875', '', '', '', '2019-12-06 14:34:46', '', 0, '', '', ''),
(61, '', 'teacher', 'sebastien.monette@cjm-iu.qc.ca', 'a318a3d84a027d28c709ee43bb0c270e', '', '', '', '2019-12-06 14:34:46', '', 0, '', '', ''),
(62, 'FAWbiTaR', 'admin', 'danielmarilynn17@gmail.com', '13d6731d785734c61097f8860f34f9f2', '', 'qOWcXIAwd', '1', '2019-12-30 16:04:50', '', 0, '', '', ''),
(63, 'axKMnUXFSReNpk', 'admin', 'davidmiller10802@gmail.com', '47ed07e4d25c8e40db745f147f14bf4e', '', 'tqhmTpYAfIBLQOV', '1', '2020-02-24 23:46:29', '', 0, '', '', ''),
(64, 'KITsrWZhCv', 'admin', 'franklinbrandi93@gmail.com', '76e0cac7e45631e73750645a9f0810c4', '', 'JxHzcWrvXVSLDNal', '1', '2020-02-25 18:13:16', '', 0, '', '', ''),
(65, 'kEWuDtnV', 'admin', 'pud75@gmail.com', 'b398b5722106beae9bb7390e8d3528eb', '', 'SuiZUOQsADwt', '1', '2020-02-25 20:11:38', '', 0, '', '', ''),
(66, 'fGkvqgTAuEnM', 'admin', 'christineburk0027@gmail.com', '26a5749ab3481dbf09339785cc77e538', '', 'nBasZNHe', '1', '2020-02-25 22:00:30', '', 0, '', '', ''),
(67, 'ljvRPAZpIUO', 'admin', 'joannmaaser@hotmail.com', 'b0013e616d1fd62d45a6af7dc66efb25', '', 'VZbyzOnieKHN', '1', '2020-02-25 22:36:02', '', 0, '', '', ''),
(68, 'RTOIZnMVSzEkcUjP', 'admin', 'tanianashay@gmail.com', '7ecfdeb1c9cbea48b9417bbebb707575', '', 'AdaWbnSwQjZeGtKs', '1', '2020-02-25 23:23:24', '', 0, '', '', ''),
(69, 'wuYLbPiBp', 'admin', 'jemmerson21@yahoo.com', 'ca840f6be4a80a06de10d4020cb84e8e', '', 'tHjArexGmTKFXNSP', '1', '2020-02-26 17:51:22', '', 0, '', '', ''),
(70, 'PivHyQNbxFqjZGEL', 'admin', 't.couling@aol.com', '8d2e8a9a8358a2574df8f8fedf329c52', '', 'vjRzaJeu', '1', '2020-02-26 21:25:54', '', 0, '', '', ''),
(71, 'JhtfGpgiVSOy', 'admin', 'bertolero16@gmail.com', '4702fdfc1c848de10bad2611bc88cd50', '', 'QIncvoUu', '1', '2020-02-26 23:15:25', '', 0, '', '', ''),
(72, 'xTvFiIjlUR', 'admin', 'anissa077@aol.com', '5267c38b687a8c071cd17265e4aa880e', '', 'HaOuVYtSq', '1', '2020-02-27 00:37:52', '', 0, '', '', ''),
(73, 'bBVvpfMTsAHLR', 'admin', 'galmjl@yahoo.com', '8d0d8f1fb9f7d0b8b776bfc3b31a587c', '', 'JYNZxGTIX', '1', '2020-02-27 01:00:20', '', 0, '', '', ''),
(74, 'NwAsDLCqjMUQVp', 'admin', 'arcox2005@yahoo.com', '5586b50827c255225dc33d11f70d6df2', '', 'CYUXfVwI', '1', '2020-02-27 03:05:23', '', 0, '', '', ''),
(75, 'oXhraZIwkdHG', 'admin', 'rrbardsley@aol.com', '44354fcbcffba12c8f01d21a2d8450b5', '', 'trSVaviHLuCBqZxI', '1', '2020-02-27 10:29:45', '', 0, '', '', ''),
(76, 'fTvCJbopZ', 'admin', 'jeffw1209@yahoo.com', '171d6c5109f3d92cf4d86bf359155a4b', '', 'KNArGmzpeyTJxhH', '1', '2020-02-27 11:44:47', '', 0, '', '', ''),
(77, 'xclvMNnrohVRs', 'admin', 'mb7407@aol.com', '3c60a775b11433d2f430fe8204a66797', '', 'JjgUunfMvpoRzySG', '1', '2020-02-27 12:13:32', '', 0, '', '', ''),
(78, 'olxvIrkeLO', 'admin', 'wohs2013pg@yahoo.com', '02de7951342cc9c5d804cf83d477288d', '', 'NCRzbGJYsIltdk', '1', '2020-02-27 15:17:32', 'c51ce410c124a10e0db5e4b97fc2af39', 0, '', '', ''),
(79, 'piguWlCso', 'admin', 'jonesy3tre@gmail.com', '5a4d5717ad63da3d9b317548caf63cbc', '', 'SEHTeICLaWFPkOu', '1', '2020-02-27 17:40:41', '', 0, '', '', ''),
(80, 'VjJCwkSdBi', 'admin', 'aldrichstopp@yahoo.com', 'afd2c2b09761f8ee88d68b5eec77961f', '', 'fLKOSZvomgr', '1', '2020-02-27 20:17:16', '', 0, '', '', ''),
(81, 'nJMAqECjvNpd', 'admin', 'horaceunknownbut@yahoo.com', '6ef8f82620abadca2de4a7380ac0a3c1', '', 'tajgiIXoPS', '1', '2020-02-27 20:30:35', '', 0, '', '', ''),
(82, 'aJxKsUPRwOrET', 'admin', 'beckycbm@yahoo.com', '4fff79045f7b5ca5b84d182280f10b40', '', 'UXHALhxNVkjtlOsW', '1', '2020-02-27 22:33:42', '', 0, '', '', ''),
(83, 'KkPlDRVpw', 'admin', 'rithomas2003@yahoo.com', '853bbde469616256b4269e6de7052685', '', 'WTkqmzseb', '1', '2020-02-28 01:40:32', '', 0, '', '', ''),
(84, 'cirLKEml', 'admin', 'minimer53@aol.com', '1778e00dba0dcf817d5158b52d7a86c7', '', 'GlzBtQAYspMyDun', '1', '2020-02-28 06:07:51', '', 0, '', '', ''),
(85, 'VzGbKoTiIyAmJgkP', 'admin', 'debcastel@hotmail.com', '0b2d3176c45e51196c22b90629bad3ee', '', 'ygfnSUXTZouiW', '1', '2020-02-28 06:52:11', '', 0, '', '', ''),
(86, 'ToWkudvzKeUJw', 'admin', 'peesmall@aol.com', '20e9814d75be65bf4f2d75f63227c85b', '', 'RYDOmGEI', '1', '2020-02-28 06:57:14', '', 0, '', '', ''),
(87, 'WGYqJIeaLSOxUkb', 'admin', 'csriquelme@comercialrym.es', '68c4de44395515d5ab20cf934d0c46b2', '', 'UbPDKVWOZ', '1', '2020-02-28 14:19:39', '', 0, '', '', ''),
(88, 'vydZPIXUSrCc', 'admin', 'edef4210@gmail.com', 'c2124bb6e5a8ae8e9ef8de5472b58638', '', 'LDVpExNtioG', '1', '2020-02-28 17:51:54', '', 0, '', '', ''),
(89, 'umPnwpQrHtTbABl', 'admin', 'blackbear428@verizon.net', '09a49dc9a10747d0acc9b24fb852779e', '', 'cmDWUgjipQ', '1', '2020-02-28 21:06:30', '', 0, '', '', ''),
(90, 'jDbtKGuywkiO', 'admin', 'renegademiyagi@gmail.com', '2d4c69f5d2470d1e64b2d6df4eaab729', '', 'dtzxEkFYVfmCQXB', '1', '2020-02-28 22:08:41', '', 0, '', '', ''),
(91, 'XmCRoJKuePOvtqW', 'admin', '4lindenb@comcast.net', '19f967888bfa6976bfd8f6df134d6b6f', '', 'CSXojUTeH', '1', '2020-02-28 23:39:31', '', 0, '', '', ''),
(92, 'ZnNAFGCIzxwT', 'admin', 'kdbrazil@gmail.com', '794b0e6113eba063b84708bf75ba8934', '', 'LJlTWNikMbDZr', '1', '2020-03-02 06:43:04', '', 0, '', '', ''),
(93, 'jgEzXKdV', 'admin', 'nawalabdul@gmail.com', '1a80e1fc951fedfb54fa2576c747cd49', '', 'HtPjvNSMoZpe', '1', '2020-03-02 14:30:16', '', 0, '', '', ''),
(94, 'mibvZcTInNJHQ', 'admin', 'rbuerki@cox.net', 'faf264c8747aaeb4543d9d01c0743814', '', 'EOherKGYTDb', '1', '2020-03-02 17:55:58', '', 0, '', '', ''),
(95, 'BqUEjZNMC', 'admin', 'michael.block@oicls.com', 'd1dd6abb2df7aae9a886f50c7f353364', '', 'EBYcUZifF', '1', '2020-03-02 18:28:25', '', 0, '', '', ''),
(96, 'ZuJEclnoTwUMBR', 'admin', 'rej3381@embarqmail.com', 'abc9741d42743ae7c4766250706bc7e2', '', 'MfkmVoWutKlwez', '1', '2020-03-02 19:28:05', '', 0, '', '', ''),
(97, 'nQqNYPWFlopCyfk', 'admin', 'kayodeijalana@gmail.com', '1bd7661ea6ed5fffc659ec4853f5abbf', '', 'QMrpIVGnfTBt', '1', '2020-03-02 21:31:42', '', 0, '', '', ''),
(98, 'NqZnvjXdMDKlcHR', 'admin', 'bstoneaz79@gmail.com', 'e3710e82af43b8ac51dc1d260263500f', '', 'XvZYqrxagMQB', '1', '2020-03-03 10:10:29', '', 0, '', '', ''),
(99, 'iYuBNAJWMhcxXse', 'admin', 'nella.a@comcast.net', 'd893bf94336983ba0c86f3fc4e74efc3', '', 'HCXLhqKxztrGpjWJ', '1', '2020-03-03 11:38:18', '', 0, '', '', ''),
(100, 'imltPyqbQjxBdKW', 'admin', 'flaviatamieli7@gmail.com', '1900ef0fa44fd155b86296a94a157898', '', 'ikedHPzchX', '1', '2020-03-03 12:17:59', '', 0, '', '', ''),
(101, 'ydGzunmACtSpo', 'admin', 'brookwilson416@gmail.com', 'f8ba8f04449924cd0663c20259084c58', '', 'kFrWDZSYBL', '1', '2020-03-03 22:41:13', '', 0, '', '', ''),
(102, 'DKSrensuhIqQil', 'admin', 'patriciadavis5975@gmail.com', '7ea78e32ff0abf2f1d1f19961986314f', '', 'ciARJSpQ', '1', '2020-03-03 22:51:17', '', 0, '', '', ''),
(103, 'SZatMcJpPyide', 'admin', 'isaac.walberg@gmail.com', '02f8c18475d037185990f83f92a9beae', '', 'FCUHkDaguGczy', '1', '2020-03-04 05:38:24', '', 0, '', '', ''),
(104, 'MiVtongzsLwHGPA', 'admin', 'thegeisels@outlook.com', '06996f1051a88f3c84ec7212c3d88de4', '', 'BUZWOcdhqGpEaCb', '1', '2020-03-04 08:07:58', '', 0, '', '', ''),
(105, 'AtkCKGSZDNxOw', 'admin', 'ahgerkman@gmail.com', '13ed985975f5e5b6a6d66265d56edc31', '', 'zEQuUVCXDKZHvFxJ', '1', '2020-03-04 20:44:08', '', 0, '', '', ''),
(106, 'TeAmvsELRjKGat', 'admin', 'devjgibson@gmail.com', '95aa33ef483fce90d679a0abfbfb3d52', '', 'ncGXNtOsiajEMkwW', '1', '2020-03-04 21:08:11', '', 0, '', '', ''),
(107, 'sHmgScqY', 'admin', 'halliman.liam@yahoo.com', '2ed205d6e766cba04b9e4b885d48cc5d', '', 'bZdVMFEAozlqCQ', '1', '2020-03-05 05:42:28', '', 0, '', '', ''),
(108, 'mpabDjGMyZP', 'admin', 'mooware@comcast.net', '0b74163a0210843860011d13926c31e3', '', 'mNIyAdGEucWj', '1', '2020-03-05 07:50:56', '', 0, '', '', ''),
(109, 'prIkfRBo', 'admin', 'snowrs@hotmail.com', '7b94894e08b1c403ed872730915d1137', '', 'LUHoNiEvhk', '1', '2020-03-05 08:51:57', '', 0, '', '', ''),
(110, 'ArVYXxNbwnGM', 'admin', 'sckemeter@gmail.com', 'da1c78f11270ca5ef521d11478db125d', '', 'yFOhUPztjfivV', '1', '2020-03-06 06:02:43', '', 0, '', '', ''),
(111, 'OewqovYCRExFHP', 'admin', 'jkfrost2000@gmail.com', '0c5c2093e633259df5bc942ccd462f5d', '', 'LlDMwXGRby', '1', '2020-03-07 00:57:24', '', 0, '', '', ''),
(112, 'SHJsCLOGZ', 'admin', 'draimondi2019@gmail.com', '25d177d18df305426f710e364a66e56a', '', 'kxeOjzsEcMwLmVNU', '1', '2020-03-09 14:44:07', '', 0, '', '', ''),
(113, 'GzinKqrh', 'admin', 'browntm@windstream.net', '150788e914ac55386e52f031de9c7c68', '', 'fQcuWJzyopOa', '1', '2020-03-10 17:27:41', '', 0, '', '', ''),
(114, 'TJnmsBlzxvS', 'admin', 'tonnie.dick@yahoo.com', 'f63d726e99a6db58d8ef6264fc67e8c0', '', 'FGIgbJMBiLP', '1', '2020-03-11 10:40:18', '', 0, '', '', ''),
(115, 'VEyQrZsjTUH', 'admin', 'teresaleskew@cox.net', '903fed4bd36ffad001c947a8c97dcb1f', '', 'RUWCXxvdte', '1', '2020-03-11 18:07:35', '', 0, '', '', ''),
(116, 'uGlUctQYqIRmrS', 'admin', 'jmarello@cox.net', '8a7a286fe67004610138aa9f152dbf79', '', 'yomtlsSZBOIfJxF', '1', '2020-03-11 18:15:41', '', 0, '', '', ''),
(117, 'PQOcyHRT', 'admin', 'marymartin9077@gmail.com', 'fab4e3443b048cdff73918283293f5d9', '', 'ukajIFDRtxqA', '1', '2020-03-12 00:30:30', '', 0, '', '', ''),
(118, 'KLZYioQjasNI', 'admin', 'rohrabacher.hobard@yahoo.com', '52be12cab6c423bc7f974d4c896e499b', '', 'FbZwIJRoQBnfWDY', '1', '2020-03-17 17:58:05', '', 0, '', '', ''),
(119, 'bwziVBeJ', 'admin', 'llloyd57@yahoo.com', 'c6d80191918cc4bc06ffc1cefd481d0a', '', 'MaKpEXeC', '1', '2020-03-17 18:28:58', '', 0, '', '', ''),
(120, 'eHjzPBotZ', 'admin', 'elinorwilkerson8@gmail.com', 'cfc5d1a1da3571dfc105c2d6627de17e', '', 'fvXFbrKzaopHx', '1', '2020-03-19 23:42:00', '', 0, '', '', ''),
(121, 'RxdgwOaBIy', 'admin', 'ecroydgery@yahoo.com', 'a6e618f96c5f1761c78134bed1aa5450', '', 'jDHzWBSGcfE', '1', '2020-03-23 07:59:50', '', 0, '', '', ''),
(122, 'dotHBmJYP', 'admin', 'baylor.carey@yahoo.com', '29f2fe976fbf87aa7828d116ca870a0f', '', 'QzEXxRiPuHtAZp', '1', '2020-03-25 22:11:50', '', 0, '', '', ''),
(123, 'mDrQZFnqILJdG', 'admin', 'williamsonarleen767@gmail.com', '180a166eefd54954423cc4e12abe7773', '', 'FAdDvgqosxSQ', '1', '2020-04-02 01:46:11', '', 0, '', '', ''),
(124, 'OdEwkIMNR', 'admin', 'winsland.dom@yahoo.com', 'd9a21124c85ac1ff74a338edfd201db0', '', 'vXwPfMQSHDpYe', '1', '2020-04-05 16:43:26', '', 0, '', '', ''),
(125, 'sQJdmPRkcO', 'admin', 'merritf1@earthlink.net', '38512e12ab6516bdf7498deeb275c45a', '', 'fyEASuGThUBDsz', '1', '2020-04-05 23:28:47', '', 0, '', '', ''),
(126, 'LBEyeTFjJfaNWQR', 'admin', 'smmoll@msn.com', 'd3b3f9053d3426eb4a5251bdb8f09951', '', 'NOkjYTUcy', '1', '2020-04-06 20:38:11', '', 0, '', '', ''),
(127, 'WEXoLprT', 'admin', 'msrebacaffee@gmail.com', 'ed28c3029a759d7ca04b916af38e186b', '', 'jHMeBQCzASZlJoN', '1', '2020-04-06 20:39:51', '', 0, '', '', ''),
(128, 'zAJUPqSyXiEen', 'admin', 'jody_thomas001@comcast.net', 'a7b84d1f1a0e9c56ae3ce94c4758e540', '', 'UEjNiOrHDZa', '1', '2020-04-07 01:06:12', '', 0, '', '', ''),
(129, 'QgcYIuOnK', 'admin', 'john@belsitoassociates.com', '48b278d6f991a233e3f2a4c7e93e9476', '', 'yOvDouSxgBHfN', '1', '2020-04-07 04:19:26', '', 0, '', '', ''),
(130, 'aBDnJQKX', 'admin', 'holtmainstone@yahoo.com', '62cf0940fc6d76e7212b898116327869', '', 'WZPHgVmb', '1', '2020-04-07 05:00:46', '', 0, '', '', ''),
(131, 'lTJHOvExuDFo', 'admin', 'tim.reid@southwire.com', '6a931357322016e881399828beff0dc5', '', 'ljDecMTodUWYbB', '1', '2020-04-07 15:27:23', '', 0, '', '', ''),
(132, 'mZdXRaKVblOLyx', 'admin', 'greencolton70@gmail.com', 'edf5a2af38b1a8b5c4d2752cfcbe1f77', '', 'YNuGtcxJhVPz', '1', '2020-04-08 09:25:05', '', 0, '', '', ''),
(133, 'UnXbYsoxmhfOLzKy', 'admin', 'tom@hometek.org', '9d1eb5ffc189412f5f581af599698ee8', '', 'XNRbwZaKB', '1', '2020-04-09 07:15:58', '', 0, '', '', ''),
(134, 'SbZGXBHEmDdoY', 'admin', 'cgignac47@gmail.com', '75300e4a25168e6db7636c052349d681', '', 'IgPfvsleDXhU', '1', '2020-04-09 09:57:01', '', 0, '', '', ''),
(135, 'IGfVdNaXw', 'admin', 'mccormickrobert014@gmail.com', '95cff1cf097e2210e51759ecaa45a4a8', '', 'euWHRGnq', '1', '2020-04-09 21:29:53', '', 0, '', '', ''),
(136, 'NDqvEsgLa', 'admin', 'coritaselby@gmail.com', '0368c4e01fbfbd8ba678a99f0d26d2d3', '', 'WIKEFSrLzXxBM', '1', '2020-04-10 17:21:14', '', 0, '', '', ''),
(137, 'fxARpesCLt', 'admin', 'joshua.t.riddle@hotmail.com', '83485afe17614c3c762e12c015fc5b42', '', 'dFeGZfuq', '1', '2020-04-12 15:35:17', '', 0, '', '', ''),
(138, 'zOVdqXnNIAk', 'admin', 'ingmar.mimmack@yahoo.com', '69546e9cde2b5bca239600c26adebeb3', '', 'GYzQpwAMKCf', '1', '2020-04-12 22:39:22', '', 0, '', '', ''),
(139, 'wXcHgPZLGR', 'admin', 'sandra.johnson@hqda.army.mil', '25b1b227ddd3d4d7a9ef528dc4978635', '', 'EHlaXifcGFqKNAS', '1', '2020-04-13 16:38:22', '', 0, '', '', ''),
(140, 'zEbMNmXu', 'admin', 'agstetson@msn.com', '64a976a2001c78e77ff3b3612c2ad414', '', 'QlvmrCftUVA', '1', '2020-04-13 17:22:02', '', 0, '', '', ''),
(141, 'tQXOTUqCEk', 'admin', 'lisa@bigdpaving.com', 'ad5114e283d8d33d24ede47d761198ec', '', 'DLUyTkAnFSaHwKRB', '1', '2020-04-13 18:20:19', 'd1fe173d08e959397adf34b1d77e88d7', 0, '', '', ''),
(142, 'KXmTDijfy', 'admin', 'bjeanmarm@gmail.com', '4c0f179c0459734fef725dd755da2184', '', 'enZJDFNRydcY', '1', '2020-04-13 20:08:29', '', 0, '', '', ''),
(143, 'IHpAcJxaoDN', 'admin', 'cdanderson2468@hotmail.com', '60dd89cbd0a6905b4d50c9daa0bda146', '', 'JnYKQtzEyax', '1', '2020-04-13 23:56:49', '', 0, '', '', ''),
(144, 'kymRQCzMPtlOKv', 'admin', 'gene.msa@outlook.com', '5d2e27dd4db6f7e2c0fc8a72046163c3', '', 'akQGceyj', '1', '2020-04-14 08:19:36', '', 0, '', '', ''),
(145, 'lbKMUgyZFxIfiLY', 'admin', 'benny.farmary@yahoo.com', 'd35885c18e0e0bc688b51561a9f96bde', '', 'PetkrCXEdnlNmZgJ', '1', '2020-04-14 09:29:30', '', 0, '', '', ''),
(146, 'KZruJOtwALcXE', 'admin', 'treyaubr@gmail.com', '01e5aa08e783aabfd46b1f8f8d197338', '', 'dREisNtSbkQu', '1', '2020-04-14 15:33:57', '', 0, '', '', ''),
(147, 'SILAqMCJkfYc', 'admin', 'gookrules@gmail.com', '221b5f3ca9dff4575cc173e3e87a8791', '', 'kFigzXqeNBSYy', '1', '2020-04-15 09:12:13', '', 0, '', '', ''),
(148, 'QZotSlcW', 'admin', 'ichenc@me.com', 'bcf46e8cd34b194a135bbd2f81d01221', '', 'yXYuLlMoDVQWGxAv', '1', '2020-04-15 09:14:05', '', 0, '', '', ''),
(149, 'IuKmnVAldaYx', 'admin', 'leachjonathan837@gmail.com', '0c44e0c50ee8170affdfcae3add586cf', '', 'mDztefhiUVN', '1', '2020-04-15 14:41:15', '', 0, '', '', ''),
(150, 'eptgaHYvP', 'admin', 'gautier.inc@mindspring.com', '50d3ec01fc9e29bd5d5a808727198aee', '', 'FRBAmpJMO', '1', '2020-04-15 18:15:08', '', 0, '', '', ''),
(151, 'eYOPoQFIXzndB', 'admin', 'jhmedina_61@hotmail.com', '81b9b26d7e995ed4b7e999fcb588baff', '', 'HQipyfMas', '1', '2020-04-15 18:59:46', '', 0, '', '', ''),
(152, 'OBiwWNAuZhE', 'admin', 'willyloves311@gmail.com', '52f71520fbedae46da471e16f242ac3b', '', 'bWgrhYxFNGHfedV', '1', '2020-04-16 05:58:44', '', 0, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `capa_red_extras_answers`
--
ALTER TABLE `capa_red_extras_answers`
  ADD PRIMARY KEY (`extra_ans_id`);

--
-- Indexes for table `capa_red_main_answers`
--
ALTER TABLE `capa_red_main_answers`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `capa_red_probes_answers`
--
ALTER TABLE `capa_red_probes_answers`
  ADD PRIMARY KEY (`prob_ans_id`);

--
-- Indexes for table `capa_red_yes_answers`
--
ALTER TABLE `capa_red_yes_answers`
  ADD PRIMARY KEY (`yes_ans_id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_of_user`
--
ALTER TABLE `child_of_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `information_children`
--
ALTER TABLE `information_children`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `oberservational_answers`
--
ALTER TABLE `oberservational_answers`
  ADD PRIMARY KEY (`obersev_ans_id`);

--
-- Indexes for table `oberservational_survey`
--
ALTER TABLE `oberservational_survey`
  ADD PRIMARY KEY (`observation_id`);

--
-- Indexes for table `parent_children_answers`
--
ALTER TABLE `parent_children_answers`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `p_master`
--
ALTER TABLE `p_master`
  ADD UNIQUE KEY `p_email` (`p_email`);

--
-- Indexes for table `questionnaires_extras`
--
ALTER TABLE `questionnaires_extras`
  ADD PRIMARY KEY (`extra_id`);

--
-- Indexes for table `questionnaires_extrasbk`
--
ALTER TABLE `questionnaires_extrasbk`
  ADD PRIMARY KEY (`extra_id`);

--
-- Indexes for table `questionnaires_master`
--
ALTER TABLE `questionnaires_master`
  ADD PRIMARY KEY (`que_id`);

--
-- Indexes for table `questionnaires_masterbk`
--
ALTER TABLE `questionnaires_masterbk`
  ADD PRIMARY KEY (`que_id`);

--
-- Indexes for table `questionnaires_probes`
--
ALTER TABLE `questionnaires_probes`
  ADD PRIMARY KEY (`probes_id`);

--
-- Indexes for table `questionnaires_probesbk`
--
ALTER TABLE `questionnaires_probesbk`
  ADD PRIMARY KEY (`probes_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `capa_red_extras_answers`
--
ALTER TABLE `capa_red_extras_answers`
  MODIFY `extra_ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `capa_red_main_answers`
--
ALTER TABLE `capa_red_main_answers`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT for table `capa_red_probes_answers`
--
ALTER TABLE `capa_red_probes_answers`
  MODIFY `prob_ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `capa_red_yes_answers`
--
ALTER TABLE `capa_red_yes_answers`
  MODIFY `yes_ans_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `child_of_user`
--
ALTER TABLE `child_of_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=783;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `information_children`
--
ALTER TABLE `information_children`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `oberservational_answers`
--
ALTER TABLE `oberservational_answers`
  MODIFY `obersev_ans_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oberservational_survey`
--
ALTER TABLE `oberservational_survey`
  MODIFY `observation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent_children_answers`
--
ALTER TABLE `parent_children_answers`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `questionnaires_extras`
--
ALTER TABLE `questionnaires_extras`
  MODIFY `extra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `questionnaires_extrasbk`
--
ALTER TABLE `questionnaires_extrasbk`
  MODIFY `extra_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questionnaires_master`
--
ALTER TABLE `questionnaires_master`
  MODIFY `que_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `questionnaires_masterbk`
--
ALTER TABLE `questionnaires_masterbk`
  MODIFY `que_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `questionnaires_probes`
--
ALTER TABLE `questionnaires_probes`
  MODIFY `probes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `questionnaires_probesbk`
--
ALTER TABLE `questionnaires_probesbk`
  MODIFY `probes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
