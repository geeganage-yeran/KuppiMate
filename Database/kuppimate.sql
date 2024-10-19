-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 06:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuppimate`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `related_table` varchar(50) NOT NULL,
  `attended_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('attended','cancelled') DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `user_id`, `session_id`, `related_table`, `attended_date`, `status`, `created_by`, `updated_by`, `created_date`, `updated_date`) VALUES
(10, 47, 61, 'kuppisession', '2024-09-26 16:51:16', 'attended', 47, NULL, '2024-09-26 16:51:16', '2024-09-26 16:51:16'),
(13, 47, 62, 'kuppisession', '2024-10-03 09:16:58', 'attended', 47, NULL, '2024-10-03 09:16:58', '2024-10-03 09:16:58'),
(16, 45, 64, 'kuppisession', '2024-10-04 10:54:23', 'attended', 45, NULL, '2024-10-04 10:54:23', '2024-10-04 10:54:23'),
(17, 47, 66, 'kuppisession', '2024-10-07 04:19:15', 'attended', 47, NULL, '2024-10-07 04:19:15', '2024-10-07 04:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `created_by`, `updated_by`, `created_date`, `updated_date`) VALUES
(59, 'Accounting', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(60, 'Agriculture', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(61, 'Architecture', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(62, 'Biotechnology', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(63, 'Business Administration', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(64, 'Civil Engineering', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(65, 'Computer Science', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(66, 'Economics', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(68, 'Electrical Engineering', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(69, 'English', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(70, 'Environmental Science', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(71, 'Finance', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(72, 'Information Technology', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(73, 'Law', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(93, 'Fashion Design', 15, 15, '2024-08-05 04:15:39', '2024-08-05 04:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `session_id` int(11) DEFAULT NULL,
  `related_table` varchar(50) NOT NULL,
  `comment` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `session_id`, `related_table`, `comment`, `rating`, `created_by`, `updated_by`, `created_date`, `updated_date`) VALUES
(31, 61, 'kuppisession', 'FWFQFQF', 5, 47, NULL, '2024-10-04 09:52:23', '2024-10-04 09:52:23');

-- --------------------------------------------------------

--
-- Table structure for table `kuppisession`
--

CREATE TABLE `kuppisession` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `session_start_date_time` datetime DEFAULT NULL,
  `session_end_date_time` datetime DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `session_link` varchar(255) DEFAULT NULL,
  `recorded` tinyint(1) DEFAULT 0,
  `driveLink` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kuppisession`
--

INSERT INTO `kuppisession` (`id`, `category_id`, `title`, `description`, `session_start_date_time`, `session_end_date_time`, `status`, `session_link`, `recorded`, `driveLink`, `created_by`, `updated_by`, `created_date`, `updated_date`) VALUES
(61, 65, 'session title testing 01', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout It is a long established fact that a reader', '2024-09-15 11:45:00', '2024-09-16 11:45:00', 'approved', 'https://learn.zoom.us/j/65991087445?pwd=ekZyWFpEMDY5R1I2UGJzczd0aTRrdz09', 0, NULL, 45, NULL, '2024-09-15 06:16:08', '2024-09-15 06:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `kuppi_session_id` int(11) DEFAULT NULL,
  `tutor_session_id` int(11) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_type` varchar(50) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `kuppi_session_id`, `tutor_session_id`, `file_size`, `file_name`, `file_type`, `file_path`, `created_by`, `updated_by`, `created_date`, `updated_date`) VALUES
(19, 61, NULL, 23492, '61.zip', NULL, 'C:\\xampp\\htdocs\\KuppiMate\\src\\controller/material-uploads/61.zip', 45, 45, '2024-09-15 15:28:19', '2024-09-15 15:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `session_id` int(11) NOT NULL,
  `broadcasted` tinyint(1) DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `category_id`, `title`, `description`, `session_id`, `broadcasted`, `created_by`, `updated_by`, `created_date`, `updated_date`) VALUES
(13, 65, 'session title testing 01', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout It is a long established fact that a reader', 61, 1, 45, NULL, '2024-09-15 06:16:08', '2024-09-15 06:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tutor_session_id` int(11) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tutor_session_id` int(11) DEFAULT NULL,
  `subscribed_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tutorsession`
--

CREATE TABLE `tutorsession` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `course_content` text NOT NULL,
  `about_tutor` text NOT NULL,
  `tutor_fee` int(11) DEFAULT NULL,
  `drive_link` varchar(255) DEFAULT NULL,
  `session_link` text DEFAULT NULL,
  `time_period` text NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutorsession`
--

INSERT INTO `tutorsession` (`id`, `title`, `description`, `course_content`, `about_tutor`, `tutor_fee`, `drive_link`, `session_link`, `time_period`, `status`, `created_by`, `updated_by`, `created_date`, `updated_date`) VALUES
(6, 'new mernstack course from zero to hero', 'The MERN stack is a collection of technologies that help developers build robust and scalable web applications using JavaScript The MERN stack is a collection of technologies that help developers build robust and scalable web applications using JavaScript', 'The MERN stack is a collection of technologies that help developers build robust and scalable web applications using JavaScript The MERN stack is a collection of technologies that help developers build robust and scalable web applications using JavaScript', 'The MERN stack is a collection of technologies that help developers build robust and scalable web applications using JavaScript The MERN stack is a collection of technologies that help developers build robust and scalable web applications using JavaScript', 5500, NULL, 'https://learn.zoom.us/j/65991087445?pwd=ekZyWFpEMDY5R1I2UGJzczd0aTRrdz09', '6 months', 'approved', 45, 15, '2024-10-04 10:26:12', '2024-10-04 10:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`id`, `name`) VALUES
(7, 'Eastern University of Sri Lanka'),
(11, 'Open University of Sri Lanka'),
(9, 'Rajarata University of Sri Lanka'),
(8, 'South Eastern University of Sri Lanka'),
(12, 'Sri Lanka Institute of Information Technology (SLI'),
(1, 'University of Colombo'),
(5, 'University of Jaffna'),
(6, 'University of Kelaniya'),
(3, 'University of Moratuwa'),
(2, 'University of Peradeniya'),
(4, 'University of Sri Jayewardenepura'),
(10, 'Uva Wellassa University');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `role` enum('administrator','undergraduate','external_learner') NOT NULL,
  `account_status` varchar(50) DEFAULT 'Inactive',
  `verification_file_name` varchar(255) DEFAULT NULL,
  `verification_file_path` varchar(500) DEFAULT NULL,
  `verification_file_type` varchar(50) DEFAULT NULL,
  `verification_file_size` int(11) DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT 0,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `university_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `contact`, `role`, `account_status`, `verification_file_name`, `verification_file_path`, `verification_file_type`, `verification_file_size`, `is_verified`, `last_login`, `created_by`, `updated_by`, `created_date`, `updated_date`, `university_id`) VALUES
(15, 'admin', 'admin', 'admin@gmail.com', '$2y$10$JN2QrqVJbqcyGcZ4K6o1yuAbXqbt.kIhiUDOVTQqWe5S20GDmqaDu', '0710619833', 'administrator', 'active', NULL, NULL, NULL, NULL, 1, '2024-10-19 04:43:13', NULL, NULL, '2024-07-14 04:11:52', '2024-07-14 04:11:52', NULL),
(45, 'yeran', 'lakvidu', 'geeganageyeran@gmail.com', '$2y$10$JN2QrqVJbqcyGcZ4K6o1yuAbXqbt.kIhiUDOVTQqWe5S20GDmqaDu', '0710619833', 'undergraduate', 'active', '66e674e1ae8f2.png', 'C:\\xampp\\htdocs\\KuppiMate\\src\\controller/uploads/66e674e1ae8f2.png', 'image/png', 25533, 1, '2024-10-18 16:36:32', NULL, NULL, '2024-09-15 05:47:13', '2024-09-15 05:47:13', 6),
(47, 'sathil', 'lakvidu', 'designs.yeran@gmail.com', '$2y$10$tmTuuts18VVl9Vs7qFgdmOhsyM1nkXgooswHd1HtuQUhew3p66Bye', '0710619833', 'undergraduate', 'active', '66e7dd72d6633.png', 'C:\\xampp\\htdocs\\KuppiMate\\src\\controller/uploads/66e7dd72d6633.png', 'image/png', 25533, 1, '2024-10-18 11:23:47', NULL, NULL, '2024-09-16 07:25:39', '2024-09-16 07:25:39', 1),
(49, 'kamal', 'perera', 'kamal@gmail.com', '$2y$10$tduXA0uRU83FkZJ8aXKFa.xMgTV.iNblrrqn4BxzWqh8F.BSUwdvq', '0710619833', 'undergraduate', 'inactive', '66e7dfcd2477a.png', 'C:\\xampp\\htdocs\\KuppiMate\\src\\controller/uploads/66e7dfcd2477a.png', 'image/png', 25533, 0, '2024-09-16 07:35:41', NULL, NULL, '2024-09-16 07:35:41', '2024-09-16 07:35:41', 8),
(51, 'chamal', 'saminda', 'chamal@gmail.com', '$2y$10$H49jWFYuyyD1r/8kCMzNOuaTAjC8B3r7O0Y/lvgvs9sTgHH70Olgq', '0710619833', 'external_learner', 'active', NULL, NULL, NULL, NULL, 1, '2024-10-17 17:07:41', NULL, NULL, '2024-10-03 14:34:21', '2024-10-03 14:34:21', NULL),
(52, 'nisal', 'ranasinghe', 'nisal@gmail.com', '$2y$10$FNiQd7ZS2pwuy3S4kqri8.bDr3qpv852BEPbJDyBaBPHr/vkxO35C', '0710619833', 'undergraduate', 'inactive', '6712810d8ca41.png', 'C:\\xampp\\htdocs\\KuppiMate\\src\\controller/uploads/6712810d8ca41.png', 'image/png', 25533, 0, '2024-10-18 15:38:53', NULL, NULL, '2024-10-18 15:38:53', '2024-10-18 15:38:53', 1),
(53, 'kalhari', 'perera', 'kalhari@gmail.com', '$2y$10$0aUi6a5Bm5nnttVvQHyrb.MFs2Thiw7kz/5KYpwxQmMzHdAYThvwO', '0710619833', 'external_learner', 'active', NULL, NULL, NULL, NULL, 1, '2024-10-18 16:04:25', NULL, NULL, '2024-10-18 16:04:25', '2024-10-18 16:04:25', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `kuppisession`
--
ALTER TABLE `kuppisession`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kuppi_session_id` (`kuppi_session_id`),
  ADD KEY `tutor_session_id` (`tutor_session_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tutor_session_id` (`tutor_session_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tutor_session_id` (`tutor_session_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `tutorsession`
--
ALTER TABLE `tutorsession`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `fk_university` (`university_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `kuppisession`
--
ALTER TABLE `kuppisession`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tutorsession`
--
ALTER TABLE `tutorsession`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `attendance_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `kuppisession`
--
ALTER TABLE `kuppisession`
  ADD CONSTRAINT `kuppisession_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `kuppisession_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `kuppisession_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`kuppi_session_id`) REFERENCES `kuppisession` (`id`),
  ADD CONSTRAINT `material_ibfk_2` FOREIGN KEY (`tutor_session_id`) REFERENCES `tutorsession` (`id`),
  ADD CONSTRAINT `material_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `material_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `notice`
--
ALTER TABLE `notice`
  ADD CONSTRAINT `notice_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `notice_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notice_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`tutor_session_id`) REFERENCES `tutorsession` (`id`),
  ADD CONSTRAINT `payment_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `payment_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `subscription_ibfk_2` FOREIGN KEY (`tutor_session_id`) REFERENCES `tutorsession` (`id`),
  ADD CONSTRAINT `subscription_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `subscription_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `tutorsession`
--
ALTER TABLE `tutorsession`
  ADD CONSTRAINT `tutorsession_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tutorsession_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_university` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`),
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
