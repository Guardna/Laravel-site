-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 24, 2019 at 05:02 PM
-- Server version: 10.3.16-MariaDB
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
-- Database: `id5077812_film`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(50) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(14, 'Komentar 1', 42, 10, '2018-03-20 03:57:29', '2018-03-20 03:57:29'),
(15, 'Komentar 2', 42, 9, '2018-03-20 03:57:49', '2018-03-20 03:57:49'),
(16, 'Komentar 1', 45, 9, '2018-03-20 06:17:47', '2018-03-20 06:17:47'),
(17, 'Komentar 2', 45, 10, '2018-03-20 06:18:10', '2018-03-20 06:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(50) NOT NULL,
  `korisnicko_ime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uloga_id` int(50) NOT NULL,
  `created_at` int(255) DEFAULT NULL,
  `updated_at` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `korisnicko_ime`, `lozinka`, `slika`, `uloga_id`, `created_at`, `updated_at`) VALUES
(9, 'admin', '2e33a9b0b06aa0a01ede70995674ee23', 'images/1521518929.jpg', 1, 1521518929, NULL),
(10, 'banana', 'a27af2d0f102e7ec167c8602db4d1267', 'images/1521521281.jpg', 2, 1521521281, NULL),
(15, 'danijela', '41749e505426d02af11cc5b11e44f5f3', 'images/1522303374.png', 2, 1522303374, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `id` int(50) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`id`, `naziv`, `link`) VALUES
(1, 'Home', '/'),
(2, 'Galerija', '/galerija'),
(3, 'Autor', '/autor');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(50) NOT NULL,
  `naslov` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sadrzaj` text COLLATE utf8_unicode_ci NOT NULL,
  `slika_id` int(255) NOT NULL,
  `korisnik_id` int(255) NOT NULL,
  `created_at` int(255) DEFAULT NULL,
  `updated_at` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `naslov`, `sadrzaj`, `slika_id`, `korisnik_id`, `created_at`, `updated_at`) VALUES
(35, 'Post 1', 'post 1', 50, 9, 1521521611, NULL),
(36, 'Post 2', 'post 2', 51, 9, 1521521627, NULL),
(37, 'Post 3', 'post 3', 52, 10, 1521521652, NULL),
(38, 'Post 4', 'post 4', 53, 10, 1521521667, NULL),
(39, 'Post 5', 'post 5', 54, 9, 1521521690, NULL),
(40, 'Post 6', 'post 6', 55, 9, 1521521707, NULL),
(41, 'Post 7', 'post 7', 56, 10, 1521521732, NULL),
(42, 'Post 8', 'post 8', 57, 10, 1521521743, NULL),
(44, 'Post 9', 'post 9', 59, 9, 1521530225, NULL),
(45, 'Post 10', 'post 10', 60, 9, 1521530240, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slika`
--

CREATE TABLE `slika` (
  `id` int(50) NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `putanja` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slika`
--

INSERT INTO `slika` (`id`, `alt`, `putanja`) VALUES
(50, 'post1', 'images/1521521611.jpg'),
(51, 'post2', 'images/1521521627.jpg'),
(52, 'post3', 'images/1521521652.jpg'),
(53, 'post4', 'images/1521521667.jpg'),
(54, 'post5', 'images/1521521690.jpg'),
(55, 'post6', 'images/1521521707.jpg'),
(56, 'post7', 'images/1521521731.jpg'),
(57, 'post8', 'images/1521521743.jpg'),
(59, 'post9', 'images/1521530224.jpg'),
(60, 'post10', 'images/1521530239.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `id` int(50) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`id`, `naziv`) VALUES
(1, 'admin'),
(2, 'korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slika`
--
ALTER TABLE `slika`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `slika`
--
ALTER TABLE `slika`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
