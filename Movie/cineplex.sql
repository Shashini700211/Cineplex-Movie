-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 09, 2024 at 04:38 PM
-- Server version: 8.0.34
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cineplex`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL,
  `user type` varchar(10) NOT NULL,
  `user name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user type`, `user name`, `email`, `password`) VALUES
(1, 'admin', 'admin1', 'admin1@gmail.com', '1111'),
(2, 'admin', 'admin2', 'admin2@gmail.com', '2222');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int NOT NULL,
  `Your Name` varchar(200) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Booking Date` date NOT NULL,
  `Time` time NOT NULL,
  `Seats` int NOT NULL,
  `Selected Seats` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `Your Name`, `Title`, `Booking Date`, `Time`, `Seats`, `Selected Seats`) VALUES
(1, 'Shashi', 'After', '2024-03-29', '17:48:27', 4, '16,17,18,19'),
(2, 'Sachii', 'Me Before You', '2024-04-10', '19:51:25', 2, '20,21');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `User Name` varchar(20) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `User Type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`User Name`, `Email`, `Password`, `User Type`) VALUES
('Shashi', 'Shashi@gmail.com', '12345', 'Customer'),
('Sanjaya', 'Sanjaya@gmail.com', '1112', 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `Movie Id` int NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Genre` varchar(200) NOT NULL,
  `Release Date` date NOT NULL,
  `Duration` int NOT NULL,
  PRIMARY KEY (`Movie Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`Movie Id`, `Title`, `Genre`, `Release Date`, `Duration`) VALUES
(1, 'Dark', 'Horror,Thriller', '2024-04-08', 120),
(2, 'Fool Me Once', 'Thriller', '2024-05-05', 160);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `Id` int NOT NULL,
  `Rating` int NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Review` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `Email` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `User Type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Email`, `Password`, `User Type`) VALUES
('staff1@gmail.com', '123', 'Staff'),
('staff2@gmail.com', '1234', 'Staff'),
('staff3@gmail.com', '12345', 'Staff');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
