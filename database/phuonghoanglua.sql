-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2022 at 12:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phuonghoanglua`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `users_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(33) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `users_name`, `password`, `email`, `image`, `fullname`, `position`, `date`) VALUES
(1, 'dongthai', '09e74116393bb3557a6aaa6427d3f281', 'vodongthai68@gmail.com', 'uploads/images/profile.jpg\r\n', 'Võ Đông Thái', 1, '2022-10-20 10:26:10'),
(2, 'hoaibao', 'dfaf622886cc2a7fbc335e6dd62674e6', 'hoai.baomtgroup@gmail.com', 'uploads/images/profile.jpg', 'Lưu Hoài bảo', 1, '2022-10-20 10:28:20'),
(3, 'nguyentien', '87e5316849ede921ce41fff8fe5b2990', 'tien.nguyenmtgroup@gmail.com', 'uploads/images/profile.jpg', 'Nguyễn Minh Tiến', 1, '2022-10-20 10:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id_customers` int(11) NOT NULL,
  `code` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `models` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `number_car` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `qr_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `care` int(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id_customers`, `code`, `fullname`, `phone`, `models`, `number_car`, `qr_code`, `status`, `care`, `date`) VALUES
(9, 'MTG-55577', 'Võ Đông Thái', '0971738345', 'Hà Nam', '67g55577', 'uploads/qr/MTG-55577-1666257579.png', 1, 1, '2022-10-20 10:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `sidebar`
--

CREATE TABLE `sidebar` (
  `id` int(11) NOT NULL,
  `url` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(1) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sidebar`
--

INSERT INTO `sidebar` (`id`, `url`, `icon`, `name`, `position`, `time`) VALUES
(1, 'customers.php', '<i class=\"fas fa-users\"></i>', 'Khách hàng', 1, '2022-10-20 07:46:49'),
(2, 'admin-phl/modules/logout.php', '<i class=\"fas fa-sign-out-alt\"></i>', 'Đăng xuất', 2, '2022-10-20 07:46:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customers`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `sidebar`
--
ALTER TABLE `sidebar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sidebar`
--
ALTER TABLE `sidebar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
