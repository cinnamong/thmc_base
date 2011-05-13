-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2011 at 09:04 AM
-- Server version: 5.5.8
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
  `result` set('W','L','T') DEFAULT NULL,
  `point` int(5) DEFAULT NULL,
  `rs` int(3) NOT NULL,
  `ra` int(3) NOT NULL,
  `diff` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `date`, `time`, `ballpark`, `opponent`, `weather`, `temperature`, `field`, `result`, `point`, `rs`, `ra`, `diff`) VALUES
(1, '2011-04-02', '08:30:00', 'SHERY HIGH-B', '70''S', 'FAIR', '', 'Visitor', 'W', 3, 9, 5, 4),
(2, '2011-04-09', '11:00:00', 'SHERY HIGH-A', 'B BEARS', 'FAIR', '', 'Visitor', 'W', 3, 20, 5, 15),
(3, '2011-04-16', '14:00:00', 'SHERY HIGH-B', 'RAIZA', 'HOT', '90S', 'Visitor', 'W', 3, 11, 1, 10),
(4, '2011-04-23', '16:00:00', 'Shery High- A', 'OC Giants', 'Fair-13 mph', '70s', 'Visitor', 'W', 3, 15, 14, 1),
(5, '2011-04-30', '13:40:00', 'SHERY HIGH-B', '영락교회', 'WARM-10W', '85', 'Home', 'W', 3, 9, 5, 4),
(6, '2011-05-07', '11:30:00', 'SHERY HIGH-A', '오합지존', 'FAIR', '', 'Home', 'W', 3, 15, 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `game_stat`
--

CREATE TABLE IF NOT EXISTS `game_stat` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `gameid` int(3) DEFAULT NULL,
  `ra` int(3) DEFAULT NULL,
  `rs` int(3) DEFAULT NULL,
  `diff` int(3) DEFAULT NULL,
  `hits` int(3) DEFAULT NULL,
  `bb` int(3) DEFAULT NULL,
  `error` int(2) DEFAULT NULL,
  `so` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `game_stat`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `name`, `yob`, `back_no`, `pri_position`, `second_position`, `batting`, `field`, `description`) VALUES
(9, '문현덕', 1964, 77, '2B', '', 'R', 'R', ''),
(8, '전병철', 1971, 0, 'P', '', 'R', 'R', ''),
(7, '심형준', 1981, 11, 'CF', 'LF', 'R', 'R', ''),
(6, '곽호동', 1974, 44, 'C', '3B', 'L', 'R', 'DESCRIPTION'),
(10, '권대니', 1971, 55, 'LF', '', 'R', 'R', ''),
(11, '이펠릭스', 1981, 8, 'SS', '3B', 'R', 'R', ''),
(12, '김강', 1967, 5, 'P', '3B', 'R', 'R', ''),
(13, '이재학', 1970, 70, 'SS', 'P', 'R', 'R', ''),
(15, '강제임스', 1969, 79, 'RF', '', 'R', 'R', ''),
(16, '이종서', 1964, 27, '2B', '', 'R', 'R', ''),
(17, '김광식', 1967, 38, '3B', 'P', 'R', 'R', ''),
(18, '김경현', 1971, 16, 'P', 'RF', 'L', 'L', ''),
(19, '박노아', 1971, 13, '2B', 'RF', 'R', 'R', ''),
(20, '홍승표', 1974, 7, 'LF', '', 'R', 'R', ''),
(21, '임사이몬', 1978, 1, 'SS', '3B', 'R', 'R', ''),
(22, '황태혁', 1982, 10, 'DH', '', 'R', 'R', ''),
(23, '구자훈', 1972, 9, 'DH', '', 'R', 'R', ''),
(24, '이일섭', 1972, 17, '1B', '', 'L', 'L', ''),
(25, '김영호', 1970, 23, 'LF', '', 'R', 'R', '');

-- --------------------------------------------------------

--
-- Table structure for table `player_stat`
--

CREATE TABLE IF NOT EXISTS `player_stat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lineup_no` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `single` int(11) NOT NULL,
  `double` int(11) NOT NULL,
  `triple` int(11) NOT NULL,
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
