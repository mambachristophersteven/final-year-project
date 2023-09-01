-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2023 at 07:47 PM
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
-- Database: `winkies`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `meal_id` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `cash_amount` varchar(255) NOT NULL,
  `date_ordered` date NOT NULL,
  `meal_price` varchar(255) NOT NULL,
  `meal_name` varchar(255) NOT NULL,
  `meal_image` varchar(255) NOT NULL,
  `order_time` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `meal_id`, `customer_id`, `quantity`, `cash_amount`, `date_ordered`, `meal_price`, `meal_name`, `meal_image`, `order_time`, `status`) VALUES
(44, '2', '1', '6', '462', '2023-08-31', '77', 'Oh Kube', '../../meals/2.svg', '2023-08-30 02:03:39', 'ordered'),
(60, '2', '1', '9', '693', '2023-08-31', '77', 'Oh Kube', '../../meals/2.svg', '2023-08-31 05:27:15', 'ordered');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `ingredient1` varchar(255) NOT NULL,
  `ingredient2` varchar(255) NOT NULL,
  `ingredient3` varchar(255) NOT NULL,
  `ingredient4` varchar(255) NOT NULL,
  `date_added` varchar(255) NOT NULL,
  `on_menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `name`, `price`, `description`, `category`, `image`, `ingredient1`, `ingredient2`, `ingredient3`, `ingredient4`, `date_added`, `on_menu`) VALUES
(1, 'Sweet Sweet Benji', '65', 'Sweet, Sweet and Benji. This would take you away and bring you right back. Enjoy\r\nsweetness', 'Brunch', '../../meals/1.svg', 'Rice', 'Bacon', 'Cheese', 'Eggs', '2023-08-25', 'true'),
(2, 'Oh Kube', '77', 'This is from Jorge to all of us, with love, charisma and just a hint of coconut.', 'Lunch', '../../meals/2.svg', 'Chicken', 'Onion', 'Palova', 'Chili', '2023-08-26', 'false'),
(3, 'Jenny Baby', '56', 'A lovely thought from the west side. Involve your tongue in this journey of Jenny', 'Fries', '../../meals/3.svg', 'Potato', 'Salt', 'Cheese', 'Parsley', '2023-08-26', 'false'),
(4, 'Tarkoradi Sunset', '80', 'Lovely, delicious, yummy and all you can think of in one meal.', 'Salads', '../../meals/8.svg', 'Cabbage', 'Lettuce', 'Carrot', 'Eggs', '2023-08-26', 'false'),
(5, 'Bad Boy', '89', 'dfh ljdfh sfhouidhlj dksdghsd wduiwtwyeli wdiudsd wdosihds ', 'Salads', '../../meals/7.svg', 'Rice', 'Lettuce', 'Cheese', 'Eggs', '2023-08-26', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `date_joined` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `avatar`, `date_joined`) VALUES
(1, 'mambalev', 'chrisolomon0@gmail.com', '123456', 'Customer', '', '2023-08-22'),
(2, 'jurmangandr', 'astevoo24@gmail.com', '245678', 'Chef', '', '2023-08-23'),
(4, 'dhelly', 'mambalev123@gmail.com', '654321', 'Admin', '', '2023-08-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
