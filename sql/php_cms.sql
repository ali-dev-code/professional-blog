-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2020 at 02:32 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(12, 'HTML'),
(13, 'CSS'),
(14, 'JAVASCRIPT'),
(15, 'PHP'),
(16, 'WORDPRESS');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `c_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` tinyint(1) NOT NULL,
  `comment_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`c_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_time`) VALUES
(2, 16, 'ali', 'aliasghar544outlook.com', 'just testing', 1, '2020-01-12 16:37:52'),
(3, 16, 'taskeen', 'taskeen@yahoo.com', 'just testing taskeen', 1, '2020-01-12 16:40:12'),
(5, 17, 'ali', 'aqeelhaider@gmail.com', 'just testing to see it is working\r\n', 0, '2020-01-13 13:24:00'),
(6, 17, 'ali', 'aqeelhaider@gmail.com', 'heeelo', 0, '2020-01-13 13:43:56'),
(8, 17, 'ali', 'aliasghar@gmail.com', 'hello\r\n', 1, '2020-01-16 17:26:26'),
(9, 17, 'ali', 'aliasghar@gmail.com', 'just tesing see', 1, '2020-01-16 17:27:11'),
(10, 27, 'ali', 'aliasghar@gmail.com', 'ssjhsh', 1, '2020-01-18 19:00:33'),
(11, 27, 'ali', 'aliasghar@gmail.com', 'sasjkasjk', 1, '2020-01-18 19:00:45'),
(12, 27, 'ss', 'aliasghar@gmail.com', 'snjasdh', 1, '2020-01-18 19:01:10');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` text NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_time`) VALUES
(16, 12, 'Hello this ali asghar here is present', 'ASGHAR', '2020-01-18', '5e14391eecd1b1.05902567.jpg', '<h1>Why do we use it?</h1><div><br></div><div><strong>It is a long established fac</strong>t that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br><br>readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br><br></div><div><br><br></div><div><br></div>', 'ali asghar preset', 3, 'draft', '2020-01-07 07:54:06'),
(17, 15, 'PHP is still no 4 most popular language in 2020', 'DANIYAL', '2020-01-12', '5e1b4df241acd9.22891238.jpg', '<div>PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020</div>', 'PHP MYSQL WEBSITE', 4, 'published', '2020-01-12 16:48:50'),
(18, 12, 'PHP is still no 4 most popular language in 2020', 'ALI', '2020-01-17', '5e21f646abb155.63120388.jpg', '<div>alalalala PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020</div>', 'HTML CSS', 0, 'published', '2020-01-17 18:00:38'),
(19, 14, 'PHP is still no 4 most popular language in 2020', 'ALI', '2020-01-17', '5e21f661b15509.24103609.jpg', '<div>PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020</div>', 'HTML CSS', 0, 'published', '2020-01-17 18:01:05'),
(20, 16, 'PHP is still no 4 most popular language in 2020', 'ALI', '2020-01-17', '5e21f679079847.37951306.jpg', '<div>PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020</div>', 'HTML CSS', 0, 'published', '2020-01-17 18:01:29'),
(21, 15, 'PHP is still no 4 most popular language in 2020', 'ALI', '2020-01-17', '5e21f6a1692fa5.04536012.jpg', '<div>PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020</div>', 'HTML CSS', 0, 'draft', '2020-01-17 18:02:09'),
(22, 12, 'PHP is still no 4 most popular language in 2020', 'ALI', '2020-01-17', '5e21f6e8d36d16.94990515.jpg', '<div>PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020</div>', 'HTML CSS', 0, 'published', '2020-01-17 18:03:20'),
(23, 14, 'PHP is still no 4 most popular language in 2020', 'PHP IS STILL NO 4 MOST POPULAR LANGUAGE IN 2020', '2020-01-18', '5e2214322acce8.84445642.jpg', '<div>PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020</div>', 'HTML CSS', 0, 'published', '2020-01-17 20:08:18'),
(24, 12, 'PHP is still no 4 most popular language in 2020', 'ALI', '2020-01-18', '5e22144b3219d9.47211121.jpg', '<div>PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020</div>', 'HTML CSS', 0, 'published', '2020-01-17 20:08:43'),
(25, 14, 'PHP is still no 4 most popular language in 2020', 'ALI', '2020-01-18', '5e221463761ee4.78972378.jpg', '<div>PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020</div>', 'HTML CSS', 0, 'published', '2020-01-17 20:09:07'),
(26, 12, 'PHP is still no 4 most popular language in ali asghar', 'ALI', '2020-01-18', '5e22147de83dd1.12224054.jpg', '<div>PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020PHP is still no 4 most popular language in 2020</div>', 'HTML CSS ali asghar', 0, 'published', '2020-01-17 20:09:33'),
(27, 12, 'Helo janab ka hai hai apka', 'ALI', '2020-01-18', '5e234ae9195eb4.27326632.jpg', '<div>hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello&nbsp;<br>hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello&nbsp; hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello&nbsp; hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello&nbsp; hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello&nbsp; &nbsp;</div>', 'UMAIR', 3, 'published', '2020-01-18 18:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_username` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_fname` varchar(255) NOT NULL,
  `u_lname` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_image` varchar(255) NOT NULL,
  `u_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_username`, `u_password`, `u_fname`, `u_lname`, `u_email`, `u_image`, `u_role`, `randSalt`) VALUES
(1, 'aliyahoo', 'aliyahoo', 'ali badsha', 'asghar', 'aliasghr216@gmail.com', '', 'admin', ''),
(3, 'taskeen112', '123', 'Taskeen', 'Haider', 'taskeenhaider@gmail.com', '', 'subscriber', ''),
(4, 'asadali', '123', 'asad', 'ali', 'asada2@gmail.com', '', 'subscriber', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `comment_post_id` (`comment_post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`comment_post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
