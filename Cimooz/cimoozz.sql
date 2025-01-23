-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 03:10 PM
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
-- Database: `cimoozz`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `username`, `email`, `password`, `age`, `created_at`, `updated_at`) VALUES
(1, 'Jojo', '  Fakhry', 'jp;j;.', 'Jonathan_20220130@fci.helwan.edu.eg', '$2y$10$M3lIvMHi6LvPxzHpoGxqdOC/Ndl7ODf9ULp2b5vjqqGfQDQgGapwW', 19, '2024-04-26 02:45:02', '2024-04-26 02:45:02'),
(2, 'koko', 'Fakhry', 'lsnbls@skslfv.com', 'davidgirges78@gmail.com', '$2y$10$mI8nSWIw4ludDEXN32jZNeJoxu.2iDICv4rzevWIvL.KxZzB7Qvdi', 19, '2024-04-26 06:30:21', '2024-04-26 06:30:21'),
(3, 'koko', 'Fakhry', 'lsnbls@skslfv.com', 'Jonathan_20220130@fci.helwan.edu.eg', '$2y$10$.IsISwxcDnQW4l/ztUWY9uYdxiLc9So9/Rfv1weVEfNPYJ0J9Osk6', 468, '2024-04-26 06:38:57', '2024-04-26 06:38:57'),
(4, 'koko', '  Fakhry', 'lsnbls@skslfv.com', 'lsnbls@skslfv.com', '$2y$10$WJLEl9yqmCe5Nqt.Hg91I.3qK99jb9Mz2Tfzg2dN1ITPzO4Y90Hvm', 23, '2024-04-26 06:46:45', '2024-04-26 06:46:45'),
(5, 'baba', 'Gerges', 'lsnbls@skslfv.com', 'lsnbls@skslfv.com', '$2y$10$p6aoeS0BQltcJMs2GJ8kn.SM1Pc19gqh/aJFt/SEXBKmWpw6eU9KS', 563, '2024-04-26 08:18:21', '2024-04-26 08:18:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
