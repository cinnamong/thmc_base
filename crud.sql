--
-- MySQL 5.5.8
-- Thu, 12 May 2011 14:26:50 +0000
--

CREATE DATABASE `crud` DEFAULT CHARSET utf8;

USE `crud`;

CREATE TABLE `game` (
   `id` int(11) not null auto_increment,
   `date` date not null,
   `time` time not null,
   `ballpark` varchar(50) not null,
   `opponent` varchar(50) not null,
   `weather` text not null,
   `temperature` text not null,
   `field` set('Visitor','Home') not null,
   `result` set('W','L','T'),
   `point` int(5),
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=4;

INSERT INTO `game` (`id`, `date`, `time`, `ballpark`, `opponent`, `weather`, `temperature`, `field`, `result`, `point`) VALUES ('1', '2011-04-02', '08:30:00', 'SHERRY HIGH B', '70\'S', 'FAIR', '70', 'Visitor', '', '');
INSERT INTO `game` (`id`, `date`, `time`, `ballpark`, `opponent`, `weather`, `temperature`, `field`, `result`, `point`) VALUES ('2', '2011-04-09', '00:11:00', 'SHERRY HIGH A', 'B BEARS', 'FAIR', '70', 'Visitor', '', '');
INSERT INTO `game` (`id`, `date`, `time`, `ballpark`, `opponent`, `weather`, `temperature`, `field`, `result`, `point`) VALUES ('3', '2011-04-16', '00:13:00', 'SHERRY HIGH B', 'RAIZA', 'HOT, 11MPH W', '85', 'Visitor', '', '');

CREATE TABLE `game_stat` (
   `id` int(3) not null auto_increment,
   `gameid` int(3),
   `ra` int(3),
   `rs` int(3),
   `diff` int(3),
   `hits` int(3),
   `bb` int(3),
   `error` int(2),
   `so` int(11),
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [Table `game_stat` is empty]

CREATE TABLE `player` (
   `id` bigint(20) not null auto_increment,
   `name` varchar(50),
   `yob` year(4),
   `back_no` int(11) not null,
   `pri_position` set('P','C','1B','2B','3B','SS','LF','CF','RF','DH') not null,
   `second_position` set('P','C','1B','2B','3B','SS','LF','CF','RF','DH') not null,
   `batting` set('R','L') not null,
   `field` set('R','L') not null,
   `description` text not null,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=26;

INSERT INTO `player` (`id`, `name`, `yob`, `back_no`, `pri_position`, `second_position`, `batting`, `field`, `description`) VALUES ('9', '문현덕', '1964', '77', '2B', '', 'R', 'R', '');
INSERT INTO `player` (`id`, `name`, `yob`, `back_no`, `pri_position`, `second_position`, `batting`, `field`, `description`) VALUES ('8', '전병철', '1971', '0', 'P', '', 'R', 'R', '');
INSERT INTO `player` (`id`, `name`, `yob`, `back_no`, `pri_position`, `second_position`, `batting`, `field`, `description`) VALUES ('7', '심형준', '1981', '11', 'CF', 'LF', 'R', 'R', '');
INSERT INTO `player` (`id`, `name`, `yob`, `back_no`, `pri_position`, `second_position`, `batting`, `field`, `description`) VALUES ('6', '곽호동', '1974', '44', 'C', '3B', 'L', 'R', 'DESCRIPTION');
INSERT INTO `player` (`id`, `name`, `yob`, `back_no`, `pri_position`, `second_position`, `batting`, `field`, `description`) VALUES ('10', '권대니', '1971', '55', 'LF', '', 'R', 'R', '');
INSERT INTO `player` (`id`, `name`, `yob`, `back_no`, `pri_position`, `second_position`, `batting`, `field`, `description`) VALUES ('11', '이펠릭스', '1981', '8', 'SS', '3B', 'R', 'R', '');
INSERT INTO `player` (`id`, `name`, `yob`, `back_no`, `pri_position`, `second_position`, `batting`, `field`, `description`) VALUES ('12', '김강', '1967', '5', 'P', '3B', 'R', 'R', '');
INSERT INTO `player` (`id`, `name`, `yob`, `back_no`, `pri_position`, `second_position`, `batting`, `field`, `description`) VALUES ('13', '이재학', '1970', '70', 'SS', 'P', 'R', 'R', '');
INSERT INTO `player` (`id`, `name`, `yob`, `back_no`, `pri_position`, `second_position`, `batting`, `field`, `description`) VALUES ('15', '강제임스', '1969', '79', 'RF', '', 'R', 'R', '');
INSERT INTO `player` (`id`, `name`, `yob`, `back_no`, `pri_position`, `second_position`, `batting`, `field`, `description`) VALUES ('16', '이종서', '1964', '27', '2B', '', 'R', 'R', '');
INSERT INTO `player` (`id`, `name`, `yob`, `back_no`, `pri_position`, `second_position`, `batting`, `field`, `description`) VALUES ('17', '김광식', '1967', '38', '3B', 'P', 'R', 'R', '');
INSERT INTO `player` (`id`, `name`, `yob`, `back_no`, `pri_position`, `second_position`, `batting`, `field`, `description`) VALUES ('18', '김경현', '1971', '16', 'P', 'RF', 'L', 'L', '');
INSERT INTO `player` (`id`, `name`, `yob`, `back_no`, `pri_position`, `second_position`, `batting`, `field`, `description`) VALUES ('19', '박노아', '1971', '13', '2B', 'RF', 'R', 'R', '');
INSERT INTO `player` (`id`, `name`, `yob`, `back_no`, `pri_position`, `second_position`, `batting`, `field`, `description`) VALUES ('20', '홍승표', '1974', '7', 'LF', '', 'R', 'R', '');
INSERT INTO `player` (`id`, `name`, `yob`, `back_no`, `pri_position`, `second_position`, `batting`, `field`, `description`) VALUES ('21', '임사이몬', '1978', '1', 'SS', '3B', 'R', 'R', '');
INSERT INTO `player` (`id`, `name`, `yob`, `back_no`, `pri_position`, `second_position`, `batting`, `field`, `description`) VALUES ('22', '황태혁', '1982', '10', 'DH', '', 'R', 'R', '');
INSERT INTO `player` (`id`, `name`, `yob`, `back_no`, `pri_position`, `second_position`, `batting`, `field`, `description`) VALUES ('23', '구자훈', '1972', '9', 'DH', '', 'R', 'R', '');
INSERT INTO `player` (`id`, `name`, `yob`, `back_no`, `pri_position`, `second_position`, `batting`, `field`, `description`) VALUES ('24', '이일섭', '1972', '17', '1B', '', 'L', 'L', '');
INSERT INTO `player` (`id`, `name`, `yob`, `back_no`, `pri_position`, `second_position`, `batting`, `field`, `description`) VALUES ('25', '김영호', '1970', '23', 'LF', '', 'R', 'R', '');

CREATE TABLE `player_stat` (
   `id` int(11) not null auto_increment,
   `lineup_no` int(11) not null,
   `player_id` int(11) not null,
   `game_id` int(11) not null,
   `one_base` int(11) not null,
   `two_base` int(11) not null,
   `three_base` int(11) not null,
   `home_run` int(11) not null,
   `base_on_balls` int(11) not null,
   `hit_by_pitch` int(11) not null,
   `fielders_choice` int(11) not null,
   `error` int(11) not null,
   `wild_pitch` int(11) not null,
   `passed_ball` int(11) not null,
   `catcher_int` int(11) not null,
   `gr_ruled_double` int(11) not null,
   `strike_out_swing` int(11) not null,
   `strike_out_called` int(11) not null,
   `fly_out` int(11) not null,
   `foul_out` int(11) not null,
   `line_out` int(11) not null,
   `unassisted_out` int(11) not null,
   `ground_out` int(11) not null,
   `infield_fly` int(11) not null,
   `caught_steal` int(11) not null,
   `run_down` int(11) not null,
   `at_bat` int(11) not null,
   `hits` int(11) not null,
   `bb` int(11) not null,
   `runs` int(11) not null,
   `rbi` int(11) not null,
   `err_total` int(11) not null,
   `bb_percent` float(4,3) not null,
   `batting_avg` float(4,3) not null,
   `hr_ratio` float(4,3) not null,
   `onbase_percent` float(4,3) not null,
   `slugging_percent` float(4,3) not null,
   `so_ratio` float(4,3) not null,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [Table `player_stat` is empty]

CREATE TABLE `team` (
   `id` int(11) not null auto_increment,
   `name` varchar(50) not null,
   `mascot` varchar(50) not null,
   `manager` varchar(25) not null,
   `head coach` varchar(25) not null,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=2;

INSERT INTO `team` (`id`, `name`, `mascot`, `manager`, `head coach`) VALUES ('1', '또감사교회', 'Crusaders', '김광식', '이재학');