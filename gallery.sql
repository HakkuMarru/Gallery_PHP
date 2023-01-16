-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Jan 16, 2023 at 10:38 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `description` longtext NOT NULL,
  `image_name` longtext NOT NULL,
  `image_order` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `description`, `image_name`, `image_order`) VALUES
(22, 'Apples', 'Green apples', 'apples-g29553390f_1920.jpg.63c5185ccd5461.97483200.jpg', '1'),
(23, 'A bee', 'On the flower', 'flower-g3c8ce7a8c_1920.jpg.63c51878b3e097.62733133.jpg', '2'),
(24, 'Landscape', 'Green field', 'sand-dunes-gfe73be787_1920.jpg.63c518a1a08012.69325513.jpg', '3'),
(25, 'Seashore', 'Nature lanscape', 'nature-g2780dcc34_1920.jpg.63c518bd70c477.25963296.jpg', '4'),
(26, 'Flower', 'Flower photo', 'flower-g6dbf606e2_1920.jpg.63c518ed1a06c0.18720545.jpg', '5'),
(27, 'A birb', 'It\'s a birb!', 'gray-heron-g83b03f124_1920.jpg.63c5190bc02718.92680527.jpg', '6'),
(28, 'Fog', 'Landscape', 'fog-g9139f4547_1920.jpg.63c5192d71ea58.54493613.jpg', '7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
