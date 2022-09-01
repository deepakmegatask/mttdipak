-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2021 at 07:37 AM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17261302_coffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `about_image` varchar(500) NOT NULL,
  `heading1` varchar(200) NOT NULL,
  `heading2` varchar(200) NOT NULL,
  `content1` varchar(1000) NOT NULL,
  `content2` varchar(1000) NOT NULL,
  `status` int(20) NOT NULL,
  `date_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `about_image`, `heading1`, `heading2`, `content1`, `content2`, `status`, `date_at`, `update_at`) VALUES
(2, '60f10a1b73800.jpg', 'STRONG COFFEE, STRONG ROOTS', 'ABOUT OUR CAFE', 'Founded in 1987 by the Hernandez brothers, our establishment has been serving up rich coffee sourced from artisan farmers in various regions of South and Central America. We are dedicated to travelling the world, finding the best coffee, and bringing back to you here in our cafe.', 'We guarantee that you will fall in lust with our decadent blends the moment you walk inside until you finish your last sip. Join us for your daily routine, an outing with friends, or simply just to enjoy some alone time.', 1, '2021-07-15 07:08:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `home_image` varchar(1000) NOT NULL,
  `heading1` varchar(100) NOT NULL,
  `heading2` varchar(100) NOT NULL,
  `content1` varchar(500) NOT NULL,
  `heading3` varchar(100) NOT NULL,
  `heading4` varchar(100) NOT NULL,
  `content2` varchar(500) NOT NULL,
  `headbtn` varchar(100) NOT NULL,
  `slug` varchar(500) NOT NULL,
  `status` int(20) NOT NULL,
  `date_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `home_image`, `heading1`, `heading2`, `content1`, `heading3`, `heading4`, `content2`, `headbtn`, `slug`, `status`, `date_at`, `update_at`) VALUES
(17, '619deb4aa203b.jpg', 'FRESH COFFEE', 'WORTH DRINKING', 'Every cup of our quality artisan coffee starts with locally sourced, hand picked ingredients. Once you try it, our coffee will be a blissful addition to your everyday morning routine - we guarantee it!', 'OUR PROMISE', 'TO YOU', 'When you walk into our shop to start your day, we are dedicated to providing you with friendly service, a welcoming atmosphere, and above all else, excellent products made with the highest quality ingredients. If you are not satisfied, please let us know and we will do whatever we can to make things right!', 'Visit Us Today!', 'products', 1, '2021-07-16 13:21:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(20) NOT NULL,
  `heading1` varchar(500) NOT NULL,
  `heading2` varchar(500) NOT NULL,
  `pro_image1` varchar(500) NOT NULL,
  `content1` varchar(1000) NOT NULL,
  `heading3` varchar(500) NOT NULL,
  `heading4` varchar(500) NOT NULL,
  `pro_image2` varchar(500) NOT NULL,
  `content2` varchar(1000) NOT NULL,
  `heading5` varchar(500) NOT NULL,
  `heading6` varchar(500) NOT NULL,
  `pro_image3` varchar(500) NOT NULL,
  `content3` varchar(1000) NOT NULL,
  `status` int(20) NOT NULL,
  `date_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `heading1`, `heading2`, `pro_image1`, `content1`, `heading3`, `heading4`, `pro_image2`, `content2`, `heading5`, `heading6`, `pro_image3`, `content3`, `status`, `date_at`, `update_at`) VALUES
(1, 'BLENDED TO PERFECTION', 'COFFEES & TEAS ', '60f11322c7de0.jpg', 'We take pride in our work, and it shows. Every time you order a beverage from us, we guarantee that it will be an experience worth having. Whether it\'s our world famous Venezuelan Cappuccino, a refreshing iced herbal tea, or something as simple as a cup of speciality sourced black coffee, you will be coming back for more.', 'DELICIOUS TREATS, GOOD EATS ', 'BAKERY & KITCHEN ', '60f112f521969.jpg', 'Our seasonal menu features delicious snacks, baked goods, and even full meals perfect for breakfast or lunchtime. We source our ingredients from local, oragnic farms whenever possible, alongside premium vendors for specialty goods.', 'FROM AROUND THE WORLD ', 'BULK SPECIALITY BLENDS ', '60f112f52219b.jpg', 'Travelling the world for the very best quality coffee is something take pride in. When you visit us, you\'ll always find new blends from around the world, mainly from regions in Central and South America. We sell our blends in smaller to large bulk quantities. Please visit us in person for more details.', 1, '2021-07-15 08:57:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(20) NOT NULL,
  `heading1` varchar(200) NOT NULL,
  `heading2` varchar(200) NOT NULL,
  `store_image` varchar(500) NOT NULL,
  `sunday` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `monday` datetime NOT NULL,
  `tuesday` datetime NOT NULL,
  `wednesday` datetime NOT NULL,
  `thursday` datetime NOT NULL,
  `friday` datetime NOT NULL,
  `saturday` datetime NOT NULL,
  `address1` varchar(500) NOT NULL,
  `address2` varchar(500) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `bottom1` varchar(100) NOT NULL,
  `bottom2` varchar(100) NOT NULL,
  `content1` varchar(1000) NOT NULL,
  `content2` varchar(1000) NOT NULL,
  `status` int(20) NOT NULL,
  `date_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `heading1`, `heading2`, `store_image`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `address1`, `address2`, `phone`, `bottom1`, `bottom2`, `content1`, `content2`, `status`, `date_at`, `update_at`) VALUES
(4, 'COME ON IN', 'WE\'RE OPEN', '60f11609c9b0a.jpg', '2021-07-15 23:15:00', '2021-07-15 10:15:00', '2021-07-15 14:45:00', '2021-07-15 16:42:00', '2021-07-15 15:45:00', '2021-07-15 15:45:00', '2021-07-15 15:35:00', '1116 Orchard Street', 'Golden Valley, Minnesota', '(317) 585-8468', 'STRONG COFFEE, STRONG ROOTS', 'ABOUT OUR CAFE', 'Founded in 1987 by the Hernandez brothers, our establishment has been serving up rich coffee sourced from artisan farmers in various regions of South and Central America. We are dedicated to travelling the world, finding the best coffee, and bringing back to you here in our cafe.', 'We guarantee that you will fall in lust with our decadent blends the moment you walk inside until you finish your last sip. Join us for your daily routine, an outing with friends, or simply just to enjoy some alone time.', 1, '2021-07-15 11:43:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` int(10) NOT NULL,
  `date_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `status`, `date_at`, `update_at`) VALUES
(1, 'Muzammil Abbas', 'admin@demo.com', '123456', 1, '2021-07-16 13:16:36', '2021-07-13 10:54:53');

-- --------------------------------------------------------

--
-- Table structure for table `web`
--

CREATE TABLE `web` (
  `id` int(20) NOT NULL,
  `heading1` varchar(100) NOT NULL,
  `heading2` varchar(100) NOT NULL,
  `bg_image` varchar(500) NOT NULL,
  `footer` varchar(100) NOT NULL,
  `status` int(20) NOT NULL,
  `date_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web`
--

INSERT INTO `web` (`id`, `heading1`, `heading2`, `bg_image`, `footer`, `status`, `date_at`, `update_at`) VALUES
(1, 'COFFEE SHOP', 'COFFEES & TEAS', '60f6a9c4dbc18.jpg', 'Coffee Shop', 1, '2021-07-15 05:56:55', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web`
--
ALTER TABLE `web`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `web`
--
ALTER TABLE `web`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
