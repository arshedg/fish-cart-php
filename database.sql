-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2016 at 11:08 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `app`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_sessions`
--

CREATE TABLE IF NOT EXISTS `auth_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` varchar(120) NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_sessions`
--

INSERT INTO `auth_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('050ddc43e75c651ce1bdedb96bb0a93e', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', 1455175448, ''),
('4150a7c4fe9aa0de6fe11274f802cd8b', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', 1455093313, ''),
('43e49d19076f1f769ff498bd1d072f1e', 'jdfghdfj', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', 1455694749, ''),
('aacdda8c3be6359bcb9ac29470bdb299', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', 1455694866, ''),
('b18b380a65cfc47957173bcf36ef57ba', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', 1455094241, ''),
('b5fb2348cd38759b6cd0f2de2a78fee9', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', 1455093039, '');

-- --------------------------------------------------------

--
-- Table structure for table `auth_token`
--

CREATE TABLE IF NOT EXISTS `auth_token` (
  `at_token` varchar(100) NOT NULL,
  `au_id` int(10) unsigned NOT NULL,
  `at_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `at_type` enum('site','api') NOT NULL DEFAULT 'site',
  `session_id` varchar(35) NOT NULL,
  `status` smallint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`at_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_token`
--

INSERT INTO `auth_token` (`at_token`, `au_id`, `at_created`, `at_type`, `session_id`, `status`) VALUES
('2s-o2boz3-5fm', 1, '2016-02-10 08:30:39', 'site', 'b5fb2348cd38759b6cd0f2de2a78fee9', 1),
('2s-o2bp6q-7hu', 1, '2016-02-10 08:35:14', 'site', '4150a7c4fe9aa0de6fe11274f802cd8b', 1),
('2s-o2bpwh-24k', 1, '2016-02-10 08:50:41', 'site', 'b18b380a65cfc47957173bcf36ef57ba', 1),
('2s-o2dgk9-2to', 1, '2016-02-11 07:24:09', 'site', '050ddc43e75c651ce1bdedb96bb0a93e', 1),
('2s-o2ol9a-3om', 1, '2016-02-17 07:39:10', 'site', '43e49d19076f1f769ff498bd1d072f1e', 1),
('2s-o2olci-4ai', 1, '2016-02-17 07:41:06', 'site', 'aacdda8c3be6359bcb9ac29470bdb299', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_user`
--

CREATE TABLE IF NOT EXISTS `auth_user` (
  `au_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `au_uname` varchar(90) NOT NULL,
  `au_pwd` varchar(34) NOT NULL,
  `au_name` varchar(90) NOT NULL,
  `au_type` smallint(1) unsigned NOT NULL DEFAULT '9',
  `status` smallint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`au_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `auth_user`
--

INSERT INTO `auth_user` (`au_id`, `au_uname`, `au_pwd`, `au_name`, `au_type`, `status`) VALUES
(1, 'admin@test.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
