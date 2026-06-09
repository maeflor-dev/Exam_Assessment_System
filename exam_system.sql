-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2026 at 01:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `time_limit` int(11) NOT NULL COMMENT 'Time in minutes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `title`, `time_limit`, `created_at`) VALUES
(1, 'PHP Programming Basics', 10, '2026-06-08 07:01:03'),
(2, 'sdad', 1, '2026-06-08 07:16:55'),
(3, 'as', 1, '2026-06-08 07:24:01'),
(4, 'a', 1, '2026-06-08 07:28:06'),
(5, 'e', 1, '2026-06-08 07:33:24'),
(6, '1', 2, '2026-06-08 07:37:47'),
(7, 'sa', 1, '2026-06-08 07:41:35'),
(8, 'ad', 1, '2026-06-08 07:46:54'),
(9, 'we', 1, '2026-06-08 07:56:31'),
(10, 'a', 1, '2026-06-08 07:57:33'),
(11, 'sda', 1, '2026-06-08 08:01:01'),
(12, 'Untitled Exam', 30, '2026-06-08 08:14:57'),
(13, 'Untitled Exam', 2, '2026-06-08 08:21:31'),
(14, 'reas', 30, '2026-06-08 08:58:12'),
(15, 'asa', 30, '2026-06-08 09:04:23'),
(16, 'sad', 2, '2026-06-08 09:21:12'),
(17, 'asd', 30, '2026-06-08 10:08:36'),
(18, 'assdasadasdasdsasasadas', 30, '2026-06-08 10:14:48'),
(19, 'sadsdasd', 30, '2026-06-08 10:18:16'),
(20, 'dsad', 30, '2026-06-08 10:30:48'),
(21, 'sdasd', 2, '2026-06-08 10:31:08'),
(22, 'sadsad', 30, '2026-06-08 10:34:29'),
(23, 'sad', 30, '2026-06-08 10:36:46'),
(24, 'Test', 1, '2026-06-08 10:58:35'),
(25, 'Do pariatur Reicien', 97, '2026-06-08 11:08:02'),
(26, 'Tempora sit ad blan', 146, '2026-06-08 11:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `details` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `action`, `details`, `timestamp`) VALUES
(1, 2, 'tab_switch', 'Switched tabs 3 times during Exam ID: 1', '2026-06-08 07:03:15'),
(2, 2, 'tab_switch', 'Switched tabs 3 times', '2026-06-08 07:18:29'),
(3, 2, 'tab_switch', 'Switched tabs 3 times', '2026-06-08 07:22:24'),
(4, 2, 'tab_switch', 'Switched tabs 3 times', '2026-06-08 07:22:52'),
(5, 2, 'tab_switch', 'Switched tabs 3 times', '2026-06-08 07:27:00'),
(6, 2, 'tab_switch', 'Switched tabs 3 times', '2026-06-08 07:28:55'),
(7, 2, 'tab_switch', 'Switched tabs 3 times', '2026-06-08 07:34:14'),
(8, 2, 'tab_switch', 'Switched tabs 3 times', '2026-06-08 07:39:07'),
(9, 2, 'tab_switch', 'Switched tabs 3 times', '2026-06-08 07:42:38'),
(10, 2, 'tab_switch', 'Switched tabs 3 times', '2026-06-08 07:48:43'),
(11, 2, 'tab_switch', 'Switched tabs 2 times', '2026-06-08 08:02:52'),
(12, 2, 'tab_switch', 'Switched tabs 3 times', '2026-06-08 08:24:15'),
(13, 2, 'tab_switch', 'Switched tabs 2 times', '2026-06-08 09:06:41'),
(14, 2, 'tab_switch', 'Switched tabs 3 times', '2026-06-08 09:11:14'),
(15, 2, 'tab_switch', 'Switched tabs 3 times', '2026-06-08 09:13:08'),
(16, 2, 'tab_switch', 'Switched tabs 3 times', '2026-06-08 09:14:00'),
(17, 2, 'tab_switch', 'Switched tabs 3 times', '2026-06-08 09:14:48'),
(18, 2, 'tab_switch', 'Switched tabs 3 times', '2026-06-08 09:22:06'),
(19, 2, 'tab_switch', 'Switched tabs 3 times', '2026-06-08 10:10:43'),
(20, 2, 'tab_switch', 'Switched tabs 3 times', '2026-06-08 10:20:39'),
(21, 2, 'tab_switch', 'Switched tabs 3 times', '2026-06-08 10:27:15'),
(22, 2, 'tab_switch', 'Switched tabs 1 times', '2026-06-08 10:32:32'),
(23, 2, 'tab_switch', 'Switched tabs 1 times', '2026-06-08 10:37:46'),
(24, 2, 'tab_switch', 'Switched tabs 3 times', '2026-06-08 11:00:15'),
(25, 2, 'tab_switch', 'Switched tabs 1 times', '2026-06-08 11:08:33'),
(26, 2, 'tab_switch', 'Switched tabs 1 times', '2026-06-08 11:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`options`)),
  `correct_answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `exam_id`, `question`, `options`, `correct_answer`) VALUES
(1, 1, 'What does PHP stand for?', '[\"Personal Home Page\", \"Preprocessor Hypertext\", \"PHP: Hypertext Preprocessor\", \"Professional Hosting Protocol\"]', 2),
(2, 1, 'Which function is used to start a session in PHP?', '[\"session_begin()\", \"session_start()\", \"start_session()\", \"begin_session()\"]', 1),
(3, 1, 'What is the correct way to create a PDO connection?', '[\"new PDO()\", \"new mysqli()\", \"new Database()\", \"new Connection()\"]', 0),
(4, 1, 'Which method helps prevent SQL injection in PDO?', '[\"escape_string()\", \"real_escape()\", \"prepare()\", \"clean()\"]', 2),
(5, 1, 'What does MVC stand for?', '[\"Model View Controller\", \"Module View Control\", \"Model View Control\", \"Module View Controller\"]', 0),
(6, 2, 'as', '[\"dsa\",\"sa\",\"sd\",\"sa\"]', 3),
(7, 2, 'ad', '[\"d\",\"sa\",\"d\",\"sad\"]', 2),
(8, 2, 'as', '[\"d\",\"d\",\"d\",\"d\"]', 2),
(9, 3, 'a', '[\"a\",\"a\",\"a\",\"a\"]', 2),
(10, 4, 'ad', '[\"d\",\"a\",\"q\",\"a\"]', 1),
(11, 4, 'a', '[\"a\",\"a\",\"a\",\"a\"]', 1),
(12, 5, 'a', '[\"2\",\"w\",\"w\",\"w\"]', 1),
(13, 5, 'w', '[\"2\",\"ew\",\"2\",\"we\"]', 1),
(14, 6, 'ad', '[\"s\",\"sa\",\"s\",\"sa\"]', 2),
(15, 6, 'asd', '[\"q\",\"d\",\"sa\",\"sa\"]', 1),
(16, 7, 'asd', '[\"das\",\"asd\",\"das\",\"sad\"]', 2),
(17, 7, 'asd', '[\"q\",\"as\",\"q\",\"as\"]', 1),
(18, 7, 'ad', '[\"asd\",\"sd\",\"sad\",\"sad\"]', 1),
(19, 8, 'ad', '[\"d\",\"sd\",\"sa\",\"as\"]', 2),
(20, 8, 'ad', '[\"d\",\"s\",\"s\",\"s\"]', 1),
(21, 8, 'a', '[\"a\",\"a\",\"a\",\"a\"]', 0),
(22, 9, 'a', '[\"ad\",\"as\",\"sa\",\"ad\"]', 2),
(23, 10, 'ad', '[\"a1\",\"asd\",\"a\",\"asd\"]', 2),
(24, 10, '1', '[\"asd\",\"asd\",\"asd\",\"asd\"]', 2),
(25, 11, 'a', '[\"d\",\"a\",\"d\",\"a\"]', 2),
(26, 1, 'Which HTML tag is used to create a hyperlink?', '[\"<link>\",\"<a>\",\"<href>\",\"<url>\"]', 1),
(27, 1, 'What is the primary purpose of CSS?', '[\"To structure web content\",\"To handle server-side logic\",\"To style and layout web pages\",\"To manage databases\"]', 2),
(28, 1, 'Which programming language is mainly used for web interactivity on the client side?', '[\"Python\",\"PHP\",\"JavaScript\",\"SQL\"]', 2),
(29, 1, 'What does SQL stand for?', '[\"Structured Query Language\",\"Simple Query Language\",\"System Query Logic\",\"Server Query Language\"]', 0),
(30, 1, 'Which HTTP method is used to retrieve data from a server?', '[\"POST\",\"GET\",\"PUT\",\"DELETE\"]', 1),
(31, 12, 'q', '[\"d\",\"sad\",\"asd\",\"sa\"]', 2),
(32, 12, 'as', '[\"as\",\"as\",\"as\",\"a\"]', 1),
(33, 13, 'Which HTML tag is used to create a hyperlink?', '[\"<link>\",\"<a>\",\"<href>\",\"<url>\"]', 1),
(34, 13, 'What is the primary purpose of CSS?', '[\"To structure web content\",\"To handle server-side logic\",\"To style and layout web pages\",\"To manage databases\"]', 2),
(35, 13, 'Which programming language is mainly used for web interactivity on the client side?', '[\"Python\",\"PHP\",\"JavaScript\",\"SQL\"]', 2),
(36, 13, 'What does SQL stand for?', '[\"Structured Query Language\",\"Simple Query Language\",\"System Query Logic\",\"Server Query Language\"]', 0),
(37, 13, 'Which HTTP method is used to retrieve data from a server?', '[\"POST\",\"GET\",\"PUT\",\"DELETE\"]', 1),
(38, 13, 's', '[\"asd\",\"dsa\",\"sa\",\"asd\"]', 1),
(39, 14, 'A. To style web pages', '[\"To structure web pages\",\"To make web pages interactive\",\"To store data in databases\",\"\"]', 0),
(40, 14, 'What does CSS stand for?', '[\"Computer Style Sheets\",\"Cascading Style Sheets\",\"Creative Style System\",\"Colorful Style Sheets\"]', 2),
(41, 14, 'Which of the following is NOT a programming language?', '[\"Python\",\"Java\",\"HTML\",\"C++\"]', 0),
(42, 14, 'What is a loop in programming used for?', '[\"To store data\",\"To repeat a block of code\",\"To delete files\",\"To design interfaces\"]', 2),
(43, 14, 'What is the default file extension of a PHP file?', '[\".html\",\".php\",\".js\",\".css\"]', 0),
(44, 14, 'sd', '[\"d\",\"d\",\"s\",\"a\"]', 1),
(45, 15, 'What is PHP?', '[\"Personal Home Page\",\"PHP: Hypertext Preprocessor\",\"Preprocessor Hypertext\",\"Professional Hosting Protocol\"]', 0),
(46, 15, 'What is PHP?', '[\"Personal Home Page\",\"PHP: Hypertext Preprocessor\",\"Preprocessor Hypertext\",\"Professional Hosting Protocol\"]', 0),
(47, 15, 'sd', '[\"sd\",\"sa\",\"s\",\"sa\"]', 0),
(48, 15, 'asd', '[\"sad\",\"as\",\"sad\",\"sad\"]', 1),
(49, 16, 'A. Personal Home Page', '[\"PHP: Hypertext Preprocessor\",\"Preprocessor Hypertext\",\"Professional Hosting Protocol\",\"\"]', 0),
(50, 16, 'What is PHP?', '[\"Personal Home Page\",\"PHP: Hypertext Preprocessor\",\"Preprocessor Hypertext\",\"Professional Hosting Protocol\"]', 0),
(51, 17, 'A. Personal Home Page', '[\"PHP: Hypertext Preprocessor\",\"Preprocessor Hypertext\",\"Professional Hosting Protocol\",\"\"]', 0),
(52, 17, 'What is PHP?', '[\"Personal Home Page\",\"PHP: Hypertext Preprocessor\",\"Preprocessor Hypertext\",\"Professional Hosting Protocol\"]', 0),
(53, 18, 'sad', '[\"sad\",\"asd\",\"sad\",\"sad\"]', 0),
(54, 19, 'sa', '[\"sd\",\"sa\",\"s\",\"sd\"]', 0),
(55, 19, 'sad', '[\"sda\",\"sda\",\"sad\",\"sad\"]', 0),
(56, 19, 'as', '[\"as\",\"as\",\"as\",\"as\"]', 1),
(57, 19, 'sdf', '[\"fds\",\"dsf\",\"dsf\",\"dsf\"]', 1),
(58, 20, 'A. Personal Home Page', '[\"PHP: Hypertext Preprocessor\",\"Preprocessor Hypertext\",\"Professional Hosting Protocol\",\"\"]', 0),
(59, 20, 'What is PHP?', '[\"Personal Home Page\",\"PHP: Hypertext Preprocessor\",\"Preprocessor Hypertext\",\"Professional Hosting Protocol\"]', 0),
(60, 21, 'sad', '[\"sad\",\"sad\",\"sadsad\",\"asd\"]', 0),
(61, 21, 'dsad', '[\"sdsa\",\"dasd\",\"sadas\",\"sada\"]', 0),
(62, 22, 'asdsa', '[\"dasdd\",\"asdas\",\"dasd\",\"sad\"]', 3),
(63, 22, 'asdas', '[\"asdas\",\"sadasd\",\"asdasd\",\"asd\"]', 3),
(64, 23, 'sad', '[\"asd\",\"sadsa\",\"dasd\",\"ss\"]', 0),
(65, 23, 'asd', '[\"sadas\",\"dasdasd\",\"sadsa\",\"dsad\"]', 0),
(66, 24, 'sad', '[\"sad\",\"sad\",\"sad\",\"sda\"]', 1),
(67, 24, 'sada', '[\"sadsd\",\"sadsa\",\"asda\",\"sad\"]', 0),
(68, 24, 'sada', '[\"sadsd\",\"sadsa\",\"asda\",\"sad\"]', 0),
(69, 24, 'sad', '[\"sad\",\"dsad\",\"sadasd\",\"sad\"]', 0),
(70, 25, 'Vero voluptas sint s', '[\"Ullamco quaerat fugi\",\"A nulla veritatis fa\",\"Voluptas nobis sit\",\"Saepe illum magna d\"]', 1),
(71, 25, 'Ut delectus animi', '[\"A ea et provident m\",\"Repellendus Distinc\",\"Natus voluptates lab\",\"Odio illo possimus\"]', 2),
(72, 26, 'Aut quam quaerat del', '[\"Eiusmod est sed duci\",\"Modi nostrum enim es\",\"Et consequat Autem\",\"Dolor id eu aut ut p\"]', 2),
(73, 26, 'Impedit est enim e', '[\"Eiusmod eum qui mole\",\"Aliqua Minus delect\",\"Quia nihil earum con\",\"Quia adipisci provid\"]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `user_id`, `exam_id`, `score`, `total_questions`, `submitted_at`) VALUES
(1, 2, 1, 1, 5, '2026-06-08 07:03:15'),
(2, 2, 2, 1, 3, '2026-06-08 07:18:29'),
(5, 2, 3, 0, 1, '2026-06-08 07:27:00'),
(6, 2, 4, 0, 2, '2026-06-08 07:28:55'),
(7, 2, 5, 0, 2, '2026-06-08 07:34:14'),
(8, 2, 6, 0, 2, '2026-06-08 07:39:07'),
(9, 2, 7, 0, 3, '2026-06-08 07:42:38'),
(10, 2, 8, 0, 2, '2026-06-08 07:48:43'),
(11, 2, 11, 0, 1, '2026-06-08 08:02:53'),
(12, 2, 13, 0, 6, '2026-06-08 08:24:15'),
(13, 2, 15, 0, 3, '2026-06-08 09:06:42'),
(14, 2, 14, 0, 6, '2026-06-08 09:11:14'),
(15, 2, 12, 0, 2, '2026-06-08 09:13:08'),
(16, 2, 10, 0, 2, '2026-06-08 09:14:01'),
(17, 2, 9, 0, 1, '2026-06-08 09:14:48'),
(18, 2, 16, 0, 2, '2026-06-08 09:22:06'),
(19, 2, 17, 0, 2, '2026-06-08 10:10:43'),
(20, 2, 18, 0, 1, '2026-06-08 10:20:39'),
(21, 2, 19, 0, 3, '2026-06-08 10:27:15'),
(22, 2, 21, 0, 2, '2026-06-08 10:32:32'),
(23, 2, 22, 0, 2, '2026-06-08 10:35:07'),
(24, 2, 23, 0, 2, '2026-06-08 10:37:46'),
(25, 2, 20, 0, 2, '2026-06-08 10:54:10'),
(26, 2, 24, 1, 4, '2026-06-08 11:00:15'),
(27, 2, 25, 0, 2, '2026-06-08 11:08:33'),
(28, 2, 26, 0, 2, '2026-06-08 11:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('student','admin') DEFAULT 'student',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Admin User', 'admin@exam.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', '2026-06-08 07:01:03'),
(2, 'John Doe', 'student@exam.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', '2026-06-08 07:01:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_id` (`exam_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_submission` (`user_id`,`exam_id`),
  ADD KEY `exam_id` (`exam_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
