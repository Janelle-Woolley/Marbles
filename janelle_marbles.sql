-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 22, 2023 at 12:49 AM
-- Server version: 8.0.34-0ubuntu0.20.04.1
-- PHP Version: 7.4.3-4ubuntu2.19

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
  `team_id` smallint UNSIGNED NOT NULL COMMENT 'Foreign Key from teams table'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `competitors`
--

INSERT INTO `competitors` (`competitor_id`, `competitor_name`, `team_id`) VALUES
(1, 'Mallard', 1),
(2, 'Billy', 1),
(3, 'Ducky', 1),
(4, 'Quacky', 1),
(5, 'Goose', 1),
(6, 'Bombay', 1),
(7, 'Honk', 1),
(8, 'Yellow', 2),
(9, 'Yellah', 2),
(10, 'Yelley', 2),
(11, 'Yellup', 2),
(12, 'Yellim', 2),
(13, 'Yeller', 2),
(14, 'Mellow', 2),
(15, 'Giallo', 2),
(16, 'Razzy', 3),
(17, 'Rezzy', 3),
(18, 'Rizzy', 3),
(19, 'Rozzy', 3),
(20, 'Ruzzy', 3),
(21, 'Berry', 3),
(22, 'Pi', 3),
(23, 'Alpine', 4),
(24, 'Frost', 4),
(25, 'Iceberg', 4),
(26, 'Polar', 4),
(27, 'Sheet', 4),
(28, 'Glide', 4),
(29, 'Glace', 4),
(30, 'Choc', 5),
(31, 'Cocoa', 5),
(32, 'Mocha', 5),
(33, 'Bonbon', 5),
(34, 'Fudge', 5),
(35, 'Truffle', 5),
(36, 'Caramel', 5),
(37, 'Imar', 6),
(38, 'Prim', 6),
(39, 'Rima', 6),
(40, 'Mary', 6),
(41, 'Aryp', 6),
(42, 'Secondary', 6),
(43, 'Rypr', 6),
(44, 'Wispy', 7),
(45, 'Wespy', 7),
(46, 'Wospy', 7),
(47, 'Wuspy', 7),
(48, 'Waspy', 7),
(49, 'Wypsy', 7),
(50, 'Willow', 7),
(51, 'Pinky Toe', 8),
(52, 'Pinky Rosa', 8),
(53, 'Pinky Winky', 8),
(54, 'Pinky Panther', 8),
(55, 'Pinkydink', 8),
(56, 'Pinky Promise', 8),
(57, 'Pinky Ring', 8),
(58, 'Shiny', 9),
(59, 'Sparkle', 9),
(60, 'Shimmer', 9),
(61, 'Sterling', 9),
(62, 'Glimmer', 9),
(63, 'Gleam', 9),
(64, 'Sheen', 9),
(65, 'Speedy', 11),
(66, 'Rapidly', 11),
(67, 'Swifty', 11),
(68, 'Velocity', 11),
(69, 'Whizzy', 11),
(70, 'Quickly', 11),
(71, 'Savvy', 11),
(72, 'Red Eye', 13),
(73, 'Blue Eye', 13),
(74, 'Yellow Eye', 13),
(75, 'Green Eye', 13),
(76, 'Cyan Eye', 13),
(77, 'White Eye', 13),
(78, 'Bullseye', 13),
(79, 'Anarchy', 14),
(80, 'Tumult', 14),
(81, 'Clutter', 14),
(82, 'Snarl', 14),
(83, 'Disarray', 14),
(84, 'Harmony', 14),
(85, 'Entropy', 14),
(86, 'Cosmo', 15),
(87, 'Astron', 15),
(88, 'Starry', 15),
(89, 'Pulsar', 15),
(90, 'Quasar', 15),
(91, 'Black Hole', 15),
(92, 'Atlas', 15),
(93, 'Minty Flav', 16),
(94, 'Minty Drizzel', 16),
(95, 'Minty Fresh', 16),
(96, 'Minty Swirl', 16),
(97, 'Minty Mint', 16),
(98, 'Minty Hint', 16),
(99, 'Spearmint', 16),
(100, 'Bumble', 12),
(101, 'Swax', 12),
(102, 'Honey', 12),
(103, 'Stinger', 12),
(104, 'Hive', 12),
(105, 'Queen', 12),
(106, 'Nectar', 12),
(107, 'Beeline', 12),
(108, 'Mandarin', 10);

-- --------------------------------------------------------

--
-- Table structure for table `competitors_roles`
--

CREATE TABLE `competitors_roles` (
  `competitor_id` smallint UNSIGNED NOT NULL,
  `roles_id` smallint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `competitors_roles`
--

INSERT INTO `competitors_roles` (`competitor_id`, `roles_id`) VALUES
(2, 1),
(3, 1),
(4, 1),
(9, 1),
(11, 1),
(12, 1),
(17, 1),
(18, 1),
(19, 1),
(24, 1),
(25, 1),
(26, 1),
(31, 1),
(32, 1),
(33, 1),
(38, 1),
(39, 1),
(40, 1),
(45, 1),
(46, 1),
(47, 1),
(52, 1),
(53, 1),
(54, 1),
(59, 1),
(60, 1),
(61, 1),
(66, 1),
(67, 1),
(68, 1),
(73, 1),
(74, 1),
(75, 1),
(80, 1),
(81, 1),
(83, 1),
(87, 1),
(88, 1),
(89, 1),
(94, 1),
(95, 1),
(96, 1),
(102, 1),
(103, 1),
(104, 1),
(108, 1),
(1, 2),
(8, 2),
(16, 2),
(23, 2),
(30, 2),
(37, 2),
(44, 2),
(51, 2),
(58, 2),
(65, 2),
(72, 2),
(79, 2),
(86, 2),
(93, 2),
(100, 2),
(6, 3),
(14, 3),
(21, 3),
(28, 3),
(35, 3),
(42, 3),
(49, 3),
(56, 3),
(63, 3),
(70, 3),
(77, 3),
(84, 3),
(91, 3),
(98, 3),
(105, 3),
(7, 4),
(15, 4),
(22, 4),
(29, 4),
(36, 4),
(43, 4),
(50, 4),
(57, 4),
(64, 4),
(71, 4),
(78, 4),
(85, 4),
(92, 4),
(99, 4),
(106, 4),
(107, 4),
(108, 4),
(5, 5),
(13, 5),
(20, 5),
(27, 5),
(34, 5),
(41, 5),
(48, 5),
(55, 5),
(62, 5),
(69, 5),
(76, 5),
(82, 5),
(90, 5),
(97, 5),
(101, 5),
(10, 6);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` smallint UNSIGNED NOT NULL COMMENT 'Primary Key for events table',
  `event_number` tinyint UNSIGNED NOT NULL,
  `sport` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roles_id` smallint UNSIGNED NOT NULL COMMENT 'Primary Key for roles table',
  `role` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roles_id`, `role`, `description`) VALUES
(1, 'Athlete', 'A competitor for a marble league team'),
(2, 'Captain', 'A team leader for a marble league team'),
(3, 'Coach', 'A coach for a marble league team'),
(4, 'Manager', 'A manager for a marble league team'),
(5, 'Reserve', 'A reserve athlete for a marble league team'),
(6, 'Retired', 'A former member of a marble league team');

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
(10, 'Orangers', 'ORA', 'GOrangers'),
(11, 'Savage Speeders', 'SAV', 'SpeedIsKey'),
(12, 'Bumblebees', 'BEE', 'BumbleRumble'),
(13, 'Crazy Cats Eyes', 'CCE', 'EyesOnThePrize'),
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
(3, 'admin_1', '$2y$10$LFPmrmKZn4.bOUVEpl9x/ecVmSCZuQkGt1k.AlmUFwap3fifxZQua', 'admin'),
(4, 'janelle', '$2y$10$y9R/k437LOmLOW.MtN0W8.kZ9tqLsf9OgRHkD3A.hFE8adOh10iD2', 'user'),
(6, 'marblelover', '$2y$10$X2YOqhOmTFAxCPqpIVabMOuY77IiDmq9QNSKkYmVnj.b6XdDRfB1a', 'user'),
(8, 'i forgot', '$2y$10$KMObMLzckfomvPY6j/qbX.SHaLNoGEZYck4K4vMOMWVY0bn/TTHtu', 'user');

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
-- Indexes for table `competitors_roles`
--
ALTER TABLE `competitors_roles`
  ADD PRIMARY KEY (`competitor_id`,`roles_id`) USING BTREE,
  ADD KEY `roles_id` (`roles_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `team_id` (`team_id`) USING BTREE;

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roles_id`);

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
  MODIFY `competitor_id` smallint UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key for competitors table', AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` smallint UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key for events table', AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roles_id` smallint UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key for roles table', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` smallint UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key for teams table', AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` smallint UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key for user table', AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `competitors`
--
ALTER TABLE `competitors`
  ADD CONSTRAINT `competitors_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `competitors_roles`
--
ALTER TABLE `competitors_roles`
  ADD CONSTRAINT `competitors_roles_ibfk_1` FOREIGN KEY (`competitor_id`) REFERENCES `competitors` (`competitor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `competitors_roles_ibfk_2` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`roles_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
