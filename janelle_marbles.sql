-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 31, 2023 at 09:09 PM
-- Server version: 8.0.33-0ubuntu0.20.04.2
-- PHP Version: 7.4.3-4ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `janelle_marbles`
--

-- --------------------------------------------------------

--
-- Table structure for table `competitors`
--

CREATE TABLE `competitors` (
  `competitor_id` smallint UNSIGNED NOT NULL COMMENT 'Primary Key for competitors table',
  `competitor_name` varchar(20) NOT NULL,
  `role` varchar(7) NOT NULL,
  `team_id` smallint UNSIGNED NOT NULL COMMENT 'Foreign Key from teams table'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `competitors`
--

INSERT INTO `competitors` (`competitor_id`, `competitor_name`, `role`, `team_id`) VALUES
(1, 'Mallard', 'Captain', 1),
(2, 'Billy', 'Athlete', 1),
(3, 'Ducky', 'Athlete', 1),
(4, 'Quacky', 'Athlete', 1),
(5, 'Goose', 'Reserve', 1),
(6, 'Bombay', 'Coach', 1),
(7, 'Honk', 'Manager', 1),
(8, 'Yellow', 'Captain', 2),
(9, 'Yellah', 'Athlete', 2),
(10, 'Yelley', 'Retired', 2),
(11, 'Yellup', 'Athlete', 2),
(12, 'Yellim', 'Athlete', 2),
(13, 'Yeller', 'Reserve', 2),
(14, 'Mellow', 'Coach', 2),
(15, 'Giallo', 'Manager', 2),
(16, 'Razzy', 'Captain', 3),
(17, 'Rezzy', 'Athlete', 3),
(18, 'Rizzy', 'Athlete', 3),
(19, 'Rozzy', 'Athlete', 3),
(20, 'Ruzzy', 'Reserve', 3),
(21, 'Berry', 'Coach', 3),
(22, 'Pi', 'Manager', 3),
(23, 'Alpine', 'Captain', 4),
(24, 'Frost', 'Athlete', 4),
(25, 'Iceberg', 'Athlete', 4),
(26, 'Polar', 'Athlete', 4),
(27, 'Sheet', 'Reserve', 4),
(28, 'Glide', 'Coach', 4),
(29, 'Glace', 'Manager', 4),
(30, 'Choc', 'Captain', 5),
(31, 'Cocoa', 'Athlete', 5),
(32, 'Mocha', 'Athlete', 5),
(33, 'Bonbon', 'Athlete', 5),
(34, 'Fudge', 'Reserve', 5),
(35, 'Truffle', 'Coach', 5),
(36, 'Caramel', 'Manager', 5),
(37, 'Imar', 'Captain', 6),
(38, 'Prim', 'Athlete', 6),
(39, 'Rima', 'Athlete', 6),
(40, 'Mary', 'Athlete', 6),
(41, 'Aryp', 'Reserve', 6),
(42, 'Secondary', 'Coach', 6),
(43, 'Rypr', 'Manager', 6),
(44, 'Wispy', 'Captain', 7),
(45, 'Wespy', 'Athlete', 7),
(46, 'Wospy', 'Athlete', 7),
(47, 'Wuspy', 'Athlete', 7),
(48, 'Waspy', 'Reserve', 7),
(49, 'Wypsy', 'Coach', 7),
(50, 'Willow', 'Manager', 7),
(51, 'Pinky Toe', 'Captain', 8),
(52, 'Pinky Rosa', 'Athlete', 8),
(53, 'Pinky Winky', 'Athlete', 8),
(54, 'Pinky Panther', 'Athlete', 8),
(55, 'Pinkydink', 'Reserve', 8),
(56, 'Pinky Promise', 'Coach', 8),
(57, 'Pinky Ring', 'Manager', 8),
(58, 'Shiny', 'Captain', 9),
(59, 'Sparkle', 'Athlete', 9),
(60, 'Shimmer', 'Athlete', 9),
(61, 'Sterling', 'Athlete', 9),
(62, 'Glimmer', 'Reserve', 9),
(63, 'Gleam', 'Coach', 9),
(64, 'Sheen', 'Manager', 9),
(65, 'Speedy', 'Captain', 11),
(66, 'Rapidly', 'Athlete', 11),
(67, 'Swifty', 'Athlete', 11),
(68, 'Velocity', 'Athlete', 11),
(69, 'Whizzy', 'Reserve', 11),
(70, 'Quickly', 'Coach', 11),
(71, 'Savvy', 'Manager', 11),
(72, 'Red Eye', 'Captain', 13),
(73, 'Blue Eye', 'Athlete', 13),
(74, 'Yellow Eye', 'Athlete', 13),
(75, 'Green Eye', 'Athlete', 13),
(76, 'Cyan Eye', 'Reserve', 13),
(77, 'White Eye', 'Coach', 13),
(78, 'Bullseye', 'Manager', 13),
(79, 'Anarchy', 'Captain', 14),
(80, 'Tumult', 'Athlete', 14),
(81, 'Clutter', 'Athlete', 14),
(82, 'Snarl', 'Reserve', 14),
(83, 'Disarray', 'Athlete', 14),
(84, 'Harmony', 'Coach', 14),
(85, 'Entropy', 'Manager', 14),
(86, 'Cosmo', 'Captain', 15),
(87, 'Astron', 'Athlete', 15),
(88, 'Starry', 'Athlete', 15),
(89, 'Pulsar', 'Athlete', 15),
(90, 'Quasar', 'Reserve', 15),
(91, 'Black Hole', 'Coach', 15),
(92, 'Atlas', 'Manager', 15),
(93, 'Minty Flav', 'Captain', 16),
(94, 'Minty Drizzel', 'Athlete', 16),
(95, 'Minty Fresh', 'Athlete', 16),
(96, 'Minty Swirl', 'Athlete', 16),
(97, 'Minty Mint', 'Reserve', 16),
(98, 'Minty Hint', 'Coach', 16),
(99, 'Spearmint', 'Manager', 16),
(100, 'Bumble', 'Captain', 12),
(101, 'Swax', 'Reserve', 12),
(102, 'Honey', 'Athlete', 12),
(103, 'Stinger', 'Athlete', 12),
(104, 'Hive', 'Athlete', 12),
(105, 'Queen', 'Coach', 12),
(106, 'Nectar', 'Manager', 12),
(107, 'Beeline', 'Manager', 12);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` smallint UNSIGNED NOT NULL COMMENT 'Primary Key for events table',
  `event_number` tinyint UNSIGNED NOT NULL,
  `sport` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` smallint UNSIGNED NOT NULL COMMENT 'Foreign Key from teams table',
  `placement` tinyint UNSIGNED NOT NULL,
  `points` smallint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_number`, `sport`, `team_id`, `placement`, `points`) VALUES
(1, 1, 'Climbing', 15, 1, 25),
(2, 1, 'Climbing', 14, 2, 20),
(3, 1, 'Climbing', 12, 3, 15),
(4, 1, 'Climbing', 13, 4, 12),
(5, 1, 'Climbing', 10, 5, 11),
(6, 1, 'Climbing', 7, 6, 10),
(7, 1, 'Climbing', 6, 7, 9),
(8, 1, 'Climbing', 2, 8, 8),
(9, 1, 'Climbing', 4, 9, 7),
(10, 1, 'Climbing', 8, 10, 6),
(11, 1, 'Climbing', 5, 11, 5),
(12, 1, 'Climbing', 11, 12, 4),
(13, 1, 'Climbing', 9, 13, 3),
(14, 1, 'Climbing', 3, 14, 2),
(15, 1, 'Climbing', 16, 15, 1),
(16, 1, 'Climbing', 1, 16, 0),
(17, 2, 'Balancing', 15, 1, 50),
(18, 2, 'Balancing', 13, 2, 27),
(19, 2, 'Balancing', 8, 3, 26),
(20, 2, 'Balancing', 12, 4, 25),
(21, 2, 'Balancing', 14, 5, 21),
(22, 2, 'Balancing', 4, 6, 19),
(23, 2, 'Balancing', 7, 7, 18),
(24, 2, 'Balancing', 10, 8, 16),
(25, 2, 'Balancing', 11, 9, 15),
(26, 2, 'Balancing', 6, 10, 13),
(27, 2, 'Balancing', 2, 11, 10),
(28, 2, 'Balancing', 9, 12, 10),
(29, 2, 'Balancing', 1, 13, 9),
(30, 2, 'Balancing', 16, 14, 7),
(31, 2, 'Balancing', 5, 15, 5),
(32, 2, 'Balancing', 3, 16, 5),
(33, 3, '5 Meter Hurdles', 15, 1, 56),
(34, 3, '5 Meter Hurdles', 8, 2, 51),
(35, 3, '5 Meter Hurdles', 13, 3, 37),
(36, 3, '5 Meter Hurdles', 4, 4, 34),
(37, 3, '5 Meter Hurdles', 5, 4, 34),
(38, 3, '5 Meter Hurdles', 1, 6, 29),
(39, 3, '5 Meter Hurdles', 11, 7, 26),
(40, 3, '5 Meter Hurdles', 10, 8, 24),
(41, 3, '5 Meter Hurdles', 14, 9, 21),
(42, 3, '5 Meter Hurdles', 7, 10, 20),
(43, 3, '5 Meter Hurdles', 12, 11, 15),
(44, 3, '5 Meter Hurdles', 2, 12, 15),
(45, 3, '5 Meter Hurdles', 6, 13, 14),
(46, 3, '5 Meter Hurdles', 16, 14, 14),
(47, 3, '5 Meter Hurdles', 9, 15, 13),
(48, 3, '5 Meter Hurdles', 3, 16, 11),
(49, 4, 'Water Race', 8, 1, 66),
(50, 4, 'Water Race', 15, 2, 56),
(51, 4, 'Water Race', 10, 3, 49),
(52, 4, 'Water Race', 12, 4, 48),
(53, 4, 'Water Race', 4, 5, 46),
(54, 4, 'Water Race', 13, 6, 43),
(55, 4, 'Water Race', 1, 7, 36),
(56, 4, 'Water Race', 6, 8, 34),
(57, 4, 'Water Race', 11, 9, 30),
(58, 4, 'Water Race', 7, 10, 30),
(59, 4, 'Water Race', 14, 11, 29),
(60, 4, 'Water Race', 5, 12, 21),
(61, 4, 'Water Race', 3, 13, 19),
(62, 4, 'Water Race', 2, 14, 18),
(63, 4, 'Water Race', 9, 15, 14),
(64, 4, 'Water Race', 16, 16, 13),
(65, 5, '5 Meter Relay', 8, 1, 67),
(66, 5, '5 Meter Relay', 13, 2, 63),
(67, 5, '5 Meter Relay', 10, 3, 60),
(68, 5, '5 Meter Relay', 12, 4, 60),
(69, 5, '5 Meter Relay', 15, 5, 58),
(70, 5, '5 Meter Relay', 11, 6, 55),
(71, 5, '5 Meter Relay', 4, 7, 52),
(72, 5, '5 Meter Relay', 6, 8, 44),
(73, 5, '5 Meter Relay', 1, 9, 36),
(74, 5, '5 Meter Relay', 7, 10, 34),
(75, 5, '5 Meter Relay', 14, 11, 32),
(76, 5, '5 Meter Relay', 5, 12, 29),
(77, 5, '5 Meter Relay', 16, 13, 28),
(78, 5, '5 Meter Relay', 2, 14, 25),
(79, 5, '5 Meter Relay', 3, 15, 24),
(80, 5, '5 Meter Relay', 9, 16, 23),
(81, 6, 'Funnel Endurance', 8, 1, 76),
(82, 6, 'Funnel Endurance', 10, 2, 72),
(83, 6, 'Funnel Endurance', 15, 3, 66),
(84, 6, 'Funnel Endurance', 13, 4, 66),
(85, 6, 'Funnel Endurance', 11, 5, 62),
(86, 6, 'Funnel Endurance', 12, 6, 61),
(87, 6, 'Funnel Endurance', 1, 7, 56),
(88, 6, 'Funnel Endurance', 4, 8, 52),
(89, 6, 'Funnel Endurance', 9, 9, 48),
(90, 6, 'Funnel Endurance', 6, 10, 46),
(91, 6, 'Funnel Endurance', 16, 11, 39),
(92, 6, 'Funnel Endurance', 3, 12, 39),
(93, 6, 'Funnel Endurance', 14, 13, 38),
(94, 6, 'Funnel Endurance', 7, 14, 38),
(95, 6, 'Funnel Endurance', 2, 15, 35),
(96, 6, 'Funnel Endurance', 5, 16, 34),
(97, 7, 'Rafting', 8, 1, 96),
(98, 7, 'Rafting', 10, 2, 77),
(99, 7, 'Rafting', 15, 3, 76),
(100, 7, 'Rafting', 12, 4, 76),
(101, 7, 'Rafting', 5, 5, 73),
(102, 7, 'Rafting', 13, 6, 68),
(103, 7, 'Rafting', 1, 7, 65),
(104, 7, 'Rafting', 3, 8, 64),
(105, 7, 'Rafting', 4, 9, 59),
(106, 7, 'Rafting', 6, 10, 58),
(107, 7, 'Rafting', 9, 11, 52),
(108, 7, 'Rafting', 16, 12, 42),
(109, 7, 'Rafting', 11, 13, 42),
(110, 7, 'Rafting', 2, 14, 41),
(111, 7, 'Rafting', 14, 15, 39),
(112, 7, 'Rafting', 7, 16, 38),
(113, 8, '5 Meter Sprint', 8, 1, 103),
(114, 8, '5 Meter Sprint', 11, 2, 88),
(115, 8, '5 Meter Sprint', 10, 3, 88),
(116, 8, '5 Meter Sprint', 15, 4, 85),
(117, 8, '5 Meter Sprint', 3, 5, 84),
(118, 8, '5 Meter Sprint', 13, 6, 80),
(119, 8, '5 Meter Sprint', 12, 7, 79),
(120, 8, '5 Meter Sprint', 1, 8, 71),
(121, 8, '5 Meter Sprint', 2, 9, 66),
(122, 8, '5 Meter Sprint', 4, 10, 64),
(123, 8, '5 Meter Sprint', 6, 11, 58),
(124, 8, '5 Meter Sprint', 9, 12, 56),
(125, 8, '5 Meter Sprint', 16, 13, 52),
(126, 8, '5 Meter Sprint', 5, 14, 50),
(127, 8, '5 Meter Sprint', 14, 15, 41),
(128, 8, '5 Meter Sprint', 7, 16, 39),
(129, 9, 'Block Pushing', 15, 1, 110),
(130, 9, 'Block Pushing', 8, 2, 110),
(131, 9, 'Block Pushing', 11, 3, 108),
(132, 9, 'Block Pushing', 10, 4, 91),
(133, 9, 'Block Pushing', 12, 5, 90),
(134, 9, 'Block Pushing', 3, 6, 88),
(135, 9, 'Block Pushing', 2, 7, 81),
(136, 9, 'Block Pushing', 13, 8, 81),
(137, 9, 'Block Pushing', 1, 9, 79),
(138, 9, 'Block Pushing', 4, 10, 69),
(139, 9, 'Block Pushing', 9, 11, 68),
(140, 9, 'Block Pushing', 6, 12, 68),
(141, 9, 'Block Pushing', 5, 13, 59),
(142, 9, 'Block Pushing', 16, 14, 54),
(143, 9, 'Block Pushing', 7, 15, 45),
(144, 9, 'Block Pushing', 14, 16, 41),
(145, 10, 'Triathlon', 15, 1, 135),
(146, 10, 'Triathlon', 11, 2, 118),
(147, 10, 'Triathlon', 8, 3, 112),
(148, 10, 'Triathlon', 12, 4, 105),
(149, 10, 'Triathlon', 10, 5, 100),
(150, 10, 'Triathlon', 3, 6, 96),
(151, 10, 'Triathlon', 4, 7, 89),
(152, 10, 'Triathlon', 2, 8, 88),
(153, 10, 'Triathlon', 1, 9, 85),
(154, 10, 'Triathlon', 13, 10, 85),
(155, 10, 'Triathlon', 6, 11, 80),
(156, 10, 'Triathlon', 9, 12, 79),
(157, 10, 'Triathlon', 5, 13, 62),
(158, 10, 'Triathlon', 16, 14, 59),
(159, 10, 'Triathlon', 7, 15, 45),
(160, 10, 'Triathlon', 14, 16, 42),
(161, 11, 'Swing Wave', 15, 1, 135),
(162, 11, 'Swing Wave', 8, 2, 132),
(163, 11, 'Swing Wave', 11, 3, 130),
(164, 11, 'Swing Wave', 12, 4, 110),
(165, 11, 'Swing Wave', 3, 5, 105),
(166, 11, 'Swing Wave', 9, 6, 104),
(167, 11, 'Swing Wave', 10, 7, 104),
(168, 11, 'Swing Wave', 4, 8, 100),
(169, 11, 'Swing Wave', 1, 9, 95),
(170, 11, 'Swing Wave', 13, 10, 91),
(171, 11, 'Swing Wave', 2, 11, 89),
(172, 11, 'Swing Wave', 6, 12, 82),
(173, 11, 'Swing Wave', 16, 13, 74),
(174, 11, 'Swing Wave', 5, 14, 65),
(175, 11, 'Swing Wave', 7, 15, 52),
(176, 11, 'Swing Wave', 14, 16, 50),
(177, 12, 'Domino Bowling', 8, 1, 157),
(178, 12, 'Domino Bowling', 15, 2, 138),
(179, 12, 'Domino Bowling', 11, 3, 137),
(180, 12, 'Domino Bowling', 9, 4, 119),
(181, 12, 'Domino Bowling', 3, 5, 116),
(182, 12, 'Domino Bowling', 12, 6, 116),
(183, 12, 'Domino Bowling', 1, 7, 115),
(184, 12, 'Domino Bowling', 10, 8, 112),
(185, 12, 'Domino Bowling', 13, 9, 103),
(186, 12, 'Domino Bowling', 4, 10, 102),
(187, 12, 'Domino Bowling', 2, 11, 98),
(188, 12, 'Domino Bowling', 16, 12, 84),
(189, 12, 'Domino Bowling', 6, 13, 83),
(190, 12, 'Domino Bowling', 5, 14, 70),
(191, 12, 'Domino Bowling', 14, 15, 54),
(192, 12, 'Domino Bowling', 7, 16, 52),
(193, 13, 'Team Aquathlon', 8, 1, 161),
(194, 13, 'Team Aquathlon', 11, 2, 152),
(195, 13, 'Team Aquathlon', 15, 3, 145),
(196, 13, 'Team Aquathlon', 9, 4, 139),
(197, 13, 'Team Aquathlon', 10, 5, 137),
(198, 13, 'Team Aquathlon', 12, 6, 125),
(199, 13, 'Team Aquathlon', 3, 7, 121),
(200, 13, 'Team Aquathlon', 1, 8, 115),
(201, 13, 'Team Aquathlon', 13, 9, 111),
(202, 13, 'Team Aquathlon', 4, 10, 108),
(203, 13, 'Team Aquathlon', 2, 11, 101),
(204, 13, 'Team Aquathlon', 16, 12, 94),
(205, 13, 'Team Aquathlon', 6, 13, 84),
(206, 13, 'Team Aquathlon', 5, 14, 81),
(207, 13, 'Team Aquathlon', 7, 15, 64),
(208, 13, 'Team Aquathlon', 14, 16, 56),
(209, 14, 'Sand Rally', 8, 1, 172),
(210, 14, 'Sand Rally', 9, 2, 164),
(211, 14, 'Sand Rally', 11, 3, 154),
(212, 14, 'Sand Rally', 15, 4, 150),
(213, 14, 'Sand Rally', 10, 5, 137),
(214, 14, 'Sand Rally', 12, 6, 134),
(215, 14, 'Sand Rally', 3, 7, 127),
(216, 14, 'Sand Rally', 1, 8, 125),
(217, 14, 'Sand Rally', 4, 9, 120),
(218, 14, 'Sand Rally', 13, 10, 114),
(219, 14, 'Sand Rally', 2, 11, 105),
(220, 14, 'Sand Rally', 6, 12, 104),
(221, 14, 'Sand Rally', 16, 13, 102),
(222, 14, 'Sand Rally', 5, 14, 96),
(223, 14, 'Sand Rally', 7, 15, 71),
(224, 14, 'Sand Rally', 14, 16, 57),
(225, 15, 'Collision', 8, 1, 180),
(226, 15, 'Collision', 9, 2, 175),
(227, 15, 'Collision', 15, 3, 170),
(228, 15, 'Collision', 11, 4, 157),
(229, 15, 'Collision', 10, 5, 141),
(230, 15, 'Collision', 1, 6, 140),
(231, 15, 'Collision', 3, 7, 136),
(232, 15, 'Collision', 12, 8, 134),
(233, 15, 'Collision', 6, 9, 129),
(234, 15, 'Collision', 4, 10, 121),
(235, 15, 'Collision', 13, 11, 119),
(236, 15, 'Collision', 16, 12, 114),
(237, 15, 'Collision', 2, 13, 107),
(238, 15, 'Collision', 5, 14, 106),
(239, 15, 'Collision', 7, 15, 77),
(240, 15, 'Collision', 14, 16, 64),
(241, 16, 'Elimination Race', 8, 1, 195),
(242, 16, 'Elimination Race', 9, 2, 182),
(243, 16, 'Elimination Race', 15, 3, 181),
(244, 16, 'Elimination Race', 11, 4, 166),
(245, 16, 'Elimination Race', 1, 5, 165),
(246, 16, 'Elimination Race', 3, 6, 156),
(247, 16, 'Elimination Race', 10, 7, 145),
(248, 16, 'Elimination Race', 6, 8, 141),
(249, 16, 'Elimination Race', 12, 9, 136),
(250, 16, 'Elimination Race', 4, 10, 131),
(251, 16, 'Elimination Race', 13, 11, 127),
(252, 16, 'Elimination Race', 16, 12, 115),
(253, 16, 'Elimination Race', 2, 13, 113),
(254, 16, 'Elimination Race', 5, 14, 109),
(255, 16, 'Elimination Race', 7, 15, 82),
(256, 16, 'Elimination Race', 14, 16, 64);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_id` smallint UNSIGNED NOT NULL COMMENT 'Primary Key for teams table',
  `team_name` varchar(20) NOT NULL,
  `team_code` varchar(3) NOT NULL,
  `hashtag` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `team_name`, `team_code`, `hashtag`) VALUES
(1, 'Green Ducks', 'GDK', 'QuackAttack'),
(2, 'Mellow Yellow', 'MYL', 'KeepItMellow'),
(3, 'Raspberry Racers', 'RSP', 'RaspberryRobust'),
(4, 'Gliding Glaciers', 'GLI', 'GlideToGlory'),
(5, 'Chocolatiers', 'CHO', 'RaiseTheBar'),
(6, 'Team Primary', 'PRM', 'FlyingColours'),
(7, 'Midnight Wisps', 'MNW', 'WillOfTheWisps'),
(8, 'Pinkies', 'PNK', 'PinkyPower'),
(9, 'Shining Swarm', 'SHI', 'RiseAndShine'),
(10, 'O\'rangers', 'ORA', 'GOrangers'),
(11, 'Savage Speeders', 'SAV', 'SpeedIsKey'),
(12, 'Bumblebees', 'BEE', 'BumbleRumble'),
(13, 'Crazy Cat\'s Eyes', 'CCE', 'EyesOnThePrize'),
(14, 'Balls of Chaos', 'BOC', 'LetChaosReign'),
(15, 'Team Galactic', 'GAL', 'ReachForTheStars'),
(16, 'Minty Maniacs', 'MNT', 'MintCondition');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` smallint UNSIGNED NOT NULL COMMENT 'Primary Key for user table',
  `username` varchar(64) NOT NULL,
  `password` varchar(260) NOT NULL,
  `rank` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `rank`) VALUES
(1, 'stephen', '$2y$10$b3UgPDo5vlhF.WCZvGJcNejLxaxNnuwTw.Out5G8Pc.4gBjrimz66', 'owner'),
(2, 'marble_fan', '$2y$10$.ROFLjzUlP6qMSjt5fT0S.SWU9VEOTXbzXdlXvLGBRjb9lVsvbUg2', 'user'),
(3, 'admin_1', '$2y$10$LFPmrmKZn4.bOUVEpl9x/ecVmSCZuQkGt1k.AlmUFwap3fifxZQua', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `competitors`
--
ALTER TABLE `competitors`
  ADD PRIMARY KEY (`competitor_id`),
  ADD KEY `team_id` (`team_id`) USING BTREE;

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `team_id` (`team_id`) USING BTREE;

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `competitors`
--
ALTER TABLE `competitors`
  MODIFY `competitor_id` smallint UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key for competitors table', AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` smallint UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key for events table', AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` smallint UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key for teams table', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` smallint UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key for user table', AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `competitors`
--
ALTER TABLE `competitors`
  ADD CONSTRAINT `competitors_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
