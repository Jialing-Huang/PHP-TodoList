-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 27, 2018 at 02:25 AM
-- Server version: 5.7.21
-- PHP Version: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jac`
--

-- --------------------------------------------------------

--
-- Table structure for table `todo_items`
--

CREATE TABLE `todo_items` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text,
  `completed` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 or 1 to identify if a task has been completed',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'timestamp of when the task was created',
  `ip_address` varchar(15) NOT NULL COMMENT 'IP address of whoever created the task'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `todo_items`
--

INSERT INTO `todo_items` (`id`, `name`, `description`, `completed`, `date_added`, `ip_address`) VALUES
(1, 'Go to sleep early', 'Big day tomorrow, need to catch some ZZZs', 0, '2019-03-25 11:03:04', '18.203.27.43'),
(2, 'Pick up groceries', 'Missing ingredients for breakfast', 0, '2019-03-25 10:57:29', '18.203.27.43'),
(3, 'Go to school', 'Show up on time cause of the exam today', 1, '2019-03-26 13:37:13', '41.44.205.171');

-- --------------------------------------------------------

--
-- Table structure for table `todo_users`
--

CREATE TABLE `todo_users` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `display_name` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `todo_users`
--

INSERT INTO `todo_users` (`id`, `username`, `display_name`, `password`, `email`) VALUES
(1, 'liz', 'Queen Elizabath', '81dc9bdb52d04dc20036dbd8313ed055', NULL),
(2, 'charles', 'Prince Charles', '81dc9bdb52d04dc20036dbd8313ed055', 'charles@futureking.com'),
(3, 'price', 'Carey Price', '202cb962ac59075b964b07152d234b70', 'price@habs.ca'),
(4, 'stu', 'Stewart Little', '202cb962ac59075b964b07152d234b70', NULL),
(5, 'will', 'Prince William', '81dc9bdb52d04dc20036dbd8313ed055', 'will@futureking.com'),
(6, 'albert', 'Albert Einstein', '202cb962ac59075b964b07152d234b70', 'e@mc.2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todo_items`
--
ALTER TABLE `todo_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todo_users`
--
ALTER TABLE `todo_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todo_items`
--
ALTER TABLE `todo_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `todo_users`
--
ALTER TABLE `todo_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
