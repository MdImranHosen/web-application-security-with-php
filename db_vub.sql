-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2022 at 08:10 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_vub`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_token`
--

CREATE TABLE `access_token` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `TOKEN` text DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access_token`
--

INSERT INTO `access_token` (`id`, `user_id`, `TOKEN`, `create_date`) VALUES
(8, 1, '0e870476276d981abf371179f38d3dce', '2022-03-17 14:56:34'),
(9, 1, '0171fa3154f9cbdde8534852cfc55347', '2022-03-17 14:58:02'),
(10, 1, '7c66da4bd48696b90e320bae301f7b45', '2022-03-17 15:02:46'),
(11, 1, 'afbe6a0edf642528d0cfa51dd124cc6f', '2022-03-17 15:03:37'),
(12, 1, 'acf6a2e887d21a4331a4e1acafc104ff', '2022-03-17 15:05:51'),
(13, 1, 'd3c86ae0d6bc5f054c9d7b20027e1855', '2022-03-17 15:09:15'),
(14, 1, '306bb52e8e2ff8cda16edbea18afe01b', '2022-03-17 15:11:31'),
(15, 1, 'e4e79b6e1bd266c5cd216aeced0d4c6f', '2022-03-17 15:14:53'),
(16, 1, 'bf8f56adb889d21a4b46f13eea5a2f77', '2022-03-17 15:15:09'),
(17, 1, '4f4fcd98f9b9375e8436bd2efea8ed4e', '2022-03-17 15:18:43'),
(18, 1, '3c09f9180717f8272015615c3beaa291', '2022-03-17 15:19:28'),
(19, 1, '3472c599e47db83a3237f13f2b921ad2', '2022-03-17 15:20:02'),
(20, 1, 'e5b106d04a79b4f4a3231eadaca5e867', '2022-03-17 15:22:35'),
(21, 1, '9fc7298ada11c040d70b9bdbf4d4982a', '2022-03-17 15:29:58'),
(22, 1, '1c25be1facece49bffb8bdf23a2df723', '2022-03-17 15:30:55'),
(23, 1, '080cbd3e7b77370c58aa89b6faf4a3b3', '2022-03-19 03:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `create_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `img`, `create_date`) VALUES
(1, 'Access on Redirection Setting', 'It is one of the best practices of the designer/ developer of web application to separate administrative section pages from the general user panel for avoiding unauthorized access.', '10.jpg', '8.0 AM - 15-03-2022'),
(2, 'Piggy-Backed Queries', 'In piggy-backed query attack, the attacker intends to inject additional queries to extract data, modify or add data. Attackers inject additional queries to the original query, and as a result the DBMS receives multiple SQL queries.', '3.png', '5.0 AM - 14-03-2022'),
(3, 'Union Query', 'In union query attack, the attacker uses the UNION operator to join a malicious query to the original query. The result of the malicious query will be joined to the result of the original query, allowing the attacker to obtain the values of columns of other tables.', '1.png', '7.0 AM - 13-03-2022'),
(4, 'Improper Input Validation', 'The web application is must validate or sanitize user input properly before its utilization in the web servers. Usually, web developers exercise sanitizing practices for the transformation of inputs by the user into trusted data through filtration.', '7.png', '7.0 AM - 13-03-2022'),
(5, 'Secure Programming', 'Secure programming allows programmers to follow secure practices when they are developing the web application. Secure Programming protects coding practices by coding properly, checks the input data; encode correctly the user input, its type further by setting the query‘s parameter, also by bringing stored procedures to work ', '8.jpg', '6.0 AM - 15-03-2022'),
(6, 'Sanitization', 'When an attacker injects malicious SQL statements into the input host variables, they might be able to access the data of the database or extract private information. Sanitization is a type of input validation method that is performed to remove malicious elements from the input provided by the user. In addition, sanitization is performed before external input parameters are used in SQL statements and specify a regular expression or a builtin validation function in input sources.', '5.jpg', '9.0 AM - 17-03-2022');

-- --------------------------------------------------------

--
-- Table structure for table `session_manage`
--

CREATE TABLE `session_manage` (
  `id` int(11) NOT NULL,
  `session_on_off` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session_manage`
--

INSERT INTO `session_manage` (`id`, `session_on_off`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(1, 'Md. Imran Hosen', 'imranhosen', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_token`
--
ALTER TABLE `access_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session_manage`
--
ALTER TABLE `session_manage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_token`
--
ALTER TABLE `access_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `session_manage`
--
ALTER TABLE `session_manage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
