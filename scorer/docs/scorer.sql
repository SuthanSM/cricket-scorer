-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2017 at 11:31 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scorer`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `search_matches` (IN `var` VARCHAR(50), IN `email` VARCHAR(50))  NO SQL
select m.team_a,m.team_b,m.tournament,m.m_date,m.num_overs,m.toss_won,m.elected,m.venue from matches m,users u where m.team_a=var or m.team_b=var or m.tournament=var or m.venue=var and u.email=email$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `batting`
--

CREATE TABLE `batting` (
  `runs` int(11) NOT NULL,
  `balls` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `strike` int(1) NOT NULL,
  `pid` varchar(10) NOT NULL,
  `strike_rate` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `batting`
--
DELIMITER $$
CREATE TRIGGER `srate` BEFORE UPDATE ON `batting` FOR EACH ROW BEGIN
SET new.strike_rate = (new.runs / new.balls) * 100;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bowling`
--

CREATE TABLE `bowling` (
  `balls` int(11) NOT NULL,
  `wickets` int(11) NOT NULL,
  `runs` int(11) NOT NULL,
  `extras` int(11) NOT NULL,
  `pid` varchar(10) NOT NULL,
  `current_bo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `bowling`
--
DELIMITER $$
CREATE TRIGGER `max_overs` BEFORE INSERT ON `bowling` FOR EACH ROW BEGIN
IF NEW.balls > 60
THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'This bowler has exceeded his qouta of overs. Choose another bowler!';
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `mno` int(11) NOT NULL,
  `tournament` varchar(50) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `team_a` varchar(50) NOT NULL,
  `team_b` varchar(50) NOT NULL,
  `m_date` date NOT NULL,
  `num_overs` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `toss_won` varchar(50) NOT NULL,
  `elected` varchar(50) NOT NULL,
  `result` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`mno`, `tournament`, `venue`, `team_a`, `team_b`, `m_date`, `num_overs`, `email`, `toss_won`, `elected`, `result`) VALUES
(38, 'ashes', 'melbourn', 'Australia', 'England', '2017-10-17', 4, 'suthantippu@gmail.com', 'Australia', 'bat', ''),
(39, 'World Cup 2011', 'Mumbai', 'India', 'Sri Lanka', '2017-10-10', 4, 'suthantippu@gmail.com', 'Sri Lanka', 'bat', ''),
(40, 'World Cup 2011', 'Mumbai', 'India', 'Sri Lanka', '2017-10-02', 4, 'suthantippu@gmail.com', 'India', 'bat', ''),
(41, 'World Cup 2011', 'Mumbai', 'India', 'Sri Lanka', '2017-10-10', 4, 'suthantippu@gmail.com', 'India', 'bat', ''),
(42, 'World Cup 2011', 'Mumbai', 'India', 'Sri Lanka', '2017-12-31', 4, 'suthantippu@gmail.com', 'India', 'bat', ''),
(43, 'World Cup 2011', 'Mumbai', 'India', 'Sri Lanka', '2017-10-17', 4, 'suthantippu@gmail.com', 'India', 'bat', ''),
(47, 'World Cup 2011', 'Mumbai', 'India', 'Sri Lanka', '2017-10-10', 4, 'suthantippu@gmail.com', 'India', 'bat', ''),
(48, 'World Cup 2011', 'Mumbai', 'India', 'Sri Lanka', '2017-12-01', 4, 'suthantippu@gmail.com', 'India', 'bat', ''),
(49, 'World Cup 2011', 'Mumbai', 'India', 'Sri Lanka', '2017-01-01', 4, 'suthantippu@gmail.com', 'India', 'bat', ''),
(50, 'World Cup 2011', 'Mumbai', 'India', 'Sri Lanka', '2017-01-01', 4, 'suthantippu@gmail.com', 'India', 'bat', ''),
(51, 'World Cup 2011', 'Mumbai', 'India', 'Sri Lanka', '2016-12-01', 4, 'suthantippu@gmail.com', 'India', 'bat', ''),
(52, 'World Cup 2011', 'Mumbai', 'India', 'Sri Lanka', '2017-12-01', 4, 'suthantippu@gmail.com', 'India', 'bat', ''),
(53, 'World Cup 2011', 'Mumbai', 'India', 'Sri Lanka', '2017-01-01', 4, 'suthantippu@gmail.com', 'India', 'bat', ''),
(54, 'World Cup 2011', 'Mumbai', 'India', 'Sri Lanka', '2017-01-01', 4, 'suthantippu@gmail.com', 'India', 'bat', ''),
(55, 'World Cup 2011', 'Mumbai', 'India', 'Sri Lanka', '2017-01-01', 4, 'suthantippu@gmail.com', 'India', 'bat', ''),
(56, 'World Cup 2011', 'Mumbai', 'India', 'Sri Lanka', '2017-01-01', 4, 'suthantippu@gmail.com', 'India', 'bat', ''),
(57, 'World Cup 2011', 'Mumbai', 'India', 'Sri Lanka', '2017-12-01', 2, 'suthantippu@gmail.com', 'India', 'bat', ''),
(58, 'World Cup 2011', 'Mumbai', 'India', 'Sri Lanka', '2017-01-01', 2, 'suthantippu@gmail.com', 'India', 'bat', ''),
(59, 'World Cup 2011', 'Mumbai', 'India', 'Sri Lanka', '2016-01-01', 2, 'suthantippu@gmail.com', 'India', 'bat', ''),
(60, 'World Cup 2011', 'Mumbai', 'India', 'Sri Lanka', '2017-01-01', 2, 'suthantippu@gmail.com', 'India', 'bat', ''),
(61, 'kpl', 'karnataka', 'mys', 'belgavi', '2017-01-01', 1, 'suthantippu@gmail.com', 'mys', 'bat', ''),
(62, 'karbon', 'kar', 'mys', 'ind', '2017-01-01', 1, 'suthantippu@gmail.com', 'mys', 'bowl', ''),
(63, 'World Cup 2011', 'Mumbai', 'India', 'Sri Lanka', '2017-01-01', 1, 'suthantippu@gmail.com', 'India', 'bowl', ''),
(64, 'World Cup 2011', 'Mumbai', 'India', 'Sri Lanka', '2017-12-01', 1, 'suthantippu@gmail.com', 'India', 'bat', ''),
(65, 'World Cup 2011', 'mysore', 'India', 'Sri Lanka', '2017-01-01', 1, 'suthantippu@gmail.com', 'India', 'bat', ''),
(66, 'World Cup 2011', 'Mumbai', 'India', 'Sri Lanka', '2017-12-01', 1, 'suthantippu@gmail.com', 'India', 'bat', ''),
(67, 'ksca', 'mys', 'India', 'aus', '2017-01-01', 1, 'suthantippu@gmail.com', 'India', 'bat', ''),
(68, 'ksa', 'mys', 'India', 'pak', '2017-01-01', 1, 'suthantippu@gmail.com', 'India', 'bat', ''),
(69, 'World Cup 2011', 'Mumbai', 'India', 'Sri Lanka', '2017-01-01', 1, 'suthantippu@gmail.com', 'India', 'bat', ''),
(70, 'world', 'mus', 'ind', 'aus', '2017-01-01', 1, 'suthantippu@gmail.com', 'ind', 'bat', ''),
(71, 'world', 'mys', 'ind', 'sri', '2017-01-01', 1, 'suthantippu@gmail.com', 'ind', 'bat', ''),
(72, 'world', 'mys', 'ind', 'aus', '2017-01-01', 1, 'suthantippu@gmail.com', 'ind', 'bat', ''),
(73, 'world', 'mys', 'ind', 'aus', '2017-01-01', 1, 'suthantippu@gmail.com', 'ind', 'bat', ''),
(74, 'puttapa trophy', 'ankong', 'kuvempunagara', 'kg koppal', '2017-11-14', 2, 'tiwkle@gmail.com', 'kuvempunagara', 'bat', ''),
(75, 'ashes', 'mys', 'ind', 'aus', '2017-01-01', 2, 'suthantippu@gmail.com', 'ind', 'bat', ''),
(76, 'tour', 'mys', 'lo', 'ju', '2017-01-01', 1, 'suthantippu@gmail.com', 'lo', 'bat', ''),
(77, 'jhgj', 'kjh', 'jua', 'ooo', '2017-01-01', 1, 'demouser@gmail.com', 'jua', 'bat', ''),
(78, 'e', 'eg', 'kjblj', 'kjblk', '2017-01-01', 1, 'demouser@gmail.com', 'kjblk', 'bat', ''),
(79, 'kj', 'jkgj', 'jhgj', 'jkg', '2017-01-01', 1, 'demouser@gmail.com', 'jhgj', 'bat', ''),
(80, 'erf', 'kj', 'p;o', 'lkjlk', '2017-01-01', 1, 'demouser@gmail.com', 'p;o', 'bat', ''),
(81, 'klk', 'kjkjl', 'gjh', 'jgk', '2017-12-31', 1, 'demouser@gmail.com', 'gjh', 'bat', ''),
(82, 'khl', 'jkj', 'khl', 'kj', '2017-12-01', 1, 'demouser@gmail.com', 'khl', 'bat', ''),
(83, 'khl', 'jkj', 'khl', 'kj', '2017-12-01', 1, 'demouser@gmail.com', 'khl', 'bat', ''),
(84, 'lhk', ',k', 'klj', 'lkj', '2017-12-01', 1, 'demouser@gmail.com', 'klj', 'bat', ''),
(85, 'jlhkj', 'lkjjk', 'mngk', 'jk', '2017-12-01', 1, 'demouser@gmail.com', 'mngk', 'bat', ''),
(86, 'kljhhk', 'jkllkj', 'gkj', 'khgj', '2017-12-01', 1, 'suthantippu@gmail.com', 'gkj', 'bat', ''),
(87, 'world cup', 'mumbai', 'india', 'aus', '2017-12-02', 1, 'demouser@gmail.com', 'india', 'bat', ''),
(88, 'kjj', 'jkjh', 'lkjhg', 'kj', '2017-12-01', 1, 'demouser@gmail.com', 'lkjhg', 'bat', ''),
(89, 'world cup', 'mumbai', 'ind', 'aus', '2017-12-01', 1, 'demouser@gmail.com', 'ind', 'bat', ''),
(90, 'wc', 'n', 'hgjh', 'jhgkjg', '2017-12-01', 1, 'demouser@gmail.com', 'hgjh', 'bat', ''),
(91, 'kj', 'jkhgj', ',h', 'jkh', '2017-12-01', 1, 'demouser@gmail.com', ',h', 'bat', ''),
(92, 'jk', 'kj', 'jgj', 'jhg', '2017-12-01', 1, 'demouser@gmail.com', 'jgj', 'bat', ''),
(93, 'jgklj', 'jkj', 'kjg', 'jhgh', '2017-12-01', 1, 'demouser@gmail.com', 'kjg', 'bat', ''),
(94, 'jkj', 'jklhkj', 'khf', 'jhg', '2017-12-01', 1, 'demouser@gmail.com', 'khf', 'bat', ''),
(95, 'gkj', 'jkjk', 'klh', 'kh', '2017-12-01', 1, 'demouser@gmail.com', 'klh', 'bat', ''),
(96, 'kjlh', 'kjhkl', 'mhj', 'jkhk', '2017-12-01', 1, 'demouser@gmail.com', 'mhj', 'bat', ''),
(97, 'mjkjh', 'g', 'kj', 'kl', '2017-12-01', 1, 'demouser@gmail.com', 'kj', 'bat', ''),
(98, 'jkk', 'hj', ',k', 'hjk', '2017-12-01', 1, 'demouser@gmail.com', ',k', 'bat', ''),
(99, 'oi', 'klhk', 'oipjok', 'lkhkj', '2018-12-31', 1, 'demouser@gmail.com', 'oipjok', 'bat', ''),
(100, 'world cup', 'mys', 'mys', 'bang', '2017-12-31', 1, 'demouser@gmail.com', 'mys', 'bat', ''),
(101, 'kjjk', 'kjbjkn', 'vhgv', 'mjhjm', '2017-12-31', 1, 'demouser@gmail.com', 'vhgv', 'bat', ''),
(102, 'world cup 2011', 'mumbai', 'india', 'sri lanka', '2017-12-31', 1, 'demouser@gmail.com', 'india', 'bat', '');

--
-- Triggers `matches`
--
DELIMITER $$
CREATE TRIGGER `match_date` BEFORE INSERT ON `matches` FOR EACH ROW BEGIN
IF NEW.m_date < CURRENT_DATE
THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'WARNING: match date cannot be greater than current date!';
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `tname` varchar(50) NOT NULL,
  `pid` varchar(10) NOT NULL,
  `pname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `tname` varchar(50) NOT NULL,
  `total_score` int(11) NOT NULL,
  `balls` int(11) NOT NULL,
  `wickets` int(11) NOT NULL,
  `mno` int(11) NOT NULL,
  `extras` int(11) NOT NULL,
  `batting` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `firstname`, `lastname`) VALUES
('demouser@gmail.com', '1234', 'demo ', 'user'),
('suthantippu@gmail.com', 'tippu1913', 'Suthan', 'S M'),
('tiwkle@gmail.com', 'paggu', 'rohit', 'nagnalli');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batting`
--
ALTER TABLE `batting`
  ADD KEY `batting_ibfk_1` (`pid`);

--
-- Indexes for table `bowling`
--
ALTER TABLE `bowling`
  ADD KEY `bowling_ibfk_1` (`pid`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`mno`),
  ADD KEY `matches_ibfk_1` (`email`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `player_ibfk_1` (`tname`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`tname`),
  ADD KEY `teams_ibfk_1` (`mno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`,`password`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `mno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batting`
--
ALTER TABLE `batting`
  ADD CONSTRAINT `batting_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `player` (`pid`) ON DELETE CASCADE;

--
-- Constraints for table `bowling`
--
ALTER TABLE `bowling`
  ADD CONSTRAINT `bowling_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `player` (`pid`) ON DELETE CASCADE;

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`tname`) REFERENCES `teams` (`tname`) ON DELETE CASCADE;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`mno`) REFERENCES `matches` (`mno`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
