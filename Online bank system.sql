-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2024 at 01:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obs`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(70) NOT NULL,
  `account_owner` varchar(70) NOT NULL,
  `account_id` int(70) NOT NULL,
  `account_type` varchar(70) NOT NULL,
  `password` varchar(170) NOT NULL,
  `beginning_amount` varchar(170) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `account_owner`, `account_id`, `account_type`, `password`, `beginning_amount`, `date_created`) VALUES
(7, 'semana', 44, 'current account', 'b45d31aea558ee69a3e7651670cf0726', '2101', '2024-07-16'),
(8, 'buysell', 89, 'current account', '5379884c5ec4e06879f7400fd40be0d9', '101800', '2024-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `admin_ok`
--

CREATE TABLE `admin_ok` (
  `id` int(70) NOT NULL,
  `All_Names` varchar(70) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `Password` varchar(70) NOT NULL,
  `Account_Number` int(170) NOT NULL,
  `User_Name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_ok`
--

INSERT INTO `admin_ok` (`id`, `All_Names`, `Email`, `Password`, `Account_Number`, `User_Name`) VALUES
(2, 'ish kevin', 'semana@gmail.com', '786464', 23, 'semana17');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(70) NOT NULL,
  `clientName` varchar(70) NOT NULL,
  `clientNumber` varchar(70) NOT NULL,
  `contact` varchar(70) NOT NULL,
  `national_id` int(70) NOT NULL,
  `email` varchar(170) NOT NULL,
  `password` varchar(170) NOT NULL,
  `address` varchar(170) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `clientName`, `clientNumber`, `contact`, `national_id`, `email`, `password`, `address`) VALUES
(5, 'fiacre', '24', '0788896059', 84848, 'admin@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'kigali');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(70) NOT NULL,
  `account_owner` varchar(70) NOT NULL,
  `account_id` int(70) NOT NULL,
  `transaction_amount` int(70) NOT NULL,
  `transaction_type` varchar(170) NOT NULL,
  `date_occured` date NOT NULL DEFAULT current_timestamp(),
  `new_account_balance` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `account_owner`, `account_id`, `transaction_amount`, `transaction_type`, `date_occured`, `new_account_balance`) VALUES
(8, 'Ejide', 22, 10, 'DEPOSIT', '2024-07-18', '100'),
(9, 'ishkevin', 44, 1000, 'DEPOSIT', '2024-07-18', '1137'),
(10, 'Ejide', 22, 20, 'DEPOSIT', '2024-07-18', '120'),
(11, 'von', 11, 10, 'TRANSFER', '2024-07-18', ''),
(12, 'Ejide', 22, 20, 'WITHDRAW', '2024-07-18', '60'),
(13, 'von', 11, 7, 'DEPOSIT', '2024-07-19', '67'),
(14, 'semana', 44, 1000, 'DEPOSIT', '2024-07-19', '3701'),
(15, 'buysell', 89, 200, 'DEPOSIT', '2024-07-19', '100200'),
(16, 'semana', 44, 600, 'WITHDRAW', '2024-07-19', '3101'),
(17, 'buysell', 89, 200, 'WITHDRAW', '2024-07-19', '100000'),
(18, 'semana', 44, 2000, 'TRANSFER', '2024-07-19', ''),
(19, 'semana', 44, 2000, 'DEPOSIT', '2024-10-03', '3101'),
(20, 'buysell', 89, 1200, 'WITHDRAW', '2024-10-03', '100800'),
(21, 'semana', 44, 1000, 'TRANSFER', '2024-10-03', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_ok`
--
ALTER TABLE `admin_ok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(70) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_ok`
--
ALTER TABLE `admin_ok`
  MODIFY `id` int(70) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(70) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(70) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
