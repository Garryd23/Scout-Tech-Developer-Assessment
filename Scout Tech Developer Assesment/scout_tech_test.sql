-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 30, 2020 at 02:20 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scout_tech_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_dev`
--

DROP TABLE IF EXISTS `users_dev`;
CREATE TABLE IF NOT EXISTS `users_dev` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` char(60) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `surname` varchar(30) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `bio` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_email` (`email`),
  UNIQUE KEY `idx_mobile` (`mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_dev`
--

INSERT INTO `users_dev` (`id`, `username`, `email`, `password`, `mobile`, `name`, `surname`, `job_title`, `bio`) VALUES
(1, 'Garryd1245', 'test@email.com', 'ggsjdxvj', '0381451236', 'Garryd Kyle', 'Smit2', 'Developer', 'This is some stuff about me'),
(2, 'JohnDoe', 'John@doe.com', 'nch76odh', '0602527694', 'John', 'Doe', 'Engineer', 'I am an engineer'),
(3, 'Kyle123', 'Kyle@james.com', 'ojehc6876v', '0825689326', 'Kyle', 'James', 'Surfer', 'I like to surf'),
(4, 'Rebbecca45', 'Becks@email.co.za', 'Bskh87', '0785674108', 'Rebbecca', 'Phillips', 'Teacher', 'I am the best teacher ever!'),
(5, 'Lizzy123', 'elizabeth@email.co.za', 'uhgvd654hf', '0895462864', 'Elizabeth', 'Windsor', 'Queen', 'I am the Queen of England'),
(52, 'sdgdsf', 'garrydsmit@gmail.com', 'sdfds', '0790876776', 'sdfsdf', 'sdfdsf', 'sdfds', 'dsfsdf'),
(54, 'Garryd', 'testuser@test.com', 'aeaawewa', '0000000000', 'Garryd Smit', 'User1', 'dsfsdfds', 'dsgsf'),
(55, 'Garryd', 'this@test.com', 'ewerewr', '1111111111', 'Garryd Smit', 'Smit', 'erwer', 'erwerwer'),
(56, 'AnotherTest', 'another@test.com', 'ljhdkjh', '2222222222', 'Test45', 'User4555', 'egtrg', 'rgrg'),
(57, 'plaes', 'please@test.com', '', '0000258746', 'work', 'again', '', ''),
(62, 'Testing', 'again@test.com', 'lshkjh', '3333444456', 'TEsting', 'AGain', 'dfghfdg', 'fdgdfgf'),
(63, 'TestUser1', '', '', '', '', '', '', ''),
(68, 'TestUser1', 'cddgv@fdfd.com', 'tyrtrret', '1111222245', 'cvxv', 'vcvcv', 'Developer1', 'uygfggfh'),
(69, 'fhdfg', 'validatw@ijgsg.com', 'igkg', '6698423574', 'fsgsdgsd', 'User1', 'fhdhf', 'dhfhfh'),
(70, 'rsgsrg', 'defaulta@prev.com', 'gjgjgj', '2793014586', 'sfsdf', 'sdfshfhdsfhf', 'dfjfh', 'fgdfg'),
(71, 'TestUser1', 'alert@test.com', 'dfsgsfdg', '0004896357', 'sdfsdf', 'sdgsg', 'gjdh', 'fgdfsgds'),
(72, 'sxfjfghadh', 'alert2@test.com', 'dhdydr', '4778963214', 'gdkdhsf', 'yirthygryt', 'drhdhgfdh', 'dfhdfhdf'),
(73, 'Functom', 'function@test.com', 'ihgkgkv', '0321789654', 'TYest', 'Func', 'eafaef', 'afdsfdf'),
(74, 'TestUser1', 'unique@email.com', 'sds', '0146529735', 'Garryd Smit', 'User1', '', ''),
(75, 'TestUser1', 'unique1@email.com', 'asdas', '0158632458', 'Garryd Smit', 'asdas', '', ''),
(76, 'TestUser1', 'unique3@email.com', 'ddd', '0397564128', 'Garryd Smit', 'fdgfg', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
