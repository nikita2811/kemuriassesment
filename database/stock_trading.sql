-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2021 at 07:04 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock_trading`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_data`
--

CREATE TABLE `company_data` (
  `id` int(11) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `stock_price` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_data`
--

INSERT INTO `company_data` (`id`, `company_name`, `stock_price`, `created_at`) VALUES
(21, 'AAPL', 320, '2020-02-11'),
(22, 'GOOGL', 1510, '2020-02-11'),
(23, 'MSFT', 185, '2020-02-11'),
(24, 'GOOGL', 1518, '2020-02-12'),
(25, 'MSFT', 184, '2020-02-12'),
(26, 'AAPL', 324, '2020-02-13'),
(27, 'GOOGL', 1520, '2020-02-14'),
(28, 'AAPL', 319, '2020-02-15'),
(29, 'GOOGL', 1523, '2020-02-15'),
(30, 'MSFT', 189, '2020-02-15'),
(31, 'GOOGL', 1530, '2020-02-16'),
(32, 'AAPL', 319, '2020-02-18'),
(33, 'MSFT', 187, '2020-02-18'),
(34, 'AAPL', 323, '2020-02-19'),
(35, 'AAPL', 313, '2020-02-21'),
(36, 'GOOGL', 1483, '2020-02-21'),
(37, 'MSFT', 178, '2020-02-21'),
(38, 'GOOGL', 1485, '2020-02-22'),
(39, 'MSFT', 180, '2020-02-22'),
(40, 'AAPL', 320, '2020-02-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_data`
--
ALTER TABLE `company_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_data`
--
ALTER TABLE `company_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
