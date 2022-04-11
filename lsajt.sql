-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2022 at 01:09 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsajt`
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
(17, 'Komentar 2', 45, 10, '2018-03-20 06:18:10', '2018-03-20 06:18:10'),
(18, 'asdasdasda', 49, 9, '2020-04-01 19:16:51', '2020-04-11 20:33:55'),
(20, '1111', 49, 9, '2020-04-11 20:33:05', '2020-04-17 18:00:38'),
(21, 'asdsad21212', 47, 10, '2021-03-08 15:05:11', '2021-03-08 15:05:23'),
(22, 'Komentar 1234', 65, 9, '2021-03-15 13:59:56', '2022-03-11 21:08:13'),
(25, 'awdawda', 65, 9, '2022-03-11 21:52:23', '2022-03-12 23:05:53');

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
(24, 'Tatata', 'b93e4f09e59bbf217fdf9803f7170ee2', 'images/1615819362.png', 0, 1615819362, NULL),
(27, 'Wawawa', '021450006104fce3fabcea92ff43b1ce', 'images/1647033730.jpg', 2, 1647033730, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(50) NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action` text COLLATE utf8_unicode_ci NOT NULL,
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user`, `action`, `time`) VALUES
(1, 'admin', 'Made new post', 1615667249),
(5, 'admin', 'Made new post Aadasdad', 1615669720),
(8, 'admin', 'Made new post Aaaa', 1615676537),
(9, 'admin', 'Updated post Www', 1615738442),
(10, 'admin', 'Updated post Awawaw', 1615738480),
(11, 'admin', 'Updated post Wwaawa', 1615738831),
(12, 'admin', 'Updated post Aasasa', 1615738844),
(13, 'admin', 'Updated post Www', 1615739186),
(14, 'admin', 'Deleted post ', 1615739306),
(15, 'admin', 'Added Korisnik nanana', 1615739748),
(16, 'admin', 'Updated Korisnik bababa', 1615739776),
(17, 'mamama', 'Added Korisnik mamama', 1615740277),
(18, 'tatata', 'Added Korisnik tatata', 1615740330),
(19, 'tatata', 'Login Korisnik tatata', 1615740408),
(20, 'Admin', 'Login Korisnik Admin', 1615740674),
(21, 'admin', 'Added Uloga nanana', 1615742413),
(22, 'admin', 'Deleted Uloga 4', 1615742415),
(23, 'Admin', 'Login Korisnik Admin', 1615818415),
(24, 'admin', 'Deleted Korisnik 21', 1615818436),
(25, 'admin', 'Deleted Korisnik 20', 1615818438),
(26, 'admin', 'Deleted Korisnik 19', 1615818440),
(27, 'admin', 'Deleted Korisnik 18', 1615818442),
(28, 'admin', 'Deleted Korisnik 17', 1615818444),
(29, 'admin', 'Deleted Korisnik 16', 1615818446),
(30, 'admin', 'Deleted Korisnik 15', 1615818451),
(31, 'admin', 'Deleted post 67', 1615818490),
(32, 'admin', 'Deleted post 73', 1615818496),
(33, 'admin', 'Deleted post 72', 1615818498),
(34, 'admin', 'Deleted post 71', 1615818500),
(35, 'admin', 'Deleted post 70', 1615818502),
(36, 'admin', 'Deleted post 69', 1615818518),
(37, 'admin', 'Deleted post 68', 1615818521),
(38, 'admin', 'Deleted post 66', 1615818674),
(39, 'admin', 'Updated post Wwww', 1615818818),
(40, 'admin', 'Updated post Awdsada', 1615819079),
(41, 'Awaw', 'Added Korisnik Awaw', 1615819134),
(42, 'admin', 'Updated Korisnik Wawa', 1615819143),
(43, 'admin', 'Deleted Korisnik 22', 1615819145),
(44, 'Dadada', 'Added Korisnik Dadada', 1615819264),
(45, 'admin', 'Deleted Korisnik 23', 1615819268),
(46, 'Tatata', 'Added Korisnik Tatata', 1615819362),
(47, 'Tatata', 'Added Korisnik Tatata', 1615819390),
(48, 'admin', 'Deleted Korisnik 25', 1615819395),
(49, 'admin', 'Updated post Thor The Dark World', 1615819702),
(50, 'admin', 'Updated post Thor', 1615819726),
(51, 'admin', 'Updated post Thor Ragnarok', 1615819751),
(52, 'admin', 'Updated post The Avengers', 1615819776),
(53, 'admin', 'Updated post Hulk', 1615819798),
(54, 'admin', 'Updated post Spiderman homecoming', 1615819830),
(55, 'admin', 'Updated post Iron Man 3', 1615819867),
(56, 'admin', 'Updated post Iron Man 2', 1615819889),
(57, 'admin', 'Updated post Iron Man', 1615819918),
(58, 'admin', 'Updated post Guardians of the Galaxy 2', 1615819961),
(59, 'admin', 'Updated post Guardians of the Galaxy', 1615819987),
(60, 'admin', 'Updated post Doctor Strange', 1615820020),
(61, 'admin', 'Updated post Captain Marvel', 1615820052),
(62, 'admin', 'Updated post Captain America tthe Winter Soldier', 1615820084),
(63, 'admin', 'Updated post Captain America the Winter Soldier', 1615820097),
(64, 'admin', 'Updated post Captain America', 1615820121),
(65, 'admin', 'Updated post Captain America Civil War', 1615820149),
(66, 'admin', 'Updated post Black Panther', 1615820176),
(67, 'admin', 'Updated post Avengers Infinity War', 1615820211),
(68, 'admin', 'Updated post Avengers Endgame', 1615820248),
(69, 'admin', 'Updated post Avengers Age of Ultron', 1615820272),
(70, 'admin', 'Updated post Ant Man', 1615820368),
(71, 'Admin', 'Login Korisnik Admin', 1647030667),
(72, 'Admin', 'Login Korisnik Admin', 1647032376),
(73, 'Banana', 'Login Korisnik Banana', 1647032839),
(74, 'Admin', 'Login Korisnik Admin', 1647033030),
(75, 'Tatata', 'Added Korisnik Tatata', 1647033116),
(76, 'admin', 'Updated Korisnik Tatatatata', 1647033133),
(77, 'admin', 'Deleted Korisnik 26', 1647033137),
(78, 'admin', 'Made new post Film', 1647033575),
(79, 'admin', 'Updated post Filma', 1647033596),
(80, 'admin', 'Deleted post 74', 1647033599),
(81, 'admin', 'Added Uloga dadada', 1647033620),
(82, 'admin', 'Updated Uloga fddd', 1647033626),
(83, 'admin', 'Deleted Uloga 3', 1647033627),
(84, 'Wawawa', 'Added Korisnik Wawawa', 1647033730),
(85, 'Wawawa', 'Login Korisnik Wawawa', 1647033738),
(86, 'Wawawa', 'Made new post Asdaw', 1647033758),
(87, 'Admin', 'Login Korisnik Admin', 1647033786),
(88, 'admin', 'Deleted post 75', 1647033797),
(89, 'Admin', 'Login Korisnik Admin', 1647121357),
(90, 'Banana', 'Login Korisnik Banana', 1647129977),
(91, 'banana', 'Made new post Adasda', 1647129993),
(92, 'banana', 'Deleted post 76', 1647130008),
(93, 'Admin', 'Login Korisnik Admin', 1647130068);

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
(3, 'Autor', '/autor'),
(4, 'Contact', '/contact-us');

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
(35, 'Thor The Dark World', 'Vase misljenje o filmu?', 89, 9, 1521521611, 1615819702),
(36, 'Thor', 'Vase misljenje o filmu?', 90, 9, 1521521627, 1615819725),
(37, 'Thor Ragnarok', 'Vase misljenje o filmu?', 91, 10, 1521521652, 1615819751),
(38, 'The Avengers', 'Vase misljenje o filmu?', 92, 10, 1521521667, 1615819776),
(39, 'Hulk', 'Vase misljenje o filmu?', 93, 9, 1521521690, 1615819797),
(40, 'Spiderman homecoming', 'Vase misljenje o filmu?', 94, 9, 1521521707, 1615819830),
(41, 'Iron Man 3', 'Vase misljenje o filmu?', 95, 10, 1521521732, 1615819867),
(42, 'Iron Man 2', 'Vase misljenje o filmu?', 96, 10, 1521521743, 1615819889),
(44, 'Iron Man', 'Vase misljenje o filmu?', 97, 9, 1521530225, 1615819918),
(45, 'Guardians of the Galaxy 2', 'Vase misljenje o filmu?', 98, 9, 1521530240, 1615819961),
(47, 'Guardians of the Galaxy', 'sdad', 99, 9, 1585255246, 1615819987),
(48, 'Doctor Strange', 'Vase misljenje o filmu?', 100, 9, 1585255673, 1615820020),
(49, 'Captain Marvel', 'Vase misljenje o filmu?', 101, 9, 1585255695, 1615820052),
(54, 'Captain America the Winter Soldier', 'Vase misljenje o filmu?', 102, 9, 1615502809, 1615820097),
(60, 'Captain America', 'Vase misljenje o filmu?', 103, 9, 1615504773, 1615820121),
(61, 'Captain America Civil War', 'Vase misljenje o filmu?', 104, 9, 1615505314, 1615820149),
(62, 'Black Panther', 'Vase misljenje o filmu?', 105, 9, 1615584915, 1615820176),
(63, 'Avengers Infinity War', 'Vase misljenje o filmu?', 106, 9, 1615664278, 1615820211),
(64, 'Ant Man', 'Vase misljenje o filmu?', 109, 9, 1615665268, 1615820368),
(65, 'Avengers Age of Ultron', 'Vase misljenje o filmu?', 108, 9, 1615665345, 1615820272);

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
(89, 'Thortdw', 'images/1615819702.jpg'),
(90, 'Thor', 'images/1615819725.jpg'),
(91, 'Thorr', 'images/1615819751.jpg'),
(92, 'Avengers', 'images/1615819776.jpg'),
(93, 'Hulk', 'images/1615819797.jpg'),
(94, 'Spiderman', 'images/1615819830.jpg'),
(95, 'Ironman3', 'images/1615819867.jpg'),
(96, 'Ironman2', 'images/1615819889.jpg'),
(97, 'Ironman', 'images/1615819918.jpg'),
(98, 'gotg2', 'images/1615819961.jpg'),
(99, 'gotg', 'images/1615819987.jpg'),
(100, 'drstrange', 'images/1615820020.jpg'),
(101, 'cmarvel', 'images/1615820052.jpg'),
(102, 'camericatws', 'images/1615820084.jpg'),
(103, 'camerica', 'images/1615820121.jpg'),
(104, 'camericacw', 'images/1615820149.jpg'),
(105, 'blackpanther', 'images/1615820176.jpg'),
(106, 'avengersiw', 'images/1615820211.jpg'),
(108, 'avengersaou', 'images/1615820272.jpg'),
(109, 'antman', 'images/1615820368.jpg');

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
-- Indexes for table `logs`
--
ALTER TABLE `logs`
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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `slika`
--
ALTER TABLE `slika`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
