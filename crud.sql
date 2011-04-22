-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2011 at 11:00 PM
-- Server version: 5.1.36
-- PHP Version: 5.2.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `ballpark` varchar(50) NOT NULL,
  `opponent` varchar(50) NOT NULL,
  `weather` text NOT NULL,
  `temperature` text NOT NULL,
  `field` set('Visitor','Home') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `date`, `time`, `ballpark`, `opponent`, `weather`, `temperature`, `field`) VALUES
(1, '2011-04-02', '08:30:00', 'SHERRY HIGH B', '70''S', 'FAIR', '70', 'Visitor'),
(2, '2011-04-09', '00:11:00', 'SHERRY HIGH A', 'B BEARS', 'FAIR', '70', 'Visitor'),
(3, '2011-04-16', '00:13:00', 'SHERRY HIGH B', 'RAIZA', 'HOT, 11MPH W', '85', 'Visitor');

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE IF NOT EXISTS `player` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `yob` year(4) DEFAULT NULL,
  `back_no` int(11) NOT NULL,
  `pri_position` set('P','C','1B','2B','3B','SS','LF','CF','RF','DH') NOT NULL,
  `second_position` set('P','C','1B','2B','3B','SS','LF','CF','RF','DH') NOT NULL,
  `batting` set('R','L') NOT NULL,
  `field` set('R','L') NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `name`, `yob`, `back_no`, `pri_position`, `second_position`, `batting`, `field`, `description`) VALUES
(1, 'henrihnr', 1985, 0, '', '', '', '', ''),
(2, 'name_001', 1990, 0, '', '', '', '', ''),
(3, 'name_002', 2000, 0, '', '', '', '', ''),
(4, 'name_003', 2000, 0, '', '', '', '', ''),
(5, 'name_005', 2000, 0, '', '', '', '', ''),
(6, '곽호동', 1974, 44, 'C', '3B', 'L', 'R', 'DESCRIPTION');

-- --------------------------------------------------------

--
-- Table structure for table `player_stat`
--

CREATE TABLE IF NOT EXISTS `player_stat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lineup_no` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `one_base` int(11) NOT NULL,
  `two_base` int(11) NOT NULL,
  `three_base` int(11) NOT NULL,
  `home_run` int(11) NOT NULL,
  `base_on_balls` int(11) NOT NULL,
  `hit_by_pitch` int(11) NOT NULL,
  `fielders_choice` int(11) NOT NULL,
  `error` int(11) NOT NULL,
  `wild_pitch` int(11) NOT NULL,
  `passed_ball` int(11) NOT NULL,
  `catcher_int` int(11) NOT NULL,
  `gr_ruled_double` int(11) NOT NULL,
  `strike_out_swing` int(11) NOT NULL,
  `strike_out_called` int(11) NOT NULL,
  `fly_out` int(11) NOT NULL,
  `foul_out` int(11) NOT NULL,
  `line_out` int(11) NOT NULL,
  `unassisted_out` int(11) NOT NULL,
  `ground_out` int(11) NOT NULL,
  `infield_fly` int(11) NOT NULL,
  `caught_steal` int(11) NOT NULL,
  `run_down` int(11) NOT NULL,
  `at_bat` int(11) NOT NULL,
  `hits` int(11) NOT NULL,
  `bb` int(11) NOT NULL,
  `runs` int(11) NOT NULL,
  `rbi` int(11) NOT NULL,
  `err_total` int(11) NOT NULL,
  `bb_percent` float(4,3) NOT NULL,
  `batting_avg` float(4,3) NOT NULL,
  `hr_ratio` float(4,3) NOT NULL,
  `onbase_percent` float(4,3) NOT NULL,
  `slugging_percent` float(4,3) NOT NULL,
  `so_ratio` float(4,3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `player_stat`
--


-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `mascot` varchar(50) NOT NULL,
  `manager` varchar(25) NOT NULL,
  `head coach` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `mascot`, `manager`, `head coach`) VALUES
(1, '또감사교회', 'Crusaders', '김광식', '이재학');
