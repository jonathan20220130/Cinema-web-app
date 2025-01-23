-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 02:57 PM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_image` varchar(255) DEFAULT NULL,
  `item_price` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_type` enum('movie','food') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE `cinema` (
  `cinema_id` int(10) NOT NULL,
  `cinema_name` varchar(100) NOT NULL,
  `location` text NOT NULL,
  `halls_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`cinema_id`, `cinema_name`, `location`, `halls_num`) VALUES
(1, 'Cinema A', 'Location A', 3),
(2, 'Cinema B', 'Location B', 2),
(3, 'Cinema C', 'Location C', 4),
(4, 'Cinema D', 'Location D', 3);

-- --------------------------------------------------------

--
-- Table structure for table `cinema_halls`
--

CREATE TABLE `cinema_halls` (
  `hall_id` int(11) NOT NULL,
  `cinema_id` int(11) NOT NULL,
  `hall_number` int(11) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorits`
--

CREATE TABLE `favorits` (
  `favorit_id` int(10) NOT NULL,
  `item_id` int(10) DEFAULT NULL,
  `item_img` varchar(100) DEFAULT NULL,
  `item_price` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(10) NOT NULL,
  `food_name` varchar(250) NOT NULL,
  `food_kind` varchar(1) NOT NULL,
  `food_description` text NOT NULL,
  `food_availability` tinyint(1) NOT NULL,
  `food_img` varchar(100) NOT NULL,
  `food_price` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `food_kind`, `food_description`, `food_availability`, `food_img`, `food_price`, `created_at`) VALUES
(9, 'Pizza', 'f', 'Delicious pizza with various toppings', 1, 'menu-2.jpg', 10, '2024-04-30 05:38:31'),
(10, 'Burger', 'f', 'Juicy burger with cheese and fries', 1, 'burger.jpg', 8, '2024-04-30 05:38:31'),
(11, 'Sushi', 'f', 'Fresh sushi rolls with wasabi and soy sauce', 0, 'menu-1.jpg', 15, '2024-04-30 05:38:31'),
(12, 'Pad Thai', 'f', 'Stir-fried rice noodles with shrimp and peanuts', 1, 'pad_thai.jpg', 12, '2024-04-30 05:38:31'),
(13, 'Tacos', 'f', 'Authentic tacos with salsa and guacamole', 0, 'tacos.jpg', 9, '2024-04-30 05:38:31'),
(14, 'Pasta', 'f', 'Classic pasta dishes with rich sauces', 1, 'pasta.jpg', 11, '2024-04-30 05:38:31'),
(15, 'Curry', 'f', 'Spicy curry with rice and naan bread', 1, 'curry.jpg', 13, '2024-04-30 05:38:31'),
(16, 'Water', 'd', 'Refreshing bottled water', 1, 'water.jpg', 2, '2024-04-30 05:38:31'),
(17, 'Soda', 'd', 'Carbonated soft drink', 1, 'soda.jpg', 3, '2024-04-30 05:38:31'),
(18, 'Tea', 'd', 'Hot or iced tea', 1, 'tea.jpg', 2, '2024-04-30 05:38:31'),
(19, 'Coffee', 'd', 'Hot or iced coffee', 1, 'coffee.jpg', 3, '2024-04-30 05:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `hero_actors`
--

CREATE TABLE `hero_actors` (
  `hero_actor_id` int(11) NOT NULL,
  `actor_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `movie_ticket_price` int(11) NOT NULL,
  `description` text NOT NULL,
  `genre` text NOT NULL,
  `duration` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `tech` int(1) NOT NULL,
  `available_seats` int(11) NOT NULL,
  `trailers` text DEFAULT NULL,
  `cast` text DEFAULT NULL,
  `synopsis` text DEFAULT NULL,
  `ratings` float DEFAULT NULL,
  `more_info` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `release_date` date DEFAULT current_timestamp(),
  `language` varchar(100) NOT NULL,
  `subtitle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `name`, `image`, `movie_ticket_price`, `description`, `genre`, `duration`, `status`, `tech`, `available_seats`, `trailers`, `cast`, `synopsis`, `ratings`, `more_info`, `created_at`, `release_date`, `language`, `subtitle`) VALUES
(1, 'John Wick', 'John Wick.jpg', 12, 'Description for Movie A', 'action', 120, 0, 1, 100, 'Jo.mp4', 'Director: Chad Stahelski \n Writers: Shay Hatten , Michael Finch , Derek Kolstad \n Stars: Keanu Reeves , Laurence Fishburne , George Georgiou', 'John Wick uncovers a path to defeating The High Table. But before he can earn his freedom, Wick must face off against a new enemy with powerful alliances across the globe and forces that turn old friends into foes.\n\n', 4.1, 'More information about The Matrix', '2024-04-29 03:40:15', NULL, '', ''),
(2, 'Extraction 2', 'Extraction 2.jpg', 12, 'Description for Movie B', 'comedy', 110, 1, 0, 120, 'inception_trailer.mp4', 'Leonardo DiCaprio, Ellen Page', 'Synopsis for Inception', 4.8, 'More information about Inception', '2024-04-28 11:43:23', NULL, '', ''),
(3, 'Indiana Jones', 'Indiana Jones.jpg', 12, 'Description for Movie C', 'action', 100, 0, 1, 90, 'Indiana Jones.mp4', 'Matthew McConaughey, Anne Hathaway', 'Synopsis for Interstellar', 4.3, 'More information about Interstellar', '2024-04-29 04:15:32', NULL, '', ''),
(4, 'Damsel', 'Damsel.jpg', 12, 'Description for Movie D', 'Comedy', 130, 0, 0, 80, 'Damsel.mp4', 'Christian Bale, Heath Ledger', 'Synopsis for The Dark Knight', 4.9, 'More information about The Dark Knight', '2024-04-29 04:05:13', NULL, '', ''),
(5, 'Hypnotic', 'Hypnotic.jpg', 12, 'Description for The Shawshank Redemption', 'Drama', 142, 1, 1, 200, 'Hypnotic.mp4', 'Tim Robbins, Morgan Freeman', 'Synopsis for The Shawshank Redemption', 4.4, 'More information about The Shawshank Redemption', '2024-04-29 03:36:57', NULL, '', ''),
(6, 'Harry Potter', 'HarryPotter.jpg', 12, 'Description for Fight Club', 'Drama', 139, 1, 0, 200, 'fight_club_trailer.mp4', 'Brad Pitt, Edward Norton', 'Synopsis for Fight Club', 4.7, 'More information about Fight Club', '2024-04-28 18:42:37', NULL, '', ''),
(7, 'fast 10', 'fast_10.jpg', 12, 'Description for Forrest Gump', 'Romantic', 142, 0, 1, 200, 'forrest_gump_trailer.mp4', 'Tom Hanks, Robin Wright', 'Synopsis for Forrest Gump', 4.2, 'More information about Forrest Gump', '2024-04-28 11:47:37', NULL, '', ''),
(8, 'The Beekeeper', 'The Beekeeper.jpg', 12, 'Description for The Godfather', 'Romantic', 175, 1, 0, 200, 'godfather_trailer.mp4', 'Marlon Brando, Al Pacino', 'Synopsis for The Godfather', 4.9, 'More information about The Godfather', '2024-04-28 11:48:03', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `movie_hero_actors`
--

CREATE TABLE `movie_hero_actors` (
  `movie_id` int(11) NOT NULL,
  `hero_actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `showtimes`
--

CREATE TABLE `showtimes` (
  `showtime_id` int(10) NOT NULL,
  `movie_id` int(10) DEFAULT NULL,
  `cinema_id` int(10) DEFAULT NULL,
  `showtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `showtimes`
--

INSERT INTO `showtimes` (`showtime_id`, `movie_id`, `cinema_id`, `showtime`) VALUES
(1, 1, 1, '2024-04-28 11:00:00'),
(2, 1, 2, '2024-04-28 13:00:00'),
(3, 2, 1, '2024-04-28 12:00:00'),
(4, 2, 3, '2024-04-28 14:00:00'),
(5, 3, 3, '2024-04-28 15:00:00'),
(6, 3, 4, '2024-04-28 17:00:00'),
(7, 4, 2, '2024-04-28 16:00:00'),
(8, 4, 4, '2024-04-28 18:00:00');

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
(5, 'baba', 'Gerges', 'lsnbls@skslfv.com', 'lsnbls@skslfv.com', '$2y$10$p6aoeS0BQltcJMs2GJ8kn.SM1Pc19gqh/aJFt/SEXBKmWpw6eU9KS', 563, '2024-04-26 08:18:21', '2024-04-26 08:18:21'),
(6, 'Ahmed', 'kaka', 'kaka123', 'lsnbls@skslfv.com', '$2y$10$Ps7z7MtlRfxa56yCTfBE2.mtw6Mkr6CJWZ0GyDLOmPoh.TsEEo7c2', 20, '2024-04-28 08:10:13', '2024-04-28 08:10:13'),
(7, 'babajjj', 'kaka', 'ljln', 'zlmdvlzv@lzbl.com', '$2y$10$avVO1isxAuv7RGYNGcnYa.oaxI1fSfxRaiyP2O2WiaWj5f1ct8uw6', 22, '2024-04-28 08:41:32', '2024-04-28 08:41:32'),
(8, 'Ahmedlijlmm', 'jk kjn jknlm', 'lsnbls@skslfv.com', 'Jonathan_20220130@fci.helwan.edu.eg', '$2y$10$y.4ixmVF5lSNSlGVawvceejsBjTw2cQ/elIiYAo2tUKhOvDaSyAme', 24, '2024-04-28 08:42:53', '2024-04-28 08:42:53'),
(9, 'soso', 'spps', 'soso', 'davidgirges78@gmail.com', '$2y$10$x.F/CvrtbdYpmi0NJ2gpfOkhsPM0vXp/B9z1x0osUIQok8dq/3dy6', 22, '2024-04-28 08:43:56', '2024-04-28 08:43:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_user_id` (`user_id`),
  ADD KEY `fk_cart_item_id_food` (`item_id`);

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`cinema_id`);

--
-- Indexes for table `cinema_halls`
--
ALTER TABLE `cinema_halls`
  ADD PRIMARY KEY (`hall_id`),
  ADD KEY `cinema_id` (`cinema_id`);

--
-- Indexes for table `favorits`
--
ALTER TABLE `favorits`
  ADD PRIMARY KEY (`favorit_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `hero_actors`
--
ALTER TABLE `hero_actors`
  ADD PRIMARY KEY (`hero_actor_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `movie_hero_actors`
--
ALTER TABLE `movie_hero_actors`
  ADD PRIMARY KEY (`movie_id`,`hero_actor_id`),
  ADD KEY `hero_actor_id` (`hero_actor_id`);

--
-- Indexes for table `showtimes`
--
ALTER TABLE `showtimes`
  ADD PRIMARY KEY (`showtime_id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `cinema_id` (`cinema_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `cinema_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cinema_halls`
--
ALTER TABLE `cinema_halls`
  MODIFY `hall_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorits`
--
ALTER TABLE `favorits`
  MODIFY `favorit_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `hero_actors`
--
ALTER TABLE `hero_actors`
  MODIFY `hero_actor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `showtimes`
--
ALTER TABLE `showtimes`
  MODIFY `showtime_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_item_id_food` FOREIGN KEY (`item_id`) REFERENCES `food` (`food_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cart_item_id_movie` FOREIGN KEY (`item_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cart_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cinema_halls`
--
ALTER TABLE `cinema_halls`
  ADD CONSTRAINT `cinema_halls_ibfk_1` FOREIGN KEY (`cinema_id`) REFERENCES `cinema` (`cinema_id`);

--
-- Constraints for table `favorits`
--
ALTER TABLE `favorits`
  ADD CONSTRAINT `favorits_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `food` (`food_id`);

--
-- Constraints for table `movie_hero_actors`
--
ALTER TABLE `movie_hero_actors`
  ADD CONSTRAINT `movie_hero_actors_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`),
  ADD CONSTRAINT `movie_hero_actors_ibfk_2` FOREIGN KEY (`hero_actor_id`) REFERENCES `hero_actors` (`hero_actor_id`);

--
-- Constraints for table `showtimes`
--
ALTER TABLE `showtimes`
  ADD CONSTRAINT `showtimes_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`),
  ADD CONSTRAINT `showtimes_ibfk_2` FOREIGN KEY (`cinema_id`) REFERENCES `cinema` (`cinema_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
