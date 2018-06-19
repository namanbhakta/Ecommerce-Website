-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2018 at 07:41 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `user_id` int(10) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user_id`, `user_email`, `user_pass`) VALUES
(1, 'admin1', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'Dell'),
(3, 'LG'),
(4, 'Samsung'),
(5, 'Apple'),
(6, 'Bose'),
(7, 'Canon'),
(8, 'Sony');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Laptops'),
(2, 'Cameras'),
(3, 'Mobiles'),
(4, 'Computers'),
(5, 'Tablets'),
(6, 'Accsesories');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`) VALUES
(1, '::1', 'user1', 'user1@gmail.com', 'user1', 'India', 'Mumbai', '123456789', 'wadala,mumbai', 'profile-pictures.png'),
(2, '::1', 'user2', 'user2@gmail.com', 'user2', 'India', 'Delhi', '987654321', 'Delhi,India', 'multimedia.png'),
(3, '::1', 'user3', 'user3@gmail.com', 'user3', 'India', 'Ahmedabad', '567890123', 'ahmedabad,Gujrat', 'male-user-profile-picture_318-37825.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `pro_id` int(10) NOT NULL,
  `cus_email` varchar(100) NOT NULL,
  `cus_ip` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `pro_id`, `cus_email`, `cus_ip`, `date`) VALUES
(8, 3, 'user1@gmail.com', '::1', '2017-12-25 11:04:49'),
(9, 7, 'user1@gmail.com', '::1', '2017-12-25 11:04:49'),
(10, 4, 'user1@gmail.com', '::1', '2017-12-25 11:06:00'),
(11, 5, 'user1@gmail.com', '::1', '2017-12-25 11:06:00'),
(12, 1, 'user1@gmail.com', '::1', '2017-12-25 11:06:28'),
(13, 6, 'user1@gmail.com', '::1', '2017-12-25 11:12:25'),
(14, 7, 'user2@gmail.com', '::1', '2017-12-25 12:44:39');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keyword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keyword`) VALUES
(1, 1, 1, 'HP Laptop ', 32600, '<div class=\"_2hqjdd\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 10px 0px 0px; color: #878787; width: 110px; float: left; font-family: Roboto, Arial, sans-serif;\" data-reactid=\"268\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px;\" data-reactid=\"269\">Highlights</span></div>\r\n<div class=\"_3WHvuP\" style=\"box-sizing: border-box; margin: 0px 0px 0px 110px; padding: 0px; flex: 1 1 0%; color: #212121; font-family: Roboto, Arial, sans-serif;\" data-reactid=\"270\">\r\n<ul style=\"box-sizing: border-box; margin: 0px; padding: 0px;\" data-reactid=\"271\">\r\n<li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\" data-reactid=\"272\">AMD APU Quad Core A8 Processor (6th Gen)</li>\r\n<li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\" data-reactid=\"273\">4 GB DDR3 RAM</li>\r\n<li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\" data-reactid=\"274\">DOS Operating System</li>\r\n<li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\" data-reactid=\"275\">1 TB HDD</li>\r\n<li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 16px; list-style: none; position: relative;\" data-reactid=\"276\">15.6 inch Display</li>\r\n</ul>\r\n</div>', 'hp-laptop-250x250.jpg', 'HP.Laptops,4 GB,1 TB HDD,AMD APU Quad Core A8'),
(2, 3, 4, 'Samsung On Max ', 15900, '<p><span style=\"color: #212121; font-family: Roboto, Arial, sans-serif;\">Meet the Samsung On Max with flagship camera f/1.7 - the smartphone that enhances your multimedia experience. With a 13 MP rear camera and 13 MP front camera, this smartphone takes your mobile photography to the next level. Its powerful octa-core processor, along with 4 GB RAM makes way for a lag-free multitasking experience.</span></p>', 'samsung_galaxy.jpg', 'Samsung, 32GB, 13 MP'),
(3, 4, 1, 'HP Desktop', 39800, '<div class=\"_2hqjdd\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 10px 0px 0px; color: #878787; width: 110px; float: left; font-family: Roboto, Arial, sans-serif;\" data-reactid=\"241\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px;\" data-reactid=\"242\">Highlights</span></div>\r\n<div class=\"_3WHvuP\" style=\"box-sizing: border-box; margin: 0px 0px 0px 110px; padding: 0px; flex: 1 1 0%; color: #212121; font-family: Roboto, Arial, sans-serif;\" data-reactid=\"243\">\r\n<ul style=\"box-sizing: border-box; margin: 0px; padding: 0px;\" data-reactid=\"244\">\r\n<li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\" data-reactid=\"245\">Windows 10 Home</li>\r\n<li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\" data-reactid=\"246\">Intel Core i3 (6th Gen)</li>\r\n<li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\" data-reactid=\"247\">HDD Capacity 1 TB</li>\r\n<li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\" data-reactid=\"248\">RAM 4 GB DDR 4</li>\r\n<li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 16px; list-style: none; position: relative;\" data-reactid=\"249\">19.5 inch Display</li>\r\n</ul>\r\n</div>', 'q253in_1.jpg', 'HP, Computer, win 10'),
(4, 6, 6, 'Bose Headphone', 11900, '<div class=\"_2hqjdd\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 10px 0px 0px; color: #878787; width: 110px; float: left; font-family: Roboto, Arial, sans-serif;\" data-reactid=\"305\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px;\" data-reactid=\"306\">Highlights</span></div>\r\n<div class=\"_3WHvuP\" style=\"box-sizing: border-box; margin: 0px 0px 0px 110px; padding: 0px; flex: 1 1 0%; color: #212121; font-family: Roboto, Arial, sans-serif;\" data-reactid=\"307\">\r\n<ul style=\"box-sizing: border-box; margin: 0px; padding: 0px;\" data-reactid=\"308\">\r\n<li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\" data-reactid=\"309\">Design: Canalphone</li>\r\n<li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\" data-reactid=\"310\">Compatible With: Mobile, Tablet</li>\r\n<li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\" data-reactid=\"311\">Bluetooth Support: Yes | Wireless</li>\r\n<li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\" data-reactid=\"312\">Designed for gym workouts, exercise and outdoor experiences</li>\r\n</ul>\r\n</div>', 'bose-soundsport-original.jpeg', 'headphone,wireless,cords'),
(5, 3, 3, 'LG Q6', 13990, '<p><span style=\"color: #212121; font-family: Roboto, Arial, sans-serif;\">The expansive 13.97 cm (5.5) IPS Full HD+ FullVision display gives you more to see. The 18:9 screen brings a new dimension to the smartphone viewing experience, taking you to the next level of watching videos, playing games, and browsing the Internet.</span></p>', 'lg-q6.jpg', 'infinity display,lg,3 GB ram'),
(6, 1, 2, 'Dell Inspiron', 124500, '<div class=\"_2hqjdd\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 10px 0px 0px; color: #878787; width: 110px; float: left; font-family: Roboto, Arial, sans-serif;\" data-reactid=\"277\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px;\" data-reactid=\"278\">Highlights</span></div>\r\n<div class=\"_3WHvuP\" style=\"box-sizing: border-box; margin: 0px 0px 0px 110px; padding: 0px; flex: 1 1 0%; color: #212121; font-family: Roboto, Arial, sans-serif;\" data-reactid=\"279\">\r\n<ul style=\"box-sizing: border-box; margin: 0px; padding: 0px;\" data-reactid=\"280\">\r\n<li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\" data-reactid=\"281\">Intel Core i7 Processor (7th Gen)</li>\r\n<li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\" data-reactid=\"282\">16 GB DDR4 RAM</li>\r\n<li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\" data-reactid=\"283\">64 bit Windows 10 Operating System</li>\r\n<li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\" data-reactid=\"284\">1 TB HDD|256 GB SSD</li>\r\n</ul>\r\n</div>', '61-Rr3ULrDL._SL1500_.jpg', 'ssd,i7,gaming,ddr4'),
(7, 3, 5, 'iPhone X ', 89000, '<p><span style=\"color: #212121; font-family: Roboto, Arial, sans-serif;\">Meet the iPhone X - the device that&rsquo;s so smart that it responds to a tap, your voice, and even a glance. Elegantly designed with a large 14.73 cm (5.8) Super Retina screen and a durable front-and-back glass, this smartphone is designed to impress. What&rsquo;s more, you can charge this iPhone wirelessly.</span></p>', 'apple-iphone-x-silver-front.jpg', 'iphone, bessel less,face id');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
