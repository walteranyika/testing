-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2015 at 05:56 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `guards_correct`
--
CREATE DATABASE IF NOT EXISTS `guards_correct` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `guards_correct`;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `company_id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `date_added` date NOT NULL,
  `tid` varchar(50) NOT NULL,
  PRIMARY KEY (`company_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `category`, `name`, `address`, `date_added`, `tid`) VALUES
(3, 'CBA', 'Eldoret Securities', 'Eldoret-Kenya', '2015-11-26', '5658467bd3156'),
(4, 'CBA', 'G4S security', 'Nairobi', '2015-11-27', '5658359676597'),
(5, 'CBA', 'Umoja Securities', 'Mombasa', '2015-11-27', '565835bab7e2f');

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

CREATE TABLE IF NOT EXISTS `contributions` (
  `contribution_id` int(5) NOT NULL AUTO_INCREMENT,
  `member_id` int(7) NOT NULL,
  `date_contributed` date NOT NULL,
  `contribution_amt` int(10) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  PRIMARY KEY (`contribution_id`),
  UNIQUE KEY `transaction_id` (`transaction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `contributions`
--

INSERT INTO `contributions` (`contribution_id`, `member_id`, `date_contributed`, `contribution_amt`, `transaction_id`) VALUES
(5, 1, '2015-11-26', 200, '5658a7630f147');

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE IF NOT EXISTS `login_history` (
  `login_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `ip_address` varchar(30) NOT NULL,
  `time` varchar(20) NOT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `meber_id` int(10) NOT NULL AUTO_INCREMENT,
  `names` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `national_id` int(12) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `employee_no` varchar(20) NOT NULL,
  `company_id` int(5) NOT NULL,
  `date_applied` date NOT NULL,
  `date_approved` date NOT NULL,
  `application_status` varchar(30) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  PRIMARY KEY (`meber_id`),
  UNIQUE KEY `national_id` (`national_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`meber_id`, `names`, `gender`, `phone`, `national_id`, `designation`, `location`, `employee_no`, `company_id`, `date_applied`, `date_approved`, `application_status`, `transaction_id`) VALUES
(1, 'Tom Owino', 'Male', '0723740215', 24770648, 'Watchman', 'Nairobi', 'A1234', 3, '2015-11-03', '2015-11-26', 'Approved', '5656bc8464e2b'),
(2, 'Wilkins Wanjala', 'Male', '0723768908', 24770649, 'Watchman', 'Nairobi', 'UMS20001', 5, '2015-11-27', '2015-11-27', 'Approved', '5658361fa9b3c'),
(6, 'Salasia Emannuel', 'Male', '0723768988', 24770650, 'Watchman', 'Bungoma', 'G4S2345', 4, '2015-11-28', '2015-11-28', 'Approved', '5659e40238306'),
(7, 'Austin Wanjala', 'Male', '0723456789', 24770654, 'Watchman', 'Nakuru', 'ED23456', 3, '2015-11-28', '2015-11-28', 'Approved', '5659e40829ef0');

-- --------------------------------------------------------

--
-- Table structure for table `transcations`
--

CREATE TABLE IF NOT EXISTS `transcations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `transaction_date` date NOT NULL,
  `tranaction_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `transcations`
--

INSERT INTO `transcations` (`id`, `transaction_id`, `user_id`, `transaction_date`, `tranaction_type`) VALUES
(9, '5656fb04a11b5', 1, '2015-11-26', 'Added New Contribution'),
(10, '5658359676597', 1, '2015-11-27', 'New Company Added'),
(11, '565835bab7e2f', 1, '2015-11-27', 'New Company Added'),
(12, '5658361fa9b3c', 1, '2015-11-27', 'New User Approved'),
(13, '5658467bd3156', 1, '2015-11-27', 'Updated This Company'),
(14, '5658a7630f147', 1, '2015-11-27', 'Edited Contributions'),
(15, '56596be43a868', 1, '2015-11-28', 'Added New User'),
(16, '56596d80a65c5', 1, '2015-11-28', 'Added New User'),
(17, '56596d96c124d', 1, '2015-11-28', 'Added New User'),
(18, '56597e3f5c5c3', 1, '2015-11-28', 'Added New User'),
(19, '56597ffb5a56d', 1, '2015-11-28', 'Added New User'),
(20, '5659afe34008e', 1, '2015-11-28', 'Edited This User'),
(21, '5659b27464ada', 1, '2015-11-28', 'Edited This User'),
(22, '5659b44ba64bf', 1, '2015-11-28', 'Edited This User'),
(23, '5659b4cbe55f9', 1, '2015-11-28', 'Edited This User'),
(24, '5659b55174c8d', 1, '2015-11-28', 'Edited This User'),
(25, '5659bc6d241da', 1, '2015-11-28', 'Reset Password For This User'),
(26, '5659bc930f120', 1, '2015-11-28', 'Reset Password For This User'),
(27, '5659bca03273d', 1, '2015-11-28', 'Reset Password For This User'),
(28, '5659d8400e4ee', 111, '2015-11-28', 'Self Registration'),
(29, '5659db4243915', 111, '2015-11-28', 'Self Registration'),
(30, '5659e40238306', 1, '2015-11-28', 'Approved This User'),
(31, '5659e40829ef0', 1, '2015-11-28', 'Approved This User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `names` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL,
  `reg_date` date NOT NULL,
  `tid` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `names`, `email`, `password`, `type`, `reg_date`, `tid`) VALUES
(1, 'Terry Daisy', 'admin@gmail.com', '304d9c547592fb07f7c52c6b23239b26', 'Administrator', '2015-11-28', ''),
(2, 'Jane Mendi', 'user@gmail.com', 'acc1f98a7f5c484a74c59db8073dc60d', 'Normal User', '2015-11-28', '5659bc6d241da'),
(3, 'Michael Kamau', 'kamau@gmail.com', '304d9c547592fb07f7c52c6b23239b26', 'Normal User', '2015-11-28', '5659bc930f120'),
(6, 'Wilkins Wanjala', 'wanjala@gmail.com', '304d9c547592fb07f7c52c6b23239b26', 'Administaror', '2015-11-28', '5659b27464ada'),
(8, 'Don Carlos', 'don@yahoo.com', '304d9c547592fb07f7c52c6b23239b26', 'Normal User', '2015-11-28', '5659bca03273d'),
(9, 'Samson Ogutu', 'sam@gmail.com', '304d9c547592fb07f7c52c6b23239b26', 'Normal User', '2015-11-28', '56597ffb5a56d');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
