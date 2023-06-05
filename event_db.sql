-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2023 at 11:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `sno.` int(10) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sno.`, `admin_name`, `admin_password`) VALUES
(1, 'admin', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `sno` int(11) NOT NULL,
  `Eventname` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(300) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`sno`, `Eventname`, `date`, `time`, `location`, `description`) VALUES
(1, 'Iphone15 Launch', '2023-04-21', '20:02:00', 'William Halls, Los Angeles,California', 'Apple is launching its new iphone 15 with its new features and there will be grand launch event for the iPhone lovers.Hope you all enjoy the event'),
(2, 'Oppo reno 10 Pro Launch', '2023-05-25', '18:39:00', 'Hitech Towers, Jubilee Hills,Hyderabad', 'This is the launch event of Oppo Reno 10 Pro by the Oppo company.The CEO along with the Brand ambassador of Oppo will join the event'),
(5, 'Mark Cuban Business Summit ', '2023-06-23', '16:55:10', 'Afilia Hall,Losangeles,California', 'It is a business Summit by the great enterpreneur,angel investor,billionaire i.e Mark cuban.He will share share some of the lessons about his Startup journey.'),
(6, 'IQOO Flagship smartphone launch', '2023-07-21', '06:06:00', 'Sadar house,Pune', 'It is the launch event for IQOO flagship smartphone that is famous for gaming is to be launched on this Day.'),
(7, 'Google Developers Meet', '2023-06-27', '12:30:00', 'Sadar house,Pune', 'It is the developers meet for google developers where they discuss about future prospects about artificial intelligence and Other AI tools.'),
(8, 'Arjit Singh Concert', '2023-06-28', '18:26:00', 'Sangeet Towers,Mumbai', 'It is singing concert by Arjit Singh who is the greatest singer and one of the top singers with most number of hit songs in the modern era.');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(6) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(70) NOT NULL,
  `ticket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `name`, `email`, `date`, `time`, `location`, `ticket`) VALUES
(623145, 'Mukesh Ambani Ted Talk', 'rocky12@gmail.com', '2023-06-15', '19:12:43', 'Antilia Towers, Bandra, Mumbai,India', 3),
(0, 'Mark Cuban Business Summit', 'supriya12@gmail.com', '2023-05-17', '20:32:00', 'Astrax towers,Hyderabad', 3),
(337892, 'Mukesh Ambani Ted Talk', 'supriya12@gmail.com', '2023-04-12', '20:42:00', 'Afilia Halls,Los Angels,California', 3),
(466389, 'Aman Dhattarwal Ted talk', 'srerfyghjg123@gmail.com', '2023-04-26', '16:43:00', 'Hitech Towers,Jubilee Hills,Hyderabad', 2),
(250120, 'Google Developers Meet', 'prince123@gmail.com', '2023-05-18', '20:45:00', 'Afilia Halls,Los Angels,California', 2),
(581185, 'Mukesh Ambani Ted Talk', 'sreyghjg123@gmail.com', '2023-05-24', '19:45:00', 'Astrax towers,Hyderabad', 3);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `sno` int(18) NOT NULL,
  `name` varchar(29) NOT NULL,
  `email` varchar(29) NOT NULL,
  `message` text NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`sno`, `name`, `email`, `message`, `dt`) VALUES
(1, 'Rocky', 'rocky12@gmail.com', 'here is something I wanna say The event was amazing last time', '2023-04-07 05:50:05'),
(2, 'rohan', 'rohan12@gmail.com', 'You should change the process of operations', '2023-04-07 19:04:02'),
(3, 'harish', 'harish12@gmail.com', 'You have to improve the loading time', '2023-04-07 19:15:51'),
(4, 'supriyesh', 'supriyesh12@gmail.com', 'here is how you can change the interface of the website', '2023-04-11 17:07:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Sno` int(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `username` varchar(23) NOT NULL,
  `Email` varchar(23) NOT NULL,
  `password` varchar(15) NOT NULL,
  `Dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Sno`, `Name`, `username`, `Email`, `password`, `Dt`) VALUES
(1, 'harish agrawal', 'harish10', 'harish08@gmail.com', 'harish100', '2023-04-07 03:25:41'),
(2, 'sebrina', 'serina10', 'sebrina10@gmail.com', 'Serina1234', '2023-04-07 03:34:55'),
(3, 'sabrina watts', 'sabrina19', 'sabrina19@gmail.com', 'Saban12', '2023-04-07 03:36:13'),
(5, 'robert jones', 'robertj56', 'robertj56@gmail.com', 'robertj', '2023-04-11 17:34:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`sno.`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Sno`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `sno.` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `sno` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Sno` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
