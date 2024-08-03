-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2024 at 04:16 PM
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
(63, 'Business_Administration', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(64, 'Civil_Engineering', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(65, 'Computer_Science', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(66, 'Economics', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(67, 'Education', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(68, 'Electrical_Engineering', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(69, 'English', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(70, 'Environmental_Science', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(71, 'Finance', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(72, 'Information_Technology', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(73, 'Law', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(74, 'Marketing', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(75, 'Mathematics', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(76, 'Mechanical_Engineering', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(77, 'Medicine', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(78, 'Nursing', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(79, 'Pharmacy', 15, NULL, '2024-07-16 04:47:09', '2024-07-16 04:47:09'),
(80, 'Physics', 15, NULL, '2024-07-16 04:47:10', '2024-07-16 04:47:10'),
(81, 'Psychology', 15, NULL, '2024-07-16 04:47:10', '2024-07-16 04:47:10'),
(82, 'Software_Engineering', 15, NULL, '2024-07-16 04:47:10', '2024-07-16 04:47:10'),
(83, 'Statistics', 15, NULL, '2024-07-16 04:47:10', '2024-07-16 04:47:10');

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
  `rescheduled_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kuppisession`
--

INSERT INTO `kuppisession` (`id`, `category_id`, `title`, `description`, `session_start_date_time`, `session_end_date_time`, `status`, `session_link`, `recorded`, `driveLink`, `rescheduled_date`, `created_by`, `updated_by`, `created_date`, `updated_date`) VALUES
(33, 65, 'Rapid Application Development', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system', '2024-07-24 11:25:00', '2024-07-25 11:25:00', 'pending', NULL, 0, NULL, '2024-07-24 17:56:35', 30, NULL, '2024-07-24 17:56:35', '2024-07-24 17:56:35'),
(34, 83, 'statistics', 'dummy text here', '2024-08-09 23:30:00', '2024-08-03 11:31:00', 'approved', 'https://us05web.zoom.us/j/81076669864?pwd=Yok9Pa6t3eiOLxwvreaOtDEMyu2dZZ.1', 0, NULL, '2024-08-02 06:01:05', 30, NULL, '2024-08-02 06:00:11', '2024-08-02 06:00:11');

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
(9, 34, NULL, 4492, '34.zip', NULL, 'C:\\xampp\\htdocs\\KuppiMate\\src\\controller/material-uploads/34.zip', 30, 30, '2024-08-02 06:01:57', '2024-08-02 06:01:57');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `broadcasted` tinyint(1) DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tutor_session_id` int(11) NOT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
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
  `session_type` enum('Kuppi','Tutor') NOT NULL,
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
  `tutor_fee` int(11) DEFAULT NULL,
  `session_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `drive_link` varchar(255) DEFAULT NULL,
  `is_free` tinyint(1) DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `university` varchar(50) DEFAULT NULL,
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
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `contact`, `university`, `role`, `account_status`, `verification_file_name`, `verification_file_path`, `verification_file_type`, `verification_file_size`, `is_verified`, `last_login`, `created_by`, `updated_by`, `created_date`, `updated_date`) VALUES
(15, 'admin', 'admin', 'admin@gmail.com', '0e3fc51fb56a25e8780c673c9ad77a8a', '0710619833', NULL, 'administrator', 'active', NULL, NULL, NULL, NULL, 1, '2024-07-14 06:26:04', NULL, NULL, '2024-07-14 04:11:52', '2024-07-14 04:11:52'),
(19, 'piyumi', 'weerasinghe', 'piyumi@gmail.com', '0e3fc51fb56a25e8780c673c9ad77a8a', '0710619833', NULL, 'external_learner', 'active', NULL, NULL, NULL, NULL, 1, '2024-07-25 19:21:15', NULL, NULL, '2024-07-14 16:40:25', '2024-07-14 16:40:25'),
(21, 'Michael', 'Johnson', 'michael.j@example.com', '1b984947472da1a7c3659fe135e52c67', '0734567890', 'University of Colombo', 'undergraduate', 'inactive', '66940437bf327.pdf', 'C:\\xampp\\htdocs\\KuppiMate\\src\\controller/uploads/66940437bf327.pdf', 'application/pdf', 712773, 0, '2024-07-15 15:09:13', NULL, NULL, '2024-07-14 17:00:39', '2024-07-14 17:00:39'),
(28, 'tharushi', 'nadeeshani', 'tharushi@gmail.com', '0e3fc51fb56a25e8780c673c9ad77a8a', '0785676543', 'University of Jaffna', 'undergraduate', 'active', '6694f4bf48d93.pdf', 'C:\\xampp\\htdocs\\KuppiMate\\src\\controller/uploads/6694f4bf48d93.pdf', 'application/pdf', 712773, 1, '2024-08-02 05:57:20', NULL, NULL, '2024-07-15 10:06:55', '2024-07-15 10:06:55'),
(30, 'Nandasiri', 'lakvidu', 'geeganageyeran@gmail.com', '0e3fc51fb56a25e8780c673c9ad77a8a', '0756000901', 'Uva Wellassa University', 'undergraduate', 'active', '6694fc45a51e3.pdf', 'C:\\xampp\\htdocs\\KuppiMate\\src\\controller/uploads/6694fc45a51e3.pdf', 'application/pdf', 712773, 1, '2024-08-02 06:03:25', NULL, NULL, '2024-07-15 10:39:01', '2024-07-15 10:39:01'),
(34, 'manith', 'nandasiri', 'designs.yeran@gmail.com', '178135aea145d95431736cb9fbe0ad2f', '0710619833', NULL, 'external_learner', 'active', NULL, NULL, NULL, NULL, 1, '2024-08-02 05:54:29', NULL, NULL, '2024-07-26 10:24:28', '2024-07-26 10:24:28'),
(35, 'kavinda', 'chamod', 'kavinda@gmail.com', '0e3fc51fb56a25e8780c673c9ad77a8a', '0710619833', 'University of Colombo', 'undergraduate', 'active', '66ac773ae9dda.pdf', 'C:\\xampp\\htdocs\\KuppiMate\\src\\controller/uploads/66ac773ae9dda.pdf', 'application/pdf', 712773, 1, '2024-08-02 06:07:10', NULL, NULL, '2024-08-02 06:05:46', '2024-08-02 06:05:46'),
(36, 'kasun', 'chamika', 'kasuna@gmail.com', '178135aea145d95431736cb9fbe0ad2f', '0710619833', NULL, 'external_learner', 'active', NULL, NULL, NULL, NULL, 1, '2024-08-03 14:09:45', NULL, NULL, '2024-08-03 14:07:54', '2024-08-03 14:07:54');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kuppisession`
--
ALTER TABLE `kuppisession`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tutorsession`
--
ALTER TABLE `tutorsession`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
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
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
