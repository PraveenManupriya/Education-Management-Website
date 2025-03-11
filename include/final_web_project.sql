-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Sep 26, 2024 at 12:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_web_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `instructor` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `fee` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `duration`, `instructor`, `level`, `fee`) VALUES
(10, 'Software Developer', 'HTML,CSS,JS', '120', 'Saman Perera', 'Advanced', '15000'),
(11, 'Multimedia Designer', 'Graphic Design', '82', 'Janaka Nuwan', 'Intermediate', '10000'),
(12, 'Electronic', 'Wiring', '60', 'Tharaka Gihan', 'Beginner', '5000'),
(13, 'Bakery', 'Making', '100', 'Dasuni Lakshika', 'Beginner', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `cname` varchar(70) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`id`, `fname`, `cname`, `date`, `status`) VALUES
(23, 'Oshadi Ahinsa', 'Software Developer', '2024-09-03', 'active'),
(24, 'Ishara Madushani', 'Multimedia Designer', '2024-09-24', 'active'),
(25, 'Tharindu Kavishka', 'Bakery', '2024-09-19', 'inactive'),
(26, 'Chamindu Sathsara', 'Multimedia Designer', '2024-09-17', 'active'),
(27, 'Umaya Harshani', 'Bakery', '2024-09-12', 'active'),
(28, 'Yasiru Hirushan', 'Software Developer', '2024-09-11', 'active'),
(29, 'Oshada Vikum', 'Software Developer', '2024-09-12', 'active'),
(30, 'Kasuni Vihangi', 'Electronic', '2024-09-07', 'active'),
(31, 'Saduni Yasara', 'Bakery', '2024-09-20', 'active'),
(32, 'Vishwa Perera', 'Multimedia Designer', '2024-09-12', 'inactive'),
(33, 'Kasuni Vihangi', 'Multimedia Designer', '2024-09-20', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `course` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mark` varchar(5) NOT NULL,
  `status` varchar(6) NOT NULL,
  `remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `course`, `name`, `mark`, `status`, `remark`) VALUES
(9, 'Software Developer', 'Oshadi Ahinsa', '85', 'Pass', 'Pass');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` int(2) NOT NULL,
  `dob` date NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fname`, `nic`, `gender`, `age`, `dob`, `contact_no`, `images`) VALUES
(58, 'Oshadi Ahinsa', '200222401970', 'female', 23, '2024-09-16', '0773891555', 'w1.png'),
(59, 'Ishara Madushani', '200222401971', 'female', 25, '2024-09-03', '0774589642', 'w2.png'),
(60, 'Tharindu Kavishka', '200222401972', 'male', 27, '2024-09-03', '0773891726', 'm1.png'),
(61, 'Chamindu Sathsara', '200222401973', 'male', 21, '2024-09-06', '0774589642', 'm3.png'),
(62, 'Umaya Harshani', '200222401974', 'female', 22, '2024-09-10', '0774589642', 'w4.png'),
(63, 'Yasiru Hirushan', '200222401976', 'male', 18, '2024-09-06', '0773891726', 'm2.png'),
(64, 'Vishwa Perera', '200222401977', 'male', 22, '2024-09-13', '0773891727', 'm4.png'),
(65, 'Oshada Vikum', '200222401978', 'male', 23, '2024-09-11', '0773891554', 'm5.png'),
(66, 'Kasuni Vihangi', '200222401979', 'female', 22, '2024-09-10', '0759630827', 'w3.png'),
(67, 'Saduni Yasara', '200222401980', 'female', 23, '2024-09-10', '0773891729', 'w5.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `type`) VALUES
(41, 'Praveen Manupriya ', 'admin\r\n', 'admin@gmail.com', '1', 'admin'),
(45, 'Praveen Manupriya', 'praveen', 'praveen.manupriya@ecyber.com', '1', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
