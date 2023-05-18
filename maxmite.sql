-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 04:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maxmite`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `sno` int(20) NOT NULL,
  `companyname` varchar(50) NOT NULL,
  `adminname` varchar(50) NOT NULL,
  `adminemail` varchar(50) NOT NULL,
  `adminpasscode` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'ADMIN'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`sno`, `companyname`, `adminname`, `adminemail`, `adminpasscode`, `role`) VALUES
(1, 'Ms Vikashtech', 'Vikash mishra', 'vikash@gmail.com', 'f1d7405cf06be812e5d2f9d5145a8dc7', 'ADMIN'),
(5, 'Fillip Technology', 'Fillip Dsouza', 'fillip@gmail.com', '441d118fb334cc6f621874f1a66c20c8', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `companyname` varchar(50) NOT NULL,
  `rights` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `name`, `email`, `dob`, `phone`, `address`, `password`, `companyname`, `rights`) VALUES
(1, 'praveen kumar', 'raveenkumar7272@gmail.com', '1998-02-24', '7272974041', 'lbs path paharpur anisabad patna', '36228b378fa16630ac2073fa8fcf592d', 'Ms Vikashtech', 'full stack developer'),
(2, 'Anand Kr Mishra', 'anandkr0615@gmail.com', '1998-02-24', '7258075267', 'raghopur bihta patna', '8bda8e915e629a9fd1bbca44f8099c81', 'Ms Vikashtech', 'front end developer'),
(3, 'Monu Goyat', 'monugoyat@gmail.com', '1992-08-25', '7272974041', 'gpo campus patna', '46bcf0421593672a2f4bab592a35fcdd', 'Fillip Technology', 'computer operator'),
(4, 'rohit kumar', 'rohit@gmail.com', '1992-02-18', '9876543210', 'patna', '2d235ace000a3ad85f590e321c89bb99', 'Ms Vikashtech', 'assistant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `companyname` (`companyname`),
  ADD UNIQUE KEY `adminemail` (`adminemail`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_details`
--
ALTER TABLE `company_details`
  MODIFY `sno` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
