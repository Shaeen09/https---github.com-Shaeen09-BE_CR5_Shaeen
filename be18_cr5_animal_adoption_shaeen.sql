-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 04:51 PM
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
(0, 'Pixie', 'male', 'pug', 'small', 2, 'https://cdn.pixabay.com/photo/2017/08/20/02/34/pug-2660486__340.jpg', 'yes', 'yes', 3),
(1, 'Maxi', 'male', 'German Sheperd', 'small', 2, 'https://media.istockphoto.com/id/1077470274/pl/zdj%C4%99cie/owczarek-niemiecki-szczeniak-z-li%C5%9B%C4%87mi-w-ustach-ciesz%C4%85c-si%C4%99-siedz%C4%85c-w-trawie-w-s%C5%82oneczny.jpg?b=1&s=170667a&w=0&k=20&c=6EhoJIKrOBYs8MCE8-SSr5Wc7MaBEQBntuz9nFnMwHQ=', 'yes', 'yes', 1),
(2, 'Simba', 'Male', 'German sheperd', 'big', 10, 'https://media.istockphoto.com/id/1389036232/pl/zdj%C4%99cie/owczarek-niemiecki-skacz%C4%85cy-pies-bawi-si%C4%99-i-skacze-aby-z%C5%82apa%C4%87-zabawk%C4%99-z-izolowanym-bia%C5%82ym.jpg?b=1&s=170667a&w=0&k=20&c=XxxTHIzvFs0lqnMhHhssMBSkR2Lnz73bKCqQUVQLCEQ=', 'yes', 'yes', 2),
(4, 'bonny', 'female', ' rabbit', 'size', 1, 'https://cdn.pixabay.com/photo/2020/03/31/16/18/rabbit-4988412__340.jpg', 'yes', 'yes', 1),
(5, 'Poo', 'Female', 'French Poodle', 'small', 2, 'https://media.istockphoto.com/id/1355035543/photo/white-big-royal-poodle-dog.jpg?b=1&s=170667a&w=0&k=20&c=glSACWbKTCvx_5xDk22Su72MB2cVzbQ4sT9akWEc3KI=', 'Yes', 'yes', 3),
(6, 'Rosco', 'male', 'Dalmatian', 'big', 11, 'https://cdn.pixabay.com/photo/2021/11/22/05/02/dalmatian-6815838__340.jpg', 'yes', 'yes', 2),
(8, 'toby', 'male', 'cat', 'big', 8, 'https://cdn.pixabay.com/photo/2023/03/21/08/36/cat-7866716_640.jpg', 'yes', 'yes', 2),
(9, 'paris', 'female', 'Persian cat', 'small', 1, 'https://media.istockphoto.com/id/1368150940/photo/young-cat-looking-surprised-and-scared-relaxed-domestic-cat-at-home.jpg?b=1&s=170667a&w=0&k=20&c=DzG8IAafLgG1tzD8YwBI9lkxKnjTZtnJpyWEz0yRR4U=', 'yes', 'yes', 2),
(10, 'snowy', 'male', 'Snowshoe', 'small', 1, 'https://media.istockphoto.com/id/976746376/photo/snowshoe-cat-portrait.jpg?b=1&s=170667a&w=0&k=20&c=tGua_VSl7l1-HKwiDmvt_EV7Hcs6Gm4cbeI6wxOEYSo=', 'yes', 'yes', 1),
(13, 'Momo', 'male', 'Munchkin', 'small', 2, 'https://media.istockphoto.com/id/1387813865/photo/small-striped-scottish-kitten-of-golden-color.jpg?b=1&s=170667a&w=0&k=20&c=P4Uh12MUVp_q8xjom5P1LchZcG392sM5o4qmC5eLqSE=', 'yes', 'yes', 1),
(14, 'tom', 'male', 'Ragdoll', 'big', 12, 'https://cdn.pixabay.com/photo/2016/10/30/21/37/cat-1784428__340.jpg', 'yes', 'yes', 3),
(17, 'holly', 'male', 'Holland Lop', 'big', 12, 'https://cdn.pixabay.com/photo/2022/02/18/11/48/rabbit-7020503__340.jpg', 'yes', 'yes', 3),
(18, 'emily', 'female', 'Rex', 'big', 13, 'https://media.istockphoto.com/id/1329412794/photo/a-brown-and-white-rex-breed-pet-rabbit.jpg?b=1&s=170667a&w=0&k=20&c=5sfJT_yTxj_MoW57KNqmhDSV_SR_EP2plp0VMkoPx2U=', 'yes', 'yes', 1),
(21, 'Chetak', 'Male', 'Bashkir Horse', 'big', 9, 'https://media.istockphoto.com/id/1471210698/photo/pferd.jpg?b=1&s=170667a&w=0&k=20&c=PLRY7QzbPlKHclSKbNyCt6kiCFD5O0JGQGqsNPHH5E8=', 'yes', 'yes', 2),
(22, 'Jordan', 'male', 'Fjord Horse', 'big', 11, 'https://media.istockphoto.com/id/1058852204/photo/running-fjord-horse-in-the-sunshine.jpg?b=1&s=170667a&w=0&k=20&c=L8Z7MF8kHvcgZbcWy3hQOmljX8GBXsl8bBCt4_D8Kxo=', 'yes', 'yes', 3),
(30, ' Raven', 'female', 'yt', 'yt', 2, 'https://cdn.pixabay.com/photo/2023/03/27/14/18/british-shorthair-7880879_960_720.jpg', 'yt', 'yt', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_supplierId` (`fk_supplierId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`fk_supplierId`) REFERENCES `suppliers` (`supplierId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
