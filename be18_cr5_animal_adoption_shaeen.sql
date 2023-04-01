-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2023 at 05:23 PM
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
-- Database: `be18_cr5_animal_adoption_shaeen`
--

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `age` int(2) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `vaccinated` varchar(255) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `fk_supplierId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `name`, `gender`, `breed`, `size`, `age`, `picture`, `vaccinated`, `availability`, `fk_supplierId`) VALUES
(1, 'Maxi', 'male', 'German Sheperd', 'small', 6, 'https://media.istockphoto.com/id/1077470274/pl/zdj%C4%99cie/owczarek-niemiecki-szczeniak-z-li%C5%9B%C4%87mi-w-ustach-ciesz%C4%85c-si%C4%99-siedz%C4%85c-w-trawie-w-s%C5%82oneczny.jpg?b=1&s=170667a&w=0&k=20&c=6EhoJIKrOBYs8MCE8-SSr5Wc7MaBEQBntuz9nFnMwHQ=', 'yes', 'yes', NULL),
(2, 'Simba', 'Male', 'German sheperd', 'big', 10, 'https://media.istockphoto.com/id/1389036232/pl/zdj%C4%99cie/owczarek-niemiecki-skacz%C4%85cy-pies-bawi-si%C4%99-i-skacze-aby-z%C5%82apa%C4%87-zabawk%C4%99-z-izolowanym-bia%C5%82ym.jpg?b=1&s=170667a&w=0&k=20&c=XxxTHIzvFs0lqnMhHhssMBSkR2Lnz73bKCqQUVQLCEQ=', 'yes', 'yes', NULL),
(5, 'Poo', 'Female', 'French Poodle', 'small', 2, 'https://media.istockphoto.com/id/1355035543/photo/white-big-royal-poodle-dog.jpg?b=1&s=170667a&w=0&k=20&c=glSACWbKTCvx_5xDk22Su72MB2cVzbQ4sT9akWEc3KI=', 'Yes', 'yes', NULL),
(6, 'Rosco', 'male', 'Dalmatian', 'big', 11, 'https://cdn.pixabay.com/photo/2021/11/22/05/02/dalmatian-6815838__340.jpg', 'yes', 'yes', NULL),
(9, 'paris', 'female', 'Persian cat', 'small', 1, 'https://media.istockphoto.com/id/1368150940/photo/young-cat-looking-surprised-and-scared-relaxed-domestic-cat-at-home.jpg?b=1&s=170667a&w=0&k=20&c=DzG8IAafLgG1tzD8YwBI9lkxKnjTZtnJpyWEz0yRR4U=', 'yes', 'yes', NULL),
(10, 'snowy', 'male', 'Snowshoe', 'small', 1, 'https://media.istockphoto.com/id/976746376/photo/snowshoe-cat-portrait.jpg?b=1&s=170667a&w=0&k=20&c=tGua_VSl7l1-HKwiDmvt_EV7Hcs6Gm4cbeI6wxOEYSo=', 'yes', 'yes', NULL),
(13, 'Momo', 'male', 'Munchkin', 'small', 2, 'https://media.istockphoto.com/id/1387813865/photo/small-striped-scottish-kitten-of-golden-color.jpg?b=1&s=170667a&w=0&k=20&c=P4Uh12MUVp_q8xjom5P1LchZcG392sM5o4qmC5eLqSE=', 'yes', 'yes', NULL),
(14, 'tom', 'male', 'Ragdoll', 'big', 12, 'https://cdn.pixabay.com/photo/2016/10/30/21/37/cat-1784428__340.jpg', 'yes', 'yes', NULL),
(17, 'holly', 'male', 'Holland Lop', 'big', 12, 'https://cdn.pixabay.com/photo/2022/02/18/11/48/rabbit-7020503__340.jpg', 'yes', 'yes', NULL),
(18, 'emily', 'female', 'Rex', 'big', 13, 'https://media.istockphoto.com/id/1329412794/photo/a-brown-and-white-rex-breed-pet-rabbit.jpg?b=1&s=170667a&w=0&k=20&c=5sfJT_yTxj_MoW57KNqmhDSV_SR_EP2plp0VMkoPx2U=', 'yes', 'yes', NULL),
(21, 'Chetak', 'Male', 'Bashkir Horse', 'big', 12, 'https://media.istockphoto.com/id/1471210698/photo/pferd.jpg?b=1&s=170667a&w=0&k=20&c=PLRY7QzbPlKHclSKbNyCt6kiCFD5O0JGQGqsNPHH5E8=', 'yes', 'yes', NULL),
(22, 'Jordan', 'male', 'Fjord Horse', 'big', 11, 'https://media.istockphoto.com/id/1058852204/photo/running-fjord-horse-in-the-sunshine.jpg?b=1&s=170667a&w=0&k=20&c=L8Z7MF8kHvcgZbcWy3hQOmljX8GBXsl8bBCt4_D8Kxo=', 'yes', 'yes', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplierId` int(11) NOT NULL,
  `sup_name` varchar(100) NOT NULL,
  `sup_email` varchar(50) DEFAULT NULL,
  `sup_add` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplierId`, `sup_name`, `sup_email`, `sup_add`) VALUES
(1, 'Richard', 'richard@mail.com', 'Niederösterreich'),
(2, 'Ida', 'ida@mail.com', 'Kahlenberg 110'),
(3, 'Suzy', 'suzy@mail,com', 'Praterstrasse 28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `status` varchar(4) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `password`, `date_of_birth`, `email`, `picture`, `status`) VALUES
(1, 'Anton', 'Thomas', 'Anton@123', '2003-03-05', 'anton@mail.com', 'https://media.istockphoto.com/id/1309328823/de/foto/headshot-portr%C3%A4t-von-l%C3%A4chelnden-m%C3%A4nnlichen-angestellten-im-b%C3%BCro.jpg?b=1&s=170667a&w=0&k=20&c=D2QpYEjK8zWaPqSS3nZiDodBxlT6yJdDjscAvkZYY90=', 'user'),
(2, 'Berta', 'Grass', 'Berta@123', '2003-03-05', 'berta@mail.com', 'https://media.istockphoto.com/id/1300972573/de/foto/angenehme-junge-indische-frau-freelancer-beraten-klient-per-videoanruf.jpg?b=1&s=170667a&w=0&k=20&c=eJGvNdYeExSOEjiGUNKEcX4eKpj30BawOW6Pc-vlooM=', 'user'),
(3, 'Cesar', 'moser', 'Cesar@123', '2005-02-01', 'cesar@mail.com', 'https://media.istockphoto.com/id/1171698091/de/foto/ein-mann-der-sein-tagebuch-f%C3%BChrt.jpg?b=1&s=170667a&w=0&k=20&c=Hws_FCgyWs_kmPt3DaMRrKlxdrOArpz8w6kfEVJ3LRo=', 'user'),
(4, 'Dora', 'Müller', 'Dora@123', '2004-07-01', 'dora@mail.com', 'https://media.istockphoto.com/id/1311084168/de/foto/%C3%BCbergl%C3%BCckliche-h%C3%BCbsche-asiatische-frau-schauen-in-die-kamera-mit-aufrichtigem-lachen.jpg?b=1&s=170667a&w=0&k=20&c=eelUpasfW1yCwIrkt1PnZ59lGXXDxpUz0nYcpX8-rnE=', 'user'),
(5, ' Suzanne ', ' Muller ', '58d0dd4478290c97d00b8a8ebe9eff59fee09d5b823d34b3865dfbf0605b60df', '2023-03-28', 'suzanne@mail.com', 'user.png', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplierId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplierId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
