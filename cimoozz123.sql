-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 07:05 AM
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_name`, `email`, `password`, `created_at`) VALUES
(1, 'Jonathan', 'Jonathan123@gmail.com', '$2y$10$S6ePOsj2wVMjXpbGuHegOuUIedkwBo0354JVul4ofgux2Z5Ksw1vu', '2024-05-04 17:54:24'),
(2, 'Bishoy Adel', 'Jonathan123@gmail.com', '$2y$10$x8I4cz.7HFIYvNOzE.dp2OWmMu/Iru2D0.KBb9lZBeX8IuaDuVEWC', '2024-05-05 04:59:13'),
(3, 'Bishoy Melad', 'Bishoy123@gmail.com', '$2y$10$12SC1KrX/ddyL8mXZcaY8Ot7t2NsMFID.MLgAmkNnzjusZLA2Zj2W', '2024-05-05 08:24:14'),
(4, 'Khalid', 'Jonathan123@gmail.com', '$2y$10$02VMuyFNJDWOMULsDb3MJ.YIDjuwUO.aKSvJcZDbIf7LodxZW28qS', '2024-05-08 12:15:27');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `item_price` int(10) NOT NULL,
  `item_image` varchar(200) NOT NULL,
  `item_status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `item_kind` varchar(1) NOT NULL,
  `num_of_items` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `item_id`, `item_name`, `item_price`, `item_image`, `item_status`, `user_id`, `created_at`, `item_kind`, `num_of_items`) VALUES
(1, 1, 'Popcorn', 5, 'popcorn.jpg', 1, 1, '2024-05-03 01:08:53', 'f', 1),
(2, 2, 'Coca-Cola', 3, 'cocacola.jpg', 1, 1, '2024-05-03 01:08:53', 'd', 1),
(3, 3, 'Hot Dog', 7, 'hotdog.jpg', 0, 1, '2024-05-03 01:08:53', 'f', 1),
(4, 4, 'Nachos', 8, 'nachos.jpg', 0, 1, '2024-05-03 01:08:53', 'd', 1),
(5, 5, 'Pretzel', 6, 'pretzel.jpg', 0, 1, '2024-05-03 01:08:53', 'f', 1),
(6, 6, 'Fanta', 3, 'fanta.jpg', 1, 1, '2024-05-03 01:08:53', 'd', 1),
(7, 7, 'Cheeseburger', 10, 'cheeseburger.jpg', 1, 1, '2024-05-03 01:08:53', 'f', 1),
(8, 1, 'Movie 1', 15, 'movie1.jpg', 1, 1, '2024-05-03 01:08:53', 'm', 1),
(9, 1, 'Popcorn', 5, 'popcorn.jpg', 0, 10, '2024-05-09 02:23:00', 'f', 2);

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
(1, 'Cinema 1', 'New York', 5),
(2, 'Cinema 2', 'Los Angeles', 4),
(3, 'Cinema 3', 'Chicago', 3),
(4, 'Cinema 4', 'Houston', 5),
(5, 'Cinema 5', 'Phoenix', 4),
(6, 'Cinema 6', 'Philadelphia', 3),
(7, 'Cinema 7', 'San Antonio', 5),
(8, 'Cinema 8', 'San Diego', 4);

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

--
-- Dumping data for table `favorits`
--

INSERT INTO `favorits` (`favorit_id`, `item_id`, `item_img`, `item_price`) VALUES
(1, 1, 'popcorn.jpg', 5),
(2, 2, 'soda.jpg', 3),
(3, 3, 'candy.jpg', 4),
(4, 4, 'hotdog.jpg', 7),
(5, 5, 'nachos.jpg', 8),
(6, 6, 'pretzel.jpg', 6),
(7, 7, 'icecream.jpg', 6),
(8, 8, 'chocolate.jpg', 5);

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
(1, 'Popcorn', 'f', 'Salted popcorn', 1, 'popcorn.jpg', 5, '2024-05-03 01:04:00'),
(2, 'Coca-Cola', 'd', 'Cold soda', 1, 'cocacola.jpg', 3, '2024-05-03 01:04:00'),
(3, 'Hot Dog', 'f', 'Beef hot dog', 1, 'hotdog.jpg', 7, '2024-05-03 01:04:00'),
(5, 'Pretzel', 'f', 'Salty pretzel', 1, 'pretzel.jpg', 6, '2024-05-03 01:04:00'),
(6, 'Fanta', 'd', 'Fruit soda', 1, 'fanta.jpg', 3, '2024-05-03 01:04:00'),
(8, 'Ice Cream', 'f', 'Vanilla ice cream', 1, 'icecream.jpg', 6, '2024-05-03 01:04:00'),
(20, 'Hala', 'F', 'lknmlkjnjk', 0, 'about-4.jpg', 12, '2024-05-08 17:48:55'),
(21, 'JJJJJ', 'd', 'kmklmk', 1, 'about-1.jpg', 1233, '2024-05-08 18:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `hero_actors`
--

CREATE TABLE `hero_actors` (
  `hero_actor_id` int(11) NOT NULL,
  `actor_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hero_actors`
--

INSERT INTO `hero_actors` (`hero_actor_id`, `actor_name`) VALUES
(1, 'Actor 1'),
(2, 'Actor 2'),
(3, 'Actor 3'),
(4, 'Actor 4'),
(5, 'Actor 5'),
(6, 'Actor 6'),
(7, 'Actor 7'),
(8, 'Actor 8');

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
(2, 'Movie 2', 'movie2.jpg', 12, 'Description 2', 'Comedy', 100, 0, 1, 120, 'trailer2.mp4', 'Cast 2', 'Synopsis 2', 4.5, 'More info 2', '2024-05-09 01:33:29', '2022-02-01', 'English', 'English'),
(3, 'Movie 3', 'movie3.jpg', 15, 'Description 3', 'Drama', 150, 0, 1, 150, 'trailer3.mp4', 'Cast 3', 'Synopsis 3', 5, 'More info 3', '2024-05-06 06:11:59', '2022-03-01', 'French', 'English'),
(4, 'Movie 4', 'movie4.jpg', 10, 'Description 4', 'Action', 120, 1, 1, 100, 'trailer4.mp4', 'Cast 4', 'Synopsis 4', 4.7, 'More info 4', '2024-05-03 12:15:53', '2022-04-01', 'English', 'English'),
(5, 'Movie 5', 'movie5.jpg', 12, 'Description 5', 'Comedy', 100, 0, 1, 120, 'trailer5.mp4', 'Cast 5', 'Synopsis 5', 4.9, 'More info 5', '2024-05-06 06:12:08', '2022-05-01', 'Spanish', 'English'),
(6, 'Movie 6', 'movie6.jpg', 15, 'Description 6', 'Drama', 150, 1, 1, 150, 'trailer6.mp4', 'Cast 6', 'Synopsis 6', 4.4, 'More info 6', '2024-05-03 12:16:04', '2022-06-01', 'French', 'English'),
(7, 'Movie 7', 'movie7.jpg', 10, 'Description 7', 'Action', 120, 1, 1, 100, 'trailer7.mp4', 'Cast 7', 'Synopsis 7', 4.8, 'More info 7', '2024-05-03 12:16:08', '2022-07-01', 'English', 'English'),
(8, 'Movie 8', 'movie8.jpg', 12, 'Description 8', 'Comedy', 100, 0, 1, 120, 'trailer8.mp4', 'Cast 8', 'Synopsis 8', 4.2, 'More info 8', '2024-05-06 06:12:13', '2022-08-01', 'Spanish', 'English'),
(17, 'Jonathan Gerges', 'about3.jpeg', 444, 'v lx,;lbmlv', 'Drama', 122, 1, 1, 44, 'Hypnotic.mp4', 'v lx,;lbmlv', 'v lx,;lbmlv', 4, 'v lx,;lbmlv', '2024-05-09 00:43:00', '2024-04-30', 'English', 'wxlvb');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `seat_number` varchar(10) DEFAULT NULL,
  `available` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
(1, 1, 1, '2023-01-01 08:00:00'),
(2, 2, 2, '2023-02-01 09:00:00'),
(3, 3, 3, '2023-03-01 10:00:00'),
(4, 4, 4, '2023-04-01 11:00:00'),
(5, 5, 5, '2023-05-01 11:00:00'),
(6, 6, 6, '2023-06-01 12:00:00'),
(7, 7, 7, '2024-05-06 06:06:34'),
(8, 8, 8, '2023-08-01 14:00:00'),
(9, 2, 8, '2024-08-01 14:00:00'),
(10, 17, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tickets_bills`
--

CREATE TABLE `tickets_bills` (
  `bill_id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `town` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `zipcode` int(20) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `user_id` int(10) NOT NULL,
  `total_price` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets_bills`
--

INSERT INTO `tickets_bills` (`bill_id`, `name`, `email`, `town`, `country`, `zipcode`, `phone_number`, `address`, `user_id`, `total_price`, `created_at`) VALUES
(1, 'John Doe', 'johndoe@example.com', 'New York', 'USA', 10001, '555-555-5555', '123 Main St', 1, 50, '2024-05-03 01:08:53'),
(2, 'Jane Smith', 'janesmith@example.com', 'Los Angeles', 'USA', 90001, '555-555-5556', '456 Elm St', 2, 60, '2024-05-03 01:08:53'),
(3, 'Bob Johnson', 'bobjohnson@example.com', 'Chicago', 'USA', 60601, '555-555-5557', '789 Oak St', 3, 70, '2024-05-03 01:08:53'),
(4, 'Alice Davis', 'alicedavis@example.com', 'Houston', 'USA', 77001, '555-555-5558', '321 Pine St', 4, 80, '2024-05-03 01:08:53'),
(5, 'Mike Williams', 'mikewilliams@example.com', 'Phoenix', 'USA', 85001, '555-555-5559', '654 Maple St', 5, 90, '2024-05-03 01:08:53'),
(6, 'Emily Brown', 'emilybrown@example.com', 'San Antonio', 'USA', 78201, '555-555-5560', '987 Birch St', 6, 100, '2024-05-03 01:08:53'),
(7, 'Sarah Davis', 'sarahdavis@example.com', 'San Diego', 'USA', 92101, '555-555-5561', '234 Cedar St', 7, 110, '2024-05-03 01:08:53'),
(8, 'David Lee', 'davidlee@example.com', 'Philadelphia', 'USA', 19101, '555-555-5562', '567 Walnut St', 8, 120, '2024-05-03 01:08:53');

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
(1, 'John', 'Doe', 'johndoe', 'johndoe@example.com', 'password123', 25, '2024-05-03 00:58:16', '2024-05-03 00:58:16'),
(2, 'Jane', 'Doe', 'janedoe', 'janedoe@example.com', 'password123', 28, '2024-05-03 00:58:16', '2024-05-03 00:58:16'),
(3, 'Bob', 'Smith', 'bobsmith', 'bobsmith@example.com', 'password123', 30, '2024-05-03 00:58:16', '2024-05-03 00:58:16'),
(4, 'Alice', 'Johnson', 'alicejohnson', 'alicejohnson@example.com', 'password123', 22, '2024-05-03 00:58:16', '2024-05-03 00:58:16'),
(5, 'Mike', 'Brown', 'mikebrown', 'mikebrown@example.com', 'password123', 35, '2024-05-03 00:58:16', '2024-05-03 00:58:16'),
(6, 'Emily', 'Davis', 'emilydavis', 'emilydavis@example.com', 'password123', 26, '2024-05-03 00:58:16', '2024-05-03 00:58:16'),
(7, 'Sarah', 'Taylor', 'sarahtaylor', 'sarahtaylor@example.com', 'password123', 29, '2024-05-03 00:58:16', '2024-05-03 00:58:16'),
(8, 'David', 'Lee', 'davidlee', 'davidlee@example.com', '$2y$10$SI232OWp3.DDWJpPEzT10e7WXFNzw3kp50ApdgA8dvGw2MuMKigoO', 32, '2024-05-03 00:58:16', '2024-05-04 17:15:59'),
(10, 'koko', 'Fakhry', 'lsnbls@skslfv.com', 'lsnbls@skslfv.com', '$2y$10$jMZ1EKmGkb9YM8KfGDZmM.sT.ft3Vx.NO9cEHGpVh/6XqtXG6ywS2', 20, '2024-05-03 12:23:10', '2024-05-03 12:23:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`cinema_id`);

--
-- Indexes for table `favorits`
--
ALTER TABLE `favorits`
  ADD PRIMARY KEY (`favorit_id`);

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
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `showtimes`
--
ALTER TABLE `showtimes`
  ADD PRIMARY KEY (`showtime_id`);

--
-- Indexes for table `tickets_bills`
--
ALTER TABLE `tickets_bills`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `cinema_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `favorits`
--
ALTER TABLE `favorits`
  MODIFY `favorit_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `hero_actors`
--
ALTER TABLE `hero_actors`
  MODIFY `hero_actor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `showtimes`
--
ALTER TABLE `showtimes`
  MODIFY `showtime_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tickets_bills`
--
ALTER TABLE `tickets_bills`
  MODIFY `bill_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`);

--
-- Constraints for table `showtimes`
--
ALTER TABLE `showtimes`
  ADD CONSTRAINT `showtimes_ibfk_2` FOREIGN KEY (`cinema_id`) REFERENCES `cinema` (`cinema_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
